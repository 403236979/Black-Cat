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
<title>在线管理后台 - 网站定义管理 - 网站栏目分类管理 - 编辑</title>
</head>

<body>
<?php
	if(!empty($dblang)) {
		$temp=ol_getwebsortdb($dblang,'sort',$ol_set['get_ary']['id']);
		switch ($temp['styp']) {
			case '0':
				$temp['styp1']=0;
				$temp['styp2']=0;
				break;
			case '1':
				$temp['styp1']=1;
				$temp['styp2']=0;
				break;
			case '2':
				$temp['styp1']=0;
				$temp['styp2']=1;
				break;
			case '3':
				$temp['styp1']=1;
				$temp['styp2']=1;
				break;
		}
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
	}
?>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;编辑网站栏目分类
<?php
	echo '<a href="web_sort_list.php?pid=1" class="atyle">栏目根</a>';
	$temp_root=ol_getwebsorttorootlist($dblang,'sort',$temp['pid']);
	$i=0;
	$s_i=count($temp_root);
	if(count($temp_root)>0) foreach($temp_root as $ary){
		$i++;
		if($i==$s_i) echo ' > '.$ary['sname'].'('.$i.')';
			else echo ' > <a href="web_sort_list.php?pid='.$ary['id'].'">'.$ary['sname'].'</a>';
	}
?>
        <span style="float:right;"><a href="web_sort_list.php<?php echo '?pid='.$temp['pid']; ?>" class="addStyle">返回父网站栏目分类列表</a></span></div>
		<div id="form">
<form action="web_sort_edit.php" method="post">

	<input name="act" type="hidden" value="web_sort_edit" />
	<fieldset>
    <div class="ceng">
		<h3>网站栏目分类</h3>
		<input id="id" name="info[id]" type="hidden" value="<?php echo $temp['id']; ?>" />
        <input id="pid" name="info[pid]" type="hidden" value="<?php echo $temp['pid']; ?>" />
		<label for="sname" class="label1">分类名:</label>
		<input name="info[sname]" type="text" id="sname" size="60" value="<?php echo $temp['sname']; ?>" /><br />
		<label for="mname" class="label1">短分类名:</label>
		<input name="info[mname]" type="text" id="mname" size="60" value="<?php echo $temp['mname']; ?>" /><br />
		<label for="spage" class="label1">模板页:</label>
<?php
	if(empty($dbtpls)) echo '模板文件(WEBROOT\tpls\ffwbms_tpl.ffs)不存在.'; else{
		$temp_tpls=ol_gettplpagelist($dbtpls,'page');
		echo '<select id="spage" name="info[spage]" >';
		echo '<option value="">空</option>';
		if(count($temp_tpls)>0) foreach($temp_tpls as $ary) {
			echo '<option value="'.$ary['fname'].'"';
			if($ary['fname']==$temp['spage']) echo ' selected="selected"';
			echo '>'.$ary['pname'].'</option>';
		}
		echo '</select><br />';
	}
?>
		<label for="spwd" class="label1">分类密码:</label>
		<input name="info[spwd]" type="text" id="spwd" size="10" value="<?php echo $temp['spwd']; ?>" /><br />
		<label for="styp">栏目分类类型<?php echo $temp['styp']; ?>:</label>
		<input type="checkbox" value="1" id="styp1" name="info[styp1]"<?php if($temp['styp1']==1) echo '  checked="checked"'; ?> />单页文章分类&nbsp;&nbsp;
		<input type="checkbox" value="1" id="styp2" name="info[styp2]"<?php if($temp['styp2']==1) echo '  checked="checked"'; ?> />列表文章分类<br />
		<label for="ifyn">栏目分类状态:&nbsp;&nbsp;暂停</label>
		<input type="radio" value="1" id="ifyn" name="info[ifyn]"<?php if($temp['ifyn']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">正常</label>
		<input name="info[ifyn]" type="radio" id="ifyn" value="2"<?php if($temp['ifyn']==2) echo ' checked="checked"'; ?> /><br />
        <center class="center3">
		<input type="button" value="提交" id="action" name="action" onclick="yz(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
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
