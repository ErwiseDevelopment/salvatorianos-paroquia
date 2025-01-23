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

			<section class="relative">

				<div class="w-full top-1/2 left-0 -translate-y-1/2 absolute bg-gradient-to-r from-[#8134f4] to-[#5312b8]" style="height:calc(100% - 8rem)"></div>

				<div class="container relative grid grid-cols-1 xl:grid-cols-2 gap-4 px-32 xl:px-4">

					<div class="col-span-1 flex justify-center">
						<img class="w-44 lg:w-96 xl:w-full" src="<?php echo get_template_directory_uri() ?>/resources/images/candle.png" alt="Vela Virtual - Salvatorianos" />
					</div>

					<div class="col-span-1 flex flex-col justify-center xl:px-10">
						<h4 class="text-2xl xl:text-5xl 2xl:text-[52px] font-black font-red-hat-display text-white mb-6">
							Acenda sua vela!
						</h4>

						<form action="">

							<div class="mb-4">
								<input class="input-field" type="text" name="name" placeholder="Nome" />
							</div>

							<div class="mb-4">
								<textarea class="textarea-field" name="message" placeholder="Pedido de oração"></textarea>
							</div>

							<div>
								<input class="btn-submit" type="submit" value="Reze por mim!" />
							</div>
						</form>
					</div>
				</div>
			</section>

			<section class="pt-40 pb-56">

				<div class="container grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 xl:gap-16">

					<?php for ($i = 0; $i < 9; $i++) : ?>
						<div class="flex flex-col items-center">
							<div class="w-[180px] xl:w-[230px] 2xl:w-[286px] h-[180px] xl:h-[230px] 2xl:h-[286px] rounded-full overflow-hidden flex justify-center items-center bg-gradient-b-green-200">
								<img class="" src="<?php echo get_template_directory_uri() ?>/resources/images/icon-candle.png" alt="Vela Virtual - Salvatorianos" />
							</div>

							<h5 class="text-xl md:text-2xl xl:text-4xl 2xl:text-5xl font-medium font-red-hat-display text-center text-[#4B837B] mt-4">
								Acesa por <br />
								<span class="font-extrabold text-[#7137F0]">
									Maria
								</span>
							</h5>
						</div>
					<?php endfor; ?>
				</div>
			</section>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
