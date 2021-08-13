<?php

class Conexion extends PDO
{
 private  $USER = "root";
 private  $PASS = "";
 private  $DB = "ejercicio_web";
 private  $HOST = "localhost";
 private $DSN = "mysql:host=localhost;dbname=ejercicio_web;charset=utf8";
  
 public function __CONSTRUCT() {

    try{
       parent::__CONSTRUCT("mysql:host=localhost;dbname=ejercicio_web;charset=utf8", "root", "");
    }catch(PDOException $e){
       echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
       exit;
    }
 } 

    public static function getConexion(){

        return  $obj_conexion = new PDO(self::DSN, self::USER, self::PASS);

    }
}