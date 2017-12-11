//调用wow()动画方法
$(function(){
	new WOW().init();
})	
$(function(){	
	var imgId=$(".dropdown-menu");
	$(".dropdown").click(function(){
		imgId.stop().toggle();
	})
})

//滚动条滚动时，导航margin-top变化
var header=$("#header");//得到头部对象
var win=$(window);//得到窗口对象
var dc=$(document);//得到document文档对象
win.scroll(function(){
	console.log(dc.scrollTop());
	if(dc.scrollTop()>=36){
		$("#header").addClass("mini mini1");
		$("#header").css("height","60px");
		$("#logo").css("margin-top","5px");
		$("#example-navbar-collapse").css("margin-top","0px");
		$(".navbar-toggle").css("top","15px");
	}else{
		$("#header").removeClass("mini mini1");
		$("#header").css("height","90px");
		$("#logo").css("margin-top","10px");
		$("#example-navbar-collapse").css("margin-top","10px");
		$(".navbar-toggle").css("top","25px");
	}
	if(dc.scrollTop()>=10){
		$("#top").css("display","block");
	}else{
		$("#top").css("display","none");
	}
})
//弹出隐藏层

$(function(){
  $("#e").click(function() {
      $("#news").addClass("news2");
      $("#news").removeClass("news3");
  }); 
 })

//关闭弹出层
$(function(){
  $("#g").click(function() {
//    $("#news").removeClass("news2"); 
      $("#news").addClass("news3");
      
  }); 
 })

//弹出二维码
function Show(bg_div)
{
document.getElementById(bg_div).style.display='block' ;
};
//关闭二维码
function Close(show_div)
{
document.getElementById(show_div).style.display='none';
};

//点击回到顶部
$(function(){
  $("#top").click(function() {
      $("html,body").animate({scrollTop:0}, 500);
  }); 
 })