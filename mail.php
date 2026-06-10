<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

// フォームデータ取得
$name      = $_POST['name'] ?? '';
$email     = $_POST['email'] ?? '';
$phone     = $_POST['phone'] ?? '';
$address   = $_POST['address'] ?? '';
$course    = $_POST['course'] ?? '';
$extension = $_POST['extension'] ?? '';
$car       = $_POST['car'] ?? '';
$date1     = $_POST['date1'] ?? '';
$date2     = $_POST['date2'] ?? '';
$practice  = $_POST['practice'] ?? '';
$message   = $_POST['message'] ?? '';


// ========================
// 管理者宛メール
// ========================

$to = "info@anshin-driving.com";

$subject = "【安心・ドライビングマイスター】新規お申し込み";

$body = <<<EOD

ホームページから新しいお申し込みがありました。

━━━━━━━━━━━━━━

【お名前】
{$name}

【メールアドレス】
{$email}

【電話番号】
{$phone}

【住所】
{$address}

【希望コース】
{$course}

【延長希望】
{$extension}

【使用車両】
{$car}

【第1希望日時】
{$date1}

【第2希望日時】
{$date2}

【練習したい内容】
{$practice}

【ご相談内容】
{$message}

━━━━━━━━━━━━━━

EOD;

$header = "From: info@anshin-driving.com";

mb_send_mail($to, $subject, $body, $header);


// ========================
// お客様への自動返信
// ========================

$user_subject = "【安心・ドライビングマイスター】お申し込みありがとうございます";

$user_body = <<<EOD

{$name} 様

この度は、安心・ドライビングマイスターへお申し込みいただき、誠にありがとうございます。

お申し込み内容を確認のうえ、通常24時間以内にご連絡いたします。

万が一連絡がない場合は、お手数ですが再度お問い合わせください。

━━━━━━━━━━━━━━

【お申し込み内容】

お名前：{$name}

電話番号：{$phone}

住所：{$address}

希望コース：{$course}

延長希望：{$extension}

使用車両：{$car}

第1希望日時：{$date1}

第2希望日時：{$date2}

練習したい内容：{$practice}

ご相談内容：
{$message}

━━━━━━━━━━━━━━

安心・ドライビングマイスター
代表　今井悟朗

所在地：三重県桑名市

メール
info@anshin-driving.com

ホームページ
https://anshin-driving.com

━━━━━━━━━━━━━━

※このメールは自動送信です。

EOD;

mb_send_mail(
    $email,
    $user_subject,
    $user_body,
    $header
);


// ========================
// 完了ページへ移動
// ========================

header("Location: thanks.html");
exit;
