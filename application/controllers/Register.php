<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index() {
		$this->load->model('PersonModel');

		$data['people'] = $this->PersonModel->select();

		$this->load->view('registryList', $data);
	}

	
}