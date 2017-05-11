            <!-- footer -->
			<footer class="footer" role="contentinfo">
                
                <!-- FOOTER CONTENT -->
                <!-- FORM -->
                 
                <div id="contact">
                <div class="container-fluid grey-bgc pt50 pb50">
                <div class="row zdivide">
                    <div class="col-sm-6">
                            <div class="row justify-content-center">
                            <div class="col-10 cl-b">
                                <h3>CONTACT US</h3>
                                 
                                <?php ninja_forms_display_form(2) ?>
                                
                            </div>
                            </div>
                    </div>
                  
                    
                
                    <!-- END FORM -->
                    
                    <div class="col-sm-6">
                        <img class="center-block footer-img" src="wp-content/themes/themer/img/grill-icon.png">
                        
                        <div class="footer-text-content">
                        <div class="p-3 cl-b fw-300">
                            <h4 class="text-center">831 Van Ness Ave.</h4>
                            <h4 class="text-center">Fresno, CA 93721</h4>
                        </div>
                        
                        <div class="p-2 cl-b fw-300">
                            <h4 class="text-center">559.486.3536</h4>
                            <h4 class="text-center">info.joessteakhouse@gmail.com</h4>
                        </div>
                        
                        <div class="container-fluid">
                        <div class="row justify-content-center p-2">
                            <div class="col-1 text-center">
                                <a href="https://www.facebook.com/pages/Joes-Steakhouse-Grill/827678503974687" target="_blank"><i class="fa fa-3x fa-facebook-square" aria-hidden="true"></i></a>
                            </div>
                                                        
                            <div class="col-1 text-center">
                                <a href="https://www.instagram.com/joessteakhousefresno/" target="_blank"><i class="fa fa-3x fa-instagram" aria-hidden="true"></i></a>
                            </div>
                            
                            <div class="col-1 text-center">
                                <a href="https://twitter.com/Joessteakhouse" target="_blank"><i class="fa fa-3x fa-twitter-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        </div>
                        
                        <div class="row justify-content-center pt-4">
                        <p class="copyright cl-b fw-300">
                            &copy; <?// php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <br><?php _e('Powered by', 'html5blank'); ?>
                            <a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
                        </p>
                        </div>
                        </div>
                    
                    </div>
                    
                </div> 
                </div>
                </div>
            
                <!-- END FOOTER CONTENT -->
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

        <!--GOOGLE MAP SCRIPT-->
        
        <script>
            function myMap() {
                var myLatLng = {lat: 36.733104, lng: -119.787595};
                var map = new google.maps.Map(document.getElementById("map"), {
                    center: myLatLng,
                    zoom: 13
                });
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: "Joe's Steakhouse and Grill"
                });
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>


        <script>

            (function($) {
            $('#nav').affix({
                offset: {top: $('#parallax_535').height() }
            });
        })(jQuery);
            
        </script>
        <script>
            
            (function($) {
                $(document).ready(function(){
                  $('.slickslider').slick({
                    dots: true,
                      infinite: false,
                      speed: 300,
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      arrows: false,
                      responsive: [
                        {
                          breakpoint: 1024,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                          }
                        },
                        {
                          breakpoint: 600,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                        },
                        {
                          breakpoint: 480,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                      ]
                    });
                });
            })(jQuery);
</script>

	</body>
</html>
