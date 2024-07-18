<?php
// SQLの設定

$servername = "localhost"; // データベースサーバーの名前
$username = "root";        // データベースのユーザー名
$password = "";        // データベースのパスワード
$dbname = "chat2";         // データベース名

try {
    // データベース接続の作成
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $conn = new PDO($dsn, $username, $password, $options);

    // 成功メッセージ
    // echo "データベースに正常に接続されました。";
} catch (PDOException $e) {
    // エラーメッセージ
    die("データベースに接続できませんでした: " . $e->getMessage());
}
?>