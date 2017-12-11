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
<!–[if lte IE 8]> 
<meta http-equiv=”x-ua-compatible” content=”ie=7″ /> 
<![endif]–> 
<!–[if IE 9]> 
<meta http-equiv=”x-ua-compatible” content=”ie=9″ /> 
<![endif]–>
<title>在线管理后台 - 用户管理</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;"><a href="user_add.php" class="addStyle">增加新用户</a></span>&nbsp;&nbsp;&nbsp;&nbsp;用户列表</div>
		<div id="form">
        <div class="add">
<table id="list" width="100%"  cellpadding="0" cellspacing="0">
<tr><td class="tdstyle" style="background:#919fb9;color:#fff;">序号</td><td class="tdstyle"  style="background:#919fb9;color:#fff;">ID</td><td  style="background:#919fb9;color:#fff;text-align:left;padding-left:10px;">用户名</td><td width="8%"  style="background:#919fb9;color:#fff;">状态</td><td width="8%" style="background:#919fb9;color:#fff;">删除</td> </tr>
<?php
	$temp=ol_getuserpglist($dbffe9,'user',$ol_set['get_ary']['pg'],15);
	$i_tmp=1;
	foreach($temp[0] as $ary){
		echo '<tr>';
		echo '<td  class="tdstyle">';
		if($i_tmp<10) echo '0';
		echo $i_tmp.'</td>';
		if(empty($ary['uconn1']['s1']))
			echo '<td class="tdstyle">'.$ary['id'].'</td><td  class="leftStyle"><a href="user_edit.php?id='.$ary['id'].'">'.$ary['uname'].'</a></td>';
		else
			echo '<td class="tdstyle">'.$ary['id'].'</td><td  class="leftStyle"><a href="user_edit.php?id='.$ary['id'].'">'.$ary['uname'].' - '.ffStrDE($ary['uconn1']['s1'], $ol_set['wset_ary']["cookie_pwd"]).'</a></td>';

		switch($ary['ifyn']){
			case 1:
				echo '<td class="icon"><a href="#'.$ary['id'].'"><span style="background-position:0 -49px;"> </span></a></td>';
				break;
			case 2:
				echo '<td class="icon"><a href="#'.$ary['id'].'"><span style="background-position:0 -0px;"> </span></a></td>';
				break;
			default: //所有条件不满足时，默认返回字符串OK
				echo '<td class="icon"><span style="background-position:0 16px;"> </span></td>';
		}
		echo '<td class="icon"><a href="user_del.php?refer=user_del&id='.$ary['id'].'" onclick="delcfm()"><span style="background-position:0 -26px;"> </span></a></td>';
		echo '</tr>';
		$i_tmp++;
	}
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
?>

</table>
<?php
	if ($temp[1]['pages']>1){ //分页数据
		echo '<div class="pages">';
		$pgs_db=$temp[1];
		$vURL='user_list.php?';
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
