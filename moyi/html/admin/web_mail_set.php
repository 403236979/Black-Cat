<?php 
require_once('func.php');
require_once('acts.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

if(!empty($ol_set['post_ary'])){
	//echo '<pre>'; print_r($ol_set['post_ary']); echo '</pre>'; die();
	$temp=ol_webmailsetedit($dbffe9,$ol_set['post_ary'],$ol_set['wset_ary']["cookie_pwd"]);
	//echo '<pre>'; print_r($temp); echo '</pre>'; die();
}
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
<title>在线管理后台 - 网站定义管理 - 网站设置管理</title>
<style>
label{
    width: 125px;
    display: inline-block;
}
</style>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;邮件服务器设置</div>
		<div id="form">
<?php
	//echo '<pre>'; print_r($ol_set); echo '</pre><br />';
	$temp=ol_getwebmailset($dbffe9,$ol_set['wset_ary']["cookie_pwd"]);
	//echo '[<pre>'; print_r($temp); echo '</pre>]<br />';
?>

<form action="web_mail_set.php" method="post">
	<fieldset>
    <div class="ceng">
		<h3></h3>
		<input id="id" name="id" type="hidden" value="<?php echo $temp['id']; ?>" />
		<label for="s1">邮件服务器地址:</label>
		<input type="text" id="s1" name="info[s1]" size="60" value="<?php echo $temp['s1']; ?>" /><br />
		<label for="s2">邮件服务器端口:</label>
		<input type="text" id="s2" name="info[s2]" size="60" value="<?php echo $temp['s2']; ?>" /><br />
		<label for="s3">邮件服务器用户名:</label>
		<input name="info[s3]" type="text" id="s3" size="60" value="<?php echo $temp['s3']; ?>" /><br />
		<label for="s4">邮件服务器密码:</label>
		<input name="info[s4]" type="text" id="s4" size="60" value="<?php echo $temp['s4']; ?>" /><br />
		<label for="s5">回复邮件地址地址</label>
		<input name="info[s5]" type="text" id="s5" size="60" value="<?php echo $temp['s5']; ?>" /><br />
		<label for="s6">回复收件人名:</label>
		<input name="info[s6]" type="text" id="s6" size="60" value="<?php echo $temp['s6']; ?>" /><br />
		<label for="s7">邮件发送地址:</label>
		<input name="info[s7]" type="text" id="s7" size="60" value="<?php echo $temp['s7']; ?>" /><br />
		<label for="s8">邮件发送人名:</label>
		<input name="info[s8]" type="text" id="s8" size="60" value="<?php echo $temp['s8']; ?>" /><br />
		<label for="s9">邮件标题:</label>
		<input name="info[s9]" type="text" id="s9" size="60" value="<?php echo $temp['s9']; ?>" /><br />
		<label for="s10">邮件正文:</label>
		<input name="info[s10]" type="text" id="s10" size="60" value="<?php echo $temp['s10']; ?>" /><br />
		<label for="s10">邮件验证网址:</label>
		<input name="info[s11]" type="text" id="s11" size="60" value="<?php echo $temp['s11']; ?>" /><br />
		<label for="s10">邮件验证网址:</label>
		<input name="info[s12]" type="text" id="s11" size="60" value="<?php echo $temp['s12']; ?>" /><br />

        <center class="center2">
		<input type="button" value=" 提交 " id="action" name="action" onclick="yz(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value=" 默认值 " id="reset" name="reset" />
	</center>
	</fieldset>
    <br /><br />
	
</form>
</div>

		</div>
		</div>
	</div>
</div>
<script language="javascript">
function ff_replace(str,aa){
	var s1="<script";
	var s11="&lt;script";
	var s2="\/script>";
	var s22="\/script&gt;";
	var s3='"';
	var s33='&quot;';
	if(aa==0){
		var s3='"';
	var s33='&quot;';
		};
	if(aa==1){
		var s3='"';
	var s33='"';
		};
	
	var rev='';
	rev=$.trim(str);
	rev=rev.replace(s1,s11);
	rev=rev.replace(s2,s22);
	rev=rev.replace(s3,s33);
	return rev;
}


function yz(obj){
	
	$("form textarea").each(function(){
		$(this).val(ff_replace($(this).val(),1));
		
	});
	$("form input:text").each(function(){
		$(this).val(ff_replace($(this).val(),0));
		
	});
	
	if($.trim($('#s1').val())==''){alert('邮件服务器地址不能为空，请输入邮件服务器地址！'); $("#s1").focus().select(); return false;}else{
		$("#s1").val(ff_replace($("#s1").val()));
		};
	obj.submit();
}
</script>

</body>
</html>
