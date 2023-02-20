    <section class="containerBody">
      <div class="text-center mx-auto">
        <label class="text-4 pt-3 pt-lg-5 color_b contacto_titulo">¿Tienes algo que contarnos?</label>
      </div>
      <div class="text-center mx-auto">
        <label class="text-4 pt-1 pt-lg-2 color_b contacto_titulo">¡¡¡Dínoslo!!!</label>
      </div>
      <div class="text-center mx-auto">
        <label class="text-1 fw-bold pt-3 pt-lg-5 color_b">¿Tienes alguna duda o sugerencia sobre alguno de nuestros establecimientos, carta o promociones? Rellena el formulario porque nos importa ¡Y mucho!</label>
      </div>
      <div class="contactos">
        <div class="contacto_datos ms-2 ms-lg-5">
          <form action="enviar_mail" method="post">
            <div class="contacto_left d-inline-block ms-2 ms-lg-5">
              <label class="text-1 fw-bold fs-5 pt-4 pt-lg-5 color_b">Nombre:</label>
              <label class="text-1 fw-bold fs-5 pt-4 pt-lg-5 color_b">Apellido:</label>
              <label class="text-1 fw-bold fs-5 pt-4 pt-lg-5 color_b">Teléfono:</label>
              <label class="text-1 fw-bold fs-5 pt-4 pt-lg-5 color_b">Email:</label>
            </div>
            <div class="contacto_right d-inline-block">          
              <input class="text-1 fw-bold fs-6 mt-4 mt-lg-5 bg-color1" type="text" name="nombre" required>
              <input class="text-1 fw-bold fs-6 mt-4 mt-lg-5 bg-color1" type="text" name="apellido" required>
              <input class="text-1 fw-bold fs-6 mt-4 mt-lg-5 bg-color1" type="number" name="telefono" required>
              <input class="text-1 fw-bold fs-6 mt-4 mt-lg-5 bg-color1" type="text" name="email" required>
            </div>
            <div>
              <label class="text-1 fw-bold fs-5 pt-4 pt-lg-5 px-1 px-lg-5 color_b">Observaciones:</label>
              <textarea class="text-1 fw-bold fs-6 bg-color1 mt-3 mt-lg-5" name="observaciones" required></textarea>
            </div>
            <div class="text-center">
              <button class="boton botonContacto mx-auto text-2 mt-5" type="submit">Enviar</button>
            </div>
          </form>
        </div>
        <div class="buzon">
          <img src="../assets/images/buzon.svg">
          <div class="dark_buzon">
            <img src="../assets/images/logo_dark.svg" style="width: 120px;">
          </div>
        </div>
      </div>

      
         
    </section>    