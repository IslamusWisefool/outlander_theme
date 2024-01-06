<?php

/**
 * Theme functions 
 * 
 * @package Outlander
 */

if (!defined('OUTLANDER_DIR_PATH')) {
	define('OUTLANDER_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('OUTLANDER_DIR_URI')) {
	define('OUTLANDER_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('OUTLANDER_BUILD_URI')) {
	define('OUTLANDER_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build');
}

if (!defined('OUTLANDER_BUILD_PATH')) {
	define('OUTLANDER_BUILD_PATH', untrailingslashit(get_template_directory()) . '/assets/build');
}

if (!defined('OUTLANDER_BUILD_JS_URI')) {
	define('OUTLANDER_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/js');
}
if (!defined('OUTLANDER_BUILD_JS_PATH')) {
	define('OUTLANDER_BUILD_JS_PATH', untrailingslashit(get_template_directory()) . '/assets/build/js');
}

if (!defined('OUTLANDER_BUILD_IMG_URI')) {
	define('OUTLANDER_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/src/img');
}

if (!defined('OUTLANDER_BUILD_IMG_PATH')) {
	define('OUTLANDER_BUILD_IMG_PATH', untrailingslashit(get_template_directory()) . '/assets/build/src/img');
}

if (!defined('OUTLANDER_BUILD_CSS_URI')) {
	define('OUTLANDER_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/css');
}

if (!defined('OUTLANDER_BUILD_CSS_PATH')) {
	define('OUTLANDER_BUILD_CSS_PATH', untrailingslashit(get_template_directory()) . '/assets/build/css');
}

if (!defined('OUTLANDER_ARCHIVE_POST_PER_PAGE')) {
	define('OUTLANDER_ARCHIVE_POST_PER_PAGE', 6);
}

if (!defined('OUTLANDER_SEARCH_RESULTS_POST_PER_PAGE')) {
	define('OUTLANDER_SEARCH_RESULTS_POST_PER_PAGE', 8);
}


require_once OUTLANDER_DIR_PATH . '/inc/helpers/autoloader.php';
require_once OUTLANDER_DIR_PATH . '/inc/helpers/template-tags.php';


function outalder_get_theme_instance()
{
	\OUTLANDER_THEME\Inc\OUTLANDER_THEME::get_instance();
};

outalder_get_theme_instance();
