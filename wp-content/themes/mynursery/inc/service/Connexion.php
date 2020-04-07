<?php


namespace inc\service;


class Connexion
{

    public function InitializeSession($user,$header)
    {
        $_SESSION['login'] = array(
            'id' => $user->id_creche,
            'nom_creche' => $user->nom_creche,
            'prenom' => $user->prenom_gerant,
            'nom' => $user->nom_gerant,
            'ip' => $_SERVER['REMOTE_ADDR'],
        );

        header('Location: '.$header);
    }
    

}