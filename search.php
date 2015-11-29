<?php get_header(); ?>

<div class="row content">
	<div class="small-12 large-8 columns">
		<div class="large-12 columns">
		<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'sptheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
		<div id="archive-list" class="row small-up-1 medium-up-2 large-up-3">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="columns">
					<?php include( locate_template( 'post-thumb.php' ) ) ?>
				</div>
		<?php endwhile; ?>
		<?php else : ?>

			<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'sptheme' ); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'sptheme' ); ?></p>
				</section>
				<footer class="article-footer">
					<p><?php _e( 'This is the error message in the archive.php template.', 'sptheme' ); ?></p>
				</footer>
			</article>

		<?php endif; ?>
			</div>
		</div>
	</div>
	<div id="right-sidebar" class="large-4 columns float-right">
	<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
