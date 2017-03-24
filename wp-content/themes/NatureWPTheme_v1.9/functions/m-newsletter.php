<?php global $nature_mt; ?>
<!-- Newsletter -->
    <section id="newsletter" class="newsletter">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="newsletter-box">
                                <?php if(isset($nature_mt['newsletter_text']) && $nature_mt['newsletter_text'] != '') { ?>
                                    <?php echo $nature_mt['newsletter_text'];?>
                                <?php } ?>                        
                        <div class="newsletter-form">
                            <div class="newsletter-form-box">
                                <form class="form-inline" id="newsletter-form" method="post" action="<?php echo get_template_directory_uri(); ?>/mail/newsletter.php">
                                    <input type="email" name="nemail" class="newsletter-input" placeholder="Type your email..." required>
                                    <button type="submit" class="btn" id="n-submit">Send message</button>
                                </form>

                            </div>

                                <span class="sending">
                                    sending...
                                </span>
                                <div class="mess center">
                                </div>                              
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
<!-- Newsletter end -->