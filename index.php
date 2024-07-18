<?php
// ログインしていない場合はログインページにリダイレクト
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: top.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>チャットアプリ</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <meta charset="utf-8">
</head>

<body>
    <div class="container">
        <div class="left">
            <h2>ユーザー情報</h2>
            <p>ユーザー名：<?= htmlspecialchars($_SESSION["name"]) ?></p>
            <p>メールアドレス：<?= htmlspecialchars($_SESSION["email"]) ?></p>
            <a href="update_profile.php" class="user-button">ユーザー情報を変更する</a>
            <a href="logout.php" class="user-button logout">ログアウト</a>
        </div>
        <div class="right">
            <h2>チャット</h2>
            <div class="chat-box">
                <?php
                include "sql_connection.php";

                // メッセージを取得
                $sql = "SELECT messages.message, users.name FROM messages INNER JOIN users ON messages.users_id = users.id ORDER BY messages.id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) > 0) {
                    foreach ($result as $row) {
                        echo "<p><strong>" . htmlspecialchars($row['name']) . ":</strong> " . htmlspecialchars($row['message']) . "</p>";
                    }
                } else {
                    echo "<p>メッセージがありません</p>";
                }

                // 接続を閉じる
                $conn = null;
                ?>
            </div>
            <form action="send_message.php" method="post" class="chat-form">
                <label for="message">メッセージを入力してください:</label>
                <input type="text" id="message" name="message" required>
                <button type="submit">送信</button>
            </form>
        </div>
    </div>
    <script>
        // チャットボックスが常に下にスクロールされるようにする関数
        window.onload = () => {
            let chatBox = document.querySelector(".chat-box");
            chatBox.scrollTop = chatBox.scrollHeight;
        };
    </script>
</body>

</html>
