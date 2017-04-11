			<!-- footer -->
			<footer class="footer" role="contentinfo">
                
                <!-- FOOTER CONTENT -->
                <!-- FORM -->
                 
                <div id="contact">
                <div class="container-fluid" style="background-color: #424242; padding-top: 50px; padding-bottom: 50px;">
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="center-block">
                            
                            <div class="col-10">
                                 
                                <?php ninja_forms_display_form(2) ?>
                                
                            </div>
                        </div>
                    </div>
                  
                    
                
                    <!-- END FORM -->
                    
                    <div class="col-sm-6">
                        <img class="center-block footer-img" src="http://localhost:8080/wp-content/uploads/2017/04/Grill-Face-7.png">
                        
                        <div class="pt-5 cl-b fw-300">
                            <h5 class="text-center">831 Van Ness Ave.</h5>
                            <h5 class="text-center">Fresno, CA 93721</h5>
                        </div>
                        
                        <div class="pt-4 cl-b fw-300">
                            <h5 class="text-center">559.486.3536</h5>
                            <h5 class="text-center">info.joessteakhouse@gmail.com</h5>
                        </div>
                        
                        <div class="row justify-content-center pt-4">
                            <div class="col-1 text-center">
                                <a href="#" target="_blank"><i class="fa fa-3x fa-facebook-square" aria-hidden="true"></i></a>
                            </div>
                                                        
                            <div class="col-1 text-center">
                                <a href="#" target="_blank"><i class="fa fa-3x fa-instagram" aria-hidden="true"></i></a>
                            </div>
                            
                            <div class="col-1 text-center">
                                <a href="#" target="_blank"><i class="fa fa-3x fa-twitter-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center pt-5">
                        <p class="copyright">
                            &copy; <?// php echo date('Y'); ?> Copyright <?//php bloginfo('name'); ?>. <?//php _e('Powered by', 'html5blank'); ?>
                            <a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
                        </p>
                        </div>
                    
                    </div>
                    
                </div> 
                </div>
                </div>
            
                <!-- END FOOTER CONTENT -->
                
                
                
				<!-- copyright -->
				<!-- <p class="copyright">
					&copy; <?// php echo date('Y'); ?> Copyright <?//php bloginfo('name'); ?>. <?//php _e('Powered by', 'html5blank'); ?>
					<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
				</p>
				<!-- /copyright -->
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

	</body>
</html>
