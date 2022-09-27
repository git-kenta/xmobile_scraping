<?php
require_once('db.php');
$sort_check = '';
//---------------------------------------------【関数】
$config = [
    'wifi_incentive' => 5000
];
/*全表示*/
function show_all($i,$s = null) {
    extract($GLOBALS);
    $stmt = $db -> prepare($i);
    $stmt -> execute($s);
    return $stmt -> fetchall(PDO::FETCH_ASSOC);
}
//表示
function show($i,$s = null) {
    extract($GLOBALS);
    $stmt = $db -> prepare($i);
    $stmt -> execute($s);
    return $stmt -> fetch(PDO::FETCH_ASSOC);
}
//データの削除・更新・追加
function other_db($i,$s = null) {
    extract($GLOBALS);        
    $stmt = $db->prepare($i);
    return $stmt -> execute($s);
}
//三桁区切り
function price_format($price) {
    return number_format($price);
}

/* 暗号化関数 */
function saltango($password, $salt) {
    $saltPassword = crypt($password, $salt);
    return $saltPassword;
}

/* ランダムな文字列を生成 */
function mksalt($length = 8) {
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
}
/* 先月 */
function month($vl) {
    if(substr(date('m', strtotime(date('Y-m-1')." {$vl} month")),0,1) == 0) {
        return substr(date('m', strtotime(date('Y-m-1')." {$vl} month")),1);
    } else {
        return date('m', strtotime(date('Y-m-1')." {$vl} month"));
    }
}
//--------------------------------------------------
function customers($vl=0,$str='') {
    if($vl == 0) {
        $text = '';
    } else {
        $text = "and customer.agency_id = {$vl}";
    }
    if($str != '') {
        $text = $str;
    }
    return show_all("
        select * from customer 
        left join plan on customer.plan_number = plan.plan_number
        left join agency on customer.agency_id = agency.agency_id
        where cancel = 1
        {$text}
        order by customer.contract_date asc");
}
//cancel表示
function customers_cancel($vl=0,$str='') {
    if($vl == 0) {
        $text = '';
    } else {
        $text = "and customer.agency_id = {$vl}";
    }
    if($str != '') {
        $text = $str;
    }
    return show_all("
        select * from customer 
        left join plan on customer.plan_number = plan.plan_number
        left join agency on customer.agency_id = agency.agency_id
        where cancel = 0
        {$text}
        order by customer.contract_date asc");
}
function customer_details($vl=0,$str='') {
    if($vl >= 10000) {
        $num['number'] = $vl;
    } else {
        if($str != '') {
            if($vl == 0) {
                $num = show("select number from customer where plan_number = {$str} order by contract_date asc limit 1");
            } else {
                $num = show("select number from customer where agency_id = {$vl} and plan_number = {$str} order by contract_date asc limit 1");
            }
        } else {
            if($vl == 0) {
                $num = show("select number from customer order by contract_date asc limit 1");
            } else {
                $num = show("select number from customer where agency_id = {$vl} order by contract_date asc limit 1");
            }
        }
    }

    return show("
    select * from customer
    left join plan on customer.plan_number = plan.plan_number
    left join agency on customer.agency_id = agency.agency_id
    left join agreement on customer.agreement = agreement.agreement_id
    where customer.number = {$num['number']}");

}
function customer_details_incentive($vl=0) {
    global $config;
    if($vl == 0) {
        $num = show("
            select number from customer order by number asc limit 1;
        ");
        $vl = $num['number'];
    }elseif($vl > 0 and $vl < 100000) {
        $num = show("
            select number from customer where agency_id = {$vl} order by number asc limit 1;
        ");
        $vl = $num['number'];
    }
    $incentives = show_all("select incentive.customer_number,incentive_type,incentive_money,incentive_kind,agency_id
    from incentive
    left join customer on customer.number = incentive.customer_number where incentive.customer_number = {$vl}");
    $customer_details_incentive = 0;
    foreach($incentives as $incentive) {
        if($incentive['incentive_type'] == 1) {
            $customer_details_incentive += $incentive['incentive_money'];
        }
        if($incentive['incentive_kind'] == 1 and $incentive['incentive_money'] == 0) {
            $customer_details_incentive += $config['wifi_incentive'];
        }
    }
    return $customer_details_incentive * 1.1;
}
//function agreement_calc($vl=1) {
//    return show_all("select * from customer where agency_id = {$vl}");
//}
//-----
function agencys() {
    return show_all("select * from agency");}
$agencys = agencys();

function stocks() {
    return show_all("select * from stock");}
$stocks = stocks();

function agreements() {
    return show_all("select * from agreement");}
$agreements = agreements();


//集計

$calc_all = 0;
$calc_month = 0;
$calc_month_1 = 0;
$calc_cancel = 0;
$calc_sim = 0;
$calc_sim_cancel = 0;
$calc_sim_month = 0;
$calc_sim_month_1 = 0;
$calc_wifi = 0;
$calc_wifi_cancel = 0;
$calc_wifi_month = 0;
$calc_wifi_month_1 = 0;
$calc_sugoi = 0;
$calc_sugoi_cancel = 0;
$calc_sugoi_month = 0;
$calc_sugoi_month_1 = 0;
$incentive_all = 0;
$link_agency = 0;



function agreement_calc($vl=0) {
    global $calc_all;
    global $calc_month;
    global $calc_month_1;
    global $calc_cancel;
    global $calc_sim;
    global $calc_sim_cancel;
    global $calc_sim_month;
    global $calc_sim_month_1;
    global $calc_wifi;
    global $calc_wifi_cancel;
    global $calc_wifi_month;
    global $calc_wifi_month_1;
    global $calc_sugoi;
    global $calc_sugoi_cancel;
    global $calc_sugoi_month;
    global $calc_sugoi_month_1;
    global $incentive_all;
    global $config;
    global $link_agency;
    
    if($vl == 0) {        
        $agreement_calc = show_all("select * from customer");
        $incentives = show_all("
    select incentive.customer_number,incentive_type,incentive_money,incentive_kind,agency_id
    from incentive
    left join customer on customer.number = incentive.customer_number
    ");
    } else {
        $link_agency= $vl;
        
        $agreement_calc = show_all("select * from customer where agency_id = {$vl}");
        $incentives = show_all("
    select incentive.customer_number,incentive_type,incentive_money,incentive_kind,agency_id
    from incentive
    left join customer on customer.number = incentive.customer_number where agency_id = {$vl}
    ");
    }
    
    
    
    foreach($incentives as $incentive) {
        if($incentive['incentive_type'] == 1) {
            $incentive_all += $incentive['incentive_money'];
        }
        if($incentive['incentive_kind'] == 1 and $incentive['incentive_money'] == 0) {
            $incentive_all += $config['wifi_incentive'];
        }
    }
    $incentive_all *= 1.1;
    
    foreach($agreement_calc as $calc) {
    
        if(month(0) == date('m',strtotime($calc['contract_date']))) {
            $calc_month += 1;
        } elseif(month(-1) == date('m',strtotime($calc['contract_date']))) {
            $calc_month_1 += 1;
        }
        if($calc['cancel'] == 0) {
            $calc_cancel += 1;
        }
        $calc_all += 1;
    
        if($calc['plan_number'] == 1) {//sim
            if(month(0) == date('m',strtotime($calc['contract_date']))) {
                $calc_sim_month += 1;
            } elseif(month(-1) == date('m',strtotime($calc['contract_date']))) {
                $calc_sim_month_1 += 1;
            }
            if($calc['cancel'] == 0) {
                $calc_sim_cancel += 1;
                continue;
            }
            $calc_sim += 1;
        } elseif($calc['plan_number'] == 2) {//wifi
            if(month(0) == date('m',strtotime($calc['contract_date']))) {
                $calc_wifi_month += 1;
            } elseif(month(-1) == date('m',strtotime($calc['contract_date']))) {
                $calc_wifi_month_1 += 1;
            }
            if($calc['cancel'] == 0) {
                $calc_wifi_cancel += 1;
                continue;
            }
            $calc_wifi += 1;
        } elseif($calc['plan_number'] == 3) {//sugoi
            if(month(0) == date('m',strtotime($calc['contract_date']))) {
                $calc_sugoi_month += 1;
            } elseif(month(-1) == date('m',strtotime($calc['contract_date']))) {
                $calc_sugoi_month_1 += 1;
            }
            if($calc['cancel'] == 0) {
                $calc_sugoi_cancel += 1;
                continue;
            }
            $calc_sugoi += 1;
        }
    }
}

function incentive_list() {
    global $config;
    $data_grop = show_all("select agency.agency_name,incentive_type,sum(incentive_money) as incentive_money,incentive_kind,customer.agency_id
    from incentive
    left join customer on customer.number = incentive.customer_number
    left join agency on agency.agency_id = customer.agency_id
    where incentive_type = 1
    group by customer.agency_id;");
    
    $data = show_all("select 
    incentive_type,incentive_money,incentive_kind,customer.agency_id
    from incentive
    left join customer on customer.number = incentive.customer_number;");
    
    $i = 0;
    $list = [];
    foreach($data_grop as $grop) {
        $list[$i]['agency_name'] = $grop['agency_name'];
        $list[$i]['incentive_money'] = 0;
        foreach($data as $check) {
            if($grop['agency_id'] == $check['agency_id'] and $check['incentive_kind'] == 1 and $check['incentive_money'] == 0) {
                $list[$i]['incentive_money'] += $config['wifi_incentive'];
            }
        }
        $list[$i]['incentive_money'] = ($list[$i]['incentive_money'] + $grop['incentive_money']) * 1.1;
        $i += 1;
    }
    return $list;
}
