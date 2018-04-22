<?php foreach ($catalogues as $catalogue) { ?>
<div style="text-align: center; margin-bottom: 5px; width:140px;height:155px;">
	<div style="position:relative;width: 140px;top:-10px;">
		<a href="javascript:viewNextCatalogueBook(<?php echo $catalogue['id'];?>);">
			<span style="background-color:#F05539;color:#FFFFFF;font-family:Georgia;font-size:13px;"><strong><?php echo $catalogue['catalogue_title'];?></strong></span>
		</a>
	</div>
	<a href="javascript:viewNextCatalogueBook(<?php echo $catalogue['id'];?>);">
	<img src="<?php echo asset_url(); ?>images/vCAT2.png" class="img-responsive carousel_img" style="display: inline-block;width:77px;" >
	<div style="position:relative;width:65px;top:-70px;left:38px;">
		<img src="<?php echo asset_url().$catalogue['catalogue_cover']; ?>" class="img-responsive" style="display: inline-block;border-radius:50%;border:1px solid #F05539;padding: 0px !important;">
	</div>
	</a>
</div>
<?php } ?>