<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Choi work</title>
    <link rel="stylesheet" type="text/css" href="./css/top.css">
    <meta charset="utf-8">
</head>

<body>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <div class="logo">
            <img src="./img/logo.png" alt="logo">
        </div>
        
        <div class="select">
            <a href="loginform.php">
                <div class="select_icon">
                    <h2>リーダーはこちら</h2>
                    <img src="./img/icon_jilyoushi.png" alt="icon">
                </div>
            </a>
            <a href="loginform_buka.php">
                <div class="select_icon">
                    <h2>メンバーはこちら</h2>
                    <img src="./img/icon_buka.png" alt="icon">
                </div>
            </a>
        </div>

    <?php } ?>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
        <?php

        include "sql_connection.php";

        // フォームからの入力を取得
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // ログイン成功時にindex.phpにリダイレクト
                $_SESSION["id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["err_login_message"] = null;
                header("Location: main.php");
                exit;
            } else {
                $_SESSION["err_login_message"] = "メールアドレスまたはパスワードが間違っています。";
                header("Location: login.php");
                exit;
            }
        } else {
            // ログイン失敗
            $_SESSION["err_login_message"] = "メールアドレスまたはパスワードが間違っています。";
            header("Location: login.php");
            exit;
        }

        $conn = null;
        ?>
    <?php } ?>
</body>

</html>