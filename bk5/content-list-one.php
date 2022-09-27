    <div class="split">
        <h3 class="title">契約者情報｜<?= $customer_details['number'];?></h3>
        <div class="content-list-box details_number" data-number="<?= $customer_details['number'];?>">
            <table>
                <tr class="flex">
                    <td class="flex _between">
                        <span>お客様名</span>
                        <p><?= $customer_details['name'];?></p>
                    </td>
                    <td class="flex _between">
                        <span>よみがな</span>
                        <p><?= $customer_details['yomi'];?></p>
                    </td>
                </tr>
                <tr class="flex">
                    <td class="flex _between">
                        <span>電話番号</span>
                        <p><?= $customer_details['phone'];?></p>
                    </td>
                    <td class="flex _between">
                        <span>メールアドレス</span>
                        <p><?= $customer_details['mail'];?></p>
                    </td>
                </tr>
                <tr class="flex">
                    <td class="flex _between" colspan="2">
                        <span>住所</span>
                        <p><?= $customer_details['address'];?></p>
                    </td>
                </tr>
            </table>
            <hr>
            <table>
                <tr class="flex">
                    <td class="flex _between">
                        <span>プラン</span>
                        <p><?= $customer_details['plan_name'];?></p>
                    </td>
                    <td class="flex _between">
                        <span>契約日</span>
                        <p><?= date('Y年m月d日',strtotime($customer_details['contract_date']));?></p>
                    </td>
                </tr>
                <tr class="flex">
                    <td class="flex _between">
                        <span>月額料金</span>
                        <p>
                            <?php 
                                                $price = price_format($customer_details['price']);
                                                if ($price == 0) {
                                                    echo '- 円';
                                                } else {
                                                    echo $price.'円';
                                                }
                                                ;?>
                        </p>
                    </td>
                    <td class="flex _between">
                        <span>インセンティブ</span>
                        <p><?= number_format($customer_details_incentive);?>円</p>
                    </td>
                </tr>
                <tr class="flex">
                    <td class="flex _between">
                        <span>代理店</span>
                        <div class="flex">
                            <div class="split">
                                <p class="agency_name"><?= $customer_details['agency_name'];?></p>
                                <select name="select_agency" id="" class="hide">
                                    <?php foreach($agencys as $agency) :
                                            $check = '';
                                            if($customer_details['agency_id'] == $agency['agency_id']):
                                                    $check = ' selected';endif;?>

                                    <option value="<?= $agency['agency_id'];?>" <?= $check;?>><?= $agency['agency_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>


                            <span style="color:red;text-decoration:underline;" class="change_agency">編集</span>
                        </div>
                    </td>
                    <td class="flex _between">
                        <span>契約種別</span>

                        <div class="flex">
                            <div class="split">
                                <p class="agreement_name"><?= $customer_details['agreement_name'];?></p>
                                <select name="select_agreement" id="" class="hide">
                                    <?php foreach($agreements as $agreement) :
                                    $check = '';
                                    if($customer_details['agreement'] == $agreement['agreement_id']) {
                                        $check = ' selected';
                                    };
                                    ?>
                                    <option value="<?= $agreement['agreement_id'];?>" <?= $check;?>><?= $agreement['agreement_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>


                            <span style="color:red;text-decoration:underline;" class="change_agreement">編集</span>
                        </div>




                    </td>
                </tr>
                <tr class="flex">
                    <td class="flex _between" colspan="2">
                        <span>プラン詳細</span>
                        <p><?= $customer_details['plan_details'];?></p>
                    </td>
                </tr>

                <tr>
                    <td class="" colspan="2">
                        <div class="flex _between">
                            <span>メモ</span>
                            <span style="color:red;text-decoration:underline;" class="change_memo">編集</span>

                        </div>
                        <p class="memo">
                            <?= nl2br($customer_details['memo']);?>
                        </p>
                        <div class="hide" name="memo">
                            <textarea name="" id="" cols="30" rows="10" class="">
                                    <?= $customer_details['memo'];?>
                                </textarea>
                            <div class="right">
                                <button class="button change_memo_regit">登録</button>
                            </div>
                        </div>



                    </td>
                </tr>
            </table>


        </div>
    </div>
