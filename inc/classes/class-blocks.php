<?

/**
 * Gutenberg blocks config
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Blocks
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
        add_filter('block_categories_all', [$this, 'outlander_register_block_categories']);
    }

    public function outlander_register_block_categories($categories)
    {
        $category_slugs = wp_list_pluck($categories, 'slug');

        return in_array('outlander', $category_slugs, true) ? $categories : array_merge(
            $categories,
            [
                [
                    'slug' => 'outlander',
                    'title' => __('Outalander blocks', 'outlander'),
                    'icon' => ''
                ]
            ]
        );
    }
};
