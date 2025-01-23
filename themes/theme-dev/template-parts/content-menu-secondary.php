    <div class="w-full xl:mt-16">
        <nav class="relative">

            <div class="hamburger-wrapper">

                <button class="btn-menu" x-on:click="openMenu = true">
                    <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                    </svg>
                </button>
            </div>

            <?php
            $menu_name = get_pages_editorials_settings()[$args['menu_name']]['menu'];

            if (isset($menu_name)) :
            ?>
                <div class="main-nav-desktop">
                    <div class="menu-secondary">
                        <?php
                        $menu = wp_get_nav_menu_object($menu_name);

                        $menu_items = wp_get_nav_menu_items($menu->term_id); // Itens do menu

                        $menu_tree = array();

                        if ($menu_items) {
                            foreach ($menu_items as $item) {
                                $parent_id = $item->menu_item_parent;
                                if (!isset($menu_tree[$parent_id])) {
                                    $menu_tree[$parent_id] = array();
                                }
                                $menu_tree[$parent_id][] = $item;
                            }

                            render_menu($menu_tree);
                        }
                        ?>
                    </div>
                </div>

                <!-- <div
                    class="main-nav-mobile"
                    x-show="openMenu"
                    x-cloak
                    x-transition:enter="transition duration-500"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition duration-500"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full">

                    <button class="btn-menu btn-menu-close" x-on:click="openMenu = false">
                        <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                        </svg>
                    </button>

                    <php
                    wp_nav_menu(array(
                        'container_class' => 'menu-secondary',
                        'theme_location'  => $menu
                    ));
                    ?>
                </div> -->
            <?php endif; ?>
        </nav>
    </div>