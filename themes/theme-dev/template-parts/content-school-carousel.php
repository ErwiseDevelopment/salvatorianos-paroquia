<section class="bg-[#f0f0f0] py-20">

    <div class="container">

        <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

            <!-- loop -->
            <?php
            $school_args = array(
                'posts_per_page' => -1,
                'post_type'      => 'escolas',
                'order'          => 'DESC'
            );

            $school = new WP_Query($school_args);

            $index = 0;

            if ($school->have_posts()):
                while ($school->have_posts()): $school->the_post();
            ?>
                    <div class="flex flex-col js-parishe-item" data-value="<?php echo ++$index; ?>">

                        <div>
                            <img class="w-full h-[280px] object-cover" src="<?php echo get_field('imagem_escola') ?>" alt="<?php the_title() ?> - Salvatorianos" />
                        </div>

                        <h5 class="text-2xl 2xl:text-3xl font-black font-red-hat-display text-center text-[#6D37E8] mt-4">
                            <?php the_title() ?>
                        </h5>

                        <p class="2xl:text-xl font-bold text-center uppercase text-[#8FAB31] mt-2">
                            <?php echo get_field('local_escola') ?>
                        </p>

                        <div class="flex justify-center mt-4">
                            <span class="transition hover:scale-90 inline-block text-[10px] 2xl:text-xs font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] cursor-pointer py-2 px-8">
                                Conheça
                            </span>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;

            wp_reset_query();
            ?>
            <!-- end loop -->
        </div>
    </div>

    <!-- modal -->
    <div class="parishes-modal js-parishes-modal">

        <div class="container flex justify-center">

            <div class="w-full xl:w-10/12">
                <!-- loop -->
                <?php
                $school_args = array(
                    'posts_per_page' => -1,
                    'post_type'      => 'escolas',
                    'order'          => 'DESC'
                );

                $school = new WP_Query($school_args);

                $index = 0;

                if ($school->have_posts()):
                    while ($school->have_posts()): $school->the_post();
                ?>
                        <div class="parishes-modal-box js-parishe-modal-item" data-value="<?php echo ++$index; ?>">

                            <div class="h-full grid grid-cols-1 xl:grid-cols-5 gap-y-4 xl:gap-4">

                                <div class="col-span-full xl:col-span-2">

                                    <div class="w-full h-[290px] xl:h-full rounded-xl overflow-hidden">
                                        <img class="w-full h-full object-cover" src="<?php echo get_field('imagem_escola', get_the_ID()) ?>" alt="<?php the_title() ?> - Salvatorianos" />
                                    </div>
                                </div>

                                <div class="col-span-full xl:col-span-3 p-4">

                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-2xl xl:text-4xl 2xl:text-[42px] font-black font-red-hat-display text-[#7137F0]">
                                            <?php the_title() ?>
                                        </h3>

                                        <button class="border border-red-500 rounded-xl hidden xl:inline-block text-sm font-bold font-red-hat-display text-red-500 hover:text-white hover:bg-red-500 py-2 px-4 js-parishes-modal-close">
                                            Fechar x
                                        </button>
                                    </div>

                                    <span class="block text-xs 2xl:text-sm font-normal font-red-hat-display text-[#2E2E2E] mb-4">
                                        <?php echo get_field('descricao_escola') ?>
                                    </span>

                                    <p class="text-sm font-normal font-red-hat-display text-[#2E2E2E] mb-2">
                                        <span class="font-bold">Local: </span> <?php echo get_field('local_escola') ?>
                                    </p>

                                    <p class="text-sm font-normal font-red-hat-display text-[#2E2E2E] mb-2">
                                        <span class="font-bold">Whatsapp: </span> <?php echo get_field('whatsapp_escola') ?>
                                    </p>

                                    <p class="text-sm font-normal font-red-hat-display text-[#2E2E2E] mb-2">
                                        <span class="font-bold">Telefone: </span> <?php echo get_field('telefone_escola') ?>
                                    </p>

                                    <p class="text-sm font-normal font-red-hat-display text-[#2E2E2E]">
                                        <span class="font-bold">E-mail: </span> <?php echo get_field('e-mail_escola') ?>
                                    </p>

                                    <button class="border border-red-500 rounded-xl xl:hidden text-sm font-bold font-red-hat-display text-red-500 hover:text-white hover:bg-red-500 mt-6 py-2 px-4 js-parishes-modal-close">
                                        Fechar x
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;

                wp_reset_query();
                ?>
                <!-- end loop -->
            </div>
        </div>
    </div>
    <!-- end modal -->
</section>