<?php
include_once("conexionBD.php");

class Pedidos_Model extends Conexion 
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

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
    



    public static function Agregar_Pedido_SP($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
    {
        try {
            $con = new Conexion();
            $sql = "CALL sp_agregar_persona(?,?,?,?,?,?,?)";
            $insert =  $con->prepare($sql);
            $insert->bindParam(1, $id_pedido, PDO::PARAM_INT); 
            $insert->bindParam(2, $cliente, PDO::PARAM_STR, 50);
            $insert->bindParam(6, PDO::PARAM_STR, 10);  
            $insert->bindParam(3, $fecha, PDO::PARAM_STR, 50); 
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

    public function Agregar_Persona($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
    {

        $sql = "INSERT INTO persona (
            id_pedido, 
            primer_nombre, 
            segundo_nombre, 
            primer_apellido, 
            segundo_apellido, 
            fecha_nac) VALUES (?,?,?,?,?,?)";
        $insert =  $this->conexion->prepare($sql);
        $arrData = array($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total);
        $insert->execute($arrData);
        $idInsert =  $this->conexion->lastInsertId();
        return $idInsert;
    }

    public static function Agregar_Persona_Static($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total)
    {

        $con = new Conexion();
        $sql = "INSERT INTO persona (
            id_pedido, 
            primer_nombre, 
            segundo_nombre, 
            primer_apellido, 
            segundo_apellido, 
            fecha_nac) VALUES (?,?,?,?,?,?)";
        $insert = $con->prepare($sql);
        $arrData = array($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total);
        $insert->execute($arrData);
        $idInsert = $con->lastInsertId();
        return $idInsert;
    }
 
}