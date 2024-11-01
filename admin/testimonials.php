<?php

// Register Custom Post Type
if (!function_exists('Tg_testimonials')) {
function Tg_testimonials() {

	$labels = array(
		'name'                  => esc_html_x( 'Tg Testimonials', 'Post Type General Name', 'tg' ),
		'singular_name'         => esc_html_x( 'Tg Testimonial', 'Post Type Singular Name', 'tg' ),
		'menu_name'             => esc_html__( 'Tg Testimonials', 'tg' ),
		'name_admin_bar'        => esc_html__( 'Tg Testimonial', 'tg' ),
		'archives'              => esc_html__( 'Testimonial Archives', 'tg' ),
		'attributes'            => esc_html__( 'Testimonial Attributes', 'tg' ),
		'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'tg' ),
		'all_items'             => esc_html__( 'All Testimonials', 'tg' ),
		'add_new_item'          => esc_html__( 'Add New Testimonial', 'tg' ),
		'add_new'               => esc_html__( 'Add New', 'tg' ),
		'new_item'              => esc_html__( 'New Testimonial', 'tg' ),
		'edit_item'             => esc_html__( 'Edit Testimonial', 'tg' ),
		'update_item'           => esc_html__( 'Update Testimonial', 'tg' ),
		'view_item'             => esc_html__( 'View Testimonial', 'tg' ),
		'view_items'            => esc_html__( 'View Testimonials', 'tg' ),
		'search_items'          => esc_html__( 'Search Testimonial', 'tg' ),
		'not_found'             => esc_html__( 'Not found', 'tg' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'tg' ),
		'featured_image'        => esc_html__( 'Client image', 'tg' ),
		'set_featured_image'    => esc_html__( 'Set Client image', 'tg' ),
		'remove_featured_image' => esc_html__( 'Remove Client image', 'tg' ),
		'use_featured_image'    => esc_html__( 'Client image', 'tg' ),
		'insert_into_item'      => esc_html__( 'Insert into testimonial', 'tg' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this testimonial', 'tg' ),
		'items_list'            => esc_html__( 'testimonials list', 'tg' ),
		'items_list_navigation' => esc_html__( 'testimonials list navigation', 'tg' ),
		'filter_items_list'     => esc_html__( 'Filter testimonials list', 'tg' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Tg Testimonial', 'tg' ),
		'description'           => esc_html__( 'Tg testimonial plugin', 'tg' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'tg_testimonials', $args );

}
add_action( 'init', 'Tg_testimonials', 0 );



function tg_testimonial_category() {

	$labels = array(
		'name'                       => esc_html_x( 'Testimonial categories', 'Taxonomy General Name', 'tg' ),
		'singular_name'              => esc_html_x( 'Testimonial category', 'Taxonomy Singular Name', 'tg' ),
		'menu_name'                  => esc_html__( 'Testimonial category', 'tg' ),
		'all_items'                  => esc_html__( 'All categories', 'tg' ),
		'parent_item'                => esc_html__( 'Parent category', 'tg' ),
		'parent_item_colon'          => esc_html__( 'Parent category:', 'tg' ),
		'new_item_name'              => esc_html__( 'New category Name', 'tg' ),
		'add_new_item'               => esc_html__( 'Add New category', 'tg' ),
		'edit_item'                  => esc_html__( 'Edit category', 'tg' ),
		'update_item'                => esc_html__( 'Update category', 'tg' ),
		'view_item'                  => esc_html__( 'View category', 'tg' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'tg' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'tg' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'tg' ),
		'popular_items'              => esc_html__( 'Popular testimonial categories', 'tg' ),
		'search_items'               => esc_html__( 'Search testimonial categories', 'tg' ),
		'not_found'                  => esc_html__( 'Not Found', 'tg' ),
		'no_terms'                   => esc_html__( 'No testimonial categories', 'tg' ),
		'items_list'                 => esc_html__( 'Testimonial categories list', 'tg' ),
		'items_list_navigation'      => esc_html__( 'Testimonial categories list navigation', 'tg' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tg_testimonial_category', array( 'tg_testimonials' ), $args );

}
add_action( 'init', 'tg_testimonial_category', 0 );
}


function tg_testimonial_custom_meta_boxes( $post_type, $post ) {
    add_meta_box(
        'tg-meta-box',
        __( 'Company Logo' ),
        'tg_testimonial_render_meta_box',
        array('tg_testimonials'), //post types here
        'side',
        'low'
    );
}
add_action( 'add_meta_boxes', 'tg_testimonial_custom_meta_boxes', 10, 2 );

add_filter( 'post_row_actions', 'tg_testimonial_remove_view_link_cpt' );
function tg_testimonial_remove_view_link_cpt( $action ) {

    unset ($action['view']);
    return $action;
}




add_action( 'admin_menu', 'tg_testimonials_remove_tag_subpage', 999 );

function tg_testimonials_remove_tag_subpage() {

    $ptype = 'tg_testimonials';
    remove_submenu_page( "edit.php?post_type={$ptype}", "edit-tags.php?taxonomy=post_tag&amp;post_type={$ptype}" );

}

/**
* Adds a submenu page under a custom post type parent.
*/
add_action( 'admin_menu', 'tg_testimonials_shortcodes_page' );
function tg_testimonials_shortcodes_page() {
    add_submenu_page(
        'edit.php?post_type=tg_testimonials',
        __( 'Tg testimonials shortcodes', 'tg' ),
        __( 'Shortcodes', 'tg' ),
        'manage_options',
        'tg_testimonials_shortcodes',
        'tg_testimonials_shortcode_page_content'
    );
}

/**
* Display callback for the submenu page.
*/
function tg_testimonials_shortcode_page_content() { 
    if ( file_exists( TG_TESTIMONIAL_CORE . 'shortcode-info.php' ) ) {
	require_once TG_TESTIMONIAL_CORE . 'shortcode-info.php';
    }    
    
}




 
function tg_testimonial_render_meta_box($post) {
    $image = get_post_meta($post->ID, 'tg_testimonials_company_logo', true);
    if ($image) {$value ='<img width="100%" src="'.esc_url($image).'" class="attachment-post-thumbnail size-post-thumbnail" loading="lazy">';}else{$value='Company Logo';}
    ?>
	  
	  
		<a id="tg_testimonial-image-button" href="javascript:void(0);"><?php echo $value?></a>
		<?php if ($image) {$style ='';}else{$style='display:none;';} ?>
		<div style="<?php echo $style?>" class="tg_testimonial_conditional_div"><p>Click the image to edit or update</p><a id="tg_testimonial-remove-image-button" href="javascript:void(0);">Remove logo</a></div>
	    <input id="tg_testimonial-media-url" value="<?php echo esc_url($image)?>" type="hidden" name="tg_testimonials_company_logo" />

    <?php
}



function save_tg_testimonials_company_logo(){
 
    global $post;
 
    if(sanitize_text_field($_POST["tg_testimonials_company_logo"]) !== ''):
         
        update_post_meta($post->ID, 'tg_testimonials_company_logo', sanitize_text_field($_POST["tg_testimonials_company_logo"]));
     
    endif;
}
 
add_action('save_post', 'save_tg_testimonials_company_logo');	


class tg_testimonials {
	private $config = '{"title":"Tg Testimonials","prefix":"tg_","domain":"tg","class_name":"tg_testimonials","context":"normal","priority":"default","cpt":"tg_testimonials","fields":[{"type":"text","label":"Client Name","id":"tg_client-name"},{"type":"text","label":"Designation","id":"tg_designation"},{"type":"select","label":"Rating","options":"0:No rating\r\n1:1 star\r\n2:2 Stars\r\n3:3 Stars\r\n4:4 Stars\r\n5:5 Stars","id":"tg_rating"},{"type":"url","label":"Website URL","id":"tg_website-url"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		$this->process_cpts();
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function process_cpts() {
		if ( !empty( $this->config['cpt'] ) ) {
			if ( empty( $this->config['post-type'] ) ) {
				$this->config['post-type'] = [];
			}
			$parts = explode( ',', $this->config['cpt'] );
			$parts = array_map( 'trim', $parts );
			$this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
		}
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				case 'url':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = esc_url_raw( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
					break;
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		$this->fields_table();
	}

	private function fields_table() {
		?><table class="form-table" role="presentation">
			<tbody><?php
				foreach ( $this->config['fields'] as $field ) {
					?><tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr><?php
				}
			?></tbody>
		</table><?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'select':
				$this->select( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function select( $field ) {
        printf(
            '<select id="%s" name="%s">%s</select>',
            $field['id'], $field['id'],
            $this->select_options( $field )
        );
    }

    private function select_selected( $field, $current ) {
        $value = $this->value( $field );
        if ( $value === $current ) {
            return 'selected';
        }
        return '';
    }

    private function select_options( $field ) {
        $output = [];
        $options = explode( "\r\n", $field['options'] );
        $i = 0;
        foreach ( $options as $option ) {
            $pair = explode( ':', $option );
            $pair = array_map( 'trim', $pair );
            $output[] = sprintf(
                '<option %s value="%s"> %s</option>',
                $this->select_selected( $field, $pair[0] ),
                $pair[0], $pair[1]
            );
            $i++;
        }
        return implode( '<br>', $output );
    }

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new tg_testimonials;