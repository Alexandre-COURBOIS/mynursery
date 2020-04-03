<?php
/*
Template Name: Profil
*/
global $wpdb;

session_start();

get_header();

$id = $_SESSION['login']['id'];

$creches = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}creche WHERE id_creche = %d", $id)
);

$employes = $wpdb->get_results(
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}employee_creche WHERE id_creche = %d", $id)
);



?>

    <div class="separator"></div>

    <div class="container">

        <div class="row">
            <div class="col-sm">
                <h2 class="text-center title_profil"><?= $creches[0]->nom_creche; ?></h2>
            </div>
        </div>

        <div class="separator_map"></div>

        <div class="row">
            <div class="col-6">
                <img class="img_profil" src="<?=get_template_directory_uri()?>/asset/img/avatar-profil.png" alt="image de la personne">
                <div class="separator_map"></div>
                <p>Vos informations :</p>
                <div class="separator_map"></div>
                <p id="margin_profil">Nom : <?= $creches[0]->nom_gerant; ?></p>
                <p id="margin_profil">Prenom : <?= $creches[0]->prenom_gerant; ?></p>
                <p id="margin_profil">Adresse mail : <?= $creches[0]->email; ?></p>
                <p id="margin_profil">Numéro de téléphone : +33<?= $creches[0]->telephone_creche; ?></p>
                <?php if (!empty($creches[0]->supp_rue)) {?>
                    <p id="margin_profil">Adresse : <?= $creches[0]->num_rue.' '.$creches[0]->supp_rue.' '.$creches[0]->nom_rue;?></p>
                <?php } else {?>
                    <p id="margin_profil">Adresse : <?= $creches[0]->num_rue.' '.$creches[0]->nom_rue;?></p>
                <?php } ?>
                <p id="margin_profil">Code postal : <?= $creches[0]->codepostal; ?></p>
                <p id="margin_profil">Ville : <?= $creches[0]->ville; ?></p>
                <p id="margin_profil">Numéro de SIRET/SIREN : <?= $creches[0]->num_siret; ?></p>
                <p id="margin_profil">Numéro de sécurité social : <?= $creches[0]->num_secusocial; ?></p>
                <p id="margin_profil">Effectif d'enfant maximum : <?= $creches[0]->effectif_maxenfant; ?></p>
                <button type="button" class="btn btn-primary btn-lg">Editez vos informations</button>
                <button type="button" class="btn btn-primary btn-lg">Modifiez votre mot de passe</button>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Employés</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Suppression</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        <?php foreach ($employes as $employe) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $employe->nom_employee?></td>
                            <td><?= $employe->prenom_employee?></td>
                            <td>0<?= $employe->telephone_employee?></td>
                            <td><a style="background-color: red !important; border-radius: 15px !important;" href="<?php echo add_query_arg( 'id', $employe->id_employee, home_url().'/delete' );?>" type="button" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                <a href="ajouter-un-employe" type="button" class="btn btn-primary btn-lg">Ajouter un employé</a>
            </div>
        </div>

    </div>


    <div class="separator"></div>

<!--    <div class="loader">
        <div class="load-text">
            <div class="loaded-text">B</div>
            <div class="loading-text">ienvenue</div>
        </div>
    </div>-->

<?php
get_footer();
