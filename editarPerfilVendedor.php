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

$result = mysqli_query($conn,"SELECT NombreNegocio, contrasenia, Email, Telefono, Ubicacion, Descripcion,ImagenVendedor FROM vendedores WHERE vendedores.Email = '$ema' AND vendedores.contrasenia = '$pas' LIMIT 1");

if(!$result){
   echo "ocurrio un error";
   exit;
