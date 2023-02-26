    <section id="datosUser">
      <div class="container_datosUser">
        <div class="botonEditar">
          <button class="boton text-2" type="button" onclick="Editar()">Editar</button>
        </div>
        <div class="nombreUser">
          <label class="text-center text-2 fw-bold fs-3"><?php echo $nombre ?></label>
        </div>
        <div class="logout">
          <button type="button" class="boton text-2 botonLogout" onclick="window.location.href='logout'">Cerrar Sesión</button>
        </div>
      </div>      
    </section>
    <section id="editarUser" style="display: none;">      
      <div class="container_editarUser">
        <form action="update" method="post">
          <div class="titulo">
            <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Introduce sólo los datos que deseas cambiar</label>
          </div>
          <div class="editarLeft">
            <label class="text-1 fw-bold fs-5 ps-5 pe-5 pt-4 pl-3 color_b">Nombre</label>
            <label class="text-1 fw-bold fs-5 ps-5 pe-4 pt-4 color_b">Apellido</label>
            <label class="text-1 fw-bold fs-5 ps-5 pe-3 pt-4 color_b">Contraseña</label>     
          </div>
          <div class="editarRight">          
            <input class="text-1 fw-bold fs-6" type="text" id="nombre" name="nombre" placeholder="<?php echo $nombre ?>">
            <input class="text-1 fw-bold fs-6" type="text" id="apellido" name="apellido" placeholder="<?php echo $apellido ?>">
            <input class="text-1 fw-bold fs-6" type="password" id="psw" name="pass">
          </div>
          <div class="text-center pt-4 sexo" style="width: 100%;">
            <img id="editar_user_man" class="mx-5" src="../assets/images/user_1.svg" onclick="user_1('editar_user')" <?php if($sexo == 1){ ?> style="opacity: 0.6;" <?php } ?>>
            <img id="editar_user_woman" class="mx-5" src="../assets/images/user_2.svg" onclick="user_2('editar_user')" <?php if($sexo == 0){ ?> style="opacity: 0.6;" <?php } ?>>
            <input type="hidden" id="editar_user_sexo" name="sexo" <?php if($sexo == 0){ ?> value="0" <?php }else{ ?> value="1" <?php } ?>>
          </div>
          <div class="editarLeft">
            <label class="text-1 fw-bold fs-5 px-5 pt-4 color_b">Email</label>
            <label class="text-1 fw-bold fs-5 ps-5 pe-4 pt-4 color_b">Dirección</label>
            <label class="text-1 fw-bold fs-5 ps-5 pe-4 pt-4 color_b">Teléfono</label>
          </div>
          <div class="editarRight">          
            <input class="text-1 fw-bold fs-6" type="text" id="email" name="email" placeholder="<?php echo $email ?>">
            <input class="text-1 fw-bold fs-6" type="text" id="direccion" name="direccion" placeholder="<?php echo $direccion ?>">
            <input class="text-1 fw-bold fs-6 mb-3" type="number" id="telefono" name="telefono" placeholder="<?php echo $telefono ?>">
          </div>        
          <div class="botonEditar">
            <button class="boton text-2" type="submit">Guardar</button>
          </div>
          <div class="logout">
            <button class="boton text-2 botonLogout" type="button" onclick="Cerrar()">Cerrar</button>
          </div>
        </form>
      </div>
    </section>
    <section id="pedidosUser">
      <div>
        <label class="text-center text-2 fw-bold fs-3 pt-4">Mis pedidos</label>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>                    
                <th class="text-center px-3">Pedido nº</th>
                <th class="text-center px-3">Importe Total</th>
                <th class="text-center px-3">Fecha de pedido</th>
                <th class="text-center px-3">Nombre del producto</th>
                <th class="text-center px-3">Precio del producto</th>
                <th class="text-center px-3">Cantidad</th>
                <th class="text-center px-3">Precio de los extras</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
          <?php foreach ($misPedidos as $pedidos) { ?>
            <tr>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['id_pedido'] ?></label></td>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['importe_total'] ?></label></td>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['fecha_pedido'] ?></label></td>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['nombre_producto'] ?></label></td>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['precio_producto'] ?></label></td>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['cantidad'] ?></label></td>
              <td class="text-center"><label class="text-2 fw-bold color_b"><?= $pedidos['precio_extras'] ?></label></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </section>