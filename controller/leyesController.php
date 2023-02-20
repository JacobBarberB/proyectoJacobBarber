<?php

class leyesController{    
    public function privacidad(){
        include "config/session.php";
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        include "views/privacidad.php";
        include "views/includes/footer.php";
    }
}