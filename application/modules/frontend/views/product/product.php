<style>
#RollOver26 a
{
   display: block;
   position: relative;
   height: 100%;
   width: 100%;
}
#RollOver26 a img
{
   position: absolute;
   /* z-index: 1; */
   border-width: 0;
}
#RollOver26 span
{
   display: block;
   height: 100%;
   width: 100%;
   position: absolute;
   z-index: 2;
}
#RollOver26 a .hover
{
   visibility: hidden;
}
#RollOver26 a:hover .hover
{
   visibility: visible;
}
#RollOver26 a:hover span
{
   visibility: hidden;
}
#RollOver26 img
{
   border-width: 0;
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}


#RollOver25 a
{
   display: block;
   position: relative;
   height: 100%;
   width: 100%;
}
#RollOver25 a img
{
   position: absolute;
   /* z-index: 1; */
   border-width: 0;
}
#RollOver25 span
{
   display: block;
   height: 100%;
   width: 100%;
   position: absolute;
   z-index: 2;
}
#RollOver25 a .hover
{
   visibility: hidden;
}
#RollOver25 a:hover .hover
{
   visibility: visible;
}
#RollOver25 a:hover span
{
   visibility: hidden;
}
#RollOver25 img
{
   border-width: 0;
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}


#RollOver24 a
{
   display: block;
   position: relative;
   height: 100%;
   width: 100%;
}
#RollOver24 a img
{
   position: absolute;
   /* z-index: 1; */
   border-width: 0;
}
#RollOver24 span
{
   display: block;
   height: 100%;
   width: 100%;
   position: absolute;
   z-index: 2;
}
#RollOver24 a .hover
{
   visibility: hidden;
}
#RollOver24 a:hover .hover
{
   visibility: visible;
}
#RollOver24 a:hover span
{
   visibility: hidden;
}
#RollOver24 img
{
   border-width: 0;
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}

#RollOver27 a
{
   display: block;
   position: relative;
   height: 100%;
   width: 100%;
}
#RollOver27 a img
{
   position: absolute;
   /* z-index: 1; */
   border-width: 0;
}
#RollOver27 span
{
   display: block;
   height: 100%;
   width: 100%;
   position: absolute;
   z-index: 2;
}
#RollOver27 a .hover
{
   visibility: hidden;
}
#RollOver27 a:hover .hover
{
   visibility: visible;
}
#RollOver27 a:hover span
{
   visibility: hidden;
}
#RollOver27 img
{
   border-width: 0;
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}

.frame1 {
	z-index: 0;
    position: absolute;
    top: 275px;
    left: 0px;
}
.sfont1 {
	margin-top:0px;
}
#Button15 {
    border: 0px #A9A9A9 solid;
    background-color: #FF8C00;
    color: #FFFFFF;
    font-family: Arial;
    font-weight: normal;
    font-size: 13px;
}
</style>
<div>
    <div class="col-sm-12" style="padding:0px;padding-top:40px;">
   		 <h1 class="sfont1">Products</h1>
   		 <p class="sfont2">Sourcing with more details is available by selecting additional options from the More Options Menu on the right side..</p>
   		 <br>
    </div>
    <div class="row" style="margin:0px;">
	    <div class="col-lg-10 section11 products-list"  id="Layer6"  >
		<?php  if(count($products) > 0 && $products[0]['id'] !='') { 
    	      foreach ($products as $key=>$product) { ?>
			<div class="row" id="Layer4" style="margin:0px;margin-bottom:15px;" onmouseenter="ShowObjectWithEffect('Layer8_<?php echo $key;?>', 1, 'slideright', 300, 'swing');return false;" onmouseleave="ShowObject('Layer5_<?php echo $key;?>', 0);ShowObject('Layer8_<?php echo $key;?>', 0);return false;">
				<div class="col-md-3 col-sm-12 displaydesktop" style="width:210px;">
					<div id="SlideShow1" class="img22 SlideShow1" >
					    <img class="image" src="<?php echo asset_url().$product['main_image'];?>" alt="" title="">
					    <img class="image" src="<?php echo asset_url().$product['sub_image2'];?>" style="display:none;" alt="" title="">
					</div>
				</div>
				<div class="col-md-6 col-sm-12 space1" style="padding-left: 20px;width:518px;">
					 <div id="wb_Text8" class="section3">
						 <div class="inline padtop">
						    <span class="spanname"><strong><a href="<?php echo base_url()?>products/details/<?php echo $product['id']; ?>" target="_blank" class="style5"><?php echo $product['name']; ?></a></strong></span>
				   		 </div>
			   		  </div>
			   		  <div class="padtop">
						<span class="spandesc"><?php  echo substr($product['description'], '0', '240'); ?><?php if(strlen($product['description']) > 240) { ?> ...<?php } ?></span>
					  </div>
			   		  <div class="padtop">
                        <span class="spanprice">USD :<?php echo $product['unit_price']; ?></span>
                      </div>
                      <div class="padtop">
                        <span class="spanunit">Min. Order : <?php echo $product['quantity'].' '. $product['unit']; ?> </span>
                      </div>
                   		<div id="Layer5_<?php echo $key;?>" class="section10 row seller_Layer5">
							<div class="col-md-2" style="width:20%;padding: 5px;">
							 	<div id="RollOver5" class="box1">
							        <a href="<?php echo base_url();?>products/details/<?php echo $product['id']; ?>" target="_blank">
							            <img class="hover" alt="" src="<?php echo asset_url() ?>images/viewroll.png">
							            <span><img alt="" src="<?php echo asset_url() ?>images/view.png"></span>
							        </a>
							        <div id="wb_Text13"class="beauty1">
							        <p class="textfont1">VIEW DETAILS</p>
							        <p class="textfont2">To View More Details About This<br> Product, Such Aa Size, Material and much more..</p>
							        </div>
							    </div>
							</div>
							<div class="col-md-2" style="width:20%;padding: 5px;">
							 	<div id="RollOver21"  class="box2" >
							        <a href="javascript:showRelatedImages(<?php echo $product['id']; ?>,'<?php echo $key;?>');">
							            <img alt="" src="<?php echo asset_url() ?>images/galleryblack.png">
							        </a>
							      	<div id="wb_Text13"class="beauty1">
								        <p class="textfont1">GALLERY</p>
								        <p class="textfont2">To View The Product Gallery<br> From The Same Seller.. </p>
							        </div>
							   	</div>
							</div>
							<div class="col-md-2" style="width:20%;padding: 5px;">
							 	<div id="RollOver22" class="box3">
							        <a href="javascript:addToMyFavourite(<?php echo $product['id'];?>,4);" target="_self">
							            <img class="hover" alt="" src="<?php echo asset_url() ?>images/faforiteroll.png">
							            <span><img alt="" src="<?php echo asset_url() ?>images/addtofavblack.png"></span>
							        </a>
							        <div id="wb_Text13"class="beauty1">
								        <p class="textfont1">ADD TO FAVORITE</p>
								        <p class="textfont2">To Save Product in Your <br>Favorite Box,To Find It Later<br> On..</p>
							        </div>
							    </div>
							</div>
							<div class="col-md-2" style="width:20%;padding: 5px;">
							 	<div id="RollOver22" class="box3">
							        <a href="javascript:addToItemToCart(<?php echo $product['id'];?>);" target="_self">
							            <img class="hover" alt="" src="<?php echo asset_url() ?>images/addtocartroll.png">
							            <span><img alt="" src="<?php echo asset_url() ?>images/aert.png"></span>
							        </a>
							        <div id="wb_Text13"class="beauty1">
								        <p class="textfont1">ADD CART</p>
								        <p class="textfont2">To Add This Product To Your<br> Cart, And Arrange Your<br> Orders ..</p>
							        </div>
							    </div>
							</div>
							<div class="col-md-2" style="width:20%;padding: 5px;">
							  	<div id="RollOver6" class="box4" onclick="chat_with(<?php echo $product['user_id'];?>,<?php echo $product['accept_chat']; ?>);">
							        <a>
							            <img class="hover" alt="" src="<?php echo asset_url() ?>images/chatorange.png">
							            <span><img alt="" src="<?php echo asset_url() ?>images/chaTBLACK.png"></span>
							        </a>
							        <div id="wb_Text13"class="beauty1">
							        <p class="textfont1">CHAT </p>
							        <p class="textfont2">To Chat With Seller, <br>About This Products .. </p>
							        </div>
							    </div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12" style="width:311px;">
						<div id="Layer8_<?php echo $key;?>" class="section9 seller_Layer8" onclick="ShowObjectWithEffect('Layer5_<?php echo $key;?>', 1, 'slideright', 500, 'swing');return false;">
						    <div id="wb_Shape1" class="stylebox">
						        <a href="#" onclick="ShowObjectWithEffect('Layer5_<?php echo $key;?>', 1, 'slideright', 500, 'swing');$('.carousel').carousel();return false;"><img src="<?php echo asset_url() ?>images/img0013.png" id="Shape1" alt="" style="width:11px;height:48px;"></a>
						    </div>
						</div>
						<div id="Layer7" class="section8" style="width:300px;">
							<div id="wb_Text8" class="margintop" style="padding-left: 15px;">
							     <div style="float:left;width:55px;">
									<img src="<?php echo asset_url();?><?php echo $product['profile_image'];?>" class="img1" alt="" style="width:45px;height:45px;">
								</div>
								<div class="float:left;padding-top: 5px;">
									<span style="color:#303030;font-family:Georgia;font-size:12px;"><strong><a href="<?php echo base_url();?>desksite/<?php echo $product['busi_id'];?>" target="_blank" class="style5"><?php echo $product['company_name']; ?></a></strong></span><br>
									<span class="">Presented By : </span> <span><?php if(!empty($product['contact_name'])){ echo $product['contact_prefix'].' '.$product['contact_name']; } else { echo $product['name_prefix'].' '.$product['user_name'];} ?></span>
								</div>
								<div style="clear:both;"></div>
							</div>
                            <div class="text-center">
								<strong class="font-style-1">Seller | </strong><span class="font-style-2"> <?php echo $product['sub_category'];?></span>
							</div>
							<div>
								<div class="text-center">
									<strong class="font-style-1"> <?php echo $product['company_country'];?> | </strong><span class="font-style-2"><?php echo $product['company_city'];?></span>
								</div>
							</div>
						     <div id="wb_Text7" class="style-2" style="padding-top:10px;">
							     <div id="wb_Image10" class="img-style">
							        <?php if(!empty($tsuserid) && $product['community_id'] !='' && $product['plan_id'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" > 
							        <?php }else {?>
							        <img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" style="opacity :0.15">
							        <?php } ?>
						        </div>
							    <div id="wb_Image2" class="img-style">
							    	<?php if($product['plan_id'] > 1 && $product['gaurantee_period'] !=''){?><img src="<?php echo asset_url(); ?>images/ts/guarantee.png" id="Image1" style="width:34px;height:26px;"> <?php } else {?>
							    	<img src="<?php echo asset_url(); ?>images/ts/guarantee.png" id="Image1" style="opacity :0.15;width:34px;height:26px;" >
							    	<?php }?>
						        </div>
							    <div id="wb_Image1" class="img-style">
							        <?php if($product['plan_id'] > 1 && $product['is_logo_verified'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" > <?php } else { ?>
							        <img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" style="opacity :0.15" >
							        <?php }?>
						        </div>
						        <div id="wb_Image1" class="img-style">
									<?php if($product['plan_id'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/member-logo.png" id="Image1"><?php } else {?>
									<img src="<?php echo asset_url(); ?>images/ts/member-logo.png" id="Image1" style="opacity :0.15">
									<?php }?>
						        </div>
							</div>
							<div class="text-center" style="padding-top:10px;">								
								<div class="left style-font-1" style="float:left;width:20%;">Rank</div>
								<div class="progress" style="float:left;margin:0px;margin-top: 5px;width:60%;">
								    <div class="progress-bar orange1" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $product['rank']?>%">
								    </div>
								</div>
								<div class="font121" style="float:left;width:15%;"><strong>%<?php echo $product['rank']?></strong></div>
							</div>
						</div>
						
				</div>
				<div id="Layer19_<?php echo $key;?>" style="position: absolute; text-align: left; visibility: hidden; width:1039px; height: 176px; z-index:200;background-color: #EBECEE;border: 1px #D3D3D3 solid;">
					<div id="similar-images-<?php echo $key;?>">
					</div>
					<div id="wb_Image25" style="position:absolute;left:997px;top:0px;width:40px;height:40px;z-index:113;">
						<a href="#" onclick="ShowObjectWithEffect('Layer19_<?php echo $key;?>', 0, 'slideright', 500);return false;"><img src="<?php echo asset_url(); ?>images/closeround.png" id="Image25" alt=""></a>
					</div>
				</div>	
			</div>
	<?php }}  else {?>
	      <div class="col-lg-10 section11"  id="Layer6" onmouseenter="ShowObjectWithEffect('Layer8', 1, 'slideright', 300, 'swing');return false;" onmouseleave="ShowObject('Layer5', 0);ShowObject('Layer8', 0);return false;" >
	     	<h4 class="center"> No Product Found!</h4>
	     </div>
     <?php }  ?>
     <?php if($total_pages > 1) { ?>
	     	<div class="row" style="margin:0px;">
				<div id="wb_Text396" style="text-align:center;height:31px;padding:7px;padding-right:0px;background-color:#FF8C00;" class="col-sm-1">
					<span style="color:#FFFFFF;font-family:Georgia;font-size:12px;">Page&nbsp;&nbsp; </span>
				</div>
				<div id="wb_Text393" style="height:31px;background-color: #FFFFFF;padding:0px" class="col-sm-11">
					<div style="text-align:left;padding-top:7px;" class="col-sm-2">
						<span style="color:#3C3C3C;font-family:Arial;font-size:12px;"><?php echo $params['page'];?> of <?php echo $total_pages;?>&nbsp;&nbsp; </span>
					</div>
					<div style="text-align:center;padding-top:7px;" class="col-sm-8">
						<span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><a href="<?php if($total_pages >= ($params['page']+1)){ echo $wpsellerurl."page=".($params['page']+1);}?>" class="style5">VIEW MORE</a></strong></span>
					</div>
					<div class="col-sm-2" style="padding:0px;padding-top:7px;">
						<span style="color:#3C3C3C;font-family:Arial;font-size:12px;"> Page No</span>&nbsp;
						<form name="searchPageForm" id="searchPageForm" method="GET" action="<?php echo $wpproducturl;?>" style="display:inline-block;">
							<select type="text" id="pageinputselect" style="border-radius:0px;width:40px;height:17px;line-height:17px;border: 1px #A9A9A9 solid;background-color:#FAEBD7;padding-left:10px;" name="page">
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
	<div class="col-lg-2" style="padding:0px;">
				<div class="panel">
					<div class="panel-heading" class="panelstyle">
						<b class="panelstyle1">More Options Menu</b>
					</div>
					<div class="list-group categary">
						<!--  <a href="#" class="list-group-item" onclick="showBlackHorseMember();">Show Black Horse Memeber First </a> 
				   		<a href="#" class="list-group-item" onclick="showCommunityMember(1)">Show My Community Members Only </a> 
				   		<a href="#" class="list-group-item" onclick="hideCommunityMember(1)">Hide My Community Members</a> -->
				   		<a href="<?php echo $producturl;?>&plan_id=2" class="list-group-item" >Show Black Horse Memeber First </a> 
				   		<?php if(!empty($tsuserid)){?>
				   		<a href="<?php echo $producturl;?>&community_only=1" class="list-group-item">Show My Community Members Only </a> 
				   		<a href="<?php echo $producturl;?>community_hide=1" class="list-group-item">Hide My Community Members </a>
				   		<?php }?>
				   	</div>
				</div>
				
				<div id="Layer3" class="box8">
					<div id="wb_Text328" class="innersection">
						<span class="text2" style="padding: 10px 0px 0px 2px;"><strong><a href="<?php echo base_url();?>vcatalogues" target="_blank" class="style5">V-CATALOGUES</a></strong></span>
						<p class="text3" style="padding: 0px 2px;">Follow the latest collection of world sellers brands..</p>
						<span class="text2" style="padding: 10px 0px 0px 2px;"><strong><a href="<?php echo base_url();?>seller/desksites" target="_blank" class="style5">DESKSITES </a></strong></span>
						<p class="text3" style="padding: 0px 2px;">Experience a new vision of websites techniques with quick access, rich information and much more..</p>
						<span class="text2" style="padding: 10px 0px 0px 2px;"><strong><a href="<?php echo base_url();?>3dproducts" target="_blank" class="style5">PRODUCTS IN 3D </a></strong></span>
						<p class="text3" style="padding: 0px 2px;">Step into a new dimension of E-commerce, search products with rich information, live details and much more..</p>
				    </div>
			   </div>
			   <div class="sp">
		            <div class="maxheight1 bg3" style="margin-top:20px;">
		                <div class="row" style="margin: 0px">
		                    <h3 style="color: #fff; text-align: center;">
								<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">FEATURED</span><br> 
								<span style="color:#FFFFFF;font-family:Impact;font-size:20px;letter-spacing:0.07px;">PRODUCTS</span>
							</h3>
		                    <div class="text-center displaydesktop">
		                        <img src="<?php echo asset_url(); ?>images/dice0.png" class="img-responsive">
		                    </div>
		                </div>
		            </div>
		            <div id="Layer24">
		                <div id="wb_Carousel1" class="style4" style="height:600px;">
		                    <div id="Carousel1" style="position:absolute">
		                    <?php $i =0;
		                    foreach ( $featuredProducts as $key=>$featuredProduct) {
		                    	if($i%2 == 0) {
		                    		$frame = $i;
			                    	?>
		                        <div class="frame">
		                        	<?php } $i++; ?>
		                            <div id="Layer134" style="border: 1px #D3D3D3 solid; position: relative;" class="product111" onmouseenter="ShowObjectWithEffect('holder7-<?php echo $key;?>', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('holder7-<?php echo $key;?>', 0, 'fade', 500, 'swing');return false;">
		                                <div id="wb_Text417" class="product212">
		                                    <span class="product313"><strong><?php echo $featuredProduct['name'];?></strong></span></div>
		                                <div id="wb_Text418" class="product414">
		                                    <span class="product5"><?php echo substr($featuredProduct['description'], '0', '35');?>...</span></div>
		                                <div id="wb_Image128" class="product6">
		                                    <img src="<?php echo asset_url().''.$featuredProduct['main_image']; ?>" id="Image128" alt="" style="width:190px;height:155px;"></div>
		                                <div id="wb_Text419" class="product7">
		                                    <span class="product8"><strong><?php echo $featuredProduct['unit_price'];?> / Pc</strong></span></div>
		                                <div id="wb_Text420" class="product9">
		                                    <span class="product10"><strong>Min. Qty. <?php echo $featuredProduct['quantity'].' '.$featuredProduct['unit'];?> </strong></span></div>
		                                <div id="holder7-<?php echo $key;?>" class="product25" style="display:none;">
		                                    <div id="wb_Image138" class="product24">
		                                        <a href="javascript:openProduct(<?php echo $featuredProduct['id'];?>)" ><img src="<?php echo asset_url(); ?>images/view.png" id="Image138" alt=""></a>
		                                    </div>
		                                    <div id="wb_Image139" class="product26">
		                                        <a href="<?php echo base_url();?>desksite/<?php echo $featuredProduct['busi_id'];?>" target="_blank"><img src="<?php echo asset_url(); ?>images/window.png" id="Image139" alt=""></a>
		                                    </div>
		                                </div>
		                            </div>
		                        <?php if(count($featuredProducts) == 1 || $frame+2 == $i){ ?>
                            	</div>
		                        <?php } } ?>
		                    </div>
		                    
		                <div id="Carousel1_back" class="fs18">
	                        <a style="cursor:pointer"><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previoustxt0blk.png"></a>
	                    </div>
	                    <div id="Carousel1_next" class="fs17">
	                        <a style="cursor:pointer"><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nexttxt0blk.png"></a>
	                    </div>
		            </div>
		       </div>
		   </div>
    			<div class="maxheight1 bg2" style="margin-top:20px;">
                	<div class="row" style="margin: 0px">
	                    <h3 style="color: #fff; text-align: center;">
							<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">FEATURED</span><br> 
							<span style="color:#FFFFFF;font-family:Impact;font-size:20px;letter-spacing:0.07px;">PRODUCTS VIDEOS</span>
						</h3>
	                    <div class="text-center displaydesktop">
	                        <img src="<?php echo asset_url(); ?>images/porcube.png" class="img-responsive">
	                    </div>
	                </div>
	            </div>
	            <div id="Layer24">
	                <div id="wb_Carousel2" class="style4">
	                    <div id="Carousel2" style="position:absolute">
	                    <?php $i =0;
	                    foreach ($featuredProductVideo as $featuredVideo) {
	                    if($i%2 == 0){
									$frame = $i; 
										?>
	                        <div class="frame" class="style5">
	                        <?php } $i++; ?>
	                            <div id="Layer39" class="fs11" onmouseenter="ShowObjectWithEffect('holder<?php echo $i;?>', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('holder<?php echo $i;?>', 0, 'fade', 500, 'swing');return false;" style="position: relative;">
	                                <div id="wb_Text78" class="fs1">
	                                    <span><strong><?php echo $featuredVideo['name'];?></strong></span></div>
	                                <div id="wb_Text77" class="fs2">
	                                    <span class="fs3"><?php echo substr($featuredVideo['description'], '0', '30');?> ...</span></div>
	                                <div id="wb_Text79" class="fs6">
	                                    <span class="fs4"><strong><?php echo $featuredVideo['unit_price'];?> / Set</strong></span></div>
	                                <div id="wb_Text80" class="fs7">
	                                    <span class="fs5"><strong>Min. Qty. <?php echo $featuredVideo['quantity'].' '.$featuredVideo['unit'];?></strong></span></div>
	                                <div id="wb_MediaPlayer1" class="fs9">
	                                    <video src="<?php echo asset_url().''.$featuredVideo['vedio_file']; ?>" controls="controls">
	                                    </video>
	                                </div>
	                                <div id="Layer29" class="fs13">
	                                </div>
	                                <div id="holder<?php echo $i;?>" class="fs14">
	                                    <div id="wb_Image33" class="fs15">
	                                        <a href="javascript:openVideo(<?php echo $featuredVideo['id'];?>)"><img src="<?php echo asset_url(); ?>images/play.png" id="Image33" alt="" width="35px" height="35px"></a>
	                                    </div>
	                                    <div id="wb_Image34" class="fs16">
	                                        <a href="./video_details.php" target="_blank"><img src="<?php echo asset_url(); ?>images/view2.png" id="Image34" alt="" width="35px" height="35px"></a>
	                                    </div>
	                                </div>
	                            </div>
	                        <?php if(count($featuredVideo) == 1 || $frame+2 == $i){ ?>
                            </div>
                            <?php } } ?>
	                    </div>
	                    <div id="Carousel2_back" class="fs18">
	                        <a style="cursor:pointer"><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previoustxt0.png"></a>
	                    </div>
	                    <div id="Carousel2_next" class="fs17">
	                        <a style="cursor:pointer"><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nexttxt0.png"></a>
	                    </div>
	                </div>
	            </div>
			    <div class="maxheight1 bg1">
					<div class="row" style="margin: 0px">
						<h3 style="color: #fff; text-align: center;">
							<span style="color:#4B4B4B;font-family:Arial;font-size:13px;">WORLD</span><br> 
							<span style="color:#4B4B4B;font-family:Impact;font-size:20px;letter-spacing:0.07px;">SELLERS</span>
						</h3>
						<div class="text-center displaydesktop">
							<img src="<?php echo asset_url(); ?>images/ts/Fsellersok.png" class="img-responsive">
						</div>
					</div>
		    	</div>
		    	<div id="Layer2" class="style2">
			        <div id="Layer2_Container" class="style3">
			            <div id="Layer138">
			                <div id="wb_Carousel4" class="style4">
			                    <div id="Carousel4" style="position:absolute">
			                      <?php 
			                      $i= 0;
			                        foreach($featuredSellers as $featuredSeller){
			                        if($i%2 == 0){
									$frame = $i; 
										?>
                        			<div class="frame">
                        			<?php } $i++; ?>
			                            <div id="Layer147" onmouseenter="ShowObjectWithEffect('Buyer_Holder1', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('Buyer_Holder1', 0, 'fade', 500, 'swing');return false;" style="position: relative;">
			                                <div id="wb_Image226" style="position: relative;" >
			                                	<?php if ($featuredSeller['picture'] != "" && file_exists("assets/".$featuredSeller['picture'])){ ?>
			                                    	<img src="<?php echo asset_url().''.$featuredSeller['picture']; ?>" id="Image226" alt=""  class="style86" style="width:210px;height:246px;">
			                                    <?php } else{ ?>
			                            			<img src="<?php echo asset_url().'images/img1004.png'?>" id="Shape24" alt="" style="width:210px !important;height:246px !important;">
			                        			<?php } ?>
			                                </div>
			                              
			                                <div id="Layer144" class="style15">
			                                    <div id="wb_Text434" class="style16">
			                                        <span class="fontstyle-4"><strong><?php echo $featuredSeller['contact_person_name'];?></strong></span>
			                                    </div>
			                                    <div id="wb_Text435" class="style17">
			                                        <span class="fontstyle-5"><?php echo $featuredSeller['position'];?></span></div>
			                                    <div id="Layer148" class="style18">
			                                        <div id="wb_Image48" class="style19">
			                                            <img src="<?php echo asset_url().''.$featuredSeller['contact_person_flag']; ?>" id="Image48" alt="">
			                                        </div>
			                                    </div>
			                                    <div id="Layer150" class="style20">
			                                        <div id="wb_Text440" class="style21">
			                                            <span class="fontstyle-6"><strong><?php echo $featuredSeller['product_name'];?></strong></span></div>
			                                    </div>
			                                </div>
			                                
			                                <div id="Buyer_holder2" class="style22">
			                                    <div id="wb_Image521" class="style23">
			                                        <a href="#" onclick="ShowObjectWithEffect('Layer_buyer', 1, 'scale', 500, 'swing');return false;"><img src="<?php echo asset_url(); ?>images/window.png" id="Image5" alt=""></a>
			                                    </div>
			                                    <div id="RollOver12" class="style24">
			                                        <a href="./buyer_profile.php" target="_blank">
			                                            <img class="hover" alt="" src="<?php echo asset_url(); ?>images/desktoporange.gif">
			                                            <span><img alt="" src="<?php echo asset_url(); ?>images/desktopblack.png"></span>
			                                        </a>
			                                    </div>
			                                </div>
			                            </div>
			                        <?php if(count($featuredSeller) == 1 || $frame+2 == $i){ ?>
                            		</div>
                            		<?php } } ?>
			                    </div>
			                    <div id="Carousel4_back" class="style51">
			                        <a href=""><img alt="Back" src="<?php echo asset_url(); ?>images/previoustxt0blk.png"></a>
			                    </div>
			                    <div id="Carousel4_next" class="style53">
			                        <a style="cursor:pointer"><img alt="Next" src="<?php echo asset_url(); ?>images/nexttxt0blk.png"></a>
			                    </div>
			                </div>
			            </div>
			        </div>        
    			</div>
		</div>
	</div>
	<div id="Layer_details" class="class1">
        <div id="Layer_details_Container" class="class2">
        </div>
    </div>
    <div id="Layer_details2" class="class1">
        <div id="Layer_details_Container2" class="class2">
        </div>
    </div>
<script>
$(document).ready(function() {
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
    $("#Carousel4_back a").click(function(){
       $('#Carousel4').carouseleffects('prev');
    });
    $("#Carousel4_next a").click(function(){
       $('#Carousel4').carouseleffects('next');
    });
    
});
$(document).ready(function() {
    $(".SlideShow1").slideshow({
        interval: 3000,
        type: 'sequence',
        effect: 'none',
        direction: '',
        pagination: false,
        effectlength: 1000
    });
    $("#Layer32").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
    });
    $("#Layer35").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
    });
    $("#Layer145").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
    });
    $("#Layer185").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 300
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
    var jQueryToolTip2Opts = {
        hide: true,
        show: true,
        content: '<span style="color:#696969;font-family:Arial;font-size:12px;">Buyer has a current request,<br>Visit his Desksite to view and deal.</span>',
        items: '#wb_Image2',
        position: {
            my: "right bottom",
            at: "left top",
            collision: "flipfit"
        }
    };
    $("#wb_Image2").tooltip(jQueryToolTip2Opts);
    var jQueryToolTip3Opts = {
        hide: true,
        show: true,
        content: '<span style="color:#696969;font-family:Arial;font-size:12px;">This buyer is an active..</span>',
        items: '#wb_Image1',
        position: {
            my: "right bottom",
            at: "left top",
            collision: "flipfit"
        }
    };
    $("#wb_Image1").tooltip(jQueryToolTip3Opts);
    var jQueryToolTip1Opts = {
        hide: true,
        show: true,
        content: '<span style="color:#696969;font-family:Arial;font-size:12px;">Buyer is a member <br>in your community</span>',
        items: '#wb_Image10',
        position: {
            my: "right bottom",
            at: "left top",
            collision: "flipfit"
        }
    };
    $("#wb_Image10").tooltip(jQueryToolTip1Opts);
    $("#Layer_buyer").stickylayer({
        orientation: 9,
        position: [0, 0],
        delay: 0,
        keepOriginalPos: true
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
function showVerifiedFirst() {
	$.get(base_url+"product/verified/",{},function(data) {
		$(".products-list").html(data);
	},'html');
}
function showCommunityFirst(id) {
	$.get(base_url+"product/show/community/"+id,{},function(data) {
		$(".products-list").html(data);
	},'html');
}
function hideCommunity(id) {
	$.get(base_url+"product/hide/community/"+id,{},function(data) {
		$(".products-list").html(data);
	},'html');
}
function changeCountry(a){
	var country = $(a).val();
	$.post(base_url+"seller/city",{country: country, busi_type: 1 },function(data) {
		$('#city').html(data);
	},'html');
	
}
function addToItemToCart(id) {
	$.post(base_url+"additemtocart",{product_id: id},function(data) {
		$("#msg_cont").html(data.msg);
		ShowObject('Layer99', 1);
	},'json');
}
function productGallery(busi_id) {
	$.get(base_url+"getproductgallery/"+busi_id,{},function(data) {
		$("#msg_cont").html(data.msg);
		ShowObject('Layer99', 1);
	},'json');
}

function showRelatedImages(product_id,layer) {
	$.get(base_url+"product/relatedimages/"+product_id+"/"+layer,{},function(data) {
		$("#similar-images-"+layer).html(data);
		ShowObjectWithEffect('Layer19_'+layer, 1, 'slideleft', 500);ShowObjectWithEffect('Layer5_'+layer, 0, 'slideright', 500);
		$('.carousel').carousel({
			interval: 3000
		});
	},'html');
}

</script>