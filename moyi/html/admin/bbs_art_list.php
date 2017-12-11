<?php 
require_once('func.php');
require_once('acts_bbs.php');
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
<title>在线管理后台 - 论坛管理 - 帖子管理 - 列表</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;帖子管理 - 列表</div>
		<div id="form">
<style>
.slist{width:200px; height:40px; border:1px solid #669; text-align:center; line-height:40px; float:left; margin:5px 10px;}
</style>
<?php
	$vtemp=ol_bbs_sort_getlist($dbffe4);
	if(!empty($vtemp)) foreach($vtemp as $ary){ echo '<div class="slist"><a href="bbs_art_list.php?id='.$ary['id'].'">'.$ary['sname'].'</a></div>'; }
?>

<div class="add">
<table id="list" width="100%" cellpadding="0" cellspacing="0">
   <tr><td class="tdstyle" width="8%" style="background:#919fb9;color:#fff;">ID</td><td width="8%"  style="background:#919fb9;color:#fff;">所属版块</td><td  style="background:#919fb9;color:#fff;text-align:left;padding-left:10px;">帖子标题</td><td width="8%"  style="background:#919fb9;color:#fff;">查看</td><td width="8%" style="background:#919fb9;color:#fff;">正常</td><td width="8%" style="background:#919fb9;color:#fff;">删除</td> </tr>

<?php
	$temp=ol_bbs_art_getlist($dbffe4,$ol_set['get_ary']['id'],$ol_set['get_ary']['pg'],20);
//echo '<pre>'; print_r($temp); echo '</pre><br />';
	if(!empty($ol_set['get_ary']['id'])){$pid_str = "&pid=".$ol_set['get_ary']['id'];};
	if(!empty($temp[0]))
	 foreach($temp[0] as $ary){
		echo '<tr>';
		echo '<td>'.$ary['id'].'</td>';
		echo '<td >'.$ary['typ'].'</td>';
		echo '<td class="leftStyle"><a href="bbs_art_edit.php?id='.$ary['id'].$pid_str.'">'.$ary['tit'].'</a></td>';
		echo '<td class="icon"><a href="bbs_art_edit.php?id='.$ary['id'].$pid_str.'"><span style="background-position:0 -117px;"> </span></a></td>';
		switch($ary['ifyn']){
			case 1:
				echo '<td class="icon"><span style="background-position:0 -50px;"> </span></td>';
				break;
			case 2:
				echo '<td class="icon"><span style="background-position:0 -0px;"> </span></td>';
				break;
			default: //所有条件不满足时，默认返回字符串OK
				echo '<td class="icon"><span style="background-position:0 -50px;"> </span></td>';
		}
		echo '<td class="icon"><a href="bbs_art_del.php?id='.$ary['id'].$pid_str.'" onclick="delcfm()"><span style="background-position:0 -26px;"> </span></a></td>';
		echo '</tr>';
	}
	//echo '<pre>'; print_r($temp[1]); echo '</pre><br />';
?>

</table>
<?php
	if ($temp[1]['pages']>1){ //分页数据
		echo '<div class="pages">';
		$pgs_db=$temp[1];
		$vURL='bbs_art_list.php?id='.$ol_set['get_ary']['id'];
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

	</div>	</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	/* 当鼠标移到表格上是，当前一行背景变色 */
	$("#list tr td").mouseover(function(){
		$(this).parent().find("td").css("background-color","#e5e5e5");
	});
	$("#list tr:first td").mouseover(function(){
		$(this).parent().find("td").css("background-color","#919fb9");
	});
	
	/* 当鼠标在表格上移动时，离开的那一行背景恢复 */
	$("#list tr td").mouseout(function(){
		var bgc = $(this).parent().attr("bg");
		$(this).parent().find("td").css("background-color",bgc);
	});

   $("#list tr:first td").mouseout(function(){
		var bgc = $(this).parent().attr("bg");
		$(this).parent().find("td").css("background-color","#919fb9");
	});
	/* 隔行变色 */
	var color="#f0d8db"
	$("#list tr:odd td").css("background-color",color);  //改变偶数行背景色
	/* 把背景色保存到属性中 */
	$("#list tr:odd").attr("bg",color);
	$("#list tr:even").attr("bg","#f0f0f0");
})

function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
</script>

</body>
</html>
