<?php

$hostname = "ec2-3-223-242-224.compute-1.amazonaws.com";
$database = "d3gjt0iuuaep2i";
$username = "abtwruisrazyca";
$password = "cfa4a97fb0bc0aceab480115983e949c4365b9e41cf9a44ffa260d8819aa2e0f";

    $conexion = pg_connect("host=$hostname dbname=$database user=$username password=$password");
    

    $query=("INSERT INTO vendedores(nombrenegocio,email,contrasenia,telefono,ubicacion,descripcion)VALUES('$_POST[NombreNegocio]','$_POST[Email]','$_POST[Password]','$_POST[Telefono]','$_POST[Ubicacion]','$_POST[Descripcion]')");

    $consulta=pg_query($conexion,$query);

    if(!$conexion){
        echo "error de conexion";
        exit;
      }

      $result = pg_query($conexion,"SELECT idvendedor FROM vendedores ORDER BY idvendedor DESC LIMIT 1");
      if(!$result){
        echo "ocurrio un error";
        exit;
      }
      $resultado =  $arr = pg_fetch_array($result, 0, PGSQL_NUM);
      

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

                $query2=("INSERT INTO usuarioimagenes(idvendedor,nombre,ruta,extension) VALUES ('$resultado[0]','$nombre','$ruta','$extension')");
                $consulta2=pg_query($conexion,$query2);
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