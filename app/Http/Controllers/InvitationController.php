<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function send(Request $request)
    {
        $token = Str::random(32);

        $validate = [
            "colocation_id" => Auth::user()->ownColocation->id,
            "email" => $request->email, 
            "token" => $token,
            "status" => "pending",
        ];

        $invitation = Invitation::create($validate);

        Mail::to('ntaola06@gmail.com')->send(
            new ContactMail(
                $request->email,
                "You have just been Sent An invite to " . Auth::user()->ownColocation->name . "To accept it go to http://127.0.0.1:8000/invite/accept/" . $token . "/" . $invitation->id,
            )
        );

        return redirect()->route("dashboard");    
    }

    public function accept($token, Invitation $invitation){
        if ($token === $invitation->token && User::where("email", $invitation->email)->exists()) {
            $validate["status"] = "accepted";
            $invitation->update($validate);
            $colocation = $invitation->colocation->id;
            return redirect()->route('adhesion.store', $colocation);
        }else{
            return view("auth.register");
        }
    }

    function join(Request $request){
        if (Invitation::where("token", $request->token)->exists()) {
            $query = Invitation::query();
            $invitation = $query->where("token", $request->token)->first();
            $validate = ["status" => "accepted"];
            $invitation->update($validate);
            $colocation = $invitation->colocation->id;
        }

        return redirect()->route('adhesion.store', $colocation);
    }
}