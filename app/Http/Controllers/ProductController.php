<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("frontend.pages.category", compact("products"));
    }


    public function show(Product $product)
    {
        return view("frontend.partials.product_show", compact("product")); 
    }
    
}
