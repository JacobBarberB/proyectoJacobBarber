    <section id="datosUser">
      <div class="container_datosUser text-center">
        <div class="botonEditar">
          <button class="boton text-2" type="button" onclick="AbrirTabla('editar_usuario')">Editar</button>
        </div>
        <div class="nombreUser">
          <label class="text-center text-2 fw-bold fs-3"><?php echo $nombre ?></label>
        </div>
        <div class="logout">
          <button type="button" class="boton text-2 botonLogout" onclick="window.location.href='logout'">Cerrar Sesión</button>
        </div>
      </div>      
    </section>
    <section id="tabla_admin">
      <div class="text-center pt-lg-3">
        <div class="tablaAdminPedidos">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('listado_pedidos')">Pedidos</button>
        </div>
      </div>
      <div class="tablaAdminProductos text-center pt-lg-3">
        <label class="text-center text-2 fw-bold fs-3">Productos:</label>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('listado_producto')">Listado</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('insertar_producto')">Insertar</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('modificar_producto')">Modificar</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('eliminar_producto')">Eliminar</button>
        </div>
      </div>  
      <div class="tablaAdminIngredientes text-center pt-lg-2">
        <label class="text-center text-2 fw-bold fs-3 pt-3">Ingredientes:</label>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('listado_ingrediente')">Listado</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('insertar_ingrediente')">Insertar</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('modificar_ingrediente')">Modificar</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('eliminar_ingrediente')">Eliminar</button>
        </div>
      </div>
      <div class="tablaAdminUsuarios text-center pt-lg-2">
        <label class="text-center text-2 fw-bold fs-3 pt-3">Usuarios:</label>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('listado_usuario')">Listado</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('insertar_usuario')">Insertar</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('modificar_usuario')">Modificar</button>
        </div>
        <div class="mt-3">
          <button class="boton text-2 botonAdmin" type="button" onclick="AbrirTabla('eliminar_usuario')">Eliminar</button>
        </div>
      </div> 
    </section>    
    <section id="contenido_edicion">
      <div>
                <!-- LISTADO DE LOS PEDIDOS -->
        <div id="listado_pedidos" style="display: none;">
          <form>
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 pt-lg-4 pb-lg-2 titulo">Lista de todos los pedidos</label>
            </div>
            <div class="table-responsive mx-lg-5" style="overflow-x:auto;">
              <table class="table table-striped" style="margin-bottom: 0">
                <thead>
                  <tr>                    
                      <th class="text-center">Pedido nº</th>
                      <th class="text-center">Email usuario</th>
                      <th class="text-center">Importe total</th>
                      <th class="text-center">Fecha pedido</th>
                      <th class="text-center">Nº artículo</th>
                      <th class="text-center">Nombre producto</th>
                      <th class="text-center">Precio producto</th>
                      <th class="text-center">Cantidad</th>
                      <th class="text-center">Ingrediente elegido</th>
                      <th class="text-center ps-3">Precio extras</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($pedidos as $pedido) { ?>
                  <tr>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['id_pedido'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['email'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['importe_total'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['fecha_pedido'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['id_articulo'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['nombre_producto'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['precio_producto'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['cantidad'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['nombre_ingred'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $pedido['precio_extras'] ?></label></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
        <!-- LISTADO DE LOS PRODUCTOS -->
        <div id="listado_producto" style="display: none;">
          <form>
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 pt-lg-4 pb-lg-2 titulo">Lista de todos los productos</label>
            </div>
            <div class="table-responsive mx-lg-5" style="overflow-x:auto;">
              <table class="table table-striped" style="margin-bottom: 0">
                <thead>
                  <tr>                    
                      <th class="text-center px-3">Id</th>
                      <th class="text-center px-3">Nombre</th>
                      <th class="text-center px-3">Descripción</th>
                      <th class="text-center px-3">Precio</th>
                      <th class="text-center px-3">Imagen</th>
                      <th class="text-center px-3">Categoría</th>
                      <th class="text-center px-3"></th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($productos as $producto) { ?>
                  <tr>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $producto['id_producto'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $producto['nombre_producto'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $producto['descripcion'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $producto['precio_producto'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><img src="<?= $producto['imagen'] ?>" style="width: 100px;"></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $producto['id_categoria'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b" style="display: inline-grid; cursor: pointer;">
                      <img class="py-2 py-lg-3" src="../assets/images/editar.svg" onclick = "cambiar('<?= $producto['nombre_producto'] ?>', 'modificar')" style="width: 30px;">
                      <img class="py-2 py-lg-3" src="../assets/images/trash.svg" onclick = "cambiar('<?= $producto['nombre_producto'] ?>', 'eliminar')" style="width: 25px;">
                    </label></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
                <!-- INSERTAR UN NUEVO PRODUCTO -->
        <div id="insertar_producto" style="display: none;">
          <form id="crear_producto_form" action="crear_producto" method="POST" enctype="multipart/form-data">
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 pt-lg-4 pb-lg-2 titulo">Insertar un nuevo producto</label>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Nombre:</label>
              <input class="text-1 fw-bold fs-6" type="text" name="nombre_prod" id="produc_nombre_produc" required>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Descripción:</label>
              <input class="text-1 fw-bold fs-6 description" type="text" name="descripcion_prod" id="produc_desc_produc" required>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Precio:</label>
              <input class="text-1 fw-bold fs-6 me-5" type="number" step="any" name="precio_prod" style="width: 70px;" required>
              <label class="tablaCategoria text-1 fw-bold fs-5 pt-2 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b">Categoria:</label>
              <?php foreach ($categorias as $value) { ?>
                <label class="text-2 fw-bold fs-6 ps-4 pe-1 pt-2 color_b"><?= $value['nombre_categoria'] ?></label>
                <input type="radio" name="categoria_ingred" id="cate_ingred_<?= $value['id_categoria'] ?>" value="<?= $value['id_categoria'] ?>" onclick = "categoria('<?= $value['id_categoria'] ?>', 'crear')">
              <?php } ?>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-3 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b" for="formFile">Introduce una imagen:</label>
              <input class="text-1 fw-bold fs-6" type="file" id="imagen_prod" name="formFile">
            </div>
            <div>
              <label class="text-2 fw-bold fs-3 pt-4 pt-lg-5 pb-1 pb-lg-3 ps-1 ps-lg-5">Ingredientes para añadir:</label>
            </div>
            <div class="ps-lg-3" id="crear_ingredientes"></div>
            <div class="text-center" style="width: 100%;">
              <button class="boton botonAdmin text-2 mt-5" type="button" onclick="validarFormularioNuevoProducto()">Insertar</button>
            </div>
          </form>
        </div>
                <!-- MODIFICAR UN PRODUCTO -->
        <div id="modificar_producto" style="display: none;">
          <form id="modificar_producto_form" action="modificar_producto" method="POST" enctype="multipart/form-data">
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Modificar un producto</label>
            </div>
            <div class="pb-2">
              <label class="text-center text-1 fw-bold fs-5 ps-1 ps-lg-5 py-2 py-lg-4">Nombre del producto:</label>
              <input class="text-1 fw-bold fs-6 ms-1 me-1 me-lg-5" type="text" name="buscarProducto" id="buscarProducto">
              <button class="boton text-2 botonAdmin" type="button" onclick="BuscarProd(document.getElementById('buscarProducto').value, 'modificar')">Buscar</button>              
            </div>
            <div id="modificar_div" style="display:none;">
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Nombre:</label>
                <input class="text-1 fw-bold fs-6" type="text" name="nombre_prod" id="modificar_nombre_prod">
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Descripción:</label>
                <input class="text-1 fw-bold fs-6 description" type="text" name="descripcion_prod" id="modificar_descripcion_prod">
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Precio:</label>
                <input class="text-1 fw-bold fs-6 me-lg-5" type="number" step="any" name="precio_prod" id="modificar_precio_prod" style="width: 70px;">
                <label class="tablaCategoria text-1 fw-bold fs-5 pt-2 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b">Categoria:</label>
                <?php foreach ($categorias as $value) { ?>
                  <label class="text-2 fw-bold fs-6 ps-4 pe-1 pt-2 color_b"><?= $value['nombre_categoria'] ?></label>
                  <input type="radio" id="modificar_categoria_ingred_<?= $value['id_categoria'] ?>" name="categoria_ingred" value="<?= $value['id_categoria'] ?>" onclick = "categoria('<?= $value['id_categoria'] ?>', 'modificar')">
                <?php } ?> 
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b" for="formFile">Introduce una imagen:</label>
                <input class="text-1 fw-bold fs-6" type="file" name="formFile">
                <input type="hidden" name="imagen_prod" id="modificar_imagen_prod">
              </div>
              <div>
                <label class="text-2 fw-bold fs-3 pt-4 pt-lg-5 pb-1 pb-lg-3 ps-1 ps-lg-5">Ingredientes para añadir:</label>
              </div>
              <div class="ps-lg-3" id="modificar_ingredientes"></div>
              <div class="text-center" style="width: 100%;">
              <input type="hidden" name="id_producto" id="modificar_id_producto">
              <button class="boton botonAdmin mx-auto text-2 mt-5" id="botonModificar" type="submit">Modificar</button>
            </div>
          </div>
          </form>
        </div>
                <!-- ELIMINAR UN PRODUCTO -->
        <div id="eliminar_producto" style="display: none;">
          <form>
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Eliminar un producto</label>
            </div>
            <div class="pb-2">
              <label class="text-center text-1 fw-bold fs-5 ps-1 ps-lg-5 py-2 py-lg-4">Nombre del producto:</label>
              <input class="text-1 fw-bold fs-6 ms-1 me-1 me-lg-5" type="text" id="buscarProElim">
              <button class="boton text-2 botonAdmin" type="button" onclick="BuscarProd(document.getElementById('buscarProElim').value, 'eliminar')">Buscar</button>
            </div>
            <div id="eliminar_div" style="display:none;">
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Nombre:</label>
                <input class="text-1 fw-bold fs-6" type="text" name="nombre_prod" id="eliminar_nombre_prod" disabled>
                <input type="hidden" name="id_producto" id="eliminar_id_producto">
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Descripción:</label>
                <input class="text-1 fw-bold fs-6 description" type="text" name="descripcion_prod" id="eliminar_descripcion_prod" disabled>
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Precio:</label>
                <input class="text-1 fw-bold fs-6 me-lg-5" type="number" step="any" name="precio_prod" id="eliminar_precio_prod" style="width: 70px;" disabled>
                <label class="tablaCategoria text-1 fw-bold fs-5 pt-2 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b">Categoria:</label>
                <?php foreach ($categorias as $value) { ?>
                  <label class="text-2 fw-bold fs-6 ps-4 pe-1 pt-2 color_b"><?= $value['nombre_categoria'] ?></label>
                  <input type="radio" id="eliminar_categoria_ingred_<?= $value['id_categoria'] ?>" name="categoria_ingred" value="<?= $value['id_categoria'] ?>" onclick = "categoria('<?= $value['id_categoria'] ?>', 'eliminar')" disabled>
                <?php } ?> 
              </div>
              <div>
                <input type="hidden" name="imagen_prod" id="eliminar_imagen_prod">
              </div>
              <div>
                <label class="text-2 fw-bold fs-3 pt-4 pt-lg-5 pb-1 pb-lg-3 ps-1 ps-lg-5">Ingredientes para añadir:</label>
              </div>
              <div class="ps-lg-3" id="eliminar_ingredientes"></div>            
              <div class="text-center" style="width: 100%;">
              <button id="botonEliminar" class="boton botonAdmin mx-auto text-2 mt-5" type="button" onclick="EliminarProducto()">Eliminar</button>
            </div>
          </div>
          </form>
        </div>
                <!-- LISTADO DE LOS INGREDIENTES -->
        <div id="listado_ingrediente" style="display: none;">
          <form>
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 pt-lg-4 pb-lg-2 titulo">Lista de todos los ingredientes</label>
            </div>
            <div class="table-responsive mx-lg-5" style="overflow-x:auto;">
              <table class="table table-striped" style="margin-bottom: 0">
                <thead>
                  <tr>                    
                      <th class="text-center px-3">Id</th>
                      <th class="text-center px-3">Nombre</th>
                      <th class="text-center px-3">Precio</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($ingredientes as $ingrediente) { ?>
                  <tr>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $ingrediente['id_ingrediente'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $ingrediente['nombre_ingred'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $ingrediente['precio_ingred'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b" style="display: inline-grid; cursor: pointer;">
                      <img class="py-2 pb-lg-3" src="../assets/images/editar.svg" onclick = "cambiarIngrediente('<?= $ingrediente['nombre_ingred'] ?>', 'modificar')" style="width: 30px;">
                      <img src="../assets/images/trash.svg" onclick = "cambiarIngrediente('<?= $ingrediente['nombre_ingred'] ?>', 'eliminar')" style="width: 25px;">
                    </label></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
            <!-- INSERTAR UN INGREDIENTE -->
        <div id="insertar_ingrediente" style="display: none;">
          <form id="crear_ingrediente_form" action="crear_ingrediente" method="POST" enctype="multipart/form-data">
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 pt-lg-4 pb-lg-2 titulo">Insertar un nuevo ingrediente</label>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Nombre:</label>
              <input class="text-1 fw-bold fs-6" type="text" name="nombre_ingred" id="ingred_nombre_ingred" required>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-3 pt-lg-5 px-1 px-lg-5 color_b">Precio:</label>
              <input class="text-1 fw-bold fs-6 me-lg-5" type="number" step="any" name="precio_ingred" style="width: 70px;" required>
            </div>
            <div>
              <label class="tablaCategoria text-1 fw-bold fs-5 pt-4 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b">Categoria:</label>
              <?php foreach ($categorias as $value) { ?>
                <label class="text-2 fw-bold fs-6 ps-4 pe-1 pt-2 color_b"><?= $value['nombre_categoria'] ?></label>
                <input type="radio" name="categoria_ingred" id="ingred_cat_ingred_<?= $value['id_categoria'] ?>" value="<?= $value['id_categoria'] ?>" onclick = "categoria('<?= $value['id_categoria'] ?>', 'crear')">
              <?php } ?>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 py-4 py-lg-5 px-1 px-lg-5 color_b">Deseas que sea un ingrediente básico?</label>
              <label class = "text-1 fw-bold fs-5 ps-5 pe-5 pt-0 pb-4 py-lg-5 color_b">No</label>
              <input type="radio" name="ingredienteBasico" value="0" checked>
              <label class = "text-1 fw-bold fs-5 ps-5 pe-5 pt-0 pb-4 py-lg-5 color_b">Sí</label>
              <input type="radio" name="ingredienteBasico" value="1">
            </div>        
            <div class="text-center" style="width: 100%;">
              <button class="boton botonAdmin text-2 mt-4" type="button" onclick="validarFormularioNuevoIngrediente()">Insertar</button>
            </div>
          </form>
        </div>
            <!-- MODIFICAR UN INGREDIENTE -->
        <div id="modificar_ingrediente" style="display: none;">
          <form id="modificar_producto_form" action="modificar_ingrediente" method="POST" enctype="multipart/form-data">
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Modificar un ingrediente</label>
            </div>
            <div class="pb-2">
              <label class="text-center text-1 fw-bold fs-5 ps-1 ps-lg-5 py-2 py-lg-4">Nombre del ingrediente:</label>
              <input class="text-1 fw-bold fs-6 ms-1 me-1 me-lg-5" type="text" name="buscarIngrediente" id="buscarIngrediente">
              <button class="boton text-2 botonAdmin" type="button" onclick="BuscarIngred(document.getElementById('buscarIngrediente').value, 'modificar')">Buscar</button>              
            </div>
            <div id="modificar_div_ingred" style="display:none;">
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Nombre:</label>
                <input class="text-1 fw-bold fs-6" type="text" name="nombre_ingred" id="modificar_nombre_ingrediente">
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-3 pt-lg-5 px-1 px-lg-5 color_b">Precio:</label>
                <input class="text-1 fw-bold fs-6 me-lg-5" type="number" step="any" name="precio_ingred" id="modificar_precio_ingrediente" style="width: 70px;">
              </div>
              <div>
                <label class="tablaCategoria text-1 fw-bold fs-5 pt-4 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b">Categoria:</label>
                <?php foreach ($categorias as $value) { ?>
                  <label class="text-2 fw-bold fs-6 ps-4 pe-1 pt-2 color_b"><?= $value['nombre_categoria'] ?></label>
                  <input type="radio" id="modificar_cat_ingred_<?= $value['id_categoria'] ?>" name="categoria_ingred" value="<?= $value['id_categoria'] ?>" onclick = "categoria('<?= $value['id_categoria'] ?>', 'modificar')">
                <?php } ?> 
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 py-4 py-lg-5 px-1 px-lg-5 color_b">Deseas que sea un ingrediente básico?</label>
                <label class = "text-1 fw-bold fs-5 px-5 pt-0 pb-4 py-lg-5 color_b">No</label>
                <input type="radio" id="modificar_ingredienteBasico_no" name="ingredienteBasico" value="0">
                <label class = "text-1 fw-bold fs-5 px-5 pt-0 pb-4 py-lg-5 color_b">Sí</label>
                <input type="radio" id="modificar_ingredienteBasico_si" name="ingredienteBasico" value="1">
              </div>
              <div class="text-center" style="width: 100%;">
                <input type="hidden" name="id_ingrediente" id="modificar_id_ingrediente">
                <button class="boton botonAdmin mx-auto text-2 mt-4" id="botonModificar_ingred" type="submit">Modificar</button>
              </div>
            </div>
          </form>
        </div>
                <!-- ELIMINAR UN INGREDIENTE -->
        <div id="eliminar_ingrediente" style="display: none;">
          <form>
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Eliminar un ingrediente</label>
            </div>
            <div class="pb-2">
              <label class="text-center text-1 fw-bold fs-5 ps-1 ps-lg-5 py-2 py-lg-4">Nombre del ingrediente:</label>
              <input class="text-1 fw-bold fs-6 ms-1 me-1 me-lg-5" type="text" id="buscarIngredElim">
              <button class="boton text-2 botonAdmin" type="button" onclick="BuscarIngred(document.getElementById('buscarIngredElim').value, 'eliminar')">Buscar</button>
            </div>
            <div id="eliminar_div_ingred" style="display:none;">
              <div>
                <label class="text-1 fw-bold fs-5 pt-2 pt-lg-5 px-1 px-lg-5 color_b">Nombre:</label>
                <input class="text-1 fw-bold fs-6" type="text" name="nombre_ingred" id="eliminar_nombre_ingrediente" disabled>
                <input type="hidden" name="id_ingrediente" id="eliminar_id_ingrediente">
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 pt-3 pt-lg-5 px-1 px-lg-5 color_b">Precio:</label>
                <input class="text-1 fw-bold fs-6 me-lg-5" type="number" step="any" name="precio_ingred" id="eliminar_precio_ingrediente" style="width: 70px;" disabled>
              </div>
              <div>
                <label class="tablaCategoria text-1 fw-bold fs-5 pt-4 pt-lg-5 ps-1 ps-lg-5 pe-5 color_b">Categoria:</label>
                <?php foreach ($categorias as $value) { ?>
                  <label class="text-2 fw-bold fs-6 ps-4 pe-1 pt-2 color_b"><?= $value['nombre_categoria'] ?></label>
                  <input type="radio" id="eliminar_cat_ingred_<?= $value['id_categoria'] ?>" name="categoria_ingred" value="<?= $value['id_categoria'] ?>" onclick = "categoria('<?= $value['id_categoria'] ?>', 'eliminar')" disabled>
                <?php } ?> 
              </div>
              <div>
                <label class="text-1 fw-bold fs-5 py-4 py-lg-5 px-1 px-lg-5 color_b">Ingrediente básico:</label>
                <label class = "text-1 fw-bold fs-5 px-5 pt-0 pb-4 py-lg-5 color_b">No</label>
                <input type="radio" id="eliminar_ingredienteBasico_no" name="ingredienteBasico" value="0" disabled>
                <label class = "text-1 fw-bold fs-5 px-5 pt-0 pb-4 py-lg-5 color_b">Sí</label>
                <input type="radio" id="eliminar_ingredienteBasico_si" name="ingredienteBasico" value="1" disabled>
              </div>           
              <div class="text-center" style="width: 100%;">
                <button id="botonEliminar_ingred" class="boton botonAdmin mx-auto text-2 mt-4" type="button" onclick="EliminarIngrediente()">Eliminar</button>
              </div>
            </div>
          </form>
        </div>
                <!-- LISTADO DE LOS USUARIOS -->
        <div id="listado_usuario" style="display: none;">
          <form>
            <div>
              <label class="text-center text-2 fw-bold fs-2 py-2 pt-lg-4 pb-lg-2 titulo">Lista de todos los usuarios</label>
            </div>
            <div class="table-responsive mx-lg-5" style="overflow-x:auto;">
              <table class="table table-striped" style="margin-bottom: 0">
                <thead>
                  <tr>                    
                      <th class="text-center px-3">Id</th>
                      <th class="text-center px-3">Nombre</th>
                      <th class="text-center px-3">Apellido</th>
                      <th class="text-center px-3">Sexo</th>
                      <th class="text-center px-3">Email</th>
                      <th class="text-center px-3"></th>
                      <th class="text-center px-3">Dirección</th>
                      <th class="text-center px-3">Teléfono</th>
                      <th class="text-center px-3">Admin</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($usuarios as $usuario) { ?>
                  <tr>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $usuario['id_usuario'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $usuario['nombre'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $usuario['apellido'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?php if($usuario['sexo'] == 0){ ?> <img src="../assets/images/user_1.svg" style="width: 40px;"> <?php }else{ ?> <img src="../assets/images/user_2.svg" style="width: 40px;"> <?php } ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $usuario['email'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $usuario['direccion'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?= $usuario['telefono'] ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b"><?php if($usuario['admin'] == 1){ ?>Si<?php }else{ ?>No<?php } ?></label></td>
                    <td class="text-center align-middle"><label class="text-2 fw-bold color_b" style="display: inline-grid; cursor: pointer;">
                      <img class="py-2 py-lg-3" src="../assets/images/editar.svg" onclick = "cambiarUsuario('<?= $usuario['email'] ?>', 'modificar')" style="width: 30px;">
                      <img src="../assets/images/trash.svg" onclick = "cambiarUsuario('<?= $usuario['email'] ?>', 'eliminar')" style="width: 25px;">
                    </label></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
                  <!-- INSERTAR UN USUARIO -->
        <div id="insertar_usuario" style="display: none;">
          <form action="insertar_usuario" method="post">
            <div class="titulo">
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Insertar un usuario</label>
            </div>
            <div id="insertar_div_usuario">
              <div class="editarLeft d-inline-block">
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-5 pt-5 pl-3 color_b">Nombre</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Apellido</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-3 pt-4 color_b">Contraseña</label>     
              </div>
              <div class="editarRight d-inline-block">          
                <input class="text-1 fw-bold fs-6" type="text" id="insertar_nombre" name="nombre" required>
                <input class="text-1 fw-bold fs-6" type="text" id="insertar_apellido" name="apellido" required>
                <input class="text-1 fw-bold fs-6" type="password" id="insertar_psw" name="pass" required>
              </div>
              <div class="text-center pt-4 sexo" style="width: 100%;">
                <img id="insertar_man" class="mx-5" src="../assets/images/user_1.svg" onclick="user_1('insertar')">
                <img id="insertar_woman" class="mx-5" src="../assets/images/user_2.svg" onclick="user_2('insertar')">
                <input type="hidden" id="insertar_sexo" name="sexo" value="0">
              </div>
              <div class="editarLeft d-inline-block">
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pt-4 color_b">Email</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Dirección</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Teléfono</label>
              </div>
              <div class="editarRight d-inline-block">          
                <input class="text-1 fw-bold fs-6" type="text" id="insertar_email" name="email" required>
                <input class="text-1 fw-bold fs-6" type="text" id="insertar_direccion" name="direccion" required>
                <input class="text-1 fw-bold fs-6 mb-3" type="number" id="insertar_telefono" name="telefono" required>
              </div>
              <div class="editarLeft">
                <label class="text-1 fw-bold fs-5 ps-1 pe-4 px-lg-5 pt-3 color_b">Admin</label>
                <input type="checkbox" id="insertar_admin" name="admin">
                <!-- <input type="hidden" id="modificar_admin_enviar" name="admin" value="0"> -->
              </div>
              <div class="text-center" style="width: 100%;">
                <input type="hidden" name="id_usuario" id="insertar_id_usuario">
                <button class="boton botonAdmin mx-auto text-2 mt-5" id="botonInsertar_usuario" type="submit">Insertar</button>
              </div>
            </div>
          </form>
        </div>
                  <!-- MODIFICAR UN USUARIO -->
        <div id="modificar_usuario" style="display: none;">
          <form action="modificar_usuario" method="post">
            <div class="titulo">
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Modificar un usuario</label>
            </div>
            <div class="pb-2">
              <label class="text-center text-1 fw-bold fs-5 ps-1 ps-lg-5 py-2 py-lg-4">Email del usuario:</label>
              <input class="text-1 fw-bold fs-6 ms-1 me-1 me-lg-5" type="text" id="buscarUsuario">
              <button class="boton text-2 botonAdmin ms-3" type="button" onclick="BuscarUsuario(document.getElementById('buscarUsuario').value, 'modificar')">Buscar</button>
            </div>
            <div id="modificar_div_usuario" style="display:none;">
              <div class="editarLeft d-inline-block">
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-5 pt-4 color_b">Nombre</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Apellido</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-3 pt-4 color_b">Contraseña</label>     
              </div>
              <div class="editarRight d-inline-block">          
                <input class="text-1 fw-bold fs-6" type="text" id="modificar_nombre" name="nombre">
                <input class="text-1 fw-bold fs-6" type="text" id="modificar_apellido" name="apellido">
                <input class="text-1 fw-bold fs-6" type="password" id="modificar_psw" name="pass">
              </div>
              <div class="text-center pt-4 sexo" style="width: 100%;">
                <img id="modificar_man" class="mx-5" src="../assets/images/user_1.svg" onclick="user_1('modificar')">
                <img id="modificar_woman" class="mx-5" src="../assets/images/user_2.svg" onclick="user_2('modificar')">
                <input type="hidden" id="modificar_sexo" name="sexo">
              </div>
              <div class="editarLeft d-inline-block">
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pt-4 color_b">Email</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Dirección</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Teléfono</label>
              </div>
              <div class="editarRight d-inline-block">          
                <input class="text-1 fw-bold fs-6" type="text" id="modificar_email" name="email">
                <input class="text-1 fw-bold fs-6" type="text" id="modificar_direccion" name="direccion">
                <input class="text-1 fw-bold fs-6 mb-3" type="number" id="modificar_telefono" name="telefono">
              </div>
              <div class="editarLeft">
                <label class="text-1 fw-bold fs-5 ps-1 pe-4 px-lg-5 pt-3 color_b">Admin</label>
                <input type="checkbox" id="modificar_admin" name="admin">
                <!-- <input type="hidden" id="modificar_admin_enviar" name="admin" value="0"> -->
              </div>
              <div class="text-center" style="width: 100%;">
                <input type="hidden" name="id_usuario" id="modificar_id_usuario">
                <button class="boton botonAdmin mx-auto text-2 mt-5" id="botonModificar_usuario" type="submit">Modificar</button>
              </div>
            </div>
          </form>
        </div>
                <!-- ELIMINAR UN USUARIO -->
        <div id="eliminar_usuario" style="display: none;">
          <form>
            <div class="titulo">
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Eliminar un usuario</label>
            </div>
            <div class="pb-2">
              <label class="text-center text-1 fw-bold fs-5 ps-1 ps-lg-5 py-2 py-lg-4">Email del usuario:</label>
              <input class="text-1 fw-bold fs-6 ms-1 me-1 me-lg-5" type="text" id="buscarElimUsuario">
              <button class="boton text-2 botonAdmin ms-3" type="button" onclick="BuscarUsuario(document.getElementById('buscarElimUsuario').value, 'eliminar')">Buscar</button>
            </div>
            <div id="eliminar_div_usuario" style="display:none;">
              <div class="editarLeft d-inline-block">
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-5 pt-4 color_b">Nombre</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Apellido</label>    
              </div>
              <div class="editarRight d-inline-block">
                <input type="hidden" name="id_usuario" id="eliminar_id_usuario">         
                <input class="text-1 fw-bold fs-6" type="text" id="eliminar_nombre" name="nombre" disabled>
                <input class="text-1 fw-bold fs-6" type="text" id="eliminar_apellido" name="apellido" disabled>
                <input class="text-1 fw-bold fs-6" type="hidden" id="eliminar_psw" name="pass" disabled>
              </div>
              <div class="text-center pt-4 sexo" style="width: 100%;">
                <img id="eliminar_man" class="mx-5" src="../assets/images/user_1.svg" onclick="user_1('eliminar')" <?php if($sexo == 1){ ?> style="opacity: 0.6;" <?php } ?> disabled>
                <img id="eliminar_woman" class="mx-5" src="../assets/images/user_2.svg" onclick="user_2('eliminar')" <?php if($sexo == 0){ ?> style="opacity: 0.6;" <?php } ?> disabled>
                <input type="hidden" id="eliminar_sexo" name="sexo">
              </div>
              <div class="editarLeft d-inline-block">
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pt-4 color_b">Email</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Dirección</label>
                <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Teléfono</label>
              </div>
              <div class="editarRight d-inline-block">          
                <input class="text-1 fw-bold fs-6" type="text" id="eliminar_email" name="email" disabled>
                <input class="text-1 fw-bold fs-6" type="text" id="eliminar_direccion" name="direccion" disabled>
                <input class="text-1 fw-bold fs-6 mb-3" type="number" id="eliminar_telefono" name="telefono" disabled>
              </div>
              <div class="editarLeft">
                <label class="text-1 fw-bold fs-5 ps-1 pe-4 px-lg-5 pt-3 color_b">Admin</label>
                <input type="checkbox" id="eliminar_admin" name="admin" disabled>
                <!-- <input type="hidden" id="eliminar_admin_enviar" name="admin" value="0"> -->
              </div>
              <div class="text-center" style="width: 100%;">
                <button id="botonEliminar_usuario" class="boton botonAdmin mx-auto text-2 mt-5" type="button" onclick="EliminarUsuario()">Eliminar</button>
              </div>
            </div>
          </form>
        </div>
                <!-- EDITAR MI USUARIO -->
        <div id="editar_usuario" style="display: none;">
          <form action="update" method="post">
            <div class="titulo">
              <label class="text-center text-2 fw-bold fs-2 py-2 py-lg-4 titulo">Editar mi usuario</label>
            </div>
            <div class="editarLeft d-inline-block">
              <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-5 pt-5 color_b">Nombre</label>
              <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Apellido</label>
              <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-3 pt-4 color_b">Contraseña</label>     
            </div>
            <div class="editarRight d-inline-block">          
              <input class="text-1 fw-bold fs-6" type="text" id="editar_nombre" name="nombre" placeholder="<?php echo $nombre ?>">
              <input class="text-1 fw-bold fs-6" type="text" id="editar_apellido" name="apellido" placeholder="<?php echo $apellido ?>">
              <input class="text-1 fw-bold fs-6" type="password" id="editar_psw" name="pass">
            </div>
            <div class="text-center pt-4 sexo" style="width: 100%;">
              <img id="editar_man" class="mx-5" src="../assets/images/user_1.svg" onclick="user_1('editar')" <?php if($sexo == 1){ ?> style="opacity: 0.6;" <?php } ?>>
              <img id="editar_woman" class="mx-5" src="../assets/images/user_2.svg" onclick="user_2('editar')" <?php if($sexo == 0){ ?> style="opacity: 0.6;" <?php } ?>>
              <input type="hidden" id="editar_sexo" name="sexo" <?php if($sexo == 0){ ?> value="0" <?php }else{ ?> value="1" <?php } ?>>
            </div>
            <div class="editarLeft d-inline-block">
              <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pt-4 color_b">Email</label>
              <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Dirección</label>
              <label class="text-1 fw-bold fs-5 ps-1 ps-lg-5 pe-4 pt-4 color_b">Teléfono</label>
            </div>
            <div class="editarRight d-inline-block">          
              <input class="text-1 fw-bold fs-6" type="text" id="editar_email" name="email" placeholder="<?php echo $email ?>">
              <input class="text-1 fw-bold fs-6" type="text" id="editar_direccion" name="direccion" placeholder="<?php echo $direccion ?>">
              <input class="text-1 fw-bold fs-6 mb-3" type="number" id="editar_telefono" name="telefono" placeholder="<?php echo $telefono ?>">
            </div>
            <div class="editarLeft">
              <label class="text-1 fw-bold fs-5 ps-1 pe-4 px-lg-5 pt-3 color_b">Admin</label>
              <input type="checkbox" id="modificar_admin" name="admin" <?php if($admin == 1){ ?> checked <?php } ?>>
            </div>
            <div class="text-center" style="width: 100%;">
              <input type="hidden" name="id_usuario" id="editar_id_usuario">
              <button class="boton botonAdmin mx-auto text-2 mt-5" id="botonEditar_usuario" type="submit">Editar</button>
            </div>            
          </form>
        </div>
      </div>
    </section>