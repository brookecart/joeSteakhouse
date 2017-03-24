<?php
get_header('mt');
?>
<!-- Blog -->
    <section class="mtblog">
        <div class="container">
            <!-- section title -->
            <div class="row">
                <div class="span12">
                    <div class="section-title">
                        <h2><span>Our Blog</span></h2>
                        <p><?php echo get_post_meta( $post->ID, '_cmb_p_sub_title', true ); ?></p>
                    </div>
                </div>
            </div>
            <!-- section title end -->            
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

                        <!-- post meta -->
                        <div class="post-meta">
                            <a href="#">By <?php the_author() ?></a> 
                            <a href="#"><?php echo get_the_date('d M y'); ?></a>
                             <?php comments_popup_link('0 comments', '1 comments', '% comments','comments-link','Comments are off for this post'); ?>
                             <?php the_category(', ') ?>
                         </div>
  						<!-- post meta end -->


  						<?php $format = get_post_format(); if( false === $format || $format == 'image' ) { $format = 'standard'; } ?>

                        <!-- Post Featured Box -->
                        <?php if( has_post_thumbnail() || $format == 'gallery' || $format == 'video' )  : ?>
                        <div class="post-featured-box">
                            <div class="post-featured-image">
                                <?php the_post_thumbnail('blog-posts'); ?>
                                <?php get_template_part( '/postformats/' . $format . '-format' ); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- Post Featured Box end -->
 
                        <!-- post content -->
                        <div class="mt-blog-single-post-content"><?php the_content(''); ?></div>
                        <!-- post content end -->

                      <!-- post tags -->
					  <div class="post-tags">Tags:  <?php $tag = get_the_tags(); if (! $tag) { ?> There is no tags<?php } else { ?><?php the_tags(''); ?><?php } ?></div>
					  <!-- post tags -->

                    </div>
                </div>
                    <?php endwhile; endif; ?>
                    <!-- Blog Post end -->
                </div>
            </div>
           <!-- Blog Post's end -->

        </div> 
    </section>

    <?php comments_template( '', true ); ?>

    
<!-- Blog end -->
<?php get_footer();?>