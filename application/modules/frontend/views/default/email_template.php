<?php 
switch ($templateType){
    case 'account_activation':
?>
<style>

#Image2
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Layer1
{
   background-color: transparent;
}
#Layer2
{
   background-color: #FFFFFF;
   border: 1px #C0C0C0 solid;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: left;
}
#wb_Text3 div
{
   text-align: left;
}
#Layer14
{
   background-color: #FF6347;
}
#wb_Text7 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: left;
}
#wb_Text7 div
{
   text-align: left;
}
#Image1
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: left;
}
#wb_Text1 div
{
   text-align: left;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: left;
}
#wb_Text2 div
{
   text-align: left;
}

</style>
<div style="position:absolute;text-align:center;left:154px;top:0px;width:702px;z-index:15;margin:auto;" id="Layer1">
<div style="width:702px;position:relative;margin-left:auto;margin-right:auto;text-align:left;" id="Layer1_Container">
<div style="position:absolute;text-align:center;left:31px;top:0px;width:634px;z-index:7;background-color: #ffffff;border: 1px solid #c0c0c0;" id="Layer2">
<div style="width:634px;position:relative;margin-left:auto;margin-right:auto;text-align:left;" id="Layer2_Container">
<div id="wb_Image2" style="position:absolute;left:0px;top:0px;width:634px;height:323px;z-index:0;">
<img src="<?php echo asset_url();?>images/email-template/backdrop.jpg" id="Image2" alt=""></div>
<div style="height: 24px;position: absolute;text-align: center;top: 341px;width: 100%;z-index: 6;background-color: transparent;border: 0 solid #000000;margin: auto;" id="wb_Text2">
<span style="color:#FF6347;font-family:Helvetica;font-size:21px;"><strong>Hi <?php echo $name; ?></strong></span></div><div style="position:absolute;left:143px;top:374px;width:363px;height:15px;z-index:5;text-align:left;background-color: transparent;border: 0 solid #000000;margin: auto;padding: 13px;text-align: left;" id="wb_Text1">
<span style="color:#666666;font-family:Helvetica;font-size:12px;">Welcome to VCOMMERS! We're very excited to have you on board</span></div><div id="wb_Image1" style="position:absolute;left:222px;top:421px;width:176px;height:176px;z-index:4;margin:auto;padding-top: 20px;">
<img src="<?php echo asset_url();?>images/email-template/vlogo-in-back.png" id="Image1" alt="" style="height: 176px;width: 176px;"></div>
<div style="position:absolute;left:45px;top:626px;width:525px;height:35px;z-index:1;text-align:left;background-color: transparent;border: 0 solid #000000;margin: 0;padding: 0;text-align:left;margin: auto;padding-top: 11px;" id="wb_Text3">
<span style="color:#000000;font-family:Arial;font-size:13px;">Here's your activation code </span><span style="color:#000000;font-family:Arial;font-size:17px;"><?php echo $activationCode; ?></span><span style="color:#000000;font-family:Arial;font-size:13px;">, please copy and paste into the account activation form to complete creating your account.</span></div>
<div style="position:absolute;text-align:left;left:46px;top:703px;width:525px;height:2px;z-index:2;background-color: #ff6347;margin:auto;margin-top:32px;" id="Layer14">
</div>
<div style="position:absolute;left:225px;top:732px;width:191px;height:32px;z-index:3;text-align:left;background-color: transparent;border: 0 solid #000000; text-align: left;background-color: transparent;border: 0 solid #000000;margin: auto;padding-top: 30px;text-align: left;" id="wb_Text7">
<span style="color:#000000;font-family:Arial;font-size:13px;">Thanks for using VCOMMERS<br></span></div>
</div>
</div>
</div>
</div>
<?php 
break;
case 'passwordRecovery':
?>
<style>
.invoicetdclass {
	border: 2px #FF6347 dotted !important;
}
.editinvoicetd {
	background-color:white;
	border: 2px #FF6347 dotted !important;
}
.textstyle {
	    width: 561px;
    height: 129px;
}
.edit-textcolor {
	color:#5F88F0 !important;
}
.btnaddress {
	width:106px; 
	height: 27px;
	background-color:#696969;
	border:1px #A0A0A0 solid;
	color: #A9A9A9; 
	font-family: 'MS Shell Dlg'; 
	font-size: 11px;"
}
.btnaddress:hover {
	background-color:#1a53ff;
	color:white;
}
#buyeraddresspopup {
	background-color: #3C3C3C; 
	width: 400px;min-height: 220px; 
	position: absolute; margin-top: 250px;
    margin-left: 425px; 
    visibility: visible; 
    z-index: 1922;
    box-shadow: 4px 4px 7px #151414;
}
.editlink a:hover{
	text-decoration: none;
}
.productpricepopup {
	background-color: #3C3C3C; 
	width: 400px;min-height: 220px; 
	padding:22px;
	position: absolute;
    visibility: visible; 
    z-index: 1922;
    box-shadow: 4px 4px 7px #151414;
}
.inputboxstyle {
	width: 335px;min-height: 95px;
}
.termspopup {
	background-color: #3C3C3C; 
	width: 611px;min-height: 220px; 
	padding:22px;
	position: absolute;
    visibility: visible; 
    z-index: 1922;
    box-shadow: 4px 4px 7px #151414;
}
</style>
<div style="position:absolute;text-align:center;left:151px;top:0px;width:702px;z-index:15;margin:auto;" id="Layer3">
<div style="width:702px;position:relative;margin-left:auto;margin-right:auto;text-align:left;" id="Layer3_Container">
<div style="position:absolute;text-align:center;left:31px;top:0px;width:634px;z-index:7;background-color: #ffffff;border: 1px solid #c0c0c0;" id="Layer4">
<div style="width:634px;position:relative;margin-left:auto;margin-right:auto;text-align:left;" id="Layer4_Container">
<div id="wb_Image2" style="position:absolute;left:0px;top:0px;width:634px;height:323px;z-index:0;">
<img src="<?php echo asset_url();?>images/email-template/backdrop.jpg" id="Image2" alt=""></div><div style="height: 24px;position: absolute;text-align: center;top: 341px;width: 100%;z-index: 5;background-color: transparent;border: 0 solid #000000;margin: auto;" id="wb_Text8">
<span style="color:#FF6347;font-family:Helvetica;font-size:21px;"><strong>Hi <?php echo $prefix.' '.$name;?></strong></span></div><div style="position:absolute;left:143px;top:374px;width:363px;height:15px;z-index:4;text-align:left;background-color: transparent;border: 0 solid #000000;margin: auto;padding-top: 11px;text-align: left;" id="wb_Text6">
<span style="color:#666666;font-family:Helvetica;font-size:12px;">Welcome to VCOMMERS! We're very excited to have you on board</span></div><div style="position:absolute;left:222px;top:421px;width:176px;height:176px;z-index:3;margin:auto;padding-top:15px;" id="wb_Image3">
<img alt="" id="Image3" style="border: 0 solid #000000;height: 100%;left: 0;top: 0;width: 100%;" src="<?php echo asset_url();?>images/email-template/vlogo-in-back.png"></div><div id="wb_Text3" style="position:absolute;left:195px;top:626px;width:233px;height:51px;text-align:center;z-index:6;background-color: transparent;border: 0 solid #000000;margin: auto;padding-top: 25px;text-align: center;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Your password recovery code is <br><br></span><span style="color:#FF6347;font-family:Arial;font-size:17px;"><?php echo $activationCode;?></span></div>
<div style="position:absolute;text-align:left;left:46px;top:703px;width:501px;height:2px;z-index:1;background-color: #ff6347;margin:auto;margin-top:15px;" id="Layer5">
</div>
<div style="position:absolute;left:225px;top:732px;width:191px;height:45px;z-index:2;text-align:left;background-color: transparent;border: 0 solid #000000;margin: auto;padding-top: 15px;text-align: left;" id="wb_Text5">
<span style="color:#000000;font-family:Arial;font-size:13px;">Thanks for using VCOMMERS<br></span></div>
</div>
</div>
</div>
</div>
<?php
    break;
} ?>