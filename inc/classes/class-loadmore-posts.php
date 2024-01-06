<?

/**
 * Class for infinite scroll posts
 * 
 * @package Outlander
 */

namespace OUTLANDER_THEME\Inc;

use OUTLANDER_THEME\Inc\Traits\Singleton;
use \WP_Query;

class Loadmore_posts
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
        add_action('wp_ajax_nopriv_load_more', [$this, 'ajax_script_post_load_more']);
        add_action('wp_ajax_load_more', [$this, 'ajax_script_post_load_more']);

        // Add shortcode
        add_shortcode('post_listings', [$this, 'post_script_load_more']);
    }

    public function ajax_script_post_load_more($initial_request = false)
    {
        if (!$initial_request && !check_ajax_referer('loadmore_post_nonce', 'ajax_nonce', false)) {
            wp_send_json_error(__('Invalid security token sent.', 'text-domain'));
            wp_die('0', 400);
        }

        // Check if it's an ajax call.
        $is_ajax_request = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        /**
         * Page number.
         * If get_query_var( 'paged' ) is 2 or more, its a number pagination query.
         * If $_POST['page'] has a value which means its a loadmore request, which will take precedence.
         */
        $page_no = get_query_var('paged') ? get_query_var('paged') : 1;
        $page_no = !empty($_POST['page']) ? filter_var($_POST['page'], FILTER_VALIDATE_INT) + 1 : $page_no;

        // Default Argument.
        $args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 4, // Number of posts per page - default
            'paged'          => $page_no,
        ];

        $query = new WP_Query($args);;

        if ($query->have_posts()) :
            // Loop Posts.
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/components/post-card');
            endwhile;

            // Pagination for Google.
            if (!$is_ajax_request) :
                $total_pages = $query->max_num_pages;
                get_template_part('template-parts/common/pagination', null, [
                    'total_pages'  => $total_pages,
                    'current_page' => $page_no,
                ]);
            endif;
        else :
            // Return response as zero, when no post found.
            wp_die('0');
        endif;

        wp_reset_postdata();

        /**
         * Check if its an ajax call, and not initial request
         */
        if ($is_ajax_request && !$initial_request) {
            wp_die();
        }
    }
    public function post_script_load_more()
    {

        // Initial Post Load.
?>
        <div id="load-more-content" class="blog-content-wrapper [ auto-grid-table ] [ padding-inline-30 padding-block-30 ]">
            <?php
            $this->ajax_script_post_load_more(true);

            // If user is not in editor and on page one, show the load more.
            ?>
        </div>
        <div class="loadmore-wrapper">
            <button id="load-more" data-page="1" class="btn btn-loadmore">
                <span><?php esc_html_e('Loading...', 'outlander'); ?></span>
                <?php get_template_part('template-parts/svgs/loading'); ?>
            </button>
        </div>
<?php
    }
};
