<?php
/*
 * Plugin Name: Elementor Cart Widget
 * Description: Elementor Cart Widget
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Jalal
 * Author URI:  https://elementor.com/
 * Text Domain: elementor-cart-widget
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/*
 * register the widget
 */

function register_test_cart_widget($widgets_manager){
    require_once (__DIR__ . '/widgets/elementor-cart-widget.php');
    $widgets_manager->register (new \Elementor_Product_Cart());
}
add_action( 'elementor/widgets/register', 'register_test_cart_widget' );
