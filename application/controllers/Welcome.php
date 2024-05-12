<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_model');
	}

	public function index()
	{
		$data['testData'] = $this->Test_model->testQ();

		$this->load->view('welcome_message',$data);
	}
}
