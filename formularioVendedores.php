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
            <h2>Registro de Vendedores</h2>
        </div class="alert alert-danger" role="alert">
            <div class="row justify-content-center my-5">
                <div class="col-lg-7">
                    <form action="registrarVendedores.php" method="post" enctype = "multipart/form-data" class="needs-validation" novalidate>
                      <div class="col-md-8">
                          <label for="NombreNegocio" class="form-label">Nombre de Negocio:</label>
                          <input type="text" name="NombreNegocio" id="NombreNegocio"class="form-control" pattern = "^[A-Z|a-z|0-9|`|&|.|\s]{3,20}$" required>
                          <div class="invalid-feedback">
                            Ingrese un nombre valido
                          </div>
                      </div>

                        <div class="col-md-8">
                          <label for="Email" class="form-label">Email: </label>
                          <input type="text" name="Email" id="Email" class="form-control" placeholder="example@gmail.com" pattern = "^[^ ]+@[^ ]+\.[a-z]{2,3}$" placeholder = "ejemplo@gmail.com" required>
                          <div class="invalid-feedback">
                            Ingrese un email valido
                          </div>
                        </div>

                        <div class="col-md-8">
                          <label for="Password" class="form-label">Contraseña:</label>
                            <input type="password" name="Password" id="Password" class="form-control" pattern = "^[A-Z|a-z|0-9]{6,14}$" required>
                            <div class="invalid-feedback">
                                La contraseña debe tener minimo 6 caracteres y maximo 14
                            </div>
                        </div>

                        <div class="col-md-8">
                          <label for="Telefono" class="form-label">Telefono: </label>
                          <input type="text" name="Telefono" id="Telefono" class="form-control" pattern = "[7|6][0-9]{7}$" required>
                          <div class="invalid-feedback">
                            El telefono debe tener 8 digitos y comenzar con el 6 o el 7
                          </div>
                        </div>

                        <div class="col-md-8">
                          <label for="validationCustom05" class="form-label">Ubicacion: </label>
                          <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" placeholder="https://goo.gl/maps/........." pattern = "https:\/\/goo.gl\/maps+\/\w+" required>
                          <div class="invalid-feedback">
                            Ingrese una ubicacion valida
                          </div>
                        </div>
                        
                        <div class="col-md-8">
                          <label for="Descripcion" class="form-label">Descripcion: </label>
                          <input type="text" name="Descripcion" id="Descripcion" class = "form-control" pattern =  ^[A-Z|a-z|0-9]{30,300}$>
                        </div>

                        <div class="col-md-8">
                          <label for="ImagenVendedor" class="form-label">Ingresar una imagen: </label>
                          <input type="file" name="ImagenVendedor" id="ImagenVendedor" class = "form-control">
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
    <script src="validacion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
    
</body>
</html>