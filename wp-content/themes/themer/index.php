<?php get_header(); ?>



	<main role="main">
		<!-- section -->
		<section>

		<!-- <h1><?php the_title(); ?></h1> -->
            
        <!-- homepage image -->
<!--
            <div class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="display: block; width: 100%; height: auto;">
                  <img class="d-block img-fluid" src="http://localhost:8080/wp-content/uploads/2017/03/home-photo-min.png" alt="First slide" style="object-fit: contain;">
                  <div class="carousel-caption d-none d-md-block" style="top: 45%; bottom: auto;">
                   <h3>Joe's Steakhouse</h3>
                    <p>and Grill</p>
                  </div>
                </div>
              </div>
            </div> 
-->
        <!-- end homepage image -->
            
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
            <div class="row m0 p0" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="slickslider" style="overflow: hidden;">
                
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="col-3">
        <img src="<?php the_field('family_photo_field'); ?>" class="img-fluid" alt="Family photo">
                </div>
        <?php endwhile; wp_reset_query(); ?>
             
            
            </div>
            </div>
            </div>
        </article>
            
                

		</section>
		<!-- /section -->
	</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
