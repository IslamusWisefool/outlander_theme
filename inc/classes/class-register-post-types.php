<?

/**
 * Pattern for registrating post types
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Register_Post_Types
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
        add_action('init', [$this, 'create_movie_cpt'], 0);
    }

    // Register Custom Post Type Movie
    public function create_movie_cpt()
    {
        $labels = array(
            'name' => _x('Movies', 'Post Type General Name', 'outlander'),
            'singular_name' => _x('Movie', 'Post Type Singular Name', 'outlander'),
            'menu_name' => _x('Movies', 'Admin Menu text', 'outlander'),
            'name_admin_bar' => _x('Movie', 'Add New on Toolbar', 'outlander'),
            'archives' => __('Movie Archives', 'outlander'),
            'attributes' => __('Movie Attributes', 'outlander'),
            'parent_item_colon' => __('Parent Movie:', 'outlander'),
            'all_items' => __('All Movies', 'outlander'),
            'add_new_item' => __('Add New Movie', 'outlander'),
            'add_new' => __('Add New', 'outlander'),
            'new_item' => __('New Movie', 'outlander'),
            'edit_item' => __('Edit Movie', 'outlander'),
            'update_item' => __('Update Movie', 'outlander'),
            'view_item' => __('View Movie', 'outlander'),
            'view_items' => __('View Movies', 'outlander'),
            'search_items' => __('Search Movie', 'outlander'),
            'not_found' => __('Not found', 'outlander'),
            'not_found_in_trash' => __('Not found in Trash', 'outlander'),
            'featured_image' => __('Featured Image', 'outlander'),
            'set_featured_image' => __('Set featured image', 'outlander'),
            'remove_featured_image' => __('Remove featured image', 'outlander'),
            'use_featured_image' => __('Use as featured image', 'outlander'),
            'insert_into_item' => __('Insert into Movie', 'outlander'),
            'uploaded_to_this_item' => __('Uploaded to this Movie', 'outlander'),
            'items_list' => __('Movies list', 'outlander'),
            'items_list_navigation' => __('Movies list navigation', 'outlander'),
            'filter_items_list' => __('Filter Movies list', 'outlander'),
        );
        $args = array(
            'label' => __('Movie', 'outlander'),
            'description' => __('The movies', 'outlander'),
            'labels' => $labels,
            'menu_icon' => 'dashicons-hidden',
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'custom-fields'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type('movies', $args);
    }
};
