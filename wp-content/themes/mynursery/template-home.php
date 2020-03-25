<?php
/*
Template Name: Home
*/

get_header();
?>

    <section>
    <div class="wrap-slider">
        <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="d-block img-fluid"
                         src="<?php echo get_template_directory_uri() ?>/asset/img/slider1.jpg"
                         alt="Enfants se tennant la main">
                    <div class="carousel-caption">
                        <h3 class="h2">Make them smile !</h3>
                        <p>We're here to improve the happiness of your sons</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid"
                         src="<?php echo get_template_directory_uri() ?>/asset/img/slider2.jpg"
                         alt="Enfants qui sourient">
                    <div class="carousel-caption">
                        <h3 class="h2">Give them some good time !</h3>
                        <p>We've a lot of activities to make them grow</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid"
                         src="<?php echo get_template_directory_uri() ?>/asset/img/slider3.jpg"
                         alt="Enfants dans un champ de coquelicots York">
                    <div class="carousel-caption">
                        <h3 class="h2">Let's discover the world together</h3>
                        <p>To find all the possibilities and much more ... </p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <section>

    <div class="separator"></div>

    <?php
    $args = array(
        'post_type' => 'aboutus',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'order' => 'DESC',
        'orderby' => 'date'
    );
    $the_query = new WP_Query($args);
    ?>
    <section>
        <div class="container">
            <div id="about-us" class="row">
                <?php
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>
                        <div id="about-us-left" class="col-md-7">
                            <h2 id="h2" class="section_aboutus">about us</h2>
                            <h3 id="h3" class="title_aboutus"><?= get_the_title() ?></h3>
                            <p class="text_aboutus"> <?php echo substr(get_the_excerpt(), 0, 450); ?>
                            </p>
                            <a id="test" class="btn-redirection btn btn-outline-dark" href="http///www.ici-le-lien.fr">Read


                                more...</a>
                        </div>
                        <div id="about-us-right" class="col-md-5">
                            <img class="img-thumbnail img-fluid mx-auto"
                                 src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'imgabout-us'); ?>" alt="">
                        </div>
                    <?php }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <div class="separator"></div>

    <section class="ourspecilization">
        <div class="wrap-slider">
            <div class="outer-div">
                <div class="inner-div">
                    <h2 id="h2" class="section_ourspe">our specilization</h2>
                    <h3 id="h3" class="title_ourspe">Here the title of our specilization</h3>
                </div>
            </div>
            <?php
            $args = array(
                'post_type' => 'specialization',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'orderby' => 'date',
            );
            $the_query = new WP_Query($args); ?>
            <div class="row text-center">
                <?php
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
                        <div class="col-lg-4">
                            <?php
                            $image = get_the_post_thumbnail_url(get_the_ID(), 'imgSpecialization');
                            if (!empty($image)) { ?>
                                <img src="<?php echo $image; ?>" alt="<?= get_the_title(); ?>">
                            <?php } ?>
                            <!-- <i id="icon" class="fas fa-search-location fa-7x"></i>-->
                            <h4 id="space-between" class="h4"><?= mb_strtoupper(get_the_title()) ?></h4>
                            <p class="text-ourspe"><?= get_the_content() ?></p>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <div class="separator"></div>

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
                    <h3 class="title-new">Covid-19 and Nurseries, what changed ?</h3>
                    <span>Publish : The 19 of Marsh 2020 </span>
                    <p class="resume-new">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt
                        ut
                        labore et dolore magna aliqua.Ut enim ad minim binz veniam, quis nostrud exercitation
                        ullamco laboris nisi ut...</p>
                </div>
                <div class="col-lg-6">
                    <div class="img-hover-zoom img-hover-zoom-translate">
                        <img src="<?php echo get_template_directory_uri() ?>/asset/img/creche.jpg" alt=""
                             class="img-new">
                    </div>
                    <h3 class="title-new">Nursery 2.0, system updated...</h3>
                    <span>Publish : The 2 Marsh 2020</span>
                    <p class="resume-new">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        temporincididunt
                        ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco
                        laboris nisi ut aliquip...</p>
                </div>
            </div>
        </div>
    </section>

    <div class="separator"></div>

    <section class="partner-section">
        <div class="wrap-slider">
            <?php
            $args = array(
                'post_type' => 'partner',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'order' => 'DESC',
                'orderby' => 'date',
            );
            $the_query = new WP_Query($args); ?>
            <div class="row">
                <div class="col">
                    <h2 class="title-section">Our Partners</h2>
                </div>
            </div>
            <div class="row">
                <?php
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
                        <div class="col-lg-3">
                            <div class="logo-hover-zoom img-hover-zoom-translate">
                                <?php
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'imgPartner');
                                if (!empty($image)) { ?>
                                    <img src="<?php echo $image; ?>" alt="<?= get_the_title(); ?>" class="logo-client">
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata(); ?>
                <!--<div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche1.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/toupoutou.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche3.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche4.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche5.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche6.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche7.png" alt=""
                             class="logo-client">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="logo-hover-zoom img-hover-zoom-translate">
                        <img src="<?php /*echo get_template_directory_uri() */ ?>/asset/img/creche8.png" alt=""
                             class="logo-client">
                    </div>
                </div>-->
            </div>
        </div>
    </section>

    <div class="separator"></div>

<?php
get_footer();
