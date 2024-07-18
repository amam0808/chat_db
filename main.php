<?php
// ログインしていない場合はログインページにリダイレクト
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>社員メインページ</title>
<meta name="description"  content="#">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<!--ベースのCSSと各ページのCSS-->
<link rel="stylesheet" type="text/css" href="./css/base.css?1227">
<link rel="stylesheet" type="text/css" href="./css/main.css?1042">
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
  <div class="container">
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
                <a href="pro-member-list.php">
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
              <a href="./logout.php">ログアウト</a> 
              <!--ここにログインアカウント名、ログアウトボタン-->
            </div>
        </div>
    </header>
    <div class="main-content-container">
        <div class="now-task">
            <div class="now-task-title">
                <h2>進行中のタスク</h2>
            </div>
            <ul class="accordion-area">
                <li>
                  <section>
                    <h3 class="title">Webページ制作</h3>
                    <div class="box">
                      <p>内容：コンテンツのトップとなるWebページの作成<br>ワイヤーフレームに沿ってWebページの作成を行う。<br>
                        期限：2024/xx/oo<br>
                        担当：IH部署 ○○</p>
                    </div>
                  </section>
                </li>
                <li>
                  <section>
                    <h3 class="title">プレゼン発表資料制作</h3>
                    <div class="box">
                      <p>内容：プレゼンで使用する資料の制作<br>PPTを使用して資料の作成を行う。※目安発表時間は5分<br>
                        期限：2024/xx/oo<br>
                        担当：IH部署 XX</p>
                    </div>
                  </section>
                </li>
                <li>
                  <section>
                    <h3 class="title">フッターロゴ作成</h3>
                    <div class="box">
                      <p>内容：Webアプリのフッターで使用するロゴの作成。<br>デザインソフトを使用してデザインの作成を行う。※透過画像<br>
                        期限：2024/xx/oo<br>
                        担当：IH部署 --</p>
                    </div>
                  </section>
                </li>
            </ul>
        </div>
        <div class="unfinish-task">
            <div class="unfinish-task-title">
                <h2>未割り当てタスク</h2>
            </div>
            <ul class="accordion-area">
                <li>
                  <section>
                    <h3 class="title">Webアプリで使用するDB構築</h3>
                    <div class="box">
                      <p>内容：Webアプリで運用するDBの構築。<br>MySQLを使用してDBの構築を行う。必要項目などは別途送付します。<br>
                        期限：2024/××/○○<br>
                        担当：IH部署 oo</p>
                    </div>
                  </section>
                </li>
                <li>
                  <section>
                    <h3 class="title">Gitリポジトリの作成・管理</h3>
                    <div class="box">
                      <p>内容：Webアプリで運用するGitリポジトリの作成、メンバー管理。<br>Gitリポジトリを作成し、プロジェクトメンバーの招待を行う。<br>
                        期限：2024/××/○○<br>
                        担当：IH部署 --</p>
                    </div>
                  </section>
                </li>
                <li>
                  <section>
                    <h3 class="title">作品のエントリー</h3>
                    <div class="box">
                      <p>内容：作品のエントリーを行い、ProtoPediaのURLをメールにてフィードバック<br>ProdoPediaの詳細は別途送付予定。※報告書は社員○○宛てに作成。<br>
                        期限：2024/××/○○<br>
                        担当：IH部署 oo</p>
                    </div>
                  </section>
                </li>
            </ul>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-logo">
            <img src="img/logo.png" alt="ロゴ画像">
        </div>
            <small>© 2024 ChoiPartner</small>
    </footer>
  </div><!--containerの閉じタグ-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
</body>
</html>