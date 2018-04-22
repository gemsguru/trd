<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $template['title']; ?></title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="The World's First Interactive Social B2B Platform">
<meta name="keywords" content="sourcing product, e-commerce, business, trade, stocks, commerce, community, video tube, business
chat, buyers, sellers, shippers, products, china, exporters, suppliers, shipping, cargo, b2b">
<meta name="author" content="Hazem Mohamed Zaki">
<meta name="categories" content="B2B E-commerce">
<meta name="generator" content="Hotline Internet & Technology Co. Ltd.">
<?php if(!empty($browser_icon)) { ?>
<link href="<?php echo asset_url(); ?>images/<?php echo $browser_icon;?>" rel="shortcut icon" type="image/x-icon">
<?php } else { ?>
<link href="<?php echo asset_url(); ?>images/home.ico" rel="shortcut icon" type="image/x-icon">
<?php } ?>
<!-- link rel="shortcut icon" href="<?php echo asset_url();?>images/Homekit.png"-->
<link href="<?php echo asset_url(); ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>css/slick.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/slick-theme.css">
<link href="<?php echo asset_url(); ?>css/registration.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset_url();?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo asset_url();?>css/pages/<?php echo $page;?>.css?1">
<link rel="stylesheet" href="<?php echo asset_url();?>css/pages/common.css?1">
<style>
ul.dropdown-menu li > a:hover {
    background-color: #f1f1f1 !important;
}
a:focus,.btn:active {
   outline: none !important;
}
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo asset_url();?>images/loading.gif') 50% 50% no-repeat rgb(0,0,0);
    opacity: 0.7;
}
#RollOverToTop a
{
   display: block;
   position: relative;
   height: 100%;
   width: 100%;
}
#RollOverToTop a img
{
   position: absolute;
   z-index: 1;
   border-width: 0;
}
#RollOverToTop span
{
   display: block;
   height: 100%;
   width: 100%;
   position: absolute;
   z-index: 2;
}
#RollOverToTop a .hover
{
   visibility: hidden;
}
#RollOverToTop a:hover .hover
{
   visibility: visible;
}
#RollOverToTop a:hover span
{
   visibility: hidden;
}
#RollOverToTop img
{
   border-width: 0;
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
img.withloader {
  background: url('<?php echo asset_url();?>images/loading.gif') no-repeat center;
}
</style>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
	var base_url = '<?php echo base_url(); ?>';
	var asset_url = '<?php echo asset_url();?>';
</script>
<script src="<?php echo asset_url(); ?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo asset_url(); ?>js/bootstrap.js"></script>
<?php if(isset($tsuserid)) { ?>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>chat/js.php"></script>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>chat/css.php" />
<?php } ?>
<script>
$(window).load(function() {
	document.getElementById('cometchat_chatboxes').style.right='0px';
	document.getElementById('cometchat_userstab_popup').style.display='none';
	document.getElementById('cometchat_userstab').style.display='none';
});
function chat_with(user_id,accept_chat=true)
{
	<?php if(isset($tsuserid)) { ?>
		if(accept_chat == true){
			jqcc.cometchat.chatWith(user_id);
    		document.getElementById('cometchat_chatboxes').style.right='0px';
		}else{
			// customAlert('Sorry.. User status is " Don\'t Disturb".. Please try again later, status may be changed soon.');
			customAlert('This buyer in not allow chat feature..');
		}
    <?php }else{ ?>
    	alert("PLEASE LOGIN TO CHAT");
    <?php } ?>
}
function customAlert(msg) {
	$("#customAlertText").html(msg);
	$('#customAlertBox').modal({show:true,backdrop: 'static',keyboard: false});
}
function confirmbox(msg, yesCallback, noCallback) {
    $('#cnb_message').html(msg);
    $('#confirmBoxModal').modal({show:true,backdrop: 'static',keyboard: false});

    $("#cnbYes").unbind("click");
    $('#cnbYes').bind("click",function() {
        $("#confirmBoxModal").modal('hide');
        yesCallback();
    });

    $("#cnbNo").unbind("click");
    $('#cnbNo').bind("click",function() {
    	$("#confirmBoxModal").modal('hide');
        noCallback();
    });
}
</script>
</head>
<body>
	<?php if($page == 'desksite') { ?>
	<div class="loader"></div>
	<?php } ?>
    <?php echo $template['partials']['header']; ?>
    <?php echo $template['body']; ?>
	<?php echo $template['partials']['footer']; ?>
<div id="customAlertBox" class="modal fade" role="dialog" style="z-index:13000;">
  	<div class="modal-dialog" style="width:500px;">
    	<div class="modal-content" style="border-radius:0px;margin-top:25%;">
      		<div class="modal-body">
      			<div class="row" style="padding-top:10px;">
      				<div class="col-sm-1"></div>
      				<div class="col-sm-10">
	      				<div style="text-align: center;">
	      					<br>
							<span style="color: #F05539; font-family: 'Arial Black'; font-size: 16px;">ALERT</span>
						</div>
						<br>
						<div style="text-align: center;font-size:13px;font-family:Arial;" id="customAlertText">
							My Alert
						</div>
					</div>
					<div class="col-sm-1"></div>
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
<div id="confirmBoxModal" class="modal fade" role="dialog" style="z-index:13000;">
  	<div class="modal-dialog" style="width:400px;">
    	<div class="modal-content" style="border-radius:0px;margin-top:25%;">
      		<div class="modal-body">
      			<div class="row" style="padding-top:10px;">
      				<div class="col-sm-2"></div>
      				<div class="col-sm-8">
	      				<div style="text-align: center;">
							<span style="color: #F05539; font-family: 'Arial Black'; font-size: 16px;">WARNING</span>
						</div>
						<br><br>
						<div style="text-align: center;" id="cnb_message">
							
						</div>
					</div>
					<div class="col-sm-2"></div>
      			</div>
      			<br>
      			<div class="row text-center">
      				<input type="button" class="btn btn-sm btn-danger-custom" style="width:100px;" id="cnbYes" value="Yes"/>
      				<input type="button" class="btn btn-sm btn-danger-custom" style="width:100px;" id="cnbNo" value="No"/>
      			</div>
      			<br><br>
      		</div>
    	</div>
  	</div>
</div>
</body>
</html>
<script src="<?php echo asset_url(); ?>js/custom/account.js"></script>
<script>
function ajaxindicatorstart(text)
{
	if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
	jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo asset_url();?>images/loading.gif" alt="Loading..."><div>'+text+'</div></div><div class="bg"></div></div>');
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
function myloadingstart(id)
{
	if(jQuery('#'+id).find('#resultLoading').attr('id') != 'resultLoading'){
	jQuery('#'+id).append('<div id="resultLoading" style="display:none"><div><img src="<?php echo asset_url();?>images/loading.gif" alt="Loading..."></div><div class="bg"></div></div>');
	}

	jQuery('#resultLoading').css({
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'z-index':'10000000',
		'top':'0',
		'left':'0',
		'right':'0',
		'bottom':'0',
		'margin':'auto'
	});

	jQuery('#resultLoading .bg').css({
		'background':'#fff',
		'opacity':'1',
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'top':'0'
	});

	jQuery('#resultLoading>div:first').css({
		'width': '250px',
		'height':'75px',
		'text-align': 'center',
		'position': 'absolute',
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
    jQuery('#'+id).css('cursor', 'wait');
}
function myloadingstop(id)
{
    jQuery('#resultLoading .bg').height('100%');
       jQuery('#resultLoading').fadeOut(300);
    jQuery('#'+id).css('cursor', 'default');
}
$(window).scroll(function(){
	$(this).scrollTop()<200?$("#totop").fadeOut():$("#totop").fadeIn()
});
$("#totop").on("click",function(){
	return $("html, body").animate({scrollTop:0},"fast"),!1
});
<?php if($page == 'desksite') { ?>
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
<?php } ?>
</script>