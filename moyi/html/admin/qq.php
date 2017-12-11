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
<title>qq抓取 - 用户管理</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;网站访客管理<!--<span style="float:right;"><a href="user_add.php" class="addStyle">增加新用户</a></span>--></div>
		<div id="form">
        <div class="add">
<div class="xintop2">
  <div class="xinnum"> <cite>总访客：<a href="#">7664</a> </cite> <cite>昨日访客数：<a href="#">182</a></cite> <cite>今日访客数：<a  href="">102</a></cite><span><a href="#" class="xinabtn">批量资料导出</a><a href="#" class="xinabtn">资料导出</a></span> </div>
  <table cellpadding="0" cellspacing="0" class="xinTable">
    <tr>
      <td width="6"></td>
      <td width="44">网站：</td>
      <td width="90"><select name="">
          <option>全部网站</option>
        </select></td>
      <td width="44">沟通：</td>
      <td width="90"><select name="">
          <option>全部</option>
          <option>沟通</option>
          <option>未沟通</option>
        </select></td>
      <td width="70">QQ号码：</td>
      <td width="101"><input name="" type="text" /></td>
      <td width="80">起止时间：</td>
      <td width="85"><input name="" type="text" /></td>
      <td width="10">-</td>
      <td width="90"><input name="" type="text" /></td>
      <td width="50"><input name="" type="button" value="提交" class="inputStyle3" /></td>
      <td width="6"></td>
    </tr>
  </table>
</div>
<table id="list" width="100%"  cellpadding="0" cellspacing="0" style="font-size:12px;">
  <tr>
    <td width="8%" style="background:#919fb9;color:#fff;"><input name="" type="checkbox" value="" style="width:15px;height:15px;" />
      选择</td>
    <td width="12%" style="background:#919fb9;color:#fff;text-align:left;padding-left:10px;">QQ号/昵称</td>
    <td width="12%"  style="background:#919fb9;color:#fff;">在线联系</td>
    <td width="8%"  style="background:#919fb9;color:#fff;">沟通</td>
    <td width="12%" style="background:#919fb9;color:#fff;">来源</td>
    <td width="12%"  style="background:#919fb9;color:#fff;">访问时间</td>
    <td width="12%" style="background:#919fb9;color:#fff;">访问记录</td>
    <td width="14%" style="background:#919fb9;color:#fff;">来访IP/所属地</td>
    <td width="8%" style="background:#919fb9;color:#fff;">操作</td>
  </tr>
  <tr>
    <td><input name="" type="checkbox" value="" style="width:15px;height:15px;" /></td>
    <td><p><a href="#"><b>989898989</b></a></p>
      <p>杭州维克会</p></td>
    <td><a href="#" class="xinabtn2" style="color:#fff;"><img src="images/qq.jpg"> qq交谈</a></td>
    <td><a href="#"><b>未沟通</b></a></td>
    <td><a href="#">http://www.vikihui.com</a></td>
    <td>2015-04-13 13:51:08</td>
    <td>共访问55次</td>
    <td><p>192.168.1.1</p>
      <p> 浙江省杭州市</p>
      <p> 电信</p></td>
    <td><a href="#"><b>发邮件</b></a></td>
  </tr>
  <tr>
    <td><input name="" type="checkbox" value="" style="width:15px;height:15px;" /></td>
    <td><p><a href="#"><b>989898989</b></a></p>
      <p>杭州维克会</p></td>
    <td><a href="#" class="xinabtn2" style="color:#fff;"><img src="images/qq.jpg"> qq交谈</a></td>
    <td><a href="#"><b>已沟通</b></a></td>
    <td><a href="#">http://www.vikihui.com</a></td>
    <td>2015-04-13 13:51:08</td>
    <td>共访问55次</td>
    <td><p>192.168.1.1</p>
      <p> 浙江省杭州市</p>
      <p> 电信</p></td>
    <td><a href="#"><b>发邮件</b></a></td>
  </tr>
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
