<?php 

namespace modelo;
use config\dataBase;

class usuario{
    public static function registrarUsuario($nombre, $apellido, $pass, $sexo, $mail, $direccion, $telefono, $admin){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO usuario (nombre, apellido, contraseña, sexo, email, direccion, telefono, admin) 
                                    VALUES(?,?,?,?,?,?,?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("sssissii", $nombre, $apellido, $pass, $sexo, $mail, $direccion, $telefono, $admin);

        //Execute statement
        $stmt->execute();        
        
        $conexion->close();
    }

    public static function getIdUsuario($nombre, $mail){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT id_usuario FROM usuario WHERE nombre=? and email=?");
        //Bind variables to the prepare
        $stmt->bind_param("ss", $nombre, $mail);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $id = mysqli_fetch_assoc($result);
         
        return $id;
        $conexion->close();       
    }
    public static function insertSesion($id_usuario, $estado){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO usuario_sesion (id_usuario, estado, ultima_conexion) 
                                    VALUES(?,?,now())");
        //Bind variables to the prepare
        $stmt->bind_param("ii", $id_usuario, $estado);

        //Execute statement
        $stmt->execute();

        $conexion->close();
    }
    public static function actualizarSesion($id_usuario, $estado){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("UPDATE usuario_sesion SET estado=$estado, ultima_conexion=now()  WHERE id_usuario=$id_usuario");
        //Bind variables to the prepare

        //Execute statement
        $stmt->execute();
        $conexion->close();         
    }
    public static function inicioSesion($email, $pass){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE email=? and contraseña=?");
        //Bind variables to the prepare
        $stmt->bind_param("ss", $email, $pass);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $a = mysqli_fetch_assoc($result);
        /*$sesion = False;
        if($result == $pass){ $sesion = True;}*/
        
        return $a;
        $conexion->close();               
    }
    public static function recuperarPassword($email){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT contraseña FROM usuario WHERE email=?");
        //Bind variables to the prepare
        $stmt->bind_param("s", $email);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $pass = mysqli_fetch_assoc($result);
        /*$sesion = False;
        if($result == $pass){ $sesion = True;}*/
        
        return $pass;
        $conexion->close();               
    }
    public static function sexo($nombre){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT sexo FROM usuario WHERE nombre=?");
        //Bind variables to the prepare
        $stmt->bind_param("s", $nombre);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $sexo = mysqli_fetch_assoc($result);
        /*$sesion = False;
        if($result == $pass){ $sesion = True;}*/
        
        return $sexo;
        $conexion->close();               
    }
    public static function modificarUsuarioSin($id_usuario, $nombre, $apellido, $sexo, $email, $direccion, $telefono, $admin){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("UPDATE usuario SET nombre=?, apellido=?, sexo=?, email=?, direccion=?, telefono=?, admin=? WHERE id_usuario=?");
        //Bind variables to the prepare
        $stmt->bind_param("ssissiii", $nombre, $apellido, $sexo, $email, $direccion, $telefono, $admin, $id_usuario);

        //Execute statement
        $stmt->execute();

        $conexion->close();             
    }
    public static function modificarUsuarioCon($id_usuario, $nombre, $apellido, $pass, $sexo, $email, $direccion, $telefono, $admin){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("UPDATE usuario SET nombre=?, apellido=?, contraseña=?, sexo=?, email=?, direccion=?, telefono=?, admin=? WHERE id_usuario=?");
        //Bind variables to the prepare
        $stmt->bind_param("sssissiii", $nombre, $apellido, $pass, $sexo, $email, $direccion, $telefono, $admin, $id_usuario);

        //Execute statement
        $stmt->execute();

        $conexion->close();         
    }
    public static function usuarioById($id_usuario){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE id_usuario=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_usuario);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = mysqli_fetch_assoc($result);
        
        return $datos;
        $conexion->close();               
    }
    public static function buscarUsuarioByEmail($email){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE email=?");
        //Bind variables to the prepare
        $stmt->bind_param("s", $email);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = mysqli_fetch_assoc($result);
         
        return $usuario;
        $conexion->close();       
    }
    public static function eliminarUsuario($id_usuario) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $conexion->close();
    }
    public static function allUsers(){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM usuario");
        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($usuariosDB = $result->fetch_array(MYSQLI_ASSOC)){
            $listaUsuarios[] = $usuariosDB;
        }
        return $listaUsuarios;
        $conexion->close();               
    }

}

?>