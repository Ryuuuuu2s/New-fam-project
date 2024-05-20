<?php get_header(); ?>

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
    <link rel="”canonical”" href="”URL”" />
    <!-- ジェネレーターURL→ https://metatags.io/ -->

    <!-- ▼ファビコン -->
    <!-- ジェネレーターURL→ https://realfavicongenerator.net/ -->

    <!-- ▼クロールして欲しくない -->
    <!-- <meta name="robots" content="noindex,nofollow"> -->

    <!-- ▼テーマカラー -->
    <!-- <meta name="theme-color" content="#e9c931"> -->

    <!-- ▼CSS -->
    <link rel="stylesheet" href="/css/main.css?date=<?=date('YmdGis', filemtime( 'main.css' ));?>">


    <!-- ▼フォント -->
                
    
</head>
<body>


<div class="post_view_wrap">

            <div class="post_view_sekou">
            <img src="<?php echo $cfs->get('img'); ?>" alt="<?php the_title(); ?>" width="auto" height="auto" />

			
            <?php if(have_posts()): while(have_posts()):the_post(); ?>
			<div class="post_ttl"><?php the_title(); ?></div>
			

			<div class="post_view_content">
            <?php the_content(); ?>
			</div>
            <?php endwhile; endif; ?>

            <div class="post_view_sekou">
            <?php echo CFS()->get('sekou');?>

            </div>

		</div>
</div>
		



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/cooperatorScript.js"></script>
</body>

</html>
    
