<?php
/*
Template Name: Connexion
*/
session_start();
global $wpdb;



use inc\service\Validation;
use inc\service\Form;
use inc\service\Connexion;

$errors = array();

if (!empty($_POST['submitted'])) {

    $login = trim(strip_tags(stripslashes($_POST['login'])));
    $password = trim(strip_tags(stripslashes($_POST['password'])));

    $verif = new Validation();
    $session = new Connexion();

    $errors['mail'] = $verif->emailValid($login);


    if ($verif->IsValid($errors)) {

        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}creche WHERE email = '%s'", $login));

        $userParent = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}responsable_legal_enfant WHERE email = '%s'", $login));


        if (!empty($user)) {

            if (password_verify($password, $user->password)) {
                $session->InitializeSession($user, 'home');
            } else {
                return $errors = 'Email, où mot de passe non valide';
            }
        } else if (!empty($userParent)) {
            if (password_verify($password, $userParent->password)) {
                $session->InitializeSessionParent($userParent, 'http://localhost/mynurserymvc/public/profil');
            } else {
                return $errors = 'Email, où mot de passe non valide';
            }
        } else {
            return $errors = "Email, où mot de passe non valide";
        }
    }
}

$form = new Form($errors);

get_header();
?>
    <div class="hidden">
        <div class="separator-connexion"></div>

        <div class="container">

            <form action="" method="post" class="form-style">

                <h2 class="text-center pt-4">Connexion</h2>
                <div class="form-row">
                    <div class="col-md-5 mx-auto mt-3">
                        <div class="form-group">
                            <input type="email" class="form-control" name="login" id="login"
                                   placeholder="Votre adresse mail : exemple@mail.fr">
                            <span class="input-highlight"></span>
                            <?= $form->error('mail') ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Votre mot de passe">
                            <span class="input-highlight"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mx-auto mt-5">
                    <input type="submit" name="submitted" class="btn btn-lg btn-success btn-block">
                    <div class="form-group text-center">
                        <a href="oublie" >Mot de passe oublié</a>
                    </div>
                </div>

            </form>

            <div class="clear"></div>

        </div>

        <div class="separator-connexion"></div>
    </div>
<?php
get_footer();
