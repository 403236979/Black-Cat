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
<title>在线管理后台 - 上传文件图片管理 - 增加</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="web_img_pglist.php?pg=<?php echo $ol_set['get_ary']['pg']; ?>" class="addStyle">返回上传文件图片管理</a></span>&nbsp;&nbsp;&nbsp;&nbsp;增加新文件或图片</div>
		<div id="form">

<form action="web_img_add.php" method="post" enctype="multipart/form-data">

	<input name="act" type="hidden" value="web_img_add" />
	<fieldset>
    <div class="ceng">
        <?php /* furl,fext */ ?>
        <input id="upfile" name="upfile" type="file" size="50" style="border:0;" /><br />
        <label for="ftit" class="label1">标题:</label>
		<input name="info[ftit]" type="text" id="ftit" size="60" value="" style="width:211px;" /><br />
        <label for="ftxt" class="label1">说明:</label>
        <textarea id="ftxt" name="info[ftxt]" style="width:221px; height:100px;"></textarea><br />
        <label for="fnote" class="label1">注释:</label>
        <textarea id="fnote" name="info[fnote]" style="width:221px; height:100px;"></textarea><br />
		<label for="fpwd" class="label1">密码:</label>
		<input name="info[fpwd]" type="text" id="fpwd" size="30" value="" /><br />
        <center class="center6">
		<input type="button" value="提交" id="action" name="action" onclick="yz(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="清空" id="reset" name="reset" />
	</center>
       </div> 
	</fieldset>
    

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

function yz(obj){
	$("form textarea").each(function(){
		$(this).val(ff_replace($(this).val(),1));
		
	});
	$("form input:text").each(function(){
		$(this).val(ff_replace($(this).val(),0));
		
	});
	
	if($.trim($('#upfile').val())==''){alert('要上传的文件或图片不能为空，请选择要上传的文件或图片！'); return false;};
	if($.trim($('#ftit').val())==''){alert('标题不能为空，请输入标题名！'); $("#ftit").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
