<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UEMO DEMO - mo005_2232</title>		
	    <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/chushihua.css"/>
    	<link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/htmleaf-demo.css">	
	    <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/iconfont.css"/> 
		<link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/animate.min.css" />
	    <link rel="stylesheet" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/bootsnav.css">
	    <link href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/font-awesome.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>css/index.css"/> 
	    <!--<link rel="stylesheet" href="css/1.index.css" />-->
		<script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/wow.min.js"></script>
		<script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/jquery-1.11.0.min.js"></script>	
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/iconfont.js"></script>
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/bootstrap.min.js"></script>	
	    <script type="text/javascript" src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/bootsnav.js"></script>
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
		<script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/jquery.waypoints.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/jquery.countup.min.js"></script>
	    <script src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>js/1.index.js"></script>
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

		<!--幻灯片-->
		<div class="a"></div>
		<div id="myCarousel" class="carousel slide" style="margin-top: -10px;position: fixed;z-index:0;" >
			<!-- 轮播（Carousel）项目 -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/lunbo1.jpg" alt="First slide">
				</div>	
				<div class="item">
					<div class="item-text">
						<p class="text-title"> 
							<span style="color:#333">MO-005功能全新升级</span> 
						</p>
						<p class="text-tontent">新增 —— 单屏切换 - 无限复制列表 - 首页广告图模块 - 首页计数器</p>
					</div>
					<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/lunbo2.jpg" alt="Second slide">
				</div>									
				<div class="item">
					<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/lunbo3.jpg" alt="Third slide">
				</div>
				<div class="item ">
					<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/lunbo4.jpg" alt="Fourth slide">
				</div>
			</div>
			<!-- 轮播（Carousel）导航 -->
			<div style="font-size: 35px;color:#ADADAD;" class="carousel-control left" href="#myCarousel" 
			   data-slide="prev">
			    <a>
				   	<span style="background: url(<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/qiehuan.png) no-repeat 0px -8px;height: 10px;width: 38px;display: inline-block;">				   		
				   	</span>
			    </a>
			</div>
			<div style="font-size: 35px;color:#ADADAD;" class="carousel-control right" href="#myCarousel" 
			   data-slide="next">
			    <a>
				   	<span style="background: url(<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/qiehuan.png) no-repeat -54px -8px;height: 10px;width: 38px;display: inline-block;">				   		
				   	</span>
			    </a>
			</div>
			<!--<a style="background-color:rgba(255,255,255,0) ;" class="carousel-control left" href="#myCarousel" 
			   data-slide="prev">&lsaquo;</a>
			<a style="background-color:rgba(255,255,255,0) ;" class="carousel-control right" href="#myCarousel" 
			   data-slide="next">&rsaquo;</a>-->
		</div> 
		<div class="container">	
			<!--统计-->
			<div class="count wow">
		    	<div class="demo clearfix" style="margin: auto;">
		    			<div class="count-text col-xs-3 col-sm-3 col-md-3 col-lg-3">
		    				<p class="p"><span class="counter">16,928</span> <span class="unit">+</span></p>
		    				<p class="p1">累计服务网站</p>
		    			</div>
		    		
		    			<div class="count-text col-xs-3 col-sm-3 col-md-3 col-lg-3">
		    				<p class="p"><span class="counter">66</span> <span class="unit">款</span></p>
		    				<p class="p1">建站产品</p>
		    			</div>
		    		
		    			<div class="count-text col-xs-3 col-sm-3 col-md-3 col-lg-3">
		    				<p class="p"><span class="counter">11</span> <span class="unit">年</span></p>
		    				<p class="p1">高端WEB服务</p>
		    			</div>
		    		
		    			<div class="count-text col-xs-3 col-sm-3 col-md-3 col-lg-3" style="border: 0px;">
		    				<p class="p"><span class="counter">376</span> <span class="unit">+</span></p>
		    				<p class="p1">覆盖城市</p>
		    			</div>
		    	</div>
		    </div>
		    <!--限时特价-->
		    <div class="price wow" style="background-image: url(<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/background1.jpg);">
		    	<div class="price-img">
		    		<a href="/">
		    			<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/image1.png" />
		    		</a>
		    	</div>
		    </div>
		    <!--产品-->
		    <div class="product wow">
		    	<div class="product-title">	
		    		<?php $this->ffwbms_get_value(' ffa_sort_db ',' vte1 ', 'id = 11'); ?><!--获得指定分类号的数据-->
    				<?php $this->ffwbms_get_value(' ffa_art_value ',' vte1_art ', 'id = ' .$this->ffwbms_vars["vte3"][sart]); ?><!--获得指定文章号的文章数据    $vte1[sart]：返回分类所属文章号-->
		    		<p class="product-title-p"><?php echo $this->ffwbms_vars["vte1"][sname] ?></p>
		    		<p class="product-title-p1">
		    			<?php echo $this->ffwbms_vars["vte1"][abs] ?>
		    		</p>		    	    
		    	</div>
		    	<div class="product-nav wow"> 
		    		<a href="/" style="background-color:#0F0F0F; color: #F8F8F8;">全部</a>	
		    		<?php $this->ffwbms_get_value(' ffa_sort_list ',' vtemp ', 'pid = 11'); ?><!--获得当前页面语种的网站结构分类表--> 
		    		<!---{ffwbms_see $vtemp}-->
					<?php $this->ffwbms_vars["a"] = 1 ?>
					<?php foreach( $this->ffwbms_vars["vtemp"] as $this->ffwbms_vars["ary"]){ ?>	
		    		<a <?php if ($this->ffwbms_vars["get_ary"]['list'] ==$this->ffwbms_vars["a"]){  ?>style="background-color:#0F0F0F; color: #F8F8F8;"<?php } ?>href="?tpl=<?php echo $this->ffwbms_vars["ary"][spage] ?>&pid=11&uid=<?php echo $this->ffwbms_vars["ary"][id] ?>&sno=1&list=<?php echo $this->ffwbms_vars["a"] ?>">
		    			
		    		<?php echo $this->ffwbms_vars["ary"][sname] ?>
		    			
		    		</a><!--$ary[spage：返回分类要使用的模板文件名； $ary[sname]：返回分类名  -->
		    		<?php $this->ffwbms_vars["a"] ++ ?>
					<?php } ?>
		    			    		
		    	</div>
		    	<div class="product-list">
		    		<ul style="margin: auto;overflow: hidden;">
		    			<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 11|top = 12|ob = 3'); ?>
			            <?php foreach( $this->ffwbms_vars["vte"] as $this->ffwbms_vars["ary"]){ ?>
			            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
			            <!---{ffwbms_see $arry[pid]}-->
			            <?php if (count( $this->ffwbms_vars["vte"] ) > 0){  ?>
			            <li class="wow col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<a href="?tpl=chanpin-show&pid=11&uid=&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=1&list=1" style="text-decoration: none;">
								<div class="product-list-img">
						        <img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][2][furl] ?>"/>
								</div>
								<div class="product-list-title">
									<p class="title-ellipsis"><?php echo $this->ffwbms_vars["ary"][atit] ?></p>
									<p class="subtitle-ellipsis"><?php echo $this->ffwbms_vars["ary"][stit] ?></p>
								</div>
							</a>
						</li>  			            	               
		                <?php } ?>
		                <?php } ?>		
		    		</ul>		    		
		    	</div>
		    </div>
		    <!--什么是UEMO-->
			<div class="about wow ">
	        	<div class="about-content clearfix">
	        		<?php $this->ffwbms_get_value(' ffa_sort_db ',' vte1 ', 'id = 23'); ?><!--获得指定分类号的数据-->
					<?php $this->ffwbms_get_value(' ffa_art_value ',' vte1_art ', 'id = ' .$this->ffwbms_vars["vte1"][sart]); ?><!--获得指定文章号的文章数据    $vte1[sart]：返回分类所属文章号-->
		        	<div class="about-text col-sm-12 col-md-12 col-lg-4">
		        		<p class="about-text-p1">
		        			<?php echo $this->ffwbms_vars["vte1"][sname] ?>
		        		</p>
		        		<p class="about-text-p2">
		        			<?php echo $this->ffwbms_vars["vte1"][keys] ?>
		        		</p>
		        		<hr/>
		        		<div class="about-text-p3">        		
		        			<?php echo $this->ffwbms_vars["vte1"][atxt] ?>
		        		</div>
		        		<div class="about-more">
		        			<a href="?tpl=about&pid=15&id=23&sno=4&list=1">more</a>
		        		</div>
		        	</div>   
		        	<div class="about-img col-sm-12 col-md-12 col-lg-8">
		        		<a href="?tpl=about&pid=15&id=23&sno=4&list=1"> 
		        			<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["vte1_art"][timgary][0][furl] ?>"/>
		        		</a>
		        	</div>
	        	</div>
	        </div>
	        <!--核心团队-->
	        <div class="team wow">
	        	<?php $this->ffwbms_get_value(' ffa_sort_db ',' vte1 ', 'id = 24'); ?><!--获得指定分类号的数据-->
				<?php $this->ffwbms_get_value(' ffa_art_value ',' vte1_art ', 'id = ' .$this->ffwbms_vars["vte1"][sart]); ?><!--获得指定文章号的文章数据    $vte1[sart]：返回分类所属文章号-->
		    	<div class="team-title">
		    		<p class="team-title-p1">
	        			<?php echo $this->ffwbms_vars["vte1"][keys] ?>
	        		</p>
	        		<p class="team-title-p2">
	        			<?php echo $this->ffwbms_vars["vte1"][abs] ?>
	        		</p>
		    	</div>
		    	<div class="team-content">			    		
			    	<ul class="team-list" id="h">	
			    		<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 24|top = 4|ob = 3'); ?>
			            <?php foreach( $this->ffwbms_vars["vte"] as $this->ffwbms_vars["ary"]){ ?>
			            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
			            <!---{ffwbms_see $arry[pid]}-->
			            <?php if (count( $this->ffwbms_vars["vte"] ) > 0){  ?>	            						
						<li class="team-list-li">
							<a href="?tpl=member&pid=15&uid=&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=4&list=2" style="text-decoration: none;">	
					    		<div class="team-list-img">
				    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>">
				    			</div>
					    		<div class="team-list-text"   id="a">					    				    			
					    			<div>
					    				<div class="team-list-title">
					    					<p class="team-list-title-p1">&nbsp;&nbsp;<?php echo $this->ffwbms_vars["ary"][atit] ?>
					    						<span class="team-list-title-span">
					    							<?php echo $this->ffwbms_vars["ary"][stit] ?>
					    						</span>
					    					</p>
					    				</div>
					    				<div class="team-list-content" >			    					
						    				<div class="team-list-content-text" id="style-1">
						    					<?php echo $this->ffwbms_vars["arry"][atxt] ?>
						    				</div>
					    			    </div>
					    			</div>					    		
					    		</div>
							</a>		    	
				    	</li>
		                <?php } ?>
		                <?php } ?>
	                </ul> 		        
		    	</div>
		    </div>
		    <div class="member wow">
		    	<div style="width: 60%;margin: auto;">
		        	<p id="z" class="icon"></p>	
		        </div>
		    	<table style="width:60%; margin: auto;">
		    		<tr>
		    			<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 24|top = 4|ob = 3'); ?>		    				
		    			<?php $this->ffwbms_vars["a"] = 1 ?>
			            <?php foreach( $this->ffwbms_vars["vte"] as $this->ffwbms_vars["ary"]){ ?>
			            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
			            <!---{ffwbms_see $arry[pid]}-->
			            <?php if (count( $this->ffwbms_vars["vte"] ) > 0){  ?>	            												
				    	<td>
		    				<a style="text-decoration: none;" id="u<?php echo $this->ffwbms_vars["a"] ?>">
		    					<div class="member-img">
		    						<img src="<?php echo $this->ffwbms_vars["wset_ary"]['upload_path'] ?><?php echo $this->ffwbms_vars["arry"][timgary][0][furl] ?>">
		    					</div>
		    					<div class="member-text">
		    						<p class="member-text-p"><?php echo $this->ffwbms_vars["ary"][atit] ?></p>
		    						<p><?php echo $this->ffwbms_vars["ary"][stit] ?></p>
		    					</div>
		    				</a>
		    			</td>
		    			<?php $this->ffwbms_vars["a"] ++ ?>
		                <?php } ?>
		                <?php } ?>
	    			</tr>
		    	</table>
	    	</div>
	    	<!--手机团队界面-->
	    	<div class="phone-team">
	    		<?php $this->ffwbms_get_value(' ffa_sort_db ',' vte1 ', 'id = 24'); ?><!--获得指定分类号的数据-->
				<?php $this->ffwbms_get_value(' ffa_art_value ',' vte1_art ', 'id = ' .$this->ffwbms_vars["vte1"][sart]); ?><!--获得指定文章号的文章数据    $vte1[sart]：返回分类所属文章号-->		    
	    		<div class="team-title">
		    		<p class="team-title-p1">
	        			<?php echo $this->ffwbms_vars["vte1"][keys] ?>
	        		</p>
	        		<p class="team-title-p2">
	        			<?php echo $this->ffwbms_vars["vte1"][abs] ?>
	        		</p>
		    	</div>
	    		<ul class="clearfix">
	    			<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 24|top = 4|ob = 3'); ?>
		            <?php foreach( $this->ffwbms_vars["vte"] as $this->ffwbms_vars["ary"]){ ?>
		            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
		            <!---{ffwbms_see $arry}-->
		            <?php if (count( $this->ffwbms_vars["vte"] ) > 0){  ?>	
		            <?php if ($this->ffwbms_vars["ary"][id]%2 == 0){  ?>
					<li class="clearfix">
						<a href="?tpl=member&pid=15&uid=&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=4&list=2">
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
	    				<a href="?tpl=member&pid=15&uid=&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=4&list=2">
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
	    	<!--帮助-->
	    	<div class="help wow">
			    <div class="help-title">
			    	<div class="product-title">
			    		<?php $this->ffwbms_get_value(' ffa_sort_db ',' vte1 ', 'id = 19'); ?><!--获得指定分类号的数据-->
						<?php $this->ffwbms_get_value(' ffa_art_value ',' vte1_art ', 'id = ' .$this->ffwbms_vars["vte1"][sart]); ?><!--获得指定文章号的文章数据    $vte1[sart]：返回分类所属文章号-->
			    		<p class="product-title-p">
		        			<?php echo $this->ffwbms_vars["vte1"][sname] ?>
		        		</p>
		        		<p style="color: #848484;font-size: 1pc;">
		        			<?php echo $this->ffwbms_vars["vte1"][keys] ?>
		        		</p>
			    	</div>
			    	<div class="product-nav"> 
			    		<a href="/" style="background-color:#0F0F0F">全部</a>
			    		<?php $this->ffwbms_get_value(' ffa_sort_list ',' vtemp ', 'pid = 19'); ?><!--获得当前页面语种的网站结构分类表--> 
			    		<!---{ffwbms_see $vtemp}-->
						<?php $this->ffwbms_vars["a"] = 1 ?>
						<?php foreach( $this->ffwbms_vars["vtemp"] as $this->ffwbms_vars["ary"]){ ?>	
			    		<a <?php if ($this->ffwbms_vars["get_ary"]['list'] ==$this->ffwbms_vars["a"]){  ?>style="background-color:#0F0F0F; color: #F8F8F8;"<?php } ?>href="?tpl=<?php echo $this->ffwbms_vars["ary"][spage] ?>&pid=19&uid=<?php echo $this->ffwbms_vars["ary"][id] ?>&sno=5&list=<?php echo $this->ffwbms_vars["a"] ?>">
			    			
			    		<?php echo $this->ffwbms_vars["ary"][sname] ?>
			    			
			    		</a><!--$ary[spage：返回分类要使用的模板文件名； $ary[sname]：返回分类名  -->
			    		<?php $this->ffwbms_vars["a"] ++ ?>
						<?php } ?>
			    	</div>
			    </div>
			    <div class="help-list clearfix">
			    	<ul class="help-list-ul1 clearfix">
			    		<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 19|ob = 3'); ?>
			            <?php foreach( $this->ffwbms_vars["vte"] as $this->ffwbms_vars["ary"]){ ?>
			            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
			            <!---{ffwbms_see $arry[pid]}-->
			            <?php if (count( $this->ffwbms_vars["vte"] ) > 0){  ?>		            						
						<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			    			<a href="?tpl=help-show&pid=19&uid=&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=5&list=1" style="text-decoration: none;">
	    						<div class="help-content clearfix">
	    							<div class="help-time">
	    							   	<p class="help-time-p1"><?php echo $this->ffwbms_vars["ary"][stit] ?></p>
	    							  	<p class="help-time-p2"><?php echo $this->ffwbms_vars["ary"][keys] ?></p>
	    							</div>
	    							<div class="help-text">
	    							   	<p class="help-text-p1"><?php echo $this->ffwbms_vars["ary"][atit] ?></p>
	    							   	<br />
	    							   	<p class="help-text-p2">
	    							   		<?php echo $this->ffwbms_vars["ary"][abs] ?>
	    							   	</p>
	    							</div>
	    						</div>
	    					</a>
			    		</li>
		                <?php } ?>
		                <?php } ?>	
	    			</ul>	
	    			<ul class="help-list-ul2 clearfix">
	      				<?php $this->ffwbms_get_value(' ffa_art_astoplist ',' vte ', 'pid = 19|ob = 3'); ?>
			            <?php foreach( $this->ffwbms_vars["vte"] as $this->ffwbms_vars["ary"]){ ?>
			            <?php $this->ffwbms_get_value(' ffa_art_value ',' arry ', 'id = ' .$this->ffwbms_vars["ary"][id]); ?>
			            <!---{ffwbms_see $arry[pid]}-->
			            <?php if (count( $this->ffwbms_vars["vte"] ) > 0){  ?>			            
						<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<a href="?tpl=help-show&pid=19&uid=&id=<?php echo $this->ffwbms_vars["ary"]['id'] ?>&sno=5&list=1" style="text-decoration: none;">
	    						<div class="help-content clearfix">
	    							<div class="help-text">
	    							   	<p class="help-text-p1"><?php echo $this->ffwbms_vars["ary"][atit] ?></p>
	    							   	<p class="content-text-content-p2" >
    							   		<span><?php echo $this->ffwbms_vars["ary"][stit] ?></span>
    							   		<span><?php echo $this->ffwbms_vars["ary"][keys] ?></span>
    							   		</p>
	    							   	<br />
	    							   	<p class="help-text-p2">
	    							   		<?php echo $this->ffwbms_vars["ary"][abs] ?>
	    							   	</p>
	    							</div>
	    						</div>
	    					</a>
						</li>
	                <?php } ?>
	                <?php } ?>
	      		</ul>
		    	</div>
		    </div>
			<!--推荐用户-->
			<div class="user clearfix wow">
		  	    <div class="product-title">
		    		<p class="product-title-p">
	        			推荐用户
	        		</p>
	        		<p style="font-family: '微软雅黑'; font-size: 15px; color: #8C8C8C;">
	        			Recommend customers
	        		</p>
		    	</div>
		    	<div class="user-content clearfix">
		    		<ul style="margin: auto;">
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj4.png">
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj1.png">
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj2.png">
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj3.png">
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj4.png">
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj5.png">	
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj6.png">
			    		  	</div>
		    			</li>
		    			<li class="user-list col-xs-6 col-sm-6 col-md-3 col-lg-3">
		    				<div class="user-list-img">
			    				<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/tj5.png">	
			    		  	</div>
		    			</li>
		    		</ul>			    	
		    	</div>
		  	</div>
		  	<!--UEMO建站流程-->
		  	<div class="process wow">
		  	    <div class="product-title">
		    		<p class="product-title-p">
	        			UEMO建站流程
	        		</p>
	        		<p style="font-size: 14px; color: #999;">
	        			Process
	        		</p>
		    	</div>
		    	<div class="process-img">
		    		<img src="<?php echo $this->ffwbms_vars["wset_ary"]['tpl_path'] ?>images/jz.png">
		    	</div>
		  	</div>
		  	<!--联系-->
		  	<div class="link">
			  	<div class="link-content clearfix">
				  	<div class="link1 col-xs-12 col-sm-6 col-md-3 col-lg-3">
				    	<p class="link1-p1">
			        		联系我们
			       		</p>
			       		<p class="link1-p2">
			       			Contact Us
			       		</p>
				   </div>			    
				    <div class="link2 col-xs-12 col-sm-6 col-md-3 col-lg-3">
				    	<div>
				    		<p class="link2-p1">关注</p>
				    	</div>
				    	<div> 
				    		<a class="iconfont icon-weibo"></a>
				    		<a class="iconfont icon-qq"></a>
				    		<a class="iconfont icon-weixin"></a>
				    	</div>
				    </div>
			    
				    <div class="link3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<h4>
				    		<?php echo $this->ffwbms_vars["langset_ary"]['name'] ?>
				    	</h4>
				    	<p >地址：<?php echo $this->ffwbms_vars["langset_ary"]['address'] ?></p>
				    	<p >邮编：<?php echo $this->ffwbms_vars["langset_ary"]['code'] ?></p>
				    	<p >电话：<?php echo $this->ffwbms_vars["langset_ary"]['phone'] ?></p>
				    	<p >手机：<?php echo $this->ffwbms_vars["langset_ary"]['mobile'] ?></p>
				    	<p >邮箱：<?php echo $this->ffwbms_vars["langset_ary"]['mailbox'] ?></p>
				    </div>
			    </div>
		    </div>
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
		</div>
		<script type="text/javascript">
			$('.counter').countUp();
		</script>
	</body>
</html>
