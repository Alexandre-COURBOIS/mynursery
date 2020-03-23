<?php
/*
Template Name: Home
*/

get_header();
?>


<section>
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

                <a id="supprlink" class="btn btn-outline-dark" role="button" href="http///www.ici-le-lien.fr">En savoir plus... <i class="fas fa-arrow-right"></i></a>
            </div>

            <div id="about-us-right" class="col-md-5">
                <img class="img-thumbnail img-fluid mx-auto"  src="<?php echo get_template_directory_uri() ?>/asset/img/about-us-family2.jpg" alt="">
            </div>
        </div>
    </div>
        </section>

<section class="ourspecilization">
    <div class="container">
        <div class="outer-div">
            <div class="inner-div">
            <h2 id="h2" class="section_ourspe">our specilization</h2>
            <h3 id="h3" class="title_ourspe">Title our spe</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-4">
                <i id="icon" class="fas fa-search-location fa-7x"></i>
                <h4 id="space-between" class="h4" ><a id="supprlink" href="">search</a></h4>
                <p class="text-ourspe">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            </div>
            <div class="col-lg-4">
                <i id="icon" class="fas fa-user-shield fa-7x"></i>
                <h4 id="space-between" class="h4" ><a id="supprlink" href="">professionnels</a></h4>
                <p class="text-ourspe">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum, bi li li lu. </p>
            </div>
            <div class="col-lg-4">
                <i id="icon"  class="fas fa-lock fa-7x"></i>
                <h4 id="space-between" class="h4"><a id="supprlink" href="">securité</a></h4>
                <p class="text-ourspe">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
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
                            <div class="img-hover-zoom img-hover-zoom-translate">
                                <img src="<?php echo get_template_directory_uri() ?>/asset/img/covid19.png" alt=""
                                     class="img-new">
                            </div>
                            <h3 class="title-new">Covid-19 et les crèches, que ce passe-t-il ?</h3>
                            <span>Publié le : 18 Mars 2020</span>
                            <p class="resume-new">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua.Ut enim ad minim binz veniam, quis nostrud exercitation
                                ullamco laboris nisi ut...</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="img-hover-zoom img-hover-zoom-translate">
                                <img src="<?php echo get_template_directory_uri() ?>/asset/img/creche.jpg" alt=""
                                     class="img-new">
                            </div>
                            <h3 class="title-new">Crèche 2.0, quelles sont les nouveautées ?</h3>
                            <span>Publié le : 2 Mars 2020</span>
                            <p class="resume-new">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt
                                ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip...</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php
get_footer();
