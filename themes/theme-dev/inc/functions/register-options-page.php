<?php

function acf_create_page()
{
        if (function_exists('acf_add_options_page')) {
                acf_add_options_page(
                        array(
                                'page_title' => 'Informações Gerais',
                                'menu_title' => 'Informações Gerais',
                                'menu_slug'  => 'informacoes_gerais',
                                'capability' => 'edit_posts',
                                'position'   => '23,3',
                                'redirect'   => false,
                                'icon_url'   => 'dashicons-info'
                        )
                );

                acf_add_options_page(
                        array(
                                'page_title' => 'API',
                                'menu_title' => 'API',
                                'menu_slug'  => 'api',
                                'capability' => 'edit_posts',
                                'position'   => '23,4',
                                'redirect'   => false,
                                'icon_url'   => 'dashicons-rest-api',
                        )
                );
        }
}
add_action('init', 'acf_create_page');
