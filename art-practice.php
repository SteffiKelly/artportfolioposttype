<?php
/**
* Plugin Name:   Art Project Post Type
* Plugin URI:    https://github.com/SteffiKelly/artportfolioposttype
* Description:   Adds art portfolio custom post type
* Version:       1.0
* Author:        Steffi Kelly
* Author URI:    https://steffikelly.com
* Text Domain: 	sk21
* Domain Path: 	/languages
*/

function sk21_create_art_post_type() {
	$labels = array(
		'name' => __( 'Art Projects', 'sk21' ),
		'singular_name' => __( 'Art Project', 'sk21' ),
		'add_new' => __( 'New Art Project', 'sk21' ),
		'add_new_item' => __( 'Add New Art Project', 'sk21' ),
		'edit_item' => __( 'Edit Art Project', 'sk21' ),
		'new_item' => __( 'New Art Project', 'sk21' ),
		'view_item' => __( 'View Art Project', 'sk21' ),
		'search_items' => __( 'Search Art Projects', 'sk21' ),
		'not_found' =>  __( 'No Art Projects Found', 'sk21' ),
		'not_found_in_trash' => __( 'No Art Projects found in Trash', 'sk21' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'art-practice' ),
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array( 'post_tag', 'category'),
	);
	register_post_type( 'art-practice', $args );
}
add_action( 'init', 'sk21_create_art_post_type' );

function sk21_register_medium_taxonomy() {

  $labels = array(
		'name'              => __( 'Mediums', 'sk21' ),
		'singular_name'     => __( 'Medium', 'sk21' ),
		'search_items'      => __( 'Search Mediums', 'sk21' ),
		'all_items'         => __( 'All Mediums', 'sk21' ),
		'edit_item'         => __( 'Edit Mediums', 'sk21' ),
		'update_item'       => __( 'Update Mediums', 'sk21' ),
		'add_new_item'      => __( 'Add New Mediums', 'sk21' ),
		'new_item_name'     => __( 'New Medium Name', 'sk21' ),
		'menu_name'         => __( 'Mediums', 'sk21' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'mediums' ),
		'show_admin_column' => true
	);

	register_taxonomy( 'medium', array( 'post', 'art-practice' ), $args);

}
add_action( 'init', 'sk21_register_medium_taxonomy' );

function sk21_add_categories_to_art_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'sk21_add_categories_to_art_pages' );

/**********************************************************************************
sk21_art_project_i18n - registers text domain for i18n
**********************************************************************************/
function sk21_art_project_i18n() {

	load_plugin_textdomain( 'sk21', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'sk21_art_project_i18n' );

?>
