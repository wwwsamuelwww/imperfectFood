<?php    

    require 'conexion.php';

    session_start();

    $nombre = $_POST['NombreNegocio'];
    $contra = $_POST['Pass'];
    $telefono = $_POST['Telefono'];
    $ubicacion = $_POST['Ubicacion'];
    $descripcion= $_POST['Descripcion'];
    

    $emailactual = $_SESSION['email1'];
    $passactual = $_SESSION['pass1'];

    
    include_once 'google-api-php-client-v2.7.2-PHP7.0/vendor/autoload.php';

      // Variables de credenciales.
      $claveJSON = '1Apo5zjDAftK5vAAt52BSatM-2SvTIDek';
      $pathJSON = 'crucial-baton-365602-b15bece877db.json';
            
      //configurar variable de entorno
      putenv('GOOGLE_APPLICATION_CREDENTIALS=crucial-baton-365602-b15bece877db.json');
        
      $client = new Google_Client();
      $client->useApplicationDefaultCredentials();
      $client->setScopes(['https://www.googleapis.com/auth/drive.file']);
            try{	
                $nombre = $_FILES['ImagenVendedor']['name'];
                //instanciamos el servicio
                $service = new Google_Service_Drive($client);
                $file_path = $_FILES['ImagenVendedor']['tmp_name'];
               
                //instacia de archivo
                $file = new Google_Service_Drive_DriveFile();
                $file->setName($nombre);

                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo,$file_path);
        
               
                //id de la carpeta donde hemos dado el permiso a la cuenta de servicio 
                $file->setParents(array('1Apo5zjDAftK5vAAt52BSatM-2SvTIDek'));
                $file->setMimeType($mime_type);
                $result = $service->files->create(
                  $file,
                  array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime_type,
                    'uploadType' => 'media',
                  )
                );
            
                $ruta = 'https://drive.google.com/uc?export=download&id=' . $result->id;
                $extension = $_FILES['ImagenVendedor']['type'];

                $idusuario = pg_query($conexion,"SELECT id_imagen FROM usuarios WHERE usuarios.email = '$emailactual' and usuarios.contrasenia = '$passactual'");            
                $fila = pg_fetch_row($idusuario);
                $idImagen = $fila[0];

                $idusuario=pg_query($conexion,"UPDATE imagenes SET nombre='$nombre',ruta='$ruta',extension='$extension' WHERE id_imagen = '$idImagen'");
    
                $resultado=pg_query($conexion,"UPDATE usuarios SET nombre='$nombre',contrasenia='$contra',telefono='$telefono',ubicacion='$ubicacion',descripcion='$descripcion' WHERE usuarios.email = '$emailactual' and usuarios.contrasenia = '$passactual'");

                pg_close();
                
                }catch(Google_Service_Exception $gs){
                    $m=json_decode($gs->getMessage());
                    echo $m->error->message;
                }catch(Exception $e){
                    echo $e->getMessage();  
                }

    $url= 'paginaPrincipal.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    
?>