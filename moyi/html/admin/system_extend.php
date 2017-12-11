<?php


function sys_reader_baidu_set(){
	$file_path=str_replace('\\','/',$_SERVER["DOCUMENT_ROOT"]."/wxClient/inc/ffwbms_sqlite.php");
	if(file_exists($file_path)){
		require_once($file_path);
		
		$db= new ffSQLiteCls(str_replace('\\','/',$_SERVER["DOCUMENT_ROOT"]."/db/ffwbms.ffs"));
		$result = $db->getrecord("sys_set");
		return $result["baidu_set"];
	}
	return "no";
	
}

function sys_seting_baidu_set($baidu_str){
	$file_path=str_replace('\\','/',$_SERVER["DOCUMENT_ROOT"]."/wxClient/inc/ffwbms_sqlite.php");
	if(file_exists($file_path)){
		require_once($file_path);
		$db= new ffSQLiteCls(str_replace('\\','/',$_SERVER["DOCUMENT_ROOT"]."/db/ffwbms.ffs"));
		$result = $db->getrecord("sys_set");
		
		if(empty($result["baidu_set"])){
			$db->execinsert("sys_set",Array('baidu_set'=>$baidu_str));
		}else{
			if(empty($baidu_str)){
				$db->execdelete("sys_set");
			}else{
				$db->execupdate("sys_set",Array('baidu_set'=>$baidu_str));
			}
		}
	}
}


?>