<?php

if (!function_exists('add_action')) {
	function add_action(...$args) {}
}

require_once dirname(__DIR__) . '/function/common/results-acf.php';

function koshien_acf_json_results_defaults(array $field, string $parent_key = ''): array
{
	$defaults = [
		'aria-label'        => '',
		'instructions'      => $field['instructions'] ?? '',
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => [
			'width' => $field['wrapper']['width'] ?? '',
			'class' => '',
			'id'    => '',
		],
	];

	if ($parent_key) {
		$defaults['parent_repeater'] = $parent_key;
	}

	$field = array_merge($defaults, $field);

	if (($field['type'] ?? '') === 'repeater') {
		$sub_fields = [];

		foreach ($field['sub_fields'] as $sub_field) {
			$normalized = koshien_acf_json_results_defaults($sub_field, $field['key']);
			$normalized = array_merge([
				'default_value' => '',
				'maxlength'     => '',
				'placeholder'   => $normalized['placeholder'] ?? '',
				'prepend'       => '',
				'append'        => '',
			], $normalized);

			if ($sub_field['type'] === 'number') {
				$normalized = array_merge([
					'min'  => $sub_field['min'] ?? '',
					'max'  => $sub_field['max'] ?? '',
					'step' => $sub_field['step'] ?? '',
				], $normalized);
			}

			$sub_fields[] = $normalized;
		}

		$field['sub_fields'] = $sub_fields;
		$field['min'] = '';
		$field['max'] = '';
		$field['rows_per_page'] = 20;
		$field['pagination'] = 0;
	}

	return $field;
}

$fields = [];

foreach (koshien_results_ranking_acf_fields() as $field) {
	$fields[] = koshien_acf_json_results_defaults($field);
}

$group = [
	'key'                   => 'group_results_ranking',
	'title'                 => '卒業生・進学実績：合格者数',
	'fields'                => $fields,
	'location'              => [
		[
			[
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'pages/page-results.php',
			],
		],
	],
	'menu_order'            => 0,
	'position'              => 'normal',
	'style'                 => 'default',
	'label_placement'       => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen'        => '',
	'active'                => true,
	'description'           => '',
	'show_in_rest'          => 0,
	'modified'              => time(),
];

$output = json_encode($group, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$output = str_replace('pages/page-results.php', 'pages\/page-results.php', $output);

file_put_contents(__DIR__ . '/group_results_ranking.json', $output . PHP_EOL);

echo "Generated: acf-json/group_results_ranking.json\n";
