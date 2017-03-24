<?php
get_header('mt');
?>
<!-- Blog -->
    <section class="mtblog">
        <div class="container">           
            <!-- Blog Post's -->
            <div class="row single-blog-post-row">
                <div class="span12 single-blog-post-span">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- Blog Post end -->
                <div class="row <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
               		<div class="blog-post-box">

                    	<!-- post title -->
                        <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                        <!-- post title end  -->

 
                        <!-- post content -->
                        <div class="mt-blog-single-post-content"><?php the_content(''); ?></div>
                        <!-- post content end -->


                    </div>
                </div>
                    <?php endwhile; endif; ?>
                    <!-- Blog Post end -->
                </div>
            </div>
           <!-- Blog Post's end -->

        </div> 
    </section>


    
<!-- Blog end -->
<?php get_footer();?>