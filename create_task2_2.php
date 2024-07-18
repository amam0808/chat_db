<?php
session_start();
 
// タスク作成処理
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // フォームからの入力を取得
    $title = $_POST["title"];
    $deadline = $_POST["deadline"];
    $reward = $_POST["reward"];
    $content = $_POST["content"];
 
    // データベースに接続
    include "sql_connection.php";
 
    // タスクをデータベースに挿入
    $stmt = $conn->prepare("INSERT INTO tasks (title, deadline, reward, content) VALUES (:title, :deadline, :reward, :content)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':deadline', $deadline);
    $stmt->bindParam(':reward', $reward);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
 
    // データベース接続を閉じる
    $conn = null;
 
    // タスク作成後、タスク一覧ページにリダイレクト
    header("Location: task_list2.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスク作成</title>
    <!-- 外部CSSの読み込み -->
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
    <link rel="stylesheet" href="./css/base.css?1156">
    <link rel="stylesheet" href="./css/createtask_2.css?1217">
    <!-- Typekitのスクリプト -->
    <script>
        (function(d) {
            var config = {
                kitId: 'rhg3ulq',
                scriptTimeout: 3000,
                async: true
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>
</head>
<body>
    <!-- ヘッダー -->
    <header>
    <div class="main-menu">
            <!--icon名は後で変更-->
            <div class="menu-icon">
                <a href="main.php">
                  <img src="./img/main.png" alt="メインページ" width="70px">
                </a><br>
                <a href="main.php">HOME</a>
            </div>
            <div class="menu-icon">
                <a href="task_list2.php">
                  <img src="./img/task_list.png" alt="タスク一覧" width="70px">
                </a><br>
                <a href="task_list2.php">TASK LIST</a>
            </div>
            <div class="menu-icon">
                <a href="taskwait.php">
                  <img src="./img/task_ok.png" alt="タスク承認待ち" width="70px">
                </a><br>
                <a href="taskwait.php">WAIT LIST</a>
            </div>
            <div class="menu-icon">
                <a href="create_task2_2.php">
                  <img src="./img/task_approval.png" alt="タスク作成" width="70px">
                </a><br>
                <a href="create_task2_2.php">CREATE</a>
            </div>
            <div class="menu-icon">
                <a href="main.php">
                  <img src="./img/task_wait.png" alt="社員一覧" width="70px">
                </a><br>
                <a href="pro-member-list.php">MEMBER</a>
            </div>
            <div class="menu-icon">
                <a href="profile.php">
                  <img src="./img/prof.png" alt="プロフィール" width="70px">
                </a><br>
                <a href="profile.php">PROFILE</a>
            </div>
            <div class="acount">
              <p><?= htmlspecialchars($_SESSION["name"]) ?>さん</p>
              <a href="./login/logout.php">ログアウト</a>
              <!--ここにログインアカウント名、ログアウトボタン-->
            </div>
        </div>
    </header>
 
    <!-- メインコンテンツ -->
    <div class="container">
        <h2>タスク作成</h2>
        <!-- タスク作成フォーム -->
         <div class="forms">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-container">
                <div class="left-section">
                    <div class="form-group">
                        <label for="title">タイトル:</label>
                        <input type="text" id="title" name="title" required>
                    </div>
 
                    <div class="form-group">
                        <label for="content">内容:</label>
                        <textarea id="content" name="content" rows="4" required></textarea>
                    </div>
                </div>
 
                <div class="right-section">
                    <div class="form-group">
                        <label for="deadline">期限:</label>
                        <input type="date" id="deadline" name="deadline" required>
                    </div>
 
                    <div class="form-group">
                        <label for="reward">報酬:</label>
                        <input type="number" id="reward" name="reward" min="0" step="1" required>
                    </div>
                </div>
            </div>
 
            <div class="sakusei">
                <div class="form-group">
                    <button type="submit">作成</button>
                </div>
            </div>
        </form>
 
        <!-- 戻るリンク -->
         <div class="back">
            <p><a href="main.php">≪ 戻る</a></p>
        </div>
    </div>
 
    <!-- フッター -->
    <footer class="footer">
        <div class="footer-logo">
            <img src="img/logo.png" alt="ロゴ画像">
        </div>
        <small>© 2024 ChoiPartner</small>
    </footer>
</body>
</html>
 