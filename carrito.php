<?php
//Incluyo los parametros para leer la ruta de la página
include "config/parameters.php";

//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";

//A continuación uso la función use, para decirle al autoload que clases coger a partir de su namespace, buscándolas en modelo
use MODELO\BURGER;
use MODELO\SANDWICH;
use MODELO\MERIENDA;
use MODELO\PRODUCTO;
use MODELO\INGREDIENTES;
use MODELO\PEDIDO;
use MODELO\CALCULAR;

//Por último incluyo las arrays de los productos
require_once 'modelo/productos_hechos.php';

//Incluyo el inicio de sesión con la vida de esta
include "config/session.php";

//Miro si hay session iniciada
if (isset($_SESSION['seleccion'])) {
  //Miro si hay Post Add
  if (isset($_POST['Add'])) {
    //En este foreach, leo el array de session y busco en el if la posicion que sea la misma que me llega por Post 
    foreach ($_SESSION['seleccion'] as $key => $elegido) {
      if ($key == $_POST['key']) {
        //Cojo la posición del array de session y le sumo 1 a su cantidad
        $pedidoSel = $_SESSION['seleccion'][$_POST['key']];
        $elegido->setCantidad($pedidoSel->getCantidad() + 1);
      }
    }
    //Reactualizo la página para que al actualizar no se incremento solo
    header('location: carrito.php');
    //Miro si hay Post Minus
  } else if (isset($_POST['Minus'])) {
    $pedidoSel = $_SESSION['seleccion'][$_POST['key']];
    if ($pedidoSel->getCantidad() == 1) {
      //Elimino la posicion del array al ponerse a 0
      unset($_SESSION['seleccion'][$_POST['key']]);
      $_SESSION['seleccion'] = array_values($_SESSION['seleccion']);
    } else if ($pedidoSel->getCantidad() > 1) {
      //Le resto una posicion a su cantidad
      $pedidoSel->setCantidad($pedidoSel->getCantidad() - 1);
      unset($_POST['key']);
    }
    header('location: carrito.php');
  }
}
//Inserto en una cookie que dura 5 minutos el precio total del pedido
$precioFinal = CALCULAR::calculadorPrecioTotal($_SESSION['seleccion']);
if(isset($_COOKIE['ultimoPrecio'])){
  setcookie("ultimoPrecio", $precioFinal, time() + 300);
}else{
  setcookie("ultimoPrecio", $precioFinal, time() + 300);
}

//Introduzco en la cookie ultimoPedido toda la array de session
$jsonSession = json_encode($_SESSION['seleccion']);
setcookie("ultimoPedido", $jsonSession, 0, '/');

//Introduzo en la cookie precioIngred un array de todos los precios extras para así luego poderlos leer
$precioIngred = array();
if (isset($_SESSION['seleccion'])) {
  foreach($_SESSION['seleccion'] as $precio){
    $precioIngred[] = $precio->getExtrasMoney();
  }
} 
$jsonSession = json_encode($precioIngred);
setcookie("precioIngred", $jsonSession, 0, '/'); 


?>
<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Lou's Burger</title>

  <meta charset="UTF-8">
  <meta name="description" content="Descripció web">
  <meta name="keywords" content="Paraules clau">
  <meta name="author" content="Autor">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body class="body">
  <div id="subBody">
    <header id="cabecera">
      <?php
        require_once 'views/includes/cabecera.php';
      ?>      
    </header>
    <section>
      <div class="pedido mx-auto mt-4">
        <div>
          <img class="pb-4" src="assets/images/star_1.png">
          <label class="text-4 px-2 px-lg-4">Tu Pedido</label>
          <img class="pb-4" src="assets/images/star_1.png">
        </div>
        <img class="pt-1 ps-sm-5" src="assets/images/foto_chica_carrito.png">
      </div>
    </section>
    <section>
      <div class="row pedido_titulo mx-auto mt-4 text-center">
        <label class="col-lg-2 col-md-4 text-1 fw-bold">Producto</label>
        <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold px-lg-5">Extras</label>
        <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold px-lg-4 ps-5">Incremento</label>
        <label class="col-lg-2 col-md-4 text-1 fw-bold px-lg-4">Cantidad</label>
        <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold ps-lg-4 pedido_precio">Precio</label>
        <label class="col-lg-2 col-md-4 text-1 fw-bold" style="padding-left: 4rem;">Total</label>
      </div>
    </section>
    <section>      
      <?php
      if (isset($_SESSION['seleccion'])) {
        foreach ($_SESSION['seleccion'] as $key => $producto) { ?>
          <div class="row listado_pedidos mx-auto mt-4 text-center">
            <label class="col-lg-2 col-md-4 text-1 fw-bold"><?= $producto->getProducto()->getNombre_producto() ?></label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold">
              <!-- Leo todos los ingredientes que contiene el producto -->
              <?php foreach ($producto->getExtras() as $ingredien) { ?>
                <?= $ingredien->ingred ?>
              <?php } ?>
            </label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold"><?= $producto->getExtrasMoney() ?> €</label>
            <div class="pedido_cantidad col-lg-2 col-md-4 text-1 fw-bold">
              <form action=<?= base_url . 'carrito.php' ?> method='post'>
                <input type='hidden' name='key' value=<?= $key ?>>
                <button class="border-0" type='submit' name="Minus"><img src="assets/images/menos.png"></button>
              </form>
              <label class="px-lg-3"><?= $producto->getCantidad() ?></label>
              <form action=<?= base_url . 'carrito.php' ?> method='post'>
                <input type='hidden' name='key' value=<?= $key ?>>
                <button class="border-0" type='submit' name="Add"><img src="assets/images/mas.png"></button>
              </form>
            </div>
            <label class="col-lg-2 col-md-4 text-1 d-none d-lg-block fw-bold"><?= $producto->getProducto()->getPrecio_producto() + $producto->getExtrasMoney() ?> €</label>
            <label class="col-lg-2 col-md-4 text-1 fw-bold pedido_total"><?= ($producto->getProducto()->getPrecio_producto() + $producto->getExtrasMoney()) * $producto->getCantidad() ?> €</label>
          </div>
        <?php }
      } ?>
      <div class="linea_pedido"></div>
    </section>
    <section>
      <div class="pagar_pedido">
        <img src="assets/images/foto_chica_envio.png">
        <div class="pagar_total">
          <label class="text-1 fw-bold px-1 px-lg-5">Total</label>
          <label class="text-1 fw-bold ps-1 ps-lg-5"><?php if (isset($_SESSION['seleccion'])) echo number_format(CALCULAR::calculadorPrecioTotal($_SESSION['seleccion']), 2, '.', ''); ?> €</label>
        </div>
        <div class="pagar_boton">
          <!-- <form action=<?= base_url . 'compra.php' ?> method='post'> -->
          <button type="button" class="boton btn_pagar text-2" onclick="window.location.href='compra.php'">Pagar</button>
          <!-- </form>   -->
        </div>            
      </div>      
    </section>
   
    <?php
      include "views/includes/footer.php";
    ?>
  </div>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>