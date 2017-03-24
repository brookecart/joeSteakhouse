<?php
require_once (TEMPLATEPATH . '/functions/theme-metro.php');
if (is_admin()) {
require('inc/nhp-options.php' );
}
$nature_mt = get_option('nature_mt');

//Show top menu for header.php
if( !function_exists( 'show_top_menu') )
{
	function show_top_menu() {
		global $nature_mt;
		echo '<ul class="nav">';
		if(isset($nature_mt['pages_topmenu']) && $nature_mt['pages_topmenu'] != '' )
			$pages = get_pages( array('include' => $nature_mt['pages_topmenu'], 'sort_column' => 'menu_order', 'sort_order' => 'ASC') );
		else
			$pages = get_pages('number=4&sort_column=menu_order&sort_order=ASC');
		$count = count($pages);
		if($nature_mt['menu_homelink'] == '1') 
			echo '<li class="active"><a href="' . get_home_url() . '/#home">Home</a>';
		for($i = 0; $i < $count; $i++)
		{
			echo '<li><a href="' . get_home_url() . '/#' . $pages[$i]->post_name . '" >' . $pages[$i]->post_title . '</a></li>' . PHP_EOL;
		}
		if(isset($nature_mt['blog_page']) && $nature_mt['blog_page'] != '')
			echo '<li><a href="' . get_permalink($nature_mt['blog_page'][0]) . '" class="external">Blog</a></li>';
		echo '</ul>';
	}
}

//

if( !function_exists( 'show_top_menu_inset') )
{
	function show_top_menu_inset() {
		global $nature_mt;
		echo '<ul class="nav">';
		if(isset($nature_mt['pages_topmenu']) && $nature_mt['pages_topmenu'] != '' )
			$pages = get_pages( array('include' => $nature_mt['pages_topmenu'], 'sort_column' => 'menu_order', 'sort_order' => 'ASC') );
		else
			$pages = get_pages('number=4&sort_column=menu_order&sort_order=ASC');
		$count = count($pages);
		if($nature_mt['menu_homelink'] == '1') 
			echo '<li><a href="' . get_home_url() . '" class="external">Home</a>';
		for($i = 0; $i < $count; $i++)
		{
			echo '<li><a href="' . get_home_url() . '/#' . $pages[$i]->post_name . '" class="external">' . $pages[$i]->post_title . '</a></li>' . PHP_EOL;
		}
		if(isset($nature_mt['blog_page']) && $nature_mt['blog_page'] != '')
			echo '<li><a href="' . get_permalink($nature_mt['blog_page'][0]) . '" class="external">Blog</a></li>';
		echo '</ul>';
	}
}


if(! function_exists('theme_mt_styles_chosse'))
{
function theme_mt_styles_chosse(){
	global $nature_mt;
		if(isset($nature_mt['nature_style_vr']) && $nature_mt['nature_style_vr'] == 1)
		{	
	wp_enqueue_style('nature_style_light', get_template_directory_uri().'/css/nature_style_light.css', false, false, 'all');
}
		if(isset($nature_mt['nature_style_vr']) && $nature_mt['nature_style_vr'] == 2)
		{	
	wp_enqueue_style('nature_style_dark', get_template_directory_uri().'/css/nature_style_dark.css', false, false, 'all');
}
}
}
add_action('wp_enqueue_scripts', 'theme_mt_styles_chosse');
//Colorization & Fonts

add_action('wp_head', 'nature_customization');
if(! function_exists('nature_customization'))
{
	function nature_customization() {

		global $nature_mt;

	if(isset($nature_mt['body_font']) && $nature_mt['body_font'] != '')
		{
			echo '<link id="' . $nature_mt['body_font'] . '" href="http://fonts.googleapis.com/css?family=' .$nature_mt['body_font'] . '" rel="stylesheet" type="text/css" />' . PHP_EOL;
		}

	if(isset($nature_mt['h2_font']) && $nature_mt['h2_font'] != '')
		{
			echo '<link id="' . $nature_mt['h2_font'] . '" href="http://fonts.googleapis.com/css?family=' .$nature_mt['h2_font'] . '" rel="stylesheet" type="text/css" />' . PHP_EOL;
		}

	if(isset($nature_mt['h3_font']) && $nature_mt['h3_font'] != '')
		{
			echo '<link id="' . $nature_mt['h3_font'] . '" href="http://fonts.googleapis.com/css?family=' .$nature_mt['h3_font'] . '" rel="stylesheet" type="text/css" />' . PHP_EOL;
		}

	if(isset($nature_mt['h4_font']) && $nature_mt['h4_font'] != '')
		{
			echo '<link id="' . $nature_mt['h4_font'] . '" href="http://fonts.googleapis.com/css?family=' .$nature_mt['h4_font'] . '" rel="stylesheet" type="text/css" />' . PHP_EOL;
		}		
		
		//Bacground 
		
		
			echo "\n<style type='text/css'> \n";

			if(isset($nature_mt['bg_image']) && $nature_mt['bg_image'] != '')
			{ 
				echo "body {background-image:url('" . $nature_mt['bg_image'] . "') !important;}} \n";
			}


			if(isset($nature_mt['bg_color']) && $nature_mt['bg_color'] != '') 
			{
				echo "body { background-image: none; background-color: " . $nature_mt['bg_color'] . " !important; } \n";
			}

			if(isset($nature_mt['m_content_image']) && $nature_mt['m_content_image'] != '')
			{ 
				echo "#main-content {background-image:url('" . $nature_mt['m_content_image'] . "') !important;} \n";
			}

			if(isset($nature_mt['newsletter_image']) && $nature_mt['newsletter_image'] != '')
			{ 
				echo ".newsletter {background-image:url('" . $nature_mt['newsletter_image'] . "') !important;} \n";
			}

			if(isset($nature_mt['portfolio_image']) && $nature_mt['portfolio_image'] != '')
			{ 
				echo ".portfolio {background:url('" . $nature_mt['portfolio_image'] . "') !important;} \n";
			}
			if(isset($nature_mt['contact_image']) && $nature_mt['contact_image'] != '')
			{ 
				echo ".contact {background-image:url('" . $nature_mt['contact_image'] . "') !important;} \n";
			}
			
			echo '</style>';
		
		
		//add custom CSS as per the theme options only if custom colorization was enabled.
		if(isset($nature_mt['enable_colorization']) && $nature_mt['enable_colorization'] == 1)
		{

			echo "\n<style type='text/css'> \n";



			echo '
			h5 { font-size: ' . $nature_mt['body_size'] . 'px; color: ' . $nature_mt['body_color_white'] . '; font-family: \'' . str_replace('+', ' ', $nature_mt['body_font']) . '\',sans-serif; }
			h2 { color: ' . $nature_mt['h2_color'] . '; font-size: ' . $nature_mt['h2_size'] . 'px; font-family: \'' . str_replace('+', ' ', $nature_mt['h2_font']) . '\',sans-serif; }
			h3 { color: ' . $nature_mt['h3_color'] . '; font-size: ' . $nature_mt['h3_size'] . 'px; font-family: \'' . str_replace('+', ' ', $nature_mt['h3_font']) . '\',sans-serif; }
			h4 { color: ' . $nature_mt['h4_color'] . '; font-size: ' . $nature_mt['h4_size'] . 'px; font-family: \'' . str_replace('+', ' ', $nature_mt['h4_font']) . '\',sans-serif; }
			
			

			';
			echo '</style>';
		}		


	}
}



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package       TGM-Plugin-Activation
 * @subpackage Example
 * @version       2.3.6
 * @author       Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author       Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license       http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'gg_register_required_plugins');
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function gg_register_required_plugins()
{
    $plugins = array(
 		array(
			'name'     				=> 'zilla-shortcodes', // The plugin name
			'slug'     				=> 'zilla-shortcodes', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/zilla-shortcodes.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		),
 
    );
    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'nature';
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme.
        'default_path' => '', // Default absolute path to pre-packaged plugins
        'parent_menu_slug' => 'themes.php', // Default parent menu slug
        'parent_url_slug' => 'themes.php', // Default parent URL slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => false, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
        'strings' => array(
            'page_title' => __('Install Required Plugins', $theme_text_domain),
            'menu_title' => __('Install Plugins', $theme_text_domain),
            'installing' => __('Installing Plugin: %s', $theme_text_domain), // %1$s = plugin name
            'oops' => __('Something went wrong with the plugin API.', $theme_text_domain),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins'),
            'return' => __('Return to Required Plugins Installer', $theme_text_domain),
            'plugin_activated' => __('Plugin activated successfully.', $theme_text_domain),
            'complete' => __('All plugins installed and activated successfully. %s', $theme_text_domain), // %1$s = dashboard link
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );
    tgmpa($plugins, $config);
}
?>