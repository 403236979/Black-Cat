<?php 
require_once('func.php');
require_once('acts_bbs.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

$temp=ol_bbs_art_del($dbffe4,$ol_set['get_ary']['id']);
$temp='';
if(!empty($ol_set['get_ary']['pid'])) $temp="?id=".$ol_set['get_ary']['pid'];
header("location: bbs_art_list.php".$temp); exit;

?>
