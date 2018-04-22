<?php

class Product_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getAllCountries() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$COUNTRY);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function addProductStage($data) {
    	$this->db->insert(TABLES::$PRODUCT_STAGE, $data);
    }
    
    public function updateProductStage($data) {
    	$mystage = $this->getProductStage($data['busi_id']);
    	if(count($mystage) > 0) {
	    	$this->db->where('busi_id',$data['busi_id']);
	    	return $this->db->update(TABLES::$PRODUCT_STAGE, $data);
    	} else {
    		return $this->db->insert(TABLES::$PRODUCT_STAGE, $data);
    	}
    }
    
    public function getProductStage($busi_id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_STAGE);
    	$this->db->where('busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function addMainCategory($data) {
    	$this->db->insert(TABLES::$PRODUCT_MAIN_CATEGORY, $data);
    	return $this->db->insert_id();
    }
    
    public function updateMainCategory($data) {
    	$this->db->where('id',$data['id']);
    	return $this->db->update(TABLES::$PRODUCT_MAIN_CATEGORY, $data);
    }
    
    public function getProductMainCategories() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_MAIN_CATEGORY);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getActiveProductMainCategories() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_MAIN_CATEGORY);
    	$this->db->where('status',1);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }

    public function getProductMainCategoryById($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_MAIN_CATEGORY);
    	$this->db->where('id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
	public function addSubCategory($data) {
    	$this->db->insert(TABLES::$PRODUCT_SUB_CATEGORY, $data);
    	return $this->db->insert_id();
    }
    
    public function updateSubCategory($data) {
    	$this->db->where('id',$data['id']);
    	return $this->db->update(TABLES::$PRODUCT_SUB_CATEGORY, $data);
    }
    
    public function getProductSubCategories() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_SUB_CATEGORY);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getActiveProductSubCategories() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_SUB_CATEGORY);
    	$this->db->where('status',1);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }

    public function getProductSubCategoryById($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_SUB_CATEGORY);
    	$this->db->where('id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getActiveProductMainAndSubCategories() {
    	$this->db->select('a.id as mcat_id,a.name as mcat_name,b.id as scat_id,b.name as scat_name');
    	$this->db->from(TABLES::$PRODUCT_MAIN_CATEGORY.' AS a');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY.' AS b','a.id=b.mcat_id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('b.status',1);
    	$this->db->order_by('a.name','ASC');
    	$this->db->order_by('b.name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$cats = array();
    	$scats = array();
    	$maincat_arr = array();
    	$mcat_id = 0;
    	foreach ($result as $mcat) {
    		if($mcat_id != 0 && $mcat_id != $mcat['mcat_id']) {
    			$maincat_arr['subcats'] = $scats;
    			$cats[] = $maincat_arr;
    			$scats = array();
    			$maincat_arr = array();
    		}
    		$maincat_arr['id'] = $mcat['mcat_id'];
    		$maincat_arr['name'] = $mcat['mcat_name'];
    		$subcat_arr = array();
    		$subcat_arr['id'] = $mcat['scat_id'];
    		$subcat_arr['name'] = $mcat['scat_name'];
    		$scats[] = $subcat_arr;
    		$mcat_id = $mcat['mcat_id'];
    	}
    	$maincat_arr['subcats'] = $scats;
    	$cats[] = $maincat_arr;
    	return $cats;
    }
    
    public function addMainProduct($data) {
    	$this->db->select('id');
    	$this->db->from(TABLES::$MAIN_PRODUCT);
    	$this->db->where('status',1);
    	$this->db->where('busi_id',$data['busi_id']);
    	$this->db->where('name',$data['name']);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	if(count($result) <= 0) {
    		$this->db->insert(TABLES::$MAIN_PRODUCT, $data);
    		return $this->db->insert_id();
    	} else {
    		return 0;
    	}
    }
    
    public function addBulkMainProduct($data) {
    	return $this->db->insert_batch(TABLES::$MAIN_PRODUCT, $data);
    }
    
    public function updateMainProduct($data) {
    	$this->db->where('id',$data['id']);
    	return $this->db->update(TABLES::$MAIN_PRODUCT, $data);
    }
    
    public function getMainProducts($busi_id) {
    	$this->db->select('a.*,b.name as scat_name');
    	$this->db->from(TABLES::$MAIN_PRODUCT.' AS a');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY.' AS b','a.subcat_id=b.id');
    	$this->db->where('a.status',1);
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->order_by('a.sortorder','DESC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getMaxMainProductOrder($busi_id) {
    	$this->db->select('max(sortorder) as sortorder');
    	$this->db->from(TABLES::$MAIN_PRODUCT);
    	$this->db->where('status',1);
    	$this->db->where('busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getMainProductBySortorder($busi_id,$sortorder) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$MAIN_PRODUCT);
    	$this->db->where('sortorder',$sortorder);
    	$this->db->where('busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function addSubProduct($data) {
    	$this->db->insert(TABLES::$SUB_PRODUCT, $data);
    	return $this->db->insert_id();
    }
    
    public function addBulkSubProduct($data) {
    	return $this->db->insert_batch(TABLES::$SUB_PRODUCT, $data);
    }
    
    public function updateSubProduct($data) {
    	$this->db->where('id',$data['id']);
    	return $this->db->update(TABLES::$SUB_PRODUCT, $data);
    }
    
    public function deleteSubProduct($id) {
    	$data['status'] = 0;
    	$this->db->where('id IN('.$id.')','',false);
    	return $this->db->update(TABLES::$SUB_PRODUCT,$data);
    }
    
    public function getSubProducts() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$SUB_PRODUCT);
    	$this->db->where('status',1);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getActiveSubProducts($busi_id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$SUB_PRODUCT.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS b','a.mproduct_id=b.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('b.busi_id',$busi_id);
    	$this->db->order_by('a.mproduct_id','ASC');
    	$this->db->order_by('a.sortorder','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getSubProductBySortorder($busi_id,$osortorder) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$SUB_PRODUCT.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS b','a.mproduct_id=b.id','inner');
    	$this->db->where('a.sortorder',$osortorder);
    	$this->db->where('b.busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getSubProductBySortorderAndMid($busi_id,$osortorder,$mid) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$SUB_PRODUCT.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS b','a.mproduct_id=b.id','inner');
    	$this->db->where('a.sortorder',$osortorder);
    	$this->db->where('a.mproduct_id',$mid);
    	$this->db->where('b.busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getSubProductMaxOrder($busi_id,$mid) {
    	$this->db->select('max(a.sortorder) as sortorder');
    	$this->db->from(TABLES::$SUB_PRODUCT.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS b','a.mproduct_id=b.id','inner');
    	$this->db->where('a.mproduct_id',$mid);
    	$this->db->where('b.busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getSubProductMinOrder($busi_id,$mid) {
    	$this->db->select('min(a.sortorder) as sortorder');
    	$this->db->from(TABLES::$SUB_PRODUCT.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS b','a.mproduct_id=b.id','inner');
    	$this->db->where('a.mproduct_id',$mid);
    	$this->db->where('b.busi_id',$busi_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getActiveProductAndSubProduct($busi_id) {
    	$this->db->select('a.busi_id,a.id as mproduct_id,a.name as mproduct_name,a.subcat_id,b.id as sproduct_id,b.name as sproduct_name,b.sortorder');
    	$this->db->from(TABLES::$MAIN_PRODUCT.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.id=b.mproduct_id','left');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->order_by('a.id','ASC');
    	$this->db->order_by('a.sortorder','ASC');
    	$this->db->order_by('b.sortorder','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$cats = array();
    	$scats = array();
    	$maincat_arr = array();
    	$mcat_id = 0;
    	foreach ($result as $mcat) {
    		if($mcat_id != 0 && $mcat_id != $mcat['mproduct_id']) {
    			$maincat_arr['subproducts'] = $scats;
    			$cats[] = $maincat_arr;
    			$scats = array();
    			$maincat_arr = array();
    		}
    		$maincat_arr['id'] = $mcat['mproduct_id'];
    		$maincat_arr['busi_id'] = $mcat['busi_id'];
    		$maincat_arr['name'] = $mcat['mproduct_name'];
    		$subcat_arr = array();
    		if(!empty($mcat['sproduct_id'])) {
	    		$subcat_arr['id'] = $mcat['sproduct_id'];
	    		$subcat_arr['name'] = $mcat['sproduct_name'];
	    		$scats[] = $subcat_arr;
    		}
    		$mcat_id = $mcat['mproduct_id'];
    	}
    	$maincat_arr['subproducts'] = $scats;
    	$cats[] = $maincat_arr;
    	return $cats;
    }
    
    public function addProductItem($data) {
    	$this->db->insert(TABLES::$PRODUCT_ITEM, $data);
    	return $this->db->insert_id();
    }
    
    public function updateProductItem($data) {
    	$this->db->where('id',$data['id']);
    	return $this->db->update(TABLES::$PRODUCT_ITEM, $data);
    }
    
    public function deleteProductItem($item_ids) {
    	$data['status'] = 0;
    	$this->db->where('id IN('.$item_ids.')','',false);
    	return $this->db->update(TABLES::$PRODUCT_ITEM,$data);
    }
    
    public function getProductItems() {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id=b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','b.mproduct_id=c.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function addProductItemColor($data) {
    	return $this->db->insert_batch(TABLES::$PRODUCT_ITEM_COLOR, $data);
    }
    
    public function addProductItemSpec($data) {
    	return $this->db->insert_batch(TABLES::$PRODUCT_ITEM_SPEC, $data);
    }
    
    public function getActiveProductItems($busi_id) {
    	$this->db->select('a.id,a.name,a.model_no,a.unit_price,a.quantity,a.unit,a.description,a.about,a.main_image,b.name as subproduct,b.id as sproduct_id,c.name as mainproduct,c.id as mproduct_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id=b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','a.mproduct_id=c.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->order_by('a.name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function searchActiveProductItems($params) {
    	$this->db->select('a.id,a.name,a.model_no,a.unit_price,a.quantity,a.unit,a.description,a.about,a.main_image,b.name as subproduct,'.
    								'a.sub_image1,a.sub_image2,a.sub_image3,a.sub_image4,b.id as sproduct_id,c.name as mainproduct,c.id as mproduct_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','a.mproduct_id = c.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('a.busi_id',$params['busi_id']);
    	if(!empty($params['sproduct_id']))
    		$this->db->where('a.sproduct_id',$params['sproduct_id']);
    	if(!empty($params['mproduct_id']))
    		$this->db->where('a.mproduct_id',$params['mproduct_id']);
    	if(!empty($params['name'])) {
    		$this->db->where("(a.name like '%".$params['name']."%' OR a.model_no like '%".$params['name']."%')",'',false);
    	}
    	$this->db->order_by('a.name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
    public function getProductItemById($id) {
    	$this->db->select('a.*,b.name as subproduct,c.name as mainproduct');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id=b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','a.mproduct_id=c.id','inner');
    	$this->db->where('a.id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getProductColors($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_ITEM_COLOR);
    	$this->db->where('item_id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getProductSpecs($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_ITEM_SPEC);
    	$this->db->where('item_id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function deleteProductItemColor($item_id) {
    	$this->db->where('item_id',$item_id);
    	$this->db->delete(TABLES::$PRODUCT_ITEM_COLOR);
    }
    
    public function deleteProductItemSpec($item_id) {
    	$this->db->where('item_id',$item_id);
    	$this->db->delete(TABLES::$PRODUCT_ITEM_SPEC);
    }
    
    public function deleteMainProduct($item_ids) {
    	$data['status'] = 0;
    	$this->db->where('id IN('.$item_ids.')','',false);
    	return $this->db->update(TABLES::$MAIN_PRODUCT,$data);
    }
    
    public function addToHotSale($data) {
    	return $this->db->insert_batch(TABLES::$HOTSALE_PRODUCTS, $data);
    }
    
    public function deleteToHotSale($params) {
    	$this->db->where('busi_id',$params['busi_id']);
    	$this->db->where('item_id IN('.$params['item_id'].')','',false);
    	return $this->db->delete(TABLES::$HOTSALE_PRODUCTS);
    }
    
    public function addToNewArrival($data) {
    	return $this->db->insert_batch(TABLES::$NEW_ARRIVAL_PRODUCT, $data);
    }
    
    public function deleteToNewArrival($params) {
    	$this->db->where('busi_id',$params['busi_id']);
    	$this->db->where('item_id IN('.$params['item_id'].')','',false);
    	return $this->db->delete(TABLES::$NEW_ARRIVAL_PRODUCT);
    }
    
    public function getHoteSaleMenu($busi_id) {
    	$this->db->select('a.id,a.name,a.model_no,a.unit_price,a.quantity,a.unit,a.description,a.main_image,b.name as subproduct,b.id as sproduct_id,c.name as mainproduct,c.id as mproduct_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id=b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$HOTSALE_PRODUCTS.' AS d','d.item_id=a.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('d.busi_id',$busi_id);
    	$this->db->order_by('a.name','ASC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getNewArrivals($busi_id) {
    	$this->db->select('a.id,a.name,a.model_no,a.unit_price,a.quantity,a.unit,a.description,a.main_image,b.name as subproduct,b.id as sproduct_id,c.name as mainproduct,c.id as mproduct_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id=b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$NEW_ARRIVAL_PRODUCT.' AS d','d.item_id=a.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('d.busi_id',$busi_id);
    	$this->db->order_by('a.name','ASC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getProductByName($params)
    {
    	
    		$this->db->select('id,name,model_no,main_image');
    		$this->db->from(TABLES::$PRODUCT_ITEM);
    		if(isset($params['name'])) {
    			$this->db->where("name LIKE '".$params['name']."%' and status=1",'',FALSE);
    		}
    		if(isset($params['model_no'])) {
    			$this->db->or_where("model_no LIKE '".$params['model_no']."%' and status=1",'',FALSE);
    		}
    		$this->db->order_by('id','ASC');
    		$query = $this->db->get();
    		$result = $query->result_array();
    		return $result;
    }
    public function save3DProduct($params)
    {
    	if ($this->db->insert(TABLES::$MY_3DPRODUCT, $params)) {
    		return $this->db->insert_id();
    	}
    
    }
    public function save3DProductImages($params)
    {
    	if ($this->db->insert(TABLES::$PRODUCT_3DPRODUCT, $params)) {
    		return $this->db->insert_id();
    	}
    
    }
    public function getProductdataById($product_id)
    {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_ITEM);
    	$this->db->where('id',$product_id);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    
    }
    public function getProduct3DdataById($product_id)
    {
    	$this->db->select('a.*,d.id as did');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$MY_3DPRODUCT . ' AS d','a.id=d.product_id','inner');
    	$this->db->where('d.id',$product_id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    
    }
    
    public function getProduct3DDetailById($id)
    {
    	$this->db->select('b.*,group_concat(c.image) as pro_images');
    	$this->db->from(TABLES::$MY_3DPRODUCT.' AS a');
    	$this->db->join(TABLES::$PRODUCT_ITEM . ' AS b','a.product_id=b.id','inner');
    	$this->db->join(TABLES::$PRODUCT_3DPRODUCT . ' AS c','a.id=c.product_item_id','inner');
    	$this->db->where('a.id',$id);
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    
    }
    
    public function getProduct3Dimages($product_id)
    {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_3DPRODUCT);
    	$this->db->where('product_item_id',$product_id);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    
    }
    public function getProductlist($busi_id)
    {
    	$this->db->select('a.*,b.name as subproduct,c.name as mainproduct');
    	$this->db->from(TABLES::$PRODUCT_ITEM . ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    
    }
    
    public function getProduct3Dlist($busi_id)
    {
    	$this->db->select('d.id as did,a.*,b.name as subproduct,c.name as mainproduct,group_concat(e.image) as pro_images');
    	$this->db->from(TABLES::$MY_3DPRODUCT . ' AS d');
    	$this->db->join(TABLES::$PRODUCT_ITEM. ' AS a','d.product_id = a.id','inner');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$PRODUCT_3DPRODUCT. ' AS e','d.id=e.product_item_id','inner');
    	$this->db->where('d.busi_id',$busi_id);
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->group_by('d.id');
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    
    }
    
    public function delete3DProduct($data)
    {
    	$this->db->where('product_item_id', $data['id']);
    	if($this->db->delete(TABLES::$PRODUCT_3DPRODUCT)) {
    		$this->db->where('id', $data['id']);
    		$this->db->delete(TABLES::$MY_3DPRODUCT);
    		return 1;
    	} else {
    		return 0;
    	}
    }
    
    public function getMainProduct()
    {
    	$this->db->select('*');
    	$this->db->from(TABLES::$MAIN_PRODUCT);
    	$this->db->order_by('id','ASC');
    	$this->db->where('status',1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getProductById($id)
    {
    	$this->db->select('a.*,b.name as sub_product,c.name as main_product');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->where('a.id',$id);
    	$this->db->order_by('a.id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public  function change3dproduct($data)
    {
    		$this->db->where('id', $data['id']);
        	$this->db->update(TABLES::$PRODUCT_3DPRODUCT, $data);
    		return $this->db->affected_rows();
    }
    public function update3dproduct($id,$newid) {
    
    	$data['product_id'] = $newid;
    	$this->db->where('id', $id);
    	$this->db->update(TABLES::$MY_3DPRODUCT, $data);
    	return $this->db->affected_rows();
    }
    
    public function getProductImageById($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_3DPRODUCT);
    	$this->db->where('id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getProductdetailsById($id) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id, e.name as maincategory, e.id as maincategory_id,u.id as user_id,bi.accept_chat');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_MAIN_CATEGORY. ' AS e','e.id=f.mcat_id','inner');
        $this->db->join(TABLES::$USER.' AS u','a.busi_id=u.busi_id','left');
        $this->db->join(TABLES::$BUSINESS_INFO.' AS bi','a.busi_id=bi.id','left');
    	$this->db->where('a.id',$id);
    	$this->db->where('a.status',1);
    	$this->db->order_by('a.id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getProductdetailsByProductNo($busi_id,$product_no) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id, e.name as maincategory, e.id as maincategory_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_MAIN_CATEGORY. ' AS e','e.id=f.mcat_id','inner');
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->where('a.model_no',$product_no);
    	$this->db->where('a.status',1);
    	$this->db->order_by('a.id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getProductColorById($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_ITEM_COLOR);
    	$this->db->where('item_id',$id);
    	$this->db->where('status',1);
    	$this->db->order_by('id','DESC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getProductSpecificationById($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_ITEM_SPEC );
    	$this->db->where('item_id',$id);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function productListBySellerId($id) {
    	$this->db->select('a.*,b.name as subproduct,c.name as mainproduct');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->where('a.busi_id',$id);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function productListBySubCategory($map) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	if(!empty($map['item_id']))
    		$this->db->where('a.id',$map['item_id']);
    		if(!empty($map['sproduct_id']))
    			$this->db->where('b.id',$map['sproduct_id']);
    		if(!empty($map['mproduct_id']))
    				$this->db->where('c.id',$map['mproduct_id']);
    		if(!empty($map['subcat_id']))
    		$this->db->where('f.id',$map['subcat_id']);
    		$this->db->where('a.busi_id',$map['busi_id']);
    		$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function productListByCSMCategory($map) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	if(!empty($map['sproduct_id']))
    		$this->db->where('b.id',$map['sproduct_id']);
    	if(!empty($map['mproduct_id']))
    		$this->db->where('c.id',$map['mproduct_id']);
    	if(!empty($map['subcat_id']))
    		$this->db->where('f.id',$map['subcat_id']);
    	$this->db->where('a.busi_id',$map['busi_id']);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function productListByHotsales($map) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$HOTSALE_PRODUCTS. ' AS g','g.item_id=a.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('g.busi_id',$map['busi_id']);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function productListByNewArrival($map) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$NEW_ARRIVAL_PRODUCT. ' AS g','g.item_id=a.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('g.busi_id',$map['busi_id']);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function stockProductListBySellerId($id) {
    	$this->db->select('a.*,b.name as subproduct,c.name as mainproduct,d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,  e.*, f.name as username, f.name_prefix as prefix, f.user_subcategory_id as catid, g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4');
    	$this->db->from(TABLES::$STOCK_GOODS.' AS h');
    	$this->db->join(TABLES::$PRODUCT_ITEM. ' AS a', 'h.product_item_id = a.id','left' );
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->where('a.busi_id',$id);
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->order_by('a.id','ASC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function stockPostInsert($params){
    	
    	$this->db->insert ( TABLES::$STOCK_GOODS, $params );
    	$last_id = $this->db->insert_id ();
    	$data ['status'] = 1;
    	$data ['msg'] = "Added successfully";
    	return $data;
    	
    }
    public function getVideodetailsById($id) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id, e.name as maincategory, e.id as maincategory_id, g.vedio_file as video_file,h.company_name');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_MAIN_CATEGORY. ' AS e','e.id=f.mcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_VIDEO. ' AS g','g.product_item_id=a.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO. ' AS h','h.id=a.busi_id','inner');
    	$this->db->where('g.id',$id);
    	$this->db->where('a.status',1);
    	$this->db->order_by('a.id','ASC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    public function getProductColorByVideoId($id) {
    	$this->db->select('b.*, a.id as video_id');
    	$this->db->from(TABLES::$PRODUCT_VIDEO.' as a');
    	$this->db->join(TABLES::$PRODUCT_ITEM_COLOR.' as b', 'a.product_item_id = b.item_id','inner');
    	$this->db->where('a.product_item_id',$id);
    	$this->db->where('b.status',1);
    	$this->db->order_by('a.id','DESC');
    	$this->db->group_by('b.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getProductSpecificationByVideoId($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_VIDEO.' as a');
    	$this->db->join(TABLES::$PRODUCT_ITEM_SPEC.' as b', 'a.product_item_id = b.item_id', 'inner' );
    	$this->db->where('a.product_item_id',$id);
    	$this->db->order_by('b.id','ASC');
    	$this->db->group_by('b.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getDesksiteByBusiId($map) {
    	$this->db->select('a.id as user_id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role,b.product_certs, 
    			d.company_introduction,d.hot_presentation, d.year_of_registration, d.total_no_of_emp, d.company_size,b.fax, 
    			b.company_name, b.company_country, b.company_province, b.company_city,b.telephone_code,b.website,b.company_email,
    			b.telephone_city_code,b.telephone_number,b.telephone_number1,b.company_street,b.company_email, b.business_logo, 
    			b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified, b.likes, b.rank,
    			b.verification_id,g.*, c.user_id, c.alternative_email, c.mobile_number,c.position, c.profile_image,
    			c.timezone,e.sub_category as user_subcategory,b.accept_chat,b.accept_offer,b.accept_community,b.accept_email,j.step,
    			(select GROUP_CONCAT(f.name) from tbl_main_product as f where f.busi_id=a.busi_id AND f.status != 0 group by a.busi_id) as mainproducts,
    			h.no_of_production_line,h.fact_size,h.rnd_capacity,h.id as factory_id,h.fact_province,h.fact_city,
    			h.fact_street,h.telephone_code as ftelephone_code,h.telephone_city_code as ftelephone_city_code,h.telephone as ftelephone,i.flag');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','left');
    	$this->db->join(TABLES::$COMPANY_INFO.' AS d','a.id=d.busi_id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS e','e.id=a.user_subcategory_id','inner');
    	$this->db->join(TABLES::$PRODUCT_STAGE.' AS j','j.busi_id=a.busi_id','left');
    	$this->db->join(TABLES::$FACTORY_INFO.' AS h','h.busi_id=a.busi_id','left');
    	$this->db->join(TABLES::$COUNTRY.' AS i','i.name=b.company_country','left');
    	$this->db->where('a.account_activated', 1);
    	$this->db->where('a.is_suspend', 0);
    	$this->db->where('a.is_deleted', 0);
    	$this->db->where('b.is_disable', 0);
    	$this->db->where('a.is_contactperson',1);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('b.id', $map['id']);
    	//$this->db->where("(f.status != 0)",'',false);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('b.id');
    	//echo $this->db->last_query();
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getShipperDesksiteByBusiId($map) {
    	$this->db->select('a.id as user_id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role,b.product_certs, d.company_introduction,d.hot_presentation, d.year_of_registration, d.total_no_of_emp, d.company_size,b.fax, b.company_name,b.accept_chat,b.accept_offer,b.accept_community,b.accept_email,j.step,
		b.company_country, b.company_province, b.company_city,b.telephone_code,b.website,b.company_email,b.telephone_city_code,b.telephone_number,b.telephone_number1,b.company_street,b.company_email, b.business_logo, b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified,b.verification_id, b.likes, b.rank,  g.*,
		c.user_id, c.alternative_email, c.mobile_number,c.position, c.profile_image,c.timezone,e.sub_category as user_subcategory,(select GROUP_CONCAT(f.name) from tbl_shipper_service as f where f.busi_id=a.busi_id and f.status = 1 and f.is_special = 0) as mainservices,h.no_of_production_line,h.fact_size,h.rnd_capacity,h.id as factory_id,h.fact_province,h.fact_city,h.fact_street,h.telephone_code as ftelephone_code,h.telephone_city_code as ftelephone_city_code,h.telephone as ftelephone,i.flag');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','left');
    	$this->db->join(TABLES::$COMPANY_INFO.' AS d','a.busi_id=d.busi_id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS e','e.id=a.user_subcategory_id','inner');
    	$this->db->join(TABLES::$FACTORY_INFO.' AS h','h.busi_id=a.busi_id','left');
    	$this->db->join(TABLES::$COUNTRY.' AS i','i.name=b.company_country','left');
    	$this->db->join(TABLES::$PRODUCT_STAGE.' AS j','j.busi_id=a.busi_id','left');
    	$this->db->where('a.account_activated', 1);
    	$this->db->where('a.is_suspend', 0);
    	$this->db->where('a.is_deleted', 0);
    	$this->db->where('b.is_disable', 0);
    	$this->db->where('a.is_contactperson',1);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('b.id', $map['id']);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('b.id');
    	//echo $this->db->last_query();
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    
    public function getComapnyProfile($id) {
    	$this->db->select('a.id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role, d.company_introduction, b.company_name,
		b.company_country, b.company_province, b.company_email, b.business_logo, b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified, b.rank, b.visit, b.likes,  g.*,
		c.user_id, c.alternative_email, c.mobile_number,c.position, c.profile_image, d.*, e.user_category, f.sub_category, GROUP_CONCAT(h.name SEPARATOR ",") as main_product, i.id as factory_id,i.fact_size, i.no_of_production_line, i.rnd_capacity');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','left');
    	$this->db->join(TABLES::$COMPANY_INFO.' AS d','a.id=d.busi_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS e','a.user_category_id=e.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS f','a.user_subcategory_id=f.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS h ','b.id = h.busi_id ','left');
    	$this->db->join(TABLES::$FACTORY_INFO.' AS i ','b.id = i.busi_id ','left');
    	$this->db->where('a.account_activated', 1);
    	$this->db->where('a.is_contactperson', 1);
    	$this->db->where('a.is_suspend', 0);
    	$this->db->where('a.is_deleted', 0);
    	$this->db->where('b.is_disable', 0);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('b.id', $id);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getComapnyAbout($id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$MORE_CERTIFICATE.' AS a');
    	$this->db->where('a.busi_id', $id);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getComapnyCertificate($id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$MORE_CERTIFICATE.' AS a');
    	$this->db->where('a.busi_id', $id);
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getComapnyMainCertificate($id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$CERTIFICATE_INFO.' AS a');
    	$this->db->where('a.busi_id', $id);
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getAdvantage($id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
    	$this->db->where('a.id', $id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getContactPerson($id) {
    	/*$this->db->select('a.*,b.*');
    	$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
    	$this->db->join(TABLES::$CONTACTPERSON.' AS b', 'a.id =b.busi_id', 'left');
    	$this->db->where('a.id', $id);
    	$this->db->where('b.is_deleted', 0);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	if(count($result) <= 0) {
    		$this->db->select('a.*,b.name_prefix,b.name,b.email,c.mobile_code,c.mobile_number as mobile,c.position,c.profile_image as picture');
    		$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
    		$this->db->join(TABLES::$USER.' AS b', 'a.id=b.busi_id', 'left');
    		$this->db->join(TABLES::$USER_INFO.' AS c', 'b.id =c.user_id', 'left');
    		$this->db->where('a.id', $id);
    		$query = $this->db->get();
    		$result = $query->result_array();
    	}
    	return $result;*/
    	$this->db->select('a.*,b.name_prefix,b.name,b.email,c.mobile_code,c.mobile_number as mobile,c.position,c.profile_image as picture');
    	$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
    	$this->db->join(TABLES::$USER.' AS b', 'a.id=b.busi_id', 'left');
    	$this->db->join(TABLES::$USER_INFO.' AS c', 'b.id =c.user_id', 'left');
    	$this->db->where('b.is_contactperson', 1);
    	$this->db->where('a.id', $id);
    	$this->db->where('b.is_suspend', 0);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->limit(1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getMyFiles($id){
    	$this->db->select('*');
    	$this->db->from(TABLES::$MYFILE);
    	$this->db->where('busi_id', $id);
    	$this->db->where('file_access_type', 1);
    	$this->db->where('	is_deleted', 0);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getProductVideos($id)
    {
    	$this->db->select('a.*, b.*,c.*, d.email as useremail,d.name as username,d.name_prefix as prefix,e.country as country, e.province as province, f.user_category as category, g.sub_category as subcategory');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$PRODUCT_VIDEO.' as b', 'b.product_item_id = a.id ', 'inner');
    	$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = a.busi_id', 'left');
    	$this->db->join(TABLES::$USER.' as d ', 'd.busi_id = c.id', 'left');
    	$this->db->join(TABLES::$USER_INFO.' AS e','d.id=e.user_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS f','d.user_category_id=f.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS g','d.user_subcategory_id=g.id','left');
    	$this->db->where('a.status', 1);
    	$this->db->where('d.is_suspend', 0);
    	$this->db->where('d.is_deleted', 0);
    	$this->db->where('c.is_disable', 0);
    	$this->db->where('c.is_deleted', 0);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('a.busi_id', $id);
    	$this->db->group_by('b.id');
    	$this->db->order_by('b.created_date','DESC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$row = $query->result_array();
    	return $row;
    	
    }
    public function getProductVideosByBusiId($id)
    {
    	$this->db->select('b.*,c.id as product_id,c.name,c.quantity,c.unit,c.unit_price,c.description,d.email as useremail,d.name as username,d.name_prefix as prefix,e.country as country, e.province as province, f.user_category as category, g.sub_category as subcategory');
    	$this->db->from(TABLES::$PRODUCT_VIDEO.' as b', 'b.product_item_id = a.id ', 'inner');
    	$this->db->join(TABLES::$PRODUCT_ITEM.' as c','b.product_item_id=c.id','inner');
    	$this->db->join(TABLES::$USER.' as d ', 'd.busi_id = b.busi_id', 'left');
    	$this->db->join(TABLES::$USER_INFO.' AS e','d.id=e.user_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS f','d.user_category_id=f.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS g','d.user_subcategory_id=g.id','left');
    	$this->db->where('d.is_suspend', 0);
    	$this->db->where('d.is_deleted', 0);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('b.busi_id', $id);
    	$this->db->group_by('b.id');
    	$this->db->order_by('b.created_date','DESC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$row = $query->result_array();
    	return $row;
    	 
    }
    
    public function getShipperVideosByBusiId($id)
    {
    	$this->db->select('*');
    	$this->db->from(TABLES::$MAINSUBPRODUCTVEDIO);
    	$this->db->where('is_deleted', 0);
    	$this->db->where('busi_id', $id);
    	$this->db->order_by('created_date','DESC');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$row = $query->result_array();
    	return $row;
    
    }
    
    public function get3dproduct($id) {
    	$this->db->select('a.*, c.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = a.busi_id', 'left');
    	$this->db->join(TABLES::$USER.' as d ', 'd.busi_id = c.id', 'left');
    	$this->db->join(TABLES::$USER_INFO.' AS e','d.id=e.user_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS f','d.user_category_id=f.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS g','d.user_subcategory_id=g.id','left');
    	$this->db->from(TABLES::$FEATURED_3DPRODUCT.' AS h', 'h.product3d_id = a.id');
    	$this->db->where('a.busi_id', $id);
    	$this->db->where('h.status', 1);
    	$this->db->where('a.status', 1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getCurrentPost($busi_id){
    	$start_date = date('Y-m-d',strtotime("-15 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('a.*, c.*');
    	$this->db->from(TABLES::$BSTATION_POST.' as a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = a.busi_id', 'left');
    	$this->db->where('a.status',1);
    	$this->db->where('a.is_deleted',0);
    	$this->db->where('a.created_date >',$start_date);
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->where("DATE(a.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getCurrentRequest($busi_id){
    	$start_date = date('Y-m-d',strtotime("-15 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('a.*, c.*');
    	$this->db->from(TABLES::$STOCK_REQUEST.' as a');
    	$this->db->join(TABLES::$BSTATION_POST.' as b' , 'b.id = a.post_id', 'inner');
    	$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = a.buyer_id', 'left');
    	$this->db->where('b.status',1);
    	$this->db->where('b.is_deleted',0);
    	$this->db->where('b.created_date >',$start_date);
    	$this->db->where('a.buyer_id',$busi_id);
    	$this->db->where("DATE(b.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('a.created_date','DESC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function addFavourite($params){
    	
    	$this->db->insert ( TABLES::$MY_FAVOURITE, $params );
    	$last_id = $this->db->insert_id ();
    	$data ['status'] = 1;
    	$data ['msg'] = "Added successfully";
    	return $data;
    	
    }
    public function getRoutesByBusiId($id){
    	$this->db->select("a.*,IFNULL(b.name,'Worldwide') as from_country,IFNULL(c.name,'Worldwide') as to_country");
    	$this->db->from(TABLES::$BUSINESSROUTE.' AS a');
    	$this->db->join(TABLES::$COUNTRY.' AS b','a.from_country_id=b.id','left');
    	$this->db->join(TABLES::$COUNTRY.' AS c','a.to_country_id=c.id','left');
    	$this->db->where('a.busi_id', $id);
    	$this->db->order_by('a.created_date');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getVerifiedByBusiId($id){
    	$this->db->select('*');
    	$this->db->from(TABLES::$BUSINESS_INFO);
    	$this->db->where('id', $id);
    	$this->db->where('disable', 0);
    	$this->db->where('is_deleted', 1);
    	$this->db->where('is_logo_verified', 1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    public function getServicesByBusiId($id){
    	$this->db->select('a.*, c.*');
    	$this->db->from(TABLES::$BSTATION_POST.' as a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' as c' , 'c.id = a.busi_id', 'left');
    	$this->db->where('a.busi_id', $id);
    	$this->db->where('a.status', 1);
    	$this->db->order_by('a.created_date');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    /*
    public function productById($id) {
    	$this->db->select('a.*,b.name as subproduct,c.name as mainproduct');
    	$this->db->from(TABLES::$PRODUCT_ITEM_SPEC. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','inner');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','b.mproduct_id=c.id','inner');
    	$this->db->where('a.id',$id);
    	$this->db->where('a.status',1);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }*/
    
    
    
    public function bstationProductListByBusinessId($id) {
    	$this->db->select('a.*,b.name as subproduct,c.name as mainproduct,d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,  e.*, f.name as username, f.name_prefix as prefix, f.user_subcategory_id as catid, g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4,j.id as community_id,h.id as post_id');
    	$this->db->from(TABLES::$BSTATION_POST.' AS h');
    	$this->db->join(TABLES::$PRODUCT_ITEM. ' AS a', 'h.product_item_id = a.id','left' );
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$COMMUNITY_MEMBER.' AS j ','a.busi_id = j.busi_id ','left');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('a.busi_id',$id);
    	$this->db->order_by('a.id','ASC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function bstationBuyerProductListByBusinessId() {
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,  e.*, f.name as username, f.name_prefix as prefix, f.user_subcategory_id as catid, g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4,j.id as community_id');
    	$this->db->from(TABLES::$BSTATION_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$COMMUNITY_MEMBER.' AS j ','h.busi_id = j.busi_id ','left');
    	$this->db->where('f.user_category_id',3);
    	$this->db->order_by('h.id','ASC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function bstationPostInsert($params){
    	
    	$this->db->insert ( TABLES::$BSTATION_POST, $params );
    	$last_id = $this->db->insert_id ();
    	$data ['status'] = 1;
    	$data ['msg'] = "Added successfully";
    	return $data;
    	
    }
    
    public function getUserTypebyBusinessId($id){
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->where('a.busi_id', $id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getWebsiteProductCatalogue($busi_id) {
    	$this->db->select('a.*,c.about,min(c.unit_price) as min_price,max(c.unit_price) as max_price,max(c.quantity) as quantity,c.unit');
    	$this->db->from(TABLES::$PRODUCT_CATALOGUE.' AS a');
    	$this->db->join(TABLES::$PRODUCT_CATALOGUE_ITEM.' AS b','a.id=b.catalogue_id','inner');
    	$this->db->join(TABLES::$PRODUCT_ITEM.' AS c','b.item_id=c.id','inner');
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->where('a.status',1);
    	$this->db->group_by('a.id');
    	$this->db->limit(1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
   
    public function communityPostInsert($params){
    	
    	$this->db->insert ( TABLES::$COMMMUNITY_POST, $params );
    	$last_id = $this->db->insert_id ();
    	$data ['status'] = 1;
    	$data ['msg'] = "Added successfully";
    	return $data;
    	
    }
    
    public function communityPostListByAlluser($busi_id) {
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_offer,d.accept_email,e.*,f.user_category_id, IFNULL(k.name,f.name) as username, IFNULL(k.name_prefix,f.name_prefix) as prefix, f.user_subcategory_id as catid, g.*,IFNULL(k.picture,g.profile_image) as contact_profile_image,h.id as postid,h.title as title,h.description as postdesc,h.usd_price as postprice,h.quantity as postqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4, h.postviews,h.likes,h.comment,b.step,"" as share_cname,"" as share_profile_image,"" as share_id');
    	$this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$COMMUNITY_MEMBER.' AS i','i.busi_id=h.busi_id','inner');
    	$this->db->join(TABLES::$PRODUCT_STAGE. ' AS b','d.id = b.busi_id','left');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','f.busi_id = k.busi_id ','left');
    	$this->db->where('i.my_busi_id',$busi_id);
    	$this->db->where('h.status',1);
    	$this->db->where('f.account_activated', 1);
    	$this->db->where('f.is_suspend', 0);
    	$this->db->where('f.is_deleted', 0);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->group_by('h.id');
        //$this->db->order_by('h.id','desc');

    	$query_1 = $this->db->get_compiled_select ();
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_offer,d.accept_email,e.*,f.user_category_id, IFNULL(k.name,f.name) as username, IFNULL(k.name_prefix,f.name_prefix) as prefix, f.user_subcategory_id as catid, g.*,IFNULL(k.picture,g.profile_image) as contact_profile_image,h.id as postid,h.title as title,h.description as postdesc,h.usd_price as postprice,h.quantity as postqty,c.shared_date as create,h.image1,h.image2,h.image3,h.image4, h.postviews,h.likes,h.comment,b.step,(select IFNULL(cp.name,j.name) as name from tbl_user as j left join tbl_contactperson as cp ON j.busi_id = cp.busi_id where j.busi_id=c.share_id and j.account_activated = 1 and j.is_suspend = 0 and j.is_deleted = 0 and j.is_contactperson = 1 limit 1) as share_cname,(select IFNULL(cp.picture,l.profile_image) from tbl_user as k inner join tbl_userinfo as l on k.id=l.user_id left join tbl_contactperson as cp ON k.busi_id = cp.busi_id where k.busi_id=c.share_id and k.account_activated = 1 and k.is_suspend = 0 and k.is_deleted = 0 and k.is_contactperson = 1 limit 1) as share_profile_image,c.id as share_id');
    	$this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
        $this->db->join(TABLES::$COMMUNITY_POST_SHARE.' AS c','c.post_id=h.id','inner');
    	$this->db->join(TABLES::$COMMUNITY_MEMBER.' AS i','i.my_busi_id=c.share_id','inner');
    	$this->db->join(TABLES::$PRODUCT_STAGE. ' AS b','d.id = b.busi_id','left');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','f.busi_id = k.busi_id ','left');
    	$this->db->where('i.busi_id',$busi_id);
        $this->db->or_where('i.my_busi_id',$busi_id);
    	$this->db->where('h.status',1);
    	$this->db->where('f.account_activated', 1);
    	$this->db->where('f.is_suspend', 0);
    	$this->db->where('f.is_deleted', 0);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->group_by('h.id,share_id');
        //$this->db->order_by('h.id','desc');

    	$query_2 = $this->db->get_compiled_select ();
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_offer,d.accept_email,e.*,f.user_category_id, IFNULL(k.name,f.name) as username, IFNULL(k.name_prefix,f.name_prefix) as prefix, f.user_subcategory_id as catid, g.*,IFNULL(k.picture,g.profile_image) as contact_profile_image,h.id as postid,h.title as title,h.description as postdesc,h.usd_price as postprice,h.quantity as postqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4, h.postviews,h.likes,h.comment,b.step,"" as share_cname,"" as share_profile_image,"" as share_id');
    	$this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$PRODUCT_STAGE. ' AS b','d.id = b.busi_id','left');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','f.busi_id = k.busi_id ','left');
    	$this->db->where('h.busi_id',$busi_id);
    	$this->db->where('h.status',1);
    	$this->db->where('f.account_activated', 1);
    	$this->db->where('f.is_suspend', 0);
    	$this->db->where('f.is_deleted', 0);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->group_by('h.id');
        //$this->db->order_by('h.id','desc');
    
    
    	$query_3 = $this->db->get_compiled_select ();
    	$sql = "SELECT t.* FROM (".$query_1." UNION ".$query_2." UNION ".$query_3.") as t group by t.postid,t.share_id order by t.create desc";
    	$query = $this->db->query($sql);
    	$result = $query->result_array();
    	return $result;
    }
    
    public function communityMemberFirstPost($busi_id) {
    	$this->db->select('h.id');
    	$this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
    	$this->db->join(TABLES::$COMMUNITY_MEMBER.' AS i','i.busi_id=h.busi_id','inner');
    	$this->db->where('i.my_busi_id',$busi_id);
    	$query_1 = $this->db->get_compiled_select ();
    	$this->db->select('h.id');
    	$this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
    	$this->db->where('h.busi_id',$busi_id);
    	$query_2 = $this->db->get_compiled_select ();
    	$sql = "SELECT t.* FROM (".$query_1." UNION ".$query_2.") as t order by t.id desc limit 1";
    	$query = $this->db->query($sql);
    	$result = $query->result_array();
    	return $result;
    }
    
    public function communityPostListByBusinessId($id) {
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_offer,d.accept_email,e.*,f.user_category_id, IFNULL(k.name,f.name) as username, IFNULL(k.name_prefix,f.name_prefix) as prefix, f.user_subcategory_id as catid, g.*,IFNULL(k.picture,g.profile_image) as contact_profile_image,h.id as postid,h.title as title,h.description as postdesc,h.usd_price as postprice,h.quantity as postqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4, h.postviews,h.likes,h.comment,b.step');
        $this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
        $this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
        $this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
        $this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
        $this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
        $this->db->join(TABLES::$PRODUCT_STAGE. ' AS b','d.id = b.busi_id','inner');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','f.busi_id = k.busi_id ','left');
    	$this->db->where('h.busi_id',$id);
    	$this->db->where('h.status',1);
    	$this->db->where('f.account_activated', 1);
    	$this->db->where('f.is_suspend', 0);
    	$this->db->where('f.is_deleted', 0);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->group_by('h.id');
        $this->db->order_by('h.id','desc');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getPostDetailsById($postid) {
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_offer,d.accept_email,e.*,f.user_category_id, IFNULL(k.name,f.name) as username,IFNULL(k.name_prefix,f.name_prefix) as prefix, f.user_subcategory_id as catid, g.*,IFNULL(k.picture,g.profile_image) as contact_profile_image,h.id as postid,h.title as title,h.description as postdesc,h.usd_price as postprice,h.quantity as postqty,h.created_date as create,h.image1,h.image2,h.image3,h.image4, h.postviews,h.likes,h.comment,b.step');
    	$this->db->from(TABLES::$COMMMUNITY_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$PRODUCT_STAGE. ' AS b','d.id = b.busi_id','inner');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','f.busi_id = k.busi_id ','left');
    	$this->db->where('h.id',$postid);
    	$this->db->where('f.account_activated', 1);
    	$this->db->where('f.is_suspend', 0);
    	$this->db->where('f.is_deleted', 0);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->order_by('h.id','desc');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function deleteCommunityPost($data)
    {
    	$this->db->select('*');
    	$this->db->from(TABLES::$COMMMUNITY_POST);
    	$this->db->where('busi_id', $data['busi_id'] );
    	$this->db->where('id', $data['id'] );
    	//$this->db->where('status', 1);
    	$query = $this->db->get ();
    	$rowcount = $query->num_rows();
    	if($rowcount > 0)
    	{
    		/*$this -> db -> where('post_id', $data['id']);
    		 $this -> db -> delete(TABLES::$POSTLIKE);
    		 
    		 $this -> db -> where('user_id', $data['user_id']);
    		 $this -> db -> where('post_id', $data['id']);
    		 $this -> db -> delete(TABLES::$POSTCOMMENT);*/
    		
    		$this -> db -> where('busi_id', $data['busi_id']);
    		$this -> db -> where('id', $data['id']);
    		return $this -> db -> delete(TABLES::$COMMMUNITY_POST);
    		//echo $this->db->last_query();
    	}
    }
    
    public function postLike($data) {
    	$data['created_datetime'] = date('Y-m-d h:i:s');
    	
    	$this->db->select('id');
    	$this->db->from(TABLES::$POSTLIKE);
    	$this->db->where('post_id', $data['post_id']);
    	$likequery  =$this->db->get ();
    	$likeCount  = $likequery ->num_rows();
    	// echo $likeCount;
    	
    	$this->db->select('*');
    	$this->db->from(TABLES::$POSTLIKE);
    	$this->db->where('post_id', $data['post_id']);
    	$this->db->where('liked_by', $data['liked_by']);
    	$query = $this->db->get ();
    	$rowcount = $query->num_rows();
    	if($rowcount > 0)
    	{
    		/*$likes =$likeCount-1;
    		$this->db->set('likes', $likes);
    		$this->db->where('id', $data['post_id']);
    		$this->db->update(TABLES::$COMMMUNITY_POST);
    		
    		$this -> db -> where('liked_by', $data['liked_by']);
    		$this -> db -> where('post_id', $data['post_id']);
    		return $this->db-> delete(TABLES::$POSTLIKE);*/
    		return 0;
    		
    	} else {
    		
    		$likes =$likeCount+1;
    		$this->db->set('likes', $likes);
    		$this->db->where('id', $data['post_id']);
    		$this->db->update(TABLES::$COMMMUNITY_POST);
    		
    		$this->db->insert ( TABLES::$POSTLIKE, $data);
    		$this->db->insert_id ();
    		return $this->db->insert_id ();
    		
    	}
    	
    }
    
    public function addCommunityPostRequest($params) {
    	return $this->db->insert(TABLES::$COMMUNITY_POST_REQUESTS,$params);
    }
    
    public function addCommunityPostOffer($params) {
    	return $this->db->insert(TABLES::$COMMUNITY_POST_OFFERS,$params);
    }
    
    /*
     public function productById($id) {
     $this->db->select('a.*,b.name as subproduct,c.name as mainproduct');
     $this->db->from(TABLES::$PRODUCT_ITEM_SPEC. ' AS a');
     $this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','inner');
     $this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','b.mproduct_id=c.id','inner');
     $this->db->where('a.id',$id);
     $this->db->where('a.status',1);
     $this->db->order_by('id','ASC');
     $query = $this->db->get();
     $result = $query->result_array();
     return $result;
     }*/
    
    public function getCommunityMember($id) {
    	$this->db->select('a.*,b.id as mbid,b.company_name as cname,b.company_country as country,b.company_province as state,
    			b.company_city as city,b.plan_id,b.is_logo_verified,b.gaurantee_period,
    			(CASE WHEN d.nickname IS NULL OR d.nickname = "" THEN d.name ELSE d.nickname END) as membername,
    			d.user_category_id,(CASE WHEN d.nickname IS NULL OR d.nickname = "" THEN e.profile_image ELSE "images/img3470.png" END) as memberimg,f.sub_category as subcategory,
    			(b.accept_chat+b.accept_offer+b.accept_community+b.accept_email) as is_active,
    			(select count(id) from tbl_chat_messages as cht where cht.from_busi_id = a.busi_id and cht.is_read=0) as messages');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS c','c.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS d','d.busi_id=a.busi_id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS e','e.user_id=d.id','inner');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS f','f.id=d.user_subcategory_id','inner');
    	$this->db->where("a.my_busi_id",$id);
    	$this->db->where('d.is_contactperson',1);
    	$this->db->where('a.status',1);
    	$query_1 = $this->db->get_compiled_select ();
    	$this->db->select('a.*,b.id as mbid,b.company_name as cname,b.company_country as country,b.company_province as state,
    			b.company_city as city,b.plan_id,b.is_logo_verified,b.gaurantee_period,
    			(CASE WHEN d.nickname IS NULL OR d.nickname = "" THEN d.name ELSE d.nickname END) as membername,
    			d.user_category_id,(CASE WHEN d.nickname IS NULL OR d.nickname = "" THEN e.profile_image ELSE "images/img3470.png" END) as memberimg,f.sub_category as subcategory,
    			(b.accept_chat+b.accept_offer+b.accept_community+b.accept_email) as is_active,
    			(select count(id) from tbl_chat_messages as cht where cht.from_busi_id = b.id and cht.is_read=0) as messages');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.my_busi_id=b.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS c','c.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS d','d.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS e','e.user_id=d.id','inner');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS f','f.id=d.user_subcategory_id','inner');
    	$this->db->where("a.busi_id",$id);
    	$this->db->where('d.is_contactperson',1);
    	$this->db->where('a.status',1);
    	$query_2 = $this->db->get_compiled_select ();
    	$sql = "SELECT t.* FROM (".$query_1." UNION ".$query_2.") as t group by t.mbid order by t.created_date desc";
    	$query = $this->db->query($sql);
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getCommunityMemberLike($id){
    	
    	$this->db->select('a.*,b.company_name as cname,b.company_country as country,b.company_province as state,b.company_city as city,d.name as membername,e.profile_image as memberimg,f.sub_category as subcategory');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS c','c.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS d','d.busi_id=a.busi_id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS e','e.user_id=d.id','inner');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS f','f.id=d.user_subcategory_id','inner');
    	$this->db->where('a.my_busi_id',$id);
    	//$this->db->order_by('h.id','desc');
    	//$this->db->group_by('h.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getInvitationCommunityCount($busi_id)
    {
    
    	$this->db->select('count(a.id) as members');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER . ' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO. ' AS b','a.my_busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER. ' AS d','a.my_busi_id=d.busi_id','inner');
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->where('a.is_deleted',0);
    	$this->db->where('a.status',0);
    	$this->db->where('d.account_activated', 1);
    	$this->db->where('d.is_suspend', 0);
    	$this->db->where('d.is_deleted', 0);
    	$this->db->where('d.is_contactperson',1);
    	$query = $this->db->get();
    	$row = $query->result_array();
    	return $row;
    }
    
    public function getWebsiteProductVideos($busi_id)
    {
    	$this->db->select('a.*, b.vedio_file,b.vedio_size,b.video_likes,b.id as video_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$PRODUCT_VIDEO.' as b', 'b.product_item_id = a.id ', 'inner');
    	$this->db->where('a.status', 1);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('a.busi_id', $busi_id);
    	$this->db->order_by('b.created_date','DESC');
    	$query = $this->db->get();
    	$row = $query->result_array();
    	return $row;
    	 
    }
    
    public function getWebsiteFeaturedProducts($busi_id)
    {
    	$current_date = date('Y-m-d');
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$FEATURED_PRODUCT.' as b', 'b.item_id = a.id ', 'inner');
    	$this->db->where('a.status', 1);
    	$this->db->where('b.status', 1);
    	$this->db->where("'".$current_date."' BETWEEN DATE(b.from_date) and DATE(b.to_date)",'',false);
    	$this->db->where('b.busi_id', $busi_id);
    	$this->db->order_by('b.from_date','DESC');
    	$query = $this->db->get();
    	$row = $query->result_array();
    	return $row;
    
    }
    
    public function getWebsitePro3dProducts($busi_id)
    {
    	$this->db->select('a.*,group_concat(b.image) as product_images');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$PRODUCT_3DPRODUCT.' as b', 'b.product_item_id = a.id ', 'inner');
    	$this->db->where('a.status', 1);
    	$this->db->where('a.busi_id', $busi_id);
    	$this->db->group_by('a.id');
    	$this->db->order_by('a.id','DESC');
    	$query = $this->db->get();
    	$row = $query->result_array();
    	return $row;
    }
    
    public function getWebsiteNewArriavals($busi_id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$NEW_ARRIVAL_PRODUCT.' as b', 'b.item_id = a.id ', 'inner');
    	$this->db->where('a.status', 1);
    	$this->db->where('b.busi_id', $busi_id);
    	$this->db->order_by('a.id','DESC');
    	$query = $this->db->get();
    	$row = $query->result_array();
    	return $row;
    }
    
    public function getWebsiteHotSales($busi_id) {
    	$this->db->select('a.*');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' as a');
    	$this->db->join(TABLES::$HOTSALE_PRODUCTS.' as b', 'b.item_id = a.id ', 'inner');
    	$this->db->where('a.status', 1);
    	$this->db->where('b.busi_id', $busi_id);
    	$this->db->order_by('a.id','DESC');
    	$query = $this->db->get();
    	$row = $query->result_array();
    	return $row;
    }
    public function getSellerInfo($id) {
    	$this->db->select('a.id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role, d.company_introduction, b.company_name,
		b.company_country, b.company_province, b.company_email, b.business_logo, b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified, b.rank, b.visit, b.likes,  g.*,
		c.user_id, c.alternative_email, c.mobile_number,c.position, c.profile_image, d.*, e.user_category, f.sub_category, GROUP_CONCAT(h.name SEPARATOR ",") as main_product, i.fact_size, i.no_of_production_line, i.rnd_capacity');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS g','g.busi_id=b.id','left');
    	$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','left');
    	$this->db->join(TABLES::$COMPANY_INFO.' AS d','a.id=d.busi_id','left');
    	$this->db->join(TABLES::$USER_CATEGORIES.' AS e','a.user_category_id=e.id','left');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS f','a.user_subcategory_id=e.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS h ','b.id = h.busi_id ','left');
    	$this->db->join(TABLES::$FACTORY_INFO.' AS i ','b.id = i.busi_id ','left');
    	$this->db->where('a.account_activated', 1);
    	$this->db->where('a.is_suspend', 0);
    	$this->db->where('a.is_deleted', 0);
    	$this->db->where('b.is_disable', 0);
    	$this->db->where('b.is_deleted', 0);
    	$this->db->where('b.id', $id);
    	$this->db->order_by('a.created_date','DESC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getUserInfoByBussId($id){
    	$this->db->select('a.*,b.company_name as cname,b.company_country as country,b.company_province as state,b.company_city as city,e.*,f.sub_category as subcategory,IFNULL(g.picture,e.profile_image) as profile_image,IFNULL(g.name_prefix,a.name_prefix) as contact_prefix,IFNULL(g.name,a.name) as contact_name');
    	$this->db->from(TABLES::$USER.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS c','c.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS e','e.user_id=a.id','inner');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS f','f.id=a.user_subcategory_id','inner');
    	$this->db->join(TABLES::$CONTACTPERSON.' AS g ','a.busi_id = g.busi_id ','left');
    	$this->db->where('a.busi_id',$id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
    public function getCommunityPostLike($id){
    	$this->db->select('a.*,b.*,d.company_name as cname,d.company_country as country,d.company_province as state,d.company_city as city,c.*,(CASE WHEN a.hidden=0 THEN IFNULL(k.picture,f.profile_image) ELSE "images/img3470.png" END) as profile_image,(CASE WHEN a.hidden=0 THEN IFNULL(k.name,c.name) ELSE a.hidden_name END) as formatted_name,g.sub_category as subcategory');
    	$this->db->from(TABLES::$POSTLIKE.' AS a');
    	$this->db->join(TABLES::$COMMMUNITY_POST.' AS b','a.post_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS c','c.busi_id=a.liked_by','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','b.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS f','f.user_id=c.id','inner');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS g','g.id=c.user_subcategory_id','inner');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','c.busi_id = k.busi_id ','left');
    	$this->db->where('b.id',$id);
    	//$this->db->order_by('h.id','desc');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
    
    public function getCommunityPostComment($id){
    	$this->db->select('a.*,d.company_name as cname,d.company_country as country,d.company_province as state,d.company_city as city,c.*,(CASE WHEN a.hidden=0 THEN IFNULL(k.picture,f.profile_image) ELSE "images/img3470.png" END) as profile_image,(CASE WHEN a.hidden=0 THEN IFNULL(k.name,c.name) ELSE a.hidden_name END) as formatted_name,g.sub_category as subcategory');
        /*(CASE WHEN c.nickname IS NULL OR c.nickname = "" THEN f.profile_image ELSE "images/img3470.png" END) as profile_image*/
    	$this->db->from(TABLES::$POSTCOMMENT.' AS a');
    	$this->db->join(TABLES::$COMMMUNITY_POST.' AS b','a.post_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS c','c.busi_id=a.commented_by','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','b.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS f','f.user_id=c.id','inner');
    	$this->db->join(TABLES::$USER_SUBCATEGORIES.' AS g','g.id=c.user_subcategory_id','inner');
        $this->db->join(TABLES::$CONTACTPERSON.' AS k ','c.busi_id = k.busi_id ','left');
    	$this->db->where('b.id',$id);
    	//$this->db->order_by('h.id','desc');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    	
    }
    
    public function viewPostCount($data) {
    	
    	$this->db->select('*');
    	$this->db->from(TABLES::$COMMMUNITY_POST);
    	$this->db->where('id', $data['post_id']);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$viewpostcnt  = $result['postviews'];
    	
    	$viewpost =$viewpostcnt+1;
    	$this->db->set('postviews', $viewpostcnt);
    	$this->db->where('id', $data['post_id']);
    	$this->db->update(TABLES::$COMMMUNITY_POST);
    }
    
    public function commentPost($data)
    {
    	$this->db->insert ( TABLES::$POSTCOMMENT, $data);
    	$this->db->insert_id ();
    	$this->db->select('id');
    	$this->db->from(TABLES::$POSTCOMMENT);
    	$this->db->where('post_id', $data['post_id']);
    	$this->db->where('status', '1');
    	$commentquery  =$this->db->get();
    	$commentCount  = $commentquery->num_rows();
    	$this->db->set('comment', $commentCount );
    	$this->db->where('id', $data['post_id']);
    	return $this->db->update(TABLES::$COMMMUNITY_POST);
    	
    }
    
    public function getShippingMainCategories() {
    	$this->db->select('*');
    	$this->db->from(TABLES::$SHIPPING_CATEGORIES);
    	$this->db->where('status', 1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function addShipperServices($data) {
    	return $this->db->insert_batch ( TABLES::$SHIPPER_SERVICES, $data);
    }
    
    public function addShipperService($data) {
    	$this->db->select('id');
    	$this->db->from(TABLES::$SHIPPER_SERVICES);
    	$this->db->where('busi_id', $data['busi_id']);
    	$this->db->where('name', $data['name']);
    	$this->db->where('status',1);
    	$this->db->where('is_special',$data['is_special']);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	if(count($result) <= 0) {
    		return $this->db->insert ( TABLES::$SHIPPER_SERVICES, $data);
    	} else {
    		return 0;
    	}
    }
    
    public function updateShipperService($data) {
    	$this->db->select('id');
    	$this->db->from(TABLES::$SHIPPER_SERVICES);
    	$this->db->where('busi_id', $data['busi_id']);
    	$this->db->where('name', $data['name']);
    	$this->db->where('status',1);
    	$this->db->where('is_special',$data['is_special']);
    	$this->db->where('id !=',$data['id']);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	if(count($result) <= 0) {
	    	$this->db->where('id',$data['id']);
	    	$this->db->update ( TABLES::$SHIPPER_SERVICES, $data);
	    	return 1;
    	} else {
    		return 0;
    	}
    }
    
    public function deleteShipperService($id) {
    	$param = array('status'=>0);
    	$this->db->where('id IN('.$id.')','',false);
    	return $this->db->update ( TABLES::$SHIPPER_SERVICES, $param);
    }
    
    public function getShipperServices($busi_id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$SHIPPER_SERVICES);
    	$this->db->where('busi_id', $busi_id);
    	$this->db->where('status', 1);
    	$this->db->where('is_special', 0);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getActiveShipperServices($busi_id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$SHIPPER_SERVICES);
    	$this->db->where('busi_id', $busi_id);
    	$this->db->where('status', 1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getShipperSpecialServices($busi_id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$SHIPPER_SERVICES);
    	$this->db->where('busi_id', $busi_id);
    	$this->db->where('status', 1);
    	$this->db->where('is_special', 1);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getShipperServiceById($id) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$SHIPPER_SERVICES);
    	$this->db->where('id', $id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    

    public function getProductByModalNo($model_no)
    {
    	$this->db->select('*');
    	$this->db->from(TABLES::$PRODUCT_ITEM);
    	$this->db->where('model_no',$model_no);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    	
    }

    public function addItemToCart($params) {
    	$this->db->select('*');
    	$this->db->from(TABLES::$MYCART);
    	$this->db->where('product_item_id',$params['product_item_id']);
    	$this->db->where('busi_id',$params['busi_id']);
    	$this->db->where('is_deleted',0);
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	if(count($result) <= 0) { 
    		return $this->db->insert(TABLES::$MYCART,$params);
    	} else {
    		return 0;
    	}
    }
    
    public function addBstationPostRequest($params) {
    	return $this->db->insert(TABLES::$BSTATION_POST_REQUEST,$params);
    }
    
    public function addBstationPostOffer($params) {
    	return $this->db->insert(TABLES::$BSTATION_POST_OFFER,$params);
    }
    
    public function getBstationPostById($id) {
    	$this->db->select('a.id,a.title,a.busi_id,b.company_name,c.name_prefix,c.name');
    	$this->db->from(TABLES::$BSTATION_POST.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS c','b.id=c.busi_id','inner');
    	$this->db->where('a.id', $id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getProductRelatedImages($product_id) {
    	$this->db->select('a.mproduct_id');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->where('a.id', $product_id);
    	$query = $this->db->get();
    	$row = $query->result_array();
    	$this->db->select('a.main_image');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->where('a.mproduct_id', $row[0]['mproduct_id']);
    	$this->db->limit(8);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    /* ***************** B-Station Posts ********************* */
    
    public function searchBusinessStationPosts($params) {
    	$start_date = date('Y-m-d',strtotime("-15 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, 
    			d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_chat,d.accept_offer,d.accept_community,d.accept_email, e.*,
    			g.profile_image as profile_image,f.user_category_id as catid, g.*,h.title as title,
    			h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,h.usd_price as unit_price,h.quantity,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix,i.flag');
    	$this->db->from(TABLES::$BSTATION_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id = d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id = f.id','inner');
    	$this->db->join(TABLES::$COUNTRY.' AS i','d.company_country=i.name','left');
    	$this->db->where('f.user_category_id IN(1,2)','',false);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	if(!empty($params['country'])) {
    		$this->db->where("d.company_country like '%".trim($params['country'])."%'",'',false);
    	}
    	if(!empty($params['keyword'])) {
    		$this->db->where("(h.title like '%".trim($params['keyword'])."%' OR h.description like '%".trim($params['keyword'])."%')",'',false);
    	}
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$this->db->select('busi_id');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER);
    	$this->db->where('my_busi_id',$params['busi_id']);
    	$query = $this->db->get();
    	$result1 = $query->result_array();
    	foreach ($result as $key=>$row) {
    		$result[$key]['community_id'] = '';
    		foreach ($result1 as $row1) {
    			if($row['busi_id'] == $row1['busi_id']) {
    				$result[$key]['community_id'] = $row1['busi_id'];
    			}
    		}
    	}
    	return $result;
    }
    
    public function getMyBusinessStationPosts($busi_id) {
    	$start_date = date('Y-m-d',strtotime("-15 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country, h.usd_price as unit_price,h.quantity,
    			d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, 
    			d.is_logo_verified, d.rank,e.*,g.profile_image as profile_image,f.user_category_id as catid, 
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix');
    	$this->db->from(TABLES::$BSTATION_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id = d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id = f.id','inner');
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	$this->db->where('h.created_date >',$start_date);
    	$this->db->where('h.busi_id',$busi_id);
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function closeSellerPost($id) {
    	$param = array();
    	$param['status'] = 0;
    	$this->db->where('id',$id);
    	return $this->db->update(TABLES::$BSTATION_POST,$param);
    }
    
    public function deleteSellerPost($id) {
    	$param = array();
    	$param['is_deleted'] = 1;
    	$this->db->where('id',$id);
    	return $this->db->update(TABLES::$BSTATION_POST,$param);
    }
    
    public function searchBuyerBusinessStationPosts($params) {
    	$start_date = date('Y-m-d',strtotime("-15 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country,d.company_province, d.company_email, d.business_logo, 
    			d.annual_trad_volume, d.plan_id, d.gaurantee_period,d.is_logo_verified, d.rank,d.accept_chat,d.accept_offer,d.accept_community,d.accept_email, e.*,
    			g.profile_image as profile_image,f.user_category_id as catid,
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix,f.id as user_id,
    			(d.accept_chat+d.accept_offer+d.accept_community+d.accept_email) as is_active,i.flag');
    	$this->db->from(TABLES::$BSTATION_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$COUNTRY.' AS i','d.company_country=i.name','left');
    	$this->db->where('f.user_category_id',3);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	if(!empty($params['country'])) {
    		$this->db->where("d.company_country like '%".trim($params['country'])."%'",'',false);
    	}
    	if(!empty($params['keyword'])) {
    		$this->db->where("(h.title like '%".trim($params['keyword'])."%' OR h.description like '%".trim($params['keyword'])."%')",'',false);
    	}
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$this->db->select('busi_id');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER);
    	$this->db->where('my_busi_id',$params['busi_id']);
    	$query = $this->db->get();
    	$result1 = $query->result_array();
    	foreach ($result as $key=>$row) {
    		$result[$key]['community_id'] = '';
    		foreach ($result1 as $row1) {
    			if($row['busi_id'] == $row1['busi_id']) {
    				$result[$key]['community_id'] = $row1['busi_id'];
    			}
    		}
    	}
    	return $result;
    }
    
    public function getMyBuyerBusinessStationPosts($busi_id) {
    	$start_date = date('Y-m-d',strtotime("-15 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country,d.company_province, d.company_email, d.business_logo, 
    			d.annual_trad_volume, d.plan_id, d.gaurantee_period,d.is_logo_verified, d.rank, e.*,
    			g.profile_image as profile_image,f.user_category_id as catid,
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix,
    			(d.accept_chat+d.accept_offer+d.accept_community+d.accept_email) as is_active');
    	$this->db->from(TABLES::$BSTATION_POST.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->where('f.user_category_id',3);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	$this->db->where('h.busi_id',$busi_id);
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getTodaysBusinessStationPosts($busi_id) {
    	$today_date = date('Y-m-d');
    	$this->db->select('count(id) as posts');
    	$this->db->from(TABLES::$BSTATION_POST);
    	$this->db->where('status',1);
    	$this->db->where('is_deleted',0);
    	$this->db->where('busi_id',$busi_id);
    	$this->db->where("DATE(created_date) = '".$today_date."'",'',false);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    
    /* ********************* Stock Market Posts ************************ */
    public function getStockMarketPostById($id) {
    	$this->db->select('a.id,a.title,a.busi_id,b.company_name,c.name_prefix,c.name');
    	$this->db->from(TABLES::$STOCK_GOODS.' AS a');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','inner');
    	$this->db->join(TABLES::$USER.' AS c','b.id=c.busi_id','inner');
    	$this->db->where('a.id', $id);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function addStockMarketPostRequest($params) {
    	return $this->db->insert(TABLES::$STOCK_REQUEST,$params);
    }
    
    public function addStockMarketPostOffer($params) {
    	return $this->db->insert(TABLES::$STOCK_OFFER,$params);
    }
    
    public function searchStockMarketPosts($params) {
    	$start_date = date('Y-m-d',strtotime("-7 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country, d.company_province, d.company_email, d.business_logo, 
    			d.annual_trad_volume, d.plan_id, d.gaurantee_period, d.is_logo_verified, d.rank,d.accept_chat,d.accept_offer,
    			d.accept_community,d.accept_email, e.*,g.profile_image as profile_image,f.user_subcategory_id as catid,
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix,i.flag');
    	$this->db->from(TABLES::$STOCK_GOODS.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id = d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id = f.id','inner');
    	$this->db->join(TABLES::$COUNTRY.' AS i','d.company_country=i.name','left');
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('f.user_category_id IN(1,2)','',false);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	if(!empty($params['country'])) {
    		$this->db->where("d.company_country like '%".trim($params['country'])."%'",'',false);
    	}
    	if(!empty($params['keyword'])) {
    		$this->db->where("(h.title like '%".trim($params['keyword'])."%' OR h.description like '%".trim($params['keyword'])."%')",'',false);
    	}
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$this->db->select('busi_id');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER);
    	$this->db->where('my_busi_id',$params['busi_id']);
    	$query = $this->db->get();
    	$result1 = $query->result_array();
    	foreach ($result as $key=>$row) {
    		$result[$key]['community_id'] = '';
    		foreach ($result1 as $row1) {
    			if($row['busi_id'] == $row1['busi_id']) {
    				$result[$key]['community_id'] = $row1['busi_id'];
    			}
    		}
    	}
    	return $result;
    }
    
    public function getMyStockMarketPosts($busi_id) {
    	$start_date = date('Y-m-d',strtotime("-7 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country, h.usd_price as unit_price,h.quantity,
    			d.company_province, d.company_email, d.business_logo, d.annual_trad_volume, d.plan_id, d.gaurantee_period, 
    			d.is_logo_verified, d.rank,e.*,g.profile_image as profile_image,f.user_subcategory_id as catid,
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix');
    	$this->db->from(TABLES::$STOCK_GOODS.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id = d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id = d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id = f.id','inner');
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	$this->db->where('h.busi_id',$busi_id);
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function closeStockSellerPost($id) {
    	$param = array();
    	$param['status'] = 0;
    	$this->db->where('id',$id);
    	return $this->db->update(TABLES::$STOCK_GOODS,$param);
    }
    
    public function deleteStockSellerPost($id) {
    	$param = array();
    	$param['is_deleted'] = 1;
    	$this->db->where('id',$id);
    	return $this->db->delete(TABLES::$STOCK_GOODS);
    }
    
    public function searchBuyerStockMarketPosts($params) {
    	$start_date = date('Y-m-d',strtotime("-7 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country,d.company_province, d.company_email, d.business_logo,
    			d.annual_trad_volume, d.plan_id, d.gaurantee_period,d.is_logo_verified, d.rank,d.accept_chat,d.accept_offer,d.accept_community,d.accept_email, e.*,
    			g.profile_image as profile_image,f.user_subcategory_id as catid,
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix,
    			(d.accept_chat+d.accept_offer+d.accept_community+d.accept_email) as is_active,i.flag');
    	$this->db->from(TABLES::$STOCK_GOODS.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->join(TABLES::$COUNTRY.' AS i','d.company_country=i.name','left');
    	$this->db->where('f.user_category_id',3);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	if(!empty($params['country'])) {
    		$this->db->where("d.company_country like '%".trim($params['country'])."%'",'',false);
    	}
    	if(!empty($params['keyword'])) {
    		$this->db->where("(h.title like '%".trim($params['keyword'])."%' OR h.description like '%".trim($params['keyword'])."%')",'',false);
    	}
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	$this->db->select('busi_id');
    	$this->db->from(TABLES::$COMMUNITY_MEMBER);
    	$this->db->where('my_busi_id',$params['busi_id']);
    	$query = $this->db->get();
    	$result1 = $query->result_array();
    	foreach ($result as $key=>$row) {
    		$result[$key]['community_id'] = '';
    		foreach ($result1 as $row1) {
    			if($row['busi_id'] == $row1['busi_id']) {
    				$result[$key]['community_id'] = $row1['busi_id'];
    			}
    		}
    	}
    	return $result;
    }
    
    public function getMyBuyerStockMarketPosts($busi_id) {
    	$start_date = date('Y-m-d',strtotime("-7 days"));
    	$end_date = date('Y-m-d H:i:s');
    	$this->db->select('d.company_name, d.company_country,d.company_province, d.company_email, d.business_logo,
    			d.annual_trad_volume, d.plan_id, d.gaurantee_period,d.is_logo_verified, d.rank,d.accept_chat,d.accept_offer,d.accept_community,d.accept_email, e.*,
    			g.profile_image as profile_image,f.user_subcategory_id as catid,
    			g.*,h.title as title,h.description as stockdesc,h.usd_price as stockprice,h.quantity as stockqty,
    			h.created_date as create,h.image1,h.image2,h.image3,h.image4,h.is_locked,h.id as post_id,
    			f.name as contact_name,f.name_prefix as contact_prefix,
    			(d.accept_chat+d.accept_offer+d.accept_community+d.accept_email) as is_active');
    	$this->db->from(TABLES::$STOCK_GOODS.' AS h');
    	$this->db->join(TABLES::$BUSINESS_INFO.' AS d','h.busi_id=d.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO_IMAGE.' AS e','e.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER.' AS f','f.busi_id=d.id','inner');
    	$this->db->join(TABLES::$USER_INFO.' AS g','g.user_id=f.id','inner');
    	$this->db->where('f.user_category_id',3);
    	$this->db->where('f.is_contactperson',1);
    	$this->db->where('h.status',1);
    	$this->db->where('h.is_deleted',0);
    	$this->db->where('h.busi_id',$busi_id);
    	$this->db->where("DATE(h.created_date) > '".$start_date."'",'',false);
    	$this->db->order_by('h.created_date','DESC');
    	$this->db->group_by('h.id');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getTodaysStockMarketPosts($busi_id) {
    	$today_date = date('Y-m-d');
    	$this->db->select('count(id) as posts');
    	$this->db->from(TABLES::$STOCK_GOODS);
    	$this->db->where('status',1);
    	$this->db->where('is_deleted',0);
    	$this->db->where('busi_id',$busi_id);
    	$this->db->where("DATE(created_date) = '".$today_date."'",'',false);
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
    /* ******** Stock Market ************ */
    
    public function getCategoryVideodetailsById($id) {
    	$this->db->select('a.*,c.name as mainproduct,e.name as maincategory,f.name as subcategory');
    	$this->db->from(TABLES::$MAINSUBPRODUCTVEDIO.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mainproduct_id=c.id','inner');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_MAIN_CATEGORY. ' AS e','e.id=f.mcat_id','inner');
    	$this->db->where('a.id',$id);
    	$query = $this->db->get();
    	return $result = $query->result_array();
    }
    
    public function getMainProductBySubproductId($id) {
    	$this->db->select('a.name as subproduct,c.id as mainproduct_id,c.name as mainproduct,e.name as maincategory,f.name as subcategory,c.busi_id');
    	$this->db->from(TABLES::$SUB_PRODUCT.' AS a');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_MAIN_CATEGORY. ' AS e','e.id=f.mcat_id','inner');
    	$this->db->where('a.id',$id);
    	$query = $this->db->get();
    	return $result = $query->result_array();
    }
    
    public function getProductListByMainSubId($map) {
    	$this->db->select('a.*, b.name as subproduct, b.id as subproduct_id, c.name as mainproduct ,c.id as mainproduct_id, d.name as country,  f.name as subcategory,f.id as subcategory_id, e.name as maincategory, e.id as maincategory_id,h.company_name');
    	$this->db->from(TABLES::$PRODUCT_ITEM. ' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
    	$this->db->join(TABLES::$COUNTRY. ' AS d','a.country_id=d.id','left');
    	$this->db->join(TABLES::$PRODUCT_SUB_CATEGORY. ' AS f','f.id=c.subcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_MAIN_CATEGORY. ' AS e','e.id=f.mcat_id','inner');
    	$this->db->join(TABLES::$PRODUCT_VIDEO. ' AS g','g.product_item_id=a.id','inner');
    	$this->db->join(TABLES::$BUSINESS_INFO. ' AS h','h.id=a.busi_id','inner');
    	if(!empty($map['mainproduct_id']))
    		$this->db->where('a.mproduct_id',$map['mainproduct_id']);
    	//if(!empty($map['subproduct_id']))
    		//$this->db->where('a.sproduct_id',$map['subproduct_id']);
    	$this->db->where('a.status',1);
    	$this->db->order_by('a.id','ASC');
    	$this->db->group_by('a.id');
    	$query = $this->db->get();
    	//echo $this->db->last_query();
    	$result = $query->result_array();
    	return $result;
    }
    
    public function getMyProductItemList($busi_id,$query) {
    	$this->db->select('a.id,a.name');
    	$this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
    	$this->db->join(TABLES::$SUB_PRODUCT.' AS b','a.sproduct_id=b.id','left');
    	$this->db->join(TABLES::$MAIN_PRODUCT.' AS c','b.mproduct_id=c.id','inner');
    	$this->db->where('a.status',1);
    	$this->db->where('(b.status = 1 OR b.status IS NULL)','',false);
    	$this->db->where('c.status',1);
    	$this->db->where('a.busi_id',$busi_id);
    	$this->db->where("a.name like '%".$query."%' ",'',false);
    	$this->db->order_by('name','ASC');
    	$query = $this->db->get();
    	$result = $query->result_array();
    	return $result;
    }
    
   	public function getMainShippingServices($busi_id) {
   		$this->db->select('*');
   		$this->db->from(TABLES::$SHIPPER_SERVICES);
   		$this->db->where('status',1);
   		$this->db->where('is_special',0);
   		$this->db->order_by('name','ASC');
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getSpecialShippingServices($busi_id) {
   		$this->db->select('*');
   		$this->db->from(TABLES::$SHIPPER_SERVICES);
   		$this->db->where('status',1);
   		$this->db->where('is_special',1);
   		$this->db->order_by('name','ASC');
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getBusinessBranchesByBusiId($busi_id) {
   		$this->db->select('a.*,b.flag');
   		$this->db->from(TABLES::$BUSINESS_BRANCHES.' AS a');
   		$this->db->join(TABLES::$COUNTRY.' AS b','b.name=a.country','left');
   		$this->db->where('a.is_deleted',0);
   		$this->db->order_by('a.id','ASC');
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getInCommunity($my_busi_id,$busi_id) {
   		$this->db->select('*');
   		$this->db->from(TABLES::$COMMUNITY_MEMBER);
   		$this->db->where('my_busi_id',$my_busi_id);
   		$this->db->where('busi_id',$busi_id);
   		$this->db->where('is_deleted',0);
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getBusinessPaymentTerms($busi_id) {
   		$this->db->select('b.id,b.payment_terms');
   		$this->db->from(TABLES::$USERPAYMENT_TERMS.' AS a');
   		$this->db->join(TABLES::$PAYMENT_TERMS.' AS b','a.payment_terms_id=b.id','inner');
   		$this->db->where('a.busi_id',$busi_id);
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function updateBusinessLikes($busi_id,$visitor_id = 0) {
   		$this->db->select('a.id');
   		$this->db->from(TABLES::$BUSINESS_VISITORS.' AS a');
   		$this->db->where('a.busi_id',$busi_id);
   		$this->db->where('a.visitor_id',$visitor_id);
		$this->db->where('a.likes', 1);
   		$query = $this->db->get();
   		$result = $query->result_array();
   		if(count($result) <= 0) {
	   		$ip_address = getRealIP();
	   		$ipinfo = ip_info($ip_address,'location');
	   		$params = array();
	   		$params['busi_id'] = $busi_id;
	   		$params['visitor_id'] = $visitor_id;
	   		$params['city'] = $ipinfo['city'];
	   		$params['country'] = $ipinfo['country'];
	   		$params['ip_address'] = $ip_address;
	   		$params['likes'] = 1;
	   		$params['shares'] = 0;
	   		$params['visit_date'] = date('Y-m-d');
	   		$this->db->insert(TABLES::$BUSINESS_VISITORS,$params);
	   		$sql = "UPDATE ".TABLES::$BUSINESS_INFO." SET visit = visit + 1, likes = likes + 1 where id=".$busi_id;
	   		$this->db->query($sql);
	   		return $this->db->affected_rows();
   		} else {
   			return 0;
   		}
   	}
   	
   	public function updateCatalogueLikes($catalogue_id){
   		$sql = "UPDATE ".TABLES::$PRODUCT_CATALOGUE." SET likes = likes + 1 where id=".$catalogue_id;
   		$query = $this->db->query($sql);
   		return $this->db->affected_rows();
   	}
   	
   	public function updateProductLikes($product_id,$busi_id){
   		$this->db->select('id');
   		$this->db->from(TABLES::$PRODUCT_VISITORS);
   		$this->db->where('item_id', $product_id);
   		$this->db->where('busi_id', $busi_id);
   		$this->db->where('likes', 1);
   		$query = $this->db->get();
   		$row = $query->result_array();
   		if(count($row) <= 0) {
	   		$sql = "UPDATE ".TABLES::$PRODUCT_ITEM." SET visit = visit + 1, likes = likes + 1 where id=".$product_id;
	   		$query = $this->db->query($sql);
	   		$this->db->affected_rows();
	   		$ip_address = getRealIP();
	   		$ipinfo = ip_info($ip_address,'location');
	   		$params = array();
	   		$params['busi_id'] = $busi_id;
	   		$params['item_id'] = $product_id;
	   		$params['city'] = $ipinfo['city'];
	   		$params['country'] = $ipinfo['country'];
	   		$params['ip_address'] = $ip_address;
	   		$params['likes'] = 1;
	   		$params['shares'] = 0;
	   		$params['visit_date'] = date('Y-m-d');
	   		$this->db->insert(TABLES::$PRODUCT_VISITORS,$params);
	   		return 1;
   		} else {
   			return 0;
   		}
   	}
   	
   	public function addProductShare($params) {
   		$sql = "UPDATE ".TABLES::$PRODUCT_ITEM." SET visit = visit + 1, shares = shares + 1 where id=".$params['item_id'];
   		$query = $this->db->query($sql);
   		$this->db->affected_rows();
   		$this->db->insert(TABLES::$PRODUCT_VISITORS,$params);
   	}
   	
   	public function addProductVisit($params) {
   		$sql = "UPDATE ".TABLES::$PRODUCT_ITEM." SET visit = visit + 1 where id=".$params['item_id'];
   		$query = $this->db->query($sql);
   		$this->db->affected_rows();
   		$this->db->insert(TABLES::$PRODUCT_VISITORS,$params);
   	}
   	
   	public function addDesksiteShare($params) {
   		$sql = "UPDATE ".TABLES::$BUSINESS_INFO." SET visit = visit + 1, shares = shares + 1 where id=".$params['busi_id'];
   		$query = $this->db->query($sql);
   		$this->db->affected_rows();
   		$this->db->insert(TABLES::$BUSINESS_VISITORS,$params);
   	}
   	
   	public function addServiceShare($params) {
   		$sql = "UPDATE ".TABLES::$SHIPPER_SERVICES." SET visit = visit + 1, shares = shares + 1 where id=".$params['service_id'];
   		$query = $this->db->query($sql);
   		$this->db->affected_rows();
   		$this->db->insert(TABLES::$SERVICE_VISITORS,$params);
   	}
   	
   	public function addServiceVisit($params) {
   		$sql = "UPDATE ".TABLES::$SHIPPER_SERVICES." SET visit = visit + 1 where id=".$params['service_id'];
   		$query = $this->db->query($sql);
   		$this->db->affected_rows();
   		$this->db->insert(TABLES::$SERVICE_VISITORS,$params);
   	}
   	
   	public function getCompanyTradeInfo($busi_id) {
   		$this->db->select('*');
   		$this->db->from(TABLES::$TRADE_INFO);
   		$this->db->where('busi_id',$busi_id);
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getCompanyMarketInfo($mids) {
        $last_elem = substr($mids,strlen($mids)-1,strlen($mids));
        if($last_elem == ",")
            $mids = substr($mids,0,strlen($mids)-1);
   		$this->db->select('*');
   		$this->db->from(TABLES::$TRADMARKET);
   		$this->db->where("id IN(".$mids.")",'',false);
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getBusinessContactInfo($map) {
   		$this->db->select('a.id, a.busi_id, a.email, a.name_prefix, a.name, a.user_category_id, a.user_role,
    			b.id as busi_id,b.company_name, b.company_country, b.company_province, b.company_city,c.mobile_code as telephone_code,
    			b.telephone_city_code,c.mobile_number as telephone_number,b.company_street,b.company_email, b.business_logo,
    			b.annual_trad_volume, b.plan_id, b.gaurantee_period, b.is_logo_verified, b.likes, b.rank');
   		$this->db->from(TABLES::$USER.' AS a');
   		$this->db->join(TABLES::$BUSINESS_INFO.' AS b','a.busi_id=b.id','left');
   		$this->db->join(TABLES::$USER_INFO.' AS c','a.id=c.user_id','inner');
   		$this->db->where('a.account_activated', 1);
   		$this->db->where('a.is_suspend', 0);
   		$this->db->where('a.is_deleted', 0);
   		$this->db->where('b.is_disable', 0);
   		$this->db->where('a.is_contactperson',1);
   		$this->db->where('b.is_deleted', 0);
   		$this->db->where('b.id', $map['id']);
   		//$this->db->where("(f.status != 0)",'',false);
   		$this->db->order_by('a.created_date','DESC');
   		$this->db->group_by('a.id');
   		//echo $this->db->last_query();
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function addGeneralEnquiry($params) {
   		$this->db->insert(TABLES::$INQUIRY, $params);
   		return $this->db->insert_id();
   	}
   	
   	public function getCommunicationInfo($busi_id) {
   		$this->db->select('a.id,a.company_name,a.company_country,a.company_province,a.company_city,a.company_street,
   				a.company_email, a.business_logo,a.gaurantee_period,a.is_logo_verified,a.rank,a.accept_chat,a.accept_offer,
   				a.accept_community,a.accept_email,b.step');
   		$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
   		$this->db->join(TABLES::$PRODUCT_STAGE.' AS b','a.id=b.busi_id','left');
   		$this->db->where('a.id', $busi_id);
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}
   	
   	public function getBusinessCategory($busi_id) {
   		$this->db->select('a.id,b.user_category_id,b.user_subcategory_id');
   		$this->db->from(TABLES::$BUSINESS_INFO.' AS a');
   		$this->db->join(TABLES::$USER.' AS b','a.id=b.busi_id','inner');
   		$this->db->where('a.id', $busi_id);
   		$this->db->group_by('a.id');
   		$query = $this->db->get();
   		$result = $query->result_array();
   		return $result;
   	}

    public function getSelectedProductsByIds($product_ids)
    {
        $this->db->select('a.*,b.name as sub_product,c.name as main_product');
        $this->db->from(TABLES::$PRODUCT_ITEM.' AS a');
        $this->db->join(TABLES::$SUB_PRODUCT. ' AS b','a.sproduct_id = b.id','left');
        $this->db->join(TABLES::$MAIN_PRODUCT. ' AS c','a.mproduct_id=c.id','inner');
        $this->db->where_in('a.id',$product_ids);
        $this->db->order_by('a.id','ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
}
    
    


