<?php
session_start();

// セッションにユーザーIDがない場合はエラーメッセージを出力して終了
if (!isset($_SESSION['id'])) {
    die('ログインが必要です。');
}

include 'sql_connection.php';

// POSTリクエストが来た場合の処理
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // フォームから送られてきたtask_idを取得
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['id']; // セッションに保存されているユーザーIDを取得

    // タスクが既に保存されているか確認するクエリの準備
    $stmt = $conn->prepare("SELECT * FROM user_tasks WHERE user_id = :user_id AND task_id = :task_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':task_id', $task_id);
    $stmt->execute();

    // 結果が0行なら新しいタスクを保存する
    if ($stmt->rowCount() == 0) {
        // 新しいタスクを保存するクエリの準備
        $stmt = $conn->prepare("INSERT INTO user_tasks (user_id, task_id) VALUES (:user_id, :task_id)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':task_id', $task_id);

        // タスクの保存が成功したかどうかを確認
        if ($stmt->execute()) {
            echo "タスクが保存されました。";
        } else {
            echo "タスクの保存に失敗しました。";
        }
    } else {
        echo "このタスクは既に保存されています。";
    }

    $conn = null; // データベース接続を閉じる
}
?>
