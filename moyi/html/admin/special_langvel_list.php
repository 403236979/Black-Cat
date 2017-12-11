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
<title>在线管理后台 - 网站特殊管理 - 页面字符串和图片设置 - 列表</title>
</head>

<body>
<?php
	if(!empty($dbtpls)&&!empty($dblang)) {
		$temp=ol_getweblangval($dbtpls,$dblang,$ol_set['get_ary']['id']);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
/*
Array
(
    [fname] => wzlist
    [pname] => 列表
    [langset] => Array
        (
            [0] => Array
                (
                    [lname] => logo
                    [lnote] => LOGO图片地址
                )

        )

)
/**/
	}
?>
<div id="mainDiv">
	<div id="centerDiv">
	
	<div id="right"> 
		<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;页面字符串和图片设置管理 - <?php echo $temp['pname'];?>页（<?php echo $temp['fname'];?>.html）:</div>
		<div id="form">
<div class="add">
<table id="list" width="100%" cellpadding="0" cellspacing="0">

<?php
	if(count($temp['langset'])>0) foreach($temp['langset'] as $ary){
		echo '<tr><td>';
		echo ''.$ary['lname'].' - '.$ary['lnote'].'</td> ';
		echo '<td><form action="" method="post">';
		echo '<input name="act" type="hidden" value="special_langvel_edit" />';
		echo '<input type="hidden" id="pid" name="info[pid]" value="'.$ol_set['get_ary']['id'].'" />';
		echo '<input type="hidden" id="id" name="info[id]" value="'.$ary['v_id'].'" />';
		echo '<input type="hidden" id="lid" name="info[lid]" value="'.$temp['fname'].'" />';
		echo '<input type="hidden" id="sid" name="info[sid]" value="'.$ary['lname'].'" />';
		echo '<input type="text" id="lval" name="info[lval]" size="60" value="'.$ary['v_lval'].'" /></td>';
		echo '<td><input type="submit" class="inputStyle2" value="修改">';
		echo '</form>';
		echo '</td></tr>';

	}
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
	
	
	/* 当鼠标在表格上移动时，离开的那一行背景恢复 */
	$("#list tr td").mouseout(function(){
		var bgc = $(this).parent().attr("bg");
		$(this).parent().find("td").css("background-color",bgc);
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
