<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Ospinas San Luis</title>
<style type="text/css">
#formacceso
{
	background: #d9232e;
	font-family: arial;
	color: #EEE;
	margin: 10px auto;
	padding: 10px;
	width: 300px;
	

}
#formacceso label
{
	display: inline-block;
	width: 80px;
}
#entrar_btn
{
	background: #fff;
	margin-left:80px;
	margin-bottom: 10px;
}
</style>
</head>
<body>
<form name="autentificacion_frm" action="control.php" method="post" enctype="application/x-www-form-urlencoded">
<div id="formacceso">
<?php
error_reporting(E_ALL ^ E_NOTICE);
$_SESSION["autenticado"]="";
$_SESSION["usuario"]="";
if($_GET["error"]=="si")
	{
		echo "<span>Verifica tus datos </span>";
	}
	else
	{
		echo "<span>Introduce tus datos </span>";
	}
?>
</br></br>	

<label>Usuario:</label> <input type="text" name="usuario_txt" /> </br></br>
<label>Password:</label> <input type="password" name="password_txt" /> </br></br>
<input type="submit" id="entrar_btn" name="entrar_btn" value="Entrar">
</div>
</form>
</body>
</html>