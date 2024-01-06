<?

/**
 * Load more demo page
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
            <h1 class="blog_header padding-inline-30">Loadmore/Infinite scroll demo</h1>
            <? $loadmore_posts->post_script_load_more(); ?>
        </div>
    </main>
</div>

<? get_footer() ?>