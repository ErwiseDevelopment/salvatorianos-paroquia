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
			$editorial_category_name = get_categories_setting()['editorials']['institucional']['name'];

			echo get_template_part('template-parts/content', 'general-banner', get_query_custom('banners', $editorial_category_name))
			?>
			<!-- end banner -->

			<!-- news editorial -->
			<?php
			$editorial_category_slug = get_categories_setting()['editorials']['institucional']['slug'];

			echo get_template_part('template-parts/content', 'general-news-editorial', get_general_news_editorial_setting('Confira o que está acontecendo em nossa Província', $editorial_category_slug, 'Todas as notícias institucionais', 'noticias?categoria=institucional'))
			?>
			<!-- end news editorial -->

			<!-- our pedagogue -->
			<section class="pt-10 xl:py-32">

				<div class="container 2xl:max-w-full flex flex-wrap justify-center xl:px-0">

					<div class="w-5/12 translate-x-10 relative hidden xl:flex justify-end items-end z-10">
						<div class="w-full h-[560px] 2xl:h-[1160px] 2xl:translate-x-4">
							<img class="w-full h-full translate-x-16 scale-[1.2] 2xl:scale-100 object-contain" src="<?php echo get_template_directory_uri() ?>/resources/images/carisma.png" alt="Institucional - Salvatorianos" />
						</div>
					</div>

					<div class="w-full lg:w-9/12 xl:w-7/12 xl:-translate-x-10 flex items-end">
						<div class="2xl:h-[924px] xl:rounded-tl-[250px] 2xl:xl:rounded-tl-[350px] xl:rounded-tr-[250px] 2xl:rounded-tr-[350px] xl:rounded-br-[250px] 2xl:rounded-br-[350px] bg-gradient-purple py-16 xl:py-24 2xl:pt-48 px-8 xl:px-32 2xl:px-36">
							<h4 class="text-xl xl:text-3xl 2xl:text-[44px] font-bold font-red-hat-display text-[#AFDF0F]" style="line-height:140%">
								Os Salvatorianos são o resultado do amor e do sonho do Pe. Francisco Maria da Cruz Jordan.
							</h4>

							<p class="text-lg xl:text-2xl 2xl:text-4xl font-medium font-red-hat-display text-white" style="line-height:140%">
								Somos uma congregação religiosa que busca que Jesus seja conhecido e amado como o Salvador do Mundo. Queremos envolver a todos neste sonho, nesta forma de vida. Estamos presentes em muitos países, mais de 30, e queremos crescer ainda mais. Venha nos conhecer!
							</p>
						</div>
					</div>

					<div class="w-full xl:w-8/12 -translate-y-4 xl:-translate-y-10 relative flex justify-center 2xl:justify-end z-20">
						<p class="inline-block text-xl xl:text-3xl 2xl:text-[42px] font-bold font-red-hat-display text-center uppercase text-white bg-gradient-green p-4 2xl:py-10 2xl:px-48">
							Conheça nossa carisma
						</p>
					</div>
				</div>
			</section>
			<!-- end our pedagogue -->

			<!-- blog -->
			<?php echo get_template_part('template-parts/content', 'general-blog', get_general_blog_setting($editorial_category_slug, 'institucional')) ?>
			<!-- blog -->

			<!-- jordan prayer -->
			<!-- <php echo get_template_part('template-parts/content', 'general-jordan-prayer') ?> -->
			<?php echo get_template_part('template-parts/content', 'general-prayer', get_general_prayer_setting('Enquanto houver um homem no mundo que não conheça a Deus e O ame acima de todas as coisas, você não pode descansar.', 'Bem-aventurado Francisco Jordan', 'conheça nosso fundador')) ?>
			<!-- jordan prayer -->

			<div class="mt-10"></div>
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
