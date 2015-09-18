<?php
date_default_timezone_set('America/Bogota');
/*Envio formularios*/
function envio_formulario(){
	require('lib/db.php');
	$nombre = utf8_encode($_POST['name']);
	$apellido = utf8_encode($_POST['lastname']);
	$email = $_POST['email'];
	$telefono = $_POST['phone'];
	$habbeas = $_POST['habeas'];
	$landing = $_POST['b'];
	if($habbeas=='Si'){
		$habbeas = 'Si';
	}else{
		$habbeas = 'No';
	}
	$fecha = date('Y-m-d H:i:s');
	switch ($landing) {
		case 'envio_sanluis':
			$table = "LandingSanLuis";
		break;
	}
	
	$sql="INSERT INTO ospinas.".$table."(name,lastname,email,phone,habbeas,fecha) VALUES ('".$nombre."','".$apellido."','".$email."','".$telefono."','".$habbeas."','".$fecha."')";
	fn_ejecutar($db, $sql);
	$db->Close();
	$res = array('status'=>'ok');
	die(json_encode($res));
}
?>