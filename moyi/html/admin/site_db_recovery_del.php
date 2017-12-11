<?php 
require_once('func.php');
require_once('acts.php');
require_once('ffwbms_filefuncs.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/manage.css" rel="stylesheet" type="text/css">
<script language="javascript" src="images/jquery-1.7.2.min.js"></script>
<!–[if lte IE 8]> 
<meta http-equiv=”x-ua-compatible” content=”ie=7″ /> 
<![endif]–> 
<!–[if IE 9]> 
<meta http-equiv=”x-ua-compatible” content=”ie=9″ /> 
<![endif]–>
<title>在线管理后台- 备份恢复管理 - 网站数据恢复 - 删除</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站数据恢复 - 删除</div>
		<div id="form">

<div id="remess">正在删除网站备份数据，不要关闭本页面，请稍侯......</div>
<?php
$wroot=$_SERVER["DOCUMENT_ROOT"]; //网站根
$datedir = $ol_set['get_ary']['dir']; //日期目录名
$dir=$wroot.'/backup'.'/'.$datedir; //来源目录
$aa=traversal_del_dir($dir.'/db'); //echo $aa.'<br />';
@rmdir($dir.'/db');
$aa=traversal_del_dir($dir.'/upfiles'); //echo $aa.'<br />';
@rmdir($dir.'/upfiles');
$aa=traversal_del_dir($dir); //echo $aa.'<br />';
@rmdir($dir);

?>
<div id="remess">删除完成</div>

		</div>
		</div>
	</div>
</div>

</body>
</html>
