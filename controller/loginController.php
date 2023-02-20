<?php
//Incluyo primero el autoload para que me pueda cargar bien las páginas
include "autoload.php";
use modelo\usuario;
use modelo\pedidodao;
use modelo\productodao;
class loginController{
    //El index es la pagina de la carta
    public function login(){
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";
        if(isset($_SESSION['nombre'])){
            if($_SESSION['admin'] == 1){
                header("Location: admin");
            }else{
                header("Location: user");
            }
        }
        if(isset($_POST['email']) && isset($_POST['pass'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $passHash = usuario::recuperarPassword($email);
            if($passHash == null){
                $comprobar = false;
                header("Location: login?errorUser");
            }else{
                $comprobar = password_verify($pass, $passHash['contraseña']);
                $datos = usuario::inicioSesion($email, $passHash['contraseña']);
                usuario::actualizarSesion($datos['id_usuario'], 1);    
            }            
            if($comprobar){
              //Guardamos la id del usuario en la session
              $_SESSION['nombre']=$datos['nombre'];
              $_SESSION['id_usuario']=$datos['id_usuario'];
              $_SESSION['admin']=$datos['admin'];
              $_SESSION['sexo']=$datos['sexo'];
              $_SESSION['apellido']=$datos['apellido'];
              $_SESSION['email']=$datos['email'];
              $_SESSION['direccion']=$datos['direccion'];
              $_SESSION['telefono']=$datos['telefono'];
              //echo $datos['id_usuario'] . $datos['nombre'];
              if($datos['admin'] == 1){
                header("Location: admin");
              }else{
                header("Location: user");
              }
            }
        }
        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['pass']) && isset($_POST['sexo']) && isset($_POST['email']) && isset($_POST['direccion']) && isset($_POST['telefono'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $pass = $_POST['pass'];
            $sexo = $_POST['sexo'];
            $mail = $_POST['email'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];    
            //Encriptamos la contraseña
            $passHash = password_hash($pass, PASSWORD_BCRYPT);
            usuario::registrarUsuario($nombre, $apellido, $passHash, $sexo, $mail, $direccion, $telefono,0);
            $id_usuario = usuario::getIdUsuario($nombre, $mail);
            usuario::insertSesion($id_usuario['id_usuario'], 1);
            $_POST['nombre'] = "";
            $_POST['pass'] = "";
            header("Location: login");
        }
        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/login.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function user(){
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";

        $nombre = $_SESSION['nombre'];
        $id_usuario = $_SESSION['id_usuario'];
        $sexo = $_SESSION['sexo'];
        $apellido = $_SESSION['apellido'];
        $email = $_SESSION['email'];
        $direccion = $_SESSION['direccion'];
        $telefono = $_SESSION['telefono'];
        $misPedidos = pedidodao::misPedidos($id_usuario);

        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/user.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function admin(){
        //Incluyo el inicio de sesión con la vida de esta
        include "config/session.php";

        $nombre = $_SESSION['nombre'];
        $id_usuario = $_SESSION['id_usuario'];
        $sexo = $_SESSION['sexo'];
        $apellido = $_SESSION['apellido'];
        $email = $_SESSION['email'];
        $direccion = $_SESSION['direccion'];
        $telefono = $_SESSION['telefono'];
        $admin = $_SESSION['admin'];
        $categorias = productodao::categorias();
        $productos = productodao::allProducts();
        $ingredientes = productodao::allIngredientes();
        $usuarios = usuario::allUsers();
        $pedidos = pedidodao::allPedidos();

        //Cargamos el header y la cabecera
        include "views/includes/header.php";
        require_once "views/includes/cabecera.php";
        //Cargamos la pagina
        include "views/admin.php";
        //Cargamos el footer cerrando la pagina
        include "views/includes/footer.php";        
    }
    public function logout(){
        include "config/session.php";
        usuario::actualizarSesion($_SESSION['id_usuario'], 0);
        header("Location: ../config/logout.php");
    }
    public function update(){
        include "modelo/update.php";
    }
    public function control(){        
        include "config/session.php";
        if($_POST["accion"] == 'seleccionar_producto'){
            $id_categoria = json_decode($_POST["ingrediente_categoria"]);    
            $productoIngred = productodao::categoriaIngrediente($id_categoria); 
            echo json_encode($productoIngred, JSON_UNESCAPED_UNICODE) ;
            return;
        } elseif($_POST["accion"] == 'buscar_producto'){
            if (empty($_POST["nombre"])) {
                echo json_encode([]);
                return;
            }
            $nombre_producto = $_POST["nombre"];
            $producto = productodao::buscarProductoByNombre($nombre_producto);
            if ($producto == null) {
                echo json_encode([]);
                return;
            }
            $producto['ingredientes'] = productodao::ingredienteProducto($producto['id_producto']);
            echo json_encode($producto, JSON_UNESCAPED_UNICODE); 
            return;
        } elseif ($_POST['accion'] == 'eliminar_producto') {
            productodao::eliminarProducto($_POST['id_producto']);
            return;
        }elseif($_POST['accion'] == 'buscar_ingrediente'){
            if (empty($_POST["nombre"])) {
                echo json_encode([]);
                return;
            }
            $nombre_ingrediente = $_POST["nombre"];
            $ingrediente = productodao::buscarIngredienteByNombre($nombre_ingrediente);            
            if ($ingrediente == null) {
                echo json_encode([]);
                return;
            }
            $ingrediente['categoria'] = productodao::buscarIngredienteEnCategoria($ingrediente['id_ingrediente']);
            echo json_encode($ingrediente, JSON_UNESCAPED_UNICODE); 
            return;
        }elseif($_POST['accion'] == 'eliminar_ingrediente'){
            productodao::eliminarIngrediente($_POST['id_ingrediente']);
            return;
        }elseif($_POST['accion'] == 'buscar_usuario'){
            if (empty($_POST["email"])) {
                echo json_encode([]);
                return;
            }
            $email_usuario = $_POST["email"];
            $usuario = usuario::buscarUsuarioByEmail($email_usuario);
            echo json_encode($usuario, JSON_UNESCAPED_UNICODE); 
            return;
        }elseif($_POST['accion'] == 'eliminar_usuario'){
            usuario::eliminarUsuario($_POST['id_usuario']);
            return;
        }
    }
    public function crear_producto(){
        include "config/session.php";
        if(isset($_FILES['formFile']['name'])){
            $foto = $_FILES['formFile']['name'];
            $ruta_imagen = "assets/images/" . $foto;
            $imagen = move_uploaded_file($_FILES["formFile"]["tmp_name"], $ruta_imagen);
            $ruta_imagen_bd = "../".$ruta_imagen;
        }
        $id_producto = productodao::crearProducto($_POST['nombre_prod'], $_POST['descripcion_prod'], $_POST['precio_prod'], $ruta_imagen_bd, $_POST['categoria_ingred']);

        $ingredientes = productodao::categoriaIngrediente($_POST["categoria_ingred"]);
        foreach ($ingredientes as $key => $ingrediente) {
            if (isset($_POST['ingrediente'][$ingrediente['id_ingrediente']])) {
                $ingredientes[$key]['activo'] = 1;
            } else {
                $ingredientes[$key]['activo'] = 0;
            }
        }
        foreach ($ingredientes as $ingrediente) {
            productodao::crearProductoIngrediente($id_producto, $ingrediente['id_ingrediente'], $ingrediente['activo']);
        }
        header("Location: admin");  
    }
    public function modificar_producto(){
        include "config/session.php";
        if(isset($_FILES['formFile']['name'])){
            $foto = $_FILES['formFile']['name'];            
            if($foto == null){
                $ruta_imagen_bd = $_POST['imagen_prod'];
            }else{
                $ruta_imagen = "assets/images/" . $foto;
                $imagen = move_uploaded_file($_FILES["formFile"]["tmp_name"], $ruta_imagen);
                $ruta_imagen_bd = "../".$ruta_imagen;
            }            
        }
        productodao::actualizarProducto($_POST['id_producto'], $_POST['nombre_prod'], $_POST['descripcion_prod'], $_POST['precio_prod'], $ruta_imagen_bd, $_POST['categoria_ingred']);
        productodao::eliminarProductoIngredientes($_POST['id_producto']);
        $ingredientes = productodao::categoriaIngrediente($_POST["categoria_ingred"]);
        foreach ($ingredientes as $key => $ingrediente) {
            if (isset($_POST['ingrediente'][$ingrediente['id_ingrediente']])) {
                $ingredientes[$key]['activo'] = 1;
            } else {
                $ingredientes[$key]['activo'] = 0;
            }
        }
        foreach ($ingredientes as $ingrediente) {
            productodao::crearProductoIngrediente($_POST['id_producto'], $ingrediente['id_ingrediente'], $ingrediente['activo']);
        }
        header("Location: admin");
    }
    public function crear_ingrediente(){
        include "config/session.php";
        $id_ingrediente = productodao::crearIngrediente($_POST['nombre_ingred'], $_POST['precio_ingred']);
        productodao::insertarIngredienteEnCategoria($_POST['categoria_ingred'], $id_ingrediente, $_POST['ingredienteBasico']);
        header("Location: admin");  
    }
    public function modificar_ingrediente(){
        include "config/session.php";
        productodao::actualizarIngrediente($_POST['id_ingrediente'], $_POST['nombre_ingred'], $_POST['precio_ingred']);
        productodao::eliminarIngredienteCategoria($_POST['categoria_ingred'], $_POST['id_ingrediente']);
        productodao::insertarIngredienteEnCategoria($_POST['categoria_ingred'], $_POST['id_ingrediente'], $_POST['ingredienteBasico']);

        header("Location: admin");
    }
    public function insertar_usuario(){
        include "config/session.php";        
        if(isset($_POST['admin'])){
            $admin = 1;
        }else{
            $admin = 0;
        }    
        //Encriptamos la contraseña
        $passHash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        usuario::registrarUsuario($_POST['nombre'], $_POST['apellido'], $passHash, $_POST['sexo'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $admin);
        $id_usuario = usuario::getIdUsuario($_POST['nombre'], $_POST['email']);
        usuario::insertSesion($id_usuario['id_usuario'], 1);
        header("Location: admin");
    }
    public function modificar_usuario(){
        include "config/session.php";
        if($_POST['admin'] == null){
            $admin = 0;
        }else{
            $admin = 1;
        }
        if(!empty($_POST['pass'])){
            $passHash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            usuario::modificarUsuarioCon($_POST['id_usuario'], $_POST['nombre'], $_POST['apellido'], $passHash, $_POST['sexo'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $admin);                        
            header("Location: admin");
        }else{
            usuario::modificarUsuarioSin($_POST['id_usuario'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $admin);            
            header("Location: admin");
        }
    }
}