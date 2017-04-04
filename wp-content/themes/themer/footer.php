			<!-- footer -->
			<footer class="footer" role="contentinfo">
                
                <h1>hello</h1>

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
                    zoom: 50
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
