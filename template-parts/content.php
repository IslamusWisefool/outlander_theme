<?

/**
 * Content Template
 * 
 * @package Outlander
 */

$container_classes = !empty($args['container_classes']) ? $args['container_classes'] : 'blog-content-item';
?>
<article id="post-<? the_ID(); ?>" <? if (!is_single()) {
                                        post_class($container_classes);
                                    } else {
                                        post_class('blog-content-single');
                                    }  ?>>
    <? if (is_single()) {
    ?>
        <div class="post-content">
        <?
    } ?>
        <?
        get_template_part('template-parts/components/blog/entry-header');
        get_template_part('template-parts/components/blog/entry-meta');
        get_template_part('template-parts/components/blog/entry-content');
        get_template_part('template-parts/components/blog/entry-footer');

        if (is_single()) {
        ?>
        </div>
    <?
        } ?>
</article>