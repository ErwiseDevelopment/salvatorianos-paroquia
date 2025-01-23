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

		<?php
		while (have_posts()) :
			the_post(); ?>
			<!-- banner -->
			<?php
			$editorial_category_name = get_categories_setting()['editorials']['revistas']['single_name'];

			echo get_template_part('template-parts/content', 'general-banner', get_query_custom('banners', $editorial_category_name));
			?>
			<!-- end banner -->

			<!-- last edition -->
			<?php echo get_template_part('template-parts/content', 'magazine-editions') ?>
			<!-- end last edition -->

			<!-- prayer -->
			<?php echo get_template_part('template-parts/content', 'magazine-prayer') ?>
			<!-- prayer -->
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
