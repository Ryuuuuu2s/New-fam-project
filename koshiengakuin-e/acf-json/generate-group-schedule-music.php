<?php

if (!function_exists('add_action')) {
	function add_action(...$args) {}
}

require_once dirname(__DIR__) . '/function/common/schedule-acf.php';

function koshien_acf_json_defaults(array $field, string $parent_key = ''): array
{
	$defaults = [
		'aria-label'         => '',
		'instructions'       => $field['instructions'] ?? '',
		'required'           => 0,
		'conditional_logic'  => 0,
		'wrapper'            => [
			'width' => $field['wrapper']['width'] ?? '',
			'class' => '',
			'id'    => '',
		],
	];

	if ($parent_key) {
		$defaults['parent_repeater'] = $parent_key;
	}

	return array_merge($defaults, $field);
}

function koshien_acf_json_row_layouts(string $prefix): array
{
	$layouts = koshien_schedule_music_row_layouts($prefix);
	$result  = [];

	foreach ($layouts as $layout) {
		$sub_fields = [];

		foreach ($layout['sub_fields'] as $sub_field) {
			$normalized = koshien_acf_json_defaults($sub_field);
			$normalized = array_merge([
				'default_value' => '',
				'maxlength'     => '',
				'placeholder'   => $normalized['placeholder'] ?? '',
				'prepend'       => '',
				'append'        => '',
			], $normalized);

			if ($sub_field['type'] === 'textarea') {
				$normalized['new_lines'] = '';
			}

			if ($sub_field['type'] === 'image') {
				$normalized = array_merge($normalized, [
					'library'     => 'all',
					'min_width'   => '',
					'min_height'  => '',
					'min_size'    => '',
					'max_width'   => '',
					'max_height'  => '',
					'max_size'    => '',
					'mime_types'  => '',
				]);
			}

			$sub_fields[] = $normalized;
		}

		$result[$layout['key']] = [
			'key'        => $layout['key'],
			'name'       => $layout['name'],
			'label'      => $layout['label'],
			'display'    => $layout['display'],
			'sub_fields' => $sub_fields,
			'min'        => '',
			'max'        => '',
		];
	}

	return $result;
}

function koshien_acf_json_sections_field(int $tab_number, string $prefix): array
{
	$repeater_key = "field_music_tab_{$tab_number}_sections";
	$field        = koshien_schedule_music_sections_field($tab_number, $prefix);

	$field['sub_fields'] = [
		koshien_acf_json_defaults([
			'key'         => "field_music_tab_{$tab_number}_section_title",
			'label'       => '見出し',
			'name'        => 'section_title',
			'type'        => 'text',
			'placeholder' => 'TeachersⅡ Phoenix　演奏歴',
		], $repeater_key),
		koshien_acf_json_defaults([
			'key'          => "field_music_tab_{$tab_number}_section_rows",
			'label'        => '演奏歴リスト',
			'name'         => 'rows',
			'type'         => 'flexible_content',
			'instructions' => '標準行・休養行・2列行を自由な順番で追加できます。',
			'layouts'      => koshien_acf_json_row_layouts($prefix),
			'button_label' => '行を追加',
			'min'          => '',
			'max'          => '',
		], $repeater_key),
	];

	return koshien_acf_json_defaults(array_merge($field, [
		'min'            => '',
		'max'            => '',
		'rows_per_page'  => 20,
		'pagination'     => 0,
	]));
}

$group = [
	'key'                   => 'group_schedule_music',
	'title'                 => '心がつながる一年：演奏歴',
	'fields'                => [
		[
			'key'               => 'field_music_tab_1',
			'label'             => '学習発表会での演奏歴',
			'name'              => '',
			'aria-label'        => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => ['width' => '', 'class' => '', 'id' => ''],
			'placement'         => 'top',
			'endpoint'          => 0,
			'selected'          => 0,
		],
		koshien_acf_json_sections_field(1, 'music_tab1'),
		[
			'key'               => 'field_music_tab_2',
			'label'             => '６年生を送る会での演奏歴',
			'name'              => '',
			'aria-label'        => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => ['width' => '', 'class' => '', 'id' => ''],
			'placement'         => 'top',
			'endpoint'          => 0,
			'selected'          => 0,
		],
		koshien_acf_json_sections_field(2, 'music_tab2'),
		[
			'key'               => 'field_music_tab_3',
			'label'             => 'その他の演奏歴',
			'name'              => '',
			'aria-label'        => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => ['width' => '', 'class' => '', 'id' => ''],
			'placement'         => 'top',
			'endpoint'          => 0,
			'selected'          => 0,
		],
		koshien_acf_json_sections_field(3, 'music_tab3'),
	],
	'location'              => [
		[
			[
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'pages/page-schedule.php',
			],
		],
	],
	'menu_order'            => 1,
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

file_put_contents(__DIR__ . '/group_schedule_music.json', $output . PHP_EOL);

echo "Generated: acf-json/group_schedule_music.json\n";
