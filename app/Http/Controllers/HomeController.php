<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $lastFourElements = $products->slice(-4);
        $shuffled = Product::all()->shuffle()->take(3);
        return view("frontend.pages.home", compact("products", "lastFourElements", "shuffled"));
    }

    public function contact()
    {
        $user = Auth::user();
        return view("frontend.pages.contact", compact("user"));
    }

    public function signin()
    {
        return view("frontend.pages.signin");
    }

    
}
