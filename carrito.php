<?php
       $servername = "localhost";
       $database = "imperfectfood";     
       $username = "root";
       $password = "";
       $conn = mysqli_connect($servername, $username, $password, $database);
       session_start();
       $idusuario = $_SESSION['idUsuario'];

       $resultado = mysqli_query($conn,"SELECT productos.id,productos.ImagenProducto,productos.NombreDeProducto,productos.PrecioDeOferta,productos.Stock,carrito.cantidad,carrito.subtotal FROM carrito,productos WHERE carrito.idcomprador = '$idusuario' AND carrito.idproducto = productos.id");




?>
