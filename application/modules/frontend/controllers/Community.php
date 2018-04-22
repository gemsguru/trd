<?php
class Community extends MX_Controller {
	
	public function __construct() {
		parent::__construct ();
		$current_lang = $this->session->userdata('my_lang');
		if(!$current_lang) {
			$current_lang = 'english';
			$this->session->set_userdata('my_lang','english');
		}
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->helper('mylang');
		$this->load->model('Account_Model','account');
		$this->lang->load($current_lang.'_home_page_lang', $current_lang);
		$fb_config = parse_ini_file ( APPPATH . "config/FB.ini" );
	} 
	
	public function index() {
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}

		$busi_id = $this->session->userdata('busi_id');
		$plan_id = $this->session->userdata('tsuser')['plan_id'];
		$cat_id = $this->session->userdata('tsuser')['category_id'];
		$Country= $this->account->getCountry();
		$this->template->set ('Country', $Country);
		$this->template->set ('busi_id', $busi_id);
		$this->load->model('Product_Model', 'product' );
		$this->load->model('Tool_model', 'toolmodel' );
		$userinfo = $this->product->getUserInfoByBussId($busi_id);
		$this->template->set ('userinfo', $userinfo);
		$usertype = $this->product->getUserTypebyBusinessId($busi_id);
		$this->template->set ('usertype', $usertype);
		$allposts = $this->product->communityPostListByAlluser($busi_id);
		$this->template->set ('allposts', $allposts);
		$add_requests = $this->product->getInvitationCommunityCount($busi_id);
		$this->template->set ('add_requests', $add_requests);
		$myposts = $this->product->communityPostListByBusinessId($busi_id);
		$this->template->set ('myposts', $myposts);
		$this->template->set ('mypost_count', count($myposts));
		$productslist = $this->product->getProductlist($busi_id);
		$this->template->set ( 'products', $productslist);
		$communitymember = $this->product->getCommunityMember($busi_id);
		$firstpost = $this->product->communityMemberFirstPost($busi_id);
		$contact_details = $this->account->getBusinessContactDetails($busi_id);
		$this->template->set('contact_details',$contact_details);
		$this->load->library('mylib/StorageLib');
		$storage = $this->storagelib->getMyBusinessStorage($busi_id);
		$this->template->set ( 'storage', $storage);
		$mystorage = $this->toolmodel->getCommunityPlan($plan_id,$cat_id);
		$oisstorage = $this->toolmodel->getEnquiryPlan($plan_id,$cat_id);
		if($cat_id == 3) {
			$oisstorage[0]['intvalue'] = 250;
			$mystorage[0]['intvalue'] = 250;
		}
		$this->template->set ( 'mystorage', $mystorage);
		$this->template->set ( 'oisstorage', $oisstorage);
		$this->template->set ( 'communitymember', $communitymember);
		$this->template->set ( 'firstpost', $firstpost);
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout ('default')
		->title ( 'The Community' )
		->set_partial ( 'header', 'default/community-header' )
		->set_partial ( 'footer', 'default/community-footer' );
		$this->template->build ('community/community');
	}
	
	public function getCommunityRealtimePosts() {
		$busi_id = $this->session->userdata('busi_id');
		$allposts = $this->product->communityPostListByAlluser($busi_id);
		$this->template->set ('busi_id', $busi_id);
		$this->template->set ('allposts', $allposts);
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/posts','',true);
		$myposts = $this->product->communityPostListByBusinessId($busi_id);
		$this->template->set ('myposts', $myposts);
		$this->template->set ('mypost_count', count($myposts));
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html1 = $this->template->build ('community/pages/myposts','',true);
		echo json_encode(array('html1'=>$html,'html2'=>$html1));
	}
	
	public function getCommunityMyPosts() {
		$busi_id = $this->session->userdata('busi_id');
		$myposts = $this->product->communityPostListByBusinessId($busi_id);
		$this->template->set ('mypost_count', count($myposts));
		$this->template->set ('myposts', $myposts);
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/myposts','',true);
		$this->template->set ('mypost_count', count($myposts));
		$this->template->set ('myposts', $myposts);
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html1 = $this->template->build ('community/pages/mypostdetails','',true);
		echo json_encode(array('html1'=>$html,'html2'=>$html1));
	}
	
	public function getCommunityPostDetail($postid) {
		$busi_id = $this->session->userdata('busi_id');
		$myposts = $this->product->getPostDetailsById($postid);
		$this->template->set ('allpost', $myposts[0]);
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/post_detail','',true);
		echo $html;
	}
	
	
	public function communityPostInsert(){
		//$busi_id = $this->session->userdata('busi_id');
		//$usertype = $this->session->userdata('usertype');
	
		$params['busi_id'] = $this->session->userdata('busi_id');
		$params['title'] = $this->input->post('title');
		$params['product_item_id'] = $this->input->post('product_id');
		$params['description'] = $this->input->post('description');
		$params['usd_price'] = $this->input->post('usd_price');
		$params['quantity'] = $this->input->post('quantity');
		//$params['profilecheck'] = $this->input->post('profilecheck');
		$params['status'] = 1;
		$params['created_date'] = date('Y-m-d H:i:s');
			
		$pathname = 'community_images';
		if (! is_dir ( 'assets/images/' . $pathname )) {
			mkdir ( './assets/images/' . $pathname, 0777, TRUE );
		}
		$files = $_FILES;
		$cpt = 0;
		$k =1;
		$size = 0;
		$cimages = $this->input->post('cimg');
		$location =  "assets/images/".$pathname."/";
		if (!empty($_FILES['postphoto1']['name'])) {
			$Img = uploadImage($_FILES['postphoto1'],$location,array('jpeg','jpg','png','gif'),2097152,'bstation');
			if($Img['status'] == 1) {
				$params['image1'] = $Img['image'];
				$size = $size + $_FILES['postphoto1']['size'];
			} else {
				$params['image1'] = $cimages[0];
			}
		} else {
			$params['image1'] = $cimages[0];
		}
		if (!empty($_FILES['postphoto2']['name'])) {
			$Img1 = uploadImage($_FILES['postphoto2'],$location,array('jpeg','jpg','png','gif'),2097152,'bstation1');
			if($Img1['status'] == 1) {
				$params['image2'] = $Img1['image'];
				$size = $size + $_FILES['postphoto2']['size'];
			} else {
				$params['image2'] = $cimages[1];
			}
		} else {
			$params['image2'] = $cimages[1];
		}
		if (!empty($_FILES['postphoto3']['name'])) {
			$Img2 = uploadImage($_FILES['postphoto3'],$location,array('jpeg','jpg','png','gif'),2097152,'bstation2');
			if($Img2['status'] == 1) {
				$params['image3'] = $Img2['image'];
				$size = $size + $_FILES['postphoto3']['size'];
			} else {
				$params['image3'] = $cimages[2];
			}
		} else {
			$params['image3'] = $cimages[2];
		}
		if (!empty($_FILES['postphoto4']['name'])) {
			$Img3 = uploadImage($_FILES['postphoto4'],$location,array('jpeg','jpg','png','gif'),2097152,'bstation3');
			if($Img3['status'] == 1) {
				$params['image4'] = $Img3['image'];
				$size = $size + $_FILES['postphoto4']['size'];
			} else {
				$params['image4'] = $cimages[3];
			}
		} else {
			$params['image4'] = $cimages[3];
		}
	
		$this->load->model('Product_Model', 'product' );
		$response = $this->product->communityPostInsert($params);
		/* ************** Storage Implementation *************** */
		if($size != 0) {
			$this->load->library('mylib/StorageLib');
			$storage = array();
			$storage['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
			$storage['field'] = 'community';
			$storage['datasize'] = round($size/1024,2);
			$this->storagelib->updateStorageByBusiId($storage);
		}
		/* ***************************************************** */
		echo json_encode($response);
	
	}
	
	public function deleteCommunityPost() {
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}
		$data = array ();
		$size = 0;
		$data['id'] =$this->input->post('id');
		$data['busi_id'] = $_SESSION['busi_id'];
		//$this->load->library ( 'mylib/PostLib', 'postlib' );
		//$result = $this->postlib->deletePost($data);
		$this->load->model('Product_Model', 'product' );
		$this->load->model('Community_Model', 'communitymodel' );
		$result = $this->product->deleteCommunityPost($data);
		$path = FCPATH."assets";
		if ($result == true){
			$pdetail = $this->communitymodel->getCommunityPostDetailById($data['id']);
			if(!empty($pdetail[0]['image1'])) {
				$size = $size - filesize(FCPATH."assets/".$pdetail[0]['image1']);
				unlink( $path . $pdetail[0]['image1'] );
			} elseif(!empty($pdetail[0]['image2'])) {
				$size = $size - filesize(FCPATH."assets/".$pdetail[0]['image2']);
				unlink( $path . $pdetail[0]['image2'] );
			} elseif(!empty($pdetail[0]['image3'])) {
				$size = $size - filesize(FCPATH."assets/".$pdetail[0]['image3']);
				unlink( $path . $pdetail[0]['image3'] );
			} elseif(!empty($pdetail[0]['image4'])) {
				$size = $size - filesize(FCPATH."assets/".$pdetail[0]['image4']);
				unlink( $path . $pdetail[0]['image4'] );
			}
			/* ************** Storage Implementation *************** */
			if($size != 0) {
				$this->load->library('mylib/StorageLib');
				$storage = array();
				$storage['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
				$storage['field'] = 'community';
				$storage['datasize'] = round($size/1024,2);
				$this->storagelib->updateStorageByBusiId($storage);
			}
			/* ***************************************************** */
			$results['status'] = '1';
			$results['msg'] = 'Post Deleted successfully';
		}else{
			$results['status'] = '0';
			$results['msg'] = 'Please try again.';
		}
		echo json_encode($results);
	}
	
	public function viewUserPost(){
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}
		$this->load->model('Community_Model','communitymodel');
		$data = array ();
		$busi_id =$this->input->post('busi_id');
		$data['busi_id'] = $_SESSION['busi_id'];

		$posts = $this->product->communityPostListByBusinessId($busi_id);
		//$this->template->set ('myposts', $myposts);
		$this->template->set ('busi_id', $busi_id);
		$this->template->set ('allposts', $posts);
		$this->template->set ( 'page', 'community' );
		$this->template->set ( 'browser_icon', 'community.ico' );
		$this->template->set ( 'userId', '' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/memberpost','',true);
		echo $html;
	}
	public function postLike() {
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}
		
		$post_id = $this->input->post('post_id');
		$this->load->model('Account_Model', 'account' );
		$user_data = $this->account->getUserDataByBusiId($_SESSION ['busi_id']);
		$data = array(
				'post_id' => $post_id,
				'liked_by' => $_SESSION ['busi_id'],
				'status' =>'1',
				'created_datetime'=>date('Y-m-d H:i:s')
	
		);
		if(!empty($user_data['nickname']) && $user_data['nickname'] != NULL){
			$data['hidden'] = 1;
			$data['hidden_name'] = $user_data['nickname'];
		}
		$this->load->model('Product_Model', 'product' );
		$result['id'] = $this->product->postLike ( $data );
	
		if ( $result ['id']  > 0) {
			$result ['status'] = 1;
			$result ['msg'] = 'You Liked this post.';
			//redirect ( 'post' );
		} else {
			$result ['status'] = 0;
			$result ['msg'] = 'You Already Liked this post.';
			//redirect ( 'post' );
		}
		echo json_encode($result);
	}
	
	public function commentPost() {
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}
		$this->load->model('Account_Model', 'account' );
		$user_data = $this->account->getUserDataByBusiId($this->input->post('user_id'));

		$data = array ();

		$data = array(
				'post_id' => $this->input->post('post_id'),
				'user_id' => $this->input->post('user_id'),
				'comment' => $this->input->post('comment'),
				'commented_by' =>$_SESSION ['busi_id'],
				'status' => '1',
				'created_datetime' => date ( 'Y-m-d h:i:s' )
		);
		
		if(!empty($user_data['nickname']) && $user_data['nickname'] != NULL){
			$data['hidden'] = 1;
			$data['hidden_name'] = $user_data['nickname'];
		}
		$this->load->model('Product_Model', 'product' );
		
		$result['id'] = $this->product->commentPost($data);
		
		if ( $result ['id']  > 0) {
			$result ['status'] = 1;
			$result ['msg'] = 'Comment Posted Successfully.';
		} else {
			$result ['status'] = 0;
			$result ['msg'] = 'Sorry! please try again.';
		}
		echo json_encode($result);
	}
	
	/*public function viewCommentPost() {
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}
		$data = array ();
		$data['id'] = $this->input->post('id');
		$this->load->model('Product_Model', 'product' );
		$result = $this->product->viewCommentPost($data);
		echo json_encode($result);
	}
	
	public function viewPostlike() {
		if (! isset ( $_SESSION ['busi_id'] )) {
			redirect ( base_url () );
		}
		$data = array ();
		$data['id'] = $this->input->post('id');
		$this->load->model('Product_Model', 'product' );
		$result = $this->product->getCommunityPostLike($data);
		echo json_encode($result);
	}*/
	
	public function editProfile() {
		$busi_id = $this->session->userdata('busi_id');
		$this->load->model('Product_Model', 'product' );
		$userinfo = $this->product->getUserInfoByBussId($busi_id);
		$this->template->set ('userinfo', $userinfo);
		$this->template->set ( 'page', 'edit_profile' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/edit_profile','',true);
		echo $html;
	}
	
	public function viewPostLike() {
	
		$post_id = $this->input->post('id');
		$this->load->model('Product_Model', 'product' );
		$postlike = $this->product->getCommunityPostLike($post_id);
		$this->template->set ( 'postlike', $postlike );
		$this->template->set ( 'post_id', $post_id );
		$this->template->set ( 'page', 'community' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/post_like','',true);
		echo $html;
	}
	
	public function viewPostcomment() {
	
		$post_id = $this->input->post('id');
		$busi_id = $_SESSION['busi_id'];
		$this->load->model('Product_Model', 'product' );
		$postcomment = $this->product->getCommunityPostComment($post_id);
		$this->template->set ( 'postcomment', $postcomment );
		$this->template->set ( 'post_id', $post_id );
		$this->template->set ( 'busi_id', $busi_id );
		$this->template->set ( 'page', 'community' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/post_comment','',true);
		echo $html;
	}
	
	public function addToCommunity($id) {
		$this->load->model('Community_Model', 'mycommunity' );
		$params = array();
		$params['my_busi_id'] = $this->session->userdata('tsuser')['busi_id'];
		$params['busi_id'] = $id;
		$this->load->model('Product_Model','product');
		$tscat_id = $this->session->userdata('tsuser')['category_id'];
		$resp = array();
		if(!empty($this->session->userdata('tsuser')['busi_id'])) { 
			$mydetails = $this->product->getCommunicationInfo($params['my_busi_id']);
			if($params['my_busi_id'] != $params['busi_id']) {
				if(($tscat_id == 1 && $mydetails[0]['step'] == 4) || ($tscat_id == 2 && $mydetails[0]['step'] == 2) || ($tscat_id == 3 && $mydetails[0]['step'] == 2)) {
					if($tscat_id != 3) {
						$isadded = $this->mycommunity->addToMyCommunity($params);
						if($isadded) {
							$resp['status'] = 1;
							$resp['msg'] = 'Add to community request has been sent to this member, waiting his acceptance, to check or delete this request go to your Station/Alerts/Add rquest.';
						} else {
							$resp['status'] = 0;
							$resp['msg'] = 'ALREADY ADDED TO YOUR COMMUNITY';
						}
					} else {
						if($mydetails[0]['accept_community'] == 1) {
							$isadded = $this->mycommunity->addToMyCommunity($params);
							if($isadded) {
								$resp['status'] = 1;
								$resp['msg'] = 'Add to community request has been sent to this member, waiting his acceptance, to check or delete this request go to your Station/Alerts/Add rquest.';
							} else {
								$resp['status'] = 0;
								$resp['msg'] = 'ALREADY ADDED TO YOUR COMMUNITY';
							}
						} else {
							$resp['status'] = 0;
							// $resp['msg'] = 'Oops.. It seems that you have turned this feature OFF.. Please go to " My Station", then click on "Tools" icon, and select " Control Panel", then Turn it ON.';
							$resp['msg'] = 'This buyer in not allow adding to community..';
							
						}
					}
				} else {
					$resp['status'] = 0;
					$resp['msg'] = 'Please establish your Community first, to do this complete your registration process and build your desksite';
				}
			} else {
				$resp['status'] = 0;
				$resp['msg'] = 'Oops, this is your community..!';
			}
		} else {
			$resp['status'] = 0;
			$resp['msg'] = 'LOGIN TO ADD IN YOUR COMMUNITY';
		}
		
		echo json_encode($resp);
	}
	
	public function selectProductImages($id) {
		$this->load->model('Product_Model', 'product' );
		$product = $this->product->getProductItemById($id);
		$this->template->set ( 'product', $product[0] );
		$this->template->set ( 'page', 'community' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/product-images','',true);
		echo $html;
	}
	
	public function updateMyNickName() {
		$this->load->model('Account_Model');
		$params = array();
		$params['busi_id'] = $_SESSION ['busi_id'];
		$params['nickname'] = $this->input->post('nickname');
		$this->Account_Model->updateUserByBusiId($params);
		echo '<script>window.close();</script>';
	}
	
	public function updateOnlineStatus() {
		$this->load->model('Account_Model');
		$params = array();
		$params['busi_id'] = $_SESSION ['busi_id'];
		$params['is_online'] = $this->input->post('status');
		$this->Account_Model->updateUserByBusiId($params);
		echo json_encode(array('status'=>1));
	}
	
	public function searchMyCommunityMemberByName() {
		$this->load->model('Community_Model','communitymodel');
		$name = $this->input->get('name');
		$busi_id = $_SESSION ['busi_id'];
		$result = $this->communitymodel->searchCommunityMember($busi_id,$name);
		$this->template->set ( 'communitymember', $result);
		$this->template->set ( 'page', 'community' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/mymembers','',true);
		echo json_encode(array('html'=>$html,'members'=>count($result)));
	}
	
	public function deleteMyCommunityMembers() {
		$this->load->model('Community_Model','communitymodel');
		$members = $this->input->get('members');
		$busi_id = $_SESSION ['busi_id'];
		$result = $this->communitymodel->deleteCommunityMembers($busi_id,$members);
		$resp = array();
		if($result) {
			$resp['status'] = 1;
		} else {
			$resp['status'] = 0;
		}
		echo json_encode($resp);
	}
	
	public function deleteCommunityRequest($id) {
		$this->load->model('Community_Model','communitymodel');
		$result = $this->communitymodel->deleteCommunityRequest($id);
		$resp = array();
		if($result) {
			$resp['msg'] = "Community add request deleted successfully.";
		} else {
			$resp['status'] = "Failed to delete request";
		}
		echo json_encode($resp);
	}
	
	public function acceptCommunityRequest($id) {
		$this->load->model('Community_Model','communitymodel');
		$params = array();
		$params['id'] = $id;
		$params['status'] = 1;
		$result = $this->communitymodel->acceptCommunityRequest($params);
		$resp = array();
		if($result) {
			$resp['msg'] = "Community add request accepted successfully.";
		} else {
			$resp['status'] = "Failed to accept request";
		}
		echo json_encode($resp);
	}
	
	public function getCommunityRequests() {
		$this->load->library('mylib/CommunityLib');
		$busi_id = $this->session->userdata('tsuser')['busi_id'];
		$sendcommunityrequest = array();
		$sendcommunityrequest = $this->communitylib->getInvitationCommunityRequest($busi_id);
		$mycommunityrequest = $this->communitylib->getSendCommunityRequest($busi_id);
		$this->template->set ( 'sendcommunityrequest', $sendcommunityrequest);
		$this->template->set ( 'mycommunityrequest', $mycommunityrequest);
		$this->template->set ( 'page', 'home' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/addrequest','',true);
		echo $html;
	}
	public function newBuyerRequest($id) {
		$this->load->model ( 'Account_Model', 'account' );
		$busi_id = $this->session->userdata('busi_id');
		$this->load->model('Community_Model', 'communitymodel' );
		$post = $this->communitymodel->getCommunityPostById($id);
		$Country= $this->account->getCountry();
		$contact_details = $this->account->getBusinessContactDetails($busi_id);
		$this->template->set ( 'Country', $Country);
		$this->template->set('post',$post);
		$this->template->set('seller_id',$post[0]['busi_id']);
		$this->template->set('busi_id',$busi_id);
		$this->template->set('contact_details',$contact_details);
		$this->template->set ( 'page', 'bstation' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/sendrequest');
	}
	
	public function saveBuyerRequest() {
		$userId = $this->session->userdata('tsuser')['userid'];
		$params = array();
		$params['post_id'] = $this->input->post('post_id');
		$params['message'] = $this->input->post('TextArea3');
		$params['details'] = $this->input->post('TextArea4');
		$params['contact_person'] = $this->input->post('name');
		$params['company'] = $this->input->post('Company');
		$params['additional_email'] = $this->input->post('email');
		$params['phone'] = $this->input->post('phone');
		$params['country'] = $this->input->post('country');
		$params['seller_id'] = $this->input->post('seller_id');
		$params['buyer_id'] = $this->session->userdata('busi_id');
		$params['created_date'] = date('Y-m-d H:i:s');
		$size = 0;
		if (!empty($_FILES['FileUpload3']['name'])) {
			$certiPath = FCPATH . "assets/images/user_images/$userId/buyerrequest";
			if (!file_exists($certiPath)) {
				mkdir($certiPath, 0777, true);
				chmod($certiPath, 0777);
			}
			$certiPath = "assets/images/user_images/$userId/buyerrequest";
			$imgupload = uploadImage($_FILES['FileUpload3'],$certiPath,array('jpeg','jpg','png','gif','pdf','doc','docx','xls','xlsx'),20971521,'br');
			if($imgupload['status'] == 1) {
				$params['attachment'] = $imgupload['image'];
				$size = $size + $_FILES['FileUpload3'] ['size'];
			}
		}
		$this->load->model('Product_Model', 'product' );
		$this->product->addCommunityPostRequest($params);
		/* ************** Storage Implementation *************** */
		if($size != 0) {
			$this->load->library('mylib/StorageLib');
			$storage = array();
			$storage['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
			$storage['field'] = 'inquiries';
			$storage['datasize'] = round($size/1024,2);
			$this->storagelib->updateStorageByBusiId($storage);
		}
		/* ***************************************************** */
		echo json_encode(array('status'=>1));
	}
	
	public function newSellerOffer($id) {
		$this->load->model ( 'Account_Model', 'account' );
		$busi_id = $this->session->userdata('busi_id');
		$this->load->model('Community_Model', 'communitymodel' );
		$post = $this->communitymodel->getCommunityPostById($id);
		$Country= $this->account->getCountry();
		$contact_details = $this->account->getBusinessContactDetails($busi_id);
		$this->template->set ( 'Country', $Country);
		$this->template->set('post',$post);
		$this->template->set('seller_id',$post[0]['busi_id']);
		$this->template->set('busi_id',$busi_id);
		$this->template->set('contact_details',$contact_details);
		$this->template->set ( 'page', 'bstation' );
		$this->template->set_theme('default_theme');
		$this->template->set_layout (false);
		$html = $this->template->build ('community/pages/sendoffer');
	}
	
	public function saveSellerOffer() {
		$userId = $this->session->userdata('tsuser')['userid'];
		$params = array();
		$params['post_id'] = $this->input->post('post_id');
		$params['message'] = $this->input->post('TextArea3');
		$params['details'] = $this->input->post('TextArea4');
		$params['contact_person'] = $this->input->post('name');
		$params['price'] = $this->input->post('Price');
		$params['unit_type'] = $this->input->post('Combobox1');
		$params['quantity'] = $this->input->post('Qty');
		$params['company'] = $this->input->post('Company');
		$params['additional_email'] = $this->input->post('email');
		$params['phone'] = $this->input->post('phone');
		$params['country'] = $this->input->post('country');
		$params['buyer_id'] = $this->input->post('buyer_id');
		$params['seller_id'] = $this->session->userdata('busi_id');
		$params['created_date'] = date('Y-m-d H:i:s');
		$size = 0;
		if (!empty($_FILES['FileUpload3']['name'])) {
			$certiPath = FCPATH . "assets/images/user_images/$userId/selleroffer";
			if (!file_exists($certiPath)) {
				mkdir($certiPath, 0777, true);
				chmod($certiPath, 0777);
			}
			$certiPath = "assets/images/user_images/$userId/selleroffer";
			$imgupload = uploadImage($_FILES['FileUpload3'],$certiPath,array('jpeg','jpg','png','gif','pdf','doc','docx','xls','xlsx'),20971521,'br');
			if($imgupload['status'] == 1) {
				$params['attachment'] = $imgupload['image'];
				$size = $size + $_FILES['FileUpload3'] ['size'];
			}
		}
		$this->load->model('Product_Model', 'product' );
		$this->product->addCommunityPostOffer($params);
		/* ************** Storage Implementation *************** */
		if($size != 0) {
			$this->load->library('mylib/StorageLib');
			$storage = array();
			$storage['busi_id'] = $this->session->userdata('tsuser')['busi_id'];
			$storage['field'] = 'offers';
			$storage['datasize'] = round($size/1024,2);
			$this->storagelib->updateStorageByBusiId($storage);
		}
		/* ***************************************************** */
		echo json_encode(array('status'=>1));
	}
	
	public function shareCommunityPost($postid) {
		$share_id = $this->session->userdata('busi_id');
		$params = array();
		$params['post_id'] = $postid;
		$params['share_id'] = $share_id;
		$params['shared_date'] = date('Y-m-d H:i:s');
		$this->load->model('Community_Model','communitymodel' );
		$result = $this->communitymodel->communityPostShareInsert($params);
		if($result) {
			echo json_encode(array('msg'=>'Post shared in your community'));
		} else {
			echo json_encode(array('msg'=>'Failed to share post'));
		}
	}
	
	public function visitCommunityPost($postid) {
		$this->load->model('Community_Model', 'communitymodel' );
		$result = $this->communitymodel->updateCommunityVisit($postid);
	}
		
}