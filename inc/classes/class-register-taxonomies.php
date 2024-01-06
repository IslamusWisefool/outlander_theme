<?

/**
 * Pattern for registrating new taxonomies types
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Register_Taxonomies
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
        add_action('init', [$this, 'create_genre_tax']);
    }

    // Register Taxonomy Genre
    public function create_genre_tax()
    {

        $labels = array(
            'name'              => _x('Genres', 'taxonomy general name', 'outlander'),
            'singular_name'     => _x('Genre', 'taxonomy singular name', 'outlander'),
            'search_items'      => __('Search Genres', 'outlander'),
            'all_items'         => __('All Genres', 'outlander'),
            'parent_item'       => __('Parent Genre', 'outlander'),
            'parent_item_colon' => __('Parent Genre:', 'outlander'),
            'edit_item'         => __('Edit Genre', 'outlander'),
            'update_item'       => __('Update Genre', 'outlander'),
            'add_new_item'      => __('Add New Genre', 'outlander'),
            'new_item_name'     => __('New Genre Name', 'outlander'),
            'menu_name'         => __('Genre', 'outlander'),
        );
        $args = array(
            'labels' => $labels,
            'description' => __('Movie genre', 'outlander'),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
        );
        register_taxonomy('genre', array('movies'), $args);
    }
};
