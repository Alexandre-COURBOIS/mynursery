<?php
/*
Template Name: Home
*/

get_header();
?>
    <body>

    <div id="wrap-about-us" class=".container">
        <section id="about-us" class="row">
            <div id="about-us-left" class="col-sm">
                <h2 class="sections">about us</h2>
                <h3 class="titles">Ici le titre de la section about us</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A non odio pariatur, ullam veniam
                    voluptatum!
                    Assumenda, aut autem delectus doloremque, dolores error est illum perferendis porro totam vitae
                    voluptas voluptatem.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur cumque cupiditate
                    debitis harum laudantium magni minima modi, quia rerum, saepe sapiente suscipit!
                    Adipisci atque fuga nulla qui sit tempore.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A non odio pariatur, ullam veniam
                    voluptatum!
                    Assumenda, aut autem delectus doloremque, dolores error est illum perferendis porro totam vitae
                    voluptas voluptatem.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur cumque cupiditate
                    debitis harum laudantium magni minima modi, quia rerum, saepe sapiente suscipit!
                    Adipisci atque fuga nulla qui sit tempore.
                </p>
                <a class="btn-redirection" href="http///www.ici-le-lien.fr">En savoir plus...</a>
            </div>

            <div id="about-us-right" class="col-sm">
                <img src="<?php echo get_template_directory_uri() ?>/asset/img/about-us-family.jpg" alt="">
            </div>
        </section>


        <section class="section-latest-new">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="title-section">Latest New</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?php echo get_template_directory_uri() ?>/asset/img/covid19.png" alt="" class="img-new">
                        <h3 class="title-new">Covid-19 et les crèches, que ce passe-t-il ?</h3>
                        <span>Publié le : 18 Mars 2020</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.Ut enim ad minim binz veniam, quis nostrud exercitation
                            ullamco laboris nisi ut...</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="<?php echo get_template_directory_uri() ?>/asset/img/creche.jpg" alt="" class="img-new">
                        <h3 class="title-new">Crèche 2.0, quelles sont les nouveautées ?</h3>
                        <span>Publié le : 2 Mars 2020</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip...</p>
                    </div>
                </div>
            </div>
        </section>
    </div>


    </body>


<?php
get_footer();
