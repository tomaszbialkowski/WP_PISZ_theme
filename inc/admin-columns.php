<?php
if (!defined('ABSPATH')) exit;

function customize_post_table_columns($columns) {
    unset($columns['comments']);
    $columns['Wyroznione'] = 'Wyróżnione';
    return $columns;
}
add_filter('manage_edit-post_columns', 'customize_post_table_columns');

function fill_custom_acf_column($column, $post_id) {
    if ($column === 'Wyroznione') {
        $acf_value = get_field('Wyroznione', $post_id);
        echo $acf_value ? esc_html($acf_value[0]) : '';
    }
}
add_action('manage_post_posts_custom_column', 'fill_custom_acf_column', 10, 2);

function make_acf_column_sortable($columns) {
    $columns['Wyroznione'] = 'Wyroznione';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'make_acf_column_sortable');

function sort_acf_column_by_value($query) {
    if (!is_admin() || !$query->is_main_query()) return;

    if ($query->get('orderby') === 'Wyroznione') {
        $query->set('meta_key', 'Wyroznione');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'sort_acf_column_by_value');

?>