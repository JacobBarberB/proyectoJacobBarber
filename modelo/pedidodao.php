<?php
namespace modelo;
use config\dataBase;

class pedidodao{
    public static function nuevoPedido($id_usuario, $importe_total, $pagado){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO pedido (id_usuario, importe_total, fecha_pedido, pagado) 
                                    VALUES(?,?,now(),?)");
        //Bind variables to the prepare
        $stmt->bind_param("idi", $id_usuario, $importe_total, $pagado);

        //Execute statement
        $stmt->execute();        
        
        $pedido = mysqli_insert_id($conexion);
        //return $id_pedido;
        $conexion->close();
        return $pedido;      
    }
    public static function idPedido($id_usuario, $importe_total, $pagado){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT id_pedido FROM pedido WHERE id_usuario=? and importe_total=? and pagado=?
                                    ORDER BY id_pedido DESC");
        //Bind variables to the prepare
        $stmt->bind_param("idi", $id_usuario, $importe_total, $pagado);

        //Execute statement
        $stmt->execute();  
        $result = $stmt->get_result();
        $id_pedido = mysqli_fetch_assoc($result);
        
        return $id_pedido;
        $conexion->close();       
    }
    public static function nuevoProductoPedido($id_pedido, $id_producto, $cantidad, $precio_extras){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO producto_pedido (id_pedido, id_producto, cantidad, precio_extras) 
                                    VALUES(?,?,?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("iiid", $id_pedido, $id_producto, $cantidad, $precio_extras);

        //Execute statement
        $stmt->execute();        
        
        //return $id_pedido;
        $conexion->close();       
    }
    public static function idArticulo($id_pedido, $id_producto){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT id_articulo FROM producto_pedido WHERE id_pedido=? and id_producto=?
                                    ORDER BY id_articulo DESC");
        //Bind variables to the prepare
        $stmt->bind_param("ii", $id_pedido, $id_producto);

        //Execute statement
        $stmt->execute();  
        $result = $stmt->get_result();
        $articulo = mysqli_fetch_assoc($result);
        
        return $articulo;
        $conexion->close();       
    }
    public static function nuevoCambioProducto($id_pedido, $id_articulo, $id_ingrediente, $ingrediente_selec, $precio_ingred){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("INSERT INTO cambio_producto (id_pedido, id_articulo, id_ingrediente, ingrediente_selec, precio_ingred) 
                                    VALUES(?,?,?,?,?)");
        //Bind variables to the prepare
        $stmt->bind_param("iiiid", $id_pedido, $id_articulo, $id_ingrediente, $ingrediente_selec, $precio_ingred);

        //Execute statement
        $stmt->execute();        
        
        //return $id_pedido;
        $conexion->close();      
    }
    public static function misPedidos($id_usuario){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT pedido.id_pedido, importe_total, fecha_pedido, cantidad, precio_extras, producto.nombre_producto, producto.precio_producto
                                    FROM pedido
                                    JOIN producto_pedido ON pedido.id_pedido = producto_pedido.id_pedido
                                    JOIN producto ON producto_pedido.id_producto = producto.id_producto
                                    WHERE id_usuario=?");
        //Bind variables to the prepare
        $stmt->bind_param("i", $id_usuario);

        //Execute statement
        $stmt->execute();  
        $result = $stmt->get_result();

        $pedidos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $pedidos[] = $row;
        }

        $conexion->close();
        return $pedidos;
    }
    public static function allPedidos(){
        $conexion = dataBase::connect();
        $stmt = $conexion->prepare("SELECT pedido.id_pedido, email, importe_total, fecha_pedido, cambio_producto.id_articulo, producto.nombre_producto, producto.precio_producto, cantidad, nombre_ingred, precio_extras
                                    FROM pedido
                                    JOIN producto_pedido ON pedido.id_pedido = producto_pedido.id_pedido
                                    JOIN producto ON producto_pedido.id_producto = producto.id_producto
                                    JOIN cambio_producto ON pedido.id_pedido = cambio_producto.id_pedido
                                    JOIN ingrediente ON cambio_producto.id_ingrediente = ingrediente.id_ingrediente
                                    JOIN usuario ON pedido.id_usuario = usuario.id_usuario
                                    WHERE cambio_producto.ingrediente_selec=1 AND ingrediente.nombre_ingred != 'pan_burger' AND ingrediente.nombre_ingred != 'pan_sandwich' AND ingrediente.nombre_ingred != 'leche'
                                    ORDER BY pedido.id_pedido desc");
        //Execute statement
        $stmt->execute();  
        $result = $stmt->get_result();
        while ($row = mysqli_fetch_assoc($result)) {
            $pedidos[] = $row;
        }
        $conexion->close();
        return $pedidos;
    }
    
}

?>