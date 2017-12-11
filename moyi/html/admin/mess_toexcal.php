<?php 
//留言数据转EXCAL

require_once('func.php');
require_once('acts.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

//$data=ol_getuserpglist($dbffe9,'user',$ol_set['get_ary']['pg'],5);
//把数据检索出来  
//$data = $dbffe9->query("SELECT user.id, user.uname, user.mobile, user.email, user.regdt, uconn1.s1, uconn1.s2, uconn1.i1 FROM user, uconn1 WHERE user.id = uconn1.uid");

//echo '['.$ol_set['get_ary']['pid'].']';

if(empty($ol_set['get_ary']['pid'])) {
	$data = $dbffe1->query("SELECT * FROM msg ");
}else{
	$data = $dbffe1->query("SELECT id,mtit,mobi,mail,danw,fbdt,sta3 FROM msg WHERE pid=".$ol_set['get_ary']['pid']);
}


//excel输出
header("Content-type:application/vnd.ms-excel");
//header('Content-type: charset=UTF-8');
header('Content-type: charset=GB2312');
header('Pragma: no-cache');
HEADER('Expires: 0');
//header("Content-Disposition: filename=".date("Ymd",time()).".xls");
header("Content-Disposition: attachment; filename=".date("Ymd",time()).".xls");

echo iconv( "UTF-8", "gb2312//IGNORE" , "留言号")."\t";
echo iconv( "UTF-8", "gb2312//IGNORE" , "姓名")."\t";
echo iconv( "UTF-8", "gb2312//IGNORE" , "手机")."\t";
echo iconv( "UTF-8", "gb2312//IGNORE" , "QQ")."\t";
echo iconv( "UTF-8", "gb2312//IGNORE" , "小区")."\t";
echo iconv( "UTF-8", "gb2312//IGNORE" , "留言时间")."\t"; 
echo iconv( "UTF-8", "gb2312//IGNORE" , "留言IP")."\t\r\n"; 
//print_r($data);
if(!empty($data))foreach($data as $rs){
 echo $rs["id"]."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" , $rs["mtit"])."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" , $rs["mobi"])."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" , $rs["mail"])."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" , $rs["danw"])."\t";
 echo $rs["fbdt"]."\t";
 echo $rs["sta3"]."\t\r\n";
//ffStrDE($ary['uconn1']['s1'], $ol_set['wset_ary']["cookie_pwd"])
}
/**/
?>
