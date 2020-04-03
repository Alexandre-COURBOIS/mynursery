<?php
/*
Template Name: delete
*/
global $wpdb;

session_start();

if (!empty($_GET['id']) & is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $wpdb->delete('nurs_employee_creche', array('id_employee' => $id), array('%d'));

    header('Location: home/profil');
}
