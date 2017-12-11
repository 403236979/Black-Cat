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
<script src="js/ajaxfileupload.js" type="text/javascript"></script>
<script language="javascript" src="images/ffwbms_indate.js"></script>

<link href="js/jquery.yhHtmlEdit1.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/jquery.yhHtmlEdit1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#atxt").cleditor({controls:"bold italic underline strikethrough subscript superscript | font size style | color highlight removeformat | bullets numbering | outdent indent | alignleft center alignright justify | rule image link unlink | cut copy paste | source", width:520, height:480, useCSS:true})[0].focus();
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
<title>在线管理后台 - 网站数据管理 - 网站文章管理 - 增加</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="web_art_pagelist.php?pid=<?php echo $ol_set['get_ary']['pid']; ?>&pg=<?php echo $ol_set['get_ary']['pg']; ?>" class="addStyle">返回文章列表</a></span>&nbsp;&nbsp;&nbsp;&nbsp;网站文章管理 - 增加</div>
		<div id="form">

<form action="web_art_add.php" method="post">

	<input name="act" type="hidden" value="web_art_add" />
	<fieldset>
    <div class="ceng">
        
		<input id="url_pid" name="info[url_pid]" type="hidden" value="<?php echo $ol_set['get_ary']['pid']; ?>" />
        <input id="url_page" name="info[url_page]" type="hidden" value="<?php echo $ol_set['get_ary']['page']; ?>" />
        <input id="pid" name="info[pid]" type="hidden" value="<?php echo $ol_set['get_ary']['pid']; ?>" />
        <label for="atit" class="label1">标题:</label>
		<input name="info[atit]" type="text" id="atit" size="60" value="" style="width:85%" /><br />
		<label for="stit" class="label1">短标题:</label>
		<input name="info[stit]" type="text" id="stit" size="30" value="" style="width:85%;min-width:200px;"/><br />
		<label for="indt" class="label1" >有效时间:</label>
		<input name="info[indt]" type="text" id="indt" style="width:119px" onfocus="ffcms_setDate(this,<?php echo $ol_set['wset_ary']["currY"]; ?>,2019)" value="<?php echo "2019-12-31"; ?>" readonly><br />
		<label for="timg" class="label1" style="float:left;">标题图:</label>
        <input id="timg" name="info[timg]" type="hidden" value="" />
		<div class="scro"><ul class="pic" id="timglist"></ul></div>
        <br />
        <div class="addbut"><a href="javascript:;" onclick="selartimgshow(1)">选择增加图片</a>&nbsp;&nbsp;<a href="javascript:;" onclick="upartimgshow(1)">上传增加图片</a></div>
      
		<label for="auth" class="label1">作者:</label>
		<input name="info[auth]" type="text" id="auth" size="60" value=""  style="width:85%;" /><br />
		<label for="sour" class="label1">来源:</label>
		<input name="info[sour]" type="text" id="sour" size="60" value="" style="width:85%;"  /><br />
		<label for="keys" class="label1">关键字:</label>
		<input name="info[keys]" type="text" id="keys" size="60" value=""  style="width:85%;" /><br />
		<label for="abs" class="label1">描述:</label>
		<input name="info[abs]" type="text" id="abs" size="60" value=""  style="width:85%;" /><br />
		<input type="checkbox" value="1" id="sta1_1" name="info[sta1_1]" /> 是否置顶&nbsp;&nbsp;
		<input type="checkbox" value="1" id="sta1_2" name="info[sta1_2]" /> 是否推荐&nbsp;&nbsp;
		<input type="checkbox" value="1" id="sta2_1" name="info[sta2_1]" /> 是否可回复&nbsp;&nbsp;
        <input id="sta2_2" name="info[sta2_2]" type="hidden" value="0" />
		<input type="checkbox" value="1" id="sta4_1" name="info[sta4_1]" /> 标题加粗&nbsp;&nbsp;
		<input type="checkbox" value="1" id="sta4_2" name="info[sta4_2]" /> 标题加红&nbsp;&nbsp;
		<input type="checkbox" value="2" id="ifyn" name="info[ifyn]" checked="checked" /> 是否发布&nbsp;&nbsp;<br/>
		<label for="abs" class="label1">正文:</label>
        <textarea id="atxt" name="info[atxt]" width="100%"></textarea>
        <center class="center4">
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
	if($.trim($('#atit').val())==''){alert('标题不能为空，请输入标题名！'); $("#atit").focus().select(); return false;};
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
	}
	if(id==2){
		var imgurl=$.ajax({url:'ajaxs.php?act=imgidgeturl&id='+tid,cache:false,async:false});
		$('#yhhtmledit_img_insert').val(imgurl.responseText);
		$("#selartimg").hide();
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
	$(".cleditorMain").css({width:"100%"})
})
</script>

</body>
</html>
