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

				<div class="container flex flex-wrap">

					<div class="w-full">
						<?php
						$posts_ids_hidden = [];

						$request_post = wp_remote_get(get_posts_detail_api('main'));

						if (!is_wp_error($request_post)) :
							$body = wp_remote_retrieve_body($request_post);

							$data = json_decode($body);

							$post_highlight = $data[0];

							if (!is_wp_error($post_highlight)) :
								array_push($posts_ids_hidden, $post_highlight->id);
						?>
								<a class="news-item h-[320px]" href="<?php echo $post_highlight->link; ?>">
									<div class="w-full h-full">
										<img class="news-item-thumbnail" src="<?php echo $post_highlight->featured_image_src; ?>" alt="<?php echo $post_highlight->title->rendered; ?>" />
									</div>

									<div class="bottom-0 left-0 absolute z-10 p-8">
										<span class="inline-block text-lg xl:text-xl 2xl:text-[26px] font-bold font-red-hat-display text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] py-[2px] px-10">
											Destaque
										</span>

										<h2 class="text-2xl xl:text-3xl 2xl:text-[46px] font-black font-red-hat-display text-white mt-2">
											<?php echo get_limit_words($post_highlight->title->rendered, 8); ?>
										</h2>

										<p class="text-base sxl:text-lg 2xl:text-xl font-semibold font-red-hat-display uppercase tracking-widest hover:underline text-[#8DAA32]">
											Leia mais >
										</p>
									</div>
								</a>
						<?php
							endif;
						endif;
						?>
					</div>
				</div>
			</section>
			<!-- end news detail -->

			<!-- blogs -->
			<section class="py-10 xl:pt-20 xl:pb-28">

				<div class="container grid grid-cols-4 gap-4">

					<div class="col-span-full grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
						<?php
						$request_posts = wp_remote_get(get_blogs_api($posts_ids_hidden));

						dd(get_blogs_api($posts_ids_hidden));

						if (!is_wp_error($request_posts)) :
							$body = wp_remote_retrieve_body($request_posts);

							$data = json_decode($body);

							if (!is_wp_error($data)) :

								foreach ($data as $rest_post):
									// echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting(true));

									$thumbnail = isset($rest_post->featured_image_src) ? $rest_post->featured_image_src : '';

									echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting($thumbnail, $rest_post->title->rendered, $rest_post->content->rendered, $rest_post->excerpt->rendered, $rest_post->link));
								endforeach;
							endif;
						endif;
						?>
					</div>
				</div>
			</section>
			<!-- end blogs -->
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
