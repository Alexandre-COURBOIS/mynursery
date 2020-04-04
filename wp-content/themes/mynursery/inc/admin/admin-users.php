<?php
/**
 * Register a custom menu page.
 */

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
    $user = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}creche WHERE id_creche = $id" , OBJECT );
    ?>

<table>
    <tr>
        <th><label for="id">N° Identifiant:</label></th>
        <td><p><?= $user->id_creche; ?></p></td>
    </tr>
    <tr>
        <th><label for="nom_creche">Nom de la crèche :</label></th>
        <td><input type="text" value="<?= $user->nom_creche; ?>"></td>
    </tr>
    <tr>
        <th><label for="nom_gerant">Nom du/de la Gérant(e) :</label></th>
        <td><input type="text" value="<?= $user->nom_gerant; ?>"></td>
    </tr>
    <tr>
        <th><label for="prenom_gerant">Prénom du/de la Gérant(e) :</label></th>
        <td><input type="text" value="<?= $user->prenom_gerant; ?>"></td>
    </tr>
    <tr>
        <th><label for="">Email :</label></th>
        <td><input type="text" value="<?= $user->email; ?>"></td>
    </tr>
    <tr>
        <th><label for="telephone_creche">N. Téléphone de la crèche :</label></th>
        <td><input type="text" value="<?= $user->telephone_creche; ?>"></td>
    </tr>
    <tr>
        <th><label for=""></label></th>
        <td><input type="text" value=""></td>
    </tr>
    <tr>
        <th><label for="num_siret">Numéro de SIRET :</label></th>
        <td><input type="text" value="<?= $user->num_siret; ?>"></td>
    </tr>
    <tr>
        <th><label for="num_agrement">Numéro d'agrément :</label></th>
        <td><input type="text" value="<?= $user->num_agrement; ?>"></td>
    </tr>
    <tr>
        <th><label for="num_secusocial">Numéro de Sécurité Social :</label></th>
        <td><input type="text" value="<?= $user->num_secusocial; ?>"></td>
    </tr>
    <tr>
        <th><label for="effectif_maxenfant">Effectif Maximum d'Enfant :</label></th>
        <td><input type="text" value="<?= $user->effectif_maxenfant; ?>"></td>
    </tr>
    <tr>
        <th><label for="created_at">Date d'inscription : </label></th>
        <td><p><?= $user->created_at; ?></p></td>
    </tr>
</table>

<?php
}




