<?php
global $web;
?>

<footer class="footer bg-parallax">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-col">
                    <div class="widget m-b-25">
                        <a href="<?= esc_url(home_url('/'))?>">
                            <img src="<?=get_template_directory_uri()?>/asset/img/mynursery.png"
                                 alt="logo_mynursery"/>
                        </a>
                    </div>
                    <div class="widget widget-address">
                        <ul>
                            <li>24 Place Saint Marc, 76000 Rouen</li>
                            <li>02.35.00.11.22</li>
                            <li>contact@mynursery.fr</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-col p-l-70 p-md-l-0">
                    <div class="widget widget_pages">
                        <h4 class="widget-title">Link</h4>
                        <ul>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-col p-l-70 p-md-l-0">
                    <h4 class="widget-title">Social</h4>
                    <div class="widget widget_socials">
                        <ul class="list-social list-social-2">
                            <li class="list-social__item">
                                <a class=" ic-fb" href="#">
                                    <i class=" zmdi zmdi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-social__item">
                                <a class=" ic-twi" href="#">
                                    <i class=" zmdi zmdi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-col">
                    <div class="widget widget_text">
                        <h4 class="widget-title">copyright</h4>
                        <p>© 2020 WEBAPSY</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>