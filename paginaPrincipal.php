<?php


      $host = 'localhost';
      $bd='imperfectfood';
      $user='postgres';
      $pass='betaalfa800135555';

      $conexion = pg_connect("host=$host dbname=$bd user=$user password=$pass");

      $consulta=pg_query($conexion,"SELECT nombreproducto,precio,preciooferta,stock,descripcion FROM productos");
      $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperfect Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">
</head>
      </div>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
            <a href="#" class="navbar-brand">
             <b>Imperfect Food</b>
            </a>
            <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarHeader" 
            aria-controls="navbarHeader" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHeader">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="formularioProductos.php">Agregar Producto</a></li>
                      <li><a class="dropdown-item" href="#">Todos los Productos</a></li>
                    </ul>
                  </li>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Vendedores
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Iniciar sesion</a></li>
                    <li><a class="dropdown-item" href="formularioVendedores.php">Registro Vendedor</a></li>
                  </ul>
                </li>
              </ul>
            
              <!--<a href="carrito.html" class="btn btn-primary">Carrito</a>--> 
            </div>
          </div>
        </div>
      </header>

      <main>
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <img src="imagenes/cocaína.jpg" alt="">   
                <div class="card-body">
                  <h5 class="card-text">Cocaína</h5>
            
                  <p class="card-text">Bs. 69</p>
                  <p class="card-text">Bs. 69</p>
                  <p class="card-text">Bs. 69</p>
                  <p class="card-text">Bs. 69</p>
                 
                  
                  <!--
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-primary"> Detalles</a>
                    </div>
                      <a href="" class="btn btn-success">Comprar</a>
                  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

  
  <script src="/javascript/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
      crossorigin="anonymous"></script>

</body>
</html>