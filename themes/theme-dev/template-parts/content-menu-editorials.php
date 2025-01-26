<section class="relative z-50">

    <div class="w-1/2 h-full top-0 left-0 absolute bg-[#ECE6DF]"></div>

    <div class="w-1/2 h-full top-0 right-0 absolute bg-[#058E36]"></div>

    <div class="container relative grid grid-cols-4 lg:grid-cols-8 px-0 lg:px-4">

        <?php
        $request_posts = wp_remote_get(get_options_page_api());

        if (!is_wp_error($request_posts)) :
            $body = wp_remote_retrieve_body($request_posts);

            $data = json_decode($body)->acf;

            if (!is_wp_error($data)) :
        ?>
                <a class="flex justify-center items-center px-2" href="<?php echo $data->general_menu_link_padrao; ?>" target="_blank" rel="noreferrer noopener">
                    <img src="<?php echo get_template_directory_uri() ?>/resources/images/logo-secondary-salvatorianos.png" alt="Logo - Salvatorianos" />
                </a>

                <a class="menu-editorial-item bg-[#6F9B39]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_institucional; ?>" target="_blank" rel="noreferrer noopener">
                    Institucional
                </a>

                <a class="menu-editorial-item bg-[#5D933D]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_pe_jordan; ?>" target="_blank" rel="noreferrer noopener">
                    Pe. Jordan
                </a>

                <a class="menu-editorial-item bg-[#4D8D3F]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_vocacional; ?>" target="_blank" rel="noreferrer noopener">
                    Vocacional
                </a>

                <a class="menu-editorial-item bg-[#83AB1E]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_paroquias; ?>" target="_blank" rel="noreferrer noopener">
                    Paróquias
                </a>

                <a class="menu-editorial-item bg-[#549D2C]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_educacao; ?>" target="_blank" rel="noreferrer noopener">
                    Educação
                </a>

                <a class="menu-editorial-item bg-[#3A9731]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_obras_sociais; ?>" target="_blank" rel="noreferrer noopener">
                    Obras Sociais
                </a>

                <a class="menu-editorial-item bg-[#058E36]" href="<?php echo $data->general_menu_link_padrao . $data->general_menu_revista; ?>" target="_blank" rel="noreferrer noopener">
                    Revista
                </a>
        <?php

            endif;
        endif;
        ?>
    </div>
</section>