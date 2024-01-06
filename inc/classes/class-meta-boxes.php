<?

/**
 * Enqueue theme meta boxes
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;

class Meta_Boxes
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

        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action('save_post', [$this, 'save_post_meta_data']);
    }

    public function add_custom_meta_box()
    {
        $screens = ['post', 'page', 'movie'];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide_page_id',
                __('Hide page title', 'outlander'),
                [$this, 'cusom_meta_box_html'],
                $screen,
                'side'
            );
        }
    }

    public function save_post_meta_data($post_id)
    {
        /**
         * When the post is saved or updated we get $_POST avaliable 
         * Check if the current user is authorized 
         */

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        /**
         * Check if the nonce value is the same as we've been created
         */

        if (
            !isset($_POST['hide_title_meta_box_nonce_name']) ||
            !wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__))
        ) {
            return;
        }

        if (array_key_exists('outlander_hide_title_field', $_POST)) {
            update_meta(
                $post_id,
                '_hide_page_title',
                $_POST['outlander_hide_title_field']
            );
        }
    }

    public function cusom_meta_box_html($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_title', true);

        /**
         *  Use nonce for verification 
         */
        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');
?>
        <label for="outlander-field"><?php esc_html_e('Hide the page title', 'outlander'); ?></label>
        <select name="outlander_hide_title_field" id="outlander-field" class="postbox">
            <option value=""><?php esc_html_e('Select', 'outlander'); ?></option>
            <option value="yes" <?php selected($value, 'yes'); ?>>
                <?php esc_html_e('Yes', 'outlander'); ?>
            </option>
            <option value="no" <?php selected($value, 'no'); ?>>
                <?php esc_html_e('No', 'outlander'); ?>
            </option>
        </select>
<?
    }
};
