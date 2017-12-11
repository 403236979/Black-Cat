/****************************************************************************
jQuery插件AjaxFileUpload可以实现ajax文件上传 (2011-01-20 17:54:44)

jQuery插件AjaxFileUpload可以实现ajax文件上传，该插件使用非常简单，首先了解一下
正确使用AjaxFileUpload插件的方法，然后再了解一些常见的错误信息和解决方法。

使用说明:需要使用jQuery库文件 和AjaxFileUpload库文件

使用实例
	http://www.phpletter.com/contents/ajaxfileupload/ajaxfileupload.js

一，包含文件部分
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="ajaxfileupload.js"></script>

二，HTML部分
	<img id="loading " src="loading.gif" style="display:none;">
	<input id="fileToUpload " type="file" size="20" name="fileToUpload " class="input">
	<button class="button" id="buttonUpload" onclick="return ajaxFileUpload ();">上传</button>
	只需要三个元素，一个动态加载小图标、一个文件域和一个按钮
	注意：使用AjaxFileUpload插件上传文件可不需要form，因为AjaxFileUpload插件会自动生成一个form提交表单。
	对于file文件域ID和name，ajaxFileUpload插件fileElementId参数需要获取文件域ID，如果处理上传文件操作就
	需要知道文件域name，以便获取上传文件信息，这两者关系一定要清楚。

三，javascript部分
<script type="text/javascript">
function ajaxFileUpload (){
	loading();//动态加载小图标
	$.ajaxFileUpload ({
		url :'upload.php',
		secureuri :false,
		fileElementId :'fileToUpload',
		dataType : 'json',
		success : function (data, status){
			if(typeof(data.error) != 'undefined'){
				if(data.error != ''){
					alert(data.error);
				}else{
					alert(data.msg);
				}
			}
		},
		error: function (data, status, e){alert(e);}
	})
	return false;
}

function loading (){
	$("#loading ").ajaxStart(function(){
		$(this).show();
	}).ajaxComplete(function(){
		$(this).hide();
	});
}
</script>

主要参数说明：
1，url表示处理文件上传操作的文件路径，可以测试URL是否能在浏览器中直接访问，如上：upload.php
2，fileElementId表示文件域ID，如上：fileToUpload
3，secureuri是否启用安全提交，默认为false
4，dataType数据数据，一般选json，javascript的原生态
5，success提交成功后处理函数
6，error提交失败处理函数
上面有两个方法，一个动态加载小图标提示函数loading()和ajaxFileUpload文件上传$.ajaxFileUpload()函数，这与我们使用jQuery.ajax()函数差不多，使用很简单，这里我省略了PHP处理上传文件，使用jQuery插件 AjaxFileUpload实现ajax文件就这么简单。
同时我们需要了解相关的错误提示
1，SyntaxError: missing ; before statement错误
如果出现这个错误就需要检查url路径是否可以访问
2，SyntaxError: syntax error错误
如果出现这个错误就需要检查处理提交操作的PHP文件是否存在语法错误
3，SyntaxError: invalid property id错误
如果出现这个错误就需要检查属性ID是否存在
4，SyntaxError: missing } in XML expression错误
如果出现这个错误就需要检查文件域名称是否一致或不存在
5，其它自定义错误
大家可使用变量$error直接打印的方法检查各参数是否正确，比起上面这些无效的错误提示还是方便很多。
使用jQuery插件AjaxFileUpload实现无刷新上传文件非常实用，由于其简单易用，因些这个插件相比其它文件上传插件使用人数最多，非常值得推荐。
 
处理页面：
using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
public partial class web_ajax_FileUpload : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        HttpFileCollection files = HttpContext.Current.Request.Files;

        //if (files[0].ContentLength > 5)
        //{
        //    Response.Write("{");
        //    Response.Write("msg:'" + files[0].FileName + "',");
        //    Response.Write("error:'文件上传失败'");
        //    Response.Write("}");
        //}
        //else
        //{
        //    Response.Write("{");
        //    Response.Write("msg:'没有文件被上传',");
        //    Response.Write("error:'文件上传失败'");
        //    Response.Write("}");
        //}
        files[0].SaveAs("d:/adw.jpg");
        Response.Write("{");
        Response.Write("msg:'a',");
        Response.Write("error:''");
        Response.Write("}");
        //Response.Write("{");
        //Response.Write("msg:'ggg\n',");
        //Response.Write("error:'aa\n'");
        //Response.Write("}");
        Response.End();
    }
}
****************************************************************************/
jQuery.extend({
	

	handleError: function( s, xhr, status, e )  {
		// If a local callback was specified, fire it
		if ( s.error ) {
			s.error.call( s.context || s, xhr, status, e );
		}
		// Fire the global callback
		if ( s.global ) {
			(s.context ? jQuery(s.context) : jQuery.event).trigger( "ajaxError", [xhr, s, e] );
		}
	},	


    createUploadIframe: function(id, uri)
	{
			//创建框架
            var frameId = 'jUploadFrame' + id;
            var iframeHtml = '<iframe id="' + frameId + '" name="' + frameId + '" style="position:absolute; top:-9999px; left:-9999px"';
			if(window.ActiveXObject)
			{
                if(typeof uri== 'boolean'){
					iframeHtml += ' src="' + 'javascript:false' + '"';

                }
                else if(typeof uri== 'string'){
					iframeHtml += ' src="' + uri + '"';

                }	
			}
			iframeHtml += ' />';
			jQuery(iframeHtml).appendTo(document.body);

            return jQuery('#' + frameId).get(0);			
    },

	createUploadForm: function(id, fileElementId, data)
	{
		//创建表单
		var formId = 'jUploadForm' + id;
		var fileId = 'jUploadFile' + id;
		var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>');	
		if(data)
		{
			for(var i in data)
			{
				jQuery('<input type="hidden" name="' + i + '" value="' + data[i] + '" />').appendTo(form);
			}			
		}		
		var oldElement = jQuery('#' + fileElementId);
		var newElement = jQuery(oldElement).clone();
		jQuery(oldElement).attr('id', fileId);
		jQuery(oldElement).before(newElement);
		jQuery(oldElement).appendTo(form);


		
		//set attributes
		jQuery(form).css('position', 'absolute');
		jQuery(form).css('top', '-1200px');
		jQuery(form).css('left', '-1200px');
		jQuery(form).appendTo('body');		
		return form;
    },

    ajaxFileUpload: function(s) {
        // TODO introduce global settings, allowing the client to modify them for all requests, not only timeout		
        // TODO 引入全局设置, allowing the client to modify them for all requests, not only timeout		
        s = jQuery.extend({}, jQuery.ajaxSettings, s); //初始化
        var id = new Date().getTime();
		var form = jQuery.createUploadForm(id, s.fileElementId, (typeof(s.data)=='undefined'?false:s.data)); //创建表单
		var io = jQuery.createUploadIframe(id, s.secureuri); //创建框架
		var frameId = 'jUploadFrame' + id;
		var formId = 'jUploadForm' + id;		
        // 从求中监视新的设置 Watch for a new set of requests
        if ( s.global && ! jQuery.active++ )
		{
			jQuery.event.trigger( "ajaxStart" );
		}            
        var requestDone = false;
        // 创建请求对象 Create the request object
        var xml = {}   
        if ( s.global )
            jQuery.event.trigger("ajaxSend", [xml, s]);
        // 等待响应返回 Wait for a response to come back
        var uploadCallback = function(isTimeout)
		{			
			var io = document.getElementById(frameId);
            try 
			{				
				if(io.contentWindow)
				{
					 xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
                	 xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;
					 
				}else if(io.contentDocument)
				{
					 xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
                	xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
				}						
            }catch(e)
			{
				jQuery.handleError(s, xml, null, e);
			}
            if ( xml || isTimeout == "timeout") 
			{				
                requestDone = true;
                var status;
                try {
                    status = isTimeout != "timeout" ? "success" : "error";
                    // 确保请求已经成功或 Make sure that the request was successful or notmodified
                    if ( status != "error" )
					{
                        // process the data (runs the xml through httpData regardless of callback)
                        var data = jQuery.uploadHttpData( xml, s.dataType ); //数据类型
                        // 如果指定一个本地回调函数，清除并用它传递数据 If a local callback was specified, fire it and pass it the data
                        if ( s.success )
                            s.success( data, status );
    
                        // 解除这个回调函数 Fire the global callback
                        if( s.global )
                            jQuery.event.trigger( "ajaxSuccess", [xml, s] );
                    } else
                        jQuery.handleError(s, xml, status);
                } catch(e) 
				{
                    status = "error";
                    jQuery.handleError(s, xml, status, e);
                }

                // 完成该请求 The request was completed
                if( s.global )
                    jQuery.event.trigger( "ajaxComplete", [xml, s] );

                // 处理AJAX计数 Handle the global AJAX counter
                if ( s.global && ! --jQuery.active )
                    jQuery.event.trigger( "ajaxStop" );

                // 返回结束进程 Process result
                if ( s.complete )
                    s.complete(xml, status);

                jQuery(io).unbind()

                setTimeout(function()
									{	try 
										{
											jQuery(io).remove();
											jQuery(form).remove();	
											
										} catch(e) 
										{
											jQuery.handleError(s, xml, null, e);
										}									

									}, 100)

                xml = null

            }
        }
        // 超时检查 Timeout checker
        if ( s.timeout > 0 ) 
		{
            setTimeout(function(){
                // 查看请求是否静止状态 Check to see if the request is still happening
                if( !requestDone ) uploadCallback( "timeout" );
            }, s.timeout);
        }
        try 
		{

			var form = jQuery('#' + formId);
			jQuery(form).attr('action', s.url); //加入动作属性
			jQuery(form).attr('method', 'POST'); //加入方法属性
			jQuery(form).attr('target', frameId); //加入目标属性
            if(form.encoding) //加入编码属性
			{
				jQuery(form).attr('encoding', 'multipart/form-data');      			
            }
            else
			{	
				jQuery(form).attr('enctype', 'multipart/form-data');			
            }			
            jQuery(form).submit();

        } catch(e) //出错处理
		{			
            jQuery.handleError(s, xml, null, e);
        }
		
		jQuery('#' + frameId).load(uploadCallback	); //回调函数
        return {abort: function () {}};	

    },

    uploadHttpData: function( r, type ) {
        var data = !type;
        data = type == "xml" || data ? r.responseXML : r.responseText;
        // If the type is "script", eval it in global context
        if ( type == "script" )
            jQuery.globalEval( data );
        // Get the JavaScript object, if JSON is used.
        if ( type == "json" )
            eval( "data = " + data );
        // evaluate scripts within html
        if ( type == "html" )
            jQuery("<div>").html(data).evalScripts();

        return data;
    }
})

/****************************************************************
通过Javascript清除表单中的文件上传控件的值

起因：有很多input文件上传控件同时在一个form表单中出现，现要清空文件上传控件的值。但是文件上传控件的值是只读的，不能够通过js直接修改。
思路：form表单有一个reset()方法。
方法：在事件发生的时候，把要收拾的input抓出来，扔到一个临时的form元素中，把临时form重置，form下面的每一个控件的值为空了，文件上传的控件的值也清空了，然后再把input丢回原来的位置。
结果：搞定。
效果：兼容IE6/7,firefox2/3,opera9,google chrome。

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Upload.clear</title>
    <style type="text/css">
        </style>
    <script type="text/javascript">
    
        //建立一个类
        var Upload = {
        
        
        //类方法,清除一个上传控件的内容
        clear: function(id) {
        
                //如果传过来的参数是字符,则取id为该字符的元素,如果无此元素,则返回空
                var up = (typeof id == "string") ? document.getElementById(id) : id;
                if (typeof up != "object") return null;
                
                //创建一个span元素
                var tt = document.createElement("span");
                //添加id,以便后面使用
                tt.id = "__tt__";
                up.parentNode.insertBefore(tt, up);
                
                //创建一个form
                var tf = document.createElement("form");
                //将上传控件追加为form的子元素
                tf.appendChild(up);
                
                //将form加入到body
                document.getElementsByTagName("body")[0].appendChild(tf);
                
                //利用重置来清空上传控件内容
                tf.reset();
                
                //所上传控件放回原来的位置
                tt.parentNode.insertBefore(up, tt);
                
                //除上面创建的这个span
                tt.parentNode.removeChild(tt);
                tt = null;
                
                //移除上面临时创建的form
                tf.parentNode.removeChild(tf);
            },
            
            //类方法,清除多个上传控件的内容
            clearForm: function() {
            var inputs, frm;
                
                //如果没有参数传递过来,则获取所有inpur类型的控件
                if (arguments.length == 0) {
                    inputs = document.getElementsByTagName("input");
                } 
                //如果有参数传递过来
                else {
                    //如果传一个ID过来,则取得该ID的元素,否则直接使用该元素
                    frm = (typeof arguments[0] == "string") ? document.getElementById(arguments[0]) : arguments[0];
                    
                    //如果不是一个object对象,返回null
                    if (typeof frm != "object") return null;
                    
                    //如果传递的是一个object对象,取得这个对象内所有的input类型的元素
                    inputs = frm.getElementsByTagName("input");
                }
                
                //遍历所有获取的元素,如果是上传控件类型,则加入到一个数组的末尾.
                var fs = [];
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].type == "file") fs[fs.length] = inputs[i];
                }

                //创建一个form元素
                var tf = document.createElement("form");
                for (var i = 0; i < fs.length; i++) {
                
                    //每个上传控件前创建一个span元素,用来标记它的位置,而span不会影响它的样式
                    var tt = document.createElement("span");
                    //为每个span加一个id,以便后面将上传控件放回原来位置
                    tt.id = "__tt__" + i;
                    
                    //将这个span元素作为组中的每一个上传控件的兄弟元素插入到每一个上传控件之前
                    fs[i].parentNode.insertBefore(tt, fs[i]);
                    
                    //将这个上传控件追加到新创建的form中
                    tf.appendChild(fs[i]);
                }
                
                //将新创建的form追加到页面body中
                document.getElementsByTagName("body")[0].appendChild(tf);
                
                //重置form,以便清空各上传控件的值.(利用重置来清空内容)
                tf.reset();
                
                //将各个上传控件重新放回到原来的位置
                for (var i = 0; i < fs.length; i++) {
                    var tt = document.getElementById("__tt__" + i);
                    tt.parentNode.insertBefore(fs[i], tt);
                    tt.parentNode.removeChild(tt);
                }
                tf.parentNode.removeChild(tf);
            }
        } 
    </script>
</head>
<body>
    <form name="f" id="f" method="post">
    <input type="file" name="f1" id="f1" />
    <input type="button" value="clear" onclick="Upload.clear('f1')" /><br />
    <input type="file" name="f2" id="f2" /><br />
    <input type="file" name="f3" id="f3" /><br />
    <input type="file" name="f4" id="f4" /><br />
    <input type="file" name="f5" id="f5" /><br />
    <input type="file" name="f6" id="f6" /><br />
    <input type="file" name="f7" id="f7" /><br />
    <input type="file" name="f8" id="f8" /><br />
    <input type="button" value="clearAll" onclick="Upload.clearForm()" /><br />
    <input type="submit" value="submit" /><input type="reset" value="reset" />
    </form>
    <form name="form" id="form" method="post">
    <input type="file" name="f9" id="f9" /><br />
    <input type="file" name="f10" id="f10" /><br />
    <input type="button" value="clearThisForm" onclick="Upload.clearForm('form')" />
    </form>
</body>
</html>
****************************************************************/
var Upload = { //建立一个类
	//类方法,清除一个上传控件的内容
	clear: function(id) {
		//如果传过来的参数是字符,则取id为该字符的元素,如果无此元素,则返回空
		var up = (typeof id == "string") ? document.getElementById(id) : id;
		if (typeof up != "object") return null;
                
		//创建一个span元素
		var tt = document.createElement("span");
		//添加id,以便后面使用
		tt.id = "__tt__";
		up.parentNode.insertBefore(tt, up);
                
		//创建一个form
		var tf = document.createElement("form");
		//将上传控件追加为form的子元素
		tf.appendChild(up);
                
		//将form加入到body
		document.getElementsByTagName("body")[0].appendChild(tf);
                
		//利用重置来清空上传控件内容
		tf.reset();
                
		//所上传控件放回原来的位置
		tt.parentNode.insertBefore(up, tt);
                
		//除上面创建的这个span
		tt.parentNode.removeChild(tt);
		tt = null;
                
		//移除上面临时创建的form
		tf.parentNode.removeChild(tf);
	},
            
	//类方法,清除多个上传控件的内容
	clearForm: function() {
		var inputs, frm;
                
		//如果没有参数传递过来,则获取所有inpur类型的控件
		if (arguments.length == 0) {
			inputs = document.getElementsByTagName("input");
		}else { //如果有参数传递过来
			//如果传一个ID过来,则取得该ID的元素,否则直接使用该元素
			frm = (typeof arguments[0] == "string") ? document.getElementById(arguments[0]) : arguments[0];
                    
			//如果不是一个object对象,返回null
			if (typeof frm != "object") return null;
                    
			//如果传递的是一个object对象,取得这个对象内所有的input类型的元素
			inputs = frm.getElementsByTagName("input");
		}
                
		//遍历所有获取的元素,如果是上传控件类型,则加入到一个数组的末尾.
		fs = [];
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].type == "file") fs[fs.length] = inputs[i];
		}

		//创建一个form元素
		var tf = document.createElement("form");
		for (var i = 0; i < fs.length; i++) {
                
			//每个上传控件前创建一个span元素,用来标记它的位置,而span不会影响它的样式
			var tt = document.createElement("span");
			//为每个span加一个id,以便后面将上传控件放回原来位置
			tt.id = "__tt__" + i;
                    
			//将这个span元素作为组中的每一个上传控件的兄弟元素插入到每一个上传控件之前
			fs[i].parentNode.insertBefore(tt, fs[i]);
                    
			//将这个上传控件追加到新创建的form中
			tf.appendChild(fs[i]);
		}
                
		//将新创建的form追加到页面body中
		document.getElementsByTagName("body")[0].appendChild(tf);
                
		//重置form,以便清空各上传控件的值.(利用重置来清空内容)
		tf.reset();
                
		//将各个上传控件重新放回到原来的位置
		for (var i = 0; i < fs.length; i++) {
			var tt = document.getElementById("__tt__" + i);
			tt.parentNode.insertBefore(fs[i], tt);
			tt.parentNode.removeChild(tt);
		}
		tf.parentNode.removeChild(tf);
	}
} 

