<?php
/*
Template Name: delete
*/
global $wpdb;
global $wp_query;

session_start();


if (empty($_SESSION)) {

    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();

} else {

    $idc = $_SESSION['login']['id'];

    $employes = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM {$wpdb->prefix}employee_creche WHERE id_creche = %d", $idc)
    );

    if (!empty($employes)) {

        if (!empty($_GET['id']) & is_numeric($_GET['id'])) {

            $id = $_GET['id'];

            $wpdb->delete('nurs_employee_creche', array('id_employee' => $id), array('%d'));

            header('Location: home/profil');

        }
    }
}

