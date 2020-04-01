<?php
/*
Template Name: Request
*/


global $wpdb;

$users = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}creche",ARRAY_A);
echo json_encode($users);
