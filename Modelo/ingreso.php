<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso PDO</title>
</head>
<body>
<h2>Ingresando Datos en una Bases de Datos</h2>
<br><br>


<?php





// PDO                  HOST              DB_NAME     USER    PASS
$pdo_con = new PDO('mysql:host=localhost;dbname=ejercicio_web', 'root', '');

$sql="INSERT INTO pedido (cliente, fecha, id_vendedor) 
VALUES (:cliente, :fecha, :id_vendedor)";

//VALUES (?, ?, ?, ?, ?, ?)";

$sql = $pdo_con->prepare($sql);

$cliente = "Juan Perez";
$fecha = "20210420";
$id_vendedor = "1";

/*
PDO::PARAM_STR se utiliza para cadenas.
PDO::PARAM_INT se utiliza para enteros.
PDO::PARAM_BOOL solo permite valores booleanos (true/false).
PDO::PARAM_NULL solo permite el tipo de datos NULL.
*/

$sql->bindParam(':cliente', $cliente, PDO::PARAM_STR, 150);
$sql->bindParam(':fecha', $fecha, PDO::PARAM_INT);
$sql->bindParam(':id_vendedor', $id_vendedor, PDO::PARAM_INT);
$sql->execute();


/*
$sql->execute([
    'campo1' => "hola",
    'campo2' => "mundo",
    'campo3' => "cruel",
]);
*/

$ultimo_ID_ingresado = $pdo_con->lastInsertId();

if($ultimo_ID_ingresado > 0){

    echo "<div class='content alert alert-primary' > Datos Agregados Correctamente   </div>";
    

}else{

    echo "<div class='content alert alert-danger'> No se pueden agregar datos.   </div>";
    print_r($sql->errorInfo()); 

}

?>

</body>
</html>

