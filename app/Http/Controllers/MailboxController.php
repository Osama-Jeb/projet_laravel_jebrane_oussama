<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use App\Models\Mailbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yoeunes\Toastr\Facades\Toastr;

class MailboxController extends Controller
{
    public function index()
    {
        $mails = Mailbox::all();
        return view("backend.pages.mailbox", compact("mails"));
    }

    public function store(Request $request)
    {
        request()->validate([
            "name" => ["required"],
            "email" => ["required"],
            "message" => ["required"],
            "subject" => ["required"],
        ]);

        $mailbox = Mailbox::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message,
            "subject" => $request->subject,
        ]);

        Toastr()->success('Message successfully Sent!!', 'Congrats');

        Mail::to("admin@admin.com")->send(new Message($mailbox));

        return redirect()->back();
    }

    public function destroy(Mailbox $mailbox)
    {
        $mailbox->delete();
        Toastr()->error("Message Deleted", "Success");
        return redirect()->back();
    }
}
