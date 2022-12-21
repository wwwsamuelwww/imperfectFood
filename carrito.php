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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperfect Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid" style="font-family:Helvetica;font-size: 18px">
        <a href ="paginaPrincipalVendedores.php">
            <img src="imagenes/Logo-Barra.jpeg" height="45px" alt="logo"> 
        </a>
        <a class="navbar-brand" href="paginaPrincipalVendedores.php">Imperfect Food</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
           </div>
        </div>
     </nav>

<br>
<br>

<div class="text-center" style="font-family:Arial;font-size: 18px">
        <h2>Carrito de Compras</h2>       
</div class="alert alert-danger" role="alert">

  <br>


  <div class="container-md">
    <div class="row">
      <div class="row row-cols-1" >
         <?php $variable = 0 ; if (is_array($resultado) || is_object($resultado)): foreach($resultado as $row){ ?>
              <div class="col">
                <div class="card shadow-sm border-danger" style="height:100%!important;">
                  <div class="row justify-content-center ">
                    <div class="col-md-3">
                      <div class="card mb-1 border-0" >
                        
                          <img src="data:image/jpg;base64,<?php echo base64_encode($row['ImagenProducto']);?>"  width="180" height="180"> 
                        
                      </div>
                    </div>
                    <div class="col-md-2" id="espacio">
                             <br>
                             <br>
                             <br>
                             <div class="text-center">
                               <h5> <?php echo $row['NombreDeProducto'];?> </h5>
                             </div>
                    </div>   
                    
                    <div class="col">
                      
                      <div class="card-body">
                        
                        <div class="card mb-4 border-0 text-white bg-danger text-center rounded" >
                         
                        </div >
                            <button id='disminuir' onclick="disminuir('<?php echo $row['id'];?>','<?php $var = 'C'; echo $row['id'].$var;?>')">-</button>

                            <input type='text' id="<?php echo $row['id'];?>" value = "<?php echo $row['cantidad'];?>" readonly>
                          
                            <button id='aumentar' onclick="aumentar('<?php echo $row['id'];?>','<?php $var = 'C'; echo $row['id'].$var;?>','<?php echo $row['Stock'];?>')">+</button>
                          <input type='text' id="<?php $var = 'C'; echo $row['id'].$var;?>" value= "<?php echo $row['subtotal'];?>" readonly>
                            <script>
                                function aumentar(idProducto,idPrecioOferta,stock){
                                    var cantidad = ++document.getElementById(idProducto).value;
                                    var limite = Number(stock)+1;
                                    if(cantidad < limite){
                                       cantidad = --document.getElementById(idProducto).value;
                                       var variableAumentar = (1/cantidad)*Number(document.getElementById(idPrecioOferta).value);
                                       var convertido = Number(document.getElementById(idPrecioOferta).value);
                                       document.getElementById(idPrecioOferta).value = convertido + variableAumentar;
                                       document.getElementById(idProducto).value++;
                                       cantidad++;
                                       var convertido1 = Number(variableAumentar);
                                       var convertido2 = Number(document.getElementById('CostoTotal').value)
                                       var sumado = convertido1 + convertido2;
                                       document.getElementById('CostoTotal').value = sumado;
                                    }
                                    else{
                                      cantidad = --document.getElementById(idProducto).value;
                                    }
                                    var idProd = idProducto;
                                    var sub = document.getElementById(idPrecioOferta).value;
                                    var parametros ={
                                                  "cantidadParametro" :cantidad,
                                                  "idProducto"        :idProd,
                                                  "subTotalParametro" :sub};
                                    $.ajax({
                                      data:   parametros,
                                      url:    'conexiones/actualizarCarrito.php',
                                      type:   'post',
                                      success: function(){
                                      }
                                    });
                                  }
                                function disminuir(idProducto,idPrecioOferta){
                                      var cantidad = --document.getElementById(idProducto).value;
                                      if(cantidad != 0){
                                          cantidad = document.getElementById(idProducto).value;
                                          cantidad++;
                                          var variableRestar = (1/cantidad)*Number(document.getElementById(idPrecioOferta).value);
                                          var convertido = Number(document.getElementById(idPrecioOferta).value);
                                          document.getElementById(idPrecioOferta).value = convertido - variableRestar;
                                          var convertido1 = Number(variableRestar);
                                          var convertido2 = Number(document.getElementById('CostoTotal').value)
                                          var restado = convertido2-convertido1;
                                          document.getElementById('CostoTotal').value = restado;
                                          cantidad--;
                                      }
                                      else{
                                         cantidad = ++document.getElementById(idProducto).value
                                      }
                                      var idProd = idProducto;
                                      var sub = document.getElementById(idPrecioOferta).value;
                                      var parametros ={
                                                  "cantidadParametro" :cantidad,
                                                  "idProducto"        :idProd,
                                                  "subTotalParametro" :sub };
                                      $.ajax({
                                          data:   parametros,
                                          url:    'conexiones/actualizarCarrito.php',
                                          type:   'post',
                                          success: function(){
                                          }
                                      });
                                    
                                    }
                              </script>
                      </div>
                      <div>
                        <button type="button" class="btn btn-success" id='eliminar' onclick="eliminar('<?php echo $row['id'];?>')"> Eliminar</button>
                            <script>
                                function eliminar(idProducto){ 
                                    var idProdu = idProducto;

                                    var parametros ={ "idProducto"        :idProdu};
                                    $.ajax({
                                      data:   parametros,
                                      url:    'conexiones/eliminarCarrito.php',
                                      type:   'post',
                                      success: function(){
                                        window.location.href = 'carrito.php';
                                      }
                                    });
                                }
                            </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             <div>
              <p></p>
             </div>
            <?php $variable += 1;} endif;?>
           
           <div>
           <br>
           <br>
           <div class="text-center">
                  <p >Costo Total: </p>
                  <input type='text' id="CostoTotal" value = 0 readonly>
           </div>
            <script>
               window.onload = function funcionTotal(){
                      
                      var parametros ={ };
                      $.ajax({
                         data:   parametros,
                         url:    'conexiones/refrescarCarrito.php',
                         type:   'post',
                         success: function(resp){
                          document.getElementById('CostoTotal').value = resp;
                         }
                      });
               }
            </script>
           <br>
           <br>
           <button type="button" onclick="location.href='paginaPrincipalCompradores.php'"  class="btn btn-primary">Volver</button>
           <button type="button" class="btn btn-success" id="btn-abrir-modal">Realizar pedido</button>

           <dialog id="modal">
               <h2>Lista de Compras:</h2>

               <div>
                

               <p id="Datos"></p>
                
               Costo Total:

               <p id="resTot"></p>
                

               
               </div>
               
            <br>
              <a href="conexiones/borrarCarrito.php" class="btn btn-success rounded-0" role="button">Hecho</a>

          </dialog>
            <script src="app.js"></script>
          


      </div>
     </div>
  </div>
</body>


<script src="javascript/Data.js"></scrip>
<script src="javascript/cart.js"></>

</html>
