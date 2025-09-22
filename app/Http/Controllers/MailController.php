<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendSampleEmail()
    {
        $recipient = 'alimulrazi83@gmail.com';
        Mail::to($recipient)->send(new SampleMail());

        return "Email sent successfully!";
    }
}
