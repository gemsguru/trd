<form name="frminquiry_replay" method="post" action=""  enctype="multipart/form-data" id="frminquiry_replay">
	<div class="">
		<div class="row">
			<div class="col-md-12" style="text-align: right">
					<span class="pull-right-close" style="text-align: right"><a href="javascript:ShowObjectWithEffect('Layer180', 0, 'dropup', 500, 'easeInBounce');ShowObjectWithEffect('Layer1', 1, 'dropdown', 500, 'easeInBounce');" class="btn-custom-close">X</a></span>
			</div>
		</div>
  	</div>
  	<div class="panel-body panel-body-custom" id="" style="margin: 0 auto;">		
  		<div id="inquiry_div"  text-align="center" style="padding-left: 20%;">
  				<div class="row">
  					<input type="hidden"  name="inquiry_id"  id="inquiry_id"  value="<?php echo $inquirydata[0]['inqury_id'];?>" />
  					<div class="col-md-12" style="padding-left: 40px;">
  						<input type="hidden"  name="requester_busi_id"   id="requester_busi_id" value="<?php echo $inquirydata[0]['requester_busi_id'];?>"  />
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">To&nbsp;<font size="4px;"><strong><?php echo $inquirydata[0]['company_name'];?></strong></font><br></span>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-12" style="padding-left: 40px;">
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">Attn.: <font size="4px;"><strong><?php echo $inquirydata[0]['name_prefix']." ".$inquirydata[0]['name']?></strong></font><br></span>
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-1">
  							<a href="#" onmouseenter="SetImage('Shape66','images/sofa1.png');return false;"><img src="<?php echo asset_url().$inquirydata[0]['main_image']?>" id="Shape375" alt="" style="width:67px;height:63px;"></a>
  						</div>
  						<div class="col-md-4">
  							<input type="hidden"  name="product_id"   id="product_id" value="<?php echo $inquirydata[0]['product_item_id'];?>"  />
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">Ref. to your inquiry about</span><br>
  							<span style="color:#4B4B4B;font-family:Arial;font-size:16px;"><strong><?php echo $inquirydata[0]['product_name'];?></strong></span><br>
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">item no.<br></span>
  							<span style="color:#4B4B4B;font-family:Arial;font-size:16px;"><strong><?php echo $inquirydata[0]['model_no'];?></strong></span>
  						</div>	
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-4">
  							<input type="text"  class="form-control"  name="subject"  id="subject" placeholder="Subject"  />
  						</div>
  						<div class="messageContainer"></div>
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-9">
  							<textarea rows="10" cols="80" name="messagebody"  id="messagebody" placeholder="Message"  ></textarea>
  						</div>
  						<div class="messageContainer"></div>
  					</div>
  				</div><br><br>
  				<div class="row">
  					<div class="col-md-12">
  						<div class="col-md-1">
  							<img src="<?php echo asset_url();?>images/insert-image-3.png" id="Image171" alt="">
  						</div>
  						<div class="col-md-1">
  							<span style="color:#3C3C3C;font-family:Arial;font-size:12px;">Attachment<br></span>
  						</div>
  						<div class="col-md-5">
  							<input type="file" multiple="multiple"  name="inquiryreplay[]"  id="inquiryreplay" onchange="readInquiryURL(this);" />
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

$('#frminquiry_replay').bootstrapValidator({
	container: function($field, validator) {
		return $field.parent().next('.messageContainer');
   	},
    feedbackIcons: {
        validating: 'glyphicon glyphicon-refresh'
    },
    excluded: ':disabled',
    fields: {
  		'subject': {
            validators: {
                notEmpty: {
                    message: 'The Subject is required and cannot be empty'
                }
            }
        }, 
        'messagebody': {
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
	saveinquiryreplay();
});

function saveinquiryreplay() {
	var options = {
		target : '#response', 
		beforeSubmit : showInquiryRequest,
		success :  showInquiryResponse,
		url : base_url+'mystation/saveinquiryreplay',
		semantic : true,
		dataType : 'json'
	};
	$('#frminquiry_replay').ajaxSubmit(options);
}

function showInquiryRequest(formData, jqForm, options){
	var queryString = $.param(formData);
	return true;
}

function showInquiryResponse(resp, statusText, xhr, $form){
	if(resp.status == '0') {
		$("#response").addClass('alert-danger');
		$("#response").html(resp.msg);
		alert(resp.msg);
		openInquiry();
		$("#Button10").prop('disabled',false);
	} else {
		$(".text-danger").hide();
		$("#response").addClass('alert-success');
		$("#response").html(resp.msg);
		$("#response").show();
		alert(resp.msg);
		openInquiry();
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
 
</script>
			
