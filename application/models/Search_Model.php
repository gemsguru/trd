<?php

class Search_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    public function searchBusinessCountry($type,$country, $keyword){
    	$country = trim($country[1]);
    	//$where = '( a.name like "%'+$keyword+'%" OR b.company_name like "%'+$keyword+'%")';
    	$this->db->select('a.id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role, b.company_name,
		b.company_country, b.company_province, b.company_email, b.business_logo, b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified, b.rank,b.accept_chat,  g.*, 
		c.user_id, c.alternative_email, c.mobile_number,c.position, c.profile_image, d.*, e.*, f.company_owner_name, f.company_introduction, f.contact_person, f.contact_person_flag,
 		 GROUP_CONCAT(h.name SEPARATOR ",") as main_product');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS d','a.user_category_id=d.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS e','a.user_subcategory_id=e.id','left');
    	$this->db->join(TABLES::$COMPANY_INFO.' AS f','b.id=f.busi_id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS h ','b.id = h.busi_id ','left');
    	$this->db->where('d.id', $type);
    	$this->db->where("c.country like '%".$country."%'",'',false);
    	$this->db->where("(a.name like '%".$keyword."%' OR b.company_name like '%".$keyword."%')",'',false);
    	$this->db->where('a.account_activated', 1);
    	$this->db->where('a.is_suspend', 0);
    	$this->db->where('a.is_deleted', 0);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id'); 
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    public function searchBusiness($type,$keyword){
    	
    	$this->db->select('a.id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role, b.company_name,
		b.company_country, b.company_province, b.company_email, b.business_logo, b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified, b.rank,b.accept_chat,  g.*, 
		c.user_id, c.alternative_email, c.mobile_number,c.position, c.profile_image, d.*, e.*, f.company_owner_name, f.company_introduction, f.contact_person, f.contact_person_flag,
 		 GROUP_CONCAT(h.name SEPARATOR ",") as main_product');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS d','a.user_category_id=d.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS e','a.user_subcategory_id=e.id','left');
    	$this->db->join(TABLES::$COMPANY_INFO.' AS f','b.id=f.busi_id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS h ','b.id = h.busi_id ','left');
    	$this->db->where('d.id', $type);
    	$this->db->where('a.account_activated', 1);
    	$this->db->where("(a.name like '%".$keyword."%' OR b.company_name like '%".$keyword."%')",'',false);
    	$this->db->where('a.is_suspend', 0);
    	$this->db->where('a.is_deleted', 0);
    	$this->db->group_by('a.id'); 
    	$this->db->order_by('a.created_date','DESC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
    public function searchProductCountry($country, $keyword){
    	$where = '(a.name like "%'.$keyword.'%" or a.description like "%'.$keyword.'%" or b.spec_name like "%'.$keyword.'%"  or b.spec_value  like "%'.$keyword.'%" )';
    	
    	$this->db->select('a.*, c.company_name, c.company_country, c.company_province, c.company_email, c.business_logo, c.annual_trad_volume, c.plan_id, c.gaurantee_period, c.is_logo_verified, c.rank,c.accept_chat,  g.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$PRODUCT_ITEM_SPEC.' AS b','a.id=b.item_id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS c','a.busi_id=c.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->where('a.status', 1);
    	$this->db->where('a.country_id', $country[0]);
    	$this->db->where($where, '', false);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    public function searchProduct($keyword){
    	$where = '(a.name like "%'.$keyword.'%" or a.description like "%'.$keyword.'%" or b.spec_name like "%'.$keyword.'%"  or b.spec_value  like "%'.$keyword.'%" )';
    	$this->db->select('a.*, c.company_name, c.company_country, c.company_province, c.company_email, c.business_logo, c.annual_trad_volume, c.plan_id, c.gaurantee_period, c.is_logo_verified, c.rank,c.accept_chat,  g.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$PRODUCT_ITEM_SPEC.' AS b','a.id=b.item_id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS c','a.busi_id=c.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->where('a.status', 1);
    	$this->db->where($where, '', false);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
    public function searchProductByBusiId($keyword, $busi_id){
    	$where = '(a.name like "%'.$keyword.'%" or a.description like "%'.$keyword.'%" or b.spec_name like "%'.$keyword.'%"  or b.spec_value  like "%'.$keyword.'%" )';
    	$this->db->select('a.*, c.company_name, c.company_country, c.company_province, c.company_email, c.business_logo, c.annual_trad_volume, c.plan_id, c.gaurantee_period, c.is_logo_verified, c.rank,c.accept_chat,  g.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$PRODUCT_ITEM_SPEC.' AS b','a.id=b.item_id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS c','a.busi_id=c.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->where('a.status', 1);
    	$this->db->where('a.busi_id', $busi_id);
    	$this->db->where($where, '', false);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
}