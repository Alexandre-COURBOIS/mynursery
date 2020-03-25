<?php
/**
 * Register a custom post type called "aboutus".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_aboutus_init() {
    $labels = array(
        'name'                  => _x( 'aboutuss', 'Post type general name', 'mynursery' ),
        'singular_name'         => _x( 'aboutus', 'Post type singular name', 'mynursery' ),
        'menu_name'             => _x( 'AboutUs', 'Admin Menu text', 'mynursery' ),
        'name_admin_bar'        => _x( 'aboutus', 'Add New on Toolbar', 'mynursery' ),
        'add_new'               => __( 'Add New', 'mynursery' ),
        'add_new_item'          => __( 'Add New aboutus', 'mynursery' ),
        'new_item'              => __( 'New aboutus', 'mynursery' ),
        'edit_item'             => __( 'Edit aboutus', 'mynursery' ),
        'view_item'             => __( 'View aboutus', 'mynursery' ),
        'all_items'             => __( 'All aboutuss', 'mynursery' ),
        'search_items'          => __( 'Search aboutuss', 'mynursery' ),
        'parent_item_colon'     => __( 'Parent aboutuss:', 'mynursery' ),
        'not_found'             => __( 'No aboutuss found.', 'mynursery' ),
        'not_found_in_trash'    => __( 'No aboutuss found in Trash.', 'mynursery' ),
        'featured_image'        => _x( 'aboutus Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'mynursery' ),
        'archives'              => _x( 'aboutus archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'mynursery' ),
        'insert_into_item'      => _x( 'Insert into aboutus', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'mynursery' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this aboutus', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'mynursery' ),
        'filter_items_list'     => _x( 'Filter aboutuss list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'mynursery' ),
        'items_list_navigation' => _x( 'aboutuss list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'mynursery' ),
        'items_list'            => _x( 'aboutuss list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'mynursery' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'aboutus' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-editor-paste-word',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),

    );


    register_post_type( 'aboutus', $args );
}

add_action( 'init', 'wpdocs_codex_aboutus_init' );