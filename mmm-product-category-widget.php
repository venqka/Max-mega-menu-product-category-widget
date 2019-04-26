<?php
/*
Plugin Name: Max Mega Menu Product Category Widget
Plugin URI: devnecks.com
Description: This plugin adds product category widget for Max Mega Menu
Author: venqka
Author URI: devnecks.com
Version: 1.0
*/

function dn_mmm_enqueue() {

	/*frontend styles*/
	wp_enqueue_style( 'dn-mmm-style', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0', false );

}
add_action( 'wp_enqueue_scripts', 'dn_mmm_enqueue' );