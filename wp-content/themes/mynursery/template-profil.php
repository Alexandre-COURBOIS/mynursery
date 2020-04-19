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
                    <h2 class="text-center title_profil"><?= $creches[0]->nom_creche; ?></h2>
                </div>
            </div>

            <div class="separator_map"></div>

            <div class="row">
                <div class="col-6">
                    <h2 id="sous-titre">Informations du gérant de l'établissement :</h2>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Nom :</span> <?= $creches[0]->nom_gerant; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Prenom :</span> <?= $creches[0]->prenom_gerant; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Adresse mail :</span> <?= $creches[0]->email; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Numéro de téléphone :</span> +33<?= $creches[0]->telephone_creche; ?></p id="listeProfil">
                    <?php if (!empty($creches[0]->supp_rue)) { ?>
                        <p id="listeProfil"><span style="border-bottom: solid black 1px;">Adresse
                                :</span> <?= $creches[0]->num_rue . ' ' . $creches[0]->supp_rue . ' ' . $creches[0]->nom_rue; ?></p>
                    <?php } else { ?>
                        <p id="listeProfil"><span style="border-bottom: solid black 1px;">Adresse :</span> <?= $creches[0]->num_rue . ' ' . $creches[0]->nom_rue; ?></p>
                    <?php } ?>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Code postal :</span> <?= $creches[0]->codepostal; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Ville :</span> <?= $creches[0]->ville; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Numéro de SIRET/SIREN :</span> <?= $creches[0]->num_siret; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Numéro de sécurité social :</span> <?= $creches[0]->num_secusocial; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Numéro d'agrement :</span> <?= $creches[0]->num_agrement; ?></p>
                    <p id="listeProfil"><span style="border-bottom: solid black 1px;">Effectif d'enfant maximum :</span> <?= $creches[0]->effectif_maxenfant; ?></p>
                    <a href="<?= add_query_arg('id', $creches[0]->id_creche, home_url() . '/edit'); ?>" type="button"
                       id="btnProfil" class="btn btn-primary btn-lg">Editer votre profil</a>
                </div>
                <div class="col-6">
                    <a id="btnProfil" href="ajouter-un-employe" type="button" class="btn btn-primary btn-lg">Ajouter un employé</a>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr class="table-info">
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Suppression</th>
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
        </div>


        <div class="separator"></div>

         <div class="loader">
                <div class="load-text">
                    <div class="loaded-text">B</div>
                    <div class="loading-text">ienvenue</div>
                </div>
            </div>

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

