<?php 
   global $wp_query;
   $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array'
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagination"><ul class="page-numbers">';
            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div>';
        }	
?>