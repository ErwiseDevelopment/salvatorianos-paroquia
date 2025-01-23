<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme Dev
 * 
 * Template Name: Modelo Comunidade
 * Template Post Type: page
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php while (have_posts()) : the_post(); ?>
            <!-- parishes carousel -->
            <?php echo get_template_part('template-parts/content', 'parishes-carousel') ?>
            <!-- end parishes carousel -->
        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
