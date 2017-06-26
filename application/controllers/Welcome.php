<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->load->model('SpeciesModel');

		$data['species'] = $this->SpeciesModel->select();

		$this->load->view('home', $data);
	}

	public function register() {
		$this->load->model('PersonModel');
		$this->load->model('AnimalModel');
		$this->load->model('SpeciesModel');
		
		$data = null;

		$this->load->view('home', $data);	
	}
}
