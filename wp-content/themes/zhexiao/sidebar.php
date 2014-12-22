<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
<div class="right-sidebar" >
	<!-- search -->
	<form role="search" method="get" id="searchform" class="searchform" action="<?=get_site_url();?>">
		<input type="text" value="<?=$_GET['s']?>" name="s" id="s" placeholder="Search...">			
	</form>

	<!-- popular post -->
	<div class="recent-post">
		<h4 class="r-s-rp">
			<span class="title">Popular Posts</span>
		</h4>
		<?=get_popular_posts(array(
			'posts_per_page' => 8
		))?>
	</div>

	<!-- recent post -->
	<div class="recent-post">
		<h4 class="r-s-rp">
			<span class="title">Recent Posts</span>
		</h4>
		<?=show_recent_posts(array(
			'posts_per_page' => 8
		))?>
	</div>

	<!-- recent comments -->
	<div class="recent-post">
		<h4 class="r-s-rp">
			<span class="title">Recent Comments</span>
		</h4>
		<?=show_recent_comments(array(
			'status' => 'approve', 
			'number'=>8
		))?>
	</div>

	<!-- dynatic sidebar -->
	<ul class="widget-area">
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</ul>
</div>
<?php endif; ?>