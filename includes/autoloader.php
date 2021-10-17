<?php 

// Class AutoLoader
spl_autoload_register('autoLoader');

function autoLoader($className) {
	$path = "classes/";
	$extension = ".class.php";
	$fullpath = $path . $className . $extension;

	if(!file_exists($fullpath)) {
		return false;
	}

	include_once $fullpath;
}

 ?>