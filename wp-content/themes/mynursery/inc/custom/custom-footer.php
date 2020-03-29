<?php
/**
 * Register a custom post type called "footer".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_footer_init() {
    $labels = array(
        'name'                  => _x( 'footers', 'Post type general name', 'mynursery' ),
        'singular_name'         => _x( 'footer', 'Post type singular name', 'mynursery' ),
        'menu_name'             => _x( 'Réseaux Sociaux', 'Admin Menu text', 'mynursery' ),
        'name_admin_bar'        => _x( 'footer', 'Add New on Toolbar', 'mynursery' ),
        'add_new'               => __( 'Add New', 'mynursery' ),
        'add_new_item'          => __( 'Add New footer', 'mynursery' ),
        'new_item'              => __( 'New footer', 'mynursery' ),
        'edit_item'             => __( 'Edit footer', 'mynursery' ),
        'view_item'             => __( 'View footer', 'mynursery' ),
        'all_items'             => __( 'All footers', 'mynursery' ),
        'search_items'          => __( 'Search footers', 'mynursery' ),
        'parent_item_colon'     => __( 'Parent footers:', 'mynursery' ),
        'not_found'             => __( 'No footers found.', 'mynursery' ),
        'not_found_in_trash'    => __( 'No footers found in Trash.', 'mynursery' ),
        'featured_image'        => _x( 'footer Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'archives'              => _x( 'footer archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'mynursery' ),
        'insert_into_item'      => _x( 'Insert into footer', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'mynursery' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this footer', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'mynursery' ),
        'filter_items_list'     => _x( 'Filter footers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'mynursery' ),
        'items_list_navigation' => _x( 'footers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'mynursery' ),
        'items_list'            => _x( 'footers list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'mynursery' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'footer' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-share',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),

    );


    register_post_type( 'footer', $args );
}

add_action( 'init', 'wpdocs_codex_footer_init' );