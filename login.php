<?php
session_start();
require_once('function.php');
if(isset($_SESSION['login'])) :
header('Location:index.php');exit();
?>
<?php else:?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>売上分析</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body class="login">








    <div class="box flex _center _middle">



        <div class="split">
            <p>エックスモバイル契約状況管理画面</p>
            <form action="login.php" method="post">
                <table class="box-s">
                    <tr>
                        <td>ログイン名</td>
                        <td><input type="text" name="user_name"></td>
                    </tr>
                    <tr>
                        <td>パスワード</td>
                        <td><input type="password" name="user_pass"></td>
                    </tr>
                </table>
                <input type="submit" value="ログイン" name="login">
            </form>
        </div>

    </div>




    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>


<?php endif?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
//if(isset($_GET['login'])) {
    $value = show("select * from users where user_name = '{$_POST['user_name']}'");
    
    if (!empty($value)) {
    $salt = $value['salt'];
    $password = crypt($_POST['user_pass'], $salt); // 保存時と同じSALTで復号化
    // パスワードが一致しているか
    if ($value['pass'] === $password) {
        echo 'ログイン完了';
        $_SESSION['login'] = true;
        $_SESSION['username'] = $value['name'];
        header('Location:index.php');exit();
    } else {
        echo "<p class='login-msg'>ユーザ名かパスワードが違います</p>";
    }
} else {
    echo "<p class='login-msg'>そのようなユーザーは登録されていません</p>";
}
}
