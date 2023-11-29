<?php
    include_once('conexion.php');

    $query = "SELECT * FROM icar_vehiculos";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
    $json = array();
    while($f = mysqli_fetch_array($rs)){
        $json[] = array(
            'matricula' => $f['matricula'],
            'descripcion' => $f['descripcion'],
            'marca' => $f['marca'],
            'modelo' => $f['modelo'],
            'tipo' => $f['tipo'],
            'year' => $f['year'],
            'clasificacion' => $f['clasificacion'],
            'cliente' => $f['cedula_cliente'],
            'imagen' => $f['imagen']
        );
    }
    $response = json_encode($json);
    echo $response;
?>