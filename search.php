<?

/**
 * Search page template
 * 
 * @package Outlander
 */
get_header();
?>
<div id="primary">
    <main id="main" class="site-main" role="main">
        <div class="container [ padding-inline-30 padding-block-30 ]">
            <header class="padding-inline-30">
                <h1 class="page-title"> <?php echo $wp_query->found_posts; ?>
                    <?php _e('Search Results Found For', 'outlander'); ?>: "<?php the_search_query(); ?>"
                </h1>
            </header>
            <div class="[ auto-grid-table ] [ padding-inline-30 padding-block-30 ]">
                <?php if (have_posts()) { ?>
                    <?php while (have_posts()) {
                        the_post(); ?>
                        <article id="post-<? the_ID(); ?>" <? post_class('blog-content-item'); ?>>
                            <?
                            get_template_part('template-parts/components/blog/entry-header');
                            get_template_part('template-parts/components/blog/entry-meta');
                            get_template_part('template-parts/components/blog/entry-content'); ?>
                        </article>
                    <?php } ?>

            </div>

            <?php outlander_pagination(); ?>

        <?php } else {
                    get_search_form();
                } ?>

        </div>
    </main>
</div>
<?php get_footer(); ?>