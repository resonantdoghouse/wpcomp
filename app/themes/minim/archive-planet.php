<?php

get_header();

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            $params = array();

            $planets = pods('planet', $params);


            if (0 < $planets->total()) {
                while ($planets->fetch()) {

                    $permalink = $planets->field('permalink');
                    $image = $planets->field('planet_image');
                    $image_url = pods_image_url($image, $size = 'medium', $default = 0, $force = false);

                    $diameter = $planets->field('planet_diameter');

                    ?>

                    <h2><a href="<?= $permalink; ?>"><?= $planets->display('planet_name'); ?></a></h2>


                    <?php

                    if (!empty($image_url)): ?>
                        <img src="<?php echo $image_url; ?>">
                        <?php
                    endif;

                    if (!empty($diameter)): ?>
                        <p><?php echo $diameter . ' km'; ?></p>

                        <?php
                    endif;

                    ?>

                    <p><?php echo $planets->display('planet_description'); ?></p>

                    <?php

                } // end of  loop
            } // end of  planets
            ?>


        </main><!-- .site-main -->

        <?php get_sidebar('content-bottom'); ?>

    </div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>