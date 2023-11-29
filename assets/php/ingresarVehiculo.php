<?php
    include_once('conexion.php');

    if(!file_exists("imagenes")){
        mkdir("imagenes");
    }
    $matricula = $_POST['matricula'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $year = $_POST['year'];
    $clasificacion = $_POST['clasificacion'];
    $cliente = $_POST['cliente'];

    if(isset($_FILES['imagen'])){
        if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
            $imagen = $_FILES['imagen'];
            $nombre = $imagen['name'];
            $type = $imagen['type'];
            $ruta_provisional = $imagen['tmp_name'];
            $size = $imagen['size'];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "imagenes/";
            if($size > 3*1024*1024){
                echo 'El tamaño máximo permitido es de 3 MB.';
            } else{
                $src = $carpeta.$nombre;
                move_uploaded_file($ruta_provisional, $src);
                $imagen = 'assets/php/imagenes/'.$nombre;
                $query = "INSERT INTO icar_vehiculos VALUES ('$matricula', '$descripcion', '$marca', '$modelo', '$tipo', '$year', '$clasificacion', '$cliente', '$imagen')";
                $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
            }
        }
    }
    
?>