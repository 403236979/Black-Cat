<?php
if(f_f_y_z!='bj') if(f_f_y_z!='o') die();
//echo f_f_y_z."\n<br />";
/******************************************
基本数据扩展
******************************************/
/******************************************
获得一条记录的数据
参数：	$table = 表名
		$ = 字段集
		$ = 查询条件
返回：一条记录的数据
用法：$res = get_data();
******************************************/

/******************************************
URL尾部显示一个随机URL尾部字符串
******************************************/
function ffa_randomtail(){
	$str = randStr(5);
	$temp['ffwbms_re_value']='&'.$str.'.html';
	$temp['ffwbms_re_echo']='ffwbms_re_echo';
	return $temp;
}

/******************************************
获得语种数据列表数组
参数：	$db = 表名
		$parary = 参数集
返回：
******************************************/
function ffa_lang_list($db,$parary){
	//$temp=$db['dbbase']->getlist('lang','','id,cname,ename,sname,eab,limg');
	$temp=$db['dbbase']->getlist('lang','','id,cname,ename,sname,eab');
	for ($i=0;$i<count($temp);$i++){
		$temp[$i]["cname"]=DeleteIdentifier($temp[$i]["cname"]);
		$temp[$i]["ename"]=DeleteIdentifier($temp[$i]["ename"]);
		$temp[$i]["sname"]=DeleteIdentifier($temp[$i]["sname"]);
	}
	return $temp;
}

/******************************************
URL中显示语种参数
******************************************/
function ffa_lang_url($db,$parary){
	$temp['ffwbms_re_value']='&lang='.$parary['lang'];
	$temp['ffwbms_re_echo']='ffwbms_re_echo';
	return $temp;
}


/******************************************
获得分类列表
******************************************/
function ffa_sort_list($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) $pid=1; else $pid=$parary['pid'];
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	if($parary['ob']=="f") $ob="ORDER BY sno DESC"; else $ob="ORDER BY sno "; 
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dblang']->getlist('sort',$wherestr,'id,pid,sname,mname,spage,spwd,sart,sta1,sta2,styp',$top,$ob);
	return $temp;
}

/******************************************
获得分类分页列表
pid：可选，父分类号，为空或为0时，列根分类
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为20
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
******************************************/
function ffa_sort_pglist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) $pid=1; else $pid=$parary['pid'];
	if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
	if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
	if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
	if($parary['ob']=="f") $ob="ORDER BY sno DESC"; else $ob="ORDER BY sno "; 
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$colums='id,pid,sname,mname,spage,spwd,sart,sta1,sta2,styp';
	$temp=$db['dblang']->getpglist("sort",$wherestr,$colums,$ob,$parary['pg'],$parary['ps'],$parary['os']);
	return $temp;
}

/******************************************
获得分类列表(含子分类)
******************************************/
function ffa_sort_slist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) $pid=1; else $pid=$parary['pid'];
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	if($parary['ob']=="f") $ob="ORDER BY sno DESC"; else $ob="ORDER BY sno "; 
	$wherestr="(ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dblang']->getlist('sort',$wherestr,'id,pid,sname,mname,spage,spwd,sart,sta1,sta2,styp',$top,$ob);
	for ($i=0;$i<count($temp);$i++){
		$wherestr="(ifyn=2) AND (pid=".$temp[$i]['id'].")"; 
		$stmp_sub=$db['dblang']->getlist('sort',$wherestr,'id,pid,sname,mname,spage,spwd,sart,sta1,sta2,styp',$top,$ob);
		$temp[$i]['subsort']=$stmp_sub;
	}
	return $temp;
}

/******************************************
获得分类列表(遍历子分类)
******************************************/
function ffa_sort_aslist($db,$parary){
	//回调函数遍历生成数组
	if(!function_exists('callbackergodic1')){
		function callbackergodic1($p0,$p1,$p2,$p3,$p4,$p5){
			$wherestr="(ifyn=2) AND (pid=".$p2.")";
			$rss=$p0->getlist($p1,$wherestr,$p3,$p4,$p5);
			for ($i=0;$i<count($rss);$i++){
				$rss[$i]['subsort']=callbackergodic1($p0,$p1,$rss[$i]['id'],$p3,$p4,$p5);
			}
			return $rss;
		}
	}//回调函数遍历生成数组结束
	if($parary['pid']==""||$parary['pid']==0) $pid=1; else $pid=$parary['pid'];
	if (isset($parary['top'])){ if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top']; } else $top='';
	if (isset($parary['ob'])){ if($parary['ob']=="f") $ob="ORDER BY sno DESC"; else $ob="ORDER BY sno "; } else $ob="ORDER BY sno "; 
	$dbc=$db['dblang'];
	$temp="";//回调函数用返回值
	$temp=callbackergodic1($dbc,'sort',$pid,'id,pid,sname,mname,spage,spwd,sart,sta1,sta2,styp',$top,$ob);
	return $temp;
}

/******************************************
获得指定分类至根的数组
******************************************/
function ffa_sort_reroot($db,$parary){
	if($parary['id']==""||$parary['id']==0) return ; else {
		$id=$parary['id'];
		do{
			$wherestr="(id=".$id.")";
			$rss=$db['dblang']->getrecord("sort",$wherestr,"id,pid,sname,mname,sart,spage");
			$id=$rss["pid"];
			$reroot[]=$rss;
		}while($id>1);//do...while 语句会至少执行一次代码 - 然后，只要条件成立，就会重复进行循环。
		$temp=array_reverse($reroot);//数组倒序
		return $temp;
	}
}

/******************************************
获得指定分类号的数据
id：必选项，指定分类号，为空或为0时，返回空
******************************************/
function ffa_sort_db($db,$parary){
	if($parary['id']==""||$parary['id']==0) return ; else {
		$wherestr="(id=".$parary['id'].")";
		$temp=$db['dblang']->getrecord("sort",$wherestr);
		$tmp=$db['dblang']->getrecord("art",'(atyp=2) AND (id='.$temp['sart'].')','timg,keys,abs,atxt');
		$temp['timg']=$tmp['timg'];
		$temp['keys']=$tmp['keys'];
		$temp['abs']=$tmp['abs'];
		$temp['atxt']=$tmp['atxt'];
		return $temp;
	}
}

/******************************************
显示指定分类号的文章数据
id：必选项，指定分类号，为空或为0时，返回空
noshow：可选项，是否直接输出显示，为1时不直接输出显示返回数据，其它为直接输出显示，默认为0
******************************************/
function ffa_sort_art($db,$parary){
	if($parary['id']==""||$parary['id']==0) return ; else {
		$wherestr="(id=".$parary['id'].")";
		$temp=$db['dblang']->getrecord("sort",$wherestr,'sart');
		$temp=$db['dblang']->getrecord("art",'(atyp=2) AND (id='.$temp['sart'].')','atxt');
		if($parary['noshow']==1) return $temp['atxt']; else {
			$ntemp['ffwbms_re_value']=$temp['atxt'];
			$ntemp['ffwbms_re_echo']='ffwbms_re_echo';//直接输出显示标志
			return $ntemp;
		}
	}
}

/******************************************
获得文章列表
pid：必选项，指定分类号，为空或为0时，返回空
top：可选，前X条记录，为空或为0时，列全部记录
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
        9=随机，随机时置顶无效
zd：可选，先列置顶，为1时先列置顶文章，置顶文章不占列表数，为空或其它时不列置顶文章
******************************************/
function ffa_art_toplist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			case 9: $obstr="ORDER BY RANDOM () "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (pid=".$parary['pid'].") AND (indt>='".$currdate."')";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['zd']==1){
			$zdwherestr=$wherestr." AND ((sta1=1) OR (sta1=3))";
			$tmp1=$db['dblang']->getlist("art",$zdwherestr,$colums,'',$obstr);
			$tmp2=$db['dblang']->getlist("art",$wherestr,$colums,$top,$obstr);
			$temp=array_merge($tmp1, $tmp2); 
		}else{
			$temp=$db['dblang']->getlist("art",$wherestr,$colums,$top,$obstr);
		}
		return $temp;
	}/**/
}

/******************************************
获得文章列表(含子分类)
pid：必选项，指定分类号，为空或为0时，返回空
top：可选，前X条记录，为空或为0时，列全部记录
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
        9=随机，随机时置顶无效
zd：可选，先列置顶，为1时先列置顶文章，置顶文章不占列表数，为空或其它时不列置顶文章
******************************************/
function ffa_art_stoplist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			case 9: $obstr="ORDER BY RANDOM () "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$substr="(pid=".$parary['pid'].")";
		$subrss=$db['dblang']->getlist("sort","(ifyn=2) AND (pid=".$parary['pid'].")","id");
		if(count($subrss)>0)foreach($subrss as $ary) $substr.=" OR (pid=".$ary["id"].")";
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (indt>='".$currdate."')";
		$wherestr.=" AND (".$substr.")";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['zd']==1){
			$zdwherestr=$wherestr." AND ((sta1=1) OR (sta1=3))";
			$tmp1=$db['dblang']->getlist("art",$zdwherestr,$colums,'',$obstr);
			$tmp2=$db['dblang']->getlist("art",$wherestr,$colums,$top,$obstr);
			$temp=array_merge($tmp1, $tmp2); 
		}else{
			$temp=$db['dblang']->getlist("art",$wherestr,$colums,$top,$obstr);
		}
		return $temp;
	}/**/
}

/******************************************
获得文章列表(遍历子分类)
pid：必选项，指定分类号，为空或为0时，返回空
top：可选，前X条记录，为空或为0时，列全部记录
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
        9=随机，随机时置顶无效
zd：可选，先列置顶，为1时先列置顶文章，置顶文章不占列表数，为空或其它时不列置顶文章
******************************************/
function ffa_art_astoplist($db,$parary){
	//回调遍历函数
	if(!function_exists('callbackergodic2')){
		function callbackergodic2($p0,$p1,$p2,$p3){
			$wherestr="(ifyn=2) AND (pid=".$p2.")";
			$rss=$p0->getlist($p1,$wherestr,$p3,"","");
			if(count($rss)>0)foreach($rss as $ary){
				$rece.=" OR (pid=".$ary["id"].")";
				$rece.=callbackergodic2($p0,$p1,$ary["id"],$p3);
			}
			return $rece;
		}
	}//回调遍历函数结束

	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			case 9: $obstr="ORDER BY RANDOM () "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$rece="(pid=".$parary['pid'].")";
		$dbc=$db['dblang'];
		$rece.=callbackergodic2($dbc,"sort",$parary['pid'],"id");
		$substr=$rece;
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (indt>='".$currdate."')";
		$wherestr.=" AND (".$substr.")";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['zd']==1){
			$zdwherestr=$wherestr." AND ((sta1=1) OR (sta1=3))";
			$tmp1=$db['dblang']->getlist("art",$zdwherestr,$colums,'',$obstr);
			$tmp2=$db['dblang']->getlist("art",$wherestr,$colums,$top,$obstr);
			$temp=array_merge($tmp1, $tmp2); 
		}else{
			$temp=$db['dblang']->getlist("art",$wherestr,$colums,$top,$obstr);
		}
		return $temp;
	}/**/
}

/******************************************
获得置顶文章列表
pid：必选项，指定分类号，为空或为0时，返回空
top：可选，前X条记录，为空或为0时，列全部记录
******************************************/
function ffa_art_stick($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (pid=".$parary['pid'].") AND (indt>='".$currdate."')";
		$wherestr.=" AND ((sta1=1) OR (sta1=3))";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		$temp=$db['dblang']->getlist("art",$wherestr,$colums,$top,'ORDER BY amdt DESC');
		return $temp;
	}/**/
}

/******************************************
获得推荐文章列表
pid：必选项，指定分类号，为空或为0时，返回空
top：可选，前X条记录，为空或为0时，列全部记录
******************************************/
function ffa_art_recommend ($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (pid=".$parary['pid'].") AND (indt>='".$currdate."')";
		$wherestr.=" AND ((sta1=2) OR (sta1=3))";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		$temp=$db['dblang']->getlist("art",$wherestr,$colums,$top,'ORDER BY amdt DESC');
		return $temp;
	}/**/
}

/******************************************
获得文章分页列表
pid：必选项，指定分类号，为空或为0时，返回空
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为20
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
******************************************/
function ffa_art_pglist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (pid=".$parary['pid'].") AND (indt>='".$currdate."')";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dblang']->getpglist("art",$wherestr,$colums,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
}

/******************************************
获得文章分页列表(含子分类)
pid：必选项，指定分类号，为空或为0时，返回空
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为20
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
******************************************/
function ffa_art_spglist($db,$parary){
	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$substr="(pid=".$parary['pid'].")";
		$subrss=$db['dblang']->getlist("sort","(ifyn=2) AND (pid=".$parary['pid'].")","id");
		if(count($subrss)>0)foreach($subrss as $ary) $substr.=" OR (pid=".$ary["id"].")";
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (indt>='".$currdate."')";
		$wherestr.=" AND (".$substr.")";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dblang']->getpglist("art",$wherestr,$colums,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
}

/******************************************
获得文章分页列表(遍历子分类)
pid：必选项，指定分类号，为空或为0时，返回空
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为20
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
******************************************/
function ffa_art_aspglist($db,$parary){
	//回调遍历函数
	if(!function_exists('callbackergodic2')){
		function callbackergodic2($p0,$p1,$p2,$p3){
			$wherestr="(ifyn=2) AND (pid=".$p2.")";
			$rss=$p0->getlist($p1,$wherestr,$p3,"","");
			if(count($rss)>0)foreach($rss as $ary){
				$rece.=" OR (pid=".$ary["id"].")";
				$rece.=callbackergodic2($p0,$p1,$ary["id"],$p3);
			}
			return $rece;
		}
	}//回调遍历函数结束

	if($parary['pid']==""||$parary['pid']==0) return ; else {
		$currdate=date("Y-m-d");//当前日期
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$rece="(pid=".$parary['pid'].")";
		$dbc=$db['dblang'];
		$rece.=callbackergodic2($dbc,"sort",$parary['pid'],"id");
		$substr=$rece;
		$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (indt>='".$currdate."')";
		$wherestr.=" AND (".$substr.")";
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dblang']->getpglist("art",$wherestr,$colums,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
}

/******************************************
获得搜索文章分页列表
keys：必选项，指定指定关键词，多个词用空格或英文逗号分隔，为空时，返回空
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为20
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
ob：可选，排序设置，定义值如下：
        0=最后修改时间倒序，默认，未定义时使用
        1=最后修改时间正序
        2=录入时间倒序
        3=录入时间正序
        4=浏览次数倒序
        5=浏览次数正序
******************************************/
function ffa_art_search($db,$parary){
	if(trim($parary['keys'])=="") return ; else {
		$currdate=date("Y-m-d");//当前日期
		switch($parary['ob']){
			case 1:$obstr="ORDER BY amdt "; break;
			case 2: $obstr="ORDER BY scdt DESC"; break;
			case 3: $obstr="ORDER BY scdt "; break;
			case 4: $obstr="ORDER BY acou DESC"; break;
			case 5: $obstr="ORDER BY acou "; break;
			default: $obstr="ORDER BY amdt DESC";
		}
		$substr='';
		$keys = str_replace(" ", ",", $parary['keys']);
		$temp=explode(",",$keys); //字符串分割为数组
		for ($i=0;$i<count($temp);$i++){
				$substr.=" AND ((atit LIKE '%".$temp[$i]."%')";
				$substr.=" OR (stit LIKE '%".$temp[$i]."%')";
				$substr.=" OR (auth LIKE '%".$temp[$i]."%')";
				$substr.=" OR (sour LIKE '%".$temp[$i]."%')";
				$substr.=" OR (keys LIKE '%".$temp[$i]."%')";
				$substr.=" OR (abs LIKE '%".$temp[$i]."%')";
				$substr.=" OR (atxt LIKE '%".$temp[$i]."%'))";
		}
		$wherestr="(ifyn=2) AND ((atyp=0) OR (atyp=1) OR (atyp=2))";
		$wherestr.=$substr;
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,scdt,amdt,acou,sta1,sta2,sta3,sta4';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dblang']->getpglist("art",$wherestr,$colums,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
}

/******************************************
获得指定文章号的分类至根的分类数据 
id：必选项，指定文章号，为空或为0时，返回空
******************************************/
function ffa_art_reroot($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$temp=$db['dblang']->getrecord("art","(id=".$parary['id'].")","pid");
		if(count($temp)>0){
			$id=$temp["pid"];
			do{
				$wherestr="(id=".$id.")";
				$temp=$db['dblang']->getrecord("sort",$wherestr,"id,pid,sname,mname,spage,spwd,sart,sta1,sta2,styp");
				$id=$temp["pid"];
				$reroot[]=$temp;
			}while($id>1);
		}
		return array_reverse($reroot);
	}/**/
}

/******************************************
获得指定文章号的文章数据，每次调用acou加一
id：必选项，指定文章号，为空或为0时，返回空
img：可选项，是否返回标题图数据，"y"时为可用
pg：可选项，是否返回上下页数据，"y"时为可用
******************************************/
function ffa_art_value($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$colums='id,pid,atit,stit,auth,sour,timg,keys,abs,atxt,acou,scdt,amdt,sta1,sta2,sta3,sta4,sta5,sta6,sta7,sta8';
		$temp=$db['dblang']->getrecord("art","(id=".$parary['id'].")",$colums);
		//if($parary['img']=='y'){ if(trim($temp['timg'])!=''){
		if(trim($temp['timg'])!=''){
			$timgs=explode(' ',trim($temp['timg']));
			$wheres='';
			$istop=true;
			foreach ($timgs as $value){
				if($istop){
					$wheres.='(id='.$value.')';
					$istop=false;
				}else{
					$wheres.=' OR (id='.$value.')';
				}
			}
			$temp['timgary']=$db['dblang']->getlist('upfile',$wheres,'id,furl,fext,ftit,ftxt,fpwd,sta1,sta2,sta3,sta4');

		}
		if($parary['pg']=='y'){
			$currdate=date("Y-m-d");//当前日期
			$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (pid=".$temp['pid'].") AND (indt>='".$currdate."') AND (id<".$temp['id'].")";
			$colums='id,atit,stit,auth,sour,timg,keys,abs,acou,sta1,sta2,sta3,sta4';
			$pu=$db['dblang']->getlist("art",$wherestr,$colums,1,'ORDER BY id DESC ');
			$temp['pu']=$pu[0];
			$currdate=date("Y-m-d");//当前日期
			$wherestr="(ifyn=2) AND (atyp=0) AND (raid=0) AND (pid=".$temp['pid'].") AND (indt>='".$currdate."') AND (id>".$temp['id'].")";
			$colums='id,atit,stit,auth,sour,timg,keys,abs,acou,sta1,sta2,sta3,sta4';
			$pd=$db['dblang']->getlist("art",$wherestr,$colums,1,'ORDER BY id ');
			$temp['pd']=$pd[0];
		}
		unset($updatedb);
		$updatedb['acou']=$temp['acou']+1;
		$count=$db['dblang']->execupdate('art',$updatedb,'(id='.$parary['id'].')');
		return $temp;
	}/**/
}

/******************************************
获得并输入显示指定文章号的文章正文数据 
id：必选项，指定文章号，为空或为0时，返回空
******************************************/
function ffa_art_text($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$tmp=$db['dblang']->getrecord("art","(id=".$parary['id'].")","atxt");
		$temp['ffwbms_re_value']=$tmp['atxt'];
		$temp['ffwbms_re_echo']='ffwbms_re_echo';
		return $temp;
	}/**/
}

/******************************************
获得指定文章号的文章正文图片列表数据
id：必选项，指定文章号，为空或为0时，返回空
******************************************/
function ffa_art_img($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$temp=$db['dblang']->getrecord("art","(id=".$parary['id'].")","timg");
		if(trim($temp['timg'])!=''){
			$timgs=explode(' ',trim($temp['timg']));
			$wheres='';
			$istop=true;
			foreach ($timgs as $value){
				if($istop){
					$wheres.='(id='.$value.')';
					$istop=false;
				}else{
					$wheres.=' OR (id='.$value.')';
				}
			}
			$temp=$db['dblang']->getlist('upfile',$wheres,'id,furl,fext,ftit,ftxt,fpwd,sta1,sta2,sta3,sta4');
		}
		return $temp;
	}/**/
}

/******************************************
获得指定文章号的回复列表 
id：必选项，指定文章号，为空或为0时，返回空
top：可选，前X条记录，为空或为0时，列全部记录
******************************************/
function ffa_art_relist($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$colums='id,atit,stit,auth,sour,atxt,scdt,amdt';
		if(trim($parary['top'])==""||$parary['top']==0) $limits='';
			else $limits=trim($parary['top']);
		$temp=$db['dblang']->getlist('art','(raid='.trim($parary['id']).') AND (atyp=1)',$colums,$limits);
		return $temp;
	}/**/
}

/******************************************
获得指定文章号的回复分页列表 
id：必选项，指定文章号，为空或为0时，返回空
pg：可选，要显示的页数，为空或为0时，显示第一页
ps：可选，每页要显示的记录数，为空或为0时，记录数为20
os：可选，多页时分页选项前后可选数，为空或为0时，可选数为5
******************************************/
function ffa_art_repglist($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$colums='id,atit,stit,auth,sour,atxt,scdt,amdt';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dblang']->getpglist('art','(raid='.trim($parary['id']).') AND (atyp=1)',$colums,'ORDER BY id DESC',$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
}

/******************************************
输出显示指定标识的特殊文章正文数据
flag：必选项，指定标识，为空时，返回空
******************************************/
function ffa_special_text($db,$parary){
	if(trim($parary['flag'])=="") return ; else {
		$tmp=$db['dblang']->getrecord("art","(stit='".$parary['flag']."') AND (atyp=3)","atxt");
//print_r($tmp);
//echo '{}{}<br />';
		$temp['ffwbms_re_value']=$tmp['atxt'];
		$temp['ffwbms_re_echo']='ffwbms_re_echo';
		return $temp;
	}/**/
}

/******************************************
获得指定标识的特殊文章图片列表数据
flag：必选项，指定标识，为空或为0时，返回空
******************************************/
function ffa_special_img($db,$parary){
	if(trim($parary['flag'])=="") return ; else {
		$temp=$db['dblang']->getrecord("art","(stit='".$parary['flag']."')","timg");
		if(trim($temp['timg'])!=''){
			$timgs=explode(' ',trim($temp['timg']));
			$wheres='';
			$istop=true;
			foreach ($timgs as $value){
				if($istop){
					$wheres.='(id='.$value.')';
					$istop=false;
				}else{
					$wheres.=' OR (id='.$value.')';
				}
			}
			$temp=$db['dblang']->getlist('upfile',$wheres,'id,furl,fext,ftit,ftxt,fpwd,sta1,sta2,sta3,sta4');
		}
		return $temp;
	}/**/
}

/******************************************
获得文章多文本分类列表数据
******************************************/
function ffa_txts_sort($db,$parary){
	$wherestr="(ifyn=2) AND (pid=2)"; 
	$temp=$db['dblang']->getlist('sort',$wherestr,'id,sname,mname',$top,'ORDER BY sno');
	return $temp;
}

/******************************************
获得文章多文本数据
id：必选项，指定文章号，为空或为0时，返回空
******************************************/
function ffa_txts_ary($db,$parary){
	if(trim($parary['id'])==""||$parary['id']==0) return ; else {
		$wherestr="(ifyn=2) AND (pid=2)"; 
		$temp1=$db['dblang']->getlist('sort',$wherestr,'id,sname,mname',$top,'ORDER BY sno');
		if(count($temp1)>0)foreach ($temp1 as $ary){
			//echo "Value: " . $value . "<br />";
		}
		return $temp;
	}
}





/**************************************************************
art文章表字段
	id,uid,atyp,pid,raid,atit,stit,auth,sour,timg,keys,abs,atxt,acou,indt,scdt,amdt,sta1,sta2,sta3,sta4,sta5,sta6,sta7,sta8,ifyn

SQLITE操作类：

	插入记录：
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		unset($updatedb); //清空数组
		$updatedb['id']="null";
		$updatedb['logtime']=date('Y-m-d H:i:s',time()); //当前日期时间,定义时区（date_default_timezone_set('Asia/Shanghai');）
		$updatedb['logip']=$user_IP;
		$res=$db->execinsert('ffwbms_user',$updatedb);

	获得新插入的记录号：
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$a=$db->insert_id();
		echo $a;
		$db->close();

	更新记录：
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		unset($updatedb); //清空数组
		$updatedb['logtime']=date('Y-m-d H:i:s',time()); //当前日期时间,定义时区（date_default_timezone_set('Asia/Shanghai');）
		$updatedb['logip']=$user_IP;
		$web=$db->execupdate('sort',$updatedb,'(id=4)');

		$db->close();

	删除记录：
	参数:	$table = 表名
			$wheres = 条件
	返回:受影响的行数
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$web=$db->execdelete('sort','(pid=19)');

	从表中获得一条记录的数据：
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$rss=$db->getrecord('ffwbms_user','(id=3)','pword');
		$db->close();

	获得随机数据列表
	参数：	$table = 表名
			$wheres: = 条件
			$colums: = 字段集
			$limits: = 列表数
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$res=$db->getrecord('sort','(pid=15),'*','6'');

	获得列表
	参数:	$table = 表名
			$wheres = 条件
			$colums = 字段集
			$limits = 列表数，为空时列所有数据
			$orderbys = 排序
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$res=$db->getlist('sort','(pid=3)','*','10','ORDER BY id DESC');

	获得分页列表
	参数:	$table = 表名
			$wheres = 条件
			$colums = 字段集
			$orderbys = 排序
			$pageno = 要显示的页数
			$pagesize = 设置每一页显示的记录数
			$optionalsize = 设置前后可选页数
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$res=$db->getpglist('sort','pid=12','*','ORDER BY id DESC','2','15','5');

	执行exec查询
	参数:	$sql = sqlite语句
	返回:	影响的行数
		$db=new ffSQLiteCls(ROOT_PATH.'/cn_ffwbms.ffs');
		$count=$db->execquery("UPDATE sort SET sta3=2 WHERE id=3");

**************************************************************/
?>
