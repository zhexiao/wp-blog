<?php
/**
 * display individual blog
 */
get_header(); ?>

<div class="content-page-wrap">
    <div class="container">
        <h5 class="page-category">
            <?=get_the_category_list(' ');?>
        </h5>

        <h1><?php the_title(); ?></h1>

        <div class="media page-userinfo">
            <div class="media-left">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <?php the_author_posts_link(); ?>
                </h4>
                <div>
                    <time class="page-userinfo-time">
                        <?php the_time('g:i A, F j, Y'); ?>
                    </time>
                    <span class="comment-count">
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        <a href="#respond"><?php comments_number(0,1,'%');?></a>
                    </span>
                    <span class="view-count">
                        <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
                        <span><?php echo getPostViews(get_the_ID()); ?></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="page-share">
            <?php generate_shares( get_the_ID() );?>
            <a target="_blank" href="#" class="fa fa-print" title="Print" onclick="window.print();"></a>
        </div>

        <div class="page-content">
            <?php the_content(); ?>
        </div>

        <div class="page-share">
            <?php generate_shares( get_the_ID() );?>
            <a target="_blank" href="#" class="fa fa-print" title="Print" onclick="window.print();"></a>
        </div>

        <div class="page-tags">
            <i class="fa fa-tags"></i>
            <?=get_the_tag_list( '', ' ');?>     
        </div>

        <div class="page-pre-next clearfix">
            <div class="nav-previous pull-left">
                <div class="label">PREVIOUS ARTICLE</div>
                <?php previous_post_link( '%link', '%title' ); ?>
            </div>

            <div class="nav-next pull-right">
                <div class="label">NEXT ARTICLE</div>
                <?php next_post_link( '%link', '%title'); ?>
            </div>
        </div>

        <div class="top-line-wrap">
            <span class="bottom-line"></span>
        </div>

        <div class="page-comments">
            <?php comments_template(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>