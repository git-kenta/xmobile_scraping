<?php
require_once('function.php');
$customers = customers();
$customers_cancel = customers_cancel();
$customer_details = customer_details();
$customer_details_incentive = customer_details_incentive();
agreement_calc();
$incentive_list = incentive_list();
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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/flatpickr.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/flatpickr.js"></script>
    <script src="js/flatpickr_ja.js"></script>
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
                    <h3>最終更新日：2020年3月21日　16時15分</h3>
                </div>
                <div class="header-right-bottom flex _middle _between">
                    <h2>契約状況｜代理店名：株式会社ZUMI</h2>
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
            <!--↑menu-->
            <!--↓content-->
            <div class="content">
                <!--↓content-link.php-->
                <div class="content-link flex grid-20 split3-sm grid-none-sm">
                    <?php require_once('content-link.php');?>
                </div>
                <!--↑content-link.php-->
                <!------------------------->

                <div class="content-list flex _between grid-20 grid-none-sm split1-sm">

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
