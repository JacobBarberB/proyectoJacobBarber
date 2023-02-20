<?php
include "config/session.php";
include "autoload.php";

use modelo\usuario;

$id_usuario = $_SESSION['id_usuario'];

if(!empty($_POST['nombre'])){
	$nombre = $_POST["nombre"];
}else{
	$nombre = $_SESSION['nombre'];
}
if(!empty($_POST['apellido'])){
	$apellido = $_POST["apellido"];
}else{
	$apellido = $_SESSION['apellido'];
}
if(!empty($_POST['pass'])){
	//Encriptamos la contraseña
    $passHash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
}
if(!empty($_POST['sexo']) || $_POST['sexo'] == 0){
	$sexo = $_POST["sexo"];
}else{
	$sexo = $_SESSION['sexo'];
}
if(!empty($_POST['email'])){
	$email = $_POST["email"];
}else{
	$email = $_SESSION['email'];
}
if(!empty($_POST['direccion'])){
	$direccion = $_POST["direccion"];
}else{
	$direccion = $_SESSION['direccion'];
}
if(!empty($_POST['telefono'])){
	$telefono = $_POST["telefono"];
}else{
	$telefono = $_SESSION['telefono'];
}
if($_POST['admin'] == null){
    $admin = 0;
}else{
    $admin = 1;
}

if(!empty($_POST['pass'])){
	usuario::modificarUsuarioCon($id_usuario, $nombre, $apellido, $passHash, $sexo, $email, $direccion, $telefono, $admin);
	$datos = usuario::usuarioById($id_usuario);
	$_SESSION['nombre']=$datos['nombre'];
    $_SESSION['id_usuario']=$datos['id_usuario'];
    $_SESSION['admin']=$datos['admin'];
    $_SESSION['sexo']=$datos['sexo'];
    $_SESSION['apellido']=$datos['apellido'];
    $_SESSION['email']=$datos['email'];
    $_SESSION['direccion']=$datos['direccion'];
    $_SESSION['telefono']=$datos['telefono'];
	header("Location: login");
}else{
	usuario::modificarUsuarioSin($id_usuario, $nombre, $apellido, $sexo, $email, $direccion, $telefono, $admin);
	$datos = usuario::usuarioById($id_usuario);
	$_SESSION['nombre']=$datos['nombre'];
    $_SESSION['id_usuario']=$datos['id_usuario'];
    $_SESSION['admin']=$datos['admin'];
    $_SESSION['sexo']=$datos['sexo'];
    $_SESSION['apellido']=$datos['apellido'];
    $_SESSION['email']=$datos['email'];
    $_SESSION['direccion']=$datos['direccion'];
    $_SESSION['telefono']=$datos['telefono'];
	header("Location: login");
}