<?

/**
 * Archive page template
 * 
 * @package Outlander 
 */

get_header();
?>
<div id="primary">
    <main id="main" class="site-main my-5" role="main">
        <div class="container [ padding-inline-30 padding-block-30 ]">
            <header class="blog_header padding-inline-30">
                <?php
                if (!empty(single_term_title('', false))) {
                    printf(
                        '<h1 class="blog_heading">%s</h1>',
                        single_term_title('', false)
                    );
                }

                if (!empty(get_the_archive_description())) {
                    the_archive_description('<div class="archive-description">', '</div>');
                }
                ?>
            </header><!-- .page-header -->
            <div class="blog-content-wrapper [ auto-grid-table ] [ padding-inline-30 padding-block-30 ]">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/components/post-card');
                    endwhile;
                else :
                    get_template_part('template-parts/content-none');
                endif;
                ?>
                <div>
                    <?php outlander_pagination(); ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php

get_footer();
