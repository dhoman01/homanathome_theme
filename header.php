<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]>-->
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
			<?php echo get_theme_mod('sp_google_analytics'); ?>
		<?php // end analytics ?>
	</head>
	<body>
		<div class="off-canvas-wrapper">
				<div class="off-canvas" id="offCanvas" data-off-canvas>
					<div id="offcanvas-menu">
						<?php	wp_nav_menu( array(
						'theme_location' => 'offcanvas-menu',
						'menu' => 'Off-Canvas Nav',
						'container' => false,
						'menu_class' => 'vertical menu',
						'items_wrap' => '<ul id="%1$s" class="%2$s" data-drilldown>%3$s</ul>',
						'walker' => new F_Drilldown_Walker() )); ?>
					</div>
				</div>

					<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
				<div class="off-canvas-content" data-off-canvas-content>
					<?php if (get_theme_mod('sp_google_ad_header') != '' ) : ?>
					<div class="row">
						<div class="banner ads large-12 columns text-center">
							<div class="adsbygoogleContainer">
								<?php echo get_theme_mod('sp_google_ad_header'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
					<header class="large-12 columns">
						<div class="title-bar hide-for-large">
							<button type="button" class="menu-icon" data-toggle="offCanvas"></button>
							<div id="topabr" class="small-8 columns float-right">
								<?php if ( is_active_sidebar( 'topbar' ) ) : ?>
									<?php dynamic_sidebar( 'topbar' ); ?>
								<?php endif; ?>
							</div>
						</div>
						<div id="main-menu" class="large-12 columns top-bar show-for-large">
							<div class="large-6 columns">
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
												'items_wrap' => '<ul id="%1$s" class="%2$s '. $centerclass . '" data-dropdown-menu data-click-open="false">%3$s</ul>',
												'walker' => new F_Dropdown_Walker() )); ?>
								</div>
							</div>
							<div id="topabr" class="top-bar-right hide-for-small-only">
								<?php if ( is_active_sidebar( 'topbar' ) ) : ?>
									<?php dynamic_sidebar( 'topbar' ); ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="row large-12 columns">
							<div class="small-12 large-2 columns text-center float-left">
								<img class="logo" src="<?php echo get_theme_mod( 'sp_logo' ); ?>" />
							</div>
							<div class="pull-2 large-10 columns site-title-container">
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
