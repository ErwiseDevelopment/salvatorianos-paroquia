<section class="pt-20 xl:pt-44">

    <div class="container">

        <!-- videos desktop -->
        <div class="hidden xl:grid grid-cols-3 gap-14">
            <!-- loop -->
            <?php
            $videos = new WP_Query($args);

            if ($videos->have_posts()) :
                while ($videos->have_posts()) : $videos->the_post();
            ?>
                    <div class="col-span-1">

                        <div class="w-full h-[280px] video">
                            <!-- <iframe class="w-full h-full" src="https://www.youtube.com/embed/8sBuWPxXvpk?si=cBt_TtHMfyLga-Qx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                            <?php echo get_field('link_video') ?>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;

            wp_reset_query();
            ?>
            <!-- end loop -->
        </div>
        <!-- end videos desktop -->

        <!-- videos mobile -->
        <div class="xl:hidden">

            <!-- swiper -->
            <div class="swiper js-swiper-videos">

                <div class="swiper-wrapper">

                    <!-- slide -->
                    <?php
                    $videos = new WP_Query($args);

                    if ($videos->have_posts()) :
                        while ($videos->have_posts()) : $videos->the_post();
                    ?>
                            <div class="swiper-slide">
                                <div class="w-full h-[400px] xl:h-[280px] video">
                                    <?php echo get_field('link_video') ?>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;

                    wp_reset_query();
                    ?>
                    <!-- end slide -->
                </div>
            </div>
            <!-- end swiper -->
        </div>
        <!-- end videos mobile -->
    </div>

    <div class="flex justify-center mt-12">
        <a class="button-cta" href="<?php echo get_home_url(null, 'videos') ?>">
            Ver tudo
        </a>
    </div>
</section>