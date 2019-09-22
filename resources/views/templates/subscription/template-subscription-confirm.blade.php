@extends('templates.base_email',['subdata'=>['data'=>$data,'title'=>"Dale click y confirma tu suscripción..!"]])
@section('content')
    <!--Body Email-->

    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px; font-family: Arial,sans-serif"><![endif]-->
    <div style="color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
        <div style="font-size: 12px; line-height: 18px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #555555;">
            <p style="font-size: 14px; line-height: 25px; text-align: left; margin: 0;">
                <span style="font-size: 17px; mso-ansi-font-size: 18px;">
                   <span>Para activar, dale click en confirmar suscripción más abajo. Si crees que esto es un error, ignora este mensaje y no te molestaremos de nuevo.</span>
                   <br>
                   <br>
                </span>
                <span style="font-size: 17px; mso-ansi-font-size: 18px;">
                   <span>Te has suscrito recientemente a las entradas de mi blog. Esto significa que recibirás cada nueva entrada por correo electrónico.</span>
                   <br>
                   <br>
                </span>
                <span style="font-size: 17px; mso-ansi-font-size: 18px;">
                   <a href="#" style="border-radius: 3px;background-color: #86919b;padding: 8px;color: #FFFFFF;text-decoration: none">Confirmar Suscripción</a>
                   <br>
                   <br>
                </span>
            </p>
        </div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->

    <!--Body Email-->
@endsection