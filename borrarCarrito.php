<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    session_start();
    $idusuario = $_SESSION['idUsuario'];
$resultado = mysqli_query($conn,"DELETE FROM carrito WHERE carrito.idcomprador = '$idusuario'");
    $url= '../paginaPrincipalCompradores.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
