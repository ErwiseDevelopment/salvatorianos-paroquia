<?php
function create_post_type()
{
    register_post_type('banners', array(
        'labels'         => array('name' => 'Banners', 'singular_name' => 'Banners', 'all_items' => 'Todos'),
        'public'         => true,
        'has_archive'     => true,
        'menu_icon'     => 'dashicons-book',
        'supports'         => array('title',  'author', 'thumbnail')
    ));

    register_post_type('depoimento', array(
        'labels'         => array('name' => 'Depoimentos', 'singular_name' => 'Depoimento', 'all_items' => 'Todos'),
        'public'         => true,
        'has_archive'    => true,
        'menu_icon'      => 'dashicons-admin-home',
        'supports'       => array('title',  'author')
    ));

    register_post_type('galeria', array(
        'labels'         => array('name' => 'Galeria', 'singular_name' => 'Galeria', 'all_items' => 'Todos'),
        'public'         => true,
        'has_archive'     => true,
        'menu_icon'     => 'dashicons-book',
        'supports'         => array('title',  'author')
    ));
}
add_action('init', 'create_post_type');

//Criar taxonomia:

function create_taxonomy()
{
    // Registrar a taxonomia 'editoria' para todos os tipos de post
    $post_types = array('agendas', 'locais', 'materiais', 'videos',  'galeria');

    register_taxonomy('editoria', $post_types, array(
        'labels'             => array(
            'name'              => 'Editorias',
            'singular_name'     => 'Editorias'
        ),
        'hierarchical'       => true,
        'show_admin_column'  => true,
    ));
}
add_action('init', 'create_taxonomy');
