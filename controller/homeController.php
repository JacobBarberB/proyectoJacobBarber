<?php

class homeController{
    //El index es la pagina de la carta
    public function index(){
        include "config/session.php";
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        include "views/home.php";
        include "views/includes/footer.php";        
    }
}