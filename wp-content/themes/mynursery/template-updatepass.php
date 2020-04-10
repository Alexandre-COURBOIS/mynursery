<?php
/*
Template Name: getupdate
*/

global $wpdb;
global $wp_query;

session_start();

use inc\service\Validation;
use inc\service\Form;


$errors = array();


$verif = new Validation();

if (!empty($_GET['email']) && !empty($_GET['token'])) {

    $token_url = urldecode($_GET['token']);
    $email_url = urldecode($_GET['email']);

    $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}responsable_legal_enfant WHERE token = '%s'", $token_url));

    if (!empty($user)) {

        if ($user->token === $token_url && $user->email === $email_url) {

            if (!empty($_POST['submitted'])) {

                $password = trim(strip_tags(stripslashes($_POST['pwd'])));
                $password1 = trim(strip_tags(stripslashes($_POST['pwdverif'])));

                $errors['mdp'] = $verif->passwordValid($password, $password1);

                if ($verif->IsValid($errors)) {

                    $hashpassword = password_hash($password, PASSWORD_BCRYPT);
                    $token = token(255);

                    $verify = token(40);


                    $wpdb->update(
                        'nurs_responsable_legal_enfant',
                        array(
                            'password' => $hashpassword,
                            'token' => $token,
                            'modified_at' => current_time('mysql'),
                        ),
                        array(
                            'token' => $token_url,
                        ),
                        array(
                            '%s', '%s'
                        ),
                        array('%s')
                    );

                    header('Location: ' . add_query_arg('key', $verify, home_url() . '/success'));

                }
            }


            get_header();

            $form = new Form($errors);
            ?>


            <div class="separator-connexion"></div>

            <div class="container">

                <form action="" method="post" class="form-style">

                    <h2 class="text-center pt-4">Veuillez saisir votre nouveau mot de passe</h2>

                    <div class="form-row">
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" id="pwd"
                                       placeholder="Mot de passe">
                                <span class="input-highlight">
                            </div>
                            <?= $form->error('mdp'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwdverif" id="pwdverif"
                                       placeholder="Valider votre mot de passe">
                                <span class="input-highlight">
                            </div>
                            <?= $form->error('mdp'); ?>
                        </div>
                    </div>

                    <div class="col-md-5 mx-auto mt-5">

                        <input type="submit" name="submitted" class="btn btn-lg btn-success btn-block">

                    </div>

            </div>

            </form>

            <div class="clear"></div>

            </div>

            <div class="separator-connexion"></div>


            <?php get_footer();

        } else {
            $wp_query->set_404();
            status_header(404);
            get_template_part(404);
            exit();
        }
    } else {
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit();
    }
} else {
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
}
