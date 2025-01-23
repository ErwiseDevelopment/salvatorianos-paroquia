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

		<?php while (have_posts()) : the_post(); ?>

			<section class="py-14">

				<div class="container grid grid-cols-1 xl:grid-cols-4 gap-4">

					<!-- loop -->
					<?php foreach (get_field('fotos_galeria') as $key => $photo): ?>
						<div class="photo-item js-photo-item" data-value="<?php echo $key; ?>">
							<img class="w-full h-full object-cover" src="<?php echo $photo ?>" alt="<?php the_title() ?> - Salvatorianos" />
						</div>
					<?php endforeach; ?>
					<!-- end loop -->
				</div>
			</section>

			<!-- modal -->
			<div class="photo-modal js-photo-modal">

				<div class="photo-modal-overlay js-photo-modal-overlay"></div>

				<div class="container h-full flex justify-center">

					<div class="w-full xl:w-8/12">

						<div class="photo-modal-box">

							<!-- swiper -->
							<div class="swiper h-full rounded-xl js-swiper-photos">

								<div class="swiper-wrapper">

									<!-- slide -->
									<?php foreach (get_field('fotos_galeria') as $photo): ?>
										<div class="swiper-slide">
											<img class="w-full h-full object-cover" src="<?php echo $photo ?>" alt="<?php the_title() ?> - Salvatorianos" />
										</div>
									<?php endforeach; ?>
									<!-- end slide -->
								</div>
							</div>

							<div class="swiper-button-prev js-swiper-button-prev-photos"></div>
							<div class="swiper-button-next js-swiper-button-next-photos"></div>
							<!-- end swiper -->
						</div>
					</div>
				</div>
			</div>
			<!-- end modal -->
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
