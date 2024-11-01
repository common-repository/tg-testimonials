<?php 
/*
* Plugin Name: Tg Testimonials
* Plugin URI: https://demos.templategalaxy.com/testimonial
* Description: Templategalaxy testimonials plugin
* Tag: testimonials slider, wp testimonial plugin, clean testimonial, testimonial, testimonials,testimonial slide, best testimonial, responsive testimonial, testimonial plugin, wordpress testimonial,
* Version: 1.1
* Author: Abuzar Mustansar
* Author URI: https://dev.templategalaxy.com
* Text Domain: tg
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
}