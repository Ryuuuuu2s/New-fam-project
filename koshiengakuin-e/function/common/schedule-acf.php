<?php

/**
 * 年間行事カレンダー（4月〜3月）
 */
function koshien_schedule_calendar_months()
{
	return [
		['month' => 4, 'field' => 'schedule04', 'image' => 'schedule04.webp', 'default' => '入学式 / 親子の集い'],
		['month' => 5, 'field' => 'schedule05', 'image' => 'schedule05.webp', 'default' => "林間学校 / 球技大会\n公開授業"],
		['month' => 6, 'field' => 'schedule06', 'image' => 'schedule06.webp', 'default' => '水泳教室 / 避難訓練'],
		['month' => 7, 'field' => 'schedule07', 'image' => 'schedule07.webp', 'default' => "七夕かざり / 夏休み勉強会\n個人懇談"],
		['month' => 8, 'field' => 'schedule08', 'image' => 'schedule08.webp', 'default' => '夏休み勉強会'],
		['month' => 9, 'field' => 'schedule09', 'image' => 'schedule09.webp', 'default' => "下校指導 / 公開授業\n夏休み自由研究作品展 / 避難訓練"],
		['month' => 10, 'field' => 'schedule10', 'image' => 'schedule10.webp', 'default' => 'ふれあい動物村 / 遠足'],
		['month' => 11, 'field' => 'schedule11', 'image' => 'schedule11.webp', 'default' => "幼小合同運動会\n学習発表会（舞台発表の部）"],
		['month' => 12, 'field' => 'schedule12', 'image' => 'schedule12.webp', 'default' => 'マラソン大会'],
		['month' => 1, 'field' => 'schedule01', 'image' => 'schedule01.webp', 'default' => '10歳を祝う会 / 公開授業'],
		['month' => 2, 'field' => 'schedule02', 'image' => 'schedule02.webp', 'default' => "修学旅行 / 授業参観\n学習発表会（展示の部）"],
		['month' => 3, 'field' => 'schedule03', 'image' => 'schedule03.webp', 'default' => '追悼式 / 6年生を送る会 卒業式'],
	];
}

/**
 * ACF：年間行事カレンダー
 */
function koshien_schedule_calendar_acf_fields()
{
	$fields = [];

	foreach (koshien_schedule_calendar_months() as $item) {
		$fields[] = [
			'key'           => 'field_' . $item['field'],
			'label'         => $item['month'] . '月：行事',
			'name'          => $item['field'],
			'type'          => 'textarea',
			'instructions'  => '改行で行を分けられます。',
			'rows'          => 3,
			'new_lines'     => '',
			'default_value' => $item['default'],
		];
		$fields[] = [
			'key'           => 'field_' . $item['field'] . '_image',
			'label'         => $item['month'] . '月：画像',
			'name'          => $item['field'] . '_image',
			'type'          => 'image',
			'return_format' => 'array',
			'preview_size'  => 'medium',
		];
	}

	return $fields;
}

/**
 * ACF：演奏歴の行レイアウト定義
 */
function koshien_schedule_music_row_layouts($prefix)
{
	return [
		"layout_{$prefix}_standard" => [
			'key'     => "layout_{$prefix}_standard",
			'name'    => 'standard',
			'label'   => '標準（年＋曲＋画像）',
			'display' => 'block',
			'sub_fields' => [
				[
					'key'   => "field_{$prefix}_year",
					'label' => '年',
					'name'  => 'year',
					'type'  => 'textarea',
					'instructions' => '改行で年月を分けられます。例：平成19年 → ３月',
					'wrapper' => ['width' => '30'],
					'placeholder' => "令和7年\n3月",
					'rows'  => 2,
					'new_lines' => '',
				],
				[
					'key'   => "field_{$prefix}_songs",
					'label' => '演奏曲',
					'name'  => 'songs',
					'type'  => 'textarea',
					'instructions' => '1行に1曲。例：やさしさに包まれたなら',
					'wrapper' => ['width' => '70'],
					'rows'  => 5,
				],
				[
					'key'           => "field_{$prefix}_image",
					'label'         => '画像',
					'name'          => 'image',
					'type'          => 'image',
					'return_format' => 'array',
					'preview_size'  => 'medium',
				],
			],
		],
		"layout_{$prefix}_break" => [
			'key'     => "layout_{$prefix}_break",
			'name'    => 'break',
			'label'   => '休養（期間＋注記）',
			'display' => 'block',
			'sub_fields' => [
				[
					'key'   => "field_{$prefix}_period",
					'label' => '期間',
					'name'  => 'period',
					'type'  => 'text',
					'wrapper' => ['width' => '40'],
					'placeholder' => '令和2年~令和4年',
				],
				[
					'key'   => "field_{$prefix}_note",
					'label' => '注記',
					'name'  => 'note',
					'type'  => 'text',
					'wrapper' => ['width' => '60'],
					'placeholder' => '休養（コロナ禍のため）',
				],
			],
		],
		"layout_{$prefix}_columns" => [
			'key'     => "layout_{$prefix}_columns",
			'name'    => 'columns',
			'label'   => '2列（年＋曲リスト左右）',
			'display' => 'block',
			'sub_fields' => [
				[
					'key'   => "field_{$prefix}_columns_year",
					'label' => '年',
					'name'  => 'year',
					'type'  => 'textarea',
					'instructions' => '改行で年月を分けられます。例：平成19年 → ３月',
					'wrapper' => ['width' => '30'],
					'placeholder' => "平成15年\n3月",
					'rows'  => 2,
					'new_lines' => '',
				],
				[
					'key'   => "field_{$prefix}_songs_left",
					'label' => '演奏曲（左列）',
					'name'  => 'songs_left',
					'type'  => 'textarea',
					'instructions' => '1行に1曲',
					'wrapper' => ['width' => '35'],
					'rows'  => 5,
				],
				[
					'key'   => "field_{$prefix}_songs_right",
					'label' => '演奏曲（右列）',
					'name'  => 'songs_right',
					'type'  => 'textarea',
					'instructions' => '1行に1曲',
					'wrapper' => ['width' => '35'],
					'rows'  => 5,
				],
			],
		],
	];
}

/**
 * ACF：タブ内セクション（見出し＋演奏歴リスト）
 */
function koshien_schedule_music_sections_field($tab_number, $prefix)
{
	return [
		'key'          => "field_music_tab_{$tab_number}_sections",
		'label'        => 'セクション',
		'name'         => "music_tab_{$tab_number}_sections",
		'type'         => 'repeater',
		'instructions' => '見出しが変わるタイミングごとにセクションを追加します。',
		'layout'       => 'block',
		'button_label' => 'セクションを追加',
		'collapsed'    => "field_music_tab_{$tab_number}_section_title",
		'sub_fields'   => [
			[
				'key'   => "field_music_tab_{$tab_number}_section_title",
				'label' => '見出し',
				'name'  => 'section_title',
				'type'  => 'text',
				'placeholder' => 'TeachersⅡ Phoenix　演奏歴',
			],
			[
				'key'          => "field_music_tab_{$tab_number}_section_rows",
				'label'        => '演奏歴リスト',
				'name'         => 'rows',
				'type'         => 'flexible_content',
				'instructions' => '標準行・休養行・2列行を自由な順番で追加できます。',
				'layouts'      => koshien_schedule_music_row_layouts($prefix),
				'button_label' => '行を追加',
			],
		],
	];
}
