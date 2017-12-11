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
			pid：可选，为空时父分类=1，论坛ROOT
			top：可选，取多少条数据，为空时取全部列表
			ob：可选，排序设置，f=倒序，其它=默认正序
返回：
id,pid,sname,snote
		
******************************************/
function ffe4_sort_list($db,$parary){
	if(!isDigit($parary['pid'])) $pid=1; else $pid=$parary['pid'];
	if($parary['top']==""||$parary['top']==0) $top=""; else $top=$parary['top'];
	if($parary['ob']=='f') $obstr='ORDER BY id DESC'; else  $obstr='';
	$wherestr="(id>10) AND (ifyn=2) AND (pid=".$pid.")"; 
	$temp=$db['dbffe4']->getlist('sort',$wherestr,'',$top,$obstr);
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
发帖
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
		info['typ']：必选项，所属分类号
		info['tit']：必选项，分类标题
id	uid	fdt	fip	reid	typ	tit	timg	txt1	txt2	t2e1	t2e2	sta1	sta2	sta3	sta4	sta5	sta6	mg1	mg2	mg3	mg4	bcon	lruid	lrdt	ifyn
		
注意：	表单提交的内容放入info组中，
	例：<input id="aaa" name="info[aaa]" type="text" value="aaaaaa" />
	标题不能为空，为空时返回 -1 错
返回：成功返回1，失败返回空
	标题不能为空，为空时返回-1
******************************************/
function ffe4_art_add($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能发贴回贴，请登录后再进行发贴回贴操作';
	}else if(empty($parary['post_ary']['info']['typ'])){
		$temp['sn']=40103;
		$temp['val']='帖子所属版块不能为空';
	}else if(empty($parary['post_ary']['info']['tit'])){
		$temp['sn']=40104;
		$temp['val']='帖子标题不能为空';
	}else{
		unset($updatedb); //清空数组
		//timg
		$updatedb['uid']=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//发贴人用户号
		$updatedb['fdt']=date('Y-m-d H:i:s',time()); //发贴时间
		$updatedb['fip']=get_user_IP();//发帖IP
		$updatedb['reid']=0;//是否回复贴
		$updatedb['typ']=$parary['post_ary']['info']['typ'];//帖子所属版块
		$updatedb['tit']=$parary['post_ary']['info']['tit'];//帖子标题
		if($parary['post_ary']['info']['txt1']!='') //帖子正文
			$updatedb['txt1']=$parary['post_ary']['info']['txt1'];
		if($parary['post_ary']['info']['txt2']!='') //条件正文
			$updatedb['txt2']=$parary['post_ary']['info']['txt2'];
		if($parary['post_ary']['info']['t2e1']!='') //条件类型（0=无，1=回复可看，2=回复次数开放，3=收费）
			$updatedb['t2e1']=$parary['post_ary']['info']['t2e1'];
		if($parary['post_ary']['info']['t2e2']!='') //收费值
			$updatedb['t2e2']=$parary['post_ary']['info']['t2e2'];
		$updatedb['ifyn']=1;
		$re_id=$db['dbffe4']->execinsert('art',$updatedb);
		//$temp=$updatedb;
		unset($updatedb); //清空数组
		$temp['sn']=$re_id;
		$temp['val']='OK';
	}
	return $temp;
}

/******************************************
帖子编辑
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
		id：必选项，帖子号
id	uid	fdt	fip	reid	typ	tit	timg	txt1	txt2	t2e1	t2e2	sta1	sta2	sta3	sta4	sta5	sta6	mg1	mg2	mg3	mg4	bcon	lruid	lrdt	ifyn
		
注意：	表单提交的内容放入info组中，
	例：<input id="aaa" name="info[aaa]" type="text" value="aaaaaa" />
	标题不能为空，为空时返回 -1 错
返回：成功返回1，失败返回空
	标题不能为空，为空时返回-1
******************************************/
function ffe4_art_edit($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能操作，请登录后再进行贴子编辑操作';
	}else if(empty($parary['id'])){
		$temp['sn']=40103;
		$temp['val']='帖子标题不能为空';
	}else{
		unset($updatedb); //清空数组
		//timg
		$updatedb['uid']=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//帖子所属版块
		$updatedb['fdt']=date('Y-m-d H:i:s',time()); //发贴时间
		$updatedb['fip']=get_user_IP();//发帖IP
		$updatedb['reid']=0;//是否回复贴
		$updatedb['typ']=$parary['post_ary']['info']['typ'];//帖子所属版块
		$updatedb['tit']=$parary['post_ary']['info']['tit'];//帖子标题
		if($parary['post_ary']['info']['txt1']!='') //帖子正文
			$updatedb['txt1']=$parary['post_ary']['info']['txt1'];
		if($parary['post_ary']['info']['txt2']!='') //条件正文
			$updatedb['txt2']=$parary['post_ary']['info']['txt2'];
		if($parary['post_ary']['info']['t2e1']!='') //条件类型（0=无，1=回复可看，2=回复次数开放，3=收费）
			$updatedb['t2e1']=$parary['post_ary']['info']['t2e1'];
		if($parary['post_ary']['info']['t2e2']!='') //收费值
			$updatedb['t2e2']=$parary['post_ary']['info']['t2e2'];
		$updatedb['ifyn']=2;
		$re_id=$db['dbffe4']->execupdate('art',$updatedb,'(id='.$parary['id'].')');
		//$temp=$updatedb;
		unset($updatedb); //清空数组
		$temp['sn']=$re_id;
		$temp['val']='OK';
	}
	return $temp;
}

/******************************************
帖子回复
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
		info['reid']：必选项，所属分类号
id,uid,fdt,fip,reid,typ,tit,timg,txt1,txt2,t2e1,t2e2,sta1,sta2,sta3,sta4,sta5,sta6,mg1,mg2,mg3,mg4,bcon,lruid,lrdt,ifyn
		
注意：	表单提交的内容放入info组中，
	例：<input id="aaa" name="info[aaa]" type="text" value="aaaaaa" />
	标题不能为空，为空时返回 -1 错
返回：成功返回1，失败返回空
	标题不能为空，为空时返回-1
******************************************/
function ffe4_art_re($db,$parary){
	//echo $parary['cook_ary']['ul']['s8'].'<br />';
	//echo $parary['cook_ary']['ul']['s9'].'<br />';
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能回贴，请登录后再进行回贴操作';
	}else if(empty($parary['post_ary']['info']['reid'])){
		$temp['sn']=40104;
		$temp['val']='主帖号不能为空';
	}else{
		unset($updatedb); //清空数组
		$updatedb['lruid']=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//最后回贴人用户号
		$updatedb['lrdt']=date('Y-m-d H:i:s',time()); //最后回帖时间
		$re_id=$db['dbffe4']->execupdate('art',$updatedb,'(id='.$parary['post_ary']['info']['reid'].')');

		unset($updatedb); //清空数组
		$updatedb['uid']=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//回贴人用户号
		$updatedb['fdt']=date('Y-m-d H:i:s',time()); //发贴时间
		$updatedb['fip']=get_user_IP();//发帖IP
		$updatedb['reid']=$parary['post_ary']['info']['reid'];//是否回复贴，主帖号
		if($parary['post_ary']['info']['txt1']!='') //帖子正文
			$updatedb['txt1']=$parary['post_ary']['info']['txt1'];
		$updatedb['ifyn']=1;
		$re_id=$db['dbffe4']->execinsert('art',$updatedb);
		//$temp=$updatedb;
		unset($updatedb); //清空数组

		$temp['sn']=$re_id;
		$temp['val']='OK';
	}
	return $temp;
}

/******************************************
获得指定帖子号或回复号的值
参数：$db = 表名
	$parary = 参数集
		id：必选项，帖子号或回复号
id,uid,fdt,fip,reid,typ,tit,timg,txt1,txt2,t2e1,t2e2,sta1,sta2,sta3,sta4,sta5,sta6,mg1,mg2,mg3,mg4,bcon,lruid,lrdt,ifyn
		
返回：
******************************************/
function ffe4_art_value($db,$parary){
	if(empty($parary['id'])){
		$temp['sn']=40101;
		$temp['val']='帖子号或回复号不能为空';
	}else{
		$colstr='id,uid,fdt,fip,reid,typ,tit,timg,txt1,txt2,t2e1,t2e2,bcon,lruid,lrdt,ifyn';
		$wherestr='(id='.$parary['id'].')';
		$temp=$db['dbffe4']->getrecord('art',$wherestr,$colstr);

		//浏览次数加一
		unset($updatedb); //清空数组
		$updatedb['bcon']=($temp['bcon']+1);//
		$res=$db['dbffe4']->execupdate('art',$updatedb,'(id='.$temp['id'].')');
		//$temp=$updatedb;
		unset($updatedb); //清空数组
		$temp['bcon']=($temp['bcon']+1);
	}
	return $temp;
}

/******************************************
获得指定帖子号的回复列表
参数：$db = 表名
	$parary = 参数集
		id：必选项，指定分类号，为空或为0时，返回空
		top：可选，前X条记录，为空或为0时，列全部记录
		ob：可选，排序设置，z=正序，其它=默认倒序
id,uid,fdt,fip,reid,typ,tit,timg,txt1,txt2,t2e1,t2e2,sta1,sta2,sta3,sta4,sta5,sta6,mg1,mg2,mg3,mg4,bcon,lruid,lrdt,ifyn
返回：
******************************************/
function ffe4_art_relist($db,$parary){
	if(empty($parary['id'])){
		$temp['sn']=40101;
		$temp['val']='帖子号不能为空';
	}else{
		if(!empty($parary['top'])) $top=$parary['top'];
		$colstr='id,uid,fdt,fip,txt1';
		$wherestr='(reid='.$parary['id'].')';
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		$temp=$db['dbffe4']->getlist('art',$wherestr,$colstr,$top,$obstr);
	}
	return $temp;
}

/******************************************
获得指定帖子号的回复分页列表
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
function ffe4_art_repglist($db,$parary){
	if(empty($parary['id'])){
		$temp['sn']=40101;
		$temp['val']='帖子号不能为空';
	}else{
		$colstr='id,uid,fdt,fip,txt1';
		$wherestr='(reid='.$parary['id'].')';
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dbffe4']->getpglist("art",$wherestr,$colstr,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
	return $temp;
}

/******************************************
获得指定版块号的帖子列表
参数：$db = 表名
	$parary = 参数集
		id：必选项，指定分类号，为空或为0时，返回空
		top：可选，前X条记录，为空或为0时，列全部记录
		ob：可选，排序设置，z=正序，其它=默认倒序
id,uid,fdt,fip,reid,typ,tit,timg,txt1,txt2,t2e1,t2e2,sta1,sta2,sta3,sta4,sta5,sta6,mg1,mg2,mg3,mg4,bcon,lruid,lrdt,ifyn
返回：
******************************************/
function ffe4_art_list($db,$parary){
	if(empty($parary['id'])){
		$temp['sn']=40101;
		$temp['val']='版块号不能为空';
	}else{
		if(!empty($parary['top'])) $top=$parary['top'];
		$colstr='id,uid,fdt,fip,tit,bcon,lruid,lrdt';
		$wherestr='(reid=0) AND (typ='.$parary['id'].')';
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		$temp=$db['dbffe4']->getlist('art',$wherestr,$colstr,$top,$obstr);
	}
	return $temp;
}

/******************************************
获得指定版块号的帖子分页列表
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
function ffe4_art_pglist($db,$parary){
	if(empty($parary['id'])){
		$temp['sn']=40101;
		$temp['val']='版块号不能为空';
	}else{
		$colstr='id,uid,fdt,fip,tit,bcon,lruid,lrdt';
		$wherestr=' (ifyn=2)   and   (reid=0) AND (typ='.$parary['id'].')';
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dbffe4']->getpglist("art",$wherestr,$colstr,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
	return $temp;
}

/******************************************
/******************************************
登录赠送金币数
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
		lfree：必选项，赠送金币数
返回：
artex1
id	e1fx	tuid	uid	e1type	e1note	tid	e1dt	e1ip	isfk
（1=登录获得金币，5=帖子获得金币，6=查看帖子支出金币）
******************************************/
function ffe4_login_lfree($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能赠送金币，请登录后再进行赠送金币操作';
	}else if(empty($parary['lfree'])){
		$temp['sn']=40104;
		$temp['val']='赠送金币数不能为空';
	}else{
		$uid=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//当前登录用户号
		//$wherestr='(e1type=1) AND (e1dt>'."'".date('Y-m-d',time())."'".')';
		$wherestr="(e1type=1) AND (date(e1dt)=date('now','localtime'))";//今天
		$lfrees=$db['dbffe4']->getlist('artex1',$wherestr,'id');
		if(!empty($lfrees)){
			$temp['sn']=40106;
			$temp['val']='今日金币已赠送';
		}else{
			unset($updatedb); //清空数组
			$updatedb['e1fx']=1;//收入
			$updatedb['uid']=$uid;//所属用户号
			$updatedb['e1type']=1;//登录获得金币
			$updatedb['e1dt']=date('Y-m-d H:i:s',time()); //发生时间
			$updatedb['e1ip']=get_user_IP();//发生IP
			$updatedb['isfk']=$parary['lfree'];
			$re_id=$db['dbffe4']->execinsert('artex1',$updatedb);
			unset($updatedb); //清空数组
			$temp['sn']=0;
			$temp['val']=$re_id;
		}
	}
	return $temp;
}

/******************************************
登录用户获得金币数收入合计
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
返回：
artex1
id	e1fx	tuid	uid	e1type	e1note	tid	e1dt	e1ip	isfk
（1=登录获得金币，5=帖子获得金币，6=查看帖子支出金币）
******************************************/
function ffe4_artex1_revenue($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能获得金币数合计，请登录后再进行金币数合计操作';
	}else{
		$uid=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//当前登录用户号
		//$wherestr='(e1type=1) AND (e1dt>'."'".date('Y-m-d',time())."'".')';
		$wherestr="(e1fx=1) AND (uid=".$uid.")";//今天
		$revenue=$db['dbffe4']->getlist('artex1',$wherestr,'sum(isfk) as res');
		$temp['sn']=0;
		$temp['val']=$revenue[0]['res'];
	}
	return $temp;
}

/******************************************
登录用户获得金币数支出合计
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
返回：
artex1
id	e1fx	tuid	uid	e1type	e1note	tid	e1dt	e1ip	isfk
（1=登录获得金币，5=帖子获得金币，6=查看帖子支出金币）
******************************************/
function ffe4_artex1_payments($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能获得金币数合计，请登录后再进行金币数合计操作';
	}else{
		$uid=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//当前登录用户号
		//$wherestr='(e1type=1) AND (e1dt>'."'".date('Y-m-d',time())."'".')';
		$wherestr="(e1fx=2) AND (uid=".$uid.")";//今天
		$payments=$db['dbffe4']->getlist('artex1',$wherestr,'sum(isfk) as res');
		$temp['sn']=0;
		if(empty($payments[0]['res'])){
			$temp['val']=0;
		}else{
			$temp['val']=$payments[0]['res'];
		}
	}
	return $temp;
}

/******************************************
金币购买帖子
参数：$db = 表名
	$parary = 参数集
		pwd：必选项，密钥，此为$wset_ary['cookie_pwd']
		id：必选项，帖子号
返回：
artex1
id	e1fx	tuid	uid	e1type	e1note	tid	e1dt	e1ip	isfk
（1=登录获得金币，5=帖子获得金币，6=查看帖子支出金币）
******************************************/
function ffe4_lfree_artgm($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能购买帖子，请登录后再进行购买帖子操作';
	}else if(empty($parary['id'])){
		$temp['sn']=40104;
		$temp['val']='帖子号不能为空';
	}else{
		$uid=ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']);//当前登录用户号
		$e1dt=date('Y-m-d H:i:s',time());//发生时间
		$wherestr='(id='.$parary['id'].')';
		$temp_art=$db['dbffe4']->getrecord('art',$wherestr,'id,uid,t2e1,t2e2');//获得帖子费用

		unset($updatedb); //清空数组
		$updatedb['e1fx']=2;//支出
		$updatedb['uid']=$uid;//所属用户号
		$updatedb['e1type']=6;//查看帖子支出金币
		$updatedb['e1dt']=$e1dt; //发生时间
		$updatedb['e1ip']=get_user_IP();//发生IP
		$updatedb['isfk']=$temp_art['t2e2'];
		$re_id=$db['dbffe4']->execinsert('artex1',$updatedb);

		unset($updatedb); //清空数组
		$updatedb['e1fx']=1;//收入
		$updatedb['uid']=$temp_art['uid'];//所属用户号
		$updatedb['e1type']=5;//登录获得金币
		$updatedb['e1dt']=$e1dt; //发生时间
		$updatedb['e1ip']=get_user_IP();//发生IP
		$updatedb['isfk']=$temp_art['t2e2'];
		$re_id=$db['dbffe4']->execinsert('artex1',$updatedb);
		unset($updatedb); //清空数组

		$temp['sn']=0;
		$temp['val']="OK";
	}
	return $temp;
}

/******************************************
获得登录用户所发贴子分页列表
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
function ffe4_user_art_pglist($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能获得帖子列表，请登录后再进行操作';
	}else{
		$colstr='id,uid,fdt,fip,typ,tit,bcon,lruid,lrdt';
		$wherestr='(reid=0) and (uid='.ffStrDE($parary['cook_ary']['ul']['s0'],$parary['pwd']).')  and (ifyn=2)';
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dbffe4']->getpglist("art",$wherestr,$colstr,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
	return $temp;
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
function ffe4_user_reart_pglist($db,$parary){
	if(empty($parary['pwd'])){
		$temp['sn']=40101;
		$temp['val']='PWD不能为空，此值为$wset_ary['."'cookie_pwd'".']';
	}else if(ffStrDE($parary['cook_ary']['ul']['s9'],$parary['pwd'])!=$parary['cook_ary']['ul']['s8']){
		$temp['sn']=40102;
		$temp['val']='未登录用户不能获得回复列表，请登录后再进行操作';
	}else{
		$colstr='id,uid,fdt,fip,typ,tit,bcon,lruid,lrdt';
		$wherestr='(reid!=0)';
		if($parary['ob']=='z') $obstr=''; else $obstr='ORDER BY id DESC';
		if($parary['pg']==''||$parary['pg']==0){$parary['pg']=1;};
		if($parary['ps']==''||$parary['ps']==0){$parary['ps']=20;};
		if($parary['os']==''||$parary['os']==0){$parary['os']=5;};
		$temp=$db['dbffe4']->getpglist("art",$wherestr,$colstr,$obstr,$parary['pg'],$parary['ps'],$parary['os']);
		return $temp;
	}/**/
	return $temp;
}




/******************************************
******************************************/

?>