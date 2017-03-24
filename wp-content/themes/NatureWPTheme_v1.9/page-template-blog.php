<?php
/* 
Template name: Blog page template
*/
global $nature_mt;
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
            <div class="row blog-post-row">
                <div class="span12 blog-post-span">
                  <?php if ( !is_archive() ) { ?>
                        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('paged='.$paged.'&cat='.$cat); ?>     
                        <?php } ?> 
                        <?php if (!(have_posts())) { ?><div class="span12"><h2 class="colored">There is no posts</h2></div><?php }  ?>   
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                        ?>
                    <!-- Blog Post end -->
                    <div class="blog-post-box">
                        <!-- post title -->
                        <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                        <!-- post title end -->

                        <!-- post meta -->
                        <div class="post-meta">
                            <a href="#">By <?php the_author() ?></a> 
                            <a href="#"><?php echo get_the_date('d M y'); ?></a>
                             <?php comments_popup_link('0 comments', '1 comments', '% comments','comments-link','Comments are off for this post'); ?>
                        </div>
                        <!-- post meta end -->
                        
                        <p><?php the_excerpt(); ?></p>
  
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
                        
                    </div>
                    <!-- Blog Post end -->
<?php endwhile; endif; ?>
<?php wp_link_pages(); ?>
<?php get_template_part ('inc/pagination'); ?>
                </div>
            </div>
           <!-- Blog Post's end -->

        </div> 
    </section>
<!-- Blog end -->

<?php get_footer();?>