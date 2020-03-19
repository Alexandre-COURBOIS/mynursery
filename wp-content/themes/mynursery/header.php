<?php global $web ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Nursery</title>
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/60cfdcc021.js" crossorigin="anonymous"></script>


    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<div class="wrap">

    <header class="page-header">

        <h1>MyNursery</h1>
        <div class="page-title"></div>

        <nav class="nav_container">

            <div class="logo">
                <img src="<?php echo get_template_directory_uri() ?>/asset/img/mynursery.png" alt="">
            </div>

            <ul class="nav social">
                <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i>.</a></li>
                <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                <li><a href=""><i class="fab fa-google"></i></a></li>
            </ul>

            <ul class="nav navbar">
                <li class="active"><a href="<?php echo esc_url(home_url($web['pages']['home']['slug'])) ?>" title="">Home</a>
                </li>
                <li><a href="<?php echo esc_url(home_url($web['pages']['features']['slug'])) ?>" title="">Features</a>
                </li>
                <li><a href="<?php echo esc_url(home_url($web['pages']['pages']['slug'])) ?>" title="">Pages</a></li>
                <li><a href="<?php echo esc_url(home_url($web['pages']['gallery']['slug'])) ?>" title="">Gallery</a>
                </li>
                <li><a href="<?php echo esc_url(home_url($web['pages']['blog']['slug'])) ?>" title="">Blog</a></li>
                <li><a href="<?php echo esc_url(home_url($web['pages']['contact']['slug'])) ?>" title="">Contact</a>
                </li>
            </ul>

        </nav>

        <div class="clear"></div>

    </header><!-- /header -->
