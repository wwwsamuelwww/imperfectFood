<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    session_start();
    $idusuario = $_SESSION['idUsuario'];
