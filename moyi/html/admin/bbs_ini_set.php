<?php 
require_once('func.php');
require_once('acts_bbs.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

$path_filename=$ol_set['ROOT_PATH']."/tpls/ffwbms.ini";
$has_sections=true;
if(!empty($ol_set['post_ary'])){
	$ini_temp=parse_ini_file($path_filename,$has_sections);
	$ini_temp['bbs']['lfree']=$ol_set['post_ary']['info']['lfree'];
	write_ini_file($path_filename, $ini_temp, $has_sections);
	$ini_temp='';
	//print_r($ol_set['post_ary']);
	//$temp=ol_bbs_ini_set($dbffe4,$ol_set['post_ary']);
	//header("location: bbs_ini_set.php"); exit;
}

$ini_temp=parse_ini_file($path_filename,$has_sections);

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
<title>在线管理后台 - 论坛管理 - INI设置</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;论坛管理 - 论坛设置</div>
		<div id="form">
<form action="bbs_ini_set.php" method="post">
	<fieldset>
    <div class="ceng">
        <label for="lfree">用户登录赠送金币:</label>
		<input name="info[lfree]" type="text" id="lfree" size="5" value="<?php echo $ini_temp['bbs']['lfree']; ?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" /><br />
        <center class="center5">
		<input type="button" value="提交" id="action" name="action" onclick="ulogin(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="清空" id="reset" name="reset" />
	</center>
        </div>
	</fieldset>
    <br /><br />
	
    <br /><br />

</form>


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


function ulogin(obj){
	obj.submit();
}
</script>

</body>
</html>
