<?php 
foreach($videodetail as $videoBox) {?>
<div id="Layer18" class="class3">
	<div id="wb_Text63" class="class4">
		<span class="class-font1"><strong><?php echo $videoBox['company_country'];?> | <?php echo $videoBox['company_province'];?></strong></span>
	</div>
	<div id="wb_Text64" class="class5">&nbsp;</div>
	<div id="wb_Image41" class="class6">
		<img src="<?php echo asset_url(); ?>images/Germany.png" id="Image41" alt="">
	</div>
	<div id="wb_MediaPlayer8" class="class7">
		<video src="<?php echo asset_url().''.$videoBox['vedio_file']; ?>" id="MediaPlayer8" controls="controls">
		</video>
	</div>
</div>
<div id="wb_Text65" class="class8">
	<span class="class9"><strong><?php echo $videoBox['product_name']; ?><br></strong></span>
</div>
<div id="Layer30" class="class10">
	<div id="wb_Text66" class="class11">
		<span class="class12"><strong>By</strong></span>
	</div>
	<div id="wb_Text67" class="class13">
		<span class="class14"><?php ?>&nbsp;&nbsp; </span>
	</div>
	<div id="wb_Text90" class="class15">
		<span class="class16"><?php echo $videoBox['plan']; ?> </span>
	</div>
	<div id="wb_Text91" class="class17">
		<span class="class18"><?php echo $videoBox['company_name']; ?> </span>
	</div>
	<div id="wb_Text92" class="class19">
		<span class="class20"><?php echo substr($videoBox['description'], '0', '200');?><br>
		</span>
	</div>
	<div id="wb_Image20" class="class21">
		<?php if($videoBox['is_logo_verified'] !=''){?><img src="<?php echo asset_url(); ?>images/ts/trusted.png" id="Image1" > <?php }?>
		
	</div>
	<div id="wb_Image21" class="class22">
		 <?php if($videoBox['gaurantee_period'] !=''){?><img src="<?php echo asset_url(); ?>images/ts/community.png"  id="Image1" > <?php }?>
	</div>
</div>
<div id="wb_Image43" class="class23">
	<a href="#" onclick="ShowObject('Layer_details3', 0);ShowObject('Layer_details', 0);StopAudio('MediaPlayer7');return false;">
		<img src="<?php echo asset_url(); ?>images/close.png" id="Image43" alt="">
	</a>
</div>
<div id="RollOver23" class="class24">
	<a href="video_details.html" target="_blank"> 
		<img class="hover" alt="" title="View details" src="<?php echo asset_url(); ?>images/videoviewroll.png"> 
		<span><img alt="" title="View details" src="<?php echo asset_url(); ?>images/view2.png"></span>
	</a>
</div>
<div id="RollOver24" class="class25">
	<a href="pro_videos.html" target="_blank"> 
		<img class="hover" alt="" title="Find the same product" src="<?php echo asset_url(); ?>images/videosame.png"> 
		<span><img alt="" title="Find the same product" src="<?php echo asset_url(); ?>images/from-same-user.png"></span>
	</a>
</div>
<div id="RollOver25" class="class26">
	<a href="#" target="_blank"> <img class="hover" alt=""
		title="Add to watch later"
		src="<?php echo asset_url(); ?>images/videoaddtofav.png"> <span><img
			alt="" title="Add to watch later"
			src="<?php echo asset_url(); ?>images/addtofav.png"></span>
	</a>
</div>
<div id="RollOver26" class="class27">
	<a
		href="javascript:popupwnd('likes_blogs.html','no','no','no','no','no','no','750','50','380','750')"
		target="_self"> <img class="hover" alt="" title="Add to my cart"
		src="<?php echo asset_url(); ?>images/likeblue.png"> <span><img alt=""
			title="Add to my cart"
			src="<?php echo asset_url(); ?>images/likewhite.png"></span>
	</a>
</div>
<div id="wb_Text93" class="class28">
	<span class="class29">Likes</span>
</div>
<div id="wb_Image44" class="class30">
	<img src="<?php echo asset_url(); ?>images/items_like0.png"
		id="Image44" alt="" class="img25">
</div>
<div id="wb_Text94" class="class31">
	<span class="class32"><?php echo $videoBox['likes']; ?></span>
</div>
<?php }?>