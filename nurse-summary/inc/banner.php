<!-- front -->
<?php if (is_front_page()) : ?>
    <div class="C_banner C_banner--single">
        <a class="C_banner--link to-home" href="<?php echo get_home_url(); ?>/comparison">
            <img src="<?php echo get_template_directory_uri(); ?>/img/C_banner-home-pc.png" alt="主要15社比較表へ">
        </a>
    </div>

    <!-- comparison -->
<?php elseif (is_page('comparison')) : ?>
    <div class="C_banner C_banner--single">
        <a class="C_banner--link to-comparison" href="<?php echo get_home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/C_banner-comparison-pc.png" alt="人気ランキングへ">
        </a>
    </div>

    <!-- 他 -->
<?php else : ?>
    <div class="C_banner">
        <a class="C_banner--link to-home" href="<?php echo get_home_url(); ?>/comparison">
            <img src="<?php echo get_template_directory_uri(); ?>/img/C_banner-home-pc.png" alt="主要15社比較表へ">
        </a>
        <a class="C_banner--link to-comparison" href="<?php echo get_home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/C_banner-comparison-pc.png" alt="人気ランキングへ">
        </a>
    </div>
<?php endif; ?>