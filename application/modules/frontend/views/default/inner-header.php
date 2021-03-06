 <link href="<?php echo asset_url();?>css/bootstrap-dropdownhover.min.css?1.1" rel="stylesheet">
 <style>
 .search-btn {
 	background-color:#F05539;
 }
 .blue-color {
 	color:#1E90FF;
 }
.dropdownsection {
	width: 216px;
    height: 27px;
    display: block;
    color: #D3D3D3;
    border: 0px #FFFFFF solid;
    background-color: #3C3C3C;
    font-family: Arial;
    font-weight: bold;
    font-size: 13px;
    font-style: normal;
    text-decoration: none;
    border-radius: 0px;
    height: 29px;
}
.dropdownsection:hover {
	color:#fff;
}
.category_dropdn a {
	float: none;
    margin: 0;
    width: 196px;
    height: auto;
    white-space: normal;
    padding: 6px 5px 6px 5px !important;
    background-color: #FFFFFF;
    background-image: none;
    border: 1px #FFFFFF solid !important;
    color: #808080;
    font-family: Arial;
    font-weight: normal;
    font-size: 13px;
    font-style: normal;
    line-height: 13px;
    text-align: center;
    text-decoration: none;
}
.category_dropdn a:hover {
	background-color:#F05235;
	color:#fff;
}
.padding-0 {
	padding:0px;
}
.search-dp {
	padding-left:5px;
    background-color: #F5F5F5;
	background-image: url(<?php echo asset_url();?>images/menu_arrow.png);
    background-repeat: no-repeat;
    background-position: right;
}
.btn-main-cat {
	color: #D3D3D3;
    border: 0px #FFFFFF solid;
    background-color: #3C3C3C;
    font-family: Arial;
    font-weight: bold;
    font-size: 13px;
    font-style: normal;
    width: 100%;
    border-radius: 0px;
    background-image: url(<?php echo asset_url();?>images/MENUICON.png);
    background-position: left;
    background-repeat: no-repeat;
    background-size: 24px;
}
.btn-main-cat:focus {
	color: #212121;
	background-color:#fff;
}
.btn-main-cat:hover {
	color: #212121 !important;
	background-color:#fff !important;
}
.btn-main-cat:visited {
	color: #212121 !important;
	background-color:#fff !important;
}
.btn-main-cat:active {
	color: #212121 !important;
	background-color:#fff !important;
}
.caret-vmiddle {
	color: #fff;
    margin-top: 7px;
}
.open > .dropdown-toggle.btn-main-cat {
	color: #212121 !important;
	background-color:#fff !important;
	border-color:#f1f1f1;
}
ul.hover-red-menu li a:hover {
   background-color: #FA5C43 !important;
   background-image: none;
   border: 1px #FA5C43 solid;
   color: #FFFFFF;
}
ul.hover-red-menu li.open a.firstmain{
   background-color: #FA5C43 !important;
   background-image: none;
   border: 1px #FA5C43 solid;
   color: #FFFFFF;
}
.search-box {
	padding-left:5px;
}


</style>
 <script src="<?php echo asset_url();?>js/bootstrap-dropdownhover.min.js"></script>
 <div class="container" style="width:1280px;padding:1px 0px;">
 <?php if(empty($this->session->userdata('tsuserid')) && $this->session->userdata('tsuserid') <= 0) { ?>
		 <div class="container-fluid top-div">
            <ul class="nav navbar-nav navbar-left top-nav">
                <li><a href="#" class="headerMenu" data-toggle="modal" data-target="#myModal" style="padding-right: 0px;">Register</a></li>
                <li><a data-toggle="modal" style="color:#C0C0C0;font-family:Georgia;font-size:13px;">|</a></li>
                 <li><a href="signin" class="headerMenu"  style="padding-left: 0px;">Login</a></li> 
            </ul>
            <ul class="nav navbar-nav navbar-right top-nav">

                <li><a href="#" class="headerMenu" style="padding: 9px 15px;padding-right: 0px;">How to</a></li>
                <li><a data-toggle="modal" style="color:#C0C0C0;font-family:Georgia;font-size:13px;padding: 9px 15px;" >|</a></li>
                <li class="dropdown ">
                	<a href="#" class="dropdown-toggle headerMenu style177" data-toggle="dropdown" role="button" aria-expanded="false"  style="padding: 9px 15px;padding-left: 0px;">Language 
                        <img src="assets/images/img0142.png" id="Shape64" alt="" style="width:14px;height:7px;">
                   	</a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="firstmain"><a href="#" target="_self">English</a> </li>
                        <li><a href="#" target="_self">中文</a> </li>
                        <li><a href="#" target="_self">العربية</a> </li>
                        <li><a href="#" target="_self">Türk</a> </li>
                        <li><a href="#" target="_self">日本語</a> </li>
                        <li><a href="#" target="_self">한국어</a> </li>
                        <li><a href="#" target="_self">भारतीय</a> </li>
                        <li><a href="#" target="_self">русский</a> </li>
                        <li><a href="#" target="_self">Dutch</a> </li>
                    </ul>
                </li>
            </ul>
		</div>
	<?php } else { ?>
	<div class="container-fluid top-div">
        <div class="navbar-header"> <a href="#" class="navbar-brand"><span style="color:#A9A9A9;font-family:Arial;font-size:16px;">TRD</span><span style="color:#F05539;font-family:Impact;font-size:16px;">STATION</span></a> </div>
        <ul class="nav navbar-nav pull-right top-nav login-user-nav">
            <li style="padding-top:17px;">
                <span style="color:#FFFFFF;font-family:Georgia;font-size:13px;">
                    <?php echo $tsprefix."  ".$tsusername; ?> 
              	</span>
           	</li>
            <li class="dropdown ">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 9px 15px;">
                    <?php if ($profile_img == '') { ?>
                        <img src="<?php echo asset_url(); ?>images/img0982.png" class="img-circle" style="width:30px; height:30px; margin-right:5px;">
                    <?php } else { ?>
                        <img src="<?php echo asset_url(); ?><?php echo $profile_img; ?>" class="img-circle" style="width:30px; height:30px; margin-right:5px;">
                    <?php } ?>
              	</a>
                <ul class="dropdown-menu" role="menu" style="font-weight: bold; left: -25px;font-size: 12px;text-align: center;min-width: 100px;">
                	<?php if($activstatus == 0) { ?>
                   		 <li class="firstmain"><a href="<?php echo base_url()?>continueregistration" target="_self">Continue</a> </li>
                   	<?php } else { ?>
                    	<?php if($tscategory_id == 1) { ?>
                    		<li class="firstmain"><a href="<?php echo base_url()?>mystation" target="_self">My Station</a> </li>
                    	<?php } else if($tscategory_id == 2) { ?>
                    		<li class="firstmain"><a href="<?php echo base_url()?>shipper_mystation" target="_self">My Station</a> </li>
                    	<?php } else if($tscategory_id == 3) { ?>
                    		<li class="firstmain"><a href="<?php echo base_url()?>buyer_mystation" target="_self">My Station</a> </li>
                    	<?php } ?>
                    <?php } ?>
                    <li><a href="<?php echo base_url(); ?>logout" target="_self" >Logout</a> </li>
                </ul>
            </li>
            <li class="dropdown " style="margin-top:5px;">
            	<a href="#" class="dropdown-toggle style177" data-toggle="dropdown" role="button" aria-expanded="false" style="padding: 9px 15px;">Language 
                    <img src="<?php echo asset_url(); ?>images/img1188.png" id="Shape17" alt="" style="width:14px;height:7px;">
              	</a>
                <ul class="dropdown-menu" role="menu" style="min-width:100px;left:0px;">
                    <li class="firstmain"><a href="#" target="_self">English</a> </li>
                    <li><a href="#" target="_self">中文</a> </li>
                    <li><a href="#" target="_self">العربية</a> </li>
                    <li><a href="#" target="_self">Türk</a> </li>
                    <li><a href="#" target="_self">日本語</a> </li>
                    <li><a href="#" target="_self">한국어</a> </li>
                    <li><a href="#" target="_self">भारतीय</a> </li>
                    <li><a href="#" target="_self">русский</a> </li>
                    <li><a href="#" target="_self">Dutch</a> </li>
                </ul>
            </li>
        </ul>
    </div>
	<?php } ?>
<nav class="navbar" style="background: none; border: 0px; margin-bottom: 0px; border-radius: 0px;">
	<div class="">
		<div class="" style="padding-top:1px;padding-right:1px;">
			<div class="col-lg-2 col-sm-4 logo">
				<div style="color:#E8AD8F;font-family:Georgia;font-size:12px;">WELCOME TO THE</div>
				<div style="color:#FFFFFF;font-family:Arial;font-size:27px;margin-top:35px;">TRD</div>
				<div style="color:#FFFFFF;font-family:Impact;font-size:48px;letter-spacing:0.07px;margin-top:-15px;">STATION</div>
				<div style="color:#E8AD8F;font-family:Arial;font-size:12px;margin-top:-7px;">The new ear of ecommerce</div>
			</div>
			<?php 
			if($page == 'sellers') {
				$bg_img = 'images/sellerheader0.jpg';
			} else if($page == 'shippers') {
				$bg_img = 'images/shipperrheader.jpg';
			} else if($page == 'buyers') {
				$bg_img = 'images/buyerrheader.jpg';
			} else if($page == 'product') {
				$bg_img = 'images/pro_header.png';
			} else if($page == 'pro-videos') {
				$bg_img = 'images/provideoheader.png';
			} else {
				$bg_img = 'images/ts/homeheader0.jpg';
			}
			?>
			<div class="col-lg-4 col-sm-8" style="background:url(<?php echo asset_url();?><?php echo $bg_img;?>) no-repeat center center; background-size:100% 100%; height:235px;">
			</div>
			<div class="col-lg-6 col-sm-12">
				<div class="row open-div1 bgwhite"style="position: relative; min-height: 235px;background-color: #FFFFFF;">
					<div class="col-xs-11">
						<ul class="nav navbar-nav trd-nav">
							<li class=" col-sm-2 col-xs-6">
								<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/ts/Homekit.png" style="width: 50px;">
								<h5>Home</h5></a></li>
							<li class="col-sm-2 col-xs-6">
								<a href="<?php echo base_url();?>seller"><img src="<?php echo base_url();?>assets/images/ts/seller.png" style="width: 50px;">
								<h5 <?php if($page == 'sellers'){?>class="blue-color"<?php }?>>Sellers</h5></a></li>
							<li class="col-sm-2 col-xs-6">
								<a href="<?php echo base_url();?>products"><img src="<?php echo base_url();?>assets/images/ts/products.png" style="width: 50px;">
								<h5 <?php if($page == 'product'){?>class="blue-color"<?php }?>>Products</h5></a></li>
							<li class="col-sm-2 col-xs-6">
								<a href="<?php echo base_url();?>b-station"><img src="<?php echo base_url();?>assets/images/ts/trade.png" style="width: 50px;">
								<h5>B-Station</h5></a></li>
							<li class="col-sm-2 col-xs-6">
							<a href="<?php echo base_url();?>pro-video"><img src="<?php echo base_url();?>assets/images/ts/vidtube0.png" style="width: 50px;">
								<h5 <?php if($page == 'pro-videos'){?>class="blue-color"<?php }?>>Pro-Videos</h5></a></li>
							<li class="col-sm-2 col-xs-6">
								<a href="<?php echo base_url();?>buyer"><img src="<?php echo base_url();?>assets/images/ts/buyer.png" style="width: 50px;">
								<h5 <?php if($page == 'buyers'){?>class="blue-color"<?php }?>>Buyers</h5></a></li>
							<li class="col-sm-2 col-xs-6">
								<a href="<?php echo base_url();?>shipper"><img src="<?php echo base_url();?>assets/images/ts/shipper.png" style="width: 50px;">
								<h5 <?php if($page == 'shippers'){?>class="blue-color"<?php }?>>Shippers</h5></a></li>
							<li class="col-sm-2 col-xs-6">
							<a href="<?php echo base_url();?>stock-goods"><img src="<?php echo base_url();?>assets/images/ts/stock.png" style="width: 50px;">
								<h5>Stock Goods</h5></a></li>
							<li class="col-sm-2 col-xs-6">
							<a href="<?php echo base_url();?>community"><img src="<?php echo base_url();?>assets/images/ts/CommMember.png" style="width: 50px;">
								<h5>Community</h5></a></li>
							<li class="col-sm-2 col-xs-6">
							<a href="<?php echo base_url();?>my-alert" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="<?php echo base_url();?>assets/images/ts/Alerts1.png" style="width: 50px;">
								<h5>My Alerts</h5></a></li>
						</ul>
					</div>
					<div class="reminder-div">
						<div id="wb_Image168" style="position:absolute;left:144px;top:61px;width:53px;height:53px;z-index:1121;">
							<?php if(!empty($busi_id)) { ?>
								<?php if($tscategory_id == 1) { ?>
									<a href="<?php echo base_url();?>desksite/<?php echo $busi_id;?>">
								<?php } else if($tscategory_id == 2) { ?>
									<a href="<?php echo base_url();?>shipper/profile/<?php echo $busi_id;?>">
								<?php } else { ?>
									<a href="<?php echo base_url();?>buyer/profile/<?php echo $busi_id;?>">
								<?php } ?>
							<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="#accessDeniedModalLogin" data-backdrop="static" data-keyboard="false">
							<?php } ?>
							<img src="<?php echo asset_url();?>images/Desksite-big.png" id="Image168" alt="" style="width:53px;height:53px;">
							</a>
						</div>
						<div id="wb_Shape15" style="position:absolute;left:455px;top:60px;width:55px;height:55px;z-index:1122;">
							<?php if(!empty($busi_id)) { ?>
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
							<?php if(!empty($busi_id)) { ?>
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
				</div>
			</div>
		</div>
	</div>
</nav>
 <!--my alert-->
        <div aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog" class="modal fade bs-example-modal-lg" style="padding-right: 17px;">
            <div role="document" class="modal-dialog modal-lg mobile-view" style="width:auto; max-width:1100px;">
                <div class="modal-content">
                    <div class="side-menu">
                        <ul>
                            <li><a href="#"><img src="assets/images/ts/Alerts1.png"><br>Alerts</a></li>
                            <li><a href="#"><img src="assets/images/ts/myfavor0.png" style="width:50px;"><br>My Favorite</a></li>
                            <li><a href="#"><img src="assets/images/ts/mycart.png" style="width:50px;"><br>My Cart</a></li>
                            <li><a href="#"><img src="assets/images/ts/addrequest.png" style="width:50px;"><br>Add Requests</a></li>
                            <li><a href="#"><img src="assets/images/ts/incomingchatalerts.png" style="width:50px;"><br>Chat Alerts</a></li>
                            <li><a href="#"><img src="assets/images/ts/inquiry.png" style="width:50px;"><br>Inquiries</a></li>
                            <li><a href="#"><img src="assets/images/ts/offer-tool1.png" style="width:50px;"><br>Offers</a></li>
                            <li><a href="#"><img src="assets/images/ts/My-order.png" style="width:50px;"><br>My Orders</a></li>
                        </ul>
                    </div>
                    <div class="modal-header" style="padding:0px;">
                        <button aria-label="Close" data-dismiss="modal" class="close" type="button" style="position:relative; z-index:111; opacity:1; color:#fff; right:10px; top:10px; font-size:30px;"><span aria-hidden="true">×</span></button>
                        <nav class="navbar navbar-inverse" style="margin-bottom:0px;">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar2" style="margin:0px;"> <img src="assets/images/ts/menu-icon.png"></button>
                                <a href="#" class="navbar-brand">My Favorite</a>
                            </div>
                            <div class="collapse navbar-collapse" id="defaultNavbar2" style="max-width:1235px; margin:auto;">
                                <ul class="nav navbar-nav alert-nav">
                                    <li><a href="<?php echo base_url();?>seller">Sellers</a></li>
                                    <li><a href="<?php echo base_url();?>shipper">Shippers</a></li>
                                    <li><a href="<?php echo base_url();?>buyer">Buyers</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Videos</a></li>
                                    <li><a href="#">R3D Pro</a></li>
                                    <li><a href="#">V-Catalouge</a></li>
                                    <li><a href="#">Ads.</a></li>
                                    <li><a href="#">Posts</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-1" style="padding-top:7%;"><input type="checkbox" class="form-control"></div>
                            <div class="col-xs-11">
                                <div class="panel" style="border:1px solid #eee;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel" style="background:#fff; padding-top:35px;"> 
                                                    <!-- Indicators -->

                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="item active"> <img src="assets/images/ts/img0761.png" alt="..."> </div>
                                                        <div class="item"> <img src="assets/images/ts/img0485.png" alt="..."> </div>
                                                    </div>
                                                    <!-- Controls --> 
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row" style="margin:0px;">
                                                    <div class="pull-left"><img src="assets/images/ts/img0989.png" style="width:30px; height:30px;" class="img-circle"></div>
                                                    <div class="pull-left" style="padding-left:10px;">
                                                        <p style="margin-bottom:0;"><a href="#"><b>Joystar Shoes Manufacturer Co.</b> </a></p>
                                                        <p><small>Presented By: Ms. Rose</small></p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <p><small>Our men’s shoes department covers virtually every need, whether you’re looking for cross-training shoes, retro sneakers, laid, Our men’s shoes department covers virtually every need, whether you’re looking for cross-training shoes, retro sneakers, laid-ba...</small></p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <label style="display:inline-block;">Main Products |</label><p style="display:inline-block;"><small>Classic Shoes, Sport Shoes,  Slippers, PVC Shoes, Leather Shoes, Leather Shoes, Leather Shoes...</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="row" style="margin:0px;">
                                                    <h1 class=" text-center"> <img style="width:40px; display:inline-block;" src="assets/images/ts/guarantee.png"> <img style="width:30px; display:inline-block;" src="assets/images/ts/trusted.png"> <img style="width:30px; display:inline-block;" src="assets/images/ts/member-logo.png"> </h1>
                                                    <div class="col-xs-12">
                                                        <p><b>Seller Type | </b>Manufacturer</p>
                                                        <p><b>China |  </b>Guangzhou</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Rank</label>
                                                        <div style="background:#eee; border-radius:50px; height:5px;">
                                                            <div style="background:#FD6B6E; border-radius:50px; height:5px; width:82%;"> <span style="color:#FD6B6E; float:right;position:relative; top:10px;">82%</span> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xs-1" style="padding-top:7%;"><input type="checkbox" class="form-control"></div>
                            <div class="col-xs-11">
                                <div class="panel" style="border:1px solid #eee;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel" style="background:#fff; padding-top:35px;"> 
                                                    <!-- Indicators -->

                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="item active"> <img src="assets/images/ts/img0761.png" alt="..."> </div>
                                                        <div class="item"> <img src="assets/images/ts/img0485.png" alt="..."> </div>
                                                    </div>
                                                    <!-- Controls --> 
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row" style="margin:0px;">
                                                    <div class="pull-left"><img src="assets/images/ts/img0989.png" style="width:30px; height:30px;" class="img-circle"></div>
                                                    <div class="pull-left" style="padding-left:10px;">
                                                        <p style="margin-bottom:0;"><a href="#"><b>Joystar Shoes Manufacturer Co.</b> </a></p>
                                                        <p><small>Presented By: Ms. Rose</small></p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <p><small>Our men’s shoes department covers virtually every need, whether you’re looking for cross-training shoes, retro sneakers, laid, Our men’s shoes department covers virtually every need, whether you’re looking for cross-training shoes, retro sneakers, laid-ba...</small></p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <label style="display:inline-block;">Main Products |</label><p style="display:inline-block;"><small>Classic Shoes, Sport Shoes,  Slippers, PVC Shoes, Leather Shoes, Leather Shoes, Leather Shoes...</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="row" style="margin:0px;">
                                                    <h1 class=" text-center"> <img style="width:40px; display:inline-block;" src="assets/images/ts/guarantee.png"> <img style="width:30px; display:inline-block;" src="assets/images/ts/trusted.png"> <img style="width:30px; display:inline-block;" src="assets/images/ts/member-logo.png"> </h1>
                                                    <div class="col-xs-12">
                                                        <p><b>Seller Type | </b>Manufacturer</p>
                                                        <p><b>China |  </b>Guangzhou</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Rank</label>
                                                        <div style="background:#eee; border-radius:50px; height:5px;">
                                                            <div style="background:#FD6B6E; border-radius:50px; height:5px; width:82%;"> <span style="color:#FD6B6E; float:right;position:relative; top:10px;">82%</span> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xs-1" style="padding-top:7%;"><input type="checkbox" class="form-control"></div>
                            <div class="col-xs-11">
                                <div class="panel" style="border:1px solid #eee;">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel" style="background:#fff; padding-top:35px;"> 
                                                    <!-- Indicators -->

                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="item active"> <img src="assets/images/ts/img0761.png" alt="..."> </div>
                                                        <div class="item"> <img src="assets/images/ts/img0485.png" alt="..."> </div>
                                                    </div>
                                                    <!-- Controls --> 
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row" style="margin:0px;">
                                                    <div class="pull-left"><img src="assets/images/ts/img0989.png" style="width:30px; height:30px;" class="img-circle"></div>
                                                    <div class="pull-left" style="padding-left:10px;">
                                                        <p style="margin-bottom:0;"><a href="#"><b>Joystar Shoes Manufacturer Co.</b> </a></p>
                                                        <p><small>Presented By: Ms. Rose</small></p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <p><small>Our men’s shoes department covers virtually every need, whether you’re looking for cross-training shoes, retro sneakers, laid, Our men’s shoes department covers virtually every need, whether you’re looking for cross-training shoes, retro sneakers, laid-ba...</small></p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <label style="display:inline-block;">Main Products |</label><p style="display:inline-block;"><small>Classic Shoes, Sport Shoes,  Slippers, PVC Shoes, Leather Shoes, Leather Shoes, Leather Shoes...</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="row" style="margin:0px;">
                                                    <h1 class=" text-center"> <img style="width:40px; display:inline-block;" src="assets/images/ts/guarantee.png"> <img style="width:30px; display:inline-block;" src="assets/images/ts/trusted.png"> <img style="width:30px; display:inline-block;" src="assets/images/ts/member-logo.png"> </h1>
                                                    <div class="col-xs-12">
                                                        <p><b>Seller Type | </b>Manufacturer</p>
                                                        <p><b>China |  </b>Guangzhou</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Rank</label>
                                                        <div style="background:#eee; border-radius:50px; height:5px;">
                                                            <div style="background:#FD6B6E; border-radius:50px; height:5px; width:82%;"> <span style="color:#FD6B6E; float:right;position:relative; top:10px;">82%</span> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--my alert--> 
          <!-- register -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="max-width:520px;">
                <div class="modal-content" id="popup">
                    <div class="modal-header text-center" style="background:url(assets/images/ts/hiker-984083_1920.jpg) no-repeat center center; background-size:cover;padding: 8% 15px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: -11px; position: absolute; right: -15px; opacity: 1;"><img src="assets/images/ts/close_deal.png" style="width:30px;"></button>
                        <p style="color:#fff;padding: 0 70px;"><span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Get started, Join free, Add a unique value to your business, discover a new vision of e-commerce and much more..!</span></p>
                        <h4 class="modal-title" id="myModalLabel" style="color:#fff;"><span style="color:#FFFFFF;font-family:'Arial';font-size:17px; font-weight:bolder;">SOCIAL B2B COMMUNITY</span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel">
                            <div class="panel-body">
                                <form action="#" method="post" >
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="row">
                                            	<div class="col-sm-1 col-xs-1" style="padding-top: 15px;">
                                            		<span style="color: #FF0004; font-size: 16px; text-align: right;">*</span>
                                            	</div>
                                                <div class="col-sm-2 col-xs-3">
                                                    <select class="form-control input-box" id="prefix">
                                                        <option value="Mr">Mr.</option>
                                                        <option value="Miss">Miss.</option>
                                                        <option value="Mrs">Mrs.</option>
                                                        <option value="Ms">Ms.</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-8 col-xs-6">
                                                	<input class="input-box form-control" type="text" placeholder="Full Name" id="fullName" onkeyup="validateName(this.value);"/>
                                                </div>
                                                <div class="col-sm-1 col-xs-2 text-center" style="padding-top:8px;" >
                                                	<div id="fullNameCorrectImg" style="display:none;">
                                                		<img src="assets/images/ts/tick-octagon-frame.png">
                                                	</div>
                                                	<div id="fullNameCrossImg" style="display:none;">
                                                		<img src="assets/images/Error.png" style="height:20px;">
                                                	</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-7 errMsg" id="registrationFullNameErrMsg" ></div>
                                            </div>
                                            <div class="row">
                                            	<div class="col-sm-1 col-xs-1" style="padding-top: 15px;">
                                            		<span style="color: #FF0004; font-size: 16px; text-align: right;">*</span>
                                            	</div>
                                                <div class="col-sm-10 col-xs-9">
                                                	<input class="input-box form-control" type="text" placeholder="Email" id="registrationEmail" onkeyup="validateEmail(this.value);">
                                                </div>
                                                <div class="col-sm-1 col-xs-2 text-center" style="padding-top:8px;">
                                                	<div style="display:none;" id="emailCorrectImg">
                                                		<img src="assets/images/ts/tick-octagon-frame.png">
	                                                </div>
	                                                <div style="display:none;" id="emailCrossImg">
                                                		<img src="assets/images/Error.png" style="height:20px;">
                                                	</div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="text-center">
                                                	<small> Your Email will be your unique Trade Station ID, and couldn't be changed after.</small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center errMsg" id="registrationEmailErrMsg">
                                                	<small> Your Email will be your unique Trade Station ID, and couldn't be changed after.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top:30px;">
                                    	<div class="row">
	                                        <div class="row">
	                                        	<div class="col-sm-1 col-xs-1" style="padding-top:10px;"><span style="color: #FF0004; font-size: 16px; text-align: right;">*</span></div>
	                                        	<div class="col-sm-11 col-xs-11"><h5> Select your registration type </h5></div>
	                                        	<div class="col-sm-12 col-xs-12"><span class="errMsg" id="registrationTypeErrMsg"></span></div>
	                                        </div>
	                                   	</div>
                                        <div class="row">
                                            <div class="row">
                                            	<div class="col-xs-1 col-sm-1">&nbsp;</div>
                                                <div class="col-xs-1 col-sm-1 text-right">
                                                    <input type="radio" class="input-box form-control" value="1" name="category" style="margin-top: 0px;width: 1em;">
                                                </div>
                                                <div class="col-xs-4 col-sm-4">
                                                    <img src="assets/images/ts/seller.png" style="width:30px"><small>Seller</small>
                                                </div>
                                                <div class="col-xs-4 col-sm-5">
                                                    <select class="form-control input-box" id="seller">
                                                   	 <option value="0">Business type</option>
                                                    	                                                        	<option value=1>Manufacturer</option>
                                                                                                                	<option value=2>Supplier</option>
                                                                                                                	<option value=3>Trading company</option>
                                                                                                                	<option value=4>Product/Brand Agent</option>
                                                                                                            </select>
                                                </div>
                                                <div class="col-xs-2 col-sm-1 text-center" style="vertical-align:middle;display: none;"><img src="assets/images/ts/tick-octagon-frame.png"></div>
                                            </div>
                                            <div class="row">
                                            	<div class="col-xs-1 col-sm-1">&nbsp;</div>
                                                <div class="col-xs-1 col-sm-1">
                                                    <input type="radio" class="input-box form-control" value="2" name="category" style="margin-top:0px;width:1em;">
                                                </div>
                                                <div class="col-xs-4 col-sm-4">
                                                    <img src="assets/images/ts/shipper.png" style="width:30px"><small>Shipper</small>
                                                </div>
                                                <div class="col-xs-4 col-sm-5">
                                                    <select class="form-control input-box" id="shipper">
                                                        <option value="0">Business type</option>
                                                    	                                                        	<option value=5>Shipping line</option>
                                                                                                                	<option value=6>Shipping Agent</option>
                                                                                                                	<option value=7>Forwarder</option>
                                                                                                                	<option value=8>Shipping Company</option>
                                                                                                            </select>
                                                </div>
                                                <div class="col-xs-2 col-sm-1 text-center" style="vertical-align:middle;display: none;"><img src="assets/images/ts/tick-octagon-frame.png"></div>
                                            </div>
                                            <div class="row">
                                            	<div class="col-xs-1 col-sm-1">&nbsp;</div>
                                                <div class="col-xs-1 col-sm-1">
                                                    <input type="radio" class="input-box form-control" value="3" name="category" style="margin-top:0px;width:1em;">
                                                </div>
                                                <div class="col-xs-4 col-sm-4">
                                                    <img src="assets/images/ts/buyer.png" style="width:30px"><small>Buyer</small>
                                                </div>
                                                <div class="col-xs-4 col-sm-5">
                                                    <select class="form-control input-box" id="buyer">
                                                        <option value="0">Business type</option>
                                                    	                                                        	<option value=9>Importer</option>
                                                                                                                	<option value=10>Distributer</option>
                                                                                                                	<option value=11>Trader</option>
                                                                                                                	<option value=12>Wholesale Marker</option>
                                                                                                                	<option value=13>Government Ministry/Office</option>
                                                                                                            </select>
                                                </div>
                                                <div class="col-xs-2 col-sm-1 text-center" style="vertical-align:middle;display: none;"><img src="assets/images/ts/tick-octagon-frame.png"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 class="text-center"  style="line-height:0.7;"><span style="color:#3C3C3C;font-family:Arial;font-size:11px;">TRADE</span><br>
                                                <b style="color:#F05235;"><span style="color:#FA5C43;font-family:Impact;font-size:20px;letter-spacing:0.07px;">STATION</span></b></h2>
                                            <p class="text-center termpolicy">Press next to Agree & Accept our<a href="javascript:termscondition(1);"> Terms of use & Privacy policy.</a></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-sm-offset-3 text-center"><input type="button" id="Button2" onclick="registerStepOne();" value="Next" style="color:white;width:182px;height:31px;background-image:none;"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- register -->
		 <div id="main-page" style="width:1280px;margin-left:auto;margin-right:auto;display:none;" >
		 <div class="container-fluid top-div">
            <ul class="nav navbar-nav navbar-left top-nav">
                <li><a href="#" class="headerMenu" data-toggle="modal" data-target="#myModal" style="padding-right: 0px;">Register</a></li>
                <li><a data-toggle="modal" style="color:#C0C0C0;font-family:Georgia;font-size:13px;">|</a></li>
             <!--   <li><a href="#" class="headerMenu" data-toggle="modal" data-target="#myModallogin" style="padding-left: 0px;">Login</a></li>  -->
                 <li><a href="signin.php" class="headerMenu"  style="padding-left: 0px;">Login</a></li> 
            </ul>
            <ul class="nav navbar-nav navbar-right top-nav">

                <li><a href="#" class="headerMenu" style="padding-right: 0px;">How to</a></li>
                <li><a data-toggle="modal" style="color:#C0C0C0;font-family:Georgia;font-size:13px;" >|</a></li>
                <li class="dropdown "><a href="#" class="dropdown-toggle headerMenu" data-toggle="dropdown" role="button" aria-expanded="false"  style="padding-left: 0px;">Language 
                        <img src="assets/images/img0142.png" id="Shape64" alt="" style="width:14px;height:7px;"></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="firstmain"><a href="#" target="_self">English</a> </li>
                        <li><a href="#" target="_self">中文</a> </li>
                        <li><a href="#" target="_self">العربية</a> </li>
                        <li><a href="#" target="_self">Türk</a> </li>
                        <li><a href="#" target="_self">日本語</a> </li>
                        <li><a href="#" target="_self">한국어</a> </li>
                        <li><a href="#" target="_self">भारतीय</a> </li>
                        <li><a href="#" target="_self">русский</a> </li>
                        <li><a href="#" target="_self">Dutch</a> </li>
                    </ul>
                </li>
            </ul>
		</div>
</div>

<div class="padding1" style="margin-top:-10px;">
	<div class="">
		<div class="col-lg-12 space11" style="padding:0px;">
			<div class="search-div"> 
			<?php if($page =='home'){ ?>
				<form method="post" action="search" >
					<div class="col-sm-7 col-xs-11" style="padding: 0px;">
						<input type="text" class="search-box" required="required" name="keyword" placeholder="Type a keyword to seach ( product, company or name )...">
					</div>
					<div class="col-sm-2 col-xs-3 " style="padding: 0px;">
						<div class="dropdown">
							<select class="search-box search-dp" required="required" name='type'>
								<option>Search for</option>
								<option value="1">Sellers</option>
								<option value="2">Shippers</option>
								<option value="3">Buyers</option>
								<option value="4">Products</option>
							</select>
						</div>
					</div>
					<div class="col-sm-2 col-xs-3 " style="padding: 0px;">
						<div class="dropdown">
							<select class="search-box search-dp" name='country'>
								<option value="0_0">Country</option>
								<?php foreach ($Country as $country){?>
									<option value="<?php echo $country['id'].'_'.$country['name'];?> "><?php echo $country['name'];?></option>
								<?php }?>
							</select>
							
						</div>
					</div>
					<div class="col-sm-1 col-xs-1" style="padding: 0px;">
						<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
					</div>
				</form> 
				<?php } elseif($page =='sellers'){?>
					<form method="get" action="<?php echo base_url();?>seller" style="padding-top:25px;" name="sellerfrm" onsubmit="return validateForm('sellerfrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="seller_cat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="seller_cat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectSellerScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-6 col-xs-11" style="padding: 0px;">
							<input type="text" class="search-box" name="keyword" placeholder="Type a keyword to seach ( product, company or name )..." value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" />
						</div>
						<div class="col-sm-4 col-xs-4 " style="padding: 0px;background-color:#fff;">
							<div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
											<option value="">Country</option>
											<?php foreach ($Country as $country){?>
												<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
											<?php }?>
										</select>
										
									</div>
								</div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" id="city" name='city'>
											<option value="">City</option>
											<?php foreach($cities as $city){?>
												<option value="<?php echo $city['company_city']?>" <?php if(!empty($params['city']) && $params['city'] == $city['company_city']) { ?>selected<?php } ?>><?php echo $city['company_city']?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<!-- div class="col-sm-8 padding-0">
									<div class="dropdown">
										<select class="search-box search-dp" name='type'>
											<option value="">More</option>
											<option value="0" <?php if(!empty($params['type']) && $params['type'] == 0) { ?>selected<?php } ?>>Show Audited First</option>
											<option value="1" <?php if(!empty($params['type']) && $params['type'] == 1) { ?>selected<?php } ?>>Show All</option>
										</select>
									</div>
								</div-->
								<div class="col-sm-2 padding-0">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
				<?php } elseif ($page=='shippers'){?>
					<form method="get" action="<?php echo base_url();?>shipper" style="padding-top:25px;" name="shipperfrm" onsubmit="return validateForm('shipperfrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="shipper_cat_label" style="background-image: url(<?php echo asset_url();?>images/line_menu.png);background-repeat: no-repeat;background-position: left center;background-color:#fff;color:#555;">
						   		<?php 
						   		$subcat = "";
						   		foreach($services as $service) {
				   					if(!empty($params['service']) && $params['service'] == $service['name']) {
				   						$subcat = $service['name'];
				   					}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Shipping Categories<?php } ?>
						  	</a>
							<input type="hidden" name="service" id="service_cat_id" value="<?php if(!empty($params['service'])) { echo $params['service'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach($services as $service){?>
						    	<li class="dropdown">
						        	<a href="javascript:selectServicecat(<?php echo $service['id'];?>,`<?php echo $service['name'];?>`);"><?php echo $service['name'];?></a>
						    	</li>
						    	<?php } ?>
						  	</ul>
							<!-- select class="search-box dropdownsection" name='service'>
									<option value="">Shipping Categories</option>
									<?php foreach($services as $service){?>
									<option value="<?php echo $service['name'];?>" <?php if(!empty($params['service']) && $params['service'] == $service['name']) { ?>selected<?php } ?>><?php echo $service['name']?></option>
									<?php }?>
							</select-->
						</div>
						<div class="col-sm-7 col-xs-11 padding-0">
							<div class="col-sm-12 padding-0" style="padding-left:10px;">
								<input type="text" class="search-box" name="keyword" placeholder="Type your destination port or shipping company name..." value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>">
							</div>
						</div>
						<div class="col-sm-3 col-xs-3" style="padding: 0px;">
							<div class="col-sm-5 padding-0">
								<div class="dropdown">
									<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
										<option value="">From</option>
										<?php foreach ($Country as $country){?>
										<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-sm-5 padding-0">
								<div class="dropdown">
									<select class="search-box search-dp" name='city' id="city">
										<option value="">City</option>
										<?php foreach ($cities as $city){?>
											<option value="<?php echo $city['name'];?>" <?php if(!empty($params['city']) && $params['city'] == $city['name']) { ?>selected<?php } ?>><?php echo $city['name'];?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-sm-2 padding-0">
								<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</form>
					<?php } elseif ($page == 'buyers'){?>
					<form method="get" action="<?php echo base_url();?>buyer" style="padding-top:25px;" name="buyerfrm" onsubmit="return validateFormB('buyerfrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="seller_cat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="seller_cat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectBuyerScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-7 col-xs-11" style="padding: 0px;">
							<input type="text" class="search-box"  name="keyword"  value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" placeholder="Type a keyword to seach ( product, company or name )...">
						</div>
						<div class="col-md-3" style="padding: 0px;">
							<div class="col-sm-5 col-xs-3 " style="padding: 0px;">
								<div class="dropdown">
									<select class="search-box search-dp" name='country'>
										<option value="">Country</option>
										<?php foreach ($Country as $country){?>
											<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-sm-5 col-xs-3 " style="padding: 0px;">
								<div class="dropdown">
									<select class="search-box search-dp" name='type'>
										<option value="">More</option>
										<option value="1"  <?php if(!empty($params['type']) && $params['type'] == 1) { ?>selected<?php } ?>>Show active first</option>
										<option value="2"  <?php if(!empty($params['type']) && $params['type'] == 2) { ?>selected<?php } ?>>Show requester first</option>
									</select>
								</div>
							</div>
							<div class="col-sm-2 col-xs-1" style="padding: 0px;">
								<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</form>
					<br><br><br><br>
				<?php } elseif ($page =='product'){?>
					<form method="get" action="<?php echo base_url();?>products" style="padding-top:25px;" name="productfrm" onsubmit="return validateForm('productfrm');">
						<div class="col-sm-2 col-xs-2" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="seller_cat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="seller_cat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectProductScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-5 col-xs-5" style="padding: 0px;">
							<input type="text" class="search-box"  value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" name="keyword" placeholder="Type a keyword to seach ( product, company or name )...">
						</div>
						<div class="col-sm-5 col-xs-5" style="padding: 0px;background-color: #fff;">
							<div class="col-sm-7" style="padding:0px">
								<div class="col-sm-6" style="padding:0px">
									<div class="dropdown">
										<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
											<option value="">Country</option>
											<?php foreach ($Country as $country){?>
												<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="col-sm-6" style="padding:0px 2px;">
									<div class="dropdown">
										<select class="search-box search-dp" id="city" name='city'>
											<option value="">City</option>
											<?php foreach($cities as $city){?>
												<option value="<?php echo $city['name']?>" <?php if(!empty($params['city']) && $params['city'] == $city['name']) { ?>selected<?php } ?>><?php echo $city['name']?></option>
											<?php }?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-5" style="padding:0px;">
								<div class="col-sm-8" style="padding:0px;">
									<div class="dropdown">
										<select class="search-box search-dp"  name='type'>
											<option value="">More</option>
											<option value="1"  <?php if(!empty($params['type']) && $params['type'] == 1) { ?>selected<?php } ?>>Show low price first</option>
											<option value="2"  <?php if(!empty($params['type']) && $params['type'] == 2) { ?>selected<?php } ?>>Show higher price first</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4" style="padding:0px;padding-left:2px;">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
					<?php } else if($page == 'pro-videos') { ?>
					<br><br>
					<form method="get" action="<?php echo base_url();?>pro-video" name="videofrm" onsubmit="return validateForm('videofrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="seller_cat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="seller_cat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectVideoScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-7 col-xs-11" style="padding: 0px;">
							<input type="text" class="search-box" name="keyword" placeholder="Type a keyword to seach ( product or company name )..." value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" />
						</div>
						<div class="col-sm-3 col-xs-3 " style="padding: 0px;">
							<div class="col-sm-5 col-xs-5 " style="padding: 0px;">
								<div class="dropdown">
									<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
										<option value="">Country</option>
										<?php foreach ($Country as $country){?>
											<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
										<?php }?>
									</select>
									
								</div>
							</div>
							<div class="col-sm-5 col-xs-5 " style="padding: 0px 3px;background-color:#fff;">
								<div class="dropdown">
									<select class="search-box search-dp" id="city" name='city'>
										<option value="">City</option>
										<?php foreach($cities as $city){?>
											<option value="<?php echo $city['company_city']?>" <?php if(!empty($params['city']) && $params['city'] == $city['company_city']) { ?>selected<?php } ?>><?php echo $city['company_city']?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-sm-2 col-xs-2 " style="padding: 0px;background-color:#fff;">
								<div class="padding-0">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
					<?php } elseif($page =='3dproduct'){?>
					<form method="get" action="<?php echo base_url();?>3dproducts" style="padding-top:25px;" name="dprofrm" onsubmit="return validateForm('dprofrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="dproduct_cat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="dproduct_cat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectDproductScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-6 col-xs-11" style="padding: 0px;">
							<input type="text" class="search-box" name="keyword" placeholder="Type a keyword to seach ( product, company or name )..." value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" />
						</div>
						<div class="col-sm-4 col-xs-4 " style="padding: 0px;background-color:#fff;">
							<div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
											<option value="">Country</option>
											<?php foreach ($Country as $country){?>
												<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
											<?php }?>
										</select>
										
									</div>
								</div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;width:187px;">
									<div class="dropdown">
										<select class="search-box search-dp" id="city" name='city'>
											<option value="">City</option>
											<?php foreach($cities as $city){?>
												<option value="<?php echo $city['company_city']?>" <?php if(!empty($params['city']) && $params['city'] == $city['company_city']) { ?>selected<?php } ?>><?php echo $city['company_city']?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="col-sm-2 padding-0" style="width:60px;">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
				<?php } else if($page =='vcatalogue') { ?>
					<form method="get" action="<?php echo base_url();?>vcatalogues" style="padding-top:25px;" name="vcatfrm" onsubmit="return validateForm('vcatfrm');">
						<div class="col-sm-2 col-xs-2" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="catalogue_cat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="catalogue_cat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectCatalogeScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-5 col-xs-5" style="padding: 0px;">
							<input type="text" class="search-box"  value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" name="keyword" placeholder="Type a keyword to seach ( product, company or name )...">
						</div>
						<div class="col-sm-5 col-xs-5" style="padding: 0px;background-color: #fff;">
							<div class="col-sm-7" style="padding:0px">
								<div class="col-sm-6" style="padding:0px">
									<div class="dropdown">
										<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
											<option value="">Country</option>
											<?php foreach ($Country as $country){?>
												<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="col-sm-6" style="padding:0px 2px;">
									<div class="dropdown">
										<select class="search-box search-dp" id="city" name='city'>
											<option value="">City</option>
											<?php foreach($cities as $city){?>
												<option value="<?php echo $city['name']?>" <?php if(!empty($params['city']) && $params['city'] == $city['name']) { ?>selected<?php } ?>><?php echo $city['name']?></option>
											<?php }?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-5" style="padding:0px;">
								<div class="col-sm-9" style="padding: 0px 2px;width: 161px;">
									<div class="dropdown">
										<select class="search-box search-dp"  name='type'>
											<option value="">More</option>
											<option value="1"  <?php if(!empty($params['type']) && $params['type'] == 1) { ?>selected<?php } ?>>Show Verified First</option>
											<option value="2"  <?php if(!empty($params['type']) && $params['type'] == 2) { ?>selected<?php } ?>>Show All</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3" style="padding:0px;padding-left: 0px;width: 60px;">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
				<?php } else if($page == 'sellerdesksite') { ?>
					<form method="get" action="<?php echo base_url();?>seller/desksites" style="padding-top:25px;" name="sellerdfrm" onsubmit="return validateForm('sellerdfrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="seller_dcat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="seller_dcat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectSellerDScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-6 col-xs-11" style="padding: 0px;">
							<input type="text" class="search-box" name="keyword" placeholder="Type a keyword to seach ( product, company or name )..." value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" />
						</div>
						<div class="col-sm-4 col-xs-4 " style="padding: 0px;background-color:#fff;">
							<div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
											<option value="">Country</option>
											<?php foreach ($Country as $country){?>
												<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
											<?php }?>
										</select>
										
									</div>
								</div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" id="city" name='city'>
											<option value="">City</option>
											<?php foreach($cities as $city){?>
												<option value="<?php echo $city['company_city']?>" <?php if(!empty($params['city']) && $params['city'] == $city['company_city']) { ?>selected<?php } ?>><?php echo $city['company_city']?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<!-- div class="col-sm-8 padding-0">
									<div class="dropdown">
										<select class="search-box search-dp" name='type'>
											<option value="">More</option>
											<option value="0" <?php if(!empty($params['type']) && $params['type'] == 0) { ?>selected<?php } ?>>Show Audited First</option>
											<option value="1" <?php if(!empty($params['type']) && $params['type'] == 1) { ?>selected<?php } ?>>Show All</option>
										</select>
									</div>
								</div-->
								<div class="col-sm-2 padding-0">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
				<?php } else if($page == 'shipperdesksite') { ?>
					<form method="get" action="<?php echo base_url();?>shipper/desksites" style="padding-top:25px;" name="shipperdfrm" onsubmit="return validateForm('shipperdfrm');">
						<div class="col-sm-2 col-xs-11" style="padding: 0px;">
							<a class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="shipper_dcat_label">
						   		<?php 
						   		$subcat = "";
						   		foreach ($mcats as $mcat) {
					   				foreach ($mcat['subcats'] as $scat) {
					   					if(!empty($params['cat_id']) && $params['cat_id'] == $scat['id']) {
					   						$subcat = $scat['name'];
					   					}
					   				}
						   		}
						   		if(!empty($subcat)) {
						   			echo $subcat;
						   		} else { ?>
						   		Categories<?php } ?> <span class="caret pull-right caret-vmiddle"></span>
						  	</a>
							<input type="hidden" name="cat_id" id="shipper_dcat_id" value="<?php if(!empty($params['cat_id'])) { echo $params['cat_id'];}?>"/>
							<ul class="dropdown-menu hover-red-menu">
						  		<?php foreach ($mcats as $mcat) { ?>
						    	<li class="dropdown">
						      		<a href="#" class="firstmain"><?php echo $mcat['name'];?></a>
						      		<ul class="dropdown-menu">
						      			<?php foreach ($mcat['subcats'] as $scat) { ?>
						        		<li><a href="javascript:selectShipperDScat(<?php echo $scat['id'];?>,`<?php echo $scat['name'];?>`);"><?php echo $scat['name'];?></a></li>
						        		<?php } ?>
						       		</ul>
						    	</li>
						    	<?php } ?>
						  	</ul>
						</div>
						<div class="col-sm-6 col-xs-11" style="padding: 0px;">
							<input type="text" class="search-box" name="keyword" placeholder="Type a keyword to seach ( product, company or name )..." value="<?php if(!empty($params['keyword'])){ echo $params['keyword'];}?>" />
						</div>
						<div class="col-sm-4 col-xs-4 " style="padding: 0px;background-color:#fff;">
							<div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" name='country' onchange="changeCountry(this);">
											<option value="">Country</option>
											<?php foreach ($Country as $country){?>
												<option value="<?php echo $country['name'];?>" <?php if(!empty($params['country']) && $params['country'] == $country['name']) { ?>selected<?php } ?>><?php echo $country['name'];?></option>
											<?php }?>
										</select>
										
									</div>
								</div>
								<div class="col-sm-5 padding-0" style="padding-right: 3px;">
									<div class="dropdown">
										<select class="search-box search-dp" id="city" name='city'>
											<option value="">City</option>
											<?php foreach($cities as $city){?>
												<option value="<?php echo $city['company_city']?>" <?php if(!empty($params['city']) && $params['city'] == $city['company_city']) { ?>selected<?php } ?>><?php echo $city['company_city']?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<!-- div class="col-sm-8 padding-0">
									<div class="dropdown">
										<select class="search-box search-dp" name='type'>
											<option value="">More</option>
											<option value="0" <?php if(!empty($params['type']) && $params['type'] == 0) { ?>selected<?php } ?>>Show Audited First</option>
											<option value="1" <?php if(!empty($params['type']) && $params['type'] == 1) { ?>selected<?php } ?>>Show All</option>
										</select>
									</div>
								</div-->
								<div class="col-sm-2 padding-0">
									<button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</div>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
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
							Please login to access member area
						</div>
					</div>
					<div class="col-sm-2"></div>
      			</div>
      			<br>
      			<div class="row text-center">
      				<a href="<?php echo base_url();?>signin" class="btn btn-sm btn-danger-custom" style="width:120px;">Login</a>
      				<a href="javascript:cancelAccessDeniedPopup();" class="btn btn-sm btn-danger-custom" style="width:120px;" data-dismiss="modal">Cancel</a>
      			</div>
      			<br><br>
      		</div>
    	</div>
  	</div>
</div>
<!--  script src="<?php echo asset_url(); ?>js/jquery-1.11.1.min.js"></script-->
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
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-bounce.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-clip.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-drop.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-explode.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-fold.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-highlight.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-pulsate.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-scale.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-shake.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-slide.min.js"></script> 
<script src="<?php echo asset_url(); ?>js/wwb10.min.js"></script>
<script src="<?php echo asset_url(); ?>js/slick.js"></script>
<script src="<?php echo asset_url();?>js/jquery.easing.1.3.js?1.1"></script>
	<script type="text/javascript">
 
    $(document).on('ready', function() {
      $(".center").slick({
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
      });
    });
    
    $(document).ready(function(){
        var boxWidth = $(".open-div1").width();
        $(".menu-arrow").click(function(){
            $(".reminder-div").animate({
                width: boxWidth
            });
            $(".menu-arrow").hide();
            $(".menu-arrow2").show();
            $(".myalert").show();
        });
         $(".menu-arrow2").click(function(){
            $(".reminder-div").animate({
                width:60
            });
            $(".menu-arrow").show();
            $(".menu-arrow2").hide();
            $(".myalert").hide();
        });
    });
    
$(document).ready(function()
{
   $("#SlideShow1").slideshow(
   {
      interval: 3000,
      type: 'sequence',
      effect: 'none',
      direction: '',
      pagination: false,
      effectlength: 1000
   });
   $("#Layer32").stickylayer({orientation: 9, position: [0, 0], delay: 300});
   $("#Layer35").stickylayer({orientation: 9, position: [0, 0], delay: 300});
   $("#Layer145").stickylayer({orientation: 9, position: [0, 0], delay: 300});
   var Carousel3Opts =
   {
      delay: 4000,
      duration: 500,
      easing: 'easeInOutBounce',
      mode: 'fade',
      direction: '',
      pagination: false,
      start: 0
   };
   $("#Carousel3").carouseleffects(Carousel3Opts);
   $("#Carousel3_back a").click(function()
   {
      $('#Carousel3').carouseleffects('prev');
   });
   $("#Carousel3_next a").click(function()
   {
      $('#Carousel3').carouseleffects('next');
   });
   $("#Layer185").stickylayer({orientation: 9, position: [0, 0], delay: 300});
   //searchParseURL();
   var $autocomplete = $('<ul class="autocomplete"></ul>').hide().insertAfter('#SiteSearch4');
   var selectedItem = null;
   var setSelectedItem = function(item)
   {
      selectedItem = item;
      if (selectedItem === null)
      {
         $autocomplete.hide();
         return;
      }
      if (selectedItem < 0)
      {
         selectedItem = 0;
      }
      if (selectedItem >= $autocomplete.find('li').length)
      {
         selectedItem = $autocomplete.find('li').length - 1;
      }
      $autocomplete.find('li').removeClass('selected').eq(selectedItem).addClass('selected');
      $autocomplete.css('left', $('#SiteSearch4').position().left);
      $autocomplete.css('top', $('#SiteSearch4').position().top + $('#SiteSearch4').outerHeight());
      $autocomplete.show();
   };
   var populateSearchField = function()
   {
      $('#SiteSearch4').val($autocomplete.find('li').eq(selectedItem).text());
      setSelectedItem(null);
   };
   $('#SiteSearch4').attr('autocomplete', 'off').keyup(function(event)
   {
      if (event.keyCode > 40 || event.keyCode == 8)
      {
         var data = new Array();
         var keywordVal = $('#SiteSearch4').val();
         keywordVal = keywordVal.toLowerCase();
         for (i=0; i<database_length; i++)
         {
            var words = (searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords).toLowerCase();
            var array = words.split(" ");
            data = $.merge(data, array);
         }

         var unique = new Array();
         o:for(var i = 0; i < data.length; i++)
         {
            for(var j = 0; j < unique.length; j++)
            {
               if(unique[j]==data[i]) continue o;
            }
            unique[unique.length] = data[i];
         }

         unique.sort();
         if (keywordVal.length && unique.length)
         {
            $autocomplete.empty();
            var item = 0;
            $.each(unique, function(index, term)
            {
               term = term.toLowerCase();
               if (term.indexOf(keywordVal) == 0)
               {
                  $('<li></li>').text(term).data('item', item).appendTo($autocomplete).mouseover(function()
                  {
                     var item = $(this).data('item');
                     setSelectedItem(item);
                  }).click(populateSearchField);
                  item++;
               }
            });
            setSelectedItem(0);
         }
         else
         {
            setSelectedItem(null);
         }
      }
      else
      if (event.keyCode == 38 && selectedItem !== null)
      {
         setSelectedItem(selectedItem - 1);
         event.preventDefault();
      }
      else
      if (event.keyCode == 40 && selectedItem !== null)
      {
         setSelectedItem(selectedItem + 1);
         event.preventDefault();
      }
      else
      if (event.keyCode == 27 && selectedItem !== null)
      {
         setSelectedItem(null);
      }
   }).keypress(function(event)
   {
      if (event.keyCode == 13 && selectedItem !== null)
      {
         populateSearchField();
         event.preventDefault();
      }
   }).blur(function(event)
   {
      setTimeout(function()
      {
         setSelectedItem(null);
      }, 250);
   });
   var jQueryToolTip2Opts =
   {
      hide: true,
      show: true,
      content: '<span style="color:#696969;font-family:Arial;font-size:12px;">Buyer has a current request,<br>Visit his Desksite to view and deal.</span>',
      items: '#wb_Image2',
      position: { my: "right bottom", at: "left top", collision: "flipfit" }
   };
   $("#wb_Image2").tooltip(jQueryToolTip2Opts);
   var jQueryToolTip3Opts =
   {
      hide: true,
      show: true,
      content: '<span style="color:#696969;font-family:Arial;font-size:12px;">This buyer is an active..</span>',
      items: '#wb_Image1',
      position: { my: "right bottom", at: "left top", collision: "flipfit" }
   };
   $("#wb_Image1").tooltip(jQueryToolTip3Opts);
   var jQueryToolTip1Opts =
   {
      hide: true,
      show: true,
      content: '<span style="color:#696969;font-family:Arial;font-size:12px;">Buyer is a member <br>in your community</span>',
      items: '#wb_Image10',
      position: { my: "right bottom", at: "left top", collision: "flipfit" }
   };
   $("#wb_Image10").tooltip(jQueryToolTip1Opts);
   $("#Layer_buyer").stickylayer({orientation: 9, position: [0, 0], delay: 0, keepOriginalPos: true});
});

function addToMyFavourite(fav_id,type) {
	$.get(base_url+"addtofavourite/"+fav_id+"/"+type,{},function(data) {
		alert(data.msg);
	},'json');
}
function selectScat(scat_id,name) {
	$("#seller_cat_id").val(scat_id);
	$("#seller_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
}
function selectSellerScat(scat_id,name) {
	$("#seller_cat_id").val(scat_id);
	$("#seller_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.sellerfrm.submit();
}
function selectBuyerScat(scat_id,name) {
	$("#seller_cat_id").val(scat_id);
	$("#seller_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.buyerfrm.submit();
}
function selectProductScat(scat_id,name) {
	$("#seller_cat_id").val(scat_id);
	$("#seller_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.productfrm.submit();
}
function selectServicecat(scat_id,name) {
	$("#service_cat_id").val(scat_id);
	$("#shipper_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.shipperfrm.submit();
}
function selectVideoScat(scat_id,name) {
	$("#seller_cat_id").val(scat_id);
	$("#seller_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.videofrm.submit();
}
function selectCatalogeScat(scat_id,name) {
	$("#catalogue_cat_id").val(scat_id);
	$("#catalogue_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.vcatfrm.submit();
}
function selectDproductScat(scat_id,name) {
	$("#dproduct_cat_id").val(scat_id);
	$("#dproduct_cat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.dprofrm.submit();
}
function selectSellerDScat(scat_id,name) {
	$("#seller_dcat_id").val(scat_id);
	$("#seller_dcat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.sellerdfrm.submit();
}
function selectShipperDScat(scat_id,name) {
	$("#shipper_dcat_id").val(scat_id);
	$("#shipper_dcat_label").html(name+' <span class="caret pull-right caret-vmiddle"></span>');
	document.shipperdfrm.submit();
}
function addToCommunity(id) {
	$.get(base_url+"addtomycommunity/"+id,{},function(data) {
		alert(data.msg);
	},'json');
}
function likeVideo(id) {
	$.get(base_url+"likevideo/"+id,{},function(data) {
		alert(data.msg);
	},'json');
}

function validateForm(myform) {
    var x = document.forms[myform]["keyword"].value;
    var y = document.forms[myform]["country"].value;
    var z = document.forms[myform]["city"].value;
    if (x == "" && y == "" && z == "") {
        alert("Please enter keyword or select country or city to search");
        return false;
    }
}

function validateFormB(myform) {
	var x = document.forms[myform]["keyword"].value;
    var y = document.forms[myform]["country"].value;
    if (x == "" && y == "") {
        alert("Please enter keyword or select country to search");
        return false;
    }
}

</script>
