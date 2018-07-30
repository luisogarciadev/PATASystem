<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surgery extends CI_Controller {

	public function index() {
		$this->load->model('AnimalModel');
		$data['title'] = 'Lista de animales para cirug&iacutea';
		$animals = $this->AnimalModel->select();
		for ($i = 0; $i < count($animals); $i++) {
			$animal = $animals[$i];
			$animal = (array)$animal;
			$person = $this->AnimalModel->getPersonByAnimalID($animal['id']);
			$animal['phone'] = $person->phone;
			$animal['personName'] = $person->personName;
			$animals[$i] = (object)$animal;
		}
		$data['animals'] = $animals;

		LoadViews('Surgery/List', $data);
	}
}