<div class="col-md-3 col-sm-3 col-xs-3" style="padding-top:20px;padding-left:25px;">
	<img src="<?php echo asset_url(); ?>images/img0041.png" id="Image59" alt="" class="img191">
</div>
<form id="addPostBuyerContent" name="addPostBuyerContent" action="" method="post" enctype="multipart/form-data">
	<div class="col-md-9 col-sm-9 col-xs-9">
		<input type="hidden" name="usertype" value="<?php echo $tscategory_id;?>"> 
		<a href="#" onclick="ShowObjectWithEffect('Layer744', 0, 'clipvertical', 500);ShowObject('Layer75', 0);closeBNewPost();return false;" class="pull-right"> 
			<img src="<?php echo asset_url(); ?>images/close.png" id="Image2" alt="" class="img35">
		</a>
		<div id="bpostdatacontent">
			<h3 class="leftbox1">
				<b>Boost It Now..</b>
			</h3>
			<p class="leftbox2" style="margin-bottom: 15px;">
				Buyers Post Covers All Buyers Requirements, Such As Getting A Quote, Sourcing A Potential Seller For A Particular Product, Looking For A Product  Agency, Manufacturing A New Item And Much More..
			</p>

			<div class="row" style="margin:0px;">
				<div>
					<div class="row">
						<label class="label-text col-sm-3">Post Title</label>
						<div class="form-group col-sm-9">
							<div>
								<input type="text" id="post-title" class="form-control post-input-control" placeholder="Buying Post Title" name="btitle" value="" maxlength="45" style="width:332px;margin-left: 0px;" />
							</div>
							<div class="messageContainer"></div>
						</div>
					</div>
					<!-- div class="row">
						<label class="label-text col-sm-3">Upload Product Images</label>
						<div class="col-sm-5">
							<input type="file" name="bpostphoto" id="bpostphoto" multiple onchange="checkMyFiles(this);"/>
						</div>
						<label class="label-text col-sm-4" style="padding:0px;color:#696969;font-family:Arial;font-size:9.3px;">4 jpg images, Each image with Max. size 75KB</label>
					</div-->
					<br>
					<div class="row">
						<label class="label-text col-sm-3">Upload Product Images</label>
						<label class="label-text col-sm-9" style="color:#696969;font-family:Arial;font-size:9.3px;">4 jpg images, Each image with Max. size 75KB</label>
						<label class="label-text col-sm-3">&nbsp;</label>
						<div class="col-sm-offset-3 col-sm-9">
							<div>
								<input type="file" name="bpostphoto[]" id="bpostphoto1" class="post-background" onchange="setBackgroundSize('bpostphoto1',this,75);" style="display:inline;"/>
								<input type="file" name="bpostphoto[]" id="bpostphoto2" class="post-background" onchange="setBackgroundSize('bpostphoto2',this,75);" style="display:inline;"/>
								<input type="file" name="bpostphoto[]" id="bpostphoto3" class="post-background" onchange="setBackgroundSize('bpostphoto3',this,75);" style="display:inline;"/>
								<input type="file" name="bpostphoto[]" id="bpostphoto4" class="post-background" onchange="setBackgroundSize('bpostphoto4',this,75);" style="display:inline;"/>
							</div>
							<div class="messageContainer"></div>
						</div>
					</div>
					<div class="row">
						<label class="label-text col-sm-3">Description & Spec.:</label>
						<div class="col-sm-9">
							<div>
								<textarea rows="4" cols="30" name="bdescription" maxlength="1500" style="width:334px;"></textarea>
							</div>
							<div class="messageContainer"></div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-3">&nbsp;</div>
						<div class="col-sm-9">
							<div class="inline">
								<input type="checkbox" name="bprofilecheck" value="1" style="margin-left:0px;">
								<p class="leftbox2">Keep My Profile Info. Locked For Other Buyers..</p>
							</div>
							<div class="inline">
								<button id="Button4">RESET</button>
								<button id="Button4" type="submit">SEND</button>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
		<div id="bloading-image" class="post-loading-layer" style="width: 705px; height: 410px;">
			<a href="#" onclick="ShowObjectWithEffect('Layer744', 0, 'clipvertical', 500);ShowObject('Layer75', 0);closeBNewPost();return false;" class="pull-right"> 
				<img src="<?php echo asset_url(); ?>images/close.png" id="Image2" alt="" class="img35">
			</a>
			<div class="loading-image">
				<img src="<?php echo asset_url();?>images/loading.gif" alt="" style="color:#FAEBD7;vertical-align:center;text-align:center;"><br><br>
				<span>Please Wait ...</span><br>
				<span>Creating and uploading your post</span>
			</div>
		</div>
		<div id="bpost-success-result" class="post-success-layer" style="width: 705px; height: 410px;">
			<a href="#" onclick="ShowObjectWithEffect('Layer744', 0, 'clipvertical', 500);ShowObject('Layer75', 0);closeBNewPostResult();return false;" class="pull-right"> 
				<img src="<?php echo asset_url(); ?>images/close.png" id="Image2" alt="" class="img35">
			</a>
			<div class="loading-result-text">
				<span class="post-gd">GOOD LUCK</span><br><br>
				<span>Your Post Has Been Sent Successfully To Global Sellers..</span><br>
				<span>Sellers Requests Will be Sent Directly To Your Inquiries Box..</span>
				<br><br>
				<span class="post-gd-lower">Also</span><br>
				<span>Click Anytime On <span style="color:#1E90FF;">Global Offers Posts/View My Post</span></span><br>
				<span>To View And Manage Your Posts...</span>
			</div>
		</div>
	</div>
</form>