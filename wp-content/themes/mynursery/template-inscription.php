<?php
session_start();

global $wpdb;

/*
Template Name: Inscription
*/

use inc\service\Validation;
use inc\service\Form;

$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

    $name_enterprise = trim(strip_tags(stripslashes($_POST['nom_entreprise'])));
    $name = trim(strip_tags(stripslashes($_POST['nom'])));
    $surname = trim(strip_tags(stripslashes($_POST['prenom'])));
    $email = trim(strip_tags(stripslashes($_POST['email'])));
    $phone = trim(strip_tags(stripslashes($_POST['tel'])));
    $number_way = trim(strip_tags(stripslashes($_POST['num-rue'])));
    $id_way = trim(strip_tags(stripslashes($_POST['id-rue'])));
    $way = trim(strip_tags(stripslashes($_POST['street'])));
    $postal_code = trim(strip_tags(stripslashes($_POST['code-postal'])));
    $city = trim(strip_tags(stripslashes($_POST['city'])));
    $siret = trim(strip_tags(stripslashes($_POST['siret'])));
    $social_secu = trim(strip_tags(stripslashes($_POST['secu'])));
    $child_max = trim(strip_tags(stripslashes($_POST['max-child'])));
    $agrement = trim(strip_tags(stripslashes($_POST['agrement'])));
    $password = trim(strip_tags(stripslashes($_POST['mdp'])));
    $password2 = trim(strip_tags(stripslashes($_POST['conf-mdp'])));
    $latitude = trim(strip_tags(stripslashes($_POST['lattitude'])));
    $longitude = trim(strip_tags(stripslashes($_POST['longitude'])));

    $v = new Validation();
    $errors['nom_entreprise'] = $v->textValid($name_enterprise, 'nom de l\'entreprise', 3, 100);
    $errors['nom'] = $v->textValid($name, 'nom', 3, 100);
    $errors['prenom'] = $v->textValid($surname, 'prenom', 3, 100);
    $errors['email'] = $v->emailValid($email);
    $errors['tel'] = $v->isNumeric($phone);
    $errors['tel'] = $v->textValid($phone, 'Numéro de téléphone', 10, 10);
    $errors['num-rue'] = $v->intValid($number_way, 0, 9999);
    $errors['street'] = $v->textValid($way, 'Nom de rue', 4, 200);
    $errors['code-postal'] = $v->textValid($postal_code, 'Code postal', 5, 5);
    $errors['city'] = $v->textValid($city, 'Ville', 4, 70);
    $errors['siret'] = $v->textValid($siret, 'N° de siret', 14, 14);
    $errors['secu'] = $v->textValid($social_secu, 'N° de sécu', 13, 13);
    $errors['agrement'] = $v->textValid($agrement, 'N° d\'agrement', 3, 13);
    $errors['max-child'] = $v->intValid($child_max, 1, 10);
    $errors['mdp'] = $v->passwordValid($password, $password2);



    if ($v->IsValid($errors)) {

        $token = token(255);

        $hashPassword = password_hash($password,PASSWORD_BCRYPT);


        /*Attention les %f (floats) prennent en compte le . et non pas la ,*/

        if ($id_way == 'NULL') {

            $wpdb->insert(
                'nurs_creche',
                array(
                    'nom_creche' => $name_enterprise,
                    'nom_gerant' => $name,
                    'prenom_gerant' => $surname,
                    'email' => $email,
                    'telephone_creche' => $phone,
                    'num_rue' => $number_way,
                    'nom_rue' => $way,
                    'codepostal' => $postal_code,
                    'ville' => $city,
                    'num_siret' => $siret,
                    'num_agrement' => $agrement,
                    'num_secusocial' => $social_secu,
                    'effectif_maxenfant' => $child_max,
                    'longitude' => $longitude,
                    'latitude' => $latitude,
                    'password' => $hashPassword,
                    'token' => $token,
                    'created_at' => current_time('mysql'),
                ),
                array(
                    '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%s', '%d', '%s', '%s', '%d', '%f', '%f', '%s', '%s',
                )
            );
            $success = true;
            header('Location: home');

        } else {

            $wpdb->insert(
                'nurs_creche',
                array(
                    'nom_creche' => $name_enterprise,
                    'nom_gerant' => $name,
                    'prenom_gerant' => $surname,
                    'email' => $email,
                    'telephone_creche' => $phone,
                    'num_rue' => $number_way,
                    'supp_rue' => $id_way,
                    'nom_rue' => $way,
                    'codepostal' => $postal_code,
                    'ville' => $city,
                    'num_siret' => $siret,
                    'num_agrement' => $agrement,
                    'num_secusocial' => $social_secu,
                    'effectif_maxenfant' => $child_max,
                    'longitude' => $longitude,
                    'latitude' => $latitude,
                    'password' => $hashPassword,
                    'token' => $token,
                    'created_at' => current_time('mysql'),
                ),

                array(
                    '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%d', '%s', '%d', '%s', '%s', '%d', '%f', '%f', '%s', '%s',
                )
            );
            $success = true;
            header('Location: connexion');
        }
    }
}

$form = new Form($errors);

get_header();
?>

    <div class="separator"></div>

    <div class="container">
        <form method="post" class="form-style">
            <h2 class="text-center pt-4">Inscription</h2>
            <h3 class="text-center pt-4">Les informations a rentrer sont celle de votre établissement</h3>
            <div class="form-row">
                <div class="col-md-6 mx-auto mt-3">
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise"
                                       placeholder="Nom de votre Etablissement/Entreprise" value="<?php if (!empty($_POST['nom_entreprise'])) echo $_POST['nom_entreprise']; ?>">
                                <span class="input-highlight"></span>
                                <?= $form->error('nom_entreprise') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom"
                                       value="<?php if (!empty($_POST['nom'])) echo $_POST['nom']; ?>">
                                <span class="input-highlight"></span>
                                <?= $form->error('nom') ?>
                            </div>
                        </div>
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom"
                                       value="<?php if (!empty($_POST['prenom'])) echo $_POST['prenom']; ?>">
                                <span class="input-highlight"></span>
                                <?= $form->error('prenom') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Email : exemple@mail.fr"
                                       value="<?php if (!empty($_POST['email'])) echo $_POST['email']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="tel" id="tel"
                                       placeholder="Tel: 02 11 22 33 44"
                                       value="<?php if (!empty($_POST['tel'])) echo $_POST['tel']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('tel') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="num-rue" id="num-rue"
                                       placeholder="N° de rue"
                                       value="<?php if (!empty($_POST['num-rue'])) echo $_POST['num-rue']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('num-rue') ?>
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="form-group">
                                <select name="id-rue" id="id-rue" class="form-control">
                                    <option value="NULL">Supplément de numéro</option>
                                    <option value="bis">Bis</option>
                                    <option value="ter">Ter</option>
                                    <option value="quater">Quater</option>
                                </select>
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="search" name="street" class="form-control" id="street" placeholder="Nom de votre rue"
                                value="<?php if (!empty($_POST['street'])) echo $_POST['street']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('street') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="code-postal" id="code-postal"
                                       placeholder="Code postal"
                                       value="<?php if (!empty($_POST['code-postal'])) echo $_POST['code-postal']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('code-postal') ?>
                            </div>
                        </div>
                        <div class="col-md-7 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="city" id="city"
                                       placeholder="Nom de la ville"
                                       value="<?php if (!empty($_POST['city'])) echo $_POST['city']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('city') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="siret" id="siret" placeholder="N° SIRET"
                                       value="<?php if (!empty($_POST['siret'])) echo $_POST['siret']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('siret') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="secu" id="secu"
                                       placeholder="N° sécurité social"
                                       value="<?php if (!empty($_POST['secu'])) echo $_POST['secu']; ?>">


                                <span class="input-highlight"></span>
                                <?= $form->error('secu') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="agrement" id="agrement"
                                       placeholder="N° d'agrément"
                                       value="<?php if (!empty($_POST['agrement'])) echo $_POST['agrement']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('agrement') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="max-child" id="max-child"
                                       placeholder="Effectif d'enfant maximum"
                                       value="<?php if (!empty($_POST['max-child'])) echo $_POST['max-child']; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('max-child') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="password" class="form-control" name="mdp" id="mdp"
                                       placeholder="Votre mot de passe">
                                <span class="input-highlight"></span>
                                <?= $form->error('mdp') ?>
                            </div>
                        </div>
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="password" class="form-control" name="conf-mdp" id="conf-mdp"
                                       placeholder="Confirmation mot de passe">
                                <span class="input-highlight"></span>
                                <?= $form->error('mdp') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-auto mt-5">
                <input type="text" id="longitude" name="longitude" hidden>
                <input type="text" id="lattitude" name="lattitude" hidden>
                <input type="submit" name="submitted" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

    <div class="clear"></div>

    <div class="separator"></div>

<?php

get_footer();

?>


