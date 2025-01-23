<a href="<?php echo $args['link'] ?>">
    <div class="h-full flex flex-col justify-between bg-white pb-6">

        <div>
            <div class="w-full h-[220px] overflow-hidden">
                <?php
                if (!empty($args['thumbnail'])) :
                ?>
                    <img class="w-full h-[220px] object-cover" src="<?php echo $args['thumbnail'] ?>" alt="<?php echo $args['title']; ?>" />
                <?php else: ?>
                    <div class="w-full h-[220px] bg-gray-100"></div>
                <?php
                endif;
                ?>
            </div>

            <div class="pt-6 px-6">
                <h3 class="text-lg 2xl:text-xl font-black font-red-hat-display text-[#A08243] mb-4" style="line-height:100%">
                    <?php echo get_limit_words($args['title'], 8); ?>
                </h3>

                <?php if (isset($args['excerpt'])): ?>
                    <span class="block text-xs 2xl:text-sm font-normal font-red-hat-display text-[#2E2E2E] mb-4">
                        <?php echo get_limit_words($args['excerpt'], 20) ?>
                    </span>
                <?php else: ?>
                    <span class="block text-xs 2xl:text-sm font-normal font-red-hat-display text-[#2E2E2E] mb-4">
                        <?php echo get_limit_words($args['content'], 20) ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="px-6">
            <span class="w-32 transition hover:scale-90 block text-xs font-bold font-red-hat-display text-center uppercase text-white bg-gradient-theme py-2 px-8">
                Ler mais
            </span>
        </div>
    </div>
</a>