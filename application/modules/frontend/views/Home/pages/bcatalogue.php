<style>
.b-wrap {
	background:#fff !important;
}
</style>
<!--<div class="book_wrapper">
	<div id="loading" class="loading">Loading pages...</div>
	<a id="next_page_button"></a>
	<a id="prev_page_button"></a>-->
	<div id="flip-book-window" tabindex="-1" aria-labelledby="headerLabel" style="height: 700px !important;width: 750px !important;">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      			<div class="modal-body">
        			<div class="mount-node">
        			</div>
      			</div>
    		</div>
  		</div>
  	</div>
	<!--<div id="mybook" style="display:none;">
		<div class="b-load row">
<?php foreach ($products as $key=>$product) { ?>
	<div>
		<div class="col-sm-12" style="padding:0px;height:438px;">
			<div class="row" style="margin:0px;">
				<div class="col-sm-12 catalogue_page_item_name">
					<strong>
						<a href="<?php echo base_url();?>deskdetails/<?php echo $product['id'];?>" target="_blank"><?php echo $product['name'];?></a>
					</strong>
				</div>
				<div class="col-sm-12 catalogue_page_item_details">
					<?php echo substr($product['description'],0,160);?>
				</div>
				<div class="col-sm-12 catalogue_page_item_quantity">
					Min. Order: <?php echo $product['quantity'];?> <?php echo $product['unit'];?>
				</div>
				<div class="col-sm-12 catalogue_page_item_price_div">
					<span class="catalogue_page_item_price">USD <?php echo $product['unit_price'];?> / Set</span>
				</div>
				<div class="col-sm-12 catalogue_page_item_mimg">
					<a href="<?php echo base_url();?>deskdetails/<?php echo $product['id'];?>" target="_blank">
						<img alt="<?php echo $product['name'];?>" src="<?php echo asset_url();?><?php echo $product['main_image'];?>" class="catalogue_main_img"/>
					</a>
				</div>
				<div style="position:absolute;bottom:0px;background-color: #fff;padding: 0px 10px;right:0px;">
					<div class="pull-right">
						<span class="catalogue_page_no_text">Page</span>
						<span class="catalogue_page_no_num"><?php echo ($key*2+1);?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="col-sm-12" style="height:438px;padding-top:5px;">
			<div class="row" style="margin:0px;width:380px;">
				<div class="col-sm-12" style="padding:2px;width:348px;margin-bottom:5px;">
					<a href="<?php echo base_url();?>deskdetails/<?php echo $product['id'];?>" target="_blank">
						<img alt="<?php echo $product['name'];?>" src="<?php echo asset_url();?><?php echo $product['sub_image1'];?>" style="height:265px;border:1px solid #f1f1f1;">
					</a>
				</div>
				<div class="col-sm-6" style="width:175px;padding:2px;float:left;">
					<a href="<?php echo base_url();?>deskdetails/<?php echo $product['id'];?>" target="_blank">
						<img alt="<?php echo $product['name'];?>" src="<?php echo asset_url();?><?php echo $product['sub_image2'];?>" style="width:168px;border:1px solid #f1f1f1;">
					</a>
				</div>
				<div class="col-sm-6" style="width:175px;padding:2px;float:left;">
					<a href="<?php echo base_url();?>deskdetails/<?php echo $product['id'];?>" target="_blank">
						<img alt="<?php echo $product['name'];?>" src="<?php echo asset_url();?><?php echo $product['sub_image3'];?>" style="width:168px;border:1px solid #f1f1f1;">
					</a>
				</div>
				<div style="position:absolute;bottom:0px;background-color: #fff;padding: 0px 10px;">
					<div class="pull-left">
						<span class="catalogue_page_no_text">Page</span>
						<span class="catalogue_page_no_num"><?php echo ($key*2+2);?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>
</div>
</div>-->

