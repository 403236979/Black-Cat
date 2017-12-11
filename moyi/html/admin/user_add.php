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
<title>在线管理后台 - 用户管理 - 增加新用户</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;增加新用户</div>
		<div id="form">

<form action="" method="post">
	<input name="act" type="hidden" value="user_add" />
	<fieldset>
    <div class="ceng">
		<h3>用户基本数据</h3>
	
		<label for="username" class="label1">用户名:</label>
		<input type="text" id="uname" name="info[uname]" />
		<label for="pass">密码:</label>
		<input type="password" id="pword" name="info[pword]" style="width:157px;"/><br />

		<label for="email"  class="label1">电子邮箱:</label>
		<input name="info[email]" type="text" id="email" size="60" style="width:359px;" /><br />

		<label for="mobile"  class="label1">手机:</label>
		<input name="info[mobile]" type="text" id="mobile" size="60" style="width:359px;" /><br />
        <label for="ifyn"  class="label1">用户状态:&nbsp;&nbsp;</label>暂停
		<input type="radio" value="1" id="ifyn" name="info[ifyn]" />
		<label for="ifyn" >正常</label>
		<input name="info[ifyn]" type="radio" id="ifyn" value="2" checked="checked" /><br />
        

		<label for="sta2">用户所属留言回复分类:</label>
		<select size="1" id="sta2" name="info[sta2]">
		  <option value="0">无</option>
<?php
	if(!empty($dbffe1)) {
		$temp_msgsortlist=ol_getmesssortlist($dbffe1,'sort');
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
		foreach($temp_msgsortlist as $ary){
			echo '<option value="'.$ary['id'].'">'.$ary['sname'].'</option>';
		}
	}
?>
        </select>

	
	
		<h3>用户详细数据</h3>

		<label for="s1"  class="label1">姓名:</label>
		<input type="text" id="s1" name="info[s1]" />
		<label for="s2">职务:</label>
      
		<input type="text" id="s2" name="info[s2]" /><br>

		<label for="i1"  class="label1">性别:</label>
		<label for="boy">男</label>
		<input type="radio" value="1" id="i1" name="info[i1]" checked="checked" />
		<label for="girl">女</label>
		<input type="radio" value="0" id="i1" name="info[i1]" />
		<label for="sex">保密</label>
		<input type="radio" value="2" id="i1" name="info[i1]" /><br />
        
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

		<label for="utype0"  class="label1">用户类型</label>
		<select size="1" id="utype0" name="info[utype0]">
			<option value="m">管理员</option>
			<option value="a">代理商</option>
			<option value="b">分销商</option>
			<option value="c">普通用户</option>
		</select><br />

		<label for="info[utype6]">系统管理</label>
		<input type="checkbox" value="1" id="utype6" name="info[utype6]" />&nbsp;&nbsp;
		<label for="info[utype7]">模板管理</label>
		<input type="checkbox" value="1" id="utype7" name="info[utype7]" />&nbsp;&nbsp;
        <label for="info[utype19]">用户管理</label>
		<input type="checkbox" value="1" id="utype19" name="info[utype19]" />&nbsp;&nbsp;
        <label for="info[utype20]">备份恢复管理</label>
		<input type="checkbox" value="1" id="utype20" name="info[utype20]" />&nbsp;&nbsp;
        <br/>
  
        
		<label for="info[utype2]">栏目管理</label>
		<input type="checkbox" value="1" id="utype2" name="info[utype2]" />&nbsp;&nbsp;
        <label for="info[utype3]">文章管理</label>
		<input type="checkbox" value="1" id="utype3" name="info[utype3]" />&nbsp;&nbsp;
		<label for="info[utype4]">附件管理</label>
		<input type="checkbox" value="1" id="utype4" name="info[utype4]" />&nbsp;&nbsp;
        <label for="info[utype5]">特殊管理</label>
		<input type="checkbox" value="1" id="utype5" name="info[utype5]" />&nbsp;&nbsp;
        <br />
		<label for="info[utype12]">友情链接管理</label>
		<input type="checkbox" value="1" id="utype12" name="info[utype12]" />&nbsp;&nbsp;
        <label for="info[utype10]">留言管理</label>
		<input type="checkbox" value="1" id="utype10" name="info[utype10]" />&nbsp;&nbsp;
        <label for="info[utype11]">留言回复</label>
		<input type="checkbox" value="1" id="utype11" name="info[utype11]" />&nbsp;&nbsp;
        <label for="info[utype13]">广告管理</label>
		<input type="checkbox" value="1" id="utype13" name="info[utype13]" />&nbsp;&nbsp;
        <label for="info[utype14]">商城管理</label>
		<input type="checkbox" value="1" id="utype14" name="info[utype14]" />&nbsp;&nbsp;
        <label for="info[utype15]">论坛管理</label>
		<input type="checkbox" value="1" id="utype15" name="info[utype15]" />&nbsp;&nbsp;
        <br />
		<label for="info[utype4]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype4" name="info[utype4]" disabled="disabled" />&nbsp;&nbsp;
		<label for="info[utype16]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype16" name="info[utype16]" disabled="disabled" />&nbsp;&nbsp;
		<label for="info[utype17]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype17" name="info[utype17]" disabled="disabled" />&nbsp;&nbsp;
		<label for="info[utype18]" style="color:#CCC;">管理预留</label>
		<input type="checkbox" value="1" id="utype18" name="info[utype18]" disabled="disabled" />&nbsp;&nbsp;
		<br />
		
        <center class="center">
		<input type="button" value="提交" id="action" name="action" onclick="ulogin(this.form)" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="清空" id="reset" name="reset" />
	</center>
	</fieldset>
    <br /><br />
	

</form>


		</div>
        </fieldset>
		</div>
	</div>
</div>
</div>
<script language="javascript">
function ulogin(obj){
	if($.trim($('#uname').val())==''){alert('用户名不能为空，请输入用户名！'); $("#uname").focus().select(); return false;};
	if($.trim($('#pword').val())==''){alert('密码不能为空，请输入密码！'); $("#pword").focus().select(); return false;};
	if($.trim($('#s1').val())==''){alert('姓名不能为空，请输入姓名！'); $("#s1").focus().select(); return false;};
	obj.submit();
}
</script>

</body>
</html>
