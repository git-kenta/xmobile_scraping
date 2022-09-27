<div class="menu-agency">
    <div class="title flex _between">
        <p>代理店</p>
    </div>
    <ul style="display: block">
        <li class="active" data-agency_id="0">全体</li>
        <?php foreach($agencys as $agency):?>
        <li data-agency_id="<?= $agency['agency_id'];?>"><?= $agency['agency_name'];?></li>
        <?php endforeach;?>
    </ul>
</div>
<div class="menu-insentive">
    <div class="title flex _between">
        <p>インセンティブ</p><span>－</span>
    </div>
    <ul class="indent">
        <li><span class="name">株式会社ZUMI</span><span class="price">3,429円</span></li>
        <li><span class="name">与那覇</span><span class="price">2,033円</span></li>
        <li><span class="name">松川</span><span class="price">345円</span></li>
    </ul>
</div>
<div class="menu-config">
    <div class="title flex _between">
        <p>設定</p><span>－</span>
    </div>

    <ul class="indent">
        <li class="flex _between">
            <p>代理店追加・編集</p><span>－</span>
            <div>
                <p class="small-title">追加</p>
                <ul class="agency_input">
                    <li>
                        <p>代理店名：</p><input type="text" name="agency_add_name">
                    </li>
                    <li>
                        <p>よみ：</p><input type="text" name="agency_add_yomi">
                    </li>
                    <li>
                        <p>連絡先：</p><input type="text" name="agency_add_phone">
                    </li>
                </ul>
                <div class="right">
<!--                    <input type="submit" value="追加" class="button">-->
                    <button class="button agency_add">追加</button><br>
                    <span class="note note1 hide">代理店名とよみの入力は必須です。</span>
                    <span class="note note2 hide">代理店を追加しました</span>
                </div>
            </div>
            
            <p class="small-title">代理店一覧</p>
            <ul>
               <?php foreach($agencys as $agency):?>
               <li>
                   <p><?= $agency['agency_name'];?></p>
                   <span class="change"></span>
                   
                   <ul class="agency_input agency_change">
                       <li>
                           <label for="">名前：</label>
                           <input type="text" class="hide">
                           <span><?= $agency['agency_name'];?></span>
                       </li>
                       <li>
                           <label for="">よみがな：</label>
                           <input type="text" class="hide">
                           <span><?= $agency['agency_yomi'];?></span>
                       </li>
                       <li>
                           <label for="">連絡先：</label>
                           <input type="text" class="hide">
                           <span><?= $agency['agency_phone'];?></span>
                       </li>
                   </ul>
               </li>
               <?php endforeach;?>
               
<!--
                <li>
                    <p>株式会社ZUMI</p>
                    <span class="change"></span>
                    <form action="">
                        <ul class="agency_input agency_change">
                            <li>
                                <label for="">名前：</label>
                                <input type="text">
                            </li>
                            <li>
                                <label for="">よみがな：</label>
                                <input type="text">
                            </li>
                            <li>
                                <label for="">連絡先：</label>
                                <input type="text">
                            </li>
                        </ul>
                        
                        <div class="flex _between">
                            <div class="check_delete">
                            <input type="checkbox">
                            <label for="">削除</label>
                        </div>
                        
                        <div class="agency_change_button">
                            <input type="submit" value="削除" class="button b_red">
                            <input type="submit" value="保存" class="button">
                        </div>
                        </div>
                        <span class="worning">削除後は復元できません。お客様代理店はZUMIに変更となります。</span>
                        
                    </form>
                </li>
-->
                
            </ul>
            
        </li>
        
        <li class="flex _between">
            <p>WEB在庫設定</p><span>－</span>
            <form action="">
                <p class="small-title">追加</p>
                <ul class="agency_input">
                    <li>
                        <p>代理店名：</p><input type="text">
                    </li>
                    <li>
                        <p>よみ：</p><input type="text">
                    </li>
                    <li>
                        <p>連絡先：</p><input type="text">
                    </li>
                </ul>
                <div class="right">
                    <input type="submit" value="追加" class="button">
                </div>
            </form>
            
            <p class="small-title">代理店一覧</p>
            <ul>
                <li>
                    <p>株式会社ZUMI</p>
                    <span class="change"></span>
                    <form action="">
                        <ul class="agency_input agency_changes">
                            <li>
                                <label for="">名前：</label>
                                <input type="text">
                            </li>
                            <li>
                                <label for="">よみがな：</label>
                                <input type="text">
                            </li>
                            <li>
                                <label for="">連絡先：</label>
                                <input type="text">
                            </li>
                        </ul>
                        
                        <div class="flex _between">
                            <div class="check_delete">
                            <input type="checkbox">
                            <label for="">削除</label>
                        </div>
                        
                        <div class="agency_change_button">
                            <input type="submit" value="削除" class="button b_red">
                            <input type="submit" value="保存" class="button">
                        </div>
                        </div>
                        <span class="worning">削除後は復元できません。お客様代理店はZUMIに変更となります。</span>
                        
                    </form>
                </li>
                
            </ul>
        </li>
    </ul>



</div>
