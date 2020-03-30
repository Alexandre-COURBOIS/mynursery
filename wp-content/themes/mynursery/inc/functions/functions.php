<?php

function token($length) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function debug($array,$true = true) {

    if ($true = true)   {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    } elseif ($true = false) {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
    }
}