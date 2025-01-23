<section class="pt-20">

    <div class="container grid grid-cols-4 gap-4">

        <div class="col-span-full relative mb-8">

            <div class="w-[424px] h-[2px] bottom-2 left-0 absolute bg-[#E0E0E0]"></div>

            <div class="relative pb-2">
                <h4 class="text-4xl font-black font-red-hat-display text-[#7137F0]">
                    Saiba tudo sobre nossas paróquias
                </h4>

                <div class="w-48 h-2 translate-y-[2px] bg-[#92C900] mt-2"></div>
            </div>
        </div>

        <?php for ($i = 0; $i < 4; $i++) : ?>
            <?php echo get_template_part('components/new-item') ?>
        <?php endfor; ?>

        <div class="col-span-full flex justify-center mt-12">
            <a class="button-cta" href="#">
                Todas as notícias das paróquias
            </a>
        </div>
    </div>
</section>