    <div class="split change-agreement" data-change='<?= $link_agency;?>'>
        <a class="total active" id="total">
            <h3>契約総数 / 解約</h3>
            <p class="num"><?= $calc_all - $calc_cancel;?> / <?= $calc_cancel;?></p>
            <p><?= month(-1);?>月：<?= $calc_month_1;?>回線<span class="mb-none"> / </span><br class="mb-show"><?= month(0);?>月：<?= $calc_month;?>回線</p>
        </a>
    </div>
    <div class="split">
        <a class="genkai" id="genkai">
            <h3>限界突破WiFi / 解約</h3>
            <p class="num"><?= $calc_wifi;?> / <?= $calc_wifi_cancel;?></p>
            <p><?= month(-1);?>月：<?= $calc_wifi_month_1;?>回線<span class="mb-none"> / </span><br class="mb-show"><?= month(0);?>月：<?= $calc_wifi_month;?>回線</p>
        </a>
    </div>
    <div class="split">
        <a class="sim" id="sim">
            <h3>SIM / 解約</h3>
            <p class="num"><?= $calc_sim;?> / <?= $calc_sim_cancel;?></p>
            <p><?= month(-1);?>月：<?= $calc_sim_month_1;?>回線<span class="mb-none"> / </span><br class="mb-show"><?= month(0);?>月：<?= $calc_sim_month;?>回線</p>
        </a>
    </div>
    <div class="split">
        <a class="sugoi" id="sugoi">
            <h3>スゴい電話 / 解約</h3>
            <p class="num"><?= $calc_sugoi;?> / <?= $calc_sugoi_cancel;?></p>
            <p><?= month(-1);?>月：<?= $calc_sugoi_month_1;?>回線<span class="mb-none"> / </span><br class="mb-show"><?= month(0);?>月：<?= $calc_sugoi_month;?>回線</p>
        </a>
    </div>
    <div class="split">
        <a class="insentive" id="insentive">
            <h3>インセンティブ</h3>
            <p class="num"><?= number_format($incentive_all);?>円</p>
<!--            <p><?= month(-1);?>月契約数：回線 / <?= month(0);?>月契約数：5回線</p>-->
            <p>　</p>
        </a>
    </div>

