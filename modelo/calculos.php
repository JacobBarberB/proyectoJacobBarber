<?php

class CALCULAR{

	public static function calculadorPrecioTotal($pedidos){

		$precioFinal = 0;
		foreach($pedidos as $sumaPedidos){
			$precioFinal += ($sumaPedidos->getProducto()->getPrecio_producto() + $sumaPedidos->getExtrasMoney()) * $sumaPedidos->getCantidad();
		}
        return $precioFinal;
	}
}