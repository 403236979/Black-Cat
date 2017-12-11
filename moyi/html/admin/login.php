<?php 
define('ROOT_PATH', dirname(dirname(__FILE__)));			//本页所在的目录，根目录
define('SESS_PATH', ROOT_PATH.'/data');			//session会话目录
@date_default_timezone_set('Asia/Shanghai');	//定义默认时区
@session_save_path(SESS_PATH);					//定义session会话保存的目录,有此行，API扩展不能读写会话
session_start(); 
if(count($_POST)>0){
	//error_reporting( E_ALL ); 
	if(strtolower(trim($_SESSION['VerifyCode']))===strtolower(trim($_POST['VerifyCode']))){
		require_once('func.php');
		require_once('acts.php');
	}else{
		echo '<script language="javascript">alert("验证码错误");</script>';
	}
/**/
	//echo '<pre>'; print_r($_POST); echo '</pre>';
	//echo '<pre>【'; print_r($_SESSION); echo '】</pre>';
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="images/index2.css" rel="stylesheet" />
<script language="javascript" src="images/jquery-1.7.2.min.js"></script>
<title>网站后台管理系统登录</title> 
<metahttp-equiv="X-UA-Compatible" content="IE=edge"/>
</head>

<body>
<script type="text/javascript"> 
if (top.location !== self.location) {
    top.location=self.location;
}

function ghyzm(obj){
	$('#yzmimg').attr('src',"/inc/yanzhen.php?"+Math.random());
}
</script>
<?php /*echo '<pre>'; print_r($ol_set); echo '</pre>';/**/ ?>
<?php /*echo md5('ffwbms').'<br />';/**/ ?>


<div class="kuang">
<img class="logo2"  src="images/logo2.png" />
<div class="dlkuang">
   <div class="nrk">
	    <form action="/admin/login.php" method="post">
        	<input name="act" type="hidden" value="login" />
            <div class="tb1"><input id="uname" name="info[uname]" type="text" onkeydown="javascript:btnevent();" /></div>
            <div class="tb2"><input id="pword" name="info[pword]" type="password" onkeydown="javascript:btnevent();"  /></div>
            <div class="tb3"> <input id="yzm"  name="VerifyCode" class="yanzhen1" onkeydown="javascript:btnevent();" /></div>
            <div class="anniu1"><a href="javascript:;" onclick="ghyzm()"><img id="yzmimg"  src="/inc/yanzhen.php"  style="float:right;width:128px;height:40px;margin:0px 0px 0 16px;display:inline;border-radius:5px;"/></a></div>
            <div class="anniu2"><input id="action2" name="action" type="button" onclick="ulogin(this.form)" value="登  陆" /></div>
		</form>
    </div>
</div>

</div>


<script language="javascript">
function ulogin(obj){
	if($.trim($('#uname').val())==''){alert('用户名不能为空，请输入用户名！'); $("#uname").focus().select(); return false;};
	if($.trim($('#pword').val())==''){alert('密码不能为空，请输入密码！'); $("#pword").focus().select(); return false;};
	obj.submit();
}

function btnevent() { 
	if (event.keyCode == 13) $("#action2").click(); //alert('回车');
}
</script>

</body>
</html>
