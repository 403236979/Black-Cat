<?php

//导入数据库操作
include_once($_SERVER["DOCUMENT_ROOT"]."/inc/goods_db.php");
//include_once(str_replace('\\','/',$_SERVER["DOCUMENT_ROOT"]."/wxClient/inc/ffwbms_sqlite.php"));

$db_tools=new order_Class();

/*
$od=new order_Class();
if($od->existsError){
	die($od->message);
}
*/

/*
判断是否存在商品扩展
*/
if(file_exists("goods_extend.php")){
	include_once("goods_extend.php");
}

/*
判断是否存在购物车扩展
*/
if(file_exists("shop_card.php")){
	include_once("shop_card.php");
}

/*
判断是否存在订单流程扩展
*/
if(file_exists("order_info.php")){
	include_once("order_info.php");
}

/*
判断是否存在支付流程扩展
*/
if(file_exists("pay_extend.php")){
	include_once("pay_extend.php");
}

/*
判断是否存在用户扩展
*/
if(file_exists("user_extend.php")){
	include_once("user_extend.php");
}

/*
判断是否存在系统扩展
*/
if(file_exists("system_extend.php")){
	include_once("system_extend.php");
}


?>