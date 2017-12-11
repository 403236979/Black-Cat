$("#head").css("width",window.screen.width);
//滑动模块
var slide_num = 0;
var slide = function(img){
    this.img = img;
}
slide.prototype = {
    setStyle:function(){
        var num = this.img.length;
        var ul = $("#slideBox ul");
        ul.css("width",window.screen.width);
        for(var i=1;i<num+1;i++){
            var li = "<li><img src='img/"+ this.img[i-1]+"'style='z-index:"+ (num-i) +" 'key='"+i+"' /></li>";
            ul.append(li)
        }
        $("#slideBox").css("height","911px");
        ul.css("height","911px");
    },
    slide:function(img){
        var num = img.length;
        function play(){
            slide_num++;
            if(slide_num==num){
                slide_num=3
            }
            $("li img[key='" + slide_num + "']").fadeOut(2000);
            if(slide_num==num){
                slide_num=0
            }
            $("li img[key='" + (slide_num + 1) + "']").fadeIn(2000);
        }
        play()
    },
    begain:function(){
        setInterval(function(){
            indexSlide.__proto__.slide(indexSlide.img)
        },4000);
    }
}
var indexImg =[
    "01.jpg",
    "02.jpg",
    "03.jpg"
];
var indexSlide = new slide(indexImg)
indexSlide.setStyle()
indexSlide.begain()
//notes
$(".share a").on("mouseover",function(){
    $(this).find("div").eq(0).find("div").eq(0).css("opacity",0.5)
    $(this).find("div").eq(0).find("div").eq(1).css("opacity",1)
})
$(".share a").on("mouseout",function(){
    $(this).find("div").eq(0).find("div").eq(0).css("opacity",0)
    $(this).find("div").eq(0).find("div").eq(1).css("opacity",0)
})