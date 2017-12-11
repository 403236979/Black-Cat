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
<title>在线管理后台 - 留言管理 - 留言分类管理 - 编辑</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="mess_sort_list.php" class="addStyle">返回留言分类列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;留言分类管理 - 编辑</div>
		<div id="form">
        <div class="add">
<?php
	$temp=ol_getmesssortdb($dbffe1,'sort',$ol_set['get_ary']['id']);
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
?>

<form action="mess_sort_edit.php" method="post">

	<input name="act" type="hidden" value="mess_sort_edit" />
	<fieldset>
     <div class="ceng">
		<h3>留言分类</h3>
		<input id="id" name="info[id]" type="hidden" value="<?php echo $temp['id']; ?>" />
		<label for="sname">分类名:</label>
		<input name="info[sname]" type="text" id="sname" size="40" value="<?php echo $temp['sname']; ?>" /><br />
<table style="width:300px;">
<tr>
		<td><label for="sta1">状态1:</label></td>
		<td><input type="checkbox" value="1" id="staa" name="info[sta1]"<?php if($temp['sta1']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;</td>
		<td><label for="sta2">状态2:</label></td>
		<td><input type="checkbox" value="1" id="stab" name="info[sta2]"<?php if($temp['sta2']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;</td>
        </tr>
		<tr>
		<td><label for="sta3">状态3:</label></td>
		<td><input type="checkbox" value="1" id="stac" name="info[sta3]"<?php if($temp['sta3']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;</td>
		<td><label for="sta4">状态4:</label></td>
		<td><input type="checkbox" value="1" id="stad" name="info[sta4]"<?php if($temp['sta4']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;</td>
</table>
		<label for="ifyn">分类状态:&nbsp;&nbsp;暂停</label>
		<input type="radio" value="1" id="ifyn" name="info[ifyn]"<?php if($temp['ifyn']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">正常</label>
		<input name="info[ifyn]" type="radio" id="ifyn" value="2"<?php if($temp['ifyn']==2) echo ' checked="checked"'; ?> /><br />
<center class="center6">
		<input type="button" value="提交" id="action" name="action" onclick="ulogin(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="清空" id="reset" name="reset" />
	</center>
    </div>
	</fieldset>
   

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
