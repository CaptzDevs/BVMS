<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Control_model');
		$this->load->model('Client_model');
		$this->load->model('Dashboard_model');

	}

	private function check_login($redirect = 0, $pathWithSess = 'admin.php/Admin/AdminList')
	{

		if ($_SESSION['role'] == '2') {
			redirect(base_url("admin.php/Client"));
		}

		if (!isset($_SESSION['id']) && $_SESSION['role'] != '2') {
			redirect(base_url('admin.php/Admin/login'));
		} else {
			if ($redirect) {
				redirect(base_url($pathWithSess));
			}
		}
	}

	public function index()
	{
		$this->check_login(true);
	}

	/* ================== Rounting ====================*/

	public function Model($id = NULL , $section = NULL){

		$this->check_login();


	

		$data['edit'] = 0;

		if(isset($id)){
			
			$data['edit'] = 1;
			$data["product_id"] = $id;
			$modelData =  $this->Control_model->get_model($id)->result_array();
			
		if(count($modelData) == 0){
			redirect(base_url("/Admin/Models"));
		}
			$data['modelData'] = $modelData[0];
			$data['articleImage'] = $this->Control_model->get_image($id,'3')->result_array();
		
		}

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/model_form',$data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/model_form_script');


	}


	public function Branch($id = NULL){

		$this->check_login();

		$data['edit'] = 0;

		if(isset($id)){
			$data['edit'] = 1;
			$data["product_id"] = $id;

			$articleData = $this->Control_model->get_branch($id)->result_array();

			$data['checkedData'] =  json_encode($this->Dashboard_model->getCCTVBranchData($id));

			if(count($articleData) == 0){
				redirect(base_url("admin.php/Admin/Branchs"));
			}

			$data['productData'] = $articleData[0];
		
		}

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/branch_form',$data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/branch_form_script');

	}

	public function Review($id = NULL){

		$this->check_login();

		$data['edit'] = 0;

		if(isset($id)){
			$data['edit'] = 1;
			$data["product_id"] = $id;

			$reviewData =  $this->Control_model->get_review($id)->result_array();
			if(count($reviewData) == 0){
				redirect(base_url("/Admin/Reviews"));
			}

			$data['reviewData'] = $reviewData[0];
			$data['articleImage'] = $this->Control_model->get_image($id,'2')->result_array();
			
			
		}

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/review_form',$data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/review_form_script');

	}
	/* ====================== */

	public function Series($model_id = NULL , $id = NULL){

		$data['edit'] = 0;

		if(isset($model_id)){
			$data['model_id'] = $model_id;
			$data['series_id'] = $id;

		

			if(isset($id)){
				$data["product_id"] = $id;
				$data['edit'] = 1;
				$seriesData =  $this->Control_model->get_series($model_id,$id)->result_array();

				$data['seriesData'] = $seriesData[0];

				$this->load->view('/backend/admin_header');
				$this->load->view('/backend/series_form',$data);
				$this->load->view('/backend/admin_footer');
				$this->load->view('/backend/script/series_form_script');
			}else{
				$data['serieListtData'] = $this->Control_model->get_seriesListAll($model_id)->result_array();
			
				$this->load->view('/backend/admin_header');
				$this->load->view('/backend/admin_series_list',$data);
				$this->load->view('/backend/admin_footer');
				$this->load->view('/backend/script/admin_series_list_script');
			}
			
			return 0;
		}
	}

	public function Models(){
		$this->check_login();
		
		$data['modelListData'] = $this->Control_model->get_modelList("","")->result_array();

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/admin_model_list',$data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/admin_model_list_script');

	}

	public function Article($id = NULL){

		$this->check_login();

		$data['edit'] = 0;
		$data['categoryListData'] = $this->Control_model->get_allCategoryList()->result_array();

		if(isset($id)){
			$data["article_id"] = $id;
			$data['edit'] = 1;
			$articleData =  $this->Control_model->get_Article($id)->result_array();
			$data['articleData'] = $articleData[0];

			$data['articleImage'] = $this->Control_model->get_image($id)->result_array();
			$data['articleFile'] = $this->Control_model->get_file($id)->result_array();

		}

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/article_form',$data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/article_form_script');

	}


	public function Slide($id = NULL){

		$this->check_login();

		$data['edit'] = 0;
		if(isset($id)){
			$data['edit'] = 1;
			$data["slide_id"] = $id;

			$articleData =  $this->Control_model->get_slides($id)->result_array();

			if(count($articleData) == 0){
				redirect(base_url("/Admin/Slides"));
			}

			$data['slideData'] = $articleData[0];
		}

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/slide_form',$data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/slide_form_script');

	}

	public function Branchs()
	{

		$this->check_login();

	
			$data['modelListData'] = $this->Control_model->get_modelList("","")->result_array();
			$data['articleList'] = $this->Control_model->get_branch()->result_array();


			$this->load->view('/backend/admin_header');
			$this->load->view('/backend/admin_branch_list', $data);
			$this->load->view('/backend/admin_footer');
			$this->load->view('/backend/script/admin_branch_list_script');


	
	}

	public function Slides()
	{

		$this->check_login();

	
			$data['articleList'] = $this->Control_model->get_slides()->result_array();

			$this->load->view('/backend/admin_header');
			$this->load->view('/backend/admin_slide_list', $data);
			$this->load->view('/backend/admin_footer');
			$this->load->view('/backend/script/admin_slide_list_script');

	}


	public function Reviews()
	{

		$this->check_login();

		/* if(!isset($category_id)){
			$data['categoryName'] = array();
			$data['categoryListData'] = $this->Control_model->get_allCategoryList()->result_array();
			$data['articleList'] = $this->Control_model->get_AllArticle()->result_array();
			
		}else{

		
		} */
			
		/* 	$data['categoryName'] = $this->Control_model->get_categoryName($category_id)->result_array();
			$data['categoryListData'] = array(); */
			$data['reviewList'] = $this->Control_model->get_AllReview()->result_array();

			
			$this->load->view('/backend/admin_header');
			$this->load->view('/backend/admin_review_list', $data);
			$this->load->view('/backend/admin_footer');
			$this->load->view('/backend/script/admin_review_list_script');

	}

	public function ExpiredList($category_id = NULL)
	{

		$this->check_login();

		if(!isset($category_id)){
			$data['categoryName'] = array();
			$data['categoryListData'] = $this->Control_model->get_allCategoryList()->result_array();
			$data['articleList'] = $this->Control_model->get_AllExpiredArticle()->result_array();
			
		}else{

			$data['categoryName'] = $this->Control_model->get_categoryName($category_id)->result_array();
			$data['categoryListData'] = array();
			$data['articleList'] = $this->Control_model->get_AllExpiredArticle($category_id)->result_array();
		}
			
			$this->load->view('/backend/admin_header');
			$this->load->view('/backend/admin_article_list', $data);
			$this->load->view('/backend/admin_footer');
			$this->load->view('/backend/script/admin_article_list_script');

	}

	/* ----------------------------------------------- */


	public function AdminList()
	{

		$this->check_login();

		if ($_SESSION['role'] != '0') redirect(base_url("admin.php/Admin/Branchs"));

		$role =  $this->input->post('appointment_status');
		$fname =  $this->input->post('fname');
		$lname =  $this->input->post('lname');

		$data['adminList'] = $this->Control_model->get_AdminList($fname, $lname, $role)->result_array();

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/admin_list', $data);
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/admin_list_script');
	}

	/* ----------------------------------------------- */

	public function Detail($admin_id = NULL)
	{

		$this->check_login();

		//check permission only same user_id in session can access

		if ($_SESSION['role'] == '1' && $admin_id != $_SESSION['id']) {
			redirect(base_url("/Admin"));
		}

		//-----------------------
		$data['admin_id'] = $admin_id;
		if ($admin_id) {
			$data['adminData'] =  $this->Control_model->get_admin($admin_id)->result_array();
		} else {
			$data['adminData'] =  $this->Control_model->get_admin()->result_array();
		}

		if (isset($_GET['type']) && $_GET['type'] == 'edit' && count($data['adminData']) > 0) {

			$this->load->view('/backend/admin_header');
			$this->load->view('/backend/admin_edit', $data);
			$this->load->view('/backend/admin_footer');
			$this->load->view('/backend/script/admin_edit_script', $data);
		} else {
			$this->load->view('/backend/admin_header');
			$this->load->view('/backend/admin_detail', $data);
			$this->load->view('/backend/admin_footer');
			$this->load->view('/backend/script/admin_detail_script', $data);
		}
	}

	/* ----------------------------------------------- */



	/* ----------------------------------------------- */

	public function Register()
	{

		$this->check_login();

		if (isset($_SESSION['id']) && $_SESSION['role'] != '0') redirect(base_url("admin.php/Admin/AdminList"));

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/admin_register');
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/admin_register_script');
	}

	/* ----------------------------------------------- */

	public function Login()
	{

		if (isset($_SESSION['id'])) {
			redirect(base_url("admin.php/Admin"));
		}

		$this->load->view('/backend/admin_header');
		$this->load->view('/backend/admin_login');
		$this->load->view('/backend/admin_footer');
		$this->load->view('/backend/script/admin_login_script');
	}



	/* ----------------------------------------------- */

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("admin.php/Admin/login"));
	}




	/* ----------------------------------------------- */

	/* ================== Method ====================*/

	public function updateAdminDetail()
	{
		if ($_SESSION['role'] != '2') {


			$stream = $this->security->xss_clean($this->input->raw_input_stream);
			$dataUpdate = json_decode($stream, true);
			$id = $dataUpdate['admin_id'];

			unset($dataUpdate['admin_id']);

			if (isset($dataUpdate['password'])) {
				$dataUpdate['password'] = md5($dataUpdate['password']);
			}

			$isDone =  $this->Control_model->update('tbl_admin', 'id', $id, $dataUpdate);


			if ($isDone) {

				if($_SESSION['id'] == $id){
					$adminData = $this->Control_model->getAdmin($id);
					$newdata = array(
						'id' => $adminData['id'],
						'pname' =>  $adminData['admin_prename'],
						'fname'  => $adminData['admin_fname'],
						'lname'  => $adminData['admin_lname'],
						'email'     => $adminData['admin_email'],
						'branch'     => $adminData['admin_branch'],
						"tel" => $adminData['admin_tel'],
						"profile" => $adminData['admin_image'],
						'role' =>  $adminData['admin_type'],
						'register_type' => '1',
					);

					$this->session->set_userdata($newdata);
				}

				echo 1;
			} else {
				echo json_encode(array('error' => 'ไม่สามารถบันทึกได้'));
			}
		} else {
			echo json_encode(array('error' => 'คุณไม่มีสิทธิ์เข้าถึงฟังก์ชั่นนี้'));
		}
	}

	public function searchAdminList()
	{


		$fname =  $this->input->post('admin_fname');
		$lname =  $this->input->post('admin_lname');

		$adminList = $this->Control_model->get_AdminList($fname, $lname, '1')->result_array();

?>

		<table class="table text-md-nowrap" id="example2">
			<thead>
				<tr>
					<th style="width: 5%;" class="border-bottom-0">#</th>
					<th style="width: 20%;" class="border-bottom-0">ชื่อ-นามสกุล</th>
					<th style="width: 20%;" class="border-bottom-0">อีเมล</th>
					<th style="width: 20%;" class="border-bottom-0">เข้าสู่ระบบล่าสุด</th>
					<th style="width: 20%;" class="border-bottom-0">สร้างเมื่อ</th>
					<th style="width: 10%;" class="border-bottom-0">รายละเอียด</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($adminList as $key => $value) { ?>
					<tr>
						<td><?= $key + 1 ?></td>
						<td><?= $value['admin_fname'] . ' ' . $value['admin_lname'] ?></td>
						<td><?= $value['admin_email'] ?></td>

						<td><?= $value['date_login'][0] == '0' ? 'ยังไม่ได้เข้าสู่ระบบ' : $this->Control_model->fullDateTime2($value['date_login'])  ?></td>
						<td><?= $this->Control_model->fullDateTime2($value['date_add'])  ?></td>


						<td>
							<?php if ($_SESSION['role'] == '1' && $_SESSION['id'] == $value['id']) { ?>
								<a target="_blank"  href="<?= base_url('admin.php/Admin/Detail/' . $value['id']) ?>" class="btn btn-info" style="border-radius: 5px; padding-top: 5px;"><i class="typcn typcn-clipboard"></i></button>
								<?php } elseif ($_SESSION['role'] == '0') { ?>
									<a target="_blank"  href="<?= base_url('admin.php/Admin/Detail/' . $value['id']) ?>" class="btn btn-info" style="border-radius: 5px; padding-top: 5px;"><i class="typcn typcn-clipboard"></i></button>
									<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<script>
			$("#example2").dataTable();
		</script>
	<?php


	}

	public function searchAppointmentList()
	{

		$dateStart =  $this->input->post('dateStart');
		$dateEnd =  $this->input->post('dateEnd');
		$appointment_status =  $this->input->post('appointment_status');
		$fname =  $this->input->post('fname');
		$lname =  $this->input->post('lname');
		$section =  $this->input->post('section');

		


		$appointment_status = $appointment_status == -1 ? NULL : $appointment_status;

		$statsArr = array('Reject', 'Appointment', 'Waiting');
		$statsArrColor = array('reject', 'success', 'wait');

		$appointmentList = $this->Control_model->get_AppointmentList($dateStart, $dateEnd, $appointment_status,$section, $fname, $lname)->result_array();


		function convertToThaiDate($date) {
			$dateTime = new DateTime($date);
			$day = $dateTime->format('d');
			$month = $dateTime->format('n'); // Month without leading zeros
			$year = $dateTime->format('Y') + 543; // Convert to Thai year
		
			// Thai month names
			$thaiMonths = array(
				1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
				4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
				7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
				10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
			);
		
			// Replace the month number with the corresponding Thai month name
			$thaiMonth = $thaiMonths[$month];
		
			// Format the Thai date string
			$thaiDateString = "วันที่ {$day} เดือน {$thaiMonth} {$year}";
		
			return $thaiDateString;
		}

		$full_dateStart = convertToThaiDate($dateStart);
		$full_dateEnd = convertToThaiDate($dateEnd);

		$dateRangeText = ''.$full_dateStart.' ถึง '.$full_dateEnd.' '

	?>
		<table id="example13" class="table key-buttons text-md-nowrap">
			<thead>
				<tr>
					<th style="width: 5%;" class="border-bottom-0">#</th>
					<th style="width: 15%;" class="border-bottom-0">ชื่อ-นามสกุล</th>
					<th style="width: 15%;" class="border-bottom-0">วันที่นัด</th>
					<th style="width: 15%;" class="border-bottom-0">นัดเมื่อ</th>
					<th style="width: 15%;" class="border-bottom-0">ประเภทการนัด</th>
					<th style="width: 18%;" class="border-bottom-0">สถานะ</th>
					<th style="width: 25%;" class="border-bottom-0">ตรวจโดย</th>
					<th style="width: 20%;" class="border-bottom-0">รายละเอียด</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($appointmentList as $key => $value) { ?>
					<tr>
						<td><?= $key + 1 ?></td>
						<td><?= $value['fname'] . ' ' . $value['lname']  ?></td>
						<td><?= $this->Control_model->fullDateTime2($value['appointment_date']) ?></td>
						<td><?= $this->Control_model->fullDateTime2($value['date_add']) ?></td>
						<td><?= $value['appointment_name'] ?></td>
						<td>
							<div class="status-<?= $statsArrColor[(int) $value['appointment_status']] ?>">
								<?= $statsArr[(int) $value['appointment_status']] ?>

							</div>
							<span style="font-size: .5rem;"><?= $value['admin_update_date'][0] != '0' ? 'เมื่อ ' . $this->Control_model->fullDateTime2($value['admin_update_date']) : '' ?></span>
						</td>
						<td><?= $value['admin_fname'] ?   $value['admin_fname'] . ' ' . $value['admin_lname'] : '-' ?></td>
						<td> <a target="_blank"  href="<?= base_url('/Admin/AppointmentList/' . $value['id']) ?>" class="btn btn-info" style="border-radius: 5px; padding-top: 5px;"><i class="typcn typcn-clipboard"></i></button> </td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
		<script>

		


			$(document).ready(function() {
				pdfMake.fonts = {
					THSarabun: {
						normal: 'THSarabun.ttf',
						bold: 'THSarabun-Bold.ttf',
						italics: 'THSarabun-Italic.ttf',
						bolditalics: 'THSarabun-BoldItalic.ttf'
					}
				}



				$('#example13').DataTable({
					/*       order: [
					          [0, 'desc'],
					          [1, 'desc'],
					          [2, 'asc'],
					          [3, 'asc'],

					      ], */
					pageLength: 100,
					dom: 'Bfrtip',
					buttons: [{
							extend: 'excelHtml5',
							title: `รายการนัดตรวจสุขภาพ <?= $dateRangeText  ?>`,
							exportOptions: {
								/*  columns: ':visible' */
								columns: [0, 1, 2, 3, 4, 5, 6]

							}
						},
						{ // กำหนดพิเศษเฉพาะปุ่ม pdf
							"extend": 'pdf', // ปุ่มสร้าง pdf ไฟล์
							"text": 'PDF',
							title: `รายการนัดตรวจสุขภาพ <?= $dateRangeText  ?>`,
							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6]


							}, // ข้อความที่แสดง
							"pageSize": 'A4',
							"orientation": 'portrait',
							"customize": function(doc) {
								doc.defaultStyle = {
									font: 'THSarabun',
									fontSize: 12
								};
							}
						},
						'colvis'
					]
				});
			});
		</script>

<?php

	}



	public function Admin_Register()
	{

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);


		$checkEmail = $this->Control_model->checkDuplicateEmail('admin', $data['admin_email']);

		if ($checkEmail->num_rows() == 0) {

			$data['password'] = md5($data['password']);
			$data['date_add'] =  date('Y-m-d H:i:s');
			$data['admin_type'] =  '1';


			$isRegister = $this->Control_model->register('admin', $data);

			echo $isRegister;

			$data['id'] = $isRegister;


			/* 	$this->Admin_login($data); */
		} else {
			echo json_encode(array('error' => "อีเมลนี้ได้ลงทะเบียนไปแล้ว", 'errorCode' => '1'));
		}
	}

	public function Admin_login($admin_data = NULL)
	{
		$prenameArr = array("เด็กชาย", "เด็กหญิง", "นาย", "นาง", "นางสาว");
		
		if (isset($admin_data)) {

			$newdata = array(
				'id' => $admin_data['id'],
				'pname' =>  $admin_data['admin_prename'],
				'fname'  => $admin_data['admin_fname'],
				'lname'  => $admin_data['admin_lname'],
				'email'     => $admin_data['admin_email'],
				'branch'     => $admin_data['admin_branch'],
				/* "tel" => $admin_data['admin_tel'],
				"profile" => $admin_data['admin_image'], */
				'role' =>  $admin_data['admin_type'],
				'register_type' => '1',
			);

			$this->session->set_userdata($newdata);
			$this->Control_model->update('tbl_admin', 'id', $admin_data['id'], array('date_login' => date('Y-m-d H:i:s')));
		}
		/* ------------------------------------------------- */

		if (!isset($admin_data)) {

			$stream = $this->security->xss_clean($this->input->raw_input_stream);
			$data = json_decode($stream, true);

			$admin_data = $this->Control_model->login('admin', $data['admin_email'], md5($data['password']));

			if ($admin_data->num_rows() > 0) {
				$admin_data = $admin_data->result_array();
				$admin_data = $admin_data[0];

				$newdata = array(
					'id' => $admin_data['id'],
					'pname' =>  $admin_data['admin_prename'],
					'fname'  => $admin_data['admin_fname'],
					'lname'  => $admin_data['admin_lname'],
					'email'     => $admin_data['admin_email'],
					'branch'     => $admin_data['admin_branch'],
					"tel" => $admin_data['admin_tel'],
					"profile" => $admin_data['admin_image'],
					'role' =>  $admin_data['admin_type'],
					'register_type' => '1',

				);

				$this->session->set_userdata($newdata);
				$this->Control_model->update('tbl_admin', 'id', $admin_data['id'], array('date_login' => date('Y-m-d H:i:s')));

				echo true;
			} else {
				echo json_encode(array('error' => "อีเมลหรือรหัสผ่านไม่ถูกต้อง", 'errorCode' => '2'));
			}
		}
	}
}
