<style>
a.service-pills {
	background-color:#f2f2f2;
	color:#555;
	text-align:center;
}
a.service-pills:hover {
	background-color:#1d83e6 !important;
	color:#212121;
}
a.service-pills-hover {
	background-color:#1d83e6;
	color:#fff;
}
a.service-pills-hover:hover {
	background-color:#1d83e6;
	color:#fff;
}
.nav-pills > li > a.service-pills,.nav-pills > li > a.service-pills-hover {
	border-radius:0px;
}
.nav-pills > li.active > a.service-pills, .nav-pills > li.active > a.service-pills:hover, .nav-pills > li.active > a.service-pills:focus {
    color: #212121;
    background-color: #1d83e6 !important;
    opacity:1;
}
.firstmain {
	width:100%;
	margin-left:0px !important;
	margin-bottom:3px;
}
#Layer27 {
    background-color: #FFFFFF;
    border: 2px #FFFFFF solid;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 3px 2px 5px #000000;
    -webkit-box-shadow: 3px 2px 5px #000000;
    box-shadow: 3px 2px 5px #000000;
}
</style>

<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
#Image6
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Image7
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Image8
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Image9
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Carousel1
{
   position: absolute;
}
#wb_Carousel1
{
   background-color: transparent;
}
#Carousel1 .frame
{
   width: 455px;
   display: inline-block;
   float: left;
   height: 20px;
}
#wb_Carousel1 .pagination
{
   bottom: 0;
   left: 0;
   position: absolute;
   text-align: center;
   vertical-align: middle;
   width: 100%;
   z-index: 999;
}
#wb_Carousel1 .pagination img
{
   border-style: none;
   padding: 5px 5px 5px 5px;
}
#wb_Image6
{
   position: absolute;
   left: 0px;
   top: 17px;
   width: 455px;
   height: 320px;
   z-index: 55;
}
#wb_Carousel1
{
   position: absolute;
   width: 455px;
   height: 370px;
   z-index: 60;
   overflow: hidden;
   left:5px;
}
#wb_Image7
{
   position: absolute;
   left: 455px;
   top: 5px;
   width: 455px;
   height: 320px;
   z-index: 56;
}
#wb_Image8
{
   position: absolute;
   left: 910px;
   top: 5px;
   width: 455px;
   height: 320px;
   z-index: 57;
}
#wb_Image9
{
   position: absolute;
   left: 1365px;
   top: 5px;
   width: 455px;
   height: 320px;
   z-index: 58;
}
#wb_Shape7
{
   position: absolute;
   left: 5px;
   width: 72px;
   height: 60px;
   z-index: 61;
}
#Shape7
{
   width: 72px;
   height: 60px;
   border-width:0;
}
</style>

<div class="row">
	<div class="col-sm-4" style="padding-top:80px;">
		<ul class="nav nav-pills">
			<li class="firstmain">
				<a class="service-pills-hover" href="#"><img src="<?php echo asset_url();?>images/MENUICON.png" id="Image27" alt="" style="width:17px;"> <span style="color:#FFFFFF;font-family:Georgia;font-size:13px;">SERVICES MENU</span></a>
			</li>
		<?php 
			foreach($services as $key=>$service) { 
		?>
		   	<li class="firstmain <?php if($key == 0) { ?>active<?php } ?>">
		   		<a data-toggle="pill" href="#service-<?php echo $service['id'];?>" target="_self" class="service-pills"><?php echo $service['name'];?></a>
		   	</li>
		<?php } ?>
		</ul>
		
	</div>
	<div class="col-sm-8">
		<div class="tab-content" style="height: 566px;">
			<?php foreach($services as $key=>$service) { ?>
			<div id="service-<?php echo $service['id'];?>" class="tab-pane fade in <?php if($key > 0) {?>active<?php }?>">
				<div id="Layer27" style="position:absolute;overflow: scroll; text-align: left; width: 732px; height: 566px; z-index: 1354;">
					<div id="wb_Text45" style="width:351px;height:22px;z-index:1343;text-align:left;padding:15px 33px;">
						<span style="background-color:#FFFFFF;color:#1E90FF;font-family:Arial;font-size:19px;"><strong><?php echo $service['name'];?></strong></span>
					</div>

















			<div style="height: 250px;width: 470px;left:125px;top:45px">
						<div id="wb_Carousel1">
							<div id="Carousel1">
								<?php if(!empty($service['image1'])) { ?>
								<div class="frame">
									<div id="wb_Image6">
									<img src="<?php echo asset_url();?><?php echo $service['image1'];?>" id="Image6" alt=""></div>
									</div>
									<?php } ?>
								<?php if(!empty($service['image2'])) { ?>
								<div class="frame">
									<div id="wb_Image7">
									<img src="<?php echo asset_url();?><?php echo $service['image2'];?>" id="Image7" alt=""></div>
									</div>
									<?php } ?>
								<?php if(!empty($service['image3'])) { ?>
								<div class="frame">
									<div id="wb_Image8">
									<img src="<?php echo asset_url();?><?php echo $service['image3'];?>" id="Image8" alt=""></div>
									</div>
									<?php } ?>
								<?php if(!empty($service['image4'])) { ?>
								<div class="frame">
									<div id="wb_Image9">
									<img src="<?php echo asset_url();?><?php echo $service['image4'];?>" id="Image9" alt=""></div>
								</div>
								<?php } ?>
							</div>
						</div>
						
					    <br>
					</div>





























					<div id="wb_Text44" style="position:absolute;top:400px;text-align:left;padding:0px 33px;font-size: 16px">
						<span style="color:#2D2D2D;"><?php echo $service['description'];?> </span>
					</div>
				</div>		
			</div>
			<script>
			$("a[data-rel='prettyPhoto_PhotoGallery10<?php echo $service['id'];?>[PhotoGallery10<?php echo $service['id'];?>]']").attr('rel', 'prettyPhoto_PhotoGallery10<?php echo $service['id'];?>[PhotoGallery10<?php echo $service['id'];?>]');
			$("a[rel^='prettyPhoto_PhotoGallery10<?php echo $service['id'];?>']").prettyPhoto({theme:'facebook',social_tools:false});
			</script>
			<?php } ?>
		</div>
	</div>
</div>
					<script>
					$(document).ready(function(){
					    //$("#myCarouselAbout").carousel();

						var Carousel1Opts =
					   	{
					      	delay: 3000,
					      	duration: 500,
					      	easing: 'swing',
					      	mode: 'forward',
					      	direction: '',
					      	scalemode: 2,
					      	pagination: true,
					      	pagination_img_default: '<?php echo asset_url();?>images/page_default.png',
					      	pagination_img_active: '<?php echo asset_url();?>images/page_active.png',
					      	start: 0
					   	};
					   	$("#Carousel1").carousel(Carousel1Opts);
					});
					</script>
