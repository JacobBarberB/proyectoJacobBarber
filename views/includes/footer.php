<?php

?>
<footer class="bg-color2 text-color3">
  <div class="navbar-expand-lg nav_down_footer"></div>
  <div id="footer_escritorio">
    <nav class="navbar navbar-expand-lg bg-color2 text-1 fw-bold size-25">
      <div class="container-xxl">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#"><div class="youtube"></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#"><div class="twitter"></div></a>
            </li>
          </ul>
        </div>
        <a class="navbar-brand mx-auto" id="logo_footer" href="index.php"><img src="assets/images/logo.png"></a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#"><div class="instagram"></div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#"><div class="facebook"></div></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav id="size-8" class="navbar navbar-expand-lg bg-color2 text-1 fw-bold size-25 h-auto">
      <div class="container-xxl">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php $file_name && $file_name == 'privacidad' ? print_active() : ' ' ?>" aria-current="page" href="privacidad.php">Privacidad</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Cookies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Aviso Legal</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <p class="text-center text-2 fw-bold fs-5 py-3 mb-0">@Copyright Lou's Burger 2022</p>
  </div>
  <div id="footer_smartphone" class="text-center">
    <div class="bg-color2 text-1 fw-bold">
      <a class="nav-link ps-1 py-1 py-lg-0 <?php $file_name && $file_name == 'privacidad' ? print_active() : ' ' ?>" aria-current="page" href="privacidad.php">Privacidad</a>
      <a class="nav-link ps-1 py-1 py-lg-0">Cookies</a>
      <a class="nav-link ps-1 py-1 py-lg-0">Aviso Legal</a>
      <a class="navbar-brand mx-auto ps-0" href="index.php"><img id="logo_footer_smart" src="assets/images/logo.png"></a>
    </div>
    <div id="redes_footer" class="container-xxl mx-auto">
      <a class="nav-link px-4 py-3 py-lg-0" aria-current="page" href="#"><img src="assets/images/youtube.png"></a>
      <a class="nav-link px-4 py-3 py-lg-0" aria-current="page" href="#"><img src="assets/images/twitter.png"></a>
      <a class="nav-link px-4 py-3 py-lg-0" aria-current="page" href="#"><img src="assets/images/instagram.png"></a>
      <a class="nav-link px-4 py-3 py-lg-0" aria-current="page" href="#"><img src="assets/images/facebook.png"></a>
    </div>
    <p class="text-center text-2 fw-bold py-3 py-lg-0 mb-0">@Copyright Lou's Burger 2022</p>
  </div>
</footer>
