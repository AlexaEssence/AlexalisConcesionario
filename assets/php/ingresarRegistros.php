<?php
    include_once('conexion.php');

    $vehiculo = $_POST['vehiculo'];
    $mecanico = $_POST['mecanico'];
    $repuestos = $_POST['repuestos'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO icar_registros(vehiculo, mecanico, repuestos, estado) VALUES ('$vehiculo', '$mecanico', '$repuestos', '$estado')";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
?>