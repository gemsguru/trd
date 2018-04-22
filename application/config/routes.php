<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/ 
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
| 
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE; 

$route['intro'] = 'frontend/home/intro';
$route['stationhome'] = 'frontend/SellerStation';
$route['sellerstation/my_account'] = 'frontend/SellerStation/myAccount';
$route['homepage/setcookie'] = 'frontend/Home/setHomePageCookie';
$route['account/stepone'] = 'frontend/Account/stepOne';
$route['account/check_email'] = 'frontend/Account/check_email';
$route['captcha'] = 'frontend/Account/captcha';
$route['account/getverificationcode'] = 'frontend/Account/get_verification_code';
$route['account/step_three'] = 'frontend/Account/step_three';
$route['account/personal_info'] = 'frontend/Account/personal_info';
$route['logout'] = 'frontend/Account/logout';
$route['account/save_personal_info'] = 'frontend/Account/save_personal_info';
$route['account/buisness_information'] = 'frontend/Account/buisness_information';
$route['account/save_buisness_info'] = 'frontend/Account/save_buisness_info';
$route['account/save_buisness_branches'] = 'frontend/Account/saveBranches';
$route['account/factory_details'] = 'frontend/Account/factory_details';
$route['account/save_factory_details'] = 'frontend/Account/save_factory_details';
$route['account/trade'] = 'frontend/Account/trade';
$route['account/save_trade_info'] = 'frontend/Account/save_trade_info';
$route['account/certificate'] = 'frontend/Account/certificate';
$route['account/save_certificate_info'] = 'frontend/Account/save_certificate_info';
$route['account/login'] = 'frontend/Account/login';
$route['login/home'] = 'frontend/home/afterloginHome';
$route['refresh/create_captcha']= 'frontend/home/create_captcha';
//$route['account/kk'] = 'frontend/Account/captcha';//'frontent/Account/continueRegistration';
$route['continueregistration'] = 'frontend/Account/continueRegistration';
$route['signin'] = 'frontend/Home/signin';
$route['account/forgotemail'] = 'frontend/Account/forgetsendMail';
$route['account/saveNewpassword'] = 'frontend/Account/updatePassword';
$route['account/changelogo'] = 'frontend/Account/changeBusinessLogo';
$route['account/savebusinesslogotempararyImage'] = 'frontend/Account/saveBusinessLogoTempararyImage';
$route['account/changeprofilepic'] = 'frontend/Account/changeProfilePic';
$route['account/saveprofilepictempararyimage'] = 'frontend/Account/saveProfilePicTempararyImage';
$route['account/savecertificatetempararyImage'] = 'frontend/Account/saveCertificateTempararyImage';
$route['account/changecertificate'] = 'frontend/Account/changeCertificate';
$route['account/savemorecertificatetempararyImage'] = 'frontend/Account/saveMoreCertificateTempararyImage';
$route['account/changemorecertificate'] = 'frontend/Account/changeMoreCertificate';
$route['account/savebuisnesscontactpersone'] = 'frontend/Account/saveBusinessContact';
$route['account/opencontact'] = 'frontend/Account/openContact';
$route['account/termscondition'] = 'frontend/Account/termsCondition';


/* My station */
$route['mystation'] = 'frontend/Station';
$route['shipper_mystation'] = 'frontend/Station/shipperStation';
$route['buyer_mystation'] = 'frontend/Station/buyerStation';
$route['mystation/buyermessage'] = 'frontend/Station/buyerMessage';
$route['mystation/myaccount'] = 'frontend/Station/myaccount';
$route['mystation/changepassword'] = 'frontend/Station/changepassword';
$route['mystation/editpassword'] = 'frontend/Station/editpassword';
$route['mystation/checkCurrentPassword'] = 'frontend/Station/checkCurrentPassword';
$route['mystation/viewmyaccount'] = 'frontend/Station/viewmyaccount';
$route['mystation/account/personalinfo'] = 'frontend/Station/accountPersonalInfo';
$route['mystation/account/companyinfo'] = 'frontend/Station/accountCompanyInfo';
$route['mystation/account/factoryinfo'] = 'frontend/Station/accountFactoryInfo';
$route['mystation/account/tradeinfo'] = 'frontend/Station/accountTradeInfo';
$route['mystation/account/certificateinfo'] = 'frontend/Station/accountCertificateInfo';
$route['mystation/account/subuserinfo'] = 'frontend/Station/accountSubuserInfo';
$route['mystation/editprofile'] = 'frontend/Station/editprofile';
$route['mystation/editcompanyinfo'] = 'frontend/Station/editCompanyInfo';
$route['mystation/editfactoryinfo'] = 'frontend/Station/editFactoryInfo';
$route['mystation/edittradeinfo'] = 'frontend/Station/editTradeInfo';
$route['mystation/editcertificateinfo'] = 'frontend/Station/editCertificateInfo';
$route['mystation/createsubuser'] = 'frontend/Station/createSubuser';
$route['mystation/suspendsubuser'] = 'frontend/Station/suspendSubUser';
$route['mystation/allowsubuser'] = 'frontend/Station/allowSubuser';
$route['mystation/deletesubuser'] = 'frontend/Station/deleteSubUser';
$route['account/business/delete'] = 'frontend/Account/deleteBusiness';
$route['account/business/disable'] = 'frontend/Account/disableBusiness';
$route['dispalyimage'] = 'frontend/Station/Dispalyimage';
$route['account/check_emailcontactperson'] = 'frontend/Station/check_emailcontactperson';

$route['mystation/mypackage'] = 'frontend/Station/mypackage';
$route['mystation/mypackage/payment'] = 'frontend/Station/getPaymentLink';
$route['mystation/payment/payment-successful'] = 'frontend/Station/paymentSuccess';
$route['mystation/payment/payment-cancelled'] = 'frontend/Station/paymentCancel';
$route['mystation/payment/payment-notify'] = 'frontend/Station/paymentNotify';
$route['mystation/ranking'] = 'frontend/Station/myRank';
$route['mystation/verifiedlogo/request'] = 'frontend/Station/logoVerificationRequest';
$route['mystation/verifiedlogo/buyerrequest'] = 'frontend/Station/logoBuyerVerificationRequest';
$route['mystation/gaurantee/cancel'] = 'frontend/Station/cancelGaurantee';
$route['mystation/gaurantee/confirm'] = 'frontend/Station/confirmGaurantee';
$route['mystation/product/certs/confirm'] = 'frontend/Station/confirmProductCerts';
$route['mystation/license/confirm'] = 'frontend/Station/confirmProductLicense';

/*My deskside */
$route['mystation/mydeskside'] = 'frontend/Deskside/myDeskside';
$route['mystation/mydeskdesign'] = 'frontend/Deskside/myDeskdesign';
$route['mystation/desksite/newproducts'] = 'frontend/Deskside/myDeskMainProduct';
$route['mystation/desksite/subproducts'] = 'frontend/Deskside/desksiteSubProduct';
$route['mystation/desksite/uploaddsbackground'] = 'frontend/Deskside/uploadDsBackground';
$route['mystation/desksite/uploaddsbackgroundmain'] = 'frontend/Deskside/uploadMainDsBackground';
$route['mystation/desksite/uploadwebsitebackground'] = 'frontend/Deskside/uploadWebsiteBackground';
$route['mystation/desksite/uploadinfoimage'] = 'frontend/Deskside/uploadInfoImage';
$route['mystation/desksite/uploadcompanyimage'] = 'frontend/Deskside/uploadCompanyImage';
$route['mystation/desksite/saveproducts'] = 'frontend/Deskside/saveNewProducts';
$route['mystation/desksite/savesubproducts'] = 'frontend/Deskside/saveSubProducts';
$route['mystation/desksite/subproductitems'] = 'frontend/Deskside/desksiteSubProductItem';
$route['mystation/desksite/savesubproductitem'] = 'frontend/Deskside/saveSubProductItems';
$route['mystation/desksite/newproductitem'] = 'frontend/Deskside/newDesksiteSubProductItem';
$route['mystation/desksite/savenewproductitem'] = 'frontend/Deskside/saveNewProductItems';
$route['mystation/desksite/editproductitem/([0-9]+)'] = 'frontend/Deskside/editDesksiteSubProductItem/$1';
$route['mystation/desksite/updateproductitem'] = 'frontend/Deskside/updateDesksiteSubProductItem';
$route['mystation/desksite/deleteproductitem'] = 'frontend/Deskside/deleteDesksiteSubProductItem';
$route['mystation/desksite/backgroundimages'] = 'frontend/Deskside/editDesksiteBackgroundImage';
$route['mystation/desksite/viewmainproducts'] = 'frontend/Deskside/viewMainProduct';
$route['mystation/desksite/addmainproduct'] = 'frontend/Deskside/addMainProduct';
$route['mystation/desksite/updatemainproduct'] = 'frontend/Deskside/updateMainProduct';
$route['mystation/desksite/deletemainproduct'] = 'frontend/Deskside/deleteMainProduct';
$route['mystation/desksite/moveupmainproduct'] = 'frontend/Deskside/moveUpMainProduct';
$route['mystation/desksite/movedownmainproduct'] = 'frontend/Deskside/moveDownMainProduct';
$route['mystation/desksite/viewsubproducts'] = 'frontend/Deskside/viewSubProduct';
$route['mystation/desksite/addsubproduct'] = 'frontend/Deskside/addSubProduct';
$route['mystation/desksite/updatesubproduct'] = 'frontend/Deskside/updateSubProduct';
$route['mystation/desksite/deletesubproduct'] = 'frontend/Deskside/deleteSubProduct';
$route['mystation/desksite/moveupsubproduct'] = 'frontend/Deskside/moveUpSubProduct';
$route['mystation/desksite/movedownsubproduct'] = 'frontend/Deskside/moveDownSubProduct';
$route['mystation/desksite/hotsales'] = 'frontend/Deskside/desksiteHoteSaleItem';
$route['mystation/desksite/newarrivals'] = 'frontend/Deskside/desksiteNewArrivalItem';
$route['mystation/desksite/addhotsale'] = 'frontend/Deskside/addHotSaleProduct';
$route['mystation/desksite/deletehotsale'] = 'frontend/Deskside/deleteHotSaleProduct';
$route['mystation/desksite/addnewarrival'] = 'frontend/Deskside/addNewArrivalProduct';
$route['mystation/desksite/deletenewarrival'] = 'frontend/Deskside/deleteNewArrivalProduct';
$route['mystation/desksite/searchproduct'] = 'frontend/Deskside/searchProducts';
$route['mystation/mybusinessads'] = 'frontend/MyAds/getMyAds';
$route['mystation/ads/mainscreen'] = 'frontend/MyAds/getMainScreenAds';
$route['mystation/ads/featuredproducts'] = 'frontend/MyAds/getFeaturedProductsAds';
$route['mystation/ads/mainscreen/payment'] = 'frontend/MyAds/getPaymentMSAds';
$route['mystation/ads/mainscreen/next'] = 'frontend/MyAds/getMSAdsNextScreen';
$route['mystation/ads/mainscreen/confirm'] = 'frontend/MyAds/confirmMainScreenAd';
$route['mystation/video/list'] = 'frontend/Vedio/getProductVideoList';
$route['mystation/vcatalogue/list'] = 'frontend/Catalouge/getProductCatalogueList';
$route['mystation/ads/featured/payment'] = 'frontend/MyAds/getPaymentFCAds';
$route['mystation/ads/featured/next'] = 'frontend/MyAds/getFCAdsNextScreen';
$route['mystation/3dpro/list'] = 'frontend/Dproduct/get3DProductList';
$route['mystation/product/list'] = 'frontend/Deskside/getMyProductList';
$route['mystation/ads/featured/confirm'] = 'frontend/MyAds/confirmFeaturedCarouselAd';
$route['mystation/ads/package/payment'] = 'frontend/Station/confirmPackagePayment';
$route['mystation/mytools'] = 'frontend/Tools/viewMyTools';
$route['mystation/business/stats'] = 'frontend/Tools/searchBusinessStats';
$route['mystation/product/stats'] = 'frontend/Tools/searchProductStats';
$route['mystation/aproduct/stats'] = 'frontend/Tools/searchAProductStats';
$route['mystation/verification'] = 'frontend/Station/getMyVerification';
$route['mystation/buyerverification'] = 'frontend/Station/getMyBuyerVerification';
$route['mystation/shipperdeskside'] = 'frontend/Deskside/myShipperDeskside';
$route['mystation/desksite/mainservices'] = 'frontend/Deskside/getMainServices';
$route['mystation/desksite/savemainservices'] = 'frontend/Deskside/saveMainServices';
$route['mystation/desksite/viewmainservices'] = 'frontend/Deskside/viewMainServices';
$route['mystation/desksite/specialservices'] = 'frontend/Deskside/openSpecialService';
$route['mystation/desksite/addspecialservices'] = 'frontend/Deskside/addSpecialServices';
$route['mystation/desksite/newmainservice'] = 'frontend/Deskside/newMainService';
$route['mystation/desksite/addnewservice'] = 'frontend/Deskside/addNewMainService';
$route['mystation/desksite/editmainservice/([0-9]+)'] = 'frontend/Deskside/editNewMainService/$1';
$route['mystation/desksite/updateservice'] = 'frontend/Deskside/updateMainService';
$route['mystation/desksite/deletemainservice'] = 'frontend/Deskside/deleteMainService';
$route['mystation/desksite/newspecialservice'] = 'frontend/Deskside/newSpecialService';
$route['mystation/desksite/editspecialservice/([0-9]+)'] = 'frontend/Deskside/editNewSpecialService/$1';
$route['mystation/desksite/updatespecialservice'] = 'frontend/Deskside/updateSpecialService';
$route['mystation/shippertools'] = 'frontend/Tools/viewMyShipperTools';
$route['mystation/service/stats'] = 'frontend/Tools/searchServiceStats';
$route['mystation/aservice/stats'] = 'frontend/Tools/searchAServiceStats';
$route['mystation/desksite/buyer'] = 'frontend/Deskside/myBuyerDeskside';
$route['mystation/desksite/buyer/saveproducts'] = 'frontend/Deskside/saveBuyerMainProducts';
$route['mystation/desksite/buyer/viewmainproducts'] = 'frontend/Deskside/viewBuyerMainProduct';
$route['mystation/buyertools'] = 'frontend/Tools/viewMyBuyerTools';
$route['mystation/tools/aceeptcontrol'] = 'frontend/Tools/acceptBuyerControls';
$route['mystation/desksite/productitem/cat/update'] = 'frontend/Deskside/updateProductCategory';

/* My Files */
$route['mystation/myfile'] = 'frontend/MyFiles/myFile';
$route['mystation/publicfileupload'] = 'frontend/MyFiles/publicFileUpload';
$route['mystation/privatefileupload'] = 'frontend/MyFiles/privateFileUpload';
$route['mystation/deletefile'] = 'frontend/MyFiles/deleteFile';
$route['mystation/checkfilepassword'] = 'frontend/MyFiles/checkFilePassword';
$route['mystation/myfile/record/download/([0-9]+)'] = 'frontend/MyFiles/recordFileDownload/$1';
$route['mystation/myfile/download/([0-9]+)'] = 'frontend/MyFiles/downloadFile/$1';

/* 3D Product */
$route['mystation/3dproduct'] = 'frontend/Dproduct/dproduct';
$route['mystation/add3dproduct'] = 'frontend/Dproduct/add3dproduct';
$route['mystation/edit3dproduct'] = 'frontend/Dproduct/edit3dproduct';
$route['mystation/edit3dproductForm'] = 'frontend/Dproduct/edit3dProductForm';
$route['mystation/product_item'] = 'frontend/Dproduct/getProductByName';
$route['mystation/save3dproducttempararyimage'] = 'frontend/Dproduct/save3DProductTemparary';
$route['mystation/add3dproductpicture'] = 'frontend/Dproduct/add3dProductpicture';
$route['mystation/delete3dproduct'] = 'frontend/Dproduct/delete3DProduct';
$route['mystation/editproduct'] = 'frontend/Dproduct/editProduct';
$route['mystation/linkproduct'] = 'frontend/Dproduct/linkProduct';
$route['mystation/show3dimages'] = 'frontend/Dproduct/show3dImages';
$route['mystation/publish3dimages'] = 'frontend/Dproduct/publish3dImages';
$route['mystation/change3dimages'] = 'frontend/Dproduct/change3dimages';

$route['mystation/getproductlist'] = 'frontend/Dproduct/getProductList'; 
$route['mystation/getproductbyid'] = 'frontend/Dproduct/getProductById';
$route['mystation/getselectedproductlists'] = 'frontend/Dproduct/getSelectedProductLists';
$route['mystation/changimage'] = 'frontend/Dproduct/changImage'; 
$route['mystation/changelinkproduct'] = 'frontend/Dproduct/changeLinkProduct'; 
$route['mystation/messagedproduct'] = 'frontend/Dproduct/messageDproduct'; 
$route['mystation/getdproductbyid'] = 'frontend/Dproduct/getDproductById';
$route['mystation/3dpro/show/([0-9]+)'] = 'frontend/Dproduct/show3Dpro/$1';
$route['mystation/3dpro/showbeforesave'] = 'frontend/Dproduct/show3Dprobeforesave';


/*catalouge */
$route['mystation/catalouge'] = 'frontend/Catalouge/catalouge';
$route['mystation/addCatelough'] = 'frontend/Catalouge/addCatelough';
$route['mystation/editCatelough'] = 'frontend/Catalouge/editCatelough';
$route['mystation/editCatelougeForm'] = 'frontend/Catalouge/editCatelougeForm';
$route['mystation/account/savevcovertempimg'] = 'frontend/Catalouge/saveVcatalogueTempararyImage';
$route['mystation/account/savevcoverimg'] = 'frontend/Catalouge/changeVcatalogueImage';
$route['mystation/catalogue/add'] = 'frontend/Catalouge/addNewCatalogue';
$route['mystation/catalogue/content/([0-9]+)'] = 'frontend/Catalouge/getCatalogueContent/$1';
$route['mystation/catalogue/publish'] = 'frontend/Catalouge/publishCatalogue';
$route['mystation/catalogue/update'] = 'frontend/Catalouge/updateNewCatalogue';
$route['mystation/catalogue/product/search'] = 'frontend/Catalouge/catalogueProductSearch';
$route['mystation/catalogue/add/items'] = 'frontend/Catalouge/addCatalogueItems';
$route['mystation/catalogue/delete'] = 'frontend/Catalouge/deleteCatalogues';
$route['mystation/catalogue/item/movetofront'] = 'frontend/Catalouge/moveCatalogueItemUp';
$route['mystation/catalogue/item/movetoback'] = 'frontend/Catalouge/moveCatalogueItemDown';

/* Vedios */
$route['mystation/vedio'] = 'frontend/Vedio/vedio';
$route['mystation/addvedio'] = 'frontend/Vedio/addVedio';
$route['mystation/editvedio'] = 'frontend/Vedio/editVedio';
$route['mystation/publishvedio'] = 'frontend/Vedio/publishVedio';
$route['mystation/deletevedio'] = 'frontend/Vedio/DeleteVedio';
$route['mystation/subproductlist'] = 'frontend/Vedio/subProductList';
$route['mystation/saveservicevedio'] = 'frontend/Vedio/saveServiceVedio';
$route['mystation/updatevediotitle'] = 'frontend/Vedio/updateVedioTitle';
$route['mystation/updatevediodescription'] = 'frontend/Vedio/updateVedioDescription';
$route['mystation/changevedio'] = 'frontend/Vedio/changeVedio';
$route['mystation/deleteservicevedio'] = 'frontend/Vedio/deleteServiceVedio';

/*Alert.. */
$route['mystation/alerts'] = 'frontend/Alerts/alert';
$route['mystation/favoriteinfo'] = 'frontend/Alerts/favoriteInfo';
$route['mystation/favoritebuyerinfo'] = 'frontend/Alerts/favoriteBuyerInfo';
$route['mystation/mycart'] = 'frontend/Alerts/myCart';
$route['mystation/deletefromcart'] = 'frontend/Alerts/deleteFromCart';
$route['mystation/inquiry'] = 'frontend/Alerts/inquiry';
$route['mystation/deleteinquiry'] = 'frontend/Alerts/deleteInquiry';
$route['mystation/deletefavorite'] = 'frontend/Alerts/deleteFavorite';
$route['mystation/productitemlistbyseller'] = 'frontend/Alerts/productItemlistBySeller';
$route['mystation/addproductcart'] = 'frontend/Alerts/addProductCart';
$route['mystation/request'] = 'frontend/Alerts/request';
$route['mystation/offer'] = 'frontend/Alerts/offer';
$route['mystation/sellerorder'] = 'frontend/Alerts/sellerOrder';
$route['mystation/initiatorder'] = 'frontend/Alerts/InitiatOrder';
$route['mystation/pininquiry'] = 'frontend/Alerts/pinInquiry';
$route['mystation/unreadinquiry'] = 'frontend/Alerts/unreadInquiry';
$route['mystation/readinquiry'] = 'frontend/Alerts/readInquiry';
$route['mystation/deleteorder'] = 'frontend/Alerts/deleteOrder';
$route['mystation/inquiryreplay'] = 'frontend/Alerts/inquiryReplay';
$route['mystation/addedrequest'] = 'frontend/Alerts/addedRequest';
$route['mystation/invitationrequest'] = 'frontend/Alerts/invitationRequest';
$route['mystation/deleterequest'] = 'frontend/Alerts/deleteRequest';
$route['mystation/saveinquiryreplay'] = 'frontend/Alerts/saveInquiryReplay';
$route['mystation/offerreplay'] = 'frontend/Alerts/offerReplay';
$route['mystation/saveofferreplay'] = 'frontend/Alerts/saveOfferReplay';
$route['mystation/deleteoffer'] = 'frontend/Alerts/deleteOffer';
$route['mystation/unreadoffer'] = 'frontend/Alerts/unreadOffer';
$route['mystation/readoffer'] = 'frontend/Alerts/readOffer';
$route['mystation/pinoffer'] = 'frontend/Alerts/pinOffer';
$route['mystation/invoice/([0-9]+)'] = 'frontend/Alerts/invoice/$1';
$route['mystation/editinvoice/([0-9]+)'] = 'frontend/Alerts/editInvoice/$1';
$route['mystation/updateinvoice'] = 'frontend/Alerts/updateInvoice';
$route['mystation/deleteinvoice'] = 'frontend/Alerts/deleteInvoice';
$route['mystation/addinvoiceproduct'] = 'frontend/Alerts/addInvoiceProduct';
$route['mystation/firstpartyconfirm'] = 'frontend/Alerts/firstPartyConfirm';
$route['mystation/secondpartyconfirm'] = 'frontend/Alerts/secondPartyConfirm';

/* Language */
$route['mystation/language'] = 'frontend/Language/language';
$route['mystation/translation/([0-9]+)'] = 'frontend/Language/chineseTranslation/$1';
$route['mystation/savelangpersonalinfo'] = 'frontend/Language/saveLangPersonalinfo';
$route['mystation/savelangcompanyinfo'] = 'frontend/Language/savelangCompanyInfo';
$route['mystation/savelangmainproductinfo'] = 'frontend/Language/saveLangMainProductInfo';
$route['mystation/getlanguageproduct'] = 'frontend/Language/getLanguageProduct';
$route['mystation/getlanguageservice'] = 'frontend/Language/getLanguageService';
$route['mystation/savelangproductinfo'] = 'frontend/Language/saveLangProductInfo';
$route['mystation/savelangserviceinfo'] = 'frontend/Language/savelangServiceInfo';
$route['mystation/addnewlanguage'] = 'frontend/Language/saveNewLanguage';
$route['mystation/savelanguagebusiness'] = 'frontend/Language/saveLanguageBusiness';
$route['mystation/publishlanguage'] = 'frontend/Language/publishLanguage';
$route['mystation/deletelanguage'] = 'frontend/Language/deletedLanguage';

/* UD TALK */
$route['mystation/udtalk'] = 'frontend/Udtalks/udtalk';
$route['mystation/udtalks/saveimage'] = 'frontend/Udtalks/saveImage';
$route['mystation/udtalk/delete/([0-9]+)'] = 'frontend/Udtalks/deleteImage/$1';

/* Frontend Pages .. */
$route['seller'] = 'frontend/Home/sellersList';
$route['seller/desksites'] = 'frontend/Product/getAllSellerDesksites';
$route['shipper/desksites'] = 'frontend/Product/getAllShipperDesksites';
$route['buyer'] = 'frontend/Home/buyersList';
$route['shipper'] = 'frontend/Home/shippersList';
$route['search'] = 'frontend/Home/search';

$route['products'] = 'frontend/Product';
$route['products/list'] = 'frontend/Product/productList';
$route['products/details/([0-9]+)'] = 'frontend/Product/productDetails/$1';
$route['product/detail/([0-9]+)'] = 'frontend/Product/productDetailById/$1';
$route['seller/product/([0-9]+)'] = 'frontend/Product/productListBySellerId/$1';
$route['product/subcategory/([0-9]+)/([0-9]+)'] = 'frontend/Product/productListBySubCategory/$1/$2';
$route['product/mainproduct/([0-9]+)/([0-9]+)'] = 'frontend/Product/productListByMainProduct/$1/$2';
$route['product/subproduct/([0-9]+)/([0-9]+)'] = 'frontend/Product/productListBySubProduct/$1/$2';
$route['product/csmproduct/([0-9]+)/([0-9]+)/([0-9]+)/([0-9]+)'] = 'frontend/Product/productListByCat/$1/$2/$3/$4';
$route['product/spproduct/([0-9]+)/([0-9]+)'] = 'frontend/Product/specialProductList/$1/$2';
$route['product/details/page/([0-9]+)'] = 'frontend/Product/productDetailsPage/$1';
$route['seller/video/view/([0-9]+)'] = 'frontend/Home/getSellerVideo/$1';
$route['seller/product/view/([0-9]+)'] = 'frontend/Home/getSellerProduct/$1';
$route['product/verified'] = 'frontend/Product/productVerifiedFirst';
$route['product/show/community/([0-9]+)'] = 'frontend/Product/productCommunityFirst/$1';
$route['product/hide/community/([0-9]+)'] = 'frontend/Product/productCommunityHide/$1';
$route['shipper/show/community/([0-9]+)'] = 'frontend/Home/getShippersByCommunity/$1';
$route['shipper/hide/community/([0-9]+)'] = 'frontend/Home/getShippersHideCommunity/$1';
$route['shipper/shippingLine/([0-9]+)'] = 'frontend/Home/getShippersShippingLines/$1';
$route['seller/blackhorse/memberlist'] = 'frontend/Home/getSellersByBlackHorseMember';
$route['seller/community/memberlist/([0-9]+)'] = 'frontend/Home/getSellersByCommunityMember/$1';
$route['seller/hidecommunity/memberlist/([0-9]+)'] = 'frontend/Home/getSellersByCommunityMemberhide/$1';
$route['catalogue/popup/([0-9]+)'] = 'frontend/Home/getCatalogueById/$1';
$route['catalogue/business/([0-9]+)'] = 'frontend/Home/getCatalogueByBusiId/$1';
$route['catalogue/business/next/([0-9]+)'] = 'frontend/Home/getNextCatalogueById/$1';
$route['seller/popup/([0-9]+)'] = 'frontend/Home/getSellerById/$1';
$route['buyer/popup/([0-9]+)'] = 'frontend/Home/getBuyerById/$1';
$route['shipper/popup/([0-9]+)'] = 'frontend/Home/getShipperById/$1';
$route['item/details/([0-9]+)/([0-9]+)'] = 'frontend/Product/itemDetailById/$1/$2';
$route['video/item/details/([0-9]+)/([0-9]+)'] = 'frontend/Product/videoItemDetailById/$1/$2';

$route['pro-video'] = 'frontend/Vedio/productVideoList';
$route['video/details/([0-9]+)'] = 'frontend/Product/videoDetailById/$1';
$route['seller/video/([0-9]+)'] = 'frontend/Vedio/productVideoListBySellerId/$1';
$route['video/verifieduser/memberlist'] = 'frontend/Vedio/getVedioByVerifiedUser';
$route['video/community/memberlist/([0-9]+)'] = 'frontend/Vedio/getVedioByCommunityMember/$1';
$route['video/hidecommunity/memberlist/([0-9]+)'] = 'frontend/Vedio/getVedioByCommunityMemberhide/$1';
$route['bstation'] = 'frontend/Home/bstation';

$route['stock-goods'] = 'frontend/StockMarket';
$route['seller/postinsert'] = 'frontend/StockMarket/postInsert';
$route['buyer-request'] = 'frontend/StockMarket/buyerRequest';
$route['seller-offer'] = 'frontend/StockMarket/sellerOffer';

$route['b-station'] = 'frontend/Bstation';
$route['b-station/buyer_request/([0-9]+)'] = 'frontend/Bstation/newBuyerRequest/$1';
$route['b-station/savebuyerrequest'] = 'frontend/Bstation/saveBuyerRequest';
$route['b-station/seller_offer/([0-9]+)'] = 'frontend/Bstation/newSellerOffer/$1';
$route['b-station/saveselleroffer'] = 'frontend/Bstation/saveSellerOffer';
$route['seller/bstationpostinsert'] = 'frontend/Bstation/bstationPostInsert';
$route['seller/bstationpostinsertbuyer'] = 'frontend/Bstation/bstationPostInsertBuyer';
$route['product/images'] = 'frontend/Bstation/ProductImages';

$route['desksite/([0-9]+)'] = 'frontend/Home/DesksiteByBusiId/$1';
$route['desksite/([0-9]+)/([0-9]+)'] = 'frontend/Home/DesksiteByBusiId/$1/$2';
$route['desksite/company/([0-9]+)'] = 'frontend/Home/getComapnyProfile/$1';
$route['desksite/company/shipper/([0-9]+)'] = 'frontend/Home/getShipperComapnyProfile/$1';
$route['desksite/company/buyer/([0-9]+)'] = 'frontend/Home/getBuyerComapnyProfile/$1';
$route['desksite/company/about/([0-9]+)'] = 'frontend/Home/getComapnyAbout/$1';
$route['desksite/company/certificate/([0-9]+)'] = 'frontend/Home/getComapnyCertificate/$1';
$route['desksite/advantage/([0-9]+)'] = 'frontend/Home/getAdvantage/$1';
$route['desksite/contact/([0-9]+)'] = 'frontend/Home/getContactPerson/$1';
$route['desksite/myfiles/([0-9]+)'] = 'frontend/Home/getMyfiles/$1';
$route['desksite/video/([0-9]+)'] = 'frontend/Home/getProductVideos/$1';
$route['desksite/video/shipper/([0-9]+)'] = 'frontend/Home/getShipperVideos/$1';
$route['desksite/post/([0-9]+)'] = 'frontend/Home/getCurrentPost/$1';
$route['desksite/3dproduct/([0-9]+)'] = 'frontend/Home/get3DProduct/$1';
$route['desksite/favourite/([0-9]+)/([0-9]+)'] = 'frontend/Home/addFavourite/$1/$2';
$route['desksite/request/([0-9]+)'] = 'frontend/Home/buyerCurrentRequest/$1';
$route['product/search'] = 'frontend/Home/desksiteSearch';
$route['addtofavourite/([0-9]+)/([0-9]+)'] = 'frontend/Favourite/addToFavourite/$1/$2';
$route ['website/product/([0-9]+)'] ='frontend/Home/productViewWebsite/$1';
$route['desksite/shipper/services/([0-9]+)'] = 'frontend/Home/getShipperServices/$1';
$route ['advertisement/([0-9]+)'] ='frontend/Home/advertisement/$1';
$route['buyer/profile/([0-9]+)'] = 'frontend/Home/buyerProfileByBusiId/$1';
$route['shipper/profile/([0-9]+)'] = 'frontend/Home/shipperProfileByBusiId/$1';
$route['desksite/route/([0-9]+)'] = 'frontend/Home/getRoutesByBusiId/$1';
$route['desksite/verified/([0-9]+)'] = 'frontend/Home/getVerifiedByBusiId/$1';
$route['desksite/product/menu/([0-9]+)'] = 'frontend/Home/getProductCategories/$1';
$route['([0-9]+)/ads-checkout'] = 'frontend/MyAds/msCheckout/$1';
$route['([0-9]+)/featured-ads-checkout'] = 'frontend/MyAds/fcCheckout/$1';
$route['([0-9]+)/subscription-checkout'] = 'frontend/Home/getSubscriptionCheckout/$1';
$route['desksite/like/([0-9]+)'] = 'frontend/Home/likeBusiness/$1';
$route['desksite/catalogue/like/([0-9]+)'] = 'frontend/Home/likeCatalogue/$1';
$route['desksite/general_enquiry/([0-9]+)'] = 'frontend/Home/getGeneralInquiry/$1';
$route['desksite/item_enquiry/([0-9]+)/([0-9]+)'] = 'frontend/Home/getItemInquiry/$1/$2';
$route['desksite/saveenquiry'] = 'frontend/Home/saveGeneralInquiry';
$route['desksite/saveoffer'] = 'frontend/Home/saveGeneralOffer';
$route['desksite/product/like/([0-9]+)'] = 'frontend/Product/likeProduct/$1';
$route['desksite/share'] = 'frontend/Product/shareWithWorld';
$route['desksite/savecontactus'] = 'frontend/Home/saveContactUs';


/********************  Community **************/

$route['add/community/([0-9]+)'] = 'frontend/Home/AddCommunity/$1';
$route['community'] = 'frontend/Community';
$route['community/communitypost'] = 'frontend/Community/communityPostInsert';
$route['community/deletepost'] = 'frontend/Community/deleteCommunityPost';
$route['community/viewpost'] = 'frontend/Community/viewUserPost';
$route['community/editprofile'] = 'frontend/Community/editProfile';
$route['community/post/like'] = 'frontend/Community/postLike';
$route['community/post/viewlike'] = 'frontend/Community/viewPostLike';
$route['community/post/comment'] = 'frontend/Community/commentPost';
$route['community/post/viewcomment'] = 'frontend/Community/viewPostcomment';
$route['addtomycommunity/([0-9]+)'] = 'frontend/Community/addToCommunity/$1';
$route['additemtocart'] = 'frontend/Product/addItemToCart';
$route['likevideo/([0-9]+)'] = 'frontend/Vedio/likeVideo/$1';
$route['community/product/images/([0-9]+)'] = 'frontend/Community/selectProductImages/$1';
$route['mybusiness/profile/update'] = 'frontend/Community/updateMyNickName';
$route['mybusiness/profile/isonline'] = 'frontend/Community/updateOnlineStatus';
$route['community/members/search'] = 'frontend/Community/searchMyCommunityMemberByName';
$route['community/members/delete'] = 'frontend/Community/deleteMyCommunityMembers';
$route['mycommunity/member/delete/([0-9]+)'] = 'frontend/Community/deleteCommunityRequest/$1';
$route['mycommunity/member/accept/([0-9]+)'] = 'frontend/Community/acceptCommunityRequest/$1';
$route['mycommunity/member/request'] = 'frontend/Community/getCommunityRequests';
$route['mycommunity/new/offer/([0-9]+)'] = 'frontend/Community/newSellerOffer/$1';
$route['mycommunity/new/request/([0-9]+)'] = 'frontend/Community/newBuyerRequest/$1';
$route['mycommunity/save/offer'] = 'frontend/Community/saveSellerOffer';
$route['mycommunity/save/request'] = 'frontend/Community/saveBuyerRequest';
$route['mycommunity/post/share/([0-9]+)'] = 'frontend/Community/shareCommunityPost/$1';
$route['mycommunity/post/visit/([0-9]+)'] = 'frontend/Community/visitCommunityPost/$1';
$route['mycommunity/posts/realtime'] = 'frontend/Community/getCommunityRealtimePosts';
$route['mycommunity/posts/myposts'] = 'frontend/Community/getCommunityMyPosts';
$route['mycommunity/posts/detail/([0-9]+)'] = 'frontend/Community/getCommunityPostDetail/$1';


$route['stats/business/markvisit'] = 'frontend/Tools/updateBusinessStats';
$route['stats/product/markvisit'] = 'frontend/Tools/updateProductStats';
$route['product/relatedimages/([0-9]+)/([0-9]+)'] = 'frontend/Product/getProductRelatedImages/$1/$2';


/* ******************************** 15-july-17 ************************ */  
$route['seller/city'] = 'frontend/Home/cityByCountry';
$route['bstation/search/posts'] = 'frontend/Bstation/searchBusinessPosts';
$route['bstation/seller/myposts'] = 'frontend/Bstation/myBusinessPosts';
$route['bstation/seller/newpost/form'] = 'frontend/Bstation/sellerNewPost';
$route['bstation/seller/post/close/([0-9]+)'] = 'frontend/Bstation/closeSellerPost/$1';
$route['bstation/seller/post/delete/([0-9]+)'] = 'frontend/Bstation/deleteSellerPost/$1';
$route['bstation/buyer/newpost/form'] = 'frontend/Bstation/buyerNewPost';
$route['bstation/buyer/myposts'] = 'frontend/Bstation/myBuyerBusinessPosts';

$route['stockmarket/search/posts'] = 'frontend/StockMarket/searchBusinessPosts';
$route['stockmarket/seller/myposts'] = 'frontend/StockMarket/myBusinessPosts';
$route['stockmarket/seller/newpost/form'] = 'frontend/StockMarket/sellerNewPost';
$route['stockmarket/seller/post/close/([0-9]+)'] = 'frontend/StockMarket/closeSellerPost/$1';
$route['stockmarket/seller/post/delete/([0-9]+)'] = 'frontend/StockMarket/deleteSellerPost/$1';
$route['stockmarket/buyer/newpost/form'] = 'frontend/StockMarket/buyerNewPost';
$route['stockmarket/buyer/myposts'] = 'frontend/StockMarket/myBuyerBusinessPosts';
$route['stockmarket/buyer_request/([0-9]+)'] = 'frontend/StockMarket/newBuyerRequest/$1';
$route['stockmarket/savebuyerrequest'] = 'frontend/StockMarket/saveBuyerRequest';
$route['stockmarket/seller_offer/([0-9]+)'] = 'frontend/StockMarket/newSellerOffer/$1';
$route['stockmarket/saveselleroffer'] = 'frontend/StockMarket/saveSellerOffer';
$route['stockmarket/addsellerpost'] = 'frontend/StockMarket/postInsert';
$route['stockmarket/addbuyerpost'] = 'frontend/StockMarket/stockPostInsertBuyer';

$route['business/likecomment/([0-9]+)'] = 'frontend/Business/likeComment/$1';
$route['mystation/getloginstatus'] = "frontend/Station/getLoginStatus";
$route['product/item/search'] = "frontend/Product/getMyProductList";

/* *********************************  22-12-2017 ***************************/
$route['3dproducts'] = 'frontend/Product/get3DPrducts';
$route['vcatalogues'] = 'frontend/Product/getAllVCatalogues';

$route['catalogue/pages/([0-9]+)/([0-9]+)'] = 'frontend/Home/getCataloguePages/$1/$2';

// Admin ROutes
$route['admin'] = 'backend/index';
$route['api/auth'] = 'backend/auth/login';
$route['api/current-user'] = 'backend/auth/getLoggetInUser';
$route['api/logout'] = 'backend/auth/logout';
$route['api/sub-admins']['post'] = 'backend/subadmins/add';
$route['api/sub-admins']['put'] = 'backend/subadmins/edit';
$route['api/sub-admins/delete']['put'] = 'backend/subadmins/delete';
$route['api/sub-admins/suspend/(:num)']['put'] = 'backend/subadmins/suspend/$1';
$route['api/sub-admins/(:num)']['get'] = 'backend/subadmins/getAll/$1';
$route['api/sub-admins/permissions']['put'] = 'backend/subadmins/permissions';
$route['api/sub-admins/permissions/([0-9]+)'] = 'backend/subadmins/permissions/$1';

?>
