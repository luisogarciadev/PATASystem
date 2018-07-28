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

    function insertPreRegistry($data) {
    	$turn = $data['turn'];
    	$idSpecies = $data['idSpecies'];
        $gender = $data['gender'];
        $petName = $data['petName'];
    	$idStatus = 1;
    	$campaignDate = date("Y-m-d H:i:s");
    	$active = 1;
        $isCertEng = $data['isCertEng'];
    	$data = array(
    		'turn' => $turn,
    		'idSpecies' => $idSpecies,
            'petName' => $petName,
    		'campaignDate' => $campaignDate,
    		'active' => $active,
    		'gender' => $gender,
    		'isCertEng' => $isCertEng
		);
    	
    	$this->db->insert('animal', $data);
        $idAnimal = $this->db->insert_id();
    	$data = array(
    		'idAnimal' => $idAnimal,
    		'idStatus' => $idStatus,
    		'time' => date("Y-m-d H:i:s")
		);
		$this->db->insert('animalStatus', $data);
        return $idAnimal;
    }

    function insertAnimalPerson($idAnimal, $idPerson) {
        $data = array(
            'idAnimal' => $idAnimal,
            'idPerson' => $idPerson
        );
        $this->db->insert('personAnimal', $data);

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

    function insertPhoto() {
        $id = $this->input->post('animalID');
        $data = array('photo' => $this->input->post('fileUp'));
        $this->db->where("id", $id);
        $this->db->update("animal", $data);
    }

    function isAggressive() {
        $id = $this->input->post('animalID');
        $data = array('aggressive' => $this->input->post('isAggressive'));
        $this->db->where("id", $id);
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

    function selectCats() {
        $this->db->where('idSpecies', 2);
        $query = $this->db->get('animal');
        return $query->result();
    }

    function selectDogs() {
        $this->db->where('idSpecies', 1);
        $query = $this->db->get('animal');
        return $query->result();
    }

    function getMaxTurn() {
        $query = $this->db->query('select MAX(turn) as turn from animal');
        if ($this->db->affected_rows() > 0) {
            $result = $query->result();
            return $result[0]->turn;
        }
    }

    function getPersonByAnimalID($id) {
        $query = $this->db->query('select p.* from animal a inner join personanimal pa on a.id = pa.idAnimal inner join person p on pa.idPerson = p.id where a.id =' . $id);
        if ($this->db->affected_rows() > 0) {
            $result = $query->result();
            return $result[0];
        }
    }
}