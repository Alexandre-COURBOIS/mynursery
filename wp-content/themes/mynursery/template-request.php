<?php
/*
Template Name: Request
*/

global $pdo;

$sql = "SELECT * FROM nurs_creche";
$query = $pdo->prepare($sql);
$query->execute();
print_r($query->fetchAll());
