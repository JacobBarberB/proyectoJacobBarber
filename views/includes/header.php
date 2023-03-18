<!DOCTYPE html PUBLIC>
<html>
  <head>
    <title>Lou's Burger</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="burger, restaurant, sandwich, milkshake, smoothie, take away, hamburguesa, batido, bocadillo">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    <style>
      .notie-container {
        box-shadow: none;
      }
    </style>
  </head>
  <body class="body">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>   
    <div id="divEnd"></div>
  <div id="subBody">
    <header id="cabecera">
    <div>
      <div class="">
        <div id="myModal_news" class="modalContainer" tabindex="-1" style="display: none;">
          <div class="modal-content col-xs-6">            
            <div>
              <h2 id="modal-titulo" class="text-center text-2 size-40">¡¡No te pierdas nuestras súper hamburguesas!!</h2>
            </div>
            <div class="text-center">
              <img class="pb-4" src="../assets/images/super_burger.svg">
            </div>                 
            <div class="text-center">                    
              <label class="text-3 fw-bold fs-3">Te dejarán súper satisfecho</label>
              </div>                                    
            <div class="text-center">
              <button id="ButtonAdd" class="boton botonNews my-2 my-lg-5 fw-bold" onclick="ButtonNews()">Aceptar</button>                    
            </div>                           
          </div>
        </div>          
      </div>
    </div>
