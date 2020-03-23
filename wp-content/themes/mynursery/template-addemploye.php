<?php
/*
Template Name: AddEmploye
*/
get_header();
?>


    <div class="container">
        <form action="" method="post" class="form-style">
            <h2 class="text-center pt-4">Ajouter un nouvel employé</h2>
            <div class="form-row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom de l'employé">
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Prénom de l'employé">
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>

                    <div class="form-group mb-5">
                        <input type="text" class="form-control" name="name" id="name" placeholder="N° de sécu">
                        <span class="input-highlight"></span>
                    </div>
                    <p class="errors"></p>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Télécharger le certificat</label>
                    </div>

                </div>

            </div>
            <div class="col-md-5 mx-auto mt-5 mb-5">
                <input type="submit" class="btn btn-lg btn-success btn-block">
            </div>
        </form>
    </div>

<?php get_footer();
