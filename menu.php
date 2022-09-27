<div class="menu-close">

    <span>×</span>
</div>

<div class="menu-agency">
    <div class="title flex _between">
        代理店一覧
    </div>
    <ul>
        <li class="active" data-agency_id="0">全体</li>
        <?php foreach($agencys as $agency):?>
        <li data-agency_id="<?= $agency['agency_id'];?>"><?= $agency['agency_name'];?></li>
        <?php endforeach;?>
    </ul>
</div>

<!--------------------------->
<div class="menu-incentive">
    <div class="title flex _between">
        WiFi在庫・インセンティブ
    </div>
    <ul class="mb10">
        <li class="first">限界突破WiFi在庫</li>
        <li>WEB在庫：<?= $stock['web_num'];?>台/店舗在庫：<?= $stock['tenpo_num'];?>台</li>
    </ul>
    
    <ul>
       <li class="first">インセンティブ</li>
        <?php foreach($incentive_list as $list) :?>
        <li>
            <p><?= $list['agency_name'];?></p><span><?= number_format($list['incentive_money']);?>円</span>
        </li>
        <?php endforeach;?>

    </ul>

</div>


<!-------------------------->

<!--<dl class="menu_tab menu-config">-->

<!--
    <dt class="title flex _between">
        <p>設定</p>
        <span>＋</span>
    </dt>
-->
<!--    <dd>-->
<div class="menu_tab menu-config">

    <div class="title flex _between">
        設定
    </div>
    <dl class="menu_tab_child">
        <dl class="menu_tab menu_tab_child">
            <dt>代理店追加・編集</dt>
            <dd>
                <dl class="indent">
                    <dt class="flex _between">
                        <p class="bold">追加</p><span>＋</span>
                    </dt>
                    <dd class="agency_regit">
                        <ul>
                            <li>
                                <p>代理店名：</p>
                                <input type="text" name="agency_regit_name" value="">
                            </li>
                            <li>
                                <p>よみがな：</p>
                                <input type="text" name="agency_regit_yomi" value="">
                            </li>
                            <li>
                                <p>連絡先：</p>
                                <input type="text" name="agency_regit_phone" value="">
                            </li>
                        </ul>
                        <div class="right">
                            <button class="button agency_add">追加</button>
                        </div>
                        <p class="coution agency_regit_coution">　</p>
                    </dd>
                    <dt class="bold">代理店一覧</dt>
                    <dd>
                        <ul>
                            <?php foreach($agencys as $agency):?>
                            <li class="menu_list">
                                <dl>
                                    <dt>
                                        <p class="show" data-id="<?= $agency['agency_id'];?>"><?= $agency['agency_name'];?></p>
                                    </dt>
                                    <dd>
                                        <p class="edit">編集</p>
                                        <ul>
                                            <li>
                                                <p>名前：</p>
                                                <span><?= $agency['agency_name'];?></span>
                                                <input type="text" class="hide" name="agency_edit_name" value="<?= $agency['agency_name'];?>">
                                            </li>
                                            <li>
                                                <p>よみ：</p>
                                                <span><?= $agency['agency_yomi'];?></span>
                                                <input type="text" class="hide" name="agency_edit_yomi" value="<?= $agency['agency_yomi'];?>">
                                            </li>
                                            <li>
                                                <p>連絡先：</p>
                                                <span><?= $agency['agency_phone'];?></span>
                                                <input type="text" class="hide" name="agency_edit_phone" value="<?= $agency['agency_phone'];?>">
                                            </li>
                                        </ul>
                                        <div class="flex _between _middle relative">
                                            <div class="split delete_check">
                                                <input type="checkbox" id="agency_delete<?= $agency['agency_id'];?>" class="agency_delete">
                                                <label for="agency_delete<?= $agency['agency_id'];?>">削除</label>
                                            </div>
                                            <div class="split">
                                                <button class="button delete_agency hide" name="delete_agency" disabled>削除</button>
                                                <button class="button kettei_agency hide" data-number="<?= $agency['agency_id'];?>">決定</button>
                                            </div>
                                        </div>
                                        <p class="coution agency_edit_coution">　</p>
                                    </dd>
                                </dl>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </dd>
                </dl>
            </dd>

            <dt>WEB在庫設定</dt>
            <dd>



                <dl class="indent">
                    <dt class="flex _between">
                        <p class="bold">追加</p><span>＋</span>
                    </dt>
                    <dd class="agency_regit">
                        <ul>
                            <li>
                                <p>注文日：</p>
                                <!--                                <input type="text" name="web_regit_day">-->
                                <input type="text" class="flatpickr" name="web_regit_day" placeholder="注文日を選択" value="">
                            </li>
                            <li>
                                <p>注文台数：</p>
                                <input type="text" name="web_regit_num1" value="">
                            </li>
                            <li>
                                <p>WEB在庫：</p>
                                <input type="text" name="web_regit_num2" value="">
                            </li>
                        </ul>
                        <div class="right">
                            <button class="button web_regit">追加</button>
                        </div>
                        <p class="coution stock_coution">　</p>
                    </dd>
                    <dt class="bold">履歴</dt>
                    <dd>
                        <ul>
                            <?php foreach($stocks as $stock):?>
                            <li class="menu_list">
                                <dl>
                                    <dt>
                                        <p class="show"><?= date('Y年m月d日',strtotime($stock['stock_date'])).'/'.$stock['stock_num'].'台';?></p>
                                    </dt>
                                    <dd>
                                        <p class="edit">編集</p>
                                        <ul>
                                            <li>
                                                <p>注文日：</p>
                                                <span><?= date('Y年m月d日',strtotime($stock['stock_date']));?></span>
                                                <input type="text" class="flatpickr hide" value="<?= date('Y-m-d',strtotime($stock['stock_date']));?>" name="web_edit_day">
                                            </li>
                                            <li>
                                                <p>台数：</p>
                                                <span><?= $stock['stock_num'].'台';?></span>
                                                <input type="text" class="hide" value="<?= $stock['stock_num'];?>" name="web_edit_num1">
                                            </li>
                                            <li>
                                                <p>WEB在庫：</p>
                                                <span><?= $stock['stock_web_num'].'台'?></span>
                                                <input type="text" class="hide" value="<?= $stock['stock_web_num'];?>" name="web_edit_num2">
                                            </li>
                                        </ul>
                                        <div class="flex _between _middle relative">
                                            <div class="split delete_check">
                                                <input type="checkbox" id="stock_delete<?= $stock['stock_id'];?>" class="stock_delete">
                                                <label for="stock_delete<?= $stock['stock_id'];?>">削除</label>
                                            </div>
                                            <div class="split">
                                                <button class="button delete_stock hide" name="delete_stock" disabled>削除</button>
                                                <button class="kettei_stock button hide" data-id="<?= $stock['stock_id'];?>">決定</button>
                                            </div>
                                        </div>
                                        <p class="coution stock_edit_coution">　</p>
                                    </dd>
                                </dl>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </dd>
                </dl>






            </dd>
        </dl>
    </dl>
</div>
<!--    </dd>-->
<!--</dl>-->
