<?

/**
 * Template for post entry header
 * 
 * 
 * @package Outlander
 */

$the_post_id = get_the_id();
$hide_title = get_post_meta($the_post_id, '_hide_page_title', true);
$heading_class = !empty($hide_title) && 'yes' === $hide_title ? 'hide' : '';
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);

?>

<header class="entry-header">
    <?
    if ($has_post_thumbnail) {
    ?>
        <div class="entry-image">
            <? if (is_single()) { ?>
                <span class="full-size">
                <? } else {
                ?>
                    <a class="full-size" href="<? echo esc_url(get_permalink()); ?>">
                    <?
                } ?>
                    <?
                    the_post_custom_thumbnail(
                        $the_post_id,
                        'featured-thumbnail',
                        [
                            // 'sizes' => '(max-width: 500px) 500px, 300px',
                            'class' => 'attachment-featured-large size-featured-image'
                        ]
                    )
                    ?>
                    <? if (is_single()) { ?>
                </span>
            <? } else {
            ?>
                </a>
            <?
                    } ?>
        </div>
    <?
        // Title

        if (is_single() || is_page()) {
            printf(
                '<h1 class="nomargin-inline %1$s">%2$s</h1>',
                esc_attr($heading_class),
                wp_kses_post(get_the_title())
            );
        } else {
            printf(
                '<h2 class="fs-500 nomargin-inline"><a href="%1$s">%2$s</a></h2>',
                esc_url(get_permalink()),
                wp_kses_post(get_the_title())
            );
        }
    }
    ?>
</header>