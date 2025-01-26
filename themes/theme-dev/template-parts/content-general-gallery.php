<section class="pt-24">

    <!-- gallery desktop -->
    <div class="hidden xl:grid grid-cols-3">
        <?php
        $link_pattern = get_field('link_padrao_portal', 'option');

        $link_gallery = get_field('link_da_galeria', 'option');

        $url = $link_pattern . $link_gallery;

        $request_posts = wp_remote_get($url);

        if (!is_wp_error($request_posts)) :
            $body = wp_remote_retrieve_body($request_posts);

            $data = json_decode($body);

            if (!is_wp_error($data)) :

                foreach ($data as $rest_post):
                    if (in_array(get_field('categoria_da_editoria_galeria', 'option'), $rest_post->editoria)):
        ?>
                        <div class="col-span-1">
                            <a class="gallery-item" href="<?php echo $rest_post->link; ?>" target="_blank" rel="noreferrer noopener">
                                <img class="w-full h-[400px] 2xl:h-[500px] object-cover block" src="<?php echo $rest_post->acf->capa_galeria; ?>" alt="<?php echo $rest_post->title->rendered; ?> - Salvatorianos" />

                                <div class="gallery-item-box">
                                    <p class="gallery-item-title">
                                        <?php echo $rest_post->title->rendered; ?>
                                    </p>

                                    <p class="gallery-item-read-more">
                                        ver mais
                                    </p>
                                </div>
                            </a>
                        </div>
        <?php
                    endif;
                endforeach;
            endif;
        endif;
        ?>
    </div>
    <!-- end gallery desktop -->

    <!-- gallery mobile -->
    <div class="xl:hidden">

        <!-- swiper -->
        <div class="swiper js-swiper-gallery">

            <div class="swiper-wrapper">

                <!-- slide -->
                <!--
                $albums = new WP_Query($args);

                if ($albums->have_posts()):
                    while ($albums->have_posts()): $albums->the_post();
                ?>
                        <div class="swiper-slide">
                            <img class="w-full h-[260px] lg:h-[400px] object-cover block" src="<php echo get_field('capa_galeria') ?>" alt="<php the_title() ?> - Salvatorianos" />
                        </div>
                <php
                    endwhile;
                endif;

                wp_reset_query();
                -->
                <!-- end slide -->
            </div>
        </div>
        <!-- end swiper -->
    </div>
    <!-- end gallery mobile -->

    <div class="flex justify-center mt-12">
        <?php if (isset($args['button_link'])): ?>
            <a class="button-cta bg-gradient-theme" href="<?php echo get_home_url(null, 'albuns?editoria=' . $args['button_link']) ?>">
                Ver tudo
            </a>
        <?php else: ?>
            <a class="button-cta bg-gradient-theme" href="<?php echo get_home_url(null, 'albuns') ?>">
                Ver tudo
            </a>
        <?php endif; ?>
    </div>
</section>