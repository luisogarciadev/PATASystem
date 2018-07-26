<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->load->model('SpeciesModel');
		$this->load->model('AnimalModel');

		$data['species'] = $this->SpeciesModel->select();
		$data['maxTurn'] = $this->AnimalModel->getMaxTurn();
		if (is_null($data['maxTurn'])) {
			$data['maxTurn'] = 0;
		}

		$this->load->view('preregistry', $data);
	}

	public function register() {
		$this->load->model('SpeciesModel');
		$this->load->model('AnimalModel');

		$data['species'] = $this->SpeciesModel->select();
		$data['maxTurn'] = $this->AnimalModel->getMaxTurn();
		if (is_null($data['maxTurn'])) {
			$data['maxTurn'] = 0;
		}
		$this->load->view('home', $data);
	}

	public function regInsert() {
		$this->load->model('PersonModel');
		$this->load->model('AnimalModel');
		$this->load->model('SpeciesModel');
		
		$this->PersonModel->insert();

		$count = 0;
		foreach($this->input->post('animalName') as $animal) {
			$data = array('turn' => $animal->turn,
	    		'idSpecies' => $animal->idSpecies,
	    		'campaignDate' => '2018-10-2',
	    		'active' => 1,
	    		'gender' => $animal->gender,
	    		'petName' => $animal->petName
	    	);
			$this->AnimalModel->insert($data);
		}

		$data['people'] = $this->PersonModel->select();

		$this->load->view('registryList', $data);
	}
}