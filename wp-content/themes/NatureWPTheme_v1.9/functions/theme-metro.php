<?php
$nature_mt = get_option('nature_mt');
//Load theme scripts


//Load theme stylessheets
function theme_mt_styles(){
 global $nature_mt; 
wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', false, false, 'all');
wp_enqueue_style('bootstrap-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css', false, false, 'all');
wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', false, false, 'all');
wp_enqueue_style('font', get_template_directory_uri().'/css/font.css', false, false, 'all');
wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false, false, 'all');
//wp_enqueue_style('nature_style_light', get_template_directory_uri().'/css/nature_style_light.css', false, false, 'all');
wp_enqueue_style('component', get_template_directory_uri().'/css/component.css', false, false, 'all');
}
add_action('wp_enqueue_scripts', 'theme_mt_styles');
//Load theme Scripts
function theme_mt_scripts() {
global $nature_mt;
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), false, true);
wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), false, true);
wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array('jquery'), false, true);
wp_enqueue_script( 'grid', get_template_directory_uri() . '/js/grid.js', array('jquery'), false, true);
wp_enqueue_script( 'mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array('jquery'), false, true);
wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), false, true);
wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), false, true);
wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'), false, true);
wp_enqueue_script( 'stickynav', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), false, true);
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), false, false);
wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), false, true);
wp_enqueue_script( 'validaytor', get_template_directory_uri() . '/js/jquery.ufvalidator-1.0.5.js', array('jquery'), false, true);
wp_enqueue_script( 'form', get_template_directory_uri() . '/js/jquery.form.js', array('jquery'), false, true);
wp_enqueue_script( 'mediaelement', get_template_directory_uri() . '/player/lib/mediaelement.js', array('jquery'), false, true  );
wp_enqueue_script( 'mediaelementplayer', get_template_directory_uri() . '/player/lib/mediaelementplayer.js', array('jquery'), false, true  );
if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'theme_mt_scripts');

//Required file's

require_once (get_template_directory() . '/inc/meta-box/metaboxes.php');  //CUSTOM METABOXES
require_once (get_template_directory() .'/inc/meta-box/cpt.php');        //CUSTOM POST TYPE
require_once(get_template_directory() . '/functions/shortcodes.php');   //Shortcodes

function portfolio_thumbnail_url($pid){
  $image_id = get_post_thumbnail_id($pid);  
  $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
  return  $image_url[0];  
}
//Post thumbnails
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 225, 170, true ); 
}

//Coustom css
add_action('wp_head', 'nature_custom_css', 11);
function nature_custom_css() {
  global $nature_mt;
  if(isset($nature_mt['custom_css']) && $nature_mt['custom_css'] != '')
      echo '<style type="text/css">' . $nature_mt['custom_css'] . '</style>';
}

if ( ! isset( $content_width ) ) $content_width = 960;

//Custom image resize
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'blog-posts', 980, 490, true );
  //add_image_size( 'single-posts', 838, 260, true );
  add_image_size( 'portfolio_img', 300, 218, true );
  add_image_size( 'portfolio_limg', 500, 500, true );
}
//POST FORMATS
add_theme_support( 'post-formats', array( 'gallery', 'video') );
//Post excerpt length
function custom_excerpt_length( $length ) {
  return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
  return '<a href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Local domain
add_action('after_setup_theme', 'nature_setup');
   function nature_setup(){
        load_theme_textdomain('nature', get_template_directory() . '/languages');
   }
//FEED LINKS
add_theme_support( 'automatic-feed-links' );
add_editor_style('editor-style.css');
add_theme_support( 'custom-header');
add_theme_support( 'custom-background'); 

//Register Menus
function register_menus() {
	register_nav_menus( array( 'top-menu' => 'Top primary menu')
						);
}
add_action('init', 'register_menus');

//Walker Nav Menu
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           if($item->object == 'page')
           {
                $varpost = get_post($item->object_id);
                $attributes .= ' href="' . get_site_url() . '#' . $varpost->post_name . '"';
           }
           else
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}



?>
