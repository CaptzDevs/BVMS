<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Control_model');
		$this->load->model('Dashboard_model');

		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		redirect(base_url("/Client"));
	}
	/* ------------------------------------------- */

	/* 
		$data (object array) : user data that make appointment or cancel appointment  
		$type (string) : appointment , cancel

		mailsender = mailsender@bangkokhatyaihealth.com 
	*/

	public function _sendMailAdmin($appointmentData, $type = 'appointment')
	{

		$this->load->library('email');
		$data['appointmentData'] = $appointmentData->result_array();
		$app_section = $data['appointmentData'][0]['appointment_section'];

		if ($app_section == '1') {
			$email_to = 'bhhcheckup@bgh.co.th';
		} else if ($app_section == '2') {
			$email_to = 'bhhchkappointment@bgh.co.th';
		}

		if ($type == 'appointment') {

			$data['titleEng'] = 'New Appointment';
			$data['title'] = 'ทำการนัด';

			$this->email->subject('New Appointment - bangkokhatyaihealth');
		} else if ($type == 'cancel') {

			$data['titleEng'] = 'Cancel Appointment';
			$data['title'] = 'ยกเลิกการนัด';

			$this->email->subject('Cancel Appointment - bangkokhatyaihealth');
		}

		$this->email->from('mailsender@bangkokhatyaihealth.com', 'bangkokhatyaihealth');
		$this->email->to($email_to);

		$this->email->set_mailtype("html");
		$this->email->message($this->load->view('/frontend/email_template', $data, true));

		/* $this->email->send() */
	}

	public function _sendMailUser($appointmentData, $type = 'appointment')
	{

		$this->load->library('email');

		$data['appointmentData'] = $appointmentData->result_array();


		$email_to = $data['appointmentData'][0]['email'];

		if ($type == 'appointment') {

			$data['titleEng'] = 'New Appointment';
			$data['title'] = 'ทำการนัด';

			$this->email->subject('New Appointment - bangkokhatyaihealth');
		} else if ($type == 'cancel') {

			$data['titleEng'] = 'Cancel Appointment';
			$data['title'] = 'ยกเลิกการนัด';

			$this->email->subject('Cancel Appointment - bangkokhatyaihealth');
		}

		$this->email->from('mailsender@bangkokhatyaihealth.com', 'bangkokhatyaihealth');
		$this->email->to($email_to);

		$this->email->set_mailtype("html");
		$this->email->message($this->load->view('/frontend/email_template', $data, true));

		if ($this->email->send()) {
			/* echo 1; */
		} else {
			/* echo 0; */
		}
	}

	/* ------------------------------------------- */

	public function getCCTVTotal(){
		$cctvData = $this->Dashboard_model->getCCTVTotal();
		echo json_encode($cctvData);

	}

	public function getCCTVTotalHistory(){
		$date = isset($_GET['date'] ) ? $_GET['date']  : date('Y-m-d'); 
		$nDate = isset($_GET['ndate'] ) ? $_GET['ndate']  : 5; 

		$cctvData = $this->Dashboard_model->getCCTVTotalHistory($date,$nDate);

		echo json_encode($cctvData);

	}

	public function getSession(){
        print_r(json_encode($_SESSION));
	}

	public function getMapData($id = null){

		$branchData = $this->Control_model->get_branch($id)->result_array();
		/* 
		{
			"id": 1,
			"title": "สาขา 1",
			"price": 83000,
			"category": 1,
			"marker_image": "https://images.unsplash.com/photo-1590496794008-383c8070b257?q=80&w=1991&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
			"url": "detail-01.html",
			"address": "859 Stuart Street",
			"latitude": "7.0199992",
			"longitude": "100.4913476",
			"ribbon": "<i class='fa fa-thumbs-up'></i>",
			"total": 356,
			"available": 2,
			"down": 1,
			"f__air_condition": 1,
			"f__microwave": 1
		},
		*/
		$mapData = array();

		foreach( $branchData  as $value) {
			$locations = explode( ',', $value['branch_location'] );
			$latitude = '0';
			$longitude = '0';

			if(count($locations) > 1){
				$latitude = $locations[0];
				$longitude = $locations[1];
				
			$data = array(
				"id" => $value['id'],
				"title" => $value['branch_name'],
				"price" => 100,
				"category" => 1,
				"marker_image" => base_url('/uploads/image/'.$value['branch_image']),
				"url"=> base_url('/Dashboard/branch/'. $value['id']) ,
				"address"=> $value['branch_address'],
				"description"=> $value['description'],
				"latitude"=> $latitude,
				"longitude"=> $longitude,
				"ribbon"=> "<i class='fa fa-thumbs-up'></i>",
				"total"=> 356,
				"available"=> 2,
				"down"=> 1,
				"http"=> 100,
				"https"=> 300,
				"f__air_condition"=> 1,
				"f__microwave"=> 1
			);


			array_push($mapData ,$data);
		}

		};

		print_r( json_encode($mapData));
	}

	public function updateProductRowOrder()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		print_r($data);

		foreach ($data as $value) {
			$this->Control_model->update('tbl_product', "id", $value['id'], $value);
		}
	}

	public function updateSlideRowOrder()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		print_r($data);

		foreach ($data as $value) {
			$this->Control_model->update('tbl_slide', "id", $value['id'], $value);
		}
	}


	public function updateModelRowOrder()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		print_r($data);

		foreach ($data as $value) {
			$this->Control_model->update('tbl_model', "id", $value['id'], $value);
		}
	}

	public function updateSeriesRowOrder()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		print_r($data);

		foreach ($data as $value) {
			$this->Control_model->update('tbl_series', "id", $value['id'], $value);
		}
	}



	public function updateReviewRowOrder()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		print_r($data);

		foreach ($data as $value) {
			$this->Control_model->update('tbl_review', "id", $value['id'], $value);
		}
	}

	public function saveModel()
	{
		$data['model_name'] = $this->input->post('model_name');
		$data['create_date'] = date('Y-m-d H:i:s');


		$insert_id = $this->Control_model->save_data('model', $data);


		if ($insert_id) {
			echo $this->getModelList();
		} else {
			echo 0;
		}
	}


	public function saveSeries()
	{
		$data['series_name'] = $this->input->post('series_name');
		$data['model_id'] = $this->input->post('model_id');

		$data['create_date'] = date('Y-m-d H:i:s');


		$insert_id = $this->Control_model->save_data('series', $data);

		if ($insert_id) {
			echo $this->getSeriesList(	$data['model_id'] );
		} else {
			echo 0;
		}
	}

	public function editSeries()
	{

		$data['id'] = $this->input->post('id');
		$data['model_id'] = $this->input->post('model_id');
		$data['series_name'] = $this->input->post('series_name');

		$isEdit = $this->Control_model->edit_data('series', $data);

		if ($isEdit) {
			echo $this->getSeriesList(	$data['model_id'] );
		} else {
			echo 0;
		}
	}

	public function editSeriesDetail()
	{

		$data['id'] = $this->input->post('id');
		$data['series_name'] = $this->input->post('series_name');
		$isEdit = $this->Control_model->edit_data('series', $data);

		if ($isEdit) {
			echo $data['id'];
		} else {
			echo 0;
		}
	}

	public function editModel()
	{

		$data['id'] = $this->input->post('id');
		$data['model_name'] = $this->input->post('model_name');

		$isEdit = $this->Control_model->edit_data('model', $data);

		if ($isEdit) {
			echo $this->getModelList();
		} else {
			echo 0;
		}
	}

	public function editModelDetail()
	{

		$data['id'] = $this->input->post('id');
		$data['model_name'] = $this->input->post('model_name');
		$isEdit = $this->Control_model->edit_data('model', $data);

		if ($isEdit) {
			echo $data['id'];
		} else {
			echo 0;
		}
	}



	public function renameFile()
	{

		$data['id'] = $this->input->post('id');
		$data['file_name'] = $this->input->post('file_name');

		$isEdit = $this->Control_model->edit_data('file', $data);

		if ($isEdit) {
			echo 1;
		} else {
			echo 0;
		}
	}

	public function hideData()
	{
		$data['id'] = $this->input->post('id');
		$data['data_status'] = '0';
		$table = $this->input->post('table');

		$isDelete = $this->Control_model->delete_data($table, $data);

		echo $isDelete;/* $this->getModelList(); */
	}


	public function showData()
	{
		$data['id'] = $this->input->post('id');
		$data['data_status'] = '1';

		$table = $this->input->post('table');
		$isDelete = $this->Control_model->delete_data($table, $data);

		echo $isDelete;/* $this->getModelList(); */
	}


	public function deleteModel()
	{
		$data['id'] = $this->input->post('id');
		$data['data_status'] = '0';

		$isDelete = $this->Control_model->delete_data('model', $data);

		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteModelPermanant()
	{
		$data['id'] = $this->input->post('id');

		$isDelete = $this->Control_model->delete_data_permanant('model', $data);

		echo $isDelete;/* $this->getModelList(); */
	}

	public function deletSeriesPermanant()
	{
		$data['id'] = $this->input->post('id');

		$isDelete = $this->Control_model->delete_data_permanant('series', $data);

		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteProduct()
	{
		$data['id'] = $this->input->post('id');
		$isDelete = $this->Control_model->delete_data_permanant('branch', $data);

		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteReview()
	{
		$data['id'] = $this->input->post('id');

		$isDelete = $this->Control_model->delete_data_permanant('review', $data);

		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteSlide()
	{
		$data['id'] = $this->input->post('id');

		$isDelete = $this->Control_model->delete_data_permanant('slide', $data);

		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteImage()
	{
		$data['id'] = $this->input->post('id');
		$isDelete = $this->Control_model->delete_data_permanant('image', $data);
		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteImageSeries()
	{
		$id = $this->input->post('id');
		$data = array(
			"series_image" => "",
		);
		
		$isDelete = $this->Control_model->update('tbl_series','id',$id,$data);
		echo $isDelete;/* $this->getModelList(); */
	}

	public function deleteFile()
	{
		$data['id'] = $this->input->post('id');
		$isDelete = $this->Control_model->delete_data_permanant('file', $data);
		echo $isDelete;/* $this->getModelList(); */
	}

	public function searchModel()
	{
		$data['searchModel'] = $this->input->post('searchModel');

		echo $this->getModelList("", $data['searchModel']);
	}

	public function searchSeries()
	{
		$data['searchSeries'] = $this->input->post('searchSeries');
		$data['model_id'] = $this->input->post('model_id');

		echo $this->getSeriesList($data['model_id'], "", $data['searchSeries']);
	}

	public function getSeriesByModelID(){
		print_r( json_encode($this->Control_model->get_series($this->input->post('model_id'))->result_array()));
	}


	public function getModelList($id = NULL, $modelSearch = NULL)
	{
		/* $cate_id = $this->input->post('category_id'); */
		if ($id == NULL) {
			$id = "";
		}
		if ($modelSearch == NULL) {
			$modelSearch = "";
		}

		$categoryListData = $this->Control_model->get_modelListAll($id, $modelSearch)->result_array();
?>
		<div id="list_data">
			<ul class="list-group sortable">
				<?php if (count(($categoryListData)) > 0) { ?>
					<?php foreach ($categoryListData as $value) { ?>
						<li class="d-flex list-group-item align-items-center justify-content-between reorder-item" style="gap: 10px;" id="<?= $value['id'] ?>">
							<!-- -->
							<div class=" reorder-item"> <i class="fa-solid fa-up-down"></i> </div>

							<input class="category-name d-none" type="text" id="category-name-<?= $value['id'] ?>" data-id="<?= $value['id'] ?>" value="<?= $value['model_name'] ?>">

							<a class="category-name-link" id="category-name-link-<?= $value['id'] ?>" style="width: 90%;" href="<?= base_url('/Admin/Model/') . $value['id'] ?>">
								<?= $value['model_name'] ?>
							</a>
							<!-- <span class="badgetext badge badge-primary badge-pill"><?= $value['countArticle'] ?> </span> -->

							<?php
							$toggleClassHide = 'hide-data';

							if ($value['data_status'] == '0') {
								$toggleClassHide = 'show-data';
							} ?>


							<a href="<?= base_url('/Admin/Series/' . $value['id']) ?>"><button class="badgetext badge badge-success badge-pill" data-id="<?= $value['id'] ?>">Series</button></a>

							<button class="badgetext badge badge-success badge-pill btn-category-edit" data-id="<?= $value['id'] ?>"><i class="fas fa-pen"></i></button>
							<button data-id="<?= $value['id'] ?>" class="badgetext badge badge-info badge-pill btn-hideData <?= $toggleClassHide ?>">
								<i class="typcn typcn-eye"></i>
							</button>
							<?php if (0) { ?>
								<button class="badgetext badge badge-secondary badge-pill" style="cursor:no-drop" disabled><i class="fas fa-trash"></i></button>
							<?php } else { ?>
								<button class="badgetext badge badge-danger badge-pill btn-category-delete" data-id="<?= $value['id'] ?>"><i class="fas fa-trash"></i></button>
							<?php } ?>

						</li>
					<?php } ?>
				<?php } else { ?>
					<li class="d-flex  list-group-item align-items-center justify-content-between">
						สร้าง<input id="new_category_name" name="new_category_name" readonly value="<?= $modelSearch ?>" type="text" placeholder="เพิ่มหมวดหมู่ใหม่">
						<button class="badgetext badge badge-primary badge-pill" id="btn_create_new_category">Create</button>
					</li>
				<?php } ?>
			</ul>
		</div>


		<script>
			$(document).ready(function() {
				// Make the list items sortable
				$(".sortable").sortable({
					handle: ".reorder-item",
					update: function(event, ui) {
						// Update the order of items after sorting
						var order = $(this).sortable('toArray', {
							attribute: 'id'
						});
						console.log(order)

						let dataOrder = []

						order.map((item, i) => {
							let dataSet = {
								id: item,
								data_order: i,
							}

							dataOrder.push(dataSet);
						})

						updateRowOrder(dataOrder)

					}
				});

				// Prevent clicks on buttons from triggering the sorting
				$(".sortable button").on("click", function(e) {
					e.stopPropagation();
				});
			});


			articleLists = <?= count(($categoryListData)) ?>;

			function updateRowOrder(dataRowUpdate) {

				let jsonData = JSON.stringify(dataRowUpdate);

				console.log('d')

				return $.ajax({
					url: '<?= base_url("/Control/updateModelRowOrder") ?>',
					type: 'POST',
					contentType: 'application/json',
					data: jsonData,
					success: function(response, status) {
						/* console.log(response, status); */
						if (response) {
							$.toast({
								heading: 'บันทึกข้อมูลสำเร็จ',
								icon: 'success',
								showHideTransition: 'slide',
								allowToastClose: true,
								hideAfter: 3000,
								stack: 5,
								position: 'bottom-left',
								textAlign: 'left',
								loader: true,
								loaderBg: '#ffff',

							});
						}

					},
					error: function(xhr, status, error) {
						// Handle errors here
						console.error('AJAX error:', error);
					}
				});

			}


			function hideDataStatus(id) {
				var url = `<?= base_url('/Control/hideData') ?>`;

				var postData = {
					id: id,
					table: "model",
				};

				return $.ajax({
					type: "POST",
					url: url,
					data: postData,
					success: function(response) {

						if (response) {
							$.toast({
								heading: 'ซ่อนข้อมูลสำเร็จ',
								icon: 'success',
								showHideTransition: 'slide',
								allowToastClose: true,
								hideAfter: 3000,
								stack: 5,
								position: 'bottom-left',
								textAlign: 'left',
								loader: true,
								loaderBg: '#9EC600',

							});
						}
					},
					error: function(xhr, status, error) {
						console.error("Error occurred:", status, error);
					}
				});
			}


			function showDataStatus(id) {
				var url = `<?= base_url('/Control/showData') ?>`;

				var postData = {
					id: id,
					table: "model",
				};

				return $.ajax({
					type: "POST",
					url: url,
					data: postData,
					success: function(response) {

						if (response) {
							$.toast({
								heading: 'เลิกซ่อนข้อมูลสำเร็จ',
								icon: 'success',
								showHideTransition: 'slide',
								allowToastClose: true,
								hideAfter: 3000,
								stack: 5,
								position: 'bottom-left',
								textAlign: 'left',
								loader: true,
								loaderBg: '#9EC600',

							});
						}
					},
					error: function(xhr, status, error) {
						console.error("Error occurred:", status, error);
					}
				});
			}


			$(".btn-hideData").click(async (e) => {

				if (e.target.className.includes("show-data")) {
					await showDataStatus(e.target.dataset.id);
					e.target.classList.add('hide-data');
					e.target.classList.remove('show-data');
				} else if (e.target.className.includes("hide-data")) {
					await hideDataStatus(e.target.dataset.id);
					e.target.classList.remove('hide-data');
					e.target.classList.add('show-data');

				}

			})


			$(".btn-category-edit").click((e) => {
				console.log(e.target.dataset.id)
				console.log($(`#category-name-18`))

				$(`#category-name-${e.target.dataset.id}`).removeClass("d-none")
				$(`.category-name-link#category-name-link-${e.target.dataset.id}`).addClass("d-none")
				$(`#category-name-${e.target.dataset.id}`).focus()
				$(`#category-name-${e.target.dataset.id}`)[0].setSelectionRange($(`.category-name-${e.target.dataset.id}`)[0].value.length, $(`.category-name-${e.target.dataset.id}`)[0].value.length);
			})

			$('#category_search').off('keyup');

			$('#category_search').keyup((e) => {


				/* 	$("#list_data").html(`<div style="display: flex; align-items: center; justify-content:center;">
						<img src="https://bangkokhatyaihealth.com/article/assets/img/loader1.svg " class="loader-img" alt="Loader">
						</div>`) */

				$("#new_category_name").val(e.target.value)
				clearInterval(timeOut);
				timeOut = setTimeout(() => {
					sendSearchRequest($('#category_search').val());
				}, 250)

			});

			$('#category_search').keydown((e) => {
				clearInterval(timeOut);
			});


			$("#new_category_name").keydown(e => {
				if (e.keyCode == 13) {
					sendPostRequest();
				}
			})

			$(".category-name").change(e => {
				$(`#category-name-${e.target.dataset.id}`).addClass("d-none")
				$(`.category-name-link#${e.target.dataset.id}`).removeClass("d-none")

				sendEditRequest(e.target.dataset.id);
			})


			$(".category-name").blur(e => {
				$(`.category-name`).addClass("d-none")
				$(`.category-name-link`).removeClass("d-none")


				/* sendEditRequest(e.target.id); */
			})


			$('#btn_create_new_category').click((e) => {
				if ($("#new_category_name").val().length > 0) {
					$(e.target).prop("disabled", true);
					$('#category_search').val('')
					sendPostRequest();
				}
			})

			$('.btn-category-delete').click((e) => {

				Swal.fire({
					icon: 'warning',
					title: 'ต้องการลบหมวดหมู่นี้ใช่หรือไม่',
					showDenyButton: true,
					confirmButtonText: 'ลบ',
					denyButtonText: `ยกเลิก`,
					denyButtonColor: '#228be6',
					confirmButtonColor: '#e03131',

				}).then((result) => {
					if (result.isConfirmed) {

						$(e.target).prop("disabled", true);
						$(`li#${e.target.dataset.id}`).fadeOut('.5', () => {
							$(`li#${e.target.dataset.id}`).remove()

							console.log($("#list_data li").length)
							if ($("#list_data li").length == 0) {
								$('#list_data').append(`<li class="d-flex  list-group-item align-items-center justify-content-between">
						<input id="new_category_name" name="new_category_name" value="${$("#category_search").val()}" type="text" placeholder="Create New Series">
						<button class="badgetext badge badge-primary badge-pill" id="btn_create_new_category">Create</button>
					</li>`)

								$('#btn_create_new_category').click((e) => {
									if ($("#new_category_name").val().length > 0) {

										$(e.target).prop("disabled", true);
										sendPostRequest();
									}
								})
							}
						})

						sendDeleteRequest(e.target.dataset.id);



					}
				})


			})
		</script>

	<?php
	}



	public function getSeriesList($m_id = NULL, $s_id = NULL, $seriesSearch = NULL)
	{
		/* $cate_id = $this->input->post('category_id'); */
		if ($m_id == NULL) {
			$m_id = "";
		}
		if ($s_id == NULL) {
			$s_id = "";
		}
		if ($seriesSearch == NULL) {
			$seriesSearch = "";
		}

		$categoryListData = $this->Control_model->get_seriesListAll($m_id, $s_id, $seriesSearch)->result_array();

	?>
		<div id="list_data">
			<ul class="list-group sortable">
				<?php if (count(($categoryListData)) > 0) { ?>
					<?php foreach ($categoryListData as $value) { ?>
						<li class="d-flex list-group-item align-items-center justify-content-between reorder-item" style="gap: 10px;" id="<?= $value['id'] ?>">
							<!-- -->
							<div class=" reorder-item"> <i class="fa-solid fa-up-down"></i> </div>

							<input class="category-name d-none" type="text" id="category-name-<?= $value['id'] ?>" data-id="<?= $value['id'] ?>" value="<?= $value['series_name'] ?>">

							<a class="category-name-link" id="category-name-link-<?= $value['id'] ?>" style="width: 90%;" href="<?= base_url('/Admin/Series/').$value["model_id"] .'/'. $value['id'] ?>">
								<?= $value['series_name'] ?>
							</a>
							<!-- <span class="badgetext badge badge-primary badge-pill"><?= $value['countArticle'] ?> </span> -->

							<?php
							$toggleClassHide = 'hide-data';

							if ($value['data_status'] == '0') {
								$toggleClassHide = 'show-data';
							} ?>


							<button class="badgetext badge badge-success badge-pill btn-category-edit" data-id="<?= $value['id'] ?>"><i class="fas fa-pen"></i></button>
							<button data-id="<?= $value['id'] ?>" class="badgetext badge badge-info badge-pill btn-hideData <?= $toggleClassHide ?>">
								<i class="typcn typcn-eye"></i>
							</button>
							<?php if (0) { ?>
								<button class="badgetext badge badge-secondary badge-pill" style="cursor:no-drop" disabled><i class="fas fa-trash"></i></button>
							<?php } else { ?>
								<button class="badgetext badge badge-danger badge-pill btn-category-delete" data-id="<?= $value['id'] ?>"><i class="fas fa-trash"></i></button>
							<?php } ?>

						</li>
					<?php } ?>
				<?php } else { ?>
					<li class="d-flex  list-group-item align-items-center justify-content-between">
						สร้าง<input id="new_category_name" name="new_category_name" readonly value="<?= $seriesSearch ?>" type="text" placeholder="Create New Series">
						<button class="badgetext badge badge-primary badge-pill" id="btn_create_new_category">Create</button>
					</li>
				<?php } ?>
			</ul>
		</div>


		<script>
			$(document).ready(function() {
				// Make the list items sortable
				$(".sortable").sortable({
					handle: ".reorder-item",
					update: function(event, ui) {
						// Update the order of items after sorting
						var order = $(this).sortable('toArray', {
							attribute: 'id'
						});
						console.log(order)

						let dataOrder = []

						order.map((item, i) => {
							let dataSet = {
								id: item,
								data_order: i,
							}

							dataOrder.push(dataSet);
						})

						updateRowOrder(dataOrder)

					}
				});

				// Prevent clicks on buttons from triggering the sorting
				$(".sortable button").on("click", function(e) {
					e.stopPropagation();
				});
			});


			articleLists = <?= count(($categoryListData)) ?>;

			function updateRowOrder(dataRowUpdate) {

				let jsonData = JSON.stringify(dataRowUpdate);

				console.log('d')

				return $.ajax({
					url: '<?= base_url("/Control/updateSeriesRowOrder") ?>',
					type: 'POST',
					contentType: 'application/json',
					data: jsonData,
					success: function(response, status) {
						/* console.log(response, status); */
						if (response) {
							$.toast({
								heading: 'บันทึกข้อมูลสำเร็จ',
								icon: 'success',
								showHideTransition: 'slide',
								allowToastClose: true,
								hideAfter: 3000,
								stack: 5,
								position: 'bottom-left',
								textAlign: 'left',
								loader: true,
								loaderBg: '#ffff',

							});
						}

					},
					error: function(xhr, status, error) {
						// Handle errors here
						console.error('AJAX error:', error);
					}
				});

			}


			function hideDataStatus(id) {
				var url = `<?= base_url('/Control/hideData') ?>`;

				var postData = {
					id: id,
					table: "series",
				};

				return $.ajax({
					type: "POST",
					url: url,
					data: postData,
					success: function(response) {

						if (response) {
							$.toast({
								heading: 'ซ่อนข้อมูลสำเร็จ',
								icon: 'success',
								showHideTransition: 'slide',
								allowToastClose: true,
								hideAfter: 3000,
								stack: 5,
								position: 'bottom-left',
								textAlign: 'left',
								loader: true,
								loaderBg: '#9EC600',

							});
						}
					},
					error: function(xhr, status, error) {
						console.error("Error occurred:", status, error);
					}
				});
			}


			function showDataStatus(id) {
				var url = `<?= base_url('/Control/showData') ?>`;

				var postData = {
					id: id,
					table: "series",
				};

				return $.ajax({
					type: "POST",
					url: url,
					data: postData,
					success: function(response) {

						if (response) {
							$.toast({
								heading: 'เลิกซ่อนข้อมูลสำเร็จ',
								icon: 'success',
								showHideTransition: 'slide',
								allowToastClose: true,
								hideAfter: 3000,
								stack: 5,
								position: 'bottom-left',
								textAlign: 'left',
								loader: true,
								loaderBg: '#9EC600',

							});
						}
					},
					error: function(xhr, status, error) {
						console.error("Error occurred:", status, error);
					}
				});
			}


			$(".btn-hideData").click(async (e) => {

				if (e.target.className.includes("show-data")) {
					await showDataStatus(e.target.dataset.id);
					e.target.classList.add('hide-data');
					e.target.classList.remove('show-data');
				} else if (e.target.className.includes("hide-data")) {
					await hideDataStatus(e.target.dataset.id);
					e.target.classList.remove('hide-data');
					e.target.classList.add('show-data');

				}

			})


			$(".btn-category-edit").click((e) => {
				console.log(e.target.dataset.id)
				console.log($(`#category-name-18`))

				$(`#category-name-${e.target.dataset.id}`).removeClass("d-none")
				$(`.category-name-link#category-name-link-${e.target.dataset.id}`).addClass("d-none")
				$(`#category-name-${e.target.dataset.id}`).focus()
				$(`#category-name-${e.target.dataset.id}`)[0].setSelectionRange($(`.category-name-${e.target.dataset.id}`)[0].value.length, $(`.category-name-${e.target.dataset.id}`)[0].value.length);
			})

			$('#category_search').off('keyup');

			$('#category_search').keyup((e) => {


				/* 	$("#list_data").html(`<div style="display: flex; align-items: center; justify-content:center;">
						<img src="https://bangkokhatyaihealth.com/article/assets/img/loader1.svg " class="loader-img" alt="Loader">
						</div>`) */

				$("#new_category_name").val(e.target.value)
				clearInterval(timeOut);
				timeOut = setTimeout(() => {
					sendSearchRequest($('#category_search').val());
				}, 250)

			});

			$('#category_search').keydown((e) => {
				clearInterval(timeOut);
			});


			$("#new_category_name").keydown(e => {
				if (e.keyCode == 13) {
					sendPostRequest();
				}
			})

			$(".category-name").change(e => {
				$(`#category-name-${e.target.dataset.id}`).addClass("d-none")
				$(`.category-name-link#${e.target.dataset.id}`).removeClass("d-none")

				sendEditRequest(e.target.dataset.id);
			})


			$(".category-name").blur(e => {
				$(`.category-name`).addClass("d-none")
				$(`.category-name-link`).removeClass("d-none")


				/* sendEditRequest(e.target.id); */
			})


			$('#btn_create_new_category').click((e) => {
				if ($("#new_category_name").val().length > 0) {
					$(e.target).prop("disabled", true);
					$('#category_search').val('')
					sendPostRequest();
				}
			})

			$('.btn-category-delete').click((e) => {
				Swal.fire({
					icon: 'warning',
					title: 'ต้องการลบหมวดหมู่นี้ใช่หรือไม่',
					showDenyButton: true,
					confirmButtonText: 'ลบ',
					denyButtonText: `ยกเลิก`,
					denyButtonColor: '#228be6',
					confirmButtonColor: '#e03131',

				}).then((result) => {
					if (result.isConfirmed) {

						$(e.target).prop("disabled", true);
						$(`li#${e.target.dataset.id}`).fadeOut('.5', () => {
							$(`li#${e.target.dataset.id}`).remove()

							console.log($("#list_data li").length)
							if ($("#list_data li").length == 0) {
								$('#list_data').append(`<li class="d-flex  list-group-item align-items-center justify-content-between">
								<input id="new_category_name" name="new_category_name" value="${$("#category_search").val()}" type="text" placeholder="Create New Series">
								<button class="badgetext badge badge-primary badge-pill" id="btn_create_new_category">Create</button>
							</li>`)

								$('#btn_create_new_category').click((e) => {
									if ($("#new_category_name").val().length > 0) {

										$(e.target).prop("disabled", true);
										sendPostRequest();
									}
								})
							}
						})

						sendDeleteRequest(e.target.dataset.id);

					}
				})


			})
		</script>

<?php
	}

	public function saveData()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		$data['create_date'] = date('Y-m-d H:i:s');
		$insert_id = $this->Control_model->save_data('model', $data);

		if ($insert_id) {
			echo $insert_id;
		} else {
			echo 0;
		}
	}

	public function saveBranch()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);
		$data['create_date'] = date('Y-m-d H:i:s');
		$data['data_order'] = $this->Control_model->countData("branch");

		$insert_id = $this->Control_model->save_data('branch', $data);

		if ($insert_id) {
			echo $insert_id;
		} else {
			echo 0;
		}
	}

	public function saveSlide()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);
		$data['create_date'] = date('Y-m-d H:i:s');
		$data['data_order'] = $this->Control_model->countSlide();

		$insert_id = $this->Control_model->save_data('slide', $data);

		if ($insert_id) {
			echo $insert_id;
		} else {
			echo 0;
		}
	}


	public function saveReview()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);
		$data['create_date'] = date('Y-m-d H:i:s');


		$insert_id = $this->Control_model->save_data('review', $data);

		if ($insert_id) {
			echo $insert_id;
		} else {
			echo 0;
		}
	}
	/* ------------------------------------------- */


	public function editProduct()
	{
		$this->load->helper("security");

		$data = array();

		$data["id"] = $this->input->post("id");

		$data["branch_name"] = $this->input->post("branch_name");
		$data["description"] = $this->input->post("description");
		$data["branch_location"] = $this->input->post("branch_location");
		$data["branch_address"] = $this->input->post("branch_address");



		$id = $data['id'];

		$isUpdate =  $this->Control_model->update('tbl_branch', 'id', $id, $data);

		if ($isUpdate) {
			echo $id;
		} else {
			echo 0;
		}
	}

	public function editSlide()
	{
		$this->load->helper("security");

		$data = array();

		$data["id"] = $this->input->post("id");

		$data["slide_name"] = $this->input->post("slide_name");
		$data["slide_name_eng"] = $this->input->post("slide_name_eng");

		$data["description"] = $this->input->post("description");
		$data["description_eng"] = $this->input->post("description_eng");
		$data["shopee_link"] = $this->input->post("shopee_link");
		$data["learnmore_link"] = $this->input->post("learnmore_link");


		$id = $data['id'];

		$isUpdate =  $this->Control_model->update('tbl_slide', 'id', $id, $data);

		if ($isUpdate) {
			echo $id;
		} else {
			echo 0;
		}
	}

	public function editReview()
	{
		$this->load->helper("security");

		$data = array();

		$data["id"] = $this->input->post("id");
		$data["review_name_eng"] = $this->input->post("review_name_eng");
		$data["description"] = $this->input->post("description");
		$data["description_eng"] = $this->input->post("description_eng");
		$data["youtube_link"] = $this->input->post("youtube_link");

		$id = $data['id'];

		$isUpdate =  $this->Control_model->update('tbl_review', 'id', $id, $data);

		if ($isUpdate) {
			echo $id;
		} else {
			echo 0;
		}
	}
	/* ------------------------------------------- */

	public function saveUserDetail()
	{
		$this->load->helper("security");

		$stream = $this->security->xss_clean($this->input->raw_input_stream);
		$data = json_decode($stream, true);

		if (isset($data['password'])) {
			$data['password'] = md5($data['password']);
		}

		$isUpdate =  $this->Control_model->update('tbl_user', 'id', $data['id'], $data);

		if ($isUpdate) {
			echo $isUpdate;

			if ($_SESSION['role'] == '2') {
				$_SESSION['prename'] = $data['prename'];
				$_SESSION['fname'] = $data['fname'];
				$_SESSION['lname'] = $data['lname'];

				$_SESSION['birthdate'] = $data['birthdate'];
				if ($_SESSION['register_type'] == '1') {
					$_SESSION['email'] = $data['email'];
				}
				$_SESSION['tel'] = $data['tel'];
			}
		} else {
			echo 0;
		}
	}
	/* ------------------------------------------- */

	public function cancelAppointment()
	{
		$appointmentData = $this->Control_model->get_Appointment('', $this->input->post('app_id'));
		$isCancel =  $this->Control_model->update('tbl_appointment', 'id', $this->input->post('app_id'), array('data_status' => '0'));

		if ($isCancel) {
			echo 1;

			/* $this->sendMailAdmin($appointmentData, 'cancel'); */
			$this->sendMailUser($appointmentData, 'cancel');
		} else {
			echo json_encode(array('error' => 'ไม่สามารถยกเลิกนัดได้'));
		}
	}

	/* ------------------------------------------- */

	public function deleteAdmin()
	{
		$isCancel =  $this->Control_model->update('tbl_admin', 'id', $this->input->post('admin_id'), array('data_status' => '0'));

		if ($isCancel) {
			echo 1;
		} else {
			echo json_encode(array('error' => 'ไม่สามารถลบได้'));
		}
	}

	/* ------------------------------------------- */

	public function updateAppointmentStatus()
	{
		if ($_SESSION['role'] != '2') {

			$dataUpdate = array(
				'appointment_status' => $this->input->post('appointment_status'),
				'admin_update' => $_SESSION['id'],
				"admin_update_date" => date('Y-m-d H:i:s'),
			);

			$isDone =  $this->Control_model->update('tbl_appointment', 'id', $this->input->post('app_id'), $dataUpdate);

			if ($isDone) {
				echo 1;
			} else {
				echo json_encode(array('error' => 'ไม่สามารถเปลี่ยนสถานะได้'));
			}
		} else {
			echo json_encode(array('error' => 'คุณไม่มีสิทธิ์เข้าถึงฟังก์ชั่นนี้'));
		}
	}

	/* ------------------------------------------- */

	public function updateAdminType()
	{
		if ($_SESSION['role'] != '2') {

			$dataUpdate = array(
				'admin_type' => $this->input->post('admin_type'),
			);

			$isDone =  $this->Control_model->update('tbl_admin', 'id', $this->input->post('admin_id'), $dataUpdate);

			if ($isDone) {
				echo 1;
			} else {
				echo json_encode(array('error' => 'ไม่สามารถเปลี่ยนสถานะได้'));
			}
		} else {
			echo json_encode(array('error' => 'คุณไม่มีสิทธิ์เข้าถึงฟังก์ชั่นนี้'));
		}
	}

	/* ------------------------------------------- */

	public function getQueue($date = NULL)
	{

		return json_encode($this->control->get_queue());
	}


	public function uploadSeriesImage()
	{

		$config['upload_path']    = './uploads/image';
		$config['allowed_types'] = 'jpg|png|webp|gif';
		$config['encrypt_name']   = TRUE;
		$config['max_size'] = 0;


		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		$uploadedFiles = array();
		foreach ($_FILES as $fieldName => $file) {
			if ($this->upload->do_upload($fieldName)) {

				$fileData = $this->upload->data();

				$imageData = array();

				$imageData['series_image'] = $fileData['file_name'];
				$imageData['id'] = $_POST['id'];

				$save =  $this->Control_model->addSeriesImage($imageData);

				$fileUrl = base_url('uploads/image' . $fileData['file_name']);

				$uploadedFiles[$fieldName] = array(
					'id' => $_POST['id'],
					'url' => $fileUrl,
					'result' => $save,
				);
			} else {
				$error = $this->upload->display_errors();
				$uploadedFiles[$fieldName] = array(
					'error' => $error
				);
			}
		}

		echo json_encode($uploadedFiles);
	}

	public function uploadSlideImage()
	{

		$config['upload_path']    = './uploads/image';
		$config['allowed_types'] = 'jpg|png|webp|gif';
		$config['encrypt_name']   = TRUE;
		$config['max_size'] = 0;


		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		$uploadedFiles = array();
		foreach ($_FILES as $fieldName => $file) {
			if ($this->upload->do_upload($fieldName)) {

				/* $this->Control_model->setAllImageMainToNone($_POST['ref_id']); */

				$fileData = $this->upload->data();

				$imageData = array();

				$imageData['image_url'] = $fileData['file_name'];
				$imageData['id'] = $_POST['id'];

				$save =  $this->Control_model->addSlideImage($imageData);

				$fileUrl = base_url('uploads/image' . $fileData['file_name']);

				$uploadedFiles[$fieldName] = array(
					'id' => $_POST['id'],
					'url' => $fileUrl,
					'result' => $save,
				);
			} else {
				$error = $this->upload->display_errors();
				$uploadedFiles[$fieldName] = array(
					'error' => $error
				);
			}
		}

		echo json_encode($uploadedFiles);
	}



	public function uploadImage()
	{

		$config['upload_path']    = './uploads/image';
		$config['allowed_types'] = 'jpg|png|webp|gif';
		$config['encrypt_name']   = TRUE;
		$config['max_size'] = 0;


		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		$uploadedFiles = array();
		foreach ($_FILES as $fieldName => $file) {
			if ($this->upload->do_upload($fieldName)) {

				/* $this->Control_model->setAllImageMainToNone($_POST['ref_id']); */

				$fileData = $this->upload->data();

				$imageData = array();

				$imageData['branch_image'] = $fileData['file_name'];

				$save =  $this->Control_model->update("tbl_branch","id",$_POST['ref_id'],$imageData);

				$fileUrl = base_url('uploads/image' . $fileData['file_name']);

				$uploadedFiles[$fieldName] = array(
					'ref_id' => $_POST['ref_id'],
					'url' => $fileUrl,
					'result' => $save,
				);
			} else {
				$error = $this->upload->display_errors();
				$uploadedFiles[$fieldName] = array(
					'error' => $error
				);
			}
		}

		echo json_encode($uploadedFiles);
	}


	public function uploadFile()
	{

		$config['upload_path']    = './uploads/file';
		$config['allowed_types'] = 'pdf';
		$config['encrypt_name']   = TRUE;
		$config['max_size'] = 0;
		$config['encrypt_name'] = false;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		$uploadedFiles = array();
		foreach ($_FILES as $fieldName => $file) {
			if ($this->upload->do_upload($fieldName)) {

				$fileData = $this->upload->data();

				$imageData = array();

				$imageData['file_url'] = $fileData['file_name'];
				$imageData['ref_id'] = $_POST['ref_id'];

				$save =  $this->Control_model->addFile($imageData);

				$fileUrl = base_url('uploads/file' . $fileData['file_name']);

				$uploadedFiles[$fieldName] = array(
					'ref_id' => $_POST['ref_id'],
					'url' => $fileUrl,
					'result' => $save,
				);
			} else {
				$error = $this->upload->display_errors();
				$uploadedFiles[$fieldName] = array(
					'error' => $error
				);
			}
		}

		echo json_encode($uploadedFiles);
	}
}
