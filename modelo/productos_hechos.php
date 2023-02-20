<?php

namespace modelo;
use modelo\productodao;

$lista_burgers = productodao::productosCategoria(1);
$lista_sandwiches = productodao::productosCategoria(2);
$lista_meriendas = productodao::productosCategoria(3);


?>