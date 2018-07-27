<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index() {
		$this->load->model('PersonModel');

		$data['people'] = $this->PersonModel->select();
		$data['title'] = 'Lista Registro';

		LoadViews('Register/List', $data);
	}

	public function insert() {
		$this->load->model('SpeciesModel');
		$this->load->model('AnimalModel');

		$data['species'] = $this->SpeciesModel->select();
		$data['title'] = 'Nueva Persona';

		LoadViews('Register/Insert', $data);
	}
}