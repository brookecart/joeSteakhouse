    <section id="comments" class="comments">
        <div class="container">
            <div class="row comments-row">  
                <div class="span12 comments-span">
                    <div class="comments-box">
                        <h3><?php comments_number( __( 'No Responses', 'nature'), __( '1 Response', 'nature'), __( '% Responses', 'nature') ); ?></h3>
                        <div class="comments-list-box">
          <ul>  
            <?php
function mt_format_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

                        <div id="comment-<?php comment_ID() ?>" class="com">
                              <div class="comment-author">
                                    <div class="comment-author-vcard"><?php echo get_avatar( $comment, $size='50' ); ?></div>
                                    <div class="comment-author-meta">
                                        <div class="comment-author-name"><a href="#"><?php comment_author_link(); ?></a></div>
                                        <div class="comment-meta"><a href="#"><?php comment_date( 'd M y @ g:i A ' ); ?></a> </div>
                                    </div>
                              </div>
                              <div class="comment-text">                     
                                      <?php if ($comment->comment_approved == '0') : ?>
                                       <em><?php _e( 'Your comment is awaiting moderation.', 'nature'); ?></em>
                                      <?php endif; ?>
                                      <?php comment_text() ?>
                              </div>
                        </div>



<?php } ?>
                <?php wp_list_comments( array( 'callback' => 'mt_format_comment' ) );?>

          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section> 

<!-- Respond -->
    <section id="respond" class="respond">
        <div class="respond-box">
            <div class="container">
                <div class="row respond-row">   
                    <div class="span12 send-message-form-span">
                        <div class="send-message-form-box">

                           <?php paginate_comments_links('prev_text=back&next_text=forward'); ?>


<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
 <div class="send-message-form">            
  <?php 
  $commenter = wp_get_current_commenter();
  $args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<input type="text" name="author" placeholder="Your first name..." value="' . esc_attr( $commenter['comment_author'] ) . '" required />',
    'email'  => '<input type="email" name="email" placeholder="Your email..." value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required />',
    'url'    => '<input type="text" name="url"  value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Your website ...." /> ' ) ),
    'comment_field' =>' <textarea id="comment" name="comment" placeholder="Your mesasge..." data-minlength="20" required></textarea>',
    'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be logged in to post a comment.', 'nature') ) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%s">%s</a>.</p>', 'nature' ), admin_url( 'profile.php' ), $user_identity ),
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'id_form' => 'comments-form',
    'id_submit' => 'submit-btn',
    'title_reply' => __( 'Leave a Reply', 'nature' ),
    'title_reply_to' => __( 'Leave a Reply to %s', 'nature'),
    'cancel_reply_link' => __( 'Cancel reply', 'nature' ),
    'label_submit' => __( 'Post Comment', 'nature' ),
  );
  comment_form( $args ); 
  ?>

                           

                            </div>

                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
<!-- Respond end -->    
<?php endif; // If registration required and not logged in ?>
