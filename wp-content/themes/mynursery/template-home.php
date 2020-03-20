<?php
/*
Template Name: Home
*/
get_header();
?>
    <body>

    <div class="container">
        <div id="about-us" class="row">
            <div id="about-us-left" class="col-md-7">
                <h2 id="h2" class="section_aboutus">about us</h2>
                <h3 id="h3" class="title_aboutus">Ici le titre de la section about us</h3>
                <p class="text_aboutus"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A non odio pariatur, ullam veniam
                    voluptatum!
                    Assumenda, aut autem delectus doloremque, dolores error est illum perferendis porro totam vitae
                    voluptas voluptatem.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur cumque cupiditate
                    debitis harum laudantium magni minima modi, quia rerum, saepe sapiente suscipit!
                </p>
                <a id="test" class="btn-redirection" href="http///www.ici-le-lien.fr">En savoir plus...</a>
            </div>

            <div id="about-us-right" class="col-md-5">
                <img class="img-thumbnail img-fluid mx-auto"  src="<?php echo get_template_directory_uri() ?>/asset/img/about-us-family2.jpg" alt="">
            </div>
        </div>
    </div>
    </body>


<?php
get_footer();