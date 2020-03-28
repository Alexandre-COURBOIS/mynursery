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
                            <li><?= get_field('adresse') ?></li>
                            <li><?= get_field('numero_de_telephone') ?></li>
                            <li><?= get_field('adresse_email') ?></li>
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
                        <?php
                              $facebook  = get_field('reseau_image_1', get_the_ID());
                              $instagram = get_field('reseau_image_2', get_the_ID());
                              $twitter   = get_field('reseau_image_3', get_the_ID());
                              $pinterest = get_field('reseau_image_4', get_the_ID());
                              $newreseau = get_field('reseau_image_5', get_the_ID());
                        ?>
                        <ul id="logo-social">
                            <li>
                                <a href="<?= esc_url(get_field('reseau_1', get_the_ID())) ?>" class="lien-footer"><img src="<?= $facebook['sizes']['imgReseaux'] ?>" alt=""></a>
                            </li>
                            <li>
                                <a href="<?= esc_url(get_field('reseau_2', get_the_ID())) ?>" class="lien-footer"><img src="<?= $instagram['sizes']['imgReseaux'] ?>" alt=""></a>
                            </li>
                            <li>
                                <a href="<?= esc_url(get_field('reseau_3', get_the_ID())) ?>" class="lien-footer"><img src="<?= $twitter['sizes']['imgReseaux'] ?>" alt=""></a>
                            </li>
                            <li>
                                <a href="<?= esc_url(get_field('reseau_4', get_the_ID())) ?>" class="lien-footer"><img src="<?= $pinterest['sizes']['imgReseaux'] ?>" alt=""></a>
                            </li>
                            <li>
                                <a href="<?= esc_url(get_field('reseau_5', get_the_ID())) ?>" class="lien-footer"><img src="<?= $newreseau['sizes']['imgReseaux'] ?>" alt=""></a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</footer>
</div>
</body>
