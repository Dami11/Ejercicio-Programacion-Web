<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php
include "template.php";
?>


<!--Formulario-->

<form action="agregar.php" method="POST"><br><h2>Ingrese su pedido:</h2>

<br>

<label for="txt_cli">Cliente </label>
<input type="text" name="txt_cli" required>
<br>

<label for="txt_fec">Fecha: </label>
<input type="date" name="txt_fec" required>
<br>

<label for="txt_ven">Vendedor: </label>
<input type="number" name="txt_ven" required>
<br>

<label for="txt_mon">Monto Total: </label>
<input type="number" name="txt_mon" required>
<br>

<label for="txt_num"> </label>
<input type="submit">

</form>

<!--Formulario-->






<?php
include "../Modelo/ABML.php";


// Obtengo los datos enviados por el Formulario

$cliente = $_POST['txt_cli'];
$fecha = $_POST['txt_fec'];
$id_vendedor = $_POST['txt_ven'];
$monto_total = $_POST['txt_mon'];


// Creo un objeto de la clase ABML

$abml = new Pedidos_Model();
$abml->AgregarPedidos($cliente, $fecha, $id_vendedor, $monto_total);



?>

</body>
</html>