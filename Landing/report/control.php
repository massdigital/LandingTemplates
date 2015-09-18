<?php
if (md5($_POST["usuario_txt"])=="21232f297a57a5a743894a0e4a801fc3" && md5($_POST["password_txt"])=="4adb46d8a478e86f4b4181369a27628e") {
	session_start();
	$_SESSION['usuario']='21232f297a57a5a743894a0e4a801fc3';
	header("Location:home.php");

} else {
	header("Location:index.php?error=si");
}

?>