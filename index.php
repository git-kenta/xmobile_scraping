<?php
session_start();
require_once('function.php');
$customers = customers();
$customers_cancel = customers_cancel();
$customer_details = customer_details();
$customer_details_incentive = customer_details_incentive();
agreement_calc();
$incentive_list = incentive_list();

$last_updated = show("select date_format(update_date_date,'%Y年%m月%d日　%H時%i分') as 'date' from update_date");




//session_start();
//require_once('function.php');
if($_SESSION['login'] === true):
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['logout'])) {
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        header('location:login.php');exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="font/js/all.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/flatpickr.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <!--
    <script src="js/flatpickr.js"></script>
    <script src="js/flatpickr_ja.js"></script>
-->

    <!--    <script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"></script>-->



    <!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="shortcut icon" href="">
</head>

<body>
    <div class="Verification hide">
        <div class="split">
            <div class="center">
                <p>登録を変更しました</p><br>
                <button class="button">閉じる</button>
            </div>
        </div>
    </div>
    <!--↓header-->
    <header>
        <div class="flex header">
            <div class="header-left flex _center">
                <h1><img src="img/logo.png" alt="logo"></h1>
            </div>
            <div class="header-right flex _column">
                <div class="header-right-top flex _right _middle">
                    <!--search insert-->
                    <!--
                    <div class="search">
                        <p>search</p>
                    </div>
-->
                    <h3>
                        最終更新日：<?= $last_updated['date'];?>
                        <div class="right">
                            <form action="" method="post" class="logout">
                                <input type="submit" value="ログアウト" name="logout" id="logout" class="hide">
                                <label for="logout">ログアウト</label>
                            </form>
                        </div>
                    </h3>
                </div>
                <div class="header-right-bottom flex _middle _between">
                    <h2>契約状況｜代理店名：<span>全体</span></h2>
                    <h3>インセンティブ、WEB在庫の金額・数量はおおよその目安です。</h3>
                </div>

            </div>
        </div>
    </header>
    <!--↑header-->
    <main>
        <div class="flex">
            <!--↓menu-->
            <div class="menu">
                <?php require_once('menu.php');?>
            </div>
            <div class="mb-menu">
                <div class="mb-menu-inner flex split3">
                    <div class="mb-menu-button flex _middle _center _column button_dairi split flex _middle _center" data-name="agency">
                        <i class="fas fa-store fa-2x"></i>
                        <p>代理店</p>
                    </div>
                    <div class="mb-menu-button flex _middle _center _column split flex _middle _center" data-name="incentive"><i class="fas fa-credit-card fa-2x"></i>
                        <p>インセンティブ</p>
                    </div>
                    <div class="mb-menu-button flex _middle _center _column split flex _middle _center" data-name="config"><i class="far fa-sun fa-2x"></i>
                        <p>設定</p>
                    </div>
                </div>
            </div>
            <!--↑menu-->
            <!--↓content-->
            <div class="content">
                <!--↓content-link.php-->
                <div class="content-link flex split3-sm">
                    <?php require_once('content-link.php');?>
                </div>
                <!--↑content-link.php-->
                <!------------------------->

                <div class="content-list flex _between grid-2 grid-none-sm split1-sm">

                    <!--↓content-list-all.php-->
                    <div class="content-list-all">
                        <?php require_once('content-list-all.php');?>
                    </div>
                    <!--↑content-list-all.php-->

                    <!--↓content-list-one.php-->
                    <div class="content-list-one">
                        <?php require_once('content-list-one.php');?>
                    </div>
                    <!--↑content-list-one.php-->

                </div>
            </div>
            <!--↑content-->
        </div>
    </main>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        flatpickr(".flatpickr", {
            locale: "ja"
        });

    </script>
</body>


</html>
<?php else:header('location:login.php');exit();endif;?>
