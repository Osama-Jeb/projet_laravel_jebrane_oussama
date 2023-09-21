<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $fullproducts = Product::all();
        $products = Product::paginate(8);
        return view("frontend.pages.category", compact("products", "fullproducts"));
    }


    public function show(Product $product)
    {
        return view("frontend.partials.product_show", compact("product")); 
    }
    
}
