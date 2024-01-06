<?

/**
 * Template for single post
 * 
 * 
 * @package Outlander
 */
get_header()
?>

<div id="primary">
    <main id="main" class="site-main single-blog-post padding-block-30 padding-inline-15" role="main">
        <? if (have_posts()) :
        ?>
            <div class="container">
                <?
                if (is_home() && !is_front_page()) {
                ?>
                    <header class="blog_header padding-inline-30">
                        <h1 class="blog_heading">
                            <? single_post_title(); ?>
                        </h1>
                    </header>
                <?
                }
                if (!is_single()) {
                ?>
                    <div class="blog-content-wrapper [ flexible-grid flex-col-2 ] [ padding-inline-30 padding-block-30 ]">
                    <?
                }
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content');
                endwhile;
                if (!is_single()) {
                    ?>
                    </div> <? }
                            ?>

            </div>
        <?

        else : get_template_part('template-parts/content-none');

        endif;
        // For Single Post loadmore button, uncomment this code and comment next and prev link code below.
        echo do_shortcode('[single_post_listings]');


        get_sidebar(); // Sidebar

        comments_template();
        ?>
        <?php
        // Next and previous link for page navigation.
        ?>
        <!-- <div class="prev-link"><?php previous_post_link(); ?></div>
        <div class="next-link"><?php next_post_link(); ?></div> -->
    </main>
</div>

<?
get_footer();
