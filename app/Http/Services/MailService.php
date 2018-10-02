<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\Subscribed;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private function sendMail($request)
    {
        Mail::send($request->view, $request->data, function($message) use ($request){
            $message->subject($request->subject);
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
        $isSend = false;
        $dataUsers = Subscribed::groupBy('email')->get();
        foreach($dataUsers as $user){
            $request->request->add([
                'view' => 'templates.template-subscribe',
                'data' => [],
                'to' => $user->email,
                'subject' => 'Subscription Successful',
            ]);
            if($this->sendMail($request)){
                $isSend = true;
            }else{
                $isSend = false;
                break;
            }
        }
        return $isSend;
    }

    function sendMailSubscribe($request)
    {
        $request->request->add([
            'view' => 'templates.template-subscribe',
            'data' => [],
            'to' => $request->email,
            'subject' => 'Subscription Successful',
        ]);
        return $this->sendMail($request);
    }

    function create($request)
    {
        return Subscribed::create($request->all());
    }
}