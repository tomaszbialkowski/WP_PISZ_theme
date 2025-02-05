<?php
function register_rola_taxonomy() {
    register_taxonomy('rola', 'osoby', array(
        'labels' => array(
            'name'              => 'role',
            'singular_name'     => 'rola',
            'search_items'      => 'Szukaj ról',
            'all_items'         => 'Wszystkie role',
            'edit_item'         => 'Edytuj rolę',
            'update_item'       => 'Zaktualizuj rolę',
            'add_new_item'      => 'Dodaj nową rolę',
            'new_item_name'     => 'Nazwa nowej roli',
            'menu_name'         => 'Role',
        ),
        'rewrite' => array('slug' => 'rola'),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_rola_taxonomy');


function add_rola_metabox_to_osoby() {
    add_meta_box(
        'tagsdiv-rola', // ID meta-boxa
        'Role', // Tytuł meta-boxa
        'post_tags_meta_box', // Domyślna funkcja obsługująca meta-box dla taksonomii
        'osoby', // CPT, dla którego meta-box ma być dodany
        'side', // Lokalizacja (side, normal, advanced)
        'default', // Priorytet
        array('taxonomy' => 'rola') // Powiązanie z taksonomią „Rola”
    );
}
add_action('add_meta_boxes', 'add_rola_metabox_to_osoby');
?>