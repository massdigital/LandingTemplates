<?php
	include("adodb/adodb.inc.php");
	include("conf.php");
	$db = &ADONewConnection($rdbms);
	if (!@$db->PConnect($dbhost,$username,$userpass,$dbname))
	{
		die ("Error en la conexión Comuniquese con el administrador del sistema...");
	}
?>