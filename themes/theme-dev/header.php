<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Dev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body <?php body_class(); ?> x-data="{ openMenu: false }" x-bind:class="openMenu ? 'overflow-hidden' : ''">

    <div id="page" class="site">
        <!-- top social media -->
        <?php echo get_template_part('template-parts/content', 'top-social-media') ?>
        <!-- end top social media -->

        <!-- menu editorials -->
        <?php echo get_template_part('template-parts/content', 'menu-editorials'); ?>
        <!-- end menu editorials -->

        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', ''); ?></a>

        <?php
        if (isset(get_pages_editorials_settings()[$post->post_name]['header_background'])) {
            $has_header_background = true;
        } else {
            $has_header_background = false;
        }
        ?>

        <?php
        $menu_color_primry = '';

        $menu_color_secondary = '';

        if (have_rows('menu', 'option')) :
            while (have_rows('menu', 'option')) : the_row();
                $menu_color_primary = get_sub_field('cor_primaria');

                $menu_color_secondary = get_sub_field('cor_secundaria');
            endwhile;
        endif;
        ?>

        <style>
            .bg-gradient-theme {
                background-image: linear-gradient(to right, <?php echo get_field('general_cor_primaria
', 'option') ?>, <?php echo get_field('general_cor_secundaria', 'option') ?>);
            }

            .main-nav-item:nth-of-type(odd) .main-nav-link {
                background-color: <?php echo $menu_color_primary; ?>
            }

            .main-nav-item:nth-of-type(even) .main-nav-link {
                background-color: <?php echo $menu_color_secondary; ?>
            }
        </style>

        <div class="relative">
            <header class="<?php echo get_hidden_banner_title($post->post_type, $post->post_name) === true ? 'w-full top-0 left-0 absolute' : ''; ?> <?php echo $has_header_background ? 'header-background' : ''; ?>"
                style="<?php echo $has_header_background ? 'background-image: url(' . get_template_directory_uri() . '/resources/images/header-background.png)' : '' ?>">

                <div class="container hidden lg:flex flex-wrap px-2 xl:px-4">

                    <div class="w-3/12 relative hidden lg:block">

                        <a class="lg:w-[300px] xl:w-[280px] 2xl:w-[380px] lg:h-[300px] xl:h-[280px] 2xl:h-[380px] -translate-y-32 2xl:-translate-y-56 translate-x-12 xl:translate-x-28 2xl:translate-x-16 rounded-full absolute flex justify-center items-end bg-white pb-8 z-10" style="box-shadow:rgba(0, 0, 0, 0.1) 0px 0px 57px 0px inset" href="<?php echo get_home_url(null, '/') ?>">
                            <img class="w-28" src="<?php echo get_template_directory_uri() ?>/resources/images/logo-bja.png" alt="Salvatorianos" />
                        </a>
                    </div>

                    <div class="w-full lg:w-9/12 flex flex-col py-4">

                        <div class="h-16 mb-4">

                            <ul class="h-full grid grid-cols-6">

                                <?php
                                if ($post->post_parent != 0) {
                                    $request_uri = get_post($post->post_parent)->post_name;
                                } else {
                                    $request_uri = $wp->request;
                                }
                                ?>

                                <li class="main-nav-item flex justify-end">
                                    <a class="w-full lg:w-[90px] xl:w-[80px] h-full transition hover:opacity-90 rounded-tl-[9999px] rounded-bl-[9999px] flex justify-center items-center <?php echo $wp->request == '' ? 'bg-[#914F9B]' : 'bg-[#8134F4]'; ?> py-6 xl:py-4 px-8 xl:px-6" href="<?php echo get_home_url(null, '/') ?>">
                                        <img class="w-full h-full" src="<?php echo get_template_directory_uri() ?>/resources/images/icon-home.png" alt="Home - Salvatoriano" />
                                    </a>
                                </li>

                                <?php
                                foreach (get_menu()['menu_top'] as $menu_item) :
                                ?>
                                    <li class="main-nav-item">
                                        <a class="main-nav-link <?php echo $request_uri == $menu_item['url'] ? 'is-active' : ''; ?> <?php echo $menu_item['last'] ? 'rounded-tr-[9999px] rounded-br-[9999px]' : '' ?>" href="<?php echo get_home_url(null, '/' . $menu_item['url']) ?>">
                                            <?php echo $menu_item['title']; ?>
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>

                        <div class="h-16 relative">

                            <span class="w-[60px] h-full top-0 xl:right-full absolute hidden lg:block <?php echo $request_uri == 'paroquias' ? 'bg-[#26245C]' : 'bg-[#83AB1E]'; ?>"></span>

                            <ul class="h-full grid grid-cols-6">

                                <?php
                                foreach (get_menu()['menu_bottom'] as $menu_item) :
                                ?>
                                    <li class="main-nav-item">
                                        <a class="main-nav-link <?php echo $request_uri == $menu_item['url'] ? 'is-active' : ''; ?> <?php echo $menu_bottom['first'] ? 'rounded-tl-full rounded-bl-full xl:rounded-none' : '' ?> <?php echo $menu_item['last'] ? 'rounded-tr-[9999px] rounded-br-[9999px]' : '' ?> bg-[#83AB1E]" href="<?php echo get_home_url(null, '/' . $menu_item['url']) ?>">
                                            <?php echo $menu_item['title']; ?>
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if ($post->post_parent != 0) {
                        $page_parent_name = get_post($post->post_parent)->post_name;

                        if (isset(get_pages_editorials_settings()[$page_parent_name]['menu'])) {
                            echo get_template_part('template-parts/content', 'menu-secondary', get_menu_secondary_setting($page_parent_name));
                        }
                    } else {
                        if (isset(get_pages_editorials_settings()[$post->post_name]['menu'])) {
                            echo get_template_part('template-parts/content', 'menu-secondary', get_menu_secondary_setting($post->post_name));
                        }
                    }
                    ?>
                </div>

                <div
                    class="container h-10 relative flex lg:hidden bg-white"
                    x-data="{ openMenu: false }">

                    <div class="w-3/12 bg-red-500">

                    </div>

                    <div class="w-9/12 flex justify-end items-center">
                        <button
                            class="border- border-black rounded-md py-[2px] px-2"
                            x-on:click="openMenu = !openMenu">
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                            </svg>
                        </button>
                    </div>

                    <div
                        class="w-full h-screen top-0 left-0 fixed flex flex-col gap-y-6 bg-gradient-theme p-8 z-50"
                        x-show="openMenu"
                        x-cloak
                        x-transition:enter="transition duration-500"
                        x-transition:enter-start="translate-x-full"
                        x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition duration-500"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="translate-x-full">

                        <div class="flex justify-end">
                            <button x-on:click="openMenu = !openMenu">
                                <svg class="w-8 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                                </svg>
                            </button>
                        </div>

                        <div>
                            <ul class="flex flex-col gap-y-1">
                                <?php
                                foreach (get_menu()['menu_top'] as $menu_item) :
                                ?>
                                    <li class="main-nav-item">
                                        <a class="text-xl font-medium text-center text-white <?php echo $request_uri == $menu_item['url'] ? 'is-active' : ''; ?>" href="<?php echo get_home_url(null, '/' . $menu_item['url']) ?>">
                                            <?php echo $menu_item['title']; ?>
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>

                                <?php
                                foreach (get_menu()['menu_bottom'] as $menu_item) :
                                ?>
                                    <li class="main-nav-item">
                                        <a class="text-xl font-medium text-center text-white <?php echo $request_uri == $menu_item['url'] ? 'is-active' : ''; ?>" href="<?php echo get_home_url(null, '/' . $menu_item['url']) ?>">
                                            <?php echo $menu_item['title']; ?>
                                        </a>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- general banner title -->
            <?php
            if (get_hidden_banner_title($post->post_type, $post->post_name)) {
                echo get_template_part('template-parts/content', 'general-banner-title', get_general_banner_title_setting($post));
            }
            ?>
            <!-- end general banner title -->
        </div>

        <div> <!-- #content -->