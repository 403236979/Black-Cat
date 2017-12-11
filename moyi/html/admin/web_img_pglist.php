<?php 
require_once('func.php');
require_once('acts.php');
if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();
if($ol_set['get_ary']['pg']=='') $ol_set['get_ary']['pg']=1;
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
<title>在线管理后台 - 上传文件图片管理 - 分页列表</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="web_img_add.php?pg=<?php echo $ol_set['get_ary']['pg']; ?>" class="addStyle">增加新文件或图片</a></span>&nbsp;&nbsp;&nbsp;&nbsp;上传文件图片管理:</div>
		<div id="form">

          <div class="add">
          <ul class="pic2">

<?php
	if(!empty($dblang)) {
		$temp=ol_getwebimgpglist($dblang,$ol_set['get_ary']['pg'],15);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
	}

	if(count($temp[0])>0) foreach($temp[0] as $ary){
		if($ary['fext']=='jpg'||$ary['fext']=='gif'||$ary['fext']=='png'||$ary['fext']=='bmp'){
			echo '<li><cite><img src="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'.jpeg" onclick="window.open('."'".$ol_set['wset_ary']['upload_path'].$ary['furl']."'".')"></cite><span><input name="" type="text" value="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'" /> <a href="web_img_edit.php?id='.$ary['id'].'&pg='.$ol_set['get_ary']['pg'].'" class="bian">编辑</a><a href="web_img_del.php?refer=web_img_pglist_del&id='.$ary['id'].'&pg='.$ol_set['get_ary']['pg'].'" class="shan" onclick="delcfm()">删除</a></span></li>';
		}else{
			echo '<li><cite>'.$ary['fext'].'文件</cite><span><input name="" type="text" value="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'" /> <a href="web_img_edit.php?id='.$ary['id'].'&pg='.$ol_set['get_ary']['pg'].'" class="bian">编辑</a><a href="web_img_del.php?refer=web_img_pglist_del&id='.$ary['id'].'&pg='.$ol_set['get_ary']['pg'].'" class="shan" onclick="delcfm()">删除</a></span></li>';
		};

		//echo '<td>'.$ary['id'].' - <a href="web_art_edit.php?id='.$ary['id'].'">'.$ary['atit'].'</a></td>';
	}
?>
          </ul>
          </div>
<div>
</div>

<?php
	if ($temp[1]['pages']>1){ //分页数据
		echo '<div class="pages">';
		$pgs_db=$temp[1];
		$vURL='web_img_pglist.php?';
		if ($pgs_db['current']>1) echo '<a href="'.$vURL.'&pg=1">首页</a>&nbsp;&nbsp;';
		if ($pgs_db['current']>1) echo '<a href="'.$vURL.'&pg='.$pgs_db['previous'].'">上一页</a>&nbsp;&nbsp;';
		if (count($pgs_db['p_list'])>0) foreach($pgs_db['p_list'] as $ary){ //循环
			echo '<a href="'.$vURL.'&pg='.$ary.'">'.$ary.'</a>&nbsp;&nbsp;';
		}
		echo '<span>'.$pgs_db['current'].'</span>';
		if (count($pgs_db['n_list'])>0) foreach($pgs_db['n_list'] as $ary){ //循环
			echo '<a href="'.$vURL.'&pg='.$ary.'">'.$ary.'</a>&nbsp;&nbsp;';
		}
		if ($pgs_db['current']<$pgs_db['pages']) echo '<a href="'.$vURL.'&pg='.$pgs_db['next'].'">下一页</a>&nbsp;&nbsp;';
		if ($pgs_db['current']<$pgs_db['pages']) echo '<a href="'.$vURL.'&pg='.$pgs_db['pages'].'">尾页</a>&nbsp;&nbsp;';
		echo '</div>';
	}
?>

		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	/* 当鼠标移到表格上是，当前一行背景变色 */
	$("#list tr td").mouseover(function(){
		$(this).parent().find("td").css("background-color","#d5f4fe");
	});
	
	/* 当鼠标在表格上移动时，离开的那一行背景恢复 */
	$("#list tr td").mouseout(function(){
		var bgc = $(this).parent().attr("bg");
		$(this).parent().find("td").css("background-color",bgc);
	});

	/* 隔行变色 */
	var color="#ffeab3"
	$("#list tr:odd td").css("background-color",color);  //改变偶数行背景色
	/* 把背景色保存到属性中 */
	$("#list tr:odd").attr("bg",color);
	$("#list tr:even").attr("bg","#fff");
})
function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
</script>

</body>
</html>
