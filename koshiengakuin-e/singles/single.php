<?php get_template_part('./inc/head'); ?>
<?php get_template_part('./inc/header'); ?>


    <div class="p-single">
        <div class="p-single__inner">

            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <div class="p-single__head">
                            <div class="p-single__top">
                                <!-- date -->
                                <span class="p-single__date font-avenir"><?php echo get_the_date('Y.m.d'); ?></span>
                                <!-- カテゴリー -->
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    $category = $categories[0];
                                    echo '<span class="c-label is-current">' . esc_html($category->name) . '</span>';
                                }
                                ?>
                            </div>
    
                            <h1 class="p-single__title"><?php the_title(); ?></h1>
    
                            <?php if (has_post_thumbnail()): ?>
                                <div class="p-single__thumbnail">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>
                        </div>


                        <div class="p-single__content">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                <?php
                endwhile; ?>
            <?php else: ?>
                <p>記事が見つかりませんでした。</p>
            <?php endif; ?>


            <div class="p-single__btn pc-mgt-90 sp-mgt-50">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="c-btn c-btn--fill">
                    <div class="c-btn__inner"><span>一覧に戻る</span></div>
                </a>
            </div>

            <div class="p-single-other pc-mgt-110 sp-mgt-120">
                <h3 class="p-single-other__title">その他の記事</h3>

                <div class="p-single-other__archive">
                    <div class="p-archive-2">
                        <a class="p-archive-2__item" href="#">
                            <div class="p-archive-2__image pc-mgb-10"><img src="<?php echo get_template_directory_uri(); ?>/img/no-image.jpg" alt=""  loading="lazy"></div>
                            <div class="p-archive-2__content">
                            <div class="p-archive-2__head pc-mgb-5">
                                <span class="p-archive-2__date font-avenir">2025.12.18</span>
                                <div>
                                <span class="c-label">お知らせ</span>
                                </div>
                            </div>
                            <span class="p-archive-2__title">全国詩の暗唱コンクール「団体賞」受賞</span>
                            </div>
                        </a>

                        <a class="p-archive-2__item" href="#">
                            <div class="p-archive-2__image pc-mgb-10"><img src="<?php echo get_template_directory_uri(); ?>/img/front-news_2.jpg" alt=""  loading="lazy"></div>
                            <div class="p-archive-2__content">
                            <div class="p-archive-2__head pc-mgb-5">
                                <span class="p-archive-2__date font-avenir">2025.12.18</span>
                                <div>
                                <span class="c-label">入試情報</span>
                                </div>
                            </div>
                            <span class="p-archive-2__title">教職課程履修学生が西紀北小学校（丹波篠山市）で出前授業を行いました。</span>
                            </div>
                        </a>

                        <a class="p-archive-2__item" href="#">
                            <div class="p-archive-2__image pc-mgb-10"><img src="<?php echo get_template_directory_uri(); ?>/img/front-news_3.jpg" alt=""  loading="lazy"></div>
                            <div class="p-archive-2__content">
                            <div class="p-archive-2__head pc-mgb-5">
                                <span class="p-archive-2__date font-avenir">2025.12.18</span>
                                <div>
                                <span class="c-label">入試情報</span>
                                </div>
                            </div>
                            <span class="p-archive-2__title">西日本難関中学校合格率ランキング第２位</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php get_template_part('./inc/footer'); ?>
