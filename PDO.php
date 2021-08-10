<?php

include_once("conexionBD");

class controller_pdo
{

    public static function ListarPedidos(){
        try {
            
           //$obj_conexion = Conexion::getConexion();
            $con = new Conexion();
        
            if (!$con) {
                echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
            } else {
                echo "<h3>Conexion Exitosa PHP - MySQL - PDO </h3><hr><br>";
        
                /* ejemplo de una consulta */
        
                $consulta = "SELECT * FROM persona";
                $resultado = $con->query($consulta);
        
                if ($resultado->fetchColumn() > 0) {
                    echo "<table border='1' align='center'>
                        <tr bgcolor='#E6E6E6'>
                            <th>id_pedido</th>
                            <th>producto</th>
                            <th>cantidad</th>
                            <th>precio_unitario</th>
                        </tr>";
        
                    foreach ($resultado as $fila) {
        
                        echo "<tr>
                        <td>" . $fila["cedula"] . "</td>";
                        echo "<td>" . $fila["id_pedido"] . "</td>";
                        echo "<td>" . $fila["producto"] . "</td>";
                        echo "<td>" . $fila["cantidad"] . "</td>";
                        echo "<td>" . $fila["precio_unitario"] . "</td></tr>";
                    }
                    
                } else {
                    echo "No hay Pedidos";
                }
            }
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
  
}