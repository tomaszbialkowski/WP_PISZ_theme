<?php
if (!defined('ABSPATH')) exit;

function pisztheme_register_bold_paragraph_block() {
    $dir = get_template_directory();
    $dir_uri = get_template_directory_uri();
    $assets_file = include( $dir . '/blocks/build/index.asset.php' );

    wp_register_script('pisztheme-bold-paragraph-script', $dir_uri . '/blocks/build/index.js', $assets_file['dependencies'], $assets_file['version']);
    wp_register_style('pisztheme-bold-paragraph-editor-style', $dir_uri . '/blocks/build/index.css', array(), $assets_file['version']);
    wp_register_style('pisztheme-bold-paragraph-style', $dir_uri . '/blocks/build/style-index.css', array(), filemtime( $dir . '/blocks/build/style-index.css' ));

    register_block_type('pisztheme/bold-paragraph', array(
        'editor_script' => 'pisztheme-bold-paragraph-script',
        'editor_style'  => 'pisztheme-bold-paragraph-editor-style',
        'style'         => 'pisztheme-bold-paragraph-style',
    ));
}
add_action('init', 'pisztheme_register_bold_paragraph_block');

?>