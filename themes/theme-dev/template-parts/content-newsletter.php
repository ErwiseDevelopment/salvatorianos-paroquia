<?php
$newsletter_background_color = '';

$newsletter_color = '';

$newsletter_background = '';

if (have_rows('general_newsletter', 'option')) {
    while (have_rows('general_newsletter', 'option')) {
        the_row();

        $newsletter_background_color = get_sub_field('cor_do_fundo');

        $newsletter_color = get_sub_field('cor_do_texto');

        $newsletter_background = get_sub_field('imagem');
    }
}
?>

<section class="overflow-hidden" style="background-color:<?php echo $newsletter_background_color; ?>">

    <div class="container flex flex-wrap justify-center">

        <div class="w-11/12 xl:w-5/12">
            <img class="w-full h-full object-cover" src="<?php echo $newsletter_background ?>" alt="Newsletter - Salvatoriano" />
        </div>

        <div class="w-full lg:w-9/12 xl:w-5/12 flex flex-col justify-end mt-6 xl:mt-0 pb-12 xl:pl-12">

            <h6 class="text-2xl xl:text-4xl font-black font-red-hat-display text-center xl:text-start" style="color:<?php echo $newsletter_color; ?>">
                Assine nossa <br />
                Newsletter
            </h6>

            <p class="text-2xl font-normal font-red-hat-display mb-4" style="color:<?php echo $newsletter_color; ?>">
                e receba conteúdos exclusivos
            </p>

            <?php echo do_shortcode('[contact-form-7 id="9238e99" title="Newsletter"]') ?>

            <!-- <form>

                <div class="grid">

                    <div class="mb-4">
                        <input class="input-field" type="text" name="nome" placeholder="Nome" />
                    </div>

                    <div class="mb-5">
                        <input class="input-field" type="email" name="email" placeholder="E-mail" />
                    </div>

                    <div class="flex justify-center xl:justify-start">
                        <input class="btn-submit" type="submit" value="Quero receber!" />
                    </div>
                </div>
            </form> -->
        </div>
    </div>
</section>