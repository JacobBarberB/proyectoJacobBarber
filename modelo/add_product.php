<?php 

namespace modelo;

session_start();

//include "../autoload.php";

use modelo\ingredientes;
use modelo\pedido;
use modelo\producto;

require_once "productos_hechos.php";

$ingredientes = [];
if(isset($_POST["ingredientes"])){
    $ingredientes = explode(";", trim($_POST["ingredientes"], ";"));
}

$pedido = new pedido();
echo $_POST["tipo"];
if($_POST["tipo"] == 1){
    $producto = $lista_burgers[$_POST["id"]];
} elseif ($_POST["tipo"] == 2) {    
    $producto = $lista_sandwiches[$_POST["id"]];
} elseif ($_POST["tipo"] == 3) {    
    $producto = $lista_meriendas[$_POST["id"]];
}

$pedido->setProducto($producto);
$pedido->setCantidad($_POST["cantidad"]);
$pedido->setIngredSelec($ingredientes);
$pedido->setExtras($ingredientes);


$_SESSION["seleccion"][] = $pedido;

var_dump($_SESSION["seleccion"]);
