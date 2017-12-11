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
<title>在线管理后台 - 友情链接管理 - 友情链接管理 - 列表</title>
</head>

<body>
<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current"><span style="float:right;">
<?php
	if(!empty($dbffe2)) {
		$temp_sort=ol_getlinksortlist($dbffe2,'sort','id,sname');
		//echo '<pre>'; print_r($temp_sort); echo '</pre><br />';
	}
?>
		<select id="sortpid" name="sortpid" onchange="selchange(this.value)">
		  <option value="0"<?php if($ol_set['get_ary']['pid']==0 || $ol_set['get_ary']['pid']=='') echo ' selected="selected"'; ?>>所有友情链接</option>
<?php
	if(count($temp_sort)>0) foreach($temp_sort as $ary) {
		echo '<option value="'.$ary['id'].'"';
		if($ary['id']==$ol_set['get_ary']['pid']) echo ' selected="selected"';
		echo '>'.$ary['sname'].'</option>';
	}
?>
		</select>
        &nbsp;&nbsp;<a href="link_add.php<?php if($ol_set['get_ary']['pid']==0 || $ol_set['get_ary']['pid']=='') echo '?pid=1'; else echo '?pid='.$ol_set['get_ary']['pid']; ?>" class="addStyle">增加新的友情链接</a></span>&nbsp;&nbsp;&nbsp;&nbsp;友情链接管理 - 列表</div>
		<div id="form">
<div class="add">
<table id="list" width="100%"  cellpadding="0" cellspacing="0">
<tr><td width="8%" style="background:#919fb9;color:#fff;">序号</td><td width="8%" style="background:#919fb9;color:#fff;">ID</td><td  width="23%" style="background:#919fb9;color:#fff;text-align:left;padding-left:10px;">链接标题</td><td width="11%"  style="background:#919fb9;color:#fff;">链接分类</td><td width="13%" style="background:#919fb9;color:#fff;">开始时间</td><td width="13%" style="background:#919fb9;color:#fff;">结束时间</td><td width="8%" style="background:#919fb9;color:#fff;">状态</td><td width="8%" style="background:#919fb9;color:#fff;">上移</td> <td width="8%" style="background:#919fb9;color:#fff;">删除</td></tr>
<?php
	if(!empty($dbffe2)) {
		if($ol_set['get_ary']['pid']==0)$ol_set['get_ary']['pid']='';
		$temp=ol_getlinkpglist($dbffe2,'link',$ol_set['get_ary']['pid'],$ol_set['get_ary']['pg'],15);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
	}
	if(count($temp[0])>0) 
	$i_tmp=1;
	foreach($temp[0] as $ary){
		echo '<tr>';
		echo '<td>';
		if($i_tmp<10) echo '0';
		echo $i_tmp.'</td>';
		
		echo '<td>'.$ary['id'].'</td><td class="leftStyle"><a href="link_edit.php?id='.$ary['id'].'"> '.$ary['ltit'].'</a></td>';
		echo '<td ><a href="link_list.php?pid='.$ary['pid'].'">';
		if(count($temp_sort)>0) foreach($temp_sort as $ary_sort) {
			if($ary['pid']==$ary_sort['id']) echo $ary_sort['sname'];
		}
		echo '</a></td>';
		echo '<td >'.$ary['lstate'].'</a></td>';
		echo '<td >'.$ary['lstop'].'</a></td>';
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
		echo '<td class="icon"><a href="link_edit.php?id='.$ary['id'].'"><span style="background-position:0 -72px;"> </span></a></td>';
		echo '<td class="icon"><a href="link_del.php?refer=link_del&id='.$ary['id'].'" onclick="delcfm()"><span style="background-position:0 -26px;"> </span></a></td>';
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
		$vURL='link_list.php?';
		if($ol_set['get_ary']['pid']!='')$vURL=$vURL.'pid='.$ol_set['get_ary']['pid'];
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

<!--<a href="aaa" onclick="if(!window.confirm('确定删除不')) return false;">aaaaaaa</a>-->

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

function selchange(pid){
	window.location.href="link_list.php?pid="+pid;
}

 function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
</script>

</body>
</html>
