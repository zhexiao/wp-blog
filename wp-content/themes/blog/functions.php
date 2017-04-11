<?php
// Since WordPress 3.6, If your theme supports HTML5, which happens if it uses:
add_theme_support( 'html5', array( 'search-form' ) );

// declare their support for post thumbnails 
add_theme_support( 'post-thumbnails' ); 

// replace core jquery to user jquery
wp_deregister_script('jquery');
wp_register_script('jquery', (get_template_directory_uri() . '/js/jquery-2.1.4.min.js'));
wp_enqueue_script('jquery');

/**
 * Add css and js to the Wordpress theme
 */
function theme_assets() {
	// load css
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/fontawesome.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css', false, time() );

	// load javascript
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script( 'waterfall-js', get_template_directory_uri() . '/js/waterfall.js', array(), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_assets' );



/**
 * generate share html
 * @return [type] [description]
 */
function generate_shares($postId){
    $str = '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_permalink($postId).'" class="fa fa-facebook" title="Share on Facebook"></a>
            <a target="_blank" href="http://twitter.com/home?status='.get_permalink($postId).'" class="fa fa-twitter" title="Share on Twitter"></a>
            <a target="_blank" href="http://plus.google.com/share?url='.get_permalink($postId).'" class="fa fa-google-plus" title="Share on Google+"></a>
            <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($postId).'" class="fa fa-linkedin" title="Share on LinkedIn""></a>';

    echo $str;
}

// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Register a new widget
function footer_meta_widgets() {
    register_sidebar(array(
        'name'          => __( 'footer meta', 'footer_meta' ),
        'id'            => 'footer_meta',
        'description'   => '',
        'class'         => 'footer-meta',
    ));
}
add_action( 'widgets_init', 'footer_meta_widgets' );