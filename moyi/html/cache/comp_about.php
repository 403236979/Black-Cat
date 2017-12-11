<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <title>UEMO DEMO - mo005_2232</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/chushihua.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/iconfont.css"/>         
        <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/animate.min.css" />
        <link rel="stylesheet" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/bootsnav.css">
	    <link href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/about.css"/> 
        <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/wow.min.js"></script>
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/jquery-1.11.0.min.js"></script>		    
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/iconfont.js"></script>
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/bootstrap.min.js"></script>	
	    <script type="text/javascript" src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/bootsnav.js"></script>
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/chanping.js"></script>
	</head>
	<body>	
		<div class="demo" >
	<div class="row" style="margin-right: 0px;">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-mobile bootsnav" id="header" style="height: 90px;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse" style="top: 15px;">
						<span class="sr-only">切换导航</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo" id="logo" style="margin-top: 10px;">
						<a class="navbar-brand" style="padding: 0px 15px;">
							<div class="navbar-left">
								<img width="60%" style="margin: auto;" src="<?php echo $this->ffwbms_vars["langset_ary"][logo] ?>">
							</div>
						</a>
					</div>						
				</div>
				<div class="collapse navbar-collapse  navbar-right nav-list" id="example-navbar-collapse">
					<ul class="nav navbar-nav nav-menu clearfix" data-in="fadeInDown" data-out="fadeOutUp">
						<li >
							<a style="color: rgb(153, 153, 153);" href="/" <?php if ($this->ffwbms_vars["get_ary"][sno] == ""){  ?>class="active"<?php } ?>  ><span data-title= "首页">首页</span></a>
						</li>
						<?php $this->ffwbms_get_value(' ffa_sort_list ',' vtemp ', 'pid = 1'); ?><!--ffa_sort_list获得分类列表-->
				            <?php $this->ffwbms_vars["a"] = 1 ?>
				            <?php foreach( $this->ffwbms_vars["vtemp"] as $this->ffwbms_vars["ary"]){ ?>
				            <?php $this->ffwbms_get_value(' ffa_sort_list ',' vtemp2 ', 'pid = ' .$this->ffwbms_vars["ary"][id]); ?>  <!--ffa_sort_list获得分类列表-->
				            <li <?php if ($this->ffwbms_vars["ary"][id] == 15){  ?>class="dropdown"<?php } ?>>
				            	<a style="color: rgb(153, 153, 153);"
				            		<?php if ($this->ffwbms_vars["ary"][id] != 15){  ?>href="<?php echo $this->ffwbms_vars["get_ary"]['SCRIPT_NAME'] ?>?tpl=<?php echo $this->ffwbms_vars["ary"][spage] ?>&pid=<?php echo $this->ffwbms_vars["ary"][id] ?>&sno=<?php echo $this->ffwbms_vars["a"] ?>&list=1&pg=1"<?php } ?> 						            			
				            		<?php if ($this->ffwbms_vars["get_ary"][sno] ==$this->ffwbms_vars["a"]){  ?>class="active"<?php } ?>						           
				            		<?php if ($this->ffwbms_vars["ary"][id] == 21){  ?>id="nav-list-login"<?php } ?>						            
				            		<?php if ($this->ffwbms_vars["ary"][id] == 22){  ?>id="nav-list-regsiter"<?php } ?> >
				            		<span data-title= "<?php echo $this->ffwbms_vars["ary"][sname] ?>"><?php echo $this->ffwbms_vars["ary"][sname] ?></span>
				            		<?php $this->ffwbms_get_value(' ffa_sort_list ',' vtemp2 ', 'pid = ' .$this->ffwbms_vars["ary"][id]); ?>  <!--ffa_sort_list获得分类列表-->
						    		<?php if ($this->ffwbms_vars["ary"][id] == 15){  ?><i class="iconfont icon-xia" style="font-size: 12px;"></i><?php } ?>
						    	</a>

				                <!--二级栏目开始-->

								   	<?php if ($this->ffwbms_vars["ary"][id] == 15){  ?>
				                	<?php $this->ffwbms_vars["b"] = 1 ?>	
				                	<ul class="dropdown-menu"> 
							    	<?php foreach( $this->ffwbms_vars["vtemp2"] as $this->ffwbms_vars["arry"]){ ?>
								    	<li style="white-space: nowrap;">
								    		<a href="?tpl=<?php echo $this->ffwbms_vars["arry"][spage] ?>&pid=<?php echo $this->ffwbms_vars["ary"][id] ?>&id=<?php echo $this->ffwbms_vars["arry"][id] ?>&sno=<?php echo $this->ffwbms_vars["a"] ?>&list=<?php echo $this->ffwbms_vars["b"] ?>"><?php echo $this->ffwbms_vars["arry"][sname] ?>								    			
								    		</a>
								    	</li>
								    	
								    <?php $this->ffwbms_vars["b"] ++ ?>
								    <?php } ?>
								   
								    </ul>
								    <?php } ?> 								
				    		</li>
			            <?php $this->ffwbms_vars["a"] ++ ?>
			            <?php } ?>
					</ul>
				</div>						
			</nav>
		</div>
	</div>
</div>


		<!--侧边消息条-->
		<div class="news" id="news">
			<div class="news-title">
				在线咨询<button id="g" style="padding-left:40%;">&Chi;</button>
			</div>
			<ul class="news-qq">
				<li>
					<a href="tencent://message/?uin=121799830&amp;Site=uelike&amp;Menu=yes" style=" color: #333;">
						<i class="iconfont icon-qq" style="padding-right: 10%;"></i>121799830
					</a>
				</li>
				<li>
					<a href="tencent://message/?uin=407280793&amp;Site=uelike&amp;Menu=yes" style=" color: #333;">
						<i class="iconfont icon-qq" style="padding-right: 10%;"></i>407280793
					</a>
				</li>
			</ul>
		    <div class="news-tel">
		    	<p style="padding-top: 10px;">
		    		<i class="iconfont icon-dianhua" style="padding-right: 22%;"></i>联系电话
	    		</p>
		       <p style="font-size: 15px;">010-69557550</p>
		    </div>
		</div>
		<div class="guild">
			<ul>
				<li style="background-color: #292929;">
					
					<a id="e">
						<i class="iconfont icon-xinxi"></i>
					</a>
				</li>
				<li style="background-color: #ea493c;">
					<a> 
				        <i class="iconfont icon-weibo"></i>
			        </a>
			    </li>
			    <li style="background-color: #24b727">
				    <a onclick="Show('fixed_weixin')">
				        <i class="iconfont icon-shouji"></i>
			        </a>
			    </li>
			    <li style="display: none;background-color: #292929;" id="top">
					<a>
				       <i class="iconfont icon-shang"></i>
			        </a>
			    </li>
			</ul>
		</div>		
		<!--全屏二维码-->
		<div class="fixed" id="fixed_weixin" onclick="Close('fixed_weixin')">
			<div class="fixed-container">
				<div id="qrcode">
					<canvas width="220" height="220" style="display: none;"></canvas>
					<img src="<?php echo $this->ffwbms_vars["langset_ary"][QRcode] ?>" style="display: block;">
				</div>
				<p style="text-align: center;">扫描二维码分享到微信</p>
			</div>
		</div>

			
		<!--内容-->
		<div class="container">
			<div class="a"></div>
			<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
	        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 32'); ?>
	        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>		        
	        <div class="header">
				<p style="font-family:'微软雅黑'; font-size: 22px;"><?php echo $this->ffwbms_vars["arry"][atit] ?></p>
				<p style="font-family:'微软雅黑'; font-size: 14px;"><?php echo $this->ffwbms_vars["arry"][stit] ?></p>
			</div>			
			<div class="content">
				<div class="content-product" style="padding-top: 2%;">
					<div class="content-product-img col-xs-12 col-sm-12 col-md-5 col-lg-5">
						<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>"/>
					</div>
					<div class="content-product-text col-xs-12 col-sm-12 col-md-7 col-lg-7">
						<?php echo $this->ffwbms_vars["arry"][atxt] ?>
				        <p><br></p>
					</div>
					<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
			        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 34'); ?>
			        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>
				    <div class="content-product-footer">
				    	<?php echo $this->ffwbms_vars["arry"][atxt] ?>
				    	<p><br></p>
				    </div>
				    <p style="border-top: 1px dotted #ADADAD; margin-top:10px;width: 100%;float: left;"><br></p>
				</div>
			    <div class="content-us">
			    	<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
			        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 35'); ?>
			        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>
			    	<div class="content-us-text">
			    		<p style="text-align: center;color: rgb(12, 12, 12); font-size: 20px;"><?php echo $this->ffwbms_vars["arry"][atit] ?></p>
			    		<p style="text-align: center;color: rgb(165, 165, 165); font-size: 14px;"><?php echo $this->ffwbms_vars["arry"][stit] ?><br></p>
			    		<p><br></p>
			    		<?php echo $this->ffwbms_vars["arry"][atxt] ?>
			    		<p><br></p>
			    		<p style="padding: 2% 0;">
			    			<img style="margin: 0 auto; width: 80%;" src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>"/>
			    		</p>
			    		<p style="text-align: center;font-family: 微软雅黑;font-size: 13px;">
			    			优艺客全力打造UEMO，让更多的用户可以拥有一套低成本、高品质的网站。
			    		</p>
			    		<div class="content-us-text-middle clearfix">
			    			<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
					        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 36'); ?>
					        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>
			    			<div class="content-us-text-left col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    		<p>
					    			<img style="width: 80%;margin: auto;" src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>">
					    		</p>
			    			</div>
				    		<div class="content-us-text-right col-xs-12 col-sm-8 col-md-8 col-lg-8">
				    			<?php echo $this->ffwbms_vars["arry"][atxt] ?>
				    		</div>
			    		</div>
			    		<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
					        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 37'); ?>
					        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>
			    		<div class="content-us-text-footer">
			    			<p><strong><span style="font-size: 16px;color: rgb(38, 38, 38);"><?php echo $this->ffwbms_vars["arry"][atit] ?></span></strong></p>
			    			<p><br></p>
			    			<?php echo $this->ffwbms_vars["arry"][atxt] ?>
			    			<p><br></p>
			    		</div>
			    	</div>
			    </div>
			    <?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
		        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 38'); ?>
		        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>
			    <div class="content-request">
			    	<p><strong><span style="font-size: 22px;color: rgb(38, 38, 38);"><?php echo $this->ffwbms_vars["arry"][atit] ?><br></strong></span></p>
			    	<p><br></p>
			    	<?php echo $this->ffwbms_vars["arry"][atxt] ?>
			    	<p style="border-top: 1px dotted #ADADAD; margin-top:10px;width: 100%;float: left;"><br></p>
			    </div>
			    <?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 23'); ?><!--获得文章分页列表-->           
		        <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = 39'); ?>
		        <?php $this->ffwbms_vars["time"] = substr($this->ffwbms_vars["ary"][scdt] , 0 , 10 ) ?>
			    <div class="content-other">
			    	<p><strong><span style="font-size: 22px;color: rgb(38, 38, 38);"><?php echo $this->ffwbms_vars["arry"][atit] ?><br></strong></span></p>
			    	<p><br></p>
			    	<?php echo $this->ffwbms_vars["arry"][atxt] ?>
			    	<p><br><br></p>
			    	<p>
			    		<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>" width="100%">
			    	</p>
			    </div>
			</div>
	    </div>
	    <!--页脚-->
	    <!--页脚-->
<div class="foot">
	<div style="width: 80%;margin: auto;">
      	<p style="text-align: center; padding-top: 1%;">
      		<span style="font-family: '微软雅黑';font-size: 10px; color:#737373;">
      	   		COPYRIGHT (©)<?php echo $this->ffwbms_vars["wset_ary"]['currY'] ?> <?php echo $this->ffwbms_vars["wset_ary"]["SITE_NAME"] ?> 
         	</span>	
	      	<span  style="color: #737373; font-size: 10px;margin-left: 10px;"><?php echo $this->ffwbms_vars["wset_ary"]["SITE_ICP"] ?></span>
	      	<span style=" color:#737373; font-size: 10px; display: inline-block;">
	      		技术支持
	      	</span>
	      	<a href="http://www.vikihui.com" target="_blank" style="display: inline-block;">
      			<img src="<?php echo $this->ffwbms_vars["langset_ary"][foot] ?>" width="50%">
      		</a>
      		<!--$wset_ary  currY：当前日期年；SITE_NAME：当前页面语种的网站名；SITE_ICP：网站备案号-->
      	</p>
  	</div>
</div>
	</body>
</html>
