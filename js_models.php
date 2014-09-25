<?php
/**
 * @package JS_Models
 * @version 0.1.0
 */
/*
Plugin Name: JS_Models
Plugin URI: 
Description: A plugin to extend WP_Query to return proper PHP objects rather than relying on get_post_meta().
Author: Josh Sephton
Version: 0.1.0
Author URI: http://joshsephton.com/
*/

// Definitions
	define('JS_MODELS_VER', '0.1.0');
	define('JS_MODELS_DIR', plugin_dir_path(__FILE__));
	define('JS_MODELS_URL', plugin_dir_url(__FILE__));


// Includes
	include JS_MODELS_DIR . 'autoload.php';
	include JS_MODELS_DIR . 'classes/js_models.php';