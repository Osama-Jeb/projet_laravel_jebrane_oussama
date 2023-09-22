<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::first();
        return view("backend.pages.info", compact("info"));
    }

    public function update(Request $request, Info $info)
    {

        $request->validate([
            "city" => ["required"],
            "adress" => ["required"],
            "phone" => ["required"],
            "hours" => ["required"],
            "email" => ["required", "email"],
        ]);

        $info->update([
            "city" => $request->city,
            "adress" => $request->adress,
            "phone" => $request->phone,
            "hours" => $request->hours,
            "email" => $request->email,
        ]);

        Toastr()->success("Infomation Updated Successfully!");
        return redirect()->back();
    }
}
