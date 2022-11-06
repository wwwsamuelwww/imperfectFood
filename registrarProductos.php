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
                $nombre = $_FILES['Imagen']['name'];
                //instanciamos el servicio
                $service = new Google_Service_Drive($client);
                $file_path = $_FILES['Imagen']['tmp_name'];
               
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
                $extension = $_FILES['Imagen']['type'];

                $insertarimagen = pg_query($conexion,"INSERT INTO imagenes(nombre,ruta,extension) VALUES ('$nombre','$ruta','$extension')");
                
                $consulta_id_imagen = pg_query($conexion,"SELECT id_imagen FROM imagenes ORDER BY id_imagen DESC LIMIT 1");
                $fila = pg_fetch_row($consulta_id_imagen);
                $idimagen = $fila[0];
                $insertarproducto=pg_query($conexion,"INSERT INTO productos(id_usuario_vendedor,nombre_producto,precio,precio_oferta,stock,descripcion,id_imagen) VALUES('1','$_REQUEST[NombreDeProducto]','$_REQUEST[Precio]','$_REQUEST[PrecioDeOferta]','$_REQUEST[Stock]','$_REQUEST[Descripcion]','$idimagen')");
                
                pg_close();
               
            }catch(Google_Service_Exception $gs){
                $m=json_decode($gs->getMessage());
                echo $m->error->message;
            }catch(Exception $e){
                echo $e->getMessage();  
            }

      
      $url= 'paginaPrincipalConPerfil.php';
      echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>