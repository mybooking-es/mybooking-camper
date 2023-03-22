<?php
/**
 * Register Mybooking Motorhome Custom Post Type
 *
 * @since 1.0.1
 */
function mybooking_camper() {

	$labels = array(
		'name'                  => _x( 'Motorhomes', 'Post Type General Name', 'mybooking-campers' ),
		'singular_name'         => _x( 'Motorhomes', 'Post Type Singular Name', 'mybooking-campers' ),
		'menu_name'             => __( 'Motorhomes', 'mybooking-campers' ),
		'name_admin_bar'        => __( 'Motorhomes', 'mybooking-campers' ),
		'archives'              => __( 'Motorhome Archives', 'mybooking-campers' ),
		'attributes'            => __( 'Motorhome Attributes', 'mybooking-campers' ),
		'parent_item_colon'     => __( 'Parent motorhome:', 'mybooking-campers' ),
		'all_items'             => __( 'All motorhomes', 'mybooking-campers' ),
		'add_new_item'          => __( 'Add New Motorhome', 'mybooking-campers' ),
		'add_new'               => __( 'Add New', 'mybooking-campers' ),
		'new_item'              => __( 'New Motorhome', 'mybooking-campers' ),
		'edit_item'             => __( 'Edit Motorhome', 'mybooking-campers' ),
		'update_item'           => __( 'Update Motorhome', 'mybooking-campers' ),
		'view_item'             => __( 'View Motorhome', 'mybooking-campers' ),
		'view_items'            => __( 'View Motorhomes', 'mybooking-campers' ),
		'search_items'          => __( 'Search Motorhome', 'mybooking-campers' ),
		'not_found'             => __( 'Not found', 'mybooking-campers' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mybooking-campers' ),
		'featured_image'        => __( 'Motorhome Catalog Image', 'mybooking-campers' ),
		'set_featured_image'    => __( 'Set Motorhome image', 'mybooking-campers' ),
		'remove_featured_image' => __( 'Remove Motorhome image', 'mybooking-campers' ),
		'use_featured_image'    => __( 'Use as Motorhome image', 'mybooking-campers' ),
		'insert_into_item'      => __( 'Insert into Motorhome', 'mybooking-campers' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Motorhome', 'mybooking-campers' ),
		'items_list'            => __( 'Motorhome list', 'mybooking-campers' ),
		'items_list_navigation' => __( 'Motorhome list navigation', 'mybooking-campers' ),
		'filter_items_list'     => __( 'Filter Motorhomes List', 'mybooking-campers' ),
	);
	$rewrite = array(
		'slug'                  => __( 'motorhome', 'mybooking-campers' ),
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Motorhomes', 'mybooking-campers' ),
		'description'           => __( 'Mybooking Motorhomes.', 'mybooking-campers' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-site-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'camper', $args );

}
add_action( 'init', 'mybooking_camper', 0 );

/**
 * Register taxonomies for Mybooking campers Custom Post Type
 *
 * @since 1.0.0
 */
function mybooking_camper_taxonomies() {
    register_taxonomy(
        'campers',
        'camper',
        array(
            'labels' => array(
                'name' 					=> __( 'Motorhome category', 'mybooking-campers' ),
                'add_new_item' 	=> __( 'Add Motorhome category', 'mybooking-campers' ),
                'new_item_name' => __( 'New Motorhome category', 'mybooking-campers' )
            ),
            'show_ui' 					=> true,
						'show_in_rest' 			=> true,
						'show_admin_column' => true,
            'show_tagcloud' 		=> false,
            'hierarchical' 			=> true,

        )
    );
}
add_action( 'init', 'mybooking_camper_taxonomies', 0 );


/**
 * Add templates for new taxonomies
 *
 * @since 1.0.0
 */

// campers
function mybooking_camper_single_template( $single_camper_template ){
 	global $post;

	if ( $post->post_type == 'camper' ) {
	  $single_camper_template = plugin_dir_path(__FILE__) . 'templates/single-camper.php';
	}
	return $single_camper_template;
}
add_filter( 'single_template','mybooking_camper_single_template' );

function mybooking_camper_archives_template( $archive_camper_template ){
  global $post;

  if ( $post->post_type == 'camper' ) {
    $archive_camper_template = plugin_dir_path(__FILE__) . 'templates/archives-camper.php';
  }
  return $archive_camper_template;
}
add_filter( 'archive_template','mybooking_camper_archives_template' );
