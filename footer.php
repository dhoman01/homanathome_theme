<footer>
  <div class="row small-up-1 medium-up-2 large-up-3">
    <div id="footer" class="small-2 columns">
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
				<?php dynamic_sidebar( 'footer' ); ?>
			<?php endif; ?>
    </div>
    <div class="column pinterest-finds text-center">
      <h5>Pinterest Finds</h5>
      <div class="row align-center">
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
          <img src="//placehold.it/125x125" >
      </div>
    </div>
    <div class="column">
      <div class="vert ads">
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
  </div>
</footer>
<div class="bottom-bar">
  <div class="row align-middle">
    <div class="small-up-1 medium-up-4 columns footer-nav">
      <?php wp_nav_menu( array('menu' => 'Footer Nav' )); ?>
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


		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script>
	</body>
	</html> <!-- end of site. what a ride! -->
