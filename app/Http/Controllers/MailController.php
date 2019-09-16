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
            (new MailService())->sendSubscriptionMail($request);
            return redirect()->intended()->with('message_success', 'Tu suscripción se ha realizado con éxito');
        }catch(Exception $e){
            return redirect()->back()->withErrors(['message_failed' => ['Ocurrio un problema, intentelo en breve nuevamente']]);
        }
    }
}
