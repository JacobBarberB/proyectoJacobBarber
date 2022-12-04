<?php

interface alquilerProductos{
    const PRECIOPELI = 3;
    const PRECIOGAME = 2;

    public function calculaPrecio($numDias);

}