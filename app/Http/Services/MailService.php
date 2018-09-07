<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private function sendMail($request)
    {
        Mail::send($request->view, $request->data, function($message) use ($request){
            $message->subject($request->subject);
            $message->from($request->from);
            $message->to($request->to);
        });
        if(count(Mail::failures()) > 0){
            return false;
        }else{
            return true;
        }
    }

    function mailByUser($request)
    {
//        $isSend = false;
//        $Users = (new UserService())->getUsers($request);
//        foreach($Users as $user){
        $request->request->add([
            'view' => 'templates.template-subscribe',
            'data' => 'Hello Alex Christian!',
            'from' => 'new.lex16@gmail.com',
            'to' => 'aquispe.developer@gmail.com',
            'subject' => 'Subscribed Successfully',
        ]);
        return $this->sendMail($request);
//            $isSend = true;
//        }
//        return $isSend;
    }

    function sendMailSubscribe($request)
    {
        $request->request->add([
            'view' => 'templates.template-subscribe',
            'data' => [],
            'from' => 'new.lex16@gmail.com',
            'to' => $request->email,
            'subject' => 'Alex Christian | Subscribed Successfully',
        ]);
        return $this->sendMail($request);
    }
}