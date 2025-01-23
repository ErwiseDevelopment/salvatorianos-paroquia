<section class="pt-20">

    <div class="container flex justify-center">
        <?php
        $book_args = array(
            'posts_per_page' => 1,
            'post_type'      => '3d-flip-book',
            'order'          => 'DESC'
        );

        $book = new WP_Query($book_args);

        $book_first_id = null;

        if ($book->have_posts()):
            while ($book->have_posts()): $book->the_post();
                $book_first_id = get_the_ID();

                $thumbnail_id = get_field('3dfb_thumbnail', get_the_ID())['data']['post_ID'];

                $thumbnail_post = get_post((int) $thumbnail_id);
        ?>
                <div class="w-full xl:w-9/12 grid grid-cols-1 xl:grid-cols-2 gap-8">

                    <div class="xl:pr-12">
                        <img class="w-full object-cover" src="<?php echo $thumbnail_post->guid; ?>" alt="<?php the_title() ?> - Salvatorianos" />
                    </div>

                    <div class="flex xl:block flex-col items-center">
                        <div class="relative">

                            <div class="w-full h-[2px] bottom-2 left-0 absolute pr-5">
                                <div class="w-full h-[2px] bg-[#E0E0E0]"></div>
                            </div>

                            <div class="relative pb-2">
                                <h4 class="text-3xl xl:text-6xl 2xl:text-[77px] font-black font-red-hat-display text-[#7137F0]">
                                    Última edição
                                </h4>

                                <div class="w-full h-2 flex justify-end mt-3 pr-5">
                                    <div class="w-full xl:w-48 h-2 translate-y-[2px] bg-[#92C900]"></div>
                                </div>
                            </div>
                        </div>

                        <p class="2xl:text-xl font-bold font-red-hat-display text-center text-[#2C285B] mt-6">
                            Jan/Fev/Mar - 2024
                        </p>

                        <span class="block text-lg 2xl:text-[26px] font-medium font-red-hat-display text-[#7137F0] mt-4">
                            <?php echo get_field('resumo_edicao') ?>
                        </span>

                        <a class="transition hover:scale-90 rounded-full inline-block text-xl 2xl:text-3xl   font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] mt-6 py-3 px-8" href="<?php the_permalink() ?>" target="_blank" rel="noreferrer noopener">
                            Acesse agora
                        </a>
                    </div>
                </div>
        <?php
            endwhile;
        endif;

        wp_reset_query();
        ?>
    </div>
</section>

<section class="pt-20">

    <div class="container grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <?php
        $book_args = array(
            'posts_per_page' => -1,
            'post_type'      => '3d-flip-book',
            'order'          => 'DESC',
            'post__not_in'   => array($book_first_id)
        );

        $book = new WP_Query($book_args);

        if ($book->have_posts()):
            while ($book->have_posts()): $book->the_post();
                $thumbnail_id = get_field('3dfb_thumbnail', get_the_ID())['data']['post_ID'];

                $thumbnail_post = get_post((int) $thumbnail_id);
        ?>
                <a href="<?php the_permalink() ?>" target="_blank" rel="noreferrer noopener">
                    <img class="w-full object-cover" src="<?php echo $thumbnail_post->guid; ?>" alt="<?php the_title() ?> - Salvatorianos" />

                    <p class="2xl:text-xl font-bold font-red-hat-display text-center text-[#2C285B] mt-6">
                        Jan/Fev/Mar - 2024
                    </p>

                    <div class="flex justify-center">
                        <span class="transition hover:scale-90 rounded-full inline-block text-xl 2xl:text-3xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] mt-6 py-3 2xl:py-4 px-8">
                            Acesse agora
                        </span>
                    </div>
                </a>
        <?php
            endwhile;
        endif;

        wp_reset_query();
        ?>

        <div class="col-span-full flex justify-center mt-10">
            <a class="transition hover:scale-90 rounded-full inline-block text-xl 2xl:text-2xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#7C33EE] to-[#2D2463] py-2 px-8" href="#">
                Edições anteriores
            </a>
        </div>
    </div>
</section>