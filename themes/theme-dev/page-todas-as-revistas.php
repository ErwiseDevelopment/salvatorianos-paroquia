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

			<section class="py-20">

				<div class="container grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

					<?php
					$book_args = array(
						'posts_per_page' => -1,
						'post_type'      => '3d-flip-book',
						'order'          => 'DESC',
					);

					$book = new WP_Query($book_args);

					if ($book->have_posts()):
						while ($book->have_posts()): $book->the_post();
							$thumbnail_id = get_field('3dfb_thumbnail', get_the_ID())['data']['post_ID'];

							$thumbnail_post = get_post((int) $thumbnail_id);
					?>
							<a href="<?php the_permalink() ?>" target="_blank" rel="noreferrer noopener">
								<img class="w-full xl:h-[450px] object-cover" src="<?php echo $thumbnail_post->guid; ?>" alt="<?php the_title() ?> - Salvatorianos" />

								<p class="2xl:text-xl font-bold font-red-hat-display text-center text-[#2C285B] mt-6">
									Jan/Fev/Mar - 2024
								</p>

								<div class="flex justify-center">
									<span class="transition hover:scale-90 rounded-full inline-block text-xl 2xl:text-3xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] mt-6 py-3 2xl:py-4 px-8">
										Acesse agora
									</span>
								</div>
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
