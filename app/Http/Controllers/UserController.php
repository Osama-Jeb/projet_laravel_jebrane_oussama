<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("backend.pages.users", compact("users"));
    }

    public function changeRole(User $user)
    {
        if ($user->hasRole("webmaster")) {

            $user->removeRole("webmaster");
            $user->assignRole("user");
            
        } else {
            $user->removeRole("user");
            $user->assignRole("webmaster");
        }
        Toastr()->success("Role Changed Successfully");
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
