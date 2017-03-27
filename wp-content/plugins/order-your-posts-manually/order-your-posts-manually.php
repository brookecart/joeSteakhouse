<?php
/**
 * @package Order your Posts Manually
 * @version 2.0
 */
/*
Plugin Name: Order your Posts Manually
Plugin URI: http://cagewebdev.com/order-posts-manually
Description: Order your Posts Manually by Dragging and Dropping them
Version: 2.0
Date: 01/25/2016
Author: Rolf van Gelder
Author URI: http://cagewebdev.com/
License: GPLv2 or later
*/
?>
<?php
/***********************************************************************************
 *
 * 	ORDER YOUR POSTS MANUALLY - MAIN CLASS
 *
 ***********************************************************************************/
 
// CREATE INSTANCE
global $opm_class;
$opm_class = new OrderYourPostsManually; 
 
class OrderYourPostsManually
{
	var $opm_version      = '2.0';
	var $opm_release_date = '01/25/2016';
	
	/*******************************************************************************
	 * 	CONSTRUCTOR
	 *******************************************************************************/
	function __construct()
	{
		// USE THE NON-MINIFIED VERSION OF JS AND CSS WHILE DEBUGGING
		$this->script_minified = (defined('WP_DEBUG') && WP_DEBUG) ? '' : '.min';
		$this->script_minified = '';
		
		// GET OPTIONS FROM DB (JSON FORMAT)
		$this->opm_options = get_option('opm_options');

		// FIRST RUN: SET DEFAULT SETTINGS
		$this->opm_init_settings();

		// ADD ACTIONS FOR MENU ITEMS AND SCRIPTS
		add_action('init', array(&$this, 'opm_add_actions'));
	
		// BASE NAME OF THE PLUGIN
		$this->plugin_basename = plugin_basename(__FILE__);
		$this->plugin_basename = substr($this->plugin_basename, 0, strpos( $this->plugin_basename, '/'));
		
		// LOCALIZATION
		add_action('init', array(&$this, 'opm_i18n'));						
	} // __construct()
	
	
	/*******************************************************************************
	 * 	INITIALIZE SETTINGS (FIRST TIME)
	 *******************************************************************************/
	function opm_init_settings()
	{
		$save = false;

		if (!isset($this->opm_options['opm_date_field']))
		{	// CREATION DATE
			$this->opm_options['opm_date_field']      = '0';
			$save = true;
		}
		if (!isset($this->opm_options['opm_posts_per_page']))
		{	// ALL POSTS
			$this->opm_options['opm_posts_per_page']  = '0';
			$save = true;
		}
		if (!isset($this->opm_options['opm_post_type']))
		{	// POST TYPE TO ORDER
			$this->opm_options['opm_post_type']       = 'post';
			$save = true;
		}
		if (!isset($this->opm_options['opm_editors_allowed']))
		{	// ARE EDITORS ALLOWED TO USE THIS PLUGIN?
			$this->opm_options['opm_editors_allowed'] = 'N';
			$save = true;
		}
		if (!isset($this->opm_options['opm_show_drafts']))
		{	// SHOW DRAFTS?
			$this->opm_options['opm_show_drafts'] = 'N';
			$save = true;
		}		
		if (!isset($this->opm_options['opm_show_thumbnails']))
		{	// SHOW THUMBNAILS
			$this->opm_options['opm_show_thumbnails'] = 'N';
			$save = true;
		}
		if (!isset($this->opm_options['opm_thumbnail_size']))
		{	// THUMBNAIL SIZE
			$this->opm_options['opm_thumbnail_size']  = '100';
			$save = true;
		}			

		// SOMETHING CHANGED: SAVE OPTIONS ARRAY
		if ($save) update_option('opm_options', $this->opm_options);
	} // opm_init_settings()


	/*******************************************************************************
	 * 	ADD ACTIONS FOR MENU ITEMS AND SCRIPTS
	 *******************************************************************************/	
	function opm_add_actions()
	{
		if (!$this->opm_is_frontend_page() && is_user_logged_in())
		{	// BACKEND PAGE
			// ADD BACKEND STYLE SHEET
			add_action('admin_init', array(&$this, 'opm_be_scripts'));
			add_action('admin_init', array(&$this, 'opm_be_styles'));		
			add_action('admin_menu', array(&$this, 'opm_admin_menu'));
			add_action('admin_menu', array(&$this, 'opm_admin_tools'));
			add_filter('plugin_action_links_'.plugin_basename(__FILE__), array(&$this, 'opm_settings_link'));
		}
	} // opm_add_actions()


	/*******************************************************************************
	 * 	LOAD SETTINGS PAGE
	 *******************************************************************************/
	function opm_settings()
	{	// LOAD THE SETTINGS PAGE
		include_once(trailingslashit(dirname( __FILE__ )).'/admin/settings.php');
	} // opm_settings()	
	
	
	/*******************************************************************************
	 * 	DEFINE TEXT DOMAIN (FOR LOCALIZATION)
	 *******************************************************************************/	
	function opm_i18n()
	{
		load_plugin_textdomain('order-your-posts-manually', false, dirname(plugin_basename( __FILE__ )).'/languages/');
	} // opm_i18n()	
	
	
	/*******************************************************************************
	 * 	IS THIS A FRONTEND PAGE?
	 *******************************************************************************/
	function opm_is_frontend_page()
	{	
		if (isset($GLOBALS['pagenow']))
			return !is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
		else
			return !is_admin();
	} // opm_is_frontend_page()
	

	/*******************************************************************************
	 * 	ARE WE ON A, FOR THIS PLUGIN, RELEVANT PAGE?
	 *******************************************************************************/	
	function opm_is_relevant_page()
	{
		$this_page = '';
		if(isset($_GET['page'])) $this_page = $_GET['page'];
		return ($this_page == 'opm_settings' || $this_page == 'opm-order-posts.php');
	} // opm_is_relevant_page()


	/*******************************************************************************
	 * 	LOAD BACKEND JAVASCRIPT (ONLY ON RELEVANT PAGES)
	 *******************************************************************************/
	function opm_be_scripts()
	{	
		if ($this->opm_is_relevant_page())
		{	wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-position');
		}
	} // opm_be_scripts()
	

	/*******************************************************************************
	 * 	LOAD BACKEND STYLESHEET (ONLY ON RELEVANT PAGES)
	 *******************************************************************************/
	function opm_be_styles()
	{
		if ($this->opm_is_relevant_page())
		{	wp_register_style('opm-be-style', plugins_url('css/order_your_posts_manually'.$this->script_minified.'.css', __FILE__));
			wp_enqueue_style('opm-be-style');			
		}
	} // opm_be_styles()


	/*******************************************************************************
	 * 	ADD PAGE TO THE SETTINGS MENU
	 *******************************************************************************/
	function opm_admin_menu()
	{
		$capability = 'manage_options';	
		if (function_exists('add_options_page'))
			add_options_page(__('Order Your Posts Manually', 'order-your-posts-manually'), __( 'Order Your Posts Manually', 'order-your-posts-manually' ), $capability, 'opm_settings', array( &$this, 'opm_settings'));		

	} // opm_admin_menu()


	/*******************************************************************************
	 * 	ADD THE 'ORDER POSTS MANUALLY' ITEM TO THE ADMIN TOOLS MENU
	 *******************************************************************************/	
	function opm_admin_tools()
	{	if (function_exists('add_management_page'))
		{	$capability = 'manage_options';	
			if ($this->opm_options['opm_editors_allowed'] == 'Y') $capability = 'edit_others_posts';
			add_management_page(__('Order Your Posts Manually','order-your-posts-manually'), __('Order Your Posts Manually','order-your-posts-manually'), $capability, 'opm-order-posts.php', array( &$this, 'opm_list_posts'));
		}
	} // opm_admin_tools()
	

	/*******************************************************************************
	 * 	SHOW A LINK TO THE PLUGIN SETTINGS ON THE MAIN PLUGINS PAGE
	 *******************************************************************************/		
	function opm_settings_link($links)
	{ 
	  array_unshift($links, '<a href="options-general.php?page=opm_settings">Settings</a>'); 
	  return $links;
	} // opm_settings_link()
	

	/*******************************************************************************
	 * 	MAIN FUNCTION: LIST THE POSTS
	 *******************************************************************************/
	function opm_list_posts()
	{
		global $wpdb, $opm_version, $opm_release_date;
		
		// GET SORTING ORDER FROM OPTIONS
		$opm_date_field = $this->opm_options['opm_date_field'];
		$field_name = ($opm_date_field == 0) ? 'post_date' : 'post_modified';
	
		// GET NUMBER OF POSTS PER PAGE FROM OPTIONS
		$opm_posts_per_page = $this->opm_options['opm_posts_per_page'];
		
		// DEFAULT: ALL POSTS AT ONCE
		if(!$opm_posts_per_page) $opm_posts_per_page = 0;
		
		// TYPES TO ORDER, DEFAULT = POST
		$opm_post_type = $this->opm_options['opm_post_type'];
		if(!$opm_post_type) $opm_post_type = 'post';
	
		/*************************************************************************
		*
		*	UPDATE POST DATES
		*
		*************************************************************************/
		if(count($_POST)>0 && $_POST['action'] == 'update_dates')
		{
			$dates   = explode('#', $_POST['dates']);
			$postids = explode('&', $_POST['sortdata']);
			
			for($p=0; $p<count($postids); $p++)
			{	$q = explode('=', $postids[$p]);
				$post_id = $q[1];
				$sql = "
				UPDATE $wpdb->posts SET `".$field_name."` = '$dates[$p]' WHERE `ID` = $post_id";
				$wpdb -> get_results($sql);
			}
			echo "<div class='updated'><p><strong>".__('SORT ORDER SAVED!', 'order-your-posts-manually')."</strong></p></div>";
		} // if(count($_POST)>0 && $_POST['action'] == 'update_dates')
		
	
		/*************************************************************************
		*
		*	GET THE POSTS
		*
		*************************************************************************/
		$cat_id = '0';
		if($this->opm_options['opm_show_drafts'] == 'Y')
		{	$post_status = array('publish', 'draft');
		}
		else
		{	$post_status = array('publish');
		}
		if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] > 0)
		{	$cat_id = $_REQUEST['cat_id'];
			$args = array(
				'posts_per_page' => 999999,
				'post_status' => $post_status,
				'category' => $cat_id,
				'orderby' => $field_name
			);
		}
		else
		{	$args = array(
				'posts_per_page' => 999999,
				'post_status' => $post_status,
				'orderby' => $field_name
			);
		}
		$myposts = get_posts($args);
	
		$dates                = '';
		$nr_of_stickies       = 0;
		$nr_of_posts          = 0;
		
		/*************************************************************************************
		 *
		 *	COUNT THE NUMBER OF STICKIES AND SAVE THE ORIGINAL DATES TO A STRING
		 *
		 ************************************************************************************/
		foreach($myposts as $post)
		{
			if(is_sticky($post->ID)) $nr_of_stickies++;
			$nr_of_posts++;
			if($dates) $dates .= "#";
			if($field_name == 'post_date')
			{
				$dates .= $post->post_date;
				$mode = __('creation date', 'order-your-posts-manually');
			}
			else
			{
				$dates .= $post->post_modified;
				$mode = __('modification date', 'order-your-posts-manually');
			}			
		} // foreach($myposts as $post)
	?>
<script type="text/javascript">
	var pagnr = 1;
	var busy  = false;
	var done  = false;
	
	/*************************************************************************************
	 *
	 *	GET SETS OF POSTS (PER PAGE)
	 *
	 ************************************************************************************/
	function opm_get_posts()
	{
		if(done) return;
		
		// PARAMETERS FOR THE AJAX CALL
		var data = {
			'action': 'opm_action',
			'cat_id': <?php echo $cat_id;?>,
			'opm_posts_per_page': <?php echo $this->opm_options['opm_posts_per_page'];?>,
			'opm_post_type': '<?php echo $this->opm_options['opm_post_type'];?>',
			'opm_show_drafts': '<?php echo $this->opm_options['opm_show_drafts']?>',
			'opm_show_thumbnails': '<?php echo $this->opm_options['opm_show_thumbnails']?>',
			'opm_thumbnail_size': '<?php echo $this->opm_options['opm_thumbnail_size']?>',
			'nr_of_stickies': <?php echo $nr_of_stickies;?>,
			'nr_of_posts': <?php echo $nr_of_posts;?>,	// INCL. STICKIES
			'pagnr': pagnr,
			'field_name': '<?php echo $field_name;?>'
		};
	
		// <ajaxurl> IS DEFINED SINCE WP v2.8!
		jQuery.post(ajaxurl, data, function(response) {
			jQuery("#opm-sortable").append(response);
			pagnr++;
			busy = false;
			jQuery("#opm-loading").hide();
			if(!done)
				jQuery("#opm-more-posts").show();
			else
				jQuery("#opm-no-more-posts").show();
		});
		
		var end = ((pagnr-1)*<?php echo $opm_posts_per_page;?>)+<?php echo $opm_posts_per_page;?>;
		// 1.9 var end = ((pagnr-1)*<?php echo $opm_posts_per_page;?>)+<?php echo $nr_of_stickies;?>+<?php echo $opm_posts_per_page;?>;
		if((end > <?php echo $nr_of_posts;?>) || (<?php echo $opm_posts_per_page;?> == 0)) done = true;
	} // opm_get_posts()
	
	
	/*************************************************************************************
	 *
	 *	INITIALIZE JQUERY
	 *
	 ************************************************************************************/
	jQuery(document).ready(function ()
	{	// TAKE CARE OF THE DRAGGING AND DROPPING
		// http://api.jqueryui.com/sortable/
		jQuery('#opm-sortable').sortable({
				placeholder: 'opm-placeholder',			
				stop: function (event, ui) {
					var oData = jQuery(this).sortable('serialize');
					jQuery('#sortdata').val(oData);
				}
		});
		// GET FIRST SET OF POSTS
		if(!done) opm_get_posts();
	});
	
	
	/*************************************************************************************
	 *
	 *	CHECK IF WE ARE AT THE END OF THE PAGE
	 *
	 ************************************************************************************/
	jQuery(window).scroll(function()
	{	// alert(busy+" "+done);
		if(!busy && !done && (jQuery(window).scrollTop() + jQuery(window).height() >= jQuery(document).height()))
		{	busy = true;
			jQuery("#opm-more-posts").hide();
			jQuery("#opm-loading").show();
			// GET NEXT SET OF POSTS
			opm_get_posts();
		}
	});
	</script>
<?php
	/*************************************************************************************
	 *
	 *	DISPLAY THE PAGE
	 *
	 ************************************************************************************/
	?>
<script type="text/javascript">
function opm_cat_id_onchange()
{
	var cat_id = jQuery("#opm_cat_id").val();
	self.location = '<?php echo site_url().'/wp-admin/tools.php?page=opm-order-posts.php&cat_id='?>'+cat_id;
}
</script>

<form action="" method="post">
  <input type="hidden" id="action" name="action" value="update_dates" />
  <input type="hidden" id="sortdata" name="sortdata" value="" />
  <input type="hidden" id="dates" name="dates" value="<?php echo $dates;?>" />
  <div id="opm-post-table">
    <div class="opm-title-bar">
      <h2>
        <?php
			$sorttype = __('sort type', 'order-your-posts-manually');
		?>
        <?php _e( 'Order Your Posts Manually ('.$sorttype.': '.$mode.')', 'order-your-posts-manually' ); ?>
      </h2>
    </div>  
    <div class="opm-intro">
      <?php _e( 'Plugin version', 'order-your-posts-manually' ); ?>: v<?php echo $this->opm_version?> [<?php echo $this->opm_release_date?>] - <a href="http://cagewebdev.com/order-posts-manually/" target="_blank">
      <?php _e( 'Plugin page', 'order-your-posts-manually' ); ?></a> - <a href="http://wordpress.org/plugins/order-your-posts-manually/" target="_blank">
      <?php _e( 'Download page', 'order-your-posts-manually' ); ?></a> - <a href="http://rvg.cage.nl/" target="_blank">
      <?php _e( 'Author', 'order-your-posts-manually' ); ?></a> - <a href="http://cagewebdev.com/" target="_blank">
      <?php _e( 'Company', 'order-your-posts-manually' ); ?></a> - <a href="http://cagewebdev.com/index.php/donations-opm/" target="_blank">
      <?php _e( 'Donation page', 'order-your-posts-manually' ); ?></a></strong>
    </div>
    <strong style="color:#00F;"><?php _e('STICKY POSTS','order-your-posts-manually')?> (<?php echo $nr_of_stickies?>) - <?php _e('REGULAR POSTS', 'order-your-posts-manually'); ?> (<?php echo ($nr_of_posts-$nr_of_stickies);?>):</strong><br />
    <br />
    <strong><?php _e('Drag and drop the posts to change the display order.', 'order-your-posts-manually'); ?></strong>
    <br />
    <strong><?php _e('NOTE: STICKY POSTS will always stay on top!', 'order-your-posts-manually'); ?></strong><br /><br />
    (<?php _e('After changing the order, don\'t forget to click the <strong>SAVE CHANGES</strong> button to actually update the posts', 'order-your-posts-manually'); ?>)<br />
    <br />
    <?php _e('Category', 'order-your-posts-manually')?>
    :
    <select name="opm_cat_id" id="opm_cat_id" onchange="opm_cat_id_onchange();">
      <option value="0">
      <?php _e('* ALL *', 'order-your-posts-manually')?>
      </option>
      <?php
		$args = array(
		  'hide_empty' => 1,
		  'orderby' => $field_name,
		  'order' => 'ASC'
		);
		$cat_id = 0;
		if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] > 0) $cat_id = $_REQUEST['cat_id'];
		$categories = get_categories($args);
		foreach ( $categories as $category )
		{	$selected = '';
			if($category->cat_ID == $cat_id) $selected = 'selected="selected"';
			echo '<option value="'.$category->cat_ID.'" '.$selected.'>'.__($category->name, 'order-your-posts-manually').'</option>';
		}
	?>
    </select>
    <br />
    <br />
    <input name="submit" type="submit" value="<?php _e('SAVE CHANGES', 'order-your-posts-manually'); ?>" class="button-primary button-large" />
    &nbsp;&nbsp;&nbsp;
    <input name="cancel" value="<?php _e('RELOAD POSTS', 'order-your-posts-manually'); ?>" type="button" onclick="self.location='';" class="button" />
    <br />
    <br />
    <?php    
		/*************************************************************************
		*
		*	PLACEHOLDER FOR THE ACTUAL POSTS
		*
		*************************************************************************/
		$loader_image = plugins_url().'/order-your-posts-manually/images/loader.gif';
	?>
    <ul id="opm-sortable">
    </ul>
    <br />
    <?php
		/*************************************************************************
		*
		*	LOADING ANIMATION
		*
		*************************************************************************/	
		?>
    <div id="opm-loading" align="center"><img src="<?php echo $loader_image;?>" /><br />
      <br />
      <br />
    </div>
    <div id="opm-more-posts" align="center"><a href="javascript:;" onclick="opm_get_posts();"><?php _e('more posts available (scroll down)', 'order-your-posts-manually')?></a><br />
      <br />
      <br />
    </div>
    <div id="opm-no-more-posts" align="center">(<?php _e('all posts loaded', 'order-your-posts-manually')?>)<br />
      <br />
      <br />
    </div>      
    <?php    
		/*************************************************************************
		*
		*	BOTTOM BUTTONS
		*
		*************************************************************************/
	?>
    <input name="submit" type="submit" value="<?php _e('SAVE CHANGES', 'order-your-posts-manually'); ?>" class="button-primary button-large" />
    &nbsp;&nbsp;&nbsp;
    <input name="cancel" value="<?php _e('RELOAD POSTS', 'order-your-posts-manually'); ?>" type="button" onclick="self.location='';" class="button" />
  </div>
</form>
<?php
	} // function opm_list_posts()
	

} // OrderYourPostsManually
?>
<?php
/********************************************************************************************

	AJAX SERVER FOR RETRIEVING SETS OF POSTS
	
	v1.7.1	bugs fixed

*********************************************************************************************/
function opm_action_callback()
{
	global $wpdb;

	// GET THE PARAMETERS
	if(!isset($_POST['pagnr'])) wp_die();
	
	$pagnr               = intval($_POST['pagnr']);
	$cat_id              = $_POST['cat_id'];
	$opm_posts_per_page  = intval($_POST['opm_posts_per_page']);
	$opm_post_type       = $_POST['opm_post_type'];
	$opm_show_drafts     = $_POST['opm_show_drafts'];
	$opm_show_thumbnails = $_POST['opm_show_thumbnails'];
	$opm_thumbnail_size  = $_POST['opm_thumbnail_size'];
	$nr_of_stickies      = intval($_POST['nr_of_stickies']);
	$nr_of_posts         = intval($_POST['nr_of_posts']);
	$field_name          = $_POST['field_name'];

	if($opm_posts_per_page > 0)
	{	// LIMITED NUMBER OF POSTS PER PAGE
		$start = ($pagnr-1)*$opm_posts_per_page;
		$end   = $start + $opm_posts_per_page;
		$end   = min($end, $nr_of_posts);
	}
	else
	{	// ALL POSTS
		$start = 0;
		$end   = $nr_of_posts;
	}

	
	/**************************************************************************************
	 *
	 *	STICKY POSTS
	 *
	 **************************************************************************************/
	if($opm_show_drafts == 'Y')
	{	$post_status = array('publish', 'draft');
	}
	else
	{	$post_status = array('publish');
	}
	 
	if(isset($cat_id) && $cat_id > 0)
	{
		$mystickies = get_posts( array(
			'category' => $cat_id,
			'post_type' => $opm_post_type,
			'post_status' => $post_status,
			'post__in' => get_option( 'sticky_posts' ),
			'posts_per_page' => 999999,
			'orderby' => $field_name
		) );
	}
	else
	{
		$mystickies = get_posts( array(
			'post_type' => $opm_post_type,
			'post_status' => $post_status,
			'post__in' => get_option( 'sticky_posts' ),
			'posts_per_page' => 999999,
			'orderby' => $field_name
		) );	
	}

	if (count($mystickies) > 0)
	{
		// COLLECT THE STICKIES
		$posts = '';
		for($i=$start; $i<$nr_of_stickies ; $i++)
		{
			$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($mystickies[$i]->ID), 'thumbnail');
			$url = $thumb['0'];			
			if($field_name == 'post_date')
				$this_date = $mystickies[$i]->post_date;
			else
				$this_date = $mystickies[$i]->post_modified;
			if($url && $opm_show_thumbnails == "Y")
			{	$posts .= '<li id="post-id-'.$mystickies[$i]->ID.'" class="ui-state-default opm-sticky" style="height:'.$opm_thumbnail_size.'px;" title="Post ID: '.$mystickies[$i]->ID.'"><div class="opm-post-text" style="float:left"><small>'.$this_date.'</small><strong> * STICKY * '.$mystickies[$i]->post_title.'</strong></div><div class="opm-post-thumb" style="float:right"><img src="'.$url.'" width="'.$opm_thumbnail_size.'" height="'.$opm_thumbnail_size.'"></div></li>';
			}
			else
			{	$posts .= '<li id="post-id-'.$mystickies[$i]->ID.'" class="ui-state-default opm-sticky" title="Post ID: '.$mystickies[$i]->ID.'"><small>'.$this_date.'</small><strong> * STICKY * '.$mystickies[$i]->post_title.'</strong></li>';
			}
		}

		// RETURN THE SET OF POSTS TO THE CALLER
		echo $posts;
	}

	/**************************************************************************************
	 *
	 *	REGULAR POSTS
	 *
	 **************************************************************************************/
	if(isset($cat_id) && $cat_id > 0)
	{
		$myposts = get_posts( array(
			'category' => $cat_id,
			'post_type' => $opm_post_type,
			'post_status' => $post_status,
			'post__not_in' => get_option( 'sticky_posts' ),
			'posts_per_page' => 999999,
			'orderby' => $field_name
		) );
	}
	else
	{
		$myposts = get_posts( array(
			'post_type' => $opm_post_type,
			'post_status' => $post_status,
			'post__not_in' => get_option( 'sticky_posts' ),
			'posts_per_page' => 999999,
			'orderby' => $field_name
		) );	
	}
	
	if (count($myposts) < 1)
	{
		_e('No '.$post_type.'s found', 'order-your-posts-manually');
	}
	else
	{
		// COLLECT THE POSTS
		$posts = '';
		for($i=$start; $i<$end-$nr_of_stickies; $i++)
		{	if ($myposts[$i]->post_status == 'draft')
			{	$draft = __('DRAFT', 'order-your-posts-manually').' * ';
				$class = ' opm-draft';
			}
			else
			{	$draft = '';
				$class = '';
			}
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($myposts[$i]->ID), 'thumbnail' );
			$url = $thumb['0'];			
			if($field_name == 'post_date')
				$this_date = $myposts[$i]->post_date;
			else
				$this_date = $myposts[$i]->post_modified;
			if($url && $opm_show_thumbnails == "Y")
			{	$posts .= '<li id="post-id-'.$myposts[$i]->ID.'" class="ui-state-default'.$class.'" style="height:'.$opm_thumbnail_size.'px;" title="Post ID: '.$myposts[$i]->ID.'"><div class="opm-post-text" style="float:left"><small>'.$this_date.'</small> * <strong>'.$draft.$myposts[$i]->post_title.'</strong></div><div class="opm-post-thumb" style="float:right"><img src="'.$url.'" width="'.$opm_thumbnail_size.'" height="'.$opm_thumbnail_size.'"></div></li>';
			}
			else
			{	$posts .= '<li id="post-id-'.$myposts[$i]->ID.'" class="ui-state-default'.$class.'" title="Post ID: '.$myposts[$i]->ID.'"><small>'.$this_date.'</small> * <strong>'.$draft.$myposts[$i]->post_title.'</strong></li>';
			}
		}

		// RETURN THE SET OF POSTS TO THE CALLER
		echo $posts;
	}

	// NEEDED FOR AN AJAX SERVER
	wp_die();
} // opm_action_callback()
add_action( 'wp_ajax_opm_action', 'opm_action_callback' );
?>
