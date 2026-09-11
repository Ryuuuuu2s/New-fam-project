<?php
/*
Template Name: 心がつながる一年
Template Post Type: page
Template Path: pages/
*/

?>

<?php get_template_part('./inc/head'); ?>
<?php get_template_part('./inc/header'); ?>

<div class="p-schedule">
    <div class="p-schedule__bg"></div>

    <div class="p-schedule__inner">

        <section class="p-schedule__section">
            <h1 class="p-schedule__title font-marumin-old js-load-target a-fadeInUp">
                心がつながる<br class="sp">1年
            </h1>

            <div class="p-schedule__content">
                <ul class="p-schedule__list">
                    <?php foreach (koshien_schedule_calendar_months() as $item) :
                        $event = function_exists('get_field') ? get_field($item['field']) : '';
                        $image = function_exists('get_field') ? get_field($item['field'] . '_image') : null;
                        $image_url = koshien_schedule_calendar_image_url($image, $item['image']);
                        $image_alt = koshien_schedule_calendar_image_alt($image);
                    ?>
                    <li class="p-schedule__item js-scroll-target a-fadeInUp">
                        <div class="p-schedule__item-img">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy">
                        </div>
                        <div class="p-schedule__item-textbox">
                            <div class="p-schedule__item-textbox-icon">
                                <p class="num"><?php echo (int) $item['month']; ?><span>月</span></p>
                            </div>
                            <?php if ($event) : ?>
                                <p class="p-schedule__item-textbox-event"><?php echo koshien_schedule_format_event($event); ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section class="p-schedule_music">
            <div class="p-schedule_music__title js-scroll-target a-fadeInUp">
                <p class="p-schedule_music__title-text font-avenir">Music band by teachers</p>
                <h2 class="p-schedule_music__title-main">Teachers Ⅱ Phoenix</h2>
            </div>

            <p class="p-schedule_music__text js-scroll-target a-fadeInUp">
                甲子園学院小学校の教職員による演奏グループです。<br class="sp-none">学習発表会の最後、子どもたちの希望者で結成された「ダンサーズ」とともに、<br class="sp-none">迫力の生演奏とダンスでステージを盛り上げます。<br class="sp-none">音楽の楽しさや、仲間と一つのものを作り上げる喜びを、<br class="sp-none">教職員と子どもたちが一体となって表現しています。
            </p>


            <div class="p-schedule_music__content js-scroll-target a-fadeInUp">
                <div class="p-schedule_music__switcher">
                    <div class="p-schedule_music__item">
                        <?php /*
                        <button type="button"
                            class="p-schedule_music__trigger"
                            id="music-tab-1"
                            aria-controls="music-panel-1"
                            aria-expanded="false">
                            学習発表会での演奏歴
                        </button>
                        */ ?>
                        <div class="p-schedule_music__panel"
                            id="music-panel-1"
                            role="region"
                            aria-labelledby="music-tab-1"
                            style="display: block !important;"
                            >
                            <?php
                            set_query_var('music_sections_field', 'music_tab_1_sections');
                            get_template_part('./inc/schedule/music', 'panel');
                            ?>
                        </div>
                    </div>

                    <?php /*
                    <div class="p-schedule_music__item">
                        <button type="button"
                            class="p-schedule_music__trigger"
                            id="music-tab-2"
                            aria-controls="music-panel-2"
                            aria-expanded="false">
                            ６年生を送る会での演奏歴
                        </button>
                        <div class="p-schedule_music__panel"
                            id="music-panel-2"
                            role="region"
                            aria-labelledby="music-tab-2"
                            hidden>
                            <?php
                            set_query_var('music_sections_field', 'music_tab_2_sections');
                            get_template_part('./inc/schedule/music', 'panel');
                            ?>
                        </div>
                    </div>
                    */ ?>
                    <?php /*
                    <div class="p-schedule_music__item">
                        <button type="button"
                            class="p-schedule_music__trigger"
                            id="music-tab-3"
                            aria-controls="music-panel-3"
                            aria-expanded="false">
                            その他の演奏歴
                        </button>
                        <div class="p-schedule_music__panel"
                            id="music-panel-3"
                            role="region"
                            aria-labelledby="music-tab-3"
                            hidden>
                            <?php
                            set_query_var('music_sections_field', 'music_tab_3_sections');
                            get_template_part('./inc/schedule/music', 'panel');
                            ?>
                        </div>
                    </div>
                    
                </div>
                */ ?>
            </div>

        </section>



    </div>
</div>


<?php get_template_part('./inc/footer'); ?>
