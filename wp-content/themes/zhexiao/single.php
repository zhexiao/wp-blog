<?php
/**
 * The Template for displaying all single post
 */
get_header(); ?>

<div class="main-top-3">
	<div class="col-md-8 single-post">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>

			<nav class="nav-single clearfix">
				<div class="col-md-6 nav-previous">
					<div class="nav-p-n-label"><i class="fa fa-angle-left"></i>PREVIOUS ARTICLE</div>
					<?php previous_post_link( '%link', '%title' ); ?>
				</div>
				<div class="col-md-6 nav-next">
					<div class="nav-p-n-label">NEXT ARTICLE<i class="fa fa-angle-right"></i></div>
					<?php next_post_link( '%link', '%title'); ?>
				</div>
			</nav>

			<div class="related-posts">
				<h3>Related Posts</h3>
				<?=get_related_posts(array(
					'posts_per_page' => 5
				))?>	
			</div>

			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>
	
	<div class="col-md-4 col-right-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>