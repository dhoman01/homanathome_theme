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
	<form action="" method="post" accept-charset="utf-8" id="subscribe-blog">
	<p>
		Subscribe below and never miss a post!
	</p>
      <input type="text" name="email" style="width: 95%; padding: 1px 2px" value="Email Address" id="subscribe-field" onclick="if ( this.value == 'Email Address' ) { this.value = ''; }" onblur="if ( this.value == '' ) { this.value = 'Email Address'; }">
        <input type="hidden" name="action" value="subscribe">
        <input type="hidden" name="source" value="">
        <input type="hidden" name="sub-type" value="">
        <input type="hidden" name="redirect_fragment" value="">
        <input type="hidden" id="_wpnonce" name="_wpnonce" value="e50fc688c8">
				<input type="submit" value=">>" name="jetpack_subscriptions_widget">
    </form>
</div>
<div class="follow-us">
	<h4>Follow Us On</h4>
	<div class="row small-up-4">
		<div class="column">
			<a href="<?php echo get_theme_mod('sp_facebook_follow_url'); ?>" class="webicon svg facebook large">Like us on Facebook</a>
		</div>
		<div class="column">
			<a href="<?php echo get_theme_mod('sp_twitter_follow_url'); ?>" class="webicon svg twitter large">Follow us on Twitter</a>
		</div>
		<div class="column">
			<a href="<?php echo get_theme_mod('sp_pinterest_follow_url'); ?>" class="webicon svg pinterest large">Pin us on Pinterest</a>
		</div>
		<div class="column">
			<a href="<?php echo get_theme_mod('sp_instagram_follow_url'); ?>" class="webicon svg instagram large">Follow us on Instagram</a>
		</div>
	</div>
</div>
<?php if (get_theme_mod('sp_google_ad_side') != '' ) : ?>
<div class="row medium-2">
	<div class="columns horz ads">
		<div class="adsbygoogleContainer">
			<?php echo get_theme_mod('sp_google_ad_side');?>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	<?php endif; ?>
</div>
