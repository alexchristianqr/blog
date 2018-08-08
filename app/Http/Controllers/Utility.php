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

require base_path('App\Http\Utilities\StatusCodes.php');

trait Utility
{

    function getStrTruncate($string)
    {

        return $string;
    }

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

    function connect()
    {
        try{
            return new PDO('mysql:host=127.0.0.1:3306;dbname=acfarma', 'root', '');
        }catch(\PDOException $e){
            die($e->getMessage());
        }

    }

    function util_create($value)
    {
        try{
            $pdo = $this->connect();
            $query = "insert into test (name) values(?)";
            $pdo->prepare($query)->execute([$value]);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    function util_select()
    {
        try{
            $pdo = $this->connect();
            $query = "select * from test";
            $data = $pdo->query($query)->fetchAll(PDO::FETCH_CLASS);
            echo json_encode($data);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    function util_edit($set, $where)
    {
        try{
            $pdo = $this->connect();
            $query = "update test set name = ? where id = ?";
            $pdo->prepare($query)->execute([$set, $where]);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    function util_delete($where)
    {
        try{
            $pdo = $this->connect();
            $query = "delete from test where id = ?";
            if(is_array($where)){
                foreach($where as $v){
                    $pdo->prepare($query)->execute([$v]);
                }
            }else{
                $pdo->prepare($query)->execute([$where]);
            }
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}