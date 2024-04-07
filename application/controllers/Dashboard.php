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

	public function branch($branchID)
	{
		$data['branchID'] = $branchID;

		$this->load->view('branch_detail');
		$this->load->view('/script/branch_detail_script',$data);

	}

	public function test()
	{
		$this->load->view('dashboard');
	}
}
