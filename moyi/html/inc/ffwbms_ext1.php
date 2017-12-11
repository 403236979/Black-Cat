<?php
/******************************************
留言扩展 ff_message.ffs $dbffe1
******************************************/

/******************************************
获得一条记录的数据
参数：	$table = 表名
		$ = 字段集
		$ = 查询条件
返回：一条记录的数据
用法：$res = get_data();
******************************************/
function ffe1_($temp){
	return $temp;
}

/******************************************
获得留言分类列表数组
参数：	$db = 表名
		$parary = 参数集
		[pid,top,ob]
返回：
******************************************/
function ffe1_sort_list($db,$parary){
	if($parary['pid']=="") $pid=0; else $pid=$parary['pid'];
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	if($parary['ob']=="f") $ob="ORDER BY sno DESC"; else $ob="ORDER BY sno "; 
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dbffe1']->getlist('sort',$wherestr,'id,pid,sname,sta1,sta2,sta3,sta4',$top,$ob);
	return $temp;
}

/******************************************
发布留言
参数：	$db = 表名
注意：	表单提交的内容放入info组中，
	例：<input name="info[aaa]" type="text" value="aaaaaa" />
	标题不能为空，为空时返回 -1 错
返回：
******************************************/
function ffe1_msg_refer($db,$parary){
	if(trim($parary['post_ary']['info']['mtit'])==''){
		$temp=-11011;//标题不能为空
	}else{
		if(!isDigit($parary['post_ary']['info']['uid']))$parary['post_ary']['info']['uid']=0;
		if(!isDigit($parary['post_ary']['info']['pid'])||$parary['post_ary']['info']['pid']==0)$parary['post_ary']['info']['pid']=1;
		if(!isDigit($parary['post_ary']['info']['raid']))$parary['post_ary']['info']['raid']=0;
/*		//$updatedb['id']="null";
		if(count($parary['post_ary']['info'])>0){
			foreach($parary['post_ary']['info'] as $k => $v)
				if($v!='')
					$updatedb[$k]=$v;
		}
/**/
		if($parary['post_ary']['info']['uid']!='')
			$updatedb['uid']=$parary['post_ary']['info']['uid'];
		if($parary['post_ary']['info']['pid']!='')
			$updatedb['pid']=$parary['post_ary']['info']['pid'];
		if($parary['post_ary']['info']['raid']!='')
			$updatedb['raid']=$parary['post_ary']['info']['raid'];
		if($parary['post_ary']['info']['mtit']!='')
			$updatedb['mtit']=$parary['post_ary']['info']['mtit'];
		if($parary['post_ary']['info']['mail']!='')
			$updatedb['mail']=$parary['post_ary']['info']['mail'];
		if($parary['post_ary']['info']['mobi']!='')
			$updatedb['mobi']=$parary['post_ary']['info']['mobi'];
		if($parary['post_ary']['info']['danw']!='')
			$updatedb['danw']=$parary['post_ary']['info']['danw'];
		if($parary['post_ary']['info']['xinm']!='')
			$updatedb['xinm']=$parary['post_ary']['info']['xinm'];
		if($parary['post_ary']['info']['mtxt']!='')
			$updatedb['mtxt']=$parary['post_ary']['info']['mtxt'];
		if($parary['post_ary']['info']['sta6']!='')
			$updatedb['sta6']=$parary['post_ary']['info']['sta6'];
		if($parary['post_ary']['info']['sta7']!='')
			$updatedb['sta7']=$parary['post_ary']['info']['sta7'];
		if($parary['post_ary']['info']['sta8']!='')
			$updatedb['sta8']=$parary['post_ary']['info']['sta8'];
		$updatedb['fbdt']=date('Y-m-d H:i:s',time()); //当前日期时间,定义时区（date_default_timezone_set('Asia/Shanghai');）
		$updatedb['sta3']=get_user_IP();//留言IP
		$updatedb['ifyn']=1;//是否可用
		$temp=$db['dbffe1']->execinsert('msg',$updatedb);
		//$temp=$updatedb;
		unset($updatedb); //清空数组
	}
/**/
	return $temp;
}

/******************************************
获得留言列表数组
参数：	$db = 表名
		$parary = 参数集
		[pid,top,ob]
ob：可选，f=倒序，其它=正序
返回：
******************************************/
function ffe1_msg_list($db,$parary){
	if(!isDigit($parary['pid'])||$parary['pid']==0) $wherestr="(ifyn=2) AND (raid=0) ";
		else $wherestr="(ifyn=2) AND (raid=0) AND (pid=".$pid.") ";
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	if($parary['ob']=="f") $ob="ORDER BY id DESC"; else $ob="ORDER BY id "; 
	$colums='id,uid,pid,xinm,mtit,mtxt,fbdt,sta3,sta5,sta6,sta7,sta8';
	$temp=$db['dbffe1']->getlist('msg',$wherestr,$colums,$top,$ob);
	$temp=$db['dbffe1']->getlist('msg',$wherestr,'*',$top,$ob);
	for($i=0;$i<count($temp);$i++){
		$temp[$i]['redb']=$db['dbffe1']->getrecord("msg","(raid=".$temp[$i]['id'].")",$colums);
	}
	return $temp;
}

/******************************************
获得留言分页列表
pid：必选项，指定分类号，为空或为0时，返回空
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为10
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
ob：可选，f=倒序，其它=正序
******************************************/
function ffe1_msg_pglist($db,$parary){
	//if($parary['pid']==""||$parary['pid']==0) return ; else {
		if($parary['pid']==""||$parary['pid']==0) $wherestr="(ifyn=2) AND (raid=0) ";
			else $wherestr="(ifyn=2) AND (raid=0) AND (pid=".$parary['pid'].") ";
		$colums='id,uid,pid,raid,xinm,mtit,mtxt,fbdt,sta3,sta5,sta6,sta7,sta8';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=10;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		if($parary['ob']=="f") $obstr="ORDER BY id DESC"; else $obstr="ORDER BY id "; 
		$temp=$db['dbffe1']->getpglist("msg",$wherestr,$colums,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		for($i=0;$i<count($temp[0]);$i++){
			$temp[0][$i]['redb']=$db['dbffe1']->getrecord("msg","(raid=".$temp[0][$i]['id'].")",$colums);
		}
//echo'<pre>'; print_r($temp); echo'</pre>'; die();
		return $temp;
	//}/**/
}

/******************************************
留言回复
参数：	$db = 表名
注意：	表单提交的内容放入info组中，
	例：<input name="info[aaa]" type="text" value="aaaaaa" />
	标题不能为空，为空时返回 -1 错
返回：
******************************************/
function ffe1_msg_reply($db,$parary){
	if(trim($parary['post_ary']['info']['mtit'])==''){
		$temp=-1;//标题不能为空
	}else{
		if(!isDigit($parary['post_ary']['info']['raid']))$parary['post_ary']['info']['raid']=0;
		//$updatedb['id']="null";
		if(count($parary['post_ary']['info'])>0){
			foreach($parary['post_ary']['info'] as $k => $v)
				if($v!='')
					$updatedb[$k]=$v;
		}
		//$temp=$db['dbffe1']->execinsert('msg',$updatedb);
		unset($updatedb); //清空数组
		//$temp=$updatedb;
	}
	return $temp;
}
/******************************************
获得指定留言号的数据
id：必选项，指定留言号，为空或为0时，返回空
******************************************/
function ffe1_msg_db($db,$parary){
	if($parary['id']==""||$parary['id']==0) return ; else {
		$wherestr="(id=".$parary['id'].")";
		$temp=$db['dbffe1']->getrecord("msg",$wherestr);
		//$temp=ol_getmessdb($dbffe1,'msg',$wherestr);

		$upf_file='';
		$dir=$_SERVER['DOCUMENT_ROOT']."/upfiles/messupf";
		$handle=opendir($dir.".");
		while (false !== ($file = readdir($handle))){
		if ($file != "." && $file != "..") {
		if(strstr($file,'upf_'.$_GET['id'].'.')){
		$upf_file = $file;break;}}}closedir($handle);
		$temp['messimg']=$wset_ary["upload_path"].'messupf/'.$upf_file;
		return $temp;
	}
}

/******************************************
获得登录用户回复贴子分页列表
参数：$db = 表名
	$parary = 参数集
		id：必选项，指定分类号，为空或为0时，返回空
		pg：可选，要显示的页数，为空或为0时，显示第一页
		ps：可选，每页要显示的记录数，为空或为0时，记录数为20
		os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
		ob：可选，排序设置，z=正序，其它=默认倒序
id,uid,fdt,fip,reid,typ,tit,timg,txt1,txt2,t2e1,t2e2,sta1,sta2,sta3,sta4,sta5,sta6,mg1,mg2,mg3,mg4,bcon,lruid,lrdt,ifyn
返回：
******************************************/
function yy1_user_msg_pglist($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能获得回复列表，请登录后再进行操作';
	}else{
		$id=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$pid_where="";
		if(!empty($parary["pid"])){
		$pid_where=" and pid =$parary[pid] ";
		}
		$temp=$db['dbffe1']->getpglist(" msg "," sta8='$id' ".$pid_where," * ",$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		for($i=0;$i<count($temp[0]);$i++){
        			$temp[0][$i]['redb']=$db['dbffe1']->getrecord("msg","(raid=".$temp[0][$i]['id'].")",$colums);
        		}
		return $temp;
	}/**/
	return $temp;
}




/******************************************
获得留言分类
发表留言
获得留言列表
获得留言分页列表
******************************************/

?>