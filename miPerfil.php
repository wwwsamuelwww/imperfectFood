<?php

      require 'conexion.php';

      session_start();

      $ema = $_SESSION['email1'];
      $pas = $_SESSION['pass1'];


      $tablaDeDatos = pg_query($conexion,"SELECT usuarios.nombre,email,telefono,ubicacion,descripcion,ruta FROM usuarios,imagenes WHERE usuarios.email = '$ema' and usuarios.contrasenia = '$pas'and usuarios.id_imagen = imagenes.id_imagen");

      $resultado =  pg_fetch_all($tablaDeDatos);

     



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
    <title>Imperfect Food</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
          <a class="navbar-brand" href="paginaPrincipalConPerfil.php">Imperfect Food</a>
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
                  <img src="<?php echo $row['ruta'];?>" width="200" height="200" alt="avatar"
                    class="rounded-0" style="width: 150px;">
                </div>
              </div>
            </div>
  
            <div class="col-lg-5">
              <div class="card mb-4 rounded-0">
                <div class="card-body rounded-0">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nombre de negocio:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['nombre'];?></p>
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
                      <p class="mb-0">Teléfono:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['telefono'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Ubicación:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['ubicacion'];?></p>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Descripción:</p>
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
                    <a href="paginaPrincipalConPerfil.php" class="btn btn-danger rounded-0" role="button">Volver</a>
                </div>
                
                <div class="col-2">
                    <a href="editarPerfil.php" class="btn btn-success" role="button">Editar Perfil</a>
                </div>
                
                <div class="col-2">
                    <a href="formularioProductos.php" class="btn btn-success rounded-0" role="button">Añadir Producto</a>
                </div>
            </div>
        </div>

    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
</body>
</html>