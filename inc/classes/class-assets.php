<?

/**
 * Enqueue theme assets
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // actions and filters
        // Подключение стилей и скриптов  //
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        // add_action('enqueue_block_assets', [$this, 'enqueue_editor_assets']);
        add_action('init', [$this, 'enqueue_editor_assets'], 1);
    }

    public function register_styles()
    {
        // Регистрация стилей
        wp_register_style('local-style', get_stylesheet_uri(), [], filemtime(OUTLANDER_DIR_PATH . '/style.css'), 'all');
        // wp_register_style('main_css', OUTLANDER_DIR_URI . '/dist/main_css.css', [], filemtime(OUTLANDER_DIR_PATH . '/dist/main_css.css'), 'all');
        wp_register_style('theme_styles', OUTLANDER_BUILD_CSS_URI . '/main.css', [], filemtime(OUTLANDER_BUILD_CSS_PATH . '/main.css'), 'all');
        wp_register_style('search-css', OUTLANDER_BUILD_CSS_URI . '/search.css', [], filemtime(OUTLANDER_BUILD_CSS_PATH . '/search.css'), 'all');
        // Подключение стилей
        wp_enqueue_style('local-style');
        // wp_enqueue_style('main_css');
        wp_enqueue_style('theme_styles');

        if (is_page('search')) {
            wp_enqueue_style('search-css');
        }
    }

    public function register_scripts()
    {
        // Регистрация скриптов 
        // wp_register_script('main', OUTLANDER_DIR_URI . '/dist/main_js.js', [], filemtime(OUTLANDER_DIR_PATH . '/dist/main_js.js'), true);
        wp_register_script('theme-scripts', OUTLANDER_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(OUTLANDER_BUILD_JS_PATH . '/main.js'), true);
        wp_register_script('single-page-scripts', OUTLANDER_BUILD_JS_URI . '/single.js', ['jquery'], filemtime(OUTLANDER_BUILD_JS_PATH . '/single.js'), true);
        wp_register_script('author-page-scripts', OUTLANDER_BUILD_JS_URI . '/author.js', ['jquery'], filemtime(OUTLANDER_BUILD_JS_PATH . '/author.js'), true);
        wp_register_script('search-js', OUTLANDER_BUILD_JS_URI . '/search.js', ['theme-scripts'], filemtime(OUTLANDER_BUILD_JS_PATH . '/search.js'), true);
        // Подключение скриптов
        // wp_enqueue_script('main');
        wp_enqueue_script('theme-scripts');

        wp_localize_script('theme-scripts', 'siteConfig', [
            'ajaxUrl'    => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('loadmore_post_nonce'),
        ]);

        if (is_page('search')) {
            $filters_data = get_filters_data();
            wp_enqueue_script('search-js');
            wp_localize_script(
                'search-js',
                'search_settings',
                [
                    'rest_api_url' => home_url('/wp-json/af/v1/search'),
                    'root_url' => home_url('search'),
                    'filter_ids' => get_filter_ids($filters_data),
                ]
            );
        }


        if (is_single()) {
            wp_enqueue_script('single-page-scripts');
        }

        if (is_author()) {
            wp_enqueue_script('author-page-scripts');
        }
    }

    public function enqueue_editor_assets()
    {
        $asset_config_file = sprintf('%s/assets.php', OUTLANDER_BUILD_PATH);

        if (!file_exists($asset_config_file)) {
            echo 'ASSET NOT FOUND';
            return;
        }

        $asset_config = require_once $asset_config_file;

        if (empty($asset_config['js/single.js'])) {
            return;
        }

        $editor_asset = $asset_config['js/single.js'];
        $js_dependencies = (!empty($editor_asset['dependencies'])) ? $editor_asset['dependencies'] : [];
        // $version = (!empty($editor_asset['version'])) ? $editor_asset['version'] : filemtime($asset_config_file);

        // Theme Gutenberg block JS

        if (is_admin()) {
            wp_enqueue_script(
                'outlander-block-js',
                OUTLANDER_BUILD_JS_URI . '/blocks.js',
                $js_dependencies,
                filemtime($asset_config_file),
                true
            );
        }

        // Theme Gutenberg block CSS

        $css_dependencies = [
            'wp-block-library-theme',
            'wp-block-library'
        ];

        wp_enqueue_style(
            'outlander-block-css',
            OUTLANDER_BUILD_CSS_URI . '/blocks.css',
            $css_dependencies,
            filemtime(OUTLANDER_BUILD_CSS_PATH . '/blocks.css'),
            'all'
        );
    }
};
