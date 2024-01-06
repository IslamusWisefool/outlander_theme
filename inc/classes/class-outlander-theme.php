<?

/**
 * Bootstraps the Theme.
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class OUTLANDER_THEME
{
    use Singleton;

    protected function __construct()
    {
        //load class

        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Blocks::get_instance();
        Block_patterns::get_instance();
        Loadmore_posts::get_instance();
        Loadmore_Single::get_instance();
        Register_Post_Types::get_instance();
        Register_Taxonomies::get_instance();
        Archive_Settings::get_instance();
        Search_Api::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // actions and filters

        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme()
    {
        // Отключение стандартных паттернов 
        remove_theme_support('core-block-patterns');
        // Подключение поддержки миниатюр постов
        add_theme_support('post-thumbnails', array('post'));
        // Подключение кастомного размера изображений 
        add_image_size('featured-thumbnail', 1038, 576, true);
        // Подключение поддержки тегов заголовков
        add_theme_support('title-tag');
        // Добавление поддержки кастомного лого
        add_theme_support('custom-logo', [
            'height'      => 49,
            'width'       => 217,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => '',
            'unlink-homepage-logo' => false, // WP 5.5
        ]);
        // Подключение поддержки виджетов
        add_theme_support('widgets');
        //
        add_theme_support('customize-selective-refresh-widgets');
        //
        add_theme_support('automatic-feed-links');
        //
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        ]);
        //
        add_editor_style('assets/build/css/editor.css');

        // Blocks full-wide
        add_theme_support('align-wide');

        // Отключение возможности тегов в комментариях 
        add_filter('pre_comment_content', 'wp_specialchars');
        // Отключение ссылок в комментариях
        remove_filter('comment_text', 'make_clickable', 9);
    }
}
