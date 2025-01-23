<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evolutap
 * 
 * Template Name: Modelo de Conteúdo
 * Template Post Type: page
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php while (have_posts()) : the_post(); ?>
            <!-- banner -->
            <section class="pt-6">
                <div class="container">
                    <?php
                    $alt = get_the_title();

                    the_post_thumbnail('post-thumbnail', array(
                        'class' => 'w-full h-[220px] xl:h-[500px] object-cover',
                        'alt'   => $alt
                    ));
                    ?>
                </div>
            </section>
            <!-- end banner -->

            <!-- content -->
            <section class="pt-10 pb-32">

                <div class="container">

                    <div class="w-full">

                        <div class="w-full xl:w-[500px] flex fle-wrap items-center">
                            <div class="w-1/2 h-[10px] bg-[#acd63e]"></div>
                            <div class="w-1/2 h-[2px] bg-[#e0e0e0]"></div>
                        </div>

                        <div class="content pt-6">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end content -->
        <?php endwhile; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
