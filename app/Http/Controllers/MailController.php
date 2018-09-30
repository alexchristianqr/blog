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
            return redirect()->intended()->with('message_success', 'Your message was sent successfully');
        }catch(Exception $e){
            return redirect()->back()->withErrors(['message_failed' => ['Your message failed to send']]);
        }
    }
}
