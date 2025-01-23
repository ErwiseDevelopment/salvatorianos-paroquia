<?php
$testimonials_color = '';

$testimonials_background = '';

if (have_rows('general_depoimentos', 'option')) {
    while (have_rows('general_depoimentos', 'option')) {
        the_row();

        $testimonials_color = get_sub_field('cor');

        $testimonials_background = get_sub_field('imagem_de_fundo');
    }
}
?>
<section class="bg-cover bg-no-repeat py-20" style="background-image: url(<?php echo $testimonials_background; ?>)">

    <div class="container grid grid-cols-3 gap-10">

        <div class="col-span-full">

            <h3 class="text-6xl font-bold font-abril-display text-center text-white">
                Depoimento dos Paróquianos
            </h3>
        </div>

        <?php
        $args = array(
            'posts_per_page' => -1,
            'post_type'      => 'depoimento'
        );

        $testimonials = new WP_Query($args);

        if ($testimonials->have_posts()):
            while ($testimonials->have_posts()): $testimonials->the_post();
        ?>
                <div class="border border-black flex flex-col items-center gap-y-6 bg-[#F5E5D1] py-8 px-6">

                    <div class="w-52 h-52 overflow-hidden border-8 rounded-full" style="border-color:<?php echo $testimonials_color; ?>;background-color:<?php echo $testimonials_color; ?>">
                        <img class="w-full h-full object-cover" src="<?php echo get_field('foto') ?>" alt="<?php the_title() ?> - Salvatorianos" />
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold font-red-hat-display mb-4" style="color:<?php echo $testimonials_color; ?>">
                            <?php the_title() ?>
                        </h3>

                        <p class="text-sm font-normal font-red-hat-display  ">
                            <?php echo get_field('depoimento'); ?>
                        </p>
                    </div>
                </div>
        <?php
            endwhile;
        endif;

        wp_reset_query();
        ?>
    </div>
</section>