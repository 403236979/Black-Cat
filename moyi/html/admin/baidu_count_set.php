<?php 
require_once('extend_manager.php');

if($_POST){
	sys_seting_baidu_set($_POST["info"]["lfree"]);
}

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
<title>在线管理后台 - 系统管理 - 百度统计代码设置</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
		<div id="right"> 
			<div id="current">&nbsp;&nbsp;&nbsp;&nbsp;系统管理 - 百度统计代码设置</div>
			<div id="form">
				<form action="baidu_count_set.php" method="post">
					<input type="hidden" value="1act" name="act" />
					<fieldset>
						<div class="ceng">
							<label for="lfree">百度统计代码:</label>
							<textarea name="info[lfree]" id="lfree" style="width:80%;height:100px;"  ><?php $result = sys_reader_baidu_set(); echo  trim($result); ?></textarea><br />
							<center class="center5">
								<input type="button" value="提交" id="action" name="action" onclick="this.form.submit()" />&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="reset" value="清空" id="reset" name="reset" />
							</center>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>

