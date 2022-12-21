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
    $idusuario = $_SESSION['idUsuario'];
    $resultado = mysqli_query($conn,"UPDATE carrito SET carrito.cantidad = '$cantidad',carrito.subtotal = '$subTotal' WHERE carrito.idcomprador = '$idusuario' AND carrito.idproducto = '$id'");

?>
