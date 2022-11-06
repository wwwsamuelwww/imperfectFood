<?php

      require 'conexion.php';
      

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

                $insertarimagen = pg_query($conexion,"INSERT INTO imagenes(nombre,ruta,extension) VALUES ('$nombre','$ruta','$extension')");
                $consulta_id_imagen = pg_query($conexion,"SELECT id_imagen FROM imagenes ORDER BY id_imagen DESC LIMIT 1");
                $fila = pg_fetch_row($consulta_id_imagen);
                $idimagen = $fila[0];
                $insertarvendedor = pg_query($conexion,"INSERT INTO usuarios(nombre,email,contrasenia,telefono,ubicacion,descripcion,tipo_usuario,id_imagen)VALUES('$_POST[NombreNegocio]','$_POST[Email]','$_POST[Password]','$_POST[Telefono]','$_POST[Ubicacion]','$_POST[Descripcion]','V','$idimagen')");


                pg_close();

            }catch(Google_Service_Exception $gs){
                $m=json_decode($gs->getMessage());
                echo $m->error->message;
            }catch(Exception $e){
                echo $e->getMessage();  
            }

            $email = $_POST['Email'];
            $pass = $_POST['Password'];
      
      $url= 'paginaPrincipalConPerfil.php';
      echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

    
?>