<?php
//homeCarousel
add_action( 'init', 'carousel_slider_mt' );

function carousel_slider_mt() {
register_post_type( 'carousel_slider',
    array(
      'labels' => array(
		'name' => __( 'Header Slider', 'post type general name', 'nature' ),
		'singular_name' => __( 'Header Slide Item', 'post type singular name', 'nature' ),
		'add_new' => __( 'Add New Slide', 'Slide', 'nature' ),
		'add_new_item' => __( 'Add New Slide', 'nature' ),
		'edit_item' => __( 'Edit Header Slide', 'nature' ),
		'new_item' => __( 'New Header Slide', 'nature' ),
		'view_item' => __( 'View Header Slide', 'nature' ),
		'search_items' => __( 'Search Header Slides', 'nature' ),
		'not_found' =>  __( 'No Header Slides found', 'nature' ),
		'not_found_in_trash' => __( 'No Header Slides found in Trash', 'nature' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title'),
    )
  );
}

//Team CUSTOM POST TYPE
add_action( 'init', 'mt_team_type' );

function mt_team_type() {
	register_post_type( 'mt_team',
		array(
			'labels' => array(
				'name' => __( 'Team Members', 'nature' ),
				'singular_name' => __( 'Team Member', 'nature'),
				'add_new' => __( 'Add New Member', 'nature'),
				'add_new_item' => __( 'Add New Team Member', 'nature'),
				'edit_item' => __( 'Edit Team Member', 'nature'),
				'new_item' => __( 'Add New Team Member', 'nature' ),
				'view_item' => __( 'View Item', 'nature'),
				'search_items' => __( 'Search Team Members', 'nature'),
				'not_found' => __( 'No Team Members found', 'nature' ),
				'not_found_in_trash' => __( 'No Team Members found in trash', 'nature')
			),
			'public' => true,
			'supports' => array( 'title',),
			'capability_type' => 'post',
			'rewrite' => true
		)
	);
}







//Portfolio CUSTOM POST TYPE
add_action('init', 'portfolio_custom_init');

function portfolio_custom_init()
	{
	  $labels = array(
		'name' => _x('Portfolio Item', 'post type general name', 'nature'),
		'singular_name' => _x('Portfolio Item', 'post type singular name', 'nature'),
		'add_new' => _x('Add New', 'portfolio', 'nature'),
		'add_new_item' => __('Add New Portfolio Item', 'nature'),
		'edit_item' => __('Edit Portfolio Item', 'nature'),
		'new_item' => __('New Portfolio Item', 'nature'),
		'view_item' => __('View Portfolio Item', 'nature'),
		'search_items' => __('Search Portfolio Items', 'nature'),
		'not_found' =>  __('No Portfolio Items found', 'nature'),
		'not_found_in_trash' => __('No Portfolio Items found in Trash', 'nature'),
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio Item'

	  );
	  	  
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail', 'post-formats')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('portfolio',$args);
	  
	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Tags', 'taxonomy general name', 'nature' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name', 'nature' ),
		'search_items' =>  __( 'Search Types', 'nature' ),
		'all_items' => __( 'All Tags', 'nature' ),
		'parent_item' => __( 'Parent Tag', 'nature' ),
		'parent_item_colon' => __( 'Parent Tag:', 'nature' ),
		'edit_item' => __( 'Edit Tags', 'nature' ),
		'update_item' => __( 'Update Tag', 'nature' ),
		'add_new_item' => __( 'Add New Tag', 'nature' ),
		'new_item_name' => __( 'New Tag Name', 'nature' ),
	  );
		// Custom taxonomy for portfolio Tags
		register_taxonomy('tagportifolio',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag-portifolio' ),
	  ));
	  
	}







?>