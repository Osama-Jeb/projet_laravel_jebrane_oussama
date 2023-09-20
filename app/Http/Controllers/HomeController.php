<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("frontend.pages.home");
    }

    public function category()
    {
        $products = Product::all();
        return view("frontend.pages.category", compact("products"));
    }

    public function contact()
    {
        return view("frontend.pages.contact");
    }

    public function signin()
    {
        return view("frontend.pages.signin");
    }

    public function cart()
    {
        return view("frontend.pages.cart");
    }
}
