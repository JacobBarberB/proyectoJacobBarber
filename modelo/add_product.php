<?php 

session_start();

include "pedido.php";
require_once 'producto.php';
//require_once 'burger.php';
require_once 'categoria.php';
require_once 'productos_hechos.php';

$ingredientes = explode(';', trim($_POST['ingredientes'], ';'));

$pedido = new pedido();
if($_POST['tipo'] == CATEGORIA::BURGUER){
    $producto = $lista_burgers[$_POST['id']];
    //$producto = new BURGER($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['tipo']);
} elseif ($_POST['tipo'] == CATEGORIA::SANDWICHS) {
    //$producto = new SANDWICH();
    $producto = $lista_sandwiches[$_POST['id']];
} elseif ($_POST['tipo'] == CATEGORIA::MERIENDA) {
    //$producto = new MERIENDA();
    $producto = $lista_meriendas[$_POST['id']];
}

$pedido->setProducto($producto);
$pedido->setCantidad($_POST['cantidad']);
$pedido->setExtras($ingredientes);

$_SESSION['seleccion'][] = $pedido;
