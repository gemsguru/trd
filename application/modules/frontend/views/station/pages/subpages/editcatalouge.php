	<form name="frmeditcatalouge" method="post" action="" enctype="multipart/form-data" id="frmeditcatalouge">
		<div class="panel-heading custom-panel-heading">
			<a href="javascript:openEditCatalougeForm();" class="btn btn-default btn-custom" id="personal_edit_btn">
			<img src="<?php echo asset_url();?>images/img1595.png" style="padding-right: 4px;height: 78%;" alt="">Edit</a>
	  		<a href="javascript:deleteCatalogues();" class="btn btn-default btn-custom" id="personal_info_btn">
	  		<img src="<?php echo asset_url();?>images/img1594.png" style="padding-right: 4px;height: 78%;" alt="">Delete</a>
	  		<span class="pull-right-close"><a href="javascript:ShowObjectWithEffect('Layer124', 0, 'dropup', 500, 'easeInBounce');ShowObjectWithEffect('Layer1', 1, 'dropdown', 500, 'easeInBounce');" class="btn-custom-close">X</a></span>
	  	</div>
  	<div class="panel-body panel-body-custom" id="" style="padding-top: 22px;padding-left: 45px;">		
		  	<div id="editcatalouge_div">
		  		<div class="row ">
			  		<div class="col-md-12">
			  			<span style="color:#2D2D2D;font-family:Georgia;font-size:21px;">Manage Virtual Catalouge</span>
			  		</div>
			  	</div><br><br>	
		  		<div class="row">
			  		<div class="col-md-8">
			  			<span style="color:#2D2D2D;font-family:Arial;font-size:16px;">You have total:</span>
			  			<span style="color:#F05539;font-family:Arial;font-size:21px;"><?php echo count($catalogues);?> </span>
			  			<span style="color:#F05539;font-family:Arial;font-size:12px;">out of </span>
			  			<span style="color:#F05539;font-family:Arial;font-size:21px;"><?php echo $max_vc;?></span>
			  			<span style="color:#2D2D2D;font-family:Arial;font-size:16px;">V-Cat</span>
			  		</div>
			  	</div><br><br>
		  		<div class="row">
			  		<div class="col-md-8">
			  			<span style="color:#2D2D2D;font-family:Arial;font-size:11px;">Select V-Cataoulge to edit</span>
			  		</div>
			  	</div><br><br>
		  		<div class="row"  style="padding-bottom: 200px;">
		  			<?php foreach ($catalogues as $catalogue) { ?>
			  		<div class="col-md-6">
			  			<div class="col-sm-12">
				  			<div class="col-sm-2" style="padding-top: 25px;">
				  				<input type="checkbox" id="catalogue_chk_id" name="catalogue_chk_id" value="<?php echo $catalogue['id'];?>" />
				  			</div>
				  			<div style="width:35px;height:34px;z-index:1;position: relative;top: 251px;left: 73px;">
									<img src="<?php echo asset_url();?>images/img0001.gif" alt="" style="width:10px;height:34px;">
								</div>
				  			<div class="col-sm-5" style="width: 220px;height: 328px;padding-top: 105px;background-image:url('<?php echo asset_url();?>images/vCAT2.png')" >
				  				<br/>
				  				<div style="padding-left: 23px;z-index: 4;">
				  					<img src="<?php echo asset_url();?><?php echo $catalogue['catalogue_cover'];?>"  style="width:160px;height:155px;border-radius:50%;border:1.5px solid #F05539">
				  				</div>
				  				<!--<span style="background-color:#F05539;color:#FFFFFF;font-family:Georgia;font-size:13px;"><strong><?php echo $catalogue['catalogue_title'];?> </strong></span>-->
				  				<!--<span style="color:#FFFFFF;font-family:Georgia;font-size:13px;"><strong>BABY NEW COLLECTION </strong></span>-->
				  				
				  				<div id="Layer232" style="text-align:left;width:190px;height:30px;z-index:4;background-color: #1E90FF;position: relative;left:-18px;top:-5px;">
									<div id="wb_Text2" style="width:192px;height:30px;text-align:center;z-index:0;padding-top:5px;">
										<span style="color:#FFFFFF;font-family:Georgia;font-size:13px;"><strong><?php echo $catalogue['catalogue_title'];?></strong></span>
									</div>
								</div>
								


				  			</div>
				  			<div class="col-sm-4"  style="padding-top: 25px;">
				  				<span style="color:#2D2D2D;font-family:Arial;font-size:11px;">Created on: <?php echo date('M Y',strtotime($catalogue['created_date']));?></span><br>
				  				<span style="color:#2D2D2D;font-family:Arial;font-size:11px;">Pages: <?php echo $catalogue['pages'];?></span><br>
				  				<span style="color:#2D2D2D;font-family:Arial;font-size:11px;">Viewed: <?php echo $catalogue['views'];?> times</span><br>
				  				<span style="color:#2D2D2D;font-family:Arial;font-size:11px;">Likes: <?php echo $catalogue['likes'];?></span><br><br>
				  				<span style="color:#2D2D2D;font-family:Arial;font-size:11px;"><strong><a href="javascript:viewCatalogueBook(<?php echo $catalogue['id'];?>);" class="style23">View</a></strong></span>
				  			</div>
					  	</div>		
			  		</div>
			  		<?php } ?>
		   		</div>
		   </div>
   		</div>
 	</form>
  <div id="profile_pic_modal" class="modal fade">
	<div class="modal-dialog" style="">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Add Profile Picture</h3>
			</div>
			<div class="modal-body" >
				<form id="cropimage" method="post" enctype="multipart/form-data" action="">
						<span><b>Upload Image:</b> <input type="file" name="profile-pic" id="profile-pic"  accept=".png,.jpg,.jpeg.gif" class="form-control" style="width:200px;display:inline-block;"/></span> <br><br>
						
						<input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
						<input type="hidden" name="x1" id="x1" value="" />
				        <input type="hidden" name="y1" id="y1" value="" />
				        <input type="hidden" name="x2" id="x2" value="" /> 
				        <input type="hidden" name="y2" id="y2" value="" />
				        <input type="hidden" name="width" id="width" value="200" />
				        <input type="hidden" name="height" id="height" value="200" />
				      	<!--  <input type="hidden" name="fullpath" id="fullpath" value="<?php //echo asset_url();?>" /> -->
						<input type="hidden" name="image_name" value="" id="image_name" />
						<div id="parent" style="position:relative;">
							<span id="thumbnail" style="display: inline-block;position:relative;">
								<img id="photo" src="#" alt="" title="" style="max-width:100%;display:none" />
							</span>
						</div>
						<div id="thumbs" style="padding:5px; width:600px"></div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="save_crop" class="btn btn-primary">Crop & Save</button>
			</div>
		</div>
	</div>
</div>
 
