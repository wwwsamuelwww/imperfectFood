<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    <title>Imperfect Food</title>
    

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="paginaPrincipal.html">

          <strong>Imperfect food</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
          </div>


        </div>
      </nav>
    <div class = "container">
        <div class="text-center">
            <h2>Registro de Producto</h2>
        </div class="alert alert-danger" role="alert">
            <div class="row justify-content-center my-5">
                <div class="col-lg-7">
                    <form action="registrarProductos.php" method="post">
                        
                        <label for="NombreDeProducto" class ="form-label">Nombre de Producto:</label>
                        <input type="text" name="NombreDeProducto" id="NombreDeProducto" class = "form-control" minlength = 3 maxlength = 20 required>
                      
                        <label for="Precio" class ="form-label">Precio:</label>
                        <input type="text" name="Precio" id="Precio" class = "form-control" required>
                        
                        <label for="PrecioDeOferta" class ="form-label">Precio de oferta:</label>
                        <input type="text" name="PrecioDeOferta" id="PrecioDeOferta" class = "form-control" minlength = 6 maxlength = 14 required>

                        <label for="Stock" class ="form-label">Stock:</label>
                        <input type="text" name="Stock" id="Stock" class = "form-control" required >
                        
                        <label for="FechaDeVencimiento" class ="form-label">Fecha de vencimiento:</label>
                        <input type="text" name="FechaDeVencimiento" id="FechaDeVencimiento" class = "form-control" required>

                        <label for="Descripcion" class ="form-label">Descripción:</label>
                        <input type="text" name="Descripcion" id="Descripcion" class = "form-control" required>
                        
                        <label for="Imagen" class ="form-label">Subir una imagen:</label>
                        <input type="file" name="Imagen" id="Imagen" class = "form-control" required>
                        
                        <br/>

                        <div class = text-center>
                            <button type="button" href="paginaPrincipal.html" class="btn btn-danger">
                                <a style="text-decoration:none; color:white" href="paginaPrincipal.php">Cancelar </a>
                            </button>
                            <button id="botonregistrar" type="submit" class="btn btn-success">
                                <a style="text-decoration:none; color:white" href="paginaPrincipal.php">Agregar Producto</a>
                            </button>
                            
                            
        
                        </div>
                    </form>
                </div>
                <div class = text-center>
                </div>
                
            </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
    
</body>
</html>