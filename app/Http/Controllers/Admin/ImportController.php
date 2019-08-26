<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Faker\Factory as Faker;

use App\{City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product,Region,Email,Category};

class ImportController extends Controller
{
    public function importAliExpress(){

        $keyword = "iphone";

        $content = file_get_contents("http://gw.api.alibaba.com/openapi/param2/2/portals.open/api.listPromotionProduct/92400?fields=productId,productTitle,productUrl,imageUrl,originalPrice,salePrice,discount,evaluateScore,commission,commissionRate,30daysCommission,volume,packageType,lotNum,validTime,storeName,storeUrl,allImageUrls&keywords=$keyword&localCurrency=USD&originalPriceTo=999&highQualityItems=true");
        $details = json_decode($content);

        //dump($details->result->products);

        Currency::truncate();

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

            // print "title: ".$title;
            // print "<br>price: ".$original_price;
            // print "<br>discount: ".$discount;
            // print "<br><img style=\"height: 100px;\" src=\"$image\">";

        }

        return redirect()->to('admin/products/list');

    }

    public function importEbay(){

        $query = Input::post('query');

        // https://developer.ebay.com/DevZone/finding/HowTo/index.html
        // API request variables
        $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
        $version = '1.0.0';  // API version supported by your application
        $appid = 'SergheiP-ShopLara-PRD-f44838eb2-53c2fd8f';  // Replace with your own AppID
        $globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
        // $query = 'iphone';  // You may want to supply your own query
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

            array(
                'name' => 'HideDuplicateItems',
                'value' => 'true',
                'paramName' => '',
                'paramValue' => ''
            ),
            array(
                'name' => 'Condition',
                'value' => 'new',
                'paramName' => '',
                'paramValue' => ''
            ),
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
        $apicall .= "&paginationInput.entriesPerPage=20";
        // $apicall .= "$urlfilter";

        // Load the call and capture the document returned by eBay API
        $resp = simplexml_load_file($apicall);

        // Check to see if the request was successful, else print an error
        if ($resp->ack == "Success") {
        $results = '';

            // var_dump($resp);
            Currency::truncate();

            $currency = Currency::create([
                'name' => 'US Dollar',
                'code' => 'USD',
            ]);

            $currency_rate = CurrencyRate::create([
                'rate' => 17.447,
            ]);

            // If the response was loaded, parse it and build links
            foreach($resp->searchResult->item as $item) {

                // dd($item->primaryCategory);

                $title = $item->title;
                $description = $item->subtitle;
                $image   = $item->galleryURL;
                $link = $item->viewItemURL;
                $p_price = $item->sellingStatus->currentPrice;
                $category_id = $item->primaryCategory->categoryId;
                $category_name = $item->primaryCategory->categoryName;

                // For each SearchResultItem node, build a link and append it to $results

                // dd($item);

                $category_exist = Category::where('name', $category_name)->get();

                if ($category_exist->count() == 0) {
                    $category = Category::create([
                        'name' => $category_name,
                        'category_id' => $category_id,
                    ]);
                }

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

                // print "title: ".$title;
                // print "<br>description: ".$description;
                // print "<br>price: ".$p_price;
                // print "<br>discount: ".$discount;
                // print "<br><img style=\"height: 100px;\" src=\"$image\">";

            }
        }
        // If the response does not indicate 'Success,' print an error
        else {
            $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
            $results .= "AppID for the Production environment.</h3>";
        }

        return redirect()->to('admin/products/list');

    }

    public function regions(){
        ini_set('max_execution_time', 600); //6 minutes

        $api_key = "af142d0fc8fe7e42110807cf90550224";
        // $api_key = "8c6abeaf587fd79128b443c9f6c8542b";

        $country_content = file_get_contents("http://battuta.medunes.net/api/country/all/?key=$api_key");
        $country_details = json_decode($country_content);

        $limit = 5;
        $i = 1;

        shuffle($country_details);

        foreach ($country_details as $country_detail) {

            $country_exist = Country::where('name', $country_detail->name)->get();

            if ($country_exist->count() == 0) {
                $country = Country::create([
                    'name' => $country_detail->name,
                    'code' => $country_detail->code,
                ]);
            }


            // $country = Country::create([
            //     'name' => $country_detail->name,
            //     'code' => $country_detail->code,
            // ]);
            // $country->save();

            $region_content = file_get_contents("http://battuta.medunes.net/api/region/$country_detail->code/all/?key=$api_key");
            $region_details = json_decode($region_content);

            foreach ($region_details as $region_detail) {

                $region = Region::create([
                    'region' => $region_detail->region,
                ]);

                $region->country()->associate($country);
                $region->save();

                // dd($region);
            }

            if ($i < $limit) {
                // dump($country_detail);
            }else{
                return redirect()->to('admin/countries/list');
            }


            $i++;
        }

    }


    public function emails(){
        $faker = Faker::create();


        for ($i=0; $i < 50; $i++) {
            $email = Email::create([
                'email' => $faker->email,
                'status' => rand(0,1)
            ]);
        }
        return redirect()->to('admin/subscribes/list');
    }

    public function ebayCategories(){

        $limit = 6;


        $content = simplexml_load_file("http://open.api.ebay.com/Shopping?callname=GetCategoryInfo&appid=SergheiP-ShopLara-PRD-f44838eb2-53c2fd8f&version=967&siteid=0&CategoryID=-1&IncludeSelector=ChildCategories");
        $primary_categories = json_decode(json_encode($content));

        foreach ($primary_categories->CategoryArray as $primary_category) {
            // dd($primary_category);

            $i = 0;
            foreach ($primary_category as $category) {

                if ($i>$limit) {
                    break;
                }

                $category_exist = Category::where('name', $category->CategoryName)->first();
                if ( ($category_exist === null) && ($category->CategoryID >= 0 ) ) {

                    $category = Category::create([

                        // 'name' => 'Pop Corn Dulce',
                        'name' => $category->CategoryName,
                        'category_id' => NULL,
                        'id' => $category->CategoryID,
                    ]);
                }

                $i++;

            }
        }

        return redirect()->to('admin/categories');

    }

    public function ebaySubCategories(){

        $limit = 3;

        $categories = Category::get('id');
        // var_dump($categories);

        foreach ($categories as $key) {


        // dd($key->id);

            $content = simplexml_load_file("http://open.api.ebay.com/Shopping?callname=GetCategoryInfo&appid=SergheiP-ShopLara-PRD-f44838eb2-53c2fd8f&version=967&siteid=0&CategoryID=$key->id&IncludeSelector=ChildCategories");
            $subcategories = json_decode(json_encode($content));

            // dd( $subcategories );

            if (array_key_exists('CategoryArray', $subcategories)) {
                foreach ($subcategories->CategoryArray as $subcategory) {
                    $i = 0;
                    foreach ($subcategory as $sub) {

                        if ($i>$limit) {
                            break;
                        }

                        // dd( $sub );

                        if ($sub->CategoryName) {

                        }else {
                            break;
                        }

                        $subcategory_exist = Category::where('name', $sub->CategoryName)->first();
                        if ( ($subcategory_exist === null) && ($sub->CategoryID >= 0 ) ) {

                            $subcategory = Category::create([
                                'id' => $sub->CategoryID,
                                'name' => $sub->CategoryName,
                                'category_id' => $key->id,
                            ]);

                        }
                        // dd($category);
                        $i++;
                    }

                }
            }




            // var_dump($sub);

        }
        return redirect()->to('admin/categories');


    }

    public function ebaySubSubCategories(){

        $categories = Category::where('category_id', '<>', 'NULL')->get('id');

        // dd($categories);
        foreach ($categories as $category) {

            $test_id = $category->id;

            $content = simplexml_load_file("http://open.api.ebay.com/Shopping?callname=GetCategoryInfo&appid=SergheiP-ShopLara-PRD-f44838eb2-53c2fd8f&version=967&siteid=0&CategoryID=$test_id&IncludeSelector=ChildCategories");
            $subcategories = json_decode(json_encode($content));

            //dd($subcategories);

            if (is_array($subcategories->CategoryArray->Category)) {
                foreach ($subcategories->CategoryArray->Category as $subcategory) {

                    $exist = Category::where('id', $subcategory->CategoryID)->first();
                    if ( ($exist === null) ) {

                        if ( $subcategory->CategoryLevel == "1") { // Level 1 NULL
                            $subcategory = Category::create([
                                'id' => $subcategory->CategoryID,
                                'name' => $subcategory->CategoryName,
                                'category_id' => NULL,
                            ]);

                        }else if ( $subcategory->CategoryLevel == "2") { // Level 2

                            // $exist = Category::where('id', $subcategory->CategoryID)->first();

                            if ( Category::where('name', $subcategory->CategoryName)->first() === null ) {
                                $subcategory = Category::create([
                                    'id' => $subcategory->CategoryID,
                                    'name' => $subcategory->CategoryName,
                                    'category_id' => $subcategory->CategoryParentID,
                                ]);
                            }

                        }

                        else if ( $subcategory->CategoryLevel == "3") { // Level 3

                            // $exist = Category::where('id', $subcategory->CategoryID)->first();
                            if ( (Category::where('name', $subcategory->CategoryName)->first() === null) ) {
                                $subcategory = Category::create([
                                    'id' => $subcategory->CategoryID,
                                    'name' => $subcategory->CategoryName,
                                    'category_id' => $subcategory->CategoryParentID,
                                ]);
                            }


                        }


                    }

                    // var_dump($sub);

                }
            }else{

                $subcategory = $subcategories->CategoryArray->Category;

                $exist = Category::where('id', $subcategory->CategoryID)->first();
                if ( ($exist === null) ) {

                    if ( $subcategory->CategoryLevel == "1") { // Level 1 NULL
                        $subcategory = Category::create([
                            'id' => $subcategory->CategoryID,
                            'name' => $subcategory->CategoryName,
                            'category_id' => NULL,
                        ]);

                    }else if ( $subcategory->CategoryLevel == "2") { // Level 2

                        // $exist = Category::where('id', $subcategory->CategoryID)->first();

                        if ( Category::where('name', $subcategory->CategoryName)->first() === null ) {
                            $subcategory = Category::create([
                                'id' => $subcategory->CategoryID,
                                'name' => $subcategory->CategoryName,
                                'category_id' => $subcategory->CategoryParentID,
                            ]);
                        }

                    }

                    else if ( $subcategory->CategoryLevel == "3") { // Level 3

                        // $exist = Category::where('id', $subcategory->CategoryID)->first();
                        if ( (Category::where('name', $subcategory->CategoryName)->first() === null) ) {
                            $subcategory = Category::create([
                                'id' => $subcategory->CategoryID,
                                'name' => $subcategory->CategoryName,
                                'category_id' => $subcategory->CategoryParentID,
                            ]);
                        }


                    }

                }
                // dd(count($subcategories->CategoryArray->Category));

            }
        }
        return redirect()->to('admin/categories');

    }

}

// countries and cities
// 8c6abeaf587fd79128b443c9f6c8542b
// http://battuta.medunes.net/api/country/all/?key={YOUR_API_KEY}
// http://battuta.medunes.net/api/region/{COUNTRY_CODE}/all/?key={YOUR_API_KEY}

// API Apiexpress
// https://portals.aliexpress.com/help/help_center_API.html?spm=a2g01.8078014.0.0.583c5ef1oaARRg

// API ebay
// https://developer.ebay.com/Devzone/finding/CallRef/index.html

// categories
// http://open.api.ebay.com/Shopping?callname=GetCategoryInfo&appid=SergheiP-ShopLara-PRD-f44838eb2-53c2fd8f&siteid=3&CategoryID=-1&version=729&IncludeSelector=ChildCategories
