<?php

class Account_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function getUserSubCategories()
	{
		$this->db->select('*');
		$this->db->from(TABLES::$USER_SUBCATEGORIES);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	
	public function insertIntoUsers($data) {
		if ($this->db->insert(TABLES::$USER, $data)) {
			return $this->db->insert_id();
		}
	}
	
	public function getVerificationCode($userId) {
		$this->db->select('a.*,b.id as cat_id,b.user_category,c.id as subcat_id,c.sub_category');
		$this->db->from(TABLES::$USER. ' AS a');
		$this->db->join(TABLES::$USER_CATEGORIES. '  AS b','a.user_category_id=b.id','inner');
		$this->db->join(TABLES::$USER_SUBCATEGORIES. '  AS c','a.user_subcategory_id =c.id','inner');
		$this->db->where('a.id', $userId);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}
	
	public function emailExist($email) {
		$this->db->select('*');
		$this->db->from(TABLES::$USER);
		$this->db->where('email', $email);
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}
	public function emailExistContactperson($email,$busi_id) {
		$this->db->select('*');
		$this->db->from(TABLES::$USER);
		$this->db->where('email', $email);
		$this->db->where('busi_id !=',$busi_id);
		$this->db->where('user_role !=',3);
		$this->db->where('is_deleted', 0);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
	}
	
	public function loginCheck($email, $pass) {
		$array = array('email' => $email, 'password' => $pass);
		$this->db->select('a.*,b.user_category,c.sub_category,d.profile_image,e.is_disable,e.is_deleted,e.plan_id,e.message_flag');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->join(TABLES::$USER_CATEGORIES. '  AS b','a.user_category_id=b.id','inner');
		$this->db->join(TABLES::$USER_SUBCATEGORIES. '  AS c','a.user_subcategory_id =c.id','inner');
		$this->db->join(TABLES::$USER_INFO. '  AS d','a.id=d.user_id','left');
		$this->db->join(TABLES::$BUSINESS_INFO. '  AS e','a.busi_id=e.id','left');
		$this->db->where($array);
		$this->db->where('a.is_deleted',0);
		$this->db->where('a.is_suspend',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function getUserData($email) {
		$array = array('email' => $email);
		$this->db->select('a.*,b.*,c.sub_category as subcatname');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->where($array);
		$this->db->join(TABLES::$USER_CATEGORIES.' AS b', 'a.user_category_id =  b.id', 'left');
		$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS c', 'a.user_subcategory_id = c.id', 'left');
		$query = $this->db->get();
		return $query->result();
		//echo'<pre>';print_r($query->result());die;
	}
	
	public function insertProfileInfo($data) {
		if ($this->db->insert("tbl_userinfo", $data)) {
			return $this->db->insert_id();
		}
	}
	
	public function updateUser($data) {
		if(!empty($data['id']))
		{
			$this->db->where('id', $data['id']);
		}
		if(!empty($data['busi_id']))
		{
			$this->db->where('busi_id', $data['busi_id']);
		}
		if(!empty($data['user_role']))
		{
			$this->db->where('user_role', $data['user_role']);
		}
		$this->db->update(TABLES::$USER, $data);
		return $this->db->affected_rows();
	}
	
	public function updateUserByBusiId($data) {
		$this->db->where('busi_id', $data['busi_id']);
		return $this->db->update(TABLES::$USER, $data);
	}
	
	public function insertBuisnessInfo($data) {
		if ($this->db->insert("tbl_buisness_info", $data)) {
			$busi_id = $this->db->insert_id();
			$params = array();
			$params['busi_id'] = $busi_id;
			$params['desksite'] = 0;
			$params['files'] = 0;
			$params['udtalk'] = 0;
			$params['products'] = 0;
			$params['community'] = 0;
			$params['offers'] = 0;
			$params['inquiries'] = 0;
			$params['videos'] = 0;
			$params['bstation'] = 0;
			$params['stockmarket'] = 0;
			$params['freespace'] = 0;
			$params['usedspace'] = 0;
			$this->db->insert(TABLES::$MYSTORAGE, $params);
			return $busi_id;
		}
	}
	
	public function insertCompanyInfo($data) {
		if ($this->db->insert("tbl_company_info", $data)) {
			return $this->db->insert_id();
		}
	}
	
	public function insertFactoryInfo($data) {
		if ($this->db->insert("tbl_factory_info", $data)) {
			return $this->db->insert_id();
		}
	}
	
	public function insertTradeInfo($data) {
		if ($this->db->insert("tbl_trade_info", $data)) {
			return $this->db->insert_id();
		}
	}
	
	public function insertCertificateInfo($data) {
		if ($this->db->insert("tbl_certificate_info", $data)) {
			return $this->db->insert_id();
		}
		
	}
	
	public function updateCompanyInfo($id, $data) {
		
		$this->db->where('id', $id);
		$this->db->update('tbl_company_info', $data);
		return $this->db->affected_rows();
	}
	public function getUserSubCategoriesById($id)
	{
		$this->db->select('*');
		$this->db->from(TABLES::$USER_SUBCATEGORIES);
		$this->db->where('id',$id);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function saveRndType($data)
	{
		$this->db->insert_batch(TABLES::$RNDUSERFACTORY,$data);
		
	}
	public function getUserDataById($id)
	{
		//     	$this->db->select('*');
		//     	$this->db->from(TABLES::$USER);
		//     	$this->db->where('id',$id);
		//     	$query = $this->db->get();
		//     	$result = $query->result_array();
		//     	return $result;
		
		
		$this->db->select('a.*,b.user_category,c.sub_category,d.profile_image,e.is_disable,e.is_deleted,e.plan_id');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->join(TABLES::$USER_CATEGORIES. '  AS b','a.user_category_id=b.id','inner');
		$this->db->join(TABLES::$USER_SUBCATEGORIES. '  AS c','a.user_subcategory_id =c.id','inner');
		$this->db->join(TABLES::$USER_INFO. '  AS d','a.id=d.user_id','left');
		$this->db->join(TABLES::$BUSINESS_INFO. '  AS e','a.busi_id=e.id','left');
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public  function saveUserMarket($data)
	{
		$this->db->insert_batch(TABLES::$USERTRADMARKET,$data);
	}
	public  function saveUserInternationaltrad($data)
	{
		$this->db->insert_batch(TABLES::$USERINTERNATIONALTRAD,$data);
	}
	public  function saveUserPaymentTerms($data)
	{
		$this->db->insert_batch(TABLES::$USERPAYMENT_TERMS,$data);
	}
	public  function saveUserPaymentCurrency($data)
	{
		$this->db->insert_batch(TABLES::$USERPAYMENT_CURRENCY,$data);
	}
	public function getUserDataByAfterRegistrationId($id)
	{
		$this->db->select('a.*,b.id as userinfo_id,b.alternative_email,b.country,b.province,b.city,b.street,'.
				'b.mobile_code,b.mobile_number,b.timezone,b.position,b.profile_image,c.user_category,d.sub_category,e.company_name,'.
				'e.company_street,e.company_city,e.company_province,e.company_country,e.license_company_street,e.license_company_city,'.
				'e.plan_upgraded_date,e.expiry_date,e.license_company_province,e.license_company_country,e.license_company_name,e.telephone_code,e.telephone_city_code,'.
				'e.telephone_number,e.telephone_number1,e.fax,e.p_o_box,e.website,e.company_email,e.business_logo,f.contact_person,'.
				'e.license_company_name,e.annual_trad_volume,e.company_rendom_carousel,e.accept_chat,e.accept_offer,e.accept_community,e.accept_email,'.
				'f.year_of_registration,f.company_owner_name,f.company_size,f.total_no_of_emp,f.company_introduction,f.hot_presentation,f.company_bank_account,'.
				'f.company_image1,f.company_image2,f.company_image3,f.company_image4,f.contact_person_flag,f.account_no,'.
				'f.account_name,f.bank_name,f.bank_code,f.bank_address,f.swift_code');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->join(TABLES::$USER_INFO.' AS b', 'b.user_id =  a.id', 'inner');
		$this->db->join(TABLES::$USER_CATEGORIES.' AS c', 'a.user_category_id =  c.id', 'inner');
		$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS d', 'a.user_subcategory_id = d.id', 'inner');
		$this->db->join(TABLES::$BUSINESS_INFO.' AS e', 'a.busi_id = e.id', 'inner');
		$this->db->join(TABLES::$COMPANY_INFO.' AS f', 'a.busi_id = f.busi_id', 'inner');
		$this->db->where('a.id',$id);
		$this->db->where('a.is_deleted',0);
		$this->db->where('a.is_suspend',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	
	public function checkCurrentPassword($data)
	{
		$this->db->select('*');
		$this->db->from(TABLES::$USER);
		$this->db->where('id',$data['id']);
		$this->db->where('text_password',$data['oldpassword']);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function  getUserCategories() {
		$this->db->select('*');
		$this->db->from(TABLES::$USER_CATEGORIES);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getBusinessFactoryInfoById($busi_id)
	{
		$this->db->select('a.*,');
		$this->db->from(TABLES::$FACTORY_INFO.' AS a');
		$this->db->where('a.busi_id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public function getBusinessTradeInfoById($busi_id)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$TRADE_INFO.' AS a');
		$this->db->where('a.busi_id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public function getTradeMarketByTradId($trad_id)
	{
		$this->db->select('a.*,b.name');
		$this->db->from(TABLES::$USERTRADMARKET.' AS a');
		$this->db->join(TABLES::$TRADMARKET.' AS b','a.market_id=b.id','inner');
		$this->db->where('a.trad_id',$trad_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public function getTradeInternationalTradByTradId($trad_id)
	{
		$this->db->select('a.*,b.trade_name');
		$this->db->from(TABLES::$USERINTERNATIONALTRAD.' AS a');
		$this->db->join(TABLES::$INTERNATIONALTRADE.' AS b','a.international_trad_id=b.id','inner');
		$this->db->where('a.trad_id',$trad_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public function getTradePaymentCurrencyByTradId($trad_id)
	{
		$this->db->select('a.*,b.payment_currency');
		$this->db->from(TABLES::$USERPAYMENT_CURRENCY.' AS a');
		$this->db->join(TABLES::$PAYMENTCURRENCY.' AS b','a.payment_currency_id=b.id','inner');
		$this->db->where('a.trad_id',$trad_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public function getTradePaymentTermsByTradId($trad_id)
	{
		$this->db->select('a.*,b.payment_terms');
		$this->db->from(TABLES::$USERPAYMENT_TERMS.' AS a');
		$this->db->join(TABLES::$PAYMENT_TERMS.' AS b','a.payment_terms_id=b.id','inner');
		$this->db->where('a.trad_id',$trad_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public function getBusinessCertificateInfoById($busi_id)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$CERTIFICATE_INFO.' AS a');
		$this->db->where('a.busi_id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	public  function getCertificateType()
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$CERTIFICATE_TYPE.' AS a');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getTradeMarket()
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$TRADMARKET.' AS a');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getInternationalTrad()
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$INTERNATIONALTRADE.' AS a');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getTradePaymentCurrency()
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$PAYMENTCURRENCY.' AS a');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getTradePaymentTerms()
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$PAYMENT_TERMS.' AS a');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getRNDtype()
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$RND_TYPE.' AS a');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getUserRNDtype($fact_id)
	{
		$this->db->select('a.*,b.name');
		$this->db->from(TABLES::$USER_RND_TYPE.' AS a');
		$this->db->join(TABLES::$RND_TYPE.' AS b','a.rnd_type_id=b.id','inner');
		$this->db->where('a.factory_id',$fact_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	function updateUserInformation($data)
	{
		if(!empty($data['id']))
		{
			$this->db->where('id', $data['id']);
		} else {
			$this->db->where('user_id', $data['user_id']);
		}
		$this->db->update(TABLES::$USER_INFO, $data);
		return $this->db->affected_rows();
	}
	function updateBusinessInfo($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update(TABLES::$BUSINESS_INFO, $data);
		return $this->db->affected_rows();
	}
	function updateCompanyInfoByBusiId($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$this->db->update(TABLES::$COMPANY_INFO, $data);
		return $this->db->affected_rows();
	}
	function updateFactoryInfoByBusinessId($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$this->db->update(TABLES::$FACTORY_INFO, $data);
		return $this->db->affected_rows();
	}
	function deleteRNDtypeByFactoryId($data)
	{
		$this->db->where('factory_id', $data['factory_id']);
		$result = $this->db->delete(TABLES::$RNDUSERFACTORY);
		return $result;
	}
	public function updateTradInfoBybusinessId($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$this->db->update(TABLES::$TRADE_INFO, $data);
		return $this->db->affected_rows();
	}
	public function deleteMarketByTradeId($data)
	{
		$this->db->where('trad_id', $data['trad_id']);
		$result = $this->db->delete(TABLES::$USERTRADMARKET);
		return $result;
	}
	public function deleteTradeByTradeId($data)
	{
		$this->db->where('trad_id', $data['trad_id']);
		$result = $this->db->delete(TABLES::$USERINTERNATIONALTRAD);
		return $result;
	}
	public function deletePaymentByTradeId($data)
	{
		$this->db->where('trad_id', $data['trad_id']);
		$result = $this->db->delete(TABLES::$USERPAYMENT_TERMS);
		return $result;
	}
	public function deleteCurrencyByTradeId($data)
	{
		$this->db->where('trad_id', $data['trad_id']);
		$result = $this->db->delete(TABLES::$USERPAYMENT_CURRENCY);
		return $result;
	}
	public function updateCertificateById($data)
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update(TABLES::$CERTIFICATE_INFO, $data);
		return $result;
	}
	
	public function addMoreCertificates($data) {
		$this->db->insert_batch(TABLES::$MORE_CERTIFICATE,$data);
	}
	public function updateMoreCertificateById($data)
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update(TABLES::$MORE_CERTIFICATE, $data);
		return $result;
	}
	public  function getMoreCertificate($busi_id)
	{
		$this->db->select('a.*,b.certificate_type as certificatetype');
		$this->db->from(TABLES::$MORE_CERTIFICATE.' AS a');
		$this->db->join(TABLES::$CERTIFICATE_TYPE.' AS b','b.id=a.certificate_type');
		$this->db->where('a.busi_id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public  function  getSubUserByUserId($userid)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->where('a.admin_user_id',$userid);
		$this->db->where('a.user_role',2);
		//$this->db->where('a.is_suspend',0);
		$this->db->where('a.is_deleted',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public  function  getSubUserById($userid)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->where('a.id',$userid);
		//$this->db->where('a.is_suspend',0);
		//$this->db->where('a.is_deleted',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function deleteCertificateType($busi_id,$string)
	{
		$this->db->where('busi_id', $busi_id);
		$this->db->where("id NOT IN ($string)");
		$result = $this->db->delete(TABLES::$MORE_CERTIFICATE);
		return $result;
	}
	
	public function addMoreBranches($data) {
		$this->db->insert_batch(TABLES::$BUSINESS_BRANCHES,$data);
	}
	public function getBusinessRoutes($busi_id)
	{
		$this->db->select("a.*,IFNULL(b.name,'Worldwide') as from_country,IFNULL(c.name,'Worldwide') as to_country");
    	$this->db->from(TABLES::$BUSINESSROUTE.' AS a');
    	$this->db->join(TABLES::$COUNTRY.' AS b','a.from_country_id=b.id','left');
    	$this->db->join(TABLES::$COUNTRY.' AS c','a.to_country_id=c.id','left');
    	$this->db->where('a.busi_id', $busi_id);
    	$this->db->order_by('a.created_date');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
	}
	
	public function insertBusinessRoutes($route)
	{
		if( $this->db->insert(TABLES::$BUSINESSROUTE,$route) ) {
			return $this->db->insert_id();
		}
	}
	public function deleteBusinessRoutes($busi_id)
	{
		$this->db->where('busi_id', $busi_id);
		$result = $this->db->delete(TABLES::$BUSINESSROUTE);
		return $result;
	}
	public function updateBusinessRoutes($route)
	{
		$this->db->where('busi_id', $route['busi_id']);
		$result = $this->db->update(TABLES::$BUSINESSROUTE, $route);
		return $result;
	}
	public function getTradePaymentTermsByBusinessId($busi_id)
	{
		$this->db->select('a.*,b.payment_terms');
		$this->db->from(TABLES::$USERPAYMENT_TERMS.' AS a');
		$this->db->join(TABLES::$PAYMENT_TERMS.' AS b','a.payment_terms_id=b.id','inner');
		$this->db->where('a.busi_id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function deletePaymentByBusinessId($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$result = $this->db->delete(TABLES::$USERPAYMENT_TERMS);
		return $result;
	}
	public function insertIntoContactPersone($data)
	{
		if( $this->db->insert(TABLES::$CONTACTPERSON,$data) ) {
			return $this->db->insert_id();
		}
	}
	public function getContactperson($busi_id)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$CONTACTPERSON.' AS a');
		$this->db->where('a.busi_id',$busi_id);
		$this->db->where('a.is_deleted',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function updateBusinessContact($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$result = $this->db->update(TABLES::$CONTACTPERSON,$data);
		return $result;
	}
	public function getBusinessBranches($busi_id)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$BUSINESS_BRANCHES.' AS a');
		$this->db->where('a.busi_id',$busi_id);
		$this->db->where('a.is_deleted',0);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function updateBusinessBranch($data)
	{
		$this->db->where('id', $data['id']);
		$result = $this->db->update(TABLES::$BUSINESS_BRANCHES, $data);
		return $result;
	}
	
	function getBusinessInfo($busi_id)
	{
		$this->db->select('a.*,b.name as plan_name');
		$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
		$this->db->join(TABLES::$SUBSCRIPTION_PLAN.' AS b','a.plan_id=b.id','inner');
		$this->db->where('a.id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	function getGauranteeTerms()
	{
		$this->db->select('*');
		$this->db->from(TABLES::$GAURANTEE_TERMS);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function updateBusinessImages($data) {
		$this->db->select('*');
		$this->db->from(TABLES::$BUSINESS_INFO_IMAGE);
		$this->db->where('busi_id',$data['busi_id']);
		$query = $this->db->get();
		$result = $query->result_array();
		if(count($result) <= 0) {
			return $this->db->insert(TABLES::$BUSINESS_INFO_IMAGE, $data);
		} else {
			$this->db->where('busi_id',$data['busi_id']);
			return $this->db->update(TABLES::$BUSINESS_INFO_IMAGE, $data);
		}
	}
	
	public function getBackgroundImages($busi_id) {
		$this->db->select('*');
		$this->db->from(TABLES::$BUSINESS_INFO_IMAGE);
		$this->db->where('busi_id',$busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getProductCategories()
	{
		$this->db->select('*');
		$this->db->from(TABLES::$PRODUCT_MAIN_CATEGORY);
		$this->db->order_by ( "name", "asc" );
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getProductSubCategories()
	{
		$this->db->select('*');
		$this->db->from(TABLES::$PRODUCT_SUB_CATEGORY);
		$this->db->order_by ( "name", "asc" );
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getDesksites()
	{
		$this->db->select('a.*, b.desksite_bg1, b.desksite_bg2, c.company_introduction,CONCAT(p.name) as product_name');
		$this->db->from(TABLES::$BUSINESS_INFO.' as a');
		$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' as b', 'a.id = b.busi_id', 'left');
		$this->db->join(TABLES::$COMPANY_INFO.' as c', 'a.id = c.busi_id', 'left');
		$this->db->join(TABLES::$PRODUCT_ITEM.' as p', 'a.id = p.busi_id', 'left');
		$this->db->order_by('a.plan_id',"desc");
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function get3DProducts()
	{
		$this->db->select('a.*, b.name,b.unit_price,b.model_no,b.quantity,b.unit,b.main_image,b.about,b.description,c.company_name , c.company_country , c.company_province, c.gaurantee_period, c.plan_id, c.is_logo_verified, c.rank');
		$this->db->from(TABLES::$MY_3DPRODUCT.' as a');
		//$this->db->from(TABLES::$FEATURED_3DPRODUCT.' as a');
		$this->db->join(TABLES::$PRODUCT_ITEM.' as b', 'b.id = a.product_id', 'left');
		$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = a.busi_id', 'left');
		$this->db->where('c.plan_id !=', 1);
		$this->db->order_by('c.plan_id',"desc");
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getVCatalogue()
	{
		$this->db->select('b.*,  c.company_name , c.company_country , c.company_province, c.gaurantee_period, c.plan_id, c.is_logo_verified, c.rank ');
		//$this->db->from(TABLES::$FEATURED_CATALOGUE.' as a');
		$this->db->from(TABLES::$PRODUCT_CATALOGUE.' as b'/* , 'b.id = a.catalogue_id', 'left'*/);
		$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = b.busi_id', 'left');
		$this->db->where('b.status', 1);
		$this->db->where('c.plan_id !=', 1);
		$this->db->order_by('c.plan_id',"desc");
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getFeaturedProduct()
	{
		$this->db->select('b.*, c.company_name , c.company_country , c.company_province, c.gaurantee_period, c.plan_id, c.is_logo_verified, c.rank');
		//$this->db->from(TABLES::$FEATURED_PRODUCT.' as a');
		$this->db->from(TABLES::$PRODUCT_ITEM.' as b'/*, ' b.id = a.item_id ', 'left'*/);
		$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = b.busi_id', 'left');
		//$this->db->where ( 'NOW() BETWEEN a.from_date AND a.to_date');
		//$this->db->where('a.status', 1);
		$this->db->where('c.plan_id !=', 1);
		$this->db->order_by('c.plan_id',"desc");
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getFeaturedProductVideo()
	{
		$this->db->select('b.*,c.*, d.company_name , d.company_country , d.company_province, d.gaurantee_period, d.plan_id, d.is_logo_verified, d.rank');
		//$this->db->from(TABLES::$FEATURED_PRODUCT_VIDEO.' as a');
		$this->db->from(TABLES::$PRODUCT_VIDEO.' as c'/*, ' c.id = a.video_id ', 'left'*/);
		$this->db->join(TABLES::$PRODUCT_ITEM.' as b', ' b.id = c.product_item_id ', 'left');
		$this->db->join(TABLES::$BUSINESS_INFO.' as d' , 'd.id = c.busi_id', 'left');
		//$this->db->where ( 'NOW() BETWEEN a.from_date AND a.to_date');
		//$this->db->where('a.status', 1);
		$this->db->where('d.plan_id !=', 1);
		$this->db->order_by('d.plan_id',"desc");
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getFeaturedWorldSeller()
	{
		$this->db->select('f.id, b.company_country, b.company_province, d.company_owner_name, d.company_introduction, d.contact_person, e.name as contact_person_name, e.picture, e.position,i.flag,f.busi_id,a.name as product_name');
		//$this->db->from(TABLES::$FEATURED_WORLD_SELLER.' as a');
		$this->db->from(TABLES::$USER.' AS f'/*, 'b.id= f.busi_id', 'left'*/);
		$this->db->join(TABLES::$BUSINESS_INFO.' as b', 'f.busi_id = b.id', 'left');
		$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' as c', 'b.id = c.busi_id', 'left');
		$this->db->join(TABLES::$COMPANY_INFO.' as d', 'b.id = d.busi_id', 'left');
		$this->db->join(TABLES::$CONTACTPERSON.' as e', 'b.id = e.busi_id', 'left');
		$this->db->join(TABLES::$COUNTRY.' AS i','b.company_country=i.name','left');
		$this->db->join(TABLES::$PRODUCT_ITEM.' as a', 'b.id = a.busi_id', 'left');
		//$this->db->where ( 'NOW() BETWEEN a.start_date AND a.end_date');
		$this->db->where('f.user_category_id', 1);
		//$this->db->where('b.is_logo_verified', 1);
		$this->db->where('b.is_disable', 0);
		$this->db->where('b.is_deleted', 0);
		//$this->db->where('a.status', 1);
		$this->db->order_by('b.plan_id',"desc");
		$this->db->group_by('f.busi_id');
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getFeaturedWorldBuyer()
	{
		$this->db->select('f.id, b.company_country, b.company_province, d.company_owner_name, d.company_introduction, d.contact_person, e.name as contact_person_name, e.picture, e.position,f.busi_id,i.flag,a.name as product_name');
		//$this->db->from(TABLES::$FEATURED_WORLD_BUYER.' as a');
		$this->db->from(TABLES::$USER.' AS f'/*, 'b.id= f.busi_id', 'left'*/);
		$this->db->join(TABLES::$BUSINESS_INFO.' as b', 'f.busi_id = b.id', 'left');
		$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' as c', 'b.id = c.busi_id', 'left');
		$this->db->join(TABLES::$COMPANY_INFO.' as d', 'b.id = d.busi_id', 'left');
		$this->db->join(TABLES::$CONTACTPERSON.' as e', 'b.id = e.busi_id', 'left');
		$this->db->join(TABLES::$COUNTRY.' AS i','b.company_country=i.name','left');
		$this->db->join(TABLES::$PRODUCT_ITEM.' as a', 'b.id = a.busi_id', 'left');
		//$this->db->join(TABLES::$USER.' AS f', 'b.id= f.busi_id', 'left');
		//$this->db->where ( 'NOW() BETWEEN a.from_date AND a.to_date');
		$this->db->where('f.user_category_id', 3);
		//$this->db->where('b.is_logo_verified', 1);
		$this->db->where('b.is_disable', 0);
		$this->db->where('b.is_deleted', 0);
		//$this->db->where('a.status', 1);
		$this->db->order_by('b.plan_id',"desc");
		$this->db->group_by('f.busi_id');
		$this->db->limit(12);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	public function getNewArrival()
	{
		$this->db->select('a.*, b.id, b.company_country, b.company_province, c.name, c.description, c.main_image ');
		$this->db->from(TABLES::$NEW_ARRIVAL_PRODUCT.' as a');
		$this->db->join(TABLES::$BUSINESS_INFO.' as b', 'a.busi_id = b.id', 'left');
		$this->db->join(TABLES::$PRODUCT_ITEM.' as c', 'c.id = a.item_id', 'left');
		$this->db->where('b.is_disable', 0);
		$this->db->where('b.is_deleted', 0);
		$this->db->order_by ( "a.created_date", "desc" );
		$this->db->group_by('a.id');
		//$this->db->limit(3);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	
	public function getNewOrder()
	{
		$this->db->select('a.*, c.name, c.description, c.main_image');
		$this->db->from(TABLES::$ORDER_ITEM.' as a');
		$this->db->join(TABLES::$ORDER.' as b', 'a.order_id = b.orderid', 'left');
		$this->db->join(TABLES::$PRODUCT_ITEM.' as c', 'a.item_id = c.id', 'left');
		$this->db->order_by ( "b.orderid", "desc" );
		$this->db->group_by('a.id');
		//$this->db->limit(3);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	
	public function getWebsiteImage() {
		$this->db->select('*');
		$this->db->from(TABLES::$BUSINESS_INFO.' as a');
		$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' as b', 'a.id =b.busi_id');
		$this->db->where('a.is_disable', 0);
		$this->db->where('a.is_deleted', 0);
		$this->db->limit(6);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getCountry() {
		$this->db->select('*');
		$this->db->from(TABLES::$COUNTRY);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function getHomeBannerAds(){
		$this->db->select('*');
		$this->db->from(TABLES::$MAIN_SCREEN_ADS);
		$this->db->where ( 'NOW() BETWEEN from_date AND to_date');
		$this->db->where('status', 1);
		$this->db->order_by('amount');
		$this->db->limit(6);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function getBannerAdById($id){
		$this->db->select('a.*, b.vedio_file,b.vedio_size,b.video_likes,b.id as video_id, c.name as product_name, c.unit_price, c.quantity,c.unit,c.about, c.description,c.id as product_item_id');
		$this->db->from(TABLES::$MAIN_SCREEN_ADS.' as a');
		$this->db->join(TABLES::$PRODUCT_VIDEO.' as b', 'a.video_id = b.id', 'left' );
		$this->db->join(TABLES::$PRODUCT_ITEM.' as c', 'b.product_item_id = c.id', 'inner' );
		$this->db->where ( 'NOW() BETWEEN from_date AND to_date');
		$this->db->where('a.id', $id);
		$this->db->where('a.status', 1);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public  function getPersonalInfoByBusiId($busi_id)
	{
		$this->db->select('a.id,a.name_prefix,a.name,b.country,b.province,b.city,b.street,b.position');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->join(TABLES::$USER_INFO.' AS b','a.id=b.user_id','inner');
		$this->db->where('a.admin_user_id', 0);
		$this->db->where('a.busi_id', $busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public  function getBusinessInfoByBusiId($busi_id)
	{
		$this->db->select('a.id,a.company_name,b.company_owner_name,b.company_introduction,b.hot_presentation,c.fact_province,c.fact_city,c.fact_street,'.'
		d.part1,d.part2,d.part3,e.scope');
		$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
		$this->db->join(TABLES::$COMPANY_INFO.' AS b','a.id=b.busi_id','inner');
		$this->db->join(TABLES::$FACTORY_INFO.' AS c','a.id=c.busi_id','left');
		$this->db->join(TABLES::$TRADE_INFO.' AS d','a.id=d.busi_id','left');
		$this->db->join(TABLES::$CERTIFICATE_INFO.' AS e','a.id=e.busi_id','left');
		$this->db->where('a.id', $busi_id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function addCertFiles($data) {
		return $this->db->insert_batch(TABLES::$BUYER_VERIFY_DOCS,$data);
	}
	
	function getUserByBusiIdAndUserRole($data)
	{
		$this->db->select('a.*');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->where('a.user_role', $data['user_role']);
		$this->db->where('a.busi_id', $data['busi_id']);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
		
	}
	function deleteUser($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$this->db->where('user_role', $data['user_role']);
		$result = $this->db->delete(TABLES::$USER);
		return $result;
	}
	function deleteUserInfo($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$result = $this->db->delete(TABLES::$USER_INFO);
		return $result;
	}
	public function deleteBusinessContact($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$result = $this->db->delete(TABLES::$CONTACTPERSON);
		return $result;
	}
	public function deleteBusinessBranch($data)
	{
		$this->db->where('busi_id', $data['busi_id']);
		$result = $this->db->delete(TABLES::$BUSINESS_BRANCHES);
		return $result;
	}
	function getContactPersonByBusiId($data)
	{
		$this->db->select('*');
		$this->db->from(TABLES::$CONTACTPERSON);
		$this->db->where('busi_id',$data['busi_id']);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	public function getBusinessContactDetails($busi_id) {
		$this->db->select('a.id,a.company_name,a.company_country,a.company_province,a.company_city,a.accept_chat,a.accept_offer,a.accept_community,a.accept_email,a.plan_id,b.name_prefix,b.name,b.email,b.account_activated,b.user_category_id,c.mobile_number,d.step');
		$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
		$this->db->join(TABLES::$USER.' AS b','a.id=b.busi_id','left');
		$this->db->join(TABLES::$USER_INFO.' AS c','b.id=c.user_id','left');
		$this->db->join(TABLES::$PRODUCT_STAGE.' AS d','a.id=d.busi_id','left');
		$this->db->where('a.id',$busi_id);
		$this->db->where('b.is_suspend',0);
		$this->db->where('b.is_deleted',0);
		$this->db->where('b.is_contactperson',1);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function getUserDataByBusiId($busi_id) {
		//$array = array('busi_id' => $busi_id);
		//$this->db->select('a.*,b.*,c.sub_category as subcatname');
		$this->db->select('a.*');
		$this->db->from(TABLES::$USER.' AS a');
		$this->db->where('a.busi_id', $busi_id);
		//$this->db->join(TABLES::$USER_CATEGORIES.' AS b', 'a.user_category_id =  b.id', 'left');
		//$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS c', 'a.user_subcategory_id = c.id', 'left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row;
		}
		//echo'<pre>';print_r($query->result());die;
  }
	/**
	* function to check activation code of the user
	*/
	public function checkSecurityCode($email, $securityCode) {
		$this->db->select('*');
		$this->db->from(TABLES::$USER);
		$this->db->where('email', $email);
		$this->db->where('activation_code', $securityCode);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	public function getValue(){echo "get value";}
	
	/**
	* function to set value to column
	*/
	public function setValue($id,$col,$val) {
		$data = array();
		$data[$col] = $val;

		if(!is_numeric($id)) {
			return false;
		}
		if(!empty($id)) {
			$this->db->where('id', $id);
		}
		$this->db->update(TABLES::$USER, $data);
		return $this->db->affected_rows();
	}
 
}
