@extends('templates.base_email',['subdata'=>['data'=>$data,'user'=>"Alex Christian",'title'=>"Te han contactádo en el blog responde..!"]])
@section('content')
   <!--Body Email-->

   <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px; font-family: Arial,sans-serif"><![endif]-->
   <div style="color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
      <div style="font-size: 12px; line-height: 18px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #555555;">
         <p style="font-size: 14px; line-height: 25px; text-align: left; margin: 0;">
            <span style="font-size: 17px; mso-ansi-font-size: 18px;">
                <strong style="text-transform: capitalize;">{{$data['fullname']}}</strong>
                <span>quiere contactárse contigo y te ha enviado un mensaje que dice lo siguiente:</span>
                <br>
                <br>
                <span style="mso-ansi-font-size: 18px; line-height: 25px; font: 15px 'Comic Sans MS', cursive;">&ldquo;{{$data['message']}}&rdquo;</span>
                <br>
                <br>
            </span>
         </p>
      </div>
   </div>
   <!--[if mso]></td></tr></table><![endif]-->

   <!--Body Email-->
@endsection