<?php

if (!is_user_logged_in()) {
  wp_redirect(home_url('/login'));
  exit;
}
get_header();
?>

<div class="control">

  <div class="control--wap">

    <div class="control--wap--item">
      <div class="item--name">aaaa</div>
      <div class="item--curriculum">10</div>
    </div>

  </div>



</div>

<?php get_footer(); ?>