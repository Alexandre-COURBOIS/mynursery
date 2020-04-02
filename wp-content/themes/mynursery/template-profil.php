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

?>

    <div class="separator"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto mt-3">
                <h2 class="text-center title_profil"><?= $creches[0]->nom_creche; ?></h2>
            </div>
        </div>
        <div class="separator_map"></div>
        <div class="row">
            <div class="col-md-2 mx-auto mt-5">
                <p>Nom : <?= $creches[0]->nom_gerant; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <p>Prenom : <?= $creches[0]->prenom_gerant; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button href="<?php $creches ?>"type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <p>Adresse mail : <?= $creches[0]->email; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <p>Numéro de téléphone : +33 <?= $creches[0]->telephone_creche; ?></strong></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">

            <?php if (!empty($creches[0]->supp_rue)) {
            echo '<div class="col-md-1 mx-auto mt-5">';
             } else {
            echo '<div class="col-md-2 mx-auto mt-5">';
            }
            echo '<p> N°'.$creches[0]->num_rue.'</p>';
            echo '</div>';

            if (!empty($creches[0]->supp_rue)) {
            $html = '<div class="col-md-1 mx-auto mt-5">';
            $html .= '<p>'.$creches[0]->supp_rue.'<p>';
            $html .= '</div>';
            echo $html;
            } ?>
            <?php if (!empty($creches[0]->supp_rue)) {
            echo '<div class="col-md-4 mx-auto mt-5">';
            } else {
            echo '<div class="col-md-6 mx-auto mt-5">';
            } ?>
                <p><?= $creches[0]->nom_rue; ?></p>
            </div>
            <div class="w-100"></div>
            <div class="col-md-2 mx-auto mt-5">
                <p>Code postal : <?= $creches[0]->codepostal; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <p>Ville : <?= $creches[0]->ville; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <p>Numéro de SIRET/SIREN : <?= $creches[0]->num_siret; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <p>Numéro de sécurité social : <?= $creches[0]->num_secusocial; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <p>Effectif d'enfant maximum : <?= $creches[0]->effectif_maxenfant; ?></p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <p>Si vous souhaitez modifier votre mot de passe</p>
            </div>
            <div class="col-md-2 mx-auto mt-5">
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
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
