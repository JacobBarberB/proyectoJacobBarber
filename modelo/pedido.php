<?php
namespace modelo;

use modelo\producto;
use modelo\ingredientes;

class pedido implements \JsonSerializable{
    protected $producto;
    protected $cantidad;
    protected $ingredSelec = [];
    protected array $extras = [];

    public function _construct($producto, $cantidad, $ingredSelec = [], array $extras = []){
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->ingredSelec = $ingredSelec;
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

    public function getIngredSelec()
    {
        return $this->ingredSelec;
    }

    public function setIngredSelec($ingredSelec): void
    {
        $ingredientesFinales = array();
        $ingrediente_inicial = productodao::ingredienteProductoByList($this->getProducto()->getId_producto()); 
        //var_dump($ingredSelec);    
        foreach($ingrediente_inicial as $ingrediente_comparar){             
            if(in_array($ingrediente_comparar['id_ingrediente'], $ingredSelec)){               
                    $ingrediente_comparar['activo'] = 1;
                    $ingredientesFinales[] = $ingrediente_comparar;
                }else{
                    $ingrediente_comparar['activo'] = 0;
                    $ingredientesFinales[] = $ingrediente_comparar;                    
                }                
                                  
        }
        //var_dump($ingredientesFinales);
        foreach ($ingredientesFinales as $ingrediente) {
            $this->ingredSelec[] = $ingrediente;
        }           
    } 

    public function getExtras(): array
    {
        return $this->extras;
    }

    public function setExtras(array $extras): void
    {
        $ingredientesFinales = array();
        $ingrediente_inicial = productodao::ingredienteProducto($this->getProducto()->getId_producto());
        foreach($extras as $ingrediente_enviado){
            foreach($ingrediente_inicial as $ingrediente_comparar){
                //echo $ingrediente_comparar->getId_ingrediente();
                if(($ingrediente_comparar->getId_ingrediente() == $ingrediente_enviado) && ($ingrediente_comparar->getActivo() == 0)){
                    $ingredientesFinales[] = $ingrediente_enviado;
                }
            }            
        }
        //var_dump($ingredientesFinales);
        foreach ($ingredientesFinales as $ingrediente) {
            $this->extras[] = productodao::ingrediente($ingrediente);
        }
        //var_dump($this->extras);
        /*foreach ($extras as $ingrediente_enviado) {
            if (!$this->getProducto()->tieneIngrediente($ingrediente_enviado)) {
                $ingredientesFinales[] = $ingrediente_enviado;
            }    
        }
        foreach ($ingredientesFinales as $ingrediente) {
            $this->extras[] = new INGREDIENTES($ingrediente);
        } */            
    }    

    public function getExtrasMoney()
    {
        $money = 0;
        foreach ($this->extras as $ingrediente) {
            $money += $ingrediente[0]->getPrecio_ingred();
        }
        return $money;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}