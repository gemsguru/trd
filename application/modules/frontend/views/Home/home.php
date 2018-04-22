<link href="<?php echo asset_url(); ?>css/pages/home.css" rel="stylesheet">
<!--script src="<?php echo asset_url(); ?>js/jquery-1.11.1.min.js"></script-->
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-fade.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.slideshow.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.stickylayer.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.carousel.effects.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wb.carousel.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.core.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.widget.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.position.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.tooltip.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-blind.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-bounce.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-clip.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-drop.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-explode.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-fold.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-highlight.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-pulsate.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-scale.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-shake.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.ui.effect-slide.min.js"></script>
<script src="<?php echo asset_url(); ?>js/wwb10.min.js"></script>
<script src="<?php echo asset_url(); ?>js/custom/home.js"></script>
<link href="<?php echo asset_url(); ?>css/jquery.booklet.1.1.0.css?1.1" rel="stylesheet">
<script src="<?php echo asset_url(); ?>js/jquery.booklet.1.1.0.min.js?1.1"></script>
<script src="<?php echo asset_url(); ?>js/jquery.easing.1.3.js?1.1"></script>
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/style-jq-3d-flip-book.css">
<script src="<?php echo asset_url(); ?>js/html2canvas.min.js"></script>
<script src="<?php echo asset_url(); ?>js/three.min.js"></script>
<script src="<?php echo asset_url(); ?>js/pdf.min.js"></script>
<script src="<?php echo asset_url(); ?>js/3dflipbook.min.js"></script>
<style>
    .carousel_img {
        padding: 0% 23% !important; 
    }
    .hover-menu {
        position: absolute;
        height: 50px;
        width: 100%;
        bottom: 7px;
        /*     background: rgba(0,0,0,0.70); */
        left: 0;
        display: none;
    }
    #Carousel5 .frame,#Carousel4 .frame
    {
        width: 517px;
        display: inline-block;
        float: left;
        /*height: 267px;*/
    }
    a.style16:hover {
        color: #FF7F50;
        text-decoration: underline;
    }
    a.style16 {
        color: #4169E1;
        text-decoration: underline;
        width: 250px;
    }
    #divtestproduct{
        padding-top:12px;
    }
    .slick-next {
        right: -1.3% !important;
    }
</style>
<div class="container" style="background: #f1f1f1; padding: 50px 0px">
    <div class="row" style="margin-bottom: 20px;">
        <!--<div class="" style="margin-bottom: 20px;">-->
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading" style="background: #ffffff; border: none;color: #3C3C3C; font-family: Georgia; font-size: 16px;">
                    Categories
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="search-div"> 
                <form method="post" action="search">
                    <div class="col-sm-7 col-xs-11" style="padding: 0px;">
                        <input type="text" class="search-box" required="required" name="keyword" placeholder="Type a keyword to seach ( product, company or name )...">
                    </div>
                    <div class="col-sm-2 col-xs-3 " style="padding: 0px;">
                        <div class="dropdown">
                            <select class="search-box" onchange ="validate();" class="required" required name='type'>
                                <option value="" >Search for</option>
                                <option value="1">Sellers</option>
                                <option value="2">Shippers</option>
                                <option value="3">Buyers</option>
                                <option value="4">Products</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-3 " style="padding: 0px;">
                        <div class="dropdown">
                            <select class="search-box" name='country'>
                                <option value="0_0">Country</option>
                                <?php foreach ($Country as $country) { ?>
                                    <option value="<?php echo $country['id'] . '_' . $country['name']; ?> "><?php echo $country['name']; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-1" style="padding: 0px;">
                        <button class="btn btn-block search-btn" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row categery-slider1">
            <div class="col-sm-12" style="background:#FAFAFA; min-height:250px; padding:0 55px;">
                <section class="center2 slider">
                    <?php
                    $i = 1;
                    foreach ($procategories as $product) {
                        ?>
                        <div style="position:relative;">
                            <a href="#" id="tab<?php echo $i; ?>">
                                <div class="tumb-slide cat_slide" alt="cat_slider_<?php echo $i; ?>">
                                    <img src="<?php echo asset_url(); ?>images/ts/Agriculture.png">
                                </div>
                                <h4 class="text-center " style="color:#2D2D2D;font-family:Arial;font-size:16px;"><?php echo ucfirst($product['name']); ?></h4>
                            </a>

                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </section>
            </div>
            <div class="col-xs-12" style="position:relative;display:none;background-color: #fff;z-index: 300;" id="Details">
                <div class="panel categary-detials" style="position:absolute;width: 100%;margin: auto;left: 0;z-index: 1;">
                    <div class="panel-heading" style="background-color: #fff;">
                        <div class="col-xs-11"><img src="<?php echo asset_url(); ?>images/img3681.png" style="width:25px;"></div>
                    </div>
                    <?php
                    $i = 1;
                    foreach ($procategories as $product) {
                        ?>
                        <div class="panel-body panel slide-details" id="cat_slider_<?php echo $i; ?>" style="background-color: #fff;">
                            <div class="row" style="padding-top:50px; padding-bottom:50px;z-index: 200;">
                                <?php
                                $j = 1;
                                foreach ($prosubcategories as $res) {
                                    if ($res['mcat_id'] == $product['id']) {
                                        ?>
                                        <div class="col-md-3">
                                            <ul style="list-style:none;margin-bottom: -5px;">
                                                <li>
                                                    <a class="btn btn-link sub_cat <?php echo strtolower(substr($res['name'], 0, 1)); ?>" href="#" style="color:#337ab7;"><?php echo $res['name']; ?></a>
                                                </li>
                                            </ul>    
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <a href="javascript:void(0)" onclick="highlight_keywords('a');" class="btn btn-default">A</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('b');" class="btn btn-default">B</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('c');" class="btn btn-default">C</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('d');" class="btn btn-default">D</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('e');" class="btn btn-default">E</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('f');" class="btn btn-default">F</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('g');" class="btn btn-default">G</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('h');" class="btn btn-default">H</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('i');" class="btn btn-default">I</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('j');" class="btn btn-default">J</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('k');"class="btn btn-default">K</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('l');"class="btn btn-default">L</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('m');"class="btn btn-default">M</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('n');"class="btn btn-default">N</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('o');"class="btn btn-default">O</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('p');"class="btn btn-default">P</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('q');"class="btn btn-default">Q</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('r');"class="btn btn-default">R</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('s');"class="btn btn-default">S</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('t');"class="btn btn-default">T</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('u');"class="btn btn-default">U</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('v');"class="btn btn-default">V</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('w');"class="btn btn-default">W</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('x');"class="btn btn-default">X</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('y');"class="btn btn-default">Y</a>
                                    <a href="javascript:void(0)" onclick="highlight_keywords('z');" class="btn btn-default">Z</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">

            <div class="col-sm-12 col-lg-4">
                <div class="panel disk-tab">
                    <div class="panel-heading" style="padding-left: 0px;">
                        <h2 class="font2">DESKSITES</h2>
                        <p>
                            <small class="font3">Experience A New Vision Of Websites Techniques With Quick
                                Access, Rich Information And Much More..</small>
                        </p>
                    </div>
                    <div class="panel-body discoverbtn" style="position: relative;margin-left:0px;">
                        <div id="tab-slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner section1" role="listbox">
                                <?php
                                $i = "0";
                                foreach ($desksites as $desksite) {
                                    $i++;
                                    ?>
                                    <div  style="padding-top:30px;" class="item <?php if ($i == 1) {
                                        echo "active";
                                    } ?>">
                                        <div class="col-sm-12 text-center" style="padding:5px 0px;">
                                            <span style="color:#1E90FF;font-family:Arial;font-size:12px;"><a href="<?php echo base_url() . 'desksite/' . $desksite['id']; ?>" target="_blank" class="hstyle19"><?php echo $desksite['company_name'] ?></a></span>
                                        </div>
                                        <div class="col-sm-offset-1 col-sm-10 text-center">
                                            <small style="color:#2D2D2D;font-family:Arial;font-size:11px;"><?php echo substr($desksite['product_name'], 0, 100); ?></small>
                                        </div>
                                        <div class="col-sm-12 text-center uppercase" style="padding:8px 0px;"><?php echo $desksite['company_country'] ?> | <?php echo $desksite['company_province'] ?></div>
                                        <div class="col-xs-12 text-center">
                                            <?php if (!empty($desksite['in_community'])) { ?><img src="<?php echo asset_url(); ?>images/CommMember.png"  style="width:26px;height:26px; display: inline-block;"> <?php } ?>
                                            <?php if ($desksite['gaurantee_period'] != '') { ?><img src="<?php echo asset_url(); ?>images/ts/guarantee.png"  style="width:34px;height:26px; display: inline-block;"> <?php } ?>
    <?php if ($desksite['is_logo_verified'] > 1) { ?><img src="<?php echo asset_url(); ?>images/trusted.png" style="width:26px; display: inline-block;"> <?php } ?>
    <?php if ($desksite['plan_id'] > 1) { ?><img src="<?php echo asset_url(); ?>images/member-logo.png" style="width:25px; display: inline-block;"><?php } ?>
                                        </div>
                                        <div class="col-xs-12" style="margin-top: 30px;">
                                            <a href="#" class=""><img src="<?php echo asset_url() . $desksite['desksite_bg1']; ?>" class="img-responsive" style="padding: 0px !important;height:313px;width:376px;"></a>
                                        </div>
                                        <div class="discover">
                                            <a target="_blank" href="<?php echo base_url() . 'desksite/' . $desksite['id']; ?>" class="btn btn-danger btn-lg">Discover</a>
                                        </div>
                                    </div>
<?php } ?>
                            </div>
                        </div>
                        <div style="position: relative;top: -30px;width: 345px;left: 35px;">
                            <a class="left carousel-control control" href="#tab-slider" role="button" data-slide="prev">
                                <img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previoustxt0blk.png">
                            </a> 
                            <a class="right carousel-control control" href="#tab-slider" role="button" data-slide="next">
                                <img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nexttxt0blk.png">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="panel disk-tab">
                    <div class="panel-heading">
                        <h2 class="font2">PRODUCTS IN 3D</h2>
                        <p>
                            <small class="font3">Hold On The Product And Swipe Righ Or Left</small><br>
                            &nbsp;
                        </p>
                    </div>
                    <div class="panel-body mytab">
                        <div id="tab-slider2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner section2" role="listbox" style="height:552px;">

                                <?php
                                $i = "0";
                                foreach ($products3D as $product3D) {
                                    $i++;
                                    ?>
                                    <div class="item <?php if ($i == 1) {
                                        echo "active";
                                    } ?>" style="height:543px;padding-top:30px;">
                                        <div class="text-center">
                                            <span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><?php echo $product3D['name'] ?></strong></span>
                                        </div>
                                        <div class="col-sm-12 text-center" style="padding:5px 0px;">
                                            <span style="color:#1E90FF;font-family:Arial;font-size:12px;"><a href="<?php echo base_url() . 'desksite/' . $product3D['busi_id']; ?>" target="_blank" class="hstyle19"><?php echo $product3D['company_name'] ?></a></span>
                                        </div>
                                        <p class="text-center"><?php echo $product3D['company_country'] ?> | <?php echo $product3D['company_province'] ?></p>
                                        <div class="col-xs-12 text-center">
    <?php if (!empty($product3D['in_community'])) { ?><img src="<?php echo asset_url(); ?>images/CommMember.png"  style="width:26px;height:26px; display: inline-block;"> <?php } ?>
    <?php if ($product3D['gaurantee_period'] != '') { ?><img src="<?php echo asset_url(); ?>images/ts/guarantee.png"  style="width:34px;height:26px; display: inline-block;"> <?php } ?>
    <?php if ($product3D['is_logo_verified'] > 1) { ?><img src="<?php echo asset_url(); ?>images/trusted.png" style="width:26px; display: inline-block;"> <?php } ?>
    <?php if ($product3D['plan_id'] > 1) { ?><img src="<?php echo asset_url(); ?>images/member-logo.png" style="width:25px; display: inline-block;"><?php } ?>
                                        </div>
                                        <div class="col-xs-12"
                                             style="margin-top: 5px; text-align: center; margin-bottom: 5px; height: 300px;padding: 25px;" onclick="open3DProduct(<?php echo $product3D['id']; ?>);">
                                            <img src="<?php echo asset_url() . $product3D['main_image']; ?>" class="img-responsive" style="display: inline-block">
                                        </div>
                                        <div class="text-center">
                                            <div><span style="color:#2D2D2D;font-family:Arial;font-size:11px;">USD</span> <span style="color:#2D2D2D;font-family:Arial;font-size:16px;"><?php echo number_format($product3D['unit_price'], 2, $locale['decimal_point'], $locale['thousands_sep']); ?> / <?php echo $product3D['unit'] ?></span></div>
                                            <p><span style="color:#787878;font-family:Arial;font-size:12px;">Min. Qty. <?php echo $product3D['quantity'] ?></span> </p>
                                        </div>

                                    </div>
                                    <div class="hover-menu text-center">
                                        <a target="_blank" href="<?php echo base_url() . 'products/details/' . $product3D['product_id']; ?>" class="btn">
                                            <img src="<?php echo asset_url(); ?>images/view2.png" style="width: 40px;"></a>
                                        <a target="_blank" href="<?php echo base_url(); ?>3dproducts" class="btn" >
                                            <img src="<?php echo asset_url(); ?>images/ts/from-sameblack.png" style="width: 40px;">
                                        </a> 
                                        <a href="javascript:addToMyFavourite(<?php echo $product3D['product_id']; ?>, 6);" class="btn">
                                            <img src="<?php echo asset_url(); ?>images/ts/favoriteclick.png" style="width: 40px;">
                                        </a> 
                                        <a class="btn" href="javascript:addToItemToCart(<?php echo $product3D['product_id']; ?>)">
                                            <img src="<?php echo asset_url(); ?>images/ts/aert.png" style="width: 40px;">
                                        </a>
                                    </div>
<?php } ?>
                                <a class="left carousel-control" href="#tab-slider2" role="button" data-slide="prev" style="background: none;padding-top:70%;text-align:center;"> 
                                    <span><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previous0.png"></span> 
                                </a> 
                                <a class="right carousel-control" href="#tab-slider2" role="button" data-slide="next" style="background: none;padding-top:70%;text-align:center;"> 
                                    <span><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/next0.png"></span> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="panel disk-tab">
                    <div class="panel-heading" style="padding-right: 0px;">
                        <h2 class="font2">V-CATALOGUES</h2>
                        <p>
                            <small class="font3">Follow The Latest Collection Of Global Sellers And Famouse
                                <br>Brands..</small>
                        </p>
                    </div>
                    <div class="panel-body mytab" style="margin-right: 0px;">
                        <div id="tab-slider3" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner section3" role="listbox" style="height:552px;">
                                <?php
                                $i = "0";
                                foreach ($vCatalogues as $vCatalogue) {
                                    $i++;
                                    ?>
                                    <div class="row item <?php if ($i == 1) {
                                        echo "active";
                                    } ?>" style="height:552px;padding-top:30px;">
                                        <div class="text-center"><span style="color:#303030;font-family:Georgia;font-size:13px;"><strong><?php echo $vCatalogue['catalogue_title']; ?></strong></span></div>
                                        <!--<div class="text-center"><span style="color:#696969;font-family:Arial;font-size:12px;"><strong>BY</strong></span></div>-->
                                        <div class="col-sm-12 text-center" style="padding:5px 0px;">
                                            <span style="color:#1E90FF;font-family:Arial;font-size:12px;"><a href="<?php echo base_url() . 'desksite/' . $vCatalogue['busi_id']; ?>" target="_blank" class="hstyle19"><?php echo $vCatalogue['company_name'] ?></a></span>
                                        </div>
                                        <div class="col-xs-12 text-center">
                                            <p class="text-center"><?php echo $vCatalogue['company_country']; ?> | <?php echo $vCatalogue['company_province']; ?></p>
                                            <div class="col-xs-12 text-center">
    <?php if (!empty($vCatalogue['in_community'])) { ?><img src="<?php echo asset_url(); ?>images/CommMember.png"  style="width:26px;height:26px; display: inline-block;"> <?php } ?>
    <?php if ($vCatalogue['gaurantee_period'] != '') { ?><img src="<?php echo asset_url(); ?>images/ts/guarantee.png"  style="width:34px;height:26px; display: inline-block;"> <?php } ?>
    <?php if ($vCatalogue['is_logo_verified'] > 1) { ?><img src="<?php echo asset_url(); ?>images/trusted.png" style="width:26px; display: inline-block;"> <?php } ?>
    <?php if ($vCatalogue['plan_id'] > 1) { ?><img src="<?php echo asset_url(); ?>images/member-logo.png" style="width:25px; display: inline-block;"><?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12" style="text-align: center; margin-bottom: 5px; height: 320px;margin-top: 30px;">
                                            <img src="<?php echo asset_url(); ?>images/vCAT2.png" class="img-responsive carousel_img" style="display: inline-block">
                                            <div style="position:absolute;width: 140px;top: 120px;left: 140px;">
                                                <img src="<?php echo asset_url() . $vCatalogue['catalogue_cover']; ?>" class="img-responsive" style="display: inline-block;border-radius:50%;border:2px solid #e55a43;padding: 0px !important;">
                                            </div>
                                            <div style="position:absolute;width: 140px;top:245px;left: 140px;">
                                                <span style="background-color:#F05539;color:#FFFFFF;font-family:Georgia;font-size:13px;"><strong><?php echo $vCatalogue['catalogue_title']; ?></strong></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 hover-menu text-center blue">
                                        <a href="javascript:viewCatalogueBook(<?php echo $vCatalogue['id']; ?>);"  class="btn">
                                            <img src="<?php echo asset_url(); ?>images/vacticonwhite.png" style="width: 40px;">
                                        </a> 
                                        <a href="<?php echo base_url() . 'desksite/' . $vCatalogue['busi_id']; ?>" target="_blank" class="btn" >
                                            <img src="<?php echo asset_url(); ?>images/deskiste_white.png" style="width: 40px;">
                                        </a> 
                                        <a href="<?php echo base_url() . 'vcatalogues'; ?>" target="_blank" class="btn">
                                            <img src="<?php echo asset_url(); ?>images/from-same-user.png" style="width: 40px;">
                                        </a> 
                                        <a href="javascript:addToMyFavourite(<?php echo $vCatalogue['id']; ?>, 7);" class="btn">
                                            <img src="<?php echo asset_url(); ?>images/addtofav.png" style="width: 40px;">
                                        </a>
                                    </div>
<?php } ?>
                                <a class="left carousel-control" href="#tab-slider3" role="button" data-slide="prev" style="background: none;padding-top:70%;text-align:center;"> 
                                    <span><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previous0.png"></span> 
                                </a> 
                                <a class="right carousel-control" href="#tab-slider3" role="button" data-slide="next" style="background: none;padding-top:70%;text-align:center;"> 
                                    <span><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/next0.png"></span> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 margintop">
        <div class="row"> 
            <div class="col-sm-12 tab-slider maxheight1">
                <div class="col-sm-3 col-lg-2 product1">
                    <div class="row" style="margin: 0px">
                        <h3 style="color: #fff; text-align: center;">
                            <span class="product-feature">FEATURED</span><br> 
                            <span class="product-feature-title">PRODUCTS</span>
                        </h3>
                        <div class="text-center displaydesktop">
                            <img src="<?php echo asset_url(); ?>/images/ts/dice0.png"
                                 class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-10" style="background: #fff; min-height: 272px;">
                    <div class="panel disk-tab">
                        <div class="panel-body mytab">
                            <div id="tab-slider4" class="carousel slide" data-ride="carousel" style="height: 280px;width: 100%;border:none;">
                                <div class="carousel-inner section3" role="listbox" style="height: 318px;overflow: hidden;border:none;">

                                    <?php
                                    $i = "0";
                                    foreach ($FeaturedProducts as $FeaturedProduct) {

                                        if ($i % 4 == 0) {
                                            $frame = $i;
                                            ?>
                                            <div class="item <?php if ($i == 0) {
                                                echo "active";
                                            } ?>" style="height:543px;padding-top:5px;border:none;padding-left: 30px;padding-right:30px;">
    <?php } $i++; ?>
                                            <div class="col-md-3" style="padding:0px 15px;border:none;">
                                                <div style="position: relative;border:none;">
                                                    <h4 class="text-center product-strong-text" style="margin-top: 0px;border:none;">
                                                        <strong><?php echo $FeaturedProduct['name']; ?></strong>
                                                    </h4>
                                                    <p class="text-center product-text ptext" ><?php echo $FeaturedProduct['description']; ?></p>
                                                    <div class="tumb-slide" style="border:none;">
                                                        <img src="<?php echo asset_url() . $FeaturedProduct['main_image']; ?>" class="imgresponsive" style="width:218px;height:177px;">
                                                        <div class="hover-thumb text-center">
                                                            <div id="wb_Image13" style="position:absolute;left: 75px;top: 70px;width:35px;height:35px;"><!-- z-index:851;-->
                                                                <a href="javascript:openProduct(<?php echo $FeaturedProduct['id']; ?>);">
                                                                    <img src="<?php echo asset_url(); ?>images/window0.png" id="Image13" alt="View">
                                                                </a>
                                                            </div>
                                                            <div id="RollOver37" style="position:absolute;left: 120px;top: 70px;overflow:hidden;width: 40px;height: 40px;"><!-- z-index:770;-->
                                                                <a href="<?php echo base_url(); ?>desksite/<?php echo $FeaturedProduct['busi_id']; ?>" target="_blank">
                                                                    <img class="hover" alt="View Desksite" src="<?php echo asset_url(); ?>images/vieworang.png">
                                                                    <span><img alt="View Desksite" src="<?php echo asset_url(); ?>images/view-detailsb.png"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4 class="text-center product-money-symbol">USD <span class="product-price"><?php echo number_format($FeaturedProduct['unit_price'], 2, $locale['decimal_point'], $locale['thousands_sep']); ?>/<?php echo $FeaturedProduct['unit'] ?></span></h4>
                                                    <p class="text-center product-money-text">Min. Qty. <?php echo $FeaturedProduct['quantity']; ?>		</p>
                                                </div>
                                            </div>
    <?php if ($frame + 4 == $i) { ?>
                                            </div>
    <?php } ?>
<?php } ?>
                                    <a class="left carousel-control" href="#tab-slider4" role="button" data-slide="prev" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                        <span><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previ.png"></span> 
                                    </a> 
                                    <a class="right carousel-control" href="#tab-slider4" role="button" data-slide="next" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                        <span><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nex.png"></span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div></div>

                <div id="Layer_details" class="class1">
                    <div id="Layer_details_Container" class="class2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 margintop" >
        <div class="row">
            <div class="col-sm-12 tab-slider maxheight1" >
                <div class="col-sm-3 col-lg-2 product2">
                    <div class="row" style="margin: 0px">
                        <h3 style="color: #fff; text-align: center;">
                            <span class="product-feature">FEATURED</span><br>
                            <span class="product-feature-title">PRODUCTS VIDEOS</span>
                        </h3>
                        <div class="text-center displaydesktop">
                            <img src="<?php echo asset_url(); ?>/images/ts/porcube.png"
                                 class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-10" style="background: #fff; min-height: 272px;">
                    <div class="panel disk-tab">
                        <div class="panel-body mytab">
                            <div id="tab-slider5" class="carousel slide" data-ride="carousel" style="height: 280px;width: 100%;border:none;">
                                <div class="carousel-inner section3" role="listbox" style="height: 315px;overflow: hidden;border:none;">

                                        <?php
                                        $i = 0;
                                        foreach ($FeaturedVideos as $FeaturedVideo) {

                                            if ($i % 4 == 0) {
                                                $frame = $i;
                                                ?>
                                            <div class="item <?php if ($i == 0) {
                                                    echo "active";
                                                } ?>" style="height:280px;padding-top:5px;border:none;padding-left: 30px;padding-right:30px;">
    <?php } $i++; ?>
                                            <div class="col-md-3">
                                                <div class="imgsection">
                                                    <h4 class="text-center product-strong-text" style="margin-top: 0px;">
                                                        <strong><?php echo $FeaturedVideo['name']; ?></strong>
                                                    </h4>
                                                    <p class="text-center product-text"><?php echo $FeaturedVideo['description']; ?>.</p>
                                                    <div class="tumb-slide">
                                                        <div id="wb_MediaPlayer1" style="width:218px;height:142px;z-index:677;" class="imgresponsive">
                                                            <video src="<?php echo asset_url() . $FeaturedVideo['vedio_file']; ?>" id="MediaPlayer1" style="width:218px !important;height:140px;z-index:677;"></video>
                                                        </div>
                                                        <div class="hover-thumb text-center">
                                                            <div id="wb_Image13" style="position:absolute;left: 75px;top: 70px;width:35px;height:35px;"><!-- z-index:851;-->
                                                                <a href="javascript:openVideo(<?php echo $FeaturedVideo['id']; ?>)"><img src="<?php echo asset_url(); ?>/images/playblk.png" id="Image34" alt=""></a> 
                                                            </div>
                                                            <div id="RollOver37" style="position:absolute;left: 120px;top: 70px;overflow:hidden;width: 40px;height: 40px;"><!-- z-index:770;-->
                                                                <a href="#">
                                                                    <img src="<?php echo asset_url(); ?>/images/view-detailsb.png" >
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/><br/>
                                                    <h4 class="text-center product-money-symbol">USD <span class="product-price"><?php echo number_format($FeaturedVideo['unit_price'], 2, $locale['decimal_point'], $locale['thousands_sep']); ?>/<?php echo $FeaturedVideo['unit']; ?></span></h4>
                                                    <p class="text-center product-money-text">Min. Qty. <?php echo $FeaturedVideo['quantity']; ?></p>
                                                </div>
                                            </div>
    <?php if ($frame + 4 == $i) { ?>
                                            </div>
    <?php } ?>
<?php } ?>
                                    <a class="left carousel-control" href="#tab-slider5" role="button" data-slide="prev" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                        <span><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previ.png"></span> 
                                    </a> 
                                    <a class="right carousel-control" href="#tab-slider5" role="button" data-slide="next" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                        <span><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nex.png"></span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Layer_details3" class="class1">
                    <div id="Layer_details_Container3" class="class2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 margintop" >
        <div class="row">
            <div class="col-sm-12 tab-slider">
                <div class="col-sm-3 col-lg-2 maxheight1 product3">
                    <div class="row" style="margin: 0px">
                        <h3 style="color: #fff; text-align: center;">
                            <span class="product-feature">FEATURED WORLD</span><br> 
                            <span class="product-feature-title"> SELLERS</span>
                        </h3>
                        <div class="text-center displaydesktop">
                            <img src="<?php echo asset_url(); ?>images/ts/Fsellersok.png"
                                 class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-10" style="background: #fff; min-height: 272px;">
                    <div class="panel disk-tab">
                        <div class="panel-body mytab">
                            <div id="tab-slider6" class="carousel slide" data-ride="carousel" style="height: 280px;width: 100%;border:none;">
                                <div class="carousel-inner section3" role="listbox" style="height: 315px;overflow: hidden;border:none;">
                                                <?php
                                                $i = 0;

                                                foreach ($FWSellers as $key => $FWSeller) {
                                                    if ($i % 4 == 0) {
                                                        $frame = $i;
                                                        ?>
                                            <div class="item <?php if ($i == 0) {
                                                            echo "active";
                                                        } ?>" style="height:543px;border:none;padding-left: 30px;padding-right: 30px;">
    <?php } $i++; ?>
                                            <div  class="col-md-3" id="Layer140-<?php echo $key; ?>" style="position: relative;" onmouseenter="ShowObjectWithEffect('Layer143-<?php echo $key; ?>', 1, 'fade', 300, 'swing');ShowObjectWithEffect('Layer144-<?php echo $key; ?>', 1, 'fade', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('Layer143-<?php echo $key; ?>', 0, 'fade', 10, 'swing');ShowObjectWithEffect('Layer144-<?php echo $key; ?>', 0, 'fade', 10, 'swing');return false;">
                                                <div id="wb_Shape24" style="position:absolute;left:0px;top:0px;width:218px;height:218px;z-index:509;">
    <?php if (file_exists("assets/" . $FWSeller['picture'])) { ?>
                                                        <img src="<?php echo asset_url() . $FWSeller['picture']; ?>" id="Shape24" alt="" style="width:218px;height:218px;">
    <?php } else { ?>
                                                        <img src="<?php echo asset_url() . 'images/img1004.png' ?>" id="Shape24" alt="" style="width:218px;height:218px;">
    <?php } ?>

                                                </div>
                                                <div id="Layer141" style="position:absolute;text-align:left;left:0px;top:202px;width:218px;height:65px;z-index:510;">
                                                    <div id="wb_Text204" style="position:absolute;left:55px;top:25px;width:116px;height:16px;z-index:503;text-align:left;">
                                                        <span style="color:#000000;font-family:Arial;font-size:11px;"><strong><?php echo $FWSeller['contact_person'] ?></strong></span>
                                                    </div>
                                                    <div id="wb_Text205" style="position:absolute;left:55px;top:40px;width:130px;height:16px;z-index:504;text-align:left;">
                                                        <span style="color:#696969;font-family:Arial;font-size:12px;"><?php echo $FWSeller['position'] ?></span>
                                                    </div>
                                                    <div id="Layer142" style="position:absolute;text-align:left;left:0px;top:64px;width:218px;height:19px;z-index:505;background-color: #A9A9A9;">
                                                        <div id="wb_Text206" style="position:absolute;left:3px;top:2px;width:206px;height:16px;text-align:center;z-index:502;">
                                                            <span style="color:#000000;font-family:Arial;font-size:11px;"><?php echo $FWSeller['product_name']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div id="wb_Shape25" style="position:absolute;left:11px;top:24px;width:35px;height:26px;z-index:506;">
                                                        <img src="<?php echo asset_url(); ?>images/flags/<?php echo $FWSeller['flag']; ?>" id="Shape25" alt="" style="width:35px;height:35px;">
                                                    </div>
                                                </div>
                                                <div id="Layer143-<?php echo $key; ?>" class="Layer143" style="position: absolute; text-align: left; visibility: visible; left: 0px; top: 0px; width: 218px; height: 218px; z-index: 511; display: none;">
                                                </div>
                                                <div id="Layer144-<?php echo $key; ?>" style="position: absolute; text-align: left; visibility: visible; left: 30px; top: 48px; width: 156px; height: 136px; z-index: 512; display: none;">
                                                    <div id="wb_Image96" style="position:absolute;left:34px;top:55px;width:35px;height:35px;z-index:507;">
                                                        <a href="javascript:openSeller(<?php echo $FWSeller['id']; ?>);" >
                                                            <img src="<?php echo asset_url(); ?>images/window0.png" id="Image96" alt="">
                                                        </a>
                                                    </div>
                                                    <div id="RollOver87" style="position:absolute;left:86px;top:55px;overflow:hidden;width:35px;height:35px;z-index:508">
                                                        <a href="<?php echo base_url(); ?>desksite/<?php echo $FWSeller['busi_id']; ?>" target="_blank">
                                                            <img class="hover" alt="" src="<?php echo asset_url(); ?>images/desktoporange.gif">
                                                            <span><img alt="" src="<?php echo asset_url(); ?>images/desktopicon.gif"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
    <?php if ($frame + 4 == $i) { ?>
                                            </div>
    <?php } ?>
<?php } ?>
                                    <a class="left carousel-control" href="#tab-slider6" role="button" data-slide="prev" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                        <span><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previ.png"></span> 
                                    </a> 
                                    <a class="right carousel-control" href="#tab-slider6" role="button" data-slide="next" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                        <span><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nex.png"></span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div></div>

                <div id="Layer_sellers" class="class1">
                    <div id="Layer_details_Container4" class="class2">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 margintop" >
        <div class="row">
            <div class="col-sm-12 tab-slider" style="min-height:460px;">
                <div class="col-sm-3 col-lg-2 maxheight1 product4">
                    <div class="row" style="margin: 0px">
                        <h3 style="color: #fff; text-align: center;">
                            <small>REAL-TIME</small><br> <b>BUSINESS STATION</b>
                        </h3>
                        <div class="text-center displaydesktop">
                            <img src="<?php echo asset_url(); ?>images/ts/trade-satation.png"
                                 class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-lg-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12" style="background: #FF8C00; height: 60px; padding-top: 15px; text-align: center; color: #fff;">
                                    <div id="wb_Text244" style="position:absolute;left:13px;top:24px;width:84px;height:15px;z-index:896;text-align:left;">
                                        <span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong>REAL-TIME</strong></span>
                                    </div>
                                    <h3 class="head1">WORLD NEW ARRIVALS</h3>
                                </div>
                                <div id="wb_Carousel4" style="position: absolute;top:60px;">
<?php if (count($NewArrivals) > 3) { ?>
                                        <div id="Carousel4">
<?php } else { ?>
                                            <div id="Carousel14">
<?php
} $i = 0;
foreach ($NewArrivals as $NewArrival) {
    if ($i % 3 == 0) {
        $frame = $i;
        ?>
                                                    <div class="frame" style="display: block;">
    <?php } $i++; ?>
                                                    <div class="col-sm-12 margins">
                                                        <div class="sectionrow">
                                                            <div class="row" style="margin: 0px;">
                                                                <div class="col-xs-2" style="padding: 1% 0px">
                                                                    <img src="<?php echo asset_url() . $NewArrival['main_image']; ?>"
                                                                         class="img-responsive">
                                                                    <img src="<?php echo asset_url(); ?>images/img0099.png" class="roundflag">

                                                                </div>
                                                                <div class="col-xs-9 text-left">
                                                                    <h5>
                                                                        <b><?php echo $NewArrival['name'] ?></b>
                                                                    </h5>
                                                                    <p>
                                                                        <small><?php echo substr($NewArrival['description'], 0, 125) ?></small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-xs-1 orange">
                                                                    <a href="" style="text-decoration:none">Go</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    <?php if ($frame + 3 == $i || count($NewArrivals) == $i) { ?>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12" style="background: #1E90FF; height: 60px; padding-top: 15px; text-align: center; color: #fff;">
                                        <div id="wb_Text244" style="position:absolute;left:13px;top:24px;width:84px;height:15px;z-index:896;text-align:left;">
                                            <span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong>REAL-TIME</strong></span></div>
                                        <h3 class="head1">WORLD PURCHASE REQUESTS</h3>
                                    </div>
                                    <br/>
                                    <div id="wb_Carousel5" style="position: absolute;top:60px;">
                                        <div id="Carousel5">
<?php
$i = 0;
foreach ($NewOrders as $NewOrder) {
    if ($i % 3 == 0) {
        $frame = $i;
        ?>
                                                    <div class="frame">
    <?php } $i++; ?>

                                                    <div class="col-sm-12 margins">
                                                        <div class="sectionrow"><div class="row" style="margin: 0px;">
                                                                <div class="col-xs-2" style="padding: 1% 0px">
                                                                    <img src="<?php echo asset_url() . $NewOrder['main_image']; ?>"
                                                                         class="img-responsive">
                                                                    <img src="<?php echo asset_url(); ?>images/img0099.png" class="roundflag">
                                                                </div>
                                                                <div class="col-xs-9 text-left">
                                                                    <h5>
                                                                        <b><?php echo $NewOrder['name'] ?></b>
                                                                    </h5>
                                                                    <p>
                                                                        <small><?php echo substr($NewOrder['description'], 0, 125); ?></small>
                                                                    </p>
                                                                </div>
                                                                <div class="col-xs-1 blue1" >
                                                                    <a href="" style="text-decoration:none">Go</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
    <?php if ($frame + 3 == $i || count($NewOrders) == $i) { ?>
                                                    </div>
    <?php }
} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 margintop" >
                    <div class="row">
                        <div class="col-sm-12 tab-slider">
                            <div class="col-sm-3 col-lg-2 maxheight1 product1 productb">
                                <div class="row" style="margin: 0px">
                                    <h3 style="color: #fff; text-align: center;">
                                        <span class="product-feature">FEATURED WORLD</span><br> 
                                        <span class="product-feature-title"> BUYERS</span>
                                    </h3>
                                    <div class="text-center displaydesktop">
                                        <img src="<?php echo asset_url(); ?>images/ts/Fsellersok.png"
                                             class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-sm-9 col-lg-10"
                                    style="background: #fff; min-height: 272px;">
                                    
                                    <section class="center slider">-->
                            <div class="col-sm-9 col-lg-10" style="background: #fff; min-height: 272px;">
                                <div class="panel disk-tab">
                                    <div class="panel-body mytab">
                                        <div id="tab-slider7" class="carousel slide" data-ride="carousel" style="height: 280px;width: 100%;border:none;">
                                            <div class="carousel-inner section3" role="listbox" style="height: 315px;overflow: hidden;border:none;">
                                                            <?php
                                                            $i = 0;

                                                            foreach ($FWBuyers as $key => $FWBuyer) {
                                                                if ($i % 4 == 0) {
                                                                    $frame = $i;
                                                                    ?>
                                                        <div class="item <?php if ($i == 0) {
                                                                        echo "active";
                                                                    } ?>" style="height:280px;border:none;padding-right: 30px;padding-left: 40px;">
    <?php } $i++; ?>
                                                        <div  class="col-md-3" id="Layer140-<?php echo $key; ?>" onmouseenter="ShowObjectWithEffect('Layer145-<?php echo $key; ?>', 1, 'fade', 300, 'swing');ShowObjectWithEffect('Layer146-<?php echo $key; ?>', 1, 'fade', 300, 'swing');return false;" onmouseleave="ShowObjectWithEffect('Layer146-<?php echo $key; ?>', 0, 'fade', 10, 'swing');ShowObjectWithEffect('Layer145-<?php echo $key; ?>', 0, 'fade', 10, 'swing');return false;">

                                                            <div id="wb_Shape24" style="position:absolute;left:0px;top:0px;width:218px;height:218px;z-index:509;">
    <?php if (file_exists("assets/" . $FWBuyer['picture'])) { ?>
                                                                    <img src="<?php echo asset_url() . $FWBuyer['picture']; ?>" id="Shape24" alt="" style="width:218px;height:218px;">
    <?php } else { ?>
                                                                    <img src="<?php echo asset_url() . 'images/img1004.png' ?>" id="Shape24" alt="" style="width:218px;height:218px;">
    <?php } ?>

                                                            </div>
                                                            <div id="Layer141" style="position:absolute;text-align:left;left:0px;top:202px;width:218px;height:65px;z-index:510;">
                                                                <div id="wb_Text204" style="position:absolute;left:55px;top:25px;width:116px;height:16px;z-index:503;text-align:left;">
                                                                    <span style="color:#000000;font-family:Arial;font-size:11px;"><strong><?php echo $FWBuyer['contact_person'] ?></strong></span>
                                                                </div>
                                                                <div id="wb_Text205" style="position:absolute;left:55px;top:40px;width:130px;height:16px;z-index:504;text-align:left;">
                                                                    <span style="color:#696969;font-family:Arial;font-size:12px;"><?php echo $FWBuyer['position'] ?></span>
                                                                </div>
                                                                <div id="Layer142" style="position:absolute;text-align:left;left:0px;top:64px;width:218px;height:19px;z-index:505;background-color: #A9A9A9;">
                                                                    <div id="wb_Text206" style="position:absolute;left:3px;top:2px;width:206px;height:16px;text-align:center;z-index:502;">
                                                                        <span style="color:#000000;font-family:Arial;font-size:11px;"><?php echo $FWBuyer['product_name']; ?></span>
                                                                    </div>
                                                                </div>
                                                                <div id="wb_Shape25" style="position:absolute;left:11px;top:24px;width:35px;height:26px;z-index:506;">
                                                                    <img src="<?php echo asset_url(); ?>images/flags/<?php echo $FWBuyer['flag']; ?>" id="Shape25" alt="" style="width:35px;height:35px;">
                                                                </div>
                                                            </div>
                                                            <div id="Layer145-<?php echo $key; ?>" class="Layer143" style="position: absolute; text-align: left; visibility: visible; left: 0px; top: 0px; width: 218px; height: 218px; z-index: 511; display: none;">
                                                            </div>
                                                            <div id="Layer146-<?php echo $key; ?>" style="position: absolute; text-align: left; visibility: visible; left: 30px; top: 48px; width: 156px; height: 136px; z-index: 512; display: none;">
                                                                <div id="wb_Image96" style="position:absolute;left:34px;top:55px;width:35px;height:35px;z-index:507;">
                                                                    <a href="javascript:openBuyer(<?php echo $FWBuyer['id']; ?>)">
                                                                        <img src="<?php echo asset_url(); ?>images/ts/window0.png" style="width: 40px;">
                                                                    </a>
                                                                </div>
                                                                <div id="RollOver87" style="position:absolute;left:86px;top:55px;overflow:hidden;width:42px;height:35px;z-index:508">
                                                                    <a href="<?php echo base_url(); ?>buyer/profile/<?php echo $FWBuyer['busi_id']; ?>" target="_blank">
                                                                        <img src="<?php echo asset_url(); ?>images/randbuyergray.png" style="width: 42px;">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
    <?php if ($frame + 4 == $i) { ?>
                                                        </div>
    <?php } ?>
<?php } ?>
                                                <a class="left carousel-control" href="#tab-slider7" role="button" data-slide="prev" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                                    <span><img alt="Back" style="border-width:0" src="<?php echo asset_url(); ?>images/previ.png"></span> 
                                                </a> 
                                                <a class="right carousel-control" href="#tab-slider7" role="button" data-slide="next" style="background: none;padding-top:12%;text-align:center;width:5%;"> 
                                                    <span><img alt="Next" style="border-width:0" src="<?php echo asset_url(); ?>images/nex.png"></span> 
                                                </a>
                                            </div></div>
                                    </div>
                                </div></div>
                        </div>
                    </div>
                </div>
                <div id="Layer_buyers" class="class1">
                    <div id="Layer_details_Container5" class="class2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add to catalogue -->
    <div id="Layer_catalogue" class="catalogue1">
        <div id="Layer_catalogue_Container" class="catalogue2">
        </div>
    </div>   
    <!-- add to catalogue end -->
    <div id="Layer_details2" class="class1">
        <div id="Layer_details_Container2" class="class2">
        </div>
    </div>
    <div id="Layer_buyers" class="class1">
        <div id="Layer_details_Container5" class="class2">
        </div>
    </div>
<?php echo $template['partials']['vcatalogue']; ?>

    <div id="promodal">
    </div>
    <div id="vcatalogue_overlay_home" class="modal fade" style="background-color:#404040;z-index: 4000;">
        <div class="modal-dialog" style="background-color:#404040;width:1050px;">
            <div class="modal-content" style="background: transparent;box-shadow:none;-webkit-box-shadow:none;border: 0px;">
                <div style="position:absolute;right:0;width:50px;height:50px;z-index:5000;"><button type="button" class="pull-right" data-dismiss="modal" aria-hidden="true" style="background:transparent;border:0px;"><img src="<?php echo asset_url(); ?>images/newicons/closeround.png" id="Image47" alt="" style="width:35px;"></button></div>
                <div class="modal-body" style="width:1050px;height:640px;">
                    <input type="hidden" id="pcatalogue_id" value="" />
                    <div class="row">
                        <div class="col-md-1" style="float:left;padding:0px;width:155px;" id="catalogue_links">

                        </div>
                        <div class="col-md-9" style="width:770px;padding-top:42px;">
                            <div id="catalogue_page_content" class="catalogue_outer_body">
                            </div>
                        </div>
                        <div class="col-md-1" style="padding:0px;width:80px;" id="share_it">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo asset_url(); ?>js/slick.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
                                                                                                var template = {
                                                                                                    html: 'application/modules/frontend/views/default/default-book-view.html',
                                                                                                    styles: [
                                                                                                        '<?php echo asset_url(); ?>css/font-awesome.min.css',
                                                                                                        '<?php echo asset_url(); ?>css/short-white-book-view.css'
                                                                                                    ],
                                                                                                    script: '<?php echo asset_url(); ?>js/default-book-view.js'
                                                                                                };
                                                                                                var booksOptions = {
                                                                                                    pageCallback: orwell1984PageCallback,
                                                                                                    pages: 10,
                                                                                                    propertiesCallback: function (props) {
                                                                                                        props.page.depth /= 2;
                                                                                                        props.cover.padding = 0.002;
                                                                                                        return props;
                                                                                                    },
                                                                                                    template: template
                                                                                                };

                                                                                                function orwell1984PageCallback(n) {
                                                                                                    return {
                                                                                                        type: 'html',
                                                                                                        //src: 'books/html/1984/'+(n+1)+'.html',
                                                                                                        src: base_url + "catalogue/pages/" + catalogue_id + "/" + (n + 1),
                                                                                                        interactive: true
                                                                                                    };
                                                                                                }

                                                                                                $(document).on('ready', function () {
                                                                                                    $(".center2").slick({
                                            infinite: false,
                                            speed: 300,
                                            slidesToShow: 7,
                                            slidesToScroll: 7,
                                            responsive: [
                                                {
                                                    breakpoint: 1024,
                                                    settings: {
                                                        slidesToShow: 5,
                                                        slidesToScroll: 5,
                                                        infinite: true,
                                                    }
                                                },
                                                {
                                                    breakpoint: 600,
                                                    settings: {
                                                        slidesToShow: 3,
                                                        slidesToScroll: 3
                                                    }
                                                },
                                                {
                                                    breakpoint: 480,
                                                    settings: {
                                                        slidesToShow: 2,
                                                        slidesToScroll: 2
                                                    }
                                                }
                                            ]
                                        });
                                        $(".center").slick({
                                            infinite: false,
                                            speed: 300,
                                            slidesToShow: 4,
                                            slidesToScroll: 4,
                                            responsive: [
                                                {
                                                    breakpoint: 1024,
                                                    settings: {
                                                        slidesToShow: 3,
                                                        slidesToScroll: 3,
                                                        infinite: true,
                                                    }
                                                },
                                                {
                                                    breakpoint: 600,
                                                    settings: {
                                                        slidesToShow: 2,
                                                        slidesToScroll: 2
                                                    }
                                                },
                                                {
                                                    breakpoint: 480,
                                                    settings: {
                                                        slidesToShow: 1,
                                                        slidesToScroll: 1
                                                    }
                                                }
                                            ]
                                        });

                                                                                                });

                                                                                                $(document).ready(function () {
                                                                                                    var boxWidth = $(".open-div1").width();
                                                                                                    $(".menu-arrow").click(function () {
                                                                                                        $(".reminder-div").animate({
                                                                                                            width: boxWidth
                                                                                                        });
                                                                                                        $(".menu-arrow").hide();
                                                                                                        $(".menu-arrow2").show();
                                                                                                        $(".myalert").show();
                                                                                                    });
                                                                                                    $(".menu-arrow2").click(function () {
                                                                                                        $(".reminder-div").animate({
                                                                                                            width: 60
                                                                                                        });
                                                                                                        $(".menu-arrow").show();
                                                                                                        $(".menu-arrow2").hide();
                                                                                                        $(".myalert").hide();
                                                                                                    });
                                                                                                });
                                                                                                $("div.product-text").text(function (index, currentText) {
                                                                                                    return currentText.substr(0, 30);
                                                                                                });
                                                                                                // Added by suraj for open popup box
                                                                                                /*function openVideo(id) {
                                                                                                 $.get(base_url+"seller/video/view/"+id,{},function(data) {
                                                                                                 $("#Layer_details_Container").html(data);
                                                                                                 ShowObjectWithEffect('Layer_details', 1, 'scale', 500, 'swing');
                                                                                                 },'html');
                                                                                                 }*/
                                                                                                /*function openProduct(id) {
                                                                                                 $.get(base_url+"seller/product/view/"+id,{},function(data) {
                                                                                                 $("#Layer_details_Container").html(data);
                                                                                                 ShowObjectWithEffect('Layer_details', 1, 'scale', 500, 'swing');
                                                                                                 },'html');
                                                                                                 }*/
                                                                                                var catalogue_id = 0;
                                                                                                function viewCatalogueBook(id)
                                                                                                {
                                                                                                    $.get(base_url + "catalogue/popup/" + id, {}, function (data) {
                                                                                                        catalogue_id = id;
                                                                                                        //$("#catalogue_page_content_inner").html(data);
                                                                                                        //$("#pcatalogue_id").val(id);
                                                                                                        $("#catalogue_page_content").html(data);
                                                                                                        $("#vcatalogue_overlay_home").modal('show');
                                                                                                        var instance = {
                                                                                                            scene: undefined,
                                                                                                            options: undefined,
                                                                                                            node: $('#flip-book-window').find('.mount-node')
                                                                                                        };
                                                                                                        instance.options = booksOptions;
                                                                                                        instance.scene = instance.node.FlipBook(instance.options);
                                                                                                        var shareIt = '<ul class="share pull-right text-center">'
                                                                                                                + '<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#24A7DB;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Views<br> <span id="vdiv' + data.id + '">' + data.views + '</span></label></li>'
                                                                                                                + '<li class="share-button"><label style="width:70px;height:70px;border-radius:50%;border:1px solid #fff;background-color:#32AA2B;color:#fff;text-align:center;line-height:15px;padding-top:20px;">Likes<br> <span id="sdiv' + data.id + '">' + data.likes + '<span></label></li>'
                                                                                                                + '</ul>'
                                                                                                                + '<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 245px;width:35px;height:35px;z-index:380;" onclick="chat_with(' + data.user_id + ');">'
                                                                                                                + '<a>'
                                                                                                                + '<img class="hover" src="<?php echo asset_url() ?>images/chatwhite.png" alt="view">'
                                                                                                                + '<span><img alt="View" src="<?php echo asset_url() ?>images/chat_button2.png"></span>'
                                                                                                                + '</a>'
                                                                                                                + '</div>'
                                                                                                                + '<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 290px;width:35px;height:35px;z-index:380;">'
                                                                                                                + '<a href="javascript:likeCatalogue(' + data.id + ');">'
                                                                                                                + '<img class="hover" src="<?php echo asset_url() ?>images/items_likewhite.png" alt="view">'
                                                                                                                + '<span><img alt="View" src="<?php echo asset_url() ?>images/items_like2.png"></span>'
                                                                                                                + '</a>'
                                                                                                                + '</div>'
                                                                                                                + '<div id="RollOver5" class="" style="position:absolute;left: 30px;top: 335px;width:35px;height:35px;z-index:380;">'
                                                                                                                + '<a href="javascript:addToMyFavourite(' + data.busi_id + ',7);">'
                                                                                                                + '<img class="hover" src="<?php echo asset_url() ?>images/addtofav.png" alt="view">'
                                                                                                                + '<span><img alt="View" src="<?php echo asset_url() ?>images/favorite_chery.gif"></span>'
                                                                                                                + '</a>'
                                                                                                                + '</div>';
                                                                                                        $("#share_it").html(shareIt);
                                                                                                    });
                                                                                                }
                                                                                                function openCatalogue(id) {
                                                                                                    //alert('hello');
                                                                                                    $.get(base_url + "catalogue/popup/" + id, {}, function (data) {
                                                                                                        $("#Layer_catalogue_Container").html(data);
                                                                                                        ShowObjectWithEffect('Layer_catalogue', 1, 'scale', 500, 'swing');
                                                                                                    }, 'html');
                                                                                                }
                                                                                                function openSeller(id) {
                                                                                                    $.get(base_url + "seller/popup/" + id, {}, function (data) {
                                                                                                        $("#Layer_details_Container4").html(data);
                                                                                                        ShowObjectWithEffect('Layer_sellers', 1, 'scale', 500, 'swing');
                                                                                                    }, 'html');
                                                                                                }
                                                                                                function openBuyer(id) {
                                                                                                    $.get(base_url + "buyer/popup/" + id, {}, function (data) {
                                                                                                        $("#Layer_details_Container5").html(data);
                                                                                                        ShowObjectWithEffect('Layer_buyers', 1, 'scale', 500, 'swing');
                                                                                                    }, 'html');
                                                                                                }
                                                                                                function open3DProduct(id) {
                                                                                                    $.get(base_url + "mystation/3dpro/show/" + id, {}, function (data) {
                                                                                                        $("#promodal").html(data);
                                                                                                        $("#my3DModal").modal('show');
                                                                                                        init3D('my3dimg');
                                                                                                    }, 'html');
                                                                                                }
    </script>
    <script>
        $(document).ready(function () {
            $("#Carousel5").carousel();
            var Carousel5Opts =
                    {
                        delay: 5000,
                        duration: 20,
                        easing: 'easeInSine',
                        mode: 'blind',
                        direction: 'vertical',
                        pagination: false,
                        start: 0
                    };
            $("#Carousel5").carouseleffects(Carousel5Opts);
            $("#Carousel4").carousel();
            var Carousel4Opts =
                    {
                        delay: 4000,
                        duration: 20,
                        easing: 'easeInSine',
                        mode: 'blind',
                        direction: 'vertical',
                        pagination: false,
                        start: 0
                    };
            $("#Carousel4").carouseleffects(Carousel4Opts);
//            $("#SlideShow1").slideshow({
//                interval: 3000,
//                type: 'sequence',
//                effect: 'none',
//                direction: '',
//                pagination: false,
//                effectlength: 1000
//            });
//            searchParseURL();
//            var $autocomplete = $('<ul class="autocomplete"></ul>').hide().insertAfter('#SiteSearch4');
//            var selectedItem = null;
//            var setSelectedItem = function (item) {
//                selectedItem = item;
//                if (selectedItem === null) {
//                    $autocomplete.hide();
//                    return;
//                }
//                if (selectedItem < 0) {
//                    selectedItem = 0;
//                }
//                if (selectedItem >= $autocomplete.find('li').length) {
//                    selectedItem = $autocomplete.find('li').length - 1;
//                }
//                $autocomplete.find('li').removeClass('selected').eq(selectedItem).addClass('selected');
//                $autocomplete.css('left', $('#SiteSearch4').position().left);
//                $autocomplete.css('top', $('#SiteSearch4').position().top + $('#SiteSearch4').outerHeight());
//                $autocomplete.show();
//            };
            var populateSearchField = function () {
                $('#SiteSearch4').val($autocomplete.find('li').eq(selectedItem).text());
                setSelectedItem(null);
            };
            $('#SiteSearch4').attr('autocomplete', 'off').keyup(function (event) {
                if (event.keyCode > 40 || event.keyCode == 8) {
                    var data = new Array();
                    var keywordVal = $('#SiteSearch4').val();
                    keywordVal = keywordVal.toLowerCase();
                    for (i = 0; i < database_length; i++) {
                        var words = (searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords).toLowerCase();
                        var array = words.split(" ");
                        data = $.merge(data, array);
                    }
                    var unique = new Array();
                    o: for (var i = 0; i < data.length; i++) {
                        for (var j = 0; j < unique.length; j++) {
                            if (unique[j] == data[i])
                                continue o;
                        }
                        unique[unique.length] = data[i];
                    }
                    unique.sort();
                    if (keywordVal.length && unique.length) {
                        $autocomplete.empty();
                        var item = 0;
                        $.each(unique, function (index, term) {
                            term = term.toLowerCase();
                            if (term.indexOf(keywordVal) == 0) {
                                $('<li></li>').text(term).data('item', item).appendTo($autocomplete).mouseover(function () {
                                    var item = $(this).data('item');
                                    setSelectedItem(item);
                                }).click(populateSearchField);
                                item++;
                            }
                        });
                        setSelectedItem(0);
                    } else {
                        setSelectedItem(null);
                    }
                } else
                if (event.keyCode == 38 && selectedItem !== null) {
                    setSelectedItem(selectedItem - 1);
                    event.preventDefault();
                } else
                if (event.keyCode == 40 && selectedItem !== null) {
                    setSelectedItem(selectedItem + 1);
                    event.preventDefault();
                } else
                if (event.keyCode == 27 && selectedItem !== null) {
                    setSelectedItem(null);
                }
            }).keypress(function (event) {
                if (event.keyCode == 13 && selectedItem !== null) {
                    populateSearchField();
                    event.preventDefault();
                }
            }).blur(function (event) {
                setTimeout(function () {
                    setSelectedItem(null);
                }, 250);
            });
            var Carousel2Opts = {
                delay: 4000,
                duration: 500,
                easing: 'easeInOutBounce',
                mode: 'fade',
                direction: '',
                pagination: false,
                start: 0
            };
            $("#Carousel2").carouseleffects(Carousel2Opts);
            $("#Carousel2_back a").click(function () {
                $('#Carousel2').carouseleffects('prev');
            });
            $("#Carousel2_next a").click(function () {
                $('#Carousel2').carouseleffects('next');
            });
            var Carousel1Opts = {
                delay: 4000,
                duration: 500,
                easing: 'easeInOutBounce',
                mode: 'rotate',
                direction: '',
                pagination: true,
                start: 0
            };
            $("#Carousel1").carouseleffects(Carousel1Opts);
            $("#Carousel1_back a").click(function () {
                $('#Carousel1').carouseleffects('prev');
            });
            $("#Carousel1_next a").click(function () {
                $('#Carousel1').carouseleffects('next');
            });
            $("#Layer_details").stickylayer({
                orientation: 9,
                position: [0, 0],
                delay: 300
            });
            $("#Layer_details3").stickylayer({
                orientation: 9,
                position: [0, 0],
                delay: 300
            });
            $("#Layer_details2").stickylayer({
                orientation: 9,
                position: [0, 0],
                delay: 300
            });
        });
        function openVideo(id) {
            $.get(base_url + "seller/video/view/" + id, {}, function (data) {
                $("#Layer_details_Container3").html(data);
                ShowObjectWithEffect('Layer_details3', 1, 'scale', 500, 'swing');
            }, 'html');
        }
        function openProduct(id) {
            //alert('hello');
            $.get(base_url + "seller/product/view/" + id, {}, function (data) {
                $("#Layer_details_Container").html(data);
                ShowObjectWithEffect('Layer_details', 1, 'scale', 500, 'swing');
            }, 'html');
        }
        function addToMyFavourite(fav_id, type) {
            $.get(base_url + "addtofavourite/" + fav_id + "/" + type, {}, function (data) {
                $("#msg_cont").html(data.msg);
                ShowObject('Layer99', 1);
            }, 'json');
        }
        function validate() {
            if ($('select').val() == 'default') {
                alert('Please, choose an option');
                return false;
            }
        }
        function addToItemToCart(id) {
            $.post(base_url + "additemtocart", {product_id: id}, function (data) {
                //alert(data.msg);
                $("#msg_cont").html(data.msg);
                ShowObject('Layer99', 1);
            }, 'json');
        }
        var hoverTimeout, keepOpen = false, stayOpen = $('#Details');
        $(document).on('mouseenter', '.cat_slide', function () {
            clearTimeout(hoverTimeout);
            var curr_slide = $(this).attr("alt");
            $(".sub_cat").css('color', '#337ab7');
            $(".slide-details").hide();
            $("#" + curr_slide).show();
            $("." + curr_slide).show();
            stayOpen.addClass('show');
        }).on('mouseleave', '.slide', function () {
            clearTimeout(hoverTimeout);
            hoverTimeout = setTimeout(function () {
                if (!keepOpen) {
                    $(".slide-details").hide();
                    stayOpen.removeClass('show');
                }
            }, 1000);
        });

        $(document).on('mouseenter', '#Details', function () {
            keepOpen = true;
            setTimeout(function () {
                keepOpen = false;
            }, 1500);
        }).on('mouseleave', '#Details', function () {
            keepOpen = false;
            $(".slide-details").hide();
            stayOpen.removeClass('show');
        });
        function highlight_keywords(str) {
            $(".sub_cat").css('color', '#337ab7');
            $("." + str).css('color', 'orange');
        }
    </script>