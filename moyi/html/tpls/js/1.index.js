//调用wow()动画方法
$(function(){
	new WOW().init();
	
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
//	console.log(dc.scrollTop());
	if(dc.scrollTop()>=36){
		$("#header").addClass("mini");
		$("#header").css("height","60px");
		$("#example-navbar-collapse").css("margin-top","0px");
		$("#logo").css("margin-top","5px");
//		$("#header").css("border-bottom","solid 1px #e0e0e0");
		$(".navbar-toggle").css("top","15px");
	}else{
		$("#header").removeClass("mini");
		$("#header").css("height","90px");
		$("#example-navbar-collapse").css("margin-top","10px");
		$("#logo").css("margin-top","10px");
//		$("#header").css("border-bottom","solid 0px #e0e0e0");
		$(".navbar-toggle").css("top","25px");
	}

	if(dc.scrollTop()>=36){
		$("#top").css("display","block");
	}else{
		$("#top").css("display","none");
	}
	
	if(dc.scrollTop()>=800){
		$("#header").addClass("mini1");
	}
	else{
		$("#header").removeClass("mini1");
	}
	if(dc.scrollTop()>=800){
		$("#subnav").addClass("mini2");
	}else{
		$("#subnav").removeClass("mini2");
	}
	if(dc.scrollTop()>=400){		
		$("#news").addClass("mini3")
	}
	else{
		$("#news").removeClass("mini3");
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

//弹出队员框
$(function(){
  $("#u1").click(function() {
  	  $("#z").css("margin-left","12.5%");
  	  $("#h").css("transform","translate3d(0, 0px, 0px)");
//    $("#h").addClass("news9");
//    $("#h").removeClass("news10");
//    $("#h").removeClass("news11");
//    $("#h").removeClass("news12");
//    $("#a").css("display","block");
//    $("#b").css("display","none");
//    $("#c").css("display","none");
//    $("#d").css("display","none");
  }); 
 })

$(function(){
  $("#u2").click(function() {
  	$("#z").css("margin-left","39.5%");
  	$("#h").css("transform","translate3d(-11%, 0px, 0px)");
//    $("#h").addClass("news10");
//    $("#h").removeClass("news9");
//    $("#h").removeClass("news11");
//    $("#h").removeClass("news12");
//    $("#b").style.display='block' ;
//    $("#a").css("display","none");
//    $("#c").css("display","none");
//    $("#d").css("display","none");
  }); 
 })

$(function(){
  $("#u3").click(function() {
  	$("#z").css("margin-left","64%");
  	$("#h").css("transform","translate3d(-22%, 0px, 0px)");
//    $("#h").addClass("news11");
//    $("#h").removeClass("news9");
//    $("#h").removeClass("news10");
//    $("#h").removeClass("news12");
//    $("#c").css("display","block");
//    $("#b").css("display","none");
//    $("#a").css("display","none");
//    $("#d").css("display","none");
  }); 
 })

$(function(){
  $("#u4").click(function() {
  	$("#z").css("margin-left","86.5%");
  	$("#h").css("transform","translate3d(-33%, 0px, 0px)");
//    $("#h").addClass("news12");
//    $("#h").removeClass("news9");
//    $("#h").removeClass("news11");
//    $("#h").removeClass("news10");
//    $("#d").css("display","block");
//    $("#b").css("display","none");
//    $("#c").css("display","none");
//    $("#a").css("display","none");
  }); 
 })