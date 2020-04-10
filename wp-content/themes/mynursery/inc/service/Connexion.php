<?php


namespace inc\service;


class Connexion
{

    public function InitializeSession($user,$header)
    {
        $_SESSION['login'] = array(
            'user' => 'pro',
            'id' => $user->id_creche,
            'nom_creche' => $user->nom_creche,
            'prenom' => $user->prenom_gerant,
            'nom' => $user->nom_gerant,
            'ip' => $_SERVER['REMOTE_ADDR'],
        );

        header('Location: '.$header);
    }

    public function InitializeSessionParent($user,$header)
    {
        $_SESSION['login'] = array(
            'user' => 'particulier',
            'id' => $user->idresponsable_legale,
            'nom' => $user->nom,
            'prenom' => $user->prenom,
            'sexe' => $user->sexe,
            'birthdate' => $user->birthdate,
            'email' => $user->email,
            'telephone' => $user->telephone,
            'num_rue' => $user->num_rue,
            'supp_rue'=> $user->supp_rue,
            'nom_rue'=>$user->nom_rue,
            'codepostal'=>$user->codepostal,
            'ville'=>$user->ville,
            'ip' => $_SERVER['REMOTE_ADDR'],
        );

        header('Location: '.$header);
    }
    

}