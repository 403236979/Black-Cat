<?php 
/* 在线管理后台 - 论坛管理 - 版块管理 - 删除 */
require_once('func.php');
require_once('acts_bbs.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

if(!empty($ol_set['get_ary']['id']))
	$temp=ol_bbs_sort_del($dbffe4,$ol_set['get_ary']['id']);
header("location: bbs_sort_list.php"); exit;
?>
