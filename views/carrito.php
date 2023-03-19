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
        <div>        
          <div class="pagar_total mt-lg-3">
            <label class="text-1 fw-bold px-1 px-lg-5">Total</label>
            <label class="text-1 fw-bold ps-1 ps-lg-5"><?php if (isset($_SESSION["seleccion"])) echo number_format(calcular::calculadorPrecioTotal($_SESSION["seleccion"]), 2, ",", ""); ?> €</label>
            <input type="hidden" id="importe_pedido" value="<?= calcular::calculadorPrecioTotal($_SESSION["seleccion"]) ?>">
          </div>
          <div class="pagar_total">
            <label class="text-1 fw-bold px-1 fs-4 px-lg-5">Tus puntos:</label>
            <label class="text-1 fw-bold ps-1 fs-4 ps-lg-5"><?php if (isset($_SESSION["puntos"])) echo $misPuntos["puntos"] ?></label>
          </div>
          <div class="pagar_total">
            <label class="text-1 fw-bold px-1 fs-4 px-lg-5 me-lg-1">Usados:</label>
            <input class="text-1 fw-bold cant_propina ms-2 ms-lg-5" type="number" id="puntos" value="0" min="0" max="<?php if(isset($_SESSION["puntos"])){ echo $misPuntos["puntos"]; } else{ echo 0; } ?>" onclick="Cantidad_Puntos()">
          </div>
          <div class="pagar_total">
            <label class="text-1 fw-bold px-1 fs-4 px-lg-5">Descuento:</label>
            <label class="text-1 fw-bold ps-1 fs-4 ps-lg-5" id="descuento">0</label>
          </div>
          <div class="pagar_total">
            <label class="text-1 fw-bold px-1 fs-4 px-lg-5">Precio final:</label>
            <label class="text-1 fw-bold ps-1 fs-4" id="precio_final_puntos"><?php if (isset($_SESSION["seleccion"])) echo (calcular::calculadorPrecioTotal($_SESSION["seleccion"])); ?> €</label>
            <input type="hidden" id="importe_pedido_puntos" value="<?= calcular::calculadorPrecioTotal($_SESSION["seleccion"]) ?>">
          </div>
          <div class="pagar_boton mt-3 mt-lg-5">
            <!-- <form action=<?= base_url.'pedido/pedido_realizado'?> method="post"> -->
              <?php if($_SESSION["seleccion"] == null){ ?>
                <button type="button" class="boton btn_pagar text-2" onclick="botonSinProductos()">Pagar</button>
              <?php }else if(isset($_SESSION['nombre'])){ ?>
                  <button type="button" class="boton btn_pagar text-2" id="ButtonModal" data-toggle="modal" data-target="#myModal_propina" onclick="ButtonModal_Propina(document.getElementById('importe_pedido_puntos').value)">Pagar</button>
              <?php }else{ ?>
                <button type="button" class="boton btn_pagar text-2" onclick="botonPagar()">Pagar</button>
              <?php } ?>            
            <!-- </form> -->
            <div id="myModal_propina" class="modalContainer" tabindex="-1">
              <div class="modal-content col-xs-6">
                <form id="finalizarCompra" action=<?= base_url.'pedido/pedido_realizado'?> method="post">
                  <div>
                    <h2 id="modal-titulo" class="modal-h2 text-center text-2 size-40">¿Quieres ayudarnos con una propina?</h2>
                    <button type="button" id="ButtonClose" class="modalClose" onclick="Close_Propina()">X</button>
                  </div>                  
                  <div>                    
                    <label class="modal-propi text-3 fw-bold size-20 ms-1 ms-lg-5">Precio total de tu pedido:</label>
                    <label class="modal-propi text-3 fw-bold size-20 ms-1 ms-lg-5" id="mostrar_precio_pedido"><?php if (isset($_SESSION["seleccion"])) echo number_format(calcular::calculadorPrecioTotal($_SESSION["seleccion"]), 2, ",", ""); ?> €</label>                    
                  </div>
                  <div>
                    <label class="modal-propi text-3 fw-bold size-20 ms-1 ms-lg-5">Añade una propina del:</label>
                    <input class="text-1 fw-bold mb-3 cant_propina" type="number" id="propina" name="propina" value="3" min="1" max="100" onclick="Cantidad_Propina()">
                    <label class="modal-propi text-3 fw-bold size-20">%</label>
                  </div>
                  <div>
                    <label class="modal-propi text-3 fw-bold fs-4 ms-1 ms-lg-5">No añadir propina:</label>
                    <input type="checkbox" id="no_propina" name="no_propina" onclick="No_Propina()">
                  </div>
                  <div>
                    <label class="modal-propi text-3 fw-bold size-20 ms-1 ms-lg-5">Precio final:</label>
                    <label class="modal-propi text-3 fw-bold size-20 ms-1 ms-lg-5" id="total_propina"></label>
                    <input type="hidden" id="importe_propina" name="importe_propina">
                  </div>
                  <div>
                    <label class="modal-propi text-3 fw-bold fs-4 ms-1 ms-lg-5">Puntos que obtendrás:</label>
                    <label class="modal-propi text-3 fw-bold fs-4 ms-1 ms-lg-5" id="mostrar_puntos_ganados"></label>
                    <input type="hidden" id="puntos_usados" name="puntos_usados">                   
                    <input type="hidden" id="puntos_ganados" name="puntos_ganados">
                    <input type="hidden" id="puntos_finales" name="puntos_finales">
                  </div>                                
                  <div class="text-start">
                    <button type="button" class="boton finalizarCompra" onclick="Finalizar_Compra(<?= $misPuntos["puntos"] ?>)">Finalizar compra</button>                    
                  </div> 
                </form>                
              </div>
            </div>  
          </div>
        </div>            
      </div>      
    </section>