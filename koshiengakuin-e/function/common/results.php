<?php

/**
 * 合格者数一覧を取得する
 */
function koshien_results_get_ranking_schools()
{
	if (!function_exists('have_rows') || !have_rows('results_ranking_schools')) {
		return [];
	}

	$schools = [];

	while (have_rows('results_ranking_schools')) {
		the_row();
		$name = get_sub_field('name');
		$num = get_sub_field('num');

		if ($name === '' && ($num === '' || $num === null)) {
			continue;
		}

		$schools[] = [
			'name' => $name,
			'num'  => $num,
		];
	}

	return $schools;
}
