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
					$link_pattern = get_field('link_padrao_portal', 'option');

					$link_materials = get_field('link_da_materiais_gratuitos', 'option');

					$url = $link_pattern . $link_materials;

					$request_posts = wp_remote_get($url);

					if (!is_wp_error($request_posts)) :
						$body = wp_remote_retrieve_body($request_posts);

						$data = json_decode($body);

						if (!is_wp_error($data)) :

							foreach ($data as $rest_post):
								if (in_array(get_field('categoria_da_editoria_materiais_gratuitos', 'option'), $rest_post->editoria)):
					?>
									<a
										class="flex flex-col items-center"
										href="<?php echo $rest_post->acf->link_banner_materiais; ?>"
										target="_blank"
										rel="noreferrer noopener"
										x-data="{ hoverImage: false }"
										x-on:mouseover="hoverImage = true"
										x-on:mouseout="hoverImage = false">
										<div class="w-[216px] 2xl:w-[376px] h-[216px] 2xl:h-[376px] rounded-full shadow-2xl overflow-hidden">
											<img
												class="w-full h-full transition duration-200 object-cover"
												x-bind:class="hoverImage == true ? 'scale-[1.1]' : 'scale-[1.0]'"
												src="<?php echo $rest_post->acf->imagem_banner_materiais ?>"
												alt="<?php echo $rest_post->title->rendered ?> - Salvatorianos" />
										</div>

										<h6 class="text-xl xl:text-2xl 2xl:text-4xl font-black font-red-hat-display text-center text-[#4E8C3F] mt-4">
											<?php echo $rest_post->title->rendered ?>
										</h6>

										<p class="text-2xl 2xl:text-3xl font-medium font-red-hat-display text-center tracking-[6px] uppercase text-[#2C285B] mt-4">
											Baixar
										</p>
									</a>
					<?php
								endif;
							endforeach;
						endif;
					endif;
					?>
				</div>
			</section>
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
