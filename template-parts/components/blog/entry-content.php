<?

/**
 * Template for entry content
 * Blog article content(body) template
 * 
 * Use inside WP the loop
 * 
 * @package Outlander
 */
?>

<div <? if (!is_single()) {
            post_class('entry-content');
        } else {
            post_class('entry-content entry-content-sigle');
        }  ?>>
    <?
    if (is_single()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'outlander'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            )
        );
        wp_link_pages([
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'outlander'),
            'after' => '</div>'
        ]);
    } else {
        outlander_the_excerpt(50);
    ?>
</div><? echo outlander_excerpt_more();
    } ?>