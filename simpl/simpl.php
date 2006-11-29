<?php
	// Start a session if not already started
	if (session_id() == '')
		session_start();

	// Include the Config
	if (defined('FS_SIMPL'))
		include_once(FS_SIMPL . 'config.php');
	else
		include_once(DIR_ABS . 'simpl/config.php');
	
	// Include the functions
	include_once(FS_SIMPL . 'functions.php');
	
	// Include the Simpl Loader class
	include_once(FS_SIMPL . 'main.php');
	
	// Load the Base Classes
	$mySimpl = new Simpl;
	
	// Clear Cache if need be
	if (CLEAR_CACHE === true){
		$current_cache = glob(FS_SIMPL . WS_CACHE . '*.cache');
		if (is_array($current_cache))
			foreach ($current_cache as $filename)
				unlink($filename);
		unset($current_cache);
	}
?>