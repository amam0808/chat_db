<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>ログイン</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <meta charset="utf-8">
</head>

<body>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <div class="register-container">
            <h2>リーダー用新規登録</h2>
            <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="post">
                <label for="name">名前:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">メールアドレス:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">パスワード:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">パスワード確認:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <button type="submit">登録</button>
                <?php if (isset($_SESSION["err_register_message"])) {
                    echo "<p style='color: red;'>" . $_SESSION["err_register_message"] . "</p>";
                } ?>
            </form>
            <p>既にアカウントをお持ちの方は<a href="login.php">ログインページ</a>へ</p>
        </div>
    <?php } ?>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
        <?php

        include "sql_connection.php";

        // フォームからの入力を取得
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // emailの重複チェック
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            if ($password === $confirm_password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users_copy (name, email, password) VALUES (:name, :email, :password)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                $stmt = $conn->prepare("SELECT * FROM users_copy WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // ログイン成功時にindex.phpにリダイレクト
                $_SESSION["id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["err_register_message"] = null;

                header("Location: top.php");
                exit;
            } else {
                $_SESSION["err_register_message"] = "確認と違うパスワードが入力されました。";
                header("Location: register.php");
                exit;
            }
        } else {
            // email重複エラーメッセージ
            $_SESSION["err_register_message"] = "そのemailは登録されています。";
            header("Location: register.php");
            exit;
        }

        $conn = null;
        ?>
    <?php } ?>
</body>

</html>