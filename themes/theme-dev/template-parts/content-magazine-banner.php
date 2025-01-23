<section class="h-screen mt-4">
    <!-- swiper -->
    <div class="swiper h-full js-swiper-home-banner">

        <div class="swiper-wrapper">

            <!-- slide -->
            <?php for ($i = 0; $i < 4; $i++) : ?>
                <div class="swiper-slide">
                    <a href="#">
                        <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri() ?>/resources/images/home-banner-1.png" alt="Banner - Salvatorianos" />
                    </a>
                </div>
            <?php endfor; ?>
            <!-- end slide -->
        </div>
    </div>
    <!-- end swiper -->
</section>