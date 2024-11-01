
<?php

function tg_testimonial_template2_content()
{

  
  $review = get_the_content();
  $author_img = get_the_post_thumbnail_url( get_the_id(),'thumbnail');
  $logo = get_post_meta( get_the_ID(), 'tg_testimonials_company_logo', true );
  $author_name = get_post_meta( get_the_ID(), 'tg_client-name', true );
  $designation = get_post_meta( get_the_ID(), 'tg_designation', true );
  $weburl = get_post_meta( get_the_ID(), 'tg_website-url', true );
  $rating = get_post_meta( get_the_ID(), 'tg_rating', true );
  
  if($weburl){
      $wurl= $weburl;
  } else{
      $wurl = 'javascript:void(0)';
  }
  
  if (!$rating) {
    $rating = 0;
  }
  $stars ='';
  for ($i=0; $i < $rating; $i++) { 
    $stars .='<i style="color:#ffad2c;" class="icofont-star"></i>';
  }
  $remaining = 5-$rating;
  for ($i=0; $i < $remaining; $i++) { 
    $stars .='<i class="icofont-star"></i>';
  }

  $output ='<div> <div class="d-flex justify-content-between">';
  
  if ($author_img) {
    $output .='<div class="author-img mr-3"> <img src="'.esc_url($author_img).'"> </div>';
  } 
  else{
    $output .='<div class="author-img mr-3"> <img src="'.TG_TESTIMONIAL_IMG.'person.jpg"> </div>';
  }
  
  $output .='<div class="bg-commo">';
  
  if ($author_name) {
    $output .='<h2 class="testi-heading h1 font-weight-bold">'.esc_attr($author_name).'</h2>';
  }
  
  if ($rating) {
    $output .='<p class="rating">'.$stars.'</p> <hr>';
  }
  
  if ($designation) {
    $output .='<p class="mb-4 small font-medium hh text-uppercase text-muted"> <a href="'.esc_url($wurl).'"><img class="company-logo" src="'.esc_url($logo).'" alt=""></a> '.esc_attr($designation).'</p>';
  }
  
  if ($review) {
    $output .='<p class="testi-text text-muted">'.$review.'</p>';
  }
  
  
  $output .='</div>';

    
  $output .='</div></div>';


  return $output;
}