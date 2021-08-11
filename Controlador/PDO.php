<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probando PDO</title>
</head>
<body>
    
<?php
    include_once("ABML.php");

    if (Pedidos_Model::Agregar_Pedido_Static("1"	"Juan Perez"	"2021-04-20"	"1"	  "0") > 0)
        echo "<br>Registro ingresado con Éxito";
    else
        echo "<br>ERROR al ingresar registro";


/*
    // Agregar Pedido desde SP
       $id = Pedidos_Model::Agregar_Pedido_SP(192416, "Roberto", "Enrique", "Perez", "Rrodriguez", "20051003");
    
    if ($id > 0)
        echo "<br>Registro ingresado con Éxito";
    else
        echo "<br>ERROR al ingresar registro :: " + $id;
*/


/*
    if (Pedidos_Controller::Modificar_Pedido_Static(19245911, "R2", "E2", "P2", "R2", "19751103") == true)
        echo "<br>Registro modificado con Éxito";
    else
        echo "<br>ERROR al modificar registro";
*/
        echo "<br><br>";

        Pedidos_Model::Listar_Pedidos();

        echo "<br><br>";

        Pedidos_Model::Listar_Pedidos_SP();

        echo "<br><br>";

?>



</body>
</html>