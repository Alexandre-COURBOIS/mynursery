<?php


namespace inc\service;


class Connexion
{

    public function VerifMail($errors,$mail,$key)
    {

        if (!empty($mail)) {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[$key] = 'Email, où mot de passe non valide';
            }
        } else {
            $errors[$key] = "Veuillez renseigner ces champs";
        }
        return $errors;
    }

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