<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{
		$this->load->view('index.php');
		$this->load->view('/script/index_script.php');

	
	}

	public function map()
	{
		$this->load->view('dashboard2');
		$this->load->view('/script/dashboard2_script');


	}

	public function branch($branchID , $type = null , $typeid = null)
	{
		
		$data['branchID'] = $branchID;
		$data['typeID'] = $typeid;


		if(isset($type)){
			if(isset( $typeid )){
				$this->load->view('cctv_detail',$data);
				$this->load->view('/script/cctv_detail_script',$data);
			}

		}else{
			$this->load->view('branch_detail');
			$this->load->view('/script/branch_detail_script',$data);
		}



	}

	public function test()
	{
		$this->load->view('dashboard');
	}
}
