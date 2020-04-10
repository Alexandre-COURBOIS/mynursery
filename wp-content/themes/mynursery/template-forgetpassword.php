<?php
/*
Template Name: oublie
*/

global $wpdb;

session_start();

use inc\service\Validation;
use inc\service\Form;


$errors = array();


if (!empty($_POST['submitted'])) {

    $email = trim(strip_tags(stripslashes($_POST['email'])));

    $verif = new Validation();

    $errors['mail'] = $verif->emailValid($email);

    if ($verif->IsValid($errors)) {

        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}creche WHERE email = '%s'", $email));
        $userParent = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}responsable_legal_enfant WHERE email = '%s'", $email));


        if (!empty($user || !empty($userParent))) {

            if ($email === $user->email) {

                $to_email = $email;
                $subject = "Réinitialisation de mot de passe";
                $body = "

                Bonjour, 
                
                Pour réinitialiser votre mot de passe cliquer sur le lien suivant : 
                
                " . add_query_arg(array(
                        'token' => urlencode($user->token),
                        'email' => urlencode($user->email),
                    ), 'http://localhost/mynursery/update') . " 
                         
                Bien à vous,
                
                L'equipe MyNursery
                ";

                $headers = "From : webapsy@gmail.com";

                mail($to_email, $subject, $body, $headers);

                header('Location: home');

            } elseif ($email == $userParent->email) {

                $to_email = $email;
                $subject = "Réinitialisation de mot de passe";
                $body = "

                Bonjour, 
                
                Pour réinitialiser votre mot de passe cliquer sur le lien suivant : 
                
                " . add_query_arg(array(
                        'token' => urlencode($userParent->token),
                        'email' => urlencode($userParent->email),
                    ), 'http://localhost/mynursery/getupdate') . " 
                         
                Bien à vous,
                
                L'equipe MyNursery
                ";

                $headers = "From : webapsy@gmail.com";

                mail($to_email, $subject, $body, $headers);

                header('Location: home');

            } else {
                $errors['mail'] = "Cette adresse n'existe pas";
            }
        } else {
            $errors['mail'] = "Cette adresse n'existe pas";
        }
    } else {
        $errors['mail'] = "Cette adresse n'existe pas";
    }
}


$form = new Form($errors);

get_header(); ?>


    <div class="separator-connexion"></div>

    <div class="container">

        <form action="" method="post" class="form-style">

            <h2 class="text-center pt-4">Récupération de mot de passe</h2>

            <div class="form-row">
                <div class="col-md-5 mx-auto mt-3">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="Votre adresse mail : exemple@mail.fr">
                        <span class="input-highlight"></span>
                        <?= $form->error('mail') ?>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mx-auto mt-5">

                <input data-toggle="modal" data-target="#exampleModal" type="submit" name="submitted"
                       class="btn btn-lg btn-success btn-block">

            </div>

    </div>

    </form>

    <div class="clear"></div>

    </div>

    <div class="separator-connexion"></div>


<?php get_footer();