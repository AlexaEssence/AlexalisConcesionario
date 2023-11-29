<?php
    include_once('conexion.php');

    $rol = $_POST['rol'];
    $query = "SELECT * FROM icar_gente WHERE rol='$rol'";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
    $json = array();
    while($f = mysqli_fetch_array($rs)){
        $json[] = array(
            'cedula' => $f['cedula'],
            'nombre' => $f['nombre'],
            'correo' => $f['correo']
        );
    }
    $response = json_encode($json);
    echo $response;
?>