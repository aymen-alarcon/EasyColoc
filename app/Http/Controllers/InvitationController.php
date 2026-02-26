<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function send(Request $request)
    {
        $token = Str::random(32);
        Mail::to('ntaola06@gmail.com')->send(
            new ContactMail(
                $request->email,
                $request->message,
                $token,
            )
        );

        $validate = [
            "colocation_id" => Auth::user()->ownColocation->id,
            "email" => $request->email, 
            "token" => $token,
            "status" => "pending",
        ];

        Invitation::create($validate);

        return redirect()->route("dashboard");    
    }
}