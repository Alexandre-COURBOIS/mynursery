<?php
/*
Template Name: Request
*/

global $wpdb;

$creches = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}creche");
echo json_encode($creches);
