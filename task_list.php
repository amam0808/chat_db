<?php
session_start();

// データベースに接続
include "sql_connection.php";

// タスク一覧取得
$stmt = $conn->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// データベース接続を閉じる
$conn = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>タスク一覧ページ</title>
<meta name="description"  content="#">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<!--ベースのCSSと各ページのCSS-->
<link rel="stylesheet" type="text/css" href="./buka/css/base_buka.css">
<link rel="stylesheet" type="text/css" href="./css/tasklist.css?1715">
<!--Adobeフォントを読み込むためのスクリプト-->
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
    <header>
    <div class="main-menu">
            <!--icon名は後で変更-->
            <div class="menu-icon">
                <a href="main_buka.php">
                  <img src="./img/main.png" alt="メインページ" width="70px">
                </a><br>
                <a href="main_buka.php">HOME</a>
            </div>
            <div class="menu-icon">
                <a href="task_list.php">
                  <img src="./img/task_list.png" alt="タスク一覧" width="70px">
                </a><br>
                <a href="task_list.php">TASK LIST</a>
            </div>
            <div class="menu-icon">
                <a href="pro-member-list-buka.php">
                  <img src="./img/task_wait.png" alt="社員一覧" width="70px">
                </a><br>
                <a href="pro-member-list-buka.php">MEMBER</a>
            </div>
            <div class="menu-icon">
                <a href="profile_buka.php">
                  <img src="./img/prof.png" alt="プロフィール" width="70px">
                </a><br>
                <a href="profile_buka.php">PROFILE</a>
            </div>
            <div class="acount">
                <p><?= htmlspecialchars($_SESSION["name"]) ?>さん</p>
                <a href="./login/logout.php">ログアウト</a> 
              <!--ここにログインアカウント名、ログアウトボタン-->
            </div>
        </div>
    </header>
    <div class="task__all">
        <h2>タスク一覧</h2>
        <ul>
            <?php foreach ($tasks as $task) : ?>
                <li class="task__item">
                    <div class="task__header">
                        <button class="task__toggle-button" onclick="toggleDetails(this)">▼</button>
                        <span class="task__name"><?php echo htmlspecialchars($task['title']); ?></span>
                    </div>
                    <div class="task__details">
                        <p>期限: <?php echo htmlspecialchars($task['deadline']); ?></p>
                        <p>報酬: <?php echo number_format($task['reward']); ?></p>
                        <p>内容: <?php echo htmlspecialchars($task['content']); ?></p>
                    </div>
                    <button class="task__button" onclick="toggleApproval(this)">保存する</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <footer class="footer">
        <div class="footer-logo">
            <img src="img/logo.png" alt="ロゴ画像">
        </div>
        <small>© 2024 ChoiPartner</small>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
    <script src="./js/tasklist.js"></script>
</body>
</html>
