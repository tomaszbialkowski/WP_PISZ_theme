<?php
if (!defined('ABSPATH')) exit;

function pisz_post_types() {
	register_post_type('wydarzenia', array(
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'excerpt'),
		'rewrite' => array('slug' => 'wydarzenia'),
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => 'true',
		'labels' => array(
			'name' => "Wydarzenia",
			'add_new_item' => 'Dodaj wydarzenie',
			'edit_item' => 'Edytuj wydarzenie',
			'all_items' => 'Wszystkie ',
			'singular_name' => 'Wydarzenie',
		),
		'menu_icon' => 'dashicons-calendar'
	));

    register_post_type('osoby', array(
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'excerpt'),
		'rewrite' => array('slug' => 'osoby'),
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => 'true',
		'labels' => array(
			'name' => "Osoby",
			'add_new_item' => 'Dodaj osobę',
			'edit_item' => 'Edytuj osobę',
			'all_items' => 'Wszyscy ',
			'singular_name' => 'Osoba',
		),
		'menu_icon' => 'dashicons-businessperson'
	));
}

add_action( 'init', 'pisz_post_types' );

?>