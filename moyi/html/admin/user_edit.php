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
<title>在线管理后台 - 用户管理 - 编辑用户</title>
</head>

<body>
<?php /*echo $ol_set['wset_ary']["cookie_pwd"];/**/ ?>
<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;编辑用户<span style="float:right;"><a href="user_list.php" class="addStyle">返回用户列表</a></span></div>
		<div id="form">

<?php
	$temp=ol_getuserdb($dbffe9,'user',$ol_set['get_ary']['id']);
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
?>

<form action="user_edit.php" method="post">
	<input name="act" type="hidden" value="user_edit" />
	<fieldset>
    <div class="ceng">
		<h3>用户基本数据</h3>
		<input id="id" name="info[id]" type="hidden" value="<?php echo $temp['id']; ?>" />
		<label for="username" class="label1">用户名:</label>
		<input type="text" id="uname" name="info[uname]" readonly="readonly" value="<?php echo $temp['uname']; ?>"  style="width:169px;"  />
		<label for="pass">密码:</label>
		<input type="password" id="pword" name="info[pword]" style="width:169px;" /><br />

		<label for="email" class="label1">电子邮箱:</label>
		<input name="info[email]" type="text" id="email" size="60" value="<?php if($temp['email']!='') echo ffStrDE($temp['email'], $ol_set['wset_ary']["cookie_pwd"]); ?>" /><br />

		<label for="mobile"  class="label1">手机:</label>
		<input name="info[mobile]" type="text" id="mobile" size="60" value="<?php if($temp['mobile']!='') echo ffStrDE($temp['mobile'], $ol_set['wset_ary']["cookie_pwd"]); ?>" /><br />

		<label for="ifyn" class="label1">用户状态:&nbsp;&nbsp;</label>暂停
		<input type="radio" value="1" id="ifyn" name="info[ifyn]"<?php if($temp['ifyn']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">正常</label>
		<input type="radio" value="2" id="ifyn" name="info[ifyn]"<?php if($temp['ifyn']==2) echo ' checked="checked"'; ?> />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">未验证</label>
		<input type="radio" value="3" id="ifyn" name="info[ifyn]"<?php if($temp['ifyn']==3) echo ' checked="checked"'; ?> /><br />

		<label for="sta2">用户所属留言回复分类:</label>
		<select size="1" id="sta2" name="info[sta2]">
		  <option value="0"<?php if($temp['sta2']==0) echo ' selected="selected"'; ?> >无</option>
<?php
	if(!empty($dbffe1)) {
		$temp_msgsortlist=ol_getmesssortlist($dbffe1,'sort');
		//echo '<pre>'; print_r($temp_msgsortlist); echo '</pre><br />';
		foreach($temp_msgsortlist as $ary){
			echo '<option value="'.$ary['id'].'"';
			if($temp['sta2']==$ary['id']) echo ' selected="selected"';
			echo '>'.$ary['sname'].'</option>';
		}
	}
?>
        </select>

	
		<h3>用户详细数据</h3>

		<label for="s1" class="label1">姓名:</label>
		<input type="text" id="s1" name="info[s1]" value="<?php if($temp['uconn1']['s1']!='') echo ffStrDE($temp['uconn1']['s1'], $ol_set['wset_ary']["cookie_pwd"]); ?>" />
		<label for="s2">职务:</label>
		<input type="text" id="s2" name="info[s2]" value="<?php if($temp['uconn1']['s2']!='') echo ffStrDE($temp['uconn1']['s2'], $ol_set['wset_ary']["cookie_pwd"]); ?>" /><br />
		<label for="i1" class="label1">性别:</label>
		<label for="boy">男</label>
		<input type="radio" value="1" id="i1" name="info[i1]"<?php if($temp['uconn1']['i1']==1) echo ' checked="checked"'; ?> />
		<label for="girl">女</label>
		<input type="radio" value="0" id="i1" name="info[i1]"<?php if($temp['uconn1']['i1']==0) echo ' checked="checked"'; ?> />
		<label for="sex">保密</label>
		<input type="radio" value="2" id="i1" name="info[i1]"<?php if($temp['uconn1']['i1']==2) echo ' checked="checked"'; ?> /><br />
<!--
		<label for="s3">通信地址:</label>
		<input name="info[s3]" type="text" id="s3" size="60" /><br />
		<label for="s4">邮政编码:</label>
		<input name="info[s4]" type="text" id="s4" size="60" /><br />
		<label for="s5">单位名称:</label>
		<input name="info[s5]" type="text" id="s5" size="60" /><br />
		<label for="s6">单位地址:</label>
		<input name="info[s6]" type="text" id="s6" size="60" /><br />
		<label for="s7">单位邮编:</label>
		<input name="info[s7]" type="text" id="s7" size="60" /><br />
		<label for="s8">单位电话:</label>
		<input name="info[s8]" type="text" id="s8" size="60" /><br />
		<label for="s9">头像图片地址:</label>
		<input name="info[s9]" type="text" id="s9" size="60" /><br />
		<label for="s10">单位网址:</label>
		<input name="info[s10]" type="text" id="s10" size="60" /><br />
		<label for="s11">联系人身份证号:</label>
		<input name="info[s11]" type="text" id="s11" size="60" /><br />
		<label for="s12">联系人身份证号:</label>
		<input name="info[s12]" type="text" id="s12" size="60" /><br />
		<label for="s13">单位营业执照号:</label>
		<input name="info[s13]" type="text" id="s13" size="60" /><br />
		<label for="i3_7">所在地区:</label>
		<label for="i3">国家</label>
		<input name="info[s3]" type="text" id="s3" size="10" />&nbsp;&nbsp;
		<label for="i4">省</label>
		<input name="info[i4]" type="text" id="i4" size="10" />&nbsp;&nbsp;
		<label for="i5">市</label>
		<input name="info[i5]" type="text" id="i5" size="10" />&nbsp;&nbsp;
		<label for="i6">县</label>
		<input name="info[i6]" type="text" id="i6" size="10" />&nbsp;&nbsp;
		<label for="i7">村</label>
		<input name="info[i7]" type="text" id="i7" size="10" />&nbsp;&nbsp;
<!-- -->
	
		<h3>用户权限设置</h3>
<?php
	$temp['utype']=ffStrDE($temp['utype'], $ol_set['wset_ary']["cookie_pwd"]);
	$tmp_utype='';
	for($i=0;$i<21;$i++){
		$tmp_utype[$i]=substr($temp['utype'],$i,1);
	}
	//echo '<pre>'; print_r($tmp_utype); echo '</pre><br />';
?>
		<label for="utype0">用户类型</label>
		<select size="1" id="utype0" name="info[utype0]" onchange="xzyz(this.value,this.form)">
			<option value="m"<?php if($tmp_utype[0]=='m') echo ' selected="selected"'; ?> >管理员</option>
			<option value="a"<?php if($tmp_utype[0]=='a') echo ' selected="selected"'; ?> >代理商</option>
			<option value="b"<?php if($tmp_utype[0]=='b') echo ' selected="selected"'; ?> >分销商</option>
			<option value="c"<?php if($tmp_utype[0]=='c') echo ' selected="selected"'; ?> >普通用户</option>
		</select><br />
        

 		<?php if($tmp_utype[6]==1) { ?>
        <label for="info[utype6]">系统管理</label>
		<input type="checkbox" value="1" id="utype6" name="info[utype6]" <?php if($tmp_utype[6]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[7]==1) { ?>
        <label for="info[utype7]">模板管理</label>
		<input type="checkbox" value="1" id="utype7" name="info[utype7]" <?php if($tmp_utype[7]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <?php if($tmp_utype[19]==1) { ?>
        <label for="info[utype19]">用户管理</label>
		<input type="checkbox" value="1" id="utype19" name="info[utype19]" <?php if($tmp_utype[19]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
      	<?php if($tmp_utype[20]==1) { ?>
        <label for="info[utype20]">备份恢复管理</label>
		<input type="checkbox" value="1" id="utype20" name="info[utype20]" <?php if($tmp_utype[20]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <br/>
  
        <?php if($tmp_utype[2]==1) { ?>
		<label for="info[utype2]">栏目管理</label>
		<input type="checkbox" value="1" id="utype2" name="info[utype2]" <?php if($tmp_utype[2]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <?php if($tmp_utype[3]==1) { ?>
        <label for="info[utype3]">文章管理</label>
		<input type="checkbox" value="1" id="utype3" name="info[utype3]" <?php if($tmp_utype[3]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[4]==1) { ?>
        <label for="info[utype4]">附件管理</label>
		<input type="checkbox" value="1" id="utype4" name="info[utype4]" <?php if($tmp_utype[4]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <?php if($tmp_utype[5]==1) { ?>
        <label for="info[utype5]">特殊管理</label>
		<input type="checkbox" value="1" id="utype5" name="info[utype5]" <?php if($tmp_utype[5]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <br />
        <?php if($tmp_utype[12]==1) { ?>
		<label for="info[utype12]">友情链接管理</label>
		<input type="checkbox" value="1" id="utype12" name="info[utype12]" <?php if($tmp_utype[12]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <?php if($tmp_utype[10]==1) { ?>
        <label for="info[utype10]">留言管理</label>
		<input type="checkbox" value="1" id="utype10" name="info[utype10]" <?php if($tmp_utype[10]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <?php if($tmp_utype[11]==1) { ?>
        <label for="info[utype11]">留言回复</label>
        <input type="checkbox" value="1" id="utype11" name="info[utype11]" <?php if($tmp_utype[11]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[13]==1) { ?>
        <label for="info[utype13]">广告管理</label>
		<input type="checkbox" value="1" id="utype13" name="info[utype13]" <?php if($tmp_utype[13]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[14]==1) { ?>
        <label for="info[utype14]">商城管理</label>
		<input type="checkbox" value="1" id="utype14" name="info[utype14]" <?php if($tmp_utype[14]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <?php if($tmp_utype[15]==1) { ?>
        <label for="info[utype15]">论坛管理</label>
		<input type="checkbox" value="1" id="utype15" name="info[utype15]" <?php if($tmp_utype[15]==1) echo '  checked="checked"'; ?> />&nbsp;&nbsp;<?php } ?>
        <br />
        <?php if($tmp_utype[8]==1) { ?>
		<label for="info[utype8]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype8" name="info[utype8]" disabled="disabled" />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[16]==1) { ?>
        <label for="info[utype16]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype16" name="info[utype16]" disabled="disabled" />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[17]==1) { ?>
        <label for="info[utype17]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype17" name="info[utype17]" disabled="disabled" />&nbsp;&nbsp;<?php } ?>
		<?php if($tmp_utype[18]==1) { ?>
        <label for="info[utype18]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype18" name="info[utype18]" disabled="disabled" />&nbsp;&nbsp;<?php } ?>
		<br />

       <center class="center">
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
function ulogin(obj){
	if($.trim($('#uname').val())==''){alert('用户名不能为空，请输入用户名！'); $("#uname").focus().select(); return false;};
	//if($.trim($('#pword').val())==''){alert('密码不能为空，请输入密码！'); $("#pword").focus().select(); return false;};
	if($.trim($('#s1').val())==''){alert('姓名不能为空，请输入姓名！'); $("#s1").focus().select(); return false;};
	obj.submit();
}

function xzyz(qx,obj){
			$('input:checkbox').attr('checked',false);
	switch(qx){
		case "m":
			$("input[name='info[utype2]']").attr("checked", true);
			$("input[name='info[utype3]']").attr("checked", true);
			$("input[name='info[utype4]']").attr("checked", true);
			$("input[name='info[utype5]']").attr("checked", true);
			$("input[name='info[utype6]']").attr("checked", true);
			$("input[name='info[utype7]']").attr("checked", true);
			$("input[name='info[utype10]']").attr("checked", true);
			$("input[name='info[utype11]']").attr("checked", true);
			$("input[name='info[utype12]']").attr("checked", true);
			$("input[name='info[utype13]']").attr("checked", true);
			$("input[name='info[utype14]']").attr("checked", true);
			$("input[name='info[utype15]']").attr("checked", true);
			$("input[name='info[utype19]']").attr("checked", true);
			$("input[name='info[utype20]']").attr("checked", true);
			break;
		case "a":
			$("input[name='info[utype2]']").attr("checked", true);
			$("input[name='info[utype3]']").attr("checked", true);
			$("input[name='info[utype4]']").attr("checked", true);
			$("input[name='info[utype5]']").attr("checked", true);
			$("input[name='info[utype6]']").attr("checked", true);
			$("input[name='info[utype7]']").attr("checked", true);
			$("input[name='info[utype10]']").attr("checked", true);
			$("input[name='info[utype11]']").attr("checked", true);
			$("input[name='info[utype12]']").attr("checked", true);
			$("input[name='info[utype13]']").attr("checked", true);
			$("input[name='info[utype14]']").attr("checked", true);
			$("input[name='info[utype15]']").attr("checked", true);
			$("input[name='info[utype19]']").attr("checked", true);
			$("input[name='info[utype20]']").attr("checked", true);
			break;
		case "b":
			$("input[name='info[utype2]']").attr("checked", true);
			$("input[name='info[utype3]']").attr("checked", true);
			$("input[name='info[utype4]']").attr("checked", true);
			$("input[name='info[utype5]']").attr("checked", true);
			$("input[name='info[utype6]']").attr("checked", true);
			$("input[name='info[utype7]']").attr("checked", true);
			$("input[name='info[utype10]']").attr("checked", true);
			$("input[name='info[utype11]']").attr("checked", true);
			$("input[name='info[utype12]']").attr("checked", true);
			$("input[name='info[utype13]']").attr("checked", true);
			$("input[name='info[utype14]']").attr("checked", true);
			$("input[name='info[utype15]']").attr("checked", true);
			$("input[name='info[utype19]']").attr("checked", true);
			$("input[name='info[utype20]']").attr("checked", true);
			break;
		case "c":
			break;
		default:
			alert("error")
	}
	
	
}



</script>

</body>
</html>
