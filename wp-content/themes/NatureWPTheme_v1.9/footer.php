 <?php global $nature_mt; ?>
</div>
<!-- Footer -->
<footer>
    <section id="footer" class="footer">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12 footer-span">
                    <div class="scroll-top"><a href="#"></a></div>
                    <?php if(isset($nature_mt['footer_text']) && $nature_mt['footer_text'] != '') { ?>
                    <p>&copy;<?php echo $nature_mt['footer_text'];?></p>
                    <?php } ?> 
                    <!-- Footer Social Icon -->
                    <ul class="social">                        
                <?php if(isset($nature_mt['twitter_url']) && $nature_mt['twitter_url'] != '') { ?>
                        <li><a class="twitter" href="<?php echo $nature_mt['twitter_url'];?>">Twitter</a></li>
                <?php } ?> 
                <?php if(isset($nature_mt['facebook_url']) && $nature_mt['facebook_url'] != '') { ?>
                        <li><a class="facebook" href="<?php echo $nature_mt['facebook_url'];?>">Facebook</a></li>
                <?php } ?> 
                <?php if(isset($nature_mt['rss_url']) && $nature_mt['rss_url'] != '') { ?>
                        <li><a class="rss" href="<?php echo $nature_mt['rss_url'];?>">RSS</a></li>

                <?php } ?> 
                <?php if(isset($nature_mt['forrst_url']) && $nature_mt['forrst_url'] != '') { ?>
                        <li><a class="forrst" href="<?php echo $nature_mt['forrst_url'];?>">Forrst</a></li>

                <?php } ?> 
                <?php if(isset($nature_mt['dribble_url']) && $nature_mt['dribble_url'] != '') { ?>
                        <li><a class="dribbble" href="<?php echo $nature_mt['dribble_url'];?>">Dribbble</a></li>

                <?php } ?> 
                    </ul>
                    <!-- Footer Social Icon end -->
                </div>
            </div>
        </div>
    </section>
</footer>

<!-- Footer end -->
<?php global $nature_mt;
if(isset($nature_mt['integration_footer'])) echo $nature_mt['integration_footer'] . PHP_EOL; ?>

 <?php wp_footer(); ?>
  </body>
</html>