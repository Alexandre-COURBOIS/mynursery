<?php
/*
Template Name: edit
*/

global $wpdb;
global $wp_query;

session_start();

use inc\service\Validation;
use inc\service\Form;

$errors = array();

if (!empty($_SESSION)) {
    if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {

$form = new Form($errors);

$id = $_SESSION['login']['id'];

$creches = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}creche WHERE id_creche = %d", $id)
);


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
    $oldpassword = trim(strip_tags(stripslashes($_POST['pwd'])));
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

    if (password_verify($oldpassword, $creches[0]->password)) {

        if (empty($creches[0]->id_rue)) {

            $wpdb->update(
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
                    'modified_at' => current_time('mysql'),
                ),
                array(
                    'id_creche' => $id,
                ),
                array(
                    '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%s', '%d', '%s', '%s', '%d', '%f', '%f'
                ),
                array('%d')
            );

        } else {
            $wpdb->update(
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
                    'modified_at' => current_time('mysql'),
                ),
                array(
                    'id_creche' => $id,
                ),
                array(
                    '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%d', '%s', '%d', '%s', '%s', '%d', '%f', '%f'
                ),
                array('%d')
            );
        }
    } else {
        $errors['oldmdp'] = "Le mot de passe actuel renseigné n'est pas correct";
    }
}


if (!empty($_POST['submitpwd'])) {

    $id = $_SESSION['login']['id'];

    $verifoldpwd = trim(strip_tags(stripslashes($_POST['oldpwd'])));
    $newpwd = trim(strip_tags(stripslashes($_POST['newpwd'])));
    $verifnewpwd = trim(strip_tags(stripslashes($_POST['confnewpwd'])));

    if (password_verify($verifoldpwd, $creches[0]->password)) {

        $v = new Validation();
        $errors['newpwd'] = $v->passwordValid($newpwd, $verifnewpwd);

        $hashPassword = password_hash($newpwd, PASSWORD_BCRYPT);

        $wpdb->update(
            'nurs_creche',
            array(
                'password' => $hashPassword,
                'modified_at' => current_time('mysql'),
            ),
            array(
                'id_creche' => $id,
            ),
            array(
                '%s',
            ),
            array('%d')
        );

    } else {
        $errors['verifoldpwd'] = "Le mot de passe actuel renseigné n'est pas correct";
    }


}

$form = new Form($errors);

get_header();

?>


    <div class="separator"></div>

    <div class="container">
        <form method="post" class="form-style">
            <h2 class="text-center pt-4">Editer vos informations</h2>
            <div class="form-row">
                <div class="col-md-6 mx-auto mt-3">
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise"
                                       placeholder="Nom de votre Etablissement/Entreprise"
                                       value="<?= $creches[0]->nom_creche; ?>">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom"
                                       value="<?= $creches[0]->nom_gerant; ?>">
                                <span class="input-highlight"></span>
                                <?= $form->error('nom') ?>
                            </div>
                        </div>
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom"
                                       value="<?= $creches[0]->prenom_gerant; ?>">
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
                                       value="<?= $creches[0]->email; ?>">

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
                                       value="0<?= $creches[0]->telephone_creche; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('tel') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="<?php if (!empty($creches[0]->supp_rue)) { ?> col-md-3 mx-auto mt-3 <?php } else { ?>col-md-11 mx-auto mt-3 <?php } ?>">
                            <div class="form-group">

                                <input type="text" class="form-control" name="num-rue" id="num-rue"
                                       placeholder="N° de rue"
                                       value="<?= $creches[0]->num_rue ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('num-rue') ?>
                            </div>
                        </div>
                        <?php if (!empty($creches[0]->supp_rue)) { ?>
                            <div class="col-md-6 mx-auto mt-3">
                                <div class="form-group">
                                    <select name="id-rue" id="id-rue" class="form-control">
                                        <option value="<?= $creches[0]->supp_rue ?>">Choisir si existant</option>
                                        <option value="bis">Bis</option>
                                        <option value="ter">Ter</option>
                                        <option value="quater">Quater</option>
                                    </select>
                                    <span class="input-highlight"></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="search" name="street" class="form-control" id="street"
                                       placeholder="Saisir votre adresse à chaque modification"
                                       value="">

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
                                       value="">

                                <span class="input-highlight"></span>
                                <?= $form->error('code-postal') ?>
                            </div>
                        </div>
                        <div class="col-md-7 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="city" id="city"
                                       placeholder="Nom de la ville"
                                       value="">

                                <span class="input-highlight"></span>
                                <?= $form->error('city') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">

                                <input type="text" class="form-control" name="siret" id="siret" placeholder="N° SIRET"
                                       value="<?= $creches[0]->num_siret; ?>">

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
                                       value="<?= $creches[0]->num_secusocial; ?>">


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
                                       value="<?= $creches[0]->num_agrement; ?>">

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
                                       value="<?= $creches[0]->effectif_maxenfant; ?>">

                                <span class="input-highlight"></span>
                                <?= $form->error('max-child') ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3"
                        ">
                        <div class="form-group">

                            <input type="password" class="form-control" name="pwd" id="pwd"
                                   placeholder="Renseignez votre mot de passe pour valider les changements">

                            <span class="input-highlight"></span>
                            <?= $form->error('oldmdp') ?>

                        </div>
                    </div>
                </div>

            </div>
    </div>
    <div class="col-md-5 mx-auto mt-5">
        <input type="text" id="longitude" name="longitude" hidden>
        <input type="text" id="lattitude" name="lattitude" hidden>

        <div id="modifPwd" class="btn btn-lg btn-block btn-success">Modifier votre mot de passe</div>

        <input type="submit" name="submitted" class="btn btn-lg btn-block btn-success">
    </div>
    </form>
    </div>


    <div id="addclass" class="container" style="display: none">

        <form action="" class="form-style" method="post">
            <div class="form-row">
                <div class="col-md-6 mx-auto mt-3">
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3"
                        ">
                        <div class="form-group">
                            <input type="password" class="form-control" name="oldpwd" id="oldpwd"
                                   placeholder="Renseignez votre ancien mot de passe">
                            <span class="input-highlight"></span>
                            <?= $form->error('verifoldpwd') ?>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-11 mx-auto mt-3"
                    ">
                    <div class="form-group">
                        <input type="password" class="form-control" name="newpwd" id="newpwd"
                               placeholder="Renseignez votre nouveau mot de passe">
                        <span class="input-highlight"></span>
                        <?= $form->error('newpwd') ?>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-11 mx-auto mt-3"
                ">
                <div class="form-group">
                    <input type="password" class="form-control" name="confnewpwd" id="confnewpwd"
                           placeholder="Confirmez votre nouveau mot de passe">
                    <span class="input-highlight"></span>
                    <?= $form->error('newpwd') ?>
                </div>
            </div>
    </div>
    <div class="col-md-5 mx-auto mt-5">
        <input type="submit" name="submitpwd" class="btn btn-lg btn-block btn-success">
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>

    <div class="clear"></div>

    <div class="separator"></div>

<?php
get_footer();

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