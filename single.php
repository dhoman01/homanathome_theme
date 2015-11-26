<?php get_header(); ?>


<div class="row content">
  <div class="small-12 large-8 columns">
		<h1 class="post-title"><<?php the_title(); ?></h1>
    <div class="large-12 columns">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 <?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
    </div>
  </div>
  <div class="large-4 columns float-right">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
