<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoveryModel extends CI_Model {
	var $id;
    var $idAnimal;
    var $entryTime;
    var $exitTime;

	function __construct()
    {
        parent::__construct();
    }

    function insertEntryTime() {
        $idAnimal = $this->input->post('idAnimal');
        $data = array(
            'entryTime' => date("Y-m-d H:i:s")
        );
        $this->db->insert('recovery', $data);
    }

    function insertExitTime() {
        $idAnimal = $this->input->post('idAnimal');
        $data = array(
            'exitTime' => date("Y-m-d H:i:s")
        );
        $this->db->where('idAnimal', $idAnimal);
        $this->db->update('recovery', $data);
    }

    function select() {
        $query = $this->db->get('recovery');
        return $query->result();
    }
}