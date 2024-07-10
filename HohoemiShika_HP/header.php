<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ▼TELL&MAIL&ADDRESSの自動リンク機能を制御 -->
    <meta name="format-detection" content="email=no,telephone=no,address=no" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta property="og:locale" content="ja_JP" />

    <!-- ▼SEO -->
    <link rel="”canonical”" href="<?php echo get_home_url(); ?>" />
    <!-- Primary Meta Tags -->
    <!-- <title>タイトルタイトルタイトル</title>
    <meta name="title" content="タイトルタイトルタイトル" />
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト" /> -->

    <!-- Open Graph / Facebook -->
    <!-- <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo get_home_url(); ?>" />
    <meta property="og:title" content="タイトルタイトルタイトル" />
    <meta property="og:description" content="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/meta.jpg" /> -->

    <!-- Twitter -->
    <!-- <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?php echo get_home_url(); ?>" />
    <meta property="twitter:title" content="タイトルタイトルタイトル" />
    <meta property="twitter:description" content="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト" />
    <meta property="twitter:image" content="<?php echo get_template_directory_uri(); ?>/img/meta.jpg" /> -->

    <!-- ▼ファビコン -->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon_package/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon_package/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon_package/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon_package/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff"> -->


    <!-- ▼クロールして欲しくない -->
    <!-- <meta name="robots" content="noindex,nofollow"> -->

    <!-- ▼テーマカラー -->
    <!-- <meta name="theme-color" content="#e9c931"> -->

    <!-- ▼CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">

    <!-- ▼フォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Contrail+One&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

</head>

<body>

    <div class="whopper">
        <!-- header -->
        <header class="header">
            <div class="burger"></div>
            <div class="menu">
                <div class="backText">
                    <p class="TX">
                        Hohoemi<br>
                        Dental<br>
                        Clinic
                    </p>
                </div>
                <nav class="nav">
                    <ul class="nav__main">
                        <li>
                            <a href="#">
                                <p>トップ</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>診療案内</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>ドクター紹介</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>クリニック紹介</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>受診される方へ</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>受付時間・アクセス</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>ブログ</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav__sub">
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>矯正歯科</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>インプラント</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>審美歯科</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>口腔外科</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>入れ歯</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>予防歯科</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>一般歯科</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>小児歯科</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon"></div>
                                <div class="cover">
                                    <p>訪問診療</p>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="menu__back"></div>
        </header>

        <?php if (is_front_page()) : ?>

            <!-- KV__front -->
            <div class="KV__front">
                <div class="KV__front--text">
                    <div class="KV__front--text--top">
                        <h2 class="TL">
                            世界水準の<br>
                            インプラント治療<span class="pc">、</span><br class="sp">矯正治療が<br>
                            受けれる歯科医院です
                        </h2>
                    </div>
                    <div class="KV__front--text--middle">
                        <div class="KV__front--text--middle--heading">
                            <p class="TX">
                                自由診療に特化した歯科医院
                            </p>
                        </div>
                        <div class="KV__front--text--middle--container">
                            <div class="item loadRight speed-05 delay-05">
                                <p class="TX">
                                    負担の少ない<span>インプラント治療</span>
                                </p>
                            </div>
                            <div class="item loadRight speed-05 delay-06">
                                <p class="TX">
                                    <span>年間</span>100症例<span>以上の矯正治療</span>実績
                                </p>
                            </div>
                            <div class="item loadRight speed-05 delay-07">
                                <p class="TX">
                                    難症例<span>でお困りの方も</span>お任せ<span>ください</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="KV__front--text--bottom">
                        <p class="TX">
                            インプラントが初めての方や、<br class="sp">他院で断られた方もお気軽にご相談ください
                        </p>
                    </div>
                </div>
                <div class="KV__front--title">
                    <h1 class="TL">
                        <span class="rollAnimeLoad">Hohoemi</span>
                        <span class="rollAnimeLoad">Dental</span>
                        <span class="rollAnimeLoad">Clinic</span>
                    </h1>
                </div>
                <div class="KV__front--smoke"></div>
            </div>

        <?php else : ?>

            <!-- KV -->
            <div class="KV">
                <div class="KV--img"></div>
                <div class="KV--tag loadRight speed-05 decay05">
                    <?php if (is_page('orthodontics')) : ?>
                        <!-- 矯正歯科 -->
                        <div class="KV--tag--inner">
                            <h2 class="TL">矯正歯科</h2>
                            <p class="TX">−Orthodontics−</p>
                        </div>
                    <?php endif; ?>
                    <?php if (is_page('implant')) : ?>
                        <!-- インプラント -->
                        <div class="KV--tag--inner">
                            <h2 class="TL">インプラント</h2>
                            <p class="TX">−Implant−</p>
                        </div>
                    <?php endif; ?>






                    <?php if (is_post_type_archive('post')) : ?>
                        <!-- ブログ -->
                        <div class="KV--tag--inner">
                            <h2 class="TL">ブログ</h2>
                            <p class="TX">−Blog−</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="KV--title">
                    <h1 class="TL">
                        <span class="rollAnimeLoad">Hohoemi</span>
                        <span class="rollAnimeLoad">Dental</span>
                        <span class="rollAnimeLoad">Clinic</span>
                    </h1>
                </div>
                <div class="KV--smoke"></div>
            </div>

        <?php endif; ?>

        <div class="C_TitleBack C_TitleBack--KV--front"></div>