<?

/**
 * Content part for displaying a message if there is no content avaliable
 * 
 * @package Outlander
 */


?>
<section class="section">
    <header class="header">
        <h1 class="content-title"><? esc_html_e('Nothing found', 'outlander') ?></h1>
    </header>

    <div class="page-content">
        <? if (is_home() && current_user_can('publish_posts')) {
        ?>
            <p><?
                printf(
                    wp_kses(
                        __('Redy to post your first post? <a href="%s">Get started</a>', 'outlander'),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                    ),
                    esc_url(admin_url('post-new.php'))
                );
                ?></p>
        <?
        } elseif (is_search()) {
        ?>
            <p>
                <? esc_html_e('Sorry, but nothing matchet your searched item. Please try something else', 'outlander'); ?>
            </p>
        <?
            get_search_form();
        } else {
        ?>
            <p>
                <? esc_html_e('We cannot find what are you looking for, maybe search can help', 'outlander'); ?>
            </p>
        <?
            get_search_form();
        }
        ?>
    </div>
</section>