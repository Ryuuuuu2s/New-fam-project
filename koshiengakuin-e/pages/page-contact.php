<?php
/*
Template Name: お問い合わせ
Template Post Type: page
Template Path: pages/
*/

?>

<?php get_template_part('./inc/head'); ?>
<?php get_template_part('./inc/header'); ?>

<div class="p-contact">

  <div class="c-title-3 c-title-3--white pc-mgb-60 sp-mgb-40">
    <p class="c-title-3__en font-avenir">Contact</p>
    <h1 class="c-title-3__ja">お問い合わせ</h1>
  </div>

  <div class="p-contact__inner ">
    <div class="p-contact-form">

      <div class="p-contact-form__inner">

        <div>
          <?php
            if (have_posts()) :
              while (have_posts()) : the_post();
                the_content();
              endwhile;
            endif;
          ?>
          
        </div>

      </div>

    </div>

  </div>


</div>


<?php get_template_part('./inc/footer'); ?>
