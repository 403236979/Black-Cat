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
<link href="images/menu.css" rel="stylesheet" type="text/css">
<script language="javascript" src="images/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<title>后台模板页</title>
</head>

<body>

<div id="mainDiv">
	<div id="centerDiv">
     <div id="left" >


<?php
	//echo '<pre>'; print_r($ol_set['cookie_ary']['cookie']['ol']['s2']); echo '</pre><br />';
	$ck_utype=ffStrDE(ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s2'], $ol_set['wset_ary']["cookie_pwd"]), $ol_set['wset_ary']["cookie_pwd"]);
	$tmp_utype='';
//echo $ck_utype;
	for($i=0;$i<21;$i++){
		$tmp_utype[$i]=substr($ck_utype,$i,1);
	}
	//echo '<pre>'; print_r(ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s7'], $ol_set['wset_ary']["cookie_pwd"])); echo '</pre><br />';
?>

<script language="javascript">
$(document).ready(function(){ 
	$(".sub").hide(); 
	
	$("li a").click(function(){
		$(this).next('.sub').toggle(500);
	});

}); 
function showsub(pid){
	//alert($("#act"+pid).attr("class"));
	if($("#sub"+pid).html()==''||$("#sub"+pid).html()=='OK'){$("#sub"+pid).load('ajaxs.php?act=getsubsortlist&id='+pid);};
	if($("#act"+pid).attr("class")=='open'){$("#act"+pid).attr("class","close");}else{$("#act"+pid).attr("class","open");};
	//$(window).height($("#left").height());
}
</script>

	<ul>
<?php if($tmp_utype[6]==1){ ?>
	<li><a href="javascript:;"  class="inactive"><img src="images/left1.png" />系统管理</a>
		<ul class="sub">
		<!--li ><a href="web_sys_set.php" target="work">参数设置</a></li-->
		<li ><a href="web_lang_list.php" target="work">网站语种管理</a></li>
		<li ><a href="web_set.php" target="work">网站设置</a></li>
		<li ><a href="web_mail_set.php" target="work">邮件服务器设置</a></li>
		<li ><a href="baidu_count_set.php" target="work">百度统计代码设置</a></li>
		<!--li ><a href="javascript:;" target="work">域名管理</a></li-->
        <!--li ><a href="javascript:;" target="work">主机管理</a></li-->
        <!--li><a href="javascript:;">在线FTP</a></li-->
        </ul>
    </li>
<?php } ?>


<?php if($tmp_utype[7]==1000){ ?>
	<li><a href="javascript:;"  class="inactive"><img src="images/left2.png" />模板管理</a>
		<ul class="sub">
		<li ><a href="web_sys_set.php" target="work">已购模板</a></li>
		<!--li ><a href="web_set.php" target="work">模板市场</a></li-->
        </ul>
    </li>
<?php } ?>

<?php if($tmp_utype[2]==1){ ?>
<li ><a href="web_sort_list.php" target="work"  class="inactive"><img src="images/left3.png" />栏目管理</a></li>
<?php } ?>

<?php if($tmp_utype[3]==1){ ?>
	<li><a href="#"  class="inactive"><img src="images/left4.png" />文章管理</a>
		<ul class="sub">
<?php
	$temp=ol_getsortlist($dblang,'sort',1);
	//echo '<pre>'; print_r($temp); echo '</pre><br />';
	foreach ($temp as $ary) { //循环输出
		echo '<li>';
		if($ary['styp']==0) echo '<a ';
		if($ary['styp']==1) echo '<a href="web_art_page.php?id='.$ary['id'].'" target="work"';
		if($ary['styp']==2) echo '<a href="web_art_pglist.php?pid='.$ary['id'].'" target="work"';
		if($ary['styp']==3) echo '<a href="web_art_pagelist.php?pid='.$ary['id'].'" target="work"';
		if($ary['ifyn']==1) echo 'style="color:#F00"';
		echo '>'.$ary['sname'].'</a>';
		if($ary['subs']>0) echo '<a id="act'.$ary['id'].'" class="open" href="javascript:;" onclick="showsub('.$ary['id'].')"> </a>'; else echo '<a class="none" href="javascript:;"> </a>';
		echo '<ul class="sub" id="sub'.$ary['id'].'">';
		echo '</ul>';
		echo '</li>';
	}
?>
        </ul>
	</li>
<?php } ?>
    
<?php if($tmp_utype[4]==1){ ?>
	<li><a href="web_img_pglist.php" target="work"  class="inactive"><img src="images/left5.png" />附件管理</a></li>
<?php } ?>

<?php if($tmp_utype[5]==1){ ?>
<li><a href="javascript:;"  class="inactive"><img src="images/left4.png" />特殊页面</a>
		<ul class="sub">
		<!--li ><a href="special_lang_select.php" target="work">选择管理语种</a></li-->
		<li ><a href="javascript:;" target="work">页面字符串和图片设置</a>
			<ul class="sub">
				<li><a href="special_langvel_list.php?id=0" target="work">通用标识</a></li>
<?php
	if(!empty($dbtpls)) {
		$temp=ol_gettplspagelist($dbtpls);
		//echo '<pre>'; print_r($temp); echo '</pre><br />';
		if(count($temp)>0) foreach ($temp as $ary) { //循环输出
			echo '<li>';
			echo '<a href="special_langvel_list.php?id='.$ary['id'].'" target="work">'.$ary['pname'].'</a>';
			echo '</li>';
		}
	}
?>
	        </ul>
        </li>
		<li ><a href="special_page_list.php" target="work">特殊功能</a>
        <!--ul  class="sub"-->
        <!--li><a href="#">在线客服</a></li-->
        <!--li><a href="#">统计代码</a></li-->
        <!--/ul-->
        </li>
       
        </ul>
    </li>
<?php } ?>

<?php if($tmp_utype[12]==1){ ?>
	<li><a href="javascript:;"  class="inactive"><img src="images/left6.png" />友情链接</a>
		<ul class="sub">
		<li ><a href="link_sort_list.php" target="work">分类管理</a></li>
		<li ><a href="link_list.php" target="work">友情链接管理</a></li>
        </ul>
    </li>
<?php } ?>

<?php if($tmp_utype[10]==1){ ?>
	<li><a href="javascript:;"  class="inactive"><img src="images/left7.png" />留言管理</a>
		<ul class="sub">
		<li ><a href="mess_sort_list.php" target="work">留言分类管理</a></li>
		<li ><a href="mess_list.php" target="work">留言管理</a></li>
        </ul>
    </li>
<?php } ?>




<!--
<?php if($tmp_utype[15]==1){ ?>
	<li><a href="javascript:;"  class="inactive"><img src="images/left10.png" />论坛管理</a>
		<ul class="sub">
		<?php if($tmp_utype[13]==1){ ?>
		<li ><a href="bbs_sort_list.php" target="work">版块管理</a></li>
		<li ><a href="bbs_art_list.php" target="work">帖子管理</a></li>
		<?php } ?>
        </ul>
    </li>
<?php } ?>
-->
<?php if($tmp_utype[19]==1){ ?>
	<li><a href="javascript:;" target="work" class="inactive"><img src="images/left11.png" />用户管理</a>
    	<ul class="sub">
		<li ><a href="user_list.php" target="work">用户设置</a></li>
		<li><a href="user_changepwd.php" target="work"  >修改登录密码</a></li>
        </ul>
    </li>
<?php } ?>


<?php if($tmp_utype[20]==1){ ?>
	<li><a href="javascript:;"  class="inactive"><img src="images/left12.png" />数据管理</a>
		<ul class="sub">
		<li ><a href="site_db_backup.php" target="work">网站数据备份</a></li>
		<li ><a href="site_db_recovery.php" target="work">网站数据恢复</a></li>
		<li ><a href="site_db_zip_down.php" target="work">数据压缩下载</a></li>
		<li ><a href="site_db_zip_up.php" target="work">压缩包上传解压</a></li>
        </ul>
    </li>
<?php } ?>

<?php if($tmp_utype[11]==1){ ?>
	<li><a href="mess_user_list.php" target="work"><img src="images/left13.png" />留言回复管理<?php /*指定用户*/ ?></a></li>
	<li><a href="user_changepwd.php" target="work"><img src="images/left2.png" />修改登录密码</a></li>
<?php } ?>

	
	</div>

</div>
</div>

<script type="text/javascript">
$("#left").niceScroll({  
	cursorcolor:"#142D50",
	cursoropacitymax:1,  
	touchbehavior:false,  
	cursorwidth:"8px",
	cursorborder:"0",  
	cursorborderradius:"5px"  
}); 
</script>


 

</body>
</html>
