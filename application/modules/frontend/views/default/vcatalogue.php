<link rel="stylesheet" href="<?php echo asset_url(); ?>css/pages/v-catalogue.css" />
<div id="vcatalogue_overlay" class="modal fade" style="background-color:#404040;z-index:10000;">
	<div class="modal-dialog" style="background-color:#404040;width:1000px;">
		<div class="modal-content" style="background: transparent;box-shadow:none;-webkit-box-shadow:none;border: 0px;">
				<div style="position:absolute;right:0;width:50px;height:50px;z-index:5000;"><button type="button" class="pull-right" data-dismiss="modal" aria-hidden="true" style="background:transparent;border:0px;"><img src="<?php echo asset_url();?>images/newicons/closeround.png" id="Image47" alt="" style="width:35px;height:35px;"></button></div>
				<div class="modal-body catalogue_modal_body" style="width:1000px;height:640px;">
					<input type="hidden" id="pcatalogue_id" value="" />
					<div class="row" style="margin-left:-15px;margin-right:-15px;">
						<div class="col-md-1" style="float:left;padding:0px;width:115px;"></div>
						<div class="col-md-9" style="width:770px;padding:0px;padding-top:10px;">
							<div id="catalogue_page_content_inner" class="catalogue_outer_body" style="margin-left:0px;">
							</div>
						</div>
						<div class="col-md-1" style="padding:0px;width:80px;float:right;" id="share_it">
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<link href="<?php echo asset_url();?>css/jquery.booklet.1.1.0.css?1.1" rel="stylesheet">
<script src="<?php echo asset_url();?>js/jquery.booklet.1.1.0.min.js?1.1"></script>
<script>
function viewCatalogueBook(id) {
	ajaxindicatorstart('');
	$.get(base_url+"catalogue/business/next/"+id,{},function(data){
		ajaxindicatorstop();
		$("#catalogue_page_content_inner").html(data.html);
		$("#pcatalogue_id").val(id);
		$("#vcatalogue_overlay").modal('show');
		var shareIt = '<ul class="share pull-right text-center">'
			 +'<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#24A7DB;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Views<br> <span id="vdiv'+data.id+'">'+data.views+'</span></label></li>'
			 +'<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#32AA2B;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Likes<br> <span id="sdiv'+data.id+'">'+data.likes+'<span></label></li>'
			 +'</ul>'
			 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 245px;width:35px;height:35px;z-index:380;" onclick="chat_with("'+data.user_id+'","'+data.accept_chat+'")">'
			 +'<a>'
			 +'<img class="hover" src="<?php echo asset_url()?>images/chatwhite.png" alt="view">'
			 +'<span><img alt="View" src="<?php echo asset_url()?>images/chat_button2.png"></span>'
			 +'</a>'
			 +'</div>'
			 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 290px;width:35px;height:35px;z-index:380;">'
			 +'<a href="javascript:likeCatalogue('+data.id+');">'
			 +'<img class="hover" src="<?php echo asset_url()?>images/items_likewhite.png" alt="view">'
			 +'<span><img alt="View" src="<?php echo asset_url()?>images/items_like2.png"></span>'
			 +'</a>'
			 +'</div>'
			 +'<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 335px;width:35px;height:35px;z-index:380;">'
			 +'<a href="javascript:addToMyFavourite('+data.busi_id+',7);">'
			 +'<img class="hover" src="<?php echo asset_url()?>images/addtofav.png" alt="view">'
			 +'<span><img alt="View" src="<?php echo asset_url()?>images/favorite_chery.gif"></span>'
			 +'</a>'
			 +'</div>';
		$("#share_it").html(shareIt);
		var $mybook 		= $('#mybook');
		var $bttn_next		= $('#next_page_button');
		var $bttn_prev		= $('#prev_page_button');
		var $loading		= $('#loading');
		var $mybook_images	= $mybook.find('img');
		var cnt_images		= $mybook_images.length;
		var loaded			= 0;
		//preload all the images in the book,
		//and then call the booklet plugin
		$mybook_images.each(function(){
			var $img 	= $(this);
			var source	= $img.attr('src');
			$('<img/>').load(function(){
				++loaded;
				if(loaded == cnt_images){
					$loading.hide();
					$bttn_next.show();
					$bttn_prev.show();
					$mybook.show().booklet({
						name:               null,                            // name of the booklet to display in the document title bar
						width:              770,                             // container width
						height:             460,                             // container height
						speed:              600,                             // speed of the transition between pages
						direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
						startingPage:       0,                               // index of the first page to be displayed
						easing:             'easeInOutQuad',                 // easing method for complete transition
						easeIn:             'easeInQuad',                    // easing method for first half of transition
						easeOut:            'easeOutQuad',                   // easing method for second half of transition

						closed:             false,                           // start with the book "closed", will add empty pages to beginning and end of book
						closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
						closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
						closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
						closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
						covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

						pagePadding:        10,                              // padding for each page wrapper
						pageNumbers:        false,                            // display page numbers on each page

						hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
						overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
						tabs:               false,                           // adds tabs along the top of the pages
						tabWidth:           60,                              // set the width of the tabs
						tabHeight:          20,                              // set the height of the tabs
						arrows:             true,                           // adds arrows overlayed over the book edges
						cursor:             'pointer',                       // cursor css setting for side bar areas

						hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
						keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
						next:               $bttn_next,          			// selector for element to use as click trigger for next page
						prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page

						menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
						pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
						chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

						shadows:            true,                            // display shadows on page animations
						shadowTopFwdWidth:  166,                             // shadow width for top forward anim
						shadowTopBackWidth: 166,                             // shadow width for top back anim
						shadowBtmWidth:     50,                              // shadow width for bottom shadow

						before:             function(){},                    // callback invoked before each page turn animation
						after:              function(){}                     // callback invoked after each page turn animation
					});
					//Cufon.refresh();
				}
			}).attr('src',source);
		});
	},'json');
}
</script>