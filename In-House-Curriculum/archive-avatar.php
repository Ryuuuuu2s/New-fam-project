<?php get_header(); ?>


<form action="">
    <div class="change-clothes">
        <!-- ディスプレイ -->
        <div class="change-clothes__display">
            <header class="display__header">

                <a class="return__button hover-opa" href="#" onclick="if (confirm('変更があった場合、情報は失われます。本当に閉じますか？')) { window.close(); } return false;"></a>

                <div class="self__area">
                    <!-- 所持金 -->
                    <div class="possession__area">
                        <div class="possession__item">
                            <div class="icon icon-01"></div>
                            <p class="TX">
                                <?php
                                $user_id = get_current_user_id();
                                $user_coins = get_user_meta($user_id, 'user_coins', true) ?: 0;
                                echo esc_html($user_coins);
                                ?>
                            </p>
                        </div>
                        <div class="possession__item">
                            <div class="icon icon-02"></div>
                            <p class="TX">
                                <?php
                                $user_points = get_user_meta($user_id, 'user_point', true) ?: 0;
                                echo esc_html($user_points);
                                ?>
                            </p>
                        </div>
                    </div>

                    <!-- 保存ボタン -->
                    <button class="saving__button" type="submit" disabled>
                        <p class="TX">保存する</p>
                    </button>
                </div>

            </header>
            <div class="display__character"></div>
            <div class="display__character__ground"></div>

            <!-- キャラクターのセリフ -->
            <div class="display__character__serif none">
                <div class="serif__area">
                    <div class="item__serif">
                        <p class="TX">まだ持っていないアイテムだよ！</p>
                    </div>
                    <div class="item__info">
                        <div class="item__img__frame">
                            <div class="item__img"></div>
                        </div>
                        <div class="item__cost">
                            <div class="icon coin"></div>
                            <p class="TX">100000</p>
                        </div>
                    </div>
                    <div class="item__button">
                        <button class="buttons cancel" type="button">やめる</button>
                        <button class="buttons exchange" type="button">交換する</button>
                    </div>
                </div>
            </div>

            <!-- キャラクターの色変更 -->
            <div class="display__character__color none">
                <div class="color__area">
                    <div class="gradient__area">
                        <canvas id="color-display" class="gradient__item"></canvas>
                    </div>
                    <div class="picker__area">
                        <input id="selected-color" class="color__now" type="text" name="color" id="color"
                            value="rgb(247, 251, 248)">
                        <div class="color__bar__container">
                            <canvas id="color-bar" class="color__bar"></canvas>
                            <div id="color-bar-marker" class="color__bar__marker"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ボタン -->
            <div class="display__sideButton">
                <button class="sideButton__button" type="button" onclick="restorePreviousState();">
                    <div class="sideButton__text">
                        <div class="icon icon-01"></div>
                        <p class="TX">ひとつ戻す</p>
                    </div>
                </button>
                <script>
                    // 状態を保存するオブジェクト
                    let previousState = {};

                    // 現在の状態を保存する関数
                    function saveCurrentState() {
                        previousState = {
                            checkboxes: Array.from(document.querySelectorAll('input[type="checkbox"]')).map(checkbox => checkbox.checked),
                            radios: Array.from(document.querySelectorAll('input[type="radio"]')).map(radio => radio.checked)
                        };
                    }

                    // 前の状態に戻す関数
                    function restorePreviousState() {
                        document.querySelectorAll('input[type="checkbox"]').forEach((checkbox, index) => {
                            checkbox.checked = previousState.checkboxes[index];
                        });
                        document.querySelectorAll('input[type="radio"]').forEach((radio, index) => {
                            radio.checked = previousState.radios[index];
                        });
                    }

                    // ページ読み込み時に現在の状態を保存
                    document.addEventListener('DOMContentLoaded', saveCurrentState);

                    // チェックボックスやラジオボタンの変更時に現在の状態を保存
                    document.querySelectorAll('input[type="checkbox"], input[type="radio"]').forEach(input => {
                        input.addEventListener('change', saveCurrentState);
                    });
                </script>
                <button class="sideButton__button" type="button">
                    <div class="sideButton__text">
                        <div class="icon icon-02"></div>
                        <p class="TX">リセット</p>
                    </div>
                </button>
            </div>

        </div>

        <!-- コントロール -->
        <div class="change-clothes__control">

            <div class="control__category">

                <!-- カテゴリー -->
                <div class="category__list">
                    <ul class="category__list__items">
                        <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'avatar-cat',
                            'hide_empty' => false,
                        ));
                        foreach ($categories as $index => $category) {
                            $active_class = $index === 0 ? 'active' : '';
                            $png_url = get_template_directory_uri() . '/img/avatar-top-icon/' . esc_attr($category->slug) . '.png';
                            $svg_url = get_template_directory_uri() . '/img/avatar-top-icon/' . esc_attr($category->slug) . '.svg';
                            $image_url = file_exists(get_template_directory() . '/img/avatar-top-icon/' . esc_attr($category->slug) . '.png') ? $png_url : $svg_url;
                            echo '<li class="' . $active_class . '">';
                            echo '<div class="category__item">';
                            echo '<div class="icon" style="background-image: url(' . esc_url($image_url) . ');"></div>';
                            echo '</div>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>

                <!-- タグ -->
                <div class="tag__list">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'avatar-cat',
                        'hide_empty' => false,
                    ));
                    foreach ($categories as $index => $category) {
                        $active_class = $index === 0 ? 'active' : '';
                        echo '<div class="tag__list__area ' . $active_class . '">';
                        echo '<ul class="tag__list__items">';

                        // カテゴリーに紐付いたタグを取得
                        $tags = get_terms(array(
                            'taxonomy' => 'avatar-tag',
                            'hide_empty' => false,
                            'meta_query' => array(
                                array(
                                    'key' => 'category_slug',
                                    'value' => $category->slug,
                                    'compare' => '='
                                )
                            )
                        ));

                        foreach ($tags as $tag) {
                            $png_url = get_template_directory_uri() . '/img/avatar-top-icon/' . esc_attr($category->slug) . '-' . esc_attr($tag->slug) . '.png';
                            $svg_url = get_template_directory_uri() . '/img/avatar-top-icon/' . esc_attr($category->slug) . '-' . esc_attr($tag->slug) . '.svg';
                            $image_url = file_exists(get_template_directory() . '/img/avatar-top-icon/' . esc_attr($category->slug) . '-' . esc_attr($tag->slug) . '.png') ? $png_url : $svg_url;
                            echo '<li>';
                            echo '<div class="tag__item" style="background-image: url(' . esc_url($image_url) . ');"></div>';
                            echo '</li>';
                        }

                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>

            </div>

            <!-- itemたち -->
            <div class="control__item">
                <div class="control__item__inner">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'avatar-cat',
                        'hide_empty' => false,
                    ));
                    foreach ($categories as $category_index => $category) {
                        $category_active_class = $category_index === 0 ? 'active' : '';
                        echo '<div class="control__list__wrap ' . $category_active_class . '">';

                        // カテゴリーに紐づくタグを取得
                        $tags = get_terms(array(
                            'taxonomy' => 'avatar-tag',
                            'hide_empty' => false,
                            'meta_query' => array(
                                array(
                                    'key' => 'category_slug',
                                    'value' => $category->slug,
                                    'compare' => '='
                                )
                            )
                        ));

                        foreach ($tags as $tag_index => $tag) {
                            $tag_active_class = $tag_index === 0 ? 'active' : '';
                            echo '<div class="control__category-tag__list ' . $tag_active_class . '">';
                            echo '<ul>';

                            // タグに紐づく投稿を取得
                            $posts = get_posts(array(
                                'post_type' => 'avatar',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'avatar-tag',
                                        'field' => 'slug',
                                        'terms' => $tag->slug,
                                    )
                                )
                            ));

                            foreach ($posts as $post) {
                                echo '<li>';
                                echo '<input class="category-tag__item--wrap" type="radio" name="category-tag-' . esc_attr($category->term_id) . '-' . esc_attr($tag->term_id) . '" onclick="toggleRadio(this)">';
                                echo '<div class="category-tag__item">' . apply_filters('the_content', $post->post_content) . '</div>';
                                echo '<div class="nothing-item active"></div>';
                                echo '</li>';
                            }

                            echo '</ul>';
                            echo '</div>';
                        }

                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

        </div>


    </div>
</form>


<script>
    function toggleRadio(radio) {
        if (radio.previousChecked) {
            radio.checked = false;
        }
        radio.previousChecked = radio.checked;
    }
</script>

<?php get_footer(); ?>