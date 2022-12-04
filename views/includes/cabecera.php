<?php
require_once 'helper.php';

$file_name = getFile_nav();

function print_active()
{
  echo 'active marcado';
};

?>

<nav id="size-8" class="navbar navbar-expand-lg bg-color2 text-1 fw-bold size-25">
  <div class="container-xxl">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand d-lg-none ps-5" id="logo" href="index.php"><img src="assets/images/logo.png"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php $file_name && $file_name == 'index' ? print_active() : ' ' ?>" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item desp-carta active <?php $file_name && ($file_name == 'pagina_burger' || $file_name == 'pagina_sandwiches' || $file_name == 'pagina_meriendas') ? print_active() : ' ' ?>">Carta
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 desplegable_carta">
            <li class="nav-item subdesplegable text-1 fw-bold size-25"><a href="pagina_burger.php">Burgers</a></li>
            <li class="nav-item subdesplegable text-1 fw-bold size-25"><a href="pagina_sandwiches.php">Sandwiches</a></li>
            <li class="nav-item subdesplegable text-1 fw-bold size-25 ult"><a href="pagina_meriendas.php">Meriendas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php $file_name && $file_name == 'contacto' ? print_active() : ' ' ?>" href="#">Contacto</a>
        </li>
      </ul>
    </div>
    <a class="navbar-brand d-none d-lg-block me-0" id="logo" href="index.php"><img src="assets/images/logo.png"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php $file_name && $file_name == 'promociones' ? print_active() : ' ' ?>" href="#">Promociones</a>
        </li>
        <a href="#" class="me-3 ms-3"><img src="assets/images/user_1.png" alt=""></a>
      </ul>
      <div id="botones_tienda_escritorio" class="form-inline my-2 my-lg-0">
        <?php if ($file_name && $file_name == 'carrito') {  ?>
          <a class="nav-link" href="carrito.php"><img class="iconos" src="assets/images/carrito_selec.png"></a>
        <?php } else { ?>
          <a class="nav-link" href="carrito.php"><img class="iconos" src="assets/images/carrito_no_selec.png"></a>
        <?php } ?>
      </div>
      <p id="count_productos"><?php if ($file_name && $file_name != 'compra'){ if(count($_SESSION['seleccion']) != 0) {echo count($_SESSION['seleccion']); } } ?></p>
    </div>
    <div id="botones_tienda_smartphone">
      <div>
        <?php if ($file_name && $file_name == 'carrito') {  ?>
          <a class="nav-link" href="carrito.php"><img class="iconos" src="assets/images/carrito_selec.png"></a>
        <?php } else { ?>
          <a class="nav-link" href="carrito.php"><img class="iconos" src="assets/images/carrito_no_selec.png"></a>
        <?php } ?>
      </div>
      <p><?php if ($file_name && $file_name != 'compra'){ if(count($_SESSION['seleccion']) != 0) {echo count($_SESSION['seleccion']); } } ?></p>
    </div>
  </div>
</nav>
<div class="navbar-expand-lg nav_down"></div> 
