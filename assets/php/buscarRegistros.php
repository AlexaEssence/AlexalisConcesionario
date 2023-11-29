<?php
    include_once('conexion.php');

    $query = "SELECT * FROM icar_registros";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
    $json = array();
    while($f = mysqli_fetch_array($rs)){
        $json[] = array(
            'id' => $f['id'],
            'vehiculo' => $f['vehiculo'],
            'mecanico' => $f['mecanico'],
            'repuestos' => $f['repuestos'],
            'estado' => $f['estado']
        );
    }
    $response = json_encode($json);
    echo $response;
?>