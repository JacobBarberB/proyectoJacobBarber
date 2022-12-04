<?php 

namespace MODELO;

session_start();

include "../autoload.php";

use MODELO\BURGER;
use MODELO\SANDWICH;
use MODELO\MERIENDA;
use MODELO\INGREDIENTES;
use MODELO\PEDIDO;
use MODELO\CATEGORIA;
use MODELO\PRODUCTO;

require_once 'productos_hechos.php';
$ingredientes = [];
if(isset($_POST['ingredientes'])){
    $ingredientes = explode(';', trim($_POST['ingredientes'], ';'));
}

$pedido = new PEDIDO();
if($_POST['tipo'] == CATEGORIA::BURGUER){
    $producto = $lista_burgers[$_POST['id']];
} elseif ($_POST['tipo'] == CATEGORIA::SANDWICHS) {    
    $producto = $lista_sandwiches[$_POST['id']];
} elseif ($_POST['tipo'] == CATEGORIA::MERIENDAS) {    
    $producto = $lista_meriendas[$_POST['id']];
}

$pedido->setProducto($producto);
$pedido->setCantidad($_POST['cantidad']);
$pedido->setExtras($ingredientes);

$_SESSION['seleccion'][] = $pedido;
