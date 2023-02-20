<?php

class conocenosController{    
    public function conocenos(){
        include "config/session.php";
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        include "views/conocenos.php";
        include "views/includes/footer.php";
    }
}