<?php
/******************************************
论坛扩展 ff_bbs.ffs
******************************************/

/******************************************
获得一条记录的数据
参数：	$table = 表名
		$ = 字段集
		$ = 查询条件
返回：一条记录的数据
用法：$res = get_data();
******************************************/
function ffe4_($temp){
	return $temp;
}

/******************************************
获得论坛分类列表数组
参数：	$db = 表名
		$parary = 参数集
		[pid,top,ob]
返回：
id,pid,sname,snote
******************************************/
function ffe4_sort_list($db,$parary){
	if(!isDigit($parary['pid'])) $pid=1; else $pid=$parary['pid'];
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dbffe4']->getlist('sort',$wherestr,'',$top);
	return $temp;
}

/******************************************
获得获得指定分类号的值
参数：	$db = 表名
		$parary = 参数集
		[id]
返回：记录数据
id,pid,sname,sno,snote,ifyn
******************************************/
function ffe4_sort_getval($db,$parary){
	if(!isDigit($parary['get_ary']['id']))$id=0; else $id=$parary['get_ary']['id'];
	if($id==0)if(!isDigit($parary['id']))$id=0; else  $id=$parary['id'];
	if($id==0){
		$temp=-1;//分类号不能为空
	}else{
		$temp=$db['dbffe4']->getrecord('sort','(id='.$id.')','*');
		return $temp;
	}
}

/******************************************
增加论坛分类
参数：	$db = 表名
注意：	表单提交的内容放入info组中，
	例：<input name="info[aaa]" type="text" />
	分类名不能为空，为空时返回 -1 错
返回：
id,pid,sno,sname,snote,ifyn
******************************************/
function ffe4_sort_add($db,$parary){
	if(trim($parary['post_ary']['info']['sname'])==''){
		$temp=-1;//分类名不能为空
	}else{
		if(!isDigit($parary['post_ary']['info']['pid']))$parary['post_ary']['info']['pid']=0;
		if ($parary['post_ary']['info']['ifyn']!=2) $parary['post_ary']['info']['ifyn']=1;
		$updatedb['pid']=$parary['post_ary']['info']['pid'];
		$sno=$db['dbffe4']->query("select count(id) as rs from sort");
		$updatedb['sno']=$sno[0]["rs"]+1;;
		$updatedb['sname']=$parary['post_ary']['info']['sname'];
		$updatedb['snote']=$parary['post_ary']['info']['snote'];
		$updatedb['ifyn']=$parary['post_ary']['info']['ifyn'];
		$temp=$db['dbffe4']->execinsert('sort',$updatedb);
		unset($updatedb); //清空数组
		//$temp=$updatedb;
		//$temp=$parary['post_ary'];
	}
	return $temp;
}

/******************************************
编辑论坛分类
参数：	$db = 表名
注意：	表单提交的内容放入info组中，
	例：<input name="info[aaa]" type="text" />
	分类名不能为空，为空时返回 -1 错
返回：
id,pid,sname,snote,ifyn
******************************************/
function ffe4_sort_edit($db,$parary){
	if(!isDigit($parary['post_ary']['id']))$id=0; else $id=$parary['post_ary']['id'];
	if($id==0)if(!isDigit($parary['get_ary']['id']))$id=0; else $id=$parary['get_ary']['id'];
	if($id==0)if(!isDigit($parary['id']))$id=0; else  $id=$parary['id'];

	if($id==0){
		$temp=-2;//分类号不能为空
	}elseif(trim($parary['post_ary']['info']['sname'])==''){
		$temp=-1;//分类名不能为空
	}else{
		if(!isDigit($parary['post_ary']['info']['pid']))$parary['post_ary']['info']['pid']=0;
		if ($parary['post_ary']['info']['ifyn']!=2) $parary['post_ary']['info']['ifyn']=1;
		$updatedb['pid']=$parary['post_ary']['info']['pid'];
		$updatedb['sname']=$parary['post_ary']['info']['sname'];
		$updatedb['snote']=$parary['post_ary']['info']['snote'];
		$updatedb['ifyn']=$parary['post_ary']['info']['ifyn'];
		$temp=$db['dbffe4']->execupdate('sort',$updatedb,'(id='.$id.')');
		unset($updatedb); //清空数组
	}
	return $temp;
}

/******************************************
删除论坛分类
参数：
注意：
返回：
******************************************/
function ffe4_sort_del($db,$parary){
	if(!isDigit($parary['post_ary']['id']))$id=0; else $id=$parary['post_ary']['id'];
	if($id==0)if(!isDigit($parary['get_ary']['id']))$id=0; else $id=$parary['get_ary']['id'];

	if($id==0){
		$temp=-1;//分类名不能为空
	}else{
		$ri=0;
		$temp=$db['dbffe4']->getrecord('sort','(id='.$id.')','sno');//获得此分类号的排序号
		$sno=$temp['sno'];
		$temp=$db['dbffe4']->query('UPDATE sort SET sno=(sno-1) WHERE (sno>'.$sno.')');//小于此分类号排序号的所有记录，排序号-1
		$ri+=$temp;
		$temp=$db['dbffe4']->query('UPDATE art SET ifyn=0 WHERE (pid='.$id.')');//删除此分类号下的所有文章
		$ri+=$temp;
		$temp=$db['dbffe4']->query('UPDATE art SET ifyn=0 WHERE (id='.$id.')');//删除此分类
		$$temp=$ri+$temp;
/**/
	}
	return $temp;
}

/******************************************
获得帖子TOP列表
参数：pid=所属分类号
     top=取前X条数据，为空或为0时使用默认值20
	 ob=排序方式，z=正序，其它=倒序，默认为倒序
	 ts=是否遍历子分类,1=是，其它=否，默认为否
注意：
返回：
******************************************/
function ffe4_art_toplist($db,$parary){
	//顺序：参数，URL参数
	if(!isDigit($parary['pid']))$pid=0; else $pid=$parary['pid'];
	if($pid==0)if(!isDigit($parary['get_ary']['pid']))$pid=0; else $id=$parary['get_ary']['pid'];
	if($parary['top']==""||$parary['top']==0) $top=20; else $top=$parary['top'];
	if($parary['ob']=="z") $ob="ORDER BY id "; else $ob="ORDER BY id DESC"; 
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dbffe1']->getlist('msg',$wherestr,'id,uid,pid,mtit,mtxt,fbdt,sta3,sta5,sta6,sta7,sta8',$top,$ob);
	if($pid==0){
		$temp=-1;//分类名不能为空
	}else{
		$temp=$db['dbffe4']->query('UPDATE art SET ifyn=0 WHERE (id='.$id.')');//删除此分类
		$$temp=$ri+$temp;
/**/
	}
	return $temp;
}





/******************************************
******************************************/

?>