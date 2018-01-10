<?php 
	if (count ( $myposts ) > 0 && $myposts [0] ['id'] != '') {
	foreach ( $myposts as $key=>$mypost ) {
?>
	<div class="boxsize row" style="margin-top:21px;margin-right:19px;" onclick="ShowObject('Layer20', 0);ShowObject('Layer101', 0);ShowObjectWithEffect('delLayer18_<?php echo $key;?>', 1, 'slideright', 500, 'swing');ShowObject('Layer71', 0);return false;">
		<div class="col-md-2 col-sm-2 text-center">
			<br><br><br><br><br>
			<input type="checkbox" style="display:none;"><br><br>
			<button type="button" id="Button4" class="m2" onclick="deletePost(<?php echo $mypost['postid'];?>);">Delete</button>
		</div>
		<div class="col-md-6 col-sm-6" style="padding-left:0px;">
			<p class="font6" style="font-size:14px;"><?php echo $mypost['company_name'];?> </p>
			<p class="font7">Presented by &nbsp;&nbsp;<span class="style5 font8"><?php echo $mypost['prefix'].' '.$mypost['username'];?> </span></p>
			<span class="s1" style="font-size:15px;"><strong><?php echo $mypost['title'];?></strong></span><br>
			<span class="s2"><?php echo substr($mypost['postdesc'],0,290);?> <?php if(strlen($mypost['postdesc']) > 290){?>...<?php }?></span> 
			<br><br>
			<span class="s3">USD</span> <span class="s4"><?php echo $mypost['postprice'];?>.00&nbsp;&nbsp;&nbsp; </span>
			<span class="s5 pull-right" style="padding-top:12px;">Min. Order: <?php echo $mypost['postqty'];?>&nbsp;&nbsp;&nbsp; </span>
			<?php 
				$tb = $mypost['postviews'] + $mypost['likes']+ $mypost['comment'];
				if($tb == 0) {
					$vb = 0;
					$lb = 0;
					$cb = 0;
				} else { 
					$vb = round($mypost['postviews']/$tb*3);
					$lb = round($mypost['likes']/$tb*3);
					$cb = round($mypost['comment']/$tb*3);
				}
			?>
			<hr style="background-color:#fff;height:1px;margin-bottom:10px;border-top: 1px solid #fff;">
			<span class="font11" style="border-top: <?php echo $vb;?>px solid #00c9d0;">Views </span> <span class="font11"><?php echo $mypost['postviews'];?></span>
			<a href="#" class="style5 font11 plbtn" data-id="<?php echo $mypost['postid'];?>" style="border-top: <?php echo $lb;?>px solid #00c9d0;">Likes</a> 
			<span class="font11" style="border-top: 0px solid #00c9d0;"><?php echo $mypost['likes'];?></span>
			<a href="#" class="style5 font11 commbtn" data-id="<?php echo $mypost['postid'];?>" style="border-top: <?php echo $cb;?>px solid #00c9d0;">Comments</a> 
			<span class="font11" style="border-top: 0px solid #00c9d0;"><?php echo $mypost['comment'];?></span>

		</div>
		<div class="col-md-4 col-sm-4">
			<div class="col-sm-6" style="padding:0px;">
				<div class="post-img-section" <?php if(!empty($mypost['image1'])) { ?>style="background-image:url('<?php echo asset_url(); ?><?php echo $mypost['image1'];?>');background-size:cover;"<?php } ?>>
					<?php if(!empty($mypost['image1'])) { ?>
					<!-- img src="<?php echo asset_url(); ?><?php echo $mypost['image1'];?>" id="" alt="" class="postimg"-->
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-6" style="padding:0px;">
				<div class="post-img-section" <?php if(!empty($mypost['image2'])) { ?>style="background-image:url('<?php echo asset_url(); ?><?php echo $mypost['image2'];?>');background-size:cover;"<?php } ?>>
					<?php if(!empty($mypost['image2'])) { ?>
					<!-- img src="<?php echo asset_url(); ?><?php echo $mypost['image2'];?>" id="" alt="" class="postimg"-->
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-6" style="padding:0px;">
				<div class="post-img-section" <?php if(!empty($mypost['image3'])) { ?>style="background-image:url('<?php echo asset_url(); ?><?php echo $mypost['image3'];?>');background-size:cover;"<?php } ?>>
					<?php if(!empty($mypost['image3'])) { ?>
					<!-- img src="<?php echo asset_url(); ?><?php echo $mypost['image3'];?>" id="" alt="" class="postimg" -->
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-6" style="padding:0px;">
				<div class="post-img-section" <?php if(!empty($mypost['image4'])) { ?>style="background-image:url('<?php echo asset_url(); ?><?php echo $mypost['image4'];?>');background-size:cover;"<?php } ?>>
					<?php if(!empty($mypost['image4'])) { ?>
					<!-- img src="<?php echo asset_url(); ?><?php echo $mypost['image4'];?>" id="" alt="" class="postimg"-->
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div id="wb_Text227" style="text-align:center;height:10px;z-index:200;padding:5px;">
		<span style="color:#303030;font-family:Arial;font-size:11px;text-align:center;"><?php if(date('Y-m-d',strtotime($mypost['created_date'])) == date('Y-m-d')){ ?>Today<?php } else { echo date('d M Y',strtotime($mypost['created_date'])); }?>&nbsp; | <?php echo date('H:i',strtotime($mypost['created_date']));?></span>
	</div>
<?php } }  else { ?>
	<div style="height:637px;">
		<div id="wb_Text25" style="position:absolute;left:311px;top:233px;width:351px;height:32px;text-align:center;z-index:570;">
			<span style="color:#000000;font-family:Arial;font-size:13px;">To add your first post, close this tab and click on "Add a post" button..</span>
		</div>
		<div id="wb_Text53" style="position:absolute;left:314px;top:204px;width:336px;height:29px;text-align:center;z-index:571;">
			<span style="color:#303030;font-family:Impact;font-size:24px;">No Posts Yet</span>
		</div>
	</div>
<?php }  ?>
<script>
$(document).ready(function(){
	$(".commbtn").click(function(event){
	    event.stopImmediatePropagation();
	    var id = $(this).attr("data-id");
	    $.post(base_url+"community/post/viewcomment", {id : id}, function(data){
	       $('#view_post_comment').html(data);
	       ShowObject('Layer20', 0);
	       ShowObjectWithEffect('Layer101', 1, 'slideright', 500);
	       ShowObject('Layer71', 0);
	    },'html');
	});
	$(".plbtn").click(function(event){
	    event.stopImmediatePropagation();
	    var id = $(this).attr("data-id");
	    $.post(base_url+"community/post/viewlike", {id : id}, function(data){
	       $('#view_post_like').html(data);
	       ShowObject('Layer101', 0);
	       ShowObjectWithEffect('Layer20', 1, 'slideright', 500);
	       ShowObject('Layer71', 0);
	    },'html');
	});
});
</script>