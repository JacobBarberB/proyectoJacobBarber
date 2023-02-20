<?php
namespace modelo;
use config\dataBase;

class productodao{
    public static function productosCategoria($categoria){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM producto WHERE id_categoria=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $categoria);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($productoDB = $result->fetch_object('modelo\producto')){
            $listaProductos[] = $productoDB;
        }
        
        return $listaProductos;

        $conexion->close();       
    }
    public static function ingredienteProducto($id_producto){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT producto_ingrediente.id_ingrediente, activo, nombre_ingred, precio_ingred
                                    FROM producto_ingrediente 
                                    JOIN ingrediente ON producto_ingrediente.id_ingrediente = ingrediente.id_ingrediente
                                    WHERE id_producto=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_producto);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($ingredienteDB = $result->fetch_object('modelo\ingredientes')){
            $listaIngredientes[] = $ingredienteDB;
        }
        return $listaIngredientes;

        $conexion->close();       
    }
    public static function ingredienteProductoByList($id_producto){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT producto_ingrediente.id_ingrediente, activo, nombre_ingred, precio_ingred
                                    FROM producto_ingrediente 
                                    JOIN ingrediente ON producto_ingrediente.id_ingrediente = ingrediente.id_ingrediente
                                    WHERE id_producto=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_producto);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($ingredienteDB = $result->fetch_array(MYSQLI_ASSOC)){
            $listaIngredientes[] = $ingredienteDB;
        }
        //var_dump($listaIngredientes);die;
        return $listaIngredientes;

        $conexion->close();       
    }
    public static function ingrediente($id_ingrediente){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM ingrediente WHERE id_ingrediente=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_ingrediente);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($ingredienteDB = $result->fetch_object('modelo\ingredientes')){
            $listaIngredientes[] = $ingredienteDB;
        }
        //var_dump($listaIngredientes);die;
        return $listaIngredientes;
        $conexion->close();       
    }
    public static function ingredienteByList($id_ingrediente){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM ingrediente WHERE id_ingrediente=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_ingrediente);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($ingredienteDB = $result->fetch_array(MYSQLI_ASSOC)){
            $listaIngredientes[] = $ingredienteDB;
        }
        //var_dump($listaIngredientes);die;
        return $listaIngredientes;
        $conexion->close();       
    }
    public static function categorias(){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM categoria");

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        //$categorias = mysqli_fetch_assoc($result);
        while($categoriasDB = $result->fetch_array(MYSQLI_ASSOC)){
            $categorias[] = $categoriasDB;
        }
        
        return $categorias;
        $conexion->close();       
    }
    public static function productoIngrediente($id_producto){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT producto_ingrediente.id_ingrediente, activo, nombre_ingred, precio_ingred
                                    FROM producto_ingrediente 
                                    JOIN ingrediente ON producto_ingrediente.id_ingrediente = ingrediente.id_ingrediente
                                    WHERE id_producto=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_producto);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        //$categorias = mysqli_fetch_assoc($result);
        while($ingredienteDB = $result->fetch_array(MYSQLI_ASSOC)){
            $ingrediente[] = $ingredienteDB;
        }
        
        return $ingrediente;
        $conexion->close();       
    }
    public static function categoriaIngrediente($id_categoria){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT categoria_ingrediente.id_ingrediente, activo, nombre_ingred, precio_ingred
                                    FROM categoria_ingrediente 
                                    JOIN ingrediente ON categoria_ingrediente.id_ingrediente = ingrediente.id_ingrediente
                                    WHERE id_categoria=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_categoria);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        //$categorias = mysqli_fetch_assoc($result);
        while($ingredienteDB = $result->fetch_array(MYSQLI_ASSOC)){
            $ingrediente[] = $ingredienteDB;
        }        
        return $ingrediente;
        $conexion->close();       
    }
    public static function buscarProductoByNombre($nombre_producto){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM producto WHERE nombre_producto LIKE '%{$nombre_producto}%'");
        //Bind variables to the prepare
        //$stmt->bind_param("s", $nombre_producto);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = mysqli_fetch_assoc($result);
        $conexion->close();
        return $producto;
    }
    public static function eliminarProducto($id_producto) {
        $conexion = dataBase::connect();

        $stmt = $conexion->prepare("DELETE FROM producto_ingrediente WHERE id_producto=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();

        $stmt = $conexion->prepare("DELETE FROM producto WHERE id_producto=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();

        $conexion->close();
    }
    public static function crearProducto($nombre, $descripcion, $precio, $imagen, $id_categoria) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO producto (nombre_producto, descripcion, precio_producto, imagen, id_categoria) 
                                    VALUES(?,?,?,?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $imagen, $id_categoria);

        //Execute statement
        $stmt->execute();

        $id_producto = mysqli_insert_id($conexion);

        $conexion->close(); 

        return $id_producto;
    }
    public static function crearProductoIngrediente($id_producto, $id_ingrediente, $activo) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO producto_ingrediente (id_producto, id_ingrediente, activo) 
                                    VALUES(?,?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("iii", $id_producto, $id_ingrediente, $activo);

        //Execute statement
        $stmt->execute();

        $conexion->close();
    }
    public static function actualizarProducto($id_producto, $nombre, $descripcion, $precio, $imagen, $id_categoria) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare(
            "UPDATE producto
            SET nombre_producto = ?, descripcion = ?, precio_producto = ?, imagen = ?, id_categoria = ?
            WHERE id_producto = ?"
        );
        //Bind variables to the prepare
        $stmt->bind_param("ssdsii", $nombre, $descripcion, $precio, $imagen, $id_categoria, $id_producto);

        //Execute statement
        $stmt->execute();

        $conexion->close(); 
    }
    public static function eliminarProductoIngredientes($id_producto) {
        $conexion = dataBase::connect();

        $stmt = $conexion->prepare("DELETE FROM producto_ingrediente WHERE id_producto=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();

        $conexion->close();
    }
    public static function crearIngrediente($nombre_ingred, $precio_ingred) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO ingrediente (nombre_ingred, precio_ingred) 
                                    VALUES(?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("sd", $nombre_ingred, $precio_ingred);

        //Execute statement
        $stmt->execute();

        $id_ingrediente = mysqli_insert_id($conexion);

        $conexion->close(); 

        return $id_ingrediente;
    }
    public static function insertarIngredienteEnCategoria($id_categoria, $id_ingrediente, $activo) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO categoria_ingrediente (id_categoria, id_ingrediente,activo) 
                                    VALUES(?,?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("iii", $id_categoria, $id_ingrediente, $activo);

        //Execute statement
        $stmt->execute();

        $conexion->close(); 
    }
    public static function buscarIngredienteByNombre($nombre_ingred){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM ingrediente WHERE nombre_ingred=?");
        //Bind variables to the prepare
        $stmt->bind_param("s", $nombre_ingred);
        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        $ingrediente = mysqli_fetch_assoc($result);
        $conexion->close();
        return $ingrediente;
    }
    public static function buscarIngredienteEnCategoria($id_ingrediente){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM categoria_ingrediente WHERE id_ingrediente=?");
        $stmt->bind_param("i", $id_ingrediente);

        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        while($ingredienteDB = $result->fetch_array(MYSQLI_ASSOC)){
            $listaIngredientes[] = $ingredienteDB;
        }
        return $listaIngredientes;
        $conexion->close();
    }
    public static function actualizarIngrediente($id_ingrediente, $nombre_ingred, $precio_ingred) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare(
            "UPDATE ingrediente
            SET nombre_ingred = ?, precio_ingred = ?
            WHERE id_ingrediente = ?"
        );
        //Bind variables to the prepare
        $stmt->bind_param("sdi", $nombre_ingred, $precio_ingred, $id_ingrediente);

        //Execute statement
        $stmt->execute();

        $conexion->close(); 
    }
    public static function eliminarIngredienteCategoria($id_categoria, $id_ingrediente) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("DELETE FROM categoria_ingrediente WHERE id_categoria = ? and id_ingrediente = ?");
        //Bind variables to the prepare
        $stmt->bind_param("ii", $id_categoria, $id_ingrediente);
        $stmt->execute();
        $conexion->close();
    }
    public static function eliminarIngrediente($id_ingrediente) {
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("DELETE FROM producto_ingrediente WHERE id_ingrediente=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_ingrediente);
        $stmt->execute();
        
        $stmt = $conexion->prepare("DELETE FROM categoria_ingrediente WHERE id_ingrediente=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_ingrediente);
        $stmt->execute();

        $stmt = $conexion->prepare("DELETE FROM ingrediente WHERE id_ingrediente=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_ingrediente);
        $stmt->execute();

        $conexion->close();
    }
    public static function allProducts(){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM producto");
        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($productosDB = $result->fetch_array(MYSQLI_ASSOC)){
            $listaProductos[] = $productosDB;
        }
        return $listaProductos;
        $conexion->close();       
    }
    public static function allIngredientes(){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT * FROM ingrediente");
        //Execute statement
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($ingredienteDB = $result->fetch_array(MYSQLI_ASSOC)){
            $listaIngredientes[] = $ingredienteDB;
        }
        return $listaIngredientes;
        $conexion->close();       
    }
}

?>