<?php
function llena_ComboE($datos,$sql,$name,$campo1,$campo2,$cargar,$combo_cont,$raya,$eneable) {
	$query = "$sql";
	$result1 = $datos->execute($query);	
	$filas1 = $result1->RecordCount();
	
	if ($filas1!= 0) {
		if ($cargar == 'conevento') {
			$cargar = 'onchange="'.$combo_cont.'('.$name.'.value)"';
		}
		if ($raya==2) {
			echo"<select name=\"$name\" size=\"8\" multiple style=\"width:700\">";
		}
		elseif ($raya==3) {
			echo"<select name=\"$name\" size=\"5\" multiple style=\"width:500; font-size:8pt;font-family:helvetica,arial;\">";
		}
		else {
?>
			<select class="cmb" size="1" name="<?php echo $name ?>" <?php echo $cargar; ?> <?php echo $eneable; ?>>
<?php
	  	}
		if ($raya==1)
			echo "<option value=\"\" >------------------------</option>";
		if ($raya==11)
			echo "<option value=\"\" >Todos</option>";
	    for ($i=0; $i < $filas1; $i++) {
			$resultado = $result1->FetchNextObj();
			/*
			if ($name=="combo1")
		    	$resultado->$campo2 = $resultado->$campo1." - ".$resultado->$campo2; 
			*/
?>
			<option value="<?php echo $resultado->$campo1; ?>"><?php echo $resultado->$campo2; ?></option>
<?php
		}
?>
			</select>
<?php 
	}
}

function llena_Combo($datos,$sql,$name,$campo1,$campo2,$cargar,$combo_cont,$raya) {
	$query = "$sql";
	$result1 = $datos->execute($query);	
	$filas1 = $result1->RecordCount();
	
	if ($filas1!= 0) {
		if ($cargar == 'conevento') {
			$cargar = 'onchange="'.$combo_cont.'('.$name.'.value)"';
		}
		if ($raya==2) {
			echo"<select name=\"$name\" size=\"8\" multiple style=\"width:700\">";
		}
		elseif ($raya==3) {
			echo"<select name=\"$name\" size=\"5\" multiple style=\"width:500; font-size:8pt;font-family:helvetica,arial;\">";
		}
		else {
?>
			<select class="cmb" size="1" name="<?php echo $name ?>" <?php echo $cargar; ?> class="estilo1">
<?php
	  	}
		if ($raya==1)
			echo "<option value=\"\" >------------------------</option>";
		if ($raya==11)
			echo "<option value=\"\" >Todos</option>";
	    for ($i=0; $i < $filas1; $i++) {
			$resultado = $result1->FetchNextObj();
			if (($name=="prestado_a_int") or ($name=="responsable")or ($name=="recibe")or ($name=="aprueba")or ($name=="solicita")or ($name=="prestado_a_otro"))
		    	$resultado->$campo2 = $resultado->$combo_cont." ".$resultado->$campo2; 
			/*
			if ($name=="combo1")
		    	$resultado->$campo2 = $resultado->$campo1." - ".$resultado->$campo2; 
			*/
?>
			<option value="<?php echo $resultado->$campo1; ?>"><?php echo $resultado->$campo2; ?></option>
<?php
		}
?>
			</select>
<?php 
	}
}

function llena_Combo1($datos,$sql,$name,$campo1,$campo2,$campo3,$cargar,$combo_cont,$raya)
{
    $query = "$sql";
    $result1 = $datos->execute($query);	
    //$result1 = pg_exec($datos,$query);
	$filas1 = $result1->RecordCount();
	//$filas1 = pg_NumRows($result1);
 if ($filas1!= 0)
  {
    if ($cargar == 'conevento')
     {
        $cargar = "onchange=$combo_cont($name.value)";
     }
	   ?>
	   <select size="1" name="<?php echo $name ?>" ; <?php echo $cargar; ?> class="estilo1">
	    <?php
	    if ($raya==1)
		   echo "<option value=\"\" >------------------------</option>";
	       for ($i=0; $i < $filas1; $i++)
		     {
		       $resultado = $result1->FetchNextObj();
			   //$resultado = pg_Fetch_Object($result1 , $i);	
	           ?>
	           <option value="<?php echo $resultado->$campo1.",".$resultado->$campo2.",".$resultado->$campo3;?>"><?php echo $resultado->$campo3;?></option>
    	       <?php
			 }
	    ?>
      </select>
     <?php 
  }
}
function llena_Combo2($datos,$sql,$name,$campo1,$campo2,$campo3,$cargar,$combo_cont,$raya)
{
    $query = $sql;
    $result1 = $datos->execute($query);	
	//$result1 = pg_exec($datos,$query);
	$filas1 = $result1->RecordCount();
	//$filas1 = pg_NumRows($result1);
 if ($filas1!= 0)
  {
    if ($cargar == 'conevento')
     {
        $cargar = "onchange=$combo_cont($name.value)";
     }
	   ?>
	   <select size="1" name="<?php echo $name ?>" ; <?php echo $cargar; ?>>
	    <?php
	    if ($raya==1)
		   echo "<option value=\"\" >------------------------</option>";
		if ($raya==11)
		 echo "<option value=\"\" >Todos</option>";
	       for ($i=0; $i < $filas1; $i++)
		     {
		       $resultado = $result1->FetchNextObj();
			   //$resultado = pg_Fetch_Object($result1 , $i);	
	           ?>
	           <option value="<?php echo $resultado->$campo1;?>"><?php echo $resultado->$campo2." - ".$resultado->$campo3;?></option>
    	       <?php
			 }
	    ?>
      </select>
     <?php 
  }
}
         				
function llena_Combo4($datos,$sql,$name,$campo1,$campo2,$campo3,$cargar,$combo_cont,$raya)
{
    $query = "$sql";
    $result = $datos->execute($query);
	$result1 = $datos->execute($query);	
    //$result1 = pg_exec($datos,$query);
	$filas1 = $result1->RecordCount();
	//$filas1 = pg_NumRows($result1);
 if ($filas1!= 0)
  {
    //$resul_ini = pg_Fetch_Object($result1 ,0);
	$resul_ini = $result1->FetchNextObj();
	$id_ini=$resul_ini->$campo1;
	if ($cargar == 'conevento')
     {
        $cargar = "onchange=$combo_cont($id_ini,$name.value,'DISP_INDEP')";
     }
	   ?>
	   <select size="1" name="<?php echo $name ?>" ; <?php echo $cargar; ?> class="estilo1">
	    <?php
	    if ($raya==1)
		  {
		    $con=$filas1+1;
			echo "<option value=\"$con\" >Nuevo</option>";
		  }
	       for ($i=0; $i < $filas1; $i++)
		     {
               $resultado = $result->FetchNextObj();
			   //$resultado = pg_Fetch_Object($result1 , $i);
			   	
	           ?>
	           <option value="<?php echo $resultado->$campo2;?>"><?php echo $resultado->$campo3." ".$resultado->$campo2;?></option>
    	       <?php
			 }
	    ?>
      </select>
     <?php 
  }
}
?>


     <?php 
  
function llena_Combo5($datos,$sql,$name,$campo1,$campo2,$campo3,$cargar,$combo_cont,$raya)
{
    $query = "$sql";
$result1 = $datos->execute($query);	
	//$result1 = pg_exec($datos,$query);
	$filas1 = $result1->RecordCount();
	//echo  "hola $filas1";
	//$filas1 = pg_NumRows($result1);
 if ($filas1!= 0)
  {
    if ($cargar == 'conevento')
     {
        $cargar = "onchange=$combo_cont($name.value)";
     }
	   ?>
	   <select size="1" name="<?php echo $name ?>" ; <?php echo $cargar; ?> class="estilo1">
	    <?php
	    if ($raya==1)
		   echo "<option value=\"\" >------------------------</option>";
		if ($raya==11)
		 echo "<option value=\"\" >Todos</option>";
	       for ($i=0; $i < $filas1; $i++)
		     {
		       $resultado = $result1->FetchNextObj();
			   //$resultado = pg_Fetch_Object($result1 , $i);	
	           ?>
	           <option value="<?php echo $resultado->$campo1;?>"><?php echo $resultado->$campo2." ". $resultado->$campo3." ".$resultado->$campo1;?></option>
    	       <?php
			 }
	    ?>
      </select>
     <?php 
  }
}
?>