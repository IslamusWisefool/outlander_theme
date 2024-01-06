<?php

/**
 * Post Card
 *
 * 
 * Note: Should be called with The Loop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-content-item'); ?>>
    <?
    get_template_part('template-parts/components/blog/entry-header');
    get_template_part('template-parts/components/blog/entry-meta');
    get_template_part('template-parts/components/blog/entry-content');
    get_template_part('template-parts/components/blog/entry-footer');
    ?>
</article>