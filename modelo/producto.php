<?php

namespace modelo;

class producto implements \JsonSerializable{
    protected $id_producto;
    protected $nombre_producto;
    protected $descripcion;
    protected $precio_producto;
    protected $imagen;
    protected $id_categoria;

    public function __construct(){}

    public function getId_producto(){
        return $this->id_producto;
    }
    public function setId_producto($id_producto){
        $this->id_producto = $id_producto;
    }
    
    public function getNombre_producto(){
        return $this->nombre_producto;
    }

    public function setNombre_producto($nombre_producto){
        $this->nombre_producto = $nombre_producto;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }
 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
 
    public function getPrecio_producto()
    {
        return $this->precio_producto;
    }
     
    public function setPrecio_producto($precio_producto)
    {
        $this->precio_producto = $precio_producto;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
     
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }
    
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
}