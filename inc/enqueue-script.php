<?php
if (!defined('ABSPATH')) exit;

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
    wp_enqueue_style('main_styles', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'pisz_files');

?>