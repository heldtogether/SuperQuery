<?php
/**
 * @package SuperQuery
 * @version 0.1.0
 */
/*
Plugin Name: SuperQuery
Plugin URI: https://github.com/heldtogether/superquery
Description: A plugin to extend WP_Query to return proper PHP objects rather than relying on get_post_meta().
Author: Josh Sephton
Version: 0.1.0
Author URI: http://joshsephton.com/
*/

// Definitions
	define('SUPERQUERY_VER', '0.1.0');
	define('SUPERQUERY_DIR', plugin_dir_path(__FILE__));
	define('SUPERQUERY_URL', plugin_dir_url(__FILE__));


// Includes
	include SUPERQUERY_DIR . 'autoload.php';
	include SUPERQUERY_DIR . 'classes/superquery.php';


// Hooks
function make_superquery($query){
	if(!is_admin()){
		global $wp_query;
		$wp_query = new SQ_Query($query);
	}
}
add_action('pre_get_posts', 'make_superquery');