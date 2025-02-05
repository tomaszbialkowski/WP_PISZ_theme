<?php

function custom_menu_classes_analitics($classes, $item) {
    $custom_archive_analitics_pl_id = 28;
    $custom_archive_analitics_en_id = function_exists('pll_get_post') ? pll_get_post($custom_archive_analitics_pl_id, 'en') : null;

    if (is_singular('osoby')) {
        if (($key = array_search('current_page_parent', $classes)) !== false) {
            unset($classes[$key]);
        }

        if ($item->object_id == $custom_archive_analitics_pl_id || $item->object_id == $custom_archive_analitics_en_id) {
            $classes[] = 'current_page_parent';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'custom_menu_classes_analitics', 10, 2);

?>