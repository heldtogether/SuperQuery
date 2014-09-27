<?php 


spl_autoload_register('superquery_spl_autoload');

/**
 * Automatically load SuperQuery classes
 *
 * @param string Class name
 * @return void
 **/
function superquery_spl_autoload($class_name) {

	$file = strtolower($class_name);
	$prefix = 'sq_';

	if(substr($file, 0, strlen($prefix)) !== $prefix) {
		return false;
	}

	$file = str_replace('_', '/', $file);
	$file = substr($file, strlen($prefix));
	$file = SUPERQUERY_DIR . "/classes/$file.php";

	if(file_exists($file)) {
		include $file;
	}

}