<?php 
if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/enqueue-script.php';
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/custom-taxonomies.php';
require_once get_template_directory() . '/inc/admin-columns.php';
require_once get_template_directory() . '/inc/custom-blocks.php';
require_once get_template_directory() . '/inc/polylang-strings.php';
require_once get_template_directory() . '/inc/custom-menu-classes.php';
require_once get_template_directory() . '/inc/fix-menu-classes-for-events.php';
?>