<?php get_template_part('inc/head'); ?>
<?php get_template_part('inc/header'); ?>

<div class="pc-pdt-200 pc-pdb-200 sp-pdt-200 sp-pdb-200">
  <!-- 404ページのコンテンツ -->
  <div class="p-content__inner u-ta-center">
    <div class="c-title-3 pc-mgb-60 sp-mgb-40">
      <p class="c-title-3__en font-avenir">404 Not Found</p>
      <h1 class="c-title-3__ja">ページが見つかりません</h1>
    </div>

    <p class="p-content__lead pc-mgb-45 sp-mgb-40">
      お探しのページは、<br class="pc-none">移動または削除された可能性があります。<br>
      下記のリンクより、トップページへお戻りください。
    </p>

    <div class="p-content__btn pc-mgt-70 sp-mgt-50">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="c-btn c-btn--fill">
        <div class="c-btn__inner"><span>トップページへ戻る</span></div>
      </a>
    </div>
  </div>
</div>

<?php get_template_part('inc/footer'); ?>
