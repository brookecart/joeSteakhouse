
<?php if( get_post_meta( $post->ID, '_cmb_the_hosted_video_switch', true ) !='on' ) : ?>
	<div class="post-featured-video">
		<?php echo get_post_meta( $post->ID, '_cmb_the_video', true ); ?>
	</div>
<?php endif; ?>
	
<?php if( get_post_meta( $post->ID, '_cmb_the_hosted_video_switch', true ) == 'on' ) : 
	if(!( is_single() )) : ?>
	<video controls="" width="100%" height="auto" poster="<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-video'); echo $url[0]; ?>">
		<source src="<?php echo get_post_meta( $post->ID, '_cmb_the_hosted_mp4', true ); ?>" type="video/mp4" />
		<source src="<?php echo get_post_meta( $post->ID, '_cmb_the_hosted_webm', true ); ?>" type="video/webm" />
		<source src="<?php echo get_post_meta( $post->ID, '_cmb_the_hosted_ogg', true ); ?>" type="video/ogg" />
		<object width="640" height="360" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri() . '/player/lib/'; ?>flashmediaelement.swf" />
			<param name="movie" value="<?php echo get_template_directory_uri() . '/player/lib/'; ?>flashmediaelement.swf" />
			<param name="flashvars" value="controls=true&amp;file=<?php echo get_post_meta( $post->ID, '_cmb_the_hosted_mp4', true ); ?>" />
			<img src="<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-video'); echo $url[0]; ?>" width="640" height="360" alt="No video playback capabilities" />
		</object>
	</video>	
	<?php else : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-video'); ?></a>
	<?php endif; endif; ?>
	
