<?php
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	$recordSet = $db->Execute($sql);
	if (!$recordSet) {
		print $db->ErrorMsg();
		exit();
	}
	$filas = $recordSet->RecordCount();
	if ($filas > 0) {
		$row_select = $recordSet->FetchNextObj();	
	}
?>
