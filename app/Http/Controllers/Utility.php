<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 10/06/2018
 * Time: 12:28 AM
 */

namespace App\Http\Controllers;

//Notificaciones
define('OK',200);
define('CREATED',201);
define('ACEPTED',202);

//Redirecciones
define('NOT_MODIFIED',304);

//Errores en el Cliente
define('UNAUTHORIZED',401);
define('NOT_FOUND',404);
define('REQUEST_TIMEOUT',408);
define('PRECONDITION_FAILED',412);

//Errores en el Servidor
define('INTERNAL_SERVER_ERROR',500);
define('SERVICE_UNAVAILABLE',503);

trait Utility
{

}