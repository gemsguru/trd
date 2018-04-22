<?php
class Product extends MX_Controller {

	public function __construct() {
		parent::__construct ();
		$current_lang = $this->session->userdata('my_lang');
		if(!$current_lang) {
			$current_lang = 'english';
			$this->session->set_userdata('my_lang','english');
		}
		$this->load->helper ( 'url' );
		$this->load->helper ( 'cookie' );
		$this->load->helper('mylang');
		$this->load->model('Product_Model','product');
		$this->lang->load($current_lang.'_home_page_lang', $current_lang);
		$fb_config = parse_ini_file ( APPPATH . "config/FB.ini" );
	}

	public function index() {
		$params = $this->input->get();
		$keyword = "";
		if(!empty($params['keyword']))
		$keyword = $params['keyword'];
		$params['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		if(empty($params['page'])) {
			$params['page'] = 1;
		}
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->library('mylib/General', 'general');
		$this->load->model ( 'Account_Model', 'account' );
		$products = $this->sellers->searchProducts($params);
		$total_pages = $this->sellers->countProducts($params);
		$this->template->set ( 'products', $products);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->account->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->account->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$procategories = $this->general->getProductCategories();
		$this->template->set ( 'categories', $procategories);
		$maincats = $this->product->getActiveProductMainAndSubCategories();
		$this->template->set ( 'mcats', $maincats );
		unset($params['community_only']);
		unset($params['community_hide']);
		if(empty($keyword)) {
			unset($params['keyword']);
		}
		$url = base_url()."products?".http_build_query($params);
		$this->template->set ( 'params', $params);
		$this->template->set('producturl',$url);
		$this->template->set('page',$params['page']);
		$this->template->set('total_pages',$total_pages);
		unset($params['page']);
		if(http_build_query($params) != "")
			$wpurl = base_url()."products?".http_build_query($params)."&";
		else
			$wpurl = base_url()."products?";
		$this->template->set('wpproducturl',$wpurl);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'browser_icon', 'products.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Products' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product');
	}
	public function productVerifiedFirst() {
		$this->load->model('Sellers_Model', 'sellers' );
		$products = $this->sellers->getProductsbyVerified();
		$this->template->set ( 'products', $products);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->sellers->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Products' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product');
		/* $this->template->set_layout (false);
		$html= $this->template->build ('Home/pages/product-filter', '', true);
		echo $html; */
	}
	
	public function productCommunityFirst($id) {
		$this->load->model('Sellers_Model', 'sellers' );
		$products = $this->sellers->productCommunityFirst($id);
		$this->template->set ( 'products', $products);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->sellers->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Products' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product');
		/*$this->template->set_layout (false);
		$html= $this->template->build ('Home/pages/product-filter', '', true);
		echo $html; */
	}
	public function productCommunityHide($id) {
		$this->load->model('Sellers_Model', 'sellers' );
		$products = $this->sellers->productCommunityHide($id);
		$this->template->set ( 'products', $products);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->sellers->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Products' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product');
		/*$this->template->set_layout (false);
		$html= $this->template->build ('Home/pages/product-filter', '', true);
		echo $html; */
	}
	public function productList($id) {
		$this->load->model('Product_Model', 'product' );
		$products = $this->product->productCommunityHide($id);
		$this->template->set ( 'products', $products);
		$this->template->set ( 'page', 'search' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Products' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product-list');
		
	}
	public function productDetails($id) {
		$currency = array();
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$ip_address = getRealIP();
		$ipinfo = ip_info($ip_address,'location');
		if(!empty($ip_address)) {
			$map = array();
			$map['busi_id'] = $busi_id;
			$map['item_id'] = $id;
			$map['visit_date'] = date('Y-m-d');
			$map['city'] = $ipinfo['city'];
			$map['country'] = $ipinfo['country'];
			$map['ip_address'] = $ip_address;
			$this->load->model('Tool_model','mytoolmodel');
			$this->mytoolmodel->addProductVisit($map);
		}
		$this->load->model('Product_Model', 'product' );
		$this->load->model('Account_Model', 'account' );
		$getProductdetailsById = $this->product->getProductdetailsById($id);
		$this->template->set ( 'Productdetails', $getProductdetailsById);
		$colors = $this->product->getProductColorById($id);
		$this->template->set ( 'colors', $colors);
		$Specifications = $this->product->getProductSpecificationById($id);
		$this->template->set ( 'specifications', $Specifications);
		$trade_info = $this->product->getCompanyTradeInfo($busi_id);
		if(!empty($trade_info)) {
			$currency = $this->account->getTradePaymentCurrencyByTradId($trade_info[0]['id']);
		}
		$this->template->set ( 'currency', $currency);
		$this->template->set ( 'trade_info', $trade_info);
		$this->template->set ( 'page', 'pro-details');
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Products' )
		->set_partial ( 'header', 'default/floating-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product-details');
		
	}
	public function productDetailsPage($id) {
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$ip_address = getRealIP();
		$ipinfo = ip_info($ip_address,'location');
		if(!empty($ip_address)) {
			$map = array();
			$map['busi_id'] = $busi_id;
			$map['item_id'] = $id;
			$map['visit_date'] = date('Y-m-d');
			$map['city'] = $ipinfo['city'];
			$map['country'] = $ipinfo['country'];
			$map['ip_address'] = $ip_address;
			$this->load->model('Tool_model','mytoolmodel');
			$this->mytoolmodel->addProductVisit($map);
		}
		$this->load->model('Product_Model', 'product' );
		$this->load->model('Account_Model', 'account' );
		$getProductdetailsById = $this->product->getProductdetailsById($id);
		$this->template->set ( 'Productdetails', $getProductdetailsById);
		$colors = $this->product->getProductColorById($id);
		$this->template->set ( 'colors', $colors);
		$trade_info = $this->product->getCompanyTradeInfo($busi_id);
		$Specifications = $this->product->getProductSpecificationById($id);
		$currency = $this->account->getTradePaymentCurrencyByTradId($trade_info[0]['id']);
		$this->template->set ( 'specifications', $Specifications);
		$this->template->set ( 'currency', $currency);
		$this->template->set ( 'trade_info', $trade_info);
		$this->template->set ( 'page', 'pro-details');
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('desksite/subpages/product_details','',true);
		echo $html;
	}
	
	public function productDetailById($id){
		$this->load->model('Product_Model', 'product' );
		$ip_address = getRealIP();
		$ipinfo = ip_info($ip_address,'location');
		if(!empty($ip_address)) {
			$map = array();
			$map['busi_id'] = $busi_id;
			$map['item_id'] = $id;
			$map['visit_date'] = date('Y-m-d');
			$map['city'] = $ipinfo['city'];
			$map['country'] = $ipinfo['country'];
			$map['ip_address'] = $ip_address;
			$this->load->model('Tool_model','mytoolmodel');
			$this->mytoolmodel->addProductVisit($map);
		}
		$getProductdetailsById = $this->product->getProductdetailsById($id);
		$this->template->set ( 'Productdetails', $getProductdetailsById);
		$colors = $this->product->getProductColorById($id);
		$this->template->set ( 'colors', $colors);
		$Specifications = $this->product->getProductSpecificationById($id);
		$this->template->set ( 'specifications', $Specifications);
		$this->template->set ( 'page', 'pro-details');
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/product-details', '', true);
		echo $html;
		
	}
	public function productListBySellerId($id){
		$this->load->model('Product_Model', 'product' );
		$products = $this->product->productListBySellerId($id);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/pro-list', '', true);
		echo $html;
		
	}
	public function productListBySubCategory($id, $busi_id){
		$map = array();
		$map['subcat_id'] = $id;
		$map['busi_id'] = $busi_id;
		$this->load->model('Product_Model', 'product' );
		$products = $this->product->productListBySubCategory($map);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/pro-list', '', true);
		echo $html;
		
	}
	public function productListByMainProduct($id, $busi_id){
		$map = array();
		$map['mproduct_id'] = $id;
		$map['busi_id'] = $busi_id;
		$this->load->model('Product_Model', 'product' );
		$products = $this->product->productListBySubCategory($map);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/pro-list', '', true);
		echo $html;
		
	}
	
	public function productListBySubProduct($id, $busi_id){
		$map = array();
		$map['sproduct_id'] = $id;
		$map['busi_id'] = $busi_id;
		$this->load->model('Product_Model', 'product' );
		$products = $this->product->productListBySubCategory($map);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/pro-list', '', true);
		echo $html;
		
	}
	public function videoDetailById($id){
		$this->load->model('Product_Model', 'product' );
		$getVideodetailsById = $this->product->getVideodetailsById($id);
		$this->template->set ( 'Productdetails', $getVideodetailsById);
		$colors = $this->product->getProductColorByVideoId($id);
		$this->template->set ( 'colors', $colors);
		$Specifications = $this->product->getProductSpecificationByVideoId($id);
		$this->template->set ( 'specifications', $Specifications);
		$this->template->set ( 'page', 'pro-details');
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'TradeStation - Buyers' )
		->set_partial ( 'header', 'default/floating-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/video-details');
		
	}
	
	public function productListByCat($catid, $scatid, $mcatid, $busi_id){
		$map = array();
		$map['subcat_id'] = $catid;
		$map['sproduct_id'] = $scatid;
		$map['mproduct_id'] = $mcatid;
		$map['busi_id'] = $busi_id;
		$this->load->model('Product_Model', 'product' );
		$products = $this->product->productListByCSMCategory($map);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/pro-list', '', true);
		echo $html;
	
	}
	
	public function specialProductList($busi_id,$type){
		$map = array();
		$map['busi_id'] = $busi_id;
		$this->load->model('Product_Model', 'product' );
		if($type == 1) {
			$products = $this->product->productListByHotsales($map);
		} else {
			$products = $this->product->productListByNewArrival($map);
		}
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/pro-list', '', true);
		echo $html;
	
	}
	
	public function itemDetailById($id, $busi_id){
		$this->load->library('mylib/FactoryLib');
		$mybusi_id = $this->session->userdata('tsuser')['busi_id'];
		$ip_address = getRealIP();
		$ipinfo = ip_info($ip_address,'location');
		if(!empty($ip_address)) {
			$params = array();
			$params['busi_id'] = $mybusi_id;
			$params['item_id'] = $id;
			$params['likes'] = 0;
			$params['shares'] = 0;
			$params['city'] = $ipinfo['city'];
			$params['country'] = $ipinfo['country'];
			$params['ip_address'] = $ip_address;
			$params['visit_date'] = date('Y-m-d');
			$this->product->addProductVisit($params);
		}
		$map =array();
		$map['id'] = $busi_id;
		$this->load->model('Account_Model', 'account' );
		$Desksites = $this->product->getDesksiteByBusiId($map);
		$branches = $this->product->getBusinessBranchesByBusiId($map);
		$this->template->set ( 'business', $Desksites);
		$this->template->set ( 'branches', $branches);
		$getProductdetailsById = $this->product->getProductdetailsById($id);
		$this->template->set ( 'Productdetails', $getProductdetailsById);
		$colors = $this->product->getProductColorById($id);
		$this->template->set ( 'colors', $colors);
		$Specifications = $this->product->getProductSpecificationById($id);
		$this->template->set ( 'specifications', $Specifications);
		$advantages = $this->product->getAdvantage($busi_id);
		$products = $this->product->productListBySellerId($id);
		$Company = $this->product->getComapnyProfile($busi_id);
		$user_rnd = $this->factorylib->getUserRNDtype($Company[0]['factory_id']);
		$trade_info = $this->product->getCompanyTradeInfo($busi_id);
		$market_info = array();
		if(!empty($trade_info[0]['main_market_ids']))
			$market_info = $this->product->getCompanyMarketInfo($trade_info[0]['main_market_ids']);
		$contact_details = array();
		if(!empty($mybusi_id))
			$contact_details = $this->account->getBusinessContactDetails($mybusi_id);
		$Certificate = $this->product->getComapnyCertificate($busi_id);
		$licences = $this->product->getComapnyMainCertificate($busi_id);
		$currency = $this->account->getTradePaymentCurrencyByTradId($trade_info[0]['id']);
		$productCategories = $this->product->getActiveProductAndSubProduct($busi_id);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'advantages', $advantages);
		$sellers = $this->product->getSellerInfo($busi_id);
		$this->template->set ( 'sellers', $sellers);
		$this->template->set ( 'company', $Company);
		$this->template->set ( 'user_rnd', $user_rnd);
		$this->template->set ( 'trade_info', $trade_info);
		$this->template->set ( 'market_info', $market_info);
		$this->template->set ( 'contact_details', $contact_details);
		$this->template->set ( 'Certificate', $Certificate);
		$this->template->set ( 'licences', $licences);
		$this->template->set ( 'currency', $currency);
		$this->template->set ( 'productCategories', $productCategories);
		$this->template->set ( 'page', 'sellers-home');
		$this->template->set ( 'pagename', 'seller');
		$this->template->set ( 'userId', '' );
		$this->template->set_layout ('default')
		->title ( 'TradeStation - Product' )
		->set_partial ( 'header', 'default/floating-header' )
		->set_partial ( 'footer', 'default/footer' );
		$html= $this->template->build ('Home/item-details');
	}
	
	public function videoItemDetailById($id, $busi_id){
		$map =array();
		$map['id'] = $busi_id;
		$this->load->model('Product_Model', 'product' );
		$Desksites = $this->product->getDesksiteByBusiId($map);
		$this->template->set ( 'business', $Desksites);
		$getVideodetailsById = $this->product->getVideodetailsById($id);
		$this->template->set ( 'Productdetails', $getVideodetailsById);
		$colors = $this->product->getProductColorById($id);
		$this->template->set ( 'colors', $colors);
		$Specifications = $this->product->getProductSpecificationById($id);
		$this->template->set ( 'specifications', $Specifications);
		$advantages = $this->product->getAdvantage($busi_id);
		$products = $this->product->productListBySellerId($id);
		$this->template->set ( 'productList', $products);
		$this->template->set ( 'advantages', $advantages);
		$sellers = $this->product->getSellerInfo($busi_id);
		$this->template->set ( 'sellers', $sellers);
		$this->template->set ( 'page', 'sellers-home');
		$this->template->set ( 'userId', '' );
		$this->template->set_layout ('default')
		->title ( 'TradeStation - Product' )
		->set_partial ( 'header', 'default/floating-header' )
		->set_partial ( 'footer', 'default/footer' );
		$html= $this->template->build ('Home/item-details');
	}
	
	public function addItemToCart() {
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$resp = array();
		if(!empty($busi_id)) {
			$params = array();
			$params['product_item_id'] = $this->input->post('product_id');
			$params['created_date'] = date('Y-m-d H:i:s');
			$params['busi_id'] = $busi_id;
			$this->load->model('Product_Model', 'product' );
			$is_added = $this->product->addItemToCart($params);
			if($is_added) {
				$resp['status'] = 1;
				$resp['msg'] = 'Item added to cart';
			} else {
				$resp['status'] = 0;
				$resp['msg'] = 'The item already added to you cart';
			}
		} else {
			$resp = array();
			$resp['status'] = 0;
			$resp['msg'] = 'Please login to add item to cart';
		}
		echo json_encode($resp);
	}
	
	public function likeProduct($id) {
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$resp = array();
		if(!empty($busi_id)) {
			$this->load->model('Product_Model', 'product' );
			$is_added = $this->product->updateProductLikes($id,$busi_id);
			if($is_added) {
				$resp['status'] = 1;
				$resp['msg'] = 'Thank you for your response';
			} else {
				$resp['status'] = 1;
				$resp['msg'] = 'You have already like this product';
			}
		} else {
			$resp = array();
			$resp['status'] = 0;
			$resp['msg'] = 'Please login to like';
		}
		echo json_encode($resp);
	}
	
	
	public function getProductRelatedImages($product_id,$key) {
		$this->load->model('Product_Model', 'product' );
		$images = $this->product->getProductRelatedImages($product_id);
		$this->template->set ( 'images', $images);
		$this->template->set ( 'key', $key);
		$this->template->set ( 'page', 'product' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('product/pages/images', '', true);
		echo $html;
	}
	
	public function getMyProductList() {
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$query = $this->input->get('name');
		$this->load->model('Product_Model', 'product' );
		$result = $this->product->getMyProductItemList($busi_id,$query);
		echo json_encode($result);
	}
	
	public function get3DPrducts() {
		$params = $this->input->get();
		$keyword = "";
		if(!empty($params['keyword']))
		$keyword = $params['keyword'];
		$params['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		if(empty($params['page'])) {
			$params['page'] = 1;
		}
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->library('mylib/General', 'general');
		$this->load->model ( 'Account_Model', 'account' );
		$products = $this->sellers->search3DProducts($params);
		$total_pages = $this->sellers->count3DProducts($params);
		$this->template->set ( 'products', $products);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredBuyers = $this->sellers->getFeaturedWorldBuyer();
		$this->template->set ( 'featuredBuyers', $featuredBuyers);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$procategories = $this->general->getProductCategories();
		$this->template->set ( 'categories', $procategories);
		$maincats = $this->product->getActiveProductMainAndSubCategories();
		$this->template->set ( 'mcats', $maincats );
		if(empty($keyword)) {
			unset($params['keyword']);
		}
		$url = base_url()."3dproducts?".http_build_query($params);
		$this->template->set ( 'params', $params);
		$this->template->set('producturl',$url);
		$this->template->set('page',$params['page']);
		$this->template->set('total_pages',$total_pages);
		unset($params['page']);
		if(http_build_query($params) != "")
			$wpurl = base_url()."3dproducts?".http_build_query($params)."&";
		else
			$wpurl = base_url()."3dproducts?";
		$this->template->set('wpproducturl',$wpurl);
		$this->template->set ( 'page', '3dproduct' );
		$this->template->set ( 'browser_icon', 'products.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( '3D Pro' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/product3D');
	}
	
	public function getAllVCatalogues() {
		$params = $this->input->get();
		$keyword = "";
		if(!empty($params['keyword']))
			$keyword = $params['keyword'];
		if(!empty($this->session->userdata('tsuser')['busi_id'])) {
			$params['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		} else {
			$params['busi_id'] = 0;
		}
		if(empty($params['page'])) {
			$params['page'] = 1;
		}
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->library('mylib/General', 'general');
		$this->load->model ( 'Account_Model', 'account' );
		$vCatalogues = $this->sellers->searchVCatalogues($params);
		$total_pages = $this->sellers->countProducts($params);
		$this->template->set ( 'vCatalogues', $vCatalogues);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredBuyers = $this->sellers->getFeaturedWorldBuyer();
		$this->template->set ( 'featuredBuyers', $featuredBuyers);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$procategories = $this->general->getProductCategories();
		$this->template->set ( 'categories', $procategories);
		$maincats = $this->product->getActiveProductMainAndSubCategories();
		$this->template->set ( 'mcats', $maincats );
		if(empty($keyword)) {
			unset($params['keyword']);
		}
		$url = base_url()."vcatalogues?".http_build_query($params);
		$this->template->set ( 'params', $params);
		$this->template->set('producturl',$url);
		$this->template->set('page',$params['page']);
		$this->template->set('total_pages',$total_pages);
		unset($params['page']);
		if(http_build_query($params) != "")
			$wpurl = base_url()."vcatalogues?".http_build_query($params)."&";
		else
			$wpurl = base_url()."vcatalogues?";
		$this->template->set('wpproducturl',$wpurl);
		$this->template->set ( 'page', 'vcatalogue' );
		$this->template->set ( 'browser_icon', 'products.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'V-Catalogues' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' )
		->set_partial ( 'vcatalogue', 'default/vcatalogue' );
		$this->template->build ('product/Vcatalogue');
	}
	
	public function getAllSellerDesksites() {
		$this->load->model ( 'Account_Model', 'account' );
		$params = $this->input->get();
		$keyword = "";
		if(!empty($params['keyword']))
		$keyword = $params['keyword'];
		if(empty($params)) {
			if(!empty($_COOKIE['dseller_keywd'])) {
				$params['keyword'] = $_COOKIE['dseller_keywd'];
			}
		} else {
			setcookie('dseller_keywd', $params['keyword'], time() + (86400 * 30), "/");
		}
		$params['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		if(empty($params['page'])) {
			$params['page'] = 1;
		}
		$this->load->library('mylib/General');
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->model('Product_Model','product');
		$sellers = $this->sellers->searchSellerDesksites($params);
		$total_pages = $this->sellers->countSellerDesksites($params);
		$this->template->set ( 'Sellers', $sellers);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->sellers->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$procategories = $this->general->getProductCategories();
		$this->template->set ( 'categories', $procategories);
		unset($params['community_only']);
		unset($params['community_hide']);
		if(empty($keyword)) {
			unset($params['keyword']);
		}
		$url = base_url()."seller/desksites?".http_build_query($params);
		$maincats = $this->product->getActiveProductMainAndSubCategories();
		if(!empty($params['country'])) {
			$city= $this->sellers->getCityByCountry($params['country'],1);
			$this->template->set ( 'cities', $city);
		}
		$this->template->set ( 'mcats', $maincats );
		$this->template->set('sellerurl',$url);
		$this->template->set('page',$params['page']);
		$this->template->set('total_pages',$total_pages);
		$this->template->set ( 'params', $params);
		unset($params['page']);
		if(http_build_query($params) != "")
			$wpurl = base_url()."seller/desksites?".http_build_query($params)."&";
		else 
			$wpurl = base_url()."seller/desksites?";
		$this->template->set('wpsellerurl',$wpurl);
		$this->template->set ( 'page', 'sellerdesksite' );
		$this->template->set ( 'browser_icon', 'seller.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Desksite' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('Home/sellerdesksite');
	}
	public function getAllShipperDesksites() {
		$this->load->model ( 'Account_Model', 'account' );
		$params = $this->input->get();
		$keyword = "";
		if(!empty($params['keyword']))
			$keyword = $params['keyword'];
		if(empty($params)) {
			if(!empty($_COOKIE['dseller_keywd'])) {
				$params['keyword'] = $_COOKIE['dseller_keywd'];
			}
		} else {
			setcookie('dseller_keywd', $params['keyword'], time() + (86400 * 30), "/");
		}
		$params['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		if(empty($params['page'])) {
			$params['page'] = 1;
		}
		$this->load->library('mylib/General');
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->model('Product_Model','product');
		$sellers = $this->sellers->searchShippers($params);
		$total_pages = $this->sellers->countShippers($params);
		$this->template->set ( 'Sellers', $sellers);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->sellers->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$procategories = $this->general->getProductCategories();
		$this->template->set ( 'categories', $procategories);
		unset($params['community_only']);
		unset($params['community_hide']);
		if(empty($keyword)) {
			unset($params['keyword']);
		}
		$url = base_url()."shipper/desksites?".http_build_query($params);
		$maincats = $this->product->getActiveProductMainAndSubCategories();
		if(!empty($params['country'])) {
			$city= $this->sellers->getCityByCountry($params['country'],1);
			$this->template->set ( 'cities', $city);
		}
		$this->template->set ( 'mcats', $maincats );
		$this->template->set('sellerurl',$url);
		$this->template->set('page',$params['page']);
		$this->template->set('total_pages',$total_pages);
		$this->template->set ( 'params', $params);
		unset($params['page']);
		if(http_build_query($params) != "")
			$wpurl = base_url()."shipper/desksites?".http_build_query($params)."&";
		else
			$wpurl = base_url()."shipper/desksites?";
		$this->template->set('wpsellerurl',$wpurl);
		$this->template->set ( 'page', 'shipperdesksite' );
		$this->template->set ( 'browser_icon', 'shipper.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Find Desksite' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('Home/shipperdesksite');
	}
	
	public function shareWithWorld() {
		$this->load->model('Product_Model','product');
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		$ip_address = getRealIP();
		$ipinfo = ip_info($ip_address,'location');
		$params = array();
		if($type == 1) {
			$params['visitor_id'] = $busi_id;
			$params['busi_id'] = $id;
			$params['likes'] = 0;
			$params['shares'] = 1;
			$params['city'] = $ipinfo['city'];
			$params['country'] = $ipinfo['country'];
			$params['ip_address'] = $ip_address;
			$params['visit_date'] = date('Y-m-d');
			$this->product->addDesksiteShare($params);
		} else if($type == 2) {
			$params['busi_id'] = $busi_id;
			$params['item_id'] = $id;
			$params['likes'] = 0;
			$params['shares'] = 1;
			$params['city'] = $ipinfo['city'];
			$params['country'] = $ipinfo['country'];
			$params['ip_address'] = $ip_address;
			$params['visit_date'] = date('Y-m-d');
			$this->product->addProductShare($params);
		} else if($type == 3) {
			$params['busi_id'] = $busi_id;
			$params['service_id'] = $id;
			$params['likes'] = 0;
			$params['shares'] = 1;
			$params['city'] = $ipinfo['city'];
			$params['country'] = $ipinfo['country'];
			$params['ip_address'] = $ip_address;
			$params['visit_date'] = date('Y-m-d');
			$this->product->addServiceShare($params);
		}
		echo json_encode(array('msg'=>'Recorded'));
	}
	
}
?>