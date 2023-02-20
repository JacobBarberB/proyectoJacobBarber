<?php

// VO

namespace modelo;

class ingredientes implements \JsonSerializable{

    public int $id_producto;
    public int $id_ingrediente;
    public int $activo;
    public string $nombre_ingred;
    public float $precio_ingred;

    public function __construct(){
        
    }
    /*
    public function __construct(string $ingred){
        if (!in_array($ingred, self::ALL_INGREDIENTS)) {
            throw new \Exception('Invalid ingredient ' . $ingred);
        }

        $this->ingred = $ingred;
    }*/
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    /**
     * Get the value of id_ingrediente
     */ 
    public function getId_ingrediente()
    {
        return $this->id_ingrediente;
    }

    /**
     * Set the value of id_ingrediente
     *
     * @return  self
     */ 
    public function setId_ingrediente($id_ingrediente)
    {
        $this->id_ingrediente = $id_ingrediente;
    }

    /**
     * Get the value of id_producto
     */ 
    public function getId_producto()
    {
        return $this->id_producto;
    }

    /**
     * Set the value of id_producto
     *
     * @return  self
     */ 
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    /**
     * Get the value of nombre_ingred
     */ 
    public function getNombre_ingred()
    {
        return $this->nombre_ingred;
    }

    /**
     * Set the value of nombre_ingred
     *
     * @return  self
     */ 
    public function setNombre_ingred($nombre_ingred)
    {
        $this->nombre_ingred = $nombre_ingred;
    }

    /**
     * Get the value of precio_ingred
     */ 
    public function getPrecio_ingred()
    {
        return $this->precio_ingred;
    }

    /**
     * Set the value of precio_ingred
     *
     * @return  self
     */ 
    public function setPrecio_ingred($precio_ingred)
    {
        $this->precio_ingred = $precio_ingred;
    }
}