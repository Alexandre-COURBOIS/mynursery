<?php
/*
Template Name: Connexion
*/

get_header();
?>

    <div class="container">
        <form action="" method="post" class="form-style">
            <h2 class="text-center pt-4">Connexion</h2>
            <div class="form-row">
                <div class="col-md-5 mx-auto mt-3">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse mail : exemple@mail.fr">
                        <span class="input-highlight"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Votre mot de passe">
                        <span class="input-highlight"></span>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-5 mx-auto mt-5">
        <input type="submit" class="btn btn-lg btn-danger btn-block">
    </div>
    </form>
    <div class="clear"></div>
    </div>


    </div>
    </div>
<?php
get_footer();
