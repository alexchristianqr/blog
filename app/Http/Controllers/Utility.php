<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 10/06/2018
 * Time: 12:28 AM
 */

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDO;

//Notificaciones
define('OK', 200);
define('CREATED', 201);
define('ACEPTED', 202);

//Redirecciones
define('NOT_MODIFIED', 304);

//Errores en el Cliente
define('UNAUTHORIZED', 401);
define('NOT_FOUND', 404);
define('REQUEST_TIMEOUT', 408);
define('PRECONDITION_FAILED', 412);

//Errores en el Servidor
define('INTERNAL_SERVER_ERROR', 500);
define('SERVICE_UNAVAILABLE', 503);

trait Utility
{

    function generateYearsRange($start_year = 'Y-m-d', $end_year = 'Y-m-d')
    {
        $years = [];
        for($year = Carbon::parse($start_year); $year->lte(Carbon::parse($end_year)); $year->addYear()){
            $years[] = $year->format('Y');
        }
        return $years;
    }

    function generateDatesRange($start_date, $end_date)
    {
        $dates = [];
        for($date = Carbon::parse($start_date); $date->lte(Carbon::parse($end_date)); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    function generateTimesRange($start_hour = '00:00:00', $end_hour = '23:00:00', $minute = 30, $range = true)
    {
        $newtimes = [];
        $times = [];
        for($time = Carbon::parse($start_hour); $time->lte(Carbon::parse($end_hour)); $time->addMinute($minute)){
            $times[] = $time->format('H:i:s');
        }
        if($range){
            foreach($times as $k => $v){
                if(isset($times[$k + 1])){
                    $newtimes[$k] = $times[$k] . ' - ' . $times[$k + 1];
                }else{
                    $newtimes[$k] = $times[$k] . ' - ' . $times[0];
                }
            }
        }else{
            $newtimes = $times;
        }
        return $newtimes;
    }

    function getMonths()
    {
        return ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    }

    //Descomentar para obtener la consulta en SQL o aplicar debug de datos
    function myDebug($dataModel,$debug_sql = false)
    {
        if($debug_sql){
            dd($dataModel->toSql(), $dataModel->getBindings());//Consulta SQL
        }else{
            dd($dataModel->get());//Data en debug
        }
    }
}