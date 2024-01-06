<?

/**
 * Block patterns
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Block_patterns
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
        add_action('init', [$this, 'outlander_register_block_patterns']);
        add_action('init', [$this, 'outlander_register_block_pattern_category']);
    }

    public function outlander_register_block_patterns()
    {
        if (function_exists('register_block_pattern')) {
            /**
             * Cover pattern
             */
            $cover_content = $this->get_pattern_content('template-parts/patterns/cover');

            register_block_pattern(
                'outlander/cover',
                [
                    'title' => __('Outlander cover', 'outlander'),
                    'description' => __('Cover from outlander theme', 'outlander'),
                    'categories' => ['cover'],
                    'content' => $cover_content
                ]
            );
        };
    }

    public function get_pattern_content($pattern_path)
    {
        ob_start();

        get_template_part($pattern_path);

        $pattern_content = ob_get_contents();

        ob_end_clean();

        return $pattern_content;
    }

    public function outlander_register_block_pattern_category()
    {
        $pattern_categories = [
            'cover' => __('Cover', 'outlander'),
            'slider' => __('Slider', 'outlander')
        ];

        if (!empty($pattern_categories) && is_array($pattern_categories)) {
            foreach ($pattern_categories as $category => $category_label) {
                register_block_pattern_category(
                    $category,
                    ['label' => $category_label]
                );
            }
        }
    }
};
