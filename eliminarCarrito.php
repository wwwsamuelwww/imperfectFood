<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $idcapturado = $_POST['idProducto'];
    session_start();
    $idusuario = $_SESSION['idUsuario'];
