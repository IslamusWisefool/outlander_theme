<?

/**
 * Template for slider with current amount of posts
 */

$args = [
    'posts_per_page' => 5,
    'post_type' => 'post',
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false
];
$post_query = new \WP_Query($args);
?>

<div class="slider">

    <?
    if ($post_query->have_posts()) :
        while ($post_query->have_posts()) :
            $post_query->the_post(); ?>
            <div class="slider__item">
                <?
                if (has_post_thumbnail()) {
                    the_post_custom_thumbnail(
                        get_the_ID(),
                        'featured-image',
                        [
                            'sizes' => '(max-width: 350px) 350px, 233px',
                            'class' => 'slider__item-image'
                        ]
                    );
                } else {
                ?>
                    <img src="<? OUTLANDER_BUILD_IMG_PATH . '/slider-item1.webp' ?>" alt="stock image">
                <?
                }
                ?>
                <div class="slider__item-body">
                    <?
                    the_title('<h3 class="slider__item-title">', '</h3>');
                    outlander_the_excerpt(100);
                    ?>
                    <a href="<? echo esc_url(get_the_permalink()) ?>"><? esc_html_e('View more', 'outlander') ?></a>
                </div>
            </div>
    <?
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>