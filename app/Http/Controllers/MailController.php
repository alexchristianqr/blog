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
            return (new MailService())->sendMailSubscribe($request);
        }catch(Exception $e){
            return response()->json($e->getMessage(),PRECONDITION_FAILED);
        }
    }
}
