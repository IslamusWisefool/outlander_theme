<?

/**
 * Template for entry footer
 * 
 * To be used inside WP Loop
 * 
 * 
 * @package Outlander
 */
$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id, ['category', 'post_tag'], []);

if (empty($article_terms) || !is_array($article_terms)) {
    return;
}
?>

<div <? if (!is_single()) {
            post_class('entry-footer');
        } else {
            post_class('entry-footer padding-block-15');
        }  ?>>
    <?
    foreach ($article_terms as $key => $article_term) {
    ?>
        <button class="btn-taxonomy">
            <a class="entry-footer-link" href="<? echo esc_url(get_term_link($article_term)) ?>">
                <? echo esc_html($article_term->name) ?>
            </a>
        </button>
    <?
    }
    ?>
</div>