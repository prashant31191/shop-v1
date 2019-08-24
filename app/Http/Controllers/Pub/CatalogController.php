<?php

namespace App\Http\Controllers\Pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{Product,Category,Price};

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $items_per_page = $request->per_page ?? 12;
        $products = Product::orderByDesc('updated_at')->paginate($items_per_page);
        $categories = Category::where('category_id', NULL)->get();
        return view("public.catalog", compact('products', 'items_per_page', 'categories'));
    }

    public function indexPriceSort(Request $request, $sort)
    {        
        $items_per_page = $request->per_page ?? 12;

        if ($sort == "cheap") {
            $products = Product::with('cheapestPrice')->paginate($items_per_page);

        }elseif ($sort == "expensive") {
            $products = Product::with('cheapestPrice')->get()->sortByDesc('cheapestPrice.value');
        }

        dd($products);
    
        // $products = Product::with('cheapestPrice')->get()->sortByDesc('cheapestPrice.value');

        $categories = Category::where('category_id', NULL)->get();
        $all_categories = Category::pluck('id', 'name')->all();

        return view("public.catalog", compact('products', 'items_per_page', 'categories', 'all_categories'));
    } 


    public function indexDateSort(Request $request, $sort)
    {        
        $items_per_page = $request->per_page ?? 12;

        if ($sort == "fresh") {
            $products = Product::orderByDesc('updated_at')->paginate($items_per_page);
        }else {
            $products = Product::orderBy('updated_at')->paginate($items_per_page);
        }
    
        $categories = Category::where('category_id', NULL)->get();
        $all_categories = Category::pluck('id', 'name')->all();

        return view("public.catalog", compact('products', 'items_per_page', 'categories', 'all_categories'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
