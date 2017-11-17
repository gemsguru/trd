<style>
	.form-group {
		margin-bottom:0px;
	}
	ul.dropdown-menu {
		background-color:#EEEEEE;
	}
	ul.dropdown-menu li a {
		text-decoration:none;
	}
	ul.dropdown-menu li a:hover {
		background-color:#ccc;
	}
	.text-danger-custom {
		color:#F05539 !important;
		padding-top: 7px;
    	padding-right: 5px;
	}
	.form-text-label {
		color: #3C3C3C; font-family: Georgia; font-size: 12px;padding-top:5px;
	}
	.help-text-sm {
		color: #666666; font-family: Arial; font-size: 9.3px;
	}
	.ds-product-input-2x {
		width: 332px;
	    height: 24px;
	    line-height: 24px;
	    z-index: 43;
	    border: 1px #D3D3D3 solid;
	    background-color: #FFFFFF;
	    color: #000000;
	    font-family: Arial;
	    font-weight: normal;
	    font-size: 13px;
	    padding: 2px 0px 0px 5px;
	    text-align: left;
	    vertical-align: middle;
	}
	.ds-product-input-0x {
		width: 115px;
	    height: 24px;
	    line-height: 24px;
	    z-index: 43;
	    border: 1px #D3D3D3 solid;
	    background-color: #FFFFFF;
	    color: #000000;
	    font-family: Arial;
	    font-weight: normal;
	    font-size: 13px;
	    padding: 2px 0px 0px 5px;
	    text-align: left;
	    vertical-align: middle;
	}
	.ds-product-input-0-5x {
		width: 70px;
	    height: 24px;
	    line-height: 24px;
	    z-index: 43;
	    border: 1px #D3D3D3 solid;
	    background-color: #FFFFFF;
	    color: #000000;
	    font-family: Arial;
	    font-weight: normal;
	    font-size: 13px;
	    padding: 2px 0px 0px 5px;
	    text-align: left;
	    vertical-align: middle;
	}
	.right-align-col {
		padding-right: 0px;
	    padding-left: 0px;
	    text-align: right;
    }
    .form-control-custom {
    	height:33px;
    	border: 1px #DCDCDC solid;
	    background-color: #FFFFFF;
	    color: #000000;
	    font-family: Arial;
	    font-weight: normal;
	    font-size: 13px;
    }
    .custom-color-picker {
    	width: 30px;
	    height: 30px;
	    border: 1px solid #555;
	    border-radius: 50%;
	    cursor:pointer;
    }
    .red-color-bg {
    	background-color: #FF0000;
    }
    .green-color-bg {
    	background-color: #00FF00;
    }
    .blue-color-bg {
    	background-color: #0000FF;
    }
    .white-color-bg {
    	background-color: #FFFFFF;
    }
    .black-color-bg {
    	background-color: #000000;
    }
    .custom-col-sm-2 {
    	padding:7px;
    }
    .custom-color-checkbox {
    	margin-top:10px !important;;
    }
    .color-form-text-label {
    	padding-top:13px;
    }
    .colorpicker {
    	z-index:12762 !important;
    }
    .custom-textarea {
    	width: 394px; height: 127px;
    	border: 1px #A9A9A9 solid;
	    background-color: #FFFFFF;
	    color: #000000;
	    font-family: Arial;
	    font-weight: normal;
	    font-size: 13px;
	    padding: 5px 5px 0px 5px;
	    text-align: left;
	    resize: none;
    }
    li.open a.mp-option-row .dropdn-arrow {
		width:5px;
		height:10px;
		margin-top: 5px;
		background-image:url('<?php echo asset_url();?>images/img0094.png');
		background-size:cover;
	}
	a.mp-option-row .dropdn-arrow {
		width:10px;
		height:5px;
		margin-top: 7px;
		background-image:url('<?php echo asset_url();?>images/img1765.png');
		background-size:cover;
	}
	a.mp-option-row:hover .dropdn-arrow {
		width:5px;
		height:10px;
		margin-top: 5px;
		background-image:url('<?php echo asset_url();?>images/img0094.png');
		background-size:cover;
	}
</style>
<link href="<?php echo asset_url();?>css/pages/colorpicker.css?1.1" rel="stylesheet">
<div class="personal_info_div" id="desk_site_step_1" style="padding:0px 10px;height:620px;">
	<div class="row" style="margin:0px;">
		<div class="col-sm-7">
			<div class="row" style="margin-top:15px;">
				<div class="col-sm-1 text-right text-danger-custom"></div>
		  		<div class="col-sm-11" id="" style="text-align:left;">
					<div style="margin-bottom:10px;"><span style="color:#2D2D2D;font-family:Georgia;font-size:21px;">Add A Product (Item)</span></div>
					<div style="margin-bottom:10px;">
						<span class="desk-site-text-sm">
							Add unlimited No. of products to Main or Sub Products Directories you have created.
						</span>
					</div>
				</div>
			</div>
		</div>
		<form name="spitem_frm" id="spitem_frm" action="" enctype="multipart/form-data" method="post">
			<div class="col-sm-7">
				<div class="row" style="margin-top:30px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-5">
								<div class="">
								  	<button class="btn btn-default btn-main-cat dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" id="ds_main_pro_label" data-animations="">
								   		Select Main / Sub Product <span class="caret" style="color:#d9574d;"></span>
								  	</button>
								  	<ul class="dropdown-menu" style="margin-left:15px;">
								  		<?php foreach ($mproducts as $mpro) { ?>
								    	<li class="dropdown">
								    		<?php if(count($mpro['subproducts']) > 0) { ?>
								      		<a href="#" class="mp-option-row"><?php echo $mpro['name'];?> <span class="pull-right dropdn-arrow"></a>
								      		<?php } else { ?>
								      		<a href="javascript:selectSNewproduct(0,'<?php echo $mpro['id'];?>',``,`<?php echo $mpro['name'];?>`);" class="mp-option-row"><?php echo $mpro['name'];?></a>
								      		<?php } ?>
								      		<?php if(count($mpro['subproducts']) > 0) { ?>
								      		<ul class="dropdown-menu">
								      			<?php foreach ($mpro['subproducts'] as $spro) { ?>
								        		<li><a href="javascript:selectSNewproduct(<?php echo $spro['id'];?>,'<?php echo $mpro['id'];?>',`<?php echo $spro['name'];?>`,`<?php echo $mpro['name'];?>`);"><?php echo $spro['name'];?></a></li>
								        		<?php } ?>
								       		</ul>
								       		<?php } ?>
								    	</li>
								    	<?php } ?>
								  	</ul>
								</div>
								<div class="form-group" >
									<div>
										<input type="hidden" name="sub_product_id" id="sub_product_id" value=""/>
									</div>
									<div class="messageContainer"></div>
								</div>
							</div>
							<div class="col-sm-6">
								<span class="help-text-sm" id="plc_holder">
									To add your products you must select the Main or Sub Product <br>where it listed under 
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Product/Item No.</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<input type="text" name="model_no" class="ds-product-input" placeholder="Model No." autocorrect="on"/>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Product Name</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<input type="text" name="item_name" class="ds-product-input-2x" placeholder="Product Name" autocorrect="on"/>
								</div>
								<div class="messageContainer"></div>
								<br>
								<div class="help-text-sm">Ex. ( High Heal Brown Shoes), ( Back Leather Modern Sofas)...etc</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Price In USD</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="row">
									<div class="col-sm-4">
										<div class="">
											<input type="text" name="unit_price" class="ds-product-input-0x" placeholder="Unit Price" autocorrect="on"/>
										</div>
										<div class="messageContainer"></div>
									</div>
									<div class="col-sm-2 right-align-col">
										<div class="form-text-label" style="text-align:center;">Per</div>
									</div>
									<div class="col-sm-2 right-align-col">
										<div class="">
											<input type="text" name="unit" class="ds-product-input-0-5x" placeholder="Unit" autocorrect="on"/>
										</div>
										<div class="messageContainer"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Min. Quantity</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="row">
									<div class="col-sm-4">
										<div class="">
											<input type="text" name="quantity" class="ds-product-input-0x" placeholder="Qty" autocorrect="on"/>
										</div>
										<div class="messageContainer"></div>
									</div>
									<div class="col-sm-2 right-align-col">
										<div class="form-text-label">Lead Time</div>
									</div>
									<div class="col-sm-4 right-align-col">
										<div class="">
											<input type="text" name="lead_time" class="ds-product-input-0x" placeholder="Production Time" autocorrect="on"/>
										</div>
										<div class="messageContainer"></div>
									</div>
									<div class="col-sm-2 right-align-col" style="text-align:center;"><div class="form-text-label">Days</div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Product Orgin</div>
							</div>
							<div class="form-group col-sm-4">
								<div class="">
									<select name="country_id" id="country_id" class="form-control form-control-custom">
										<option selected="" value="">Select the country</option>
										<?php foreach ($countries as $country) { ?>
										<option value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
										<?php } ?>
									</select>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">&nbsp;</div>
							<div class="col-sm-3">
								<div class="form-text-label">Brand</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<input type="text" name="brand" class="ds-product-input-0x" placeholder="Brand" autocorrect="on"/>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">&nbsp;</div>
							<div class="col-sm-3">
								<div class="form-text-label">Product CBM After Packaging</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<input type="text" name="cbm" class="ds-product-input-0x" placeholder="CBM" autocorrect="on"/><br>
									<span style="color:#666666;font-family:Arial;font-size:9.3px;">In case you not sure, just type (N/A).<br></span>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">&nbsp;</div>
							<div class="col-sm-3">
								<div class="form-text-label color-form-text-label">Available Colors</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="row">
									<div class="col-sm-2 custom-col-sm-2">
										<input type="checkbox" name="colors[]" id="color1" value="ff0000" class="custom-color-checkbox" checked/>
										<div id="color-picker1" class="pull-right custom-color-picker red-color-bg">
										
										</div>
									</div>
									<div class="col-sm-2 custom-col-sm-2">
										<input type="checkbox" name="colors[]" id="color2" value="00ff00" class="custom-color-checkbox" checked/>
										<div id="color-picker2" class="pull-right custom-color-picker green-color-bg">
										
										</div>
									</div>
									<div class="col-sm-2 custom-col-sm-2">
										<input type="checkbox" name="colors[]" id="color3" value="0000ff" class="custom-color-checkbox" checked/>
										<div id="color-picker3" class="pull-right custom-color-picker blue-color-bg">
										
										</div>
									</div>
									<div class="col-sm-2 custom-col-sm-2">
										<input type="checkbox" name="colors[]" id="color4" value="ffffff" class="custom-color-checkbox" checked/>
										<div id="color-picker4" class="pull-right custom-color-picker white-color-bg">
										
										</div>
									</div>
									<div class="col-sm-2 custom-col-sm-2">
										<input type="checkbox" name="colors[]" id="color5" value="000000" class="custom-color-checkbox" checked/>
										<div id="color-picker5" class="pull-right custom-color-picker black-color-bg">
										
										</div>
									</div>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">About this product</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<textarea name="about" id="pabout" rows="8" cols="53" maxlength="2500" class="custom-textarea" placeholder="Type an attractive introduction reflects the advantages of your product"></textarea>
								</div>
								<div class="messageContainer"></div>
								<div style="color:#F05539;font-family:Arial;font-size:12px;"><span id="pabout_count">2500</span> Remains</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Description</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<textarea name="description" id="pdescription" class="custom-textarea" rows="8" cols="53" maxlength="2500" placeholder="Type description such as size, dimensionn,colors ... etc."></textarea>
								</div>
								<div class="messageContainer"></div>
								<div style="color:#F05539;font-family:Arial;font-size:12px;"><span id="pdesc_count">2500</span> Remains</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1 text-right text-danger-custom">*</div>
							<div class="col-sm-3">
								<div class="form-text-label">Technical Specifications</div>
							</div>
							<div class="form-group col-sm-8">
								<div class="">
									<table style="width:407px;" id="tech-spec">
										<tr>
											<td style="width:40%"><input type="text" name="tech_field[]" value="" style="width:100%;height:28px;"/></td>
											<td style="width:60%"><input type="text" name="tech_value[]" value="" style="width:100%;height:28px;"/></td>
										</tr>
										<tr>
											<td><input type="text" name="tech_field[]" value="" style="width:100%;height:28px;"/></td>
											<td><input type="text" name="tech_value[]" value="" style="width:100%;height:28px;"/></td>
										</tr>
									</table>
									<a href="javascript:addMoreSpecs();" class="pull-right style5" style="padding-top:5px;">Add More</a>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
			<div class="col-sm-5" style="padding-left:40px;">
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-text-label"><span class="text-danger-custom">*</span>Add the product main image</div>
								<div class="help-text-sm">Jpg format, Dimensions: 960 * 736 pixel, Resolution: 75 Dpi, with <br>Max. size 160 KB </div>
								<div class="text-danger-custom help-text-sm" style="padding-bottom:5px;">We require a white background for the product main image</div>
							</div> 
							<div class="form-group col-sm-8">
								<div class="">
									<input type="file" name="product_mainimage" id="product_mainimage" class="ds-product-background" onchange="setBackground('product_mainimage',this,960,736,160);"/>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-text-label"><span class="text-danger-custom">*</span>Add 4 more images for the same product</div>
								<div class="help-text-sm" style="padding-bottom:5px;">jpg format, Dimensions: 960 * 736 pixel, Resolution: 75 Dpi, with <br>Max. size 160 KB </div>
							</div> 
							<div class="form-group col-sm-9">
								<div class="col-sm-3" style="padding-right:0px;padding-left:0px;">
									<input type="file" name="sub_image1" id="product_subimage1" class="ds-product-subimg" onchange="setBackground('product_subimage1',this,960,736,160);"/>
								</div>
								<div class="col-sm-3" style="padding-right:0px;padding-left:5px;">
									<input type="file" name="sub_image2" id="product_subimage2" class="ds-product-subimg" onchange="setBackground('product_subimage2',this,960,736,160);"/>
								</div>
								<div class="col-sm-3" style="padding-right:0px;padding-left:10px;">
									<input type="file" name="sub_image3" id="product_subimage3" class="ds-product-subimg" onchange="setBackground('product_subimage3',this,960,736,160);"/>
								</div>
								<div class="col-sm-3" style="padding-right:0px;">
									<input type="file" name="sub_image4" id="product_subimage4" class="ds-product-subimg" onchange="setBackground('product_subimage4',this,960,736,160);"/>
								</div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:30px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-text-label"><span class="text-danger-custom">*</span>You can add 2 more images as a design or flyer</div>
								<div class="help-text-sm" style="padding-bottom:5px;">jpg, Max. Width: 1000 pixel, Resolution: 75, with Max. size 250 KB ( <br>for each image). </div>
							</div> 
							<div class="form-group col-sm-8 text-center">
								<div class="col-sm-1"></div>
								<div class="col-sm-5" style="padding-right:0px;">
									<input type="file" name="flyr_image1" id="product_flyrimage1" class="ds-product-flyrimg" onchange="setMaxBackground('product_flyrimage1',this,1000,250);"/>
								</div>
								<div class="col-sm-5" style="padding-left:0px;">
									<input type="file" name="flyr_image2" id="product_flyrimage2" class="ds-product-flyrimg" onchange="setMaxBackground('product_flyrimage2',this,1000,250);"/>
								</div>
								<div class="col-sm-1"></div>
								<div class="messageContainer"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-11">
				<div class="pull-right">
					<input type="submit" href="" name="spitemsubmitbtn" id="spitemsubmitbtn" class="btn btn-sm btn-danger-custom" value="Add & Continue" />
				</div>
			</div>
		</form>
		
		</div>
	</div>
	<br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<script src="<?php echo asset_url();?>js/bootstrap-dropdownhover.min.js"></script>
<script src="<?php echo asset_url();?>js/colorpicker.js"></script>
<script>
$('#color-picker1').ColorPicker({
	color: '#ff0000',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color-picker1').css('backgroundColor', '#' + hex);
		$("#color1").val(hex);
	}
});
$('#color-picker2').ColorPicker({
	color: '#00ff00',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color-picker2').css('backgroundColor', '#' + hex);
		$("#color2").val(hex);
	}
});
$('#color-picker3').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color-picker3').css('backgroundColor', '#' + hex);
		$("#color3").val(hex);
	}
});
$('#color-picker4').ColorPicker({
	color: '#ffffff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color-picker4').css('backgroundColor', '#' + hex);
		$("#color4").val(hex);
	}
});
$('#color-picker5').ColorPicker({
	color: '#000000',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color-picker5').css('backgroundColor', '#' + hex);
		$("#color5").val(hex);
	}
});

$('#pabout').on('keyup',function(){
    var vcount = parseInt($(this).val().length);
    var rem = 2500 - vcount;
    $("#pabout_count").html(rem);
});
$('#pdescription').on('keyup',function(){
    var vcount = parseInt($(this).val().length);
    var rem = 2500 - vcount;
    $("#pdesc_count").html(rem);
});
$(document).ready(function(){
	$('#spitem_frm').bootstrapValidator({
	 container: function($field, validator) {
     	return $field.parent().next('.messageContainer');
     },
    feedbackIcons: {
        validating: 'glyphicon glyphicon-refresh'
    },
    excluded: ':disabled',
    fields: {
    	sub_product_id: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select main/sub product'
                 	}
             	}
    	   	},
    	   	model_no: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter Product/Item No.'
                 	}
             	}
    	   	},
    	   	item_name: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter Product name'
                 	}
             	}
    	   	},
    	   	unit_price: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter Unit Price In USD.'
                 	}
             	}
    	   	},
    	   	lead_time: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter Production lead time'
                 	}
             	}
    	   	},
    	   	quantity: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter Min. Quantity'
                 	}
             	}
    	   	},
    	   	unit: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter unit of quantity'
                 	}
             	}
    	   	},
    	   	country_id: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select origin country'
                 	}
             	}
    	   	},
    	   	about: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter about this product'
                 	}
             	}
    	   	},
    	   	description: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter product description'
                 	}
             	}
    	   	},
    	   	'tech_field[]': {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter product tech specification'
                 	}
             	}
    	   	},
    	   	'tech_value[]': {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please enter product tech specification'
                 	}
             	}
    	   	},
    	   	product_mainimage: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product main image'
                 	}
             	}
    	   	},
    	   	sub_image1: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product 4 more images'
                 	}
             	}
    	   	},
    	   	sub_image2: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product 4 more images'
                 	}
             	}
    	   	},
    	   	sub_image3: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product 4 more images'
                 	}
             	}
    	   	},
    	   	sub_image4: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product 4 more images'
                 	}
             	}
    	   	},
    	   	flyr_image1: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product flyr images'
                 	}
             	}
    	   	},
    	   	flyr_image2: {
    	   		validators: {
                 	notEmpty: {
                     	message: 'Please select product flyr images'
                 	}
             	}
    	   	},
		     
		}
	}).on('error.field.bv', function(e, data) {
		if (data.bv.getSubmitButton()) {
			data.bv.disableSubmitButtons(false);
		}
   	}).on( 'status.field.bv', function( e, data ) {
    	$( '#spitemsubmitbtn').attr( 'disabled', false );
    }).on('success.form.bv', function(e) {
	   // Prevent form submission
	   e.preventDefault();
	   saveSubProductItem();
	});
});
function saveSubProductItem() {
	ajaxindicatorstart("Please wait .. while we save item...");
	var options = {
			target : '#response', // target element(s) to be updated with server response 
			beforeSubmit : showSPItemRequest, // pre-submit callback 
			success :  showSPItemResponse,
			url : base_url+'mystation/desksite/savesubproductitem',
			semantic : true,
			dataType : 'json'
		};
	$('#spitem_frm').ajaxSubmit(options);
}
function showSPItemRequest(formData, jqForm, options){
	var queryString = $.param(formData);
	return true;
}
function showSPItemResponse(resp, statusText, xhr, $form){
	ajaxindicatorstop();
	if(resp.status == 0) {
		alert(resp.msg);
	} else {
		//alert(resp.msg);
		getMyDeskside();
	}
}
function addMoreSpecs(){ 
	var html = '<tr>'
			  +'<td><input type="text" name="tech_field[]" value="" style="width:100%;height:28px;"/></td>'
			  +'<td><input type="text" name="tech_value[]" value="" style="width:100%;height:28px;"/></td>'
			  +'</tr>';
	$("#tech-spec").append(html);
}
function selectSNewproduct(scat_id,mcat_id,name,mname) {
	$("#sub_product_id").val(mcat_id+"#"+scat_id);
	if(name > 0) {
		$("#ds_main_pro_label").html(name+' <span class="caret" style="color:#d9574d;"></span>');
	} else {
		$("#ds_main_pro_label").html(mname+' <span class="caret" style="color:#d9574d;"></span>');
	}
	$('#spitem_frm').bootstrapValidator ('revalidateField', 'sub_product_id');
	if($("#plc_holder")) {
		if(scat_id > 0 || mcat_id > 0) {
			if(scat_id > 0) {
				var html = '<span style="color:#0066cc;font-size: 14px;font-weight: 500;">'+mname+"/"+name+'</span>';
			} else {
				var html = '<span style="color:#0066cc;font-size: 14px;font-weight: 500;">'+mname+'</span>';
			}
			$("#plc_holder").html(html);
		} else {
			var html = 'To add your products you must select the Main or Sub Product <br>where it listed under';
			$("#plc_holder").html(html);
		}
	}
}
</script>