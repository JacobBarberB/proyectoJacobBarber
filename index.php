<?php
include "config/parameters.php";
//include "controller/pedidoController.php";
if(isset($_GET['controller'])){
  $nombre_controlador = $_GET['controller'];
  include "controller/" . $nombre_controlador . "Controller.php";
}

//Recuperamos la petición GET del usuario
if(!isset($_GET['controller'])){
    //Si no envia nada, lo enviamos a la pagina principal
    header("location:".base_url.'home/index');
}else{
    $nombre_controller = $_GET['controller'] .'Controller';
    include_once ("controller/" . $nombre_controller . '.php');
    
    if(class_exists($nombre_controller)){
        $controlador = new $nombre_controller();

        //Miro si e pasa una accion
        if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = action_default;
        }
        $controlador->$action();
    }else{
        //Si no envia nada, lo enviamos a la pagina principal
        header("location:".base_url.'home/index');
    }

    unset($_GET['controller']);
    unset($_GET['action']);
}