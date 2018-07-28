<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surgery extends CI_Controller {

	public function index() {
		$this->load->model('AnimalModel');
		$data['title'] = 'Lista de animales para pesas';
		$animals = (array)$this->AnimalModel->select();
		for ($i = 0; $i < count($animals); $i++) {
			$person = $this->AnimalModel->getPersonByAnimalID($animals[$i]['id']);
			$animals[$i]['phone'] = $person->phone;
			$animals[$i]['personName'] = $person->personName;
		}
		$data['animals'] = (object)$animals;

		LoadViews('Surgery/List', $data);
	}
}