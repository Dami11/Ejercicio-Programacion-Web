<?php
include_once("conexionBD.php");

class Pedidos_Model extends Conexion 
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }


    // Listar Pedidos



    public function ListarPedidos(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {
                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<h3> Listado de Datos </h3><br>";
                
        
                /* ejemplo de una consulta */
        
                $consulta = "SELECT * FROM pedido";
                $resultado = $con->query($consulta);
        
                if ($resultado->fetchColumn() > 0) {
                    echo "<table border='1' align='center'>
                        <tr bgcolor='#E6E6E6'>
                            <th>id_pedido</th>
                            <th>cliente</th>
                            <th>fecha</th>
                            <th>id_vendedor</th>
                            <th>monto_total</th>
                        </tr>";
        
                    foreach ($resultado as $fila) {
        
                        echo "<tr>
                        <td>" . $fila["id_pedido"] . "</td>";
                        echo "<td>" . $fila["cliente"] . "</td>";
                        echo "<td>" . $fila["fecha"] . "</td>";
                        echo "<td>" . $fila["id_vendedor"] . "</td>";
                        echo "<td>" . $fila["monto_total"] . "</td></tr>";
                    }
                    
                } else {
                    echo "No hay Registros";
                }
            }
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
    



        // Agregar Pedidos




    public static function AgregarPedidos_SP($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
    {
        try {
            $con = new Conexion();
            $sql = "CALL sp_AgregarPedidos(?,?,?,?,?,?)";
            $insert =  $con->prepare($sql);
            $insert->bindParam(1, $id_pedido, PDO::PARAM_INT); 
            $insert->bindParam(2, $cliente, PDO::PARAM_STR, 50);
            $insert->bindParam(3, $fecha, PDO::PARAM_STR, 10);  
            $insert->bindParam(4, $id_vendedor, PDO::PARAM_STR, 50); 
            $insert->bindParam(5, $monto_total, PDO::PARAM_STR, 50); 
            $insert->bindParam(6, $idInsert, PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT); 
            $insert->execute();
            return $idInsert;
        } catch (PDOException $pe) {
            // die es el equivalente a exit()
            die("Error occurred: " . $pe->getMessage());
        }
    }

    public function AgregarPedidos( $cliente, $fecha, $id_vendedor, $monto_total)
    {

        $sql = "INSERT INTO pedido (
       
            cliente, 
            fecha, 
            id_vendedor, 
            monto_total) VALUES (?,?,?,?)";
        $insert =  $this->conexion->prepare($sql);
        $arrData = array( $cliente, $fecha, $id_vendedor, $monto_total);
        $insert->execute($arrData);
        $idInsert =  $this->conexion->lastInsertId();
        return $idInsert;
    }

    public static function AgregarPedidos_Static($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
    {

        $con = new Conexion();
        $sql = "INSERT INTO pedido (
            id_pedido, 
            cliente, 
            fecha, 
            id_vendedor, 
            monto_total) VALUES (?,?,?,?,?)";
        $insert = $con->prepare($sql);
        $arrData = array($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total);
        $insert->execute($arrData);
        $idInsert = $con->lastInsertId();
        return $idInsert;
    }




            // Modificar Pedidos


            
            public static function Modificar_pedido_Static($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
            {
                $con = new Conexion();
                $sql = "UPDATE pedido SET 
                    id_pedido    =  :id_pedido
                    cliente = :cliente, 
                    fecha = :fecha, 
                    id_vendedor = :id_vendedor, 
                    monto_total = :monto_total, 
                    WHERE id_pedido = :id_pedido";
        
                $update = $con->prepare($sql);
                $update->bindParam(':id_pedido', $id_pedido, PDO::PARAM_INT);
                $update->bindParam(':cliente', $cliente, PDO::PARAM_STR, 25);
                $update->bindParam(':fecha', $fecha, PDO::PARAM_STR, 25);
                $update->bindParam(':id_vendedor', $id_vendedor, PDO::PARAM_STR, 25);
                $update->bindParam(':monto_total', $monto_total, PDO::PARAM_STR, 25);
                $respuesta = false;
                if ($update->execute())
                    $respuesta = true;
                return $respuesta;
            }
        
            public function ModificarPedidos($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
            {
        
                $con = new Conexion();
                $sql = "UPDATE pedido SET 
                    id_pedido = ?, 
                    cliente = ?, 
                    fecha = ?, 
                    id_vendedor = ?, 
                    monto_total = ?
                    WHERE id_pedido = ?";
        
                $update = $con->prepare($sql);
                $arrData = array($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total);
                if ($update->execute($arrData))
                    $respuesta = true;
                return $respuesta;
            }
        
        


            // Eliminar Pedidos




            public function EliminarPedidos($id_pedido)
            {
                $con = new Conexion();
                $sql = "DELETE FROM `pedido` WHERE `id_pedido`= :id_pedido";
                $update = $con->prepare($sql);
                $update->bindParam(':id_pedido', $id_pedido, PDO::PARAM_INT);
                $respuesta = false;
                if ($update->execute())
                    $respuesta = true;
                return $respuesta;
            }
}




