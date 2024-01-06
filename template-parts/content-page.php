<?

/**
 * Template for displaying content page
 * 
 * @package Outlander
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if (!is_home()) {
    ?>
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title [ padding-block-30 padding-inline-30 ]">', '</h1>'); ?>
        </header><!-- .entry-header -->
    <?php
    }
    ?>

    <div class="entry-content">
        <?php
        the_content();

        if (!is_home()) {
            wp_link_pages(
                [
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'outlander'),
                    'after'  => '</div>',
                ]
            );
        }
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link(esc_html__('Edit', 'outlander'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->