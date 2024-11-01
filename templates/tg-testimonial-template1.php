
<?php

function tg_testimonial_template1_content()
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

  $output ='<div class="item shadow-lg"> 
              <div class="bg-white rounded">';

  if ($logo) {
    $output .='<a href="'.esc_url($wurl).'"><img class="company-logo" src="'.esc_url($logo).'" alt=""></a>';
  }
    $output .='<div class="commo "><a href="'.esc_url($wurl).'"><img src="'.TG_TESTIMONIAL_IMG.'commos-3rd.png"></a></div>';

  if ($review) {
    $output .='<p class="text-muted">'.$review.'</p>';
  }
  if ($rating) {
    $output .='<p class="rating">'.$stars.'</p>';
  }
    $output .='<hr><div class="d-flex author-detail align-items-center">';
  if ($author_img) {
    $output .='<div class="author-img mr-3"> <img src="'.esc_url($author_img).'"> </div>';
  } 
  else{
    $output .='<div class="author-img mr-3"> <img src="'.TG_TESTIMONIAL_IMG.'person.jpg"> </div>';
  }

  $output .='<div class="info">';
  
  if ($author_name) {
    $output .='<h6 class="m-0 float-left font-weight-bold text-warning">'.esc_attr($author_name).'</h6>';
  }

  if ($designation) {
    $output .='<p class="m-0 small font-medium text-muted">'.esc_attr($designation).'</p>';
  }
  $output .='</div>';

  $output .='</div>';
  $output .='</div></div>';


  return $output;
}