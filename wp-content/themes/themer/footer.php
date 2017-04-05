			<!-- footer -->
			<footer class="footer" role="contentinfo">
                
                <!-- FOOTER CONTENT -->
                <!-- FORM -->
                
                <div class="container-fluid" style="background-color: #d6d6d6; padding-top: 50px; padding-bottom: 50px;">
                <div class="row">
                    
                    <div class="col-sm-6 align-self-center">
                        <div class="col-10">
                        <h3 style="padding-left: 30px;">GET IN TOUCH</h3>
                        <div class="form-group">
                            
                            <div class="col-10">
                            <label style="padding-top: 10px;" for="contactName">Name</label>
                            <input class="form-control" type="text" id="contactName">
                            
                            <label style="padding-top: 10px;" for="contactEmail">Email</label>
                            <input class="form-control" type="email" id="contactEmail">
                            
                            <label style="padding-top: 10px;" for="contactPhone">Phone</label>
                            <input class="form-control" type="tel" id="contactPhone">
                            
                            <label style="padding-top: 10px;" for="contactMsg">Write us a message</label>
                            <textarea class="form-control" id="contactMsg" rows="3"></textarea>
                            
                            <div style="padding: 20px;"></div>
                            
                            <div class="text-center">
                            <button type="submit" class="btn btn-secondary">Send</button>
                            </div>
                            </div>
                                
                        </div>
                        </div>
                    </div>
                    
                    <!-- END FORM -->
                    
                    <div class="col-sm-6">
                        <img style="" class="center-block" src="http://localhost:8080/wp-content/uploads/2017/04/Grill-Face-7.png">
                        
                        <h6 class="text-center">831 Van Ness Ave.</h6>
                        <h6 class="text-center">Fresno, CA 93721</h6>
                        
                        <h6 class="text-center">559.486.3536</h6>
                        <h6 class="text-center">info.joessteakhouse@gmail.com</h6>
                        
                        <div class="row justify-content-center">
                         <i class="fa fa-facebook-square" aria-hidden="true"></i>
                         <i class="fa fa-twitter-square" aria-hidden="true"></i>
                         <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                        
                        <div class="row justify-content-center">
                        <p class="copyright">
                            &copy; <?// php echo date('Y'); ?> Copyright <?//php bloginfo('name'); ?>. <?//php _e('Powered by', 'html5blank'); ?>
                            <a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
                        </p>
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
