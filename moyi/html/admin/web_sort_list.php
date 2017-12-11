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
<title>在线管理后台 - 网站定义管理 - 网站栏目分类管理</title>
</head>

<body>
<?php if($ol_set['get_ary']['pid']==0 || $ol_set['get_ary']['pid']=='') $ol_set['get_ary']['pid']=1; ?>
<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">
        <span style="float:right; "><a href="web_sort_add.php<?php echo '?pid='.$ol_set['get_ary']['pid']; ?>" class="addStyle">增加新的网站栏目</a></span>
        &nbsp;&nbsp;&nbsp;&nbsp;网站栏目分类管理
<?php
	if($ol_set['get_ary']['pid']>1){
		echo '<a href="web_sort_list.php?pid=1" class="atyle">栏目根</a>';
		$temp=ol_getwebsorttorootlist($dblang,'sort',$ol_set['get_ary']['pid']);
		$i=0;
		$s_i=count($temp);
		if(count($temp)>0) foreach($temp as $ary){
			$i++;
			if($i==$s_i) echo ' > '.$ary['sname'].'('.$i.')';
				else echo ' > <a href="web_sort_list.php?pid='.$ary['id'].'">'.$ary['sname'].'</a>';
		}
	};
?>
        
        </div>
        
		<div id="form">
        <div class="add">
<?php
	if(empty($dbtpls)) echo '模板文件(WEBROOT\tpls\ffwbms_tpl.ffs)不存在.'; else{
		$temp_tpls=ol_gettplpagelist($dbtpls,'page');
		//echo '<pre>'; print_r($temp_tpls); echo '</pre><br />';
	}
?>
<table id="list" width="100%" cellpadding="0" cellspacing="0">
<tr><td width="5%" style="background:#919fb9;color:#fff;">序号</td><td width="5%" style="background:#919fb9;color:#fff;">ID</td><td width="20%" style="background:#919fb9;color:#fff;text-align:left;padding-left:10px;">栏目名称</td><td width="15%"  style="background:#919fb9;color:#fff;">所属分类</td><td width="15%"  style="background:#919fb9;color:#fff;">展现形式</td><td   width="8%"  style="background:#919fb9;color:#fff;padding-left:0;">上移</td><td   width="8%"    style="background:#919fb9;color:#fff;padding-left:0;">下移</td><td   width="8%"  style="background:#919fb9;color:#fff;padding-left:0;">状态</td><td  width="8%"   style="background:#919fb9;color:#fff;padding-left:0;">管理</td><td  width="8%"    style="background:#919fb9;color:#fff;padding-left:0;">删除</td></tr>
<?php
	if(!empty($dblang)) {
		$temp=ol_getwebsortlist($dblang,'sort',$ol_set['get_ary']['pid']);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
	}
	if(count($temp)>0)
	$i_tmp=1;
	 foreach($temp as $ary){
		echo '<tr>';
		echo '<td  class="tdstyle">';
		if($i_tmp<10) echo '0';
		echo $i_tmp.'</td>';
		
		echo '<td>'.$ary['id'].'</td><td class="leftStyle"><a href="web_sort_edit.php?id='.$ary['id'].'"> '.$ary['sname'].'</a></td>';
		echo '<td style="text-align:center;">';
		if(count($temp_tpls)>0) foreach($temp_tpls as $ary_tpls) {
			if($ary['spage']==$ary_tpls['fname']) echo $ary_tpls['pname'];
		}
		echo '</td>';
		switch (decbin($ary['styp'])) {
			case '00':
				echo '<td style="text-align:center;">无</a></td>';
				break;
			case '01':
				echo '<td style="text-align:center;">单页</a></td>';
				break;
			case '10':
				echo '<td style="text-align:center;">列表</a></td>';
				break;
			case '11':
				echo '<td style="text-align:center;">列表+单页</a></td>';
				break;
		}
		echo '<td class="icon"><a title="上移" href="javascript:;"><span style="background-position:0 -72px;"> </span></a></td>';
		echo '<td class="icon"><a title="下移" href="javascript:;"><span style="background-position:0 -94px;"> </span></a></td>';
		switch($ary['ifyn']){
			case 1:
				echo '<td class="icon"><a title="暂停" href="javascript:;"><span style="background-position:0 -49px;"> </span></a></td>';
				break;
			case 2:
				echo '<td class="icon"><a title="正常" href="javascript:;"><span style="background-position:0 -0px;"> </span></a></td>';
				break;
			default: //所有条件不满足时，默认返回
				echo '<td class="icon"><span style="background-position:0 16px;"> </span></td>';
		}
		echo '<td class="icon"><a title="管理子栏目" href="web_sort_list.php?pid='.$ary['id'].'"><span style="background-position:0 -116px;"> </span></a></td>';
		if($ary['subs']>0)
			echo '<td class="icon"><span style="background-image:none;"> </span></td>';
		else
			echo '<td class="icon"><a title="删除" href="web_sort_del.php?refer=web_sort_del&id='.$ary['id'].'&pid='.$ary['pid'].'"  onclick="delcfm()"><span style="background-position:0 -26px;"> </span></a></td>';
		echo '</tr>';
		$i_tmp++;
	}
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
?>

</table>
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
