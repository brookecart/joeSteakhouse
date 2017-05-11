<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>Joe's Steakhouse and Grill</title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/grill-icon.png" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/grill-icon.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/zcss.css">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
        
        <script src="https://use.fontawesome.com/002d370eca.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	</head>
	<body>        
        	<main role="main">
		<!-- section -->
		<section>

		<!-- <h1><//?php the_title(); ?></h1> -->
            
        <!-- homepage image -->
            <div id="home">
                
             <?php echo do_shortcode('[parallax-scroll id="535"]') ?>
                
            </div>
        <!-- end homepage image -->
            
        <!-- navbar -->
        <div id="nav-wrapper">
            <div id="nav">
            <nav class="navbar navbar-inverse navbar-static-top navbar-md">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-coll">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                      </button>
                    </div>
                <div class="collapse navbar-collapse text-center" id="nav-coll">
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
