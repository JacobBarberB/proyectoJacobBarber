<?php
include "autoload.php";
use MODELO\BURGER;
use MODELO\SANDWICH;
use MODELO\MERIENDA;
use MODELO\PRODUCTO;
use MODELO\INGREDIENTES;
use MODELO\PEDIDO;
require_once 'modelo/productos_hechos.php';

include "config/session.php";

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
        include "views/includes/cabecera.php";
      ?>       
    </header>
    <section id="seccion-menu" class="containerBody menu_meri">
      <div class="col-12 div-menu-seccion text-2 size-37">
        <p style="text-decoration: underline;">NUESTRA CARTA</p>
        <a href="pagina_burger.php">BURGERS</a>
        <a href="pagina_sandwiches.php">SANDWICHES</a>
        <a style="text-decoration: underline;" href="pagina_meriendas.php">MERIENDAS</a>
      </div>
    </section>
    <section>
      <nav id="size-8" class="navbar navbar-expand-lg bg-color2 text-1 fw-bold size-25 h-auto text-center">
        <div class="container-xxl">
          <div class=" navbar-collapse estrellas text-4">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <img class="op" src="assets/images/star_1.png">
                <a class="op starBur px-1" href="pagina_burger.php">BURGERS</a>
                <img class="op" src="assets/images/star_1.png">               
              </li>
              <li class="nav-item">
                <img class="starNone" src="assets/images/star_1.png">
                <a class="op starSand" href="pagina_sandwiches.php">SANDWICHES</a>
                <img class="op starNone" src="assets/images/star_1.png">               
              </li>
              <li class="nav-item">
                <img class="" src="assets/images/star_1.png">
                <a class="starMeri" href="pagina_meriendas.php">MERIENDAS</a>
                <img class="" src="assets/images/star_1.png">
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    <section class="text-center">
      <div style="overflow: hidden;"><!-- class="row ms-0" -->
        <!-- row-cols-lg-2 row-cols-md-1 -->
        <?php $cont = 1;
        foreach ($lista_meriendas as $key => $lista) { ?>
          <div class=" productos marco_<?php echo $cont; ?>">
          <!-- col-12 col-md-6 mt-6 -->
            <div class="producto_foto">
              <img class="foto" src=<?= $lista->getImagen() ?>>
            </div>
            <div class="producto_texto">
              <label class="titulo text-2"><?= $lista->getNombre_producto() ?></label>
              <p class="text-3"><?= $lista->getDescripcion() ?></p>
            </div>
            <div class="producto_precio">
              <label class="precio text-5"><?= $lista->getPrecio_producto() . " €" ?></label>
            </div>
            <div class="producto_btn">
              <!-- <button class="boton btn-carta text-2">Pedir</button> -->
              <input type='hidden' name="tipo" value=<?= $lista->getId_producto(); ?>>
              <button type="button" class="boton btn-carta text-2" id="ButtonModal" data-toggle="modal" data-target="#myModal<?php echo $key; ?>" onclick="ButtonModal('<?= $lista->getNombre_producto() ?>', <?php echo $key; ?>)">Añadir</button>
              <div id="myModal<?php echo $key; ?>" class="modalContainer" tabindex="-1">
                <!-- {{ $loop->iteration }} -->
                <div class="modal-content col-xs-6">
                  <div>
                    <h2 id="modal-id<?php echo $key; ?>" style="display:none"><?= $lista->getId_producto() ?></h2>
                    <h2 id="modal-titulo<?php echo $key; ?>" class="modal-h2 text-2 size-40"><?= $lista->getNombre_producto() ?></h2>
                    <button type="button" id="ButtonClose" class="modalClose" onclick="Close(<?php echo $key; ?>)">X</button>
                  </div>
                  <label class="modal-canti text-3 fw-bold size-20">Ingredientes:</label>
                  <div>
                    <?php
                    foreach (INGREDIENTES::ALL_INGREDIENTS_MERIENDAS as $ingre_burg) { ?>
                      <label class="text-3 size-20 ps-2 pe-0 ps-lg-4 pe-lg-1"><?php echo $ingre_burg ?></label>
                      <input type="checkbox" name="ingredientes-<?php echo $key; ?>[]" <?php if ($lista->tieneIngrediente($ingre_burg)) { ?>checked<?php } ?> value="<?php echo $ingre_burg; ?>" />
                    <?php }
                    ?>
                  </div>
                  <div class="text-start">
                    <label class="modal-canti text-3 size-20">Cantidad</label>
                    <input type="number" class="modalCant text-3" id="modal-cantidad<?php echo $key; ?>" value="1">
                    <button id="ButtonAdd" class="boton modalAdd" onclick="ButtonAdd('<?php echo $key; ?>', '<?= $lista->getNombre_producto() ?>', '<?= $lista->getDescripcion() ?>', '<?= $lista->getPrecio_producto() ?>', '<?= $lista->getTipo_categoria() ?>')">Añadir</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $cont++;
        if($cont > 4){ $cont = 1; }
        } ?>
      </div>
    </section>
    <?php
      include "views/includes/footer.php";
    ?>
  </div>
</body>

<script src="assets/js/javascript.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>