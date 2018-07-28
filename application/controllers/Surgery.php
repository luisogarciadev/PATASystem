<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surgery extends CI_Controller {

	public function index() {
		$this->load->model('AnimalModel');
		$data['title'] = 'Lista de animales para pesas';
		$animals = (array)$this->AnimalModel->select();
		foreach ($data['animals'] as $a) {
			$person = $this->AnimalModel->getPersonByAnimalID($a->id);
			$animals['phone'] = $person->phone;
			$animals['personName'] = $person->personName;
		}
		$data['animals'] = (object)$animals;

		LoadViews('Surgery/List', $data);.
	}
}