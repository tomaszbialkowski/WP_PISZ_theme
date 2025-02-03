<?php
if (!defined('ABSPATH')) exit;

function pisz_theme_setup() {
    add_theme_support('title-tag');

    register_nav_menus(array(
        'headerMenuLocation' => __('Header Menu Location', 'pisz'),
        'footerMenuLocation' => __('Footer Menu Location', 'pisz'),
    ));
}
add_action('after_setup_theme', 'pisz_theme_setup');

define('DEFAULT_IMAGE', get_template_directory_uri() . '/images/PISZ_default_cover.jpg');

?>