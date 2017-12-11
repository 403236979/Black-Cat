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
    <script type="text/javascript">
      $(document).ready(function() {
        $("#atxt").cleditor({controls:"bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | rule image link unlink | cut copy paste | source", width:573, height:480, useCSS:true})[0].focus();
      });
    </script>
<style type="text/css"> 
.cjxcdiv{background-color:#eeeeee;color:#000033;position: absolute;top:50%;left:50%;border:1px double #003366;text-align:center;display:none;font-size:12px;}
.cjxcdiv .tit{width:100%;height:20px;background-color:#3d517e;line-height:20px;;color:#fff;text-align:center;font-size:14px;font-weight:bold;}
.cjxcdiv .tit .close{float:right;}
.cjxcdiv .tit .close a{text-decoration:none;color:#FFFFFF;}

.cjxcinput{ margin:3px 0 3px 0; height:22px; line-height:22px; padding:2px;}

.cjxcul{ margin:0; padding:0;}
.cjxcli{ display:block; width:110px; height:90px; margin:7px; float:left;}
.cjxcli img{ max-width:110px; max-height:90px;}
.cjxcul .pages{width: 100%;height:20px;overflow:auto;margin: 5px 0px 3px 0px;text-align:center;line-height:20px;}
.cjxcul .pages a{padding:3px 8px;margin:0 3px 0 3px;background-color:#ec7d8c;text-decoration:none;color:#fff;}
.cjxcul .pages span{padding:3px 8px;margin:0 3px 0 3px;background-color:#FFF;text-decoration:none;color:#006;}
</style> 
<title>在线管理后台 - 网站数据管理 - 网站栏目分类文章 - 编辑（不存在时增加）</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><?php if($ol_set['get_ary']['pid']!=''){ ?>
<span style="float:right;"><a href="web_art_pagelist.php?pid=<?php echo $ol_set['get_ary']['pid']; ?>&pg=<?php echo $ol_set['get_ary']['pg']; ?>" class="addStyle">返回文章列表</a></span>
<?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;网站栏目文章编辑:

        </div>
		<div id="form">
<?php
	if(!empty($dblang)) {
		$temp=ol_getwebpageartdb($dblang,$ol_set['get_ary']['id']);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
	}
?>
<form action="web_art_page.php" method="post">

	<input name="act" type="hidden" value="web_art_page" />
	<fieldset>
    <div class="ceng">
		<h3>网站栏目分类单页内容</h3>
		<input id="url_pid" name="info[url_pid]" type="hidden" value="<?php echo $ol_set['get_ary']['pid']; ?>" />
		<input id="url_pg" name="info[url_pg]" type="hidden" value="<?php echo $ol_set['get_ary']['pg']; ?>" />
		<input id="id" name="info[id]" type="hidden" value="<?php if($temp['sort_sart']==0) echo 0; else echo $temp['id']; ?>" />
        <input id="atyp" name="info[atyp]" type="hidden" value="<?php if($temp['sort_sart']==0) echo 2; else echo $temp['atyp']; ?>" />
        <input id="sort_id" name="info[sort_id]" type="hidden" value="<?php echo $temp['sort_id']; ?>" />

		<label for="atit" class="label1">分类名:</label>
		<input name="info[atit]" type="text" id="atit" size="60" style="width:470px;" value="<?php if($temp['sort_sart']==0) echo $temp['sort_sname']; else echo $temp['atit']; ?>" /><br />
        <p style="height:15px;"></p>
        <label for="timg" class="label1" style="float:left;">标题图:</label><input id="timg" name="info[timg]" type="hidden" value="<?php echo $temp['timg']; ?>" />
		<div class="scro"><ul class="pic" id="timglist"></ul></div>
        <p style="height:10px;"></p>
        <div class="addbut"><a href="javascript:;" onclick="selartimgshow(1)">选择增加图片</a>&nbsp;&nbsp;<a href="javascript:;" onclick="upartimgshow(1,<?php if($ol_set['get_ary']['id']=='') echo 0; else echo $ol_set['get_ary']['id']; ?>)">上传增加图片</a></div>
        <p style="height:10px;"></p>
		<label for="keys" class="label1">关键字:</label>
		<input name="info[keys]" type="text" id="keys" size="60" style="width:470px;" value="<?php echo $temp['keys']; ?>" /><br />
		<label for="abs" class="label1">描述:</label>
		<input name="info[abs]" type="text" id="abs" size="60" style="width:470px;" value="<?php echo $temp['abs']; ?>" /><br />
		<label for="atxt" class="label1">正文:</label>
        <textarea id="atxt" name="info[atxt]"><?php echo $temp['atxt']; ?></textarea>
<center class="center5">
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

<div id="selartimg" class="cjxcdiv" style="width:500px;height:360px;margin-left:-250px;margin-top:-200px;">
	<div class="tit"><div class="close"><a href="javascript:;" onclick="selartimghide()" >关闭</a></div>选 择 照 片</div>
    <ul class="cjxcul" id="upfilelist"></ul>
</div>

<div id="upartimg" class="cjxcdiv" style="width:300px;height:245px;margin-left:-200px;margin-top:-150px;">
	<div class="tit"><div class="close"><a href="javascript:;" onclick="upartimghide()" >关闭</a></div>上 传 照 片</div>
	<iframe id="ufframe" src="about:blank" style="width:296px;height:220px;border:0;padding:0;margin:0;"></iframe>
</div>

<script language="javascript">
function yz(obj){
	if($.trim($('#atit').val())==''){alert('分类名不能为空，请输入分类名！'); $("#atit").focus().select(); return false;};
	//var ovatext=$('#atext').val();
	obj.submit();
}

//显示文章标题图
function showarttimg(id){
	//alert(aid+' - '+tid);
	var listr=$.ajax({url:'ajaxs.php?act=arttimglist&id='+id,cache:false,async:false});
	$('#timglist').html(listr.responseText);
}

//标题图号组合字符串显示文章标题图
function showarttimgids(ids){
	var listr=$.ajax({url:'ajaxs.php?act=arttimglistids&ids='+ids,cache:false,async:false});
	$('#timglist').html(listr.responseText);
}

//删除文章标题图
function arttimgdel(tid){
	//alert(tid);
	var o_timg=$('#timg').val();
	var ary=o_timg.split(" ");
	var n_timg='';
	if(ary.length>0) for(var i=0; i<ary.length ; ++i){
		if (ary[i]!=''){
			if (ary[i]!=tid){
				if (i==0){
					n_timg+=ary[i];
				}else{
					n_timg+=' '+ary[i];
				}
			}
		}
	}
	$('#timg').val(n_timg);
	showarttimgids($('#timg').val());
}

//上传文章标题图片窗口显示
//sn=1为上传文章标题图片，返回上传后的记录号
//sn=2为上传文章正文图片，返回上传后的文件名
//id=文章号
function upartimgshow(sn,id){
	if($("#upfilelist").is(":hidden")){ //是否隐藏
		var obj = document.getElementById("ufframe");    
		ed = document.all?obj.contentWindow.document:obj.contentDocument;   
		var ufframe_form='<style>.cjxcinput{ margin:3px 0 3px 0;height:22px;line-height:22px;padding:2px;width:210px;}</style>'
			+'<form action="" method="post" enctype="multipart/form-data">'
			+'<input name="act" type="hidden" value="web_art_img_upfile" />'
			+'<input name="sn" type="hidden" value="'+sn+'" />'
			+'<input name="id" type="hidden" value="'+id+'" />'
			+'<input name="upfile" type="file" id="upfile" class="cjxcinput" style="width:250px;" /> <br />'
			+'标题：<input name="info[ftit]" type="text" id="ftit" maxlength="10" class="cjxcinput"  ><br />'
			+'说明：<input name="info[ftxt]" type="text" id="ftxt"  maxlength="10" class="cjxcinput"  ><br />'
			+'注释：<input name="info[fnote]" type="text" id="fnote" maxlength="10" class="cjxcinput"  ><br />'
			+'密码：<input name="info[fpwd]" type="text" id="fpwd" maxlength="10" class="cjxcinput"  ><br /><br />'
			+'<input id="titbtn" type="button" value=" 上传标题照片 " onclick="uparttitimg(this.form)" />'
			+'</form>'
			+'\<script>\nfunction uparttitimg(obj){\n'
			+'if(obj.ftit.value==""){\nalert('+"'"+'标题不能为空，请输入标题！'+"'"+'); \nreturn false;\n};\n'
			//+'obj.action="ajaxs.php?act=arttimgadd";\n'
			+'obj.submit();\n'
			+'}\<\/script>';
		//alert(ufframe_form);
		//document.getElementById("ufframe").contentWindow.body.html(ufframe_form);
		ed.open();   
		ed.write(ufframe_form);   
		ed.close();   
		ed.contentEditable = true;   
		//ed.designMode = 'on'; //编辑模式
		$("#upartimg").show();
	};
};

//上传文章标题图片窗口隐藏
function upartimghide(){
	$("#upartimg").hide();
};

//选择文章标题图片窗口显示，id=文章号
function selartimgshow(id){
	if($("#upfilelist").is(":hidden")){ //是否隐藏
		//if($("#upfilelist").html()==''){
			var upfls=$.ajax({url:'ajaxs.php?act=selartimg&id='+id,cache:false,async:false});
			$("#upfilelist").html(upfls.responseText);
			//$("#test").val(upfls.responseText);
		//}
		$("#selartimg").show();
	};
};

//选择文章标题图片窗口隐藏
function selartimghide(){
	$("#selartimg").hide();
};

//选择文章标题图片窗口翻页，id=文章号，pg=翻页号
function artimglspg(id,pg){
	var upfls=$.ajax({url:'ajaxs.php?act=selartimg&id='+id+'&pg='+pg,cache:false,async:false});
	$("#upfilelist").html(upfls.responseText);
};

//选择文章标题图片窗口双击增加图片，
//id=1，标题图选择图片
//id=2，文章选择图片
//tid=图片号
function artimglsdbadd(id,tid){
	if(id==1){
		var o_timg=$('#timg').val();
		$('#timg').val(o_timg+" "+tid);
		$("#selartimg").hide();
		showarttimgids($('#timg').val());
		$("#eq").click();
	}
	if(id==2){
		var imgurl=$.ajax({url:'ajaxs.php?act=imgidgeturl&id='+tid,cache:false,async:false});
		$('#yhhtmledit_img_insert').val(imgurl.responseText);
		$("#selartimg").hide();
		$("#eq").click();
	}
};


//正文选择图片窗口显示
function yhhtmledit_img_insert_sel(id){
	//$('#yhhtmledit_img_insert').val('yhhtmledit_img_insert_sel');
	if($("#upfilelist").is(":hidden")){ //是否隐藏
			var upfls=$.ajax({url:'ajaxs.php?act=selartimg&id='+id,cache:false,async:false});
			$("#upfilelist").html(upfls.responseText);
		$("#selartimg").show();
	};
}

//正文上传图片窗口显示
function yhhtmledit_img_insert_add(id){
	//$('#yhhtmledit_img_insert').val('yhhtmledit_img_insert_add');
	//alert('yhhtmledit_img_insert_add');
	upartimgshow(id,0);
}


$(document).ready(function(){  
	showarttimgids($('#timg').val());
})
</script>
</body>
</html>
