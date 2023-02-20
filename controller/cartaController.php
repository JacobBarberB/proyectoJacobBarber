<?php
//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";
use modelo\productodao;
class cartaController{
    //El index es la pagina de la carta
    public function burger(){
        //Por último incluyo las arrays de los productos
        require_once "modelo/productos_hechos.php";
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";
        //var_dump($_SESSION["seleccion"]);
        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/pagina_burger.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function sandwiches(){
        //Por último incluyo las arrays de los productos
        require_once "modelo/productos_hechos.php";
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";
        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/pagina_sandwiches.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function meriendas(){
        //Por último incluyo las arrays de los productos
        require_once "modelo/productos_hechos.php";
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";
        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/pagina_meriendas.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function add_product(){
        include "modelo/add_product.php";
    }
}