<nav class="navbar" style="background: none; border: 0px; margin-bottom: 0px; border-radius: 0px;">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
	<div class="row">
			<div class="col-lg-2 col-sm-4 logo">
				<div style="color:#E8AD8F;font-family:Georgia;font-size:12px;">WELCOME TO THE</div>
				<div style="color:#FFFFFF;font-family:Arial;font-size:27px;margin-top:35px;">TRD</div>
				<div style="color:#FFFFFF;font-family:Impact;font-size:48px;letter-spacing:0.07px;margin-top:-15px;">STATION</div>
				<div style="color:#E8AD8F;font-family:Arial;font-size:12px;margin-top:-7px;">The new ear of ecommerce</div>
			</div>
			<div class="col-lg-4 col-sm-8 headimg" style="background:url(<?php echo asset_url(); ?>/images/ts/homeheader0.jpg) no-repeat center center;background-size:100% 100%;height:235px;">
			</div>
			<div class="col-lg-6 col-sm-8">
				<div class="row open-div1 bgwhite" style="position: relative; min-height: 235px;">
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="col-xs-11">
						<ul class="nav navbar-nav trd-nav">
							<li class=" col-sm-2 col-xs-6">
								<a href="">
									<img src="<?php echo asset_url(); ?>/images/ts/Homekit.png" style="width: 50px;">
									<h5>Home</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="seller">
									<img src="<?php echo asset_url(); ?>/images/ts/seller.png" style="width: 50px;">
									<h5>Sellers</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="products">
									<img src="<?php echo asset_url(); ?>/images/ts/products.png" style="width: 50px;">
									<h5>Products</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="b-station">
									<img src="<?php echo asset_url(); ?>/images/ts/trade.png" style="width: 50px;">
									<h5>B-Station</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="pro-video">
									<img src="<?php echo asset_url(); ?>/images/ts/vidtube0.png" style="width: 50px;">
									<h5>Pro-Videos</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="buyer">
									<img src="<?php echo asset_url(); ?>/images/ts/buyer.png" style="width: 50px;">
									<h5>Buyers</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="shipper">
									<img src="<?php echo asset_url(); ?>/images/ts/shipper.png" style="width: 50px;">
									<h5>Shippers</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="stock-goods">
									<img src="<?php echo asset_url(); ?>/images/ts/stock.png" style="width: 50px;">
									<h5>Stock Goods</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="community">
									<img src="<?php echo asset_url(); ?>/images/ts/CommMember.png" style="width: 50px;">
									<h5>Community</h5>
								</a>
							</li>
							<li class="col-sm-2 col-xs-6">
								<a href="" data-toggle="modal" data-target="#myalertModal" onclick="getAlerts();">
									<img src="<?php echo asset_url(); ?>/images/ts/Alerts1.png" style="width: 50px;">
									<h5>My Alerts</h5>
								</a>
							</li>
						</ul>
					</div>
					<div class="reminder-div">
						<div id="wb_Image168" style="position:absolute;left:144px;top:61px;width:53px;height:53px;z-index:1121;">
							<?php if(!empty($busi_id)  && (!empty($activstatus))  && ($activstatus  == 1))  {  ?>
										<?php if($tscategory_id == 1) { ?>
											<a href="<?php echo base_url();?>desksite/<?php echo $busi_id;?>">
										<?php } else if($tscategory_id == 2) { ?>
											<a href="<?php echo base_url();?>shipper/profile/<?php echo $busi_id;?>">
										<?php } else { ?>
											<a href="<?php echo base_url();?>buyer/profile/<?php echo $busi_id;?>">
										<?php } ?>
								<?php  } else { ?>
							<a href="#" data-toggle="modal" data-target="#accessDeniedModalLogin" data-backdrop="static" data-keyboard="false">
							<?php } ?>
							<img src="<?php echo asset_url();?>images/Desksite-big.png" id="Image168" alt="" style="width:53px;height:53px;">
							</a>
						</div>
						<div id="wb_Shape15" style="position:absolute;left:455px;top:60px;width:55px;height:55px;z-index:1122;">
							<?php if(!empty($busi_id) && (!empty($activstatus))  && ($activstatus  == 1)) { ?>
								<?php if($tscategory_id == 1) { ?>
									<a href="<?php echo base_url();?>mystation">
								<?php } else if($tscategory_id == 2) { ?>
									<a href="<?php echo base_url();?>shipper_mystation">
								<?php } else { ?>
									<a href="<?php echo base_url();?>buyer_mystation">
								<?php } ?>
							<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="#accessDeniedModalLogin" data-backdrop="static" data-keyboard="false">
							<?php } ?>
							<img src="<?php echo asset_url();?>images/img3449.png" id="Shape15" alt="" style="width:55px;height:55px;" style="width:55px;height:55px;">
							</a>
						</div>
						<div id="wb_Image217" style="position:absolute;left:302px;top:63px;width:50px;height:50px;z-index:1123;">
							<?php if(!empty($busi_id) && (!empty($activstatus))  && ($activstatus  == 1)) { ?>
								<?php if($tscategory_id == 1) { ?>
									<a href="<?php echo base_url();?>mystation">
								<?php } else if($tscategory_id == 2) { ?>
									<a href="<?php echo base_url();?>shipper_mystation">
								<?php } else { ?>
									<a href="<?php echo base_url();?>buyer_mystation">
								<?php } ?>
							<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="#accessDeniedModalLogin" data-backdrop="static" data-keyboard="false">
							<?php } ?>
							<img src="<?php echo asset_url();?>images/configure-2.png" id="Image217" alt="" style="width:50px;height:50px;">
							</a>
						</div>
						<div id="wb_Text256" style="position:absolute;left:122px;top:132px;width:95px;height:16px;text-align:center;z-index:1124;">
							<span style="color:#FFFFFF;font-family:Georgia;font-size:13px;">My Desksite</span>
						</div>
						<div id="wb_Text270" style="position:absolute;left:280px;top:132px;width:95px;height:16px;text-align:center;z-index:1125;">
							<span style="color:#FFFFFF;font-family:Georgia;font-size:13px;">My Station</span>
						</div>
						<div id="wb_Text389" style="position:absolute;left:438px;top:132px;width:95px;height:16px;text-align:center;z-index:1126;">
							<span style="color:#FFFFFF;font-family:Georgia;font-size:13px;">My Account</span>
						</div>
						<div id="wb_Text392" style="position:absolute;left:98px;top:154px;width:147px;height:42px;text-align:center;z-index:1127;">
							<span style="color:#A9A9A9;font-family:Arial;font-size:11px;">View what you have done, know how the world see your innovation..</span>
						</div>
						<div id="wb_Text393" style="position:absolute;left:258px;top:154px;width:140px;height:42px;text-align:center;z-index:1128;">
							<span style="color:#A9A9A9;font-family:Arial;font-size:11px;">Build and control your Desksite/Website the way you like.. </span>
						</div>
						<div id="wb_Text394" style="position:absolute;left:415px;top:154px;width:140px;height:42px;text-align:center;z-index:1129;">
							<span style="color:#A9A9A9;font-family:Arial;font-size:11px;">View, edit, upgrade or disable you account, profile, and much more..</span>
						</div>
						<a href="#" class="menu-arrow"><img src="<?php echo asset_url(); ?>/images/ts/img0020.png"><img src="<?php echo asset_url(); ?>/images/ts/img0020.png"></a> 
						<a href="#" class="menu-arrow2"><img src="<?php echo asset_url(); ?>/images/ts/img0020.png"><img src="<?php echo asset_url(); ?>/images/ts/img0020.png"></a>
					</div>
					<!-- /.navbar-collapse -->
				</div>
			</div>
		</div>
	</div>
</nav>
<div id="accessDeniedModalLogin" class="modal fade" role="dialog">
  	<div class="modal-dialog" style="width:400px;">
    	<div class="modal-content" style="border-radius:0px;margin-top:25%;">
      		<div class="modal-body">
      			<div class="row" style="padding-top:10px;">
      				<div class="col-sm-2"></div>
      				<div class="col-sm-8">
	      				<div style="text-align: center;">
							<span style="color: #F05539; font-family: 'Arial Black'; font-size: 16px;">ACCESS DENIED</span>
						</div>
						<br><br>
						<div style="text-align: center;">
							<img src="<?php echo asset_url();?>images/padlock-154684_640.png" width="100px;"/>
						</div>
						<div style="text-align: center;">
							<?php if(!empty($busi_id)  && empty($activstatus))  {  ?>
							Please complete registration to access member area
							<?php } else { ?>
							Please login to access member area
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-2"></div>
      			</div>
      			<br>
      			<div class="row text-center">
      				<?php if(!empty($busi_id)  && empty($activstatus))  {  ?>
      				<a href="<?php echo base_url();?>continueregistration" class="btn btn-sm btn-danger-custom" style="width:120px;">Continue</a>
      				<?php } else { ?>
      				<a href="<?php echo base_url();?>signin" class="btn btn-sm btn-danger-custom" style="width:120px;">Login</a>
      				<?php } ?>
      				<a href="javascript:cancelAccessDeniedPopup();" class="btn btn-sm btn-danger-custom" style="width:120px;" data-dismiss="modal">Cancel</a>
      			</div>
      			<br><br>
      		</div>
    	</div>
  	</div>
</div>