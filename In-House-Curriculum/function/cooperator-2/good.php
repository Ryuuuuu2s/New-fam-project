<?php
// AJAXハンドラを追加（ログインユーザー用）
add_action('wp_ajax_handle_like', 'handle_like');

function handle_like() {
    $user_id = get_current_user_id();
    $item_id = sanitize_text_field($_POST['item_id']);
    $like_count = get_option('global_like_count_' . $item_id, 0);

    // 今日の日付
    $today_date = date('Y-m-d');

    // ユーザーが最後にいいねした日付を取得
    $last_like_date = get_user_meta($user_id, 'last_like_date', true);

    // いいねカウントを取得、もしくは初期化
    $like_count_today = get_user_meta($user_id, 'like_count_today', true) ?: 0;

    // 日付が変わっていたらカウントをリセット
    if ($last_like_date !== $today_date) {
        $like_count_today = 0; // カウントをリセット
        update_user_meta($user_id, 'like_count_today', 0);
        update_user_meta($user_id, 'last_like_date', $today_date); // 新しい日付を保存
    }

    // 既にいいねしている場合
    $liked_items = get_user_meta($user_id, 'liked_items', true) ?: array();
    if (in_array($item_id, $liked_items)) {
        wp_send_json_error(array('message' => 'このタイムラインには既に「いいね」しています。'));
    }

    // 今日のいいね数が5回以上の場合
    if ($like_count_today >= 5) {
        wp_send_json_error(array('message' => '今日はこれ以上「いいね」できません。'));
    }

    // いいねカウントを増やす
    $like_count += 1;
    update_option('global_like_count_' . $item_id, $like_count);
    update_user_meta($user_id, 'like_count_today', $like_count_today + 1);

    // いいねしたアイテムを保存
    $liked_items[] = $item_id;
    update_user_meta($user_id, 'liked_items', $liked_items);

    // 5回目のいいねの場合
    if ($like_count_today + 1 == 5) {
        // 3コインを追加
        add_user_coins($user_id, 3);
        wp_send_json_success(array('new_count' => $like_count, 'message' => '5回いいねしました、3コイン獲得です！'));
    } else {
        wp_send_json_success(array('new_count' => $like_count, 'message' => '「いいね」が成功しました。'));
    }
}
// スクリプトの登録とajaxurlの設定
function my_enqueue_scripts() {
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/cooperatorScript.js', array('jquery'), null, true);
    wp_localize_script('my-script', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


// テスト用いいねリセット
// function reset_today_likes_for_user($user_id) {
//     // 今日のいいねカウントをリセット
//     update_user_meta($user_id, 'like_count_today', 0);

//     // 最後にいいねした日付をリセット
//     delete_user_meta($user_id, 'last_like_date');

//     // 成功メッセージを返す
//     return "User ID {$user_id} の今日のいいね数がリセットされました。";
// }

// // 例えば、現在ログインしているユーザーのいいね数をリセットする場合
// $current_user_id = get_current_user_id();
// echo reset_today_likes_for_user($current_user_id);