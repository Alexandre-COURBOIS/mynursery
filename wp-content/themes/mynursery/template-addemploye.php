<?php
/*
Template Name: AddEmploye
*/
global $wpdb;
global $wp_query;
session_start();

use inc\service\Validation;
use inc\service\Form;

$errors = array();
$success = false;

if (!empty($_SESSION)) {
    if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {

if (!empty($_POST['submitted'])) {

    $id = ($_SESSION['login']['id']);

    $name = trim(strip_tags(stripslashes($_POST['nom'])));
    $surname = trim(strip_tags(stripslashes($_POST['prenom'])));
    $phone = trim(strip_tags(stripslashes($_POST['telephone'])));


    $v = new Validation();
    $errors['nom'] = $v->textValid($name, 'nom', 3, 100);
    $errors['prenom'] = $v->textValid($surname, 'prenom', 3, 100);
    $errors['telephone'] = $v->isNumeric($phone);
    $errors['telephone'] = $v->textValid($phone, 'Numéro de téléphone', 10, 10);


    if ($v->IsValid($errors)) {

            $wpdb->insert(
                'nurs_employee_creche',
                array(
                    'id_creche' => $id,
                    'nom_employee' => $name,
                    'prenom_employee' => $surname,
                    'telephone_employee' => $phone,
                    'created_at' => current_time('mysql'),
                ),
                array(
                    '%d','%s', '%s', '%s',
                )
            );
            $success = true;

            header('Location: profil');
        }
}

$form = new Form($errors);

get_header();



?>


    <div class="container">
        <form action="" method="post" class="form-style">
            <h2 class="text-center pt-4">Ajouter un nouvel employé</h2>
            <div class="form-row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de l'employé"
                        value="<?php if (!empty($_POST['nom'])) echo $_POST['nom']; ?>">
                        <span class="input-highlight"></span>
                    </div>
                    <?= $form->error('nom') ?>

                    <div class="form-group">
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom de l'employé"
                        value="<?php if (!empty($_POST['prenom'])) echo $_POST['prenom']; ?>">
                        <span class="input-highlight"></span>
                    </div>
                    <?= $form->error('prenom') ?>

                    <div class="form-group mb-5">
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="N° de téléphone"
                            <?php if (!empty($_POST['telephone'])) echo $_POST['telephone']; ?>>
                        <span class="input-highlight"></span>
                    </div>
                    <?= $form->error('telephone') ?>

<!--                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Télécharger le certificat</label>
                    </div>-->

                </div>

            </div>
            <div class="col-md-5 mx-auto mt-5 mb-5">
                <input type="submit" name="submitted" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

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

