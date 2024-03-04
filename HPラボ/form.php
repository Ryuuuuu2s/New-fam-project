<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームの入力値を変数に代入
    $plan = $_POST["selectplan"];
    $name = $_POST["name"];
    $furigana = $_POST["furigana"];
    $office = $_POST["office"];
    $text = $_POST["text"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $content = $_POST["content"];


 // reCAPTCHAの秘密キー
    $secretKey = '6Lcl-ogpAAAAADj-gUGDCO2KC6YBnCA62pk-cz_B';
    $captchaResponse = $_POST['g-recaptcha-response'];

     // APIリクエスト
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captchaResponse}");
 
         
    
    // 送信先１　自分
    $message1 = "以下内容で受け付けました。\n";
    $message1 .= "==================================\n\n";
    $message1 .= "プラン: " . htmlspecialchars($plan, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "氏名: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "ふりがな: " . htmlspecialchars($furigana, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "企業名/屋号: " . htmlspecialchars($office, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "電話番号: " . htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "メールアドレス: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "お問い合わせ内容: ". "\n" . htmlspecialchars($content, ENT_QUOTES, 'UTF-8') . "\n";
    $message1 .= "==================================\n";
    $message1 .= "こちらは自動返信メールです。\n" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "に返信お願い致します。";

    // 送信先２ 相手
    $message2 = "お問い合わせ誠にありがとうございます。以下内容で受け付けました。\n";
    $message2 .= "==================================\n\n";
    $message2 .= "プラン: " . htmlspecialchars($plan, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "氏名: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "ふりがな: " . htmlspecialchars($furigana, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "企業名/屋号: " . htmlspecialchars($office, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "電話番号: " . htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "メールアドレス: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "お問い合わせ内容: ". "\n" . htmlspecialchars($content, ENT_QUOTES, 'UTF-8') . "\n";
    $message2 .= "==================================\n";
    $message2 .= "こちらは自動返信メールです。担当者からの返信をお待ちください。\n";
    
    // メールを送信先1に送信
    $to1 = "seedless0802@gmail.com"; // 受信者のメールアドレス1テスト
    // $to1 = "hplabo-support@hp-lab.co.jp"; // 受信者のメールアドレス1本番
    $subject1 = "ホームページラボからお問い合わせがありました。"; // メールの件名
    $headers1 = "From: hplabo-support@hp-lab.co.jp\r\n"; // 送信元のメールアドレス

    // メールを送信先2に送信
    $to2 = $_POST["email"]; // 受信者のメールアドレス2
    $subject2 = "お問い合わせを受け付けました。"; // メールの件名
    $headers2 = "From: hplabo-support@hp-lab.co.jp\r\n"; // 送信元のメールアドレス

    // 2つのメールを送信
    $mail1 = mail($to1, $subject1, $message1, $headers1);
    $mail2 = mail($to2, $subject2, $message2, $headers2);

    // if ($mail1 && $mail2) {
    //     // 送信が成功した場合の処理
    //     echo '<script>alert("送信が完了しました。担当者からの返信をお待ちください。"); window.location.href = "index.html";</script>';
    // } else {
    //     // 送信が失敗した場合の処理
    //     echo '<script>alert("メールの送信に失敗しました。もう一度お試しください。");</script>';
    // }

    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
         if ($mail1 && $mail2) {
            echo '<script>alert("送信が完了しました。担当者からの返信をお待ちください。"); window.location.href = "index.html";</script>';
         }
       } else {
        echo '<script>alert("メールの送信に失敗しました。もう一度お試しください。"); window.location.href = "index.html";</script>';
       }
    
    ?>

