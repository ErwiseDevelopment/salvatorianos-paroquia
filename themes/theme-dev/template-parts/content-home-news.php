<section class="bg-[#F9F38E] py-20">

    <div class="container">

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-2">

            <!-- news main featured -->
            <div>
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
                        <a class="news-item" href="<?php echo $post_highlight->link; ?>">

                            <img class="news-item-thumbnail" src="<?php echo $post_highlight->featured_image_src; ?>" alt="<?php echo $post_highlight->title->rendered; ?>" />

                            <div class="bottom-0 left-0 absolute z-10 p-8">
                                <span class="news-item-emphasis 2xl:text-xl bg-gradient-theme">
                                    Destaque
                                </span>

                                <h2 class="news-item-title 2xl:text-4xl">
                                    <?php echo $post_highlight->title->rendered; ?>
                                </h2>

                                <p class="news-item-read-more text-sm 2xl:text-base text-[#8DAA32]">
                                    Leia mais >
                                </p>
                            </div>
                        </a>
                <?php
                    endif;
                endif;
                ?>
            </div>
            <!-- end news main featured -->

            <div class="xl:h-[560px] grid grid-cols-1 xl:grid-cols-2 xl:grid-rows-2 gap-2">

                <!-- news featured -->
                <?php
                $request_posts = wp_remote_get(get_posts_detail_api('highlight', $posts_ids_hidden));

                if (!is_wp_error($request_posts)) :
                    $body = wp_remote_retrieve_body($request_posts);

                    $data = json_decode($body);

                    if (!is_wp_error($data)) :

                        $post_limit = 2;

                        $count = 0;

                        foreach ($data as $rest_post):
                            array_push($posts_ids_hidden, $rest_post->id);

                            $count++;
                ?>
                            <a class="news-item col-span-full row-span-1" href="<?php echo $rest_post->link; ?>">
                                <?php echo get_post_thumbnail_custom('news-item-thumbnail') ?>

                                <img class="news-item-thumbnail" src="<?php echo $rest_post->featured_image_src; ?>" alt="<?php echo $post_highlight->title->rendered; ?>" />

                                <div class="bottom-0 left-0 absolute z-10 p-5">
                                    <span class="news-item-emphasis text-xs 2xl:text-sm bg-gradient-theme">
                                        Notícia
                                    </span>

                                    <h2 class="news-item-title text-xl 2xl:text-[26px]">
                                        <?php echo $rest_post->title->rendered; ?>
                                    </h2>

                                    <p class="news-item-read-more text-[8px] 2xl:text-xs text-white">
                                        Leia mais >
                                    </p>
                                </div>
                            </a>
                <?php
                            if ($post_limit == $count)
                                break;
                        endforeach;
                    endif;
                endif;
                ?>
                <!-- end news featured -->

                <?php
                $count = 0;

                echo "<pre>";
                var_dump($posts_ids_hidden);
                echo "</pre>";

                $request_posts = wp_remote_get(get_posts_detail_api('highlight', $posts_ids_hidden));

                if (!is_wp_error($request_posts)) :
                    $body = wp_remote_retrieve_body($request_posts);

                    $posts_other_highlight = json_decode($body);

                    if (!is_wp_error($posts_other_highlight)) :

                        $post_limit = 2;

                        $count = 0;

                        foreach ($posts_other_highlight as $rest_post):
                            array_push($posts_ids_hidden, $rest_post->id);

                            $count++;
                ?>
                            <a class="news-item col-span-1 row-span-1" href="<?php echo $rest_post->link; ?>">
                                <?php echo get_post_thumbnail_custom('news-item-thumbnail') ?>

                                <img class="news-item-thumbnail" src="<?php echo $rest_post->featured_image_src; ?>" alt="<?php echo $rest_post->title->rendered; ?>" />

                                <div class="bottom-0 left-0 absolute z-10 p-5">
                                    <span class="news-item-emphasis text-xs" style="background-image: linear-gradient(to right, <?php echo $news_category['colors']['primary']; ?>, <?php echo $news_category['colors']['secondary']; ?>)">
                                        Paróquia
                                    </span>

                                    <h2 class="news-item-title text-base 2xl:text-[17px]">
                                        <?php echo $rest_post->title->rendered; ?>
                                    </h2>

                                    <p class="news-item-read-more text-[8px] text-white">
                                        Leia mais >
                                    </p>
                                </div>
                            </a>
                <?php
                            if ($post_limit == $count)
                                break;
                        endforeach;
                    endif;
                endif;
                ?>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">

            <!-- news desktop -->
            <div class="col-span-full hidden xl:grid grid-cols-4 gap-4 mt-8">

                <!-- loop -->
                <?php
                $request_posts = wp_remote_get(get_posts_detail_api('other_highlight', $posts_ids_hidden));

                $posts_limit = 4;

                if (!is_wp_error($request_posts)) :
                    $body = wp_remote_retrieve_body($request_posts);

                    $data = json_decode($body);

                    if (!is_wp_error($data)) :

                        $count = 0;

                        foreach ($data as $rest_post):
                            $count++;

                            $thumbnail = isset($rest_post->featured_image_src) ? $rest_post->featured_image_src : '';

                            echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting($thumbnail, $rest_post->title->rendered, $rest_post->content->rendered, $rest_post->excerpt->rendered, $rest_post->link));

                            if ($posts_limit == $count)
                                break;
                        endforeach;
                    endif;
                endif;
                ?>
                <!-- end loop -->
            </div>
            <!-- news desktop end -->

            <!-- news mobile -->
            <div class="col-span-full xl:hidden mt-8">

                <!-- swiper -->
                <div class="swiper js-swiper-news">

                    <div class="swiper-wrapper">

                        <!-- slide -->
                        <?php
                        if (!is_wp_error($request_posts)) :
                            $body = wp_remote_retrieve_body($request_posts);

                            $data = json_decode($body);

                            if (!is_wp_error($data)) :

                                $count = 0;

                                foreach ($data as $rest_post):
                                    $count++;

                                    $thumbnail = isset($rest_post->featured_image_src) ? $rest_post->featured_image_src : '';
                        ?>
                                    <div class="swiper-slide">
                                        <?php echo get_template_part('template-parts/components/content', 'new-item', get_new_item_setting($thumbnail, $rest_post->title->rendered, $rest_post->content->rendered, $rest_post->excerpt->rendered, $rest_post->link)); ?>
                                    </div>
                        <?php
                                    if ($posts_limit == $count)
                                        break;
                                endforeach;
                            endif;
                        endif;
                        ?>
                        <!-- end slide -->
                    </div>
                </div>
                <!-- end swiper -->
            </div>
            <!-- end news mobile -->
        </div>

        <div class="flex justify-center mt-20">
            <a class="button-cta bg-gradient-theme" href="<?php echo get_home_url(null, '/noticias') ?>">
                Todas as notícias
            </a>
        </div>
    </div>
</section>