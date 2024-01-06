<?

/**
 * Enqueue theme sidebars
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Sidebars
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
        add_action('widgets_init', [$this, 'outlander_register_sidebars']);
        add_action('widgets_init', [$this, 'outlander_register_clock_widget']);
    }

    public function outlander_register_sidebars()
    {
        register_sidebar([
            'name'          => __('Sidebar', 'outlander'),
            'id'            => "sidebar-1",
            'description'   => __('Main sidebar', 'outlander'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "<div>",
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => "</h3>",
        ]);
        register_sidebar([
            'name'          => __('Sidebar-secondary', 'outlander'),
            'id'            => "sidebar-2",
            'description'   => __('Secondary sidebar', 'outlander'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "<div>",
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => "</h3>",
        ]);
    }

    public function outlander_register_clock_widget()
    {
        register_widget('OUTLANDER_THEME\Inc\Clock_widget');
    }
};
