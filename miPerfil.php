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

      $result = pg_query($con,"SELECT usuarioimagenes.idvendedor,nombrenegocio,email,contrasenia,telefono,ubicacion,descripcion,ruta FROM vendedores,usuarioimagenes WHERE vendedores.idvendedor = usuarioimagenes.idvendedor ORDER BY idvendedor DESC LIMIT 1");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
          <a class="navbar-brand" href="#">Imperfect Food</a>
       </div>
    </nav>

    <div class = "row justify-content-center my-4">
        <div class="text-center">
            <h2>Mi perfil</h2>
        </div>
    </div>

        <?php if (is_array($resultado) || is_object($resultado)): {foreach($resultado as $row): ?>
          <div class="row justify-content-center my-2">
            <div class="col-lg-4">
              <div class="card mb-4 border-0" >
                <div class="card-body text-center" >
                  <img src="<?php echo $row['ruta'];?>" width="180" height="200" alt="avatar"
                    class="rounded-0" style="width: 150px;">
                </div>
              </div>
            </div>
  
            <div class="col-lg-5">
              <div class="card mb-4 rounded-0">
                <div class="card-body rounded-0">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nombre:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['nombrenegocio'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['email'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Contraseña:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['contrasenia'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Telefono:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['telefono'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Ubicacion:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['ubicacion'];?></p>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Descripcion:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['descripcion'];?></p>
                    </div>
                  </div>
                  <?php endforeach;} endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center">
            <div class="row justify-content-center my-5">
                <div class="col-2">
                    <a href="paginaPrincipal.php" class="btn btn-danger" role="button">Volver</a>
                </div>
                <!--
                <div class="col-2">
                    <a href="miPerfil.html" class="btn btn-success" role="button">Editar Perfil</a>
                </div>
                 -->
                <div class="col-2">
                    <a href="formularioProductos.php" class="btn btn-success" role="button">Añadir Producto</a>
                </div>
            </div>
        </div>

    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
</body>
</html>