<?php 
//�û�����תEXCAL

require_once('func.php');
require_once('acts.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

//$data=ol_getuserpglist($dbffe9,'user',$ol_set['get_ary']['pg'],5);
//�����ݼ�������  
//$data = $dbffe9->query("SELECT user.id, user.uname, user.mobile, user.email, user.regdt, uconn1.s1, uconn1.s2, uconn1.i1 FROM user, uconn1 WHERE user.id = uconn1.uid");
$data = $dbffe9->query("SELECT user.id, user.uname, user.utype, user.mobile, user.email, user.regdt, uconn1.s1, uconn1.s2, uconn1.i1 FROM user inner join uconn1 on user.id = uconn1.uid ");

//excel���
header("Content-type:application/vnd.ms-excel");
//header('Content-type: charset=UTF-8');
//header('Content-type: charset=GB2312');
header('Pragma: no-cache');
HEADER('Expires: 0');
//header("Content-Disposition: filename=".date("Ymd",time()).".xls");
header("Content-Disposition: attachment; filename=".date("Ymd",time()).".xls");

echo "�û���\t";
echo "��¼��\t";
echo "����\t";
echo "�ǳ�\t";
echo "�Ա�\t";
echo "�ֻ�\t";
echo "����\t\r\n"; 
//print_r($data);
if(!empty($data))foreach($data as $rs){
 echo $rs["id"]."\t";
 echo $rs["uname"]."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" , ffStrDE($rs["s1"], $ol_set['wset_ary']["cookie_pwd"]))."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" ,ffStrDE($rs["s2"], $ol_set['wset_ary']["cookie_pwd"]))."\t";
 if($rs["i1"]==0) echo "Ů\t";
   else if($rs["i1"]==1) echo "��\t";
   else echo "����\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" ,ffStrDE($rs["mobile"], $ol_set['wset_ary']["cookie_pwd"]))."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" ,ffStrDE($rs["utype"], $ol_set['wset_ary']["cookie_pwd"]))."\t";
 echo iconv( "UTF-8", "gb2312//IGNORE" ,ffStrDE($rs["email"], $ol_set['wset_ary']["cookie_pwd"]))."\t\r\n";
 
//ffStrDE($ary['uconn1']['s1'], $ol_set['wset_ary']["cookie_pwd"])
}
?>
