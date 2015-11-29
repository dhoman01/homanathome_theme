<?php
/*
The comments page for sp
*/

// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

?>

<?php // You can start editing here. ?>

  <?php if ( have_comments() ) : ?>

    <!-- <h3 id="comments-title" class="primary"><?php comments_number( __( '<span>No</span> Comments', 'sptheme' ), __( '<span>One</span> Comment', 'sptheme' ), __( '<span>%</span> Comments', 'sptheme' ) );?></h3> -->

    <section class="commentlist">
      <?php
        wp_list_comments( array(
          'style'             => 'div',
          'short_ping'        => true,
          'avatar_size'       => 40,
          'callback'          => '',
          'type'              => 'all',
          'reply_text'        => '<div class="hollow button">Reply</div>',
          'page'              => '',
          'per_page'          => '',
          'reverse_top_level' => null,
          'reverse_children'  => '',
          'walker'            => new SP_Comment_Walker(),
        ) );
      ?>
    </section>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav class="navigation comment-navigation" role="navigation">
      	<div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'sptheme' ) ); ?></div>
      	<div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'sptheme' ) ); ?></div>
    	</nav>
    <?php endif; ?>

    <?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php _e( 'Comments are closed.' , 'sptheme' ); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form( array('class_submit' => 'hollow button')); ?>
