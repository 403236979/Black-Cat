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
<script language="javascript" src="images/ffwbms_indate.js"></script>
<!–[if lte IE 8]> 
<meta http-equiv=”x-ua-compatible” content=”ie=7″ /> 
<![endif]–> 
<!–[if IE 9]> 
<meta http-equiv=”x-ua-compatible” content=”ie=9″ /> 
<![endif]–>
<title>在线管理后台 - 友情链接管理 - 友情链接管理 - 友情链接增加</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="link_list.php<?php if($ol_set['get_ary']['pid']==0 || $ol_set['get_ary']['pid']=='') echo '?pid=1'; else echo '?pid='.$ol_set['get_ary']['pid']; ?>" class="addStyle">返回友情链接列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;友情链接管理 - 增加</div>
		<div id="form">

<form action="link_add.php" method="post">

	<input name="act" type="hidden" value="link_add" />
	<fieldset>
    <div class="ceng">
		<h3>友情链接</h3>

		<label for="pid" class="label2">友情链接分类:</label>
<?php
	if(!empty($dbffe2)) {
		$temp_sort=ol_getlinksortlist($dbffe2,'sort','id,sname');
		//echo '<pre>'; print_r($temp_sort); echo '</pre><br />';
		echo '<select id="pid" name="info[pid]" >';
		if(count($temp_sort)>0) foreach($temp_sort as $ary) {
			echo '<option value="'.$ary['id'].'"';
			if($ary['id']==$ol_set['get_ary']['pid']) echo ' selected="selected"';
			echo '>'.$ary['sname'].'</option>';
		}
		echo '</select><br />';
	}
?>
		<label for="ltit" class="label2">友情链接标题:</label>
		<input name="info[ltit]" type="text" id="ltit" size="40" style="width:390px;" /><br />
		<label for="lurl" class="label2">友情链接转向地址:</label>
		<input name="info[lurl]" type="text" id="lurl" size="60" /><br />
		<label for="llogo" class="label2">友情链接图片地址:</label>
		<input name="info[llogo]" type="text" id="llogo" size="60" /><br />
		<label for="lhint" class="label2">鼠标指向提示字符:</label>
		<input name="info[lhint]" type="text" id="lhint" size="60" /><br />
		<label for="lstate" class="label2">友情链接启用时间:</label>
		<input name="info[lstate]" type="text" id="lstate" style="width:80px" onfocus="ffcms_setDate(this,<?php echo $ol_set['wset_ary']["currY"]; ?>,2019)" value="<?php echo $ol_set['wset_ary']["currY"]."-".$ol_set['wset_ary']["currM"]."-".$ol_set['wset_ary']["currD"]; ?>" readonly>
		<label for="lstop" class="label2">友情链接结束时间:</label>
		<input name="info[lstop]" type="text" id="lstop" style="width:80px" onfocus="ffcms_setDate(this,<?php echo $ol_set['wset_ary']["currY"]; ?>,2019)" value="<?php echo ($ol_set['wset_ary']["currY"]+1)."-".$ol_set['wset_ary']["currM"]."-".$ol_set['wset_ary']["currD"]; ?>" readonly><br />
		<label for="ifyn" class="label2">友情链接状态:</label>&nbsp;&nbsp;暂停
		<input type="radio" value="1" id="ifyn" name="info[ifyn]" />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">正常</label>
		<input name="info[ifyn]" type="radio" id="ifyn" value="2" checked="checked" /><br />
        <center class="center7">
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
	
	if($.trim($('#ltit').val())==''){alert('友情链接标题不能为空，请输入友情链接标题！'); $("#ltit").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
