<?php
class Account extends MX_Controller {
	
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
		$this->load->model('Account_Model');
		$this->lang->load($current_lang.'_home_page_lang', $current_lang);
		$fb_config = parse_ini_file ( APPPATH . "config/FB.ini" );
	} 
	
	public function index() {
		$this->template->set ( 'page', 'home' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'TreadStation' )
		->set_partial ( 'header', 'default/header' )
		->set_partial ( 'footer', 'default/footer' );
		$this->template->build ('Home/home');
	}

	public function check_email() {
		$this->load->model('Account_Model');
		if (true === empty($_POST)) {
			return false;
		}
		$email = $_POST['email'];
		$emailExist = $this->Account_Model->emailExist($email);
		echo json_encode($emailExist);
	}
	
	public function stepOne() {
		$this->load->model('Account_Model');
		$this->load->model('Product_Model','product');
		$name = $_POST['name'];
		$email = $_POST['email'];
		$catergory = $_POST['category'];
		$subCatergory = $_POST['subCategory'];
		$namePrefix = $_POST['namePrefix'];
		$activationCode = rand(1000, 9999);
		$business = array(
				'company_name' => $name,
				'created_date' => date('Y-m-d H:i:s'),
				'is_disable' => 0,
				'is_deleted' => 0
		);
		if($catergory == 3) {
			$business['message_flag'] = 1;
		}
	
		$busi_id = $this->Account_Model->insertBuisnessInfo($business);
		$data = array(
				'busi_id' => $busi_id,
				'email' => $email,
				'name' => $name,
				'user_category_id' => $catergory,
				'user_subcategory_id' => $subCatergory,
				'activation_code' => $activationCode,
				'name_prefix' => $namePrefix,
				'created_date' => date('Y-m-d H:i:s')
		);
		$this->product->addProductStage(array('busi_id'=>$busi_id,'step'=>0));
		$this->Account_Model->updateBusinessImages(array('busi_id'=>$busi_id));
		$this->session->set_userdata('catid',$catergory);
		$this->session->set_userdata('subcatid',$subCatergory);
		$lastInsertId = $this->Account_Model->insertIntoUsers($data);
		$emailData = array('action'=>'account_activation','activation_code'=>$activationCode,'name'=>$name);
		$this->sendMail($email, $emailData);
		$this->load->library('mylib/General');
		$captcha = $this->general->createCaptcha('signup');
	
		$this->template->set ( 'captcha', $captcha);
		$this->template->set ( 'userid', $lastInsertId);
		$this->template->set ( 'busi_id', $busi_id);
		$this->template->set ( 'page', 'registration' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)->title ( 'TreadStation' );
		$this->template->build ('register/register_step_two');
	}
	
	public function get_verification_code() {
		$this->load->model('Account_Model');
		$userId = $_POST['userId'];
		$result = $this->Account_Model->getVerificationCode($userId);
		echo json_encode($result);
	}
	
	public function step_three() {
		$this->load->model('Account_Model');
		$name = $_POST['name'];
		$email = $_POST['email'];
		$namePrefix = $_POST['namePrefix'];
		$userId = $_POST['userId'];
		$displaypassword = substr($_POST['pass'], -3);
		$password = $_POST['pass'];
		$category_id = $_POST['category_id'];
		$subcat_id = $_POST['subcat_id'];
		$category = $_POST['category'];
		$subcategory= $_POST['subcategory'];
		$busi_id = $_POST['busi_id'];
		$result = array(
				'name' => $name,
				'namePrefix' => $namePrefix,
				'email' => $email,
				'pass' => '*****' . $displaypassword
		);
		
		$data = array(
				'id' =>$userId,
				'text_password' =>$password,
				'password' => md5($password),
				'user_role' => 1
		);
		$this->load->library('mylib/UserLib');
		$this->userlib->updateUser($data);
		
		$userinfo = array();
		$userinfo['name'] = $name;
		$userinfo['userid'] = $userId;
		$userinfo['prefix'] = $namePrefix;
		$userinfo['email'] = $email;
		$userinfo['category_id'] = $category_id;
		$userinfo['subcat_id'] = $subcat_id;
		$userinfo['category'] = $category;
		$userinfo['subcategory'] = $subcategory;
		$userinfo['user_role'] = 1;
		$userinfo['busi_id'] = $busi_id;
		$userinfo['plan_id'] = 1;
		

		$this->session->set_userdata('tsuser',$userinfo);
		$this->session->set_userdata('tsuserid',$userId);
		$this->session->set_userdata('activstatus',0);
		$this->session->set_userdata('registration_step',0);
		$this->session->set_userdata('busi_id',$busi_id);
		
		$this->template->set ( 'result', $result );
		$this->template->set ( 'page', 'registration' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)
		->title ( 'TreadStation' );
		$this->template->build ('register/register_step_third');
		//$this->load->view('register/register_step_third', $result);
	}
	public  function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('tsuser');
		$this->session->unset_userdata('tsuserid');
		$this->session->unset_userdata('busi_id');
		$this->session->unset_userdata('registration_step');
		setcookie('cc_data', '', -time() + (86400 * 30), "/");
		redirect(base_url());
	}
	
	public function personal_info() {
		$this->load->library('mylib/General');
		$subcategories = $this->general->getUserSubCategories();
		$this->template->set ( 'subcategories', $subcategories);
		$this->template->set ( 'page', 'personal information' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)
		->title ( 'Trade Station' );
		$this->template->build ('register/profile_personal_info');
	}
	
	public function save_personal_info() {
		$this->load->model('Account_Model');
		$form_data = $this->input->post();
		$userName = $this->input->post("name");
		$position = $this->input->post("position");
		$alternateEmail = $this->input->post("alternate_email");
		$phoneCode = $this->input->post("mobile_code");
		$phoneNumber = $this->input->post("mobile_number");
		$country = $this->input->post("country");
		$province = $this->input->post("province");
		$city = $this->input->post("city");
		$street = $this->input->post("street");
		$prefix = $this->input->post("prefix");
		$timezone = $this->input->post("timezone");
		$reference = $this->input->post("reference");
		$buisnessType = $this->input->post("seller_buisness_type");
		$userId = $this->session->userdata('tsuser')['userid'];
		$profile_image = $this->input->post('profilepath');
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		
		$this->session->set_userdata(array(
				'sess_profile_img' => $profile_image,));
		
		$profileInfo = array(
				'user_id' => $userId,
				'alternative_email' => $alternateEmail,
				'country' => $country,
				'province' => $province,
				'city' => $city,
				'street' => $street,
				'mobile_code' => $phoneCode,
				'mobile_number' => $phoneNumber,
				'timezone' => $timezone,
				'position' => $position,
				'reference' => $reference,
				'profile_image' => $profile_image,
				'created_date' =>date('Y-m-d H:i:s')
		);
		
		$lastInsertId = $this->Account_Model->insertProfileInfo($profileInfo);
		
		$userData = array(
				'name' => $userName,
				'user_subcategory_id' => $buisnessType,
				'id' =>$userId,
				'name_prefix'=>$prefix,
				'registration_step' => 1
		);
		$this->load->library('mylib/UserLib');
		$updateUser = $this->userlib->updateUser($userData);
		
		$this->load->library('mylib/General');
		$subcategory = $this->general->getUserSubCategoriesById($buisnessType);
		$subcategory_name = $subcategory[0]['sub_category'];
		
		$category_id = $this->session->userdata('tsuser')['category_id'];
		$category_name = $this->session->userdata('tsuser')['category'];
		$email = $this->session->userdata('tsuser')['email'];
		
		$this->session->unset_userdata('tsuser');
		//$this->session->unset_userdata('tsuserid');
		$this->session->unset_userdata('registration_step');
		
		$userinfo = array();
		$userinfo['name'] = $userName;
		$userinfo['userid'] = $userId;
		$userinfo['prefix'] = $prefix;
		$userinfo['email'] = $email;
		$userinfo['category_id'] = $category_id;
		$userinfo['subcat_id'] = $buisnessType;
		$userinfo['category'] = $category_name;
		$userinfo['subcategory'] = $subcategory_name;
		$userinfo['user_role'] = 1;
		$userinfo['busi_id'] = $busi_id;
		$userinfo['plan_id'] = 1;
		$this->session->set_userdata('tsuser',$userinfo);
		$this->session->set_userdata('registration_step',1);
		$this->session->set_userdata('profile_img', $profile_image);
		/* ************** Storage Implementation *************** */
		$size = filesize(FCPATH."assets/".$profile_image);
		$this->load->library('mylib/StorageLib');
		$storage = array();
		$storage['busi_id'] = $busi_id;
		$storage['field'] = 'desksite';
		$storage['datasize'] = round($size/1024,2);
		$this->storagelib->updateStorageByBusiId($storage);
		/* ***************************************************** */
		if ($lastInsertId > 0) {
			redirect('account/buisness_information');
		}
	}
	
	public function login() {
		$this->load->model('Account_Model');
		$email = $_REQUEST['email'];
		$text_password = $_REQUEST['password'];
		$password = md5($_REQUEST['password']);
		$rememberme = $_REQUEST['rememberMe'];
		$result = $this->Account_Model->loginCheck($email, $password);
		if (count($result) > 0) {
			//$result[0]['is_disable'] == 0)
			if($result[0]['is_deleted'] == 0)  {
				$messageflag = $result[0]['message_flag'];
				if($messageflag == 1)
				{
					$this->session->set_userdata('mystation_popup',1);
				}
				$profile_image = "";
				$userinfo = array();
				$userId = 0;
				$profile_image = "";
				if($result[0]['user_role'] == 2) 
				{
					$userinfo['name'] = $result[0]['name'];
					$userinfo['prefix'] = $result[0]['name_prefix'];
					$userinfo['email'] = $result[0]['email'];
					$admin_id = $result[0]['admin_user_id'];
					$admindata = $this->Account_Model->getUserDataById($admin_id);
					if(count($admindata) > 0 ) {
						$userinfo['userid'] = $admindata[0]['id'];
						$userinfo['category_id'] = $admindata[0]['user_category_id'];
						$userinfo['subcat_id'] = $admindata[0]['user_subcategory_id'];
						$userinfo['category'] = $admindata[0]['user_category'];
						$userinfo['subcategory'] = $admindata[0]['sub_category'];
						$userinfo['user_role'] = $result[0]['user_role'];
						$userinfo['busi_id'] = $admindata[0]['busi_id'];
						$userinfo['plan_id'] = $admindata[0]['plan_id'];
						$userinfo['reg_date'] = date('Y-m-d',strtotime($admindata[0]['created_date']));
						$profile_image = $admindata[0]['profile_image'];
						$userId = $admindata[0]['id'];
					} else {
						$userinfo['name'] = $result[0]['name'];
						$userinfo['prefix'] = $result[0]['name_prefix'];
						$userinfo['userid'] = $result[0]['id'];
						$userinfo['email'] = $result[0]['email'];
						$userinfo['category_id'] = $result[0]['user_category_id'];
						$userinfo['subcat_id'] = $result[0]['user_subcategory_id'];
						$userinfo['category'] = $result[0]['user_category'];
						$userinfo['subcategory'] = $result[0]['sub_category'];
						$userinfo['user_role'] = $result[0]['user_role'];
						$userinfo['busi_id'] = $result[0]['busi_id'];
						$userinfo['plan_id'] = $result[0]['plan_id'];
						$userinfo['reg_date'] = date('Y-m-d',strtotime($result[0]['created_date']));
						$profile_image = $result[0]['profile_image'];
						$userId = $result[0]['id'];
					}
				} else if($result[0]['user_role'] == 3) {
					$userinfo['name'] = $result[0]['name'];
					$userinfo['prefix'] = $result[0]['name_prefix'];
					$userinfo['userid'] = $result[0]['id'];
					$userinfo['email'] = $result[0]['email'];
					$userinfo['category_id'] = $result[0]['user_category_id'];
					$userinfo['subcat_id'] = $result[0]['user_subcategory_id'];
					$userinfo['category'] = $result[0]['user_category'];
					$userinfo['subcategory'] = $result[0]['sub_category'];
					$userinfo['user_role'] = $result[0]['user_role'];
					$userinfo['busi_id'] = $result[0]['busi_id'];
					$userinfo['plan_id'] = $result[0]['plan_id'];
					$userinfo['reg_date'] = date('Y-m-d',strtotime($result[0]['created_date']));
					$profile_image = $result[0]['profile_image'];
					$userId = $result[0]['id'];
					
				} else {
					$userinfo['name'] = $result[0]['name'];
					$userinfo['prefix'] = $result[0]['name_prefix'];
					$userinfo['userid'] = $result[0]['id'];
					$userinfo['email'] = $result[0]['email'];
					$userinfo['category_id'] = $result[0]['user_category_id'];
					$userinfo['subcat_id'] = $result[0]['user_subcategory_id'];
					$userinfo['category'] = $result[0]['user_category'];
					$userinfo['subcategory'] = $result[0]['sub_category'];
					$userinfo['user_role'] = $result[0]['user_role'];
					$userinfo['busi_id'] = $result[0]['busi_id'];
					$userinfo['plan_id'] = $result[0]['plan_id'];
					$userinfo['reg_date'] = date('Y-m-d',strtotime($result[0]['created_date']));
					$profile_image = $result[0]['profile_image'];
					$userId = $result[0]['id'];
				}
				
				$activestatus = $result[0]['account_activated'];
				$registration_step = $result[0]['registration_step'];
				
				$subuserid = 0;
				if($result[0]['is_subuser'] == 1)
				{
					$subuserid = $result[0]['id'];
				}
				
				$this->session->set_userdata('tsuser',$userinfo);
				$this->session->set_userdata('tsuserid',$userId);
				$this->session->set_userdata('activstatus',$activestatus);
				$this->session->set_userdata('registration_step',$registration_step);
				$this->session->set_userdata('busi_id',$result[0]['busi_id']);
				$this->session->set_userdata('profile_img', $profile_image);
				$this->session->set_userdata('is_disable', $result[0]['is_disable']);
				$this->session->set_userdata('is_subuser', $result[0]['is_subuser']);
				$this->session->set_userdata('subuserid', $subuserid);
				setcookie('cc_data', $userinfo['userid'], time() + (86400 * 30), "/");
				$_SESSION['timeout'] = time();
				
				if ($rememberme == 'yes') {
					//$this->session->set_userdata($sessionData);
					$cookieEmail = array(
							'name' => 'email',
							'value' => $email,
							'expire' => time() + 86500,
							'path' => '/',
					);
					$this->input->set_cookie($cookieEmail);
					
					$cookiePass = array(
							'name' => 'password',
							'value' => $text_password,
							'expire' => time() + 86500,
							'path' => '/',
					);
					$this->input->set_cookie($cookiePass);
				} else {
					$this->input->set_cookie('email', '');
					$this->input->set_cookie('password', '');
				}
				
				echo'success';
				die;
			} else {
				$msg = 'Your account had been suspended.';
				if($result[0]['is_deleted'] == 1) {
					$msg = 'Your account had been deleted.';
				}
// 				if($result[0]['is_disable'] == 1) {
// 					$msg = 'Your account had been disabled.';
// 				}
				echo $msg;
				die;
			}
		} else {
			echo 'failed';
			die;
		}
	}
	
	public function buisness_information() {
		$this->load->model('Product_Model','product');
		$countries = $this->product->getAllCountries();
		$this->template->set ( 'countries', $countries );
		$this->template->set ( 'page', 'Business information' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)
		->title ( 'TreadStation' );
		$this->template->build ('register/buisness_information');
	}
	
	public function save_buisness_info() {
		
		$this->load->library('mylib/BusinessLib');
		$this->load->library('mylib/TradLib');
		$this->load->model('Account_Model');
		
		$form_data = $this->input->post();
		$user_id = $this->session->userdata('tsuser')['userid'];
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$user_name = $this->input->post("name");
		$company_name = $this->input->post("company_name");
		$buisness_country = $this->input->post("buisness_country");
		$buisness_province = $this->input->post("buisness_province");
		$buisness_city = $this->input->post("buisness_city");
		$buisness_street = $this->input->post("buisness_street");
		$buisness_license_name = $this->input->post("buisness_license_name");
		$buisness_country_license_name = $this->input->post("buisness_country_other_lng");
		$buisness_province_license_name = $this->input->post("buisness_province_other_lng");
		$buisness_city_license_name = $this->input->post("buisness_city_other_lng");
		$buisness_street_license_name = $this->input->post("buisness_street_other_lng");
		$tel_code = $this->input->post("telCode");
		$city_code = $this->input->post("cityCode");
		$telephone_number1 = $this->input->post("telephoneNumber1");
		$telephone_number2 = $this->input->post("telephoneNumber2");
		$fax = $this->input->post("fax");
		$pob = $this->input->post("pob");
		$website = $this->input->post("website");
		$buisness_email = $this->input->post("buisness_email");
		$year_of_registration = $this->input->post("year_of_registration");
		$owner_name = $this->input->post("owner_name");
		$company_size = $this->input->post("company_size");
		$no_of_employee = $this->input->post("no_of_employee");
		$company_intro = $this->input->post("company_intro");
		$company_presentation = $this->input->post("company_presentation");
		$contactperson= $this->input->post("optionsRadios");
		$account_no = $this->input->post("account_no");
		$account_name = $this->input->post("account_name");
		$bank_name = $this->input->post("bank_name");
		$bank_code = $this->input->post("bank_code");
		$bank_address = $this->input->post("bank_address");
		$swift_code = $this->input->post("swift_code");
		$company_bod = $account_no ." ".$account_name." ".$bank_name."  ".$bank_code."  ".$bank_address."  ".$swift_code;
		$buisnessImage = $this->input->post('logopath');
		$annual_trad_volume = $this->input->post('annual_trad_volume');
		$company_rendom_carousel = $this->input->post('company_rendom_carousel');
		if($company_rendom_carousel == "" || $company_rendom_carousel== null)
		{
			$company_rendom_carousel = 0;
		}
		$companyInfo = array();
		// contactperson
		if($contactperson == 1)
		{
			$companyInfo['contact_person_flag'] = $contactperson;
			$companyInfo['contact_person'] = $this->session->userdata('tsuser')['name'];
			
			$contactarr['busi_id'] = $busi_id;
			$boolvaluecontact = $this->Account_Model->deleteBusinessContact($contactarr);
			
			$paramuser = array();
			$paramuser['user_role'] = 3;
			$paramuser['busi_id'] = $busi_id;
			$usercontactdata = $this->Account_Model->getUserByBusiIdAndUserRole($paramuser);
			
			if(count($usercontactdata) >0 )
			{
				$userinfo = array();
				$userinfo['user_id'] = $usercontactdata[0]['id'];
				$userdata = $this->Account_Model->deleteUserInfo($userinfo);
			}
			
			$user = array();
			$user['busi_id'] = $busi_id;
			$user['user_role'] = 3;
			$userdata = $this->Account_Model->deleteUser($user);
			
			$adminuser = array();
			$adminuser['user_role'] = 1;
			$adminuser['busi_id'] = $busi_id;
			$adminuser['is_contactperson'] = 1;
			$userdata = $this->Account_Model->updateUser($adminuser);
			
			
		} else {
			$companyInfo['contact_person_flag'] = $contactperson;
			$contact = $this->businesslib->getContactperson($busi_id);
			if(count($contact) > 0 )
			{
				$companyInfo['contact_person'] = $contact[0]['name'];
			}
		}
		
		// end conactperson
		
		
		$route = array();
		$from_location = $this->input->post("from_shipping_port");
		$to_location= $this->input->post("to_shipping_port");
		$from_country = $this->input->post("from_country_id");
		$to_country = $this->input->post("to_country_id");
		foreach ($from_country as $key=>$country)
		{
			if($country > 0) {
				$route['from_country_id'] = $country;
			} else {
				$route['from_country_id'] = 0;
			}
			if($to_country[$key] > 0) {
				$route['to_country_id'] = $to_country[$key];
			} else {
				$route['to_country_id'] = 0;
			}
			$route['from_location'] = $from_location[$key];
			$route['to_location'] = $to_location[$key];
			$route['busi_id'] = $busi_id;
			$route['created_date'] = date('Y-m-d H:i:s');
			$boolvalueroute = $this->businesslib->insertBusinessRoutes($route);
		}
		$paymentdata = $this->input->post('payment');
		$payment_data= array();
		for($i=0;$i<count($paymentdata);$i++) {
			$payment_data[$i]['payment_terms_id'] = $paymentdata[$i];
			$payment_data[$i]['trad_id'] = 0;
			$payment_data[$i]['busi_id'] = $busi_id;
			$payment_data[$i]['created_date'] = date('Y-m-d H:i:s');
		}
		if(count($paymentdata) > 0 )
		{
			$this->tradlib->saveUserPaymentTerms($payment_data);
		}
		//$contact_name = $this->input->post('contact_name');
		//$contact_number = $this->input->post('contact_number');
		
// 		if($contact_name == "")
// 		{
// 			$contact_name = $owner_name;
// 		}

	
 		// 		$total = count($_FILES['companyImage']['name']);
// 		$userPath = FCPATH. "assets/images/user_images/$user_id/business/";
// 		if (!file_exists($userPath)) {
// 			mkdir($userPath, 0777, true);
// 			chmod($userPath, 0777);
// 		}
// 		$tmpFilePath = $_FILES['buisnessImage']['tmp_name'];
// 		$buisnessImage = "";
// 		if ($tmpFilePath != ""){
// 			$newFilePath = $userPath. $_FILES['buisnessImage']['name'];
// 			$buisnessImage = "images/user_images/$user_id/business/".$_FILES['buisnessImage']['name'];
// 			if(move_uploaded_file($tmpFilePath, $newFilePath)) {
// 				//
// 			}
// 		}
// 		$busi_images = array();
// 		for($i=0; $i<$total; $i++) {
// 			$tmpFilePath = $_FILES['companyImage']['tmp_name'][$i];
// 			if ($tmpFilePath != ""){
// 				$newFilePath = $userPath. $_FILES['companyImage']['name'][$i];
// 				$busi_images[] = "images/user_images/$user_id/business/".$_FILES['companyImage']['name'];
// 				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
// 					//
// 				}
// 			}
// 		}
		$buisnessInfo = array(
				'id' => $busi_id,
				'plan_id' => 1,
				'company_name' => $company_name,
				'company_country' => $buisness_country,
				'company_province' => $buisness_province,
				'company_city' => $buisness_city,
				'company_street' => $buisness_street,
				'license_company_name' => $buisness_license_name,
				'license_company_country' => $buisness_country_license_name,
				'license_company_province' => $buisness_province_license_name,
				'license_company_city' => $buisness_city_license_name,
				'license_company_street' => $buisness_street_license_name,
				'telephone_code' => $tel_code,
				'telephone_city_code' => $city_code,
				'telephone_number' => $telephone_number1,
				'telephone_number1' => $telephone_number2,
				'fax' => $fax,
				'p_o_box' => $pob,
				'website' => $website,
				'company_email' => $buisness_email,
				'annual_trad_volume'  => $annual_trad_volume,
				'company_rendom_carousel'  => $company_rendom_carousel,
				'created_date' =>date('Y-m-d H:i:s')
		);
		if($buisnessImage != "") {
			$buisnessInfo['business_logo'] = $buisnessImage;
		}
		
		$lastInsertIdBuisnessInfo = $this->Account_Model->updateBusinessInfo($buisnessInfo);
		
		$companyInfo['busi_id'] = $busi_id;
		if($year_of_registration == "" || $year_of_registration == null)
		{
			$year_of_registration = 0;
		}
		$companyInfo['year_of_registration'] = $year_of_registration;
		$companyInfo['company_owner_name'] =  $owner_name;
		$companyInfo['company_size'] = $company_size;
		if($no_of_employee == "" || $no_of_employee == null)
		{
			$no_of_employee = 0;
		}
		$companyInfo['total_no_of_emp'] = $no_of_employee;
		$companyInfo['company_introduction'] = $company_intro;
		$companyInfo['hot_presentation'] = $company_presentation;
		$companyInfo['company_bank_account'] = $company_bod;
		$companyInfo['account_no'] = $account_no;
		$companyInfo['account_name'] = $account_name;
		$companyInfo['bank_name'] = $bank_name;
		$companyInfo['bank_code'] = $bank_code;
		$companyInfo['bank_address'] = $bank_address;
		$companyInfo['swift_code'] = $swift_code;
		$companyInfo['created_date'] = date('Y-m-d H:i:s');
// 		$i = 1;
// 		foreach ($busi_images as $key=>$row) {
// 			$companyInfo['company_image'.$i] = $row;
// 			$i++;
// 		}
		
		$lastInsertIdComapnyInfo = $this->Account_Model->insertCompanyInfo($companyInfo);
		//$updateComapnyInfo = $this->Account_Model->updateCompanyInfo($lastInsertIdComapnyInfo, $uploadData);
		//add Image path
		
		
		$data = array();
		//$data['id'] = $user_id;
		$data['registration_step'] = 2;
		$data['busi_id'] = $busi_id;
		$this->load->library('mylib/UserLib');
		$this->userlib->updateUser($data);
		
		$this->session->unset_userdata('registration_step');
		$this->session->unset_userdata('busi_id');
		$this->session->set_userdata('registration_step',2);
		$this->session->set_userdata('busi_id',$busi_id);
		
		$usercategory = $this->session->userdata('tsuser')['category_id'];
		$usersubcategory = $this->session->userdata('tsuser')['subcat_id'];
		/* ************** Storage Implementation *************** */
		$size = filesize(FCPATH."assets/".$buisnessImage);
		$this->load->library('mylib/StorageLib');
		$storage = array();
		$storage['busi_id'] = $busi_id;
		$storage['field'] = 'desksite';
		$storage['datasize'] = round($size/1024,2);
		$this->storagelib->updateStorageByBusiId($storage);
		/* ***************************************************** */
		if($usercategory == 2) {
			redirect('account/certificate');
		} 
		if($usercategory == 3) {
			$data = array();
			$data['busi_id'] = $this->session->userdata('busi_id');
			$data['account_activated'] = 1;
			$data['registration_step'] = 5;
			$this->userlib->updateUser($data);
			
			$activstatus= $this->session->userdata('activstatus');
			$this->session->unset_userdata('activstatus');
			$this->session->set_userdata('activstatus',1);
			$this->session->unset_userdata('registration_step');
			$this->session->set_userdata('registration_step',5);
			$this->session->set_userdata('mystation_popup',1);
			redirect('buyer_mystation');
		}
		else {
			
			if($usersubcategory == 1) {
				redirect('account/factory_details');
			} else {
				redirect('account/trade');
			}
			
		}
	}
	
	public function saveBranches() {
		$country = $this->input->post("bcountry");
		$province = $this->input->post("bprovince");
		$city = $this->input->post("bcity");
		$street = $this->input->post("bstreet");
		$tel_code = $this->input->post("bcountry_code");
		$city_code = $this->input->post("bcity_code");
		$telephone_number1 = $this->input->post("btelephone1");
		$telephone_number2 = $this->input->post("btelephone2");
		$fax = $this->input->post("bfax");
		$email = $this->input->post("bemail");
		$this->load->model('Account_Model');
		$branches = array();
		foreach ($country as $key=>$count) {
			$branch = array();
			$branch['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
			$branch['country'] = $country[$key];
			$branch['province'] = $province[$key];
			$branch['city'] = $city[$key];
			$branch['street'] = $street[$key];
			$branch['country_code'] = $tel_code[$key];
			$branch['city_code'] = $city_code[$key];
			$branch['telephone1'] = $telephone_number1[$key];
			$branch['telephone2'] = $telephone_number2[$key];
			$branch['fax'] = $fax[$key];
			$branch['email'] = $email[$key];
			$branches[] = $branch;
		}
		if(count($branches) > 0)
		$this->Account_Model->addMoreBranches($branches);
		echo json_encode(array('status'=>0,'msg'=>'Added Successfully.'));
	}
	
	public function factory_details() {
		$this->template->set ( 'page', 'Factory information' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)
		->title ( 'TreadStation' );
		$this->template->build ('register/factory_details');
	}
	
	public function save_factory_details() {
		$this->load->library('mylib/UserLib');
		$form_data = $this->input->post();
		$user_id = $this->session->userdata('tsuser')['userid'];
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$street = $this->input->post('street');
		$license_province = $this->input->post('license_province');
		$license_city = $this->input->post('license_city');
		$license_street = $this->input->post('license_street');
		$code = $this->input->post('code');
		$city_code = $this->input->post('city_code');
		$telephone = $this->input->post('telephone');
		$factory_size = $this->input->post('factory_size');
		$no_of_production_line = $this->input->post('no_of_production_line');
		$production_lead_time = $this->input->post('production_lead_time');
		$r_d_staff = $this->input->post('r_d_staff');
		$quality_control_stff = $this->input->post('quality_control_stff');
		//$oem = $this->input->post('oem');
		//$odm = $this->input->post('odm');
		//$own_brand = $this->input->post('own_brand');
		//$other = $this->input->post('other');
		$rndtype_idarray = implode(',', $this->input->post('rndtype'));
		$other_r_d_capacity = $this->input->post('other_r_d_capacity');
		$annual_turnover = $this->input->post('annual_turnover');
		$rnd_capacity = $other_r_d_capacity;
		$factoryInfo = array(
				'busi_id' => $this->session->userdata('busi_id'),
				'fact_province' => $province,
				'fact_city' => $city,
				'fact_street' => $street,
				'fact_license_province' => $license_province,
				'fact_license_city' => $license_city,
				'fact_license_street' => $license_street,
				'telephone_code' => $code,
				'telephone_city_code' => $city_code,
				'telephone' => $telephone,
				'fact_size' => $factory_size,
				'no_of_production_line' => $no_of_production_line,
				'production_lead_time' => $production_lead_time,
				'no_of_rnd_staff' => $r_d_staff,
				'no_of_control_staff' => $quality_control_stff,
				'rnd_capacity' => $rnd_capacity,
				'rnd_capacity_type' => $rndtype_idarray,
				'annual_turnover' => $annual_turnover,
				'created_date' =>date('Y-m-d H:i:s')
		);
		
		$lastInsertIdFactoryInfo = $this->Account_Model->insertFactoryInfo($factoryInfo);
		
		$paramuser = array();
		$paramuser['user_role'] = 3;
		$paramuser['busi_id'] = $busi_id;
		
		$usercontactdata = $this->Account_Model->getUserByBusiIdAndUserRole($paramuser);
		if(count($usercontactdata) > 0)
		{
			$contactarray = array();
			$contactarray['id'] = $usercontactdata[0]['id'];
			$contactarray['registration_step'] = 3;
			$this->userlib->updateUser($contactarray);
		}
		
		if ($lastInsertIdFactoryInfo > 0) {
			
			$data = array();
			$data['busi_id'] = $this->session->userdata('busi_id');
			$data['registration_step'] = 3;
			$this->userlib->updateUser($data);
			unset($data);
			$rndtype = $this->input->post('rndtype');
			$data = array();
			for($i=0;$i<count($rndtype);$i++) {
				$data[$i]['rnd_type_id'] = $rndtype[$i];
				$data[$i]['factory_id'] = $lastInsertIdFactoryInfo;
				$data[$i]['created_date'] = date('Y-m-d H:i:s');
			}
			$this->load->library('mylib/FactoryLib');
			$letestid = $this->factorylib->saveRndType($data);
			
			$this->session->unset_userdata('registration_step');
			$this->session->set_userdata('registration_step',3);
			
			redirect('account/trade');
		}
	}
	
	public function trade() {
		$this->load->library('mylib/TradLib');
		$market = $this->tradlib->getTradeMarket();
		$this->template->set('market',$market);
		$this->template->set ( 'page', 'Trad information' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)
		->title ( 'TreadStation' );
		$this->template->build ('register/trade');
	}
	
	public function sendMail($email, $emailData) {

		$emailAction = $emailData['action'];
		switch($emailAction) {
			case 'account_activation';
			$subject = 'TradeStation Account Activation';
			$this->template->set('templateType','account_activation');
			$this->template->set ('name', $emailData['name']);
			$this->template->set ('activationCode', $emailData['activation_code']);
			break;
			case 'passwordRecovery':
				$subject = 'TrdStation Password Recovery';
				$this->template->set('templateType','passwordRecovery');
				$this->template->set ('name', $emailData['name']);
				$this->template->set ('activationCode', $emailData['activation_code']);
				$this->template->set ( 'prefix', $emailData['prefix']);
				break;
			default:
				break;
		}
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'mytrdstation@gmail.com', // change it to yours
				'smtp_pass' => 'tradestation123', // change it to yours
				'mailtype' => 'text',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
				);
	
		$this->template->set_layout (false);
		$message = $this->template->build ('default/email_template','',true);
		$this->load->library('email', $config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->from('mytrdstation@gmail.com'); // change it to yours
		$this->email->to($email); // change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			echo 'sent';
		} else {
			//show_error($this->email->print_debugger());
			echo "fail";
		}
	}

	public function forgetsendMail()
	{
		$this->load->model('Account_Model');
		$email 		    = $_POST['email'];
		$userdetail     = $this->Account_Model->emailExist($email);
		$name 		    = $userdetail['name'];
		$password 	    = $userdetail['text_password'];
		$prifix 	    = $userdetail['name_prefix'];
		$securityCode   = getHash(5);
		$activationCode = $this->Account_Model->setValue($userdetail['id'],'activation_code',$securityCode);

		$emailData = array('action'=>'passwordRecovery','prefix'=> $prifix,'name' =>$name,'activation_code'=> $securityCode);
		return $this->sendMail($email, $emailData);
	}
	
	public function save_trade_info() {
		$this->load->library('mylib/UserLib');
		$form_data = $this->input->post();
		$user_id = $this->session->userdata('tsuser')['userid'];
		$market = implode(',', $this->input->post('market'));
		$trade = implode(',', $this->input->post('trade'));
		$payment = implode(',', $this->input->post('payment'));
		$currency = implode(',', $this->input->post('currency'));
		$port1 = $this->input->post('port1');
		$port2 = $this->input->post('port2');
		$port3 = $this->input->post('port3');
		$busi_id = $this->session->userdata('busi_id');
		
		
		
		$tradeInfo = array(
				'busi_id' => $this->session->userdata('busi_id'),
				'main_market_ids' => $market,
				'part1' => $port1,
				'part2' => $port2,
				'part3' => $port3,
				'terms_of_international_trade_ids' => $trade,
				'terms_of_payment_ids' => $payment,
				'payment_currency_ids' => $currency,
				'created_date' =>date('Y-m-d H:i:s')
		);
		
		$lastInsertIdFactoryInfo = $this->Account_Model->insertTradeInfo($tradeInfo);
		if ($lastInsertIdFactoryInfo > 0) {
			
			$marketdata = $this->input->post('market');
			$market_data = array();
			for($i=0;$i<count($marketdata);$i++) {
				$market_data[$i]['market_id'] = $marketdata[$i];
				$market_data[$i]['trad_id'] = $lastInsertIdFactoryInfo;
				$market_data[$i]['created_date'] = date('Y-m-d H:i:s');
			}
			$this->load->library('mylib/TradLib');
			$this->tradlib->saveUserMarket($market_data);
			
			$internationaltraddata = $this->input->post('trade');
			$internationaltrad_data= array();
			for($i=0;$i<count($internationaltraddata);$i++) {
				$internationaltrad_data[$i]['international_trad_id'] = $internationaltraddata[$i];
				$internationaltrad_data[$i]['trad_id'] = $lastInsertIdFactoryInfo;
				$internationaltrad_data[$i]['created_date'] = date('Y-m-d H:i:s');
			}
			$this->tradlib->saveUserInternationaltrad($internationaltrad_data);
			
			$paymentdata = $this->input->post('payment');
			$payment_data= array();
			for($i=0;$i<count($paymentdata);$i++) {
				$payment_data[$i]['payment_terms_id'] = $paymentdata[$i];
				$payment_data[$i]['trad_id'] = $lastInsertIdFactoryInfo;
				$payment_data[$i]['busi_id'] = $busi_id;
				$payment_data[$i]['created_date'] = date('Y-m-d H:i:s');
			}
			
			
			
			$this->tradlib->saveUserPaymentTerms($payment_data);
			
			$paymentcurrencydata = $this->input->post('currency');
			$paymentcurrency_data= array();
			for($i=0;$i<count($paymentcurrencydata);$i++) {
				$paymentcurrency_data[$i]['payment_currency_id'] = $paymentcurrencydata[$i];
				$paymentcurrency_data[$i]['trad_id'] = $lastInsertIdFactoryInfo;
				$paymentcurrency_data[$i]['created_date'] = date('Y-m-d H:i:s');
			}
			$this->tradlib->saveUserPaymentCurrency($paymentcurrency_data);
			
			// contact person update
			
			$paramuser = array();
			$paramuser['user_role'] = 3;
			$paramuser['busi_id'] = $busi_id;
			$usercontactdata = $this->Account_Model->getUserByBusiIdAndUserRole($paramuser);
			if(count($usercontactdata) > 0)
			{
				$contactarray = array();
				$contactarray['id'] = $usercontactdata[0]['id'];
				$contactarray['registration_step'] = 4;
				$this->userlib->updateUser($contactarray);
			}
			
			// end contact person update
			
			$data = array();
			$data['busi_id'] = $this->session->userdata('busi_id');
			$data['registration_step'] = 4;
			$this->userlib->updateUser($data);
			
			$this->session->unset_userdata('registration_step');
			$this->session->set_userdata('registration_step',4);
			
			redirect('account/certificate');
		}
	}
	
	public function certificate() {
		$this->load->library('mylib/CertificateLib');
		$certificate_type = $this->certificatelib->getCertificateType();
		$this->template->set ( 'certificate_type', $certificate_type);
		$this->template->set ( 'page', 'Certificates' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false)
		->title ( 'TreadStation' );
		$this->template->build ('register/certificates');
		
	}
	
	public function save_certificate_info() {
		$this->load->library('mylib/UserLib');
		$form_data = $this->input->post();
		$user_id = $this->session->userdata('tsuser')['userid'];
		$license = $this->input->post('license');
		$start_date = $this->input->post('start_date');
		$renwal_date = $this->input->post('end_date');
		$scope = $this->input->post('scope');
		$certificate = $this->input->post('certificate');
		$certificate_name = $this->input->post('certificate_name');
		$certificate_no = $this->input->post('certificate_reference_no');
		$this->session->userdata('busi_id');
// 		$certpath1= $this->input->post('certpath1');
// 		$certpath2 = $this->input->post('certpath2');
// 		$certpath3 = $this->input->post('certpath3');
// 		$certpath4 = $this->input->post('certpath4');
// 		$countmorecertificate = $this->input->post('totalmorecertificatecount');
		$size = 0;
		
		$total = count($_FILES['certificateImage']['name']);
		$countmorecertificate = count($_FILES['moreCertificateImage']['name']);
		$userPath = FCPATH. "assets/images/user_images/$user_id/certificate/";
		if (!file_exists($userPath)) {
			mkdir($userPath, 0777, true);
			chmod($userPath, 0777);
		}
		$moreCerts = array();
		$j = 1;
		for($i=0; $i<$countmorecertificate; $i++) {
			$mcerts = array();
			$tmpFilePath = $_FILES['moreCertificateImage']['tmp_name'][$i];
			$mcerts['certificate_url'] = "";
			$blahpath = 'blahpath-'.$j;
			if ($tmpFilePath != ""){
				$fileNameNew = microtime(true). $_FILES['moreCertificateImage']['name'][$i];
				$newFilePath = $userPath.$fileNameNew;
				$mcerts['certificate_url'] = "images/user_images/$user_id/certificate/".$fileNameNew;
				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					
				}
			}
			$mcerts['certificate_type'] = $certificate[$i];
			$mcerts['certificate_no'] = $certificate_no[$i];
			$mcerts['certificate_name'] = $certificate_name[$i];
			$mcerts['busi_id'] = $this->session->userdata('busi_id');
			if(!empty($mcerts['certificate_name']) && !empty($mcerts['certificate_no'])) {
				$moreCerts[] = $mcerts;
				$size = $size + $_FILES['moreCertificateImage']['size'][$i];
			}
			$j++;
		}
		
// 		$certificateInfo['cert_image1'] = $certpath1;
// 		$certificateInfo['cert_image2'] = $certpath2;
// 		$certificateInfo['cert_image3'] = $certpath3;
// 		$certificateInfo['cert_image4'] = $certpath4;
		$busi_images = array();
		
		for($i=0; $i<$total; $i++) {
			$tmpFilePath = $_FILES['certificateImage']['tmp_name'][$i];
			if ($tmpFilePath != ""){
				$fileNameNew = microtime(true). $_FILES['certificateImage']['name'][$i];
				$newFilePath = $userPath.$fileNameNew;
				$busi_images[] = "images/user_images/$user_id/certificate/".$fileNameNew;
				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
					$size = $size + $_FILES['certificateImage']['size'][$i];
				}
			}
		}
		$certificateInfo = array(
				'busi_id' => $this->session->userdata('busi_id'),
				'license' => $license,
				'start_date' => date('Y-m-d',strtotime($start_date)),
				'renwal_date' => date('Y-m-d',strtotime($renwal_date)),
				'scope' => $scope,
				'created_date' =>date('Y-m-d H:i:s')
		);
		$i = 1;
		foreach ($busi_images as $key=>$row) {
			$certificateInfo['cert_image'.$i] = $row;
			$i++;
		}
		
		$lastInsertIdFactoryInfo = $this->Account_Model->insertCertificateInfo($certificateInfo);
		// end contact person update
		
		if ($lastInsertIdFactoryInfo > 0) {
			/* ************** Storage Implementation *************** */
			$this->load->library('mylib/StorageLib');
			$storage = array();
			$storage['busi_id'] = $this->session->userdata('busi_id');
			$storage['field'] = 'desksite';
			$storage['datasize'] = round($size/1024,2);
			$this->storagelib->updateStorageByBusiId($storage);
			/* ***************************************************** */
			if(count($moreCerts) > 0)
			$this->Account_Model->addMoreCertificates($moreCerts);
			$data = array();
			$data['busi_id'] = $this->session->userdata('busi_id');
			$data['account_activated'] = 1;
			$data['registration_step'] = 5;
			
			$this->userlib->updateUser($data);
			
			$activstatus= $this->session->userdata('activstatus');
			$this->session->unset_userdata('activstatus');
			$this->session->set_userdata('activstatus',1);
			$this->session->unset_userdata('registration_step');
			$this->session->set_userdata('registration_step',5);
			$this->session->set_userdata('mystation_popup',1);
			
			$usercategory = $this->session->userdata('tsuser')['category_id'];
			if($usercategory == 2) {
				redirect('shipper_mystation');
				
			} else {
				redirect('mystation');
			}
		}
	}
	public function continueRegistration()
	{
		$id = $this->session->userdata('tsuser')['userid'];
		$category = $this->session->userdata('tsuser')['category_id'];
		$usersubcategory = $this->session->userdata('tsuser')['subcat_id'];
		
		$this->load->library('mylib/UserLib');
		$userdata = $this->userlib->getUserDataById($id);
		if(count($userdata) > 0)
		{
			if($userdata[0]['registration_step'] == 0)
			{
				redirect('account/personal_info');
			}
			if($userdata[0]['registration_step'] == 1)
			{
				redirect('account/buisness_information');
			}
			if($userdata[0]['registration_step'] == 2)
			{
				if($category == 2) {
					redirect('account/certificate');
					
				} else if($category == 1) {  
					if($usersubcategory  == 1) {
						redirect('account/factory_details');
					} else {
						redirect('account/trade');
					}
				} else {
					redirect('buyer_mystation');
				}
			}
			if($userdata[0]['registration_step'] == 3)
			{
				redirect('account/trade');
			}
			if($userdata[0]['registration_step'] == 4)
			{
				redirect('account/certificate');
			}
			
		}
	}
	
	public function saveBusinessLogoTempararyImage()
	{
		
		$map = array();
		$max_width =300;
		if (!empty($_FILES['businesslogo-pic']['name'])) {
			$user_photo1 = $_FILES['businesslogo-pic']['name'];
			$path = getcwd() . "/assets/images/tempimages/";
			$list = explode('.',$_FILES['businesslogo-pic']['name']);
			
			$ext = $list[1];
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			
			$location =  "assets/images/tempimages/";
			
			$Img = uploadImage($_FILES['businesslogo-pic'],$location,array('jpeg','jpg','png','gif'),2097152,'temp');
			$width = $this->getWidth(asset_url().$Img['image']);
			$height = $this->getHeight(asset_url().$Img['image']); //Scale the image if it is greater than the width set above if ($width > $max_width){
			$scale = $max_width/$width;
			$uploaded = $this->resizeImage(getcwd() . "/assets/".$Img['image'],$width,$height,$scale, $ext);
			if($Img['status'] == 1) {
				
				$map['msg'] = asset_url().$Img['image'];
				$map['status'] = 1;
				
			} else {
				$error = array("avatar"=>$Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$map['msg'] = $errorMsg;
				$map['status'] = 0;
				
			}
			echo json_encode($map);
		}
		
	}
	
	public function changeBusinessLogo()
	{
		$x1 = $_POST['x1'];
		$y1 = $_POST['y1'];
		$x2 = $_POST['x2'];
		$y2 = $_POST['y2'];
		$width = $_POST['w1'];
		$height = $_POST['h1'];
		$image_name = $_POST['image_name'];
		
		$original_image = $image_name;
		$data = explode('/',$original_image);
		$imagename = $data[count($data)-1];
		$imgarry = explode('.',$imagename);
		$imagenameonly = $imgarry[0];
		
		$userId = $this->session->userdata('tsuser')['userid'];
		$path = getcwd() . "/assets/images/user_images/";
		if (!file_exists($path)) {
			
			mkdir($path, 0777, true);
			chmod($path, 0777);
		}
		$userPath = FCPATH . "assets/images/user_images/$userId";
		if (!file_exists($userPath)) {
			
			mkdir($userPath, 0777, true);
			chmod($userPath, 0777);
		}
		$bisinessPath = FCPATH . "assets/images/user_images/$userId/business";
		if (!file_exists($bisinessPath)) {
			
			mkdir($bisinessPath, 0777, true);
			chmod($bisinessPath, 0777);
		}
		$new_image = 'assets/images/user_images/'.$userId.'/business/'.$imagenameonly.'new'.'.jpg';
		$image_quality = '95';
		list( $current_width, $current_height ) = getimagesize( $original_image );
		
		$x1 = $x1;
		$y1 = $y1;
		$x2 = $x2;
		$y2 = $y2;
		$width = $width;
		$height = $height;
		
		$crop_width = 200;
		$crop_height = 200;
		$new = imagecreatetruecolor( $crop_width, $crop_height );
		
		$current_image = "";
		
		switch($imgarry[2]) {
			case 'jpeg':
			case 'jpg':
				$current_image= imagecreatefromjpeg($original_image);
				break;
			case 'png':
				$current_image= imagecreatefromstring(file_get_contents($original_image));
				//$current_image= imagecreatefrompng($original_image);
				break;
			case 'gif':
				$current_image= imagecreatefromgif($original_image);
				break;
		}
		
		imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
		imagejpeg( $new, $new_image, $image_quality );
		
		$map = array();
		$map['fullpath'] = asset_url().'images/user_images/'.$userId.'/business/'.$imagenameonly.'new'.'.jpg';
		$map['path'] = 'images/user_images/'.$userId.'/business/'.$imagenameonly.'new'.'.jpg';
		
		echo json_encode($map);
		
	}
	function getWidth($image) {
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
	}
	function getHeight($image) {
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}
	function resizeImage($image,$width,$height,$scale,$ext) {
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch ($ext) {
			case 'jpg':
			case 'jpeg':
				$source = imagecreatefromjpeg($image);
				break;
			case 'gif':
				$source = imagecreatefromgif($image);
				break;
			case 'png':
				//$source = imagecreatefrompng($image);
				$source = imagecreatefromstring(file_get_contents($image));
				break;
			default:
				$source = false;
				break;
		}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		$color = imagecolorallocate($newImage, 255, 255, 255);
		imagefill($newImage, 0, 0, $color);
		
		imagejpeg($newImage,$image,90);
		chmod($image, 0777);
		return $image;
	}
	public function saveProfilePicTempararyImage()
	{
		$map = array();
		$max_width =300;
		if (!empty($_FILES['profile-pic']['name'])) {
			$user_photo1 = $_FILES['profile-pic']['name'];
			$path = getcwd() . "/assets/images/tempimages/";
			$list = explode('.',$_FILES['profile-pic']['name']);
			
			$ext = $list[1];
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			
			$location =  "assets/images/tempimages/";
			
			$Img = uploadImage($_FILES['profile-pic'],$location,array('jpeg','jpg','png','gif'),10097152,'temp');
			$width = $this->getWidth(FCPATH."assets/".$Img['image']);
			$height = $this->getHeight(FCPATH."assets/".$Img['image']); //Scale the image if it is greater than the width set above if ($width > $max_width){
		 	$scale = $max_width/$width;
		 	$uploaded = $this->resizeImage(getcwd() . "/assets/".$Img['image'],$width,$height,$scale, $ext);
		
			if($Img['status'] == 1) {
				
				$map['msg'] = asset_url().$Img['image'];
				$map['status'] = 1;
				
			} else {
				$error = array("avatar"=>$Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$map['msg'] = $errorMsg;
				$map['status'] = 0;
				
			}
			echo json_encode($map);
		}
		
	}
	
	public function changeProfilePic()
	{
		$x1 = $_POST['x1'];
		$y1 = $_POST['y1'];
		$x2 = $_POST['x2'];
		$y2 = $_POST['y2'];
		$width = $_POST['w1'];
		$height = $_POST['h1'];
		$image_name = $_POST['image_name'];
		
		$original_image = $image_name;
		$data = explode('/',$original_image);
		$imagename = $data[count($data)-1];
		$imgarry = explode('.',$imagename);
		$imagenameonly = $imgarry[0];
		
		$userId = $this->session->userdata('tsuser')['userid'];
		$path = getcwd() . "/assets/images/user_images/";
		if (!file_exists($path)) {
			
			mkdir($path, 0777, true);
			chmod($path, 0777);
		}
		$userPath = FCPATH . "assets/images/user_images/$userId";
		if (!file_exists($userPath)) {
			
			mkdir($userPath, 0777, true);
			chmod($userPath, 0777);
		}
	
		$new_image = 'assets/images/user_images/'.$userId.'/'.$imagenameonly.'new'.'.jpg';
		$image_quality = '95';
		list( $current_width, $current_height ) = getimagesize( $original_image );
		
		$x1 = $x1;
		$y1 = $y1;
		$x2 = $x2;
		$y2 = $y2;
		$width = $width;
		$height = $height;
		
		$crop_width = 200;
		$crop_height = 200;
		$new = imagecreatetruecolor( $crop_width, $crop_height );
		
		$current_image = "";
		
		switch($imgarry[2]) {
			case 'jpeg':
			case 'jpg':
				$current_image= imagecreatefromjpeg($original_image);
				break;
			case 'png':
				$current_image= imagecreatefromstring(file_get_contents($original_image));
				//$current_image= imagecreatefrompng($original_image);
				break;
			case 'gif':
				$current_image= imagecreatefromgif($original_image);
				break;
		}
		
		imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
		imagejpeg( $new, $new_image, $image_quality );
		
		$map = array();
		$map['fullpath'] = asset_url().'images/user_images/'.$userId.'/'.$imagenameonly.'new'.'.jpg';
		$map['path'] = 'images/user_images/'.$userId.'/'.$imagenameonly.'new'.'.jpg';
		
		echo json_encode($map);
		
	}
	public function saveCertificateTempararyImage()
	{
		$map = array();
		$final = array();
		if (!empty($_FILES['certificateImage']['name'])) {
			$certificatecount= count($_FILES['certificateImage']['name']);
			$path = getcwd() . "/assets/images/tempimages/";
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			$location =  "assets/images/tempimages/";
			for($i=0;$i<$certificatecount;$i++)
			{
				$file = array();
				$file['name'] = $_FILES['certificateImage']['name'][$i];
				$file['type'] = $_FILES['certificateImage']['type'][$i];
				$file['tmp_name'] = $_FILES['certificateImage']['tmp_name'][$i];
				$file['error'] = $_FILES['certificateImage']['error'][$i];
				$file['size'] = $_FILES['certificateImage']['size'][$i];
				$Img = uploadImage($file,$location,array('jpeg','jpg','png','gif'),2097152,'temp');
				if($Img['status'] == 1) {
				
				$map['msg'] = asset_url().$Img['image'];
				$map['status'] = 1;
				$final[$i] = $map;
				
				} else {
					$error = array("avatar"=>$Img['msg']);
					if (! empty ( $error )) {
						array_push ( $errors, $error );
					}
					$errorMsg["errors"] = $errors;
					$map['msg'] = $errorMsg;
					$map['status'] = 0;
					$final[$i] = $map;
					
				}
			}
			
				echo json_encode($final);
		}
		
	}
	
	public function changeCertificate()
	{
		$main = $this->input->post('main');
		$response = array();
		$userId = $this->session->userdata('tsuser')['userid'];
		for($i=0;$i<count($main);$i++)
		{
				$original_image = $main[$i]['image_name'];
				$data = explode('/',$original_image);
				$imagename = $data[count($data)-1];
				$imgarry = explode('.',$imagename);
				$imagenameonly = $imgarry[0];
				
				
				$path = getcwd() . "/assets/images/user_images/";
				if (!file_exists($path)) {
					
					mkdir($path, 0777, true);
					chmod($path, 0777);
				}
				$userPath = FCPATH . "assets/images/user_images/$userId";
				if (!file_exists($userPath)) {
					
					mkdir($userPath, 0777, true);
					chmod($userPath, 0777);
				}
				$certiPath = FCPATH . "assets/images/user_images/$userId/certificate";
				if (!file_exists($certiPath)) {
					
					mkdir($certiPath, 0777, true);
					chmod($certiPath, 0777);
				}
			
				$new_image = 'assets/images/user_images/'.$userId.'/certificate/'.$imagenameonly.'new'.$i.'.jpg';
				$image_quality = '95';
				list( $current_width, $current_height ) = getimagesize( $original_image );
				
				$x1 = $main[$i]['x_axis'];
				$y1 = $main[$i]['y_axis'];
				$x2 = $main[$i]['x2_axis'];
				$y2 = $main[$i]['y2_axis'];
				$width = $main[$i]['thumb_width'];
				$height = $main[$i]['thumb_height'];
				
				$crop_width = 200;
				$crop_height = 200;
				$new = imagecreatetruecolor( $crop_width, $crop_height );
				
				$current_image = "";
				
				switch($imgarry[2]) {
					case 'jpeg':
					case 'jpg':
						$current_image= imagecreatefromjpeg($original_image);
						break;
					case 'png':
						$current_image= imagecreatefrompng($original_image);
						break;
					case 'gif':
						$current_image= imagecreatefromgif($original_image);
						break;
				}
				
				imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
				imagejpeg( $new, $new_image, $image_quality );
				
				$map = array();
				$map['fullpath'] = asset_url().'images/user_images/'.$userId.'/certificate/'.$imagenameonly.'new'.$i.'.jpg';
				$map['path'] = 'images/user_images/'.$userId.'/certificate/'.$imagenameonly.'new'.$i.'.jpg';
				$response[$i]= $map;
		}
		echo json_encode($response);
		
	}

	public function saveMoreCertificateTempararyImage()
	{
		$map = array();
		if (!empty($_FILES['morecertificatefile-pic']['name'])) {
			
			$user_photo1 = $_FILES['morecertificatefile-pic']['name'];
			$path = getcwd() . "/assets/images/tempimages/";
			if (!file_exists($path)) {
				
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			
			$location =  "assets/images/tempimages/";
			
			$Img = uploadImage($_FILES['morecertificatefile-pic'],$location,array('jpeg','jpg','png','gif'),2097152,'temp');
			if($Img['status'] == 1) {
				
				$map['msg'] = asset_url().$Img['image'];
				$map['status'] = 1;
				
			} else {
				$error = array("avatar"=>$Img['msg']);
				if (! empty ( $error )) {
					array_push ( $errors, $error );
				}
				$errorMsg["errors"] = $errors;
				$map['msg'] = $errorMsg;
				$map['status'] = 0;
				
			}
			echo json_encode($map);
		}
	}
	public function changeMoreCertificate()
	{
		$x1 = $_POST['x1'];
		$y1 = $_POST['y1'];
		$x2 = $_POST['x2'];
		$y2 = $_POST['y2'];
		$width = $_POST['w1'];
		$height = $_POST['h1'];
		$image_name = $_POST['image_name'];
		
		$original_image = $image_name;
		$data = explode('/',$original_image);
		$imagename = $data[count($data)-1];
		$imgarry = explode('.',$imagename);
		$imagenameonly = $imgarry[0];
		
		$userId = $this->session->userdata('tsuser')['userid'];
		$path = getcwd() . "/assets/images/user_images/";
		if (!file_exists($path)) {
			
			mkdir($path, 0777, true);
			chmod($path, 0777);
		}
		$userPath = FCPATH . "assets/images/user_images/$userId";
		if (!file_exists($userPath)) {
			
			mkdir($userPath, 0777, true);
			chmod($userPath, 0777);
		}
		$certiPath = FCPATH . "assets/images/user_images/$userId/certificate";
		if (!file_exists($certiPath)) {
			
			mkdir($certiPath, 0777, true);
			chmod($certiPath, 0777);
		}
		
		$new_image = 'assets/images/user_images/'.$userId.'/certificate/'.$imagenameonly.'new'.'.jpg';
		$image_quality = '95';
		list( $current_width, $current_height ) = getimagesize( $original_image );
		
		$x1 = $x1;
		$y1 = $y1;
		$x2 = $x2;
		$y2 = $y2;
		$width = $width;
		$height = $height;
		
		$crop_width = 200;
		$crop_height = 200;
		$new = imagecreatetruecolor( $crop_width, $crop_height );
		
		$current_image = "";
		
		switch($imgarry[2]) {
			case 'jpeg':
			case 'jpg':
				$current_image= imagecreatefromjpeg($original_image);
				break;
			case 'png':
				$current_image= imagecreatefrompng($original_image);
				break;
			case 'gif':
				$current_image= imagecreatefromgif($original_image);
				break;
		}
		
		imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
		imagejpeg( $new, $new_image, $image_quality );
		
		$map = array();
		$map['fullpath'] = asset_url().'images/user_images/'.$userId.'/certificate/'.$imagenameonly.'new'.'.jpg';
		$map['path'] = 'images/user_images/'.$userId.'/certificate/'.$imagenameonly.'new'.'.jpg';
		
		echo json_encode($map);
	}
	
	public function deleteBusiness() {
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$buisnessInfo = array(
				'id' => $busi_id,
				'is_deleted' => 1
		);
		$this->Account_Model->updateBusinessInfo($buisnessInfo);
		$this->session->unset_userdata('tsuser');
		$this->session->unset_userdata('tsuserid');
		$this->session->unset_userdata('activstatus');
		$this->session->unset_userdata('registration_step');
		$this->session->unset_userdata('busi_id');
		$this->session->unset_userdata('profile_img');
		echo json_encode(array('msg'=>'Account deleted successfully.'));
	}
	
	public function disableBusiness() {
		$is_disable = $this->input->post('is_disable');
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$disable = 0;
		if($is_disable == 1)
		{
			$buisnessInfo = array(
					'id' => $busi_id,
					'is_disable' => 0
			);
			$disable = 0;
		} else {
			$buisnessInfo = array(
					'id' => $busi_id,
					'is_disable' => 1
			);
			$disable = 1;
		}
		
		$this->Account_Model->updateBusinessInfo($buisnessInfo);
// 		$this->session->unset_userdata('tsuser');
// 		$this->session->unset_userdata('tsuserid');
// 		$this->session->unset_userdata('activstatus');
// 		$this->session->unset_userdata('registration_step');
// 		$this->session->unset_userdata('busi_id');
// 		$this->session->unset_userdata('profile_img');
		$this->session->unset_userdata('is_disable');
		$this->session->set_userdata('is_disable',$disable);
		if($is_disable == 1)
		{
			echo json_encode(array('msg'=>'Account enable successfully.'));
		} else {
			echo json_encode(array('msg'=>'Account disabled successfully.'));
		}
	}
	
	public function saveBusinessContact()
	{
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$this->load->model('Account_Model');
		$this->load->library('mylib/UserLib');
		$param = array();
		$param['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		$param['name_prefix'] = $this->input->post("contactpersoneprefix");
		$param['name']= $this->input->post("contactpersone_name");
		$param['email']= $this->input->post("contact_person_email");
		$param['password']= md5($this->input->post("text_password"));
		$param['text_password']= $this->input->post("text_password");
		$param['mobile_code']= $this->input->post("contact_person_code");
		$param['mobile']= $this->input->post("contact_person_mobile");
		$param['position']= $this->input->post("contact_person_position");
		$param['picture']= $this->input->post("contact_imgpath");
		
		$insertcontactid = $this->Account_Model->insertIntoContactPersone($param);
		
		
		
		$user = array();
		$user['busi_id'] = $busi_id;
		$user['email'] = $this->input->post("contact_person_email");
		$user['name_prefix'] = $this->input->post("contactpersoneprefix");
		$user['name'] = $this->input->post("contactpersone_name");
		$user['user_role'] = 3;
		$user['user_category_id'] = $this->session->userdata('tsuser')['category_id'];
		$user['user_subcategory_id'] = $this->session->userdata('tsuser')['subcat_id'];
		$user['admin_user_id'] = $this->session->userdata('tsuser')['userid'];
		$user['account_activated'] = $this->session->userdata('activstatus');
		$user['password'] = md5($this->input->post("text_password"));
		$user['text_password'] = $this->input->post("text_password");
		$user['registration_step'] = $this->session->userdata('registration_step');
		$user['is_contactperson'] = 1;
		$user['is_subuser'] = 0;
		$user['created_date'] = date('Y-m-d H:i:s');
		$data =  $this->load->library('mylib/UserLib');
		$lastInsertId = $this->userlib->insertIntoUsers($user);
		
		$userinfo =  array();
		$userinfo['user_id'] = $lastInsertId;
		$userinfo['mobile_code'] = $this->input->post("contact_person_code");
		$userinfo['mobile_number'] = $this->input->post("contact_person_mobile");
		$userinfo['position'] = $this->input->post("contact_person_position");
		$userinfo['profile_image'] = $this->input->post("contact_imgpath");
		$userinfo['created_date'] = date('Y-m-d');
		
		$lastInsertuserinfoId = $this->Account_Model->insertProfileInfo($userinfo);
		/* ************** Storage Implementation *************** */
		$size = filesize(FCPATH."assets/".$userinfo['profile_image']);
		$this->load->library('mylib/StorageLib');
		$storage = array();
		$storage['busi_id'] = $this->session->userdata('busi_id');
		$storage['field'] = 'desksite';
		$storage['datasize'] = round($size/1024,2);
		$this->storagelib->updateStorageByBusiId($storage);
		/* ***************************************************** */
		if($insertcontactid > 0) {
			echo json_encode(array('status'=>1,'msg'=>'Added Successfully.'));
		} else {
			echo json_encode(array('status'=>0,'msg'=>'Fail to Add.'));
		}
	}
	public  function openContact()
	{
		
		$this->load->library('mylib/BusinessLib');
		$busi_id = $this->session->userdata('busi_id');
		$contact = $this->businesslib->getContactperson($busi_id);
		$response = array();
		if(count($contact) > 0) {
			$response['status'] = 0;
			$response['message'] = "Contact Persone Allready Added.";
			$response['title'] = "Message";
		} else {
			$this->template->set ( 'page', 'cntactperson' );
			$this->template->set_theme('default_theme');
			$this->template->set_layout (false)
			->title ( ' Mystation| contactperson' );
			$html = $this->template->build ('register/contactnumberpopup','',true);
			
			$response['status'] = 1;
			$response['message'] = $html;
			$response['title'] = "<strong>ADD A CONTACT PERSON</strong>";
		}
		echo json_encode($response,true);
	}
	
	function termsCondition()
	{
		$type = $this->input->post('type');
		$this->template->set ( 'type', $type);
		$this->template->set ( 'page', 'termscondition' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('default/termscondition');
		//echo $html;
	}
	

function updatePassword() {
	$this->load->model('Account_Model');
	$email				= $_POST['email'];
	$securityCode		= $_POST['securityCode'];
	$securityPassword	= $_POST['securityPassword'];
	$userdetail     	= $this->Account_Model->emailExist($email);
	$emailExist 		= $this->Account_Model->checkSecurityCode($email,$securityCode);
	if($emailExist === false) {
		echo '{"action":"error"}';
		die;
	}
	//update password
	$updatePassword = $this->Account_Model->setValue($userdetail['id'],'password',md5($securityPassword));
	if($updatePassword >= 0) {
		echo '{"action":"success"}';
		die;
	}
	
}
}
  
?>