<!-- main content -->
<?php get_header(); ?>

<div class="container-fluid main-page">
    <div class="post-wrap">
        <?php
            global $query_string;
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            query_posts ('posts_per_page=30&paged='.$paged);
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', get_post_format() );
            endwhile;
        ?>
    </div>
    
    <div class="page-wrap">
        <?php
            the_posts_pagination([
                'screen_reader_text' => ' ', 
                'mid_size' => 2,
            ]);
        ?>
    </div>
</div>

<!-- get footer content -->
<?php get_footer(); ?>