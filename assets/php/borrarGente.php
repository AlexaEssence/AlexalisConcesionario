<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $query = "DELETE FROM icar_gente WHERE cedula='$cedula'";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
?>