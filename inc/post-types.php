<?php 

function cptui_register_my_cpts_location() {

	/**
	 * Post Type: Locations.
	 */

	$labels = array(
		"name" => __( "Locations", "cornerstone-main" ),
		"singular_name" => __( "Location", "cornerstone-main" ),
		"menu_name" => __( "Locations", "cornerstone-main" ),
		"all_items" => __( "All Locations", "cornerstone-main" ),
		"add_new" => __( "Add New", "cornerstone-main" ),
		"add_new_item" => __( "Add New Location", "cornerstone-main" ),
	);

	$args = array(
		"label" => __( "Locations", "cornerstone-main" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "location", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-location-alt",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "location", $args );
}

add_action( 'init', 'cptui_register_my_cpts_location' );
