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
<title>在线管理后台 - 友情链接管理 - 友情链接分类管理 - 增加</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="link_sort_list.php" class="addStyle">返回友情链接分类列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;友情链接分类管理 - 增加</div>
		<div id="form">

<form action="link_sort_add.php" method="post">

	<input name="act" type="hidden" value="link_sort_add" />
	<fieldset>
    <div class="ceng">
		<legend>友情链接分类</legend>
		<label for="sname" class="label1">分类名:</label>
		<input name="info[sname]" type="text" id="sname" size="30" value="" />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="sname">宽:</label>
		<input name="info[tkun]" type="text" id="tkun" size="4" value="0" style="width:74px;" />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="sname">高:</label>
		<input name="info[tgao]" type="text" id="tgao" size="4" value="0"  style="width:74px;" /><br />
		<label for="sname" class="label1">分类说明:</label>
		<input name="info[snote]" type="text" id="snote" style="width:465px;" size="60" value="" /><br />
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
	$("form textarea").each(function(){
		$(this).val(ff_replace($(this).val(),1));
		
	});
	$("form input:text").each(function(){
		$(this).val(ff_replace($(this).val(),0));
		
	});
	
	if($.trim($('#sname').val())==''){alert('分类名不能为空，请输入分类名！'); $("#sname").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
