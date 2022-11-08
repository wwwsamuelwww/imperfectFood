<?php

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

session_start();
$ema = $_SESSION['email1'];
$pas = $_SESSION['pass1'];

$result = mysqli_query($conn,"SELECT NombreNegocio, contrasenia, Email, Telefono, Ubicacion FROM compradores WHERE compradores.Email = '$ema' AND compradores.contrasenia = '$pas' LIMIT 1");

if(!$result){
   echo "ocurrio un error";
   exit;
}

for($i = 0; $resultado[$i] = mysqli_fetch_assoc($result); $i++) ;
array_pop($resultado);    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/estiloFormularioCompradores.css">
  <title>Imperfect Food</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <img height="45px" alt="logo" src="imagenes/Logo-Barra.jpeg">

     <div class="container-fluid" style="font-family:Helvetica;font-size: 18px">

        <a class="navbar-brand" href="paginaPrincipalCompradores.php">Imperfect Food</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <p style="opacity: 0;">Para rellenar</p>
        </div>
   
     </div>
  </nav>
  
  
  <section class="fondoCompradores">  
    <div class = "container">
          
          <div class="row justify-content-center my-1">
            <form action="conexiones/guardarPerfilComprador.php" method="post" enctype="multipart/form-data" class="needs-validation"
              novalidate>
              <div class="row justify-content-center my-1">
              <?php if (is_array($resultado) || is_object($resultado)): foreach($resultado as $row){ ?>
                <div class="col-lg-5" style=" margin-top: 50px; border-radius: 10px; box-shadow: 10px 10px 10px -6px black; background-color: white;">
                  <div class="text-center">
                     <h2>Editar Perfil</h2>
                  </div class="alert alert-danger" role="alert">
      
                  <div class="col">
