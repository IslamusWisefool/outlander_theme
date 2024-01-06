<?

/**
 * Enqueue theme assets
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Archive_Settings
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
        add_filter('pre_get_posts', [$this, 'change_archive_posts_per_page']);
    }

    public function change_archive_posts_per_page($query)
    {
        if ($query->is_archive() && !is_admin() && $query->is_main_query()) {
            $query->set('posts_per_page', strval(OUTLANDER_ARCHIVE_POST_PER_PAGE));
        } else if (!empty($query->query_vars['s']) && !is_admin()) {
            // For each result page only
            $query->set('posts_per_page', strval(OUTLANDER_SEARCH_RESULTS_POST_PER_PAGE));
        }
        return $query;
    }
};
