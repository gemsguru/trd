<link rel="stylesheet" href="<?php echo asset_url(); ?>css/pages/responsive.css">
<link rel="" href="<?php echo asset_url(); ?>css/pages/stock_market.css" />
<style>
    .headimg{
        background:url(<?php echo asset_url(); ?>images/sellerheader0.jpg) no-repeat center center; background-size:100% 100%; height:235px;z-index: 1;
    }
    .relative{
        position: relative;
    }
    .c20{
        color:#1E90FF;font-family:Arial;font-size:16px;
    }
    .c21{
        color:#00BFFF;font-family:'Arial Black';font-size:11px;
    }
    .s1{
        color:#3C3C3C;font-family:Arial;font-size:11px;
    }
    .s2{
        color:#1E90FF;font-family:Arial;font-size:12px;
    }
    .s3{
        color:#3C3C3C;font-family:Arial;font-size:13px;
    }
    .s4{
        color:#3C3C3C;font-family:Arial;font-size:11px;
    }
    .s5{
        top: 10%; text-align:left;  left: 34%;

        width: 36%;   
    }
    .c2{
        position:absolute;left:67px;top:28px;width:59px;height:15px;z-index:36;text-align:left;
    }
    .c1{
        color:#FFFFFF;font-family:Arial;font-size:12px;
    }
    .b1{
        color:#1E90FF;font-family:Georgia;font-size:12px;
    }
    .d1{
        z-index: 0; height:900px; top: 0px; left: 0px; width: 1440px;
    }
    .d2{
        display: block; z-index: 1;  height:900px;top: 0px; left: 0px; width: 1440px;
    }
    .leftnav{
        position:fixed;text-align:left;left:0;top:25%;bottom:0;width:101px;z-index:3867; height: 320px
    }
    .bottomnav{
        position: fixed; text-align: center; left: 0px; top: auto; width: 99%; height: 109px; z-index: 3858; bottom: 0px;
    }
    .b2{
        color:#1E90FF;font-family:Georgia;font-size:12px;
    }
    .s15{
        color:#2D2D2D;font-family:Arial;font-size:12px;
    }
    .s6{
        color:#696969;font-family:Arial;font-size:12px;
    }
    .s7{
        color:#1E1E1E;font-family:Georgia;font-size:13px;
    }
    .s8{
        background-color:#3C3C3C;color:#FFFFFF;font-family:Arial;font-size:13px;text-align:center
    }
    .s9{
        top: 10%;    left: 40%;   width: 27%;
    }
    .s10{
        position:absolute;left:75px;top:94%;width:35px;height:13px;z-index:999
    }
    .s11{
        position:absolute;right:75px;top:94%;width:35px;height:13px;z-index:999
    }
    a{
        cursor:pointer;
    }
    .s12{
        color:#787878;font-family:Arial;font-size:13px;
    }
    .s13{
        color:#4B4B4B;font-family:Arial;font-size:16px;
    }
    .s14{
        color:#787878;font-family:Arial;font-size:11px;
    }


    .c22{
        position:absolute;right:18px;top:96%;width:35px;height:13px;z-index:999;
    }
    .c19{
        top: 10%;text-align:left;  left: 34%;
        width: 36%;   top: 10%;  
    }
    .c17{
        position:absolute; left: 250px;
        top: 519px;
        width:74px;height:15px;z-index:3560;text-align:left;
    }
    .c18{
        position:absolute;left:22px;top:96%;width:35px;height:13px;z-index:999;
    }
    .c12{
        position: absolute;right:0%;top:10% ;width:450px;
    }
    .c13{
        position:absolute;left:9px;top:12px;width:28px;height:28px;z-index:70;
    }
    .c16{
        color:#A9A9A9;font-family:Arial;font-size:13px;
    }
    .c15{
        color:#3C3C3C;font-family:Arial;font-size:24px;
    }
    .c14{
        color:#3C3C3C;font-family:Arial;font-size:12px;
    }
    .c11{
        background-color:#FFFFFF;color:#3C3C3C;font-family:Arial;font-size:12px;
    }
    .c10{
        background-color:#FFFFFF;color:#3C3C3C;font-family:Georgia;font-size:20px;
    }
    .c9{
        position: absolute;left:10%;top:10% ;width:450px;
    }
    .c8{
        position: relative; min-height: 235px;
    }
    .c6{
        color:#FFFFFF;font-family:Impact;font-size:48px;letter-spacing:0.07px;margin-top:-15px;
    }
    .c7{
        color:#E8AD8F;font-family:Arial;font-size:12px;margin-top:-7px
    }
    .c5{
        color:#FFFFFF;font-family:Arial;font-size:27px;margin-top:35px;
    }
    .c4{
        color:#E8AD8F;font-family:Georgia;font-size:12px;
    }
    .c3{
        padding-top:1px;padding-right:1px;
    }
    .dropdown-custom a {
        text-decoration:none;
    }
    .trd-nav a:hover {
        padding:0px;
        margin:0px;
    }
</style>
<div id="main-page displaydesktop">
    <div class="container" id="Layer106_Container" style="width: 1280px;padding: 0px;">
        <div class="container-fluid top-div">
            <ul class="nav navbar-nav navbar-left top-nav">
                <li class="inline"><a href="#" onclick="ShowObjectWithEffect('Layer106', 1, 'fold', 500, 'easeOutBounce');return false;"><img src="<?php echo asset_url(); ?>images/img0235.png" id="Image25" alt="" class="imgus"></a></li>
                <li class="inline"><a href="#" onclick="ShowObjectWithEffect('Layer106', 1, 'fold', 500, 'easeOutBounce');return false;"><span class="navtrd1">TRD</span><span class="navtrd2">STATION</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right top-nav">
                <li><a href="#" class="headerMenu" style="padding-right: 0px;">GOOD LUCK</a></li>

                <?php if (empty($this->session->userdata('tsuserid')) && $this->session->userdata('tsuserid') <= 0) { ?>
                    <li><a data-toggle="modal" style="color:#FFFFFF;font-family:Georgia;font-size:15px;"></a></li>
                <?php } else { ?>
                    <li><a data-toggle="modal" style="color:#FFFFFF;font-family:Georgia;font-size:15px;"><?php echo $tsprefix . "  " . $tsusername; ?></a></li>
                <?php } ?>

                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top:5px;">
                        <?php if ($profile_img == '') { ?>
                            <img src="<?php echo asset_url(); ?>images/rseller2.png" id="Image24" alt="" class="img35">
                        <?php } else { ?>
                            <img src="<?php echo asset_url() . $profile_img ?>" id="Image24" alt="" class="img35">
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu" role="menu" style="font-weight: bold;font-size: 12px;text-align: center;min-width: 100px;">
                        <?php if ($activstatus == 0) { ?>
                            <li class="firstmain"><a href="<?php echo base_url() ?>continueregistration" target="_self">Continue</a> </li>
                        <?php } else { ?>
                            <li class="firstmain"><a href="<?php echo base_url() ?>mystation" target="_self">Control&nbsp;Panel</a> </li>
                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>logout" target="_self" >Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php include 'hover-nav.php'; ?>
        <!--my alert-->
        <div class="fixed-lock" id="main-page-lock">
            <div id="Layer46" style="position: fixed; text-align: center; left: 0; top: 0; right: 0; bottom: 0; z-index: 1265;">
                <div id="Layer46_Container" class="top4">
                    <div id="wb_Image58" class="top5">
                        <img src="<?php echo asset_url(); ?>images/img0202.png" id="Image58" alt="">
                    </div>
                    <div id="wb_Text84" class="top1">
                        <span class="top1font">GLOBAL</span>
                    </div>
                    <div class="container-fluid" style="padding-left:15%;">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="inline"><a href="#"><span class="navtrd1">TRD</span><span class="navtrd3">STATION</span></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" style="padding-right:10%;">
                            <li><a href="#" class="navtrd4">GOOD LUCK</a></li>
                            <li class="displaydesktop"><a class="navtrd4">|</a></li>
                            <?php if (empty($this->session->userdata('tsuserid')) && $this->session->userdata('tsuserid') <= 0) { ?>
                                <li><a data-toggle="modal" class="user1">Guest</a></li>
                            <?php } else { ?>
                                <li><a data-toggle="modal" class="user1"><?php echo $tsprefix . "  " . $tsusername; ?></a></li>
                            <?php } ?>
                            <li class="dropdown ">
                                <?php if ($profile_img == '') { ?>
                                    <img src="<?php echo asset_url(); ?>images/rseller2.png" id="Image24" alt="" class="img35" style="border-radius:50%;">
                                <?php } else { ?>
                                    <img src="<?php echo asset_url() . $profile_img ?>" id="Image24" alt="" class="img35" style="border-radius:50%;">
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div id="wb_Text85" class="top2">
                        <span class="top2font">STOCKS</span>
                    </div>
                    <div id="wb_Text86" class="top3">
                        <span class="top3font">A
                            Real-Time Stocks Market, Allows Businessmen Around The World To
                            Sell, Buy And Ask For Stocks Or Ready Goods.. <br>
                        </span>
                    </div>
                    <div id="Layer66" class="top7">
                        <div id="Layer66_Container" class="top8">
                            <form name="SiteSearch3_form" id="SiteSearch3_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
                                <div id="wb_CssMenu6" class="top11">
                                    <select class="search-box" name='top_country' style="height:27px;border: 1px #808080 solid;width:124px;" id="top_country_id">
                                        <option value="0">Country</option>
                                        <?php foreach ($Country as $country) { ?>
                                            <option value="<?php echo $country['id']; ?>, <?php echo $country['name']; ?> "><?php echo $country['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                </div>

                                <input type="text" id="SiteSearch3" class="top6" name="SiteSearch1" value="" placeholder="Type a product name to access the real-time station">

                                <input type="button" id="Button14" onclick="ShowObjectWithEffect('Layer46', 0, 'slideup', 500, 'swing');ShowObjectWithEffect('Layer2', 1, 'slidedown', 500, 'swing');return false;" name="Search" value="GO" class="top10">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $("#SiteSearch3").change(function () {
                    $('[name=keyword]').val($(this).val());
                });
                $("#top_country_id").change(function () {
                    $('[name=country]').val($(this).val());
                });
                $(document).on('ready', function () {
                    $(".center").slick({
                        infinite: false,
                        speed: 300,
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                }
                            }, {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            }, {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }]
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
            </script>
            <script>
                /*var features = '';
                 var searchDatabase = new SearchDatabase();
                 var searchResults_length = 0;
                 var searchResults = new Object();
                 function searchPage(features)
                 {
                 var element = document.getElementById('SiteSearch4');
                 if (element.value.length != 0 || element.value != " ")
                 {
                 var value = unescape(element.value);
                 var keywords = value.split(" ");
                 searchResults_length = 0;
                 for (var i=0; i<database_length; i++)
                 {
                 var matches = 0;
                 var words = searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords;
                 for (var j = 0; j < keywords.length; j++)
                 {
                 var pattern = new RegExp(keywords[j], "i");
                 var result = words.search(pattern);
                 if (result >= 0)
                 {
                 matches++;
                 }
                 else
                 {
                 matches = 0;
                 }
                 }
                 if (matches == keywords.length)
                 {
                 searchResults[searchResults_length++] = searchDatabase[i];
                 }
                 }
                 var html = '';
                 var results = '';
                 html = html + '<span style="font-family:Arial;font-size:13px;color:#000000">';
                 for (var n=0; n<searchResults_length; n++)
                 {
                 var page_keywords = searchResults[n].keywords;
                 results = results + '<strong><a style="color:#0000FF" href="'+searchResults[n].url+'">'+searchResults[n].title +'<\/a><\/strong><br>Keywords: ' + page_keywords +'<br><br>';
                 }
                 if (searchResults_length == 0)
                 {
                 results = 'No results';
                 }
                 else
                 {
                 html = html + searchResults_length;
                 html = html + ' result(s) found for search term: ';
                 html = html + value;
                 html = html + '<br><br>';
                 }
                 html = html + results;
                 html = html + '<\/span>';
                 $('#').css('padding' , '2px');
                 $('#').html(html);
                 }
                 return false;
                 }
                 function searchParseURL()
                 {
                 var url = decodeURIComponent(window.location.href);
                 if (url.indexOf('?') > 0)
                 {
                 var terms = '';
                 var params = url.split('?');
                 var values = params[1].split('&');
                 for (var i=0;i<values.length;i++)
                 {
                 var param = values[i].split('=');
                 if (param[0] == 'q')
                 {
                 terms = unescape(param[1]);
                 break;
                 }
                 }
                 if (terms != '')
                 {
                 var element = document.getElementById('SiteSearch4');
                 element.value = terms;
                 searchPage('');
                 }
                 }
                 }*/
            </script>
            <script>
                $(document).ready(function () {
                    $("#SlideShow1").slideshow({
                        interval: 3000,
                        type: 'sequence',
                        effect: 'none',
                        direction: '',
                        pagination: false,
                        effectlength: 1000
                    });
                    $("#Layer32").stickylayer({
                        orientation: 9,
                        position: [0, 0],
                        delay: 300
                    });
                    $("#Layer35").stickylayer({
                        orientation: 9,
                        position: [0, 0],
                        delay: 300
                    });
                    $("#Layer145").stickylayer({
                        orientation: 9,
                        position: [0, 0],
                        delay: 300
                    });
                    var Carousel3Opts = {
                        delay: 4000,
                        duration: 500,
                        easing: 'easeInOutBounce',
                        mode: 'fade',
                        direction: '',
                        pagination: false,
                        start: 0
                    };
                    $("#Carousel3").carouseleffects(Carousel3Opts);
                    $("#Carousel3_back a").click(function () {
                        $('#Carousel3').carouseleffects('prev');
                    });
                    $("#Carousel3_next a").click(function () {
                        $('#Carousel3').carouseleffects('next');
                    });
                    $("#Layer185").stickylayer({
                        orientation: 9,
                        position: [0, 0],
                        delay: 300
                    });
                    searchParseURL();
                    var $autocomplete = $('<ul class="autocomplete"></ul>').hide().insertAfter('#SiteSearch4');
                    var selectedItem = null;
                    var setSelectedItem = function (item) {
                        selectedItem = item;
                        if (selectedItem === null) {
                            $autocomplete.hide();
                            return;
                        }
                        if (selectedItem < 0) {
                            selectedItem = 0;
                        }
                        if (selectedItem >= $autocomplete.find('li').length) {
                            selectedItem = $autocomplete.find('li').length - 1;
                        }
                        $autocomplete.find('li').removeClass('selected').eq(selectedItem).addClass('selected');
                        $autocomplete.css('left', $('#SiteSearch4').position().left);
                        $autocomplete.css('top', $('#SiteSearch4').position().top + $('#SiteSearch4').outerHeight());
                        $autocomplete.show();
                    };
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
                    var jQueryToolTip2Opts = {
                        hide: true,
                        show: true,
                        content: '<span style="color:#696969;font-family:Arial;font-size:12px;">Buyer has a current request,<br>Visit his Desksite to view and deal.</span>',
                        items: '#wb_Image2',
                        position: {
                            my: "right bottom",
                            at: "left top",
                            collision: "flipfit"
                        }
                    };
                    $("#wb_Image2").tooltip(jQueryToolTip2Opts);
                    var jQueryToolTip3Opts = {
                        hide: true,
                        show: true,
                        content: '<span style="color:#696969;font-family:Arial;font-size:12px;">This buyer is an active..</span>',
                        items: '#wb_Image1',
                        position: {
                            my: "right bottom",
                            at: "left top",
                            collision: "flipfit"
                        }
                    };
                    $("#wb_Image1").tooltip(jQueryToolTip3Opts);
                    var jQueryToolTip1Opts = {
                        hide: true,
                        show: true,
                        content: '<span style="color:#696969;font-family:Arial;font-size:12px;">Buyer is a member <br>in your community</span>',
                        items: '#wb_Image10',
                        position: {
                            my: "right bottom",
                            at: "left top",
                            collision: "flipfit"
                        }
                    };
                    $("#wb_Image10").tooltip(jQueryToolTip1Opts);
                    $("#Layer_buyer").stickylayer({
                        orientation: 9,
                        position: [0, 0],
                        delay: 0,
                        keepOriginalPos: true
                    });
                });
            </script>
