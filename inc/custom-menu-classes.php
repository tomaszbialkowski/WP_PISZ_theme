<?php

function custom_menu_classes_analitics($classes, $item) {
    // ID strony "Nasze Osoby" (Twoja własna strona z listą osób)
    $custom_archive_analitics_pl_id = 28; // Zmień na ID Twojej strony
    $custom_archive_analitics_en_id = function_exists('pll_get_post') ? pll_get_post($custom_archive_analitics_pl_id, 'en') : null;; // Zmień na ID Twojej strony

    // Sprawdź, czy jesteśmy na single CPT "osoby"
    if (is_singular('osoby')) {
        // Usuń `current_page_parent` z domyślnego archiwum CPT ("/osoby/")
        if (($key = array_search('current_page_parent', $classes)) !== false) {
            unset($classes[$key]);
        }

        // Jeśli link w menu prowadzi do Twojej własnej strony z osobami, dodaj `current_page_parent`
        if ($item->object_id == $custom_archive_analitics_pl_id || $item->object_id == $custom_archive_analitics_en_id) {
            $classes[] = 'current_page_parent';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'custom_menu_classes_analitics', 10, 2);

?>