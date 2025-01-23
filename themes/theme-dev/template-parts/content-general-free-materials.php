<section class="bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] mt-24 py-10">

    <div class="container">

        <div class="relative flex justify-between">

            <div class="w-full h-[2px] bottom-2 left-0 absolute bg-[#E0E0E0]"></div>

            <div class="relative pb-2">
                <h4 class="text-2xl xl:text-4xl 2xl:text-[42px] font-black font-red-hat-display text-white">
                    Materiais exclusivos <br />
                    e gratuitos
                </h4>

                <div class="w-48 h-2 translate-y-[2px] bg-[#92C900]"></div>
            </div>

            <div class="hidden xl:flex justify-end items-end">
                <a class="translate-y-2 transition hover:opacity-90 rounded-full relative inline-block text-xl 2xl:text-2xl font-bold font-red-hat-display text-center uppercase text-white bg-[#27225C] py-2 px-8" href="<?php echo get_home_url(null, '/materiais-gratuitos?editoria=' . $wp->request) ?>">
                    Ver tudo
                </a>
            </div>
        </div>

        <div class="grid grid-cols-2 xl:grid-cols-4 gap-16 mt-6">

            <!-- loop -->
            <?php
            $materials = new WP_Query($args);

            if ($materials->have_posts()) :
                while ($materials->have_posts()) : $materials->the_post();
            ?>
                    <a class="col-span-1 flex flex-col items-center" href="<?php echo get_field('link_banner_materiais') ?>" target="_blank" rel="noreferrer noopener">

                        <div class="w-[120px] xl:w-[240px] h-[120px] xl:h-[240px] rounded-full overflow-hidden flex justify-center items-center bg-white mb-2">
                            <img class="w-full h-full object-cover" src="<?php echo get_field('imagem_banner_materiais') ?>" alt="<?php the_title() ?> - Salvatoriano" />
                        </div>

                        <h6 class="text-xl 2xl:text-2xl font-black font-red-hat-display text-center text-white mb-2" style="line-height:110%">
                            <?php echo get_limit_words(get_the_title(), 8); ?>
                        </h6>

                        <span class="tracking-[2px] inline-block text-sm 2xl:text-base font-medium font-red-hat-display text-center uppercase hover:underline text-[#2C285B]">
                            Baixar
                        </span>
                    </a>
            <?php
                endwhile;
            endif;

            wp_reset_query();
            ?>
            <!-- end loop -->
        </div>

        <div class="flex xl:hidden justify-center mt-10">
            <a class="rounded-full relative inline-block text-lg font-bold font-red-hat-display text-center uppercase text-white bg-[#27225C] py-2 px-8" href="#">
                Ver tudo
            </a>
        </div>
    </div>
</section>