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

    function is_logged()
    {
        $roles = array('user','recruter','admin');
        if (!empty($_SESSION['login'])) {
            if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {
                if (!empty($_SESSION['login']['nom'])) {
                    if (in_array($_SESSION['login']['role'], $roles)) {
                        if (!empty($_SESSION['login']['ip'])) {
                            if (!empty($_SESSION['login']['ip']) == $_SERVER['REMOTE_ADDR']) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    function is_user()
    {
        if (is_logged()) {
            if ($_SESSION['login']['role'] == 'user') {
                return true;
            }
        }
        return false;
    }

    function is_recruter()
    {
        if (is_logged()) {
            if ($_SESSION['login']['role'] == 'recruter') {
                return true;
            }
        }
        return false;
    }

}