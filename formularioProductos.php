
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
          <a class="navbar-brand" href="#">Imperfect Food</a>
       </div>
    </nav>


    <div class = "container">
        <div class="text-center">
            <h2>Registro de Producto</h2>
        </div class="alert alert-danger" role="alert">
            <div class="row justify-content-center my-5">
                <div class="col-lg-7">
                    <form action="registrarProductos.php" method="post" enctype = "multipart/form-data" class="needs-validation" novalidate>
                        
                      <div class="col-md-8">
                          <label for="NombreDeProducto" class="form-label">Nombre de Producto:</label>
                          <input type="text" name="NombreDeProducto" id="NombreDeProducto" class="form-control" pattern = "^[A-Z|a-z|0-9]{3,20}$" required>
                          <div class="invalid-feedback">
                            Ingrese un nombre de producto valido
                          </div>
                      </div>

                        <div class="col-md-8">
                          <label for="Precio" class="form-label">Precio: </label>
                          <input type="text" name="Precio" id="Precio" class="form-control" pattern=^([1-9][0-9]{0,3}|10000)$ required>
                          <div class="invalid-feedback">
                            Ingrese un monto mayor a 0 y menor a 10 000
                          </div>
                        </div>


                        <div class="col-md-8">
                          <label for="PrecioDeOferta" class="form-label">Precio de Oferta:</label>
                            <input type="text" name="PrecioDeOferta" id="PrecioDeOferta" class="form-control" pattern=^([1-9][0-9]{0,3}|10000)$ required>
                            <div class="invalid-feedback">
                            Ingrese un monto mayor a 0 y menor a 10 000
                            </div>
                        </div>

                        <div class="col-md-8">
                          <label for="Stock" class="form-label">Stock: </label>
                          <input type="text" name="Stock" id="Stock" class="form-control" pattern=^([1-9][0-9]{0,3}|10000)$ required>
                          <div class="invalid-feedback">
                          Ingrese un monto mayor a 0 y menor a 10 000
                          </div>
                        </div>

                        <div class="col-md-8">
                          <label for="Descripcion" class="form-label">Descripcion: </label>
                          <input type="text" name="Descripcion" id="Descripcion" class = "form-control">
                        </div>

                        <div class="col-md-8">
                          <label for="Imagen" class="form-label">Ingresar una imagen: </label>
                          <input type="file" name="Imagen" id="Imagen" class = "form-control">
                        </div>
                        

                        <div class="text-center">
                            <div class="row justify-content-center my-3">
                                <div class="col" >
                                    <a href="paginaPrincipal.php" class="btn btn-danger" role="button">Cancelar</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </form>
                </div>      
            </div>
    </div>

    <script src="validacion.js"> </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>

    
</body>
</html>