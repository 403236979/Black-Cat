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
<title>在线管理后台- 备份恢复管理 - 网站数据压缩下载</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站数据压缩下载</div>
		<div id="form">
<div class="add">
<div id="remess">网站数据压缩下载，请稍侯......</div>
<?php
echo '暂停使用';
/*
echo '<div id="remess">开始进行网站数据压缩</div>';
$wroot=$_SERVER["DOCUMENT_ROOT"]; //网站根
$tfile=$wroot.'/backup/temp.zip';
if(file_exists($tfile)) if(!unlink($tfile)){ echo "删除文件“".$tfile."”出错！ "; }
$aa=zip_dir_to_file($tfile,$wroot,'/db'); //echo $aa.'<br />';
$aa=zip_dir_to_file($tfile,$wroot,'/upfiles'); //echo $aa.'<br />';
//$aa=getMillisecond(); //echo $aa.'<br />'; //获得0-1000的随机数
echo '<div id="remess">网站数据压缩完成，<a href="site_db_zip_down_ok.php?file=temp.zip">点击进行压缩包下载。</a></div>';
/**/
?>

<script language="javascript">
//var aa=$.ajax({url:'site_db_zip_down_ok.php?down=downok&rev=1',async:false});
//var aa=$.ajax({url:'site_db_zip_down_ok.php',async:false});
//alert(aa.responseText);
</script>
<!--div id="remess">网站数据压缩下载完成</div-->

</div>
		</div>
		</div>
	</div>
</div>

</body>
</html>
