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
.img1 {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: 1px solid #aaa;
}
</style>
<div>
    <div class="col-sm-12" style="padding:0px;">
   		<h1 class="sfont1">Buyers</h1>
   		<p class="sfont2">Results For Global Buyers Based On The Current Requests ..</p>
   		<br>
    </div>
    <div class="row" style="margin:0px;">
    	<div class="col-lg-10 section11"  id="Layer6">
    	<?php 
    	if(count($Buyers) > 0 && $Buyers[0]['id'] !='') {  
    		foreach ($Buyers as $key=>$buyer) {?>
			<div class="row" id="Layer4" style="margin:0px;margin-bottom:15px;" onmouseenter="ShowObjectWithEffect('Layer8_<?php echo $key;?>', 1, 'slideright', 300, 'swing');return false;" onmouseleave="ShowObject('Layer5_<?php echo $key;?>', 0);ShowObject('Layer8_<?php echo $key;?>', 0);return false;">
				<div class="col-md-3 col-sm-12 displaydesktop" style="width:240px;">
					<div id="SlideShow1" class="img22 SlideShow1">
					<?php if(!empty($buyer['info_img1'])) { ?>
					    <img class="image" src="<?php echo asset_url().$buyer['info_img1'];?>" alt="" title="">
					    <img class="image" src="<?php echo asset_url().$buyer['info_img2'];?>" style="display:none;" alt="" title="">
					<?php } else { ?>
						<img class="image" src="<?php echo asset_url();?>images/Buyer-information-image.jpg" alt="" title="">
						<img class="image" src="<?php echo asset_url();?>images/Buyer-information-image.jpg" style="display:none;" alt="" title="">
					<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 space1" style="width:578px;">
					 <div id="wb_Text8" class="section3">
						 <div class="inline">
							 <img src="<?php echo asset_url().$buyer['profile_image']; ?>" class="img1"/>
					   		 <span class="block"><strong class="font1"><a href="<?php echo base_url();?>buyer/profile/<?php echo $buyer['busi_id'];?>" target="_blank" class="style5"><?php echo $buyer['company_name']?></a></strong>
					   		<br> Presented By: <?php if(!empty($buyer['contact_name'])){ echo $buyer['contact_prefix'].' '.$buyer['contact_name']; } else { echo $buyer['name_prefix'].' '.$buyer['name'];} ?></span>
				   		 </div>
			   		  	<div class="font5"><?php echo substr($buyer['company_introduction'], '0', '250'); ?><br><br></div>
			   		 </div>
					<div><div class="col-sm-2" style="padding:0px;width:110px;"><strong class="strong1">Main Products |</strong></div><div class="col-sm-9" style="padding:0px;width:430px;"><?php if(!empty($buyer['main_product'])) { echo substr($buyer['main_product'], '0', '135'); } else { ?>Not specified yet..<?php }?> <?php if(strlen($buyer['main_product']) > 135) { ?>...<?php } ?></div></div>
					<div id="Layer5_<?php echo $key;?>" class="section10 row seller_Layer5">
						<div class="col-md-3">
					 		<div id="RollOver5" class="box1">
					        	<a href="<?php echo base_url();?>buyer/profile/<?php echo $buyer['busi_id'];?>" target="_blank">
					            	<img class="hover" alt="" src="<?php echo asset_url() ?>images/randbuyercherry.png">
					            	<span><img alt="" src="<?php echo asset_url() ?>images/randbuyerblack.png"></span>
					        	</a>
					        	<div id="wb_Text13"class="beauty1">
					        		<p class="textfont1">VIEW PROFILE</p>
					        		<p class="textfont2">To View Buyer Information, Desksite, Contact, Chat and much more.. </p>
					        	</div>
					    	</div>
						</div>
						<div class="col-md-3">
					 		<div id="RollOver21"  class="box2" >
					        	<a href="<?php echo base_url();?>buyer?similar=<?php echo $buyer['user_subcategory_id'];?>">
					        		<img class="hover" alt="" src="<?php echo asset_url() ?>images/videosame_cherry.png">
					            	<span><img alt="" src="<?php echo asset_url() ?>images/videosame_black.png"></span>
					        	</a>
					         	<div id="wb_Text13"class="beauty1">
					        		<p class="textfont1">FIND THE SAME</p>
					        		<p class="textfont2">To View More Buyers With Similar Specifications To The Current Buyer.. </p>
					        	</div>
					       </div>
						</div>
						<div class="col-md-3">
					 		<div id="RollOver22" class="box3">
					        	<a href="javascript:addToCommunity(<?php echo $buyer['busi_id'];?>);" target="_self">
					            	<img class="hover" alt="" src="<?php echo asset_url() ?>images/addcommunity_button2.png">
					            	<span><img alt="" src="<?php echo asset_url() ?>images/addcommunity_button1.png"></span>
					        	</a>
					         	<div id="wb_Text13"class="beauty1">
					        		<p class="textfont1">ADD TO COMMUNITY</p>
					        		<p class="textfont2">To Add Buyer To Your Community Member List, And Follow His Posts..</p>
					        	</div>
					    	</div>
						</div>
						<div class="col-md-3">
					  		<div id="RollOver6" class="box4" onclick="chat_with(<?php echo $buyer['user_id'];?>,<?php echo $buyer['accept_chat'];?>);">
					        	<a>
					        		<img class="hover" alt="" src="<?php echo asset_url() ?>images/chat_button2.png">
					            	<span><img alt="" src="<?php echo asset_url() ?>images/chaTBLACK.png"></span>
					        	</a>
					        	<div id="wb_Text13"class="beauty1">
					        		<p class="textfont1">CHAT </p>
					        		<p class="textfont2">To Chat With Buyer, In Case He Is An Active Member Or He Allows Buyers To Contact With Him.. </p>
					        	</div>
					    	</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-12" style="width:220px;">
					<div id="Layer8_<?php echo $key;?>" class="section9 seller_Layer8" onclick="ShowObjectWithEffect('Layer5_<?php echo $key;?>', 1, 'slideright', 500, 'swing');return false;">
					    <div id="wb_Shape1" class="stylebox">
					        <a href="#" onclick="ShowObjectWithEffect('Layer5_<?php echo $key;?>', 1, 'slideright', 500, 'swing');return false;"><img src="<?php echo asset_url() ?>images/img0092.png" id="Shape1" alt="" style="width:11px;height:48px;"></a>
					    </div>
					</div>
					<div id="Layer7" class="section8">
					    <div id="wb_Text7" class="style-2">
						    <div id="wb_Image10" class="img-style">
						        <?php if(!empty($buyer['community_id'])){?><img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" >
						        <?php } else {?>
						    	<img src="<?php echo asset_url(); ?>images/ts/community.png" id="Image1" style="opacity :0.15" > <?php }?>
					        </div>
						    <div id="wb_Image2" class="img-style">
						    	<?php $buyer_request = $buyer['stock_buyer_count']+$buyer['bstation_post_count']; ?>
						    	<?php if(!empty($buyer_request)){?><img src="<?php echo asset_url(); ?>images/buyer-request.png" id="Image1" > 
						    	<?php } else {?>
						    	<img src="<?php echo asset_url(); ?>images/buyer-request.png" id="Image1" style="opacity :0.15" ><?php }?>
					        </div>
					        <div id="wb_Image1" class="img-style">
						        <?php if($buyer['is_logo_verified'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" > <?php } else { ?>
						        <img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" style="opacity :0.15" >
						        <?php }?>
					        </div>
						    <div id="wb_Image1" class="img-style">
						        <?php if($buyer['is_active'] >= 3){?><img src="<?php echo asset_url(); ?>images/Active.png" id="Image1" > 
						        <?php } else {?>
						    	<img src="<?php echo asset_url(); ?>images/Active.png" id="Image1" style="opacity :0.15" ><?php }?>
					        </div>
						</div>
						<div class="text-center">
							<div class="space33">
								<strong class="font-style-1">Buyer | </strong><span class="font-style-2"> <?php echo $buyer['sub_category'];?></span><br>
							</div><br>
							<div class="space33">
								<strong class="font-style-1"><?php echo $buyer['company_country'];?> | </strong><span class="font-style-2"> <?php echo $buyer['company_city'];?></span>
							</div>
							<br><br>
							<div>
								<strong class="font-style-1">Annual Trade Volume</strong><br><span class="font-style-2"><?php echo $buyer['annual_trad_volume'];?> / Year</span>
							</div>
						</div>
					</div>
				</div>		
			</div>
	<?php }
     } else {?>
	      	<div class="col-lg-10 section11"  id="Layer6" onmouseenter="ShowObjectWithEffect('Layer8', 1, 'slideright', 300, 'swing');return false;" onmouseleave="ShowObject('Layer5', 0);ShowObject('Layer8', 0);return false;" >
	     		<h4 class="center"> No Buyer Found!</h4>
	     	</div>
     <?php } ?>
     <?php if($total_pages > 1) { ?>
     	<div class="row" style="margin:0px;">
			<div id="wb_Text396" style="text-align:center;height:31px;padding:7px;padding-right:0px;background-color:#FA5C43;" class="col-sm-1">
				<span style="color:#FFFFFF;font-family:Georgia;font-size:12px;">Page&nbsp;&nbsp; </span>
			</div>
			<div id="wb_Text393" style="height:31px;background-color: #FFFFFF;padding:0px" class="col-sm-11">
				<div style="text-align:left;padding-top:7px;" class="col-sm-2">
					<span style="color:#3C3C3C;font-family:Arial;font-size:12px;"><?php echo $params['page'];?> of <?php echo $total_pages;?>&nbsp;&nbsp; </span>
				</div>
				<div style="text-align:center;padding-top:7px;" class="col-sm-8">
					<span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><a href="<?php if($total_pages >= ($params['page']+1)){ echo $wpbuyerurl."page=".($params['page']+1);}?>" class="style5">VIEW MORE</a></strong></span>
				</div>
				<div class="col-sm-2" style="padding:0px;padding-top:7px;">
					<span style="color:#3C3C3C;font-family:Arial;font-size:12px;"> Page No</span>&nbsp;
					<form name="searchPageForm" id="searchPageForm" method="GET" action="<?php echo $wpbuyerurl;?>" style="display:inline-block;">
						<select type="text" id="pageinputselect" style="border-radius:0px;width:40px;height:17px;line-height:17px;border: 1px #A9A9A9 solid;background-color:#FECEC7;padding-left:10px;" name="page">
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
				<div id="Layer3" class="box8">
				<div id="wb_Text328" class="innersection">
					<span class="text2">
						<strong>
							<a href="<?php echo base_url();?>b-station" target="_blank" class="style5">Buyers Product Requests</a>
						</strong>
					</span>
					<p class="text3">View The Latest Trade & Products Requests, Boosted By Global Buyers..</p>
					<span class="text2">
						<strong>
							<a href="<?php echo base_url();?>stock-goods" target="_blank" class="style5">Buyers Stock Requests </a>
						</strong>
					</span>
					<p class="text3">View The Latest Stock Goods Requests, Boosted By Global Buyers..</p>
			    </div>
			   </div>
			      <div class="maxheight1 bg1">
						<div class="row" style="margin: 0px;background-color: #808080;">
							<h3 style="color: #fff; text-align: center;">
								<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">FEATURED WORLD </span><br> 
								<span style="color:#FFFFFF;font-family:Impact;font-size:20px;letter-spacing:0.07px;">BUYERS</span>
							</h3>
							<div class="text-center displaydesktop" style="margin-left:7px;margin-bottom:15px;">
								<img src="<?php echo asset_url(); ?>images/img0123.png" class="img-responsive">
							</div>
						</div>
		    	</div>
		    	
		    	<div id="Layer2" class="style2">
		    	<?php if(!empty($featuredBuyers) && $featuredBuyers[0]['id'] !='') {?>
        <div id="Layer2_Container" class="style3">
           <div id="Layer138">
                <div id="wb_Carousel3" class="style4">
                    <div id="Carousel3" style="position:absolute">
                      <?php 
                      $i= 0;
                        foreach($featuredBuyers as $featuredBuyer){
                        if($i%2 == 0){
									$frame = $i; 
										?>
                        			<div class="frame">
                        			<?php } $i++; ?>
                            <div id="Layer147" onmouseenter="ShowObjectWithEffect('Buyer_holder2<?php echo $i;?>', 1, 'dropup', 300, 'swing');return false;"
									onmouseleave="ShowObjectWithEffect('Buyer_holder2<?php echo $i;?>', 0, 'fade', 500, 'swing');return false;" style="position: relative;">
                                <div id="wb_Image226" style="position: relative;">
                                	<?php if ($featuredBuyer['picture'] != "" && file_exists("assets/".$featuredBuyer['picture'])){ ?>
                                    	<img src="<?php echo asset_url().''.$featuredBuyer['picture']; ?>" id="Image226" alt=""  class="style86">
                                    <?php }else{ ?>
			                            <img src="<?php echo asset_url().'images/img1004.png'?>" id="Shape24" alt="" style="width:210px;height:246px;">
			                        <?php } ?>

                                </div>
                              
                                <div id="Layer144" class="style15">
                                    <div id="wb_Text434" class="style16">
                                        <span class="fontstyle-4"><strong><?php echo $featuredBuyer['contact_person_name'];?></strong></span>
                                    </div>
                                    <div id="wb_Text435" class="style17">
                                        <span class="fontstyle-5"><?php echo $featuredBuyer['position'];?></span></div>
                                    <div id="Layer148" class="style18">
                                        <div id="wb_Image48" class="style19">
                                            <img src="<?php echo asset_url().''.$featuredBuyer['contact_person_flag']; ?>" id="Image48" alt="">
                                        </div>
                                    </div>
                                    <div id="Layer150" class="style20">
                                        <div id="wb_Text440" class="style21">
                                            <span class="fontstyle-6"><strong><?php echo $featuredBuyer['product_name']; ?></strong></span></div>
                                    </div>
                                </div>
                                
                                <div id="Buyer_holder2<?php echo $i;?>" class="style22">
                                    <div id="wb_Image521" class="style23">
                                        <a href="javascript:openBuyer(<?php echo $featuredBuyer['id']; ?>)"><img src="<?php echo asset_url(); ?>images/window.png" id="Image5" alt=""></a>
                                    </div>
                                    <div id="RollOver12" class="style24">
                                        <a href="<?php echo base_url();?>buyer/profile/<?php echo $featuredBuyer['busi_id'];?>" target="_blank">
                                            <img class="hover" alt="" src="<?php echo asset_url(); ?>images/desktoporange.gif">
                                            <span><img alt="" src="<?php echo asset_url(); ?>images/desktopblack.png"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php if($frame+2 == $i){ ?>
                            </div>
                            <?php } }?>
                    </div>
                    <div id="Carousel3_back" class="style51">
                        <a href=""><img alt="Back" src="<?php echo asset_url(); ?>images/previoustxt0blk.png"></a>
                    </div>
                    <div id="Carousel3_next" class="style53">
                        <a style="cursor:pointer"><img alt="Next" src="<?php echo asset_url(); ?>images/nexttxt0blk.png"></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="Layer_buyers" class="class1">
        	<div id="Layer_details_Container5" class="class2"></div>
        </div>
        <?php } else {?>
        <p>No featured buyers found.</p>
        <?php }?>
	</div>
	</div>
	<!-- fearture seller popbox  -->
    <div id="Layer_details3" style="visibility:hidden;" class="style100">
        <div id="Layer_details3_Container" class="layer1">
            <div id="Layer136">
                <div id="Layer136_Container" class="layer2">
                    <div id="Layer264" class="style60">
                        <div id="wb_Text192" class="style61">
                            <span class="fontnew1"><strong>Main Products</strong></span></div>
                        <div id="wb_Text193" class="style62">
                            <span>Applicance, lightinging, LED, Applicance, lightinging, LED<br> </span></div>
                    </div>
                    <div id="wb_Image152" class="style64">
                        <a href="#" onclick="ShowObject('Layer_details3', 0);return false;"><img src="<?php echo asset_url(); ?>images/close.png" id="Image152" alt=""></a>
                    </div>
                    <div id="RollOver18" class="style65">
                        <a href="">
                                    <img class="hover" alt="" title="Add to view later" src="<?php echo asset_url(); ?>images/favorite_chery.gif">
                                    <span><img alt="" title="Add to view later" src="<?php echo asset_url(); ?>images/addtofav.png"></span>
                                </a>
                    </div>
                    <div id="RollOver19" class="style66">
                        <a href="">
                                    <img class="hover" alt="" title="Add to my community" src="<?php echo asset_url(); ?>images/addcommunity_button2.png">
                                    <span><img alt="" title="Add to my community" src="<?php echo asset_url(); ?>images/add2comwhite.png"></span>
                                </a>
                    </div>
                    <div id="wb_Text194" class="style67">
                        <span class="style68"><strong>Hotline Internet &amp; technology Co. Ltd.</strong></span></div>
                    <div id="wb_Text200" class="style69">
                        <span class="style70"><strong>Mr. Jack Tang</strong></span></div>
                    <div id="wb_Image153" class="style71">
                        <img src="<?php echo asset_url(); ?>images/rseller2.png" id="Image153" alt=""></div>
                    <div id="Layer265" class="style72">
                        <div id="wb_Image154" class="style737">
                            <img src="<?php echo asset_url(); ?>images/trusted.png" id="Image154" alt=""></div>
                        <div id="wb_Image158" class="style757">
                            <img src="<?php echo asset_url(); ?>images/CommMember.png" id="Image158" alt=""></div>
                        <div id="wb_Text201" class="style767">
                            <span class="style77">Supplier   </span>
                            <br>
                            <span class="style77">Platinum member </span>
                            <br>
                            <span class="section222">Added to my community</span>
                        </div>
                    </div>
                    <div id="Layer266" class="style78">
                        <div id="wb_Image159" class="style79">
                            <img src="<?php echo asset_url(); ?>images/companybackground.jpg" id="Image159" alt="">
                        </div>
                        <div id="wb_Text247" class="style80">
                            <span class="style81"><strong>Egypt | Cairo</strong></span></div>
                        <div id="wb_Text248" class="style82">
                            &nbsp;</div>
                        <div id="wb_Image160" class="style83">
                            <img src="<?php echo asset_url(); ?>images/china0.png" id="Image160" alt=""></div>
                    </div>
                    <div id="RollOver20" class="style84">
                        <a href="javascript:popupwnd('./chat_window.php','no','no','no','no','no','no','750','50','435','720')" target="_self">
                                    <img class="hover" alt="" title="Chat" src="<?php echo asset_url(); ?>images/chat_button2.png">
                                    <span><img alt="" title="Chat" src="<?php echo asset_url(); ?>images/chatwhite.png"></span>
                                </a>
                    </div>
                    <div id="RollOver14" class="style85">
                        <a href="./buyer_profile.php" target="_blank">
                                    <img class="hover" alt="" src="<?php echo asset_url(); ?>images/randbuyercherry.png">
                                    <span><img alt="" src="<?php echo asset_url(); ?>images/profilewhite.gif"></span>
                                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fearture seller popup box ends -->
	</div>
</div>	
<script>
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
    var Carousel3Opts = {
        delay: 4000,
        duration: 500,
        easing: 'easeInOutBounce',
        mode: 'fade',
        direction: '',
        pagination: false,
        start: 0
    };
    $("#Carousel3").carouseleffects(Carousel3Opts);
    $("#Carousel3_back a").click(function() {
        $('#Carousel3').carouseleffects('prev');
    });
    $("#Carousel3_next a").click(function() {
        $('#Carousel3').carouseleffects('next');
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
    function openBuyer(id) {
		$.get(base_url+"buyer/popup/"+id,{},function(data) {
			$("#Layer_details_Container5").html(data);
			ShowObjectWithEffect('Layer_buyers', 1, 'scale', 500, 'swing');
		},'html');
	}
</script>