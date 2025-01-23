<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme Dev
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php while (have_posts()) : the_post(); ?>

			<section class="py-24">

				<div class="container grid grid-cols-1 lg:grid-cols-3 gap-16 xl:px-32">

					<?php
					if (isset($_GET['editoria']) && $_GET['editoria'] != '') {
						$editorial_category_slug = $_GET['editoria'];

						$editorial_category = get_term_by('slug', $editorial_category_slug, 'editoria');

						$args = array(
							'posts_per_page' => -1,
							'post_type'      => 'materiais',
							'order'          => 'DESC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'editoria',
									'field'    => 'term_id',
									'terms'    => $editorial_category->term_id
								)
							)
						);
					} else {
						$args = array(
							'posts_per_page' => -1,
							'post_type'      => 'materiais',
							'order'          => 'DESC'
						);
					}

					$materials = new WP_Query($args);

					if ($materials->have_posts()):
						while ($materials->have_posts()): $materials->the_post();
					?>
							<a
								class="flex flex-col items-center"
								href="<?php echo get_field('link_banner_materiais') ?>"
								target="_blank"
								rel="noreferrer noopener"
								x-data="{ hoverImage: false }"
								x-on:mouseover="hoverImage = true"
								x-on:mouseout="hoverImage = false">
								<div class="w-[216px] 2xl:w-[376px] h-[216px] 2xl:h-[376px] rounded-full shadow-2xl overflow-hidden">
									<img
										class="w-full h-full transition duration-200 object-cover"
										x-bind:class="hoverImage == true ? 'scale-[1.1]' : 'scale-[1.0]'"
										src="<?php echo get_field('imagem_banner_materiais') ?>"
										alt="<?php the_title() ?> - Salvatorianos" />
								</div>

								<h6 class="text-xl xl:text-2xl 2xl:text-4xl font-black font-red-hat-display text-center text-[#4E8C3F] mt-4">
									<?php the_title() ?>
								</h6>

								<p class="text-2xl 2xl:text-3xl font-medium font-red-hat-display text-center tracking-[6px] uppercase text-[#2C285B] mt-4">
									Baixar
								</p>
							</a>
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
