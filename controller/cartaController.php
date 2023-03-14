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
    public function mostrar_productos(){
        //$categoria = json_decode($_POST["categoria"]);
        $categoria = $_POST["categoria"];
        $lista_productos = productodao::productosCategoria($categoria);
        echo json_encode($lista_productos, JSON_UNESCAPED_UNICODE);
        return; 
    }
    public function mostrar_ingredientes(){
        //$categoria = json_decode($_POST["categoria"]);
        $producto = $_POST["producto"];
        $lista_ingredientes = productodao::ingredienteProducto($producto);
        echo json_encode($lista_ingredientes, JSON_UNESCAPED_UNICODE);
        return; 
    }
}