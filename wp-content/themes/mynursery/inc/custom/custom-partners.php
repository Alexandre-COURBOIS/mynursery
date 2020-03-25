<?php

/**
 * Register a custom post type called "Partner".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_Partner_init()
{
    $labels = array(
        'name' => _x('Partners', 'Post type general name', 'wonder'),
        'singular_name' => _x('Partner', 'Post type singular name', 'wonder'),
        'menu_name' => _x('Partners', 'Admin Menu text', 'wonder'),
        'name_admin_bar' => _x('Partner', 'Add New on Toolbar', 'wonder'),
        'add_new' => __('Add New', 'wonder'),
        'add_new_item' => __('Add New Partner', 'wonder'),
        'new_item' => __('New Partner', 'wonder'),
        'edit_item' => __('Edit Partner', 'wonder'),
        'view_item' => __('View Partner', 'wonder'),
        'all_items' => __('All Partners', 'wonder'),
        'search_items' => __('Search Partners', 'wonder'),
        'parent_item_colon' => __('Parent Partners:', 'wonder'),
        'not_found' => __('No Partners found.', 'wonder'),
        'not_found_in_trash' => __('No Partners found in Trash.', 'wonder'),
        'featured_image' => _x('Partner Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wonder'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wonder'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wonder'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wonder'),
        'archives' => _x('Partner archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wonder'),
        'insert_into_item' => _x('Insert into Partner', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wonder'),
        'uploaded_to_this_item' => _x('Uploaded to this Partner', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wonder'),
        'filter_items_list' => _x('Filter Partners list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wonder'),
        'items_list_navigation' => _x('Partners list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wonder'),
        'items_list' => _x('Partners list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wonder'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Partner'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail'),
    );

    register_post_type('Partner', $args);
}

add_action('init', 'wpdocs_codex_Partner_init');