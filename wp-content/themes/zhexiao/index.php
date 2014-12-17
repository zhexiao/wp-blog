<!-- get header content -->
<?php get_header(); ?>

<div class="main-content">
	<div class="clearfix"></div>

	<div class="main-top-3">
		<div class="col-md-8 index-main">
			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;

				post_content_nav( 'nav-below' );
				?>
				<div class="clearfix"></div>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div>

		<div class="col-md-4 col-right-sidebar">
			<?php get_sidebar();?>
		</div>
	</div>
</div>

<!-- get footer content -->
<?php get_footer(); ?>