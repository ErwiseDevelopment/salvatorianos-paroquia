<section class="pt-20">

    <div class="container flex justify-center">
        <?php
        $book_args = array(
            'posts_per_page' => 1,
            'post_type'      => '3d-flip-book',
            'order'          => 'DESC'
        );

        $book = new WP_Query($book_args);

        if ($book->have_posts()):
            while ($book->have_posts()): $book->the_post();
                $thumbnail_id = get_field('3dfb_thumbnail', 243)['data']['post_ID'];

                $thumbnail_post = get_post((int) $thumbnail_id);
        ?>
                <div class="w-9/12 grid grid-cols-2 gap-8">

                    <div class="pr-12">
                        <img class="w-full object-cover" src="<?php echo $thumbnail_post->guid; ?>" alt="<?php the_title() ?> - Salvatorianos" />
                    </div>

                    <div>
                        <div class="relative">

                            <div class="w-full h-[2px] bottom-2 left-0 absolute pr-5">
                                <div class="w-full h-[2px] bg-[#E0E0E0]"></div>
                            </div>

                            <div class="relative pb-2">
                                <h4 class="text-6xl font-black font-red-hat-display text-[#7137F0]">
                                    Última edição
                                </h4>

                                <div class="w-full h-2 flex justify-end mt-3 pr-5">
                                    <div class="w-48 h-2 translate-y-[2px] bg-[#92C900]"></div>
                                </div>
                            </div>
                        </div>

                        <p class="font-bold font-red-hat-display text-center text-[#2C285B] mt-6">
                            Jan/Fev/Mar - 2024
                        </p>

                        <span class="block text-lg font-medium font-red-hat-display text-[#7137F0] mt-4">
                            <?php echo get_field('resumo_edicao') ?>
                        </span>

                        <a class="transition hover:scale-90 rounded-full inline-block text-xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] mt-6 py-3 px-8" href="<?php the_permalink() ?>" target="_blank" rel="noreferrer noopener">
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