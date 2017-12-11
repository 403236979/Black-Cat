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
<title>在线管理后台 - 网站定义管理 - 网站设置管理</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站设置管理</div>
		<div id="form">
<?php
	//echo '<pre>'; print_r($ol_set); echo '</pre><br />';
	$temp=ol_getwebset($dbbase,'lang',$ol_set['wset_ary']['Lang_id']);
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
?>

<form action="web_set.php" method="post">
	<input name="act" type="hidden" value="web_set" />
	<fieldset>
    <div class="ceng">
		<h3>网站设置(当前网站语种：<?php echo $ol_set['wset_ary']['Lang_cname']; ?>)</h3>
		<input id="id" name="info[id]" type="hidden" value="<?php echo $temp['id']; ?>" />
		<label for="domain" class="label1">网站域名:</label>
		<input type="text" id="domain" name="info[domain]" size="60" value="<?php echo $temp['domain']; ?>" /><br />
		<label for="siteicp" class="label1">网站备案号:</label>
		<input type="text" id="siteicp" name="info[siteicp]" size="60" value="<?php echo $temp['siteicp']; ?>" /><br />
		<label for="gname" class="label1">网站名称:</label>
		<input name="info[gname]" type="text" id="gname" size="60" value="<?php echo $temp['gname']; ?>" /><br />
		<label for="gkey" class="label1">通用关键字:</label>
		<input name="info[gkey]" type="text" id="gkey" size="60" value="<?php echo $temp['gkey']; ?>" /><br />
		<label for="gabs" class="label1">通用描述:</label>
		<input name="info[gabs]" type="text" id="gabs" size="60" value="<?php echo $temp['gabs']; ?>" /><br />
      
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
	
	if($.trim($('#domain').val())==''){alert('网站域名不能为空，请输入网站域名！'); $("#domain").focus().select(); return false;}else{
		$("#domain").val(ff_replace($("#domain").val()));
		};;
	obj.submit();
}
</script>

</body>
</html>
