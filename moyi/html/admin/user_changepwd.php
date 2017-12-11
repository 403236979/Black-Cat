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
<title>在线管理后台 - 用户管理 - 修改密码</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;修改密码</div>
		<div id="form">

<form action="user_changepwd.php" method="post">
	<input name="act" type="hidden" value="user_changepwd" />
	<fieldset>
    <div class="ceng">
		<h3>修改密码</h3>
		<input id="id" name="info[id]" type="hidden" value="<?php echo ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s0'], $ol_set['wset_ary']["cookie_pwd"]); ?>" />
		<label for="password" class="label1">旧密码:</label>
		<input type="text" id="opword" name="info[opword]"  /><br />
		<label for="npword" class="label1">新密码:</label>
		<input type="password" id="npword" name="info[npword]" /><br />
		<label for="npword" class="label1">重复密码:</label>
		<input type="password" id="npword1" name="info[npword1]" /><br />
        <center class="center1">
		<input type="button" value="提交" id="action" name="action" onclick="ulogin(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="清空" id="reset" name="reset" />
	</center>
        </div>
	</fieldset>
	
	<?php echo $user_changepwd_rev; ?>
</form>


		</div>
		</div>
	</div>
</div>
<script language="javascript">
function ulogin(obj){
	if($.trim($('#opword').val())==''){alert('旧密码不能为空，请输入旧密码！'); $("#opword").focus().select(); return false;};
	if($.trim($('#npword').val())==''){alert('新密码不能为空，请输入新密码！'); $("#npword").focus().select(); return false;};
	if($.trim($('#npword').val())!=$.trim($('#npword1').val())){alert('二次输入人密码不同，请重新输入！'); $('#npword').val(''); $('#npword1').val(''); $("#npword").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
