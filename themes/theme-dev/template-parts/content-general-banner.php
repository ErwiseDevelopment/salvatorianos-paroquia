<section class="h-[120px] lg:h-[310px] xl:h-[388px] 2xl:h-[580px]">
    <!-- swiper -->
    <div class="swiper swiper-banner h-full js-swiper-banner">

        <div class="swiper-wrapper">

            <!-- slide -->
            <?php
            $banners = new WP_Query($args);

            if ($banners->have_posts()):
                while ($banners->have_posts()): $banners->the_post();
            ?>
                    <div class="swiper-slide">
                        <a href="<?php echo get_field('link_banner') ?>" target="_blank" rel="noreferrer noopener">
                            <img class="w-full h-full object-cover" src="<?php echo get_field('imagem_banner') ?>" alt="<?php the_title() ?> - Salvatorianos" />
                        </a>
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
</section>