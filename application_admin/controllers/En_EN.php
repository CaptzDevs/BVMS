<?php
defined('BASEPATH') or exit('No direct script access allowed');

class en_EN extends CI_Controller
{
	public $LANG;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Control_model');
		$this->load->model('Client_model');

		$this->LANG = 'en-EN';
	}
	/* ================= Routing ================= */

	public function index()
	{

		$data['LANG'] = $this->LANG;
		$data['slideData'] = $this->Client_model->getAllSlide();


		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/index',$data);
		$this->load->view('/frontend/footer',$data);
	}

	public function Search(){
		$queryText = $this->input->get("q");

		
		function containsNonEnglish($string) {
			// Match any character outside the ASCII range
			return preg_match('/[^\x20-\x7E]/', $string);
		}


		$searchArr = explode(' ',$queryText);
		$data['LANG'] = $this->LANG;
		$data['searchResult'] = array();
		if(containsNonEnglish($queryText)){
			$data['searchResult'] = $this->Client_model->search_AllProduct_TH($queryText);

		}else{

			$data['searchResult'] = $this->Client_model->search_AllProduct($queryText);
			
			if(count($data['searchResult']) == 0){
				
				$resultArray = array();
				foreach($searchArr as $txt){
					array_push($resultArray, $this->Client_model->search_AllProduct($txt));
				}
				
				$data['searchResult'] =  $resultArray[0];
			}
			
		}

		
		
		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/search',$data);
		$this->load->view('/frontend/footer',$data);
	}

	public function Products($type = NULL , $series_id = NULL)
	{
		if ($type == NULL) {
			$type = 'models';
		}

		$data['LANG'] = $this->LANG;
		$data['limit'] = 10;

		if (isset($type)) {

			if (strtolower($type) == 'models') {

				$data['modelList'] = $this->Client_model->get_AllModel()->result_array();
				$this->load->view('/frontend/header',$data);
				$this->load->view('/frontend/models', $data);
				$this->load->view('/frontend/footer',$data);

			} else if (strtolower($type) == 'parts') {

				$page = $this->input->get('p');
				$limit = 0;
		
				if(isset($page)){
					$limit = ((int) $page-1) * $data['limit'];
				}
		
				$data['path'] = "/products/parts";
		
				$data['productListCount'] = $this->Client_model->get_AllProduct("", "")->num_rows();
				$data['productList'] = $this->Client_model->get_AllProduct("", "",$limit)->result_array();
				$data['dataTotal'] = $data['productListCount'];

				$this->load->view('/frontend/header',$data);
				$this->load->view('/frontend/products', $data);
				$this->load->view('/frontend/footer',$data);

			}else if (strtolower($type) == 'series') {

				$page = $this->input->get('p');
				$limit = 0;
		
				if(isset($page)){
					$limit = ((int) $page-1) * $data['limit'];
				}
		
				$data['path'] = "/products/series/".$series_id."";
		
				$data['productListCount'] = $this->Client_model->get_AllProductWithSeries("", "",$series_id)->num_rows();
				$data['productList'] = $this->Client_model->get_AllProductWithSeries("", "",$series_id,$limit)->result_array();
				$data['dataTotal'] = $data['productListCount'];

				$this->load->view('/frontend/header',$data);
				$this->load->view('/frontend/products', $data);
				$this->load->view('/frontend/footer',$data);

			}
			else {
				redirect(base_url('/en-EN/products'));
			}
		}
	}

	public function Product($id = NULL)
	{
		if(is_numeric($id) == 0) redirect(base_url('en-EN/products'));


		$data['LANG'] = $this->LANG;

		$data['modelListData'] = $this->Control_model->get_modelList("", "")->result_array();
		$data['reviewList'] = $this->Control_model->get_allReviewList()->result_array();

		if (isset($id)) {
			$data["product_id"] = $id;

			$articleData = $this->Client_model->get_AllProduct($id)->result_array();

			if (count($articleData) == 0) {
				redirect(base_url('en-EN/products'));
			}

			$data['productData'] = $articleData[0];
			$data['articleImage'] = $this->Control_model->get_image($id, '1')->result_array();
		
			$data['articleFile'] = $this->Control_model->get_file($id)->result_array();
		}

		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/producrt_detail', $data);
		$this->load->view('/frontend/footer',$data);
	}


	public function Model($id = NULL)
	{

		if(is_numeric($id) == 0) redirect(base_url('en-EN/products/models'));

		$data['LANG'] = $this->LANG;
		$data['limit'] = 10;

		$page = $this->input->get('p');
        $limit = 0;

        if(isset($page)){
			$limit = ((int) $page-1) * $data['limit'];
        }

		$data['path'] = "/model/".$id;

		$data['productListCount'] = $this->Client_model->get_AllProduct("", $id)->num_rows();
		$data['productList'] = $this->Client_model->get_AllProduct("", $id,$limit)->result_array();
		$data['dataTotal'] = $data['productListCount'];
		
		$data['seriesDataList'] = $this->Control_model->get_series( $id )->result_array();


		$modelData =  $this->Control_model->get_model($id)->result_array();

		$data['model_name'] = isset($modelData[0]) ? $modelData[0]['model_name'] : NULL;
		$imageData = $this->Control_model->get_Image($id, '3')->result_array();
		$data['model_image'] =   isset($imageData[0]) ? $imageData[0]['image_url'] : NULL;


		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/products_model', $data);
		$this->load->view('/frontend/footer',$data);
	}

	public function About()
	{
		$data['LANG'] = $this->LANG;

		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/about', $data);
		$this->load->view('/frontend/footer',$data);
	}

	public function Reviews()
	{
		$data['LANG'] = $this->LANG;

		$data['reviewList'] = $this->Client_model->get_AllReview()->result_array();


		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/reviews', $data);
		$this->load->view('/frontend/footer',$data);
	}

	public function Review($id = NULL)
	{
		if(is_numeric($id) == 0) redirect(base_url('en-EN/Reviews'));


		$reviewData = $this->Client_model->get_AllReview($id)->result_array();
		$data['reviewData'] = $reviewData[0];
		$data['LANG'] = $this->LANG;


		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/review_detail', $data);
		$this->load->view('/frontend/footer',$data);
	}


	public function Contact()
	{
		$data['LANG'] = $this->LANG;

		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/contact',$data);
		$this->load->view('/frontend/footer',$data);
	}



	/* ------------------------------------ */
	/* ------------------------------------ */


	/* public function Register()
	{


		if (isset($_SESSION['id'])) {
			redirect(base_url("/Client"));
		}

		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/register');
		$this->load->view('/frontend/footer',$data);
		$this->load->view('/frontend/script/register_script');
		$this->load->view('/frontend/script/facebook_script');
		$this->load->view('/frontend/script/google_script');
	}
 */

	/* public function Login()
	{


		if (isset($_SESSION['id'])) {
			redirect(base_url("/Client"));
		}

		$this->load->view('/frontend/header',$data);
		$this->load->view('/frontend/login');
		$this->load->view('/frontend/footer',$data);
		$this->load->view('/frontend/script/login_script');
		$this->load->view('/frontend/script/facebook_script');
		$this->load->view('/frontend/script/google_script');

	}

	public function Logout()
	{


		if (!isset($_SESSION['id'])) {
			redirect(base_url("/Client/login"));
		}

		if ($_SESSION['register_type'] == '1') {
			$this->session->sess_destroy();
			redirect(base_url("/Client/login"));

		} else if ($_SESSION['register_type'] == '2') {
			$this->session->sess_destroy();
			$this->load->view('/frontend/script/logout_script');
		}
		else if ($_SESSION['register_type'] == '3') {
			$this->session->sess_destroy();
			redirect(base_url("/Client/login"));

		}
	} */

	/* ================= Method ================= */

	public function User_Register_Google($data)
	{

		$checkEmail = $this->Control_model->checkDuplicateEmail('user', $data['email'], '3');

		if ($checkEmail->num_rows() == 0) {

			$data['prename'] = '1';
			$data['register_type'] = '3';
			$data['token_id'] = $data['ggid'];
			$data['password'] = md5($data['ggid']);
			$data['date_add'] =  date('Y-m-d H:i:s');

			unset($data['ggid']);

			$isRegister = $this->Control_model->register('user', $data);

			echo $isRegister;

			$data['id'] = $isRegister;

			$this->User_Login_Google($data);
		} else {
			echo json_encode(array('error' => "อีเมลนี้ได้ลงทะเบียนไปแล้ว", 'errorCode' => '1'));
		}
	}

	public function User_Register_Facebook($data)
	{

		$checkEmail = $this->Control_model->checkDuplicateEmail('user', $data['email'], '2');

		if ($checkEmail->num_rows() == 0) {

			$data['prename'] = '1';
			$data['register_type'] = '2';
			$data['token_id'] = $data['fbid'];
			$data['password'] = md5($data['fbid']);
			$data['date_add'] =  date('Y-m-d H:i:s');

			unset($data['fbid']);

			$isRegister = $this->Control_model->register('user', $data);

			echo $isRegister;

			$data['id'] = $isRegister;

			$this->User_Login_Facebook($data);
		} else {
			echo json_encode(array('error' => "อีเมลนี้ได้ลงทะเบียนไปแล้ว", 'errorCode' => '1'));
		}
	}


	public function User_Register()
	{

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);


		$checkEmail = $this->Control_model->checkDuplicateEmail('user', $data['email'], '1');

		if ($checkEmail->num_rows() == 0) {

			$data['register_type'] = '1';
			$data['password'] = md5($data['password']);
			$data['date_add'] =  date('Y-m-d H:i:s');

			$isRegister = $this->Control_model->register('user', $data);

			echo $isRegister;

			$data['id'] = $isRegister;

			$this->User_login($data);
		} else {
			echo json_encode(array('error' => "อีเมลนี้ได้ลงทะเบียนไปแล้ว", 'errorCode' => '1'));
		}
	}

	public function User_login($user_data = NULL)
	{
		$prenameArr = array("เด็กชาย", "เด็กหญิง", "นาย", "นาง", "นางสาว");

		if (isset($user_data)) {

			$newdata = array(
				'id' => $user_data['id'],
				'prename' =>  $user_data['prename'],
				'fname'  => $user_data['fname'],
				'lname'  => $user_data['lname'],
				'email'     => $user_data['email'],
				"tel" => '',
				"birthdate" => '',
				'register_type'     => $user_data['register_type'],
				"profile" => '',
				'role' => '2'

			);

			$this->session->set_userdata($newdata);
			$this->Control_model->update('tbl_user', 'id', $user_data['id'], array('date_login' => date('Y-m-d H:i:s')));
		}
		/* ------------------------------------------------- */
		if (!isset($user_data)) {

			$stream = $this->security->xss_clean($this->input->raw_input_stream);
			$data = json_decode($stream, true);

			$user_data = $this->Control_model->login('user', $data['user_email'], md5($data['password']), '1');

			if ($user_data->num_rows() > 0) {
				$user_data = $user_data->result_array();
				$user_data = $user_data[0];

				$newdata = array(
					'id' => $user_data['id'],
					'prename' =>  $user_data['prename'],
					'fname'  => $user_data['fname'],
					'lname'  => $user_data['lname'],
					'email'     => $user_data['email'],
					"tel" => $user_data['tel'],
					"birthdate" => $user_data['birthdate'],
					'register_type'     => $user_data['register_type'],
					"profile" => $user_data['image'],
					'role' => '2'
				);

				$this->session->set_userdata($newdata);
				$this->Control_model->update('tbl_user', 'id', $user_data['id'], array('date_login' => date('Y-m-d H:i:s')));

				echo true;
			} else {
				echo json_encode(array('error' => "อีเมลหรือรหัสผ่านไม่ถูกต้อง", 'errorCode' => '2'));
			}
		}
	}


	public function User_Login_Facebook($user_data = NULL)
	{

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		$isRegister = $this->Control_model->checkDuplicateEmail('user', $data['email'], '2');

		if ($isRegister->num_rows() == 0) {

			$this->User_Register_Facebook($data);
		} else if ($isRegister->num_rows() > 0) {

			$stream = $this->security->xss_clean($this->input->raw_input_stream);
			$data = json_decode($stream, true);
			$user_data = $this->Control_model->login('user', $data['email'], md5($data['fbid']), '2');

			if ($user_data->num_rows() > 0) {
				$user_data = $user_data->result_array();
				$user_data = $user_data[0];

				$newdata = array(
					'id' => $user_data['id'],
					'prename' =>  $user_data['prename'],
					'fname'  => $user_data['fname'],
					'lname'  => $user_data['lname'],
					'email'     => $user_data['email'],
					"tel" => $user_data['tel'],
					"birthdate" => $user_data['birthdate'],
					'register_type'     => $user_data['register_type'],
					"profile" => $user_data['image'],
					"register_type" => $user_data['register_type'],
					'role' => '2'
				);

				$this->session->set_userdata($newdata);
				$this->Control_model->update('tbl_user', 'id', $user_data['id'], array('date_login' => date('Y-m-d H:i:s')));

				echo true;
			} else {
				echo json_encode(array('error' => "อีเมลหรือรหัสผ่านไม่ถูกต้อง", 'errorCode' => '2'));
			}
		}
	}

	public function User_Login_Google($user_data = NULL)
	{

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		$isRegister = $this->Control_model->checkDuplicateEmail('user', $data['email'], '3');

		if ($isRegister->num_rows() == 0) {

			$this->User_Register_Google($data);
		} else if ($isRegister->num_rows() > 0) {

			$stream = $this->security->xss_clean($this->input->raw_input_stream);
			$data = json_decode($stream, true);

			$user_data = $this->Control_model->login('user', $data['email'], md5($data['ggid']), '3');

			if ($user_data->num_rows() > 0) {
				$user_data = $user_data->result_array();
				$user_data = $user_data[0];

				$newdata = array(
					'id' => $user_data['id'],
					'prename' =>  $user_data['prename'],
					'fname'  => $user_data['fname'],
					'lname'  => $user_data['lname'],
					'email'     => $user_data['email'],
					"tel" => $user_data['tel'],
					"birthdate" => $user_data['birthdate'],
					'register_type'     => $user_data['register_type'],
					"profile" => $user_data['image'],
					"register_type" => $user_data['register_type'],
					'role' => '2'
				);

				$this->session->set_userdata($newdata);
				$this->Control_model->update('tbl_user', 'id', $user_data['id'], array('date_login' => date('Y-m-d H:i:s')));

				echo true;
			} else {
				echo json_encode(array('error' => "อีเมลหรือรหัสผ่านไม่ถูกต้อง", 'errorCode' => '2'));
			}
		}
	}
}
