 <?php global $nature_mt; ?>
                <!-- Contact Form and Info -->
<div class="container">				
                <div class="row contact-row">	
                    <!-- Contact Form -->
                    <div class="span8 send-message-form-span">
                        <div class="send-message-form-box">
                            <h3>Send Us a Message</h3>
                                <?php if(isset($nature_mt['contact_text']) && $nature_mt['contact_text'] != '') { ?>
                                    <p><?php echo $nature_mt['contact_text'];?></p>
                                <?php } ?>                             
                            <div class="send-message-form">
                           	 <form class="form-inline" id="form" method="post" action="<?php echo get_template_directory_uri(); ?>/mail/contact.php">
                                    <input type="text" name="name" placeholder="Your first name..." required />
                                    <input type="text" name="last_name" placeholder="Your last name..." required />
                                    <input type="email" name="email" placeholder="Your email..." required />
                                    <div class="message-textarea">
                                        <textarea name="message" placeholder="Your mesasge..." data-minlength="20" required></textarea>
                                        <div class="submit-btn"><button type="submit" class="btn" id="submit"></button></div>
                                    </div>
                                </form>
								<span class="sending">
								    sending...
								</span>
								<div class="mess center">
								</div>								
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form end -->
                    <!-- Contact Info -->
                    <div class="span4 contact-info-span">
                        <div class="contact-info-box">
                            <h3>Contact Info</h3>
                            <div class="contact-info">
                                
                                <?php if(isset($nature_mt['contact_address']) && $nature_mt['contact_address'] != '') { ?>    
                                   <div class="map-marker">
                                    <p><?php echo $nature_mt['contact_address'];?></p>
                                    </div>
                                <?php } ?> 
                                

                                <p>
<?php if(isset($nature_mt['phone']) && $nature_mt['phone'] != '') { ?>
                                Phone: <?php echo $nature_mt['phone'];?>
<?php } ?> 
                                <br> 
<?php if(isset($nature_mt['fax']) && $nature_mt['fax'] != '') { ?>
                                Fax: <?php echo $nature_mt['fax'];?> 
<?php } ?> 
                                <br>
<?php if(isset($nature_mt['web']) && $nature_mt['web'] != '') { ?>
                                Web: <a href="<?php echo $nature_mt['web'];?>"><?php echo $nature_mt['web'];?></a></p>
<?php } ?>                            
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info end -->
                </div>
</div>
                <!-- Contact Form and Info -->