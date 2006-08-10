<?php
	// Include the Config
	if (defined('FS_SIMPL'))
		include_once(FS_SIMPL . 'config.php');
	else
		include_once(DIR_ABS . 'simpl/config.php');
	
	// Include the functions
	include_once(FS_SIMPL . 'functions.php');
	
	// Include the Form Class
	include_once(FS_SIMPL . 'db_form.php');
	
	// Include the Database Functions
	include_once(FS_SIMPL . 'db_functions.php');
	
	// Include the Database Frameowrk
	include_once(FS_SIMPL . 'db_template.php');
	
	// Include the Database Export
	include_once(FS_SIMPL . 'db_export.php');
	
	// Clear Cache if need be
	if (CLEAR_CACHE === true)
		foreach (glob(FS_SIMPL . WS_CACHE . '*.cache') as $filename)
			unlink($filename);
?>