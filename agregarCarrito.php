<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $idcapturado = $_POST['valorNumero'];
    session_start();
    $idusuario = $_SESSION['idUsuario'];
$resultadoSiExisteProducto = mysqli_query($conn,"SELECT * FROM carrito WHERE carrito.idcomprador = '$idusuario' AND carrito.idproducto = '$idcapturado'");
    if (mysqli_num_rows($resultadoSiExisteProducto) === 0){
        $precioOfertaProducto = mysqli_query($conn,"SELECT productos.PrecioDeOferta FROM productos WHERE productos.id = '$idcapturado'");
        $row = mysqli_fetch_row($precioOfertaProducto);
        $precio = $row[0];
        $precioConvertido = floatval($precio);
        $resultado = mysqli_query($conn,"INSERT INTO carrito(idcomprador,idproducto,cantidad,subtotal) VALUES ('$idusuario','$idcapturado',1,'$precioConvertido')");    }
?>
                  
