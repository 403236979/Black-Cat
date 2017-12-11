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
        <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/team.css"/> 
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
			
		<!--成员-->
		<div class="a"></div>
		<div class="content">			
			<ul class="content-list clearfix">
				<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 24|pg = ' .$this->ffwbms_vars["get_ary"]["pg"] .'|ps = 9|ob = 3'); ?>
				<!--{ffwbms ffa_art_astoplist,vte,'pid=24|ob=3'}--->
	            <?php foreach( $this->ffwbms_vars["vtemp"][0] as $this->ffwbms_vars["ary"]){ ?>
	            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
	            <!---{ffwbms_see $arry[pid]}-->
	            <?php if (count( $this->ffwbms_vars["vtemp"] ) > 0){  ?>	            
				<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="content-li wow">
						<a href="?tpl=member&pid=<?php echo $this->ffwbms_vars["get_ary"]['pid'] ?>&uid=<?php echo $this->ffwbms_vars["get_ary"]['uid'] ?>&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=<?php echo $this->ffwbms_vars["get_ary"]['sno'] ?>&list=<?php echo $this->ffwbms_vars["get_ary"]['list'] ?>">
							<div class="content-img">
								<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>">
							</div>
							<div >
								<div class="content-title">
	                              	<p ><strong><?php echo $this->ffwbms_vars["ary"][atit] ?></strong></p>
	                              	<p ><?php echo $this->ffwbms_vars["ary"][stit] ?></p>
	                            </div>
	                            <div class="content-text">
	                            	<?php echo $this->ffwbms_vars["ary"][abs] ?>
	                            </div>
							</div>
						</a>
					</div>
				</li>
                <?php } ?>
                <?php } ?>	
			</ul>			
			<!--手机团队界面-->
			<div class="phone-team">	    		
	    		<ul class="clearfix">
	    			<?php $this->ffwbms_get_value(' ffa_art_pglist ',' vtemp ', 'pid = 24|pg = ' .$this->ffwbms_vars["get_ary"]["pg"] .'|ps = 9|ob = 3'); ?>
	    			<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 24|ob = 3'); ?>
		            <?php foreach( $this->ffwbms_vars["vtemp"][0] as $this->ffwbms_vars["ary"]){ ?>
		            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
		            <!---{ffwbms_see $arry}-->
		            <?php if (count( $this->ffwbms_vars["vtemp"] ) > 0){  ?>
		            <?php if ($this->ffwbms_vars["ary"][id]%2 == 0){  ?>
					<li class="clearfix">
						<a href="?tpl=member&pid=<?php echo $this->ffwbms_vars["get_ary"]['pid'] ?>&uid=<?php echo $this->ffwbms_vars["get_ary"]['uid'] ?>&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=<?php echo $this->ffwbms_vars["get_ary"]['sno'] ?>&list=<?php echo $this->ffwbms_vars["get_ary"]['list'] ?>">
		    				<div class="phone-team-img col-xs-3 col-sm-3">
		    					<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>">
		    				</div>
		    				<div class="phone-team-text col-xs-9 col-sm-9">
		    					<p style=" font-size=16px;color: #000;"><strong style="color: #000000;"><?php echo $this->ffwbms_vars["ary"][atit] ?></strong></p>
	    						<p style="font-size: 10px;color: #898989;"><?php echo $this->ffwbms_vars["ary"][stit] ?></p>
	    						<p style="color: #898989;"><?php echo $this->ffwbms_vars["ary"][abs] ?></p>
		    				</div>
	    				</a>
	    			</li>
	    			<?php } ?>
	    			 <?php if ($this->ffwbms_vars["ary"][id]%2 != 0){  ?>
	    			<li class="clearfix">
	    				<a href="?tpl=member&pid=<?php echo $this->ffwbms_vars["get_ary"]['pid'] ?>&uid=<?php echo $this->ffwbms_vars["get_ary"]['uid'] ?>&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=<?php echo $this->ffwbms_vars["get_ary"]['sno'] ?>&list=<?php echo $this->ffwbms_vars["get_ary"]['list'] ?>">
		    				<div class="phone-team-text col-xs-9 col-sm-9">
		    					<p style=" font-size=16px;color: #000;"><strong style="color: #000000;"><?php echo $this->ffwbms_vars["ary"][atit] ?></strong></p>
	    						<p style="font-size: 10px;color: #898989;"><?php echo $this->ffwbms_vars["ary"][stit] ?></p>
	    						<p style="color: #898989;"><?php echo $this->ffwbms_vars["ary"][abs] ?></p>
		    				</div>
		    				<div class="phone-team-img col-xs-3 col-sm-3">
		    					<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>">
		    				</div>
	    				</a>
	    			</li>
	    			<?php } ?>
	                <?php } ?>
	                <?php } ?>	                
	    		</ul>
	    	</div>
		</div>
	    <!--页码-->
	    <?php if ($this->ffwbms_vars["vtemp"][0] != null){  ?>
		<div class="pagety-box">
			<p>
			    <?php $this->ffwbms_vars["pgg"] =$this->ffwbms_vars["vtemp"][1] ?>
			    <!---{ffwbms_see $pgg }-->
			        <?php $this->ffwbms_vars["vUrl"] =$this->ffwbms_urlspace( $this->ffwbms_vars["get_ary"]['SCRIPT_NAME'] .'?tpl = ' .$this->ffwbms_vars["get_ary"]['tpl'] .'&pid = ' .$this->ffwbms_vars["get_ary"]['pid'] .'&uid = ' .$this->ffwbms_vars["get_ary"]['uid'] .'&list = ' .$this->ffwbms_vars["get_ary"]['list'] .'&sno = ' .$this->ffwbms_vars["get_ary"]['sno'] ) ?>
			    <?php if ($this->ffwbms_vars["pgg"]['current'] != 1){  ?>
			    <a href="<?php echo $this->ffwbms_vars["vUrl"] ?>&pg=1"><img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/pagel.png" alt=""></a>
			    <?php } ?>
			    <?php $this->ffwbms_vars["p"] = intval($this->ffwbms_vars["vtemp"][1][pages] , 10 ) ?>
			    <?php $this->ffwbms_vars["ff"] = 1 ?>
			    <?php while($this->ffwbms_vars["ff"] - 1 <$this->ffwbms_vars["p"]){  ?> 
			    <a href="<?php echo $this->ffwbms_vars["vUrl"] ?>&pg=<?php echo $this->ffwbms_vars["ff"] ?>" class="<?php if ($this->ffwbms_vars["ff"] ==$this->ffwbms_vars["pgg"][current]){  ?>cur<?php } ?>"><?php echo $this->ffwbms_vars["ff"] ?></a>
			    <?php $this->ffwbms_vars["ff"] ++ ?>
			    <?php } ?>
			    <?php if ($this->ffwbms_vars["pgg"]['next'] != 0){  ?>
			    <a href="<?php echo $this->ffwbms_vars["vUrl"] ?>&pg=<?php echo $this->ffwbms_vars["vtemp"][1][pages] ?>"><img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/pager.png" alt=""></a>
			    <?php } ?>
			</p>
		</div>
		<?php } ?>	
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
