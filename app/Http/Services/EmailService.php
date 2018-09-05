<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    private function sendMail($request)
    {
        try{
            Mail::send($request->view, ['data' => $request->data], function($message) use ($request){
                $message->subject($request->subject);
                $message->from($request->from);
                $message->to($request->to);
            });
            if (count(Mail::failures()) > 0) {
                throw new Exception("my exception");
            } else{
                return redirect()->route('route.blog');
            }
        }catch(Exception $e){
            return abort(404);
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
            'to' => 'aquisper@sapia.com.pe',
            'subject' => 'Subscribed Successfully',
        ]);
        return $this->sendMail($request);
//            $isSend = true;
//        }
//        return $isSend;
    }
}