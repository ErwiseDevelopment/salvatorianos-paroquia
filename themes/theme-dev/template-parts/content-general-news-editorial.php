<section class="pt-10 xl:pt-20">

    <div class="container grid grid-cols-4 gap-4">

        <div class="col-span-full relative mb-8">

            <div class="w-full xl:w-[424px] h-[2px] bottom-2 left-0 absolute bg-[#E0E0E0]"></div>

            <div class="relative pb-2">
                <h4 class="text-2xl xl:text-4xl 2xl:text-[42px] font-black font-red-hat-display text-[#7137F0]">
                    <?php echo $args['title'] ?>
                </h4>

                <div class="w-48 h-2 translate-y-[2px] bg-[#92C900] mt-2"></div>
            </div>
        </div>

        <!-- desktop -->
        <div class="col-span-full hidden xl:grid grid-cols-4 gap-4">
            <?php
            $news_args = array(
                'posts_per_page' => 4,
                'post_type'      => 'post',
                'tax_query'      => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $args['news_category']
                    ),
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $args['editorial_category']
                    ),
                )
            );

            $news_editorial = new WP_Query($news_args);

            if ($news_editorial->have_posts()) :
                while ($news_editorial->have_posts()) : $news_editorial->the_post();
                    echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting());
                endwhile;
            endif;

            wp_reset_query();
            ?>
        </div>
        <!-- end desktop -->

        <!-- mobile -->
        <div class="col-span-full xl:hidden">

            <!-- swiper -->
            <div class="swiper js-swiper-general-news-editorial">

                <div class="swiper-wrapper">

                    <!-- slide -->
                    <?php
                    $news_args = array(
                        'posts_per_page' => 4,
                        'post_type'      => 'post',
                        'tax_query'      => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => $args['news_category']
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => $args['editorial_category']
                            ),
                        )
                    );

                    $news_editorial = new WP_Query($news_args);

                    if ($news_editorial->have_posts()) :
                        while ($news_editorial->have_posts()) : $news_editorial->the_post();
                    ?>
                            <div class="swiper-slide">
                                <?php echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting()); ?>
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
        <!-- end mobile -->

        <div class="col-span-full flex justify-center mt-12">
            <a class="button-cta" href="<?php echo $args['button_link'] ?>">
                <?php echo $args['button_title'] ?>
            </a>
        </div>
    </div>
</section>