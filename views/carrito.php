<?php
//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";
//A continuación uso la función use, para decirle al autoload que clases coger a partir de su namespace, buscándolas en modelo
use modelo\calcular;
?>
    <section>
      <div class="pedido mx-auto mt-4">
        <div>
          <img class="pb-4" src="../assets/images/star_1.svg">
          <label class="text-4 px-2 px-lg-4">Tu Pedido</label>
          <img class="pb-4" src="../assets/images/star_1.svg">
        </div>
        <img class="pt-1 ps-sm-5" src="../assets/images/foto_chica_carrito.svg">
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
      if (isset($_SESSION["seleccion"])) {
        foreach ($_SESSION["seleccion"] as $key => $producto) { ?>
          <div class="row listado_pedidos mx-auto mt-4 text-center">
            <label class="col-lg-2 col-md-4 text-1 fw-bold"><?= $producto->getProducto()->getNombre_producto() ?></label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold">
              <!-- Leo todos los ingredientes que contiene el producto -->
              <?php foreach ($producto->getExtras() as $ingredien) { ?>
                <?= $ingredien[0]->getNombre_ingred() ?>
              <?php } ?>
            </label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold"><?= $producto->getExtrasMoney() ?> €</label>
            <div class="pedido_cantidad col-lg-2 col-md-4 text-1 fw-bold">
              <form action=<?= base_url."pedido/carrito" ?> method="post">
                <input type="hidden" name="key" value=<?= $key ?>>
                <button class="border-0" type="submit" name="Minus"><img src="../assets/images/menos.svg"></button>
              </form>
              <label class="px-lg-3"><?= $producto->getCantidad() ?></label>
              <form action=<?= base_url."pedido/carrito" ?> method="post">
                <input type="hidden" name="key" value=<?= $key ?>>
                <button class="border-0" type="submit" name="Add"><img src="../assets/images/mas.svg"></button>
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
        <img src="../assets/images/foto_chica_envio.svg">
        <div class="pagar_total">
          <label class="text-1 fw-bold px-1 px-lg-5">Total</label>
          <label class="text-1 fw-bold ps-1 ps-lg-5"><?php if (isset($_SESSION["seleccion"])) echo number_format(calcular::calculadorPrecioTotal($_SESSION["seleccion"]), 2, ",", ""); ?> €</label>
        </div>
        <div class="pagar_boton">
          <form action=<?= base_url.'pedido/pedido_realizado'?> method="post">
            <?php if(isset($_SESSION['nombre'])){ ?>
              <button type="submit" class="boton btn_pagar text-2" >Pagar</button>
            <?php }else{ ?>
              <button type="button" class="boton btn_pagar text-2" onclick="botonPagar()">Pagar</button>
            <?php } ?>            
          </form>  
        </div>            
      </div>      
    </section>