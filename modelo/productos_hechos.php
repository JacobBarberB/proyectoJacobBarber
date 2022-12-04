<?php
require_once 'burger.php';
require_once 'sandwich.php';
require_once 'merienda.php';

$lista_burgers = array(
    0 => new BURGER(0,'Clásica', 'La básica de siempre, hamburguesa de ternera con queso.', 5.65, "assets/images/burger_1.jpg" ),
    1 => new BURGER(1,'Completa', 'Lo tiene todo. Hamburguesa de ternera, queso, cebolla y tomate.', 7.49, "assets/images/burger_2.jpg", [new INGREDIENTES('cebolla'), new INGREDIENTES('tomate')]),
    2 => new BURGER(2,'McFly', 'La más querida por la family, una burger con queso, bacon, tomate, lechuga, cebolla, pepinillo y huevo frito.', 8.45, "assets/images/burger_3.jpg", 
                    [new INGREDIENTES('bacon'), new INGREDIENTES('tomate'), new INGREDIENTES('lechuga'), new INGREDIENTES('cebolla'), new INGREDIENTES('pepinillo'), new INGREDIENTES('huevo')]),
    3 => new BURGER(3,'Tannen', 'Qué bárbado! Hamburguesa de ternera con queso, jamón ibérico y tomate.', 7.99, "assets/images/burger_4.jpg", [new INGREDIENTES('jamón'), new INGREDIENTES('tomate')]),
    4 => new BURGER(4,'Strickland', 'Pruébame! Hamburguesa de ternera con queso, lechuga, tomate y huevo frito.', 6.99, "assets/images/burger_5.jpg", [new INGREDIENTES('lechuga'), new INGREDIENTES('tomate'), new INGREDIENTES('huevo')]),
    5 => new BURGER(5,'Brown', 'Disfruta con todos los sentidos. Hamburguesa de ternera con queso, cebolla, tomate y foie.', 7.49, "assets/images/burger_6.jpg", [new INGREDIENTES('cebolla'), new INGREDIENTES('tomate'), new INGREDIENTES('foie')])
);

$lista_sandwiches = array(
    0 => new SANDWICH(0,'Otto', 'El sandwich más sabroso! Con lechuga, tomate y bacon.', 6.99, "assets/images/sandwich_1.jpg", [new INGREDIENTES('lechuga'), new INGREDIENTES('tomate'), new INGREDIENTES('bacon')]),
    1 => new SANDWICH(1,'Vulcano', 'Explota de sabor! Con lechuga, tomate y huevo frito.', 7.49, "assets/images/sandwich_2.jpg", [new INGREDIENTES('lechuga'), new INGREDIENTES('tomate'), new INGREDIENTES('huevo')]),
    2 => new SANDWICH(2,'Maximus', 'Sólo para los más valientes! Con lechuga, tomate, pepinillo y pollo.', 8.45, "assets/images/sandwich_3.jpg", 
                    [new INGREDIENTES('lechuga'), new INGREDIENTES('tomate'), new INGREDIENTES('pepinillo'), new INGREDIENTES('pollo')])
);

$lista_meriendas = array(
    0 => new MERIENDAS(0,'Lorreine', 'El milkshake más sabroso! Con chocolate, fresa y nata.', 5.99, "assets/images/merienda_1.jpg", [new INGREDIENTES('chocolate'), new INGREDIENTES('fresa'), new INGREDIENTES('nata')]),
    1 => new MERIENDAS(1,'Oreo', 'Explota de sabor! Milkshake relleno de oreo, nata y chocolate.', 6.49, "assets/images/merienda_2.jpg", [new INGREDIENTES('oreo'), new INGREDIENTES('nata'), new INGREDIENTES('chocolate')]),
    2 => new MERIENDAS(2,'Choco', 'Sólo para los adictos al chocolate! Con nata y mucho chocolate.', 8.45, "assets/images/merienda_3.jpg", [new INGREDIENTES('nata'), new INGREDIENTES('chocolate')])
);

?>