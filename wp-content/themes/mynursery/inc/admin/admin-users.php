<?php
/**
 * Register a custom menu page.
 */

use inc\service\Validation;
use inc\service\Form;



function wpdocs_register_my_custom_menu_page_users(){

    add_menu_page(__( 'Users', 'mynursery' ),
        'Admin Utilisateurs',
        'manage_options',
        'userspageadmin',
        'users_menu_page',
        'dashicons-buddicons-buddypress-logo',
        71);
}

add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page_users' );


/* Display a custom menu page*/

function users_menu_page()
{
    $urlBase = admin_url().'admin.php?page=userspageadmin';
    ?>
    <ul>
        <li><a class="button" href="<?= $urlBase; ?>">Listing</a></li>
    </ul>
    <?php
    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        users_admin_single($id,$urlBase);
    } elseif(!empty($_GET['edit']) && is_numeric($_GET['edit'])) {
        $id = $_GET['edit'];
        users_admin_edit($id, $urlBase);
    } else {
        users_admin_listing($urlBase);
    }
}


function users_admin_listing($urlBase)
{
    global $wpdb;
    $users = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}creche ORDER BY created_at DESC", OBJECT );

    ?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>id</th>
                <th>Nom Crèche</th>
                <th>Nom Gérant</th>
                <th>Prénom Gérant</th>
                <th>Ville</th>
                <th>Date d'inscription</th>
                <th>Plus d'info</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($users as $user) { ?>
            <table class="wp-list-table widefat fixed striped posts">
                <thead>
                <tr>
                    <td><?= $user->id_creche; ?></td>
                    <td><?= $user->nom_creche; ?></td>
                    <td><?= $user->nom_gerant; ?></td>
                    <td><?= $user->prenom_gerant; ?></td>
                    <td><?= $user->ville; ?></td>
                    <td><?= date('d/m/Y',strtotime($user->created_at)); ?></td>
                    <td>
                        <a href="<?= $urlBase; ?>&single=<?= $user->id_creche; ?>">Détails</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                </thead>
            </table>
        </table>
    </div>
    <?php
}
function users_admin_single($id,$urlBase)
{
    global $wpdb;
    $user = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}creche WHERE id_creche = $id" , OBJECT );


    ?>


    <p>N° Identifiant: <?= $user->id_creche; ?></p>
    <p>Nom de la crèche : <?= $user->nom_creche; ?></p>
    <p>Nom du/de la Gérant(e) : <?= $user->nom_gerant; ?></p>
    <p>Prénom du/de la Gérant(e) : <?= $user->prenom_gerant; ?></p>
    <p>Email : <?= $user->email; ?></p>
    <p>N. Téléphone de la crèche : <?= $user->telephone_creche; ?></p>
    <p>Adresse : <?= $user->num_rue.' '.$user->supp_rue. ' ' .$user->nom_rue .', '. $user->codepostal.' '.$user->ville; ?></p>
    <p>Numéro de SIRET : <?= $user->num_siret; ?></p>
    <p>Numéro d'agrément : <?= $user->num_agrement; ?></p>
    <p>Numéro de Sécurité Social : <?= $user->num_secusocial; ?></p>
    <p>Effectif Maximum d'Enfant : <?= $user->effectif_maxenfant; ?></p>
    <p>Date d'inscription : <?= $user->created_at; ?></p>
    <ul>
        <li><a class="button" href="<?= $urlBase; ?>&edit=<?= $user->id_creche ?>">Modifier</a></li>
    </ul>

    <?php
}

function users_admin_edit($id,$urlBase)
{
    global $wpdb;
    $user = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}creche WHERE id_creche = $id", OBJECT);

    $errors = array();
    $success = false;

    if (!empty($_POST['submitted'])) {

        $nom_creche = trim(strip_tags(stripslashes($_POST['nom_creche'])));
        $nom_gerant = trim(strip_tags(stripslashes($_POST['nom_gerant'])));
        $prenom_gerant = trim(strip_tags(stripslashes($_POST['prenom_gerant'])));
        $email = trim(strip_tags(stripslashes($_POST['email'])));
        $telephone_creche = trim(strip_tags(stripslashes($_POST['telephone_creche'])));
        $num_siret = trim(strip_tags(stripslashes($_POST['num_siret'])));
        $num_agrement = trim(strip_tags(stripslashes($_POST['num_agrement'])));
        $num_secusocial = trim(strip_tags(stripslashes($_POST['num_secusocial'])));
        $effectif_maxenfant = trim(strip_tags(stripslashes($_POST['effectif_maxenfant'])));


        $v = new Validation();
        $errors['nom_creche'] = $v->textValid($nom_creche, 'nom d\'entreprise', 3, 100);
        $errors['nom_gerant'] = $v->textValid($nom_gerant, 'nom', 3, 100);
        $errors['prenom_gerant'] = $v->textValid($prenom_gerant, 'prénom', 3, 100);
        $errors['email'] = $v->emailValid($email);
        $errors['telephone_creche'] = $v->isNumeric($telephone_creche);
        $errors['telephone_creche'] = $v->textValid($telephone_creche, 'Numéro de téléphone', 10, 10);
        $errors['num_siret'] = $v->textValid($num_siret, 'N° de siret', 14, 14);
        $errors['num_agrement'] = $v->textValid($num_agrement, 'N° d\'agrement', 3, 13);
        $errors['num_secusocial'] = $v->textValid($num_secusocial, 'N° de sécu', 13, 13);
        $errors['effectif_maxenfant'] = $v->intValid($effectif_maxenfant, 1, 10);

        if ($v->IsValid($errors)) {
                global $wpdb;
                $edit = $wpdb->update(
                    'nurs_creche',
                    array(
                        'nom_creche' => $nom_creche,
                        'nom_gerant' => $nom_gerant,
                        'prenom_gerant' => $prenom_gerant,
                        'email' => $email,
                        'telephone_creche' => $telephone_creche,
                        'num_siret' => $num_siret,
                        'num_agrement' => $num_agrement,
                        'num_secusocial' => $num_secusocial,
                        'effectif_maxenfant' => $effectif_maxenfant,
                        'modified_at' => current_time('mysql'),
                    ),
                    array(
                        'id_creche' => $id,
                    ),
                    array(
                        '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%d', '%s', '%d', '%d', '%d', '%d',
                    ),
                    array(
                        '%d',
                    )
                );
                $success = true;
                echo  '<script type="text/javascript">
                        alert("Les modifications ont bien été apporté, cliquez sur OK pour retourner sur les informations de l\'utilisateur ");
                        window.location = "http://localhost/mynursery/wp-admin/admin.php?page=userspageadmin&single='. $user->id_creche.'";
                       </script>';


            }
        }

$form = new Form($errors);

?>

    <form action="" method="post" class="form-style">
        <table>
            <tr>
                <th><label for="id">N° Identifiant:</label></th>
                <td><p><?= $user->id_creche; ?></p></td>
            </tr>
            <tr>
                <th><label for="nom_creche">Nom de la crèche :</label></th>
                <td><input type="text" name="nom_creche" id="nom_creche" value="<?= $user->nom_creche; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('nom_creche') ?></span></td>

            </tr>
            <tr>
                <th><label for="nom_gerant">Nom du/de la Gérant(e) :</label></th>
                <td><input type="text" name="nom_gerant" id="nom_gerant" value="<?= $user->nom_gerant; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('nom_gerant') ?></span></td>
            </tr>
            <tr>
                <th><label for="prenom_gerant">Prénom du/de la Gérant(e) :</label></th>
                <td><input type="text" name="prenom_gerant" id="prenom_gerant" value="<?= $user->prenom_gerant; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('prenom_gerant') ?></span></td>
            </tr>
            <tr>
                <th><label for="email">Email :</label></th>
                <td><input type="text" name="email" id="email" value="<?= $user->email; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('email') ?></span></td>
            </tr>
            <tr>
                <th><label for="telephone_creche">N. Téléphone de la crèche :</label></th>
                <td><input type="text" name="telephone_creche" id="telephone_creche" value="0<?= $user->telephone_creche; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('telephone_creche') ?></span></td>
            </tr>
            <tr>
                <th><label for="num_siret">Numéro de SIRET :</label></th>
                <td><input type="text" name="num_siret" id="num_siret" value="<?= $user->num_siret; ?>"></td>
                <td> <span class="input-highlight"><?= $form->error('num_siret') ?></span></td>
            </tr>
            <tr>
                <th><label for="num_agrement">Numéro d'agrément :</label></th>
                <td><input type="text" name="num_agrement" id="num_agrement" value="<?= $user->num_agrement; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('num_agrement') ?></span></td>
            </tr>
            <tr>
                <th><label for="num_secusocial">Numéro de Sécurité Social :</label></th>
                <td><input type="text" name="num_secusocial" id="num_secusocial" value="<?= $user->num_secusocial; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('num_secusocial') ?></span></td>

            </tr>
            <tr>
                <th><label for="effectif_maxenfant">Effectif Maximum d'Enfant :</label></th>
                <td><input type="text" name="effectif_maxenfant" id="effectif_maxenfant" value="<?= $user->effectif_maxenfant; ?>"></td>
                <td><span class="input-highlight"><?= $form->error('effectif_maxenfant') ?></span></td>
            </tr>
            <tr>
                <th><label for="created_at">Date d'inscription : </label></th>
                <td><p><?= $user->created_at; ?></p></td>
            </tr>
            <tr>
                <th><p>Enregistrez vos modifications : </p></th>
                <td><input type="submit" name="submitted" class="button"></td>
            </tr>
        </table>
    </form>



<?php
}


