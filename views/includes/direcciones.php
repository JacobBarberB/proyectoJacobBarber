<?php

function producto($clase){
    require_once "modelo/producto.php";
}

spl_autoload_register("producto");