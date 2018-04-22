<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo asset_url();?>js/jquery.imgareaselect.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo asset_url();?>css/imgareaselect.css">
<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/imgareaselect-default.css" />  
<script type="text/javascript" src="<?php echo asset_url();?>js/jquery.imgareaselect.js" > </script>
<style>
<!--
.btn-custom {
    width: 80px !important;
}
.alerts-btn {
	width: 80px !important;
    font-size: 13px !important;
    font-family: Arial;
    height: 44px;
    border: 0px;
}
/*.alerts-btn:hover {
	width:80px !important;
    font-size: 13px !important;
    font-family: Arial;
    height: 44px;
    border: 0px !important;
    background-color: #F05539 !important;
}*/
.alerts-btn-selected {
    height: 44px;
    font-size: 13px !important;
    font-family: Arial;
    border: 0px;
    background-color: #F05539 !important;
}
.bluebtn {
	background-color:#1e90ff;
	text-decoration:none;
	border-radius:10px;
	min-width:150px;
	padding:7px 15px;
	text-align:center;
	color:#fff;
	font-size:13px;
	cursor:pointer;
	display:block;
}
.bluebtn:visited {
	color:#fff;
}
.bluebtn:hover {
	background-color:#1e70ff;
	color:#fff;
	text-decoration:none;
}
.bluebtn:active {
	color:#fff;
}
.bluebtn:focus {
	background-color:#1e70ff;
	color:#fff;
	text-decoration:none;
}
#RollOver5 a
{
   display: block;
   position: relative;
   height: 100%;
   width: 100%;
}
#RollOver5 a img
{
   position: absolute;
   z-index: 1;
   border-width: 0;
}
#RollOver5 span
{
   display: block;
   height: 100%;
   width: 100%;
   position: absolute;
   z-index: 2;
}
#RollOver5 a .hover
{
   visibility: hidden;
}
#RollOver5 a:hover .hover
{
   visibility: visible;
}
#RollOver5 a:hover span
{
   visibility: hidden;
}
#RollOver5 img
{
   border-width: 0;
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
-->
</style>
<div class="row editaccount_outer">
	<div class="col-md-2 account-left-nav"> 
		<div class="col-md-12">
			<div class="account-image">
				<a href="javascript:false;"><img class="hover" alt="" src="<?php echo asset_url();?>images/Alerts1.png"></a>
			</div>
			<div class="account-image" style="padding-top: 3px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Alerts</span>
			</div>
			<div id="RollOver55"  style="position: absolute; left: 74px; top: 133px; overflow: hidden; width: 58%; height: 40px; z-index: 1680">
				<a href="javascript:openFavoriteInfo(1);"> 
					<img class="hover" alt="" src="<?php echo asset_url();?>images/myfavor0red.png" style="width:40px;"> 
					<span><img alt="" src="<?php echo asset_url();?>images/myfavor0.png" style="width:40px;"></span>
				</a>
			</div><br>
			<div style="position: absolute;top: 180px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">My Favorite</span>
			</div>
			<div id="RollOver51" style="position: absolute; left: 74px; top: 215px; overflow: hidden; width: 47%; height: 40px; z-index: 1681">
				<a href="javascript:openMycart();"> <img class="hover" alt=""
					src="<?php echo asset_url();?>images/mycartgren.png" style="width:40px;"> <span><img
						alt="" src="<?php echo asset_url();?>images/mycart.png" style="width:40px;"></span>
				</a>
			</div><br>
			<div style="position: absolute;top: 263px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">My Cart</span>
			</div>
			<div id="RollOver54" style="position: absolute; left: 74px; top:297px; overflow: hidden; width: 50%; height: 40px; z-index: 1683">
				<a href="javascript:openRequest();"> 
					<img class="hover" alt="" src="<?php echo asset_url();?>images/addrequescolort.png" style="width:40px;"> 
					<span><img alt="" src="<?php echo asset_url();?>images/addrequest.png" style="width:40px;"></span>
				</a>
				<div id="totalrequest" style="position:absolute;top:13px;left:35px;width:32px;height:16px;padding:1px;background-color:#ff0017;color:#fff;border-radius:2px;text-align:center;z-index:2;font-size:11px;"><?php echo count($sendcommunityrequest) ?></div>
			</div><br><br>
			<div style="position:absolute;top:345px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Add Requests</span>
			</div>
			<div id="RollOver58" style="position: absolute; left: 74px; top: 379px; overflow: hidden; width: 50%; height: 40px; z-index: 1695">
				<a href=""> 
					<img class="hover" alt="" src="<?php echo asset_url();?>images/incomingchatalertscolor.png" style="width:40px;">
					<span><img alt="" src="<?php echo asset_url();?>images/incomingchatalerts.png" style="width:40px;"></span>
				</a>
				<div style="position:absolute;top:13px;left:35px;width:32px;height:16px;padding:1px;background-color:#ff0017;color:#fff;border-radius:2px;text-align:center;z-index:2;font-size:11px;">0</div>
			</div><br>
			<div style="position:absolute;top:427px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Chat Alerts</span>
			</div>
			<div id="RollOver52" style="position: absolute; left: 74px; top: 461px; overflow: hidden; width: 50%; height: 40px; z-index: 1687">
				<a href="javascript:openInquiry();"> <img class="hover" alt="" src="<?php echo asset_url();?>images/inquiryoffwhite.png" style="width:40px;"> <span>
					<img alt="" src="<?php echo asset_url();?>images/inquiry.png" style="width:40px;"></span>
				</a>
				<div id="totalinquiry" style="position:absolute;top:13px;left:35px;width:32px;height:16px;padding:1px;background-color:#ff0017;color:#fff;border-radius:2px;text-align:center;z-index:2;font-size:11px;"><?php echo count($inquiry);?></div>
			</div>
			<br><br>
			<div style="position:absolute;top:509px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Inquiries</span>
			</div>
			<div id="RollOver53"
				style="position: absolute; left: 74px; top: 543px; overflow: hidden; width: 50%; height: 40px; z-index: 1691">
				<a href="javascript:openOffer();"> 
					<img class="hover" alt="" src="<?php echo asset_url();?>images/offer-tool2.png" style="width:40px;"> 
					<span><img alt="" src="<?php echo asset_url();?>images/offer-tool1.png" style="width:40px;"></span>
				</a>
				<div id="totaloffer" style="position:absolute;top:13px;left:35px;width:32px;height:16px;padding:1px;background-color:#ff0017;color:#fff;border-radius:2px;text-align:center;z-index:2;font-size:11px;"><?php echo count($offer);?></div>
			</div>
			<div style="position:absolute;top:591px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Offers</span>
			</div>
			<div id="RollOver56" style="position: absolute; left: 74px; top: 625px; overflow: hidden; width: 50%; height: 40px; z-index: 1699">
				<a onclick="javascript:sellerOrder();" target="_blank"> <img class="hover" alt=""
					src="<?php echo asset_url();?>images/My-order-color.png" style="width:40px;"> <span><img
						alt="" src="<?php echo asset_url();?>images/My-order.png" style="width:40px;"></span>
				</a>
				<div id="totalorder" style="position:absolute;top:13px;left:35px;width:32px;height:16px;padding:1px;background-color:#ff0017;color:#fff;border-radius:2px;text-align:center;z-index:2;font-size:11px;"><?php echo count($order);?></div>
			</div><br>
			<div style="position:absolute;top:673px;text-align:center;width: 160px;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">My Orders</span>
			</div>
		</div>
	</div>
	<div class="col-md-10 account-content-area">
			<div class="panel panel-default" id="alertbodypanel" style="min-height:750px;margin-bottom:0px;">
				<span class="pull-right-close"><a href="javascript:closeAlert();" class="btn-custom-close">X</a></span>
				<div id="wb_Text1677" style="position:absolute;left:427px;top:271px;width:196px;height:18px;text-align:center;z-index:1247;">
					<span style="color:#3C3C3C;font-family:Arial;font-size:16px;">Click on the required alert</span>
				</div>
				<div id="wb_Image266" style="position:absolute;left:407px;top:265px;width:13px;height:33px;z-index:1249;">
					<img src="<?php echo asset_url();?>images/back-arrow.png" id="Image266" alt="" style="width:14px;height:34px;">
				</div>
			</div>
	</div>
</div>
<div id="customAlertBox" class="modal fade" role="dialog" style="z-index:13000;">
  	<div class="modal-dialog" style="width:400px;">
    	<div class="modal-content" style="border-radius:0px;margin-top:25%;">
      		<div class="modal-body">
      			<div class="row" style="padding-top:10px;">
      				<div class="col-sm-2"></div>
      				<div class="col-sm-8">
	      				<div style="text-align: center;">
							<span style="color: #F05539; font-family: 'Arial Black'; font-size: 16px;"></span>
						</div>
						<br><br>
						<div style="text-align: center;" id="customAlertText">
							My Alert
						</div>
					</div>
					<div class="col-sm-2"></div>
      			</div>
      			<br>
      			<div class="row text-center">
      				<a href="" class="btn btn-sm btn-danger-custom" data-dismiss="modal" style="width:100px;">OK</a>
      			</div>
      			<br><br>
      		</div>
    	</div>
  	</div>
</div>
<script src="<?php echo asset_url();?>js/jquery.form.js"></script>
<script>
$( document ).ready(function() {
	//openFavoriteInfo(1);
});

function ajaxindicatorstart(text)
{
	if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
	jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo asset_url();?>images/loading.gif" alt=""><div>'+text+'</div></div><div class="bg"></div></div>');
	}

	jQuery('#resultLoading').css({
		'width':'100%',
		'height':'100%',
		'position':'fixed',
		'z-index':'10000000',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto'
	});

	jQuery('#resultLoading .bg').css({
		'background':'#000000',
		'opacity':'0.7',
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'top':'0'
	});

	jQuery('#resultLoading>div:first').css({
		'width': '250px',
		'height':'75px',
		'text-align': 'center',
		'position': 'fixed',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto',
		'font-size':'16px',
		'z-index':'10',
		'color':'#ffffff'

	});

    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}
function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}
function customAlert(msg) {
	$("#customAlertText").html(msg);
	$('#customAlertBox').modal({show:true,backdrop: 'static',keyboard: false});
}
</script>
