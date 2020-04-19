<?php
/*
Template Name: Profil
*/
global $wpdb;
global $wp_query;

session_start();

if (!empty($_SESSION)) {
    if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {

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
                    <h2  class="text-center title_profil"><?= $creches[0]->nom_creche; ?></h2>
                </div>
                <div class="col-sm">
                    <img class="img-fluid img_profil" src="<?= get_template_directory_uri() ?>/asset/img/bandeau-profil.jpg"
                         alt="image bandeau">
                </div>
            </div>

            <div class="separator_map"></div>

            <div class="row">
                <div class="col-md-6">

                    <div class="separator_map"></div>

                    <h3 id="h3">Vos informations</h3>

                    <p id="profil-label">Nom:</p>
                    <p id="margin_profil"><?= $creches[0]->nom_gerant; ?></p>
                    <p id="profil-label">Prenom:</p>
                    <p id="margin_profil"><?= $creches[0]->prenom_gerant; ?></p>
                    <p id="profil-label">Adresse mail:</p>
                    <p id="margin_profil"><?= $creches[0]->email; ?></p>
                    <p id="profil-label">Numéro de téléphone:</p>
                    <p id="margin_profil">+33<?= $creches[0]->telephone_creche; ?></p>
                    <p id="profil-label">Adresse:</p>
                    <?php if (!empty($creches[0]->supp_rue)) { ?>
                        <p id="margin_profil"><?= $creches[0]->num_rue . ' ' . $creches[0]->supp_rue . ' ' . $creches[0]->nom_rue . ' '. $creches[0]->codepostal .' '. $creches[0]->ville; ?></p>
                    <?php } else { ?>
                        <p id="margin_profil"><?= $creches[0]->num_rue . ' ' . $creches[0]->nom_rue  . ' '. $creches[0]->codepostal .', '. $creches[0]->ville; } ?></p>
                    <p id="profil-label">Numéro de SIRET/SIREN:</p>
                    <p id="margin_profil"><?= $creches[0]->num_siret; ?></p>
                    <p id="profil-label">Numéro de sécurité social:</p>
                    <p id="margin_profil"><?= $creches[0]->num_secusocial; ?></p>
                    <p id="profil-label">Numéro d'agrement':</p>
                    <p id="margin_profil"><?= $creches[0]->num_agrement; ?></p>
                    <p id="profil-label">Effectif d'enfant maximum :</p>
                    <p id="margin_profil"><?= $creches[0]->effectif_maxenfant; ?></p>
                    <a href="<?= add_query_arg('id', $creches[0]->id_creche, home_url() . '/edit'); ?>" type="button"
                       id="btnProfil" class="btn btn-primary btn-lg">Editer votre profil</a>
                </div>

                <div class="col-md-6">

                    <div class="separator_map"></div>

                    <h3 id="h3">Vos employés</h3>

                    <table class="table">
                        <thead>
                        <caption class="titre_tab"><a href="ajouter-un-employe" type="button" class="btn btn-primary btn-lg">Ajouter un employé</a></caption>
                        <tr>
                            <th id="profil-label" scope="col">Employés</th>
                            <th id="profil-label" scope="col">Nom</th>
                            <th id="profil-label" scope="col">Prenom</th>
                            <th id="profil-label" scope="col">Téléphone</th>
                            <th id="profil-label" scope="col">Suppression</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employes as $employe) { ?>
                            <tr>
                                <th><?= strtoupper($employe->nom_employee) ?></th>
                                <td><?= ucfirst($employe->prenom_employee) ?></td>
                                <td>0<?= $employe->telephone_employee ?></td>
                                <td><a style="background-color: red !important; border-radius: 15px !important;"
                                       href="<?php echo add_query_arg('id', $employe->id_employee, home_url() . '/delete'); ?>"
                                       type="button" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


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

