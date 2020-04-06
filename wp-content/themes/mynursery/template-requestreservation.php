<?php
/*
Template Name: RequestReservation
*/

global $wpdb;

$reservations = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}reservation INNER JOIN {$wpdb->prefix}enfant ON {$wpdb->prefix}reservation.id_enfant = {$wpdb->prefix}enfant.id_enfant INNER JOIN {$wpdb->prefix}enfant ON {$wpdb->prefix}reservation.id_enfant = {$wpdb->prefix}enfant.id_enfant");
echo '<pre>';
print_r($reservations);
echo '</pre>';
echo json_encode($reservations);


