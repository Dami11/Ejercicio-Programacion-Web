<?php
include "template.php";
?>






<?php



// Creo un objeto de la clase ABML

$abml = new Pedidos_Model();
$abml->AgregarPedidos($cliente, $fecha, $id_vendedor, $monto_total);





// Creo y llamo al objeto Listar

$Lpedidos = new Pedidos_Model();
$Lpedidos->ListarPedidos();

// Creo y llamo al objeto Agregar

$Apedidos = new Pedidos_Model();
$Apedidos->AgregarPedidos($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total);

// Creo y llamo al objeto Modificar

$Mpedidos = new Pedidos_Model();
$Mpedidos->ModificarPedidos($id_pedido, $cliente, $fecha, $id_vendedor, $monto_total);

// Creo y llamo al objeto Eliminar

$Epedidos = new Pedidos_Model();
$Epedidos->EliminarPedidos($id_pedido);


?>

    

 

