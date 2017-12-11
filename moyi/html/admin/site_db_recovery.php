<?php 
require_once('func.php');
require_once('acts.php');
require_once('ffwbms_filefuncs.php');
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
<title>在线管理后台- 备份恢复管理 - 网站数据恢复 - 列表</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站数据恢复</div>
		<div id="form">
<div class="add">
<table id="list" width="100%" cellpadding="0" cellspacing="0">
<tr><td class="tdstyle" style="background:#919fb9;color:#fff;">序号</td><td style="background:#919fb9;color:#fff;">备份数据</td><td width="8%"  style="background:#919fb9;color:#fff;">恢复</td><td width="8%"  style="background:#919fb9;color:#fff;"></td><td width="8%" style="background:#919fb9;color:#fff;">删除</td></tr>

<?php
$sdir=$_SERVER["DOCUMENT_ROOT"].'/backup'; //网站根
$temp=getDir($sdir);
$temps=0;
for($i=0;$i<count($temp);$i++){
	if($temp[$i]!='') $temps++;
}
	if($temps>0){
		$i_tmp=1;
		foreach($temp as $val){
			echo '<tr>';
			echo '<td  class="tdstyle">';
			if($i_tmp<10) echo '0';
			echo $i_tmp.'</td>';
			echo '<td>'.$val.'</td>';
			echo '<td class="icon"><a href="site_db_recovery_rec.php?dir='.$val.'" title="恢复"><span style="background-position:0 -72px;"> </span></a></td>';
			echo '<td class="icon"><span style="background-image:none;"></span></td>';
			echo '<td class="icon"><a href="site_db_recovery_del.php?dir='.$val.'" title="删除 "><span style="background-position:0 -26px;"> </span></a></td>';
			echo '</tr>';
			$i_tmp++;
		}
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
</script>

</body>
</html>
