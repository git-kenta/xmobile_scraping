<?php
require('function.php');

if(isset($_GET['click_all_list'])) {
    $customer_details = customer_details($_GET['number']);
    $customer_details_incentive = customer_details_incentive($_GET['number']);
    require_once('content-list-one.php');
}


//----------------------------------------【表示】
//代理店切り替え
if(isset($_GET['click_menu_agency'])) {    
    $agency = $_GET['click_menu_agency'];
    $customers = customers($_GET['number']);
    $customers_cancel = customers_cancel($_GET['number']);
    agreement_calc($_GET['number']);
    $customer_details_incentive = customer_details_incentive($_GET['number']);
    
    if($agency == 'all') {
        require_once('content-list-all.php');
    }
    elseif($agency == 'link') {

        require_once('content-link.php');
    }
    elseif($agency == 'one') {
        $customer_details = customer_details($_GET['number']);
        require_once('content-list-one.php');
    }
}
//全更新
if(isset($_GET['all_update'])) {
    $customers = customers();
    $customer_details = customer_details();
    $customer_details_incentive = customer_details_incentive($customers[0]['number']);
    $incentive_list = incentive_list();
    $customers_cancel = customers_cancel();
    agreement_calc();
    
    $all_update = $_GET['all_update'];
    if($all_update == 'all') {
        require_once('content-list-all.php');
    }
    elseif($all_update == 'link') {
        
        require_once('content-link.php');
    }
    elseif($all_update == 'one') {
        require_once('content-list-one.php');
    }
    elseif($all_update == 'menu') {
        require_once('menu.php');
    }
}
//契約別切り替え
if(isset($_GET['change_show'])) {
    $class_name = $_GET['click_class'];
    $change_show = $_GET['change_show'];
    switch($class_name) {
        case 'sim':
            $num = 1;
            break;
        case 'genkai':
            $num = 2;
            break;
        case 'sugoi':
            $num = 3;
            break;
        case 'total':
            $num = 4;
            break;
        case 'incentive':
            $num = 5;
            break;
    }
    
    //--------------------------------------------------------------------
    
    if($num <= 3) {
        if($_GET['number'] == 0) {
            $customers = customers(1,"and customer.plan_number = {$num}");
            $customers_cancel = customers_cancel(1,"and customer.plan_number = {$num}");
            
        } else {
            $customers = customers(1,"and customer.agency_id = {$_GET['number']} and customer.plan_number = {$num}");
            $customers_cancel = customers_cancel(1,"and customer.agency_id = {$_GET['number']} and customer.plan_number = {$num}");
        }
        $customer_details = customer_details($_GET['number'],$num);
    } elseif($num == 4) {
        $customers = customers($_GET['number']);
        $customers_cancel = customers_cancel($_GET['number']);
        $customer_details = customer_details($_GET['number']);
        
    }
    
    if(count($customers) == 0) {
        $check = false;
        $customer_details_incentive = 0;
    } else {
        $check = true;
        $customer_details_incentive = customer_details_incentive($customers[0]['number']);
    }
    
//--------------------------------------------------------------------
    
    if($change_show == 'all') {
        if($check) {
            require_once('content-list-all.php');
        } else {
            echo 'データがありません';
        }
        
    }
    
    elseif($change_show == 'one') {
        require_once('content-list-one.php');
    }
    
}
//----------------------------------------【登録】
//代理店登録
if(isset($_GET['agency_add'])) {
    $name = $_GET['name'];
    $yomi = $_GET['yomi'];
    $phone = strval($_GET['phone']);
    other_db("insert into agency set agency_name = '{$name}', agency_yomi = '{$yomi}', agency_phone='{$phone}'");
}

//WEB在庫登録
if(isset($_GET['web_regit'])) {
    $day = $_GET['day'];
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $check = $_GET['web_regit'];
    
    if($check == 'regit') {
        other_db("insert into stock set stock_num = {$num1}, stock_web_num = {$num2}, stock_date = '{$day}'");
    } elseif($check == 'edit') {
        $id = $_GET['id'];
        other_db("update stock set stock_num = {$num1}, stock_web_num = {$num2}, stock_date = '{$day}' where stock_id = {$id}");
    }
    
}

//----------------------------------------【編集・削除】
//代理店編集
if(isset($_GET['agency_edit'])) {
    $name = $_GET['name'];
    $yomi = $_GET['yomi'];
    $phone = strval($_GET['phone']);
    $number = $_GET['number'];
    
    other_db("update agency set agency_name = '{$name}', agency_yomi = '{$yomi}', agency_phone = '{$phone}' where agency_id = {$number}");
    echo '編集完了';
}
//代理店削除
if(isset($_GET['delete_agency'])) {
    $number = $_GET['number'];
    other_db("delete from agency where agency_id = {$number}");
    echo $number;
}
//限界突破WiFi在庫削除
if(isset($_GET['delete_stock'])) {
    $id = $_GET['id'];
    other_db("delete from stock where stock_id = {$id}");
    echo $id;
    
}
//-----------------------------------------【変更】

//代理店変更
if(isset($_GET['change_agency'])) {
    $id = $_GET['id'];
    $number = $_GET['number'];
    other_db("update customer set agency_id = {$id} where number = {$number}");
//    require_once('index.php');
}

//契約種別変更
if(isset($_GET['change_agreement'])) {
    $id = $_GET['id'];
    $number = $_GET['number'];
    other_db("update customer set agreement = {$id} where number = {$number}");
}

//メモ変更
if(isset($_GET['change_memo_regit'])) {
    $memo = $_GET['memo'];
    $number = $_GET['number'];
    other_db("update customer set memo = '{$memo}' where number = {$number}");
}
