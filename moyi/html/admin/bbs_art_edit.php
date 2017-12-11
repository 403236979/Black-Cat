<?php 
require_once('func.php');
require_once('acts.php');
require_once('acts_bbs.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();
if(!empty($ol_set['post_ary'])){
	//echo '<pre>'; print_r($ol_set['post_ary']); echo '</pre>'; die();
	$temp=ol_bbs_art_edit($dbffe4,$ol_set['post_ary']);
	$temp='';
	if(!empty($ol_set['get_ary']['pid'])) $temp="?id=".$ol_set['get_ary']['pid'];
	header("location: bbs_art_list.php".$temp); exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/manage.css" rel="stylesheet" type="text/css">
<script language="javascript" src="images/jquery-1.7.2.min.js"></script>

<link href="js/jquery.yhHtmlEdit1.css" rel="stylesheet" type="text/css">
<?php
$temp=ol_bbs_art_getvalue($dbffe4,$ol_set['get_ary']['id']);
$temp1=ol_bbs_sort_getvalue($dbffe4,$temp['typ']);
$temp2=ol_getuserdb($dbffe9,'user',$temp['uid']);
//$temp['reid']=8;
//echo '<pre>'; print_r($temp2); echo '</pre><br />';
?>
<script language="javascript" src="js/jquery.yhHtmlEdit1.min.js"></script>
    <script type="text/javascript">
	  $(document).ready(function() {
        $("#txt1").cleditor({controls:"bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | rule image link unlink | cut copy paste | source", width:570, height:280, useCSS:true}); //[0].focus()
        $("#txt2").cleditor({controls:"bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | rule image link unlink | cut copy paste | source", width:570, height:280, useCSS:true}); //[0].focus()
      });
    </script>
<title>在线管理后台 - 论坛管理 - 帖子管理 - 编辑</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="bbs_art_list.php<?php if(!empty($ol_set['get_ary']['pid'])){echo "?id=".$ol_set['get_ary']['pid'];}; ?>" class="addStyle">返回帖子列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;帖子管理 - 编辑帖子</div>
		<div id="form">

<form action="bbs_art_edit.php?id=<?php echo $temp['id']; ?><?php if(!empty($ol_set['get_ary']['pid'])){echo "&pid=".$ol_set['get_ary']['pid'];}; ?>" method="post">

	<fieldset>
    <div class="ceng">

        <input name="info[id]" type="hidden" value="<?php echo $temp['id']; ?>" />
        <input name="info[typ]" type="hidden" value="<?php echo $temp['typ']; ?>" />
        <label for="typ" class="label1">版块名:</label>
		<?php echo $temp1['sname']; ?><br />
        <label for="uid" class="label1">发贴人:</label>
		<?php if(empty($temp['uid'])) echo "未登录用户"; else echo ffStrDE($temp2['uconn1']['s1'], $ol_set['wset_ary']["cookie_pwd"]); ?><br />
		<?php /*if(empty($temp['uid'])) echo "未登录用户"; else echo '<a href="user_edit.php?id='.$temp['uid'].'" target="_blank">'.ffStrDE($temp2['uconn1']['s1'], $ol_set['wset_ary']["cookie_pwd"]).'</a><br />'; */ ?>
        <label for="fdt" class="label1">发贴时间:</label>
		<?php echo $temp['fdt']; ?><br />
        <label for="fip" class="label1">发帖IP:</label>
		<?php echo $temp['fip']; ?><br />
        <label for="reid" class="label1">是否回复贴:</label>
		<?php if($temp['reid']==0) echo '主贴'; else echo '回复贴，主贴号 = '.$temp['reid']; ?><br />
		<?php if($temp['reid']==0) { ?>
		<label for="tit" class="label1">帖子标题:</label>
		<input name="info[tit]" type="text" id="tit" style="width:465px;" size="60" value="<?php echo $temp['tit']; ?>" /><br />
        <?php } ?>
		<label for="txt1" class="label1"><?php if($temp['reid']==0) echo '帖子正文:'; else '回复正文:'; ?></label>
        <textarea id="txt1" name="info[txt1]"><?php echo $temp['txt1']; ?></textarea>
		<?php if($temp['reid']==0) { ?>
        <label for="txt2" class="label1">帖子条件正文:</label>
        <textarea name="info[txt2]" id="txt2"><?php echo $temp['txt2']; ?></textarea>
		<label for="t2e1" class="label1">条件类型</label>
		<input name="info[t2e1]" type="radio" value="0" onclick="showt2e2(this.value)"<?php if($temp['t2e1']==0) echo ' checked="checked"'; ?> />无&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="info[t2e1]" type="radio" value="1" onclick="showt2e2(this.value)"<?php if($temp['t2e1']==1) echo ' checked="checked"'; ?> />回复可看&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="info[t2e1]" type="radio" value="2" onclick="showt2e2(this.value)"<?php if($temp['t2e1']==2) echo ' checked="checked"'; ?> />回复次数开放&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="info[t2e1]" type="radio" value="3" onclick="showt2e2(this.value)"<?php if($temp['t2e1']==3) echo ' checked="checked"'; ?> />收费<br />
        <div id="t2e2_div" style="display:none;"><label for="txt2" class="label1" id="t2e2_span">收费值</label>
        <input name="info[t2e2]" id="t2e2" type="text" value="<?php echo $temp['t2e2']; ?>" /></div>
		<label for="ifyn" class="label1">是否<?php echo $temp['ifyn']; ?>可用:</label>
        <input name="info[ifyn]" type="radio" value="1"<?php if($temp['ifyn']==1) echo ' checked="checked"'; ?> />暂停&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="info[ifyn]" type="radio" value="2"<?php if($temp['ifyn']==2) echo ' checked="checked"'; ?> />正常<br />
        <?php } ?><br />
        <center class="center4">
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
	
	if($.trim($('#tit').val())==''){alert('标题不能为空，请输入标题名！'); $("#tit").focus().select(); return false;};
	obj.submit();
}

function showt2e2(val){
	//if(val==2)
	switch(val){
		case '2':
			$('#t2e2_div').show();
			$('#t2e2_span').text('回复次数');
			break;
		case '3':
			$('#t2e2_div').show();
			$('#t2e2_span').text('查看金币数');
			break;
		default:
			$('#t2e2_div').hide();
	}
}

$(document).ready(function(){  
      showt2e2("<?php echo $temp['t2e1']; ?>");
})
</script>

</body>
</html>
