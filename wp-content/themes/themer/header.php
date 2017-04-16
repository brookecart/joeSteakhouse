<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic|Open+Sans" rel="stylesheet">
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
        </script>

	</head>
	<body data-spy="scroll" data-target="#nav" <?php body_class(); ?>>

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
            <div id="home">
             <?php echo do_shortcode('[parallax-scroll id="535"]') ?>
            <!--<div class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="display: block; width: 100%; height: auto;">
                  <img class="d-block img-fluid" src="wp-content/themes/themer/img/home-img.png" alt="Home image" style="object-fit: contain;">
                  <div class="carousel-caption d-none d-md-block">
                      <div class="row">
                          
                        <div class="col-12">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/grill-icon.png" width="" height="" alt="Grill face logo" />
                          </div>
                        
                        <div class="col-12">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/name.png" width="" height="" alt="Joe's Steakhouse and Grill" />
                        </div>
                          
                      </div>
                  </div>
                </div>
              </div>
            </div>-->
            </div>
        <!-- end homepage image -->
            
        <!-- navbar -->
        <div id="nav-wrapper">
            <div id="nav">
            <nav class="navbar navbar-inverse navbar-static-top navbar-md">
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
                        <li><a href="#home">HOME</a></li>
                        <li><a href="#menu">MENU</a></li>
                        <li><a href="#cater">CATERING</a></li>
                        <li><a href="#history">HISTORY</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                    </ul>
                </div>
                    
                    <?php html5blank_nav(); ?>
                    
                </div>
            </nav>
            </div>
        </div>
            
        <!-- end navbar -->
                </section>
        </main>
