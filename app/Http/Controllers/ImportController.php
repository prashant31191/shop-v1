<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{City,Client,ContactData,Country,Currency,CurrencyRate,Phone,Price,Product};

class ImportController extends Controller
{
    public function product(){


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
}

// API Apiexpress 
// https://portals.aliexpress.com/help/help_center_API.html?spm=a2g01.8078014.0.0.583c5ef1oaARRg