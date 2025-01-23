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
			<!-- news detail -->
			<section class="pt-10 xl:pt-24">

				<div class="container flex flex-wrap xl:px-24">

					<div class="w-full lg:w-7/12 xl:w-8/12 pr-4">
						<?php
						$news_featured_args = array(
							'posts_per_page' => 1,
							'post_type'      => 'post',
							'category_name'  => 'blog',
							'order'          => 'DESC'
						);

						$news_featured = new WP_Query($news_featured_args);

						if ($news_featured->have_posts()):
							while ($news_featured->have_posts()): $news_featured->the_post();
						?>
								<a class="news-item" href="<?php the_permalink() ?>">
									<div class="w-full h-full">
										<?php echo get_post_thumbnail_custom('news-item-thumbnail') ?>
									</div>

									<div class="bottom-0 left-0 absolute z-10 p-8">
										<span class="inline-block text-lg xl:text-xl 2xl:text-[26px] font-bold font-red-hat-display text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] py-[2px] px-10">
											Destaque
										</span>

										<h2 class="text-2xl xl:text-3xl 2xl:text-[46px] font-black font-red-hat-display text-white mt-2">
											<?php echo get_limit_words(get_the_title(), 8); ?>
										</h2>

										<p class="text-base sxl:text-lg 2xl:text-xl font-semibold font-red-hat-display uppercase tracking-widest hover:underline text-[#8DAA32]">
											Leia mais >
										</p>
									</div>
								</a>
						<?php
							endwhile;
						endif;

						wp_reset_query();
						?>
					</div>

					<div class="w-full lg:w-5/12 xl:w-4/12">

						<div class="border border-black bg-[#EDEDED] py-8 px-4">
							<h3 class="text-2xl xl:text-4xl 2xl:text-[56px] font-black font-red-hat-display text-center text-[#7137F0]">
								Categorias
							</h3>

							<ul class="mt-6">

								<?php foreach (get_categories_setting()['editorials'] as $key => $value) : ?>
									<?php if ($value['title'] != 'Portal'): ?>
										<li class="mb-2 last:mb-0">
											<a class="block text-base xl:text-xl 2xl:text-[26px] font-medium font-red-hat-display text-center text-white py-3" style="background-color: <?php echo $value['color']; ?>" href="<?php echo get_home_url(null, 'blog?editoria=' . $key); ?>">
												<?php echo $value['title']; ?>
											</a>
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- end news detail -->

			<!-- news -->
			<section class="py-10 xl:pt-20 xl:pb-28">

				<div class="container grid grid-cols-4 gap-4">

					<div class="col-span-full grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
						<?php
						$news_category_slug = get_categories_setting()['categories']['blog']['slug'];

						$news_category = get_category_by_slug($news_category_slug);

						if (isset($_GET['editoria'])) {
							$editorial_category = get_category_by_slug($_GET['editoria']);

							$news_args = array(
								'posts_per_page' => -1,
								'post_type'      => 'post',
								'tax_query'      => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => $news_category->term_id
									),
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => $editorial_category->term_id
									),
								)
							);
						} else {
							$news_args = array(
								'posts_per_page' => -1,
								'post_type'      => 'post',
								'category_name'  => $news_category->slug,
								'order'          => 'DESC'
							);
						}

						$news_editorial = new WP_Query($news_args);

						if ($news_editorial->have_posts()) :
							while ($news_editorial->have_posts()) : $news_editorial->the_post();
								echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting(true));
							endwhile;
						endif;

						wp_reset_query();
						?>
					</div>
				</div>
			</section>
			<!-- end news -->
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
