<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Services\MailService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
   function sendMessage(SubscriptionRequest $request)
   {
      DB::beginTransaction();
      try{
         (new MailService())->sendSubscriptionMail($request);
         DB::commit();
         return redirect()->back()->with('message_success', "Te hemos enviado un email de confirmación a <b>" . $request->request->get('email') . "</b>");
      }catch(QueryException $e){
         DB::rollback();
         return redirect()->back()->withErrors(['message_failed' => "Lo sentimos, pero no podemos procesar su solicitud. Inténtelo de nuevo o más tarde."])->withInput($request->request->all());
      }catch(Exception $e){
         DB::rollback();
         return redirect()->back()->withErrors(['message_failed' => $e->getMessage()])->withInput($request->request->all());

      }
   }

   function confirmSubscription($token)
   {
      DB::beginTransaction();
      try{
         (new MailService())->confirmSubscription($token);
         DB::commit();
         return redirect()->route('route.home')->with('message_success', 'Tu suscripción se ha realizado con éxito');
      }catch(Exception $e){
         DB::rollback();
         return redirect()->route('route.home')->withErrors(['message_failed' => $e->getMessage()]);
      }
   }
}
