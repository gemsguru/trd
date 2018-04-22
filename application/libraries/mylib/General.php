<?php
class General { 
	
	public function __construct(){
		$this->CI =& get_instance();
	}
	
	public function getSelected() {
		$val = basename ( $_SERVER ['REQUEST_URI'], '?' . $_SERVER ['QUERY_STRING'] );
		return $val;
	}
	
	public function createCaptcha($form_id)
	{ 
		$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		//$chars1 = "0123456789";
		$word = '';
		for ($a = 0; $a <= 5; $a++) {
			$b = rand(0, strlen($chars) - 1);
			$word .= $chars[$b];
		}
		$this->word = $word;
		$this->CI->load->helper('captcha');
		$vals = array(
				'word'      => $this->word,
				'img_path'  => APPPATH.'../assets/captcha/',
				'img_url'   => base_url().'assets/captcha/',
				'img_id'   => 'captcha',
				'font_path'     =>'./system/fonts/texb.ttf',//'./path/to/fonts/texb.ttf',
				'img_width'     => '150',
				'img_height'    => 40,
				'expiration'    => 7200,
				'word_length'   => 8,
				'font_size'     => 16,
				'colors'        => array(
						'background' => array(255, 255, 255),
						'border' => array(150, 255, 255),
						'text' => array(255, 0, 0),
						'grid' => array(255, 255, 255)
						
				)
		);
		
		
		$cap = create_captcha($vals);
		$this->CI->session->set_userdata($form_id.'captcha',$cap['word']);
		return $cap;
	}
	public  function getUserSubCategories()
	{
		$this->CI->load->model ( 'Account_Model', 'account' );
		return $res = $this->CI->account->getUserSubCategories();
	}
	public  function getUserSubCategoriesById($id)
	{
		$this->CI->load->model ( 'Account_Model', 'account' );
		return $res = $this->CI->account->getUserSubCategoriesById($id);
	}
	public  function getProductCategories()
	{
		$this->CI->load->model ( 'Account_Model', 'account' );
		return $res = $this->CI->account->getProductCategories();
	}
	public  function getProductSubCategories()
	{
		$this->CI->load->model ( 'Account_Model', 'account' );
		return $res = $this->CI->account->getProductSubCategories();
	}
}
