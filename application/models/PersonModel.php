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

    function insertRegistry() {
        $phone = $this->input->post('phone');

        $data = array(
            'phone' => $phone,
            'active' => 1
        );
        $this->db->insert("person", $data);
        return $this->db->insert_id();
    }

    function insert() {
        $personName = $this->input->post('personName');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $email = $this->input->post('email');

        $data = array(
            'personName' => $personName,
            'phone' => $phone,
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