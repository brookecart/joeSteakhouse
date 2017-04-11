<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/zcss.css">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
        
        <script src="https://use.fontawesome.com/002d370eca.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/smoothscroll.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
            
        $( 'ul.nav').find('a').click(function(){
           var $href = $(this).attr('href');
            var $anchor = $('#'+$href).offset();
            window.scrollTo($anchor.left,$anchor.top);
            return false;
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<!-- <div class="wrapper"> -->

			<!-- header -->
			<!-- <header class="header clear" role="banner"> -->

					<!-- logo -->
					<!-- <div class="logo">
						<a href="<?php echo home_url(); ?>"> -->
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
                    </div> -->
					<!-- /logo -->

			<!-- </header> -->
			<!-- /header -->
        
        	<main role="main">
		<!-- section -->
		<section>

		<!-- <h1><//?php the_title(); ?></h1> -->
            
        <!-- homepage image -->
            <div class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="display: block; width: 100%; height: auto;">
                  <img class="d-block img-fluid" src="http://localhost:8080/wp-content/uploads/2017/03/home-photo-min.png" alt="Home image" style="object-fit: contain;">
                  <div class="carousel-caption d-none d-md-block">
                        <img src="http://localhost:8080/wp-content/uploads/2017/04/Grill-Face-7.png" alt="Grill face logo">
                        <h3>Joe's</h3>
                        <h1>STEAKHOUSE</h1>
                        <p>AND GRILL</p>
                  </div>
                </div>
              </div>
            </div>
        <!-- end homepage image -->
            
        <!-- navbar -->
            
            <nav class="navbar navbar-inverse navbar-static-top" data-spy="affix" data-offset-top="730.2">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                      </button>
                    </div>
                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="display: inline-block; float: none;">
                        <li><a href="#top">HOME</a></li>
                        <li><a href="#menu">MENU</a></li>
                        <li><a href="#cater">CATERING</a></li>
                        <li><a href="#history">HISTORY</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                    </ul>
                </div>
                    
                    <?php html5blank_nav(); ?>
                    
                </div>
            </nav>
            
        <!-- end navbar -->
                </section>
        </main>
