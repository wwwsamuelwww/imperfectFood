<?php
    require 'conexion.php';
    session_start();
    $_SESSION['email1'] = $_POST['Email'];
    $_SESSION['pass1'] = $_POST['password'];

    $emailactual = $_SESSION['email1'];
    $passactual = $_SESSION['pass1'];

    $tablaTipoUsuario=pg_query($conexion,"SELECT usuarios.tipo_usuario FROM usuarios WHERE usuarios.email = '$emailactual' AND usuarios.contrasenia = '$passactual' LIMIT 1");
    $fila = pg_fetch_row($tablaTipoUsuario);
    $tipoUsuario = $fila[0];

    $tipoVendedor = "V";
    $tipoComprador = "C";

    echo $tipoUsuario;

    if (strcmp($tipoUsuario, $tipoVendedor) === 0){
        $url = 'paginaPrincipalConPerfil.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
    elseif(strcmp($tipoUsuario, $tipoComprador) === 0){
        $url= 'paginaPrincipalConPerfil.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    } 
    else{
        $url= 'login.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }        
?>