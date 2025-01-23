<!-- <section class="pt-14">

    <div class="container flex flex-wrap justify-center">

        <div class="w-8/12 xl:w-5/12 xl:translate-x-10">
            <div>
                <img src="<?php echo get_template_directory_uri() ?>/resources/images/pe-jordan.png" alt="Pe. Jordan - Salvatoriano" />
            </div>
        </div>

        <div class="w-full xl:w-6/12 -translate-y-10 xl:-translate-x-10 flex items-end">
            <div class="rounded-tl-[150px] rounded-tr-[150px] rounded-br-[150px] bg-gradient-purple p-16">
                <p class="text-xl xl:text-3xl font-bold font-red-hat-display uppercase text-white">
                    “sê um verdadeiro apóstolo de jesus cristo, e não sossegues até que tenhas levado a palavra de deus a todos os recantos da terra.”
                </p>

                <p class="text-base xl:text-xl font-medium font-red-hat-display text-white">
                    Bem-aventurado Francisco Jordan
                </p>
            </div>
        </div>

        <div class="w-11/12 xl:w-8/12 -translate-y-16 xl:-translate-y-10 flex justify-center">
            <p class="inline-block text-xl xl:text-3xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-green p-4">
                reze pela canonização do pe. jordan
            </p>
        </div>
    </div>
</section> -->

<section class="py-14">

    <div class="container 2xl:max-w-full flex flex-wrap justify-center">

        <div class="w-5/12 translate-x-16 xl:translate-x-32 2xl:translate-x-0 hidden xl:block 2xl:flex justify-end">
            <div class="w-[378px] 2xl:w-[640px] h-auto">
                <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri() ?>/resources/images/pe-jordan.png" alt="Pe. Jordan - Salvatoriano" />
            </div>
        </div>

        <div class="w-full lg:w-9/12 xl:w-5/12 xl:-translate-x-10 flex items-end">
            <div class="2xl:w-[850px] 2xl:h-[628px] xl:rounded-tl-[150px] 2xl:rounded-tl-[250px] xl:rounded-tr-[150px] 2xl:rounded-tr-[250px] xl:rounded-br-[150px] 2xl:rounded-br-[250px] flex flex-col justify-center bg-gradient-purple p-8 xl:p-16 2xl:px-36">
                <p class="text-xl xl:text-2xl 2xl:text-[42px] font-bold font-red-hat-display uppercase text-white" style="line-height:120%">
                    “<?php echo $args['content']; ?>”
                </p>

                <p class="text-lg 2xl:text-xl font-medium font-red-hat-display text-white">
                    <!-- Bem-aventurado Francisco Jordan -->
                    <?php echo $args['author']; ?>
                </p>
            </div>
        </div>

        <div class="w-11/12 xl:w-8/12 -translate-y-4 xl:-translate-y-10 flex justify-center">
            <p class="inline-block text-xl xl:text-2xl 2xl:text-4xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-green p-4 2xl:py-10 2xl:px-36">
                <!-- reze pela canonização do pe. jordan -->
                <?php echo $args['phrase']; ?>
            </p>
        </div>
    </div>
</section>