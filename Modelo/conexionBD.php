<?php

class Conexion extends PDO
{

  
 public function __CONSTRUCT() {

    try{
       parent::__CONSTRUCT("mysql:host=localhost;dbname=ejercicio_web;charset=utf8", "root", "");
    }catch(PDOException $e){
       echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
       exit;
    }
 } 

   
}