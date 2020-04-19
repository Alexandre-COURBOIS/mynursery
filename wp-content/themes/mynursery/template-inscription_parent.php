<?php
session_start();

global $wpdb;

/*
Template Name: Inscription_parent
*/

use inc\service\Validation;
use inc\service\Form;

$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

    $sexe = $_POST['sexe'];
    $name = trim(strip_tags(stripslashes($_POST['nom'])));
    $surname = trim(strip_tags(stripslashes($_POST['prenom'])));
    $birthdate = trim(strip_tags(stripslashes($_POST['birthdate'])));
    $email = trim(strip_tags(stripslashes($_POST['email'])));
    $phone = trim(strip_tags(stripslashes($_POST['tel'])));
    $number_way = trim(strip_tags(stripslashes($_POST['num-rue'])));
    $id_way = trim(strip_tags(stripslashes($_POST['id-rue'])));
    $way = trim(strip_tags(stripslashes($_POST['street'])));
    $postal_code = trim(strip_tags(stripslashes($_POST['code-postal'])));
    $city = trim(strip_tags(stripslashes($_POST['city'])));
    $password = trim(strip_tags(stripslashes($_POST['mdp'])));
    $password2 = trim(strip_tags(stripslashes($_POST['conf-mdp'])));
    $latitude = trim(strip_tags(stripslashes($_POST['lattitude'])));
    $longitude = trim(strip_tags(stripslashes($_POST['longitude'])));

    $v = new Validation();
    $errors['sexe'] = $v->radioExist($sexe, 'genre');
    $errors['nom'] = $v->textValid($name, 'nom', 3, 100);
    $errors['prenom'] = $v->textValid($surname, 'prenom', 3, 100);
    $errors['birthdate'] = $v->textValid($birthdate, 'date de naissance', 10, 10);
    $errors['email'] = $v->emailExistAndValid($email,'email','nurs_creche','email','nurs_responsable_legal_enfant');
    $errors['tel'] = $v->isNumeric($phone);
    $errors['tel'] = $v->textValid($phone, 'Numéro de téléphone', 10, 10);
    $errors['num-rue'] = $v->intValid($number_way, 0, 9999);
    $errors['street'] = $v->textValid($way, 'Nom de rue', 4, 200);
    $errors['code-postal'] = $v->textValid($postal_code, 'Code postal', 5, 5);
    $errors['city'] = $v->textValid($city, 'Ville', 1, 70);
    $errors['mdp'] = $v->passwordValid($password, $password2);


    if ($v->IsValid($errors)) {

        $token = token(255);

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);


        /*Attention les %f (floats) prennent en compte le . et non pas la ,*/

        if ($id_way == 'NULL') {

            $wpdb->insert(
                'nurs_responsable_legal_enfant',
                array(
                    'nom' => $name,
                    'prenom' => $surname,
                    'birthdate' => $birthdate,
                    'email' => $email,
                    'telephone' => $phone,
                    'num_rue' => $number_way,
                    'nom_rue' => $way,
                    'codepostal' => $postal_code,
                    'ville' => $city,
                    'sexe' => $sexe,
                    'longitude' => $longitude,
                    'latitude' => $latitude,
                    'password' => $hashPassword,
                    'token' => $token,
                    'created_at' => current_time('mysql'),
                ),
                array(
                    '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%s', '%s', '%f', '%f', '%s', '%s',
                )
            );

            $success = true;

            $to_email = $email;
            $subject = "Bienvenue sur MyNursery";
            $body = "
            Bonjour, ".$surname.' '.$name."
           
            Nous vous souhaitons la bienvenue sur MyNursery,
            
            Vous avez désormais accès à la totalité de nos services.
            
            Bien à vous, 
            
            L'équipe MyNursery";

            $headers = "From : webapsy@gmail.com";

            mail($to_email,$subject,$body,$headers);

            header('Location: connexion');

        } else {

            $wpdb->insert(
                'nurs_responsable_legal_enfant',
                array(
                    'nom' => $name,
                    'prenom' => $surname,
                    'birthdate' => $birthdate,
                    'email' => $email,
                    'telephone' => $phone,
                    'num_rue' => $number_way,
                    'supp_rue' => $id_way,
                    'nom_rue' => $way,
                    'codepostal' => $postal_code,
                    'ville' => $city,
                    'sexe' => $sexe,
                    'longitude' => $longitude,
                    'latitude' => $latitude,
                    'password' => $hashPassword,
                    'token' => $token,
                    'created_at' => current_time('mysql'),
                ),

                array(
                    '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%d', '%s', '%s', '%f', '%f', '%s', '%s',
                )
            );

            $success = true;

            $to_email = $email;
            $subject = "Bienvenue sur MyNursery";
            $body = "
            Bonjour, ".$surname.' '.$name."
           
            Nous vous souhaitons la bienvenue sur MyNursery,
            
            Vous avez désormais accès à la totalité de nos services.
            
            Bien à vous, 
            
            L'équipe MyNursery";

            $headers = "From : webapsy@gmail.com";

            mail($to_email,$subject,$body,$headers);

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
        <h3 class="text-center pt-4">Les informations a rentrer sont celle du responsable légal</h3>
        <div class="form-row">
            <div class="col-md-6 mx-auto mt-3">
                <?= $form->error('sexe'); ?>
                <div class="form-row">
                    <div class="col-md-2 mx-auto mt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="homme" value="monsieur" <?php  if (!empty($_POST['sexe']) && $_POST['sexe'] == 'monsieur') echo "checked";?>>
                            <label class="form-check-label" for="homme">Monsieur</label>
                        </div>
                    </div>
                    <div class="col-md-2 mx-auto mt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="femme" value="madame" <?php  if (!empty($_POST['sexe']) && $_POST['sexe'] == 'madame') echo "checked";?>>
                            <label class="form-check-label" for="femme">Madame</label>
                        </div>
                    </div>
                    <div class="col-md-3 mx-auto mt-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="autre" value="non-genré" <?php  if (!empty($_POST['sexe']) && $_POST['sexe'] == 'non-genré') echo "checked";?>>
                            <label class="form-check-label" for="autre">Non genré</label>
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

                            <input class="form-control" name="birthdate" id="birthdate"
                                   placeholder="Date de naissance : jj/mm/aaaa"
                                   value="<?php if (!empty($_POST['birthdate'])) echo $_POST['birthdate']; ?>">
                            <span class="input-highlight"></span>
                            <?= $form->error('birthdate') ?>
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
                            <input type="search" name="street" class="form-control" id="street"
                                   placeholder="Nom de votre rue"
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

<script>
    $('#birthdate').datepicker({
        uiLibrary: 'bootstrap4',
        calendarWeeks: false,
        format: 'dd/mm/yyyy',
        showOtherMonths: true,
        selectOtherMonths: false,
        showRightIcon: false,
        weekStartDay: 1,
        showWeek: false,
        locale: 'fr-fr',
        modal : true,
    });
</script>
<?php

get_footer();

?>


