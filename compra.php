<?php
include "config/parameters.php";
include "autoload.php";

require_once 'modelo/productos_hechos.php';

//Si existe la cookie ultimoPedido la decodifico y la meto en $jsonCookie para luego leerla
if(isset($_COOKIE['ultimoPedido'])){
  $jsonCookie = json_decode($_COOKIE['ultimoPedido']);
}

//Si existe la cookie precioIngred la decodifico y la meto en $jsonIngred para luego leerla
if(isset($_COOKIE['precioIngred'])){
  $jsonIngred = json_decode($_COOKIE['precioIngred']);
}

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
        <img class="pt-1 ps-sm-5" src="assets/images/foto_chica_compra.png">
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
      $count = 0;
      if (isset($_COOKIE['ultimoPedido'])) {
        foreach ($jsonCookie as $key => $producto) { ?>
          <div class="row listado_pedidos mx-auto mt-4 text-center">
            <!-- Utilizo la $key para leer el array de jsonCookie y así su contenido -->
            <label class="col-lg-2 col-md-4 text-1 fw-bold"><?php echo($jsonCookie[$key]->producto->nombre_producto); ?></label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold">
              <?php foreach($jsonCookie[$key]->extras as $extras){
                echo $extras->ingred . ' ';
              } ?>
            </label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold"><?php echo $jsonIngred[$key]; ?> €</label>         
            <div class="pedido_cantidad col-lg-2 col-md-4 text-1 fw-bold">
              <label class="px-lg-3"><?php echo $jsonCookie[$key]->cantidad ?></label>
            </div>
            <label class="col-lg-2 col-md-4 text-1 d-none d-lg-block fw-bold"><?php echo ($jsonCookie[$key]->producto->precio_producto + $jsonIngred[$key]); ?> €</label>
            <label class="col-lg-2 col-md-4 text-1 fw-bold pedido_total"><?php echo ($jsonCookie[$key]->cantidad * ($jsonCookie[$key]->producto->precio_producto + $jsonIngred[$key])); ?> €</label>
          </div>
      <?php }
      } ?>
      <div class="linea_pedido"></div>
    </section>
    <section>
      <div class="pagar_pedido">
        <img src="assets/images/foto_chica_envio_compra.png">
        <div class="pagar_total">
          <label class="text-1 fw-bold px-1 px-lg-5">Total: <?php if (isset($_COOKIE['ultimoPrecio'])) echo $_COOKIE['ultimoPrecio']; ?> €</label>
        </div>
        <div class="pagar_boton">
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