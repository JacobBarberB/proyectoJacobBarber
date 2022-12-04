<?php

if (!isset($_SESSION['seleccion'])) {
  $_SESSION['seleccion'] = array();
}
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
    <section id="privacidad">
      <div class="py-3 py-lg-5">
        <h1 class="text-4 text-center">Política de privacidad</h1>
      </div>
      <div class="text-1 fw-bold fs-6 text-center mx-2 mx-lg-5 mb-lg-5">
        <p>OBJETO Y ACEPTACIÓN</p>
        <p>La presente Política de Privacidad regula el uso del sitio web www.lou'sburger.com (en adelante, LA WEB), del que es titular WONDERFOOD BRANDS CORPORATION SL (en adelante, EL PROPIETARIO DE LA WEB). De acuerdo con lo establecido en el Reglamento (UE) 2016/679 de 27 de abril General de Protección de Datos (RGPD) y demás normativa aplicable le informamos de lo siguiente:
        </p>
        <p>IDENTIFICACIÓN DE LA EMPRESA</p>
        <p>BEER&FOOD, S.A.</p>
        <p>Inscrita en el Registro Mercantil de Madrid, al Tomo 7.863, Folio 15, Hoja nº M-127.083, Inscripción 1ª. C.I.F. nº A-80828841</p>
        <p>Domicilio Social en Molins de rei, Barcelona, calle Ntra. Sra. de Lourdes, nº 34, C.P. 08750</p>
        <p>Teléfono 936683762</p>
        <p>Fax: 936683762</p>
        <p>Sociedades pertenecientes al grupo BEER&FOOD, S.A.: </p>
        <p>CASUAL BEER AND FOOD, S.A.U. (Marcas comerciales: Carl's Junior, La Chelinda, Official Irish Pub, Gambrinus, Cervecería Cruz Blanca).
        DALLAS RIB'S S.A.U. (Marca comercial Tonny Roma's).
        WONDERFOOD BRANDS CORPORATION SL (Marca comercial Lou's Burger).</p>
        <p>ACEPTACIÓN DE LAS BASES</p>
        <p>
        Beer&Food, S.A. garantiza la confidencialidad de los datos personales de los usuarios de sus páginas web. Los datos proporcionados a través de distintos formularios serán incorporados a una base de datos gestionada bajo la responsabilidad de Beer&Food, S.A., creada para facilitar la gestión, administración, prestación, ampliación y mejora de los servicios ofrecidos a través de las páginas web de Beer&Food, S.A., así como para informar a los usuarios sobre productos y servicios de Beer&Food, S.A. o de terceros con los que Beer&Food, S.A. haya suscrito contratos de prestación de servicios a través de sus páginas. 
        </p>
        <p>
        Las acciones que se realicen a través de correo electrónico incluirán un medio sencillo y gratuito para dar de baja la dirección de correo electrónico de nuestras listas de distribución. 
        Plazos de conservación de la información: Los datos identificativos de participantes se conservarán durante los plazos legales que, en su caso, le sean de aplicación. Los datos utilizados para envío de información se mantendrán de manera indefinida, salvo que el usuario solicite su baja. 
        Base jurídica del tratamiento: la legitimación para el tratamiento de datos es el consentimiento otorgado por el participante con la expresa aceptación de las presentes bases. No obstante, en caso de retirar su consentimiento, ello no afectará a la licitud de los tratamientos efectuados con anterioridad. 
        No comunicamos datos a terceros aunque fruto de su solicitud tanto de información como de empleo es posible que tengamos que comunicar sus datos a uno de nuestros franquiciados para las mismas finalidades.
        También podrán ser destinatarios las Administraciones públicas para el estricto cumplimiento de nuestras obligaciones legales. 
        Derechos del Participante:  Los interesados pueden ejercitar sus derechos de acceso, rectificación, supresión, portabilidad y la limitación u oposición de los datos en los casos y con el alcance que establece el RGPD UE 2016/679.  Así mismo, también tiene derecho a retirar el consentimiento en cualquier momento. Estos derechos pueden ser ejercitados dirigiéndose por escrito a Beer&Food, S.A., en Madrid, calle Arrastaria, nº 21, 1ª Planta, C.P. 28022. En el supuesto de que el usuario sea menor de edad, éste deberá contar con la autorización del titular de la patria potestad para remitir sus datos a Beer&Food, S.A. 
        Se le informa de su derecho a presentar una reclamación ante la Agencia Española de Protección de Datos (agpd.es). No obstante, cualquier cuestión sobre sus datos, por favor contacte con nosotros y la resolveremos.
        </p>
        <p>CATEGORÍA DE DATOS PERSONALES</p>
        <p>Beer&Food, S.A. tratará los datos que nos suministre, pudiendo ser datos de categorías especiales o sensibles: </p>
        <p>
        Datos de carácter identificativo: email, nombre y apellidos, dirección y teléfono.
        Datos relativos a las preferencias de restaurante y satisfacción.
        Datos relativos a la salud (alergias alimenticias).
        </p>
        <p>FINALIDAD DEL TRATAMIENTO DE DATOS PERSONALES</p>
        <p>
        Añadir los datos recogidos a las bases de datos de Beer&Food, S.A.
        Envío de información y ofertas relativas a Lou's Burger.
        Gestionar y confirmar reservas en Tommy Mel´s.
        Dependiendo de cada asunto en el formulario de Contacto (Franquicias, Compras, Marketing, Trabaja con nosotros y Algo que contar): utilizaremos los datos para gestionar su consulta o petición y en el caso de que se refiere a una de nuestras franquicias podremos remitirle la información a la misma con su autorización.
        Franquiciados: Si Vd. está interesado en una de nuestras franquicias necesitamos sus datos para ponernos en contacto con Vd. y enviarle más información sobre Lou's Burger. Conservaremos los datos el tiempo necesario y mientras dure la relación con Vd. y para cumplir con nuestras obligaciones legales.
        </p>
      </div>
    </section>
    <?php
      include "views/includes/footer.php";
    ?>
  </div>
</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>

</html>