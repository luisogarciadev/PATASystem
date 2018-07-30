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

		$animals = $this->AnimalModel->selectCats();
		$data['title'] = 'Lista Recuperación Gatos';

		for ($i = 0; $i < count($animals); $i++) {
			$animal = $animals[$i];
			$animal = (array)$animal;
			$person = $this->AnimalModel->getPersonByAnimalID($animal['id']);
			$animal['phone'] = $person->phone;
			$animal['personName'] = $person->personName;
			$animals[$i] = (object)$animal;
		}

		$data['animals'] = $animals;
		LoadViews('Recovery/List', $data);
	}

	public function dogs() {
		$this->load->model('AnimalModel');

		$animals = $this->AnimalModel->selectDogs();
		$data['title'] = 'Lista Recuperación Perros';

		for ($i = 0; $i < count($animals); $i++) {
			$animal = $animals[$i];
			$animal = (array)$animal;
			$person = $this->AnimalModel->getPersonByAnimalID($animal['id']);
			$animal['phone'] = $person->phone;
			$animal['personName'] = $person->personName;
			$animals[$i] = (object)$animal;
		}

		$data['animals'] = $animals;

		LoadViews('Recovery/List', $data);
	}
}