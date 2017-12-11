<?php 
if(($_GET['down'])=='downok'){
/*
	echo time()."\n";
	sleep(5);
	echo time()."\n";
/**/
	echo 'ok - '.$_GET['rev'];
}else{
	//echo 'down';
	require_once('func.php');
	require_once('ffwbms_filefuncs.php');
	if($ol_set['cookie_ary']['cookie']['ol']['s9']=='')die();
	if($ol_set['cookie_ary']['cookie']['ol']['s8']!=ffStrDE($ol_set['cookie_ary']['cookie']['ol']['s9'], $ol_set['wset_ary']["cookie_pwd"]))die();

	$wroot=$_SERVER["DOCUMENT_ROOT"]; //网站根
	//$local_file=$wroot.'/backup/temp.zip'; //要下载的文件
	$local_file=$wroot.'/backup/'.$_GET['file']; //要下载的文件

	$download_rate = 200; //设置下载速度限制为100K
	if(file_exists($local_file) && is_file($local_file)){
	    header('Cache-control: private');
	    header('Content-Type: application/octet-stream');
	    header('Content-Length: '.filesize($local_file));
	    header('Content-Disposition: filename=test.zip');

		set_time_limit(0); //设置程序执行时间，为0时无限
	    flush();
	    $file = fopen($local_file, "r");
	    while(!feof($file)){
	        // 发送当前文件的一部分到浏览器
    	    print fread($file, round($download_rate * 1024));
	        // 刷新内容的浏览器
    	    flush();
        	// 暂停1秒
        	sleep(1);
    	}
	    fclose($file);
    	//echo 'ok'; //再跳页面，或跳回自己，带参返回是否成功
		//header('location: site_db_zip_down_ok.php?down=downok&rev=1'); 
	}else {
    	die('Error: 文件 '.$local_file.' 不存在，不能下载！');
		//header('location: site_db_zip_down_ok.php?down=downok&rev=2'); 
	}
}

?>
