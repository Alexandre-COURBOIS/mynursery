<?php global $web ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Nursery</title>
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" rel="stylesheet">

    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.css" type="text/css"/>
    <link href="https://api.mapbox.com/mapbox-assembly/v0.23.2/assembly.min.css" rel="stylesheet"/>

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.min.js"></script>



    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header id="myHeader">
    <div class="wrap-header">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?= esc_url(home_url('/')) ?>">
                <img src="<?php echo get_template_directory_uri() ?>/asset/img/mynursery.png" width="100" height="50"
                     alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Project</a>
                    </li>
                </ul>
                <div class="btn-toolbar">
                    <!--                    <a href="<? /*= esc_url(home_url($web['pages']['inscription']['slug'])) */ ?>" class="btn btn-outline-dark btn-sm mx-auto" role="button">Inscription</a>-->
                    <!-- Button for Modal -->
                    <button type="button" class="btn btn-outline-dark btn-sm mx-auto" data-toggle="modal"
                            data-target="#staticBackdrop">
                        Inscription
                    </button>

                    <!-- Modal -->

                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form id="form">

                                        <div class="subscription-container">

                                            <input type="radio" name="radio" id="pro" value="pro">
                                            <label for="pro" class="subscription__button">
                                                <h3 class="subscription__title">Vous êtes un</h3>
                                                <h3 class="subscription__main-feature"> professionnel</h3>
                                                <span class="subscription__price">Inscrivez-vous</span>
                                            </label>

                                            <input type="radio" name="radio" id="parent" value="parent">
                                            <label for="parent" class="subscription__button">
                                                <h3 class="subscription__title">Vous êtes un</h3>
                                                <h3 class="subscription__main-feature">Parent</h3>
                                                <span class="subscription__price">Inscrivez-vous</span>
                                            </label>

                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="btn-toolbar">
                    <a href="#" class="btn btn-outline-dark btn-sm mx-auto" role="button">Connexion</a>
                </div>
        </nav>
    </div>
    </div>
</header>
