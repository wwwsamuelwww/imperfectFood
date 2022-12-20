<?php  
       $servername = "localhost";
       $database = "imperfectfood";     
       $username = "root";
       $password = "";
       $conn = mysqli_connect($servername, $username, $password, $database);
       session_start();
       $idusuario = $_SESSION['idUsuario'];
       $resultado2 = mysqli_query($conn,"SELECT * FROM carrito, productos WHERE carrito.idproducto = productos.id AND carrito.idcomprador = '$idusuario'");
       $resultadoFinal = "";
       foreach($resultado2 as $row2){
                    
                $resultadoFinal = $resultadoFinal.'<p> '.$row2['cantidad'].' '.$row2['NombreDeProducto'].' '.$row2['subtotal']. ' bs</p>';
               
        }
        echo "$resultadoFinal";
