<?php
/*
	SHORTCODES
*/
//
	add_filter("the_content", "the_content_filter");
 
	function the_content_filter($content) {
	 
	// array of custom shortcodes requiring the fix
	$block = join("|",array("h1","h2","h3","h4","h5","h6","service-row","service","other-service-row","other-service","section-info","team","ts-row","testimonial","item","skills","skill","portfolio","slider","slide","blockquote","mrop"));
	 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	 
	return $rep;
	 
	}
// h1 ,h2 ,h3 ,h4, h5 ,h6

function h1_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h1>'.do_shortcode($content).'</h1>
	';
	return $code;
}
add_shortcode('h1', 'h1_f');


function h2_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h2>'.do_shortcode($content).'</h2>
	';
	return $code;
}
add_shortcode('h2', 'h2_f');


function h3_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h3>'.do_shortcode($content).'</h3>
	';
	return $code;
}
add_shortcode('h3', 'h3_f');


function h4_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h4>'.do_shortcode($content).'</h4>
	';
	return $code;
}
add_shortcode('h4', 'h4_f');



function h5_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h5>'.do_shortcode($content).'</h5>
	';
	return $code;
}
add_shortcode('h5', 'h5_f');


function h6_f($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
			<h6>'.do_shortcode($content).'</h6>
	';
	return $code;
}
add_shortcode('h6', 'h6_f');


//Blockquote
	function m_blockquote($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
	<blockquote>'.do_shortcode($content).'</blockquote>
	';
	return $code;
	}

	add_shortcode('blockquote', 'm_blockquote');	
//SERVICE-ROW 

	function m_service_row($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
	<div class="container">
		<div class="row service-row">'.do_shortcode($content).'</div>
	</div>
	';
	return $code;
	}

	add_shortcode('service-row', 'm_service_row');

//SERVICE
	function m_service($atts, $content = null) {
	extract( shortcode_atts( array(  
				"title" => 'SERVICE TITLE',
				"text" => 'SERVICE DETAILS',
				"image" => 'SERVICE IMAGE',
				"url" => 'SERVICE BUTTON URL',
				),$atts));
	
		$code = '
	                <div class="span4 service-span">
	                    <div class="service-box">
	                        <img class="img-circle" src="'.$image.'" alt="'.$title.'">
	                        <h3>'.$title.'</h3>
	                        <p>'.$text.'</p>
	                        <a class="btn" href="'.$url.'">Read More</a>
	                    </div>
	                </div>					
				';
		return $code;
	}
	add_shortcode('service', 'm_service');

//OTHER SERVICE-ROW 

	function m_o_service_row($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
		<div class="container"><div class="row other-service-row"><div class="other-service-bg">'.do_shortcode($content).'</div></div></div>
	';
	return $code;
	}

	add_shortcode('other-service-row', 'm_o_service_row');



	function m_rop($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	$code = '
	                <div class="span3 other-service-span">
                        <div class="other-service-box">
                            <h4 class="other-service-1">Design Therapy</h4>
                            <p>Lorem ipsum dolor slo onsec designs tueraliquet Morbi nec In Curabitur nel</p>
                        </div>
                    </div>
                    <div class="span3 other-service-span">
                        <div class="other-service-box">
                            <h4 class="other-service-2">Design Therapy</h4>
                            <p>Lorem ipsum dolor slo onsec designs tueraliquet Morbi nec In Curabitur nel</p>
                        </div>
                    </div>
                    <div class="span3 other-service-span">
                        <div class="other-service-box">
                            <h4 class="other-service-3">Design Therapy</h4>
                            <p>Lorem ipsum dolor slo onsec designs tueraliquet Morbi nec In Curabitur nel</p>
                        </div>
                    </div>
                    <div class="span3 other-service-span">
                        <div class="other-service-box">
                            <h4 class="other-service-4">Design Therapy</h4>
                            <p>Lorem ipsum dolor slo onsec designs tueraliquet Morbi nec In Curabitur nel</p>
                        </div>
                    </div>
	';
	return $code;
	}
	add_shortcode('mrop', 'm_rop');


//OTHER SERVICE
	
	function m_o_service($atts, $content = null) {
	extract( shortcode_atts( array( 
				"icon"  => '',
				"title" => 'SERVICE TITLE',
				"text" => 'SERVICE DETAILS',
				),$atts));
	
		$code = '
                    <div class="span3 other-service-span">
                        <div class="other-service-box">
                        	<div class="icon"><img src="'.$icon.'" alt="" /></div>
                            <h4 class="other-service-1">'.$title.'</h4>
                            <p>'.$text.'</p>
                        </div>
                    </div>				
				';
		return $code;
	}
	add_shortcode('other-service', 'm_o_service');	
//SECTION INFO	
	function m_section_info($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
		    <div class="row-fluid">
                <div class="span12">
                    <div class="section-subtitle">
                        <h5>'.do_shortcode($content).'</h5>
                    </div>
                </div>
            </div>                        
	';
	return $code;
	}

	add_shortcode('section-info', 'm_section_info');

//Team SHORTCODE
	function mt_team($atts){
		extract(shortcode_atts( array(), $atts) );
		$the_query = new WP_Query('post_type=mt_team&posts_per_page=-1');
		if($the_query->have_posts()) :

		$teams = '<div class="container"><div class="row about-row">';
		//$clients .= '<ul class="thumbnails">';
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$id = get_the_ID();
			$team_title = get_the_title($id);
			$team_post = get_post_meta( $id, '_cmb_team_post', true );
			$team_avater = get_post_meta( $id, '_cmb_team_image', true );
 			$team_about = get_post_meta( $id, '_cmb_team_about', true );
			$teams .= '
                <div class="span3 about-span">
                    <div class="team-box">
                    	<img class="img-circle" src="'.$team_avater.'" alt="'.$team_title.'"/>
                        <h5>'.$team_title.'</h5>
                        <span>'.$team_post.'</span>
                        <p>'.$team_about.'</p>
                        <ul class="social">';

			            if($team_tw = get_post_meta( $id, '_cmb_tw_link', true )):
						$teams.= '<li><a class="twitter" href="'.$team_tw.'">Twitter</a></li>';
						endif;
			         

			            if($team_fb = get_post_meta( $id, '_cmb_fb_link', true )):
						$teams.= '<li><a class="facebook" href="'.$team_fb.'">Facebook</a></li>';
						endif;   


						if($team_rss = get_post_meta( $id, '_cmb_rss_link', true )):
						$teams.= '<li><a class="rss" href="'.$team_rss.'">RSS</a></li>';
						endif; 


						if($team_forrst = get_post_meta( $id, '_cmb_forrst_link', true )):
						$teams.= '<li><a class="forrst" href="'.$team_forrst.'">Forrst</a></li>';
						endif;

						if($team_dribbble = get_post_meta( $id, '_cmb_dribbble_link', true )):
						$teams.= '<li><a class="dribbble" href="'.$team_dribbble.'">Dribbble</a></li>';
						endif;              
                            
                                                    
		          $teams .= ' 	 </ul>
		                    </div>
		                </div>
				    ';
				endwhile;
				$teams .= '</div></div>';

				return $teams;
				endif;
	}
	add_shortcode('team', 'mt_team');

//Testimonial&Skill ROW
	function m_testimonial_skill_row($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
		 <div class="container"><div class="row testimonial-skill-row">'.do_shortcode($content).'</div></div>
	';
	return $code;
	}

	add_shortcode('ts-row', 'm_testimonial_skill_row');

//TESTIMONIAL
	function m_testimonial($atts, $content = null) {
	extract( shortcode_atts( array(  
				"slogan" => 'What our clients say!',
				),$atts));
	
		$code = '
                <div class="span6 testimonial-span">
                    <div class="testimonial-box">
                        <h4>TESTIMONIALS</h4>
                        <p>'.$slogan.'</p>
                   
                        <div id="testimonialCarousel" class="carousel slide">
                            <div class="carousel-inner">'.do_shortcode($content).'</div>
                            <a class="left carousel-control" href="#testimonialCarousel" data-slide="prev">&lsaquo;</a>
                            <a class="right carousel-control" href="#testimonialCarousel" data-slide="next">&rsaquo;</a>
                        </div>
                    </div>
                </div>			
				';
		return $code;
	}
	add_shortcode('testimonial', 'm_testimonial');	

//TESTIMONIAL ITEMS
	function m_testimonial_items($atts, $content = null) {
	extract( shortcode_atts( array(  
				"author" => 'Robert  Smith',
				"post" => 'Robert  Smith',
				"image" => '',
				"comment" => '',
				),$atts));
	
		$code = '
                <div class="item ">
                    <img src="'.$image.'" alt="'.$author.'">
                    <div class="container">
                        <div class="carousel-caption">
                            <h4>'.$author.' <span> '.$post.'</span></h4>
                            <p>'.$comment.'</p>
                            <div class="testimonial-meta">
                               
                            </div>                            
                        </div>
                    </div>
                </div>				
				';
		return $code;
	}
	add_shortcode('item', 'm_testimonial_items');		

//SKILLS

	function m_skills($atts, $content = null) {
	extract( shortcode_atts( array(  
				"slogan" => 'What are our speciality',
				),$atts));
	
		$code = '
                <div class="span6 skill-span">
                    <div class="skill-box">
                        <h4>Our Skills</h4>
                        <p>'.$slogan.'</p>
                        <div class="skill-value">'.do_shortcode($content).'</div>
                    </div>
                 </div> 		
				';
		return $code;
	}
	add_shortcode('skills', 'm_skills');	

//Single Skill 

	function m_skill($atts, $content = null) {
	extract( shortcode_atts( array(  
				"value" => '44',
				),$atts));
	
		$code = '
                <div class="progress progress-striped active">
                    <div class="bar" style="width: '.$value.'%;">'.do_shortcode($content).'</div>
                </div>					
				';
		return $code;
	}
	add_shortcode('skill', 'm_skill');	
//Newsletter

	add_shortcode('newsletter', 'mt_newsletter');

	function mt_newsletter($atts=array()) {
	    ob_start();
	    mt_news_letter($atts);
	    $content = ob_get_clean();
	    return $content;
	}

	function mt_news_letter($atts=array()) {
		require (get_template_directory() . '/functions/m-newsletter.php');
	}



//Slider ShortCode
	function m_flex_slider($atts, $content = null) {
	extract( shortcode_atts( array(), $atts));
	
	$code = '
			 <div class="container">
                <div class="row portfolio-slider-row">
                    <div class="span12 portfolio-slider-span">
                        <div class="flexslider">
                            <ul class="slides">'.do_shortcode($content).'</ul>
                        </div>
                    </div>
                </div>
            </div>
	';
	return $code;
	}

	add_shortcode('slider', 'm_flex_slider');
//Slider item shortcode	
	function m_slider_slide($atts, $content = null) {
	extract( shortcode_atts( array(  
				"image" => '',
				"title" => '',
				),$atts));
	
		$code = '
				<li><img src="'.$image.'" alt="'.$title.'"></li>			
				';
		return $code;
	}
	add_shortcode('slide', 'm_slider_slide');	

/*
// Portfolio ShortCode
	function mt_portfolio($atts){
		extract(shortcode_atts( array(), $atts) );
     	$terms = get_terms("tagportifolio");
		
		$the_query = new WP_Query('post_type=portfolio&posts_per_page=-1');
		if($the_query->have_posts()) :
			

		$projects = '<div class="row portfolio-photo-row">';
        $projects .= '<div class="span12 portfolio-photo-span">';        
        $projects .= '<div id="portfolio-options" class="clearfix">';
        $projects .= ' <ul id="filters" class="option-set clearfix" data-option-key="filter">'; 
        $projects .= '<li><a href="#filter" data-option-value="*" class="selected">show all.</a></li>
					'; 
		$count = count($terms);
                     if ( $count > 0 ){
                    
                        foreach ( $terms as $term ) {
                            
                            $termname = strtolower($term->name);
                            $termname = str_replace(' ', '-', $termname);                               
                            $projects .='<li><a href="#filter" data-option-value=".'.$termname.'">'.$term->name.'</a></li>';
         				}
         }			
        $projects .= '</ul>'; 
        $projects .= '</div>';
        $projects .= '<div id="portfolio-container" class="clearfix">';
                     
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$project_id = get_the_ID();
		$project_title = get_the_title($project_id);
		$terms = get_the_terms( $project_id, 'tagportifolio' );
			if ( $terms && ! is_wp_error( $terms ) ) : 
					$links = array();

					foreach ( $terms as $term ) 
					{
						$links[] = $term->name;
					}
						$links = str_replace(' ', '-', $links);	
						$tax = join( " ", $links );		
						else :	
							$tax = '';	
						endif;
		$projects_classes = strtolower($tax); 
		$thumbnail = get_the_post_thumbnail($project_id, 'portfolio_img');
		$projects_link = get_post_meta( $project_id, '_cmb_port_link', true );
		$projects_thumb_url= portfolio_thumbnail_url($project_id);
		$projects .= '<div class="photos '.$projects_classes.'">
								'.$thumbnail.'
                                <div class="portfolio-item-hover">';
		
		if($pro_url = get_post_meta($project_id, "_cmb_port_url", true)):
			$projects.= '<a class="info" data-rel="prettyPhoto" href="'.$pro_url.'" title="'.$project_title.'"></a>';
		else :
			$projects.= '<a class="info" data-rel="prettyPhoto" href="'.$projects_thumb_url.'" title="'.$project_title.'"></a>';
		endif; 
                                    
         $projects .= '   			 <a class="link" href="'.$projects_link.'"></a>
                                    <h6>'.$project_title.'</h6>
                                    <p>'.$projects_classes.'</p>
                                </div>
                        </div>
                    ';

				endwhile;
				$projects .= '</div></div></div>';

				return $projects;
				endif;
	}

add_shortcode('portfolio', 'mt_portfolio');
*/

// Portfolio ShortCode
	function mt_portfolio($atts){
		extract(shortcode_atts( array(), $atts) );
		
		$the_query = new WP_Query('post_type=portfolio&posts_per_page=-1');
		if($the_query->have_posts()) :
			
        $projects = '<div class="container"><ul id="og-grid" class="og-grid">';
                     
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$project_id = get_the_ID();
		$project_title = get_the_title($project_id);
		$project_content = get_the_content($project_id);
		$thumbnail = get_the_post_thumbnail($project_id, 'portfolio_img');
		$projects_link = get_post_meta( $project_id, '_cmb_port_link', true );
		//$projects_limage = portfolio_thumbnail_url($project_id,'portfolio_limg');
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($project_id), 'portfolio_limg' );
		$projects_limage = $thumb['0'];
		$projects .= '	
			<li>
				<a href="'.$projects_link.'" data-largesrc="'.$projects_limage.'" data-title="'.$project_title.'" data-description="'.$project_content.'">
							'.$thumbnail.'
						</a>
			</li>

				';                


				endwhile;
				$projects .= '</ul></div>';

				return $projects;
				endif;
	}

add_shortcode('portfolio', 'mt_portfolio');

//CONTACT SECTION
add_shortcode('contact', 'mt_contact');

function mt_contact($atts=array()) {
    ob_start();
    mt_contact_show($atts);
    $content = ob_get_clean();
    return $content;
}

function mt_contact_show($atts=array()) {
	require (get_template_directory() . '/functions/m-contact.php');
}




?>