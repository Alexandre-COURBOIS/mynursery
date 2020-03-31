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

    public function getUserConnexion($login)
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table WHERE email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    public function InitializeSession($user,$header)
    {
        $_SESSION['login'] = array(
            'id' => $user['id'],
            'nom' => $user['surname'],
            'prenom' => $user['name'],
            'role' => $user['role'],
            'ip' => $_SERVER['REMOTE_ADDR'],
        );

        header('Location: '.$header);
    }



}