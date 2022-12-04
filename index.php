<?php
include "config/session.php";
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
  <title>Lou's Burger</title>
  <meta charset="UTF-8">
  <meta name="description" content="Descripció web">
  <meta name="keywords" content="Paraules clau">
  <meta name="author" content="Autor">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body class="body">
  <div id="subBody">
    <header id="cabecera">      
      <?php
        require_once 'views/includes/cabecera.php';
      ?>
    </header>
    <section id="seccion-pedir" class="containerBody">
      <div class="col-12 div-boton-seccion">
        <form action='pagina_burger.php' method='post'>
        <button type="submit" class=" boton btn-pedir text-2">Pedir ya!</button>
      </form>
      </div>
    </section>
    <section class="containerBody">
      <div class="containerOfertas text-center">
        <div class="d-inline-block py-md-5 py-3">
          <div class="foto_ofertas d-inline-block" style="background-image: url(assets/images/marco_1.png)">
            <div style="background-image: url(assets/images/burger_3.jpg)"></div>
          </div>
          <div class="d-inline-block ofertas_text">
            <h3 class="text-2 fs-1">McFly Burger</h3>
            <p class="text-3 fs-5 text-center px-3 pe-lg-4">La más querida por la family, una burger con queso cheddar, bacon crujiente, tomate, lechuga, cebolla caramelizada, pepinillo y huevo frito. </p>
          </div>
        </div>
        <div class="chicaOfertas d-inline-block pt-lg-4" style="width: 35%">
          <img src="assets/images/foto_chica_1.png">
        </div>
        <div class="d-inline-block py-md-5 py-3">
          <div class="foto_ofertas foto2 d-inline-block" style="background-image: url(assets/images/marco_2.png)">
            <div style="background-image: url(assets/images/burger_4.jpg)"></div>
          </div>
          <div class="d-inline-block ofertas_text">
            <h3 class="text-2 fs-1">Strickland Burger</h3>
            <p class="text-3 fs-5 text-center px-3 pe-lg-4">Hamburguesa de ternera con queso, lechuga, tomate y huevo frito. Premio Hellmann`s a la mejor burger de Barcelona 2016.</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div id="section_meriendas" class="pt-4 pt-lg-5">
        <div class="meriendas_titulo text-center mx-auto">
          <label class="text-6 fs-1">MERIENDAS</label>
        </div>
        <div class="row_meriendas row">
          <div class="div_subtitulo col-6 pt-4">
            <div class="meriendas_subtitulo text-center mx-auto">
              <label class="text-7 fs-2 fw-bold">MILSHAKES</label>
            </div>
            <img class="pb-3" src="assets/images/milshake.png">
          </div>
          <div class="col-6 pt-4 px-2 px-lg-4">
            <p class="text-3 fw-bold mt-lg-5 pe-2 pe-lg-4" style="color: #191651">Si hay algo que nos hace disfrutar casi tanto como una buena hamburguesa, es un buen batido. Eso sí, caseros, como todo lo que a vosotros os gusta.</p>
          </div>
        </div>
        <div class="row_meriendas row">
          <div class="col-6 px-2 px-lg-4">
            <p class="text-3 fw-bold mt-lg-5 ps-3 ps-lg-5" style="color: #191651">Si hay algo que nos hace disfrutar casi tanto como una buena hamburguesa, es un buen batido. Eso sí, caseros, como todo lo que a vosotros os gusta.</p>
          </div>
          <div class="div_subtitulo col-6 ps-1 ps-lg-5">
            <div class="meriendas_subtitulo text-center mx-auto">
              <label class="text-7 fs-2 fw-bold">SMOOTHIES</label>
            </div>
            <img class="pt-lg-2 pb-3" src="assets/images/smoothie.png">
          </div>          
        </div>
        <div class="ps-3 ps-lg-5 pt-2 pt-lg-4 pb-lg-4 d-none d-lg-block">
          <img style="width: 6rem;" src="assets/images/logo.png">
        </div>
      </div>
    </section>
    <section>
      <div class="containerOfertas text-center mx-auto">
        <div class="row text-center" style="width: 100%;">
          <label class="col-12 text-4 py-2 py-lg-4 siguenos">¡¡¡Síguenos!!!</label>
          <label class="col-12 text-5 py-2 py-lg-4 siente">SIENTE NUESTRAS BURGERS Y CUÉNTASELO AL MUNDO</label>
        </div>
        <div class="col-lg-3 col-sm-6" style="width: 100%;">
          <img class="px-lg-5 px-2 py-2 py-lg-4" src="assets/images/youtube_dibujo.png">
          <img class="px-lg-5 px-2 py-2 py-lg-4" src="assets/images/twitter_dibujo.png">
          <img class="px-lg-5 px-2 py-2 py-lg-4" src="assets/images/instagram_dibujo.png">
          <img class="px-lg-5 px-2 py-2 py-lg-4" src="assets/images/facebook_dibujo.png">
        </div>
        <div class="mx-auto">
          <label class="col-12 text-2 fs-3 py-2 py-lg-4">Disfruta, ríete, baila, enamórate y saborea la vida a tope. Comparte con todos el espíritu de los 50´s.</label>
        </div>
      </div>
    </section>

    <?php
      include "views/includes/footer.php";
    ?>
  </div>
</body>



<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>