<?php
/*
Template Name: comparison
Template Post Type: page
Template Path: pages/
*/

?>

<?php get_template_part('./inc/head'); ?>
<?php get_template_part('./inc/header'); ?>
<?php get_template_part('./inc/kv'); ?>

<main class="main">
  <div class="main__inner">

    <?php get_template_part('./inc/mini-column'); ?>
    <?php get_template_part('./inc/ranking'); ?>
    <?php get_template_part('./inc/banner'); ?>
  </div>
</main>

<?php get_template_part('./inc/footer'); ?>