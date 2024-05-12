<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Control_model');
		$this->load->model('Client_model');
	}

	private function check_login($redirect = 0, $pathWithSess = '/Client/')
	{
		
		if (!isset($_SESSION['id'])) {
			redirect(base_url('/Client/login'));
		} else {
			if ($redirect) {
				redirect(base_url($pathWithSess));
			}
			if(isset($_SESSION['role'] ) && ($_SESSION['role'] != 2)){
				redirect(base_url('/Admin/login'));
			}
		}
	}

	private function check_userData($type = NULL)
	{
		if (
			$_SESSION['fname'] &&
			$_SESSION['lname'] &&
			$_SESSION['tel'] &&
			$_SESSION['email'] &&
			$_SESSION['birthdate'][0] != '0'
		) {
			return true;
		} else {
			redirect(base_url('/Client/Detail/' . $_SESSION['id'] . '?type=edit&redform=' . $type));
			return false;
		}
	}

	/* ================= Routing ================= */


	public function index()
	{

		$this->load->view('/frontend/header');
		$this->load->view('/frontend/index');
		$this->load->view('/frontend/footer');
			
	}

	public function Products()
	{

		$this->load->view('/frontend/header');
		$this->load->view('/frontend/products');
		$this->load->view('/frontend/footer');
			
	}




	/* ------------------------------------ */
	/* ------------------------------------ */




	/* public function Register()
	{


		if (isset($_SESSION['id'])) {
			redirect(base_url("/Client"));
		}

		$this->load->view('/frontend/header');
		$this->load->view('/frontend/register');
		$this->load->view('/frontend/footer');
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

		$this->load->view('/frontend/header');
		$this->load->view('/frontend/login');
		$this->load->view('/frontend/footer');
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
