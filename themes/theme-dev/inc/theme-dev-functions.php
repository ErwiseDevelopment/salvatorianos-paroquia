<?php

function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

show_admin_bar(false);

register_nav_menus(array(
    'primary' => 'Menu Primário',
));

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';

    die();
}

function get_file_uri(string $path)
{
    return get_template_directory_uri() . '/' . $path;
}

function get_theme_file(string $path)
{
    return get_template_directory() . '/' . $path;
}

function register_assets(string $handle, string $src, $in_footer = false)
{
    $id = false;

    if (file_exists(get_theme_file('mix-manifest.json'))) {
        $contents = file_get_contents(get_theme_file('mix-manifest.json'));

        $key = '/' . $src;

        if (str_contains($contents, $src)) {
            $manifest = json_decode($contents);
            if (str_contains($manifest->$key, '?id')) {
                $id = explode('?id=', $manifest->$key)[1];
            }
        }
    }

    if (str_contains($src, '.css')) {
        wp_enqueue_style($handle, get_file_uri($src), array(), $id);
    }

    if (str_contains($src, '.js')) {
        wp_enqueue_script($handle, get_file_uri($src), array(), $id, $in_footer);
    }
}

function get_sanitize_string($str)
{
    $str = trim($str);
    $str = str_replace(array('.', '-', '/', ' '), "", $str);

    return $str;
}

function get_limit_words($string, $word_limit)
{
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
        array_push($words, "...");
    }
    return implode(' ', $words);
}

function get_months($abbr = true)
{
    if ($abbr) {
        return [
            '01' => 'Jan',
            '02' => 'Fev',
            '03' => 'Mar',
            '04' => 'Abr',
            '05' => 'Mai',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Ago',
            '09' => 'Set',
            '10' => 'Out',
            '11' => 'Nov',
            '12' => 'Dez'
        ];
    }

    return [
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    ];
}

function get_month($month)
{
    return get_months()[$month];
}

function get_editorials_categories_setting(): array
{
    return [
        'editoria-educacao' => [
            'title' => 'Educação',
            'color' => '#048F35'
        ],
        'editoria-institucional' => [
            'title' => 'Institucional',
            'color' => '#1B9333'
        ],
        'editoria-obras-sociais' => [
            'title' => 'Obras Sociais',
            'color' => '#389731'
        ],
        'editoria-paroquias' => [
            'title' => 'Paróquias',
            'color' => '#4E9B2E'
        ],
        'editoria-pe-jordan' => [
            'title' => 'Pe. Joradan',
            'color' => '#63A02B'
        ],
        'editoria-portal' => [
            'title' => 'Portal',
            'color' => '#72A625'
        ],
        'editoria-revistas' => [
            'title' => 'Revistas',
            'color' => '#72A625'
        ],
        'editoria-vocacional' => [
            'title' => 'Vocacional',
            'color' => '#83AB1E'
        ]
    ];
}

function get_categories_setting()
{
    return [
        'categories' => [
            'blog' => [
                'title' => 'Blog',
                'slug'  => 'blog'
            ],
            'featured' => [
                'title' => 'Destaque',
                'slug'  => 'destaque'
            ],
            'news' => [
                'title' => 'Notícia',
                'slug'  => 'noticia'
            ]
        ],
        'editorials' => [
            'educacao' => [
                'title'   => 'Educação',
                'name'    => 'educacao',
                'slug'    => 'educacao',
                'color'   => '#048F35'
            ],
            'institucional' => [
                'title'   => 'Institucional',
                'name'    => 'institucional',
                'slug'    => 'institucional',
                'color'   => '#1B9333'
            ],
            'obras-sociais' => [
                'title' => 'Obras Sociais',
                'name'  => 'obras-sociais',
                'slug'  => 'obras-sociais',
                'color' => '#389731'
            ],
            'paroquias' => [
                'title' => 'Paróquias',
                'name'  => 'paroquias',
                'slug'  => 'paroquias',
                'color' => '#4E9B2E'
            ],
            'pe-jordan' => [
                'title' => 'Pe. Jordan',
                'name'  => 'pe-jordan',
                'slug'  => 'pe-jordan',
                'color' => '#63A02B'
            ],
            'portal' => [
                'title' => 'Portal',
                'name'  => 'portal',
                'slug'  => 'portal',
                'color' => '#72A625'
            ],
            'revistas' => [
                'title'       => 'Revistas',
                'name'        => 'revistas',
                'single_name' => 'revista',
                'slug'        => 'revistas',
                'color'       => '#72A625'
            ],
            'vocacional' => [
                'title' => 'Vocacional',
                'name'  => 'vocacional',
                'slug'  => 'vocacional',
                'color' => '#83AB1E'
            ],
        ]
    ];
}

function get_editorials(): array
{
    return [
        'educacao' => [
            'categories' => [
                'blog'    => 'educacao-blog',
                'news'    => 'educacao-noticia',
                'slug'    => 'educacao',
                'pattern' => 'editoria-educacao'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Educação'
        ],
        'institucional' => [
            'categories' => [
                'blog'    => 'institucional-blog',
                'news'    => 'institucional-noticia',
                'slug'    => 'institucional',
                'pattern' => 'editoria-institucional'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Institucional'
        ],
        'obras-sociais' => [
            'categories' => [
                'blog' => 'obras-sociais-blog',
                'news' => 'obras-sociais-noticia',
                'slug' => 'obras-sociais',
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Obras Sociais'
        ],
        'paroquias' => [
            'categories' => [
                'blog'    => 'paroquias-blog',
                'news'    => 'paroquias-noticia',
                'slug'    => 'paroquias',
                'pattern' => 'editoria-paroquias'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Paróquias'
        ],
        'pe-jordan' => [
            'categories' => [
                'blog'    => 'pe-jordan-blog',
                'news'    => 'pe-jordan-noticia',
                'slug'    => 'pe-jordan',
                'pattern' => 'editoria-pe-jordan'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Pe. Jordan'
        ],
        'portal' => [
            'categories' => [
                'blog'          => 'portal-blog',
                'blog_featured' => 'portal-blog-destaque',
                'news'          => 'portal-noticia',
                'news_featured' => 'portal-noticia-destaque',
                'slug'          => 'portal',
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Pe. Jordan'
        ],
        'revistas' => [
            'categories' => [
                'blog' => 'revistas-blog',
                'news' => 'revistas-noticia',
                'slug' => 'revistas',
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Revistas'
        ],
        'vocacional' => [
            'categories' => [
                'blog'    => 'vocacional-blog',
                'news'    => 'vocacional-noticia',
                'slug'    => 'vocacional',
                'pattern' => 'editoria-vocacional'
            ],
            'colors' => [
                'primary'   => '#ffd000',
                'secondary' => '#ffa300'
            ],
            'title' => 'Vocacional'
        ],
    ];
}

function get_editorial_slug_by_title(string $title)
{
    $editorials = [
        'Institucional' => 'institucional',
        'Pe. Jordan'    => 'pe-jordan',
        'Vocacional'    => 'vocacional',
        'Paróquias'     => 'paroquias',
        'Educação'      => 'educacao',
        'Obras Sociais' => 'obras-sociais',
        'Revistas'      => 'revista'
    ];

    return $editorials[$title];
}

function get_format_date(string $date)
{
    list($day, $month, $year) = explode('/', $date);

    $month = get_months(false)[$month];

    return $day . ' de ' . $month . ' de ' . $year;
}

/**
 * 
 * Functions Single Post
 */

function get_single_post_setting(): array
{
    return [
        'blog' => [
            'banner_title' => 'Blog',
            'button_title' => 'Todos os blogs',
            'button_link'  => get_home_url(null, '/blog')
        ],

        'noticia' => [
            'banner_title' => 'Notícias',
            'button_title' => 'Todas as notícias',
            'button_link'  => get_home_url(null, '/noticias')
        ],
    ];
}

function get_single_post_editorial()
{
    $post_categories = get_the_category(get_the_ID());

    foreach ($post_categories as $post_category) {
        foreach (get_categories_setting()['editorials'] as $editorial) {
            if ($post_category->slug == $editorial['slug']) {
                return $post_category;
            }
        }
    }
}

function get_single_post_category()
{
    $post_categories = get_the_category(get_the_ID());

    $categories_main = [
        'blog',
        'noticia'
    ];

    if (isset($post_categories)) {
        foreach ($post_categories as $post_category) {
            foreach ($categories_main as $category_main) {
                if ($post_category->slug == $category_main) {
                    return $post_category;
                }
            }
        }
    }

    return [];
}

function get_single_post_categories(): array
{
    $categories = [];

    array_push($categories, get_single_post_category());

    array_push($categories, get_single_post_editorial());

    return $categories;
}

function show_banner_title(object $page): bool
{
    if (isset(get_editorials()[$page->post_name]))
        return false;

    return true;
}

function get_hidden_banner_title(string $type, string $page = null): bool
{
    $pages = [
        'page' => [
            'inicio'        => 'Início',
            'institucional' => 'Institucional',
            'pe-jordan'     => 'Pe. Jordan',
            'vocacional'    => 'Vocacional',
            'paroquias'     => 'Paróquias',
            'educacao'      => 'Educação',
            'obras-sociais' => 'Obras Sociais',
            'revistas'      => 'Revista'
        ]
    ];

    if ($type == 'post') {
        return true;
    }

    if ($type == 'page') {
        if (isset($pages[$type][$page])) {
            return false;
        }
    }

    return true;
}

function get_custom_query(int $posts_per_page = -1, string $post_type = 'post', string $cat_name = '', string $order = 'DESC', array $post__not_in = [])
{
    if ($cat_name != '') {
        return [
            'posts_per_page' => $posts_per_page,
            'post_type'      => $post_type,
            'category_name'  => $cat_name,
            'order'          => $order,
            'post__not_in'   => $post__not_in
        ];
    }

    return [
        'posts_per_page' => $posts_per_page,
        'post_type'      => $post_type,
        'order'          => $order,
        'post__not_in'   => $post__not_in
    ];
}

function get_post_thumbnail_empty_custom(): string
{
    return '<div class="w-full h-full bg-gray-100"></div>';
}

function get_post_thumbnail_custom(string $classe = '')
{
    if (empty(get_post_thumbnail_empty_custom())) {
        return get_post_thumbnail_empty_custom();
    }

    $alt = get_the_title() . ' - Salvatorianos';

    the_post_thumbnail('post-thumbnail', array(
        'class' => $classe,
        'alt'   => $alt
    ));
}

function get_query_custom(string $post_type, string $editorial, int $posts_per_page = -1): array
{
    return array(
        'posts_per_page' => $posts_per_page,
        'post_type'      => $post_type,
        'tax_query'      => array(
            array(
                'taxonomy' => 'editoria',
                'field'    => 'slug',
                'terms'    => array($editorial)
            )
        )
    );
}

function get_general_news_editorial_setting(string $title, string $category_slug, string $button_title, string $button_link): array
{
    $news_category_slug = get_categories_setting()['categories']['news']['slug'];

    $news_category = get_category_by_slug($news_category_slug);

    $editorial_category = get_category_by_slug($category_slug);

    return [
        'title'              => $title,
        'news_category'      => $news_category,
        'editorial_category' => $editorial_category,
        'button_title'       => $button_title,
        'button_link'        => get_home_url(null, $button_link)
    ];
}


function get_general_banner_title_setting($post): array
{
    if (isset($post)) {
        if ($post->post_type == 'post' && !empty(get_single_post_category())) {
            $title = get_single_post_category()->slug == 'blog' ? 'Blog' : 'Notícia';
            $classe = 'banner-post';
        } else {
            $title = get_the_title();
            $classe = 'banner-page';
        }

        return [
            'title' => $title,
            'class' => $classe
        ];
    }

    return [];
}

function get_general_blog_setting(string $editorial_category_slug, string $filter = ''): array
{
    $blog_category_id = get_category_by_slug('blog')->term_id;

    $editorial_category_id = get_category_by_slug($editorial_category_slug)->term_id;

    if (!empty($filter)) {
        $filter = 'blog?categoria=' . $filter;

        return [
            'blog_category_id'      => $blog_category_id,
            'editorial_category_id' => $editorial_category_id,
            'filter'                => $filter
        ];
    }

    $filter = 'blog';

    return [
        'blog_category_id'      => $blog_category_id,
        'editorial_category_id' => $editorial_category_id,
        'filter'                => $filter
    ];
}

function get_general_prayer_setting(string $content, string $author, string $phrase): array
{
    return [
        'content' => $content,
        'author'  => $author,
        'phrase'  => $phrase
    ];
}

function get_menu_secondary_setting(string $menu_name): array
{
    return [
        'menu_name' => $menu_name
    ];
}

// function get_new_item_setting(bool $show_details = true): array
// {
//     $excerpt = null;

//     $category_name = null;

//     if ($show_details) {
//         foreach (get_the_category(get_the_ID()) as $category) {
//             foreach (get_editorials_categories_setting() as $slug => $title) {
//                 if ($category->slug == $slug) {
//                     $category_name = $category->name;
//                 }
//             }
//         }
//     } else {

//         foreach (get_the_category(get_the_ID()) as $category) {
//             foreach (get_editorials() as $editorial) {
//                 if ($category->name == $editorial) {
//                     $category_name = $category->name;
//                 }
//             }
//         }
//     }

//     $thumbnail = get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'w-full h-[220px] object-cover', 'alt' => get_the_title()));

//     if (!empty(get_the_excerpt())) {
//         $excerpt = get_the_excerpt();
//     } else {
//         $excerpt = get_limit_words(get_the_content(), 20);
//     }

//     return [
//         'title'          => get_the_title(),
//         'category_name'  => $category_name,
//         'date_published' => get_the_date('d/m/Y'),
//         'content'        => get_the_content(),
//         'excerpt'        => $excerpt,
//         'thumbnail'      => $thumbnail,
//         'link'           => get_the_permalink()
//     ];
// }

function get_new_item_setting(string $thumbnail = '', string $title = '', string $content = '', string $excerpt = '', string $link = ''): array
{
    return [
        'thumbnail' => $thumbnail,
        'title'     => $title,
        'content'   => $content,
        'excerpt'   => $excerpt,
        'link'      => $link
    ];
}

function get_no_posts_found(string $post_title)
{
    $home_url = get_home_url(null, '/');

    $test = <<<HTML
        <div class="col-span-full">
            <h3 class="text-3xl font-bold font-red-hat-display text-center">
                Nenhum <span class="lowercase">{$post_title}</span> encontrado!
            </h3>

            <div class='flex justify-center mt-16'>
                <a class="button-cta" href="{$home_url}">
                    Voltar para página inicial
                </a>
            </div>
        </div>
    HTML;

    return $test;
}

function get_pages_editorials_settings()
{
    return [
        'institucional' => [
            'header_background' => true,
            'menu'              => 'menu-institucional'
        ],

        'pe-jordan' => [
            'header_background' => true,
            'menu'              => 'menu-pe-jordan'
        ],

        'vocacional' => [
            'header_background' => true,
            'menu'              => 'menu-vocacional'
        ],

        'paroquias' => [
            'header_background' => true,
            'menu'              => 'menu-paroquias'
        ],

        'educacao' => [
            'header_background' => true,
            'menu'              => 'menu-educacao'
        ],

        'obras-sociais' => [
            'header_background' => true,
            'menu'              => 'menu-obras-sociais'
        ],

        'revista' => [
            'header_background' => true,
            'menu'              => 'menu-revista'
        ],
    ];
}

register_nav_menus(array(
    'primary'            => __('Primary Menu', 'yourtheme'),
    'menu-institucional' => __('Menu Institucional', 'yourtheme'),
    'menu-pe-jordan'     => __('Menu Pe. Jordan', 'yourtheme'),
    'menu-vocacional'    => __('Menu Vocacional', 'yourtheme'),
    'menu-paroquias'     => __('Menu Paróquias', 'yourtheme'),
    'menu-educacao'      => __('Menu Educação', 'yourtheme'),
    'menu-obras-sociais' => __('Menu Obras Sociais', 'yourtheme'),
    'menu-revista'       => __('Menu Revista', 'yourtheme'),
));

function get_menu_editorial_url_params(string $url, string $editorial_title)
{
    $editorial_slug = get_editorial_slug_by_title($editorial_title);

    return $url . '?editoria=' . $editorial_slug;
}

function get_base_url(): string
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    $full_url = $protocol . $host . $uri;
    $parsed_url = parse_url($full_url);

    $base_url = $protocol . $host . $parsed_url['path'];

    return $base_url;
}

function render_menu($menu_tree, $parent_id = 0)
{
    global $wp;

    if (!isset($menu_tree[$parent_id])) {
        return;
    }

    $menu_class = $parent_id == 0 ? 'menu' : 'sub-menu';

    echo '<ul class="' . $menu_class . '">';
    foreach ($menu_tree[$parent_id] as $item) {
        if (get_field('editoria', $item->ID) != 'Nenhum') {
            $url = get_menu_editorial_url_params($item->url, get_field('editoria', $item->ID));
        } else {
            $url = $item->url;
        }

        $item_active_class = get_base_url() == $item->url ? 'current-menu-item' : '';

        echo '<li class="menu-item menu-item-type-custom menu-item-object-custom ' . $item_active_class . '">';
        echo '<a data-value="' . get_field('editoria', $item->ID) . '" href="' . esc_url($url) . '">' . esc_html($item->title) . '</a>';

        render_menu($menu_tree, $item->ID);

        echo '</li>';
    }
    echo '</ul>';
}

// Retirar logo do Wordpress admin
function wps_admin_bar()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action('wp_before_admin_bar_render', 'wps_admin_bar');

// removendo campo comentarios admin wp

add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

add_action('init', 'remove_comment_support', 100);

function remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}

function mytheme_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');

function logoadmin()
{
    echo " <style>
   body.login #login h1 a {
   background: url('https://erwise.com.br/wp-content/uploads/2022/04/login-wp.jpg') no-repeat scroll center top transparent;
   height: 90px;
   width: 250px;
   }
   </style>
   ";
}
add_action("login_head", "logoadmin");

// Customizar o Footer do WordPress
function remove_footer_admin()
{
    echo 'Desenvolvimento e Criação Erwise Dev ME © <a href="https://api.whatsapp.com/send?phone=%205511937008521&text=Olá!/">Suporte</a> ';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function my_login_logo_url()
{
    return 'https://erwise.com.br/';
}
add_filter('login_headerurl', 'my_login_logo_url');

function get_options_page_api()
{
    // http: //erwise.test/salvatorianos/wp-json/acf/v3/options/options

    $link_pattern = get_field('link_padrao_portal', 'option');

    $link_option = get_field('link_pagina_de_opcoes', 'option');

    return $link_pattern . $link_option;
}

function get_menu(): array
{
    return [
        'menu_top' => [
            [
                'title' => 'Institucional',
                'url'   => 'institucional',
                'last'  => false
            ],

            [
                'title' => 'Padroeira',
                'url'   => 'padroeira',
                'last'  => false
            ],

            [
                'title' => 'Secretaria',
                'url'   => 'secretaria',
                'last'  => false
            ],

            [
                'title' => 'Evangelização',
                'url'   => 'evangelizacao',
                'last'  => false
            ],

            [
                'title' => 'Comunicação',
                'url'   => 'comunicacao',
                'last'  => true
            ],
        ],

        'menu_bottom' => [
            [
                'title' => 'Dízimo',
                'url'   => 'dizimo',
                'first' => true,
                'last'  => false
            ],

            [
                'title' => 'Agenda',
                'url'   => 'agenda',
                'first' => false,
                'last'  => false
            ],

            [
                'title' => 'Blog',
                'url'   => 'blog',
                'first' => false,
                'last'  => false
            ],

            [
                'title' => 'Notícias',
                'url'   => 'noticias',
                'first' => false,
                'last'  => false
            ],

            [
                'title' => 'Faça sua doação',
                'url'   => 'faca-sua-doacao',
                'first' => false,
                'last'  => false
            ],

            [
                'title' => 'Vela virtual',
                'url'   => 'vela-virtual',
                'first' => false,
                'last'  => true
            ],
        ]
    ];
}

function get_base_api(): string
{
    $link_pattern = get_field('link_padrao_portal', 'option');

    $base_api = 'wp-json/wp/v2/posts';

    return $link_pattern  . $base_api;
}

function get_posts_detail_api(string $type = 'main' | 'highlight' | 'other_highlight', array $posts_not_id = []): string
{
    $settings = [
        'main' => [
            'slug'     => 'main',
            'per_page' => 1,
        ],

        'highlight' => [
            'slug'     => 'highlight',
            'per_page' => 1
        ],

        'other_highlight' => [
            'slug'         => 'other_highlight',
        ],
    ];

    $categories = [];

    array_push($categories, get_field('categoria_editoria', 'option'));

    array_push($categories, get_field('categoria_noticia', 'option'));

    array_push($categories, get_field('categoria_destaque', 'option'));

    $categories_list = implode(',', $categories);

    if ($settings[$type]['slug'] == 'main') {
        return get_base_api() . '?categories=' . $categories_list . '&per_page=' . $settings[$type]['per_page'] . '&cat_relation=AND';
    }

    $posts_not_list = implode(',', $posts_not_id);

    if ($settings[$type]['slug'] == 'highlight') {
        return get_base_api() . '?categories=' . $categories_list . '&per_page=' . $settings[$type]['per_page'] . '&cat_relation=AND&post__not_in=' . $posts_not_list;
    }

    return get_base_api() . '?categories=' . $categories_list . '&cat_relation=AND&post__not_in=' . $posts_not_list;
}

function get_posts_api($posts_not_id): string
{
    $category_editorial = get_field('categoria_editoria', 'option');

    $category_news = get_field('categoria_noticia', 'option');

    $categories = [];

    array_push($categories, $category_editorial);

    array_push($categories, $category_news);

    $categories_list = implode(',', $categories);

    $posts_not_list = implode(',', $posts_not_id);

    return get_base_api() . '?categories=' . $categories_list . '&cat_relation=AND&post__not_in=' . $posts_not_list;
}

function get_blogs_api($posts_not_id): string
{
    // https://salvatorianos.erwisedev-hml.com.br/wp-json/wp/v2/posts?categories=13,25&per_page=100&cat_relation=AND

    $category_editorial = get_field('categoria_editoria', 'option');

    $category_blog = get_field('categoria_blog', 'option');

    $categories = [];

    array_push($categories, $category_editorial);

    array_push($categories, $category_blog);

    $categories_list = implode(',', $categories);

    $posts_not_list = implode(',', $posts_not_id);

    return get_base_api() . '?categories=' . $categories_list . '&per_page=100&cat_relation=AND&post__not_in=' . $posts_not_list;
}

/**
 * Enqueue scripts and styles.
 */
function theme_dev_scripts()
{
    wp_enqueue_style('theme-dev-style', get_stylesheet_uri());

    register_assets('theme-dev-fonts-style', 'public/fonts/fonts.css');
    register_assets('theme-dev-app-style', 'public/css/app.css');
    register_assets('theme-dev-app-scripts', 'public/js/app.js', true);

    wp_enqueue_style('theme-dev-custom-style', get_template_directory_uri() . '/custom.css', array(), '1.0.0');
    wp_enqueue_script('theme-dev-custom-scripts', get_template_directory_uri() . '/custom.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'theme_dev_scripts');

require get_template_directory() . '/inc/functions/register-post-types.php';
require get_template_directory() . '/inc/functions/register-rest-fields.php';
require get_template_directory() . '/inc/functions/register-options-page.php';
