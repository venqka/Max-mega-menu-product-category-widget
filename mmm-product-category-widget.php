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

	wp_register_script( 'dn-mmm-script', plugin_dir_url( __FILE__ ) . 'scripts.js', array( 'jquery' ), '1.0', false );
	wp_enqueue_script( 'dn-mmm-script', plugin_dir_url( __FILE__ ) . 'scripts.js', array( 'jquery' ), '1.0', false );

	/*frontend styles*/
	wp_enqueue_style( 'dn-mmm-style', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0', false );

}
add_action( 'wp_enqueue_scripts', 'dn_mmm_enqueue' );

include( 'mmmpc-widget.php' );

function register_mmmpc_widget() {
	register_widget( 'mmmpcw' );
}	
add_action( 'widgets_init', 'register_mmmpc_widget' );
