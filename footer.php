<footer>
  <div class="row small-up-1 medium-up-2 large-up-3">
    <div  class="small-4 columns">
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
    <div class="small-3 columns">
      <div class="horz ads">
				<div class="adsbygoogleContainer">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		        <!-- Diane Homan -->
		        <ins class="adsbygoogle"
		             style="display:block"
		             data-ad-client="ca-pub-9239834729734789"
		             data-ad-slot="9178492354"
		             data-ad-format="rectangle"></ins>
		        <script>
		        (adsbygoogle = window.adsbygoogle || []).push({});
		        </script>
		    </div>
      </div>
    </div>
  </div>
</footer>
<div class="bottom-bar">
  <div class="row align-middle">
    <div class="small-up-1 medium-up-4 columns footer-nav">
      <?php wp_nav_menu( array('theme_location' => 'footer-nav', 'menu' => 'Footer Nav', 'container' => false )); ?>
    </div>
    <div class="small-up-1 medium-up-4 columns">
      <ul class="center">
        <li>
          <a href="#" class="webicon svg facebook small">Follow us on Instagram</a>
        </li>
        <li>
          <a href="#" class="webicon svg twitter small">Follow us on Instagram</a>
        </li>
        <li>
          <a href="#" class="webicon svg pinterest small">Follow us on Instagram</a>
        </li>
        <li>
          <a href="#" class="webicon svg instagram small">Follow us on Instagram</a>
        </li>
      </ul>
    </div>
    <div class="small-up-1 medium-up-4 columns text-right">
      <p>
        Copyright Homan At Homan
      </p>
    </div>
  </div>
</div>


		<?php // all js scripts are loaded in library/sp.php ?>
		<?php wp_footer(); ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script>
    <script>
      jQuery(document).ready(function(){
        jQuery("#s").attr("placeholder", "search");
      })
    </script>
	</body>
	</html> <!-- end of site. what a ride! -->
