<?php

    $host = 'localhost';
    $bd='imperfectfood';
    $user='postgres';
    $pass='betaalfa800135555';

    $conexion = pg_connect("host=$host dbname=$bd user=$user password=$pass");

    $query=("INSERT INTO productos(nombreproducto,precio,preciooferta,stock,descripcion)VALUES('$_REQUEST[NombreDeProducto]','$_REQUEST[Precio]','$_REQUEST[PrecioDeOferta]','$_REQUEST[Stock]','$_REQUEST[Descripcion]')");
    
    $consulta=pg_query($conexion,$query);
    pg_close();
    echo 'Datos ingresados correctamente';	
?>