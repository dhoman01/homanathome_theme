<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]>-->
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css"> -->
			<title><?php echo get_bloginfo( 'name' ); ?></title>

			<?php // mobile meta (hooray!) ?>
			<meta name="HandheldFriendly" content="True">
			<meta name="MobileOptimized" content="320">
			<meta name="viewport" content="width=device-width, initial-scale=1"/>

			<?php // or, set /favicon.ico for IE10 win ?>
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
							<meta name="theme-color" content="#121212">

			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<?php // wordpress head functions ?>
			<?php wp_head(); ?>
			<?php // end of wordpress head ?>

			<?php // drop Google Analytics Here ?>
			<?php // end analytics ?>
	  </head>
	  <body>
		<div class="row">
		  <div class="banner ads large-12 columns text-center">
				<div class="adsbygoogleContainer">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		        <!-- Diane Homan -->
		        <ins class="adsbygoogle"
		             style="display:block"
		             data-ad-client="ca-pub-9239834729734789"
		             data-ad-slot="9178492354"
		             data-ad-format="auto"></ins>
		        <script>
		        (adsbygoogle = window.adsbygoogle || []).push({});
		        </script>
		    </div>
		  </div>
		</div>
		<header class="large-12 columns">
			<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
			  <button class="menu-icon" type="button" data-toggle></button>
			</div>
		  <div id="main-menu" class="large-12 columns top-bar">
		    <div class="top-bar-left">
					<div class="text-center">
						<?php $center = get_theme_mod('sp_center_nav',true);

						$centerclass = "";
						if($center){
							$centerclass = "nav-center";
						}
						wp_nav_menu( array(
						'theme_location' => 'main-nav',
						'menu' => 'Main Nav',
						'container' => false,
						'menu_class' => 'dropdown menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s '. $centerclass . '" data-dropdown-menu data-click-open="false" data-hover-delay="30">%3$s</ul>',
						'walker' => new Top_Bar_Walker() )); ?>
			    </div>
		    </div>
		    <div id="topabr" class="top-bar-right">
					<?php if ( is_active_sidebar( 'topbar' ) ) : ?>
						<?php dynamic_sidebar( 'topbar' ); ?>
					<?php endif; ?>
		    </div>
		  </div>
		  <div class="row large-12 columns">
		    <div class="small-4 large-2 columns">
			      <img style="position: absolute;" src="<?php echo get_theme_mod( 'sp_logo' ); ?>" />
		    </div>
		    <div class="large-10 columns site-title-container">
		      <h1 class="site-title"><?php echo get_bloginfo( 'name' ); ?></h1>
		    </div>
		  </div>
		  <div class="row align-right">
		    <div class="large-8 columns site-desc-container">
		      <h3 class="site-desc"><?php echo get_bloginfo( 'description' ); ?></h3>
		    </div>
		  </div>
		  <hr />
		</header>
