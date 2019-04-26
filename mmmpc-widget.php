<?php
/* Put this widget somewhere in Max Mega Menu to display product category info */

class mmmpcw extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'dnmmm_widget',
			'description' => 'Put this widget somewhere in Max Mega Menu to display product category info',
		);
		parent::__construct( 'dnmmm_widget', 'MMM Product Category Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		// echo 'Here be content';

		ob_start();

	?>
		<div class="dnmmm-widget-content-wrap"></div>	
	<?php

		$product_category_info = ob_get_clean();

		echo $product_category_info;	
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

