<?php

$layout = get_row_layout();

if ($layout === 'standard') :
	$year = get_sub_field('year');
	$songs = get_sub_field('songs');
	$image = get_sub_field('image');
?>
<li class="p-schedule_music__item-content-item">
	<?php if ($year) : ?>
		<p class="p-schedule_music__item-content-item-year<?php echo koshien_schedule_year_is_multiline($year) ? ' p-schedule_music__item-content-item-year--multiline' : ''; ?>"><?php echo koshien_schedule_format_year($year); ?></p>
	<?php endif; ?>
	<div class="p-schedule_music__item-content-item-textbox">
		<p class="p-schedule_music__item-content-item-content-title">《演奏曲》</p>
		<?php if ($songs) : ?>
			<p class="p-schedule_music__item-content-item-content-text"><?php echo koshien_schedule_format_songs($songs); ?></p>
		<?php endif; ?>
	</div>
	<?php if ($image) : ?>
		<div class="p-schedule_music__item-content-item-img">
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy">
		</div>
	<?php endif; ?>
</li>
<?php
elseif ($layout === 'break') :
	$period = get_sub_field('period');
	$note = get_sub_field('note');
?>
<li class="p-schedule_music__item-content-item p-schedule_music__item-content-item--break">
	<?php if ($period) : ?>
		<p class="p-schedule_music__item-content-item-year"><?php echo esc_html($period); ?></p>
	<?php endif; ?>
	<?php if ($note) : ?>
		<p class="p-schedule_music__item-content-item-note"><?php echo esc_html($note); ?></p>
	<?php endif; ?>
</li>
<?php
elseif ($layout === 'columns') :
	$year = get_sub_field('year');
	$songs_left = get_sub_field('songs_left');
	$songs_right = get_sub_field('songs_right');
?>
<li class="p-schedule_music__item-content-item p-schedule_music__item-content-item--columns">
	<?php if ($year) : ?>
		<p class="p-schedule_music__item-content-item-year<?php echo koshien_schedule_year_is_multiline($year) ? ' p-schedule_music__item-content-item-year--multiline' : ''; ?>"><?php echo koshien_schedule_format_year($year); ?></p>
	<?php endif; ?>
	<div class="p-schedule_music__item-content-item-textbox">
		<p class="p-schedule_music__item-content-item-content-title">《演奏曲》</p>
		<div class="p-schedule_music__item-content-item-cols">
			<?php if ($songs_left) : ?>
				<p class="p-schedule_music__item-content-item-content-text"><?php echo koshien_schedule_format_songs($songs_left); ?></p>
			<?php endif; ?>
			<?php if ($songs_right) : ?>
				<p class="p-schedule_music__item-content-item-content-text"><?php echo koshien_schedule_format_songs($songs_right); ?></p>
			<?php endif; ?>
		</div>
	</div>
</li>
<?php endif; ?>
