<?php
global $web; ?>

<footer class="footer bg-parallax">
    <div class="bg-color"></div>
    <div class="container">
        <div class="row">
            <div class="column col-lg-4">
                <div>
                    <div>
                        <a href="<?= esc_url(home_url('/')) ?>">
                            <img src="<?= get_template_directory_uri() ?>/asset/img/mynursery.png"
                                 alt="logo_mynursery" id="logo-footer"/>
                        </a>
                    </div>
                    <?php
                    $info = get_post_meta(139);
                    /* echo '<pre>';
                     print_r($info);
                     echo '<pre>';*/ ?>

                    <div>
                        <ul>
                            <?php if (!empty($info['ladresse'][0])) { ?>
                                <li><?= $info['ladresse'][0]; ?></li>
                            <?php }
                            if (!empty($info['le_numero_de_telephone'][0])) { ?>
                                <li><?= $info['le_numero_de_telephone'][0]; ?></li>
                            <?php }
                            if (!empty($info['ladresse_email'][0])) { ?>
                                <li><?= $info['ladresse_email'][0]; ?></li>
                            <?php } ?>
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
                                <a href="<?= esc_url(home_url('/')) ?>" class="lien-footer">Home</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['features']['slug'])) ?>"
                                   class="lien-footer">Features</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['pages']['slug'])) ?>" class="lien-footer">Pages</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['gallery']['slug'])) ?>"
                                   class="lien-footer">Gallery</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['blog']['slug'])) ?>" class="lien-footer">Blog</a>
                            </li>
                            <li>
                                <a href="<?= esc_url(home_url($web['pages']['contact']['slug'])) ?>"
                                   class="lien-footer">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <?php
            $args = array(
                'post_type' => 'reseaux',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'date',
            );
            $the_query = new WP_Query($args);
            ?>
            <div class="column col-lg-3">
                <div>
                    <div>
                        <h4>Social</h4>
                        <ul id="logo-social">
                            <?php
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    ?>

                                    <?php
                                    $logo = get_the_post_thumbnail_url(get_the_ID(), 'imgReseaux');
                                    if (!empty($logo)) { ?>
                                        <li>
                                           <a href="<?= get_the_content(); ?>" class="lien-footer"> <img src="<?= $logo; ?>" alt=""> </a>
                                        </li>
                                    <?php }
                                }
                            }
                            wp_reset_postdata(); ?>
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
