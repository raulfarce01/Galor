<?php
include_once('crud.php');
    if(isset($_POST["cambiaFoto"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            /*
            * Insert image data into database
            */
            
            //DB details
            $dbHost     = 'localhost';
            $dbUsername = 'ahmed';
            $dbPassword = '123456'; // Change password
            $dbName     = 'galorDB';
            
            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            
            // Check connection
            if($db->connect_error){
                die("Error al conectar: " . $db->connect_error);
            }
                    
            //echo $_POST['nombre'].", ".$_POST['desc'].", ".$_POST['precio'];
            //echo "INSERT INTO figura (nombreFig, descFig, precioFig, fotoFig) VALUES (".$_POST['nombre'].", ".$_POST['desc'].", ".$_POST['precio'].", '$imgContent')";
            //Insert image content into database
            $insert = $db->query("UPDATE user SET fotoPerfil = '$imgContent' WHERE correoUser = '".$_SESSION['email']."'");
            if($insert){
                echo "<p>Archivo subido correctamente a la base de datos</p>";
            }else{
                echo "<p>Error al subir el archivo a la base de datos</p>";
            } 

        }else{
            echo "Selecciona un archivo para subir.";
        }
    }
?>