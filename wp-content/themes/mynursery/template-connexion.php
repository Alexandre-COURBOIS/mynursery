<?php
/*
Template Name: Connexion
*/
global $wpdb;

session_start();

use inc\service\Connexion;

$session = new Connexion();

$errors = array();

if (!empty($_POST['submitted'])) {

    $login = trim(strip_tags(stripslashes($_POST['login'])));
    $password = trim(strip_tags(stripslashes($_POST['password'])));

    $errors = $session->VerifMail($errors, $login, 'login');

    if (count($errors) === 0) {

        $user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}creche WHERE email = '%s'", $login);

        print_r($user);

        if (!empty($user)) {

            if (password_verify($password, $user['password'])) {

                $session->InitializeSession($user, 'home');

            } else {
                return $errors = 'Email, où mot de passe non valide';
            }
        } else {
            return $errors = "Email, où mot de passe non valide";
        }
    }
}
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
                </div>

            </form>

            <div class="clear"></div>

        </div>

        <div class="separator-connexion"></div>
    </div>
<?php
get_footer();
