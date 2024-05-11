<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardView extends CI_Controller
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
		$data['cctvData'] = $this->Dashboard_model->getCCTVTotal();


		$this->load->view('/frontend/index.php', $data);
		$this->load->view('/frontend/script/index_script.php');
	}

	public function map()
	{
		$this->load->view('/frontend/dashboard2');
		$this->load->view('/frontend/script/dashboard2_script');
	}

	public function branch($branchID, $type = null, $typeid = null)
	{

		$data['branchID'] = $branchID;
		$data['typeID'] = $typeid;


		if (isset($type)) {


			if (isset($typeid)) {
				$this->load->view('/frontend/cctv_detail', $data);
				$this->load->view('/frontend/script/cctv_detail_script', $data);
			}
		} else {

			$data['cctvData'] =  $this->Dashboard_model->getCCTVIssue($branchID);
			
			$branchData = $this->Control_model->get_branch($branchID)->result_array();
			$mapData = array();
			foreach ($branchData  as $value) {
				if ($value['data_status'] == '1') {

					$locations = explode(',', $value['branch_location']);
					$latitude = '0';
					$longitude = '0';

					if (count($locations) > 1) {
						$latitude = $locations[0];
						$longitude = $locations[1];

						$dataItem = array(
							"id" => $value['id'],
							"title" => $value['branch_name'],
							"price" => 100,
							"category" => 1,
							"marker_image" => base_url('/uploads/image/' . $value['branch_image']),
							"url" => base_url('/admin.php/DashboardView/branch/' . $value['id']),
							"address" => $value['branch_address'],
							"description" => $value['description'],
							"latitude" => $latitude,
							"longitude" => $longitude,
							"ribbon" => "<i class='fa fa-thumbs-up'></i>",
							"total" => '-',
							"available" => 2,
							"down" => 1,
							"http" => 100,
							"https" => 300,
							"f__air_condition" => 1,
							"f__microwave" => 1
						);


						array_push($mapData, $dataItem);
					}
				}
			};

			$data['mapData'] = $mapData;

			$this->load->view('/frontend/branch_detail', $data);
			$this->load->view('/frontend/script/branch_detail_script', $data);
		}
	}

	public function test()
	{
		$this->load->view('dashboard');
	}
}
