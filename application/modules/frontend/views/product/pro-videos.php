<!-- <script src="<?php echo asset_url(); ?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-fade.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.slideshow.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.stickylayer.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.carousel.effects.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.core.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.widget.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.position.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.tooltip.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-blind.min.js"></script>
<script	src="<?php echo asset_url(); ?>js/jquery.ui.effect-bounce.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-clip.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-drop.min.js"></script>
<script	src="<?php echo asset_url(); ?>js/jquery.ui.effect-explode.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-fold.min.js"></script>
<script	src="<?php echo asset_url(); ?>js/jquery.ui.effect-highlight.min.js"></script>
<script	src="<?php echo asset_url(); ?>js/jquery.ui.effect-pulsate.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-scale.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-shake.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-slide.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wwb10.min.js"></script> -->
<div>
<div class="col-sm-12" style="padding:0px;">
	<h1 class="sfont1">PRODUCTS IN VIDEOS</h1>
	<p class="sfont2">Sourcing with more details is available by selecting additional options from the More Options Menu on the right side..</p>
	<br>
</div>
<div class="">
	<div class="col-lg-10 section11" style="padding:0px;">
		<div class="video-list">
		<?php  if(count($videos) > 0 && $videos[0]['id'] !='') { 
		 foreach($videos as $key=>$video){ 
		  ?>	
			<div class="col-lg-4 colpadbottom" style="padding:0px;padding-right:28px;margin-bottom: 15px;">
		
				<div id="Layer6" onmouseenter="showMenu('Layer8_<?php echo $key;?>');" onmouseleave="hideMenu('Layer8_<?php echo $key;?>');" style="z-index: 434;padding:20px;background-color: #FAFAFA;border: 1px #D3D3D3 solid;">
					<div>
						<span class="video-title">
							<?php if($video['type'] == 0) { ?>
							<strong><a href="<?php echo base_url();?>video/details/<?php echo $video['vid'];?>" target="_blank" class="style16"><?php echo substr($video['name'],0,28);?></a></strong>
							<?php } else { ?>
							<strong><a href="<?php echo base_url();?>product/category/<?php echo $video['product_id'];?>" target="_blank" class="style16"><?php echo substr($video['name'],0,28);?></a></strong>
							<?php } ?>
						</span>
						<label class="text-muted pull-right" style="margin-top:-5px;"><img src="<?php echo asset_url(); ?>images/items_like0.png" id="Image21" alt="Like" style="width:25px;height:25px;margin-bottom: 5px;"> <span id="likeid-<?php echo $video['vid'];?>-<?php echo $video['type'];?>"><?php echo $video['video_likes'];?></span></label>
					</div>
					<div class="padding-top-5">
						<span class="text-muted"><?php echo substr($video['description'], 0,35);?><?php if(strlen($video['description']) > 35) { ?> ...<?php } ?></span>
					</div>
					<div class="text-center">
						<span class="spanusd">USD</span>
						<span class="spanusd"> </span>
						<span class="spanprice"><?php if($video['type'] == 0) { echo $video['unit_price'];} else { echo $video['unit_price']." - ".$video['end_price']; } ?></span>
					</div>
					<div class="text-center">
						<span class="text-muted">Min. Order : <?php echo $video['quantity'].' '. $video['unit']; ?> </span>
					</div>
					<br>
					<div>
						<div class="video-area">
							<video src="<?php echo asset_url(); ?><?php echo $video['vedio_file'];?>" controls="controls" controlsList="nodownload" style="max-height:164px;"></video>
						</div>
						<br>
						<div class="text-center">
							<span style="color:#303030;font-family:Georgia;font-size:12px;"><strong><?php echo $video['company_name'];?></strong></span>
						</div>
						<div class="text-center">
							<span class="text-muted"><?php echo $video['subcategory']; ?></span> | 
							<span style="color:#FF6347;font-family:Arial;font-size:12px;"><?php echo $video['country']; ?></span>
							<span class="text-muted"><?php echo $video['province']; ?></span>
						</div>
						<br>
						<div class="text-center">
							<span id="wb_Image10" class="img-style">
						        <?php if(!empty($tsuserid) && $video['community_id'] !='' && $video['plan_id'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" style="width:25px;height:25px;"/> 
						        <?php }else {?>
						        <img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" style="opacity :0.15;width:25px;height:25px;" />
						        <?php } ?>
					        </span>
						    <span id="wb_Image2" class="img-style">
						    	<?php if($video['plan_id'] > 1 && $video['gaurantee_period'] !=''){?><img src="<?php echo asset_url(); ?>images/ts/guarantee.png" id="Image1" style="width:34px;height:28px;"/> <?php } else {?>
						    	<img src="<?php echo asset_url(); ?>images/ts/guarantee.png" id="Image1" style="opacity :0.15;width:34px;height:28px;" >
						    	<?php }?>
					        </span>
						    <span id="wb_Image1" class="img-style">
						        <?php if($video['plan_id'] > 1 && $video['is_logo_verified'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" style="width:25px;height:25px;" /> <?php } else { ?>
						        <img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" style="opacity :0.15;width:25px;height:25px;" />
						        <?php }?>
					        </span>
					        <span id="wb_Image1" class="img-style">
								<?php if($video['plan_id'] > '1' && $video['plan_id'] > '1'){?><img src="<?php echo asset_url(); ?>images/ts/member-logo.png" id="Image1" style="width:25px;height:25px;" /><?php } else {?>
								<img src="<?php echo asset_url(); ?>images/ts/member-logo.png" id="Image1" style="opacity :0.15;width:25px;height:25px;" />
								<?php }?>
					        </span>
							<!-- span>
								<img src="<?php echo asset_url(); ?>images/CommMember.png" id="Image37" alt="Member In My Community" title="Member In My Community" style="width:25px;height:25px;"/>
							</span>
							<span>
								<img src="<?php echo asset_url(); ?>images/trusted.png" id="Image39" alt="Verified Member" title="Verified Member" style="width:25px;height:25px;">
							</span>
							<span>
								<img src="<?php echo asset_url(); ?>images/member-logo.png" id="Image40" alt="Black Horse Member" title="Black Horse Member" style="width:25px;height:25px;">
							</span-->
						</div>
					</div>
					<div id="Layer8_<?php echo $key;?>" style="position: absolute; text-align: left;left: 0px; top: 320px; width: 327px; height: 89px; z-index: 168;display:none;">
						<div id="Layer19" style="position:absolute;text-align:left;left:0px;top:0px;width:327px;height:89px;z-index:149;">
						</div>
						<div style="background-color:#fff;opacity:1;z-index:24000;">
							<div id="RollOver22" class="rolloverdetail">
								<a href="<?php echo base_url();?>video/details/<?php echo $video['vid'];?>" target="_blank"> 
								    <img class="hover" alt="" src="<?php echo asset_url(); ?>images/view-detailsc.png" style="width:45px;"> 
								    <span><img alt=""	src="<?php echo asset_url(); ?>images/view-detailsb.png" style="width:45px;"></span>
								</a>
							</div>
							<div id="RollOver5"	class="rollovervideo">
								<a href="javascript:likeMyVideo(<?php echo $video['vid'];?>,<?php echo $video['type'];?>,'likeid-<?php echo $video['vid'];?>-<?php echo $video['type'];?>');">
								   <img class="hover" alt="like" src="<?php echo asset_url(); ?>images/like-videoa.png"> 
								   <span><img alt="like" src="<?php echo asset_url(); ?>images/like-videob.png"></span>
								</a>
							</div>
							<div id="RollOver12" class="rolloverfavourite">
								<a href="javascript:addToMyFavourite(<?php echo $video['vid'];?>,5);"> 
									<img class="hover" alt="" src="<?php echo asset_url(); ?>images/add-favoriteb.png"> 
									<span><img alt="" src="<?php echo asset_url(); ?>images/add-favoritea.png"></span>
								</a>
							</div>
							<div id="RollOver12"	class="rollovershare">
								<a href="#"	onclick="ShowObjectWithEffect('Layer223', 1, 'fade', 500);return false;">
									<img src="<?php echo asset_url(); ?>images/share-videob.png" id="Image4" alt="">
									<span><img src="<?php echo asset_url(); ?>images/share-videoa.png" id="Image4" alt=""></span>
								</a>
							</div>
						</div>									
					</div>
				</div>
			</div>
		<?php } }  else { ?>
	      <div class="row" style="margin:0px;">
	     	<h4 class="center"> No Videos Found!</h4>
	     </div>
	    <?php } ?>
	    <?php if($total_pages > 1) { ?>
		     	<div class="row" style="margin:0px;margin-right: 25px;">
					<div id="wb_Text396" style="text-align:center;height:31px;padding:7px;padding-right:0px;background-color: #FA5C43;" class="col-sm-1">
						<span style="color:#FFFFFF;font-family:Georgia;font-size:12px;">Page&nbsp;&nbsp; </span>
					</div>
					<div id="wb_Text393" style="height:31px;background-color: #FFFFFF;padding:0px" class="col-sm-11">
						<div style="text-align:left;padding-top:7px;" class="col-sm-2">
							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;"><?php echo $params['page'];?> of <?php echo $total_pages;?>&nbsp;&nbsp; </span>
						</div>
						<div style="text-align:center;padding-top:7px;" class="col-sm-8">
							<span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><a href="<?php if($total_pages >= ($params['page']+1)){ echo $wpvideourl."page=".($params['page']+1);}?>" class="style5">VIEW MORE</a></strong></span>
						</div>
						<div class="col-sm-2" style="padding:0px;padding-top:7px;">
							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;"> Page No</span>&nbsp;
							<form name="searchPageForm" id="searchPageForm" method="GET" action="<?php echo $wpvideourl;?>" style="display:inline-block;">
								<select type="text" id="pageinputselect" style="border-radius:0px;width:40px;height:17px;line-height:17px;border: 1px #A9A9A9 solid;background-color: #00BFFF;padding-left:10px;" name="page">
								<?php for($i=1;$i<=$total_pages;$i++) { ?>
									<option value="<?php echo $i;?>" <?php if($i == $params['page']){ ?>selected<?php } ?>><?php echo $i;?></option>
								<?php } ?>
								</select>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<span class="pull-right">
									<button type="submit" id="Button15" style="width:47px;height:31px;margin-top: -7px;">GO</button>
								</span>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	
	<div class="col-lg-2" style="padding:0px;">
		<div class="panel">
			<div class="panel-heading" class="panelstyle">
				<b class="panelstyle1">More Options Menu</b>
			</div>
			<div class="list-group categary">
				<a href="<?php echo $url;?>&type=0" class="list-group-item" >Show Verified Members First</a> 
		   		<?php if(!empty($tsuserid)){?>
		   		<a href="<?php echo $url;?>&community_only=1" class="list-group-item">Show My Community Members Only </a> 
		   		<a href="<?php echo $url;?>community_hide=1" class="list-group-item">Hide My Community Members </a>
		   		<?php }?>
			</div>
		</div>
		<div id="Layer3" class="box8">
			<div id="wb_Text328" class="innersection">
				<span class="text2"><strong><a href="<?php echo base_url();?>" target="_blank" class="style5">V-CATALOGUES</a></strong></span>
				<p class="text3">Follow the latest collection of world sellers brands..</p>
				<span class="text2"><strong><a href="<?php echo base_url();?>" target="_blank" class="style5">DESKSITES </a></strong></span>
				<p class="text3">Experience a new vision of websites techniques with quick access, rich information and much more..</p>
				<span class="text2"><strong><a href="<?php echo base_url();?>" target="_blank" class="style5">PRODUCTS IN 3D </a></strong></span>
				<p class="text3">Step into a new dimension of E-commerce, search products with rich information, live details and much more..</p>
		    </div>
		</div>
		<div class="maxheight1 bg2" style="margin-top: 15px;">
			<div class="row" style="margin: 0px">
				<h3 style="color: #fff; text-align: center;">
					<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">FEATURED</span><br> 
					<span style="color:#FFFFFF;font-family:Impact;font-size:20px;letter-spacing:0.07px;">PRODUCTS VIDEOS</span>
				</h3>
				<div class="text-center displaydesktop">
					<img src="<?php echo asset_url(); ?>images/porcube.png"
						class="img-responsive">
				</div>
			</div>
		</div>
		<div id="Layer24">
			<div id="wb_Carousel2" class="style4">
				<div id="Carousel2" style="position: absolute">
	                    <?php
							   $i = 0;
							   foreach ( $featuredProductVideo as $featuredVideo ) {
							    if($i%2 == 0){
									$frame = $i; 
										?>
	                   <div class="frame" class="style5">
	                   <?php } $i++; ?>

						<div id="Layer39" class="fs11"
							onmouseenter="ShowObjectWithEffect('holder<?php echo $i;?>', 1, 'dropup', 300, 'swing');return false;"
							onmouseleave="ShowObjectWithEffect('holder<?php echo $i;?>', 0, 'fade', 500, 'swing');return false;" style="border: 1px #D3D3D3 solid;">
							<div id="wb_Text78" class="fs1">
								<span><strong><?php echo substr($featuredVideo['name'],0,20);?> <?php if(strlen($featuredVideo['name']) > 20) { ?>..<?php } ?></strong></span>
							</div>
							<div id="wb_Text77" class="fs2">
								<span class="fs3"><?php echo substr($featuredVideo['description'], '0', '30');?> ...</span>
							</div>
							<div id="wb_MediaPlayer1" class="fs9">
								<video
									src="<?php echo asset_url().''.$featuredVideo['vedio_file']; ?>"
									controls="controls">
								</video>
							</div>
							<div id="wb_Text79" class="fs6">
								<span class="fs4"><strong><?php echo $featuredVideo['unit_price'];?> / Set</strong></span>
							</div>
							<div id="wb_Text80" class="fs7">
								<span class="fs5"><strong>Min. Qty. <?php echo $featuredVideo['quantity'].' '.$featuredVideo['unit'];?></strong></span>
							</div>
							
							<div id="Layer29" class="fs13"></div>
							<div id="holder<?php echo $i;?>" class="fs14">
								<div id="wb_Image33" class="fs15">
									<a
										href="javascript:openVideo(<?php echo $featuredVideo['id'];?>)"><img
										src="<?php echo asset_url(); ?>images/play.png" id="Image33"
										alt="" width="35px" height="35px"></a>
								</div>
								<div id="wb_Image34" class="fs16">
									<a href="./video_details.php" target="_blank"><img
										src="<?php echo asset_url(); ?>images/view2.png"
										id="Image34" alt="" width="35px" height="35px"></a>
								</div>
							</div>
						</div>
						<?php if($frame+2 == $i){ ?>
						</div>
	                        <?php } } ?>
	                    </div>
				<div id="Carousel2_back" class="fs18">
					<a style="cursor: pointer"><img alt="Back"
						style="border-width: 0"
						src="<?php echo asset_url(); ?>images/previoustxt0.png"></a>
				</div>
				<div id="Carousel2_next" class="fs17">
					<a style="cursor: pointer"><img alt="Next"
						style="border-width: 0"
						src="<?php echo asset_url(); ?>images/nexttxt0.png"></a>
				</div>
			</div>
		</div>
			<!-- fearture videos end-->
			<!-- feature products -->
			<div class="sp" style="margin-top: 15px;">
				<div class="maxheight1 bg3">
					<div class="row" style="margin: 0px">
						<h3 style="color: #fff; text-align: center;">
							<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">FEATURED</span><br> 
							<span style="color:#FFFFFF;font-family:Impact;font-size:20px;letter-spacing:0.07px;">PRODUCTS</span>
						</h3>
						<div class="text-center displaydesktop">
							<img src="<?php echo asset_url(); ?>images/dice0.png"
								class="img-responsive">
						</div>
					</div>
				</div>
				<div id="Layer24">
					<div id="wb_Carousel1" class="style4">
						<div id="Carousel1" style="position: absolute">
		                    <?php
								  $i = 0;
								  foreach ( $featuredProducts as $featuredProduct ) {
								  if($i%2 == 0) {
		                    		$frame = $i; 
			                    	?>
		                        <div class="frame">
		                        <?php } $i++; ?>
								<div id="Layer134" class="product111"
									onmouseenter="ShowObjectWithEffect('holder7<?php echo $i;?>', 1, 'dropup', 300, 'swing');return false;"
									onmouseleave="ShowObjectWithEffect('holder7<?php echo $i;?>', 0, 'fade', 500, 'swing');return false;" style="border: 1px #D3D3D3 solid;position: relative;">
									<div id="wb_Text417" class="product212">
										<span class="product313"><strong><?php echo $featuredProduct['name'];?></strong></span>
									</div>
									<div id="wb_Text418" class="product414">
										<span class="product5"><?php echo substr($featuredProduct['description'], '0', '50');?>...</span>
									</div>
									<div id="wb_Image128" class="product6">
										<img src="<?php echo asset_url().''.$featuredProduct['main_image']; ?>" id="Image128" alt="">
									</div>
									<div id="wb_Text419" class="product7">
										<span class="product8"><strong><?php echo $featuredProduct['unit_price'];?> / Pc</strong></span>
									</div>
									<div id="wb_Text420" class="product9">
										<span class="product10"><strong>Min. Qty. <?php echo $featuredProduct['quantity'].' '.$featuredProduct['unit'];?> </strong></span>
									</div>
									<div id="holder7<?php echo $i;?>" class="product25" style="display: none;">
										<div id="wb_Image138" class="product24">
											<a
												href="javascript:openProduct(<?php echo $featuredProduct['id'];?>)"><img
												src="<?php echo asset_url(); ?>images/view.png"
												id="Image138" alt=""></a>
										</div>
										<div id="wb_Image139" class="product26">
											<a href="<?php echo base_url();?>desksite/<?php echo $featuredProduct['busi_id'];?>" target="_blank"><img
												src="<?php echo asset_url(); ?>images/window.png"
												id="Image139" alt=""></a>
										</div>
									</div>
								</div>
							<?php if($frame+2 == $i){ ?>
		                        </div>
		                        <?php } } ?>
					</div>
					<div id="Carousel1_back" class="fs18">
			                        <a style="cursor:pointer"><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previoustxt0.png"></a>
			                    </div>
			                    <div id="Carousel1_next" class="fs17">
			                        <a style="cursor:pointer"><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nexttxt0.png"></a>
			                </div>
				</div>
			</div>
			<div class="maxheight1 bg1" style="margin-top: 15px;">
			<div class="row" style="margin: 0px">
				<h3 style="color: #fff; text-align: center;">
					<span style="color:#4B4B4B;font-family:Arial;font-size:13px;">WORLD</span><br> 
					<span style="color:#4B4B4B;font-family:Impact;font-size:20px;letter-spacing:0.07px;">SELLERS</span>
				</h3>
				<div class="text-center displaydesktop">
					<img src="<?php echo asset_url(); ?>images/ts/Fsellersok.png"
						class="img-responsive">
				</div>
			</div>
		</div>
		<div id="Layer2" class="style2">
			<div id="Layer2_Container" class="style3">
				<div id="Layer138">
					<div id="wb_Carousel3" class="style4" style="height:770px;">
						<?php if(count($featuredSellers) > 2) { ?>
						<div id="Carousel3" style="position: absolute">
						<?php }else{ ?>
						<div id="Carousel3x" style="position: absolute">
						<?php } ?>
                     			 <?php
										$i = 0;
										foreach ( $featuredSellers as $featuredSeller ) {
										if($i%2 == 0){
									$frame = $i; 
										?>
                        			<div class="frame">
                        			<?php } $i++; ?>
								<div id="Layer147" onmouseenter="ShowObjectWithEffect('Buyer_holder1<?php echo $i;?>', 1, 'dropup', 300, 'swing');return false;"
									onmouseleave="ShowObjectWithEffect('Buyer_holder1<?php echo $i;?>', 0, 'fade', 500, 'swing');return false;" style="border: 1px #D3D3D3 solid;position: relative;">
									<div id="wb_Image226" style="position: relative;">
										<?php if ($featuredSeller['picture'] != "" && file_exists("assets/".$featuredSeller['picture'])){ ?>
										<img
											src="<?php echo asset_url().''.$featuredSeller['picture']; ?>"
											id="Image226" alt="" class="style86" style="width:210px;height:246px;">
										<?php }else{ ?>
										<img src="<?php echo asset_url().'images/img1004.png'?>" id="Shape24" alt="" style="width:210px;height:246px;">
										<?php } ?>

									</div>
									<div id="Layer144" class="style15">
										<div id="wb_Text434" class="style16">
											<span class="fontstyle-4"><strong><?php echo $featuredSeller['contact_person_name'];?></strong></span>
										</div>
										<div id="wb_Text435" class="style17">
											<span class="fontstyle-5"><?php echo $featuredSeller['position'];?></span>
										</div>
										<div id="Layer148" class="style18">
											<div id="wb_Image48" class="style19">
												<img
													src="<?php echo asset_url();?>images/flags/<?php echo $featuredSeller['flag'];?>"
													id="Image48" alt="">
											</div>
										</div>
										<div id="Layer150" class="style20">
											<div id="wb_Text440" class="style21">
												<span class="fontstyle-6"><strong><?php echo $featuredSeller['product_name'];?></strong></span>
											</div>
										</div>
									</div>
									<div id="Buyer_holder1<?php echo $i;?>" class="style22" style="z-index: 511; display: none;">
										<div id="wb_Image521" class="style23">
											<a href="#"
												onclick="ShowObjectWithEffect('Layer_buyer', 1, 'scale', 500, 'swing');return false;"><img
												src="<?php echo asset_url(); ?>images/window.png"
												id="Image5" alt=""></a>
										</div>
										<div id="RollOver12" class="style24">
											<a href="./buyer_profile.php" target="_blank"> <img
												class="hover" alt=""
												src="<?php echo asset_url(); ?>images/desktoporange.gif"> <span><img
													alt=""
													src="<?php echo asset_url(); ?>images/desktopblack.png"></span>
											</a>
										</div>
									</div>
								</div>
							<?php if($frame+2 == $i){ ?>
                           			</div>
                           			<?php } } ?>
                   			 </div>
						<div id="Carousel3_back" class="style51">
							<a href=""><img alt="Back"
								src="<?php echo asset_url(); ?>images/previoustxt0blk.png"></a>
						</div>
						<div id="Carousel3_next" class="style53">
							<a style="cursor: pointer"><img alt="Next"
								src="<?php echo asset_url(); ?>images/nexttxt0blk.png"></a>
						</div>
					</div>
				</div>
			</div>
			<!-- feature product ends-->
		</div>
	</div>
</div>
</div>
<div id="Layer_details" class="class1">
	<div id="Layer_details_Container" class="class2"></div>
</div>
<div id="Layer_details2" class="class1">
	<div id="Layer_details_Container2" class="class2"></div>
</div>
</div>
<script>
$(document).ready(function() {
    $("#SlideShow1").slideshow({
        interval: 3000,
        type: 'sequence',
        effect: 'none',
        direction: '',
        pagination: false,
        effectlength: 1000
    });
    //searchParseURL();
    var $autocomplete = $('<ul class="autocomplete"></ul>').hide().insertAfter('#SiteSearch4');
    var selectedItem = null;
    var setSelectedItem = function(item) {
        selectedItem = item;
        if (selectedItem === null) {
            $autocomplete.hide();
            return;
        }
        if (selectedItem < 0) {
            selectedItem = 0;
        }
        if (selectedItem >= $autocomplete.find('li').length) {
            selectedItem = $autocomplete.find('li').length - 1;
        }
        $autocomplete.find('li').removeClass('selected').eq(selectedItem).addClass('selected');
        $autocomplete.css('left', $('#SiteSearch4').position().left);
        $autocomplete.css('top', $('#SiteSearch4').position().top + $('#SiteSearch4').outerHeight());
        $autocomplete.show();
    };
    var populateSearchField = function() {
        $('#SiteSearch4').val($autocomplete.find('li').eq(selectedItem).text());
        setSelectedItem(null);
    };
    $('#SiteSearch4').attr('autocomplete', 'off').keyup(function(event) {
        if (event.keyCode > 40 || event.keyCode == 8) {
            var data = new Array();
            var keywordVal = $('#SiteSearch4').val();
            keywordVal = keywordVal.toLowerCase();
            for (i = 0; i < database_length; i++) {
                var words = (searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords).toLowerCase();
                var array = words.split(" ");
                data = $.merge(data, array);
            }

            var unique = new Array();
            o: for (var i = 0; i < data.length; i++) {
                for (var j = 0; j < unique.length; j++) {
                    if (unique[j] == data[i]) continue o;
                }
                unique[unique.length] = data[i];
            }

            unique.sort();
            if (keywordVal.length && unique.length) {
                $autocomplete.empty();
                var item = 0;
                $.each(unique, function(index, term) {
                    term = term.toLowerCase();
                    if (term.indexOf(keywordVal) == 0) {
                        $('<li></li>').text(term).data('item', item).appendTo($autocomplete).mouseover(function() {
                            var item = $(this).data('item');
                            setSelectedItem(item);
                        }).click(populateSearchField);
                        item++;
                    }
                });
                setSelectedItem(0);
            } else {
                setSelectedItem(null);
            }
        } else
        if (event.keyCode == 38 && selectedItem !== null) {
            setSelectedItem(selectedItem - 1);
            event.preventDefault();
        } else
        if (event.keyCode == 40 && selectedItem !== null) {
            setSelectedItem(selectedItem + 1);
            event.preventDefault();
        } else
        if (event.keyCode == 27 && selectedItem !== null) {
            setSelectedItem(null);
        }
    }).keypress(function(event) {
        if (event.keyCode == 13 && selectedItem !== null) {
            populateSearchField();
            event.preventDefault();
        }
    }).blur(function(event) {
        setTimeout(function() {
            setSelectedItem(null);
        }, 250);
    });
    var Carousel2Opts = {
        delay: 4000,
        duration: 500,
        easing: 'easeInOutBounce',
        mode: 'fade',
        direction: '',
        pagination: false,
        start: 0
    };
    $("#Carousel2").carouseleffects(Carousel2Opts);
    $("#Carousel2_back a").click(function() {
        $('#Carousel2').carouseleffects('prev');
    });
    $("#Carousel2_next a").click(function() {
        $('#Carousel2').carouseleffects('next');
    });
    var Carousel1Opts = {
        delay: 4000,
        duration: 500,
        easing: 'easeInOutBounce',
        mode: 'fade',
        direction: '',
        pagination: false,
        start: 0
    };
    $("#Carousel1").carouseleffects(Carousel1Opts);
    $("#Carousel1_back a").click(function() {
        $('#Carousel1').carouseleffects('prev');
    });
    $("#Carousel1_next a").click(function() {
        $('#Carousel1').carouseleffects('next');
    });
    $("#Layer_details").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
    });
    $("#Layer_details3").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
    });
    $("#Layer_details2").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
    });
    var Carousel4Opts = {
        delay: 4000,
        duration: 500,
        easing: 'easeInOutBounce',
        mode: 'fade',
        direction: '',
        pagination: false,
        start: 0
    };
    $("#Carousel4").carouseleffects(Carousel4Opts);
    $("#Carousel4_back a").click(function() {
        $('#Carousel4').carouseleffects('prev');
    });
    $("#Carousel4_next a").click(function() {
        $('#Carousel4').carouseleffects('next');
    });
});
function openVideo(id) {
	$.get(base_url+"seller/video/view/"+id,{},function(data) {
		$("#Layer_details_Container").html(data);
		ShowObjectWithEffect('Layer_details', 1, 'scale', 500, 'swing');
	},'html');
}
function openProduct(id) {
	//alert('hello');
	$.get(base_url+"seller/product/view/"+id,{},function(data) {
		$("#Layer_details_Container2").html(data);
		ShowObjectWithEffect('Layer_details2', 1, 'scale', 500, 'swing');
	},'html');
}
function showVideosbyverifieduser() {
	$.get(base_url+"video/verifieduser/memberlist",{},function(data) {
		$(".video-list").html(data);
	},'html');
}

function showVideobyCommunityMember(id) {
	$.get(base_url+"video/community/memberlist/"+id,{},function(data) {
		$(".video-list").html(data);
	},'html');
}

function hideVideobyCommunityMember(id) {
	$.get(base_url+"video/hidecommunity/memberlist/"+id,{},function(data) {
		$(".video-list").html(data);
	},'html');
}

function showMenu(id) {
	$("#"+id).show();
}
function hideMenu(id) {
	$("#"+id).hide();
}
function changeCountry(a){
	var country = $(a).val();
	$.post(base_url+"seller/city",{country: country, busi_type: 1 },function(data) {
		$('#city').html(data);
	},'html');
	
}
function likeMyVideo(id,type,likeid) {
	$.get(base_url+"likevideo/"+id,{ type: type},function(data) {
		if(data.status == 1) {
			var likes = parseInt($("#"+likeid).html());
			likes = likes + 1;
			$("#"+likeid).html(likes);
		}
		alert(data.msg);
	},'json');
}
jQuery(document).ready(function(){
    jQuery('video').bind('contextmenu',function() { return false; });
});

</script>