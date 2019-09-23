<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\ContactMe;
use App\Subscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailService
{
   private function sendMail($params_mail)
   {
      $data = $params_mail;
      Mail::send($params_mail['view'], compact('data'), function($message) use ($params_mail){
         $message->subject($params_mail['subject']);
         $message->to($params_mail['to']);
      });
      if(count(Mail::failures()) > 0){
         throw new Exception("Lo sentimos, pero no podemos procesar su solicitud. Inténtelo de nuevo o más tarde.", 412);
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
      $secret_token = Str::random(255);
      $params_mail = [
         'view' => 'templates.subscription.template-subscription-confirm',
         'to' => $request->request->get('email'),
         'subject' => 'Confirmar Suscripción',
         'token' => $secret_token,
         'fullname' => $request->request->get('fullname'),
         'message' => $request->request->get('message'),
      ];
      $validateSentMail = $this->sendMail($params_mail);
      if($validateSentMail){
         $newSubscription->date_sent = Carbon::now();
         $newSubscription->token = $secret_token;
         $newSubscription->sent = 1;
      }
      $newSubscription->save();
      return $newSubscription->token;
   }

   //Enviar correo electronico de contacto
   function sendContactMail($request)
   {
      $newContactMe = (new ContactMe())->fill($request->request->all());
      $params_mail = [
         'view' => 'templates.contactme.template-contactme',
         'to' => "acqrdeveloper@gmail.com",
         'subject' => 'Alguien te quiere contactar!',
         'fullname' => $request->request->get('fullname'),
         'message' => $request->request->get('message'),
      ];
      $validateSentMail = $this->sendMail($params_mail);
      if($validateSentMail) $newContactMe->sent = 1;
      return $newContactMe->save();
   }

   //Confirmar correo de suscripcion
   function confirmSubscription($token)
   {
      $subscription = Subscription::where('token', $token)->first();
      throw_if(is_null($subscription), new Exception("Lo sentimos, pero no podemos procesar su solicitud. Inténtelo de nuevo o más tarde.", 412));
      $subscription->confirmed = 1;
      $subscription->token = null;
      return $subscription->save();
   }
}