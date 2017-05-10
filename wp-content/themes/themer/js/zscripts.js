/*
(function($) {
 $(document).ready(function() {*/
    
            (function($) {
            $('#parallax_535').height(
                $(window).height() - $('#nav-wrapper').height()
            );
            })(jQuery);
            
            (function($) {
            $('#parallax_537').height(
                $('#glass-view').height()
            );
            })(jQuery); 
            
            (function($) {
            $('#parallax_553').height(
                $('#glass-view').height()
            );
            })(jQuery);
            
            (function($) {
            $('#parallax_553_postcontent').css('padding', '');
            })(jQuery);
            
            (function($) {
            $('#post-187').height(
                $('#see-us-img').height()
            );
            })(jQuery);

            (function($) {
            $('#nav-wrapper').height($('#nav').height());
        })(jQuery);
            
            (function($) {
            $('body').scrollspy({target: '#nav'})
        })(jQuery);
     
/*     });
    
    })(jQuery);*/