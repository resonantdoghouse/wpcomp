<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php

            $slug = pods_v('last', 'url');
            $planet = pods('planet', $slug);
            $name = $planet->field('planet_name');
            $description = $planet->field('planet_description');
            $images = $planet->field('planet_image');

            ?>

            <h1><?= $name; ?></h1>
            <p><?= $description; ?></p>

            <?php
            foreach ($images as $image) {
                echo pods_image($image, 'thumbnail');
            }
            ?>

        </main><!-- .site-main -->

        <?php get_sidebar('content-bottom'); ?>

    </div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>