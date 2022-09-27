//cusotmer(お客様)

create table customer(
    id int auto_increment primary key,
    number int,
    name varchar(255),
    yomi varchar(255),
    plan_number int,
    price int,
    phone varchar(255),
    mail varchar(255),
    address varchar(255),
    plan_details varchar(255),
    agency_id int,
    agreement int,
    cancel int,
    memo text,
    contract_date datetime    
    );
    
    
//agency(代理店)

create table agency(
    agency_id int AUTO_INCREMENT PRIMARY KEY,
    agency_name varchar(255),
    agency_yomi varchar(255),
    agency_phone varchar(255)
    );

//agreement(契約種別)

create table agreement(
    agreement_id int auto_increment primary key,
    agreement_namae varchar(255)
    );
    
//stock(限界突破WiFi)

create table stock(
	stock_id int auto_increment primary key,
	stock_num int,
	stock_web_num int,
	stock_date datetime
    );

//incentive(インセンティブ詳細)

create table incentive(
    incentive_id int auto_increment primary key,
    customer_number int,
    incentive_type int,
    incentive_money int,
    incentive_kind int,
    incentive_date datetime
    );

//incentive_month(インセンティブ月別)

create table incentive_month(
    incentive_month_id int auto_increment primary key,
    incentive_month_agency int,
    incentive_month_type int,
    incentive_month_money int,
    incentive_month_date datetime
    );