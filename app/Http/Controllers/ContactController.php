<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return inertia('Contact');
    }
    public function store(Request $request)
    {
        $user = [
            'fullName' => $request->fullName,
            'object' => $request->object,
            'message' => $request->message,
            'email' => $request->email,
        ];


        Mail::to('richo2002.44@gmail.com')->send(new ContactMail($user));
        return inertia('Contact', [
            'msg' => 'Mail envoyé avec succès'
        ]);
    }
}
