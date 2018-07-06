<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 10/06/2018
 * Time: 12:28 AM
 */

namespace App\Http\Controllers;

use PDO;

require base_path('App\Http\Utilities\StatusCodes.php');

trait Utility
{
  function connect()
  {
    try{
      return new PDO('mysql:host=127.0.0.1:3306;dbname=acfarma','root','');
    }catch (\PDOException $e){
      die($e->getMessage());
    }

  }

  function util_create($value){
    try{
    $pdo = $this->connect();
    $query = "insert into test (name) values(?)";
    $pdo->prepare($query)->execute([$value]);
    }catch (\Exception $e) {
    echo $e->getMessage();
    }
  }
  function util_select(){
    try{
      $pdo = $this->connect();
      $query = "select id,name from test";
      $data = $pdo->query($query)->fetchAll();
      echo json_encode($data);
    }catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  function util_edit($set,$where){
    try{
      $pdo = $this->connect();
      $query = "update test set name = ? where id = ?";
      $pdo->prepare($query)->execute([$set,$where]);
    }catch (\Exception $e) {
      echo $e->getMessage();
    }
  }


  function util_delete($where){
    try{
      $pdo = $this->connect();
      $query = "delete from test where id = ?";
      $pdo->prepare($query)->execute([$where]);
    }catch (\Exception $e) {
      echo $e->getMessage();
    }
  }
}