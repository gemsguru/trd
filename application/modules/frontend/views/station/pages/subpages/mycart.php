<form name="frmcart" method="post" action="" enctype="multipart/form-data" id="frmaddvedio">
	<div class="panel-heading custom-panel-heading">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2" style="text-align: center;padding-top: 9px;padding-left:26px;">
					<span style="color:#A9A9A9;font-family:Georgia;font-size:19px;">My Cart</span>
				</div>
				<div class="col-md-4">
					&nbsp;
				</div>
				<div class="col-md-5" >
					<div class="col-md-3">
						<span style="color:#FFFFFF;font-family:Arial;font-size:32px;"><?php echo count($cartdata);?></span>
						<span style="color:#696969;font-family:Arial;font-size:12px;">Products</span>
					</div>
					<div class="col-md-1 text-right" style="padding-top:20px;">
						<span style="color:#696969;font-family:Arial;font-size:12px;">By</span>
					</div>
					<div class="col-md-3 text-left">
						<span style="color:#FFFFFF;font-family:Arial;font-size:32px;"><?php echo count($cartdataseller);?></span>
						<span style="color:#696969;font-family:Arial;font-size:12px;">Sellers</span>
					</div>
				</div>
				<div class="col-md-1" style="text-align: right">
					<span class="pull-right-close" style="text-align: right"><a href="javascript:ShowObjectWithEffect('Layer180', 0, 'dropup', 500, 'easeInBounce');ShowObjectWithEffect('Layer1', 1, 'dropdown', 500, 'easeInBounce');" class="btn-custom-close">X</a></span>
				</div>
			</div>
		</div>
  		
  	</div>
  	<div class="panel-body panel-body-custom" id="" style="padding-top: 15px;padding-left: 45px;">		
  		<div id="addproduct_div">
  		<?php $count = 0;
		foreach($cartdataseller as $row) {
			$count++;
			?>
	  		<div class="row">
	  			<div class="col-md-12">
	  				<div class="col-md-1" >
	  					<img src="<?php echo asset_url().$row['profile_image'];?>" id="Image163" alt="" style="width: 45px;height:45px;border-radius: 50px;">
	  				</div>
	  				<div class="col-md-10" style="text-align: left">
	  					<span style="color: #303030; font-family: Georgia; font-size: 15px;"><strong><a href="./desksite.php" target="_blank" class="style5"><?php echo $row['company_name'];?></a></strong></span><br>
						<span style="color:#4B4B4B;font-family:Arial;font-size:12px;">Presented By: <?php echo $row['name_prefix']." ".$row['name']; ?></span><br>
						<span style="color:#4B4B4B;font-family:Arial;font-size:12px;"><?php echo $row['company_country'];?>&nbsp; |&nbsp; <?php echo $row['company_province'];?></span>					
	  				</div>
	  			</div>
	  		</div><br><br>
	  		<div class="row" style="background-color: #D3D3D3">
	  			<div class="col-md-12" style="padding:5px;">
	  				<div class="col-md-8">
	  					<div class="row">
	  						<div class="col-sm-12" >
	  							<div class="col-sm-1" >
	  								<input type="checkbox" id="chkseller" name="chkseller" value="<?php echo $row['cart_id'];?>" >
	  							</div>
	  							<div class="col-sm-3" >
				  					<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Product Image</span>
				  				</div>
				  				<div class="col-sm-3" >
				  					<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Model No.</span>
				  				</div>
				  				<div class="col-sm-3">
				  					<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">Name</span>
				  				</div>
				  				<div class="col-sm-2">
				  					<span style="color:#2D2D2D;font-family:Arial;font-size:12px;">USD Price</span>
				  				</div>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  		<br>
	  		<div class="row">
	  			<div class="col-md-12" >
	  				<div class="col-md-8">
	  				<?php foreach($cartdata as $row1) { if($row['sellerbusi_id'] == $row1['sellerbusi_id']) { ?>
	  					<div class="row">
	  						<div class="col-sm-12" >
	  							<div class="col-sm-1" style="padding-top: 22px;">
	  								<input type="checkbox" id="chkcart-<?php echo $count;?>" name="chkcart-<?php echo $count;?>"   value="<?php echo $row1['product_id']; ?>" style="padding-top: 22px;">
	  							</div>
	  							<div class="col-sm-3" >
				  					<img src="<?php echo asset_url().$row1['main_image'];?>" id="Shape316" alt="" style="width:78px;height:78px;border-radius: 50px;">
				  				</div>
				  				<div class="col-sm-3"  style="padding-top: 22px;">
				  					<span style="color:#696969;font-family:Arial;font-size:12px;"><?php echo $row1['model_no'];?></span>
				  				</div>
				  				<div class="col-sm-3"  style="padding-top: 22px;">
				  					<span style="color:#696969;font-family:Arial;font-size:12px;"><?php echo $row1['product_name'];?></span>
				  				</div>
				  				<div class="col-sm-2"  style="padding-top: 22px;">
				  					<span style="color:#696969;font-family:Arial;font-size:12px;">USD <?php echo $row1['unit_price'];?></span>
				  				</div>
	  						</div>
	  					</div><br>
	  				<?php } }?>
	  				</div>
	  				<div class="col-md-4">
		  					<input type="button" class="form-control"  style="background-color: #f53f05;color:white;"  onclick="addmoreproduct(<?php echo $row['sellerbusi_id'];?>);" value="Add More Product From This Seller"><br>
		  					<input type="button" class="form-control"  style="background-color: #f53f05;color:white;" onclick="deletecart(<?php echo $count;?>);"  value="Remove Selected Item"><br>
		  					<input type="button" class="form-control"  style="background-color: #f53f05;color:white;"  onclick="saveorder(<?php echo $count;?>);"  value="Create an Initial Order Of Selected Item"><br>
		  					<span style="color:#3C3C3C;font-family:Arial;font-size:11px;">Note:<br>Initial Order of the selected items, is a primary invoice will be saved in your " My Order " tab as a stand by order, until you modify and press " Send &amp; Notify The Seller" in "My Order" tab..<br><br>Once you press” Send &amp; Notify “button, an order request notification will be sent to the seller , inviting him to review a live copy of your order and allow him to change it according to your request..<br>You and the seller can keep changing and modifying the same order, until reaching to the final copy..<br></span>
	  				</div>
	  			</div>
	  		</div>
	  		<hr style="border-color: black;">
	  		<?php } ?>
   		</div>
   </div>
 </form>
  <div id="productlist_modal" class="modal fade" >
	<div class="modal-dialog"  style="width: 900px;">
		<div class="modal-content" style="border:2px #FF6347 solid">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Select The Product</h3>
			</div>
			<div class="modal-body" >
				<form id="frmproductlist" method="post" enctype="multipart/form-data" action="">
					<div style="text-align: center;padding-top:22px;padding-bottom:22px;">
						<input type="button"  onclick="selectproduct();" id="btnuseproduct"  name="" value="Use" style="width:158px;height:25px;">
					</div>
						<div id="subproductlist_div" style="max-height:500px;overflow-y: scroll;">
						
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo asset_url();?>js/bootstrap-typeahead.min.js"></script>
<script>
function saveorder(count)
{
	var pp = 'chkcart-'+count;
	var values = new Array();
	//$('#state option:contains("'+state.trim()+'")').prop('selected', true);
    $.each($("input[name= '"+pp+"']:checked"), function(){    
    	values.push($(this).val());
    });
	values = values.filter(v=>v!=null);
	if(values.length > 0 ) {
		 	//var productid = values[0];
			$.post("<?php echo base_url();?>mystation/initiatorder",{values:values},function(data) {
		 		
		 	},'json');
			sellerOrder();
	} else {
		alert('Please select cart Item.');
	}
}
function selectproduct()
{
	var values = new Array();
    $.each($("input[name='product_id']:checked"), function(){            
    	values.push($(this).val());
    });
	values = values.filter(v=>v!=null);
	if(values.length > 0 ) {
		 	$.post("<?php echo base_url();?>mystation/addproductcart",{values:values},function(data) {
		 		alert(data.msg);
				$('#productlist_modal').modal('hide');
		 	},'json');
		 	openMycart();
	} else {
		alert('Please select product.');
	}
}
function addmoreproduct(seller_busi_id)
{
		$.post('<?php echo base_url();?>mystation/productitemlistbyseller',{seller_busi_id:seller_busi_id},function(data) {
			
				document.getElementById('subproductlist_div').innerHTML = data;
				$('#productlist_modal').modal({show:true,backdrop: 'static',keyboard: false});
		});
	
}
var asseturl = '<?php echo asset_url();?>';
function deletecart(count)
{
	var pp = 'chkcart-'+count;
	var values = new Array();
	//$('#state option:contains("'+state.trim()+'")').prop('selected', true);
    $.each($("input[name= '"+pp+"']:checked"), function(){    
    	values.push($(this).val());
    });
	values = values.filter(v=>v!=null);
	if(values.length > 0 ) {
		 	//var productid = values[0];
			$.post("<?php echo base_url();?>mystation/deletefromcart",{values:values},function(data) {
		 		alert(data.msg);
		 	},'json');
			openMycart();
	} else {
		alert('Please select cart Item.');
	}
}

	
</script>
 
 
