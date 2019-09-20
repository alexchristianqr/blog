<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\ContactMe;
use App\Subscription;
use Exception;
use Illuminate\Support\Facades\Mail;

class MailService
{
   private function sendMail($request)
   {
      $data = [
         'fullname' => $request->request->get('fullname'),
         'message' => $request->request->get('message')
      ];
      Mail::send($request->request->get('view'), compact('data'), function($message) use ($request){
         $message->subject($request->request->get('subject'));
         $message->to($request->request->get('to'));
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
      $dataUsers = Subscription::groupBy('email')->get();
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

   //Enviar correo electronico de suscripcion
   function sendSubscriptionMail($request)
   {
      $newSubscription = (new Subscription())->fill($request->request->all());
      $request->request->add([
         'view' => 'templates.subscription.template-subscription-confirm',
         'to' => $request->request->get('email'),
         'subject' => 'Suscripción completada!',
      ]);
      $validateSentMail = $this->sendMail($request);
      throw_if(!$validateSentMail, new Exception("Error al enviar el mensaje", 412));
      if($validateSentMail) $newSubscription->sent = 1;
      return $newSubscription->save();
   }

   //Enviar correo electronico de contacto
   function sendContactMail($request)
   {
      $newContactMe = (new ContactMe())->fill($request->request->all());
      $request->request->add([
         'view' => 'templates.contactme.template-contactme',
         'to' => "acqrdeveloper@gmail.com",
         'subject' => 'Alguien te quiere contactar!',
      ]);
      $validateSentMail = $this->sendMail($request);
      throw_if(!$validateSentMail, new Exception("Error al enviar el mensaje", 412));
      if($validateSentMail) $newContactMe->sent = 1;
      return $newContactMe->save();
   }
}