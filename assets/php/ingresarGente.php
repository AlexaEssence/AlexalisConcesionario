<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $query = "INSERT INTO icar_gente (cedula, nombre, correo, rol) VALUES ('$cedula', '$nombre', '$correo', '$rol')";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
?>