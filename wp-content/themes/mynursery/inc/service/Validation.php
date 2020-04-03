<?php


namespace inc\service;


class Validation
{
    protected $errors = array();

    public function IsValid($errors)
    {
        foreach ($errors as $key => $value) {
            if(!empty($value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * emailValid
     * @param email $email
     * @return string $error
     */

    public function emailValid($email)
    {
        $error = '';
        if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
            $error = 'Adresse email invalide.';
        }
        return $error;
    }

    /**
     * textValid
     * @param POST $text string
     * @param title $title string
     * @param min $min int
     * @param max $max int
     * @param empty $empty bool
     * @return string $error
     */

    public function textValid($text, $title, $min = 3,  $max = 50, $empty = true)
    {

        $error = '';
        if(!empty($text)) {
            $strtext = strlen($text);
            if($strtext > $max) {
                $error = 'Votre ' . $title . ' est trop long.';
            } elseif($strtext < $min) {
                $error = 'Votre ' . $title . ' est trop court.';
            }
        } else {
            if($empty) {
                $error = 'Veuillez renseigner un ' . $title . '.';
            }
        }
        return $error;

    }

    public function isNumeric( $value)
{
    $error = '';
    if(is_numeric($value) === false)
    {
        $error= 'Champ invalide';
    }
    return $error;
}

    public function intValid($int, $min, $max)
    {
        $error = '';
        if(empty($int) || filter_var($int, FILTER_VALIDATE_INT) === false) {
            $error = 'Veuillez renseigner un entier valide';
        } elseif ($int < $min) {
            $error = 'Champ invalide (minimum ' . $min . ')';
        } elseif ($int > $max) {
            $error = 'Champ invalide (maximum ' . $max . ')';
        }
        return $error;
    }
    public function passwordValid($password1, $password2)
    {
        $error = '';
        if (!empty($password1)) {
            if ($password1 != $password2) {
                $error = 'Les deux mot de passe doivent être identiques';
            } elseif (mb_strlen($password1) <= 5) {
                $error = 'min 6  caractères';
            }
        } else {
            $error = 'Veuillez renseigner un mot de passe';
        }
        return $error;
    }
    public function radioExist($name, $nomRadio)
    {
        $error = '';
        if(empty($name))
        {
            $error= 'Veuillez séléctionner un ' . $nomRadio . '.';
        }
        return $error;
    }
}