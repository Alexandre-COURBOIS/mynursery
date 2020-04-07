<?php
/*
Template Name: RequestReservation
*/
session_start();

global $wpdb;
//print_r($_SESSION);
//if(empty($_SESSION)) {
   // $id = $_SESSION['login']['id'];
    $reservations = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}reservation INNER JOIN {$wpdb->prefix}enfant ON {$wpdb->prefix}reservation.id_enfant = {$wpdb->prefix}enfant.id_enfant");

    echo json_encode($reservations);
//} else {
//    //die('404');
//}


