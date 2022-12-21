<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $cantidad = $_POST['cantidadParametro'];
    $subTotal = $_POST['subTotalParametro'];
    $id = $_POST['idProducto'];
    session_start();
