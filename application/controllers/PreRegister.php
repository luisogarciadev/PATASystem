<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreRegister extends CI_Controller {

	public function index() {
		$this->load->model('PersonModel');

		$data['people'] = $this->PersonModel->select();
		$data['title'] = 'Lista Registro Inicial';

		LoadViews('PreRegister/List', $data);
	}

	public function insert() {
		$this->load->model('SpeciesModel');
		$this->load->model('AnimalModel');

		$data['species'] = $this->SpeciesModel->select();
		$data['maxTurn'] = $this->AnimalModel->getMaxTurn();
		if (is_null($data['maxTurn'])) {
			$data['maxTurn'] = 0;
		}
		$data['title'] = 'Nueva Persona';

		LoadViews('PreRegister/Insert', $data);
	}

	public function add() {
		$this->load->model('PersonModel');
		$this->load->model('AnimalModel');


		$quantity = $this->input->post('animalQuantity');

		$idPerson = $this->PersonModel->insertRegistry();

		$turn = $this->input->post('turn');
		$species = $this->input->post('species');
		$gender = $this->input->post('gender');
		$isCertEng = $this->input->post('certEnglish');
		$petName = $this->input->post('petName');
		for ($i = 0; $i < $quantity; $i++) {
			$data = array('turn' => $turn[$i],
	    		'idSpecies' => $species[$i],
	    		'gender' => $gender[$i],
	    		'isCertEng' => $isCertEng[$i],
				'petName' => $petName[$i]);

			$idAnimal = $this->AnimalModel->insertPreRegistry($data);

			$this->AnimalModel->insertAnimalPerson($idAnimal, $idPerson);
		}

		$this->index();
	}

	public function weightList() {
		$this->load->model('AnimalModel');
		$data['title'] = 'Lista de animales para pesas';
		$data['animals'] = $this->AnimalModel->select();

		LoadViews('PreRegister/WeightList', $data);
	}

	public function isAggressive() {
		$this->load->model('AnimalModel');
		$this->AnimalModel->isAggressive();
		return "test";
	}

	public function photo($id) {
		$data['title'] = 'Tomar foto';
		$data['animalID'] = $id;
		LoadViews('PreRegister/Photo', $data);
	}

	public function photoUpload() {
		$this->load->model('AnimalModel');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '204800000';
		$config['max_width'] = '80000';
		$config['max_height'] = '60000';
		$config['file_name'] = $this->input->post('animalID');
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('fileUp'))
		{
			//$this->AnimalModel->insertPhoto();
			$this->weightList();
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('displayError', $error);
		}
	}
}