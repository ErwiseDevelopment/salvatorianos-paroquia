<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Dev
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if (get_the_terms(get_the_ID(), 'category')[0]->slug == 'sem-categoria') :
			get_template_part('template-parts/content', 'page');
		else:
			while (have_posts()) : the_post();


				if (!empty(get_single_post_category())) {
					$setting = get_single_post_setting()[get_single_post_category()->slug];
				} else {
					$setting = '';
				}
		?>
				<section class="pt-6 pb-10 xl:pb-32">

					<div class="container flex flex-wrap">

						<div class="w-full">
							<div class="w-full h-[420px]">
								<?php echo get_post_thumbnail_custom('w-full h-full object-cover') ?>
							</div>

							<p class="text-sm 2xl:text-base font-semibold font-red-hat-display uppercase tracking-[2px] text-[#8DAA32] mt-8">
								<?php echo get_format_date(get_the_date('d/m/Y')); ?>
							</p>

							<h1 class="text-5xl 2xl:text-[54px] font-black font-red-hat-display text-[#7137F0] mt-4 pb-">
								<?php the_title() ?>
							</h1>

							<div class="w-full xl:w-[600px] flex flex-wrap items-center my-6">
								<div class="w-1/2 h-[10px] bg-gradient-green"></div>

								<div class="w-1/2 h-[2px] bg-[#E1E1E1]"></div>
							</div>
						</div>

						<div class="w-full xl:w-8/12 pr-8">
							<?php
							if (get_single_post_categories()) : ?>
								<div class="flex gap-4">
									<!-- loop -->
									<?php
									foreach (get_single_post_categories() as $single_post_category) :
										if (isset($single_post_category->name)) :
									?>
											<p class="text-lg 2xl:text-xl font-bold font-red-hat-display uppercase text-center text-white bg-gradient-green py-1 px-8">
												<?php echo $single_post_category->name; ?>
											</p>
									<?php
										endif;
									endforeach;
									?>
								</div>
							<?php endif; ?>

							<span class="post-content">
								<?php the_content() ?>
							</span>
						</div>

						<div class="w-full xl:w-4/12 mt-8 xl:mt-0">
							<!-- loop -->
							<?php
							$relation = isset(get_single_post_categories()[1]) ? 'AND' : 'OR';

							$other_posts_args = array(
								'posts_per_page' => 3,
								'post_type'      => 'post',
								'post__not_in'   => array(get_the_ID()),
								'tax_query'      => array(
									'relation' => $relation,
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => get_single_post_categories()[0]->term_id
									),
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => isset(get_single_post_categories()[1]->term_id) ? get_single_post_categories()[1]->term_id : ''
									),
								)
							);

							$other_posts = new WP_Query($other_posts_args);

							if ($other_posts->have_posts()) :
								while ($other_posts->have_posts()) : $other_posts->the_post();
							?>
									<a class="border border-[#252525] block mb-6 last:mb-0" href="<?php the_permalink() ?>">
										<div class="w-full h-[230px] overflow-hidden">
											<?php echo get_post_thumbnail_custom('w-full h-full object-cover') ?>
										</div>

										<div class="p-6">
											<p class="text-lg 2xl:text-xl font-bold font-red-hat-display text-[#56913E]" style="line-height:100%">
												<?php echo get_single_post_editorial()->name; ?>

												<span class="block text-xs 2xl:text-sm font-bold font-red-hat-display text-[#56913E]">
													<?php echo get_format_date(get_the_date('d/m/Y')); ?>
												</span>
											</p>

											<h5 class="text-2xl 2xl:text-[28px] font-black font-red-hat-display text-[#2C285B] mt-3" style="line-height:100%">
												<?php the_title() ?>
											</h5>

											<p class="transition hover:scale-90 inline-block text-xs 2xl:text-base font-bold font-red-hat-display text-center uppercase text-white bg-gradient-green mt-3 py-2 px-8">
												Ler mais
											</p>
										</div>
									</a>
							<?php
								endwhile;
							endif;

							wp_reset_query();
							?>
							<!-- end loop -->
						</div>

						<div class="w-full xl:w-8/12">
							<div class="flex justify-center xl:justify-end mt-10 xl:mt-24">
								<a class="button-cta" href="<?php echo $setting['button_link']; ?>">
									<?php echo $setting['button_title']; ?>
								</a>
							</div>
						</div>
					</div>
				</section>
		<?php
			endwhile;
		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
