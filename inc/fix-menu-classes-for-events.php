<!-- <?php
function fix_menu_classes_for_wydarzenia($classes, $item) {
    $cpt_slug = 'wydarzenia';

    if (is_post_type_archive($cpt_slug) || is_singular($cpt_slug)) {

        if (($key = array_search('current_page_parent', $classes)) !== false) {
            unset($classes[$key]);
        }

        if ($item->object == 'post_type' && $item->type == 'post_type_archive' && $item->object == $cpt_slug) {
            $classes[] = 'current_page_parent';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'fix_menu_classes_for_wydarzenia', 10, 2);


?> -->

