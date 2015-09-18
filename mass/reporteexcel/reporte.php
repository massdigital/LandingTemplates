<?php 
	$landing = (isset($_GET["landing"])) ? $_GET["landing"] : "";
	if($landing){
		$dbhost = 'localhost';
		$dbuser = 'ospinas';
		$dbpass = '0sp1naS2015';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db('ospinas');
		mysql_select_db('ospinas');
		if(! $conn ){
		  die('Could not connect: ' . mysql_error());
		}
		require 'exportcsv.inc.php';
		switch ($landing){
			case 'nogal':
				$archivo = "Contactos_Ospinas_Nogal.csv";
				$tabla = 'LandingNogal';
			break;
			case 'arboleda':
				$archivo = "Contactos_Ospinas_Arboleda.csv";
				$tabla = 'LandingArboleda';
			break;
			case 'bambu':
				$archivo = "Contactos_Ospinas_Bambu.csv";
				$tabla = 'LandingBambu';
			break;
			case 'imperial':
				$archivo = "Contactos_Ospinas_Imperial.csv";
				$tabla = 'LandingImperial';
			break;
			case 'lamolina':
				$archivo = "Contactos_Ospinas_LaMolina.csv";
				$tabla = 'LandingLaMolina';
			break;
			case 'sanluis':
				$archivo = "Contactos_Ospinas_SanLuis.csv";
				$tabla = 'LandingSanLuis';
			break;
		}
		$filename=  $archivo;
		$query= "select * from ".$tabla;
		exportMysqlToCsv($filename,$query); 	
	}else{
		header('Location: /report/home.php'); 
	}
?> 