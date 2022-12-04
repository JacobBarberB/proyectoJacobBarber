<?php

//include 'ingredientes.php';
//include 'producto.php';
require_once 'categoria.php';

class MERIENDAS extends PRODUCTO{

    public array $ingrediente = array();

    public function __construct(int $id_producto, string $nombre_producto, string $descripcion, float $precio_producto, $imagen, array $ingrediente = []){
        parent::__construct($id_producto, $nombre_producto, $descripcion, $precio_producto, $imagen, CATEGORIA::MERIENDA);
        
        $this->ingrediente[] = new INGREDIENTES('leche');

        $this->ingrediente = array_merge($this->ingrediente, $ingrediente);
    }

    public function setIngrediente(INGREDIENTES $ingrediente): void
    {
        $this->ingrediente[] = $ingrediente;
    }

    public function getIngrediente(): array
    {
        return $this->ingrediente;
    }

    public function getTipo_categoria()
    {
        return $this->tipo_categoria;
    }
    
    public function setTipo_categoria($tipo_categoria)
    {
        $this->tipo_categoria = $tipo_categoria;
    }

    public function tieneIngrediente(string $ingrediente): bool
    {
        foreach ($this->getIngrediente() as $burguer_ingrediente) {
            if ($burguer_ingrediente->ingred === $ingrediente) {
                return true;
            }
        }

        return false;
    }

/*
    public function calculaPrecio($numDias){
        $precioTotal = $numDias*Producto::PRECIOGAME;
    }

    public function devuelvePrecioDia(){
        if($this->plataforma == 'PS5'){
            return self::PRECIOGAME +1;
        }else{
            return self::PRECIOGAME;
        }       
    }*/
}
