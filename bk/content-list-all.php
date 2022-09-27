    <div class="split">
        <h3 class="title">契約者一覧</h3>

        <div class="content-list-box">
            <table>
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

    </div>
