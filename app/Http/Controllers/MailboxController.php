<?php

namespace App\Http\Controllers;

use App\Models\Mailbox;
use Illuminate\Http\Request;

class MailboxController extends Controller
{
    public function index()
    {
        return view("backend.pages.mailbox");
    }

    public function store(Request $request)
    {
        request()->validate([
            "name" => ["required"],
            "email" => ["required"],
            "message" => ["required"],
            "subject" => ["required"],
        ]);

        Mailbox::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "subject" => $request->subject,
        ]);

        toastr()->success('Message successfully Sent!!', 'Congrats');

        return redirect()->back();
    }
}
