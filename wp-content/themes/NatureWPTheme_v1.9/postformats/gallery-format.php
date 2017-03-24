<?php global $post; ?>
<div class="flexslider">
    <ul class="slides">
      <?php $gallery1 = get_post_meta( $post->ID, '_cmb_gallery1', true );
      			if ($gallery1 !='') { echo '<li><img src="' . $gallery1 . '" /></li>'; }
      	  $gallery2 = get_post_meta( $post->ID, '_cmb_gallery2', true );
      	  			if ($gallery2 !='') { echo '<li><img src="' . $gallery2 . '" /></li>'; }
      	  $gallery3 = get_post_meta( $post->ID, '_cmb_gallery3', true );
      	  			if ($gallery3 !='') { echo '<li><img src="' . $gallery3 . '" /></li>'; }
      	  $gallery4 = get_post_meta( $post->ID, '_cmb_gallery4', true );
      	  			if ($gallery4 !='') { echo '<li><img src="' . $gallery4 . '" /></li>'; }
      	  $gallery5 = get_post_meta( $post->ID, '_cmb_gallery5', true );
      	  			if ($gallery5 !='') { echo '<li><img src="' . $gallery5 . '" /></li>'; }
      	  $gallery6 = get_post_meta( $post->ID, '_cmb_gallery6', true );
      	  			if ($gallery6 !='') { echo '<li><img src="' . $gallery6 . '" /></li>'; }
      	  $gallery7 = get_post_meta( $post->ID, '_cmb_gallery7', true );
      	  			if ($gallery7 !='') { echo '<li><img src="' . $gallery7 . '" /></li>'; }
      	  $gallery8 = get_post_meta( $post->ID, '_cmb_gallery8', true );
      	  			if ($gallery8 !='') { echo '<li><img src="' . $gallery8 . '" /></li>'; } ?>
    </ul>
</div>