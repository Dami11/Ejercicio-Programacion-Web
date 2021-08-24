<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles.css">

    <title>Document</title>
</head>
<body>
    

<!--Formulario-->

<form action="" method="POST"><br>Ingrese su pedido:

<br>

<label for="txt_prod">Pedido: </label>
<input type="text" name="txt_prod" required>
<br>

<label for="txt_cant">Cantidad: </label>
<input type="text" name="txt_cant" required>


</form>

<?php
include "../Modelo/ABML.php";


// Obtengo los datos enviados por el Formulario

$producto = $_POST['txt_prod'];
$cantidad = $_POST['txt_cant'];


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

    
     <!-- Header y Barra de navegación -->

   
     <div class="p-2 mb-2 bg-dark text-white">




      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="inicio.html">Inicio<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="NuestrosProductos.html">Nuestros Productos</a>
            </li>      
            <li class="nav-item">
              <a class="nav-link" href="QuienesSomos.html">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contacto.html">Contacto</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </div>

             <!-- Header y Barra de navegación -->
     




  

</body>
</html>



<!--Formulario-->




             
  
        <!-- Footer --> 
<footer class="mt-5 text-center text-lg-start bg-dark text-white">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-3 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Conócenos:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Compañia
          </h6>
          <p>
            LaptOS
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Productos
          </h6>
          <p>
            <a href="NuestrosProductos.html" class="text-reset">Laptops</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Mas información
          </h6>
        
          <p>
            <a href="#!" class="text-reset">Configuración</a>
          </p>
    
          <p>
            <a href="#!" class="text-reset">Ayuda</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contacto
          </h6>
          <p><i class="fas fa-home me-3"></i>Av. Rivera y Tomás de Tezanos, Montevideo, UY</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            Dabansa1109@gmail.com
          </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="inicio.html">LaptOS.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
        

</body>
</html>

