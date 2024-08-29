<?php

// 投稿
function post_has_archive($args, $post_type ) { // 設定後に（パーマリンク更新すること）
	if('post' == $post_type) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'curriculum';
		$args['label'] = 'カリキュラム';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10,2);

add_theme_support('post-thumbnails');

// カスタム投稿追加
add_action('init', 'create_post_type');
function create_post_type()
{
  register_post_type(
    'column',
    array(
      'label' => 'コラム',
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'column'), // スラッグを設定
      'menu_position' => 5,
      'show_in_rest' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
      ),
    )
  );

  // カスタム投稿タイプのカテゴリー
  register_taxonomy(
    'column-cat',
    'column',
    array(
      'label' => 'カテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'column-cat'), // スラッグを設定
    )
  );

  // カスタム投稿タイプのタグ
  register_taxonomy(
    'column-tag',
    'column',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
    )
  );

  // カスタム投稿タイプ「お知らせ」
  register_post_type(
    'news',
    array(
      'label' => 'お知らせ',
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'news'), // スラッグを設定
      'menu_position' => 6,
      'show_in_rest' => true,
      'supports' => array(
        'title',
        // 'editor',
        // 'thumbnail',
        'revisions'
      ),
    )
  );

  // カスタム投稿タイプ「お知らせ」のカテゴリー
  register_taxonomy(
    'news-cat',
    'news',
    array(
      'label' => 'カテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'news-cat'), // スラッグを設定
    )
  );

  // カスタム投稿タイプ「お知らせ」のタグ
  register_taxonomy(
    'news-tag',
    'news',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
    )
  );
}

add_theme_support('post-thumbnails');

?>