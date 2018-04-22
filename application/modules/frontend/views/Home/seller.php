<link href="<?php echo asset_url();?>css/jquery.booklet.1.1.0.css" rel="stylesheet">
<script src="<?php echo asset_url();?>js/jquery.booklet.1.1.0.min.js"></script>
<link rel="stylesheet" href="<?php echo asset_url();?>css/style-jq-3d-flip-book.css">
<script src="<?php echo asset_url();?>js/html2canvas.min.js"></script>
<script src="<?php echo asset_url();?>js/three.min.js"></script>
<script src="<?php echo asset_url();?>js/pdf.min.js"></script>
<script src="<?php echo asset_url();?>js/3dflipbook.min.js"></script>
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

.dropdownsection {
	background-image: url(assets/images/menu_arrowwhite.png);
    background-repeat: no-repeat;
    background-position: right center;
}
a.style5
{
   color: #1E90FF;
   text-decoration: none;
}
a.style5:visited
{
   color: #1E90FF;
   text-decoration: none;
}
a.style5:active
{
   color: #1E90FF;
   text-decoration: none;
}
a.style5:hover
{
   color: #FF6347;
   text-decoration: underline;
}
.sfont1 {
	margin-top:0px;
}
#Button15 {
    border: 0px #A9A9A9 solid;
    background-color: #1E90FF;
    color: #FFFFFF;
    font-family: Arial;
    font-weight: normal;
    font-size: 13px;
}
.catalog_c_img {
	border: none;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background-image: url('<?php echo asset_url();?>images/img2096.png');
    background-repeat: no-repeat;
    background-position: 50%;
}
.catalogue_modal_body {
	background-color:transparent;background-image:url('<?php echo asset_url();?>images/vcat_insider.png');background-size:cover;padding-top: 110px;
}
.catalogue_modal_body_bg {
	background-color:transparent;background-image:url('<?php echo asset_url();?>images/vcat_insider.png');background-repeat:no-repeat;background-size:cover;padding-top: 80px;background-size:initial;background-position:center;
}
.catalogue_page_item_name {
	color:#303030;font-family:Georgia;font-size:13px;padding-bottom:5px;padding-top:0px;
}
.catalogue_page_item_details {
	color:#787878;font-family:Arial;font-size:11px;padding-bottom:10px;min-height:55px;
}
.catalogue_page_item_quantity {
	color:#1E90FF;font-family:Arial;font-size:11px;padding-bottom:25px;
}
.catalogue_page_item_price_div {
	text-align: center;
	margin-bottom: -10px;
    z-index: 1;
}
.catalogue_page_item_price {
	background-color:#FF0000;color:#FFFFFF;font-family:Arial;font-size:17px;padding: 2px 10px;
}
.catalogue_page_item_mimg {
	width:303px;height:268px;padding-bottom:5px;
}
.catalogue_page_left_num {
	padding-top: 10px;
	background-color:#fff;
}
.catalogue_page_no_text {
	color:#D3D3D3;font-family:Arial;font-size:11px;
}
.catalogue_page_no_num {
	color:#FF6347;font-family:'Arial Black';font-size:16px;
}
.catalogue_page_item_mimg-sm {
	width:150px;height:115px;margin-top: 10px;
}
.catalogue_page_right_num {
	padding-top: 10px;
	background-color:#fff;
}
.catalogue_main_img {
	border: 1px solid #eee;
	width: 303px;
    height: 268px;
}
.catalogue_sub_img {
	border: 1px solid #eee;
	width: 150px;
    height: 115px;
}
.catalogue_modal_close {
	width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #fff !important;
    font-size: 19px;
    opacity: 1;
}
li.share-button a{
	font-size:20px;
	color:#fa5c43;
	border :2px solid;
	margin-top: 20px;
	border-radius :50%;
	padding: 4px;
	width:25px;
	height :25px;
}
li.share-button a:hover{
	font-size:20px;
	color:#ffffff;
	border :2px solid;
	margin-top: 20px;
	border-radius :50%;
	padding: 4px;
	width:30px;
	height :30px;
}
ul.share{
	list-style-type: none;
	margin-top:  100%;
	line-height: 50px;
}

</style>
<script type="text/javascript">
	var template = {
    html: 'application/modules/frontend/views/default/default-book-view.html',
    styles: [
      '<?php echo asset_url();?>css/font-awesome.min.css',
      '<?php echo asset_url();?>css/short-white-book-view.css'
    ],
    script: '<?php echo asset_url();?>js/default-book-view.js'
  	};

  	var booksOptions = {
      pageCallback: orwell1984PageCallback,
      pages: 10,
      propertiesCallback: function(props) {
        props.page.depth /= 2;
        props.cover.padding = 0.002;
        return props;
      },
      template: template
    };

    
    function orwell1984PageCallback(n) {
    return {
      type: 'html',
      //src: 'books/html/1984/'+(n+1)+'.html',
      src: base_url+"catalogue/pages/"+catalogue_id+"/"+(n+1),
      interactive: true
    };
  }
  /*var instance = {
    scene: undefined,
    options: undefined,
    node: $('#flip-book-window').find('.mount-node')
  };*/
  //instance.options = booksOptions;
  //instance.scene = instance.node.FlipBook(instance.options);
</script>
<div>   
   	<div class="col-sm-12" style="padding:0px;padding-top: 40px;">
   		 <h1 class="sfont1">sellers</h1>
   		 <p class="sfont2">Sourcing with more details is available by selecting additional options from the More Options Menu on the right side..</p>
   		 <br>
    </div>
    <div class="row" style="margin:0px;">
	    <div class="col-lg-10 section11 seller-list"  id="Layer6"  >
			<?php
			if(count($Sellers) > 0 && $Sellers[0]['id'] !='') { 
    		foreach ($Sellers as $key=>$seller) {?>
			<div class="row" id="Layer4" style="margin:0px;margin-bottom:15px;" onmouseenter="ShowObjectWithEffect('Layer8_<?php echo $key;?>', 1, 'slideright', 300, 'swing');return false;" onmouseleave="ShowObject('Layer5_<?php echo $key;?>', 0);ShowObject('Layer8_<?php echo $key;?>', 0);return false;">
				<div class="col-md-3 col-sm-12 displaydesktop" style="width:240px;">
					<div id="" class="img22 mysellercarousel SlideShow1">
					<?php if(!empty($seller['info_img1'])) { ?>
					    <img class="image" src="<?php echo asset_url().$seller['info_img1'];?>" alt="" title="" style="width:218px;">
					    <img class="image" src="<?php echo asset_url().$seller['info_img2'];?>" style="display:none;width:218px;" alt="" title="">
					<?php } else { ?>
						<img class="image" src="<?php echo asset_url();?>images/seller-a.jpg" alt="" title="" style="width:218px;">
					    <img class="image" src="<?php echo asset_url();?>images/seller-a.jpg" style="display:none;width:218px;" alt="" title="">
					<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 space1" style="width:578px;">
					 <div id="wb_Text8" class="section3">
						 <div class="inline">
						 	<?php if(!empty($seller['profile_image'])) { ?>
							 <img src="<?php echo asset_url().$seller['profile_image']; ?>" class="img1"/>
							 <?php } else { ?>
							 <img src="<?php echo asset_url(); ?>images/img3450.png" class="img1"/>
							 <?php } ?>
					   		 <span class="block"><strong class="font1"><a href="<?php echo base_url();?>desksite/<?php echo $seller['busi_id'];?>" target="_blank" class="style5"><?php echo $seller['company_name']?></a></strong>
					   		<br> Presented By: <?php if(!empty($seller['contact_name'])){ echo $seller['contact_prefix'].' '.$seller['contact_name']; } else { echo $seller['name_prefix'].' '.$seller['name'];} ?></span>
				   		 </div>
			   		  <p class="font5"><?php echo substr($seller['company_introduction'], '0', '200'); ?><br></span></p>
			   		</div>
					<div><div class="col-sm-2" style="padding:0px;width:110px;"><strong class="strong1">Main Products |</strong></div><div class="col-sm-9" style="padding:0px;width:445px;"> <?php echo substr($seller['main_product'], '0', '150')?> <?php if(strlen($seller['main_product']) > 150) { ?>...<?php } ?></div></div>
					<div id="Layer5_<?php echo $key;?>" class="section10 row seller_Layer5">
					<div class="col-md-3">
					 	<div id="RollOver5" class="box1">
					        <a href="<?php echo base_url();?>desksite/<?php echo $seller['busi_id'];?>" target="_blank">
					            <img class="hover" alt="" src="<?php echo asset_url() ?>images/Desktopblue.png">
					            <span><img alt="" src="<?php echo asset_url() ?>images/desktopicon.gif"></span>
					        </a>
					        <div id="wb_Text13"class="beauty1">
					        <p class="textfont1">DESKSITE</p>
					        <p class="textfont2">To View Seller Desktop Source products, Videos, Contact, Chat and much more.. </p>
					        </div>
					    
					    </div>
					</div>
					<div class="col-md-3">
					<?php if(!empty($seller['catalouge_id'])) { ?>
					 	<div id="RollOver21"  class="box2" >
					        <a href="javascript:viewCatalogueBook(<?php echo $seller['busi_id'];?>);">
					            <img class="hover" alt="" src="<?php echo asset_url() ?>images/vacticonblue.png">
					            <span><img alt="" src="<?php echo asset_url() ?>images/vacticonblack.png"></span>
					        </a>
					         <div id="wb_Text13"class="beauty1">
					        <p class="textfont1">CATALOGUE</p>
					        <p class="textfont2">To View Seller Products In a Quick Way.. </p>
					        </div>
	
						</div>
					<?php } else { ?>
						<div class="box2" >
					        <div style="margin-left: 45px;">
					            <span><img src="<?php echo asset_url() ?>images/vacticonblack.png" id="Image114" alt="Catalogue" style="opacity: 0.3;"></span>
					        </div>
					      	<div id="wb_Text13"class="beauty1">
						        <p class="textfont1" style="color:#DCDCDC;;">CATALOGUE</p>
						        <p class="textfont2" style="color:#DCDCDC;">To View Seller Products In a Quick Way.. </p>
					        </div>
	
						</div>
					<?php } ?>
					</div>
					<div class="col-md-3">
					 	<div id="RollOver22" class="box3">
					        <a href="javascript:addToMyFavourite(<?php echo $seller['busi_id'];?>,1);" target="_self">
					            <img class="hover" alt="" src="<?php echo asset_url() ?>images/videoaddtofav.png">
					            <span><img alt="Favourite" src="<?php echo asset_url() ?>images/favoriteclick.png"></span>
					        </a>
					        <div id="wb_Text13"class="beauty1">
						        <p class="textfont1">ADD TO FAVOURITE</p>
						        <p class="textfont2">To Save Seller in Your Favorite Box, So As You Will Be Able To View It Later On..</p>
					        </div>
					    </div>
					</div>
					<div class="col-md-3">
					 
					  <div id="RollOver6" class="box4" onclick="chat_with(<?php echo $seller['user_id'];?>,<?php echo $seller['accept_chat']; ?>)">
					        <a>
					            <img class="hover" alt="" src="<?php echo asset_url() ?>images/chatblue.png">
					            <span><img alt="" src="<?php echo asset_url() ?>images/chaTBLACK.png"></span>
					        </a>
					        <div id="wb_Text13"class="beauty1">
					        <p class="textfont1">CHAT </p>
					        <p class="textfont2">To Chat With Seller .. </p>
					        </div>
					    </div>
					</div>
					</div>
				
				</div>
				
				<div class="col-md-3 col-sm-12" style="width:220px;">
						<div id="Layer8_<?php echo $key;?>" class="section9 seller_Layer8" onclick="ShowObjectWithEffect('Layer5_<?php echo $key;?>', 1, 'slideright', 500, 'swing');return false;">
						    <div id="wb_Shape1" class="stylebox">
						        <a href="#" onclick="ShowObjectWithEffect('Layer5_<?php echo $key;?>', 1, 'slideright', 500, 'swing');return false;"><img src="<?php echo asset_url() ?>images/img1243.png" id="Shape1" alt="" style="width:11px;height:48px;"></a>
						    </div>
						</div>
						<div id="Layer7" class="section8">
						    <div id="wb_Text7" class="style-2">
							    <div id="wb_Image10" class="img-style">
							        <?php if(!empty($tsuserid) && $seller['community_id'] !='' && $seller['plan_id'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" > 
							        <?php }else {?>
							        <img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" style="opacity :0.15">
							        <?php } ?>
						        </div>
							    <div id="wb_Image2" class="img-style">
							    	<?php if($seller['plan_id'] > 1 && $seller['gaurantee_period'] !=''){ ?><img src="<?php echo asset_url(); ?>images/ts/guarantee.png" id="Image1" style="width:34px;height:26px;"> <?php } else {?>
							    	<img src="<?php echo asset_url(); ?>images/ts/guarantee.png" id="Image1" style="opacity :0.15;width:34px;height:26px;" >
							    	<?php }?>
						        </div>
							    <div id="wb_Image1" class="img-style">
							        <?php if($seller['plan_id'] > 1 && $seller['is_logo_verified'] > 1){?><img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" > <?php } else { ?>
							        <img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" style="opacity :0.15" >
							        <?php }?>
						        </div>
						        <div id="wb_Image1" class="img-style">
									<?php if($seller['plan_id'] > '1' && $seller['plan_id'] > '1'){?><img src="<?php echo asset_url(); ?>images/ts/member-logo.png" id="Image1"><?php } else {?>
									<img src="<?php echo asset_url(); ?>images/ts/member-logo.png" id="Image1" style="opacity :0.15">
									<?php }?>
						        </div>
							</div>
							<div class="text-center">
								<div class="space33" style="padding-top: 10px;">
									<strong class="font-style-1">Seller | </strong><p class="font-style-2"> <?php echo $seller['sub_category'];?></p>
								</div><br>
								<div class="space33">
									<strong class="font-style-1"> <?php echo $seller['company_country'];?> |  </strong><p class="font-style-2"> <?php echo $seller['company_city'];?></p>
								</div>
								<p class="left style-font-1" style="padding-top:10px;">Rank</p>
								<div class="progress">
								    <div class="progress-bar orange1" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $seller['rank']?>%">
								     </div>
								 </div>
								 <p class="font121">%<?php echo $seller['rank']?></p>
							</div>
						</div>
					</div>		
				</div>
			<?php }}  else {?>
			      <div class="col-lg-10 section11"  id="Layer6" onmouseenter="ShowObjectWithEffect('Layer8', 1, 'slideright', 300, 'swing');return false;" onmouseleave="ShowObject('Layer5', 0);ShowObject('Layer8', 0);return false;" >
			     	<h4 class="center"> No Seller Found!</h4>
			     </div>
		     <?php } ?>
		     <?php if($total_pages > 1) { ?>
		     	<div class="row" style="margin:0px;">
					<div id="wb_Text396" style="text-align:center;height:31px;padding:7px;padding-right:0px;background-color: #1E90FF;" class="col-sm-1">
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
							<form name="searchPageForm" id="searchPageForm" method="GET" action="<?php echo $wpsellerurl;?>" style="display:inline-block;">
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
			<div class="col-lg-2" style="padding:0px;">
				<div class="panel">
					<div class="panel-heading" class="panelstyle">
						<b class="panelstyle1">More Options Menu</b>
					</div>
					<div class="list-group categary">
				   		<a href="<?php echo $sellerurl;?>&plan_id=2" class="list-group-item" >Show verified Members First </a> 
				   		<?php if(!empty($tsuserid)){?>
				   		<a href="<?php echo $sellerurl;?>&community_only=1" class="list-group-item">Show My Community Members Only </a> 
				   		<a href="<?php echo $sellerurl;?>community_hide=1" class="list-group-item">Hide My Community Members </a>
				   		<?php }?>
				   	</div>
				</div>
				<div id="Layer3" class="box8">
					<div id="wb_Text328" class="innersection" style="background-color:#fff;">
						<span class="text2"><strong><a href="<?php echo base_url();?>vcatalogues" target="_blank" class="style5">V-CATALOGUES</a></strong></span>
						<p class="text3">Follow the latest collection of world sellers brands..</p>
						<span class="text2"><strong><a href="<?php echo base_url();?>seller/desksites" target="_blank" class="style5">DESKSITES </a></strong></span>
						<p class="text3">Experience a new vision of websites techniques with quick access, rich information and much more..</p>
						<span class="text2"><strong><a href="<?php echo base_url();?>3dproducts" target="_blank" class="style5">PRODUCTS IN 3D </a></strong></span>
						<p class="text3">Step into a new dimension of E-commerce, search products with rich information, live details and much more..</p>
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
               			 <div id="wb_Carousel3" class="style4">
               			 	<?php if(count($featuredSellers) > 2) { ?>
                    				<div  id="Carousel3" style="position:absolute">
                    			<?php } else { ?>
                    				<div  id="Carousel3x" style="position:absolute">
                    			<?php }
                     			 
                     				 $i= 0;
			                        foreach($featuredSellers as $featuredSeller){
			                        if($i%2 == 0){
									$frame = $i; 
										?>
                        			<div class="frame">
                        			<?php } $i++; ?>
                           				<div id="Layer147" onmouseenter="ShowObjectWithEffect('Buyer_holder2<?php echo $i; ?>', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('Buyer_holder2<?php echo $i; ?>', 0, 'fade', 500, 'swing');return false;">
			                                <div id="wb_Image226" >
			                                	<?php if ($featuredSeller['picture'] != "" && file_exists("assets/".$featuredSeller['picture'])){ ?>
			                                    <img src="<?php echo asset_url().''.$featuredSeller['picture']; ?>" id="Image226" alt=""  class="style86" style="width:210px;height:246px;">
			                                    <?php }else{ ?>
			                                    <img src="<?php echo asset_url().'images/img1004.png'?>" id="Shape24" alt="" style="width:210px;height:246px;">
			                                    <?php } ?>
			                                </div>
			                                <div id="Layer144" class="style15" style="position: relative;top:0px;">
			                                    <div id="wb_Text434" class="style16" style="position: relative;top:2px;">
			                                    	<?php if($featuredSeller['contact_person_name'] != ""){ ?>
			                                        <span class="fontstyle-4"><strong><?php echo $featuredSeller['contact_person_name'];?></strong></span>
			                                        <?php }else{ ?>
			                                        <span class="fontstyle-4"><strong><?php echo $featuredSeller['contact_person'];?></strong></span>
													<?php } ?>
			                                    </div>
			                                    <div id="wb_Text435" class="style17" style="position: relative;top:3px;">
			                                        <span class="fontstyle-5"><?php echo $featuredSeller['position'];?></span></div>
			                                    <div id="Layer148" class="style18" style="position: relative;top:-25px;">
			                                        <div id="wb_Image48" class="style19">
			                                            <img src="<?php echo asset_url();?>images/flags/<?php echo $featuredSeller['flag'];?>" id="Image48" alt="">
			                                        </div>
			                                    </div>
			                                    <div id="Layer150" class="style20" style="position: relative;top:-10px;">
			                                        <div id="wb_Text440" class="style21">
			                                            <span class="fontstyle-6"><strong><?php echo $featuredSeller['product_name']; ?></strong></span></div>
			                                    </div>
			                                </div>
			                                <div id="Buyer_holder2<?php echo $i;?>" class="style22" style="position: relative;display:none;top: -65px;background: white;z-index: 512;">
			                                    <div id="wb_Image521" class="style23">
			                                        <a href="javascript:openSeller(<?php echo $featuredSeller['id']; ?>);"><img src="<?php echo asset_url(); ?>images/window.png" id="Image5" alt=""></a>
			                                    </div><!-- onclick="ShowObjectWithEffect('Layer_buyer', 1, 'scale', 500, 'swing');return false;"-->
			                                    <div id="RollOver12" class="style24">
			                                        <a href="./buyer_profile.php" target="_blank">
			                                            <img class="hover" alt="" src="<?php echo asset_url(); ?>images/desktoporange.gif">
			                                            <span><img alt="" src="<?php echo asset_url(); ?>images/desktopblack.png"></span>
			                                        </a>
			                                    </div>
			                               </div>
                           				</div>
                           				
                           			<?php if($frame+2 == $i){ ?>
                           			</div>
                           			<?php } ?>
                           	 <?php }?>
                   			 </div>
		                    <div id="Carousel3_back" class="style51">
		                        <a href=""><img alt="Back" src="<?php echo asset_url(); ?>images/previoustxt0blk.png"></a>
		                    </div>
		                    <div id="Carousel3_next" class="style53">
		                        <a style="cursor:pointer"><img alt="Next" src="<?php echo asset_url(); ?>images/nexttxt0blk.png"></a>
		                    </div>
                		</div>
           			 </div>
           			 <div id="Layer_sellers" class="class1">
				        <div id="Layer_details_Container4" class="class2">
				        </div>
				    </div>
           			  <div class="maxheight1 bg2">
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
			            <div id="">
			                <div id="wb_Carousel2" class="style4">
			                    <div id="Carousel2" style="position:absolute">
			                    <?php $i =0;
			                    foreach ($featuredProductVideo as $featuredVideo) {
			                    if($i%2 == 0){
									$frame = $i; 
										?>
			                        <div class="frame" class="style5">
			                        	<?php } $i++; ?>
			                            <div id="Layer39" class="fs11" onmouseenter="ShowObjectWithEffect('holder<?php echo $i; ?>', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('holder<?php echo $i; ?>', 0, 'fade', 500, 'swing');return false;" style="position: relative;">
			                                <div id="wb_Text78" class="fs1">
			                                    <span><strong><?php echo $featuredVideo['name'];?></strong></span></div>
			                                <div id="wb_Text77" class="fs2">
			                                    <span class="fs3"><?php echo substr($featuredVideo['description'], '0', '30');?> ...</span></div>
			                                <div id="wb_MediaPlayer1" class="fs9">
			                                    <video src="<?php echo asset_url().''.$featuredVideo['vedio_file']; ?>" controls="controls">
			                                    </video>
			                                </div>
			                                <div id="wb_Text79" class="fs6">
			                                    <span class="fs4"><strong><?php echo $featuredVideo['unit_price'];?> / Set</strong></span></div>
			                                <div id="wb_Text80" class="fs7">
			                                    <span class="fs5"><strong>Min. Qty. <?php echo $featuredVideo['quantity'].' '.$featuredVideo['unit'];?></strong></span></div>
			                                
			                                <div id="Layer29" class="fs13">
			                                </div>
			                                <div id="holder<?php echo $i;?>" class="fs14">
			                                    <div id="wb_Image33" class="fs15">
			                                        <a href="javascript:openVideo(<?php echo $featuredVideo['id'];?>)"><img src="<?php echo asset_url(); ?>images/play.png" id="Image33" alt="" width="35px" height="35px"></a>
			                                    </div>
			                                    <div id="wb_Image34" class="fs16">
			                                        <a href="./video/details/<?php echo $featuredVideo['id'];?>" target="_blank"><img src="<?php echo asset_url(); ?>images/view2.png" id="Image34" alt="" width="35px" height="35px"></a>
			                                    </div>
			                                </div>
			                            </div>
			                        <?php if($frame+2 == $i){ ?>
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
			        </div>
        		<!-- fearture videos end-->
        		<!-- feature products -->
		        <div class="sp">
		            <div class="maxheight1 bg3">
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
		                <div id="wb_Carousel1" class="style4">
		                    <div id="Carousel1" style="position:absolute">
		                    <?php $i =0;
		                    foreach ( $featuredProducts as $key=>$featuredProduct) {
		                    	if($i%2 == 0) {
		                    		$frame = $i; 
			                    	?>
		                        <div class="frame">
		                        <?php } $i++; ?>
		                            <div id="Layer134" class="product111" style="position:relative;" onmouseenter="ShowObjectWithEffect('holder7-<?php echo $key;?>', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('holder7-<?php echo $key;?>', 0, 'fade', 500, 'swing');return false;">
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
		                    <!--<div id="Carousel11" style="position:absolute;top:275px;">
		                    <?php $i =0;
		                    foreach ( $featuredProducts as $key=>$featuredProduct) {
		                    	if($key%2 == 1) {
			                    	?>
		                        <div class="frame" <?php if($i > 0) { ?>style="display:none;"<?php } ?>>
		                            <div id="Layer134" class="product111" onmouseenter="ShowObjectWithEffect('holder7-<?php echo $key;?>', 1, 'dropup', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('holder7-<?php echo $key;?>', 0, 'fade', 500, 'swing');return false;">
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
		                        </div>
		                        <?php $i++; }?>
		                        <?php } ?>
		                    </div>-->
		                </div>
		            </div>
		        </div>
		        <!-- feature product ends-->
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
<div id="vcatalogue_overlay" class="modal fade" style="background-color:#404040;z-index: 4000;">
	<div class="modal-dialog" style="background-color:#404040;width:1050px;">
		<div class="modal-content" style="background: transparent;box-shadow:none;-webkit-box-shadow:none;border: 0px;">
			<div style="position:absolute;right:0;width:50px;height:50px;z-index:5000;"><button type="button" class="pull-right" data-dismiss="modal" aria-hidden="true" style="background:transparent;border:0px;"><img src="<?php echo asset_url();?>images/newicons/closeround.png" id="Image47" alt="" style="width:35px;"></button></div>
			<div class="modal-body" style="width:1050px;height:640px;">
				<input type="hidden" id="pcatalogue_id" value="" />
				<div class="row">
					<div class="col-md-1" style="float:left;padding:0px;width:155px;" id="catalogue_links">
						<?php /*foreach ($catalogues as $catalogue) { ?>
						<div style="text-align: center; margin-bottom: 5px; width:140px;height:155px;">
							<div style="position:relative;width: 140px;top:-10px;">
								<a href="javascript:viewNextCatalogueBook(<?php echo $catalogue['id'];?>);">
									<span style="background-color:#F05539;color:#FFFFFF;font-family:Georgia;font-size:13px;"><strong><?php echo $catalogue['catalogue_title'];?></strong></span>
								</a>
							</div>
							<a href="javascript:viewNextCatalogueBook(<?php echo $catalogue['id'];?>);">
							<img src="<?php echo asset_url(); ?>images/vCAT2.png" class="img-responsive carousel_img" style="display: inline-block;width:77px;" >
							<div style="position:relative;width:65px;top:-70px;left:38px;">
								<img src="<?php echo asset_url().$catalogue['catalogue_cover']; ?>" class="img-responsive" style="display: inline-block;border-radius:50%;border:2px solid #e55a43;padding: 0px !important;">
							</div>
							</a>
						</div>
						<?php }*/ ?>
					</div>
					<div class="col-md-9" style="width:770px;padding-top:42px;">
						<div id="catalogue_page_content" class="catalogue_outer_body">
						</div>
					</div>
					<div class="col-md-1" style="padding:0px;width:80px;" id="share_it">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    $(".mysellercarousel").slideshow({
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
        delay: 5000,
        duration: 2000,
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
    $("#Carousel11").carouseleffects(Carousel1Opts);
    $("#Carousel11_back a").click(function() {
        $('#Carousel11').carouseleffects('prev');
    });
    $("#Carousel11_next a").click(function() {
        $('#Carousel11').carouseleffects('next');
    });

    var Carousel3Opts =
   {
      delay: 4000,
      duration: 2000,
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
   })

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
function openSeller(id) {
		$.get(base_url+"seller/popup/"+id,{},function(data) {
			$("#Layer_details_Container4").html(data);
			ShowObjectWithEffect('Layer_sellers', 1, 'scale', 500, 'swing');
		},'html');
	}
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
function showBlackHorseMember() {
	$.get(base_url+"seller/blackhorse/memberlist",{},function(data) {
		$(".seller-list").html(data);
	},'html');
}

function showCommunityMember(id) {
	$.get(base_url+"seller/community/memberlist/"+id,{},function(data) {
		$(".seller-list").html(data);
	},'html');
}

function hideCommunityMember(id) {
	$.get(base_url+"seller/hidecommunity/memberlist/"+id,{},function(data) {
		$(".seller-list").html(data);
	},'html');
}

function changeCountry(a){
	var country = $(a).val();
	$.post(base_url+"seller/city",{country: country, busi_type: 1 },function(data) {
		$('#city').html(data);
	},'html');
	
}
var catalogue_id = 0;
function viewCatalogueBook(id) {

	ajaxindicatorstart("Please wait while we load catalogue.");
	$.get(base_url+"catalogue/business/"+id,{},function(data){
		ajaxindicatorstop();
		if(data.html == '0') {
			alert("Sorry no catalogues created.");
		} else {

			$("#catalogue_page_content").html(data.html);
			$("#catalogue_links").html(data.html2);
			$("#pcatalogue_id").val(data.id);
			catalogue_id = data.id;
			$("#vcatalogue_overlay").modal('show');
			var instance = {
    scene: undefined,
    options: undefined,
    node: $('#flip-book-window').find('.mount-node')
  };

			instance.options = booksOptions;
  			instance.scene = instance.node.FlipBook(instance.options);
			var shareIt = '<ul class="share pull-right text-center">'
				 +'<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#24A7DB;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Views<br> <span id="vdiv'+data.id+'">'+data.views+'</span></label></li>'
				 +'<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#32AA2B;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Likes<br> <span id="sdiv'+data.id+'">'+data.likes+'<span></label></li>'
				 +'</ul>'
				 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 245px;width:35px;height:35px;z-index:380;" onclick="chat_with('+data.user_id+');">'
				 +'<a>'
				 +'<img class="hover" src="<?php echo asset_url()?>images/chatwhite.png" alt="view">'
				 +'<span><img alt="View" src="<?php echo asset_url()?>images/chat_button2.png"></span>'
				 +'</a>'
				 +'</div>'
				 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 290px;width:35px;height:35px;z-index:380;">'
				 +'<a href="javascript:likeCatalogue('+data.id+');">'
				 +'<img class="hover" src="<?php echo asset_url()?>images/items_likewhite.png" alt="view">'
				 +'<span><img alt="View" src="<?php echo asset_url()?>images/items_like2.png"></span>'
				 +'</a>'
				 +'</div>'
				 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 335px;width:35px;height:35px;z-index:380;">'
				 +'<a href="javascript:addToMyFavourite('+data.busi_id+',7);">'
				 +'<img class="hover" src="<?php echo asset_url()?>images/addtofav.png" alt="view">'
				 +'<span><img alt="View" src="<?php echo asset_url()?>images/favorite_chery.gif"></span>'
				 +'</a>'
				 +'</div>';
			$("#share_it").html(shareIt);
			var $mybook 		= $('#mybook');
			var $bttn_next		= $('#next_page_button');
			var $bttn_prev		= $('#prev_page_button');
			var $loading		= $('#loading');
			var $mybook_images	= $mybook.find('img');
			var cnt_images		= $mybook_images.length;
			var loaded			= 0;
			//preload all the images in the book,
			//and then call the booklet plugin
			$mybook_images.each(function(){
				var $img 	= $(this);
				var source	= $img.attr('src');
				$('<img/>').load(function(){
					++loaded;
					if(loaded == cnt_images){
						$loading.hide();
						$bttn_next.show();
						$bttn_prev.show();
						$mybook.show().booklet({
							name:               null,                            // name of the booklet to display in the document title bar
							width:              690,                             // container width
							height:             450,                             // container height
							speed:              600,                             // speed of the transition between pages
							direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
							startingPage:       0,                               // index of the first page to be displayed
							easing:             'easeInOutQuad',                 // easing method for complete transition
							easeIn:             'easeInQuad',                    // easing method for first half of transition
							easeOut:            'easeOutQuad',                   // easing method for second half of transition
	
							closed:             false,                           // start with the book "closed", will add empty pages to beginning and end of book
							closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
							closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
							closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
							closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
							covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)
	
							pagePadding:        10,                              // padding for each page wrapper
							pageNumbers:        false,                            // display page numbers on each page
	
							hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
							overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
							tabs:               false,                           // adds tabs along the top of the pages
							tabWidth:           60,                              // set the width of the tabs
							tabHeight:          20,                              // set the height of the tabs
							arrows:             true,                           // adds arrows overlayed over the book edges
							cursor:             'pointer',                       // cursor css setting for side bar areas
	
							hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
							keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
							next:               $bttn_next,          			// selector for element to use as click trigger for next page
							prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page
	
							menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
							pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
							chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'
	
							shadows:            true,                            // display shadows on page animations
							shadowTopFwdWidth:  166,                             // shadow width for top forward anim
							shadowTopBackWidth: 166,                             // shadow width for top back anim
							shadowBtmWidth:     50,                              // shadow width for bottom shadow
	
							before:             function(){},                    // callback invoked before each page turn animation
							after:              function(){}                     // callback invoked after each page turn animation
						});
						//Cufon.refresh();
					}
				}).attr('src',source);
			});
		}
	},'json');
}
function myloaderon(text)
{
	if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
	jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo asset_url();?>images/loading.gif" alt="Loading..."><div>'+text+'</div></div><div class="bg"></div></div>');
	}

	jQuery('#resultLoading').css({
		'width':'100%',
		'height':'100%',
		'position':'fixed',
		'z-index':'10000000',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto'
	});

	jQuery('#resultLoading .bg').css({
		'background':'#ffffff',
		'opacity':'0.4',
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'top':'0'
	});

	jQuery('#resultLoading>div:first').css({
		'width': '250px',
		'height':'75px',
		'text-align': 'center',
		'position': 'fixed',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto',
		'font-size':'16px',
		'z-index':'10',
		'color':'#ffffff'

	});

    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}
function myloaderoff()
{
    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}
function viewNextCatalogueBook(id) {
	myloaderon('');
	$.get(base_url+"catalogue/business/next/"+id,{},function(data){
		if(data.html == '0') {
			alert("Sorry no catalogues created.");
		} else {
			myloaderoff();
			$("#catalogue_page_content").html(data.html);
			$("#pcatalogue_id").val(data.id);
			$("#vcatalogue_overlay").modal('show');
			var shareIt = '<ul class="share pull-right text-center">'
				 +'<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#24A7DB;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Views<br> <span id="vdiv'+data.id+'">'+data.views+'</span></label></li>'
				 +'<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#32AA2B;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Likes<br> <span id="sdiv'+data.id+'">'+data.likes+'<span></label></li>'
				 +'</ul>'
				 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 245px;width:35px;height:35px;z-index:380;" onclick="chat_with('+data.user_id+')">'
				 +'<a>'
				 +'<img class="hover" src="<?php echo asset_url()?>images/chatwhite.png" alt="view">'
				 +'<span><img alt="View" src="<?php echo asset_url()?>images/chat_button2.png"></span>'
				 +'</a>'
				 +'</div>'
				 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 290px;width:35px;height:35px;z-index:380;">'
				 +'<a href="javascript:likeCatalogue('+data.id+');">'
				 +'<img class="hover" src="<?php echo asset_url()?>images/items_likewhite.png" alt="view">'
				 +'<span><img alt="View" src="<?php echo asset_url()?>images/items_like2.png"></span>'
				 +'</a>'
				 +'</div>'
				 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 335px;width:35px;height:35px;z-index:380;">'
				 +'<a href="javascript:addToMyFavourite('+data.busi_id+',7);">'
				 +'<img class="hover" src="<?php echo asset_url()?>images/addtofav.png" alt="view">'
				 +'<span><img alt="View" src="<?php echo asset_url()?>images/favorite_chery.gif"></span>'
				 +'</a>'
				 +'</div>';
			$("#share_it").html(shareIt);
			var $mybook 		= $('#mybook');
			var $bttn_next		= $('#next_page_button');
			var $bttn_prev		= $('#prev_page_button');
			var $loading		= $('#loading');
			var $mybook_images	= $mybook.find('img');
			var cnt_images		= $mybook_images.length;
			var loaded			= 0;
			//preload all the images in the book,
			//and then call the booklet plugin
			$mybook_images.each(function(){
				var $img 	= $(this);
				var source	= $img.attr('src');
				$('<img/>').load(function(){
					++loaded;
					if(loaded == cnt_images){
						$loading.hide();
						$bttn_next.show();
						$bttn_prev.show();
						$mybook.show().booklet({
							name:               null,                            // name of the booklet to display in the document title bar
							width:              690,                             // container width
							height:             450,                             // container height
							speed:              600,                             // speed of the transition between pages
							direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
							startingPage:       0,                               // index of the first page to be displayed
							easing:             'easeInOutQuad',                 // easing method for complete transition
							easeIn:             'easeInQuad',                    // easing method for first half of transition
							easeOut:            'easeOutQuad',                   // easing method for second half of transition
	
							closed:             false,                           // start with the book "closed", will add empty pages to beginning and end of book
							closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
							closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
							closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
							closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
							covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)
	
							pagePadding:        10,                              // padding for each page wrapper
							pageNumbers:        false,                            // display page numbers on each page
	
							hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
							overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
							tabs:               false,                           // adds tabs along the top of the pages
							tabWidth:           60,                              // set the width of the tabs
							tabHeight:          20,                              // set the height of the tabs
							arrows:             true,                           // adds arrows overlayed over the book edges
							cursor:             'pointer',                       // cursor css setting for side bar areas
	
							hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
							keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
							next:               $bttn_next,          			// selector for element to use as click trigger for next page
							prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page
	
							menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
							pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
							chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'
	
							shadows:            true,                            // display shadows on page animations
							shadowTopFwdWidth:  166,                             // shadow width for top forward anim
							shadowTopBackWidth: 166,                             // shadow width for top back anim
							shadowBtmWidth:     50,                              // shadow width for bottom shadow
	
							before:             function(){},                    // callback invoked before each page turn animation
							after:              function(){}                     // callback invoked after each page turn animation
						});
						//Cufon.refresh();
					}
				}).attr('src',source);
			});
		}
	},'json');
}

</script>