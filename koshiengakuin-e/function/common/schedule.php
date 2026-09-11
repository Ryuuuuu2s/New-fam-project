<?php

/**
 * 1行1曲のテキストを演奏曲リストHTMLに変換する
 */
function koshien_schedule_format_songs($text)
{
	if (empty($text)) {
		return '';
	}

	$lines = preg_split('/\r\n|\r|\n/', trim($text));
	$output = [];

	foreach ($lines as $line) {
		$line = trim($line);

		if ($line === '') {
			continue;
		}

		if (strpos($line, '・') === 0) {
			$output[] = esc_html($line);
		} elseif (strpos($line, '『') !== false) {
			$output[] = '　' . esc_html($line);
		} else {
			$output[] = '・『' . esc_html($line) . '』';
		}
	}

	return implode('<br>', $output);
}

/**
 * 年表示テキストをHTMLに変換する（改行で年月を分ける）
 */
function koshien_schedule_format_year($text)
{
	if (empty($text)) {
		return '';
	}

	$lines = preg_split('/\r\n|\r|\n/', trim($text));
	$output = [];

	foreach ($lines as $line) {
		$line = trim($line);

		if ($line === '') {
			continue;
		}

		$output[] = esc_html($line);
	}

	return implode('<br>', $output);
}

/**
 * 年表示が複数行かどうか
 */
function koshien_schedule_year_is_multiline($text)
{
	if (empty($text)) {
		return false;
	}

	$lines = preg_split('/\r\n|\r|\n/', trim($text));
	$lines = array_filter(array_map('trim', $lines), function ($line) {
		return $line !== '';
	});

	return count($lines) > 1;
}

/**
 * 年間行事テキストをHTMLに変換する
 */
function koshien_schedule_format_event($text)
{
	if ($text === null || $text === '') {
		return '';
	}

	return nl2br(esc_html(trim($text)));
}

/**
 * 年間行事の画像URL（未設定時はテーマ内のデフォルト画像）
 */
function koshien_schedule_calendar_image_url($acf_image, $fallback_file)
{
	if (!empty($acf_image['url'])) {
		return $acf_image['url'];
	}

	return get_template_directory_uri() . '/img/schedule/' . $fallback_file;
}

/**
 * 年間行事の画像alt
 */
function koshien_schedule_calendar_image_alt($acf_image)
{
	if (!empty($acf_image['alt'])) {
		return $acf_image['alt'];
	}

	return '';
}
