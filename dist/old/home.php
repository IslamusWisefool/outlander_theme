<?

/**
 * Blog page template
 * 
 * 
 * @package Outlander
 */
get_header()
?>

<div id="primary">
    <main id="main" class="site-main" role="main">
        <? if (have_posts()) :
        ?>
            <div class="container">
                <?
                if (is_home() && !is_front_page()) {
                ?>
                    <header class="blog_header">
                        <h1 class="blog_heading">
                            <? single_post_title(); ?>
                        </h1>
                    </header>
                <?
                }
                ?>
                <div class="blog-content-wrapper">
                    <?
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content');
                    endwhile;
                    ?>
                </div>
            </div>
        <?
        else : get_template_part('template-parts/content-none');

        endif;

        outlander_pagination();
        ?>
    </main>
</div>

<?
get_footer();
