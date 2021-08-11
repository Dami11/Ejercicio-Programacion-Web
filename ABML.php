<?php
include_once("coneccionBD.php");

class Personas_Model extends Conexion
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public static function ListarPedidos(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {
                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<br>==========================================================================";
                echo "<h3> Ejecución de Consulta SQL para obtener datos </h3><hr><br>";
                echo "<br>==========================================================================";
                
        
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
                        echo "<td>" . $fila["segundo_nombre"] . "</td>";
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
    
    public static function ListarPedidos_SP(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {

                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<br>==========================================================================";
                echo "<h3> Ejecución de un Procedimiento Almacenado para obtener datos </h3><hr><br>";
                echo "<br>==========================================================================";
                
        
                /* ejemplo de una consulta */
        
                $consulta = "CALL sp_obtener_personas()";
                $resultado = $con->query($consulta);
        
                if ($resultado->fetchColumn() > 0) {
                    echo "<table border='1' align='center'>
                        <tr bgcolor='#E6E6E6'>
                            <th>id_pedido</th>
                            <th>cliente/th>
                        </tr>";
        
                    foreach ($resultado as $fila) {
        
                        echo "<tr>
                        <td>" . $fila["id_pedido"] . "</td>";
                        echo "<td>" . $fila["cliente"] . "</td>";
                    }
                    
                } else {
                    echo "No hay Registros";
                }
            }
            
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

        echo "<br>===============================================================";
        echo "<br>===============================================================";

    }
}