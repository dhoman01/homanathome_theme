<?php get_header(); ?>

<div class="row content">
  <div class="small-12 large-8 columns">
    <div class="large-12 columns">
      <div class="orbit" role="region" aria-label="Placeholder" data-orbit>
        <ul class="orbit-container" tabindex="0">
          <button class="orbit-previous" aria-label="previous" tabindex="0"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
          <button class="orbit-next" aria-label="next" tabindex="0"><span class="show-for-sr">Next Slide</span>&#9654;</button>
					<?php $slides = get_theme_mod( 'sp_img_number', 5);
            $args = array( 'numberposts' => $slides, 'post_status' => 'publish' );

				    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
						$count = "0";
						foreach( $recent_posts as $recent ){
							if($count < 1){
								echo '<li class="orbit-slide is-active" data-slide="' . $count . '"><a href="' . get_permalink($recent["ID"]) . '"><img class="orbit-image" src="' . catch_that_image($recent["ID"]) . '" alt="'. $recent["post_title"] .'"><figcaption class="orbit-caption">' . $recent["post_title"] . '</figcaption></a></li>';
							} else {
								echo '<li class="orbit-slide" data-slide="' . $count . '"><a href="' . get_permalink($recent["ID"]) . '"><img class="orbit-image" src="' . catch_that_image($recent["ID"]) . '" alt="'. $recent["post_title"] .'"><figcaption class="orbit-caption">' . $recent["post_title"] . '</figcaption></a></li>';
							}
							$count++;
						}
					?>
        </ul>
        <nav class="orbit-bullets">
          <?php
            for ($x = 0; $x < get_theme_mod('sp_img_number', 5); $x++) {
                if($x < 1){
                  echo '<button class="is-active" data-slide="' . $x . '"><span class="show-for-sr">' . $x . ' slide details.</span><span class="show-for-sr">Current Slide</span></button>';
                } else {
                  echo '<button data-slide="' . $x . '"><span class="show-for-sr">Second slide details.</span></button>';
                }
            }
          ?>
       </nav>
      </div>
    </div>
		<?php $args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => 0,
				'orderby'                  => 'id',
				'order'                    => 'desc',
				'hide_empty'               => 1,
				'hierarchical'             => 0,
				'taxonomy'                 => 'category',
				'pad_counts'               => false

			);

			$categories = get_categories( $args );
			foreach ($categories as $category) {
				include( locate_template( 'cat-row-part.php' ) );
			}
		?>
  </div>
  <div class="large-4 columns float-right">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
