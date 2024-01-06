<?
/**
 * Enqueue theme menus
 * 
 * @package Outlander
 */

 namespace OUTLANDER_THEME\Inc;
 use OUTLANDER_THEME\Inc\Traits\Singleton;

 class Menus {
    use Singleton;

    protected function __construct(){
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // actions and filters

        add_action( 'init', [$this, 'register_menus'] );
    }

    public function register_menus() {
     // Регистрация меню
        register_nav_menus([
            'outlander-header-menu' => esc_html__('Меню в шапке', 'Outlander'),
            'outlander-footer-menu' => esc_html__('Меню в подвале', 'Outlander'),
        ]);
    }

    public function get_menu_id( $location ){
     // Get all locations 
        $locations = get_nav_menu_locations();

     // Get object ID by location

        $menu_id = $locations[$location];

        return ! empty( $menu_id ) ? $menu_id : '';
    }

    public function get_child_menu_items( $menu_array, $parent_id ){
     // Get all children of drop down menu
        $child_menus = [];

        if ( ! empty($menu_array) && is_array( $menu_array )){
            foreach ($menu_array as $menu) {
                if ( intval( $menu->menu_item_parent ) === $parent_id ) {
                    array_push( $child_menus, $menu );
                };
            }
        };

        return $child_menus;
    }
 };