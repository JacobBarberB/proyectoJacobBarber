<?php
require_once "helper.php";

if(isset($_SESSION['sexo'])){
  $sexo = $_SESSION['sexo'];
}else{
  $sexo = 2;
}
$file_name = get_class($this);

function print_active(){
  echo "active marcado";
};
?>
<nav id="size-8" class="navbar navbar-expand-lg bg-color2 text-1 fw-bold size-25">
  <div class="container-xxl">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand d-lg-none ps-5" id="logo" href=<?= base_url . "home/index"?>><img src="../assets/images/logo.svg"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php $file_name && $file_name == "homeController" ? print_active() : " " ?>" aria-current="page" href=<?= base_url."home/index"?>>Inicio</a>
        </li>
        <li class="nav-item desp-carta active <?php $file_name && ($file_name == "cartaController") ? print_active() : " " ?>">Carta
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 desplegable_carta">
            <li class="nav-item subdesplegable text-1 fw-bold size-25"><a href= <?= base_url . "carta/burger"?>>Burgers</a></li>
            <li class="nav-item subdesplegable text-1 fw-bold size-25"><a href= <?= base_url . "carta/sandwiches"?>>Sandwiches</a></li>
            <li class="nav-item subdesplegable text-1 fw-bold size-25 ult"><a href= <?= base_url . "carta/meriendas"?>>Meriendas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php $file_name && $file_name == "contactoController" ? print_active() : " " ?>" href=<?= base_url."contacto/contacto"?>>Contacto</a>
        </li>
      </ul>
    </div>
    <a class="navbar-brand d-none d-lg-block me-0" id="logo" href=<?= base_url . "home/index"?>><img src="../assets/images/logo.svg"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php $file_name && $file_name == "conocenosController" ? print_active() : " " ?>" href=<?= base_url."conocenos/conocenos"?>>Conócenos</a>
        </li>
        <?php 
        if($sexo == 0){
          if ($file_name && ($file_name == "loginController")) {  ?>
            <a href=<?= base_url . "login/login"?> class="me-3 ms-3"><img src="../assets/images/user_1_selec.svg"></a>
          <?php } else { ?>
            <a href=<?= base_url . "login/login"?> class="me-3 ms-3"><img src="../assets/images/user_1.svg"></a>
          <?php 
          } 
        }else if($sexo == 1){ 
          if ($file_name && ($file_name == "loginController")) {  ?>
            <a href=<?= base_url . "login/login"?> class="me-3 ms-3"><img src="../assets/images/user_2_selec.svg"></a>
          <?php } else { ?>
            <a href=<?= base_url . "login/login"?> class="me-3 ms-3"><img src="../assets/images/user_2.svg"></a>
          <?php 
          }
        }else{ 
          if ($file_name && ($file_name == "loginController")) {  ?>
            <a href=<?= base_url . "login/login"?> class="me-3 ms-3 pt-2"><img src="../assets/images/no_user.svg" style="width: 45px;"></a>
          <?php } else { ?>
            <a href=<?= base_url . "login/login"?> class="me-3 ms-3 pt-2"><img src="../assets/images/no_user.svg" style="width: 45px;"></a>
          <?php 
          }
        } ?>
      </ul>
      <div id="botones_tienda_escritorio" class="form-inline my-2 my-lg-0">
        <?php if ($file_name && $file_name == "pedidoController") {  ?>
          <a class="nav-link" href=<?= base_url . "pedido/carrito"?>><img class="iconos" src="../assets/images/carrito_selec.svg"></a>
        <?php } else { ?>
          <a class="nav-link" href=<?= base_url . "pedido/carrito"?>><img class="iconos" src="../assets/images/carrito_no_selec.svg"></a>
        <?php } ?>
      </div>
      <p id="count_productos"><?php if ($file_name && $file_name != "compra"){ if(count($_SESSION["seleccion"]) != 0) {echo count($_SESSION["seleccion"]); } } ?></p>
    </div>
    <div id="botones_tienda_smartphone">
      <div>
        <?php if ($file_name && $file_name == "carrito") {  ?>
          <a class="nav-link" href=<?= base_url."pedido/carrito"?>><img class="iconos" src="../assets/images/carrito_selec.svg"></a>
        <?php } else { ?>
          <a class="nav-link" href=<?= base_url."pedido/carrito"?>><img class="iconos" src="../assets/images/carrito_no_selec.svg"></a>
        <?php } ?>
      </div>
      <p><?php if ($file_name && $file_name != "compra"){ if(count($_SESSION["seleccion"]) != 0) {echo count($_SESSION["seleccion"]); } } ?></p>
    </div>
  </div>
</nav>
<div class="navbar-expand-lg nav_down"></div>
</header> 
