<?php 
/*
*
*	***** Tg Testimonials *****
*
*	Shortcodes
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
*
*  Build The Custom Plugin Form
*
*  Display Anywhere Using Shortcode: [tg-testimonial]
*
*/
if (!function_exists('tg_testimonial_custom_plugin_form_display')) {
function tg_testimonial_custom_plugin_form_display($atts=array(), $content = NULL){
  		$atts = shortcode_atts(
          array(
             'category' => '',
             'loop' => true,
             'auto-height' => true,
             'autoplay' => true,
             'autoplay-timeout' => 5000,
             'hoverpause' => true,
             'mousedrag' => true,
             'nav' => true,
             'dots' => true,
             'template' => 'template1',
             'smart-speed' => 250,
             'autoplay-speed' => 500,
             'items' => 3,
             'mitems' => 1,
             'titems' => 2,
             'order' => 'ASC'
           ), 
          $atts
      );



      $attributes = '';

      foreach ($atts as $key => $value) {
        if ($value) {
          $attributes .= "data-$key=$value ";
        }
          
      }
      

      $cate = $atts['category'];
      $order = $atts['order'];
        $template = $atts['template'];
        if($template == 'template1'){
            $template = $template;
        } 
        else if($template == 'template2' ){
            $template = $template;
        } 
        else{
            $template = 'template1';
        }
       $output = '<div template='.$template.'  class="tg_testimonials_wrapper"><div '.$attributes.' id="tg-customers-testimonials-style-1" class="tg-carousel tg-customers-testimonials-style-1">';

       if ($cate) {
         $args = array(  
            'post_type' => 'tg_testimonials',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'date', 
            'order' => $order,
            'tax_query' => array(
              array(
                'taxonomy' => 'tg_testimonial_category',
                'field' => 'slug',
                'terms' => $cate,
              )
            )
        );
       } else{
        $args = array(  
            'post_type' => 'tg_testimonials',
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby'   => array(
              'date' =>$order,
              'menu_order'=>$order,
             ) 
        );
       }

        

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();

          
          if ( file_exists( TG_TESTIMONIAL_TEMPLATES . "tg-testimonial-$template.php" ) ) {
            require_once TG_TESTIMONIAL_TEMPLATES . "tg-testimonial-$template.php";
            if($template == 'template1'){$output .= tg_testimonial_template1_content();}
            else if($template == 'template2'){$output .= tg_testimonial_template2_content();}
          }

        endwhile;

        wp_reset_postdata();   

        $output .='</div></div>';
        return $output;
}
}
/*
Register All Shorcodes At Once
*/
if (!function_exists('tg_testimonial_register_shortcodes')) {
add_action( 'init', 'tg_testimonial_register_shortcodes');
function tg_testimonial_register_shortcodes(){
	// Registered Shortcodes
	add_shortcode ('tg-testimonial', 'tg_testimonial_custom_plugin_form_display' );
}
}