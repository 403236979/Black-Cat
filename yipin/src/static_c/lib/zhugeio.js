(function () {
    window.zhuge = window.zhuge || [];
    window.zhuge.methods = "_init debug identify track trackLink trackForm page".split(" ");
    window.zhuge.factory = function(b) {
        return function() {
            var a = Array.prototype.slice.call(arguments);
            a.unshift(b);
            window.zhuge.push(a);
            return window.zhuge;
        }
    };
    for (var i = 0; i < window.zhuge.methods.length; i++) {
        var key = window.zhuge.methods[i];
        window.zhuge[key] = window.zhuge.factory(key);
    }
    window.zhuge.load = function(b, x) {
        if (!document.getElementById("zhuge-js")) {
            var a = document.createElement("script");
            var verDate = new Date();
            var verStr = verDate.getFullYear().toString()
                + verDate.getMonth().toString() + verDate.getDate().toString();

            a.type = "text/javascript";
            a.id = "zhuge-js";
            a.async = !0;
            a.src = (location.protocol == 'http:' ? "http://sdk.zhugeio.com/zhuge.min.js?v=" : 'https://zgsdk.zhugeio.com/zhuge.min.js?v=') + verStr;
            a.onerror = function(){
                window.zhuge.identify = window.zhuge.track = function(ename, props, callback){
                    if(callback && Object.prototype.toString.call(callback) === '[object Function]')callback();
                };
            };
            var c = document.getElementsByTagName("script")[0];
            c.parentNode.insertBefore(a, c);
            window.zhuge._init(b, x)
        }
    };
    window.zhuge.load('78391994e3664551a58e29348d1c2710');
})();

function zhugeioWithTrack(track, phone) {
    zhuge.identify(phone);
    zhuge.track(track);
}

if (location.host == "www.beichoo.com") {
    //百度统计
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?7c9444b1224edcb254b099818540d8a7";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
}