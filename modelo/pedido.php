<?php
namespace MODELO;

use MODELO\BURGER;
use MODELO\SANDWICH;
use MODELO\MERIENDA;
use MODELO\PRODUCTO;
use MODELO\INGREDIENTES;

class PEDIDO implements \JsonSerializable{
    protected $producto;
    protected $cantidad;
    protected array $extras = [];

    public function _construct($producto, $cantidad, array $extras = []){
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->extras = $extras;
    }
    
    public function getProducto(){
        return $this->producto;
    }
    
    public function setProducto($producto){
        $this->producto = $producto;        
    }
 
    public function getCantidad(){
        return $this->cantidad;
    }
    
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;      
    }

    public function getExtras(): array
    {
        return $this->extras;
    }

    public function setExtras(array $extras): void
    {
        $ingredientesFinales = array();
        foreach ($extras as $ingrediente_enviado) {
            if (!$this->getProducto()->tieneIngrediente($ingrediente_enviado)) {
                $ingredientesFinales[] = $ingrediente_enviado;
            }    
        }
        foreach ($ingredientesFinales as $ingrediente) {
            $this->extras[] = new INGREDIENTES($ingrediente);
        }             
    }    

    public function getExtrasMoney()
    {
        $money = 0;
        foreach ($this->extras as $ingrediente) {
            $money += $ingrediente->getMoney();
        }
        return $money;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}