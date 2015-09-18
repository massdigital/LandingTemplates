<?
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: index.php'); 
  exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<title>Reporte Ospinas Nogal</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <style type="text/css">
#apDiv1 {
	position: absolute;
	width: 63px;
	height: 28px;
	z-index: 1;
	left: 206px;
	top: 150px;
	background-image: url(img/salir.jpg);
	display: block;
}
#descargareporte{
	width: 188px;
	height: 30px;
	background-image:url(img/DesReporte.png);
	display: block;
	z-index: 2;
	}
#titulo{
	    width:2300px;
		height:45px;
		font-size:30px;
		color:#000;
		font-weight:bold;
		font-family:Verdana, Geneva, sans-serif;
		background-color:#fff;
		
		
		}
</style>
</head>
<body>
<img src="../img/log-brand.png" alt="Ospinas"/><div id="titulo">Reporte Ospinas Nogal</div>
<p><a href="../../mass/reporteexcel/reporte.php?landing=sanluis" id="descargareporte" ></a>
	<p><a href="salir.php" id="apDiv1" ></a></p>
</p>
<p>&nbsp; </p>
<table border="1" style="font-size: 10pt; color:#333;background-color:#CCC;text-align:center"><tr>
<td><font face="verdana"><b>Nombre</b></font></td>
<td><font face="verdana"><b>Apellido</b></font></td>
<td><font face="verdana"><b>Correo</b></font></td>
<td><font face="verdana"><b>Teléfono</b></font></td>
<td><font face="verdana"><b>Fecha</b></font></td>
<td><font face="verdana"><b>Autorización habeasdata</b></font></td>
</tr>
<?php
include '../../mass/lib/NotORM.php';
$dsn = "mysql:dbname=ospinas;host=localhost";
$pdo = new PDO($dsn, "ospinas", "0sp1naS2015");
$db = new NotORM($pdo);
	foreach ($db->LandingSanLuis() as $user) {
		echo "<tr><td width=\"25%\"><font face=\"verdana\">".utf8_decode($user['name'])."</font></td>";
		echo "<td width=\"10%\"><font face=\"verdana\">".utf8_decode($user['lastname'])."</font></td>";
		echo "<td width=\"10%\"><font face=\"verdana\">".$user['email']."</font></td>";
		echo "<td width=\"10%\"><font face=\"verdana\">".$user['phone']. "</font></td>";
		echo "<td width=\"10%\"><font face=\"verdana\">".$user['fecha']. "</font></td>";
		echo "<td width=\"10%\"><font face=\"verdana\">".$user['habbeas']. "</font></td></tr>"; 
		$numero++;
	}
?>
</table>
</body>
</html>