<?php
//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";
use modelo\pedidodao;

class reviewController{    
    public function review(){
        include "config/session.php";
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        include "views/review.php";
        include "views/includes/footer.php";
    }
    public function control(){
        include "config/session.php";
        if($_POST["accion"] == 'buscar_pedido'){
            $id_usuario = json_decode($_POST["id_usuario"]);
            $pedidos = pedidodao::allPedidoUser($id_usuario);
            $pedidos = pedidodao::allPedidoUser($id_usuario);
            echo json_encode($pedidos, JSON_UNESCAPED_UNICODE) ;
            return;
        }else if($_POST["accion"] == 'add_review'){
            $id_pedido = json_decode($_POST["pedido"]);
            $id_usuario = json_decode($_POST["id_usuario"]);
            $nota = json_decode($_POST["nota"]);
            //echo $_POST["comentario"]; die;
            $comentario = $_POST["comentario"];
            $review = pedidodao::nuevaReview($id_pedido, $id_usuario, $nota, $comentario);
            echo json_encode($review, JSON_UNESCAPED_UNICODE) ;
            return;
        }else if($_POST["accion"] == 'all_review'){
            $review = pedidodao::allReviews($_POST["orden"]);
            echo json_encode($review, JSON_UNESCAPED_UNICODE);
            return;
        }
    }
}