<?php get_header(); ?>



	<main role="main">
		<!-- section -->
		<section>
            
        <!-- navbar -->
            
            <?php html5blank_nav(); ?>
            
        <!-- end navbar -->    

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
            
			<!-- article -->
			<article id="post-<?php the_ID(); ?> <?php $post->post_name; ?>" <?php post_class(); ?>>
                
				<?php the_content(); ?>

				<!-- <?php comments_template( '', true ); // Remove if you don't want comments ?> -->

				<!-- <br class="clear"> -->

				<!-- <?php edit_post_link(); ?> -->
                

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
            
        <article id="post-<?php the_ID(); ?> <?php $post->post_name; ?>" <?php post_class(); ?>>
            
        <?php $loop = new WP_Query( array( 'post_type' => 'family_photo_post', 'posts_per_page' => -1 ) ); ?>
            
            <div class="container-fluid m0 p0">
            <div class="row slickslider m0 pb70 pt70">
                
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="col-3">
        <div class="container-pls">
        <img class="slick-img img-pls" src="<?php the_field('family_photo_field'); ?>" class="img-fluid" alt="Family photo">
        </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
             
            
            </div>
            </div>
            <!--</div>-->
        </article>
            
                

		</section>
		<!-- /section -->
	</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
