<?php

/**
 * Register a custom post type called "Specialization".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_Specialization_init()
{
    $labels = array(
        'name' => _x('Specializations', 'Post type general name', 'wonder'),
        'singular_name' => _x('Specialization', 'Post type singular name', 'wonder'),
        'menu_name' => _x('Specializations', 'Admin Menu text', 'wonder'),
        'name_admin_bar' => _x('Specialization', 'Add New on Toolbar', 'wonder'),
        'add_new' => __('Add New', 'wonder'),
        'add_new_item' => __('Add New Specialization', 'wonder'),
        'new_item' => __('New Specialization', 'wonder'),
        'edit_item' => __('Edit Specialization', 'wonder'),
        'view_item' => __('View Specialization', 'wonder'),
        'all_items' => __('All Specializations', 'wonder'),
        'search_items' => __('Search Specializations', 'wonder'),
        'parent_item_colon' => __('Parent Specializations:', 'wonder'),
        'not_found' => __('No Specializations found.', 'wonder'),
        'not_found_in_trash' => __('No Specializations found in Trash.', 'wonder'),
        'featured_image' => _x('Specialization Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wonder'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wonder'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wonder'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wonder'),
        'archives' => _x('Specialization archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wonder'),
        'insert_into_item' => _x('Insert into Specialization', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wonder'),
        'uploaded_to_this_item' => _x('Uploaded to this Specialization', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wonder'),
        'filter_items_list' => _x('Filter Specializations list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wonder'),
        'items_list_navigation' => _x('Specializations list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wonder'),
        'items_list' => _x('Specializations list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wonder'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Specialization'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('Specialization', $args);
}

add_action('init', 'wpdocs_codex_Specialization_init');