<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recovery extends CI_Controller {

	public function index() {
		$this->load->model('AnimalModel');

		$data['people'] = $this->AnimalModel->select();
		$data['title'] = 'Lista Recuperación Todos';

		LoadViews('Recovery/List', $data);
	}

	public function cats() {
		$this->load->model('AnimalModel');

		$data['people'] = $this->AnimalModel->selectCats();
		$data['title'] = 'Lista Recuperación Gatos';

		LoadViews('Recovery/List', $data);
	}

	public function dogs() {
		$this->load->model('AnimalModel');

		$data['people'] = $this->AnimalModel->selectDogs();
		$data['title'] = 'Lista Recuperación Perros';

		LoadViews('Recovery/List', $data);
	}
}