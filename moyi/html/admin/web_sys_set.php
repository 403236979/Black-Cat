<?php 
require_once('func.php');
require_once('acts.php');
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
<title>在线管理后台 - 网站定义管理 - 网站系统参数管理</title>
</head>

<body style="margin-right:10px;background:url(images/dlbg2.jpg) no-repeat -280px -100px;">

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站系统参数管理</div>
		<div id="form">
<?php
	$temp=ol_getwebsysset($ol_set);
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
?>

<form action="" method="post">
	<input name="act" type="hidden" value="web_sys_set" />
	<fieldset>
    <div class="ceng">
		<h3>网站系统参数</h3>
	
		<label for="db_path"  class="label1">数据库目录:</label>
		<input type="text" id="db_path" name="info[db_path]" value="<?php echo $temp['db_path']; ?>" /><br />
		<label for="upload_path"   class="label1">上传文件目录:</label>
		<input type="text" id="upload_path" name="info[upload_path]" value="<?php echo $temp['upload_path']; ?>" /><br />
		<label for="cookie_pwd"   class="label1">网站密钥:</label>
		<input name="info[cookie_pwd]" type="text" id="cookie_pwd" value="<?php echo $temp['cookie_pwd']; ?>" /><br /> 
        <center class="center1">
		<input type="button" value=" 提交 " id="action" name="action" onclick="yz(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value=" 默认值 " id="reset" name="reset" />
	</center>
        </div>
       
	</fieldset>
    <br /><br />
	
</form>

		</div>
		</div>
	</div>
</div>
<script language="javascript">
function yz(obj){
	if($.trim($('#db_path').val())==''){alert('数据库目录不能为空，请输入数据库目录！'); $("#db_path").focus().select(); return false;};
	if($.trim($('#upload_path').val())==''){alert('上传文件目录不能为空，请输入上传文件目录！'); $("#upload_path").focus().select(); return false;};
	if($.trim($('#cookie_pwd').val())==''){alert('网站密钥不能为空，请输入网站密钥！'); $("#cookie_pwd").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
