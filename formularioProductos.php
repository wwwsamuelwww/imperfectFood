
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
       <div class="container-fluid" style="font-family:Helvetica;font-size: 18px">
          <a class="navbar-brand" href="paginaPrincipalConPerfil.php">Imperfect Food</a>
       </div>
    </nav>

    <div class = "container" >
        <div class="text-center" style="font-family:Arial;font-size: 18px">
            <h2>Registro de Producto</h2>
        </div class="alert alert-danger" role="alert">
            <div class="row justify-content-center my-5" style="font-family:Arial;font-size: 16px">
                    <form action="registrarProductos.php" method="post" enctype = "multipart/form-data" class="needs-validation" novalidate>


                      <div class="row justify-content-center my-1">

                        <div class="col-lg-5">

                          <label for="NombreDeProducto" class="form-label">Nombre de Producto:</label>
                          <input type="text" name="NombreDeProducto" id="NombreDeProducto" class="form-control" pattern ="^[A-Z|a-z|0-9|\s|/]{3,20}$" required>
                          <div class="invalid-feedback">
                            Ingrese un nombre de producto valido
                          </div>

                          <label for="Precio" class="form-label">Precio: </label>
                          <input type="text" name="Precio" id="Precio" class="form-control" pattern=^[1-9]$|^[1-9][0-9]{1,3}$|^[0-9]{1,3}[,]([0][1-9]|[1-9][0-9])$|^10000$ required>
                          <div class="invalid-feedback">
                            Ingrese un monto mayor a 0,00 y menor a 10000,00
                          </div>

                          <label for="PrecioDeOferta" class="form-label">Precio de Oferta:</label>
                          <input type="text" name="PrecioDeOferta" id="PrecioDeOferta" class="form-control" pattern= ^[1-9]$|^[1-9][0-9]{1,3}$|^[0-9]{1,3}[,]([0][1-9]|[1-9][0-9])$|^10000$ required>
                          <div class="invalid-feedback">
                            Ingrese un monto mayor a 0,00 y menor a 10000,00
                          </div>

                          <label for="Stock" class="form-label">Stock: </label>
                          <input type="text" name="Stock" id="Stock" class="form-control" pattern=^([1-9][0-9]{0,3}|10000)$ required>
                          <div class="invalid-feedback">
                          Ingrese un stock mayor a 0 y menor a 10 000
                          </div>

                          
                          <label for="Descripcion" class="form-label">Descripción: </label>
                          <input type="text" name="Descripcion" id="Descripcion" class = "form-control" pattern ="^[A-Z|a-z|0-9|.|,|\s|\]{30,300}$">
                          
                        </div>

                        <div class="col-lg-4 align-self-center">
                          <style>
                            #output { 
                           position:relative; 
                           left:70px; 
                          } 
                          </style>
                          
                          <img  id="output" top= ""width="200px" height="200px"/>
                            <div style="opacity: 0;">
                              Textosasasa
                            </div>
                          <div class="row">
                            <input type="file" name="Imagen" id="Imagen" class = "form-control" accept="image/png, image/jpeg" onchange="loadFile(event)"  required>
                          <div class="invalid-feedback">Necesita ingresar una imagen</div>
                          </div>
                          
                          <script>
                            var loadFile = function(event) {
                              var output = document.getElementById('output');
                              output.src = URL.createObjectURL(event.target.files[0]);
                              output.onload = function() {
                                URL.revokeObjectURL(output.src) 
                              }
                            };
                          </script>

                        </div>

                        <div class="d-flex justify-content-center flex-nowrap my-3">
                              <div >
                                  <a href="paginaPrincipalConPerfil.php" class="btn btn-danger rounded-0" role="button">Cancelar</a>
                              </div>
                              <div style="opacity: 0;">
                                Textosasasa
                              </div>
                              <div>
                                  <button type="submit" class="btn btn-success rounded-0">Registrar</button>
                              </div>
                        </div>
                      </div>
                    </form>
            </div>
    </div>

    <script src="validacion.js"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>

</body>
</html>