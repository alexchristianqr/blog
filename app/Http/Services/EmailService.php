<?php
/**
 * Created by PhpStorm.
 * Email: aquispe.developer@gmail.com
 */

namespace App\Http\Services;


use Illuminate\Support\Facades\Mail;

class EmailService
{
  private function sendMail($request)
  {
    return Mail::to($request->to_email)->queue($request->content_mail);
  }

  function mailByUser($request)
  {
    $isSend = false;
    $template = 'my template message';
    $Users = (new UserService())->getUsers($request);
    foreach ($Users as $user) {
      $request->request->add(['to_email' => $user->email, 'content_mail' => $template]);
      $this->sendMail($request);
      $isSend = true;
    }
    return $isSend;
  }
}