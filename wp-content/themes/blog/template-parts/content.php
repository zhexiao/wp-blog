<?php
/**
 * The template used for displaying page content
 */
?>
<div class="waterfall-item">
    <article class="individual-post">
        <div class="top-wrap">
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <div class="post-meta">
                <?php the_time('g:i A, F j, Y'); ?> by <?php the_author_posts_link(); ?>
            </div>
            <div class="category">
                <i class="fa fa-folder-open-o category-icon" aria-hidden="true"></i>
                <?=get_the_category_list(' ');?>
            </div>
            <div class="top-line-wrap">
                <span class="top-line"></span>
            </div>
        </div>

        <section class="post-content">
            <?php
                $words = explode(' ',strip_tags(get_the_content(), '<p><br><div><img>'));
                $content = implode(' ',array_splice($words,0,60));
                echo $content.' ...';
            ?>
        </section>

        <div class="top-line-wrap clearfix">
            <span class="bottom-line"></span>
        </div>

        <?php 
            $posttags = get_the_tags();
            if($posttags):
        ?>
                <div class="tag-meta">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <?=get_the_tag_list( '', '');?>     
                </div>
        <?php
            endif;
        ?>
      
        <div class="edit-page-wrap clearfix">
            <span class="share-wrap">
                <?php generate_shares( get_the_ID() );?>
            </span>
            <?php edit_post_link('Edit', '', '', 0, 'post-edit-link btn btn-xs btn-default pull-right'); ?>
        </div>
    </article>
</div>