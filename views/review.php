    <section class="containerBody">
      <div class="text-center mx-auto">
        <label class="text-6 pt-3 pt-lg-5 color_b fs-2">¿Qué piensan nuestros clientes?</label>
      </div>
      <div class="text-center mx-auto">
        <label class="text-2 pt-3 pt-lg-5 color_b fs-3">Opiniones de todos nuestros clientes en referencia a sus pedidos.</label>
      </div>
      <div class="ms-1 ms-lg-5 mt-2 mt-lg-4">
        <label class="text-2 color_b fs-3">Ordenar por valoración:</label>
        <select name="orden" id="orden" class="text-center bg-color1 border-0 text-1 fw-bold fs-4 ms-1 ms-lg-4" >
          <option value="0">Mayor a menor</option>
          <option value="1">Menor a mayor</option>
        </select>
      </div>
      <div class="mt-1 mt-lg-4" id="mostrarReviews">
        <!-- Introducir las reseñas de los clientes -->
      </div>
      <div>
        <div class="ms-1 ms-lg-5 my-2 my-lg-4">
          <label class="text-2 color_b fs-3 py-3 py-lg-5 me-2 me-lg-5">Añade tu propio comentario:</label>
          <?php if(isset($_SESSION['nombre'])){ ?>
            <button type="button" class="boton boton_review text-2 ms-2 ms-lg-5" id="ButtonModal" data-toggle="modal" data-target="#myModal_review" onclick="ButtonModal_Review('<?= $_SESSION['id_usuario'] ?>')">Reseña</button>
          <?php }else{ ?>
            <button id="ButtonAdd" class="boton boton_review text-2 ms-2 ms-lg-5" onclick="botonPagar()">Reseña</button>
          <?php } ?>
          <div id="myModal_review" class="modalContainer" tabindex="-1">
            <div class="modal-content col-xs-6">
              <form>
                <div>
                  <h2 id="modal-titulo" class="modal-h2 text-center text-2 size-40">Reseña</h2>
                  <button type="button" id="ButtonClose" class="modalClose" onclick="Close_Review()">X</button>
                </div>                  
                <div>                    
                  <label class="modal-canti text-3 fw-bold size-20 ms-1 ms-lg-5">Pedido:</label>
                  <select name="select_pedido" id="select_pedido" class="text-center bg-color1 text-1 fw-bold select_pedido"></select>
                </div>
                <div>
                  <label class="modal-canti text-3 fw-bold size-20 d-inline-block ms-1 ms-lg-5">Evaluación:</label>
                  <p class="clasifi size-50 d-inline-block ms-lg-5">
                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                    --><label for="radio1">★</label><!--
                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                    --><label for="radio2">★</label><!--
                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                    --><label for="radio3">★</label><!--
                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                    --><label for="radio4">★</label><!--
                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                    --><label for="radio5">★</label>
                  </p>
                </div>
                <div>
                  <label class="modal-canti text-3 fw-bold size-20 ms-1 ms-lg-5">Email:</label>
                  <input class="text-1 fw-bold border-0 fs-4 mt-2 mt-lg-3 bg-color1" type="text" id="email" name="email" value="<?= $_SESSION['email'] ?>" disabled>
                  <input type="hidden" id="id_usuario" value="<?= $_SESSION['id_usuario'] ?>">
                </div>
                <div>
                  <label class="modal-canti text-3 fw-bold size-20 ms-1 ms-lg-5">Comentario:</label>
                  <textarea class="text-1 fw-bold border-0 fs-4 bg-color1 mt-3 mt-lg-5" id="comentario" name="comentario" required></textarea>
                </div>                                    
                <div class="text-start">
                  <button id="ButtonAdd" class="boton modalAdd" onclick="ButtonReview()">Enviar</button>                    
                </div> 
              </form>                
            </div>
          </div>          
        </div>
      </div>
      
      
      <div class="text-center mx-auto">
        <label class="text-1 fw-bold fs-6 text-center color_b mx-2 mx-lg-5 mb-lg-5">La comida popular americana se saborea de verdad en un vagón bajo la luz de los neones al ritmo de canciones Rockabillies pinchadas en una jukebox original. Así se hacía en los 50’s y así lo hacemos en Lou's Burger. Disfruta de lo auténtico y siente la diferencia con cada detalle: la decoración, el mobiliario, el vestuario, la música y, sobre todo, el sabor.</label>
      </div>     
    </section>    