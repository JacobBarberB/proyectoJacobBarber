<?php

namespace MODELO;

use MODELO\BURGER;
use MODELO\SANDWICH;
use MODELO\MERIENDA;
use MODELO\INGREDIENTES;

class PRODUCTO implements \JsonSerializable{
    protected $id_producto;
    protected $nombre_producto;
    protected $descripcion;
    protected $precio_producto;
    protected $imagen;
    protected $tipo_categoria;

    public function __construct($id_producto, $nombre_producto, $descripcion, $precio_producto, $imagen, $tipo_categoria){
        $this->id_producto = $id_producto;
        $this->nombre_producto = $nombre_producto;
        $this->descripcion = $descripcion;
        $this->precio_producto = $precio_producto;
        $this->imagen = $imagen;
        $this->tipo_categoria = $tipo_categoria;
    }

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

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
}