<?php 
require_once('func.php');
require_once('acts.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();
//echo '<pre>'; print_r($ol_set); echo '</pre>'; die('');
if($ol_set['get_ary']['act']=='del'){
	$temp=ol_getlanglist_del($dbbase,$ol_set['get_ary']['id'],$ol_set['WEB_ROOT']);
	//echo '<pre>'; print_r($temp); echo '</pre>'; die('');
}
if($ol_set['get_ary']['act']=='selcurr'){
	$temp=ol_getlanglist_selcurr($ol_set['get_ary']['lang'],$ol_set['wset_ary']["cookie_pwd"]);
	header("Location: ".$temp);
	exit;
}
if($ol_set['get_ary']['act']=='hou'){
	$sssss='hou';
}
//echo '<pre>'; print_r($ol_set); echo '</pre><br />';
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
<title>在线管理后台 - 网站定义管理 - 网站语种管理</title>
<script language="javascript">
<?php
	if(!empty($lang_add))foreach($lang_add as $k=>$v){
		if(!empty($v['ename'])){
			echo "var lang_".$k."=new Array();\n";//'<option value="'.$k.'">'.$v['cname'].'</option>';
			echo "lang_".$k."[0]='".$v['cname']."';\n";
			echo "lang_".$k."[1]='".$v['ename']."';\n";
			echo "lang_".$k."[2]='".$v['sname']."';\n";
		}
	}
?>
</script>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站语种管理[当前工作语种：<?php echo $lang_add[$ol_set['wset_ary']["Lang_curr"]]['cname']; ?>]
        <div style="float:right;margin-right:20px;"><a style="color:#7c7b7b;" href="javascript:;" onclick="showadd()">新增语种</a></div></div>
	<div id="form">
		<?php
			$temp=ol_getlanglist($dbbase);
			//echo '<pre>'; print_r($temp); echo '</pre><br />';
			if(!empty($temp))foreach($temp as $ary){
				echo '<div class="langls">';
				if($ary['ifdef']==1)
					//echo '<h3><a href="web_lang_list.php?act=del&id='.$ary['id'].'">╳</a>'.$ary['cname'].'(默认)</h3>';
					echo '<h3>'.$ary['cname'].'(默认)</h3>';
				else
					echo '<h3><a href="web_lang_list.php?act=del&id='.$ary['id'].'">╳</a>'.$ary['cname'].'</h3>';
				echo '<!--div style="overflow:hidden;"><label>顺序处理：</label>';
				echo '<a href="web_lang_list.php?act=qian&id='.$ary['id'].'"><input name="" type="button" value="前移&nbsp;&nbsp;" /></a>&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<a href="web_lang_list.php?act=hou&id='.$ary['id'].'"><input name="" type="button" value="后移&nbsp;&nbsp;" /></a>';
				echo '</div-->';
				echo '<div style="overflow:hidden;"><label>语种中文名：</label>'.$ary['cname'].'</div>';
				echo '<div style="overflow:hidden;"><label>语种英文名：</label>'.$ary['ename'].'</div>';
				echo '<div style="overflow:hidden;"><label>原语种名：</label>'.$ary['sname'].'</div>';
				echo '<div style="overflow:hidden;"><label>语种缩写：</label>'.$ary['eab'].'</div>';
				echo '<form action="web_lang_list.php" method="post">';
				echo '<input name="act" type="hidden" value="web_lang_list_edit" />';
				echo '<input name="id" type="hidden" value="'.$ary['id'].'" />';
				echo '<label>是否默认：</label>';
				if($ary['ifdef']==1)
					echo '<input name="ifdef" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;';
				else
					echo '<input name="ifdef" type="radio" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;';
				if($ary['ifdef']==0)
					echo '<input name="ifdef" type="radio" value="0" checked="checked" />否<br /><br />';
				else
					echo '<input name="ifdef" type="radio" value="0" />否<br /><br />';
				echo '<center><input name="" type="submit" value="确认修改 " /></center>';
				echo '</form>';
				echo '<br /><center><a href="web_lang_list.php?act=selcurr&lang='.$ary['eab'].'">选择为当前操作语种</a></center>';
				echo '</div>';
			}
		?></h3>
        <div id="addlang" class="langls" style="display:none;">
        	<h3><a href="javascript:;" onclick="hideadd()">╳</a>增加新语种</h3>
            <form action="web_lang_list.php" method="post">
			<input name="act" type="hidden" value="web_lang_list_add" />
            <div style="overflow:hidden;"><label>语种选择：</label><select name="lang" onchange="sel_lang(this.value)">
			<?php
				if(!empty($lang_add))foreach($lang_add as $k=>$v){
					if(!empty($v['ename']))
						echo '<option value="'.$k.'">'.$v['cname'].'</option>';
				}
			?>
            </select></div>
            <div style="overflow:hidden;"><label>语种中文名：</label><span id="cname"></span></div>
            <div style="overflow:hidden;"><label>语种英文名：</label><span id="ename"></span></div>
            <div style="overflow:hidden;"><label>原语种名：</label><span id="sname"></span></div>
            <div style="overflow:hidden;"><label>语种缩写：</label><span id="eab"></span></div>
            <label>是否默认：</label><input name="ifdef" type="radio" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="ifdef" type="radio" value="0" checked="checked" />否<br /><br />
			<center><input name="" type="submit"value="增加语种 " /></center>
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
	
	if($.trim($('#domain').val())==''){alert('网站域名不能为空，请输入网站域名！'); $("#domain").focus().select(); return false;}else{
		$("#domain").val(ff_replace($("#domain").val()));
		};;
	obj.submit();
}

function sel_lang(lang){
/*
	$('#cname').val('lang_'+lang+'[0]');
	$('#ename').val('lang_'+lang+'[0]');
	$('#sname').val('lang_'+lang+'[0]');
	$('#eab').val(lang);
	alert('lang_'+lang+'[0]');
/**/
}

function showadd(){
	$('#addlang').show();
}

function hideadd(){
	$('#addlang').hide();
}

</script>

</body>
</html>
