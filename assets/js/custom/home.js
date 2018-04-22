function openHomePage() {
	$("#main-page-lock").slideUp("slow");
	$("#main-page").show();
	$('.slider').slick('unslick'); /* ONLY remove the classes and handlers added on initialize */
        $('.slider').slick({
           infinite: false,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 7
        });
}

function termscondition(type)
{
	 $.post(base_url+'account/termscondition',{type:type},function(data) {
		 document.getElementById('termsconditiondiv').innerHTML = data;
		 if(type == 3) {
			 privacyterms();
		 }
		 if(type == 2) {
			 generalterms();
		 }
	 },'html');
	$('#myTermCondition').modal('show');
	if(type == 1) {
		$('#myModal').modal('hide');
	}
	document.getElementById('termstitle').innerHTML = "TrdStation Terms of Use. <br/> Legal Information &amp; Conditions, was updated on Oct. 1st, 2017.";
}
function generalterms()
{
	document.getElementById('generalterms').style.display = 'block';
	document.getElementById('paidservice').style.display = 'none';
	document.getElementById('privacyterms').style.display = 'none';
	document.getElementById('generalterms').style.color = '#ff5c33';
	document.getElementById('termstitle').innerHTML = "TrdStation Terms of Use. <br/> Legal Information &amp; Conditions, was updated on Oct. 1st, 2017.";
	$("#gtcterms").addClass("active");
	$("#prterms").removeClass("active");
	$("#pstterms").removeClass("active");
}
function paidserviceterms()
{
	document.getElementById('paidservice').style.display = 'block';
	document.getElementById('generalterms').style.display = 'none';
	document.getElementById('privacyterms').style.display = 'none';
	document.getElementById('paidservice').style.color = '#ff5c33';
	document.getElementById('termstitle').innerHTML = "TrdStation Terms of Use. <br/> Legal Information &amp; Conditions For Black Horse Members, was updated on Oct. 1st, 2017.";
	$('.termslink').css( {" color" : "#ff5c33" });
	$("#pstterms").addClass("active");
	$("#gtcterms").removeClass("active");
	$("#prterms").removeClass("active");
}
function privacyterms()
{
	document.getElementById('privacyterms').style.display = 'block';
	document.getElementById('paidservice').style.display = 'none';
	document.getElementById('generalterms').style.display = 'none';
	document.getElementById('privacyterms').style.color = '#ff5c33';
	document.getElementById('termstitle').innerHTML = "Privacy Policy <br/>The TrdStation Privacy Policy was updated on Oct. 1st, 2017.";
	$("#prterms").addClass("active");
	$("#gtcterms").removeClass("active");
	$("#pstterms").removeClass("active");
	
}
function closeterms()
{
	var termsopentype = $('#termsopentype').val();
	$('#myTermCondition').modal('hide');
	if(termsopentype == 1) {
		$('#myModal').modal('show');
	}
 	
}
/**
 * function added for loading when click on alert tab
 * @param text
 * @returns
 */
function alertajaxindicatorstart(text)
{
	if(jQuery('.editaccount_outer').find('#alertresultLoading').attr('id') != 'alertresultLoading'){
		jQuery('.editaccount_outer').append('<div id="alertresultLoading" style="display:none"><div><img src="'+base_url+'assets/images/loading.gif" alt=""><div></div></div><div class="bg"></div></div>');
	}

	jQuery('#alertresultLoading').css({
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

	jQuery('#alertresultLoading .bg').css({
		'background':'#000000',
		'opacity':'0.7',
		'width':'100%',
		'height':'100%',
		'position':'absolute',
		'top':'0'
	});

	jQuery('#alertresultLoading>div:first').css({
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

    jQuery('#alertresultLoading .bg').height('100%');
    jQuery('#alertresultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

/**
 * function to stop ajax loader
 * @returns
 */
function alertajaxindicatorstop()
{
    jQuery('#alertresultLoading .bg').height('100%');
    jQuery('#alertresultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}