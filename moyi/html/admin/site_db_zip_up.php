<?php 
error_reporting(E_ALL);
ini_set('post_max_size', '60M'); 
ini_set('upload_max_filesize', '50M'); 
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
<title>在线管理后台- 备份恢复管理 - 网站数据压缩包上传解压</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站数据压缩包上传解压</div>
		<div id="form">
<div class="add">
<br />
<?php 
echo '当前服务器设置可上传最大文件为：'.ini_get('upload_max_filesize').'。超过这个大小的文件将不会上传。如果要上传的文件超过设置大小，请联系空间商处理后再上传！<br /><br />'; 
?>
<?php

if(!empty($ol_set['post_ary'])){
	$wroot=$_SERVER["DOCUMENT_ROOT"]; //网站根
	$upzip=$wroot.'/backup/uptemp.zip';
	//echo '<pre>'; print_r($ol_set['post_ary']); echo '</pre><br />';
	//echo '<pre>'; print_r($ol_set['upfile_ary']); echo '</pre><br />';

	echo '开始上传压缩包，请不要关闭本页面......<br />';
	if($_FILES['zipfile']['error']>0){ //上传文件出错
		echo '上传文件出错';
	}else{ //处理上传文件
		if(move_uploaded_file($_FILES['zipfile']['tmp_name'], $upzip)) {
			echo "上传完成。<br />";
			echo "开始解压文件。<br />";
			//$aa=zip_exp_file($wroot.'/backup/temp.zip',$wroot,''); //echo $aa.'<br />';
		}else{
			echo '上传文件移动出错';
		}
	}

	$aa=zip_exp_file($upzip,$wroot,''); //echo $aa.'<br />';
	echo "解压文件完成。<br /><br />";
	echo "网站数据压缩包上传解压完成。<br />";

}else{
?>

<form action="site_db_zip_up.php" method="post" enctype="multipart/form-data">
<input name="zipwodn" type="hidden" value="zipwodn" />
<input type="file" id="zipfile" name="zipfile" style="border:0;" /><br /><br />
<input type="button" onclick="upfile(this.form)" value=" 上传 " class="inputStyle2" />
</form>

<script language="javascript">
function upfile(obj){
	if(obj.zipfile.value==''){alert('请选择要上传的ZIP压缩包！'); return false;};
	//obj.submit();
	alert('暂停使用');
}
</script>

<?php
}
?>
</div>
		</div>
		</div>
	</div>
</div>

</body>
</html>
