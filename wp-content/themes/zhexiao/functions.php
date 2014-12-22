<?php
/**
 * global variable
 */
$GLOBALS['catTop1'] = 3;
$GLOBALS['catTop2'] = 7;
$GLOBALS['catTop3'] = 6;
$GLOBALS['catTop4'] = 5;
$GLOBALS['catTop5'] = 2;
$GLOBALS['catTop6'] = 4;
$GLOBALS['catTop7'] = 1;

// Since WordPress 3.6, If your theme supports HTML5, which happens if it uses:
add_theme_support( 'html5', array( 'search-form' ) );

// declare their support for post thumbnails 
add_theme_support( 'post-thumbnails' ); 


/**
 * Add css and js to the Wordpress theme
 */
function theme_add_assets() {
	// load css
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );

	// load javascript
	wp_enqueue_script( 'jquery-1.11', get_template_directory_uri() . '/js/jquery-1.11.1.min.js');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_add_assets' );



/**
 * get the  first image in post content
 * @return [type] [description]
 */
function catch_that_image($content = '') {
	if(empty($content)){
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$content = $post->post_content;
	}

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	$first_img = $matches[1][0];

	if(empty($first_img)) {
		return '';
	}
	return $first_img;
}



/**
 * Register dynamic sidebars.
 */
function sidebar_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Right Sidebar', 'right-sidebar' ),
		'id'            => 'right-sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	));



	register_sidebar(array(
		'name'          => __( 'Bottom Sidebar', 'bottom-sidebar' ),
		'id'            => 'bottom-sidebar',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<li id="%1$s" class="col-md-4 clearfix widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	));
}
add_action( 'widgets_init', 'sidebar_widgets_init' );


/**
 * generate share html
 * @return [type] [description]
 */
function generate_shares($postId){
	$str = '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_permalink($postId).'" class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="Share on Facebook"></a>
			<a target="_blank" href="http://twitter.com/home?status='.get_permalink($postId).'" class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="Share on Twitter"></a>
			<a target="_blank" href="http://plus.google.com/share?url='.get_permalink($postId).'
				" class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="Share on Google+">
			</a>
			<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($postId).'
				" class="fa fa-linkedin" data-toggle="tooltip" data-placement="top" title="Share on LinkedIn"">
			</a>';

	echo $str;
}


/**
 * display the recent posts
 */
function show_recent_posts($args = array()){
	$str = '';
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		// check the title
		$title = $recent["post_title"];
		if(strlen($title) > 50){
			$title = substr($title, 0, 50).'...';
		}

		// get the featured image
		$image = wp_get_attachment_url( get_post_thumbnail_id($recent['ID']) );
		if(!$image){
			$image = catch_that_image($recent['post_content']);
		}

		$imgStr = '';	
		if(!empty($image)){
			$imgStr = 	'<a class="media-left" href="'.get_permalink($recent['ID']).'">
					    	<img src="'.$image.'" alt="'.$title.'" style="width: 64px; height: 64px;">
					  	</a>';
		}

		$str .= '<div class="media">
				  	'.$imgStr.'
				  	<div class="media-body">
				    	<div class="r-p-title"><a href="'.get_permalink($recent['ID']).'">'.$title.'</a></div>
				    	<time>'.date('h:i A, D F j, Y', strtotime($recent["post_date"])).'</time>
				  	</div>
				</div>';
	}

	return $str;
}

/**
 * display the recent comments
 */
function show_recent_comments($args = array()){
	$str = '';
	$recent_comments = get_comments( $args );
	foreach( $recent_comments as $recent ){
		$title = $recent->comment_content;
		if(strlen($title) > 50){
			$title = substr($title, 0, 50).'...';
		}

		// get the featured image
		$image = get_avatar( $recent->comment_author_email, 64 );
		$imgStr = '';	
		if(!empty($image)){
			$imgStr = 	'<a class="media-left" href="'.get_comment_link($recent->comment_ID).'">
					    	'.$image.'
					  	</a>';
		}

		$str .= '<div class="media">
				  	'.$imgStr.'
				  	<div class="media-body">
				    	<div class="r-p-title"><a href="'.get_comment_link($recent->comment_ID).'">'.$title.'</a></div>
				    	<time>'.date('h:i A, D F j, Y', strtotime($recent->comment_date)).'</time>
				  	</div>
				</div>';
	}

	return $str;
}



/**
 * Displays navigation to next/previous pages when applicable.
 *
 */
function post_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ){ ?>
		<nav id="<?=$html_id;?>" class="navigation clearfix" role="navigation">
			<div class="col-md-6 col-xs-12 nav nav-previous">
				<?php previous_posts_link('<span class="meta-nav"><i class="fa fa-arrow-left"></i>Newer</span>'); ?>
			</div>
			<div class="col-md-6 col-xs-12 nav nav-next">
				<?php next_posts_link('<span class="meta-nav">Older<i class="fa fa-arrow-right"></i></span>'); ?>
			</div>
		</nav>
	<?php };
}


/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
if ( ! function_exists( 'user_post_comment' ) ) {
	function user_post_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<?php comment_author_link(); ?> 
				<?php edit_comment_link( '(Edit)', '<span class="edit-link">', '</span>' ); ?>
			<?php

			break;


			// Proceed with normal comments.
			default :
			global $post;
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment">
					<header class="comment-meta comment-author vcard">
						<div class="media">
							<a class="media-left" href="#">
								<?=get_avatar( $comment, 44 );?>
							</a>
							<div class="media-body">
								<div class="media-heading">
									<div class="media-heading-1"> 
										<?=get_comment_author_link()?>
										<?php 
										printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
											esc_url( get_comment_link( $comment->comment_ID ) ),
											get_comment_time( 'c' ),
											sprintf( 
												'%1$s, %2$s', 
												get_comment_time(),
												get_comment_date()											
											)
										);
										?>
									</div>
									
									<div class="media-heading-2">
										<?php edit_comment_link(  'Edit', '<p class="edit-link">', '</p>' ); ?>
										<?php comment_reply_link( array_merge( $args, array( 
											'reply_text' => 'Reply', 
											'after' => '', 
											'depth' => $depth, 
											'max_depth' => $args['max_depth'] ) 
										)); ?>
									</div>
								</div>
								<div class="media-content">
									<?php if ( '0' == $comment->comment_approved ) : ?>
										<p class="comment-awaiting-moderation">
											Your comment is awaiting moderation
										</p>
									<?php endif; ?>

									<section class="comment-content comment">
										<?php comment_text(); ?>
									</section>
								</div>
							</div>
						</div>
					</header>
				</article>
		<?php
			break;
		endswitch; 
	}
}

/**
 * define top navigation
 */
add_action( 'after_setup_theme', 'top_navigation' );
function top_navigation() {
	register_nav_menu( 'top_navigation', 'Top Navigation' );
}


/**
 * display the most popular posts
 * @return [type] [description]
 */
function get_popular_posts($args){
	$str = '';
	$topQuery = new WP_Query( array(
	  	'orderby' => 'comment_count',
	    'posts_per_page' => $args['posts_per_page']
	));

	while ( $topQuery->have_posts() ) {
		$topQuery->the_post();

		// check the title
		$title = get_the_title();
		if(strlen($title) > 50){
			$title = substr($title, 0, 50).'...';
		}

		// get the featured image
		$image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		if(!$image){
			$image = catch_that_image( get_the_content() );
		}

		$imgStr = '';	
		if(!empty($image)){
			$imgStr = 	'<a class="media-left" href="'.get_permalink(get_the_ID()).'">
					    	<img src="'.$image.'" alt="'.$title.'" style="width: 64px; height: 64px;">
					  	</a>';
		}

		$str .= '<div class="media">
				  	'.$imgStr.'
				  	<div class="media-body">
				    	<div class="r-p-title"><a href="'.get_permalink(get_the_ID()).'">'.$title.'</a></div>
				    	<time>'.date('h:i A, D F j, Y', get_post_time()).'</time>
				  	</div>
				</div>';
	}	

	wp_reset_postdata();

	return $str;
}


/**
 * display related posts
 * @return [type] [description]
 */
function get_related_posts($args){
	$tags = wp_get_post_tags( get_the_ID() );
	$str = '';

	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) {
			$tag_ids[] = $individual_tag->term_id;
		}

		$relatedQuery = new wp_query(array(
			'tag__in' => $tag_ids,
			'post__not_in' => array( get_the_ID() ),
			'posts_per_page' => $args['posts_per_page'],  
			'ignore_sticky_posts' => true
		));
		if( $relatedQuery->have_posts() ) {
			while ($relatedQuery->have_posts()) {
				$relatedQuery->the_post();

				// check the title
				$title = get_the_title();

				// get the featured image
				$image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				if(!$image){
					$image = catch_that_image( get_the_content() );
				}

				$imgStr = '';	
				if(!empty($image)){
					$imgStr = 	'<a class="media-left" href="'.get_permalink(get_the_ID()).'">
							    	<img src="'.$image.'" alt="'.$title.'" style="width: 64px; height: 64px;">
							  	</a>';
				}

				$str .= '<div class="media">
						  	'.$imgStr.'
						  	<div class="media-body">
						    	<div class="r-p-title"><a href="'.get_permalink(get_the_ID()).'">'.$title.'</a></div>
						    	<time>'.date('h:i A, D F j, Y', get_post_time()).'</time>
						  	</div>
						</div>';
			}
		}
	}

	wp_reset_postdata();
	return $str;
}


