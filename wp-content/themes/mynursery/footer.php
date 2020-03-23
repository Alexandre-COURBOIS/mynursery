<?php
global $web; ?>

<footer class="footer bg-parallax">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="column col-lg-4">
                <div>
                    <div>
                        <a href="<?= esc_url(home_url('/'))?>">
                            <img src="<?=get_template_directory_uri()?>/asset/img/mynursery.png"
                                 alt="logo_mynursery" id="logo-footer"/>
                        </a>
                    </div>
                    <div>
                        <ul>
                            <li>24 Place Saint Marc, 76000 Rouen</li>
                            <li>02.35.00.11.22</li>
                            <li>contact@mynursery.fr</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column col-lg-2">
                <div>
                    <div>
                        <h4>Link</h4>
                        <ul>
                            <li>
                                <a href="<?= esc_url(home_url('/'))?>" class="lien-footer">Home</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['features']['slug'])) ?>" class="lien-footer">Features</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['pages']['slug'])) ?>" class="lien-footer">Pages</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['gallery']['slug'])) ?>" class="lien-footer">Gallery</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['blog']['slug'])) ?>" class="lien-footer">Blog</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['contact']['slug'])) ?>" class="lien-footer">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column col-lg-3">
                <div>
                    <h4>Social</h4>
                    <div>
                        <ul id="logo-social">
                            <li>
                                <a href="#" class="lien-footer"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="#" class="lien-footer"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" class="lien-footer"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="lien-footer"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#" class="lien-footer"><i class="fab fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column col-lg-3">
                <div>
                    <div>
                        <h4>copyright</h4>
                        <p>© 2020 WEBAPSY</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</footer>
</body>
</div>