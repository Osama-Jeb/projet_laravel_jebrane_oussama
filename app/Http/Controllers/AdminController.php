<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yoeunes\Toastr\Facades\Toastr;

class AdminController extends Controller
{
    public function sendMail(Request $request)
    {
        request()->validate([
            "email" => ["required", "email"],
        ]);
        Mail::to($request->email)->send(new Newsletter());

        Toastr()->success("Successfully Subscribed to Newsletter!!", "Congrats");
        return redirect()->back();
    }
}
