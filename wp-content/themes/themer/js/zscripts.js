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
                            slidesToShow: 2,
                            slidesToScroll: 2,
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

        (function($) {
                $(document).ready(function(){
                    var stHeight = $('.slickslider').height();
                    $('.slick-img').css('height',stHeight + 'px' );
                });
            })(jQuery); 
     
/*     });
    
    })(jQuery);*/