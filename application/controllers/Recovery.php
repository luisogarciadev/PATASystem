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
		$this->load->model('RecoveryModel');

		$animals = $this->AnimalModel->selectCats();
		$data['title'] = 'Lista Recuperación Gatos';

		for ($i = 0; $i < count($animals); $i++) {
			$animal = $animals[$i];
			$animal = (array)$animal;
			$person = $this->AnimalModel->getPersonByAnimalID($animal['id']);
			$animal['phone'] = $person->phone;
			$animal['personName'] = $person->personName;
			$recovery = $this->RecoveryModel->getRecoveryByAnimalID($animal['id']);
			$animal['entryTime'] = date("H:i:s",strtotime($recovery->entryTime));
			$animal['exitTime'] = date("H:i:s",strtotime($recovery->exitTime));
			$animals[$i] = (object)$animal;
		}

		$data['animals'] = $animals;
		LoadViews('Recovery/List', $data);
	}

	public function dogs() {
		$this->load->model('AnimalModel');
		$this->load->model('RecoveryModel');

		$animals = $this->AnimalModel->selectDogs();
		$data['title'] = 'Lista Recuperación Perros';

		for ($i = 0; $i < count($animals); $i++) {
			$animal = $animals[$i];
			$animal = (array)$animal;
			$person = $this->AnimalModel->getPersonByAnimalID($animal['id']);
			$animal['phone'] = $person->phone;
			$animal['personName'] = $person->personName;

			$recovery = $this->RecoveryModel->getRecoveryByAnimalID($animal['id']);
			$animal['entryTime'] = is_null($recovery) ? '' : date("H:i:s",strtotime($recovery->entryTime));
			$animal['exitTime'] = is_null($recovery) ? '' : date("H:i:s",strtotime($recovery->exitTime));
			$animals[$i] = (object)$animal;
		}

		$data['animals'] = $animals;

		LoadViews('Recovery/List', $data);
	}

	public function EnterTime() {
		$this->load->model('RecoveryModel');
		$id = $this->input->post('id');
		$this->RecoveryModel->insertEntryTime($id);
	}

	public function ExitTime() {
		$this->load->model('RecoveryModel');
		$id = $this->input->post('id');
		$this->RecoveryModel->insertExitTime($id);
	}
}