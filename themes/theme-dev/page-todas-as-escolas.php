<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme Dev
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php while (have_posts()) : the_post(); ?>
            <!-- school carousel -->
            <?php echo get_template_part('template-parts/content', 'school-carousel') ?>
            <!-- end parishes carousel -->
        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
