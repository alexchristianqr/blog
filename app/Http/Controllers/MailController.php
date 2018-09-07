<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Services\MailService;
use Exception;

class MailController extends Controller
{
    function sendMailSubscribe(MailRequest $request)
    {
        try{
            (new MailService())->sendMailSubscribe($request);
            return redirect()->intended()->with('mail_send', 'Tu mensaje se envió con éxito');
        }catch(Exception $e){
            return redirect()->back()->withErrors(['mail_failed' => ['Tu mensaje no fue enviado']]);
        }
    }
}
