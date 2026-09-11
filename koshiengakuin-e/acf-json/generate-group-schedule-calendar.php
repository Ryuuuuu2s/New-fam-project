<?php

if (!function_exists('add_action')) {
	function add_action(...$args) {}
}

require_once dirname(__DIR__) . '/function/common/schedule-acf.php';

function koshien_acf_json_calendar_defaults(array $field): array
{
	$defaults = [
		'aria-label'        => '',
		'instructions'      => $field['instructions'] ?? '',
		'required'          => 0,
		'conditional_logic' => 0,
		'wrapper'           => [
			'width' => '',
			'class' => '',
			'id'    => '',
		],
	];

	if (($field['type'] ?? '') === 'image') {
		return array_merge($defaults, [
			'return_format' => $field['return_format'] ?? 'array',
			'library'       => 'all',
			'min_width'     => '',
			'min_height'    => '',
			'min_size'      => '',
			'max_width'     => '',
			'max_height'    => '',
			'max_size'      => '',
			'mime_types'    => '',
			'preview_size'  => $field['preview_size'] ?? 'medium',
		], $field);
	}

	return array_merge($defaults, [
		'default_value' => $field['default_value'] ?? '',
		'maxlength'     => '',
		'placeholder'   => '',
		'prepend'       => '',
		'append'        => '',
		'rows'          => $field['rows'] ?? 3,
		'new_lines'     => '',
	], $field);
}

$fields = [];

foreach (koshien_schedule_calendar_acf_fields() as $field) {
	$fields[] = koshien_acf_json_calendar_defaults($field);
}

$group = [
	'key'                   => 'group_schedule_calendar',
	'title'                 => '心がつながる一年：年間行事',
	'fields'                => $fields,
	'location'              => [
		[
			[
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'pages/page-schedule.php',
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
$output = str_replace('pages/page-schedule.php', 'pages\/page-schedule.php', $output);

file_put_contents(__DIR__ . '/group_schedule_calendar.json', $output . PHP_EOL);

echo "Generated: acf-json/group_schedule_calendar.json\n";
