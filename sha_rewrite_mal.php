<?php
/*
Plugin Name: Sha Rewrite Mal
Plugin URI: http://www.top-radio.org/
Description: Rewrite for Malaysia Path, make /Malaysia/* useful.
Version: 1.0.0
Author: shadowin
Author URI: http://www.top-radio.org/
License: GPL2

*/
// http://codex.wordpress.org/Function_Reference/WP_Rewrite#Examples

 add_filter( 'rewrite_rules_array','my_insert_rewrite_rules' );
 add_action( 'wp_loaded','my_flush_rules' );

// flush_rules() if our rules are not yet included
function my_flush_rules(){
	$rules = get_option( 'rewrite_rules' );

	if ( ! isset( $rules['(Malaysia)/(.+)$'] ) ) {
		global $wp_rewrite;
	   	$wp_rewrite->flush_rules();
	}
}

// Adding a new rule
function my_insert_rewrite_rules( $rules ) {
	$newrules = array();
	$newrules['Malaysia/(.+)$'] = 'index.php?pagename=Malaysia';
	return $newrules + $rules;
}


?>