<form name="frmoffer_replay" method="post" action=""  enctype="multipart/form-data" id="frmoffer_replay">
	<div class="">
		<div class="row">
			<div class="col-md-12" style="text-align: right">
					<span class="pull-right-close" style="text-align: right;right:17px;"><a href="javascript:closeInquiry();" class="btn-custom-close">X</a></span>
			</div>
		</div>
  	</div>
  	<div class="panel-body panel-body-custom" id="" style="margin: 0 auto;margin-top:80px;">		
  		<div id="inquiry_div"  text-align="center" style="padding-left: 20%;padding-bottom:50px;">
  				<div class="row">
  					<input type="hidden" name="post_id" id="post_id" value="<?php echo $offerdata[0]['offer_id'];?>" />
  					<input type="hidden" name="post_type" id="post_type" value="1" />
  					<input type="hidden" name="inquiry_type_id" id="inquiry_type_id" value="4" />
  					<input type="hidden" name="name" id="name" value="<?php echo $contact_details[0]['name'];?>" />
  					<input type="hidden" name="company" id="company" value="<?php echo $contact_details[0]['company_name'];?>" />
  					<input type="hidden" name="email" id="email" value="<?php echo $contact_details[0]['email'];?>" />
  					<input type="hidden" name="phone" id="phone" value="<?php echo $contact_details[0]['mobile_number'];?>" />
  					<div class="col-md-12" style="padding-left: 40px;">
  						<input type="hidden" name="busi_id" id="receiver_busi_id" value="<?php echo $offerdata[0]['offer_receiver_id'];?>"  />
  						<input type="hidden" name="my_busi_id" id="busi_id" value="<?php echo $this->session->userdata('tsuser')['busi_id'];?>"  />
  						<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">To&nbsp;<font size="4px;"><strong><?php echo $offerdata[0]['company_name'];?></strong></font><br></span>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-12" style="padding-left: 40px;">
  						<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">Attn.: <font size="4px;"><strong><?php echo $offerdata[0]['name_prefix']." ".$offerdata[0]['name']?></strong></font><br></span>
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-1">
  							<a href="#" onmouseenter="SetImage('Shape66','images/sofa1.png');return false;"><img src="<?php echo asset_url().$offerdata[0]['main_image']?>" id="Shape375" alt="" style="width:67px;height:63px;"></a>
  						</div>
  						<div class="col-md-4">
  							<input type="hidden" name="product_id" id="product_id" value="<?php echo $offerdata[0]['product_id'];?>"  />
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">Ref. to your inquiry about</span><br>
  							<span style="color:#4B4B4B;font-family:Arial;font-size:16px;"><strong><?php echo $offerdata[0]['product_name'];?></strong></span><br>
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">item no.<br></span>
  							<span style="color:#4B4B4B;font-family:Arial;font-size:16px;"><strong><?php echo $offerdata[0]['model_no'];?></strong></span>
  						</div>	
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-4">
  							<input type="text"  class="form-control"  name="title"  id="subject" placeholder="Subject"  />
  						</div>
  						<div class="messageContainer"></div>
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-9">
  							<textarea rows="10" cols="80" name="message"  id="messagebody" placeholder="Message"  ></textarea>
  						</div>
  						<div class="messageContainer"></div>
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-1">
  							<img src="<?php echo asset_url();?>images/insert-image-3.png" id="Image171" alt="" style="width:34px;height:34px;">
  						</div>
  						<div class="col-md-1" style="padding-top:5px;">
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">Attachment<br></span>
  						</div>
  						<div class="col-md-5">
  							<input type="file" multiple="multiple" name="FileUpload1[]" id="offerreplay" onchange="readOfferURL(this);" />
  						</div>
  						<div class="col-md-1">
  							<input type="submit" id="Button10" name="" value="Send" style="width:96px;height:25px;">
  						</div>
  					</div>
  				</div>
   		</div>
   </div>
 </form>
<script src="<?php echo asset_url();?>js/bootstrap-typeahead.min.js"></script>
<script>

$('#frmoffer_replay').bootstrapValidator({
	container: function($field, validator) {
		return $field.parent().next('.messageContainer');
   	},
    feedbackIcons: {
        validating: 'glyphicon glyphicon-refresh'
    },
    excluded: ':disabled',
    fields: {
  		'title': {
            validators: {
                notEmpty: {
                    message: 'The Subject is required and cannot be empty'
                }
            }
        }, 
        'message': {
            validators: {
                notEmpty: {
                    message: 'The Body is required and cannot be empty'
                }
            }
        }
    }
}).on('success.form.bv', function(e) {
// Prevent form submission
	e.preventDefault();
	saveofferreplay();
});

function saveofferreplay() {
	var options = {
		target : '#response', 
		beforeSubmit : showOfferRequest,
		success :  showOfferResponse,
		url : base_url+'desksite/saveoffer',
		semantic : true,
		dataType : 'json'
	};
	$('#frmoffer_replay').ajaxSubmit(options);
}

function showOfferRequest(formData, jqForm, options){
	var queryString = $.param(formData);
	return true;
}

function showOfferResponse(resp, statusText, xhr, $form){
	if(resp.status == '0') {
		$("#response").addClass('alert-danger');
		$("#response").html(resp.msg);
		alert(resp.msg);
		openOffer();
		$("#Button10").prop('disabled',false);
	} else {
		$(".text-danger").hide();
		$("#response").addClass('alert-success');
		$("#response").html(resp.msg);
		$("#response").show();
		alert(resp.msg);
		openOffer();
	}
}

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
			 	},'json');
				openInquiry();
		} else {
			alert('Please select inquiry.');
		}
 }
 function pininquiry()
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
			 	},'json');
				openInquiry();
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
			 	},'json');
				openInquiry();
		} else {
			alert('Please select inquiry.');
		}
 }

 function closeInquiry() {
	 openOffer();
 }
 
</script>
			
