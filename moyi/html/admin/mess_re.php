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
<link href="js/jquery.yhHtmlEdit1.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/jquery.yhHtmlEdit1.min.js"></script>
<!–[if lte IE 8]> 
<meta http-equiv=”x-ua-compatible” content=”ie=7″ /> 
<![endif]–> 
<!–[if IE 9]> 
<meta http-equiv=”x-ua-compatible” content=”ie=9″ /> 
<![endif]–>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#mtxt").cleditor({controls:"bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | rule image link unlink | cut copy paste | source", width:458, height:300, useCSS:true})[0].focus();
      });
	   $(document).ready(function() {
        $("#re_mtxt").cleditor({controls:"bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | rule image link unlink | cut copy paste | source", width:458, height:300, useCSS:true})[0].focus();
      });
    </script>
<title>在线管理后台 - 留言回复管理留言查看回复 - 管理员用</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="mess_list.php" class="addStyle">返回留言列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;留言查看回复</div>
		<div id="form">

<?php
	if(!empty($dbffe1)) {
		$temp=ol_getmessdb($dbffe1,'msg',$ol_set['get_ary']['id']);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
	}
?>

<form action="mess_list.php" method="post">

	<input name="act" type="hidden" value="mess_re" />
	<fieldset>
    <div class="ceng">
		<h3>留言</h3>
		<input id="id" name="info[id]" type="hidden" value="<?php echo $temp['id']; ?>" />

		<label for="mtit">留言标题:</label>
		<input name="info[mtit]" type="text" id="mtit" size="60" value="<?php echo $temp['mtit']; ?>" /><br />

		<label for="fbdt">留言时间:</label>
		<?php echo $temp['fbdt']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="sta3">留言IP:</label>
		<?php echo $temp['sta3']; ?><br />

		<label for="xinm">留言人姓名:</label>
		<?php echo $temp['xinm']; ?><br />

		<label for="mail">留言人邮箱:</label>
		<?php echo $temp['mail']; ?><br />

		<label for="mobi">留言人电话:</label>
		<?php echo $temp['mobi']; ?><br />

		<label for="danw">留言人单位:</label>
		<?php echo $temp['danw']; ?><br />

		<label for="mtxt">留言人正文:</label>
        <textarea name="info[mtxt]" cols="60" rows="8" id="mtxt"><?php echo $temp['mtxt']; ?></textarea> <br />
<?php 
$upf_file='';
$dir=dirname(dirname(__FILE__))."/upfiles/messupf";
$handle=opendir($dir.".");
while (false !== ($file = readdir($handle))){
if ($file != "." && $file != "..") {
if(strstr($file,'upf_'.$temp['id'].'.')){
$upf_file = $file;break;}}}closedir($handle);
if(!empty($upf_file)){
	echo '<label for="mupf">留言上传文件:</label><a href="/upfiles/messupf/'.$upf_file.'" target="_blank">右键选择下载文件'.$upf_file.'</a><br />';
}
?>
		<label for="ifyn">留言状态:&nbsp;&nbsp;暂停</label>
		<input type="radio" value="1" id="ifyn" name="info[ifyn]"<?php if($temp['ifyn']==1) echo ' checked="checked"'; ?> />&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="ifyn">正常</label>
		<input name="info[ifyn]" type="radio" id="ifyn" value="2"<?php if($temp['ifyn']==2) echo ' checked="checked"'; ?> /><br />

	
		<h3>回复</h3>
		<input id="re_id" name="info[re_id]" type="hidden" value="<?php echo $temp['relist'][0]['id']; ?>" />
		<input id="re_pid" name="info[re_pid]" type="hidden" value="<?php echo ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s0'], $ol_set['wset_ary']["cookie_pwd"]); ?>" />
		<label for="mtxt">回复正文:</label>
        <textarea name="info[re_mtxt]" cols="60" rows="8" id="re_mtxt"><?php echo $temp['relist'][0]['mtxt']; ?></textarea>
        <center class="center8">
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
	
	if($.trim($('#mtit').val())==''){alert('留言标题不能为空，请输入留言标题！'); $("#mtit").focus().select(); return false;};
	if($.trim($('#re_mtxt').val())==''&&$('#re_id').val()!=''){ $('#re_mtxt').val('回复已删除！');};
	obj.submit();
}
</script>

</body>
</html>
