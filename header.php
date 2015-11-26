<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]>-->
	<html class="no-js" lang="en">
	  <head>
	    <meta charset="utf-8" />
	    <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
			<title><?php wp_title(''); ?></title>

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
		  <div class="horz ads large-12 columns text-center">
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
		  <div class="row align-middle top-bar">
		    <div class="large-10 columns">
		      <nav class="main-nav align-center">
						<?php wp_nav_menu( array('menu' => 'Main Nav' )); ?>
		      </nav>
		    </div>

		    <div class="large-2 columns align-center">
		      <input type="text" placeholder="Search" />
		    </div>
		  </div>
		  <div class="row">
		    <div class="large-2 columns">
		      <img style="position: absolute;" src="http://res.cloudinary.com/homanathome-com/image/upload/c_crop,g_east,h_150,w_200/v1441419538/Header_-_Homan_at_Home_zzfqcv.png" />
		    </div>
		    <div class="large-10 columns">
		      <h1 class="site-title">Homan At Home</h1>
		    </div>
		  </div>
		  <div class="row align-right">
		    <div class="large-8 columns push-3">
		      <h3 class="site-desc">Simple and budget friendly ways to make your house a home</h3>
		    </div>
		  </div>
		  <hr />
		</header>
