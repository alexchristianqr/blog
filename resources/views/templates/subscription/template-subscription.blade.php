@extends('templates.base_email',['subdata'=>['data'=>$data,'title'=>"Te has suscrito al blog con éxito..!"]])
@section('content')
    <!--Body Email-->

    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px; font-family: Arial,sans-serif"><![endif]-->
    <div style="color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
        <div style="font-size: 12px; line-height: 18px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #555555;">
            <p style="font-size: 14px; line-height: 25px; text-align: left; margin: 0;">
            <span style="font-size: 17px; mso-ansi-font-size: 18px;">
                <span>Felicidades, ya estás suscrito a mi sitio web Alex Christian (<a href="https://www.acqrdeveloper.com" target="_blank">https://www.acqrdeveloper.com</a>), recibirás un email cuando se publique una nueva entrada.</span>
                <br>
                <br>
            </span>
            </p>
        </div>
    </div>
    <!--[if mso]></td></tr></table><![endif]-->

    <!--Body Email-->
@endsection