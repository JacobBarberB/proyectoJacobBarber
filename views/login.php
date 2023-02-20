    <section id="seccion_login" class="containerBody">
      <div id="login" class="carta_login mx-auto">
        <div class="login_left">
          <div class="login_bienvenido">
            <label class="text-4">Bienvenido a Lou's Burger</label>
          </div>
          <div>
            <img class="unMomento" src="../assets/images/foto_chico_1.svg">
          </div>
        </div>
        <div class="login_right">
          <div class="registrar_login">
            <button class="text-1 border-0 fw-bold" type="button" name="registrar" onclick="Registrar()">Registrar</button>
            <button class="text-1 border-0 fw-bold" type="button" name="login" disabled>Login</button>
          </div>
          <form action="" method="post">
            <div class="text-center mx-auto">
              <label class="text-1 fw-bold fs-5 px-5 pt-4 pb-1">Email</label>
              <input class="text-1 fw-bold fs-5" type="text" name="email">
              <label class="text-1 fw-bold fs-5 px-5 pt-4 pb-1">Contraseña</label>
              <input class="text-1 fw-bold fs-5" type="password" name="pass">
              <?php if (isset($_GET['errorUser'])) { ?> <h1 style="color:red">Usuario o contraseña incorrecta</h1> <?php } ?>
            </div>
            <div class="text-center boton_login">            
              <button type="submit" class="boton text-2">Login</button>            
            </div>
          </form>
        </div>
      </div>
      <div id="registro" class="carta_login mx-auto" style="display: none;">
        <form id="formRegistro" action="" method="post">
          <div class="login_left">
            <div class="login_bienvenido">
              <label class="text-4 pt-5">Regístrate en Lou's Burger</label>
            </div>          
            <div class="text-center mx-auto">
              <label class="text-1 fw-bold fs-5 px-5 pt-4 color_b">Nombre</label>
              <input class="text-1 fw-bold fs-6" type="text" id="nombre2" name="nombre">
              <p id="malNombre" style="display: none;">Falta introducir el Nombre</p>
              <label class="text-1 fw-bold fs-5 px-5 pt-4 color_b">Apellido</label>
              <input class="text-1 fw-bold fs-6" type="text" id="apellido" name="apellido">
              <p id="malApe" style="display: none;">Falta introducir el Apellido</p>
              <label class="text-1 fw-bold fs-5 px-5 pt-4 color_b">Contraseña</label>
              <input class="text-1 fw-bold fs-6" type="password" id="psw" name="pass">
              <p id="malPass" style="display: none;">Falta introducir la Contraseña</p>
            </div>
            <div class="text-center mx-auto">
              <label class="text-1 fw-bold fs-5 px-5 pt-4 pb-1 color_b">Sexo</label>
              <div class="sexo">
                <img id="registro_man" class="mx-5" src="../assets/images/user_1.svg" onclick="user_1('registro')">
                <img id="registro_woman" class="mx-5" src="../assets/images/user_2.svg" style="opacity: 0.6;" onclick="user_2('registro')">
                <input type="hidden" id="registro_sexo" name="sexo" value="0">
              </div>
            </div>
          </div>
          <div class="login_right">
            <div class="registrar_login color_registro">
              <button class="text-1 border-0 fw-bold" type="button" name="registrar" disabled>Registrar</button>
              <button class="text-1 border-0 fw-bold" type="button" name="login" onclick="Login()">Login</button>              
            </div>
            <div class="text-center mx-auto">
              <label class="text-1 fw-bold fs-5 px-5 mx-5 pt-2">Email</label>
              <input class="text-1 fw-bold fs-6" type="text" id="email" name="email">
              <p id="malEmail" style="display: none;">Falta introducir el Email</p>
              <label class="text-1 fw-bold fs-5 px-5 pt-4">Dirección</label>
              <input class="text-1 fw-bold fs-6" type="text" id="direccion" name="direccion">
              <p id="malDirec" style="display: none;">Falta introducir la Dirección</p>
              <label class="text-1 fw-bold fs-5 px-5 pt-4">Teléfono</label>
              <input class="text-1 fw-bold fs-6 mb-3" type="number" id="telefono" name="telefono">
              <p id="malTel" style="display: none;">Falta introducir el Teléfono</p>
            </div>
            <div class="text-center boton_login pt-5">            
                <button id="buttonRegis" type="button" class="boton text-2" onclick="confirmarTelef(), confirmarDireccion(), confirmarEmail(), confirmarPass(), confirmarApellido(), confirmarNombre(), botonRegistrar() ">Registrar</button>            
            </div>
          </div>
        </form>
      </div>        
    </section>