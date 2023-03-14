<?php
//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";
//A continuación uso la función use, para decirle al autoload que clases coger a partir de su namespace, buscándolas en modelo
use modelo\calcular;
use modelo\pedidodao;

class pedidoController{
    public function carrito(){
        //Por último incluyo las arrays de los productos
        require_once "modelo/productos_hechos.php";
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";
        // echo "<pre>";
        // print_r($_SESSION["seleccion"]);
        //Miro si hay session iniciada
        if (isset($_SESSION["seleccion"])) {
            //Miro si hay Post Add
            if (isset($_POST["Add"])) {
            //En este foreach, leo el array de session y busco en el if la posicion que sea la misma que me llega por Post 
            foreach ($_SESSION["seleccion"] as $key => $elegido) {
                if ($key == $_POST["key"]) {
                //Cojo la posición del array de session y le sumo 1 a su cantidad
                $pedidoSel = $_SESSION["seleccion"][$_POST["key"]];
                $elegido->setCantidad($pedidoSel->getCantidad() + 1);
                }
            }
            //Reactualizo la página para que al actualizar no se incremento solo
            header("location: carrito");
            //Miro si hay Post Minus
            } else if (isset($_POST["Minus"])) {
            $pedidoSel = $_SESSION["seleccion"][$_POST["key"]];
            if ($pedidoSel->getCantidad() == 1) {
                //Elimino la posicion del array al ponerse a 0
                unset($_SESSION["seleccion"][$_POST["key"]]);
                $_SESSION["seleccion"] = array_values($_SESSION["seleccion"]);
            } else if ($pedidoSel->getCantidad() > 1) {
                //Le resto una posicion a su cantidad
                $pedidoSel->setCantidad($pedidoSel->getCantidad() - 1);
                unset($_POST["key"]);
            }
            header("location: carrito");
            }
        
            //Inserto en una cookie que dura 5 minutos el precio total del pedido
            $precioFinal = CALCULAR::calculadorPrecioTotal($_SESSION["seleccion"]);
            if(isset($_COOKIE["ultimoPrecio"])){
            setcookie("ultimoPrecio", $precioFinal, time() + 300);
            }else{
            setcookie("ultimoPrecio", $precioFinal, time() + 300);
            }
        
            //Introduzco en la cookie ultimoPedido toda la array de session
            $jsonSession = json_encode($_SESSION["seleccion"]);
            setcookie("ultimoPedido", $jsonSession, 0, "/");
        
            //Introduzo en la cookie precioIngred un array de todos los precios extras para así luego poderlos leer
            $precioIngred = array();
            if (isset($_SESSION["seleccion"])) {
            foreach($_SESSION["seleccion"] as $precio){
                $precioIngred[] = $precio->getExtrasMoney();
            }
            } 
            $jsonSession = json_encode($precioIngred);
            setcookie("precioIngred", $jsonSession, 0, "/"); 
        }
        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/carrito.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function compra(){
        //Por último incluyo las arrays de los productos
        require_once "modelo/productos_hechos.php";
        include "config/session.php";
        $_SESSION["seleccion"] = [];
        //Si existe la cookie ultimoPedido la decodifico y la meto en $jsonCookie para luego leerla
        if(isset($_COOKIE["ultimoPedido"])){
            $jsonCookie = json_decode($_COOKIE["ultimoPedido"]);
        }
        
        //Si existe la cookie precioIngred la decodifico y la meto en $jsonIngred para luego leerla
        if(isset($_COOKIE["precioIngred"])){
            $jsonIngred = json_decode($_COOKIE["precioIngred"]);
        }
        /*echo "<pre>";
        print_r($jsonCookie);
        die;*/
        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/compra.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    } 
    public function pedido_realizado(){
        include "config/session.php";
        if(!isset($_SESSION['id_usuario'])){ ?>
            <script> alert("Debes registrarte antes.");</script>
            <?php
            //header('Location: login/login');
        }else{
        $id_usuario = $_SESSION['id_usuario'];
        $pedido = $_SESSION["seleccion"];
        $precioFinal = CALCULAR::calculadorPrecioTotal($_SESSION["seleccion"]);
        $importe_propina = $_POST['importe_propina'];
        if(isset($_COOKIE["propina"])){
            setcookie("propina", $importe_propina, time() + 300);
        }else{
            setcookie("propina", $importe_propina, time() + 300);
        }
        $id_pedido = PEDIDODAO::nuevoPedido($id_usuario,$precioFinal,1,$importe_propina);
        foreach ($pedido as $key => $producto_pedido) {
            $id_producto = $producto_pedido->getProducto()->getId_producto();
            $cantidad = $producto_pedido->getCantidad();
            $precio_extras = $producto_pedido->getExtrasMoney();    
            PEDIDODAO::nuevoProductoPedido($id_pedido, $id_producto, $cantidad, $precio_extras);
            
            if(!empty($producto_pedido->getExtras())){
                $id_articulo = PEDIDODAO::idArticulo($id_pedido, $id_producto);
                foreach($producto_pedido->getIngredSelec() as $key => $ingrediente){
                    $id_ingrediente = $ingrediente['id_ingrediente'];
                    $activo = $ingrediente['activo'];
                    $precio_ingred = $ingrediente['precio_ingred'];            
                    PEDIDODAO::nuevoCambioProducto($id_pedido, $id_articulo['id_articulo'], $id_ingrediente, $activo, $precio_ingred);
                }
            }
        }
        header("Location: compra");
        }
    } 

}