<?php

get_header(); ?>


    <h2 class="title-section">NEWS</h2>

<?php
while (have_posts()) :
    the_post(); ?>
    <div class="container">
        <div class="img-hover-zoom img-hover-zoom-translate mx-auto mb-4">
            <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" class="img-new"></a>
        </div>
        <h3 class="title-new"><?= get_the_title(); ?></h3>
        <span>Posté le : <?= get_the_date('d F Y') ?></span>
        <p class="resume-new mb-4"><?= get_the_content() ?></p>
    </div>

<?php
endwhile; // End of the loop.


 get_footer();