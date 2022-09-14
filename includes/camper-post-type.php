<?php
/**
 * Register Mybooking campers Custom Post Type
 *
 * @since 1.0.1
 */
function mybooking_camper() {

	$labels = array(
		'name'                  => _x( 'Campers', 'Post Type General Name', 'mybooking-campers' ),
		'singular_name'         => _x( 'Campers', 'Post Type Singular Name', 'mybooking-campers' ),
		'menu_name'             => __( 'Campers', 'mybooking-campers' ),
		'name_admin_bar'        => __( 'Campers', 'mybooking-campers' ),
		'archives'              => __( 'Camper Archives', 'mybooking-campers' ),
		'attributes'            => __( 'Camper Attributes', 'mybooking-campers' ),
		'parent_item_colon'     => __( 'Parent camper:', 'mybooking-campers' ),
		'all_items'             => __( 'All campers', 'mybooking-campers' ),
		'add_new_item'          => __( 'Add New camper', 'mybooking-campers' ),
		'add_new'               => __( 'Add New', 'mybooking-campers' ),
		'new_item'              => __( 'New camper', 'mybooking-campers' ),
		'edit_item'             => __( 'Edit camper', 'mybooking-campers' ),
		'update_item'           => __( 'Update camper', 'mybooking-campers' ),
		'view_item'             => __( 'View camper', 'mybooking-campers' ),
		'view_items'            => __( 'View campers', 'mybooking-campers' ),
		'search_items'          => __( 'Search camper', 'mybooking-campers' ),
		'not_found'             => __( 'Not found', 'mybooking-campers' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mybooking-campers' ),
		'featured_image'        => __( 'Camper Catalog Image', 'mybooking-campers' ),
		'set_featured_image'    => __( 'Set camper image', 'mybooking-campers' ),
		'remove_featured_image' => __( 'Remove camper image', 'mybooking-campers' ),
		'use_featured_image'    => __( 'Use as camper image', 'mybooking-campers' ),
		'insert_into_item'      => __( 'Insert into camper', 'mybooking-campers' ),
		'uploaded_to_this_item' => __( 'Uploaded to this camper', 'mybooking-campers' ),
		'items_list'            => __( 'Camper list', 'mybooking-campers' ),
		'items_list_navigation' => __( 'Camper list navigation', 'mybooking-campers' ),
		'filter_items_list'     => __( 'Filter camper list', 'mybooking-campers' ),
	);
	$rewrite = array(
		'slug'                  => 'camper',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Campers', 'mybooking-campers' ),
		'description'           => __( 'Mybooking Campers.', 'mybooking-campers' ),
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
                'name' 					=> __( 'Camper category', 'mybooking-campers' ),
                'add_new_item' 	=> __( 'Add camper category', 'mybooking-campers' ),
                'new_item_name' => __( 'New camper category', 'mybooking-campers' )
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
