<?php
/**
 * vCode(m,n,x,y) m个数字  显示大小为n   边宽x   边高y
 * 自己改写记录session $code
*/
//指定会话保存的目录
define('ROOT_PATH', dirname(dirname(__FILE__)));			//本页所在的目录，根目录
define('SESS_PATH', ROOT_PATH.'/data');			//session会话目录
@date_default_timezone_set('Asia/Shanghai');	//定义默认时区
@session_save_path(SESS_PATH);					//定义session会话保存的目录,有此行，API扩展不能读写会话
session_start(); 
vCode(4, 30); //4个数字，显示大小为15
 
function vCode($num = 4, $size = 20, $width = 0, $height = 0) {
    !$width && $width = $num * $size * 4 / 5 + 30;
    !$height && $height = $size + 10; 
    // 去掉了 0 1 O l 等
    $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
    $code = '';
    for ($i = 0; $i < $num; $i++) {
        $code .= $str[mt_rand(0, strlen($str)-1)];
    } 
    // 画图像
    $im = imagecreatetruecolor($width, $height); 
    // 定义要用到的颜色
    $back_color = imagecolorallocate($im, 235, 236, 237);
    $boer_color = imagecolorallocate($im, 118, 151, 199);
    $text_color = imagecolorallocate($im, 0, 0, 0);
    // 画背景
    imagefilledrectangle($im, 0, 0, $width, $height, $back_color);
    // 画边框
    //imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color);
    // 画干扰线
    //for($i = 0;$i < 1;$i++) {
    //    $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    //    imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
   // }
    // 画干扰点
    //for($i = 0;$i < 50;$i++) {
    //    $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
   //     imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
   // }
    // 画验证码
    @imagefttext($im, $size , 0, 5, $size + 3, $text_color, 'yzm.ttf', $code);
    $_SESSION["VerifyCode"]=$code; 
    header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
    header("Content-type: image/png;charset=utf-8");
    imagepng($im);
    imagedestroy($im);
} 
 
?>