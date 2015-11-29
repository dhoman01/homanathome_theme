<div class="row align-middle cat">
  <div class="large-9 columns cat-title align-justify">
    <h2><?php echo $category->cat_name; ?></h2>
  </div>
  <div class="large-3 columns more-cat align-justify">
    <a href="category/<?php echo $category->name; ?>/">More <?php echo $category->cat_name; ?>-></a>
  </div>
</div>
<div class="large-12 columns">
  <div class="row small-up-1 medium-up-2 large-up-3">
    <?php $args = array(
    	'posts_per_page'   => $num_of_posts,
    	'offset'           => 0,
    	'category'         => $category->cat_ID,
    	'category_name'    => '',
    	'orderby'          => 'date',
    	'order'            => 'DESC',
    	'include'          => '',
    	'exclude'          => '',
    	'meta_key'         => '',
    	'meta_value'       => '',
    	'post_type'        => 'post',
    	'post_mime_type'   => '',
    	'post_parent'      => '',
    	'author'	         => '',
    	'post_status'      => 'publish',
    	'suppress_filters' => true
    );
    $posts_array = get_posts( $args );
    foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
      <div class="column">
        <?php include( locate_template( 'post-thumb.php' ) ) ?>
      </div>
    <?php endforeach;
    wp_reset_postdata();?>
  </div>
</div>
