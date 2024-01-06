<?

/**
 * Blog page template
 * 
 * 
 * @package Outlander
 */

use OUTLANDER_THEME\Inc\Loadmore_posts;

get_header();

$loadmore_posts = Loadmore_posts::get_instance();
?>

<div id="primary">
    <main id="main" class="site-main" role="main">
        <div class="container [ padding-inline-30 padding-block-30 ]">
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
            $loadmore_posts->post_script_load_more(); ?>
        </div>
    </main>
</div>

<?
get_footer();
