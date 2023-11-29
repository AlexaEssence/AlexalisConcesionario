<?php
	$servidor = "localhost";
	$usuario = "root";
	$clave = "";
	$bdd = "beenati";
	
	$con = new mysqli($servidor, $usuario, $clave, $bdd);
	
	if($con->connect_error){
		die("Error conectándose a la base de batos: ".$con->connect_error);
	}
?>