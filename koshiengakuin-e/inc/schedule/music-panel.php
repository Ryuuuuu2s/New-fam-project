<?php

$sections_field = get_query_var('music_sections_field');

if (!$sections_field || !function_exists('have_rows') || !have_rows($sections_field)) {
	return;
}
?>

<h2 class="p-schedule_music__panel-title">
	<img src="<?php echo get_template_directory_uri(); ?>/img/schedule/music_title.svg" alt="学習発表会での演奏" loading="lazy" aria-hidden="true" width="446" height="38" class="p-schedule_music__panel-bg w-100">
</h2>
<?php 
while (have_rows($sections_field)) :
	the_row();
	$section_title = get_sub_field('section_title');
?>
<div class="p-schedule_music__panel-inner">


	<div class="p-schedule_music__item-content">
		<?php if ($section_title) : ?>
			<div class="p-schedule_music__item-content-title">
				<p class="p-schedule_music__item-content-title-text"><?php echo esc_html($section_title); ?></p>
			</div>
		<?php endif; ?>

		<?php if (have_rows('rows')) : ?>
			<ul class="p-schedule_music__item-content-list">
				<?php while (have_rows('rows')) : the_row(); ?>
					<?php get_template_part('./inc/schedule/music', 'row'); ?>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
<?php endwhile; ?>
