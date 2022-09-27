    <div class="split">
        <h3 class="title">契約者一覧</h3>

        <div class="content-list-box max-height scroll-height-none">
            <table class="width1000">
                <tr>
                    <th>お客様番号</th>
                    <th>お名前</th>
                    <th>ご契約プラン</th>
                    <th>代理店名</th>
                    <th>月額料金</th>
                    <th>日付</th>
                </tr>
                <?php foreach($customers as $customer):?>
                <tr data-number="<?= $customer['number'];?>" class="check">
                    <td><?= $customer['number'];?></td>
                    <td><?= $customer['name'];?></td>
                    <td><?= $customer['plan_name'];?></td>
                    <td><?= $customer['agency_name'];?></td>
                    <td><?= price_format($customer['price']);?>円</td>
                    <td><?= date('Y年m月d日',strtotime($customer['contract_date']));?></td>
                </tr>
                <?php endforeach;?>

            </table>
        </div>

        <div class="cancel">
            <h3 class="title">解約</h3>

            <div class="content-list-box max-height scroll-height-none">
                <table class="width1000">
                    <tr>
                        <th>お客様番号</th>
                        <th>お名前</th>
                        <th>ご契約プラン</th>
                        <th>代理店名</th>
                        <th>月額料金</th>
                        <th>日付</th>
                    </tr>
                    <?php foreach($customers_cancel as $cancel):?>
                    <tr data-number="<?= $cancel['number'];?>" class="check">
                        <td><?= $cancel['number'];?></td>
                        <td><?= $cancel['name'];?></td>
                        <td><?= $cancel['plan_name'];?></td>
                        <td><?= $cancel['agency_name'];?></td>
                        <td><?= price_format($cancel['price']);?>円</td>
                        <td><?= date('Y年m月d日',strtotime($cancel['contract_date']));?></td>
                    </tr>
                    <?php endforeach;?>

                </table>
            </div>
        </div>





    </div>
