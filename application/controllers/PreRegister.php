<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreRegister extends CI_Controller {

	public function index() {
		$this->load->model('PersonModel');

		$data['people'] = $this->PersonModel->select();

		$this->load->view('PreRegister/List', $data);
	}

	public function insert() {
		$this->load->model('SpeciesModel');
		$this->load->model('AnimalModel');

		$data['species'] = $this->SpeciesModel->select();
		$data['maxTurn'] = $this->AnimalModel->getMaxTurn();
		if (is_null($data['maxTurn'])) {
			$data['maxTurn'] = 0;
		}

		$this->load->view('PreRegister/Insert', $data);
	}

	public function add() {
		$this->load->model('PersonModel');
		$this->load->model('AnimalModel');


		$quantity = $this->input->post('animalQuantity');

		$idPerson = $this->PersonModel->insertRegistry();

		for ($i = 0; $i < $quantity; $i++) {
			$data = array('turn' => $this->input->post('turn')[$i],
	    		'idSpecies' => $this->input->post('species')[$i],
	    		'gender' => $this->input->post('gender')[$i],
	    		'isCertEng' => $this->input->post('certEnglish')[$i],
				'petName' => $this->input->post('petName')[$i]);

			$idAnimal = $this->AnimalModel->insertPreRegistry($data);

			$this->AnimalModel->insertAnimalPerson($idAnimal, $idPerson);
		}

		$this->index();
	}
}