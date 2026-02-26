<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMail extends Mailable
{
    public $messageContent;
    public $email;

    public function __construct($email, $messageContent)
    {
        $this->messageContent = $messageContent;
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject("message")->view("emails.index", ["messageContact" => $this->messageContent, "email" => $this->email]);
    }
}