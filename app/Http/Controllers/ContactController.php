<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Services\MailService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
   function sendMessage(ContactRequest $request)
   {
      DB::beginTransaction();
      try{
         (new MailService())->sendContactMail($request);
         DB::commit();
         return redirect()->back()->with('message_success', 'Tu mensaje ha sido enviado con éxito');
      }catch(QueryException $e){
         DB::rollback();
         return redirect()->back()->withErrors(['message_failed' => "Lo sentimos, pero no podemos procesar su solicitud. Inténtelo de nuevo o más tarde."])->withInput($request->request->all());
      }catch(Exception $e){
         DB::rollback();
         return redirect()->back()->withErrors(['message_failed' => $e->getMessage()])->withInput($request->request->all());
      }
   }
}
