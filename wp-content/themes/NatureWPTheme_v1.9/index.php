<?php
global $nature_mt;
get_header(); ?>

 <?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['top-menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['top-menu'] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $include = array();
        foreach($menu_items as $item) {
            if($item->object == 'page')
                $include[] = $item->object_id;
        }
        query_posts( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
    }
    else
    {
        if(isset($nature_mt['pages_topmenu']) && $nature_mt['pages_topmenu'] != '' )
            query_posts(array( 'post_type' => 'page', 'post__in' => $nature_mt['pages_topmenu'], 'posts_per_page' => count($nature_mt['pages_topmenu']), 'orderby' => 'menu_order', 'order' => 'ASC' ) );
        else
            query_posts(array( 'post_type' => 'page', 'posts_per_page' => 4, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
    }
    
    while(have_posts() ) : the_post(); ?>
    <style>
        .<?php echo $post->post_name;?>{
            padding:130px 0 0px 0;
        }
    </style>
    <section id="<?php echo $post->post_name;?>" class="<?php echo $post->post_name;?>">
        <div class="container-fluid">
            <!-- section title -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="section-title">
                        <h2>
                            <span><?php $top_title = get_post_meta($post->ID, 'top_title', true); 
                                if($top_title != '') echo $top_title; else the_title();?></span>
                        </h2>
                        <p><?php echo get_post_meta( $post->ID, '_cmb_p_sub_title', true ); ?></p>
                    </div>
                </div>
            </div>
            <!-- section title end -->
                <?php global $more; $more = 0; the_content('');?>   
        </div><!-- end of container --> 
    </section><!-- end of sections -->

    <?php endwhile; wp_reset_query(); ?>



<?php 
get_footer(); ?>