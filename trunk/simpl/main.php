<?php
/*
 * Created on Sep 5, 2006
 * main.php
 */
class Simpl {
	/*
	 * Load a class file when needed.
	 * 
	 * @param $class A string containing the class name
	 * @return bool
	 */
	 function Load($class){
	 	if (!class_exists($class)){
	 		switch($class){
	 			case 'Field':
	 			case 'Form':
	 				include_once(FS_SIMPL . 'db_form.php');
	 				break;
	 			case 'DbTemplate':
	 				include_once(FS_SIMPL . 'db_template.php');
	 				break;
	 			case 'Export':
	 				include_once(FS_SIMPL . 'db_export.php');
	 				break;
	 			case 'Upload':
	 				include_once(FS_SIMPL . 'upload.php');
	 				break;
	 			case 'Email':
	 				include_once(FS_SIMPL . 'email.php');
	 				break;
	 			case 'Feed':
	 				include_once(FS_SIMPL . 'feed.php');
	 				break;
	 			case 'File':
	 				include_once(FS_SIMPL . 'file.php');
	 				break;
	 			case 'Folder':
	 				include_once(FS_SIMPL . 'folder.php');
	 				break;
	 			case 'Image':
	 				include_once(FS_SIMPL . 'image.php');
	 				break;
	 		}
	 	}
	 	
	 	return false;
	 }
}
?>
