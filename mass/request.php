<?php
	header("Access-Control-Allow-Origin: *");
	//Conexiones a bases de datos
	include ('lib/functions.php');
	//Configuraciones
	require_once ('config/config_vars.php');
	
	//Funciones
	require_once ('functions.php');
		
	if (isset($_POST['a'])) {
		$accion = $_POST['a'];
	} else {
		die('{"status" : "error", "type" : 0, "descript" : "no var a"}');
	}
	
	if (function_exists($accion)) {
		$accion();
	} else {
		die('{"status" : "error", "type" : 0, "descript" : "no fun a"}');
	}
?>