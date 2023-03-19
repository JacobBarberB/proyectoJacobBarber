    <section>
      <div class="pedido mx-auto mt-4">
        <div>
          <img class="pb-4" src="../assets/images/star_1.svg">
          <label class="text-4 px-2 px-lg-4">Tu Pedido</label>
          <img class="pb-4" src="../assets/images/star_1.svg">
        </div>
        <img class="pt-1 ps-sm-5" src="../assets/images/foto_chica_compra.svg">
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
      if (isset($_COOKIE["ultimoPedido"])) {
        foreach ($jsonCookie as $key => $producto) { ?>
          <div class="row listado_pedidos mx-auto mt-4 text-center">
            <!-- Utilizo la $key para leer el array de jsonCookie y así su contenido -->
            <label class="col-lg-2 col-md-4 text-1 fw-bold"><?php echo($jsonCookie[$key]->producto->nombre_producto); ?></label>
            <label class="col-lg-2 col-md-4 d-none d-lg-block text-1 fw-bold">
              <?php foreach($jsonCookie[$key]->extras as $extras){
                echo $extras[0]->nombre_ingred . " ";
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
        <img src="../assets/images/foto_chica_envio_compra.svg">
        <div class="pagar_total">
          <label class="text-1 fw-bold px-1 px-lg-5">Importe: <?php if (isset($_COOKIE["ultimoPrecio"])) echo $_COOKIE["ultimoPrecio"]; ?> €</label>
        </div>
        <div class="pagar_total">
          <label class="text-1 fw-bold fs-4 px-1 px-lg-5">Propina: <?php if (isset($_COOKIE["propina"])) echo $_COOKIE["propina"]; ?> €</label>
        </div>
        <div class="pagar_total">
          <label class="text-1 fw-bold px-1 px-lg-5">Total: <?php if (isset($_COOKIE["ultimoPrecio"]) && isset($_COOKIE["propina"])) echo $suma_final; ?> €</label>
        </div>
      </div>
    </section>