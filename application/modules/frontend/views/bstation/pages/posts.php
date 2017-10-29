<?php 
if(count($posts) > 0) {
	foreach ($posts as $key=>$product) {
?>
<div id="Layer281" class="section11 spacier" style="width: 982px;">
	<div class="row" id="Layer4">
		<div class="col-md-2 col-sm-12 grid">
			<?php if($product['is_locked'] && $product['catid'] == $tscategory_id) { ?>
			<img src="<?php echo asset_url(); ?>images/img1699.png" alt="" class="bstation-profile-pic" style="border:0px;"/> 
			<?php } else { ?>
			<img src="<?php echo asset_url(); ?><?php echo $product['profile_image'];?>" alt="" class="bstation-profile-pic" /> 
			<img src="<?php echo asset_url(); ?>images/china0.png" id="Image297" alt="" class="flag"> <br>
			<?php } ?>
			<div>
				<?php if($product['is_locked'] && $product['catid'] == $tscategory_id) { ?>
				<strong class="country"><br> </strong>
				<?php } else { ?>
				<strong class="country"><?php echo $product['country'];?></strong>
				<?php } ?>
			</div>
			<div>
				<?php if($product['is_locked'] && $product['catid'] == $tscategory_id) { ?>
				<span class=""><br></span>
				<?php } else { ?>
				<span class=""><?php echo $product['province'];?></span>
				<?php } ?>
			</div>
			<p class="date"><?php echo date("d M, Y", strtotime($product['create'])); ?></p>
		</div>
		<div class="col-md-10">
			<div class="col-md-8 col-sm-12 space1">
				<div id="wb_Text8" class="section3">
					<span>
						<strong class="font1">
							<span class="style5"><?php echo $product['title'];?></span>
						</strong>
					</span>
					<p class="font5">  <?php echo substr($product['description'],0,200);?> <?php if(strlen($product['description']) > 280) { ?>...<?php } ?></p>
					<div class="inline">
						<span class="usd">&nbsp; USD <?php echo $product['unit_price'];?>&nbsp;&nbsp;&nbsp; </span>
						<span class="minorder">&nbsp; Min. Order: <?php echo $product['stockqty'];?>&nbsp;&nbsp;&nbsp; </span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<br> <span>Boosted By: 
						<?php if($product['is_locked'] && $product['catid'] == $tscategory_id) { ?>
							User Blocked Access
						<?php } else { ?>
							<?php echo $product['contact_prefix'].' '.$product['contact_name'];?>
						<?php } ?>
						</span>
						<p style="color: #303030; font-family: Georgia; font-size: 12px; padding-top: 5px;">
							<?php if($product['is_locked'] && $product['catid'] == $tscategory_id) { ?>
								<span style="color:#1E90FF;font-family:Georgia;font-size:12px;"><strong>Company name is not available for <?php if($tscategory_id == 1) { ?>sellers<?php } elseif($tscategory_id == 2) { ?>shippers<?php } else { ?>buyers<?php } ?></strong></span>
							<?php } else { ?>
							<?php if($tscategory_id == 1) { ?>
							<a href="<?php echo base_url();?>desksite/<?php echo $product['busi_id'];?>" class="style5" target="_blank">
							<?php } else { ?> 
							<a href="<?php echo base_url();?>shipper/profile/<?php echo $product['busi_id'];?>" class="style5" target="_blank">
							<?php } ?>
								<b><?php echo $product['company_name'];?></b>
							</a>
							<?php } ?>
						</p>
					</div>
					<div class="col-sm-4 center">
					<?php if(!empty($product['community_id'])) { ?>
						<img src="<?php echo asset_url(); ?>images/CommMember.png" id="Image49" alt="" class="img25" /> 
					<?php } else { ?>
						<img src="<?php echo asset_url(); ?>images/CommMember.png" id="Image49" alt="" class="img25" style="opacity: 0.15;" /> 
					<?php } ?>
					<?php if($product['is_logo_verified'] > 1) { ?>
						<img src="<?php echo asset_url(); ?>images/trusted.png" id="Image49" alt="" class="img25" />
					<?php } else { ?>
						<img src="<?php echo asset_url(); ?>images/trusted.png" id="Image49" alt="" class="img25" style="opacity: 0.15;" />
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="tumb-slide" style="padding-left:15px;">
					<img src="<?php echo asset_url(); ?><?php echo $product['main_image'];?>" class="imgresponsive img211">
					<div class="hover-thumb text-center">
						<?php if($product['is_locked']) { ?>
						<img src="<?php echo asset_url(); ?>images/img1706.png" id="Shape3" alt="" style="width:92px; height:68px;">
						<?php } else { ?>
						<a href="#" onclick="ShowObjectWithEffect('Layer_sell_post_<?php echo $key;?>', 1, 'slideup', 500, 'swing');return false;">
							<img src="<?php echo asset_url(); ?>images/img0156.png" id="Shape3" alt="" style="width: 48px; height: 48px;">
						</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-2" id="Layer_sell_post_<?php echo $key;?>" style="position: absolute; width: 808px; height: 359px; display: none; top: <?php echo (29+$key*206);?>px; padding: 0px;background-color: #FFFFFF;border: 1px #D3D3D3 solid;z-index:1;">
			<a href="#" onclick="ShowObjectWithEffect('Layer_sell_post_<?php echo $key;?>',0,'slideup',500);return false;" class="pull-right"> 
				<img src="<?php echo asset_url();?>images/close.png" id="Image16" alt="" style="width: 33px; height: 33px; float: right;">
			</a>
			<div class="row" style="margin: 0px; padding: 25px 0px;">
				<div class="col-md-3">
					<div class="row" style="margin: 0px; padding: 6px;">
						<div class="col-md-6 col-xs-6 col-sm-6" style="padding: 3px;">
							<?php if(!empty($product['image1'])) { ?>
							<a href="<?php echo asset_url(); ?><?php echo $product['image1'];?>" data-rel="PhotoGallery1" title="<?php echo $product['name'];?>" rel="PhotoGallery1"> 
								<img alt="<?php echo $product['name'];?>" id="PhotoGallery1_img0" src="<?php echo asset_url(); ?><?php echo $product['image1'];?>" title="<?php echo $product['name'];?>" style="border: 1px solid #ccc; width: 77px; height: 63px;" />
							</a>
							<?php } ?>
						</div>
						<div class="col-md-6 col-xs-6 col-sm-6" style="padding: 3px;">
							<?php if(!empty($product['image2'])) { ?>
							<a href="<?php echo asset_url(); ?><?php echo $product['image2'];?>" data-rel="PhotoGallery1" title="<?php echo $product['name'];?>" rel="PhotoGallery1">
								<img alt="<?php echo $product['name'];?>" id="PhotoGallery1_img0" src="<?php echo asset_url(); ?><?php echo $product['image2'];?>" title="babytoy1" style="border: 1px solid #ccc; width: 77px; height: 63px;" />
							</a>
							<?php } ?>
						</div>
						<div class="col-md-6 col-xs-6 col-sm-6" style="padding: 3px;">
							<?php if(!empty($product['image3'])) { ?>
							<a href="<?php echo asset_url(); ?><?php echo $product['image3'];?>" data-rel="PhotoGallery1" title="<?php echo $product['name'];?>" rel="PhotoGallery1">
								<img alt="<?php echo $product['name'];?>" id="PhotoGallery1_img0" src="<?php echo asset_url(); ?><?php echo $product['image3'];?>" title="babytoy1" style="border: 1px solid #ccc; width: 77px; height: 63px;" />
							</a>
							<?php } ?>
						</div>
						<div class="col-md-6 col-xs-6 col-sm-6" style="padding: 3px;">
							<?php if(!empty($product['image4'])) { ?>
							<a href="<?php echo asset_url(); ?><?php echo $product['image4'];?>" data-rel="PhotoGallery1" title="<?php echo $product['name'];?>" rel="PhotoGallery1">
								<img alt="<?php echo $product['name'];?>" id="PhotoGallery1_img0" src="<?php echo asset_url(); ?><?php echo $product['image4'];?>" title="babytoy1" style="border: 1px solid #ccc; width: 77px; height: 63px;" />
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-md-7" style="padding: 8px 0px;">
					<div id="Layer18" class="inline" style="width: 100%;">
						<div class="col-sm-8" style="padding-top: 7px;">
							<span class="fontstyle1"><strong><?php echo $product['title'];?></strong></span>
						</div>
						<div id="wb_CssMenu2" class="col-sm-4">
							<ul>
								<li class="firstmain">
									<a class="withsubmenu" href="#" target="_self">Translate</a>
									<ul>
										<li class="firstitem">
											<a href="#" target="_self">To&nbsp;my&nbsp;language</a>
										</li>
										<li class="lastitem">
											<a href="#" target="_self">To&nbsp;English</a>
										</li>
									</ul>
								</li>
							</ul>
							<br>
						</div>
					</div>
					<br> <span class="color1"><br><?php echo $product['stockdesc'];?></span>
				</div>
				<div class="col-md-2 p1" style="padding-left: 40px;">
					<div id="RollOver2" class="img45">
						<a href="javascript:popupwnd('<?php echo base_url();?>b-station/buyer_request/<?php echo $product['post_id'];?>','no','no','no','yes','yes','no','600','50','555','750')" target="_self"> 
							<img class="hover" alt="Send Inquiry" src="<?php echo asset_url(); ?>images/inquirytomato.png" /> <span>
							<img alt="Send Inquiry" src="<?php echo asset_url(); ?>images/inquiryblack.png"></span>
						</a>
					</div>
					<div id="RollOver2" class="img45">
						<a href="javascript:popupwnd('./chat_window.php','no','no','no','no','no','no','750','50','430','720')" target="_self"> 
							<img class="hover" alt="Chat" src="<?php echo asset_url(); ?>images/chat_button2.png" /> <span>
							<img alt="Chat" src="<?php echo asset_url(); ?>images/chaTBLACK.png" /></span>
						</a>
					</div>
					<div id="RollOver5" class="img45">
						<?php if($tscategory_id == 1) { ?>
							<a href="<?php echo base_url();?>seller/website/<?php echo $product['busi_id'];?>" target="_blank"> 
						<?php } else if($tscategory_id == 2) { ?>
							<a href="<?php echo base_url();?>shipper/website/<?php echo $busi_id;?>" target="_blank">
						<?php } else { ?>
							<a href="<?php echo base_url();?>buyer/website/<?php echo $busi_id;?>" target="_blank">
						<?php } ?>
							<img class="hover" alt="Add To My Community" src="<?php echo asset_url(); ?>images/addcommunity_button2.png" />
							<span><img alt="Add To My Community" src="<?php echo asset_url(); ?>images/add2comBLACK.png" /></span>
						</a>
					</div>
					<div id="RollOver1" class="img45">
						<?php if($tscategory_id == 1) { ?>
						<a href="<?php echo base_url();?>desksite/<?php echo $product['busi_id'];?>" target="_blank"> 
						<?php } else if($tscategory_id == 2) { ?>
							<a href="<?php echo base_url();?>shipper/profile/<?php echo $busi_id;?>" target="_blank">
						<?php } else { ?>
							<a href="<?php echo base_url();?>buyer/profile/<?php echo $busi_id;?>" target="_blank">
						<?php } ?>
							<img class="hover" alt="Visit Home Page" src="<?php echo asset_url(); ?>images/desksite-dorange.png" /> 
							<span><img alt="Visit Home Page" src="<?php echo asset_url(); ?>images/desktopblack.png" /></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	} 
}  else { 

?>
<div class="row" style="width: 300px; margin: 0px;">
	<h4 class="text-left">No Posts Added!</h4>
</div>
<?php 
}
?>