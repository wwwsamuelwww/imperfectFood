<?php

    $host = 'localhost';
    $bd='imperfectfood';
    $user='postgres';
    $pass='betaalfa800135555';

    $conexion = pg_connect("host=$host dbname=$bd user=$user password=$pass");

    $query=("INSERT INTO vendedores(nombrenegocio,email,contrasenia,telefono,ubicacion,descripcion)VALUES('$_REQUEST[NombreNegocio]','$_REQUEST[Email]','$_REQUEST[Password]','$_REQUEST[Telefono]','$_REQUEST[Ubicacion]','$_REQUEST[Descripcion]')");

    $consulta=pg_query($conexion,$query);
    pg_close();
    echo 'Datos ingresados correctamente';	
?>