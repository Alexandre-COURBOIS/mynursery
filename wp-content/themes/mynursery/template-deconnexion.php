<?php
/*
Template Name: Deconnexion
*/

session_start();

$_SESSION = array();

session_destroy();

header('Location: home');
