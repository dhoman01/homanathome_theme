<div class="welcome">
	<h4><?php echo get_theme_mod( 'sp_welcome_title', 'Welcome!'); ?></h4>
	<img class="float-right" src="<?php echo get_theme_mod( 'sp_welcome_img', '' ); ?>" alt="">
	<p>
		<?php echo get_theme_mod( 'sp_welcome_textbox', 'Add your welcome message here.' ); ?>
	</p>
	<?php if(get_theme_mod('sp_welcome_url','') !== '') : ?>
		<a href="<?php echo get_theme_mod('sp_welcome_url', '/about'); ?>">Learn More -></a>
	<?php endif; ?>
</div>
<div class="subscribe-box">
	<h4>Like What You See?</h4>
	<p>
		Subscribe below and never miss a post!
	</p>
	<form>
		<input type="text" placeholder="name">
		<input type="email" placeholder="email">
		<input type="submit" value=">>">
	</form>
</div>
<div class="follow-us">
	<h4>Follow Us On</h4>
	<div class="row small-up-1 medium-up-2 large-up-4">
		<div class="column">
			<a href="#" class="webicon svg facebook large">Like us on Facebook</a>
		</div>
		<div class="column">
			<a href="#" class="webicon svg twitter large">Follow us on Twitter</a>
		</div>
		<div class="column">
			<a href="#" class="webicon svg pinterest large">Pin us on Pinterest</a>
		</div>
		<div class="column">
			<a href="#" class="webicon svg instagram large">Follow us on Instagram</a>
		</div>
	</div>
</div>
<div class="row small-up-1 medium-up-2">
	<div class="columns horz ads">
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
<div class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php endif; ?>
</div>
