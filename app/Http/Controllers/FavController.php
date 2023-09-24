<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\Request;

class FavController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userProducts = UserProduct::where("user_id", $user->id)->get();
        
        return view("frontend.pages.fav", compact("userProducts"));
    }
}
