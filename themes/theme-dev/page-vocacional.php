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

			<!-- banner -->
			<?php
			$editorial_category_name = get_categories_setting()['editorials']['vocacional']['name'];

			echo get_template_part('template-parts/content', 'general-banner', get_query_custom('banners', $editorial_category_name));
			?>
			<!-- end banner -->

			<!-- news editorial -->
			<?php
			$editorial_category_slug = get_categories_setting()['editorials']['vocacional']['slug'];

			echo get_template_part('template-parts/content', 'general-news-editorial', get_general_news_editorial_setting('Saiba tudo sobre nossas vocações', $editorial_category_slug, 'Todas as notícias vocacionais', 'noticias?categoria=vocacional'))
			?>
			<!-- end news editorial -->

			<!-- gallery -->
			<?php echo get_template_part('template-parts/content', 'general-gallery', ['query' => get_query_custom('galeria', $editorial_category_name), 'button_link' => $editorial_category_name]) ?>
			<!-- end gallery -->

			<!-- banner welcome -->
			<?php echo get_template_part('template-parts/content', 'general-banner-welcome') ?>
			<!-- end banner welcome -->

			<!-- our pedagogue -->
			<section class="pt-10 xl:py-32">

				<div class="container 2xl:max-w-full flex flex-wrap justify-center xl:px-0">

					<div class="w-5/12 translate-x-10 relative hidden xl:flex justify-end items-end z-10">
						<div class="w-full h-[560px] 2xl:h-[750px] 2xl:scale-110 2xl:translate-x-3">
							<img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri() ?>/resources/images/vocacoes.png" alt="Vocações - Salvatorianos" />
						</div>
					</div>

					<div class="w-full lg:w-9/12 xl:w-7/12 xl:-translate-x-10 flex items-end">
						<div class="2xl:h-full xl:rounded-tl-[250px] 2xl:xl:rounded-tl-[350px] xl:rounded-tr-[250px] 2xl:xl:rounded-tr-[350px] xl:rounded-br-[250px] 2xl:xl:rounded-br-[350px] bg-gradient-purple py-16 xl:py-24 2xl:py-48 px-8 xl:px-32 2xl:px-48">
							<p class="text-lg xl:text-2xl 2xl:text-4xl font-medium font-red-hat-display text-white" style="line-height:140%">
								A vida religiosa Salvatoriana é uma maneira de
								viver o seguimento de Jesus como Salvador
								do mundo.

								<br />

								<span class="text-[#A1E000]">
									Ser religioso Salvatoriano é crer na vida,
									é confiar na ação de Deus, é estar cheio
									de esperança, é cultivar ideais nobres, é
									envolver a todos na construção de um
									mundo melhor.
								</span>

								<br />

								O Salvatoriano é aquele que se sente salvo
								por Jesus, já que Ele é seu amigo, irmão e
								Senhor e por isso quer conduzir outros à
								salvação.
							</p>
						</div>
					</div>

					<div class="w-11/12 xl:w-8/12 -translate-y-4 xl:-translate-y-10 relative flex justify-center 2xl:justify-end z-20">
						<p class="inline-block text-xl xl:text-3xl 2xl:text-[40px] font-bold font-red-hat-display text-center uppercase text-white bg-gradient-green p-8">
							saiba mais sobre nossas vocações
						</p>
					</div>
				</div>
			</section>
			<!-- end our pedagogue -->

			<!-- blog -->
			<?php echo get_template_part('template-parts/content', 'general-blog', get_general_blog_setting($editorial_category_slug, 'vocacional')) ?>
			<!-- end blog -->

			<!-- free materials -->
			<?php echo get_template_part('template-parts/content', 'general-free-materials', get_query_custom('materiais', $editorial_category_name, 4)) ?>
			<!-- end free materials -->
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
