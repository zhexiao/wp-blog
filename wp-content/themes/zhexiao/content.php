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
				<?php if ( is_single() ) : ?>
					<span class="title">
						<?php the_title(); ?>
					</span>
				<?php else : ?>
					<a class="title" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				<?php endif; ?>
				
				<div class="meta-1 clearfix">
					<span class="col-md-5 col-xs-12 meta-1-left">
						<?=get_the_time().', '.get_the_date()?> 
						By
						<a href="<?=esc_url(get_author_posts_url(get_the_author_meta('ID')))?>" >
							<?=get_the_author();?>
						</a>
					</span>
					<span class="col-md-7 col-xs-12 category">
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

	<footer class="clearfix">
		<div class="col-md-9 col-xs-12 tag-wrap">
			<b class="tagLabel"><i class="fa fa-tags"></i>TAGS:</b>
			<?=get_the_tag_list( '', '');?>		
		</div>
		<div class="col-md-3 col-xs-12 entry-share">
			<?=generate_shares( get_the_ID() );?>
		</div>
	</footer>
</article>
