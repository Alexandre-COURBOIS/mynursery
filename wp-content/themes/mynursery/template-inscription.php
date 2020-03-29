<?php
global $wpdb;
/*
Template Name: Inscription
*/

$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

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
    $child_max = trim(strip_tags(stripslashes($_POST['max_child'])));
    $agrement = trim(strip_tags(stripslashes($_POST['agrement'])));
    $password = trim(strip_tags(stripslashes($_POST['mdp'])));
    $password = trim(strip_tags(stripslashes($_POST['conf-mdp'])));

    if (!empty($errors)) {

    }
}
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
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email : exemple@mail.fr">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel: 02 11 22 33 44">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="num-rue" id="num-rue" placeholder="N° de rue">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto mt-3">
                            <div class="form-group">
                                <select name="id-rue" id="id-rue" class="form-control">
                                    <option value="null">Supplément de numéro</option>
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
                                <input type="text" class="form-control" name="street" id="street" placeholder="Nom de la rue">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code-postal" id="code-postal" placeholder="Code postal">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                        <div class="col-md-7 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" id="city" placeholder="Nom de la ville">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="siret" id="siret" placeholder="N° SIRET/SIREN">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="secu" id="secu" placeholder="N° sécurité social">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="agrement" id="agrement" placeholder="N° d'agrément">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-11 mx-auto mt-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="max-child" id="max-child" placeholder="Effectif d'enfant maximum">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Votre mot de passe">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                        <div class="col-md-5 mx-auto mt-3">
                            <div class="form-group">
                                <input type="password" class="form-control" name="conf-mdp" id="conf-mdp" placeholder="Confirmation mot de passe">
                                <span class="input-highlight"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-auto mt-5">
                <input type="submit" name="submitted" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

    <div class="clear"></div>

<div class="separator"></div>

<?php

get_footer();
