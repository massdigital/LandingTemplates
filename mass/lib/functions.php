<?php
	function fn_ejecutar($db,$sql) {
		$tipo = strtolower(substr($sql, 0, strpos($sql, " ")));
		
		$resu = $db->execute($sql);
		if( $resu == false) {
			if( $tipo == 'insert') 
				$com1 = "insertar";
			elseif( $tipo == 'update') 
				$com1 = "modificar";
			elseif( $tipo == 'delete') 
				$com1 = "eliminar";
				
			$msg = "Error al ".$com1." el registro.";
		} else {
			if( $tipo == 'insert') 
				$com1 = "agregado!";
			elseif( $tipo == 'update') 
				$com1 = "modificado!";
			elseif( $tipo == 'delete') 
				$com1 = "eliminado!";
				
			//$msg = "Registro ".$com1;
		}
		//return $resu;
	}
?>
