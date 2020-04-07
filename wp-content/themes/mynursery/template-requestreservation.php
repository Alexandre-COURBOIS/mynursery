<?php
/*
Template Name: RequestReservation
*/
session_start();

global $wpdb;

if(!empty($_SESSION) && !empty($_SESSION['login']['nom_creche'])) {
    $reservations = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}reservation INNER JOIN {$wpdb->prefix}enfant ON {$wpdb->prefix}reservation.id_enfant = {$wpdb->prefix}enfant.id_enfant");

    echo json_encode($reservations);
} else {
    die('404');
}


