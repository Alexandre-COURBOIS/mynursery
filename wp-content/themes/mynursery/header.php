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
    <script src="https://kit.fontawesome.com/60cfdcc021.js" crossorigin="anonymous"></script>



    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header id="myHeader">
    <div class="wrap-header">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?php echo esc_url(home_url($web['pages']['home']['slug']))?>">
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
                    <a href="inscription" class="btn btn-outline-dark btn-sm mx-auto" role="button">Inscription</a>
                </div>
                <div class="btn-toolbar">
                    <a href="connexion" class="btn btn-outline-dark btn-sm mx-auto" role="button">Connexion</a>
                </div>
        </nav>
    </div>
    </div>
</header>


<!--    <ul class="nav navbar">
        <li><a href="<?php /*echo esc_url(home_url($web['pages']['home']['slug'])) */ ?>" title="">Home</a>
        </li>
        <li><a href="<?php /*echo esc_url(home_url($web['pages']['features']['slug'])) */ ?>" title="">Features</a>
        </li>
        <li><a href="<?php /*echo esc_url(home_url($web['pages']['pages']['slug'])) */ ?>" title="">Pages</a>
        </li>
        <li><a href="<?php /*echo esc_url(home_url($web['pages']['gallery']['slug'])) */ ?>" title="">Gallery</a>
        </li>
        <li><a href="<?php /*echo esc_url(home_url($web['pages']['blog']['slug'])) */ ?>" title="">Blog</a></li>
        <li><a href="<?php /*echo esc_url(home_url($web['pages']['contact']['slug'])) */ ?>" title="">Contact</a>
        </li>
    </ul>
-->
