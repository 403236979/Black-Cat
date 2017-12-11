//调用wow()动画方法
$(function(){
	new WOW().init();
})

//滚动条滚动时，导航margin-top变化
var header=$("#header");//得到头部对象
var win=$(window);//得到窗口对象
var dc=$(document);//得到document文档对象
win.scroll(function(){
	console.log(dc.scrollTop());
	if(dc.scrollTop()>=36){
		$("#header").addClass("mini");
	}else{
		$("#header").removeClass("mini");
	}
	if(dc.scrollTop()>=750){
		$("#header").addClass("mini1");
	}
	else{
		$("#header").removeClass("mini1");
	}
	if(dc.scrollTop()>=750){
		$("#subnav").addClass("mini2");
	}else{
		$("#subnav").removeClass("mini2");
	}
})
