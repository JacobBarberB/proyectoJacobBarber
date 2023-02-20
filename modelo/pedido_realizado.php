<?php 

include "../autoload.php";

use modelo\ingredientes;
use modelo\pedido;
use modelo\producto;
use modelo\calcular;
use modelo\pedidodao;

include "../config/session.php";

require_once "productos_hechos.php";

if(!isset($_SESSION['id_usuario'])){ ?>
    <script> alert("Debes registrarte antes.");</script>
    <?php
    header("Location: ../login.php");
}
$id_usuario = $_SESSION['id_usuario'];
$pedido = $_SESSION["seleccion"];
$precioFinal = calcular::calculadorPrecioTotal($_SESSION["seleccion"]);

//Insertar pedido den base de datos
$id_pedido = pedidodao::nuevoPedido($id_usuario,$precioFinal,1);

foreach ($pedido as $key => $producto_pedido) {
    $id_producto = $producto_pedido->getProducto()->getId_producto();
    $cantidad = $producto_pedido->getCantidad();
    $precio_extras = $producto_pedido->getExtrasMoney();    
    pedidodao::nuevoProductoPedido($id_pedido, $id_producto, $cantidad, $precio_extras);
    
    if(!empty($producto_pedido->getExtras())){
        $id_articulo = pedidodao::idArticulo($id_pedido, $id_producto);
        foreach($producto_pedido->getIngredSelec() as $key => $ingrediente){
            $id_ingrediente = $ingrediente['id_ingrediente'];
            $activo = $ingrediente['activo'];
            $precio_ingred = $ingrediente['precio_ingred'];            
            pedidodao::nuevoCambioProducto($id_pedido, $id_articulo['id_articulo'], $id_ingrediente, $activo, $precio_ingred);
        }
    }
}
?>