<?

/**
 * Search form template
 * 
 * @package Outlander
 */

?>

<form role="search" method="get" class="form" action="<? echo esc_url(home_url('/')); ?>">
    <input class="form-control" type="search" placeholder="<? esc_attr_x('Search', 'placeholder', 'outlander') ?>" value="<? the_search_query() ?>" aria-label="Search" name="s">
    <button class="btn btn-primary" type="submit"><? echo esc_attr_x('Search', 'submit button', 'outlander') ?></button>
</form>