<?php

// VO

class INGREDIENTES implements \JsonSerializable{

    private const PAN_BURGER = ['name' => 'pan_burger', 'price' => 0];
    private const PAN_SANDWICH = ['name' => 'pan_sandwich', 'price' => 0];
    private const CARNE = ['name' => 'carne', 'price' => 0.5];
    private const POLLO = ['name' => 'pollo', 'price' => 0.5];
    private const LECHUGA = ['name' => 'lechuga', 'price' => 0.2];
    private const TOMATE = ['name' => 'tomate', 'price' => 0.2];
    private const QUESO = ['name' => 'queso', 'price' => 0.2];
    private const CEBOLLA = ['name' => 'cebolla', 'price' => 0.2];
    private const BACON = ['name' => 'bacon', 'price' => 0.5];
    private const HUEVO = ['name' => 'huevo', 'price' => 0.5];
    private const PEPINILLO = ['name' => 'pepinillo', 'price' => 0.2];
    private const FOIE = ['name' => 'foie', 'price' => 0.7];
    private const JAMON = ['name' => 'jamón', 'price' => 0.5];
    private const JAMON_YORK = ['name' => 'jamón_york', 'price' => 0.2];
    private const VEGANA = ['name' => 'vegana', 'price' => 0.7];
    private const FRANKFURT = ['name' => 'frankfurt', 'price' => 0.2];
    private const BRATWURST = ['name' => 'bratwurst', 'price' => 0.2];
    private const LECHE = ['name' => 'leche', 'price' => 0.2];
    private const NATA = ['name' => 'nata', 'price' => 0.2];
    private const FRESA = ['name' => 'fresa', 'price' => 0.5];
    private const PLATANO = ['name' => 'plátano', 'price' => 0.2];
    private const CHOCOLATE = ['name' => 'chocolate', 'price' => 0.5];
    private const LIMON = ['name' => 'limón', 'price' => 0.2];
    private const NARANJA = ['name' => 'naranja', 'price' => 0.2];
    private const PIÑA = ['name' => 'piña', 'price' => 0.2];
    private const MANGO = ['name' => 'mango', 'price' => 0.5];
    private const OREO = ['name' => 'oreo', 'price' => 0.5];
    private const VAINILLA = ['name' => 'vainilla', 'price' => 0.2];
    private const MAYONESA = ['name' => 'mayonesa', 'price' => 0.2];
    private const MOSTAZA = ['name' => 'mostaza', 'price' => 0.2];
    private const KETCHUP = ['name' => 'ketchup', 'price' => 0.2];
    private const BARBACOA = ['name' => 'barbacoa', 'price' => 0.2];

    private const ALL_INGREDIENTS = [
        self::PAN_BURGER['name'], self::PAN_SANDWICH['name'], self::CARNE['name'], self::POLLO['name'], self::LECHUGA['name'], self::TOMATE['name'],
        self::QUESO['name'], self::CEBOLLA['name'], self::BACON['name'], self::HUEVO['name'], self::PEPINILLO['name'], self::FOIE['name'], self::JAMON['name'],
        self::JAMON_YORK['name'], self::VEGANA['name'], self::FRANKFURT['name'], self::BRATWURST['name'], self::LECHE['name'], self::NATA['name'],self::FRESA['name'], 
        self::PLATANO['name'], self::CHOCOLATE['name'], self::LIMON['name'], self::NARANJA['name'], self::PIÑA['name'], self::MANGO['name'], self::OREO['name'],
        self::VAINILLA['name'], self::MAYONESA['name'], self::MOSTAZA['name'], self::KETCHUP['name'], self::BARBACOA['name']
    ];

    private const ALL_INGREDIENTS_PRICES = [
        self::PAN_BURGER['name'] => self::PAN_BURGER['price'], self::PAN_SANDWICH['name'] => self::PAN_SANDWICH['price'], self::CARNE['name'] => self::CARNE['price'], self::POLLO['name'] => self::POLLO['price'],
        self::LECHUGA['name'] => self::LECHUGA['price'], self::TOMATE['name'] => self::TOMATE['price'], self::QUESO['name'] => self::QUESO['price'], self::CEBOLLA['name'] => self::CEBOLLA['price'],
        self::BACON['name'] => self::BACON['price'], self::HUEVO['name'] => self::HUEVO['price'], self::PEPINILLO['name'] => self::PEPINILLO['price'], self::FOIE['name'] => self::FOIE['price'],
        self::JAMON['name'] => self::JAMON['price'], self::JAMON_YORK['name'] => self::JAMON_YORK['price'], self::VEGANA['name'] => self::VEGANA['price'], self::FRANKFURT['name'] => self::FRANKFURT['price'], 
        self::BRATWURST['name'] => self::BRATWURST['price'], self::LECHE['name'] => self::LECHE['price'], self::NATA['name'] => self::NATA['price'], self::FRESA['name'] => self::FRESA['price'], self::PLATANO['name'] => self::PLATANO['price'], 
        self::CHOCOLATE['name'] => self::CHOCOLATE['price'], self::LIMON['name'] => self::LIMON['price'], self::NARANJA['name'] => self::NARANJA['price'], self::PIÑA['name'] => self::PIÑA['price'], self::MANGO['name'] => self::MANGO['price'], 
        self::OREO['name'] => self::OREO['price'], self::VAINILLA['name'] => self::VAINILLA['price'], self::MAYONESA['name'] => self::MAYONESA['price'], self::MOSTAZA['name'] => self::MOSTAZA['price'], 
        self::KETCHUP['name'] => self::KETCHUP['price'], self::BARBACOA['name'] => self::BARBACOA['price']
    ];

    public const ALL_INGREDIENTS_BURGERS = [
        self::PAN_BURGER['name'], self::CARNE['name'], self::POLLO['name'], self::LECHUGA['name'], self::TOMATE['name'], self::QUESO['name'], self::CEBOLLA['name'],
        self::BACON['name'], self::HUEVO['name'], self::PEPINILLO['name'], self::FOIE['name'], self::JAMON['name'], self::VEGANA['name'], self::PIÑA['name'],  
        self::MANGO['name'], self::MAYONESA['name'], self::MOSTAZA['name'], self::KETCHUP['name'], self::BARBACOA['name']
    ];

    public const ALL_INGREDIENTS_SANDWICHES = [
        self::PAN_SANDWICH['name'], self::CARNE['name'], self::POLLO['name'], self::LECHUGA['name'], self::TOMATE['name'], self::QUESO['name'], self::CEBOLLA['name'],
        self::BACON['name'], self::HUEVO['name'], self::PEPINILLO['name'], self::FOIE['name'], self::JAMON['name'], self::JAMON_YORK['name'], self::VEGANA['name'], 
        self::FRANKFURT['name'], self::BRATWURST['name'], self::PIÑA['name'], self::MANGO['name'], self::MAYONESA['name'], self::MOSTAZA['name'], self::KETCHUP['name'], self::BARBACOA['name']
    ];

    public const ALL_INGREDIENTS_MERIENDAS = [
        self::LECHE['name'], self::NATA['name'],self::FRESA['name'], self::PLATANO['name'], self::CHOCOLATE['name'], self::LIMON['name'], self::NARANJA['name'], 
        self::PIÑA['name'], self::MANGO['name'], self::OREO['name'], self::VAINILLA['name']
    ];    

    public string $ingred;

    public function __construct(string $ingred){
        if (!in_array($ingred, self::ALL_INGREDIENTS)) {
            throw new \Exception('Invalid ingredient ' . $ingred);
        }

        $this->ingred = $ingred;
    }

    public function getIngrediente(): string
    {
        return $this->ingred;
    }

    public function getMoney(): string
    {
        return self::ALL_INGREDIENTS_PRICES[$this->ingred];
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}