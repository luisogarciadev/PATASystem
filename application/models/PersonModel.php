<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonModel extends CI_Model {
	var $id;
	var $personName;
    var $phone;
    var $IFE;
    var $address;
    var $active;

	function __construct()
    {
        parent::__construct();
    }

    function insert() {
        $personName = $this->input->post('personName');
        $phone = $this->input->post('phone');
        $IFE = $this->input->post('IFE');
        $address = $this->input->post('address');

        $data = array(
           'personName' => $personName,
            'phone' => $phone,
            'IFE' => $IFE,
            'address' => $address,
            'active' => 1
        );
        $this->db->where("id", $this->input->post("id"));
        $this->db->update("person", $data);
    }

    function selectById() {
    	$this->db->where("id", $this->input->post("id"));
    	$query = $this->db->get("person");
    	$query = $query->result();
    	return $query[0];
    }

    function delete($id) {
        $data = array(
            'active' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('person', $data);  
    }

    function select() {
        $query = $this->db->get('person');
        return $query->result();
    }
}