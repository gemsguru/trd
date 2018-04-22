<?php
class Vedio extends MX_Controller {
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
		$this->lang->load($current_lang.'_home_page_lang', $current_lang);
		$fb_config = parse_ini_file ( APPPATH . "config/FB.ini" );
	}
	public function index() {
		
		$this->template->set ( 'page', 'home' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('station')
		->title ( 'My Station' );
		$this->template->build ('station/mystation');
	}
	public function vedio() {
		$this->template->set ( 'page', 'home' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('station/pages/vedio','',true);
		echo $html;
	}
	public function addVedio() {
		$this->load->model('Vedio_model','vedio');
		$category_id = $this->session->userdata('tsuser')['category_id'];
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		if($category_id == 1 || $category_id == 3) {
			$this->load->model('Vedio_model','vedio');
			$this->load->model('Product_Model','product');
			$mproducts = $this->product->getActiveProductAndSubProduct($busi_id);
			$products = $this->product->getActiveProductItems($busi_id);
			$oneproductvedio = $this->vedio->getOneproductvedioList($busi_id);
			$this->template->set ( 'oneproductvedio', $oneproductvedio);
			$multiproductvedio = $this->vedio->getMultiproductvedioList($busi_id);
			$this->template->set ( 'multiproductvedio', $multiproductvedio);
			$totalvedio = count($oneproductvedio) + count($multiproductvedio);
			$this->template->set ( 'totalvedio', $totalvedio);
			$this->template->set ( 'mproducts', $mproducts );
			$this->template->set ( 'total_videos', $totalvedio );
			$mainproduct = $this->product->getMainProduct();
			$this->template->set ( 'mainproduct', $mainproduct);
			$this->template->set ( 'page', 'home' );
			$this->template->set_theme('default_theme');
			$this->template->set_layout (false);
			$html = $this->template->build ('station/pages/subpages/addvedio','',true);
			echo $html;
		} 
		if($category_id == 2) {
			$this->load->model('Vedio_model','vedio');
			$this->load->model('Product_Model','product');
			$oneproductvedio = $this->vedio->getvedioById($busi_id);
			$total_videos = count($oneproductvedio);
			$busi_id = $this->session->userdata('tsuser')['busi_id'];
			$this->template->set ( 'total_videos', $total_videos );
			$this->template->set ( 'page', 'home' );
			$this->template->set_theme('default_theme');
			$this->template->set_layout (false);
			$html = $this->template->build ('station/pages/subpages/shipperaddvedio','',true);
			echo $html;
		} 
		
	}
	public function editVedio() {
		$category_id = $this->session->userdata('tsuser')['category_id'];
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$this->load->model('Vedio_model','vedio');
		if($category_id == 1 || $category_id == 3) {
			$oneproductvedio = $this->vedio->getOneproductvedioList($busi_id);
			$this->template->set ( 'oneproductvedio', $oneproductvedio);
			$multiproductvedio = $this->vedio->getMultiproductvedioList($busi_id);
			$this->template->set ( 'multiproductvedio', $multiproductvedio);
			$totalvedio = count($oneproductvedio) + count($multiproductvedio);
			$this->template->set ( 'totalvedio', $totalvedio);
			$this->template->set ( 'page', 'home' );
			$this->template->set_theme('default_theme');
			$this->template->set_layout (false);
			$html = $this->template->build ('station/pages/subpages/editvedio','',true);
			echo $html;
		}
		if($category_id == 2) {
			$multiproductvedio = $this->vedio->getvedioById($busi_id);
			$this->template->set ( 'multiproductvedio', $multiproductvedio);
			$totalvedio =  count($multiproductvedio);
			$this->template->set ( 'totalvedio', $totalvedio);
			$this->template->set ( 'page', 'home' );
			$this->template->set_theme('default_theme');
			$this->template->set_layout (false);
			$html = $this->template->build ('station/pages/subpages/editservicevedio','',true);
			echo $html;
		}
	}
	public function publishVedio() {
		$param = array();
		$map = array();
		$mainparam = array();
		$this->load->library('mylib/VedioLib');
		$this->load->library('mylib/MyfileLib');
		$chkvalue = $this->input->post('chkproduct');
		$pid = $this->input->post('product_id');
		$busi_id = $this->session->userdata('busi_id');
		$oneproduct = 0;
		$mainproduct = 0;
		$param['product_item_id'] = $pid;
		$keyvalue = 0;
		$keyvalue1 = 0;
		$arrcount = count($chkvalue);
		$size = 0;
		if (!empty($_FILES['uploadonepvedio']['name'])) {
			
			$oneproductvedio = $_FILES['uploadonepvedio']['name'];
			$size = $_FILES['uploadonepvedio']['size'];
			
			$path = getcwd() . "/assets/images/business_images/$busi_id";
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			$userPath = FCPATH . "assets/images/business_images/$busi_id/Myvedio";
			if (!file_exists($userPath)) {
				
				mkdir($userPath, 0777, true);
				chmod($userPath, 0777);
			}
			$location =  "assets/images/business_images/$busi_id/Myvedio/";
			$oneproductvedio_Img = uploadImage($_FILES['uploadonepvedio'],$location,array('mp4','mp3'),$size,'vedio');
			if($oneproductvedio_Img['status'] == 1) {
				$param['vedio_file'] =  $oneproductvedio_Img['image'];
				$param['vedio_size'] = $this->myfilelib->formatSizeUnits($size);
			} else {
				$error = array("publicfile"=>$oneproductvedio_Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$oneproductvedio_Img['errormsg'] = $errorMsg;
				echo json_encode($oneproductvedio_Img);
				exit;
			}
			
			$param['busi_id'] = $busi_id;
			$param['created_date'] = date('Y-m-d H:i:s');
			if(!empty($param['vedio_file']))
			{
				$oneproduct = $this->vediolib->saveoneproductvedio($param);
				/* ************** Storage Implementation *************** */
				$this->load->library('mylib/StorageLib');
				$storage = array();
				$storage['busi_id'] = $this->session->userdata('busi_id');
				$storage['field'] = 'videos';
				$storage['datasize'] = round($size/1024,2);
				$this->storagelib->updateStorageByBusiId($storage);
				/* ***************************************************** */
				
			}
			if($oneproduct >0)
			{
				$map['status'] = 1;
				$map['msg'] = "Vedio Added Successfully.";
			} else {
				$map['status'] = 0;
				$map['msg'] = "Vedio Fail to Add.";
			}
		}
		if (!empty($_FILES['uploadmainpvedio']['name'])) {
			
			$oneproductvedio = $_FILES['uploadmainpvedio']['name'];
			$size = $_FILES['uploadmainpvedio']['size'];
			
			$path = getcwd() . "/assets/images/business_images/$busi_id";
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			$userPath = FCPATH . "assets/images/business_images/$busi_id/Myvedio";
			if (!file_exists($userPath)) {
				
				mkdir($userPath, 0777, true);
				chmod($userPath, 0777);
			}
			$location =  "assets/images/business_images/$busi_id/Myvedio/";
			$mainproductvedio_Img = uploadImage($_FILES['uploadmainpvedio'],$location,array('mp4','mp3'),$size,'vedio');
			if($mainproductvedio_Img['status'] == 1) {
				$mainparam['vedio_file'] =  $mainproductvedio_Img['image'];
				$mainparam['vedio_size'] = $this->myfilelib->formatSizeUnits($size);
				
			} else {
				$error = array("publicfile"=>$mainproductvedio_Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$mainproductvedio_Img['errormsg'] = $errorMsg;
				echo json_encode($mainproductvedio_Img);
				exit;
			}
			
			$mainparam['subproduct_id'] = $this->input->post('sub_product_id');
			$mainparam['vedio_title'] = $this->input->post('vedio_title');
			$mainparam['vedio_description'] = $this->input->post('vedio_description');
			$mainparam['start_price'] = $this->input->post('start_price');
			$mainparam['end_price'] = $this->input->post('end_price');
			$mainparam['busi_id'] = $busi_id;
			$mainparam['created_date'] = date('Y-m-d H:i:s');
			if(!empty($mainparam['vedio_file']))
			{
				$mainproduct = $this->vediolib->saveMainSubproductvedio($mainparam);
				/* ************** Storage Implementation *************** */
				$this->load->library('mylib/StorageLib');
				$storage = array();
				$storage['busi_id'] = $this->session->userdata('busi_id');
				$storage['field'] = 'videos';
				$storage['datasize'] = round($size/1024,2);
				$this->storagelib->updateStorageByBusiId($storage);
				/* ***************************************************** */
			}
			if($mainproduct > 0)
			{
				$map['status'] = 1;
				$map['msg'] = "Vedio Added Successfully.";
			} else {
				$map['status'] = 0;
				$map['msg'] = "Vedio Fail to Add.";
			}
		}
		echo json_encode($map);
		
	}
	function DeleteVedio()
	{
		$map = array();
		$boolean = 0;
		$this->load->library('mylib/VedioLib');
		$chkoneprolist = $this->input->post('chkoneproduct');
		$chkmultiprolist = $this->input->post('chkmultiproduct');
		$size = 0;
		if(count($chkmultiprolist) > 0) {
			$ids = implode(",",$chkmultiprolist);
			$mvideos = $this->vediolib->getMultiProductVideosByIds($ids);
			foreach ($mvideos as $mvideo) {
				$mfile_to_delete = FCPATH."assets/".$mvideo['vedio_file'];
				$size = $size + filesize($mfile_to_delete);
				if (is_file($mfile_to_delete)){
					unlink($mfile_to_delete);
				}
			}
		}
		if(count($chkoneprolist) > 0) {
			$ids = implode(",",$chkoneprolist);
			$videos = $this->vediolib->getOneProductVideosByIds($ids);
			foreach ($videos as $video) {
				$file_to_delete = FCPATH."assets/".$video['vedio_file'];
				$size = $size + filesize($file_to_delete);
				if (is_file($file_to_delete)){
					chmod($file_to_delete,0777);
					unlink($file_to_delete);
				}
			}
		}
		if(count($chkoneprolist) > 0)
		{
			for ($i=0;$i<count($chkoneprolist);$i++)
			{
				$data = array();
				$data['id'] = $chkoneprolist[$i];
				$data['is_deleted'] = 1;
				$boolean = $this->vediolib->updateProductvedio($data);
			}
		}
		if(count($chkmultiprolist) > 0)
		{
			for ($i=0;$i<count($chkmultiprolist);$i++)
			{
				$data = array();
				$data['id'] = $chkmultiprolist[$i];
				$data['is_deleted'] = 1;
				$boolean = $this->vediolib->updateMultiProductvedio($data);
			}
		}
		/* ************** Storage Implementation *************** */
		$this->load->library('mylib/StorageLib');
		$storage = array();
		$storage['busi_id'] = $this->session->userdata('busi_id');
		$storage['field'] = 'videos';
		$storage['datasize'] = round($size/1024,2) * -1;
		$this->storagelib->updateStorageByBusiId($storage);
		/* ***************************************************** */
		$map['status'] = 1;
		$map['msg'] = "Vedio Deleted Successfully.";
		echo json_encode($map);
		
	}
	public  function subProductList()
	{
		$this->load->library('mylib/Dproductlib');
		$params = $this->input->get();
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$name = $this->input->post('product');
		$params = array();
		$params['busi_id'] = $busi_id;
		$params['name'] = $name;
		$this->load->model('Product_Model','product');
		$products = $this->product->searchActiveProductItems($params);
		if(count($products) > 0) {
			$this->template->set ( 'products', $products );
			$this->template->set ( 'page', 'home' );
			$this->template->set_theme('default_theme');
			$this->template->set_layout (false);
			$html = $this->template->build ('station/pages/subpages/subproduct_list','',true);
		} else {
			$html = "Sorry we do not found any item for your search criteria.";
		}
		echo $html;
	}
	
	public function getProductVideoList() {
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$this->load->model('Vedio_model','videomodel');
		$videos = $this->videomodel->getOneproductvedioList($busi_id);
		$this->template->set ( 'videos', $videos );
		$this->template->set ( 'page', 'home' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('station/pages/subpages/partialvideos','',true);
		echo $html;
	}
	
	public function productVideoList()
	{
		$params = $this->input->get();
		$keyword = "";
		if(!empty($params['keyword']))
		$keyword = $params['keyword'];
		if(empty($params)) {
			if(!empty($_COOKIE['seller_keywd'])) {
				$params['keyword'] = $_COOKIE['seller_keywd'];
			}
		} else {
			setcookie('video_keywd', $params['keyword'], time() + (86400 * 30), "/");
		}
		$params['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		if(empty($params['page'])) {
			$params['page'] = 1;
		}
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->model('Account_Model', 'account' );
		$this->load->model('Product_Model','product');
		$this->load->model('Vedio_model', 'videos' );
		$videos = $this->videos->searchProductsInVideos($params);
		$total_pages = $this->videos->countProductsInVideos($params);
		$this->template->set ( 'videos', $videos);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->account->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->account->getFeaturedProduct();
		$maincats = $this->product->getActiveProductMainAndSubCategories();
		unset($params['community_only']);
		unset($params['community_hide']);
		if(empty($keyword)) {
			unset($params['keyword']);
		}
		if(!empty($params['country'])) {
			$city= $this->sellers->getCityByCountry($params['country'],1);
			$this->template->set ( 'cities', $city);
		}
		$url = base_url()."pro-video?".http_build_query($params);
		$this->template->set('url',$url);
		$this->template->set ( 'mcats', $maincats );
		$this->template->set ( 'params', $params);
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$this->template->set('page',$params['page']);
		$this->template->set('total_pages',$total_pages);
		unset($params['page']);
		if(http_build_query($params) != "")
			$wpurl = base_url()."pro-video?".http_build_query($params)."&";
		else
			$wpurl = base_url()."pro-video?";
		$this->template->set('wpvideourl',$wpurl);
		$this->template->set ( 'page', 'pro-videos' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'Product In Videos' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/pro-videos');
	}
	
	public function getVedioByVerifiedUser() {
		$this->load->model('Vedio_model', 'vedios' );
		$videos_list= $this->vedios->getVedioByVerifiedUser();
		$this->template->set ( 'videos', $videos_list);
		$this->template->set ( 'page', 'pro-videos' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('Home/pages/video-filter', '', true);
		echo $html;
	}
	
	public function getVedioByCommunityMember($id) {
		$this->load->model('Vedio_model', 'vedio' );
		$videos_list= $this->vedios->getVedioByCommunityMember($id);
		$this->template->set ( 'videos', $videos_list);
		$this->template->set ( 'page', 'pro-videos' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('Home/pages/video-filter', '', true);
		echo $html;
	}
	
	public function getVedioByCommunityMemberhide($id) {
		$this->load->model('Vedio_model', 'vedios' );
		$videos_list= $this->vedios->getVedioByCommunityMemberhide($id);
		$this->template->set ( 'videos', $videos_list);
		$this->template->set ( 'page', 'pro-videos' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html= $this->template->build ('Home/pages/video-filter', '', true);
		echo $html;
	}
	public function productVideoListBySellerId($id)
	{
		$this->load->model('Sellers_Model', 'sellers' );
		$this->load->model('Account_Model', 'account' );
		$this->load->model('Vedio_model', 'videos' );
		$videos = $this->videos->getProductsInVideosBySellerId($id);
		$this->template->set ( 'videos', $videos);
		$Country= $this->account->getCountry();
		$this->template->set ( 'Country', $Country);
		$featuredSellers = $this->sellers->getFeaturedWorldSeller();
		$this->template->set ( 'featuredSellers', $featuredSellers);
		$featuredProductVideo= $this->sellers->getFeaturedProductVideo();
		$this->template->set ( 'featuredProductVideo', $featuredProductVideo);
		$featuredProducts = $this->sellers->getFeaturedProduct();
		$this->template->set ( 'featuredProducts', $featuredProducts);
		$this->template->set ( 'page', 'pro-videos' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'TreadStation - Sellers' )
		->set_partial ( 'header', 'default/inner-header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('product/pro-videos');
	}
	public function saveServiceVedio()
	{
		$this->load->model('Vedio_model', 'vedios' );
		$this->load->library('mylib/MyfileLib');
		$param =array();
		$busi_id= $this->session->userdata('tsuser')['busi_id'];
		$param['busi_id']  = $busi_id;
		$param['created_date'] = date('Y-m-d H:i:s');
		
		$title = $this->input->post('vediotitle');
		$description = $this->input->post('description');
		$param['vedio_title'] = $title;
		$param['vedio_description'] = $description;
		$size = 0;
		if (!empty($_FILES['uploadonepvedio']['name'])) {
			
			$oneproductvedio = $_FILES['uploadonepvedio']['name'];
			$size = $_FILES['uploadonepvedio']['size'];
			
			$path = getcwd() . "/assets/images/business_images/$busi_id";
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			$userPath = FCPATH . "assets/images/business_images/$busi_id/Myvedio";
			if (!file_exists($userPath)) {
				
				mkdir($userPath, 0777, true);
				chmod($userPath, 0777);
			}
			$location =  "assets/images/business_images/$busi_id/Myvedio/";
			//$certificate_Img = uploadImage($_FILES['publicfileupload'],$location,array('jpg','png','gif'),2097152,'publicfile');
			$oneproductvedio_Img = uploadImage($_FILES['uploadonepvedio'],$location,array('mp4','mp3'),200097152,'vedio');
			if($oneproductvedio_Img['status'] == 1) {
				$param['vedio_file'] =  $oneproductvedio_Img['image'];
				$param['vedio_size'] = $this->myfilelib->formatSizeUnits($size);
				
			} else {
				$error = array("publicfile"=>$oneproductvedio_Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$oneproductvedio_Img['errormsg'] = $errorMsg;
				echo json_encode($oneproductvedio_Img);
				exit;
			}
			
		}
		$param['busi_id'] = $busi_id;
		$param['created_date'] = date('Y-m-d H:i:s');
		if(!empty($param['vedio_file']))
		{
			$oneproduct = $this->vedios->saveMainSubproductvedio($param);
			/* ************** Storage Implementation *************** */
			$this->load->library('mylib/StorageLib');
			$storage = array();
			$storage['busi_id'] = $this->session->userdata('busi_id');
			$storage['field'] = 'videos';
			$storage['datasize'] = round($size/1024,2);
			$this->storagelib->updateStorageByBusiId($storage);
			/* ***************************************************** */
			
		}
		if($oneproduct >0)
		{
			$map['status'] = 1;
			$map['msg'] = "Vedio Added Successfully.";
		} else {
			$map['status'] = 0;
			$map['msg'] = "Vedio Fail to Add.";
		}
		echo json_encode($map);
		
	}
	public function updateVedioTitle()
	{
		$map = array();
		$this->load->model('Vedio_model', 'vedios' );
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$param = array();
		$param['id'] = $id;
		$param['vedio_title'] = $title;
		$response = $this->vedios->updateMultiProductvedio($param);
		if($response > 0)
		{
			$map['status'] = 1;
			$map['msg'] = "Vedio Title Update Successfully.";
		} else {
			$map['status'] = 0;
			$map['msg'] = "Vedio Fail to Update Title.";
		}
		echo json_encode($map);
	}
	public function updateVedioDescription()
	{
		$map = array();
		$this->load->model('Vedio_model', 'vedios' );
		$id = $this->input->post('id');
		$description = $this->input->post('description');
		$param = array();
		$param['id'] = $id;
		$param['vedio_description'] = $description;
		$response = $this->vedios->updateMultiProductvedio($param);
		if($response > 0)
		{
			$map['status'] = 1;
			$map['msg'] = "Vedio Description Update Successfully.";
		} else {
			$map['status'] = 0;
			$map['msg'] = "Vedio Fail to Update Description.";
		}
		echo json_encode($map);
		
	}
	public function changeVedio()
	{
		$map = array();
		$this->load->library('mylib/VedioLib');
		$this->load->model('Vedio_model', 'vedios' );
		$this->load->library('mylib/MyfileLib');
		$id = $this->input->post('fileid');
		$busi_id= $this->session->userdata('tsuser')['busi_id'];
		$videos = $this->vediolib->getMultiProductVideoById($id);
		$param = array();
		$param['id'] = $id;
		$size = 0;
		if (!empty($_FILES['vediofile']['name'])) {
			
			$oneproductvedio = $_FILES['vediofile']['name'];
			$size = $_FILES['vediofile']['size'];
			
			$path = getcwd() . "/assets/images/business_images/$busi_id";
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			$userPath = FCPATH . "assets/images/business_images/$busi_id/Myvedio";
			if (!file_exists($userPath)) {
				
				mkdir($userPath, 0777, true);
				chmod($userPath, 0777);
			}
			$location =  "assets/images/business_images/$busi_id/Myvedio/";
			//$certificate_Img = uploadImage($_FILES['publicfileupload'],$location,array('jpg','png','gif'),2097152,'publicfile');
			$oneproductvedio_Img = uploadImage($_FILES['vediofile'],$location,array('mp4','mp3'),$size,'vedio');
			if($oneproductvedio_Img['status'] == 1) {
				$param['vedio_file'] =  $oneproductvedio_Img['image'];
				$param['vedio_size'] = $this->myfilelib->formatSizeUnits($size);
				
			} else {
				$error = array("publicfile"=>$oneproductvedio_Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$oneproductvedio_Img['errormsg'] = $errorMsg;
				echo json_encode($oneproductvedio_Img);
				exit;
			}
			
		}
		$response = $this->vedios->updateMultiProductvedio($param);
		foreach ($videos as $video) {
			$file_to_delete = FCPATH."assets/".$video['vedio_file'];
			$size = $size - filesize($file_to_delete);
			if (is_file($file_to_delete)){
				unlink($file_to_delete);
			}
		}
		/* ************** Storage Implementation *************** */
		$this->load->library('mylib/StorageLib');
		$storage = array();
		$storage['busi_id'] = $this->session->userdata('busi_id');
		$storage['field'] = 'videos';
		$storage['datasize'] = round($size/1024,2);
		$this->storagelib->updateStorageByBusiId($storage);
		/* ***************************************************** */
		if($response > 0)
		{
			$map['status'] = 1;
			$map['msg'] = "Vedio  Update Successfully.";
		} else {
			$map['status'] = 0;
			$map['msg'] = "Vedio Fail to Update.";
		}
		echo json_encode($map);
		
	}
	public function deleteServiceVedio()
	{
		$map = array();
		$boolean = 0;
		$this->load->library('mylib/VedioLib');
		$chkvediolist = $this->input->post('chkvedio');
		$size = 0;
		if(count($chkvediolist) > 0) {
			$ids = implode(",",$chkvediolist);
			$videos = $this->vediolib->getMultiProductVideosByIds($ids);
			foreach ($videos as $video) {
				$file_to_delete = FCPATH."assets/".$video['vedio_file'];
				$size = $size + filesize($file_to_delete);
				if (is_file($file_to_delete)){
					unlink($file_to_delete);
				}
			}
		}
		if(count($chkvediolist) > 0)
		{
			for ($i=0;$i<count($chkvediolist);$i++)
			{
				$data = array();
				$data['id'] = $chkvediolist[$i];
				$data['is_deleted'] = 1;
				$boolean = $this->vediolib->updateMultiProductvedio($data);
			}
		}
		/* ************** Storage Implementation *************** */
		$this->load->library('mylib/StorageLib');
		$storage = array();
		$storage['busi_id'] = $this->session->userdata('busi_id');
		$storage['field'] = 'videos';
		$storage['datasize'] = round($size/1024,2) * -1;
		$this->storagelib->updateStorageByBusiId($storage);
		/* ***************************************************** */
		$map['status'] = 1;
		$map['msg'] = "Vedio Deleted Successfully.";
		echo json_encode($map);
	
	}
	
	public function likeVideo($id) {
		$this->load->model('Vedio_model', 'vedios' );
		$data = array();
		$data['video_id'] = $id;
		$data['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		$data['shares'] = 0;
		$data['likes'] = 1;
		$data['type'] = $this->input->get('type');
		$data['visit_date'] = date('Y-m-d');
		if(!empty($this->session->userdata('tsuser')['busi_id'])) {
			$is_added = $this->vedios->recordVideoLike($data);
			$resp = array();
			if($is_added) {
				$resp['status'] = 1;
				$resp['msg'] = 'We have recorded your response.';
			} else {
				$resp['status'] = 0;
				$resp['msg'] = 'You have already liked this video.';
			}
		} else {
			$resp['status'] = 0;
			$resp['msg'] = 'Login to like this video.';
		}
		echo json_encode($resp);
	}
	

}