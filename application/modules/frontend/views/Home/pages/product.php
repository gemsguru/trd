<div id="wb_Image51" style="position:absolute;left:262px;top:8px;width:35px;height:35px;z-index:1297;">
	<a href="#" onclick="ShowObjectWithEffect('Layer_details', 0, 'scale', 500, 'swing');ShowObjectWithEffect('Layer_details2', 0, 'scale', 500, 'swing');return false;">
		<img src="<?php echo asset_url();?>images/close.png" id="Image51" alt="Close">
	</a>
</div>
<?php
foreach($productdetail as $productBox) {?>
<div id="wb_Text161" style="position:absolute;left:27px;top:27px;width:174px;height:16px;z-index:1296;text-align:left;">
	<span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><?php echo $productBox['product_name']; ?><br></strong></span>
</div>
<div id="Layer110" style="position:absolute;text-align:left;left:0px;top:66px;width:308px;height:311px;z-index:1302;">
	<div id="wb_Text159" style="position:absolute;left:101px;top:262px;width:137px;height:16px;text-align:center;z-index:1288;">
		<span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><?php echo $productBox['company_country'];?> | <?php echo $productBox['company_province'];?></strong></span>
	</div>
	<div id="wb_Text160" style="position:absolute;left:72px;top:289px;width:63px;height:16px;z-index:1289;text-align:left;">
		&nbsp;
	</div>
	<div id="wb_Image17" style="position:absolute;left:40px;top:252px;width:50px;height:50px;z-index:1290;">
		<img src="<?php echo asset_url();?>images/flags/<?php echo $productBox['flag'];?>" id="Image17" alt="">
	</div>
	<div id="wb_Image18" style="position:absolute;left:2px;top:0px;width:297px;height:242px;z-index:1291;">
		<img src="<?php echo asset_url().''.$productBox['main_image']; ?>" id="Image18" alt="">
	</div>
	<div id="wb_Text167" style="position:absolute;left:131px;top:281px;width:29px;height:16px;z-index:1292;text-align:left;">
		<span style="color:#3C3C3C;font-family:Arial;font-size:11px;">Likes</span>
	</div>
	<div id="wb_Image59" style="position:absolute;left:155px;top:275px;width:25px;height:25px;z-index:1293;">
		<img src="<?php echo asset_url();?>images/items_like0.png" id="Image59" alt="">
	</div>
	<div id="wb_Text168" style="position:absolute;left:179px;top:281px;width:63px;height:16px;z-index:1294;text-align:left;">
		<span style="color:#3C3C3C;font-family:Arial;font-size:11px;"><?php echo $productBox['likes']; ?></span>
	</div>
</div>
<div id="Layer111" style="position:absolute;text-align:left;left:0px;top:372px;width:308px;height:141px;z-index:1295;">
	<div id="wb_Text162" style="position:absolute;left:27px;top:63px;width:38px;height:16px;z-index:1281;text-align:left;">
		<span style="color:#303030;font-family:Georgia;font-size:13px;"><strong>By</strong></span>
	</div>
	<div id="wb_Text163" style="position:absolute;left:122px;top:83px;width:63px;height:16px;z-index:1282;text-align:left;">
		<span style="color:#3C3C3C;font-family:Georgia;font-size:12px;">Supplier&nbsp;&nbsp; </span>
	</div>
	<div id="wb_Text165" style="position:absolute;left:70px;top:64px;width:187px;height:16px;z-index:1283;text-align:left;">
		<span style="color:#4169E1;font-family:Arial;font-size:12px;"><?php echo $productBox['company_name']; ?> </span>
	</div>
	<div id="wb_Text166" style="position:absolute;left:27px;top:11px;width:271px;height:16px;z-index:1284;text-align:left;">
		<span style="color:#303030;font-family:Arial;font-size:12px;"><?php echo substr($productBox['description'], '0', '125');?> <?php if(strlen($productBox['description']) > 125) { ?>....<?php }?><br></span>
	</div>
	<?php if(!empty($productBox['community_id'])) { ?>
	<div id="wb_Image145" style="position:absolute;left:80px;top:106px;width:25px;height:25px;z-index:1285;">
		<img src="<?php echo asset_url(); ?>images/CommMember.png" id="Image147" alt="" class="img25" /> 
	</div>
	<?php } ?>
	<?php if($productBox['is_logo_verified'] > 1) { ?>
	<div id="wb_Image146" style="position:absolute;left:146px;top:106px;width:25px;height:25px;z-index:1285;">
		<img src="<?php echo asset_url();?>images/trusted.png" id="Image146" alt="">
	</div>
	<?php } ?>
	<?php if($productBox['plan_id'] > 1) { ?>
	<div id="wb_Image35" style="position:absolute;left:180px;top:106px;width:25px;height:25px;z-index:1286;">
		<img src="<?php echo asset_url();?>images/member-logo.png" id="Image35" alt="">
	</div>
	<?php } ?>
	<?php if($productBox['plan_id'] > 1 && !empty($product['gaurantee_period'])) { ?>
	<div id="wb_Image147" style="position:absolute;left:110px;top:105px;width:34px;height:26px;z-index:1287;">
		<img src="<?php echo asset_url();?>images/guarantee.png" id="Image147" alt="">
	</div>
	<?php } ?>
</div>
<div id="RollOver68" style="position:absolute;left:53px;top:521px;overflow:hidden;width:35px;height:35px;z-index:1298">
	<a href="<?php echo base_url();?>products/details/<?php echo $productBox['product_id'];?>" target="_blank">
		<img class="hover" alt="" title="View details" src="<?php echo asset_url(); ?>images/viewroll.png">
		<span><img alt="" title="View details" src="<?php echo asset_url(); ?>images/view2.png"></span>
	</a>
</div>
<div id="RollOver69" style="position:absolute;left:111px;top:521px;overflow:hidden;width:35px;height:35px;z-index:1299">
	<a href="<?php echo base_url();?>products" target="_blank">
		<img class="hover" alt="" title="Find the same product" src="<?php echo asset_url(); ?>images/from-same-userroll.png">
		<span><img alt="" title="Find the same product" src="<?php echo asset_url(); ?>images/from-same-user.png"></span>
	</a>
</div>
<div id="RollOver70" style="position:absolute;left:169px;top:521px;overflow:hidden;width:35px;height:35px;z-index:1300">
	<a href="javascript:addToMyFavourite(<?php echo $productBox['product_id'];?>,4);">
		<img class="hover" alt="" title="Add to watch later" src="<?php echo asset_url(); ?>images/addtofavroll.png">
		<span><img alt="" title="Add to watch later" src="<?php echo asset_url(); ?>images/addtofav.png"></span>
	</a>
</div>
<div id="RollOver71" style="position:absolute;left:227px;top:521px;overflow:hidden;width:35px;height:35px;z-index:1301">
	<a href="javascript:addToItemToCart(<?php echo $productBox['product_id'];?>)">
		<img class="hover" alt="" title="Add to my cart" src="<?php echo asset_url(); ?>images/addtocartroll.png">
		<span><img alt="" title="Add to my cart" src="<?php echo asset_url(); ?>images/addtocart.png"></span>
	</a>
</div>
<?php }?>



