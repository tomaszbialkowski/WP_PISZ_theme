<?php
function add_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'add_google_fonts_preconnect');


function enqueue_fonts() {
     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_fonts');


function pisz_files() {
    wp_enqueue_style('main_styles', get_theme_file_uri('css/style.css'));
    wp_enqueue_style('dashicons');
}

add_action('wp_enqueue_scripts', 'pisz_files' );

function pisz_features() {
    add_theme_support('title-tag');
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenuLocation', 'Footer Menu Location');
};

add_action('after_setup_theme', 'pisz_features');

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
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === 'Wyroznione') {
        $query->set('meta_key', 'Wyroznione');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'sort_acf_column_by_value');

define('DEFAULT_IMAGE', get_template_directory_uri() . '/images/PISZ_default_cover.jpg');

function pisztheme_register_bold_paragraph_block() {
    $dir = get_template_directory();          
    $dir_uri = get_template_directory_uri(); 
        $assets_file = include( $dir . '/blocks/build/index.asset.php' );

    wp_register_script(
        'pisztheme-bold-paragraph-script',
        $dir_uri . '/blocks/build/index.js',
        $assets_file['dependencies'],
        $assets_file['version']
    );

    wp_register_style(
        'pisztheme-bold-paragraph-editor-style',
        $dir_uri . '/blocks/build/index.css',
        array(),
        $assets_file['version']
    );

    wp_register_style(
        'pisztheme-bold-paragraph-style',
        $dir_uri . '/blocks/build/style-index.css',
        array(),
        filemtime( $dir . '/blocks/build/style-index.css' )
    );

    register_block_type( 'pisztheme/bold-paragraph', array(
        'editor_script' => 'pisztheme-bold-paragraph-script',
        'editor_style'  => 'pisztheme-bold-paragraph-editor-style',
        'style'         => 'pisztheme-bold-paragraph-style',
    ) );
}
add_action('init', 'pisztheme_register_bold_paragraph_block');

function lock_bold_paragraph_block_template() {
    $post_type_object = get_post_type_object( 'post' );
    $post_type_object->template = array (
        array ('pisztheme/bold-paragraph', array(
            'content' => "Wprowadź tekst leada"
        ))
        );
    $post_type_object->template_lock = '';
}

add_action( 'init', 'lock_bold_paragraph_block_template' );

if ( function_exists( 'pll_register_string' ) ) {
    pll_register_string(
        'wyroznione',
        'Wyróżnione',
    );
    pll_register_string(
        'najnowsze_publikacje',
        'Najnowsze publikacje',
    );
    pll_register_string(
        'wydarzenia',
        'Wydarzenia',
    );
    pll_register_string(
        'publikacje',
        'Publikacje',
    );
    pll_register_string(
        'analitycy',
        'Analitycy',
    );
    pll_register_string(
        'nadchodzące_wydarzenia',
        'Nadchodzące wydarzenia',
    );
    pll_register_string(
        'minione_wydarzenia',
        'Minione wydarzenia',
    );
    pll_register_string(
        'wydarzenia',
        'Wydarzenia',
    );
}
?>