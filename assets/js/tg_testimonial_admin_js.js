
jQuery(document).ready(function($){
  // Define a variable tg_testimonial_Media
  var tg_testimonial_Media;
 
  $('#tg_testimonial-image-button').click(function(e) {
    e.preventDefault();
    // If the upload object has already been created, reopen the dialog
      if (tg_testimonial_Media) {
      tg_testimonial_Media.open();
      return;
    }
    // Extend the wp.media object
    tg_testimonial_Media = wp.media.frames.file_frame = wp.media({
      title: 'Select media',
      button: {
      text: 'Select media'
    }, multiple: false });
 
    // When a file is selected, grab the URL and set it as the text field's value
    tg_testimonial_Media.on('select', function() {
      var attachment = tg_testimonial_Media.state().get('selection').first().toJSON();
      $('#tg_testimonial-media-url').val(attachment.url);
      $('#tg_testimonial-image-button').html('<img width="100%" src="'+attachment.url+'" class="attachment-post-thumbnail size-post-thumbnail" loading="lazy">');
      $('.tg_testimonial_conditional_div').css('display','block');
    });


    // Open the upload dialog
    tg_testimonial_Media.open();
  });
  $('a#tg_testimonial-remove-image-button').click(function(){
        $('#tg_testimonial-image-button').html('Company Logo');
        $('#tg_testimonial-media-url').val('');
        $('.tg_testimonial_conditional_div').css('display','none');
    });
});