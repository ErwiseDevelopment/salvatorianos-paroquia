<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme Dev
 * 
 * Template Name: Modelo Equipe
 * Template Post Type: page
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php while (have_posts()) : the_post(); ?>

			<section class="py-16 xl:py-24">

				<div class="container grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-y-16 gap-x-10">

					<?php
					$args = array(
						'posts_per_page' => -1,
						'post_type'      => 'equipe',
						'order'          => 'DESC'
					);

					$directors = new WP_Query($args);

					if ($directors->have_posts()):
						while ($directors->have_posts()): $directors->the_post();
					?>
							<div>
								<div class="w-full h-[524px] 2xl:w-[428px] 2xl:h-[626px] flex justify-center items-center">
									<img class="w-full h-full object-cover" src="<?php echo get_field('imagem_conselho') ?>" alt="<?php the_title() ?> - Salvatorianos" />
								</div>

								<h6 class="text-xl xl:text-3xl 2xl:text-[44px] font-black font-red-hat-display text-center text-[#2C295C] mt-2">
									<?php the_title() ?>
								</h6>

								<div class="my-4 px-10">
									<div class="w-full h-[14px] bg-[#94C901]"></div>
								</div>

								<span class="block text-base xl:text-xl 2xl:text-[26px] font-medium font-red-hat-display text-center text-[#4D8D3F]">
									<?php echo get_field('cargo') ?> <br />
									<?php echo get_field('descricao_conselho') ?>
								</span>
							</div>
					<?php
						endwhile;
					endif;

					wp_reset_query();
					?>
				</div>
			</section>
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
