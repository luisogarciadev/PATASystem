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

    function insertEntryTime($id) {
        $this->db->where('idAnimal',$id);
        $q = $this->db->get('recovery');

        $LocalTime = strtotime('-7 hours');
        $data = array(
            'entryTime' => date("Y-m-d H:i:s", $LocalTime),
            'idAnimal' => $id,
        );
        if ( $q->num_rows() > 0 ) 
        {
            $this->db->where('idAnimal',$id);
            $this->db->update('recovery', $data);
        } else {
            $this->db->insert('recovery', $data);
        }
        $this->load->model('AnimalModel');
        $this->AnimalModel->changeStatus($id, 5);
    }

    function insertExitTime($id) {
        $idAnimal = $id;
        $LocalTime = strtotime('-7 hours');
        $data = array(
            'exitTime' => date("Y-m-d H:i:s", $LocalTime)
        );
        $this->db->where('idAnimal', $idAnimal);
        $this->db->update('recovery', $data);
    }

    function select() {
        $query = $this->db->get('recovery');
        return $query->result();
    }

    function getRecoveryByAnimalID($id) {
        $query = 'SELECT idAnimal, entryTime, exitTime FROM recovery r where idAnimal = ' . $id;
        $query = $this->db->query($query);
        $result = $query->result();
        if ( count($result) > 0 ) {
            return $result[0];
        }
        else {
            return NULL;
        }
    }
}