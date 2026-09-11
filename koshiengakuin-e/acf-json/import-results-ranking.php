<?php

/**
 * 合格者数一覧を初回インポートする
 *
 * 使い方（テーマ直下）:
 *   php acf-json/import-results-ranking.php
 *   php acf-json/import-results-ranking.php --force
 */

$force = in_array('--force', $argv ?? [], true);
$wp_load = dirname(__DIR__, 4) . '/wp-load.php';

if (!file_exists($wp_load)) {
	fwrite(STDERR, "wp-load.php が見つかりません: {$wp_load}\n");
	exit(1);
}

require $wp_load;

if (!function_exists('update_field')) {
	fwrite(STDERR, "ACF プラグインが有効になっていません。\n");
	exit(1);
}

$pages = get_posts([
	'post_type'      => 'page',
	'posts_per_page' => 1,
	'meta_key'       => '_wp_page_template',
	'meta_value'     => 'pages/page-results.php',
]);

if (!$pages) {
	fwrite(STDERR, "テンプレート pages/page-results.php の固定ページが見つかりません。\n");
	exit(1);
}

$page_id = $pages[0]->ID;
$existing = get_field('results_ranking_schools', $page_id);

if ($existing && !$force) {
	echo "スキップ: ページ ID {$page_id} に既にデータがあります（{$pages[0]->post_title}）。\n";
	echo "上書きする場合: php acf-json/import-results-ranking.php --force\n";
	exit(0);
}

$schools = require __DIR__ . '/data/results-ranking-schools.php';
$result = update_field('results_ranking_schools', $schools, $page_id);

if (!$result) {
	fwrite(STDERR, "インポートに失敗しました（ページ ID: {$page_id}）。\n");
	exit(1);
}

echo "インポート完了: {$pages[0]->post_title}（ID: {$page_id}）に " . count($schools) . " 件を登録しました。\n";
