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
<title>在线管理后台 - 网站定义管理 - 网站栏目分类管理 - 增加</title>
</head>

<body>
<?php if($ol_set['get_ary']['pid']==0 || $ol_set['get_ary']['pid']=='') $ol_set['get_ary']['pid']=1; ?>
<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;增加网站栏目分类
<?php
	echo '<a href="web_sort_list.php?pid=1" class="atyle">栏目根</a>';
	$temp_root=ol_getwebsorttorootlist($dblang,'sort',$ol_set['get_ary']['pid']);
	$i=0;
	$s_i=count($temp_root);
	if(count($temp_root)>0) foreach($temp_root as $ary){
		$i++;
		if($i==$s_i) echo ' > '.$ary['sname'].'('.$i.')';
			else echo ' > <a href="web_sort_list.php?pid='.$ary['id'].'">'.$ary['sname'].'</a>';
	}
?>
        <span style="float:right;"><a href="web_sort_list.php<?php echo '?pid='.$ol_set['get_ary']['pid']; ?>" class="addStyle">返回父网站栏目分类列表</a></span></div>
		<div id="form">
<form action="web_sort_add.php" method="post">

	<input name="act" type="hidden" value="web_sort_add" />
	<fieldset>
    <div class="ceng">
		<h3>网站栏目分类</h3>

		<input id="pid" name="info[pid]" type="hidden" value="<?php echo $ol_set['get_ary']['pid']; ?>" />
        <label for="sname" class="label1">分类名:</label>
		<input name="info[sname]" type="text" id="sname" size="60" /><br />
		<label for="mname" class="label1">短分类名:</label>
		<input name="info[mname]" type="text" id="mname" size="60" /><br />
		<label for="spage" class="label1">模板页:</label>
<?php
	if(empty($dbtpls)) echo '模板文件(WEBROOT\tpls\ffwbms_tpl.ffs)不存在.'; else{
		$temp_tpls=ol_gettplpagelist($dbtpls,'page');
		echo '<select id="spage" name="info[spage]" >';
		echo '<option value="">空</option>';
		if(count($temp_tpls)>0) foreach($temp_tpls as $ary) {
			echo '<option value="'.$ary['fname'].'">'.$ary['pname'].'</option>';
		}
		echo '</select><br />';
	}
?>
		<label for="spwd" class="label1">分类密码:</label>
		<input name="info[spwd]" type="text" id="spwd" size="10" style="width:140px;" /><br />
		<label for="styp" class="label1">栏目分类类型:</label>
		<input type="checkbox" value="1" id="styp1" name="info[styp1]" />单页文章分类&nbsp;&nbsp;
		<input type="checkbox" value="1" id="styp2" name="info[styp2]" />列表文章分类<br />
		<label for="ifyn" class="label1">栏目分类状态:</label>&nbsp;&nbsp;暂停
		<input type="radio" value="1" id="ifyn" name="info[ifyn]" />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">正常</label>
		<input name="info[ifyn]" type="radio" id="ifyn" value="2" checked="checked" /><br />
<center class="center3">
		<input type="button" value="提交" id="action" name="action" onclick="yz(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="清空" id="reset" name="reset" />
	</center>
	</fieldset>
    <br /><br />
	
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
	
	if($.trim($('#sname').val())==''){alert('分类名不能为空，请输入分类名！'); $("#sname").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
