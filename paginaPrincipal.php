<?php

$hostname = "localhost";
$database = "imperfectfood";
$username = "postgres";
$password = "betaalfa800135555";

$con = pg_connect("host=$hostname dbname=$database user=$username password=$password");

if(!$con){
  echo "error de conexion";
  exit;
}

$result = pg_query($con,"SELECT nombreproducto,precio,preciooferta,stock,descripcion,ruta FROM productos,imagenesproductos WHERE productos.idproducto = imagenesproductos.idproducto ");
if(!$result){
  echo "ocurrio un error";
  exit;
}
$resultado =  pg_fetch_all($result);




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
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
        <a class="navbar-brand" href="#">Imperfect Food</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Vendedores
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="formularioVendedores.php">Registrarse</a></li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
      </nav>
 
       <div class="container my-4">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php if (is_array($resultado) || is_object($resultado)): {foreach($resultado as $row): ?> 
              <div class="col">
                <div class="card shadow-sm border-danger">
                  <div class="row justify-content-center ">
                    <div class="col">
                      <div class="card mb-1 border-0" >
                        <div class="card-body text-center" >
                          <img src="<?php echo $row['ruta'];?>"  width="200" height="200">
                            <div class="text-center">
                               <h4> <?php echo $row['nombreproducto'];?> </h4>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col">
                      <div class="card-body">
                        <div class="card mb-4 border-0 text-white bg-danger text-center rounded" >
                          <div class="card-body "> 
                              Oferta: <?php echo $row['preciooferta'];?>
                          </div>
                        </div>
                          <h6 class="card-text">Precio: <?php echo $row['precio'];?> </h6>
                          <h6 class="card-text">Stock: <?php echo $row['stock'];?></h6>
                          <p> <?php echo $row['descripcion'];?></p>
                        </div>
                      </div>
                   </div>
              </div>
            </div>
          </div>
          <?php endforeach; } endif;?>
        </div>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
      crossorigin="anonymous"></script>

</body>
</html>