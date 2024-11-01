<?php 
/*
*
*	***** Tg Testimonials *****
*
*	This file initializes all TG Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('TG_TESTIMONIAL_CORE',dirname( __FILE__ ).'/core/');
define('TG_TESTIMONIAL_ADMIN',dirname( __FILE__ ).'/admin/');
define('TG_TESTIMONIAL_TEMPLATES',dirname( __FILE__ ).'/templates/');
define('TG_TESTIMONIAL_IMG',plugins_url( 'assets/images/', __FILE__ ));
define('TG_TESTIMONIAL_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('TG_TESTIMONIAL_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
if (!function_exists('tg_testimonial_register_core_css')) {
function tg_testimonial_register_core_css(){
    wp_enqueue_style('tg-testimonial-core-owl-min-css', TG_TESTIMONIAL_CSS . 'owl.min.css',null,time(),'all');
wp_enqueue_style('tg-testimonial-core', TG_TESTIMONIAL_CSS . 'tg-core.css',null,time(),'all');
wp_enqueue_style('tg-testimonial-core-icofont', plugins_url( 'assets/', __FILE__ ) . 'icofont/icofont.min.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'tg_testimonial_register_core_css' );
} 




function tg_testimonial_include_script_admin() {
 
    wp_enqueue_media();
    wp_enqueue_script( 'tg_testimonial_admin_js', TG_TESTIMONIAL_JS . 'tg_testimonial_admin_js.js','jquery',time(),true);
   
}
add_action( 'admin_enqueue_scripts', 'tg_testimonial_include_script_admin' );



/*
*
*  Register JS/Jquery Ready
*
*/
if (!function_exists('tg_testimonial_register_core_js')) {
function tg_testimonial_register_core_js(){
// Register Core Plugin JS	

wp_enqueue_script('tg-testimonial-owl.carousel.min', TG_TESTIMONIAL_JS . 'owl.carousel.min.js','jquery',time(),true);
	
wp_enqueue_script('tg-testimonial-core', TG_TESTIMONIAL_JS . 'tg-core.js','jquery',time(),true);
	
};
add_action( 'wp_enqueue_scripts', 'tg_testimonial_register_core_js', 150 );
}
/*
*
*  Includes
*
*/ 
// Load the Functions
  
// Load the ajax Request
if ( file_exists( TG_TESTIMONIAL_ADMIN . 'testimonials.php' ) ) {
	require_once TG_TESTIMONIAL_ADMIN . 'testimonials.php';
} 
// Load the Shortcodes
if ( file_exists( TG_TESTIMONIAL_CORE . 'tg-shortcodes.php' ) ) {
	require_once TG_TESTIMONIAL_CORE . 'tg-shortcodes.php';
}