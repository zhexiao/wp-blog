<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<div class="post-title clearfix">
			<div class="title-wrap">
				<a class="title" href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
				<div class="meta-1">
					<span class="meta-1-left">
						<?=get_the_time().', '.get_the_date()?> 
						By
						<a href="<?=esc_url(get_author_posts_url(get_the_author_meta('ID')))?>" >
							<?=get_the_author();?>
						</a>
					</span>
					<span class="category">
						<?=get_the_category_list(' ');?>
					</span>
				</div>
			</div>
		</div>
	</header>

	<div class="clearfix"></div>

	<section>
		<?php if ( is_search() || is_category() ) : ?>
			<?php the_excerpt(); ?>
		<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
	</section>

	<footer>
		<span class="tag-wrap">
			<b class="tagLabel"><i class="fa fa-tags"></i>TAGS:</b>
			<?=get_the_tag_list( '', '');?>		
		</span>
		<span class="entry-share">
			<?=generate_shares( get_the_ID() );?>
		</span>
	</footer>
</article>
