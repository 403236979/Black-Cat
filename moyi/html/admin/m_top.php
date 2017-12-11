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
<link href="images/top.css" rel="stylesheet" type="text/css">
<script language="javascript" src="images/jquery-1.7.2.min.js"></script>
<!–[if lte IE 8]> 
<meta http-equiv=”x-ua-compatible” content=”ie=7″ /> 
<![endif]–> 
<!–[if IE 9]> 
<meta http-equiv=”x-ua-compatible” content=”ie=9″ /> 
<![endif]–>
<title>后台模板页</title>
</head>

<body>

<div class="top2">
    <a href="##"><img class="logolm" src="images/logo.png" /></a>
    <?php /*echo ffStrDE('f1i', $ol_set['wset_ary']["cookie_pwd"]); /**/ ?>
	<?php /*echo '<pre>'; print_r($ol_set); echo '</pre>'; /**/ ?>
   <?php /*echo $ol_set['wset_ary']["Lang_curr"]; /**/ ?>
   
	<form action="" method="post">
        <div class="goout"><input id="goout" name="action" type="button" onclick="window.location.href='logout.php?refer=logout'" value="退出登录" /></div>
        <div class="home"><input id="home" name="action" type="button" onclick="window.open('/')" value="返回首页" /></div>
        <div class="yonghu"><input id="yonghu" name="action" type="button" onclick="ulogin(this.form)" value="<?php echo ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s1'], $ol_set['wset_ary']["cookie_pwd"]); ?>" /> <img src="images/jiao.jpg" align="absmiddle" /></div>
    </form>
    <p class="jszc"><a href="" onclick="window.open('http://www.vikihui.com')">技术支持</a></p>
    <p class="jszc"><a style="width:auto; padding:0 10px;">当前工作语种：<?php echo $lang_add[$ol_set['wset_ary']["Lang_curr"]]['cname']; ?></a></p>
</div>

</body>
</html>
