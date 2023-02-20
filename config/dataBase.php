<?php
namespace config;

use mysqli;
use exception;

class dataBase{
    public static function connect($host='localhost', $user='root', $pwd='', $db='lousburger'){
        try{
            $conexion = new mysqli($host, $user, $pwd, $db);
            if($conexion->connect_errno){
                throw new Exception('Error al conectar');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }        
        return $conexion;
    }
}

?>