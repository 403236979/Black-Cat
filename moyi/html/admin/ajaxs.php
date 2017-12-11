<?php 
/**************************************************************
网站管理 -> AJAX调用处理
版本：1.0.0.0
日期时间：2015年3月21日10:54:17

ffwbms_tpl.ffs 模板库 $dbtpls (此文件在模板目录下)
ffwbms.ffs 基本数据库 $dbbase
//ff_wbms1.ffs 系统扩展1数据库 $dbffe0
ff_message.ffs 留言数据库 $dbffe1
ff_flink.ffs 友情链接数据库 $dbffe2
ff_user.ffs 用户数据库 $dbffe9
cn_ffwbms.ffs 语种数据库 $dblang



//用来遍历指定对象所有的属性名称和值 //有问题，不可用
//obj 需要遍历的对象
function allPrpos(obj) { 
    // 用来保存所有的属性名称和值
    var props = "";
    // 开始遍历
    for(var p in obj){ 
        // 方法
        if(typeof(obj[p])=="function"){ 
            obj[p]();
        }else{ 
            // p 为属性名称，obj[p]为对应属性的值
            props+= p + "=" + obj[p] + "/t";
        } 
    } 
    // 最后显示所有的属性
    alert(props);
}

//遍历对象的所有属性
function allPrpos1(obj) { 
	for (prop in obj){
		document.write("属性 '" + prop + "' 为 " + obj[prop]);
		document.write("<br>");
	}
}
//                   URL地址及参数         不缓存         异步
var aa=$.ajax({url:'ajaxs.php?act=test',cache:false,async:false});
//alert(aa.responseText);
allPrpos(aa);

**************************************************************/
require_once('func.php');
require_once('acts.php');
/*
die("{msg:'".count($ol_set['post_ary'])." - ".count($ol_set['upfile_ary'])."',error:''}");
die(count($ol_set['post_ary']));
print_r($ol_set['post_ary']);die();
/**/
/* URL提交动作选择 */
switch ($ol_set['get_ary']['act']) {
	case 'test':
		$reval="re_test";
		break;

	case 'imgidgeturl'://
		//$reval="re_imgidgeturl";
		$reval="";
		if(!empty($dblang)) {
			$temp=ol_getwebimgdb($dblang,$ol_set['get_ary']['id']);
		}
		$reval.=$ol_set['wset_ary']['upload_path'].$temp['furl'];
		break;
	case 'selartimg':
		//$reval="re_selartimg";
		if($ol_set['get_ary']['pg']=='')$ol_set['get_ary']['pg']=1;
		$reval="";
		if(!empty($dblang)) {
			$temp=ol_getwebimgpglist($dblang,$ol_set['get_ary']['pg'],12);
		}
		if(count($temp)>0) foreach($temp[0] as $ary){
			$reval.='<li class="cjxcli"><img src="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'.jpeg" ondblclick="artimglsdbadd('.$ol_set['get_ary']['id'].','.$ary['id'].')" /> </li>';
		}

		if ($temp[1]['pages']>1){ //分页数据
			$reval.='<div class="pages">';
			$pg_s=$temp[1];
			if ($pg_s['current']>1) $reval.='<a href="javascript:;" onclick="artimglspg('.$ol_set['get_ary']['id'].',1)"><<</a>';
			if ($pg_s['current']>1) $reval.='<a href="javascript:;" onclick="artimglspg('.$ol_set['get_ary']['id'].','.$pg_s['previous'].')"><</a>';
			if (count($pg_s['p_list'])>0) foreach($pg_s['p_list'] as $ary){ //循环
				$reval.='<a href="javascript:;" onclick="artimglspg('.$ol_set['get_ary']['id'].','.$ary.')">'.$ary.'</a>';
			}
			$reval.='<span>'.$pg_s['current'].'</span>';
			if (count($pg_s['n_list'])>0) foreach($pg_s['n_list'] as $ary){ //循环
				$reval.='<a href="javascript:;" onclick="artimglspg('.$ol_set['get_ary']['id'].','.$ary.')">'.$ary.'</a>';
			}
			if ($pg_s['current']<$pg_s['pages']) $reval.='<a href="javascript:;" onclick="artimglspg('.$ol_set['get_ary']['id'].','.$pg_s['next'].')">></a>';
			if ($pg_s['current']<$pg_s['pages']) $reval.='<a href="javascript:;" onclick="artimglspg('.$ol_set['get_ary']['id'].','.$pg_s['pages'].')">>></a>';
			$reval.='</div>';
		}
		break;
	case 'arttimgadd':
		//echo '<pre>'; print_r($ol_set['get_ary']); echo '</pre>'; die();
		
		
		
		$reval='re_arttimgadd';
/*		if($ol_set['get_ary']['aid']==''||$ol_set['get_ary']['aid']==0){
			$reval="";
		}else{
			$temp=ol_getarttimglist($dblang,$ol_set['get_ary']['aid']);
			$re_html='';
			if(count($temp['imgs'])>0) foreach($temp['imgs'] as $ary){
				$re_html.='<li><img src="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'.jpeg" onclick="window.open('."'".$ol_set['wset_ary']['upload_path'].$ary['furl']."'".')">';
				//$re_html.='<span><a href="del?aid='.$temp['aid'].'&tid='.$ary['id'].'">X</a></span></li>';
				$re_html.='<span><a href="javascript:;" onclick="timgdel('.$ol_set['get_ary']['aid'].','.$ary['id'].')">X</a></span></li>';
			}
			$reval=$re_html;
		}
*/		break;

	case 'arttimglistids': //图片号组合字符串获得图片列表
		if($ol_set['get_ary']['ids']==''){
			$reval="";
		}else{
			$temp=ol_getarttimglistids($dblang,$ol_set['get_ary']['ids']);
			$re_html='';
			if(count($temp)>0) foreach($temp as $ary){
				$re_html.='<li><img src="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'.jpeg" onclick="window.open('."'".$ol_set['wset_ary']['upload_path'].$ary['furl']."'".')">';
				$re_html.='<span><a href="javascript:;" onclick="arttimgdel('.$ary['id'].')">X</a></span></li>';
			}
			$reval=$re_html;
		}
		break;
	case 'arttimglist':
		//echo '<pre>'; print_r($ol_set['get_ary']); echo '</pre>'; die();
		if($ol_set['get_ary']['id']==''||$ol_set['get_ary']['id']==0){
			$reval="";
		}else{
			$temp=ol_getarttimglist($dblang,$ol_set['get_ary']['id']);
			$re_html='';
			if(count($temp['imgs'])>0) foreach($temp['imgs'] as $ary){
				$re_html.='<li><img src="'.$ol_set['wset_ary']['upload_path'].$ary['furl'].'.jpeg" onclick="window.open('."'".$ol_set['wset_ary']['upload_path'].$ary['furl']."'".')">';
				//$re_html.='<span><a href="del?aid='.$temp['aid'].'&tid='.$ary['id'].'">X</a></span></li>';
				$re_html.='<span><a href="javascript:;" onclick="timgdel('.$ol_set['get_ary']['id'].','.$ary['id'].')">X</a></span></li>';
			}
			$reval=$re_html;
		}
		break;
	case 'specialpagestit': //特殊页面标识名是否可用
		if(trim($ol_set['get_ary']['stit'])==''){
			$reval='标识名不能为空';
		}else{
			if(substr($ol_set['get_ary']['stit'],0,1)==''){
				$reval='首字符不能为数字';
			}else{
				$temp=ol_getspecialpagestit($dblang,$ol_set['get_ary']['stit']);
				if($temp>0){
					$reval='标识名已存在，不可使用';
				}else{
					$reval='ok';
				}
			}
		}
		break;
	case 'unameisreg': //用户名是否可注册
		$reval="unameisreg";
		break;
	case 'getsubsortlist': //获得子分类列表
		$temp=ol_getsortlist($dblang,'sort',$ol_set['get_ary']['id']);
		$reval='';
		foreach ($temp as $ary) { //循环输出
			$reval.='<li>';
			if($ary['styp']==0) $reval.='<a ';
			if($ary['styp']==1) $reval.='<a href="web_art_page.php?id='.$ary['id'].'" target="work"';
			if($ary['styp']==2) $reval.='<a href="web_art_pglist.php?pid='.$ary['id'].'" target="work"';
			if($ary['styp']==3) $reval.='<a href="web_art_pagelist.php?pid='.$ary['id'].'" target="work"';
			if($ary['ifyn']==1) $reval.='style="color:#F00"';
			$reval.='>'.$ary['sname'].'</a>';
			if($ary['subs']>0) $reval.='<a id="act'.$ary['id'].'" class="open" href="javascript:;" onclick="showsub('.$ary['id'].')"> </a>'; else $reval.='<a class="none" href="javascript:;"> </a>';
			$reval.='<ul class="sub" id="sub'.$ary['id'].'">';
			$reval.='</ul>';
			$reval.='</li>';
		}
		break;
	default: //所有条件不满足时，默认返回字符串OK
		$reval="OK";
}

echo $reval;
?>