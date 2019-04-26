<?php
/*
Plugin Name: Max Mega Menu Product Category Widget
Plugin URI: devnecks.com
Description: This plugin adds product category widget for Max Mega Menu
Author: venqka
Author URI: devnecks.com
Version: 1.0
*/

include( 'mmmpc-widget.php' );

function register_mmmpc_widget() {
	register_widget( 'mmmpcw' );
}	
add_action( 'widgets_init', 'register_mmmpc_widget' );

function dn_mmm_enqueue() {

	wp_register_script( 'dn-mmm-script', plugin_dir_url( __FILE__ ) . 'scripts.js', array( 'jquery', 'megamenu' ), '1.0', true );
	wp_enqueue_script( 'dn-mmm-script', plugin_dir_url( __FILE__ ) . 'scripts.js', array( 'jquery', 'megamenu' ), '1.0', true );

	$ajax_args = array(
    	'ajax_url'    => admin_url( 'admin-ajax.php' ), 
    	// 'ajax_nonce'  => wp_create_nonce( 'ajax-nonce' )      
  	);
  	wp_localize_script( 'dn-mmm-script', 'dnmmm_ajax', $ajax_args );
	
	/*frontend styles*/
	wp_enqueue_style( 'dn-mmm-style', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0', false );

}
add_action( 'wp_enqueue_scripts', 'dn_mmm_enqueue' );

function get_category_info() {

	$category_slug = $_POST["categoryUrl"];

	if( !empty( $category_slug ) ) {
	
		$product_category = get_term_by( 'slug', $category_slug, 'product_cat' );
		$category_name = $product_category->name;
		$category_description = $product_category->description;
		$category_id = $product_category->term_id;
		$category_thumbnail_id = get_woocommerce_term_meta( $category_id, 'thumbnail_id', true );
		$category_thumbnail = wp_get_attachment_url( $category_thumbnail_id );
		ob_start();
?>
			<div class="mmm-product-category">
				<div class="mmm-product-category-name">
					<h2><?php echo $category_name; ?></h2>
				</div>
<?php
				if( !empty( $category_description ) ) {
?>				
					<div class="mmm-product-category-description">
						<?php echo $category_description; ?>
					</div>
<?php
				}

				if( !empty( $category_thumbnail ) ) {
?>				
					<div class="mmm-product-category-thumbnail">
						<img src="<?php echo $category_thumbnail; ?>" />
					</div>
<?php
				}
?>						
			</div>	
<?php	

		$category_info = ob_get_clean();	

		wp_send_json( $category_info );

	}//if we have category slug	
	
	wp_die();
}
add_action( 'wp_ajax_get_category_info', 'get_category_info' );
add_action( 'wp_ajax_nopriv_get_category_info', 'get_category_info' );

