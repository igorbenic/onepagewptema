<?php
// Register Custom Post Type
function lakoonepage_testimonials() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'lakoonepage' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'lakoonepage' ),
		'menu_name'           => __( 'Testimonials', 'lakoonepage' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'lakoonepage' ),
		'all_items'           => __( 'All Testimonials', 'lakoonepage' ),
		'view_item'           => __( 'View Testimonial', 'lakoonepage' ),
		'add_new_item'        => __( 'Add New Testimonial', 'lakoonepage' ),
		'add_new'             => __( 'Add New', 'lakoonepage' ),
		'edit_item'           => __( 'Edit Testimonial', 'lakoonepage' ),
		'update_item'         => __( 'Update Testimonial', 'lakoonepage' ),
		'search_items'        => __( 'Search Testimonial', 'lakoonepage' ),
		'not_found'           => __( 'Not found', 'lakoonepage' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'lakoonepage' ),
	);
	$args = array(
		'label'               => __( 'testimonials', 'lakoonepage' ),
		'description'         => __( 'Testimonials', 'lakoonepage' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonials', $args );

}

// Hook into the 'init' action
add_action( 'init', 'lakoonepage_testimonials', 0 );
