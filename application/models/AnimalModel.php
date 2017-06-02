<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnimalModel extends CI_Model {
	var $id;
	var $turn;
	var $petName;
	var $idSpecies;
	var $gender;
	var $idStatus;
	var $sick;
	var $ticks;
	var $fleas;
	var $email;
	var $nervous;
	var $agressive;
	var $photo;
	var $weight;
	var $campaignDate;
	var $active;

	function __construct()
    {
        parent::__construct();
    }

    function insertPreRegistry() {
    	$turn = $this->input->post('turn');
    	$idSpecies = $this->input->post('idSpecies');
    	$idStatus = 1;
    	$campaignDate = date("Y-m-d H:i:s");
    	$active = 1;
    	$data = array(
    		'turn' => $turn,
    		'idSpecies' => $idSpecies,
    		'idStatus' => $idStatus,
    		'campaignDate' => $campaignDate,
    		'active' => $active;
		);
    	$this->db->insert('animal', $data);
    }

    function insertWeight() {
        $photo = $this->input->post('photo');
        $weight = $this->input->post('weight');
        $gender = $this->input->post('gender');
		$data = array(
			'photo' => $photo,
			'weight' => $weight,
			'gender' => $gender
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