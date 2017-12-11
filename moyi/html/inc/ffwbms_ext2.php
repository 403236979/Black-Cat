<?php
/******************************************
友情链接扩展 ff_flink.ffs
******************************************/

/******************************************
获得一条记录的数据
参数：	$table = 表名
		$ = 字段集
		$ = 查询条件
返回：一条记录的数据
用法：$res = get_data();
******************************************/
function ffe2_($temp){
	return $temp;
}

/******************************************
获得友情链接分类列表数组
参数：	$db = 表名
		$parary = 参数集
		[pid,top,ob]
返回：
<!--{ffwbms ffe2_sort_list,vtemp,''}-->
<!--{ffwbms_see $vtemp }-->
******************************************/
function ffe2_sort_list($db,$parary){
	if($parary['pid']=="") $pid=0; else $pid=$parary['pid'];
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	if($parary['ob']=="f") $ob="ORDER BY sno DESC"; else $ob="ORDER BY sno "; 
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dbffe2']->getlist('sort',$wherestr,'id,pid,sname,snote,tkun,tgao,sta1,sta2,sta3,sta4',$top,$ob);
	return $temp;
}

/******************************************
获得友情链接TOP列表数组
参数：	$db = 表名
		$parary = 参数集
		[pid,top,ob]
返回：
<!--{ffwbms ffe2_link_list,vtemp,''}-->
<!--{ffwbms_see $vtemp }-->
******************************************/
function ffe2_link_toplist($db,$parary){
	if(!isDigit($parary['pid'])) $pid=0; else $pid=$parary['pid'];
	if($pid==0) return ; else {
		if(!isDigit($parary['top'])||$parary['top']==0) $top=""; else $top=$parary['top'];
		if($parary['ob']=="f") $ob="ORDER BY id DESC"; else $ob="ORDER BY id "; 
		$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
		$temp=$db['dbffe2']->getlist('link',$wherestr,'id,pid,ltit,lurl,llogo,llogoimg,ifimg,lhint',$top,$ob);
		return $temp;
	}
}

/******************************************
获得友情链接分页列表数组
参数：$db = 表名
	$parary = 参数集
		pid：必选项，指定分类号，为空或为0时，返回空
		pg：可选，要显示的页数，为空或为0时，显示第一页
		ps：可选，每页要显示的记录数，为空或为0时，记录数为10
		os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
		ob：可选，f=倒序，其它=正序
返回：
<!--{ffwbms ffe2_link_list,vtemp,''}-->
<!--{ffwbms_see $vtemp }-->
******************************************/
function ffe2_link_pglist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$wherestr="(ifyn=2) AND (pid=".$parary['pid'].")";
		$colums='id,pid,ltit,lurl,llogo,llogoimg,ifimg,lhint';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=10;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		if($parary['ob']=="f") $obstr="ORDER BY id DESC"; else $obstr="ORDER BY id "; 
		$temp=$db['dbffe2']->getpglist("link",$wherestr,$colums,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
}


/******************************************
获得友情链接分类
获得友情链接列表
获得友情链接分页列表
******************************************/


?>