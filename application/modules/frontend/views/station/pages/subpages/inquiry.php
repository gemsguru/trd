<style>
.accordion {
    background-color: #FFFFFF;
    color: #444;
    cursor: pointer;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}
.accordion.active, div.accordion:hover {
    background-color: #C9DFF4;
}
div.panel1 { 
     padding: 0 18px; 
     background-color: white; 
     max-height: 0; 
     overflow: hidden; 
    transition: max-height 0.2s ease-out; 
 } 
 .fa {
 	color: red;
 }

</style>
<div id="ppp">
<form name="frmaddvedio" method="post" action=""  style="background-color: #C0C0C0;" enctype="multipart/form-data" id="frmaddvedio">
	<div class="panel-heading custom-panel-heading">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6" style="text-align: left; padding-top: 13px;">
					<span style="color:#A9A9A9;font-family:Georgia;font-size:19px;">Inquiries <?php echo count($inquiry);?></span> 
				</div>
				<div class="col-md-5" >
					
				</div>
				<div class="col-md-1" style="text-align: right">
					<span class="pull-right-close" style="text-align: right"><a href="javascript:ShowObjectWithEffect('Layer180', 0, 'dropup', 500, 'easeInBounce');ShowObjectWithEffect('Layer1', 1, 'dropdown', 500, 'easeInBounce');" class="btn-custom-close">X</a></span>
				</div>
			</div>
		</div>
  		
  	</div>
  	<div class="panel-body panel-body-custom" id="" style="padding-top: 15px;">	
  		<div id="inquiry_div" ><br><br>
  			<?php if($tscategory_id == 1 || $tscategory_id == 2) {?>
			<div class="row">
				<div class="col-md-9" >
						<div class="col-md-1" >
							<div style="background-color:#1e90ff;text-align:center;height: 28px; width: 40px;padding-top: 3px;">
								<input type="checkbox" id="Checkbox148" name="" value="on" >
							</div>
						</div>
						<div class="col-md-3" >
							<button type="button" style="margin-left:-23px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;" onclick="javascript:inquiryreplay();" value="">Replay With Offer</button>
						</div>
						<div class="col-md-1">
							<button type="button" style="margin-left:-66px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;"  onclick="javascript:deleteinquiry();" value="">Delete</button>
						</div>
						<div class="col-md-1" >
							<button type="button" style="margin-left:22px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;"  value="">Chat</button>
						</div>
						<div class="col-md-3" >
						<button type="button" style="margin-left:110px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;" onclick="javascript:unreadinquiry();"  value="">Marked as Unread</button>
						</div>
						<div class="col-md-1" >
							<button type="button" style="margin-left:68px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;"  onclick="javascript:pinquiry();" value="">Pin/Unpin</button>
						</div>
				</div>		
			</div>
			<?php } else { ?>
				<div class="row">
				<div class="col-md-9" >
						<div class="col-md-1" >
							<div style="background-color:#1e90ff;text-align:center;height: 28px; width: 40px;padding-top: 3px;">
								<input type="checkbox" id="Checkbox148" name="" value="on" >
							</div>
						</div>
						<div class="col-md-1">
							<button type="button" style="margin-left:-21px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;"  onclick="javascript:deleteinquiry();" value="">Delete</button>
						</div>
						<div class="col-md-1" >
							<button type="button" style="margin-left:68px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;"  value="">Chat</button>
						</div>
						<div class="col-md-3" >
						<button type="button" style="margin-left:157px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;" onclick="javascript:unreadinquiry();"  value="">Marked as Unread</button>
						</div>
						<div class="col-md-1" >
							<button type="button" style="margin-left:116px;color:white;background-color:#1e90ff;border:none;height: 28px; width: 150px;"  onclick="javascript:pinquiry();" value="">Pin/Unpin</button>
						</div>
				</div>		
			</div>
			<?php } ?>
			<br>
			<div style="padding-top:50px;">
			<?php $count=0; foreach ($inquiry as $row) { $count++;?>
				<div  class="accordion">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-1">
								<?php if($row['unreadmark'] == 0) { ?>
									<div style="width:4px;height:36px;background-color: red;position: absolute;left: 1px;top: 1px;"></div>
								<?php } ?>	
								<input type="checkbox" id="chkinquiry" name="chkinquiry"  value="<?php echo $row['inqury_id'];?>" >
								<img src="<?php echo asset_url().$row['profile_image'];?>" id="" alt="" style="width: 40px;border-radius: 50px;">
							</div>
							<div class="col-md-3">
								<span style="color:#1E90FF;font-family:Arial;font-size:12px;"><strong><?php echo $row['company_name'];?></strong></span><br>
								<span style="color:#4B4B4B;font-family:Arial;font-size:11px;"><?php echo $row['name_prefix']."  ".$row['name'];?></span>
								<span style="color:#4B4B4B;font-family:Arial;font-size:11px;"><strong><?php echo $row['company_country'];?></strong>| <?php echo $row['company_province'];?></span>
							</div>
							<div class="col-md-1" style="padding-top: 12px;">
								<?php if($row['pin_unpin'] == 1) { ?>
									<img src="<?php echo asset_url();?>images/Pin-icon.png" id="" alt="" style="height: 22px;">
								<?php }?>	
							</div>
							<div class="col-md-3" style="text-align: left">
								<span style="color:#2D2D2D;font-family:Arial;font-size:12px;"><?php echo $row['inquiry_subject'];?></span>
							</div>
							<div class="col-md-1">
								<span style="color:#1E90FF;font-family:Arial;font-size:13px;">View</span><br>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								
							</div>
							<div class="col-md-1">
								<span style="color:#1E90FF;font-family:Arial;font-size:13px;"><?php echo $row['inqury_type'];?></span>
							</div>
							<div class="col-md-2">
								<span style="color:#1E90FF;font-family:Arial;font-size:13px;"><?php echo date('l', strtotime($row['created_date']));?><br><?php echo date("j M Y",strtotime($row['created_date']));?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="panel1">
					<div style="padding-top: 22px;padding-bottom:22px;">
						<div>
					  		<?php echo $row['inquiry_body'];?>
					  	</div><br><br>
					  	<div>
					  		<?php if($row['sub_image1'] != "") { ?>
					  			<img src="<?php echo asset_url().$row['sub_image1'];?>"  style="width:100px;height:100px;">
					  		<?php } ?>	
					  		<?php if($row['sub_image2'] != "") { ?>
					  			<img src="<?php echo asset_url().$row['sub_image2'];?>" style="width:100px;height:100px;">
					  		<?php } ?>
					  		<?php if($row['sub_image3'] != "") { ?>	
					  			<img src="<?php echo asset_url().$row['sub_image3'];?>" style="width:100px;height:100px;">
					  		<?php } ?>
					  		<?php if($row['sub_image4'] != "") { ?>	
					  			<img  src="<?php echo asset_url().$row['sub_image4'];?>" style="width:100px;height:100px;">
					  		<?php } ?>	
					  	</div>
					  </div>	
				</div>
				<br>
			<?php } ?>
				</div>
   		</div>
   </div>
 </form>
 </div>
 <!--   <div id="Layer232" style="display;none">
<!--  <label>lll</label> -->
 
<!--  </div> -->
<script src="<?php echo asset_url();?>js/bootstrap-typeahead.min.js"></script>

 
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
	  if($(this).find($(".fa")).hasClass('fa-caret-down')) 
      {
  		$(this).find($(".fa")).removeClass('fa-caret-down').addClass('fa-caret-up');
      } else {
      	$(this).find($(".fa")).removeClass('fa-caret-up').addClass('fa-caret-down');
      }
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}

function replayoffer()
{
	var values = new Array();
    $.each($("input[name='chkinquiry']:checked"), function(){            
    	values.push($(this).val());
    });
	values = values.filter(v=>v!=null);
	if(values.length > 0 ) {
		 	
	} else {
		alert('Please select inquiry.');
	}
}
 function deleteinquiry()
 {
		var values = new Array();
		//$('#state option:contains("'+state.trim()+'")').prop('selected', true);
	    $.each($("input[name= 'chkinquiry']:checked"), function(){    
	    	values.push($(this).val());
	    });
		values = values.filter(v=>v!=null);
		if(values.length > 0 ) {
			 	//var productid = values[0];
				$.post("<?php echo base_url();?>mystation/deleteinquiry",{values:values},function(data) {
			 		alert(data.msg);
			 		openInquiry();
			 	},'json');
				
		} else {
			alert('Please select inquiry.');
		}
 }
 function pinquiry()
 {
	 var values = new Array();
		//$('#state option:contains("'+state.trim()+'")').prop('selected', true);
	    $.each($("input[name= 'chkinquiry']:checked"), function(){    
	    	values.push($(this).val());
	    });
		values = values.filter(v=>v!=null);
		if(values.length > 0 ) {
			 	//var productid = values[0];
				$.post("<?php echo base_url();?>mystation/pininquiry",{values:values},function(data) {
			 		alert(data.msg);
			 		openInquiry();
			 	},'json');
				
		} else {
			alert('Please select inquiry.');
		}
 }
 function unreadinquiry()
 {
	 var values = new Array();
		//$('#state option:contains("'+state.trim()+'")').prop('selected', true);
	    $.each($("input[name= 'chkinquiry']:checked"), function(){    
	    	values.push($(this).val());
	    });
		values = values.filter(v=>v!=null);
		if(values.length > 0 ) {
			 	//var productid = values[0];
				$.post("<?php echo base_url();?>mystation/unreadinquiry",{values:values},function(data) {
			 		alert(data.msg);
			 		openInquiry();
			 	},'json');
				
		} else {
			alert('Please select inquiry.');
		}
 }
 document.getElementById('totalinquiry').innerHTML = <?php echo count($inquiry);?>;
 var inquiry = document.getElementById('totalinquiry').innerHTML ;
 var offer = document.getElementById('totaloffer').innerHTML ;
 var request = document.getElementById('totalrequest').innerHTML ;
 var order = document.getElementById('totalorder').innerHTML ;
 document.getElementById('totalalert').textContent = parseInt(inquiry) + parseInt(offer) + parseInt(request) +parseInt(order);
</script>
			
