<body>

    <!--↓header-->
    <header>
        <div class="flex header">
            <div class="header-left flex _center">
                <h1><img src="img/logo.png" alt="logo"></h1>
                <p>エックスモバイル契約状況</p>
            </div>
            <div class="header-right flex _column">
                <div class="header-right-top flex _middle _between">
                    <!--search insert-->
                    <div class="search">
                        <p>search</p>
                    </div>
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
                <div class="content-link flex grid-20">
                    <?php require_once('content-link.php');?>
                </div>
                <!--↑content-link.php-->
                <!------------------------->

                <div class="content-list flex _between grid-20">

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
