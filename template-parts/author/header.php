<?

/**
 * Header for Author page
 * 
 * @package Outlander
 */
$author_email = get_the_author_meta('user_email');
$has_avatar   = outlander_has_gravatar($author_email);
$avatar       = get_avatar($author_email, 240, '', '', ['class'   => 'rounded-circle', 'default' => '404']);


?>
<header class="author-header">
    <!--author-col-one-->
    <div class="author">
        <div id="author-avatar" class="author-avatar">
            <?php
            if (empty($has_avatar)) {
                echo wp_kses_post($avatar);
            } else {
                printf(
                    '<span id="author-firstname" class="d">%1$s</span><span id="author-lastname" class="">%2$s</span><div id="author-profile-img" class=""><span class=""></span></div>',
                    esc_html(get_the_author_meta('first_name')),
                    esc_html(get_the_author_meta('last_name'))
                );
            }
            ?>
        </div><!-- #author-avatar -->
    </div>
    <!--author-col-two-->
    <div class="author-name">
        <?php
        if (!empty(get_the_author())) {
            printf(
                '<h1 class="nomargin-block nomargin-inline">%s</h1>',
                get_the_author()
            );
        }
        // If a user has filled out their description, show a bio on their entries.
        if (get_the_author_meta('description')) : ?>
            <div id="author-info">
                <div id="author-description">
                    <p class="text-left md:text-left"><?php the_author_meta('description'); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</header>