<?php
//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";
use modelo\productodao;
?>
    <section id="seccion-menu" class="containerBody menu_sand">
      <div class="col-12 div-menu-seccion text-2 size-37">
        <p style="text-decoration: underline;">NUESTRA CARTA</p>
        <a href=<?= base_url."carta/burger"?>>BURGERS</a>
        <a style="text-decoration: underline;" href=<?= base_url."carta/sandwiches"?>>SANDWICHES</a>
        <a href=<?= base_url."carta/meriendas"?>>MERIENDAS</a>
      </div>
    </section>
    <section>
      <nav id="size-8" class="navbar navbar-expand-lg bg-color2 text-1 fw-bold size-25 h-auto text-center">
        <div class="container-xxl">
          <div class=" navbar-collapse estrellas text-4">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <img class="op" src="../assets/images/star_1.svg">
                <a class="op starBur px-1" href=<?= base_url."carta/burger"?>>BURGERS</a>
                <img class="op starNone" src="../assets/images/star_1.svg">               
              </li>
              <li class="nav-item">
                <img class="" src="../assets/images/star_1.svg">
                <a class="starSand" href=<?= base_url."carta/sandwiches"?>>SANDWICHES</a>
                <img class="" src="../assets/images/star_1.svg">               
              </li>
              <li class="nav-item">
                <img class="starNone" src="../assets/images/star_1.svg">
                <a class="op starMeri" href=<?= base_url."carta/meriendas"?>>MERIENDAS</a>
                <img class="op" src="../assets/images/star_1.svg">
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    <section class="text-center">
      <div style="overflow: hidden;">
        <?php $cont = 1;
        foreach ($lista_sandwiches as $key => $lista) { ?>
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
              <input type="hidden" name="tipo" value=<?= $lista->getId_producto(); ?>>
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
                    foreach (productodao::ingredienteProducto($lista->getId_producto()) as $ingre_sand) { ?>
                      <label class="text-3 size-20 ps-2 pe-0 ps-lg-4 pe-lg-1"><?php echo $ingre_sand->getNombre_ingred() ?></label>
                      <label class="text-3 size-20 ps-0 pe-0 pe-lg-1"><?php echo $ingre_sand->getPrecio_ingred() ?>€</label>
                      <input type="checkbox" name="ingredientes-<?php echo $key; ?>[]" <?php if($ingre_sand->getNombre_ingred() == "pan_sandwich"){ ?>checked disabled<?php } elseif ($ingre_sand->getActivo() == 1) { ?>checked<?php } ?> value="<?php echo $ingre_sand->getId_ingrediente(); ?>" />
                    <?php }
                    ?>
                  </div>
                  <div class="text-start">
                    <label class="modal-canti text-3 size-20">Cantidad</label>
                    <input type="number" class="modalCant text-3" id="modal-cantidad<?php echo $key; ?>" value="1">
                    <button id="ButtonAdd" class="boton modalAdd" onclick="ButtonAdd('<?php echo $key; ?>', '<?= $lista->getId_producto(); ?>', '<?= $lista->getNombre_producto() ?>', '<?= $lista->getDescripcion() ?>', '<?= $lista->getPrecio_producto() ?>', '<?= $lista->getId_categoria() ?>')">Añadir</button>
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