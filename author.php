<?

/**
 * Author page template
 * 
 * @package Outlander 
 */

get_header();
$author = get_queried_object();

?>
<div id="primary">
    <main id="main" class="site-main my-5" role="main">
        <div class="container [ padding-inline-30 padding-block-30 ]">
            <?php get_template_part('template-parts/author/header'); ?>
            <div class="site-content">
                <?php

                if (!empty(get_the_author())) {
                    printf(
                        '<h3 class="fs-600 nomargin-inline margin-block-30">%1$s %2$s</h3>',
                        __('Articles written by ', 'outlander'),
                        get_the_author()
                    );
                }
                ?>
                <div class="blog-content-wrapper [ auto-grid-table ] [ padding-block-30 ]">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', '', ['container_classes' => 'blog-content-item']);
                        endwhile;
                    else :
                        get_template_part('template-parts/content-none');
                    endif;
                    ?>
                </div>
                <div>
                    <?php outlander_pagination(); ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php

get_footer();
