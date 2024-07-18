<?php
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
<link rel="stylesheet" type="text/css" href="./css/base.css">
<link rel="stylesheet" type="text/css" href="./css/profile.css?1017">
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
    <!-- <div class="prof">
        <h1>プロフィール</h1>
    </div> -->
    <section id="about" class="wrapper">
      <h2 class="section-title">山田太郎</h2>
      <div class="content">
        <img src="img/prof.png" alt="テキストテキストテキスト">
      </div>
    </section>
    <div class="container">
      <div class="item">
          <h2>基本情報</h2>
          <p>年齢</p>
 
         <label for="age"></label>
          <select name="age">
 
              <option value="">-</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
 
 
            <br>
 
 
            <p>性別</p>
            <select name="sei">
 
              <option value="">-</option>
              <option value="0">女性</option>
              <option value="1">男性</option>
             
            </select>
 
            <br>
 
 
            <p>言語/レベル</p>
            <select name="sei">
 
              <option value="">-</option>
              <option value="0">HTML</option>
              <option value="1">CSS</option>
              <option value="0">JAVA</option>
              <option value="1">PHP</option>
             
            </select>
 
           
            <select  name="sei">
             
              <option value="">-</option>
              <option value="0">HTML</option>
              <option value="1">CSS</option>
              <option value="0">JAVA</option>
              <option value="1">PHP</option>
             
            </select>
 
            <br>
            <p>言語/レベル</p>
            <select name="sei">
 
              <option value="">-</option>
              <option value="0">HTML</option>
              <option value="1">CSS</option>
              <option value="0">JAVA</option>
              <option value="1">PHP</option>
             
            </select>
            <select name="sei">
             
              <option value="">-</option>
              <option value="0">HTML</option>
              <option value="1">CSS</option>
              <option value="0">JAVA</option>
              <option value="1">PHP</option>
             
            </select>
 
 
            <br>
 
            <p>言語/レベル</p>
            <select name="sei">
 
              <option value="">-</option>
              <option value="0">HTML</option>
              <option value="1">CSS</option>
              <option value="0">JAVA</option>
              <option value="1">PHP</option>
             
            </select>
            <select name="sei">
 
              <option value="">-</option>
              <option value="0">HTML</option>
              <option value="1">CSS</option>
              <option value="0">JAVA</option>
              <option value="1">PHP</option>
             
            </select>
 
 
 
 
      </div>
      <div class="item">
          <h2>経歴</h2>
          <p>2019/04 ITネットワーク大学 入学</p> <br>
          <P>2021/03 ITネットワーク大学 卒業</P>　<br>
          <p>2023/04 株式会社フロントネクスト入社</p> <br>
          <p>2029/04 株式会社フロントネクスト退社</p> <br>
          <p>2039/04 株式会社ニコニコタイム入社</p> <br>
 
         
      </div>
      <div class="item">
          <h2>完了したタスク</h2>
          <input type="text" value="" name="" /><br><br>
          <input type="text" value="" name="" /><br><br>
          <input type="text" value="" name="" />
      </div>
  </div>

  <div class="main-content-container">
      <!--ここに各コンテンツ-->
  </div>
  <footer class="footer">
      <div class="footer-logo">
          <img src="img/logo.png" alt="ロゴ画像">
      </div>
          <p>© 2024 ChoiPartner</p>
      </div>
  </footer>
</body>
</html>