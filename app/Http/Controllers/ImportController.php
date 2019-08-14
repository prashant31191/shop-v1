<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product};

class ImportController extends Controller
{
    public function productAliExpress(){


        $keyword = "iphone";

        $content = file_get_contents("http://gw.api.alibaba.com/openapi/param2/2/portals.open/api.listPromotionProduct/92400?fields=productId,productTitle,productUrl,imageUrl,originalPrice,salePrice,discount,evaluateScore,commission,commissionRate,30daysCommission,volume,packageType,lotNum,validTime,storeName,storeUrl,allImageUrls&keywords=$keyword&localCurrency=USD&originalPriceTo=999&highQualityItems=true");
        $details = json_decode($content);

        
        //dump($details->result->products);

        $currency = Currency::create([
            'name' => 'US Dollar',
            'code' => 'USD',
        ]);

        $currency_rate = CurrencyRate::create([
            'rate' => 17.501,
        ]);

        foreach ($details->result->products as $products) {

            // dump($products->originalPrice);

            $original_price = str_replace("US $", "", $products->originalPrice);
            $original_price = str_replace(" €", "", $original_price);
            $original_price = str_replace(",", ".", $original_price);
            $image = $products->imageUrl ?? "";
            $discount = str_replace("%","", $products->discount);

            $title = $products->productTitle;

            $product = Product::create([
                'name' => $title,
                'description' => "des",
                'image' => $image,

            ]);
    
            $price = Price::create([
                'value' => $original_price,
                'discount' => $discount,
            ]);   
            

            $product->prices()->save($price);
            $currency->rates()->save($currency_rate);
            $currency->prices()->save($price);

            print "title: ".$title;
            print "<br>price: ".$original_price;
            print "<br>discount: ".$discount;
            print "<br><img style=\"height: 100px;\" src=\"$image\">";

        }        

    }

    public function importEbay(){

        // https://developer.ebay.com/DevZone/finding/HowTo/index.html
        // API request variables
        $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
        $version = '1.0.0';  // API version supported by your application
        $appid = 'SergheiP-ShopLara-PRD-f44838eb2-53c2fd8f';  // Replace with your own AppID
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        $query = 'iphone';  // You may want to supply your own query
        $safequery = urlencode($query);  // Make the query URL-friendly
        $i = '0';  // Initialize the item filter index to 0

        // Create a PHP array of the item filters you want to use in your request
        $filterarray =
        array(
            array(
            'name' => 'MaxPrice',
            'value' => '2500',
            'paramName' => 'Currency',
            'paramValue' => 'USD'),
            array(
            'name' => 'FreeShippingOnly',
            'value' => 'true',
            'paramName' => '',
            'paramValue' => ''),
            array(
            'name' => 'ListingType',
            'value' => array('AuctionWithBIN','FixedPrice','StoreInventory'),
            'paramName' => '',
            'paramValue' => ''),
        );

        // Generates an indexed URL snippet from the array of item filters
        function buildURLArray ($filterarray) {
            global $urlfilter;
            global $i;
            // Iterate through each filter in the array
            foreach($filterarray as $itemfilter) {
                // Iterate through each key in the filter
                foreach ($itemfilter as $key =>$value) {
                    if(is_array($value)) {
                        foreach($value as $j => $content) { // Index the key for each value
                            $urlfilter .= "&itemFilter($i).$key($j)=$content";
                        }
                    }
                    else {
                        if($value != "") {
                            $urlfilter .= "&itemFilter($i).$key=$value";
                        }
                    }
                }
                $i++;
            }
            return "$urlfilter";
        } // End of buildURLArray function

        // Build the indexed item filter URL snippet
        buildURLArray($filterarray);

        // Construct the findItemsByKeywords HTTP GET call 
        $apicall = "$endpoint?";
        $apicall .= "OPERATION-NAME=findItemsByKeywords";
        $apicall .= "&SERVICE-VERSION=$version";
        $apicall .= "&SECURITY-APPNAME=$appid";
        $apicall .= "&GLOBAL-ID=$globalid";
        $apicall .= "&keywords=$safequery";
        $apicall .= "&paginationInput.entriesPerPage=10";
        // $apicall .= "$urlfilter";

        // Load the call and capture the document returned by eBay API
        $resp = simplexml_load_file($apicall);

        // Check to see if the request was successful, else print an error
        if ($resp->ack == "Success") {
        $results = '';

            // var_dump($resp);

            $currency = Currency::create([
                'name' => 'US Dollar',
                'code' => 'USD',
            ]);
    
            $currency_rate = CurrencyRate::create([
                'rate' => 17.447,
            ]);

            // If the response was loaded, parse it and build links  
            foreach($resp->searchResult->item as $item) {
                $title = $item->title;
                $description = $item->subtitle;
                $image   = $item->galleryURL;
                $link = $item->viewItemURL;
                $p_price = $item->sellingStatus->currentPrice;
            
                // For each SearchResultItem node, build a link and append it to $results

                $product = Product::create([
                    'name' => $title,
                    'description' => $description,
                    'image' => $image,
    
                ]);
        
                $price = Price::create([
                    'value' => $p_price,
                    'discount' => 0,
                ]);                    
    
                $product->prices()->save($price);
                $currency->rates()->save($currency_rate);
                $currency->prices()->save($price);
    
                print "title: ".$title;
                print "<br>description: ".$description;
                print "<br>price: ".$p_price;
                // print "<br>discount: ".$discount;
                print "<br><img style=\"height: 100px;\" src=\"$image\">";

            }
        }
        // If the response does not indicate 'Success,' print an error
        else {
            $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
            $results .= "AppID for the Production environment.</h3>";
        }

    }

    public function countries(){
        $content = file_get_contents("http://battuta.medunes.net/api/country/all/?key=8c6abeaf587fd79128b443c9f6c8542b");
        $details = json_decode($content);
        
        foreach ($details as $detail) {
            dump($detail->name);
        }

        $content = file_get_contents("http://battuta.medunes.net/api/country/all/?key=8c6abeaf587fd79128b443c9f6c8542b");
        $details = json_decode($content);
        
        foreach ($details as $detail) {
            dump($detail->name);
        }
        
        
    }

}

// countries and cities
// 8c6abeaf587fd79128b443c9f6c8542b
// http://battuta.medunes.net/api/country/all/?key={YOUR_API_KEY}
// http://battuta.medunes.net/api/region/{COUNTRY_CODE}/all/?key={YOUR_API_KEY}

// API Apiexpress 
// https://portals.aliexpress.com/help/help_center_API.html?spm=a2g01.8078014.0.0.583c5ef1oaARRg