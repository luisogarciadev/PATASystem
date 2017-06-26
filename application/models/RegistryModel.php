<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistryModel extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

    function insertPersonRegistry() {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $IFE = $this->input->post('IFE');
        $address = $this->input->post('address');
        $email = $this->input->post('email');

        $this->load->model('AnimalModel');
        $animal = new AnimalModel();

        for ($i = 0; $i < $this->input->post('amountAnimals'); $i++) {
            
        }

    	$data = array(

		);
    	
    	$idAnimal = $this->db->insert('animal', $data);
    }

    function insertWeight() {
        $photo = $this->input->post('photo');
        $weight = $this->input->post('weight');
        $gender = $this->input->post('gender');
		$data = array(
			'photo' => $photo,
			'weight' => $weight
		);
		$this->db->where("id", $this->input->post("id"));
        $this->db->update("animal", $data);
    }

    function insert() {
        $petName = $this->input->post('petName');
        $sick = $this->input->post('sick');
        $ticks = $this->input->post('ticks');
        $fleas = $this->input->post('fleas');
        $email = $this->input->post('email');
        $nervous = $this->input->post('nervous');
        $agressive = $this->input->post('agressive');
        $data = array(
           'petName' => $petName,
           'gender' => $gender,
           'sick' => $sick,
           'ticks' => $ticks,
           'fleas' => $fleas,
           'email' => $email,
           'nervous' => $nervous,
           'agressive' => $agressive,
           'photo' => $photo,
           'weight' => $weight
        );
        $this->db->where("id", $this->input->post("id"));
        $this->db->update("animal", $data);
    }

    function selectById() {
    	$this->db->where("id", $this->input->post("id"));
    	$query = $this->db->get("animal");
    	$query = $query->result();
    	return $query[0];
    }

    function delete($id) {
        $data = array(
            'active' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('animal', $data);  
    }

    function select() {
        $query = $this->db->get('animal');
        return $query->result();
    }
}