<?php 


spl_autoload_register('js_models_spl_autoload');

/**
 * Automatically load WP_Models classes
 *
 * @param string Class name
 * @return void
 **/
function js_models_spl_autoload($class_name) {

	$file = strtolower($class_name);
	$prefix = 'js_models';

	if(substr($file, 0, strlen($prefix)) !== $prefix) {
		return false;
	}

	$file = str_replace('_', '/', $file);
	$file = substr($file, strlen($prefix));
	$file = JS_MODELS_DIR . "/classes/$file.php";

	if(file_exists($file)) {
		include $file;
	}

}