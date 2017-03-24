<?php
//ADD ADMIN AREA CUSTOM JQUERY
function nature_custom_metaboxes_jquery() {
        wp_enqueue_script('custom_script', get_template_directory_uri().'/inc/meta-box/admin.js', array('jquery'));
}
add_action('admin_enqueue_scripts', 'nature_custom_metaboxes_jquery'); 

add_filter( 'cmb_render_imag_select_taxonomy_id', 'imag_render_imag_select_taxonomy_id', 10, 2 );
function imag_render_imag_select_taxonomy_id( $field, $meta ) {

    wp_dropdown_categories(array(
            'show_option_none' => '&#8212; Select &#8212;',
            'hierarchical' => 1,
            'taxonomy' => $field['taxonomy'],
            'orderby' => 'name', 
            'hide_empty' => 0, 
            'name' => $field['id'],
            'selected' => $meta  

        ));
    if ( !empty($field['desc']) ) echo '<p class="cmb_metabox_description">' . $field['desc'] . '</p>';

}
  
function nature_custom_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PAGES ///////////////////////////////
	////////////////////////////////////////////////////////////////////////
	$meta_boxes[] = array(
		'id' => 'page_metabox',
		'title' => __('Nature Page Options', 'nature'),
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(

			//Page Subtitle 
			array(
				'name' => __('Page Subtitle', 'nature'),
				'id' => $prefix .'p_sub_title',
				'desc' => __('A short title about this page or serction', 'nature'),
				'type' => 'text',
			    ),

		)
	);

	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR HEADER SLIDER ///////////////////////////////
	////////////////////////////////////////////////////////////////////////	
	$meta_boxes[] = array(
		'id' => 'h_slider_metabox',
		'title' => __('Header Slider Options', 'nature'),
		'pages' => array('carousel_slider'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
	'name' => 'First Active slider Item',
	'desc' => 'Only Use For First slider Item',
	'id' => $prefix . 'first_slider_active_item',
	'type' => 'multicheck',
	'options' => array(
		'active' => 'active',
	)
),
			array(
				'name' => __('Upload Slider Image', 'nature'),
				'desc' => __('This is Header Carousel Slider Background Image ,Image Size 1200x604px Recommend', 'nature'),
				'id'   => $prefix . 'h_slider_image',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )				
			),


			array(
				'name' => __('Slider caption', 'nature'),
				'desc' => __('Some details about service', 'nature'),
				'id'   => $prefix . 'h_slider_caption',
				'type' => 'textarea_code',
			),
		)
	);
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR TEAM      ///////////////////////////////
	////////////////////////////////////////////////////////////////////////
	$meta_boxes[] = array(
		'id' => 'team_metabox',
		'title' => __('Member Details', 'nature'),
		'pages' => array('mt_team'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(

		//Member Avater	
			array(
				'name' => __('Upload Member Image', 'nature'),
				'desc' => __('Image Size 200x200px Recommend', 'nature'),
				'id'   => $prefix . 'team_image',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )				
			),
		// Team Member position 
			array(
				'name' => __('Position/Post', 'nature'),
				'id' => $prefix .'team_post',
				'desc' => __('Team Member position', 'nature'),
				'std' => 'Senior Designer',
				'type' => 'text',
			    ),
		// About Team Member
			array(
				'name' => __('Member Sort Info', 'nature'),
				'desc' => __('Some details about member', 'nature'),
				'id'   => $prefix . 'team_about',
				'type' => 'textarea_code',
			),		
		//Twitter
			array(
				'name' => __('Twitter', 'nature'),
				'id' => $prefix .'tw_link',
				'desc' => __('Twitter Profile Link', 'nature'),
				'type' => 'text',
				),
		// Facebook
			array(
				'name' => __('Facebook', 'nature'),
				'id' => $prefix .'fb_link',
				'desc' => __('Facebook Profile Link', 'nature'),
				'type' => 'text',
				),			
		//RSS
			array(
				'name' => __('Blog rss', 'nature'),
				'id' => $prefix .'rss_link',
				'desc' => __('Blog rss link', 'nature'),
				'type' => 'text',
				),	
		//Forrst
			array(
				'name' => __('Forrst', 'nature'),
				'id' => $prefix .'forrst_link',
				'desc' => __('Forrst Profile Link', 'nature'),
				'type' => 'text',
				),
		//Dribbble
			array(
				'name' => __('Dribbble', 'nature'),
				'id' => $prefix .'dribbble_link',
				'desc' => __('Dribbble Profile Link', 'nature'),
				'type' => 'text',
				)	
		
		)
	);



	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PORTFOLIO ///////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	$meta_boxes[] = array(
		'id' => 'portfolio_metabox',
		'title' => __('Link to portfolio item', 'nature'),
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Link to the project', 'nature'),
				'desc' => '',
				'id'   => $prefix . 'port_link',
				'type' => 'text_medium',
			),

		),
	);

	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR GALLERY POST FORMAT /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'gallery_metabox',
		'title' => __('Slider Images', 'nature'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
		array(
				'name' => __('Slider Image 1', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery1',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 2', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery2',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 3', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery3',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 4', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery4',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 5', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery5',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 6', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery6',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 7', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery7',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => __('Slider Image 8', 'nature'),
				'desc' => __('Upload an image or enter an URL.', 'nature'),
				'id' => $prefix . 'gallery8',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
		)
	);
	
//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR VIDEO POST FORMAT ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'video_metabox',
		'title' => __('The Video Link', 'tg'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Put the Video Url in here', 'tg'),
				'desc' => 'e.g. &lt;iframe src=&quot;http://player.vimeo.com/video/25624940?title=0&amp;amp;byline=0&amp;amp;portrait=0&quot; frameborder=&quot;0&quot; webkitAllowFullScreen mozallowfullscreen allowFullScreen&gt;&lt;/iframe&gt;',
				'id'   => $prefix . 'the_video',
				'type' => 'textarea_code',
			),
			array(
				'name' => __('Use Self-Hosted Video?', 'tg'),
				'desc' => __('Tick this Checkbox to use self-hosted video', 'tg'),
				'id'   => $prefix . 'the_hosted_video_switch',
				'type' => 'checkbox',
			),
			array(
				'name' => __('Put the Hosted .mp4 URL in here.', 'tg'),
				'desc' => 'Upload an .mp4 to your "Media" library on your WP dashboard and enter the URL in here. e.g. http://mirror.cessen.com/blender.org/peach/trailer/trailer_iphone.m4v',
				'id'   => $prefix . 'the_hosted_mp4',
				'type' => 'text',
			),
			array(
				'name' => __('Put the Hosted .webm URL in here.', 'tg'),
				'desc' => 'Upload an .webm to your "Media" library on your WP dashboard and enter the URL in here. e.g. http://clips.vorwaerts-gmbh.de/big_buck_bunny.webm',
				'id'   => $prefix . 'the_hosted_webm',
				'type' => 'text',
			),
			array(
				'name' => __('Put the Hosted .ogg URL in here.', 'tg'),
				'desc' => 'Upload an .ogg to your "Media" library on your WP dashboard and enter the URL in here. e.g. http://mirror.cs.umn.edu/blender.org/peach/trailer/trailer_400p.ogg',
				'id'   => $prefix . 'the_hosted_ogg',
				'type' => 'text',
			),
		)
	);
	



	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'nature_custom_metaboxes' );

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}
?>