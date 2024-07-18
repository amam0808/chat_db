<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>上司ログインフォーム</title>
<meta name="description"  content="#">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<!--ベースのCSSと各ページのCSS-->
<link rel="stylesheet" type="text/css" href="./css/loginform.css">
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
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
    <div class="login-page">
        <div class="form-title">
          <h2>Reader Login</h2>
        </div>
        <div class="form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <form class="login-form">
            <input type="email" id="email" name="email" required placeholder="email"/>
            <input type="password" id="password" name="password" required placeholder="password"/>
            <button type="submit">login</button>
            <?php if (isset($_SESSION["err_login_message"])) {
              echo "<p style='color: red;'>" . $_SESSION["err_login_message"] . "</p>";
              unset($_SESSION["err_login_message"]);
            } ?>
            <p class="message">Not registered? <a href="register_copy.php">Create an account</a></p>
          </form>
          </form>
        </div>
      </div>
      <script src="./js/loginform.js"></script>
      <?php } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "sql_connection.php";

        // フォームからの入力を取得
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM users_copy WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // ログイン成功時にindex.phpにリダイレクト
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            header("Location: main.php");
            exit;
        } else {
            $_SESSION["err_login_message"] = "メールアドレスまたはパスワードが間違っています。";
            header("Location: loginform.php");
            exit;
        }

        $conn = null;
    } ?>    
</body>
</html>