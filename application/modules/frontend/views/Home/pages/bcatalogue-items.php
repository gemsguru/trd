<html lang="en">
		<head>

			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<link rel="stylesheet" href="<?php echo asset_url();?>css/jq_book_style.css">
			<style type="text/css">
				.catalogue_page_item_name{
					color: #303030;
    				font-family: Georgia;
    				font-size: 15px;
    				padding-bottom: 5px;
    				padding-top: 0px;
				}
				.catalogue_page_item_details{
					color: #787878;
    				font-family: Georgia;
    				font-size: 13px;
    				padding-bottom: 10px;
    				min-height: 55px;
				}
				.catalogue_page_item_quantity{
					color: #1E90FF;
    				font-family: Georgia;
    				font-size: 13px;
    				padding-bottom: 25px;
				}
				.catalogue_page_item_price_div{
					text-align: center;
    				
    				z-index: 1000;
				}
				.catalogue_page_item_price{
					background-color: #FF0000;
    				color: #FFFFFF;
    				font-family: Arial;
    				font-size: 17px;
    				padding: 2px 10px;
				}
			</style>
		</head>
    <!--<title>George Orwell - 1984</title>-->
    <body>
    	<div class="page right">
    		<div class="main">
    			<?php  if($pageno % 2 == 1) { ?>
      			<div class="col-sm-12 catalogue_page_item_name">
					<strong>
						<a href="<?php echo base_url();?>deskdetails/<?php echo $product[0]['id'];?>" target="_blank"><?php echo $product[0]['name'];?></a>
					</strong>
				</div>
				<div class="col-sm-12 catalogue_page_item_details">
					<?php echo substr($product[0]['description'],0,160);?>
				</div>
				<div class="col-sm-12 catalogue_page_item_quantity">
					Min. Order: <?php echo $product[0]['quantity'];?> <?php echo $product[0]['unit'];?>
				</div>
				<div class="col-sm-12 catalogue_page_item_price_div">
					<span class="catalogue_page_item_price">USD <?php echo $product[0]['unit_price'];?> / Set</span>
				</div>
				<div class="col-sm-12 catalogue_page_item_mimg">
					<a href="<?php echo base_url();?>deskdetails/<?php echo $product[0]['id'];?>" target="_blank">
						<img alt="<?php echo $product[0]['name'];?>" src="<?php echo asset_url();?><?php echo $product[0]['main_image'];?>" class="catalogue_main_img" style="width:600px;height:500px;" />
					</a>
				</div>
				<?php }else{ ?>
				<div class="col-sm-12" style="height:500px;padding-top:5px;">
					<div class="row" style="margin:0px;width:500px;">
						<div class="col-sm-12" style="padding:2px;width:500px;margin-bottom:5px;">
							<a href="<?php echo base_url();?>deskdetails/<?php echo $product[0]['id'];?>" target="_blank">
								<img alt="<?php echo $product[0]['name'];?>" src="<?php echo asset_url();?><?php echo $product[0]['sub_image1'];?>" style="height:400;border:1px solid #f1f1f1;">
							</a>
						</div>
						<div class="col-sm-6" style="width:240px;padding:2px;float:left;">
							<a href="<?php echo base_url();?>deskdetails/<?php echo $product[0]['id'];?>" target="_blank">
								<img alt="<?php echo $product[0]['name'];?>" src="<?php echo asset_url();?><?php echo $product[0]['sub_image2'];?>" style="width:240px;border:1px solid #f1f1f1;">
							</a>
						</div>
						<div class="col-sm-6" style="width:240px;padding:2px;float:left;">
							<a href="<?php echo base_url();?>deskdetails/<?php echo $product[0]['id'];?>" target="_blank">
								<img alt="<?php echo $product[0]['name'];?>" src="<?php echo asset_url();?><?php echo $product[0]['sub_image3'];?>" style="width:240px;border:1px solid #f1f1f1;">
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
    		</div>
  		</div>
  	</body>
</html>