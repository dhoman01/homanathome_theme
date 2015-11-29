<footer>
  <div class="row small-up-1 medium-up-2 large-up-3">
    <div  class="small-12 medium-4 columns">
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
				<?php dynamic_sidebar( 'footer' ); ?>
			<?php endif; ?>
    </div>
    <div class="column pinterest-finds text-center">
      <h5><?php echo get_theme_mod('sp_pinterest_title'); ?></h5>
      <a data-pin-do="embedUser" data-pin-board-width="400" data-pin-scale-height="240" data-pin-scale-width="80" href="<?php echo get_theme_mod('sp_pinterest_url'); ?>"></a>
      <!-- Please call pinit.js only once per page -->
      <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
    </div>
    <?php if (get_theme_mod('sp_google_ad_header') != '' ) : ?>
    <div class="small-12 medium-4 columns">
      <div class="horz ads">
				<div class="adsbygoogleContainer">
          <?php echo get_theme_mod('sp_google_ad_footer'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</footer>
<div class="bottom-bar">
  <div class="row align-middle">
    <div class="small-12 medium-4 columns footer-nav">
      <?php wp_nav_menu( array('theme_location' => 'footer-nav', 'menu' => 'Footer Nav', 'container' => false )); ?>
    </div>
    <div class="small-12 medium-4 columns">
      <ul class="center">
        <li>
          <a href="<?php echo get_theme_mod('sp_facebook_follow_url'); ?>" class="webicon svg facebook small">Follow us on Facebook</a>
        </li>
        <li>
          <a href="<?php echo get_theme_mod('sp_twitter_follow_url'); ?>" class="webicon svg twitter small">Follow us on Twitter</a>
        </li>
        <li>
          <a href="<?php echo get_theme_mod('sp_pinterest_follow_url'); ?>" class="webicon svg pinterest small">Follow us on Pinterest</a>
        </li>
        <li>
          <a href="<?php echo get_theme_mod('sp_instagram_follow_url'); ?>" class="webicon svg instagram small">Follow us on Instagram</a>
        </li>
      </ul>
    </div>
    <div class="small-12 medium-4 columns text-right">
      <p>
        <?php echo get_theme_mod('sp_copyright_text'); ?>
      </p>
    </div>
  </div>
</div>


		<?php // all js scripts are loaded in library/sp.php ?>
		<?php wp_footer(); ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script>
    <script>
      jQuery(document).ready(function(){
        jQuery("input[type='search']").attr("placeholder", "search");
        jQuery('#slider').spotSwipe().on('swipeleft', function(){
          jQuery(this).trigger('orbit.changeslide', false);
        });
        jQuery('#slider').spotSwipe().on('swiperight', function(){
          jQuery(this).trigger('orbit.changeslide', true);
        });
      })
    </script>
  </div>
</div>
</div>
	</body>
	</html> <!-- end of site. what a ride! -->
